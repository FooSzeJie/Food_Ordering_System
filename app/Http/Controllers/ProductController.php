<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index() {
        // $products = Product::all();

        return view("backend.adminProduct");
    }

    public function createProduct() {
        return view('backend.adminCreateProduct');
    }

    public function storeProduct(Request $request) {
        $input = $request->all();
        Product::create($input);

        return view('backend.adminProduct');

    }
}
