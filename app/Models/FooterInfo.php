<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FooterInfo extends Model
{
    use HasFactory;
    protected $table="footer_informations";
    public function language(){
        return $this->morphOne("App\Models\Lang","langable");
    }
}
