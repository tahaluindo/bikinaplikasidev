<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPenjualanPrediksiDetail extends Model
{
    use HasFactory;

    protected $table = 'data_penjualan_prediksi_detail';
    protected $guarded = [];
    public $timestamps = false;

    public function __destruct()
    {

        $this->table = strtolower($this->table);
    }

    public function data_penjualan_prediksi()
    {
        return $this->belongsTo('App\Models\DataPenjualanPrediksi');
    }

    public function tahun()
    {
        return $this->belongsTo('App\Models\Tahun');
    }
    
}