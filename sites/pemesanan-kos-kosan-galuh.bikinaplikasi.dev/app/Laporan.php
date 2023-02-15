<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    //
    protected $guarded = [];

    public function transaksi()
    {
        return $this->belongsTo(\App\Transaksi::class);
    }

    public function tagihan()
    {
        return $this->belongsTo(\App\Tagihan::class);
    }
}
