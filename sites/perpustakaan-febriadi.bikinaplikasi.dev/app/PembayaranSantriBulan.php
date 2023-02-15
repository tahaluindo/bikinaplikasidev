<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PembayaranSantriBulan extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    public function pembayaran_santri()
    {
        return $this->belongsTo(PembayaranSantri::class);
    }

    public function pembayaran_santri_details()
    {
        return $this->hasMany(PembayaranSantriDetail::class);
    }
}
