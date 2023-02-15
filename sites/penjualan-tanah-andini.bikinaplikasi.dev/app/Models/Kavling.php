<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kavling extends Model
{
    use HasFactory;

    protected $table = 'kavling';
    protected $guarded = [];
    public $timestamps = false;

    public function __destruct()
    {

        $this->table = strtolower($this->table);
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
    
    public function penjualan()
    {
        return $this->hasOne(Penjualan::class);
    }
}