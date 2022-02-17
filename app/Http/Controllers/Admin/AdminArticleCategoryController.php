<?php

namespace App\Http\Controllers\Admin;

use App\Models\Lang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ArticleCategory;

class AdminArticleCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($lang)
    {
        $languages = Lang::where([["name",$lang],["langable_type","App\Models\ArticleCategory"]])->get();
        return view('admin.articles.categories.index',compact(["lang","languages"]));
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
        $article_category = new ArticleCategory();
        $article_category->title = $request->input("title");
        if ($request->input('slug')){
            $article_category->slug =make_slug( $request->input('slug'));
        }else{
            $article_category->slug = make_slug($request->input('title'));
        }
        $article_category->meta_keywords = $request->input("meta_keywords");
        $article_category->meta_description = $request->input("meta_description");
        $article_category->save();

         //new lang
         $language = new Lang();
         $language->name = $request->lang;
         $article_category->language()->save($language);
 
         return redirect()->route("admin.article_categories.index",$request->lang)->with("success", "New Category was successfuly registered.");
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
        $article_category = ArticleCategory::findOrFail($id);
        $article_category->title = $request->input("title");
        if ($request->input('slug')){
            $article_category->slug =make_slug( $request->input('slug'));
        }else{
            $article_category->slug = make_slug($request->input('title'));
        }
        $article_category->meta_keywords = $request->input("meta_keywords");
        $article_category->meta_description = $request->input("meta_description");
        $article_category->save();
 
         return redirect()->route("admin.article_categories.index",$request->lang)->with("success", "Category was successfuly Updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article_category = ArticleCategory::findOrFail($id);
        $article_category->language()->delete();
        $article_category->delete();
        return redirect()->back()->with("success", "Category was successfuly Deleted.");    
    }
}
