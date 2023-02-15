<?php

namespace App;

use App\Aspek;
use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    protected $guarded = [];
    protected $table   = "kriterias";
    public $timestamps = false;

    public function aspek()
    {
        return $this->belongsTo(Aspek::class);
    }

    public function kriteria_details()
    {
        return $this->hasMany(KriteriaDetail::class);
    }
}
