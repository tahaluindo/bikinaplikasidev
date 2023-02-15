<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    protected $table = 'pemesanan';
    protected $guarded = [];
    public $timestamps = false;

    public function __destruct()
    {

        $this->table = strtolower($this->table);
    }

    public function pemesanan_details()
    {
        return $this->hasMany(PemesananDetail::class);
    }
    
    public function meja()
    {
        return $this->belongsTo(Meja::class);
    }
}