<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    //

    protected $table = "materis";
    protected $guarded = [];

    public function pembuat()
    {

        return User::find($this->user_id);
    }

    public function kelas()
    {

        return $this->belongsTo(Kelas::class);
    }

    public function mapel()
    {

        return $this->belongsTo(Mapel::class);
    }

    public function getFilesAttribute()
    {

        return json_decode($this->attributes['files'], true);
    }

    public function getMapelDetailIdsAttribute()
    {

        return json_decode($this->attributes['mapel_detail_ids'], true);
    }
}
