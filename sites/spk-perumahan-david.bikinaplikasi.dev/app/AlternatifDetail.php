<?php

namespace App;

use App\Alternatif;
use Illuminate\Database\Eloquent\Model;

class AlternatifDetail extends Model
{
    protected $guarded = [];
    protected $table   = 'alternatif_details';
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
