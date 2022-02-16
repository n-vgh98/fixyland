<?php

namespace App\Http\Controllers\Admin;

use App\Models\Lang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\IndexSlider;

class AdminIndexSliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($lang)
    {
        $languages = Lang::where([["langable_type", "App\Models\IndexSlider"], ["name", $lang]])->get();
        return view("admin.decoration.indexpage.slider", compact("languages"));
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
        $slider = new IndexSlider();
        $imagename = time() . "." . $request->image->extension();
        $request->image->move(public_path("Images/Decoration/IndexSlider/"), $imagename);
        $slider->photo_path = "Images/Decoration/IndexSlider/" . $imagename;
        $slider->alt = $request->alt;
        $slider->title = $request->title;
        $slider->save();
        $slider->language()->save($lang);
        return redirect()->route("admin.decoration.index.slider.index", $request->language)->with("success", "Your Slider image saved successfully");
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
        $slider = IndexSlider::find($id);
        if ($request->image != null) {
            unlink($slider->photo_path);
            $imagename = time() . "." . $request->image->extension();
            $request->image->move(public_path("Images/Decoration/IndexSlider/"), $imagename);
            $slider->photo_path = "Images/Decoration/IndexSlider/" . $imagename;
        }

        $slider->alt = $request->alt;
        $slider->language->name = $request->language;
        $slider->language->save();
        $slider->title = $request->title;
        $slider->save();
        return redirect()->back()->with("success", "Your Slider image updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(IndexSlider $slider)
    {
        unlink($slider->photo_path);
        $slider->language->delete();
        $slider->delete();
        return redirect()->back()->with("success", "Your slider image removed successfully");
    }


    // method for activating sliderimage
    public function activate(IndexSlider $slider)
    {

        $slider->status = 1;
        $slider->save();
        return redirect()->back()->with("success", "slider image  Activated");
    }

    // method for deactiving sliderimage
    public function deactive(IndexSlider $slider)
    {
        $slider->status = 0;
        $slider->save();
        return redirect()->back()->with("success", "slider image Deactivated");
    }
}
