<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    //
    protected $guarded = [];
    protected $table = "mapels";

    public function mapel_details()
    {
        return $this->hasMany(MapelDetail::class);
    }

    public function soal_essays()
    {
        return $this->hasMany(SoalEssay::class);
    }

    public function soal_pilgans()
    {
        return $this->hasMany(SoalPilgan::class);
    }
}
