<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoveredArea extends Model
{
    use HasFactory;
    protected $table = "covered_area";
    public function cities()
    {
        return $this->hasMany("App\Models\CoveredAreaCity");
    }
    public function language(){
        return $this->morphOne("App\Models\Lang","langable");
    }
}
