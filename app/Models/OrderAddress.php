<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderAddress extends Model
{
    use HasFactory;
    public function order()
    {
        return $this->belongsTo("App\Modelfs\Order", "order_id");
    }

    public function user()
    {
        return $this->belongsTo("App\Models\Users", "user_id");
    }

    public function state()
    {
        return $this->belongsTo("App\Models\CoveredArea", "state_id");
    }

    public function city()
    {
        return $this->belongsTo("App\Models\CoveredAreaCity", "city_id");
    }
}
