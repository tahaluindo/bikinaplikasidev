<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alternatif extends Model
{

    protected $table = 'alternatif';
    protected $guarded = [];
    public $timestamps = false;

    public function perhitungan()
    {
        return $this->belongsTo(Perhitungan::class);
    }

    public function alternatif_details()
    {
        return $this->hasMany(AlternatifDetail::class);
    }

}
