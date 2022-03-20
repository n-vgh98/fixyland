<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoveredAreaCity extends Model
{
    use HasFactory;
    protected $table = "covered_area_cities";
    public function state()
    {
        return $this->belongsTo("App\Models\CoveredArea","state_id");
    }
    public function language(){
        return $this->morphOne("App\Models\Lang","langable");
    }
}
