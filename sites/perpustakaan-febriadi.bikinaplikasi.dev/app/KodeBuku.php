<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KodeBuku extends Model
{
    protected $table = 'kode_buku';
    protected $guarded = [];
    public $timestamps = false;

    public function __destruct()
    {

        $this->table = strtolower($this->table);
    }

    public function buku()
    {
        return $this->hasMany('App\Buku');
    }
}
