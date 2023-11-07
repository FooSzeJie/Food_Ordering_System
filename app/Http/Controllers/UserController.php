<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Product;

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

        // if(Auth::check()){

            return view('frontend.home')->with('success',"Welcome to SUC Food Ordering System");

        // }else{

        //     return redirect('/loginpage')->with('fail', "You need to Login frist!");

        // }
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

    public function contact(){

        if(Auth::check()){

            return view('frontend.contact');

        }else{

            return redirect('/loginpage')->with('fail', "You Need To Login First!");

        }


    }

    public function userdashboard(){

        return view('frontend.user-dashboard');
    }

    public function FoodDetail(){

        return view('frontend.food-detail');
    }
}
