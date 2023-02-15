<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Informasi extends Model
{
    //
    protected $guarded = [];
    protected $table = "informasis";

    public function komentars()
    {
        return $this->hasMany(Komentar::class);
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
