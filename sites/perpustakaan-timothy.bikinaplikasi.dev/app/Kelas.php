<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{


    protected $table = 'kelas';
    protected $guarded = [];
    public $timestamps = false;

    public function __destruct()
    {

        $this->table = strtolower($this->table);
    }

    public function user()
    {
        return $this->hasMany('App\User');
    }

}
