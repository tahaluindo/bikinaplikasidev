<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPeminjaman extends Model
{
    use HasFactory;

    protected $table = 'detail_peminjaman';
    protected $guarded = [];
    public $timestamps = false;

    public function __destruct()
    {

        $this->table = strtolower($this->table);
    }

    public function peminjaman()
    {
        return $this->belongsTo('App\Models\Peminjaman');
    }
    public function buku()
    {
        return $this->belongsTo('App\Models\Buku');
    }
    
}