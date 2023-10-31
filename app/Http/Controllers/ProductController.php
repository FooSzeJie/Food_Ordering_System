<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    public function index() {

        // $products = Product::all();
        $productss = Product::paginate(10);
        $products = Product::paginate(10);

        return view("backend.adminProduct",compact('productss','products'));
    }

    public function createProduct() {

        $categorys = Category::all();
        // dd($categorys);

        return view('backend.adminCreateProduct',compact('categorys'));
    }

    public function storeProduct(Request $request) {

        $input = $request->all();
        Product::create($input);

        return view('backend.adminProduct');

    }
}
