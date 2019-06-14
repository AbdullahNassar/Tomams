<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title_ar','title_en','head_ar','head_en','content_ar','content_en','image','active','user_id','created_at','updated_at'];
}
