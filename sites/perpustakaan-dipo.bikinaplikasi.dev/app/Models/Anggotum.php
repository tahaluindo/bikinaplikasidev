<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggotum extends Model
{
    use HasFactory;

    protected $table = 'anggota';
    protected $guarded = [];
    public $timestamps = false;

    public function __destruct()
    {

        $this->table = strtolower($this->table);
    }

    public function kelas()
    {
        return $this->belongsTo('App\Models\Kelas');
    }
    
}