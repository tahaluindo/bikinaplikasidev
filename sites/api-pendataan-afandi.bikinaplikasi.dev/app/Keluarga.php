<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Keluarga extends Authenticatable
{
    use Notifiable;

    protected $table = 'keluarga';
    protected $guarded = [];

    public $timestamps = true;

    public function keluarga_details()
    {
        return $this->hasMany(KeluargaDetail::class);
    }
}