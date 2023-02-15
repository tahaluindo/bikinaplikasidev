<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPenjualanAktualDetail extends Model
{
    use HasFactory;

    protected $table = 'data_penjualan_aktual_detail';
    protected $guarded = [];
    public $timestamps = false;

    public function __destruct()
    {

        $this->table = strtolower($this->table);
    }

    public function data_penjualan_aktual()
    {
        return $this->belongsTo('App\Models\DataPenjualanAktual');
    }
    
}