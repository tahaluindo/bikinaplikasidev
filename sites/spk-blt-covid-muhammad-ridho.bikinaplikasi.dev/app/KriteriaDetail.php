<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class KriteriaDetail extends Model
{


    protected $table = 'kriteria_detail';
    protected $guarded = [];
    public $timestamps = false;

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class);
    }
}
