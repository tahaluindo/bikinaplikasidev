<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FailedJob extends Model
{
    //

    protected $table = "failed_jobs";

    #relasi
    public function __call($method, $parameters)
    {
        return parent::__call($method, $parameters); // TODO: 
    }
}