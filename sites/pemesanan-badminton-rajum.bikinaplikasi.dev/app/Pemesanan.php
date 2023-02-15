<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    //
    protected $guarded = [];
    protected $table = "pemesanan";
    public $timestamps = false;

    public function lapangan()
    {
        return $this->belongsTo(Lapangan::class);
    }
}
