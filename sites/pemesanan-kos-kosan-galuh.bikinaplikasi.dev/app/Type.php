<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    //
    protected $guarded = [];

    public function fasilitasDetails()
    {
        return $this->hasMany(\App\FasilitasDetail::class);
    }
}