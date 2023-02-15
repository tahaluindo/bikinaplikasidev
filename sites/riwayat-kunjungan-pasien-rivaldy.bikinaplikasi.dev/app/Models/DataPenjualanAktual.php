<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPenjualanAktual extends Model
{
    use HasFactory;

    protected $table = 'data_penjualan_aktual';
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

    public function data_penjualan_aktual_details()
    {
        
        return $this->hasMany(DataPenjualanAktualDetail::class);
    }
    
}