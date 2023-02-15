<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rute extends Model
{
    //
    protected $guarded = [];
    protected $table = "rute";
    public $timestamps = false;

    public function dari()
    {
        return Lokasi::find($this->dari);
    }

    public function ke()
    {
        return Lokasi::find($this->ke);
    }

}
