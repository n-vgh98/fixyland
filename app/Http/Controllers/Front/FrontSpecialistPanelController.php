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
use App\Models\Archive;
use App\Models\FormResult;
use App\Models\Notification;
use App\Models\Order;
use App\Models\OrderAddress;
use App\Models\Process;
use App\Models\Suggestion;
use App\Models\TechnicianPortfolio;
use Carbon\Carbon;
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

    public function offers()
    {
        $tec = Auth::user()->id;
        $tec_info = TechInfo::where("user_id", $tec)->first();
        $city = $tec_info->covered_city_id;
        $state = $tec_info->covered_state_id;
        $tec_skill = SkillUser::where("user_id", $tec)->get();
        $skills = array();
        foreach ($tec_skill as $skill) {
            array_push($skills, $skill->service_sub_categoy_id);
        }
        $orders_services = Order::whereIn("service_id", $skills)->get();
        $orders = array();
        foreach ($orders_services as $order_service) {
            if ($order_service->order_address_id == null) {
                if ($order_service->address->city_id == $city && $order_service->address->state_id == $state) {
                    array_push($orders, $order_service->id);
                }
            }
            if ($order_service->address_id == null) {
                if ($order_service->order_address->city_id == $city && $order_service->order_address->state_id == $state) {
                    array_push($orders, $order_service->id);
                }
            }
        }

        $process_time = Process::where('created_at', '<=', Carbon::now()->subMinutes(5))->delete();

        // dd(Process::where([["status",1],["tech_id", null]])->get());
        $proccess = Process::whereIn("order_id", $orders)->where([["status", 1], ["tech_id", null]])->get();
        // dd($proccess);

        $doing_archives = Archive::where([["tech_id", Auth::user()->id], ["status", 1]])->get();
        $past_archives = Archive::where([["tech_id", Auth::user()->id], ["status", 2]])->get();
        $canceled_archives = Archive::where([["tech_id", Auth::user()->id], ["status", 3]])->get();
        return view("front.technician.workdesk", compact(["proccess", "doing_archives", "past_archives", "canceled_archives"]));
    }

    public function createArchivesProcsess(Request $request)
    {
        $archives = new Archive();
        $archives->tech_id = $request->input("tech_id");
        $archives->order_id = $request->input("order_id");
        $process = Process::where("order_id", $request->order_id)->first();
        $process->status = 2;
        $process->tech_id = Auth::user()->id;
        $process->save();
        $archives->save();
        return redirect()->back()->with("success", "سفارش تایید شد و به لیست سفارشات شما اضاف شد");
    }

    public function changeStatus(Request $request, $id)
    {
        $archives = Archive::findOrFail($id);
        $archives->status = $request->status;
        $archives->save();
        return redirect()->back();
    }

    public function factor(Request $request, $lang, $id)
    {
        $archives = Archive::findOrFail($id);
        $archives->status = $request->status;
        $archives->service_cost = $request->input("service_cost");
        $archives->stuff_cost = $request->input("stuff_cost");
        $archives->transport_cost = $request->input("transport_cost");
        $archives->final_price = $request->input("final_price");
        $archives->save();
        return redirect()->back();
    }
}
