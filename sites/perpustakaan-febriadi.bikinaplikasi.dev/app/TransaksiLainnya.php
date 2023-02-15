<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransaksiLainnya extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    public function transaksi_lainnya_details()
    {
        return $this->hasMany(TransaksiLainnyaDetail::class);
    }
}
