<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Surat extends Authenticatable
{
    use Notifiable;

    protected $table = 'tb_suratmasuk';
    protected $primaryKey = 'id_suratmasuk';
    protected $guarded = [];

    public $timestamps = false;
}
