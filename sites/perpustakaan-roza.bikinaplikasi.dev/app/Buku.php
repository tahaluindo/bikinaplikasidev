<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{

    protected $table = 'buku';
    protected $guarded = [];
    public $timestamps = false;

    public function __destruct()
    {

        $this->table = strtolower($this->table);
    }

    public function detail_peminjamans()
    {
        return $this->hasMany(DetailPeminjaman::class);
    }

}
