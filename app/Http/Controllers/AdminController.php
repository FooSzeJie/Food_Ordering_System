<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\AddOn;
use App\Models\Order;
use App\Models\Variant;
use App\Models\Product;
use App\Models\Order_item;
use Session;
use Hash;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    // View Login Page
    public function login(){
        return view('auth.adminauth.admin-login');
    }

    // Login Function
    public function loginAdmin(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {

            return redirect()->back()->withErrors($validator)->withInput();

        }

        $admin = Admin::where('name', '=', $request->name)->first();

        if($admin){
            if(Hash::check($request->password, $admin->password)){
                $request->session()->put('loginId', $admin->id);
                $request->session()->put('loginName', $admin->name);
                return redirect('admin/dashboard');
            }else{
                return back()->with('fail','Password not matches.');
            }
        }else{
            return back()->with('fail','This email is not registered.');
        }
    }

    // Logout Function
    public function logout() {
        if(Session::has('loginId')){
            session::pull('loginId');
            return redirect('admin/login');
        }
    }

    public function adminDashboard(){

        // Month follow now
        $currentMonth = Carbon::now()->month;

        // ------------------------------------------------Count All products--------------------------------------------------//
        // Count products
        $products = Product::count();

        // -----------------------------------------Count orders for the current month-----------------------------------------//
        // Count orders for the current month
        $ordersCount = Order::whereMonth('created_at', $currentMonth)->count();

        // Get monthly total prices for orders
        $monthlyPrices = Order_item::select(
            DB::raw('SUM(total_price) as total_price_sum'),
            DB::raw('MONTH(created_at) as month')
        )
            ->whereMonth('created_at', $currentMonth)
            ->groupBy('month')
            ->first(); // Use first() to get a single result

        // Extract the total price sum for the current month
        $totalPrice = ($monthlyPrices) ? $monthlyPrices->total_price_sum : 0;


        // Count Price
        // $monthlyPrices = Order_item::select(
        //     DB::raw('SUM(total_price) as total_price_sum'),
        //     DB::raw('DATE_FORMAT(created_at, "%Y-%m-%d") as formatted_date')
        // )
        // ->whereMonth('created_at', $currentMonth)
        // ->groupBy('formatted_date')
        // ->get();

        // ----------------------------------------------------Area Chart-----------------------------------------------------//
        // Get monthly total prices for each day of the current month
        $monthlyTotalPrices = Order_item::select(
            DB::raw('SUM(total_price) as total_price_sum'),
            DB::raw('DATE_FORMAT(created_at, "%Y-%m-%d") as formatted_date')
        )
        // ->whereMonth('created_at', $currentMonth)
        ->groupBy('formatted_date')
        ->get();

        $monthlyTotalData = [];

        foreach ($monthlyTotalPrices as $monthlyTotal) {
            $formattedDate = $monthlyTotal->formatted_date;
            $totalPriceSum = $monthlyTotal->total_price_sum;
            $monthlyTotalData[] = [
                'formatted_date' => $formattedDate,
                'totalPriceSum' => $totalPriceSum,
            ];
        }

        // ----------------------------------------------------Pie Chart-----------------------------------------------------//

        // Count all variants, addons, and products
        $Allvariant = Variant::count();
        $Alladdon = AddOn::count();
        $Allproduct = Product::count();

        $labels = ['Allvariant', 'Alladdon', 'Allproduct'];
        $data = [$Allvariant, $Alladdon, $Allproduct];

        return view('backend.admin-dashboard', compact('Allproduct', 'Allvariant', 'Alladdon', 'products', 'ordersCount', 'totalPriceSum',
        'monthlyTotalData','labels','data','totalPrice'));
    }


}
