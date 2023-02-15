<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AbsensiDetail extends Model
{
    //
    protected $guarded = [];
    protected $table = "absensi_details";
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
