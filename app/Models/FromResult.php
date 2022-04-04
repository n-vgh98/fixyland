<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FromResult extends Model
{
    use HasFactory;


    public function form()
    {
        return $this->belongsTo("App\Modelfs\Form", "form_id");
    }

    public function order()
    {
        return $this->belongsTo("App\Modelfs\Order", "order_id");
    }
}
