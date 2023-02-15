<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class MobilFasilitas extends Model
{
    //
    protected $guarded = [];
    protected $table = "mobil_fasilitas";
    public $timestamps = false;

    public function mobil()
    {
        return $this->belongsTo(Mobil::class);
    }

    public function fasilitas()
    {
        return $this->belongsTo(Fasilitas::class);
    }
}
