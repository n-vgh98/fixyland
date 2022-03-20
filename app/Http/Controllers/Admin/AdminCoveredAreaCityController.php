<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CoveredAreaCity;
use App\Models\Lang;
use Illuminate\Http\Request;

class AdminCoveredAreaCityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($lang)
    {
        $languages = Lang::where([["name",$lang],["langable_type","App\models\CoveredAreaCity"]])->get();
        return view("admin.covered_area.cities",compact(["languages","lang"]));
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
        $city = new CoveredAreaCity();
        $city->name = $request->name;
        $city->state_id = $request->state;
        $city->save();
        
        //new lang
        $language = new Lang();
        $language->name = $request->lang;
        $city->language()->save($language);

        return redirect()->route("admin.covered_city.index",$request->lang)->with("success","City Was Successfuly Registered.");
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
        $city = CoveredAreaCity::findOrFail($id);
        $city->name = $request->name;
        $city->state_id = $request->state;
        $city->save();

        return redirect()->route("admin.covered_city.index",$request->lang)->with("success","City Was Successfuly Updated.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $city = CoveredAreaCity::findOrFail($id);
        $city->language()->delete();
        $city->delete();
        return redirect()->back()->with("success","City Was Successfuly Ddeleted.");
    }
}
