<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    protected $table = 'dokter';
    protected $guarded = [];
    public function akun()
    {
        return $this->morphOne('App\Akun', 'user');
    }
    public function spesialis()
    {
        return $this->belongsToMany('App\Spesialis');
    }
}
