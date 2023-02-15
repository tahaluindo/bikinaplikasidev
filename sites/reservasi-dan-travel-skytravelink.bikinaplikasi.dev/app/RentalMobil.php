<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RentalMobil extends Model
{
    //
    protected $guarded = [];
    protected $table = "rental_mobil";

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function mobil()
    {
        return $this->belongsTo(Mobil::class);
    }

    public function supir()
    {
        return $this->belongsTo(User::class, 'supir_id', 'id');
    }
}
