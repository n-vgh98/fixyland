<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminNotificationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notifications = Notification::all();
        return view("admin.notifications.index", compact("notifications"));
    }

    public function superadmins()
    {
        $notifications = Notification::where("receivers", "SuperAdmins")->get();
        return view("admin.notifications.superadmins.index", compact("notifications"));
    }


    public function admins()
    {
        $notifications = Notification::where("receivers", "Admins")->get();
        return view("admin.notifications.admins.index", compact("notifications"));
    }


    public function customers()
    {
        $notifications = Notification::where("receivers", "Customers")->get();
        return view("admin.notifications.customers.index", compact("notifications"));
    }


    public function technicians()
    {
        $notifications = Notification::where("receivers", "Technicians")->get();
        return view("admin.notifications.technicians.index", compact("notifications"));
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
        $notifcation = new Notification();
        if ($request->mode == "public") {
            $notifcation->text = $request->text;
            $notifcation->receivers = $request->receivers;
            $notifcation->mode = 0;
            $notifcation->sender_id = auth()->user()->id;
            $notifcation->save();
            return redirect()->back()->with("success", "your notifcation sent for $request->receivers");
        } elseif ($request->mode == "private") {
            $notifcation->text = $request->text;
            $notifcation->receivers = $request->receivers;
            $notifcation->mode = 1;
            $notifcation->sender_id = auth()->user()->id;
            $notifcation->receiver_id = $request->receiver;
            $notifcation->save();
            return redirect()->back()->with("success", "your notifcation sent for $request->receivers");
        } else {
            return redirect()->back()->with("fail", "somthing went wrong please contact programming team");
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
        $notifications = Notification::where("receiver_id", $id)->get();

        return view("admin.notifications.show", compact("notifications"));
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
    public function update(Request $request, Notification $notification)
    {
        $notification->text = $request->text;
        $notification->save();
        return redirect()->back()->with("success", "your notifcation updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notification $notification)
    {
        $notification->delete();
        return redirect()->back()->with("success", "your notifcation deleted successfully");
    }
}
