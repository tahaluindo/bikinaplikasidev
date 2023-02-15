<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PembayaranInfaq extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    public function pembayaran_infaq_details()
    {
        return $this->hasMany(PembayaranInfaqDetail::class);
    }
}
