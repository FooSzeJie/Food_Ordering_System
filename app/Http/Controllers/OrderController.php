<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MyOrder;
use App\Models\Order;
use App\Models\Cart;
use Auth;
use Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class OrderController extends Controller
{
    public function myOrder(){

        // Get the authenticated user's ID
        $userId = Auth::id();

        $myorders = Order::where('user_id', $userId)->get();

        return view('frontend.user-myorder',compact('myorders'));
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

        // Save order details to the orders table for each item in the cart
        $cartItems = Cart::where('user_id', $request->user_id)->get();

        foreach ($cartItems as $cartItem) {
            $order = new Order();
            $order->user_id = $request->user_id;
            $order->user_name = $request->user_name;
            $order->product_name = $cartItem->product_name;
            $order->product_image = $cartItem->product_image;
            $order->product_description = $cartItem->product_description;
            $order->product_quantity = $cartItem->product_quantity;
            $order->product_price = $cartItem->total_price;
            $order->totalAmount = $request->totalAmount;
            $order->order_type = $request->selected_option;
            $order->save();
        }

        // Clear the user's cart after completing the order
        Cart::where('user_id', $request->user_id)->delete();

        return redirect($response['url']);
    }

    public function stripeCheckoutSuccess(Request $request)
    {
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));

        $response = $stripe->checkout->sessions->retrieve($request->session_id);

        return redirect()->route('home')->with('success','Payment successful.');
    }

}
