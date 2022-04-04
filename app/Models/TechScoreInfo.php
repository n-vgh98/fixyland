<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TechScoreInfo extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo("App\Models\TechScore", "score_id");
    }
}
