<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    //

    protected $table = "kelass";
    protected $guarded = [];

    public function wali_kelas()
    {

        return User::find($this->wali_kelas);
    }

    public function ketua_kelas()
    {

        return User::find($this->ketua_kelas);
    }

    #relasi
}
