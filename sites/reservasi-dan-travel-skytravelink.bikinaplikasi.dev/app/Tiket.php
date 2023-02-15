<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tiket extends Model
{
    //
    protected $guarded = [];
    protected $table = "tiket";

    public function rute()
    {
        return $this->belongsTo(Rute::class);
    }

    public function reservasi_tikets()
    {
        return $this->hasMany(ReservasiTiket::class);
    }
    public function mobil()
    {
        return $this->belongsTo(Mobil::class);
    }
    public function tujuan()
    {
        return $this->belongsTo(Rute::class);
    }
    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class);
    }
    public function supir()
    {
        return $this->belongsTo(User::class, 'supir_id', 'id');
    }
}
