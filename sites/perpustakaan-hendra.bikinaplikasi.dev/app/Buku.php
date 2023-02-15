<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{

    protected $table = 'buku';
    protected $guarded = [];
    public $timestamps = true;

    public function __destruct()
    {

        $this->table = strtolower($this->table);
    }


}
