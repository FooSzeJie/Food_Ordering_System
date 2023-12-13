<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Order_item;
use App\Models\Cart;
use Auth;
use Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function myOrder(){

        if(Auth::check()){

            // Get the authenticated user's ID
            $userId = Auth::id();

            $orders = Order::where('user_id',$userId)->orderBy('created_at','desc')->paginate(10);

            return view('frontend.user-allorder',compact('orders'));

        }else{

            return redirect('/loginpage')->with('fail', "You Need To Login First!");

        }
    }

    public function show($orderId){

        // Get the authenticated user's ID
        $userId = Auth::id();

        $orders = Order::where('user_id',$userId)->where('id',$orderId)->first();

        // 在控制器或模型中获取订单ID对应的产品列表
        $orderItems = Order_item::where('order_id', $orderId)->get();

        // 计算产品价格总和
        $totalSum = $orderItems->sum('total_price');

        if($orders){

            return view('frontend.user-myorder',compact('orders','totalSum'));

        }else{

            return redirect()->back()->with('fail','No Order Found');
        }
    }

    public function stripeCheckout(Request $request)
    {
        // Use the correct Stripe API key
        if (Auth::check()) {

            try{

                // Check if the user's cart is not empty
                $cartItems = Cart::where('user_id', $request->user_id)->get();

                if ($cartItems->isEmpty()) {
                    return back()->with('error', 'Your cart is empty. Add items to your cart before proceeding to checkout.');
                }

                // \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
                \Stripe\Stripe::setApiKey(config('services.stripe.secret'));

                $redirectUrl = route('stripe.checkout.success').'?session_id={CHECKOUT_SESSION_ID}';

                $response = \Stripe\Checkout\Session::create([
                    'success_url' => $redirectUrl,
                    'customer_email' => 'demo@gmail.com',
                    'payment_method_types' => ['link','card'],
                    'line_items' => [
                        [
                            'price_data' => [
                                'product_data' => [
                                    'name' => $request->product_name,
                                ],
                                'unit_amount' => 100 * $request->totalAmount,
                                'currency' => 'USD',
                            ],
                            'quantity' => 1
                        ],
                    ],
                    'mode' => 'payment',
                    'allow_promotion_codes' => true,
                ]);

                // Add To Order
                $order = new Order();
                $order->user_id = $request->user_id;
                $order->user_name = $request->user_name;
                $order->tracking_no = 'funda-'.Str::random(10);
                $order->email = $request->user_email;
                $order->order_type = $request->selected_option;
                $order->save();

                // Capture the ID of the newly created order
                $order_id = $order->id;

                // Save order details to the orders table for each item in the cart
                $cartItems = Cart::where('user_id', $request->user_id)->get();

                // Add To Order_Item
                foreach ($cartItems as $cartItem) {
                    $orderItems = new Order_item();
                    $orderItems->order_id = $order_id;
                    $orderItems->product_id = $cartItem->product_id;
                    $orderItems->product_name = $cartItem->product_name;
                    $orderItems->product_image = $cartItem->image ?? 'default_image.jpg';
                    $orderItems->product_quantity = $cartItem->product_quantity;
                    $orderItems->total_price = $cartItem->total_price;
                    $orderItems->totalAmount = $request->totalAmount;

                    // Add variants and addons
                    // $orderItems->variants = $cartItem->variants; // Assuming variants is a JSON array
                    // $orderItems->addons = $cartItem->addons; // Assuming addons is a JSON array

                    $orderItems->variants = json_encode($cartItem->variants);
                    $orderItems->addons = json_encode($cartItem->addons);

                    $orderItems->save();

                    $cartItem->delete();

                }

                // Build the data for email
                $data = [
                    'subject' => "Your Order Detail",
                    'customer_name' => $request->user_name,
                    'customer_email' => $request->user_email,
                    'order_id' => $order_id,
                    'order_type' => $request->selected_option,
                    'products' => [], // Initialize an array to store product details
                    'tracking_no' => 'funda-'.Str::random(10)
                ];

                // Populate product details in the data array
                foreach ($cartItems as $cartItem) {
                    $data['products'][] = [
                        'product_name' => $cartItem->product_name,
                        'product_quantity' => $cartItem->product_quantity,
                        'total_price' => $cartItem->total_price,
                        'variants' => $cartItem->variants,
                        'addons' => $cartItem->addons,
                    ];
                }

                Mail::send('backend.email.orderemail', ['data' => $data], function($message) use ($data) {
                    $message->to('ahpin7762@gmail.com')
                        ->subject($data['subject']);
                });

                return back()->with('success','You Order Has Successfully!');

            }catch (Exception $e) {

                return back()->with('fail', 'Failed to Contact. Please try again.');
            }

        } else {

            // Redirect if the user is not authenticated
            return redirect('/loginpage')->with('error', 'You need to log in first!');
        }

        // Clear the user's cart after completing the order
        // Cart::where('user_id', $request->user_id)->delete();

        // return redirect($response['url']);
    }

    public function stripeCheckoutSuccess(Request $request)
    {
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));

        $response = $stripe->checkout->sessions->retrieve($request->session_id);

        return redirect()->route('home')->with('success','Payment successful.');
    }

    public function allorder(){

        $orders = Order::paginate(10);

        return view('backend.order.userorder',compact('orders'));
    }

    public function vieworder($id)
    {
        // Find the order
        $userorder = Order::find($id);

        // Check if the order exists
        if (!$userorder) {
            abort(404); // or handle the case when the order is not found
        }

        // Retrieve the associated items using the defined relationship
        $orderItems = $userorder->items;

        // Check if items are retrieved
        if ($orderItems->isEmpty()) {
            // Handle the case when no items are found, e.g., return an error message
            return view('backend.order.userorderdetail', compact('userorder'))->withErrors('No items found for this order.');
        }

        // Calculate the total price
        $totalSum = $orderItems->sum('total_price');

        return view('backend.order.userorderdetail', compact('userorder', 'orderItems', 'totalSum'));
    }

    public function mutlipledeleteorder(Request $request){

        $ids = json_decode($request->input('ids'));

        if (is_array($ids) && count($ids) > 0) {

            Order::whereIn('id', $ids)->delete();

            return back()->with('success', 'Selected User Orders have been deleted successfully!');

        } else {

            return back()->with('error', 'Invalid input. No User Contact were deleted.');
        }
    }

}
