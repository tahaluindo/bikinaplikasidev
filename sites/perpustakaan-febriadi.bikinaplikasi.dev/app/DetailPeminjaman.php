<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class DetailPeminjaman extends Model
{


    protected $table = 'detail_peminjaman';
    protected $guarded = [];
    public $timestamps = false;

    public function __destruct()
    {

        $this->table = strtolower($this->table);
    }

    public function peminjaman()
    {
        return $this->belongsTo('App\Peminjaman');
    }
    public function buku()
    {
        return $this->belongsTo('App\Buku');
    }

}
