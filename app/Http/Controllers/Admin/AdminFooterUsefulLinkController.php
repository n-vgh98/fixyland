<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FooterLink;
use App\Models\Lang;
use Illuminate\Http\Request;

class AdminFooterUsefulLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($lang)
    {
        $languages = Lang::where([["langable_type","App\Models\FooterLink"],["name",$lang]])->get();
        return view("admin.footer.useful_links.index",compact(["languages","lang"]));
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
        $footer_link = new FooterLink();
        $footer_link->name = $request->input("name");
        $footer_link->url = $request->input("url");
        $footer_link->save();

        //new language
        $language = new Lang();
        $language->name = $request->lang;
        $footer_link->language()->save($language);

        return redirect()->route("admin.footer_useful_links.index",$request->lang)->with("success","New Link Was Successfuly Registerd.");
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
        $footer_link = FooterLink::findOrFail($id);
        $footer_link->name = $request->input("name");
        $footer_link->url = $request->input("url");
        $footer_link->save();
        return redirect()->route("admin.footer_useful_links.index",$request->lang)->with("success","Link Was Successfuly Updated.");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $footer_link = FooterLink::findOrFail($id);
        $footer_link->language()->delete();
        $footer_link->delete();
        return redirect()->back()->with("success","Link Was Successfuly Deleted.");
    }
}
