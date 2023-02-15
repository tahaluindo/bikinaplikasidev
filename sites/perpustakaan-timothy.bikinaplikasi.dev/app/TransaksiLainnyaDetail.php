<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransaksiLainnyaDetail extends Model
{
    protected $guarded = [];

    public function transaksi_lainnya()
    {
        return $this->belongsTo(TransaksiLainnya::class);
    }
}
