<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TechnicianPortfolio extends Model
{
    use HasFactory;
    public function order()
    {
        return $this->belongsTo("App\Models\Order", "order_id");
    }

    public function form()
    {
        return $this->belongsTo("App\Models\Form", "form_id");
    }
}
