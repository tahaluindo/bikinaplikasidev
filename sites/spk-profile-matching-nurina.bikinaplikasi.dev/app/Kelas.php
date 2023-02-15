<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    //
    protected $table = 'kelass';
    protected $guarded = [];
    public $timestamps = false;

    public function alternatifs()
    {

        return $this->hasMany(Alternatif::class);
    }
}
