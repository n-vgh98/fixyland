<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FooterInfo;
use App\Models\Lang;
use Illuminate\Http\Request;

class AdminFooterInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($lang)
    {
        $languages = Lang::where([["langable_type","App\Models\FooterInfo"],["name",$lang]])->get();
        return view("admin.footer.information.index",compact(["languages","lang"]));
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
        $footer_info = new FooterInfo();
        $footer_info->address = $request->input("address");
        $footer_info->phone_number = $request->input("phone_number");
        $footer_info->mobile_number = $request->input("mobile_number");
        $footer_info->facebook_link = $request->input("facebook_link");
        $footer_info->linkedin_link = $request->input("linkedin_link");
        $footer_info->instagram_link = $request->input("instagram_link");
        $footer_info->email_link = $request->input("email_link");
        $footer_info->save();

        //new lang
        $language = new Lang();
        $language->name = $request->lang;
        $footer_info->language()->save($language);

        return redirect()->route("admin.footer_info.index",$request->lang)->with("success","New Information Was Successfuly Registerd.");
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
        $footer_info = FooterInfo::findOrFail($id);
        $footer_info->address = $request->input("address");
        $footer_info->phone_number = $request->input("phone_number");
        $footer_info->mobile_number = $request->input("mobile_number");
        $footer_info->facebook_link = $request->input("facebook_link");
        $footer_info->linkedin_link = $request->input("linkedin_link");
        $footer_info->instagram_link = $request->input("instagram_link");
        $footer_info->email_link = $request->input("email_link");
        $footer_info->save();

        return redirect()->route("admin.footer_info.index",$request->lang)->with("success","Information Was Successfuly Updated.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $footer_info = FooterInfo::findOrFail($id);
        $footer_info->language()->delete();
        $footer_info->delete();
        return redirect()->back()->with("success","Information Was Successfuly Deleted.");
    }
}
