<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TugasDetail extends Model
{
    //
    protected $guarded = [];
    protected $table = "tugas_details";

    public function tugas()
    {
        return $this->belongsTo(Tugas::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
