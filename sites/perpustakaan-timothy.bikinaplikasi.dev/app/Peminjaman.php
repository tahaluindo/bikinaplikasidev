<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{


    protected $table = 'peminjaman';
    protected $guarded = [];
    public $timestamps = false;

    public function __destruct()
    {

        $this->table = strtolower($this->table);
    }

    public function anggota()
    {
        return $this->belongsTo('App\Anggotum');
    }

    public function pengembalian()
    {
        return $this->hasOne('App\Pengembalian');
    }

    public function detail_peminjaman()
    {
        return $this->hasMany('App\DetailPeminjaman');
    }

    public function user_petugas()
    {
        return $this->belongsTo('App\User');
    }

}
