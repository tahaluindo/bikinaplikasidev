<?php

namespace App;

use App\Kriteria;
use Illuminate\Database\Eloquent\Model;

class Gap extends Model
{
    protected $guarded = [];
    protected $table   = "gaps";
    public $timestamps = false;

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class);
    }
}
