<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Lang;
use Illuminate\Http\Request;

class FrontAboutUsController extends Controller
{
   public function index($lang)
   {
        $languages = Lang::where([["name",$lang],["langable_type","App\Models\AboutUs"]])->first();
        $about_us = $languages->langable;
        return view("front.about_us",compact(["about_us","lang"]));

   }
}
