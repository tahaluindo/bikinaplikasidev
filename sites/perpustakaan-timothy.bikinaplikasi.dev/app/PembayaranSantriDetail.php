<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PembayaranSantriDetail extends Model
{
    protected $guarded = [];

    public function pembayaran_santri()
    {
        return $this->belongsTo(PembayaranSantri::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pembayaran_santri_bulan()
    {
        return $this->belongsTo(PembayaranSantriBulan::class);
    }
}
