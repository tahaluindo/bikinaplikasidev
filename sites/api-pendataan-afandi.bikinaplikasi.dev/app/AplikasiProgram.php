<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class AplikasiProgram extends Authenticatable
{
    use Notifiable;

    protected $table = 'aplikasi_program';
    protected $guarded = [];

    public $timestamps = false;

    public function aplikasi_program_list_pilihans()
    {
        return $this->hasMany(AplikasiProgramListPilihan::class);
    }

    public function aplikasi_program_list_checkboxs()
    {
        return $this->hasMany(AplikasiProgramListCheckbox::class);
    }
}