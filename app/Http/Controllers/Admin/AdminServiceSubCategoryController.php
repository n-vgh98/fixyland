<?php

namespace App\Http\Controllers\Admin;

use App\Models\Lang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ServiceCategory;
use App\Models\ServiceSubCategory;

class AdminServiceSubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = ServiceCategory::all();
        $subcategories = ServiceSubCategory::all();
        return view("admin.services.subcategory.index", compact("subcategories", "categories"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $subcategory = new ServiceSubCategory();
        $subcategory->category_id = $request->category_id;
        $imagename = time() . "." . $request->image->extension();
        $request->image->move(public_path("Images/ServiceSubCategories/"), $imagename);
        $subcategory->photo_path = "Images/ServiceSubCategories/" . $imagename;
        $subcategory->alt = $request->alt;
        $subcategory->title = $request->title;
        $subcategory->name = $request->name;
        $subcategory->save();
        return redirect()->back()->with("success", "Your service subcategory created successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ServiceCategory $category)
    {

        $categories = ServiceCategory::all();
        return view("admin.services.subcategory.show", compact("category", "categories"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $subcategory = ServiceSubCategory::find($id);
        if ($request->image != null) {
            unlink($subcategory->photo_path);
            $imagename = time() . "." . $request->image->extension();
            $request->image->move(public_path("Images/ServiceSubCategories/"), $imagename);
            $subcategory->photo_path = "Images/ServiceSubCategories/" . $imagename;
        }

        $subcategory->alt = $request->alt;
        $subcategory->category_id = $request->category_id;
        $subcategory->title = $request->title;
        $subcategory->name = $request->name;
        $subcategory->save();
        return redirect()->back()->with("success", "Your service subcategory updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ServiceSubCategory $subcategory)
    {
        unlink($subcategory->photo_path);
        $subcategory->delete();
        return redirect()->back()->with("success", "Your Service Subcategory removed successfully");
    }

    // method for activating subcategory
    public function activate(ServiceSubCategory $subcategory)
    {
        $subcategory->status = 1;
        $subcategory->save();
        return redirect()->back()->with("success", "Service Subcategory  Activated");
    }

    // method for deactiving subcategory
    public function deactive(ServiceSubCategory $subcategory)
    {
        $subcategory->status = 0;
        $subcategory->save();
        return redirect()->back()->with("success", "Service Subcategory Deactivated");
    }
}
