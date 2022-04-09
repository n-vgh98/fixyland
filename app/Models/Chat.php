<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;
    public function messages()
    {
        return $this->hasMany("App\Models\ChatContent");
    }

    public function user1()
    {
        return $this->belongsTo("App\Models\User", "user_1");
    }

    public function user2()
    {
        return $this->belongsTo("App\Models\User", "user_2");
    }
}
