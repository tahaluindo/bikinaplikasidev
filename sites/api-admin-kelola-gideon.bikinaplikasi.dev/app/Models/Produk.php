<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produk';
    protected $guarded = [];
    public $timestamps = true;
    public const UPDATED_AT = "updated_at";
    public const CREATED_AT = "created_at";

    public function __destruct()
    {

        $this->table = strtolower($this->table);
    }

    public function produk_gambars()
    {
        return $this->hasMany(ProdukGambar::class);
    }
    
    public function produk_kategori()
    {
        return $this->belongsTo(ProdukKategori::class);
    }

    public function produk_satuan()
    {
        return $this->belongsTo(ProdukSatuan::class);
    }

    public function produk_share_revenues()
    {
        return $this->hasMany(ProdukShareRevenue::class);
    }
    
    public function produk_varians()
    {
        return $this->hasMany(ProdukVarian::class);
    }
    
    public function produk_unit_usaha()
    {
        return $this->hasOne(ProdukUnitUsaha::class);
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