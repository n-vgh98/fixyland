<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FooterLink extends Model
{
    use HasFactory;
    protected $table="footer_useful_links";

    public function language(){
        return $this->morphOne("App\Models\Lang","langable");
    }
}
