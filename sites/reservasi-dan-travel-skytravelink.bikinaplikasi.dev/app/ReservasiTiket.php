<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReservasiTiket extends Model
{
    //
    protected $guarded = [];
    protected $table = "reservasi_tiket";

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tiket()
    {
        return $this->belongsTo(Tiket::class);
    }
}
