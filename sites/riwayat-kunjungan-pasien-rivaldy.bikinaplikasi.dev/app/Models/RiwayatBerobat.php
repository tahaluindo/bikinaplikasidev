<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatBerobat extends Model
{
    use HasFactory;

    protected $table = 'riwayat_berobat';
    protected $guarded = [];
    public $timestamps = false;

    public function __destruct()
    {

        $this->table = strtolower($this->table);
    }

    public function pasien()
    {
        return $this->belongsTo(Pasien::class);
    }

    public function penyakit()
    {
        return $this->belongsTo(Penyakit::class);
    }
}