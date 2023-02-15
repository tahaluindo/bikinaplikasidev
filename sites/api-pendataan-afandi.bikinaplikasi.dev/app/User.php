<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'user';
    protected $guarded = [];

    public $timestamps = true;

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = \Hash::make($value);
    }

    public function anggota()
    {
        return $this->hasOne(Anggota::class);
    }

    public function keluarga_detail()
    {
        return $this->belongsTo(KeluargaDetail::class, "nik", "nik");
    }
}