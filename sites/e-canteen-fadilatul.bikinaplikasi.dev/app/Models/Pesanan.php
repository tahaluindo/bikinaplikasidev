<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;
    protected $table = 'pesanan';

    protected $guarded = [];

    public function meja()
    {
        return $this->belongsTo(Meja::class);
    }

    public function penjual()
    {
        return $this->belongsTo(Penjual::class);
    }
    
    public function pesanan_details()
    {
        return $this->hasMany(PesananDetail::class);
    }
}
