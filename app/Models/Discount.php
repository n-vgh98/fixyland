<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo("App\Models\User", "user_id");
    }

    public function useddiscounts()
    {
        return $this->hasMany("App\Models\DiscountUser", "discount_id");
    }
}