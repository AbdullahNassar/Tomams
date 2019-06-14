<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Storie extends Model
{
    protected $fillable = ['title_ar','title_en','story_ar','story_en','active'];
}
