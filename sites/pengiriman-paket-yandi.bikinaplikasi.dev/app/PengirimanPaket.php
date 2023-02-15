<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PengirimanPaket extends Model
{
    //
    protected $guarded = [];
    protected $table = "pengiriman_paket";

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function paket()
    {
        return $this->belongsTo(Paket::class);
    }

    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class);
    }

    public function rute()
    {
        return $this->belongsTo(Rute::class);
    }

}
