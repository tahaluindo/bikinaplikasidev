<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class siswa extends Authenticatable
{
    use Notifiable;

    protected $table = 'tb_siswa';
    protected $primaryKey = 'id_siswa';
    protected $guarded = [];

    public $timestamps = false;
}
