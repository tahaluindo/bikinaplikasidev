<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Geografis extends Authenticatable
{
    use Notifiable;

    protected $table = 'geografis';
    protected $guarded = [];

    public $timestamps = false;


    public function anggotas()
    {
        return $this->hasMany(AnggotaGeografis::class);
    }
}