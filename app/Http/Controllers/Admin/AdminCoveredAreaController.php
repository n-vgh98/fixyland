<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CoveredArea;
use App\Models\Lang;
use Illuminate\Http\Request;

class AdminCoveredAreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($lang)
    {
        $languages = Lang::Where([["name",$lang],["langable_type","App\Models\CoveredArea"]])->get();
        return view("admin.covered_area.states",compact(["languages","lang"]));
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
        $state = new CoveredArea();
        $state->name = $request->name;
        $state->save();

        //new languages
        $language = new Lang();
        $language->name = $request->lang;
        $state->language()->save($language);

        return redirect()->route("admin.covered_state.index",$request->lang)->with("success","New State Was Successfuly Registered.");
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
        $state = CoveredArea::findOrFail($id);
        $state->name = $request->name;
        $state->save();
        return redirect()->route("admin.covered_state.index",$request->lang)->with("success","New State Was Successfuly Updated.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $state = CoveredArea::findOrFail($id);
        $state->language()->delete();
        $state->delete();
        
        return redirect()->back()->with("success","State Was Successfuly Deleted");
    }
}
