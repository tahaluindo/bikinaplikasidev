<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PemesananPaket extends Model
{
    //
    protected $guarded = [];
    protected $table = "pemesanan_paket";

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function paket()
    {
        return $this->belongsTo(Paket::class);
    }
}
