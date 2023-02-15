<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;

    protected $table = 'penjualan';
    protected $guarded = [];
    public $timestamps = false;

    public function __destruct()
    {

        $this->table = strtolower($this->table);
    }

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class);
    }
    
    public function kavling()
    {
        return $this->belongsTo(Kavling::class);
    }

    public function angsurans()
    {
        return $this->hasMany(Angsuran::class);
    }
}