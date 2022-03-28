<?php

namespace App\Http\Controllers\Front;

use App\Models\Lang;
use App\Models\User;
use App\Models\Address;
use Illuminate\Http\Request;
use App\Models\CoveredAreaCity;
use App\Http\Controllers\Controller;
use App\Models\InformationPhoto;
use App\Models\ServiceSubCategory;
use App\Models\SkillUser;
use App\Models\TechInfo;
use Illuminate\Support\Facades\Hash;

class FrontSpecialistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($lang)
    {
        $languages = Lang::where([["name", $lang], ["langable_type", "App\Models\CoveredArea"]])->get();
        $categorylangs = Lang::where([["name", $lang], ["langable_type", "App\Models\ServiceCategory"]])->get();
        return view("front.auth.register.signup.specialist", compact("languages", "categorylangs"));
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

        if ($request->city_id == "لطفا شهر خود را انتخاب کنید" || $request->city_id_expert == "لطفا شهر خود را انتخاب کنید") {
            return redirect()->back()->with("fail", "لطفا شهر خود را انتخاب کنید");
        } else {
            $user = new User();
            $users =  User::all();
            $user->firstname = $request->firstname;
            $user->lastname = $request->lastname;
            $user->email = $request->email;
            $user->role_name = "technician";
            $user->password = Hash::make($request->password);
            $user->phone = $request->phone;
            $user->code = count($users) + 3;
            $user->save();

            // making address
            $address = new Address();
            $address->user_id = $user->id;
            $city = CoveredAreaCity::where("name", $request->city_id)->first();
            $address->city_id = $city->id;
            $address->state_id = $request->state_id;
            $address->save();


            // making techinfo
            $techinfo = new TechInfo();
            $techinfo->user_id = $user->id;
            $techinfo->covered_state_id = $request->state_id_expert;
            $city2 = CoveredAreaCity::where("name", $request->city_id_expert)->first();
            $techinfo->covered_city_id = $city2->id;
            $techinfo->citizen_code = $request->citizen_code;
            $techinfo->postal_code = $request->postal_code;
            $techinfo->pelak = $request->pelak;
            if ($request->health[0] == "yes") {
                $techinfo->health_status = 1;
            } else {
                $techinfo->health_status = 0;
                $techinfo->health_description = $request->health_description;
            }
            $techinfo->birthday = $request->birth;
            $techinfo->gender = $request->gender[0];
            $techinfo->status = 0;
            $techinfo->save();




            // uploading tech photoes

            // govahi image
            if ($request->govahi_photo !== null) {
                $govahi = new InformationPhoto();
                $govahi->user_id = $user->id;
                $imagename = time() . "." . $request->govahi_photo->extension();
                $request->govahi_photo->move(public_path("Images/techinfo/govahi/"), $imagename);
                $govahi->path = "Images/techinfo/govahi/" . $imagename;
                $govahi->name = "govahi";
                $govahi->save();
            } else {
                return redirect()->back()->with("fail", "لطفا عکس گواهی خود را اپلود کنید");
            }

            // idenity image
            if ($request->idenity_photo !== null) {
                $idenity = new InformationPhoto();
                $idenity->user_id = $user->id;
                $imagename = time() . "." . $request->idenity_photo->extension();
                $request->idenity_photo->move(public_path("Images/techinfo/idenity/"), $imagename);
                $idenity->path = "Images/techinfo/idenity/" . $imagename;
                $idenity->name = "idenity";
                $idenity->alt = $request->alt;
                $idenity->title = $request->title;
                $idenity->save();
            } else {
                return redirect()->back()->with("fail", "لطفا عکس گواهی خود را اپلود کنید");
            }

            // saving skills

            foreach ($request->skill_id as $skill) {
                $expertskill = new SkillUser();
                $expertskill->user_id = $user->id;
                $skillsubcategory = ServiceSubCategory::find($skill);
                $expertskill->service_categoy_id = $skillsubcategory->category->id;
                $expertskill->service_sub_categoy_id = $skill;
                $expertskill->save();
            }

            return redirect()->route("user.login");
        }
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
}
