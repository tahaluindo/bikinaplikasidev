<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SewaWaktuSewa extends Model
{

    protected $table = 'sewa_waktu_sewa';
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
    
    public function unit_usaha()
    {
        return $this->belongsTo(UnitUsaha::class);
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