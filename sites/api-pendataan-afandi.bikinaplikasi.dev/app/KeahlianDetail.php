<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class KeahlianDetail extends Authenticatable
{
    use Notifiable;

    protected $table = 'keahlian_detail';
    protected $guarded = [];

    public $timestamps = false;

    public function keahlian()
    {
        return $this->belongsTo(Keahlian::class);
    }

    public function keluarga_detail_keahlians()
    {
        return $this->hasMany(KeluargaDetailKeahlian::class);
    }
}