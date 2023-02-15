<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class KeluargaDetail extends Authenticatable
{
    use Notifiable;

    protected $table = 'keluarga_detail';
    protected $guarded = [];

    public $timestamps = true;


    public function keluarga()
    {
        return $this->belongsTo(Keluarga::class);
    }

    public function anggota()
    {
        return $this->hasOne(Anggota::class);
    }

    public function keluarga_detail_keahlians()
    {
        return $this->hasMany(KeluargaDetailKeahlian::class);
    }

    public function keluarga_detail_pekerjaans()
    {
        return $this->hasMany(KeluargaDetailPekerjaan::class);
    }

    public function keluarga_detail_pendidikan_terakhir_anak()
    {
        return $this->hasOne(KeluargaDetailPendidikanTerakhirAnak::class);
    }

    public function keluarga_detail_pendidikan_terakhir_ortu()
    {
        return $this->hasOne(KeluargaDetailPendidikanTerakhirOrtu::class);
    }

    public function keluarga_detail_pekerjaan()
    {
        return $this->hasMany(KeluargaDetailPekerjaan::class);
    }
    public function keluarga_detail_keahlian()
    {
        return $this->hasMany(KeluargaDetailKeahlian::class);
    }
}