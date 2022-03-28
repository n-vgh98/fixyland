<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkillUser extends Model
{
    use HasFactory;
    public function category()
    {
        return $this->belongsTo("App\Models\ServiceCategory", "service_categoy_id");
    }
    public function subcategory()
    {
        return $this->belongsTo("App\Models\ServiceSubCategory", "service_sub_categoy_id");
    }

    public function user()
    {
        return $this->belongsTo("App\Models\Users", "user_id");
    }
}
