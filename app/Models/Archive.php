<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archive extends Model
{
    use HasFactory;

    public function order()
    {
        return $this->belongsTo("App\Models\Order", "order_id");
    }

    public function process()
    {
        return $this->belongsTo("App\Models\Process");
    }


    public function technician()
    {
        return $this->belongsTo("App\Models\User", "tech_id");
    }

}
