<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Lang extends Model
{
    use HasFactory;
    public function langable(){
        return $this->morphTo();
    }
}
