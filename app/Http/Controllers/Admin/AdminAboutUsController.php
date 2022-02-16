<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Models\Lang;
use Illuminate\Http\Request;

class AdminAboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($lang)
    {
        $languages = Lang::where([["name",$lang],["langable_type","App\Models\AboutUs"]])->get();
        return view('admin.about_us.index',compact(["languages","lang"]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($lang)
    {
        return view('admin.about_us.create', compact("lang"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $about_us = new AboutUs();
        $imagename = time() . "." . $request->photo_path->extension();
        $request->photo_path->move(public_path("Images/about_us/"), $imagename);
        $about_us->photo_path = "Images/about_us/" . $imagename;
        $about_us->description = $request->input("description");
        $about_us->photo_alt = $request->input("photo_alt");
        $about_us->photo_name = $request->input("photo_name");
        $about_us->meta_keywords = $request->input("meta_keywords");
        $about_us->meta_description = $request->input("meta_description");
        $about_us->save();

        //new lang
        $language = new Lang();
        $language->name = $request->lang;
        $about_us->language()->save($language);

        return redirect()->route("admin.about_us.index",$request->lang)->with("success", "About Us was successfuly registered.");
        
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
        $about_us = AboutUs::findOrFail($id);
        return view('admin.about_us.edit',compact('about_us'));
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
        $about_us = AboutUs::findOrFail($id);
        if ($request->photo_path != null) {
            unlink($about_us->photo_path);
            $imagename = time() . "." . $request->photo_path->extension();
            $request->photo_path->move(public_path("Images/about_us/"), $imagename);
            $about_us->photo_path = "Images/about_us/" . $imagename;
        }
        $about_us->description = $request->input("description");
        $about_us->photo_alt = $request->input("photo_alt");
        $about_us->photo_name = $request->input("photo_name");
        $about_us->meta_keywords = $request->input("meta_keywords");
        $about_us->meta_description = $request->input("meta_description");
        $about_us->save();

        return redirect()->route('admin.about_us.index',$about_us->language->name)->with('success','About Us Was Successfuly Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $about_us = AboutUs::findOrFail($id);
        unlink($about_us->photo_path);
        $about_us->language()->delete();
        $about_us->delete();
        
        return redirect()->back()->with("success","About Us Was Successfully Deleted");
    }
}
