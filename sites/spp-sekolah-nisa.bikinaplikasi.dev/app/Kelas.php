<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
