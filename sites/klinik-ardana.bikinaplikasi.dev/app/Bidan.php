<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bidan extends Model
{
    protected $table = 'bidan';
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
