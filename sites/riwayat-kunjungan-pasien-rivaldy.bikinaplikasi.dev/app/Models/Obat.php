<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    use HasFactory;

    protected $table = 'obat';
    protected $guarded = [];
    public $timestamps = false;

//

    public function __destruct()
    {

        $this->table = strtolower($this->table);
    }

    
}