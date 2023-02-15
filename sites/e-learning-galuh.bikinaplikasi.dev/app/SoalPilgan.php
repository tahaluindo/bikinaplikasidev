<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SoalPilgan extends Model
{
    protected $guarded = [];
    protected $table = 'soal_pilgans';

    public function mapel()
    {

        return $this->belongsTo(Mapel::class);
    }
}
