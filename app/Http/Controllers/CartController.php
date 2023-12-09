<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use Auth;
use Stripe;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    public function MyCart(){

        return view('frontend.cart');
    }

    public function addToCart(Request $request)
    {
        if (Auth::check()) {

            // Validate the request
            $validator = Validator::make($request->all(), [
                'product_name' => 'required',
                'product_description' => 'required',
                'quantity' => 'required|numeric|min:1',
                // 'total_price' => 'required|numeric|min:0',
            ]);

            if ($validator->fails()) {

                return redirect()->back()->withErrors($validator)->withInput();

            }

            // Get the authenticated user's ID
            $userId = Auth::id();

            try{

                // Create a new Cart instance
                $cart = new Cart();
                $cart->user_id = $userId;
                $cart->product_name = $request->input('product_name');
                $cart->product_id = $request->input('product_id');
                $cart->image = $request->input('product_image');
                $cart->product_description = $request->input('product_description');
                $cart->product_quantity = $request->input('quantity');
                $cart->total_price = $request->input('total_price');
                $cart->save();

                // dd();

                return redirect()->route('food')->with('success', 'Item added to cart successfully!!  Order more?');

            }catch(e){

                return back()->with('fail', 'Failed to Contact. Please try again.');

            }
        } else {

            return redirect('/loginpage')->with('error', 'You need to log in first!');
        }
    }

    public function displayCart()
    {
        if (Auth::check()) {
            // Get the authenticated user's ID
            $userId = Auth::id();

            // Retrieve cart items for the user
            $cartItems = Cart::where('user_id', $userId)->get();

            // Calculate the total order amount
            $totalAmount = $cartItems->sum('total_price');

            // Return the view with cart items and total amount
            return view('frontend.cart')->with(['cartItems' => $cartItems, 'totalAmount' => $totalAmount]);

        } else {

            // Redirect if the user is not authenticated
            return redirect('/loginpage')->with('error', 'You need to log in first!');
        }
    }

}
