<?php

namespace App\Http\Controllers\Front;

use App\Models\Lang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontHomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($lang)
    {

        $adlanguages = Lang::where([["name", $lang], ["langable_type", "App\Models\Advertisment"]])->get();
        $staticlanguages = Lang::where([["name", $lang], ["langable_type", "App\Models\IndexStatic"]])->get();
        $catlanguages = Lang::where([["name", $lang], ["langable_type", "App\Models\ServiceCategory"]])->get();
        $index_articles = Lang::where([["name","$lang"],["langable_type","App\Models\Article"]])->get();
        return view("front.index", compact("adlanguages", "staticlanguages", "catlanguages","index_articles"));
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
        //
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


    public function register()
    {
        if (auth()->check()) {
            return redirect()->route("user.home");
        } else {
            return view("front.auth.register.register");
        }
    }

    public function login()
    {
        if (auth()->check()) {
            return redirect()->route("user.home");
        } else {
            return view("front.auth.login");
        }
    }
}
