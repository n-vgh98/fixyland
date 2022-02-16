<?php

namespace App\Http\Controllers\Admin;

use App\Models\Lang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\IndexStatic;

class AdminIndexStaticController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($lang)
    {
        $languages = Lang::where([["langable_type", "App\Models\IndexStatic"], ["name", $lang]])->get();
        return view("admin.decoration.indexpage.statics", compact("languages"));
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
        $static = new IndexStatic();
        $static->title = $request->title;
        $static->value = $request->value;
        $static->save();
        $static->language()->save($lang);
        return redirect()->route("admin.decoration.index.statics.index", $request->language)->with("success", "Your Static saved successfully");
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
        $static = IndexStatic::find($id);
        $static->title = $request->title;
        $static->value = $request->value;
        $static->language->name = $request->language;
        $static->language->save();
        $static->save();
        return redirect()->back()->with("success", "Your static updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(IndexStatic $static)
    {
        $static->language->delete();
        $static->delete();
        return redirect()->back()->with("success", "Your Static removed successfully");
    }


    // method for activating static
    public function activate(IndexStatic $static)
    {

        $static->status = 1;
        $static->save();
        return redirect()->back()->with("success", "static  Activated");
    }

    // method for deactiving static
    public function deactive(IndexStatic $static)
    {
        $static->status = 0;
        $static->save();
        return redirect()->back()->with("success", "static Deactivated");
    }
}
