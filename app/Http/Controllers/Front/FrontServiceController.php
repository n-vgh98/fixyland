<?php

namespace App\Http\Controllers\Front;

use App\Models\Form;
use App\Models\Lang;
use App\Models\User;
use App\Models\Order;
use App\Models\Process;
use App\Models\FormResult;
use App\Models\OrderImage;
use App\Models\Suggestion;
use App\Models\OrderAddress;
use Illuminate\Http\Request;
use App\Models\CoveredAreaCity;
use App\Models\ServiceSubCategory;
use App\Http\Controllers\Controller;
use App\Models\Address;
use Illuminate\Foundation\Http\FormRequest;

class FrontServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function description($lang, $id)
    {
        $service = ServiceSubCategory::find($id);

        if ($service->description != null) {
            return view("front.services.description", compact("service"));
        } else {
            return redirect()->route("user.service.form", $service->id);
        }
    }

    public function form($lang, $id)
    {
        $languages = Lang::where([["name", $lang], ["langable_type", "App\Models\CoveredArea"]])->get();
        $service = ServiceSubCategory::find($id);
        if ($service->form != null) {
            return view("front.services.form", compact("service", "languages"));
        } else {
            return redirect()->back();
        }
    }


    public function resultsave($lang, Request $request)
    {
        if ($request->city_id != null || $request->address_description) {
            $address = new OrderAddress();
            $address->user_id = auth()->user()->id;
            $city = CoveredAreaCity::where("name", $request->city_id)->first();
            $address->city_id = $city->id;
            $address->state_id = $request->state_id;
            $address->description = $request->address_description;
            $address->save();
        }
        $order = new Order();
        if ($request->city_id != null || $request->address_description) {
            $order->order_address_id = $address->id;
        } else {
            $order->address_id = $request->addr_radio;
        }
        $order->user_id = auth()->user()->id;
        $order->service_id = $request->service_id;
        $order->description = $request->problem_description;
        $order->date = $request->date;
        $order->time = $request->time;
        $order->show_info = $request->show_info;
        $order->save();

        // saving image
        if ($request->image != null) {
            $image = new OrderImage();
            $image->order_id = $order->id;
            $imagename = time() . "." . $request->image->extension();
            $request->image->move(public_path("Images/oreders/"), $imagename);
            $image->photo_path = "Images/techinfo/" . $imagename;
            $image->save();
        }



        // saving form datas
        $form = Form::find($request->form_id);
        foreach ($form->questions as $question) {
            $result = new FormResult();
            $result->order_id = $order->id;
            $result->form_id = $request->form_id;
            $result->label = $question->label;
            $id = $question->id;
            $result->value = $request->$id;
            $result->save();
        }
        return redirect()->route("user.service.find.request", $order->id);
    }


    public function findrequest($lang, $id)
    {
        $order = Order::find($id);
        return view("front.services.accept", compact("order"));
    }


    public function autofind($lang, $id)
    {
        $order = Order::find($id);
        $process = new Process();
        $process->order_id = $id;
        $process->service_id = $order->service_id;
        $process->save();
    }


    public function customfind($lang, $id)
    {
        $order = Order::find($id);
        $techusers = User::where([["role_name", "technician"], ["status", 1]])->get();
        $technicians = [];
        // find technicians that have all requirments
        foreach ($techusers as $techuser) {
            // finding address
            if ($order->order_address_id != null) {
                $address = OrderAddress::find($order->order_address_id);
            } else {
                $address = Address::find($order->address_id);
            }

            // geting tech skills
            $skills = [];
            foreach ($techuser->skills as $skill) {
                array_push($skills, $skill->service_sub_categoy_id);
            }


            if ($techuser->techinfo->covered_state_id == $address->state_id && $techuser->techinfo->covered_city_id == $address->city_id && in_array($order->service_id, $skills)) {
                array_push($technicians, $techuser);
            }
        }

        $filterids = [];
        foreach ($technicians as $technician) {
            $plus = 0;

            foreach ($technician->techscores as $score) {
                $plus += $score->star_number;
            }
            $average = ($plus) / count($technician->techscores);
            array_push($filterids, ["tech_id" => $score->tech_id, "score_average" => round($average)]);
        }


        $fives = [];
        $fours = [];
        $threes = [];
        $twos = [];
        $ones = [];
        foreach ($filterids as $filter) {
            if ($filter["score_average"] == 5) {
                array_push($fives, $filter);
            } elseif ($filter["score_average"] == 4) {
                array_push($fours, $filter);
            } elseif ($filter["score_average"] == 3) {
                array_push($threes, $filter);
            } elseif ($filter["score_average"] == 2) {
                array_push($twos, $filter);
            } elseif ($filter["score_average"] == 1) {
                array_push($ones, $filter);
            }
        }

        // making them in right way
        $finalfilter = [];
        foreach ($fives as $five) {
            array_push($finalfilter, $five);
        }

        foreach ($fours as $four) {
            array_push($finalfilter, $four);
        }

        foreach ($threes as $three) {
            array_push($finalfilter, $three);
        }

        foreach ($twos as $two) {
            array_push($finalfilter, $two);
        }

        foreach ($ones as $one) {
            array_push($finalfilter, $one);
        }

        // geting teches by order of rankings
        $techs = [];
        foreach ($finalfilter as $filter1) {
            $user = User::find($filter1["tech_id"]);
            array_push($techs, $user);
        }
        return view("front.services.customselect", compact("techs", "id"));
    }

    public function customselect(Request $request)
    {
        $suggest = new Suggestion();
        $suggest->tech_id = $request->tech_id;
        $suggest->order_id = $request->order_id;
        $suggest->save();
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
}
