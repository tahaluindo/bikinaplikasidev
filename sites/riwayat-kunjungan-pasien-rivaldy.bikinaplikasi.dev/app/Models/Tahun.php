<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tahun extends Model
{
    use HasFactory;

    protected $table = 'tahun';
    protected $guarded = [];
    public $timestamps = false;

    public function __destruct()
    {


        $this->table = strtolower($this->table);
    }

    
}