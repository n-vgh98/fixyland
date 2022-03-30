<?php

namespace App\Http\Controllers\Front;

use App\Models\Lang;
use App\Models\User;
use App\Models\Address;
use App\Models\TechInfo;
use Illuminate\Http\Request;
use App\Models\CoveredAreaCity;
use App\Http\Controllers\Controller;

class FrontSpecialistPanelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($lang)
    {

        return view("front.technician.panel");
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
    public function edit($lang)
    {
        $languages = Lang::where([["name", $lang], ["langable_type", "App\Models\CoveredArea"]])->get();
        $categorylangs = Lang::where([["name", $lang], ["langable_type", "App\Models\ServiceCategory"]])->get();
        return view("front.technician.editprofile", compact("languages", "categorylangs"));
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

    public function updateprofile(Request $request)
    {
        $user = User::find(auth()->user()->id);
        $user->email = $request->email;
        $user->save();
        return redirect()->back()->with("success", "ایمیل شما باموفقیت تغییر کرد");
    }


    public function updateadress(Request $request)
    {
        $address = Address::find(auth()->user()->address->id);
        $address->user_id = auth()->user()->id;
        $city = CoveredAreaCity::where("name", $request->city_id)->first();
        $address->city_id = $city->id;
        $address->state_id = $request->state_id;
        $address->description = $request->address_description;
        $address->save();


        $techinfo = TechInfo::find(auth()->user()->techinfo->id);
        $techinfo->covered_state_id = $request->state_id_expert;
        $city2 = CoveredAreaCity::where("name", $request->city_id_expert)->first();
        $techinfo->covered_city_id = $city2->id;
        $techinfo->save();
        return redirect()->back()->with("success", "ادرس شما باموفقیت تغییر کرد");
    }
}
