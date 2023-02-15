<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $table = 'pegawai';
    protected $guarded = [];
    public $timestamps = false;
//
    public function __destruct()
    {

        $this->table = strtolower($this->table);
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    
}