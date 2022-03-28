<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TechInfo extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo("App\Models\Users", "user_id");
    }
}
