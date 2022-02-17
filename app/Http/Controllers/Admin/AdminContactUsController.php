<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class AdminContactUsController extends Controller
{
    public function index(){
        $contact_us = ContactUs::all();
        return view('admin.contact_us.index',compact("contact_us"));
    }
}
