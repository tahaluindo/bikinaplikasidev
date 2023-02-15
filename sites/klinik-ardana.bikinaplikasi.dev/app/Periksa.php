<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Periksa extends Model
{
    protected $table = 'periksa';

    protected $guarded = [];

    public function pegawai()
    {
        return $this->belongsTo('App\Pegawai');
    }

    public function pasien()
    {
        return $this->belongsTo('App\Pasien');
    }

    public function bidan()
    {
        return $this->belongsTo('App\Bidan');
    }
}
