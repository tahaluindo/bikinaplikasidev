<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlternatifDetail extends Model
{

    protected $table = 'alternatif_detail';
    protected $guarded = [];
    public $timestamps = false;

    public function alternatif()
    {
        return $this->belongsTo(Alternatif::class);
    }

    public function kriteria_detail()
    {
        return $this->belongsTo(KriteriaDetail::class);
    }

}
