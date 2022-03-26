<?php

namespace App\Http\Controllers\Front;

use App\Models\Lang;
use App\Models\User;
use App\Models\CoveredArea;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\CoveredAreaCity;
use Illuminate\Support\Facades\Hash;

class FrontUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($lang)
    {
        $languages = Lang::where([["name", $lang], ["langable_type", "App\Models\CoveredArea"]])->get();
        return view("front.auth.register.signup.user", compact("languages"));
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

        $user = new User();
        $user->firstname = $request->first_name;
        $user->lastname = $request->last_name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->role_name = "user";
        $user->password = Hash::make($request->password);
        $user->code = Hash::make($request->email);
        $user->save();
        $address = new Address();
        $address->user_id = $user->id;
        $city = CoveredAreaCity::where("name", $request->city_id)->first();
        $address->city_id = $city->id;
        $address->state_id = $request->state_id;
        $address->save();
        return redirect()->route("user.login");
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

    public function getcity(Request $request)
    {
        $state = CoveredArea::find($request->city_id);
        $cities = $state->cities;
        return response()->json(['cities' => $cities]);
    }
}
