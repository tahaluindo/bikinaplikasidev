<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rumah extends Model
{

    protected $table = 'rumah';
    protected $guarded = [];
    public $timestamps = false;

    public function __destruct()
    {

        $this->table = strtolower($this->table);
    }

    public function disukais()
    {
        return $this->hasMany(Disukai::class);
    }

    public function rumah_fasilitas()
    {
        return $this->hasMany(RumahFasilitas::class);
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
