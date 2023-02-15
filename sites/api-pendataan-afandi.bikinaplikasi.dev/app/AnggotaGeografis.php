<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class AnggotaGeografis extends Authenticatable
{
    use Notifiable;

    protected $table = 'anggota_geografis';
    protected $guarded = [];

    public $timestamps = false;

    public function anggota()
    {
        return $this->belongsTo(Anggota::class);
    }

    public function geografis()
    {
        return $this->belongsTo(Geografis::class);
    }
}