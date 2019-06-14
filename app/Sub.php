<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sub extends Model
{
    protected $fillable = ['sub_name_ar','sub_name_en','active','cate_id'];
}
