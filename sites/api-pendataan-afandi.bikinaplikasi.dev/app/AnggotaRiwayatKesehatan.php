<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class AnggotaRiwayatKesehatan extends Authenticatable
{
    use Notifiable;

    protected $table = 'anggota_riwayat_kesehatan';
    protected $guarded = [];

    public $timestamps = true;

    public function anggota()
    {
        return $this->belongsTo(Anggota::class);
    }
}