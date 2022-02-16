<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaqCategory extends Model
{
    use HasFactory;
    protected $table="faq_categories";

    public function language(){
        return $this->morphOne("App\Models\Lang","langable");
    }
}
