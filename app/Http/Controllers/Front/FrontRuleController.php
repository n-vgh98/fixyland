<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Lang;
use Illuminate\Http\Request;

class FrontRuleController extends Controller
{
    public function index($lang)
    {
        $languages = Lang::where([["name",$lang],["langable_type","App\Models\Rule"]])->first();
        $rule = $languages->langable;
        return view("front.rules",compact(["rule","lang"]));
    }
}
