<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class SekolahSabatMateri extends Model
{
    use HasFactory;

    protected $table = 'sekolah_sabat_materi';
    protected $guarded = [];
    public $timestamps = true;
    public const UPDATED_AT = "updated_at";
    public const CREATED_AT = "created_at";

    public function __destruct()
    {

        $this->table = strtolower($this->table);
    }

    public function sekolah_sabat()
    {
        return $this->belongsTo(SekolahSabat::class);
    }

    public function sekolah_sabat_materi_tanggals()
    {
        return $this->hasMany(SekolahSabatMateriTanggal::class);
    }

    public function getCreatedAtAttribute($value)
    {
        return date("Y-m-d H:i:s", strtotime($value));
    }

    public function getUpdatedAtAttribute($value)
    {
        return date("Y-m-d H:i:s", strtotime($value));
    }
}