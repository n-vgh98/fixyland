<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\Lang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($lang)
    {
        $languages = Lang::where([["langable_type","App\Models\Article"],["name",$lang]])->get();
        return view('admin.articles.index',compact(["languages","lang"]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($lang)
    {
        $languages = Lang::where([["langable_type", "App\Models\ArticleCategory"], ["name", $lang]])->get();
        $categories = array();
        foreach ($languages as $language) {
            array_push($categories, $language->langable);
        }
        return view('admin.articles.create', compact(['lang', 'languages', 'categories']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $article = new Article();
        $article->title = $request->input("title");
        if($request->input("slug")){
            $article->slug =make_slug($request->input("slug"));
        }else{
            $article->slug =make_slug($request->input("title"));
        }
        $article->category_id = $request->input("category");
        $article->status = $request->input("status");
        $article->v_link_1 = $request->input("v_link_1");
        $article->v_link_2 = $request->input("v_link_2");
        $imagename = time() . "." . $request->photo_path->extension();
        $request->photo_path->move(public_path("Images/articles/$article->title/"), $imagename);
        $article->photo_path = "Images/articles/$article->title/" . $imagename;
        $article->photo_alt = $request->input("photo_alt");
        $article->photo_name = $request->input("photo_name");
        $article->meta_keywords = $request->input("meta_keywords");
        $article->meta_description = $request->input("meta_description");
        $article->text_1 = $request->input("text_1");
        $article->text_2 = $request->input("text_2");
        $article->text_3 = $request->input("text_3");
        $article->user_id = Auth::id();
        $article->save();

        //new lang
         //new lang
         $language = new Lang();
         $language->name = $request->lang;
         $article->language()->save($language);
 
         return redirect()->route("admin.articles.index",$request->lang)->with("success", "Article was successfuly registered.");
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
    public function edit($id,$lang)
    {
      $article = Article::findOrFail($id);
      $languages = Lang::where([["langable_type","App\Models\ArticleCategory"],["name",$lang]])->get();
      $categories = array();
      foreach ($languages as $language) {
        array_push($categories, $language->langable);
      }
      return view('admin.articles.edit',compact(["article","categories"]));

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
        $article = Article::findOrFail($id);
        $article->title = $request->input("title");
        if($request->input("slug")){
            $article->slug =make_slug($request->input("slug"));
        }else{
            $article->slug =make_slug($request->input("title"));
        }
        $article->category_id = $request->input("category");
        $article->status = $request->input("status");
        $article->v_link_1 = $request->input("v_link_1");
        $article->v_link_2 = $request->input("v_link_2");
        if ($request->photo_path != null) {
            unlink($article->photo_path);
            $imagename = time() . "." . $request->photo_path->extension();
            $request->photo_path->move(public_path("Images/articles/$article->title/"), $imagename);
            $article->photo_path = "Images/articles/$article->title/" . $imagename;
        }
        $article->photo_alt = $request->input("photo_alt");
        $article->photo_name = $request->input("photo_name");
        $article->meta_keywords = $request->input("meta_keywords");
        $article->meta_description = $request->input("meta_description");
        $article->text_1 = $request->input("text_1");
        $article->text_2 = $request->input("text_2");
        $article->text_3 = $request->input("text_3");
        $article->user_id = Auth::id();
        $article->save();
        return redirect()->route("admin.articles.index",$request->lang)->with("success", "Article was successfuly updated.");



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        unlink($article->photo_path);
        $article->language()->delete();
        $article->delete();
        return redirect()->back()->with("success","Article Was successfuly Deleted.");
    }
}
