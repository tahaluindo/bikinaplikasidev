<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPenjualanPrediksi extends Model
{
    use HasFactory;

    protected $table = 'data_penjualan_prediksi';
    protected $guarded = [];
    public $timestamps = false;

    public function __destruct()
    {

        $this->table = strtolower($this->table);
    }

    public function tahun()
    {
        return $this->belongsTo(Tahun::class);
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }
}