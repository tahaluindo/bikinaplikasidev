<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{

    protected $table = 'genre';
    protected $guarded = [];
    public $timestamps = false;

}
