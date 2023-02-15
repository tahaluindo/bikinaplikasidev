<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cuti extends Model
{

    protected $table = 'cuti';
    protected $guarded = [];
    public $timestamps = false;

    public function pegawai()
    {

        return $this->belongsTo(Pegawai::class);
    }
}
