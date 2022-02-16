<?php

namespace App\Http\Controllers\Admin;

use App\Models\Lang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\IndexFeature;

class AdminIndexFeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($lang)
    {
        $languages = Lang::where([["langable_type", "App\Models\IndexFeature"], ["name", $lang]])->get();
        return view("admin.decoration.indexpage.features", compact("languages"));
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
        $feature = new IndexFeature();
        $imagename = time() . "." . $request->image->extension();
        $request->image->move(public_path("Images/Decoration/IndexFeature/"), $imagename);
        $feature->photo_path = "Images/Decoration/IndexFeature/" . $imagename;
        $feature->alt = $request->alt;
        $feature->title = $request->title;
        $feature->card_text = $request->card_text;
        $feature->card_title = $request->card_title;
        $feature->save();
        $feature->language()->save($lang);
        return redirect()->route("admin.decoration.index.features.index", $request->language)->with("success", "Your feature saved successfully");
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
        $feature = IndexFeature::find($id);
        if ($request->image != null) {
            unlink($feature->photo_path);
            $imagename = time() . "." . $request->image->extension();
            $request->image->move(public_path("Images/Decoration/IndexFeature/"), $imagename);
            $feature->photo_path = "Images/Decoration/IndexFeature/" . $imagename;
        }

        $feature->alt = $request->alt;
        $feature->language->name = $request->language;
        $feature->language->save();
        $feature->title = $request->title;
        $feature->card_text = $request->card_text;
        $feature->card_title = $request->card_title;
        $feature->save();
        return redirect()->back()->with("success", "Your Feature image updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(IndexFeature $feature)
    {
        unlink($feature->photo_path);
        $feature->language->delete();
        $feature->delete();
        return redirect()->back()->with("success", "Your feature removed successfully");
    }

    // method for activating sliderimage
    public function activate(IndexFeature $feature)
    {

        $feature->status = 1;
        $feature->save();
        return redirect()->back()->with("success", "Feature  Activated");
    }

    // method for deactiving sliderimage
    public function deactive(IndexFeature $feature)
    {
        $feature->status = 0;
        $feature->save();
        return redirect()->back()->with("success", "Feature Deactivated");
    }
}
