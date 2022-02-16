<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\Lang;
use Illuminate\Http\Request;

class AdminFaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($lang)
    {
        $languages = Lang::where([["langable_type","App\Models\Faq"],["name",$lang]])->get();
        return view('admin.faq.index',compact(["languages","lang"]));
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
        $faq = new Faq();
        $faq->question = $request->input("question");
        $faq->answer = $request->input("answer");
        $faq->category_id = $request->input("category");
        $faq->meta_keywords = $request->input("meta_keywords");
        $faq->meta_description = $request->input("meta_description");
        $faq->save();

        //new lang
        $language = new Lang();
        $language->name = $request->lang;
        $faq->language()->save($language);

        return redirect()->route('admin.faq.index',$request->lang)->with("success","New Faq was successfuly registered.");
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
        $faq = Faq::findOrFail($id);
        $faq->question = $request->input("question");
        $faq->answer = $request->input("answer");
        $faq->category_id = $request->input("category");
        $faq->meta_keywords = $request->input("meta_keywords");
        $faq->meta_description = $request->input("meta_description");
        $faq->save();

        return redirect()->route('admin.faq.index',$request->lang)->with("success","New Faq was successfuly Updated.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $faq = Faq::findOrFail($id);
        $faq->language()->delete();
        $faq->delete();
        return redirect()->back()->with("success","Faq was successfuly Deleted.");
    }
}
