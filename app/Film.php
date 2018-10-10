<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    //
    protected $table = 'films';
    protected $guarded = ['id'];
}
