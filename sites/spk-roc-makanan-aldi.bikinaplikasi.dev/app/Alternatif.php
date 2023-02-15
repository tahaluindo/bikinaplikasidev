<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alternatif extends Model
{

    protected $table = 'alternatif';
    protected $guarded = [];
    public $timestamps = false;

    public function comunale()
    {
        return $this->belongsTo(Comunale::class);
    }

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    public function alternatif_details()
    {
        return $this->hasMany(AlternatifDetail::class);
    }

}
