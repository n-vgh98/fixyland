<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Advertisment;
use App\Models\Notification;
use Illuminate\Http\Request;

class AdminAdvertismentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ads = Advertisment::all();
        return view("admin.ads.index", compact("ads"));
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

        $ad = new Advertisment();
        $imagename = time() . "." . $request->image->extension();
        $request->image->move(public_path("Images/Advertisments/"), $imagename);
        $ad->photo_path = "Images/Advertisments/" . $imagename;
        $ad->alt = $request->alt;
        $ad->title = $request->title;
        $ad->save();
        return redirect()->back()->with("success", "Your Ad saved successfully");
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
        $ad = Advertisment::find($id);
        if ($request->image != null) {
            unlink($ad->photo_path);
            $imagename = time() . "." . $request->image->extension();
            $request->image->move(public_path("Images/Advertisments/"), $imagename);
            $ad->photo_path = "Images/Advertisments/" . $imagename;
        }
        $ad->alt = $request->alt;
        $ad->title = $request->title;
        $ad->save();
        return redirect()->back()->with("success", "Your Ad updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Advertisment $ads)
    {
        unlink($ads->photo_path);
        $ads->delete();
        return redirect()->back()->with("success", "Your Ad removed successfully");
    }
}
