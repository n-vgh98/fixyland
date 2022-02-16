<?php

namespace App\Http\Controllers\Admin;

use App\Models\Lang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Score;

class AdminScoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($lang)
    {
        $languages = Lang::where([["langable_type", "App\Models\Score"], ["name", $lang]])->get();
        return view("admin.scores.index", compact("languages"));
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
        $lang = new Lang();
        $lang->name = $request->language;
        $score = new Score();
        $score->name = $request->name;
        $score->mode = $request->mode;
        $score->score = $request->score;
        $score->save();
        $score->language()->save($lang);
        return redirect()->route("admin.scores.index", $request->language)->with("success", "Your score made successfully");
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
    public function update(Request $request, Score $score)
    {

        $score->name = $request->name;
        $score->mode = $request->mode;
        $score->score = $request->score;
        $score->language->name = $request->language;
        $score->language->save();
        $score->save();
        return redirect()->route("admin.scores.index", $request->language)->with("success", "Your score updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Score $score)
    {
        $score->language->delete();
        $score->delete();
        return redirect()->back()->with("success", "Service Score  deleted successfully");
    }

    // method for activating score
    public function activate(Score $score)
    {
        $score->status = 1;
        $score->save();
        return redirect()->back()->with("success", "Service Score  Activated");
    }

    // method for deactiving score
    public function deactive(Score $score)
    {
        $score->status = 0;
        $score->save();
        return redirect()->back()->with("success", "Service Score Deactivated");
    }
}
