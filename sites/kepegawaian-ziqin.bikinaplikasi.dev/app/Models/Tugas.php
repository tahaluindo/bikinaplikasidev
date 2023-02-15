<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    use HasFactory;

    protected $table = 'tugas';
    protected $guarded = [];
    public $timestamps = true;

    public function pegawai()
    {
        
        return $this->belongsTo(Pegawai::class);
    }

    public function riwayat_jabatan()
    {
        
        return $this->where([
            'pegawai_id' => $this->id,
            'status' => 'Aktif'
        ])->first();
    }
}
