<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rumah extends Model
{
    protected $table = 'rumahs';
    protected $guarded = [];
    public $timestamps = false;

    public function type()
    {

        return $this->belongsTo(Type::class);
    }

    public function lokasi()
    {

        return $this->belongsTo(Lokasi::class);
    }
}
