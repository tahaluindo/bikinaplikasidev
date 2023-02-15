<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disukai extends Model
{

    protected $table = 'disukai';
    protected $guarded = [];
    public $timestamps = true;

    public function __destruct()
    {

        $this->table = strtolower($this->table);
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    
    public function rumah()
    {
        return $this->belongsTo('App\Models\Rumah');
    }
}