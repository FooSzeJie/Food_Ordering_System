<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(){
        return view("backend.adminCategory");
    }

    // Create the Category
    public function createCategory(){
        return view("backend.admin-dashboard");
    }

    public function storeCategory(Request $request){
        // Store the data to the database
        Category::create($request->all());

        return redirect("admin/dashboard")->with("success","The category was successfully added to the database");
    }
}
