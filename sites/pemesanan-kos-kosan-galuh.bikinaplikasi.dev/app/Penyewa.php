<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penyewa extends Model
{
    //
    protected $guarded = [];

    public function kamar()
    {
    	return $this->belongsTo('\App\Kamar');
    }

}
