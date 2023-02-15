<?php

namespace App;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class PembayaranInfaqDetail extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //
    // public function getTable()
    // {
    //     return Str::snake(PembayaranInfaqDetail::class) . 's';
    // }
}
