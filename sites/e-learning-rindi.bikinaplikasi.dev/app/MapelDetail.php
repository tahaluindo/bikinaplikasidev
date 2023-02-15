<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MapelDetail extends Model
{
    //
    protected $guarded = [];
    protected $table = "mapel_details";
    public $timestamps = false;

    public function mapel()
    {
        return $this->belongsTo(Mapel::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
}
