<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Contact extends Model
{
    protected $fillable = [
            'address_ar',
            'address_en',
            'email',
            'phone',
            'facebook',
            'twitter',
            'google',
            'instagram',
            'youtube',
            'whats',
            'pin',
            'linkedin'
        ];

    public function get($value)
    {
        $contact = DB::table('contacts')
            ->select($value)
            ->first();

    if($contact)
        return $contact->$value;
    return '';
    }
}
