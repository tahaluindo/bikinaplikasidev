<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SoalEssay extends Model
{
    //
    protected $guarded = [];
    protected $table = "soal_essays";

    public function mapel()
    {

        return $this->belongsTo(Mapel::class);
    }
}
