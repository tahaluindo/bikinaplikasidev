<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Disposisi extends Authenticatable
{
    use Notifiable;

    protected $table = 'tb_disposisi';
    protected $primaryKey = 'id_disposisi';
    protected $guarded = [];

    public $timestamps = false;
}
