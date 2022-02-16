<?php

namespace App\Http\Controllers\Admin;

use App\Models\Lang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ServiceCategory;

class AdminServiceCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($lang)
    {
        $languages = Lang::where([["langable_type", "App\Models\ServiceCategory"], ["name", $lang]])->get();
        return view("admin.services.category.index", compact("languages"));
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
        $lang = new Lang();
        $lang->name = $request->language;
        $category = new ServiceCategory();
        $imagename = time() . "." . $request->image->extension();
        $request->image->move(public_path("Images/ServiceCategories/"), $imagename);
        $category->photo_path = "Images/ServiceCategories/" . $imagename;
        $category->alt = $request->alt;
        $category->title = $request->title;
        $category->name = $request->name;
        $category->save();
        $category->language()->save($lang);
        return redirect()->route("admin.services.category.index", $request->language)->with("success", "Your service category created successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $category = ServiceCategory::find($id);
        if ($request->image != null) {
            unlink($category->photo_path);
            $imagename = time() . "." . $request->image->extension();
            $request->image->move(public_path("Images/ServiceCategories/"), $imagename);
            $category->photo_path = "Images/ServiceCategories/" . $imagename;
        }

        $category->alt = $request->alt;
        $category->language->name = $request->language;
        $category->language->save();
        $category->title = $request->title;
        $category->name = $request->name;
        $category->save();
        return redirect()->route("admin.services.category.index", $request->language)->with("success", "Your service category updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ServiceCategory $category)
    {
        unlink($category->photo_path);
        $category->language->delete();
        $category->delete();
        return redirect()->back()->with("success", "Your Service Category and all of its subcategories removed successfully");
    }

    // method for activating category
    public function activate(ServiceCategory $category)
    {
        $category->status = 1;
        $category->save();
        return redirect()->back()->with("success", "Service Category  Activated");
    }

    // method for deactiving category
    public function deactive(ServiceCategory $category)
    {
        $category->status = 0;
        $category->save();
        return redirect()->back()->with("success", "Service Category Deactivated");
    }
}
