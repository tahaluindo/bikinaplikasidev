<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Cabang extends Authenticatable
{
    use Notifiable;

    protected $table = 'cabang';
    protected $guarded = [];

    public $timestamps = false;

    public function anggotas()
    {
        return $this->hasMany(Anggota::class);
    }
}