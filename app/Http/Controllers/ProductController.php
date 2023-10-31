<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peoduct;

class ProductController extends Controller
{
    public function index() {
        // $products = Product::all();

        return view("backend.adminProduct");
    }

    public function createProduct() {
        return view('backend.adminCreateProduct');
    }
}
