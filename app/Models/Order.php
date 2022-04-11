<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo("App\Models\User", "user_id");
    }

    public function service()
    {
        return $this->belongsTo("App\Models\ServiceSubcategory", "service_id");
    }

    public function formresults()
    {
        return $this->hasMany("App\Models\FormResult");
    }

    public function order_address()
    {
        return $this->belongsTo("App\Models\OrderAddress", "order_address_id");
    }

    public function address()
    {
        return $this->belongsTo("App\Models\Address", "address_id");
    }

    public function images()
    {
        return $this->hasMany("App\Models\OrderImage");
    }
    public function archive()
    {
        return $this->hasOne("App\Models\Archive", "order_id");
    }
}
