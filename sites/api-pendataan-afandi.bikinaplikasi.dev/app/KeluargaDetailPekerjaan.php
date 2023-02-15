<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class KeluargaDetailPekerjaan extends Authenticatable
{
    use Notifiable;

    protected $table = 'keluarga_detail_pekerjaan';
    protected $guarded = [];

    public $timestamps = false;

    public function keluarga_detail()
    {
        return $this->belongsTo(KeluargaDetail::class);
    }

    public function anggota()
    {
        return $this->belongsTo(Pekerjaan::class);
    }
}