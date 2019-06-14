<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = ['name','title','content','facebook','twitter','linkedin','image','active'];
}
