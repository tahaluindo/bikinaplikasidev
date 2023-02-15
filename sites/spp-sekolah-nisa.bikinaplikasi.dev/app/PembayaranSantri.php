<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PembayaranSantri extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    public function pembayaran_santri_bulans()
    {
        return $this->hasMany(PembayaranSantriBulan::class);
    }

    public function pembayaran_santri_details()
    {
        return $this->hasMany(PembayaranSantriDetail::class);
    }
}
