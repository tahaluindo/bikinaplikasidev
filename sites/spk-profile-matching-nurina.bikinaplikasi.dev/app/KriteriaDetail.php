<?php

namespace App;

use App\Kriteria;
use Illuminate\Database\Eloquent\Model;

class KriteriaDetail extends Model
{
    protected $guarded = [];
    protected $table   = 'kriteria_details';
    public $timestamps = false;

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class);
    }
}
