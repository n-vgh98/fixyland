<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Reward;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

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

    // for showing all super admins
    public function superadmins()
    {
        $users = User::where("role_name", "superadmin")->get();
        return view("admin.users.superadmins", compact("users"));
    }

    // for showing all admins
    public function admins()
    {
        $users = User::where("role_name", "admin")->get();
        return view("admin.users.admins", compact("users"));
    }

    // for showing all customers
    public function customers()
    {
        $users = User::where("role_name", "user")->get();
        return view("admin.users.users", compact("users"));
    }

    // for showing all technicians
    public function technicians()
    {
        $users = User::where("role_name", "technician")->get();
        return view("admin.users.technicians", compact("users"));
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
    // for destroying users
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
    public function promotetoSuperAdmin(User $user)
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
    public function promotetoAdmin(User $user)
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
    public function promotetoUser(User $user)
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
    public function promotetoTechnician(User $user)
    {
        if ($user->role_name == "technician") {
            return redirect()->back()->with("fail", "This account Already Has this roll");
        } else {
            $user->role_name = "technician";
            $user->save();
            return redirect()->back()->with("success", "User Account promoted to technician");
        }
    }

    public function createUser(Request $request)
    {

        Validator::make($request->all(), [
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'numeric', 'unique:users'],
        ])->validate();

        $user = new User();
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->code = rand(1, 9000) + rand(1, 90000);
        $user->role_name = $request->role;
        $user->save();
        if ($request->moaref_code != null) {
            $intoroduced = User::where("code", $request->moaref_code)->first();
            if ($intoroduced != null) {
                $reward = new Reward();
                $reward->introducer = $user->id;
                $reward->intoroduced = $intoroduced->id;
                $reward->save();
            }
        }
        return redirect()->back()->with("success", "User Account added successfully");
    }

    public function edituser(User $user, Request $request)
    {
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->code = rand(1, 9000) + rand(1, 90000);
        $user->role_name = $request->role;
        $user->save();
        return redirect()->back()->with("success", "User Account updated successfully");
    }
}
