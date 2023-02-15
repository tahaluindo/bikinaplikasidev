<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class UnitUsaha extends Model
{
    use HasFactory;

    protected $table = 'unit_usaha';
    protected $guarded = [];
    public $timestamps = true;
    public const UPDATED_AT = "updated_at";
    public const CREATED_AT = "created_at";

    public function __destruct()
    {

        $this->table = strtolower($this->table);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function lokasi_usaha()
    {
        return $this->belongsTo(LokasiUsaha::class);
    }
    
    public function jenis_usaha()
    {
        return $this->belongsTo(JenisUsaha::class);
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