<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Keahlian extends Authenticatable
{
    use Notifiable;

    protected $table = 'keahlian';
    protected $guarded = [];

    public $timestamps = false;

    public function anggotas()
    {
        return $this->hasMany(Anggota::class);
    }

    public function keahlian_details()
    {
        return $this->hasMany(KeahlianDetail::class);
    }

}