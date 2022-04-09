<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatContent extends Model
{
    use HasFactory;
    public function chat()
    {
        return $this->belongsTo("App\Models\Chat", "chat_id");
    }

    public function sender()
    {
        return $this->belongsTo("App\Models\User", "sender_id");
    }

    public function receiver()
    {
        return $this->belongsTo("App\Models\User", "receiver_id");
    }
}
