<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Lang;
use Illuminate\Http\Request;

class FrontFaqController extends Controller
{
    public function index($lang)
    {
        $languages = Lang::where([["name","$lang"],["langable_type","App\Models\Faq"]])->get();
        $cat_languages = Lang::where([["name",$lang],["langable_type","App\Models\FaqCategory"]])->get();
        return view("front.faq",compact(["languages","lang","cat_languages"]));
    }
}
