<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barang';
    protected $guarded = [];
    public $timestamps = false;
//
    public function __destruct()
    {

        $this->table = strtolower($this->table);
    }

    public function jenis()
    {
        
        return $this->belongsTo(Jenis::class);
    }
    
    public function satuan()
    {
        
        return $this->belongsTo(Satuan::class);
    }

    
}