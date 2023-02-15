<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class PerhitunganDetail extends Model
{

    protected $table = 'perhitungan_detail';
    protected $guarded = [];
    public $timestamps = false;

    public function perhitungan()
    {
        return $this->belongsTo(Perhitungan::class);
    }
}
