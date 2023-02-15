<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'karyawan';
    
    public function user()
    {
        
        return $this->belongsTo(User::class);
    }
}
