<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;
    public function subcategory()
    {
        return $this->belongsTo("App\Models\ServiceSubCategory", "subcategory_id");
    }

    public function questions()
    {
        return $this->hasMany("App\Models\Input");
    }
}
