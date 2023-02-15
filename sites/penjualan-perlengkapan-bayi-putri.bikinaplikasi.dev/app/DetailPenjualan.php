<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailPenjualan extends Model
{
    public $timestamps = false;
    protected $guarded = [];
    protected $table = 'detail_penjualan';

    public function penjualan()
    {
        return $this->belongsTo(Penjualan::class, 'id_penjualan');
    }

    public function product()
    {
        return $this->belongsTo(Tokoku\Product::class, 'id_barang', 'id');
    }
}
