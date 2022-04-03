<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavoritTechnician extends Model
{
    use HasFactory;

    public function customre()
    {
        return $this->belongsTo("App\Models\User", "customer_id");
    }

    public function technician()
    {
        return $this->belongsTo("App\Models\User", "technician_id");
    }
}
