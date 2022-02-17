<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactUsText;
use App\Models\Lang;
use Illuminate\Http\Request;

class AdminContactUsTextController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($lang)
    {
        $languages = Lang::where([["langable_type","App\Models\ContactUsText"],["name",$lang]])->get();
        return view('admin.contact_us.texts.index',compact(["languages","lang"]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($lang)
    {
        return view('admin.contact_us.texts.create',compact("lang"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $contact_text = new ContactUsText();
        $contact_text->title_1 = $request->input("title_1");
        $contact_text->text_1 = $request->input("text_1");
        $contact_text->title_2 = $request->input("title_2");
        $contact_text->text_2 = $request->input("text_2");
        $contact_text->title_3 = $request->input("title_3");
        $contact_text->text_3 = $request->input("text_3");
        $contact_text->save();

        //new lang
        $language = new Lang();
        $language->name = $request->lang;
        $contact_text->language()->save($language);

        return redirect()->route('admin.contact_us.texts.index',$request->lang)->with("success","Contact Us Text Was Successfuly Registerd.");

      
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
        $contact_text = ContactUsText::findOrFail($id);
        return view('admin.contact_us.texts.edit',compact("contact_text"));
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
        $contact_text = ContactUsText::findOrFail($id);
        $contact_text->title_1 = $request->input("title_1");
        $contact_text->text_1 = $request->input("text_1");
        $contact_text->title_2 = $request->input("title_2");
        $contact_text->text_2 = $request->input("text_2");
        $contact_text->title_3 = $request->input("title_3");
        $contact_text->text_3 = $request->input("text_3");
        $contact_text->save();
        return redirect()->route('admin.contact_us.texts.index',$request->lang)->with("success","Contact Us Text Was Successfuly Updated.");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact_text = ContactUsText::findOrFail($id);
        $contact_text->language()->delete();
        $contact_text->delete();
        return redirect()->back()->with("success","Contact Us Text Was Successfuly Updated.");
    }
}
