<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use DB;

class ProductController extends Controller
{
    public function index() {

        $products = Product::paginate(10);
        // $productss = Product::paginate(10);
        // $productsPaginate = DB::table('products')->orderBy('id')->paginate(10);


        return view("backend.product.admin-Product",compact('products'));
    }

    public function createProduct() {

        $categorys = Category::all();
        // dd($categorys);

        return view('backend.product.admin-Create-Product',compact('categorys'));
    }

    public function storeProduct(Request $request) {

        $input = $request->all();
        Product::create($input);

        return redirect('/admin/Product')->with('success','You Product has been Add Successfully!');

    }

    public function editProduct($id) {
        // 通过产品ID查找产品记录
        $productss = Product::find($id);

        if (!$productss) {

            return redirect()->route('product.index')->with('error', 'Product not found');
        }

        return view('backend.product.admin-edit-Product',compact('productss'));
    }

    public function updateProduct(Request $request, $id) {

        $input = $request->all();

        // 通过传入的 $id 查找要更新的产品记录
        $product = Product::find($id);

        if (!$product) {
            return redirect('/admin/Product')->with('error', 'Product not found.');
        }

        // 使用更新后的数据更新产品记录
        $product->update($input);

        return redirect('/admin/Product')->with('success', 'Product has been updated successfully!');
    }

    public function DeleteProduct($id){

        Product::where('id',$id)->delete();

        return back()->with('success','This Product has been delete.');
    }

    public function changeproductStatus($id)
    {
        $getstatus = Product::select('status')->where('id', $id)->first();

        if ($getstatus->status == 0) {
            $status = 1;
        } else {
            $status = 0;
        }

        // event(new HotelStatus());

        Product::where('id', $id)->update(['status' => $status]);

        return back()->with(compact('status'));
    }
}
