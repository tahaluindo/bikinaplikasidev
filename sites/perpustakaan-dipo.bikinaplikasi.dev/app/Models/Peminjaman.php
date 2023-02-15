<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = 'peminjaman';
    protected $guarded = [];
    public $timestamps = false;

    public function __destruct()
    {

        $this->table = strtolower($this->table);
    }

    public function anggota()
    {
        return $this->belongsTo('App\Models\Anggotum');
    }
    
    public function pengembalian()
    {
        return $this->hasOne('App\Models\Pengembalian');
    }
    
    public function detail_peminjaman()
    {
        return $this->hasMany('App\Models\DetailPeminjaman');
    }
    
    public function user_petugas()
    {
        return $this->belongsTo('App\Models\User');
    }
    
}