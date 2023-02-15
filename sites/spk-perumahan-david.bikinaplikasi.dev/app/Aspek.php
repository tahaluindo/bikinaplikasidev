<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aspek extends Model
{
    protected $guarded = [];
    protected $table   = "aspeks";
    public $timestamps = false;

    public function kriterias()
    {
        return $this->hasMany(Kriteria::class);
    }
}
