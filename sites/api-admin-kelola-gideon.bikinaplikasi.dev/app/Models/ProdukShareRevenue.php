<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukShareRevenue extends Model
{
    use HasFactory;

    protected $table = 'produk_share_revenue';
    protected $guarded = [];
    public $timestamps = true;
    public const UPDATED_AT = "updated_at";
    public const CREATED_AT = "created_at";

    public function __destruct()
    {

        $this->table = strtolower($this->table);
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }
    
    public function kas_rekening()
    {
        return $this->belongsTo(KasRekening::class);
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