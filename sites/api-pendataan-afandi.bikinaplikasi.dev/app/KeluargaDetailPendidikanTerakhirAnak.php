<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class KeluargaDetailPendidikanTerakhirAnak extends Authenticatable
{
    use Notifiable;

    protected $table = 'keluarga_detail_pendidikan_terakhir_anak';
    protected $guarded = [];

    public $timestamps = false;

    public function keluarga_detail()
    {
        return $this->belongsTo(KeluargaDetail::class);
    }
}