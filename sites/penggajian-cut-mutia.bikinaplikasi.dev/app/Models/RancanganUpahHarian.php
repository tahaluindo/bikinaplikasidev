<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RancanganUpahHarian extends Model
{
    use HasFactory;

    protected $table = 'rancangan_upah_harian';
    protected $guarded = [];
    public $timestamps = false;

    public function karyawan()
    {
        
        return $this->belongsTo(Karyawan::class);
    }

    public function riwayat_jabatan()
    {
        
        return $this->where([
            'karyawan_id' => $this->id,
            'status' => 'Aktif'
        ])->first();
    }
}
