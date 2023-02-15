<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class KeluargaDetailKeahlian extends Authenticatable
{
    use Notifiable;

    protected $table = 'keluarga_detail_keahlian';
    protected $guarded = [];

    public $timestamps = false;

    public function anggota()
    {
        return $this->belongsTo(Anggota::class);
    }

    public function keahlian_detail()
    {
        return $this->belongsTo(KeahlianDetail::class);
    }
}