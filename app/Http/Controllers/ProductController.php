<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\AddOn;
use App\Models\Variant;
use DB;

class ProductController extends Controller
{
    public function index()
    {

        $products = Product::paginate(10);

        return view("backend.product.admin-Product", compact('products'));
    }

    public function createProduct()
    {

        $categorys = Category::all();
        $addons = AddOn::all();
        $variants = Variant::all();

        // dd($categorys);

        return view('backend.product.admin-Create-Product', compact('categorys', 'addons', 'variants'));
    }

    public function storeProduct(Request $request)
    {

        // |image|mimes:jpeg,png,jpg,gif|max:2048
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'categoryID' => 'required',
            'addOns' => 'required|array', // Make sure it's an array
            'addOns.*' => 'numeric', // Each value in the array should be a number
        ]);

        $image = $request->file('image');

        $imageName = "";

        // Check Image whether null
        if ($image == null) {

            $image = null;

        } else {

            // Handle image upload
            $image->move('images', $image->getClientOriginalName());
            $imageName = $image->getClientOriginalName();
        }

        $product = new Product();
        $product->name = $request->name;
        $product->image = $imageName;
        $product->price = $request->price;
        $product->description = $request->description; // Corrected line
        $product->addon = $request->addon;
        $product->variant = $request->variant;
        $product->categoryID = $request->categoryID; // Corrected line
        $product->description = $request->description;
        $product->categoryID = $request->categoryID;
        $product->save();

        return redirect('/admin/Product')->with('success', 'You have added a new Product successfully');
    }

    public function editProduct($id)
    {
        // Find the product by ID
        $product = Product::find($id);

        if (!$product) {
            return redirect()->route('product.index')->with('error', 'Product not found');
        }

        // Fetch categories for the dropdown
        $categories = Category::all();

        return view('backend.product.admin-edit-Product', compact('product', 'categories'));
    }

    public function updateProduct(Request $request, $id)
    {
        // Find the product by ID
        $product = Product::find($id);

        if (!$product) {
            return redirect()->route('product.index')->with('error', 'Product not found');
        }

        // Validate the form data
        $request->validate([
            'name' => 'required',
            // 'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'price' => 'required',
            'description' => 'required',
            'categoryID' => 'required',
        ]);

        // Initialize $imageName to null
        $imageName = null;

        // Handle image upload if a new image is provided
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
        }

        // Only update the image attribute if a new image was provided
        if ($imageName !== null) {
            $product->image = $imageName;
        }

        // Update other product details
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->description = $request->input('description');
        $product->categoryID = $request->input('categoryID');

        $product->save();

        return redirect()->route('product.index')->with('success', 'Product updated successfully');
    }

    public function DeleteProduct($id)
    {

        Product::where('id', $id)->delete();

        return back()->with('success', 'This Product has been delete.');
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

    public function deleteMultipleProduct(Request $request)
    {
        $ids = json_decode($request->input('ids'));

        // dd($ids);

        if (is_array($ids) && count($ids) > 0) {

            Product::whereIn('id', $ids)->delete();

            return back()->with('success', 'Selected Products have been deleted successfully!');

        } else {

            return back()->with('error', 'Invalid input. No Products were deleted.');
        }
    }
}
