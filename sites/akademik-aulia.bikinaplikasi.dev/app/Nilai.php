<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    //
    protected $guarded = [];
    protected $table = "nilais";
    public $timestamps = false;

    public function mapel_detail()
    {
        
        return $this->belongsTo(MapelDetail::class);
    }

    public function nilai_details()
    {
        
        return $this->belongsTo(NilaiDetail::class);
    }
}
