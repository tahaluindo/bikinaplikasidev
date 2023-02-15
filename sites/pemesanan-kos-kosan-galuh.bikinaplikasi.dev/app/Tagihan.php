<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tagihan extends Model
{
    //
    protected $guarded = [];

    public function penyewa()
    {
    	return $this->belongsTo(\App\Penyewa::class);
    }

    public function kamar()
    {
    	return $this->belongsTo(\App\Kamar::class);
    }

    public function perpanjanganSewa()
    {
        return $this->hasMany(\App\PerpanjanganSewa::class, 'tagihan_id', 'invoice_id');
    }
}
