<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Pekerjaan extends Authenticatable
{
    use Notifiable;

    protected $table = 'pekerjaan';
    protected $guarded = [];

    public $timestamps = false;

    public function anggotas()
    {
        return $this->hasMany(Anggota::class);
    }

    public function keluarga_detail_pekerjaans()
    {
        return $this->hasMany(KeluargaDetailPekerjaan::class);
    }
}