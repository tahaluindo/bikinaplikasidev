<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class AnggotaAplikasiProgramListCheckbox extends Authenticatable
{
    use Notifiable;

    protected $table = 'anggota_aplikasi_program_list_checkbox';
    protected $guarded = [];

    public $timestamps = false;

    public function anggota()
    {
        return $this->belongsTo(Anggota::class);
    }

    public function aplikasi_program_list_checkbox()
    {
        return $this->belongsTo(AplikasiProgramListCheckbox::class);
    }

}