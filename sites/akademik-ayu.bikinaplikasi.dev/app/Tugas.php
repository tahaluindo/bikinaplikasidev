<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    //

    protected $guarded = [];
    protected $table = "tugass";

    public function tugas_details()
    {
        return $this->hasMany(TugasDetail::class);
    }

    public function mapel()
    {
        return $this->belongsTo(Mapel::class);
    }
}
