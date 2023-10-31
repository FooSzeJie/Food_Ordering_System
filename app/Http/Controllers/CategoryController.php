<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index(){
        return view("backend.adminCategory");
    }

    // Create the Category
    public function createCategory(){

        return view("backend.categoryPage");
    }

    public function AdminstoreCategory(Request $request){
        // Store the data to the database
        // Category::create($request->all());

        $request->validate([
            'name' => 'required|string' // Update the field name to 'gender'
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->save();

        return back()->with("success","The category was successfully added to the database");
    }

    public function AdminshowCategory(){

        $categorys = Category::paginate(10);

        return view("backend.categoryPage", compact('categorys'));
    }

    public function AdminViewCategory($id)
    {
        $categorys = Category::find($id);

        return view("backend.categoryPage", compact('categorys'));
    }

    public function AdminEditCategory($id){

        $categorys = Category::find($id);

        return view("backend.categoryPage", compact('categorys'));
    }

    public function AdminUpdateCategory(Request $request, $id){

        $categorys = Category::find($id);

        $categorys->name = $request->name;
        $categorys->save();

        return back()->with('success','This Category has been updated successfully.');
    }

    public function AdminDeleteCategory($id){

        Category::where('id',$id)->delete();

        return back()->with('success','This Category has been delete.');
    }

    public function changecategoryStatus($id)
    {
        $getstatus = Category::select('status')->where('id', $id)->first();

        if ($getstatus->status == 0) {
            $status = 1;
        } else {
            $status = 0;
        }

        // event(new HotelStatus());

        Category::where('id', $id)->update(['status' => $status]);

        return back()->with(compact('status'));
    }

    public function AdmindeleteMultipleCategory(Request $request)
    {
        $ids = json_decode($request->input('ids'));

        // dd($ids);

        if (is_array($ids) && count($ids) > 0) {

            Category::whereIn('id', $ids)->delete();

            return back()->with('success', 'Selected Categorys have been deleted successfully!');

        } else {

            return back()->with('error', 'Invalid input. No Categorys were deleted.');
        }
    }

}
