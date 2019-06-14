<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name_ar','name_en','rate','price','sale_price','image','content_ar','content_en','on_sale','top_rated','latest','quantity','owner_id','category_id','subc_id','active'];
}
