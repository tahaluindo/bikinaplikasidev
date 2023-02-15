<?php

namespace App;

use App\RentalMobil;
use App\ReservasiTiket;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notifikasi extends Model
{

    protected $guarded = ['id'];
    protected $table = 'notifikasi';

    public function reservasi_tiket()
    {
        return $this->belongsTo(ReservasiTiket::class);
    }

    public function rental_mobil()
    {
        return $this->belongsTo(RentalMobil::class);
    }
}
