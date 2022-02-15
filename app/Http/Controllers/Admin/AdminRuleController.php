<?php

namespace App\Http\Controllers\Admin;

use App\Models\Lang;
use App\Models\Rule;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminRuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($lang)
    {
        $languages = Lang::where([["langable_type","App\Models\Rule"],["name",$lang]])->get();
        return view('admin.rules.index',compact(["languages","lang"]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($lang)
    {
        return view('admin.rules.create',compact("lang"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = new Rule();
        $rules->text_1 = $request->input('text_1');
        $rules->text_2 = $request->input('text_2');
        $rules->text_3 = $request->input('text_3');
        $rules->text_4 = $request->input('text_4');
        $rules->text_5 = $request->input('text_5');
        $rules->save();

        //new lang
        $language = new Lang();
        $language->name = $request->lang;
        $rules->language()->save($language);

        return redirect()->route('admin.rules.index',$request->lang)->with("success","Rules was successfuly registered.");
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
        $rules = Rule::findOrFail($id);
        return view('admin.rules.edit',compact('rules'));
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
        $rules = Rule::findOrFail($id);
        $rules->text_1 = $request->input('text_1');
        $rules->text_2 = $request->input('text_2');
        $rules->text_3 = $request->input('text_3');
        $rules->text_4 = $request->input('text_4');
        $rules->text_5 = $request->input('text_5');
        $rules->save();
        return redirect()->route('admin.rules.index',$rules->language->name)->with('success','Rules Was Successfuly Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rules = Rule::findOrFail($id);
        $rules->language()->delete();
        $rules->delete();
        return redirect()->back()->with("success","Rules Was Successfuly Deleted");
    }
}
