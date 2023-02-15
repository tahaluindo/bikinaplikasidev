<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Klasifikasi extends Authenticatable
{
    use Notifiable;

    protected $table = 'tb_klasifikasi';
    protected $primaryKey = 'id_klasifikasi';
    protected $guarded = [];

    public $timestamps = false;
}
