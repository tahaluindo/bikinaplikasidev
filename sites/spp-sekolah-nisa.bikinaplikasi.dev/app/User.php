<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $guarded = [];
    protected $hidden = ['password'];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
}
