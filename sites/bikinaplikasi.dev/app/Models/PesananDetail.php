<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesananDetail extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'pesanan_detail';
    protected $guarded = [];

    public function pesanan()
    {

        return $this->belongsTo(Pesanan::class);
    }
    
    public function produk()
    {

        return $this->belongsTo(Produk::class);
    }
}
