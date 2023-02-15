<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Mahasiswa extends Authenticatable
{
    use Notifiable;

    protected $table = 'tb_mahasiswa';
    protected $primaryKey = 'id_mahasiswa';
    protected $guarded = [];

    public $timestamps = false;
}
