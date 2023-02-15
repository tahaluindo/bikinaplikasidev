<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{

    protected $table = 'anggota';
    protected $guarded = [];
    public $timestamps = false;

    public function __destruct()
    {

        $this->table = strtolower($this->table);
    }

    public function kelas()
    {
        return $this->belongsTo('namespace App\Kelas');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
