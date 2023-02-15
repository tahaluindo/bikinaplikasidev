<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SewaPenyewaanWaktuSewa extends Model
{
    use HasFactory;

    protected $table = 'sewa_penyewaan_waktu_sewa';
    protected $guarded = [];
    public $timestamps = true;
    public const UPDATED_AT = "updated_at";
    public const CREATED_AT = "created_at";

    public function __destruct()
    {

        $this->table = strtolower($this->table);
    }
    

    public function sewa()
    {
        return $this->belongsTo(Sewa::class);
    }
    
    
    public function sewa_waktu_sewa()
    {
        return $this->belongsTo(SewaWaktuSewa::class);
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