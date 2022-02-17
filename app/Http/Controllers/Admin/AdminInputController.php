<?php

namespace App\Http\Controllers\Admin;

use App\Models\Form;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Input;

class AdminInputController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

        if ($request->input_type == 0 && $request->option_1 != null) {
            return redirect()->back()->with("fail", "You cant make text question with option");
        } else {
            $question = new Input();
            $question->form_id = $request->form_id;
            $question->input_type = $request->input_type;
            $question->label = $request->label;
            // for adding options without error
            global $x;
            $x = 1;
            $option = "option" . $x;
            while ($x < 21) {
                if ($request->$option != null) {
                    $question->$option = $request->$option;
                }
                $x++;
            }
            $question->save();
            return redirect()->back()->with("success", "Your question made successfully");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Form $form)
    {
        return view("admin.forms.questions.show", compact("form"));
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
    public function update(Request $request, Input $question)
    {
        if ($request->input_type == 0 && $request->option_1 != null) {
            return redirect()->back()->with("fail", "You cant make text question with option");
        } else {
            $question->form_id = $request->form_id;
            $question->input_type = $request->input_type;
            $question->label = $request->label;
            // for adding options without error
            global $x;
            $x = 1;
            $option = "option" . $x;
            while ($x < 21) {
                if ($request->$option != null) {
                    $question->$option = $request->$option;
                }
                $x++;
            }
            $question->save();
            return redirect()->back()->with("success", "Your question updated successfully");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Input $question)
    {
        $question->delete();
        return redirect()->back()->with("success", "Your question removed successfully");
    }

    public function activate(input $question)
    {

        $question->status = 1;
        $question->save();
        return redirect()->back()->with("success", "question  Activated");
    }

    // method for deactiving sliderimage
    public function deactive(input $question)
    {
        $question->status = 0;
        $question->save();
        return redirect()->back()->with("success", "question  Deactivated");
    }
}
