<?php

namespace App;

use App\RentalMobil;
use App\PengirimanPaket;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notifikasi extends Model
{

    protected $guarded = ['id'];
    protected $table = 'notifikasi';

    public function pengiriman_paket()
    {
        return $this->belongsTo(PengirimanPaket::class);
    }

    public function rental_mobil()
    {
        return $this->belongsTo(RentalMobil::class);
    }
}
