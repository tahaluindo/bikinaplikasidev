<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
class CareGroup extends Model
{
    use HasFactory;

    protected $table = 'care_group';
    protected $guarded = [];
    public $timestamps = true;
    public const UPDATED_AT = "updated_at";
    public const CREATED_AT = "created_at";

    public function __destruct()
    {

        $this->table = strtolower($this->table);
    }

    public function care_group_kategori()
    {
        return $this->belongsTo(CareGroupKategori::class);
    }

    public function care_group_lokasi()
    {
        return $this->belongsTo(CareGroupLokasi::class);
    }
    
    public function care_group_anggotas()
    {
        return $this->hasMany(CareGroupAnggota::class);
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