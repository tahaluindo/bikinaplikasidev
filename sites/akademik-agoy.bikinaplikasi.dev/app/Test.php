<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    //

    protected $table = "kuiss";
    protected $guarded = [];

    public function guru()
    {

        return User::find($this->guru_id);
    }

    public function mapel()
    {

        return $this->belongsTo(Mapel::class);
    }

    public function test_details()
    {

        return $this->hasMany(TestDetail::class);
    }

    public function getMapelDetailIdsAttribute()
    {

        return json_decode($this->attributes['mapel_detail_ids'], true);
    }

    public function setMapelDetailIdsAttribute($value)
    {

        return $this->attributes['mapel_detail_ids'] = json_encode($value);
    }

    public function getSoalIdsAttribute()
    {

        return json_decode($this->attributes['soal_ids'], true);
    }
}
