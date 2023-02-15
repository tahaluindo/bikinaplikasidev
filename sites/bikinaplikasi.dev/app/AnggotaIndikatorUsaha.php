<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class AnggotaIndikatorUsaha extends Authenticatable
{
    use Notifiable;

    protected $table = 'anggota_indikator_usaha';
    protected $guarded = [];

    public $timestamps = false;

    public function anggota()
    {
        return $this->belongsTo(Anggota::class);
    }
}