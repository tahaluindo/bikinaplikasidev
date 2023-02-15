<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lapangan extends Model
{
    //
    protected $guarded = [];
    protected $table = "lapangan";
    public $timestamps = false;

    public function mobils()
    {
        return $this->hasMany(Mobil::class);
    }
}
