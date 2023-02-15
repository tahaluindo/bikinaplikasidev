<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bahan extends Model
{
    use HasFactory;

    protected $table = 'bahan';
    protected $guarded = [];
    public $timestamps = false;

    public function __destruct()
    {

        $this->table = strtolower($this->table);
    }
}