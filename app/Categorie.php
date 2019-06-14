<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    protected $fillable = ['icon','cat_name_ar','cat_name_en','active'];
}
