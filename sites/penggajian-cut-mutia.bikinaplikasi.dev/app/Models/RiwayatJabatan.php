<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatJabatan extends Model
{
    use HasFactory;

    protected $table = 'riwayat_jabatan';
    protected $guarded = [];
    public $timestamps = false;
    
    public function karyawan()
    {
        
        return $this->belongsTo(Karyawan::class);
    }
}
