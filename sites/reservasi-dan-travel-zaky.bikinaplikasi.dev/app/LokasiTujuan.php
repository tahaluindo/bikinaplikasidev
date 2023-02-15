<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LokasiTujuan extends Model
{
    //
    protected $guarded = [];
    protected $table = "lokasi_tujuan";
    public $timestamps = false;

    public function rute()
    {
        return $this->belongsTo(Rute::class);
    }
}
