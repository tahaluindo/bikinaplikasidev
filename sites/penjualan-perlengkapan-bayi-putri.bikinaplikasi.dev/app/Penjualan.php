<?php

namespace App;

use App\DetailPenjualan;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    public $timestamps = false;
    protected $guarded = [];
    protected $table = 'penjualan';
    protected $primaryKey = 'id_penjualan';

    public function detail_penjualans()
    {
        return $this->hasMany(DetailPenjualan::class, 'id_penjualan', 'id_penjualan');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'id_pelanggan');
    }
}
