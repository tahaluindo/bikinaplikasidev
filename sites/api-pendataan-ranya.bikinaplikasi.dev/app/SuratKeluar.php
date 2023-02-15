<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class SuratKeluar extends Authenticatable
{
    use Notifiable;

    protected $table = 'tb_suratkeluar';
    protected $primaryKey = 'id_suratkeluar';
    protected $guarded = [];

    public $timestamps = false;
}
