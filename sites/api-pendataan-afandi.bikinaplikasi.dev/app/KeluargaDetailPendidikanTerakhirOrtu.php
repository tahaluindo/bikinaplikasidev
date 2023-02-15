<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class KeluargaDetailPendidikanTerakhirOrtu extends Authenticatable
{
    use Notifiable;

    protected $table = 'keluarga_detail_pendidikan_terakhir_ortu';
    protected $guarded = [];

    public $timestamps = false;

    public function keluarga_detail()
    {
        return $this->belongsTo(KeluargaDetail::class);
    }
}