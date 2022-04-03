<?php

namespace App\Http\Controllers\Front;

use App\Models\Lang;
use App\Models\User;
use App\Models\Address;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CoveredAreaCity;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class FrontUserPanelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("front.User.panel");
    }

    public function showpasschange()
    {
        return view("front.User.changepassword");
    }

    public function passchange(Request $request)
    {
        $user = User::find(auth()->user()->id);
        if ($request->password == $request->password_confirm) {
            $user->password = Hash::make($request->password);
            $user->save();
            return redirect()->route("user.login");
        } else {
            return redirect()->back()->with("success", "رمز عبور شما یکی نیست");
        }
    }

    public function picturechange(Request $request)
    {
        $user = User::find(auth()->user()->id);
        $user->updateProfilePhoto($request->profile_pic);
        $user->save();
        return redirect()->back();
    }


    public function editprofile($lang)
    {
        $languages = Lang::where([["name", $lang], ["langable_type", "App\Models\CoveredArea"]])->get();
        return view("front.User.edit", compact("languages"));
    }

    public function updateprofile(Request $request)
    {
        $user = User::find(auth()->user()->id);
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->save();
        $address = Address::find(auth()->user()->address->id);
        $address->state_id = $request->state_id;
        $city = CoveredAreaCity::where("name", $request->city_id)->first();
        $address->city_id = $city->id;
        $address->description = $request->description;
        $address->save();
        return redirect()->back()->with("success", "اطلاعات شما ویرایش شد");
    }


    public function favorittech()
    {
        return view("front.User.favorittech");
    }

    public function  techinfo($lang, $id)
    {
        $user = User::find($id);
        return view("front.User.speciinfo", compact("user"));
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

    public function notifications()
    {
       $notifications = Notification::where([["mode", 0],["receivers","Customers"]])->get();
       $pnotifications = Notification::where([["mode", 1],["receiver_id",Auth::user()->id]])->get();
       return view("front.User.notification",compact(["notifications","pnotifications"])); 
    }
}
