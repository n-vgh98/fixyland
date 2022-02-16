<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceCategory extends Model
{
    use HasFactory;
    public function language()
    {
        return $this->morphOne("App\Models\Lang", "langable");
    }

    public function subcategories()
    {
        return $this->hasMany("App\Models\ServiceSubCategory", "category_id");
    }
}
