<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;
    
    protected $table = 'pelanggan';
    public $timestamps = false;
    
    public function user()
    {
        
        return $this->belongsTo(User::class);
    }
}
