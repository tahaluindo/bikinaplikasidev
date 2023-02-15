<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    //
    protected $guarded = [];
    protected $table = "mobil";
    public $timestamps = false;

    public function mobil_fasilitas()
    {
        return $this->hasMany(MobilFasilitas::class);
    }

}
