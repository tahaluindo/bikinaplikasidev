<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Perhitungan extends Model
{

    protected $table = 'perhitungan';
    protected $guarded = [];
    public $timestamps = true;

    public function alternatifs()
    {
        return $this->hasMany(Alternatif::class);
    }
}
