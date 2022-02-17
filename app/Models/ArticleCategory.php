<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleCategory extends Model
{
    use HasFactory;
    protected $table="article_categories";

    public function language(){
        return $this->morphOne("App\Models\Lang","langable");
    }

    public function articles(){
        return $this->hasMany("App\Models\Article");
    }
}
