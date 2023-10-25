<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Session;
use Hash;
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

        return view('backend.admin-dashboard');
    }

}
