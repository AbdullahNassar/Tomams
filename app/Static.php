<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Static extends Model
{
    protected $fillable = ['b1_head_ar','b1_head_en','b1_content_ar','b1_content_en',
        'b2_head_ar','b2_head_en','b2_content_ar','b2_content_en',
        'b3_head_ar','b3_head_en','b3_content_ar','b3_content_en',
        'about','features','goal','message','vission','transfer'];

    public function get($value)
    {
        $data = DB::table('statics')
            ->select($value)
            ->first();

    if($data)
        return $data->$value;
    return '';
    }
}
