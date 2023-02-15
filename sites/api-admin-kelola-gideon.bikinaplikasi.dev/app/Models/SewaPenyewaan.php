<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SewaPenyewaan extends Model
{
    use HasFactory;

    protected $table = 'sewa_penyewaan';
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
        
    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function sewa_penyewaan_waktu_sewas()
    {
        return $this->hasMany(SewaPenyewaanWaktuSewa::class);
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