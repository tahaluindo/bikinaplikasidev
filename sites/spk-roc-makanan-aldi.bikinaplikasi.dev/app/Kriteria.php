<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{

    protected $table = 'kriteria';
    protected $guarded = [];
    public $timestamps = false;

    public function kriteria_details()
    {
        return $this->hasMany(KriteriaDetail::class);
    }
}
