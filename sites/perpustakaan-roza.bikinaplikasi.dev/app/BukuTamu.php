<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BukuTamu extends Model
{

    protected $table = 'buku_tamu';
    protected $guarded = [];
    public $timestamps = true;

    public function __destruct()
    {

        $this->table = strtolower($this->table);
    }

    public function anggota()
    {
        return $this->belongsTo(Anggotum::class);
    }

}
