<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Archive;
use App\Models\Discount;
use App\Models\DiscountUser;
use App\Models\Problems;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pay($lang, Request $request, $id)
    {

        // archive
        $archive = Archive::find($id);
        // total with no discount
        $total = $archive->service_cost + $archive->stuff_cost + $archive->final_price;
        $finalprice = $archive->service_cost + $archive->stuff_cost + $archive->final_price;


        // total price with takhfif
        // check takhfif
        $discount = Discount::where("code", $request->dicsount)->first();
        if ($discount != null) {
            $selected = DiscountUser::where("discount_id", $discount->id)->first();
            if ($selected == null) {
                if (new Carbon($discount->expire_time) > new Carbon()) {
                    $discountprice = $finalprice * $discount->percent;
                    if ($discountprice <= $discount->max_price) {
                        $total = $finalprice - $discountprice;
                    } else {
                        $total = $finalprice - $discount->max_price;
                    }
                }
            }
        }
        // dargah amaliats



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

    public function problems($lang, Request $request, $id)
    {
        $problem = new Problems();
        $problem->archive_id = $id;
        $problem->description = $request->description;
        $problem->save();
        return redirect()->back()->with("success", "شکایت شما ثبت شد و پس از برسی توسط پشتیبانی با شما تماس گرفته میشود");
    }
}
