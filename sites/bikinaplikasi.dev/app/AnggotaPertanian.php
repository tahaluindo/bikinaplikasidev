<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class AnggotaPertanian extends Authenticatable
{
    use Notifiable;

    protected $table = 'anggota_pertanian';
    protected $guarded = [];

    public $timestamps = false;

    public function anggota()
    {
        return $this->belongsTo(Anggota::class);
    }
}