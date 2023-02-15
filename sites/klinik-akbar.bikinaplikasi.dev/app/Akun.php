<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Akun extends Authenticatable
{
    use Notifiable;
    protected $table = 'akun';
    protected $guarded = [];

    public function user()
    {
        return $this->morphTo();
    }
}
