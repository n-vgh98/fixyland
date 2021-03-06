<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Process extends Model
{
    use HasFactory;

    public function order()
    {
        return $this->belongsTo("App\Models\Order", "order_id");
    }

    public function service()
    {
        return $this->belongsTo("App\Models\ServiceSubCategory", "service_id");
    }

    public function technician()
    {
        return $this->belongsTo("App\Models\User", "tech_id");
    }
}
