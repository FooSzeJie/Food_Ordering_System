<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Variant;
use App\Models\AddOn;
use App\Models\Product;
use App\Models\Order;
use App\Models\Order_item;
use App\Models\Wishlist;
use DB;
use Carbon\Carbon;

class UserController extends Controller
{
    public function loginpage(){

        if(Auth::check()){

            return back()->with('fail','You Already Login!');

        }else{

            return view('auth.userauth.login');

        }
    }

    public function registerpage(){

        if(Auth::check()){

            return back()->with('fail','You Already Login!');

        }else{

            return view('auth.userauth.register');

        }
    }

    public function userregister(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'string|required|min:1',
            'email' => 'string|required|email|max:100|unique:users,email',
            'password' => 'string|required|min:6|max:12|confirmed',
            'password_confirmation' => 'required|same:password'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try{

            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();

            return back()->with('success','Your registration has been successfully');

        }catch(e){

            return back()->with('fail', 'Failed to register. Please try again.');

        }
    }

    public function userlogin(Request $request){

        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {

            return redirect()->back()->withErrors($validator)->withInput();

        }

        $user = User::where('email', $request->email)->first();

        if ($user && $user->status == 1) {

            return back()->withInput()->with('fail', "You have been banned. Please contact admin for further assistance.");

        }

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

            return redirect('/')->with('success', "You are Login Successfully!");

        } else {

            return back()->with('fail', "Username or password are incorrect.");

        }
    }

    public function home(){

        $products = Product::all();

        return view('frontend.home',compact('products'))->with('success',"Welcome to SUC Food Ordering System");

    }


    public function logout(Request $request){

        $request->session()->flush();
        Auth::logout();

        return redirect('/loginpage')->with('fail', "You are Logout Successfully!");
    }

    public function about(){

        return view('frontend.about');
    }

    public function service(){

        return view('frontend.service');
    }

    public function food(){

        $products = Product::all();

        return view('frontend.food',compact('products'));
    }

    public function userdashboard(){

        // dd('Controller method is called');

        // Check if the user is authenticated
        if (Auth::check()) {

            // Retrieve the authenticated user
            $user = Auth::user();

            // 1. 获取用户在订单中的次数总和
            $orderCount = Order::where('user_id', $user->id)->count();

            // 2. 获取用户在心愿单中的次数总和
            $wishlistCount = Wishlist::where('user_id', $user->id)->count();

            // 3. 获取用户在订单项中的价格总和
            $orderItemsTotalPrice = Order_item::whereHas('order', function ($query) use ($user) {
                // Filter based on the user ID in the related order
                $query->where('user_id', $user->id);
            })->sum('total_price');

            // Log the value of $orderItemsTotalPrice before encoding it to JSON
            \Log::info('Order Items Total Price:', ['data' => $orderItemsTotalPrice]);

            // ----------------------------------------------------Area Chart for Specific User-----------------------------------------------------//
            // Get monthly total prices for each day of the current month for the specified user_id
            $monthlyTotalPricesForUser = Order_item::select(
                DB::raw('SUM(total_price) as total_price_sum'),
                DB::raw('DATE_FORMAT(created_at, "%Y-%m-%d") as formatted_date')
            )
                ->whereHas('order', function ($query) use ($user) {
                    // Filter based on the user ID in the related order
                    $query->where('user_id', $user->id);
                })
                ->groupBy('formatted_date')
                ->get();

            $monthlyTotalDataForUser = [];

            foreach ($monthlyTotalPricesForUser as $monthlyTotal) {
                $formattedDate = $monthlyTotal->formatted_date;
                $totalPriceSum = $monthlyTotal->total_price_sum;
                $monthlyTotalDataForUser[] = [
                    'formatted_date' => $formattedDate,
                    'totalPriceSum' => $totalPriceSum,
                ];
            }

            // ----------------------------------------------------Pie Chart-----------------------------------------------------//
            // Count all variants, addons, and products
            $orders = Order::where('user_id', $user->id)->count();
            $wishlist = Wishlist::where('user_id', $user->id)->count();

            $labels = ['orders', 'Consumption Price $', 'wishlist'];
            $data = [$orders, $orderItemsTotalPrice, $wishlist];

            // For example, you can output them or pass them to your view if you're working in a controller
            return view('frontend.user-dashboard', compact('orderCount', 'wishlistCount', 'orderItemsTotalPrice','monthlyTotalDataForUser'
            ,'labels','data'));

        } else {
            // Redirect if the user is not authenticated
            return redirect('/loginpage')->with('error', 'You need to log in first!');
        }
    }

    public function FoodDetail($productId, $variantId, $id)
    {

        // $fooddetails = Product::where('id',$id);

        // Get product information with eager-loaded variants and addons
        $fooddetails = Product::with(['variants', 'addons'])
            ->where('products.id', $productId)
            ->findOrFail($productId);

        // Access variants and addons directly from the model based on variant ID
        // $variants = $fooddetails->variants()->where('variants.id', $variantId)->first();
        $variants = $fooddetails->variants;
        $addons = $fooddetails->addons;

        // dd($variants);

        return view('frontend.food-detail', compact('fooddetails', 'variants', 'addons'));
    }

    // public function FoodDetail($id)
    // {
    //     $fooddetails = Product::where('id',$id);

    //     $variant = $fooddetails->variants()->where('id', $variantId)->first();

    //     dd($variant);

    //     $variants = Variant::whereIn('id', $variant);

    //     // 获取产品信息和关联的变体和插件
    //     // $product = Product::with(['variants', 'addons'])->findOrFail($productId);

    //     // 将产品、变体和插件传递给视图
    //     return view('frontend.product-details', compact('product'));
    // }

}
