<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NilaiDetail extends Model
{
    //
    protected $guarded = [];
    protected $table = "nilai_details";
    public $timestamps = false;

    public function nilai()
    {
        
        return $this->belongsTo(Nilai::class);
    }

    public function user()
    {
        
        return $this->belongsTo(User::class);
    }
}
