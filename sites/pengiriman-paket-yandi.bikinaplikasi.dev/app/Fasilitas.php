<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
    //
    protected $guarded = [];
    protected $table = "fasilitas";
    public $timestamps = false;

    public function mobils()
    {
        return $this->hasMany(Mobil::class);
    }
}
