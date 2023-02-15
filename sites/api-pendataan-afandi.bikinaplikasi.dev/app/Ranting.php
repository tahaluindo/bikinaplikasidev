<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Ranting extends Authenticatable
{
    use Notifiable;

    protected $table = 'ranting';
    protected $guarded = [];

    public $timestamps = false;

    public function anggotas()
    {
        return $this->hasMany(Anggota::class);
    }
}