<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Pengembalian extends Model
{


    protected $table = 'pengembalian';
    protected $guarded = [];
    public $timestamps = true;

    public function __destruct()
    {

        $this->table = strtolower($this->table);
    }

    public function anggota()
    {
        return $this->belongsTo('App\Anggota');
    }
    public function peminjaman()
    {
        return $this->belongsTo('App\Peminjaman');
    }

}
