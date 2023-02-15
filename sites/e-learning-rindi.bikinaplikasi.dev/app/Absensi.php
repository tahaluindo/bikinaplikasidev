<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    //
    protected $guarded = [];
    protected $table = "absensi";
    public $timestamps = false;

    public function mapel_detail()
    {
        return $this->belongsTo(MapelDetail::class);
    }
    
    public function absensi_details()
    {
        return $this->hasMany(AbsensiDetail::class);
    }
}
