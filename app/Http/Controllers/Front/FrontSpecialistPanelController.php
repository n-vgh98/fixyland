<?php

namespace App\Http\Controllers\Front;

use App\Models\Lang;
use App\Models\User;
use App\Models\Address;
use App\Models\BankInfo;
use App\Models\TechInfo;
use App\Models\SkillUser;
use Illuminate\Http\Request;
use App\Models\CoveredAreaCity;
use App\Models\ServiceSubCategory;
use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\TechnicianPortfolio;
use Illuminate\Support\Facades\Auth;

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

    public function changepassword()
    {

        return view("front.technician.changepassword");
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



    public function updateskill(Request $request)
    {
        if (count(auth()->user()->skills) > 0) {
            // get all skills
            $allskills = [];
            foreach (auth()->user()->skills as $sk) {
                array_push($allskills, $sk->service_sub_categoy_id);
            }

            if (in_array($request->skill_id, $allskills)) {
                $expertskill = SkillUser::where([["user_id", auth()->user()->id], ["service_sub_categoy_id", $request->skill_id]])->first();
                $expertskill->delete();
                return redirect()->back()->with("fail", "حذف شد");
            } else {
                $expertskill = new SkillUser();
                $expertskill->user_id = auth()->user()->id;
                $skillsubcategory = ServiceSubCategory::find($request->skill_id);
                $expertskill->service_categoy_id = $skillsubcategory->category->id;
                $expertskill->service_sub_categoy_id = $request->skill_id;
                $expertskill->save();
                return redirect()->back()->with("success", "اضافه شد");
            }
        } else {
            $expertskill = new SkillUser();
            $expertskill->user_id = auth()->user()->id;
            $skillsubcategory = ServiceSubCategory::find($request->skill_id);
            $expertskill->service_categoy_id = $skillsubcategory->category->id;
            $expertskill->service_sub_categoy_id = $request->skill_id;
            $expertskill->save();
            return redirect()->back()->with("success", "اضافه شد");
        }
    }

    public function updatebankinfo(Request $request)
    {
        // saving bank accounts
        $bank = BankInfo::find(auth()->user()->bankinfo->id);
        $bank->user_id = auth()->user()->id;
        $bank->account_number = $request->account_number;
        $bank->credit_card = $request->credit_card;
        $bank->save();
        return redirect()->back()->with("success", "بانک شما باموفقیت تغییر کرد");
    }

    public function deleteporfolio(Request $request,)
    {
        // saving bank accounts
        $port = TechnicianPortfolio::find($request->pid);
        unlink($port->path);
        $port->delete();
        return redirect()->back()->with("success", "نمونه کار شما باموفقیت حذف شد");
    }

    public function addporfolio(Request $request,)
    {
        // saving bank accounts
        $port = new TechnicianPortfolio();
        $port->user_id = auth()->user()->id;
        $port->name = "نمونه کار";
        $port->alt = "نمونه کار";
        $port->description = $request->description;
        $imagename = time() . "." . $request->image->extension();
        $request->image->move(public_path("Images/portfolios/"), $imagename);
        $port->path = "Images/portfolios/" . $imagename;
        $port->save();
        return redirect()->back()->with("success", "نمونه کار شما باموفقیت اضافه شد");
    }

    public function notification()
    {
        $notifications = Notification::Where([["mode", 0], ["receivers", "Technicians"]])->get();
        $pnotifications = Notification::where([["mode", 1], ["receiver_id", Auth::user()->id]])->get();
        return view("front.technician.notification", compact("notifications", "pnotifications"));
    }

    
}
