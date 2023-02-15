<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Raport extends Model
{
    //
    protected $guarded = [];
    protected $table   = "raports";
    public $timestamps = false;

    public function user()
    {

        return $this->belongsTo(User::class);
    }

}
