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

        // Get the authenticated user's ID
        $userId = Auth::id();

        // $myorders = Order::where('user_id', $userId)->get();

        $orders = Order::where('user_id',$userId)->orderBy('created_at','desc')->paginate(10);

        return view('frontend.user-myorder1',compact('orders'));
    }

    public function show($orderId){

        // Get the authenticated user's ID
        $userId = Auth::id();

        $orders = Order::where('user_id',$userId)->where('id',$orderId)->first();

        if($orders){

            return view('frontend.user-myorder',compact('orders'));

        }else{

            return redirect()->back()->with('fail','No Order Found');
        }
    }

    public function stripeCheckout(Request $request)
    {
        // Use the correct Stripe API key
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

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
            $orderItems->product_image = $cartItem->image;
            $orderItems->product_quantity = $cartItem->product_quantity;
            $orderItems->total_price = $cartItem->total_price;
            $orderItems->totalAmount = $request->totalAmount;
            $orderItems->save();
        }

        // Clear the user's cart after completing the order
        // Cart::where('user_id', $request->user_id)->delete();

        return redirect($response['url']);
    }

    public function stripeCheckoutSuccess(Request $request)
    {
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));

        $response = $stripe->checkout->sessions->retrieve($request->session_id);

        return redirect()->route('home')->with('success','Payment successful.');
    }

}
