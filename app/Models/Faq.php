<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;
    protected $table="faqs";

    public function language(){
        return $this->morphOne("App\Models\Lang","langable");
    }

    public function category(){
        return $this->belongsTo("App\Models\FaqCategory");
    }
}
