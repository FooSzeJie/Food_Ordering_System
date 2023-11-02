<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AddOn;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;

class AddOnController extends Controller
{
    // public function index(){
    //     return view("backend.variant.admin-variant");
    // }

    public function storeAddOn(Request $request){
        // Store the data to the database
        // Category::create($request->all());

        $request->validate([
            'name' => 'required|string' // Update the field name to 'gender'
        ]);

        $addon = new AddOn();
        $addon->name = $request->name;
        $addon->save();

        return back()->with("success","The Add On Item was successfully added to the database");
    }

    public function showAddOn(){

        $addons = AddOn::paginate(10);
        // $products = Product::all();

        return view("backend.add-on.admin-addon", compact('addons'));
    }

    public function EditAddOn($id){

        $addons = AddOn::find($id);

        return view("backend.add-on.admin-addon", compact('addons'));
    }

    public function UpdateAddOn(Request $request, $id){

        $addons = AddOn::find($id);

        $addons->name = $request->name;
        $addons->save();

        return back()->with('success','This Add On Item has been updated successfully.');
    }

    public function DeleteAddOn($id){

        AddOn::where('id',$id)->delete();

        return back()->with('success','This Add On Item has been delete.');
    }

    public function changeaddonStatus($id)
    {
        $getstatus = AddOn::select('status')->where('id', $id)->first();

        if ($getstatus->status == 0) {
            $status = 1;
        } else {
            $status = 0;
        }

        // event(new HotelStatus());

        AddOn::where('id', $id)->update(['status' => $status]);

        return back()->with(compact('status'));
    }

    public function deleteMultipleAddOn(Request $request)
    {
        $ids = json_decode($request->input('ids'));

        // dd($ids);

        if (is_array($ids) && count($ids) > 0) {

            AddOn::whereIn('id', $ids)->delete();

            return back()->with('success', 'Selected AddOns have been deleted successfully!');

        } else {

            return back()->with('error', 'Invalid input. No AddOns were deleted.');
        }
    }
}
