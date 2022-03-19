<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUsText extends Model
{
    use HasFactory;
    protected $table="contact_us_texts";

    public function language(){
        return $this->morphOne("App\Models\Lang","langable");
    }
}
