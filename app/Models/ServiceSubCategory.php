<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceSubCategory extends Model
{
    use HasFactory;
    public function language()
    {
        return $this->morphOne("App\Models\Lang", "langable");
    }

    public function category()
    {
        return $this->belongsTo("App\Models\ServiceCategory", "category_id");
    }
    public function description()
    {
        return $this->hasOne("App\Models\ServiceSubcategoryDescription", "subcategory_id");
    }

    public function form()
    {
        return $this->hasOne("App\Models\Form", "subcategory_id");
    }
}
