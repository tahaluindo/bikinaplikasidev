<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    //
    protected $guarded = [];

    public function type()
    {
    	return $this->belongsTo('\App\Type');
    }

    public function penyewa()
    {
        return $this->hasOne(\App\Penyewa::class);
    }
}
