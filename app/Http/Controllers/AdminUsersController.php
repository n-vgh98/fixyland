<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //  for showing all users

    public function all()
    {
        $users = User::all();
        return view("admin.users.all", compact("users"));
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
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back()->with("success", "User Account Destroyed");
    }

    // method for activating user account
    public function activate(User $user)
    {

        $user->status = 1;
        $user->save();
        return redirect()->back()->with("success", "User Account Activated");
    }

    // method for deactiving user account
    public function deactive(User $user)
    {
        $user->status = 0;
        $user->save();
        return redirect()->back()->with("success", "User Account Deactivated");
    }

    // method for changing user roll to super admin
    public function SuperAdmin(User $user)
    {


        if ($user->role_name == "superadmin") {
            return redirect()->back()->with("fail", "This account Already Has this roll");
        } else {
            $user->role_name = "superadmin";
            $user->save();
            return redirect()->back()->with("success", "User Account promoted to SuperAdmin");
        }
    }

    // method for changing user roll to super admin
    public function Admin(User $user)
    {
        if ($user->role_name == "admin") {
            return redirect()->back()->with("fail", "This account Already Has this roll");
        } else {
            $user->role_name = "admin";
            $user->save();
            return redirect()->back()->with("success", "User Account promoted to admin");
        }
    }

    // method for changing user roll to super admin
    public function User(User $user)
    {
        if ($user->role_name == "user") {
            return redirect()->back()->with("fail", "This account Already Has this roll");
        } else {
            $user->role_name = "user";
            $user->save();
            return redirect()->back()->with("success", "User Account promoted to user");
        }
    }

    // method for changing user roll to super admin
    public function Technician(User $user)
    {
        if ($user->role_name == "technician") {
            return redirect()->back()->with("fail", "This account Already Has this roll");
        } else {
            $user->role_name = "technician";
            $user->save();
            return redirect()->back()->with("success", "User Account promoted to technician");
        }
    }
}
