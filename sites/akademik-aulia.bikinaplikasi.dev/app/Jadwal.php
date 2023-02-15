<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    //
    protected $guarded = [];
    protected $table = "jadwals";

    public function mapel_detail()
    {
        
        return $this->belongsTo(MapelDetail::class);
    }
}
