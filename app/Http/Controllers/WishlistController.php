<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{

    public function AddToWishlist(Request $request)
    {
        if (Auth::check()) {

            $user = Auth::user();
            $product_id = $request->product_id;
            $product_name = $request->product_name;
            $product_image = $request->product_image;
            $product_description = $request->product_description;
            $product_price = $request->product_price;

            // Check if the product is already in the user's wishlist
            $wishlist = Wishlist::where('user_id', $user->id)
                ->where('product_id', $product_id)
                ->first();

            if ($wishlist) {
                return redirect()->back()->with('error', 'Product is already in your wishlist');
            }

            // If not, add the product to the wishlist
            $wishlist = new Wishlist();
            $wishlist->user_id = $user->id;
            $wishlist->product_id = $product_id;
            $wishlist->product_name = $product_name;
            $wishlist->product_image = $product_image;
            $wishlist->product_description = $product_description;
            $wishlist->product_price = $product_price;
            $wishlist->save();

            return redirect()->back()->with('success', 'Product added to wishlist');

        } else {

            return redirect('/loginpage')->with('error', 'You need to login first!');
        }
    }

    public function ShowWishlist()
    {
        $user = auth()->user();
        $wishlistItems = $user->wishlist()->get();

        return view('frontend.user-wishlist', compact('wishlistItems'));
    }

    public function deletewishlist($id)
    {
        // Find the wishlist by ID
        $wishlist = Wishlist::find($id);

        // Check if the wishlist exists
        if ($wishlist) {
            // Delete the wishlist
            $wishlist->delete();

            // Redirect back with a success message
            return redirect()->back()->with('success', 'Wishlist deleted successfully');
        } else {
            // Redirect back with an error message
            return redirect()->back()->with('error', 'Wishlist not found');
        }
    }

}
