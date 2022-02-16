<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FaqCategory;
use App\Models\Lang;
use Illuminate\Http\Request;

class AdminFaqCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($lang)
    {
        $languages = Lang::where([["name",$lang],["langable_type","App\Models\FaqCategory"]])->get();
        return view('admin.faq.categories.index',compact(["lang","languages"]));
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
        $faq_category = new FaqCategory();
        $faq_category->title = $request->input("title");
        if ($request->input('slug')){
            $faq_category->slug =make_slug( $request->input('slug'));
        }else{
            $faq_category->slug = make_slug($request->input('title'));
        }
        $faq_category->meta_keywords = $request->input("meta_keywords");
        $faq_category->meta_description = $request->input("meta_description");
        $faq_category->save();

         //new lang
         $language = new Lang();
         $language->name = $request->lang;
         $faq_category->language()->save($language);
 
         return redirect()->route("admin.faq_categories.index",$request->lang)->with("success", "New Category was successfuly registered.");
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
        $faq_category = FaqCategory::findOrFail($id);
        $faq_category->title = $request->input("title");
        if ($request->input('slug')){
            $faq_category->slug =make_slug( $request->input('slug'));
        }else{
            $faq_category->slug = make_slug($request->input('title'));
        }
        $faq_category->meta_keywords = $request->input("meta_keywords");
        $faq_category->meta_description = $request->input("meta_description");
        $faq_category->save();

        return redirect()->route("admin.faq_categories.index",$request->lang)->with("success", "Category was successfuly Updated.");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $faq_category = FaqCategory::findOrFail($id);
        $faq_category->language()->delete();
        $faq_category->delete();
        return redirect()->back()->with("success", "Category was successfuly Deleted.");    
    }
}
