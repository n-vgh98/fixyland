<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ServiceSubcategoryDescription;

class AdminSubCategoryServiceDescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view("admin.services.subcategory.createdescriptions", compact("id"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $desc = new ServiceSubcategoryDescription();
        $desc->subcategory_id = $request->category_id;
        $desc->text_1 = $request->text_1;
        $desc->text_2 = $request->text_2;
        $desc->text_3 = $request->text_3;
        $desc->save();
        return redirect()->route("admin.services.subcategory.index")->with("success", "your description made for this service");
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
        $desc = ServiceSubcategoryDescription::find($id);
        return view("admin.services.subcategory.editdescriptions", compact("desc"));
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
        $desc = ServiceSubcategoryDescription::find($id);
        $desc->text_1 = $request->text_1;
        $desc->text_2 = $request->text_2;
        $desc->text_3 = $request->text_3;
        $desc->save();
        return redirect()->route("admin.services.subcategory.index")->with("success", "your description updated for this service");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
