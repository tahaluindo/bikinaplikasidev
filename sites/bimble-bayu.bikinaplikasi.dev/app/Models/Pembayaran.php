<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $table = 'pembayaran';
    protected $guarded = [];
    public $timestamps = false;

    public function __destruct()
    {

        $this->table = strtolower($this->table);
    }

    public function pembayaran_details()
    {
        return $this->hasMany(PembayaranDetail::class);
    }

    public function jenjang()
    {
        return $this->belongsTo(Jenjang::class);
    }
    
    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
    
}