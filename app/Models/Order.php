<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo("App\Models\Users", "user_id");
    }

    public function service()
    {
        return $this->belongsTo("App\Models\ServiceSubcategory", "service_id");
    }

    public function formresults()
    {
        return $this->hasMany("App\Models\FromResult");
    }

    public function address()
    {
        return $this->belongsTo("App\Models\OrderAddress", "address_id");
    }
}
