<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sewa extends Model
{
    use HasFactory;

    protected $table = 'sewa';
    protected $guarded = [];
    public $timestamps = true;
    public const UPDATED_AT = "updated_at";
    public const CREATED_AT = "created_at";

    public function __destruct()
    {

        $this->table = strtolower($this->table);
    }

    public function sewa_gambars()
    {
        return $this->hasMany(SewaGambar::class);
    }
    
    public function sewa_kategori()
    {
        return $this->belongsTo(SewaKategori::class);
    }

    public function sewa_penyewaans()
    {
        return $this->hasMany(SewaPenyewaan::class);
    }
    
    public function sewa_penyewaan_waktu_sewas()
    {
        return $this->hasMany(SewaPenyewaanWaktuSewa::class);
    }
    
    public function sewa_satuan()
    {
        return $this->belongsTo(SewaSatuan::class);
    }
    
    public function sewa_share_revenues()
    {
        return $this->hasMany(SewaShareRevenue::class);
    }
    
    public function sewa_unit_usahas()
    {
        return $this->hasMany(SewaUnitUsaha::class);
    }

    public function sewa_waktu_sewa()
    {
        return $this->hasMany(SewaWaktuSewa::class);
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