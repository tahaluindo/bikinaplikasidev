<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $table = 'pesanan';
    protected $guarded = [];
    public $timestamps = false;

    public function __destruct()
    {

        $this->table = strtolower($this->table);
    }

    public function pesanan_detail()
    {
        
        return $this->hasMany(PesananDetail::class);
    }
    
    public function pelanggan()
    {
        
        return $this->belongsTo(Pelanggan::class);
    }
    
    public function paket()
    {
        
        return $this->belongsTo(Paket::class);
    }
    
    public function user()
    {
        
        return $this->belongsTo(User::class);
    }

    
}