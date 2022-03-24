<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use App\Models\Lang;
use Illuminate\Http\Request;

class FrontContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($lang)
    {
        $languages = Lang::where([["name",$lang],["langable_type","App\Models\ContactUsText"]])->first();
        $contact_us = $languages->langable;
        return view("front.contact_us",compact(["lang","contact_us"]));
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
        $contact_us = new ContactUs();
        $contact_us->email = $request->input("email");
        $contact_us->request_title = $request->input("request_title");
        $contact_us->request_description = $request->input("request_description");
       
        $contact_us->save();

        if(app()->getlocale() == "ar"){
            return redirect()->back()->with("success","پیام شما با موقفقیت ثبت شد.");
        }
        else{
            return redirect()->back()->with("success","Your Message is successfuly registered");
        }
        

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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
