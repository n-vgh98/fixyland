<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TechInfo extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo("App\Models\Users", "user_id");
    }

    public function servicestate()
    {
        return $this->belongsTo("App\Models\CoveredArea", "covered_state_id");
    }

    public function servicecity()
    {
        return $this->belongsTo("App\Models\CoveredAreaCity", "covered_city_id");
    }
}
