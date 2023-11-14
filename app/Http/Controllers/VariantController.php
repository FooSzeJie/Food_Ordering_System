<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Variant;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;

class VariantController extends Controller
{
    public function index(){
        return view("backend.variant.admin-variant");
    }

    public function storeVariant(Request $request){
        // Store the data to the database
        // Category::create($request->all());

        $request->validate([
            'name' => 'required|string',// Update the field name to 'gender'
            'price' => 'required'
        ]);

        $variant = new Variant();
        $variant->name = $request->name;
        $variant->price = $request->price;
        $variant->save();

        return back()->with("success","The Variant was successfully added to the database");
    }

    public function showVariant(){

        $variants = Variant::paginate(10);
        // $products = Product::all();

        return view("backend.variant.admin-variant", compact('variants'));
    }

    public function EditVariant($id){

        $variants = Variant::find($id);

        return view("backend.variant.admin-variant", compact('variants'));
    }

    public function UpdateVariant(Request $request, $id){

        $variants = Variant::find($id);

        $variants->name = $request->name;
        $variants->price = $request->price;
        $variants->save();

        return back()->with('success','This Variant has been updated successfully.');
    }

    public function DeleteVariant($id){

        Variant::where('id',$id)->delete();

        return back()->with('success','This Variant has been delete.');
    }

    public function changevariantStatus($id)
    {
        $getstatus = Variant::select('status')->where('id', $id)->first();

        if ($getstatus->status == 0) {
            $status = 1;
        } else {
            $status = 0;
        }

        // event(new HotelStatus());

        Variant::where('id', $id)->update(['status' => $status]);

        return back()->with(compact('status'));
    }

    public function deleteMultipleVariant(Request $request)
    {
        $ids = json_decode($request->input('ids'));

        // dd($ids);

        if (is_array($ids) && count($ids) > 0) {

            Variant::whereIn('id', $ids)->delete();

            return back()->with('success', 'Selected Variant have been deleted successfully!');

        } else {

            return back()->with('error', 'Invalid input. No Variants were deleted.');
        }
    }
}
