<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    public function language(){
        return $this->morphOne("App\Models\Lang","langable");
    }

    public function category(){
        return $this->hasMany("App\Models\ArticleCategory");
    }
}
