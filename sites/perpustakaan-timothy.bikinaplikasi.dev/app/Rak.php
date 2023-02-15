<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Rak extends Model
{


    protected $table = 'rak';
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
