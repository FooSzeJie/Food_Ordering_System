<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\AddOn;
use App\Models\Variant;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportProduct;
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

        // dd($request->input('addonID'));

        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'categoryID' => 'required',
            'addonID' => 'required|array',
            'variantID' => 'required',
        ]);

        $image = $request->file('image');

        $imageName = "";

        if ($image) {
            if ($image->isValid()) {
                $imageName = $image->getClientOriginalName();
                $image->move(public_path('images'), $imageName);

            } else {
                return back()->with('error', 'Image Have Some Problem');
            }
        }

        $product = new Product();
        $product->name = $request->name;
        $product->image = $imageName;
        $product->price = $request->price;
        $product->description = $request->description; // Corrected line
        $product->categoryID = $request->categoryID; // Corrected line
        $product->status = $request->status;
        $product->save();

        // Attach selected Add Ons to the product
        $product->addons()->attach($request->input('addonID'));

        // Attach selected Variants to the product
        $product->variants()->attach($request->input('variantID'));

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
        $addons = AddOn::all();
        $variants = Variant::all();

        return view('backend.product.admin-edit-Product', compact('product', 'categories','addons','variants'));
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
            'price' => 'required',
            'description' => 'required',
            'categoryID' => 'required',
            'addonID' => 'required',
            'variantID' => 'required',
        ]);

        // Initialize $imageName to the existing image name
        $imageName = $product->image;

        // Handle image upload if a new image is provided
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
        }

        // Update product details
        $product->name = $request->input('name');
        $product->image = $imageName; // Update the image attribute
        $product->price = $request->input('price');
        $product->description = $request->input('description');
        $product->categoryID = $request->input('categoryID');
        // $product->addOns = $request->input('addonID');
        // $product->variant = $request->input('variantID');
        $product->status = $request->input('status');

        // Attach selected Add Ons to the product
        $product->addons()->attach($request->input('addonID'));

        // Attach selected Variants to the product
        $product->variants()->attach($request->input('variantID'));

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

    public function import(Request $request){

        // Excel::import(new ImportProduct, $request->file('file')->store('files'));

        $selectedFile = $request->file('file')->store('files');

        $import = new ImportProduct();

        Excel::import($import, $selectedFile);

        return redirect('/admin/Product')->with('success', 'Import completed successfully.');
    }
}
