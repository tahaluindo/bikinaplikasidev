<?php

namespace App\Tokoku;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model 
{

    protected $table = 'supplier';
    public $timestamps = true;
    protected $fillable = array('name');

}