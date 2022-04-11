<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiscountUser extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo("App\Models\User", "user_id");
    }

    public function order()
    {
        return $this->belongsTo("App\Models\Order", "order_id");
    }

    public function discount()
    {
        return $this->belongsTo("App\Models\Discount", "discount_id");
    }
}
