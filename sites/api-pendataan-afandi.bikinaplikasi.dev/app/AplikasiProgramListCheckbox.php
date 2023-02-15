<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class AplikasiProgramListCheckbox extends Authenticatable
{
    use Notifiable;

    protected $table = 'aplikasi_program_list_checkbox';
    protected $guarded = [];

    public $timestamps = false;

    public function aplikasi_program()
    {
        return $this->belongsTo(AplikasiProgram::class);
    }

    public function aplikasi_program_list_pilihan()
    {
        return $this->belongsTo(AplikasiProgramListPilihan::class);
    }
}