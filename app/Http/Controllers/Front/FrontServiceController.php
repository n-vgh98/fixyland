<?php

namespace App\Http\Controllers\Front;

use App\Models\Lang;
use Illuminate\Http\Request;
use App\Models\ServiceSubCategory;
use App\Http\Controllers\Controller;
use App\Models\Form;
use App\Models\Order;
use App\Models\OrderAddress;
use App\Models\OrderImage;

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
        dd($request->all());

        if ($request->city_id != null || $request->address_description) {
            $address = new OrderAddress();
            $address->user_id = auth()->user()->id;
            $address->city_id = $request->city_id;
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
            $image->path = "Images/techinfo/" . $imagename;
            $image->save();
        }



        // saving form datas
        $form = Form::find($request->form_id);
        
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
