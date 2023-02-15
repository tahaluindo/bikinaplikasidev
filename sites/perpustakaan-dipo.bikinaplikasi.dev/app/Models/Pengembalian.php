<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengembalian extends Model
{
    use HasFactory;

    protected $table = 'pengembalian';
    protected $guarded = [];
    public $timestamps = false;

    public function __destruct()
    {

        $this->table = strtolower($this->table);
    }

    public function anggota()
    {
        return $this->belongsTo('App\Models\Anggota');
    }
    public function peminjaman()
    {
        return $this->belongsTo('App\Models\Peminjaman');
    }
    
}