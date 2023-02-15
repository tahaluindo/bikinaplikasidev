<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    use HasFactory;

    protected $table = 'pembelian';
    protected $guarded = [];
    public $timestamps = false;
//
    public function __destruct()
    {

        $this->table = strtolower($this->table);
    }

    public function barang()
    {

        return $this->belongsTo(Barang::class);
    }

    
}