<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
class Berita extends Model
{
    use HasFactory;

    protected $table = 'berita';
    protected $guarded = [];
    public $timestamps = true;
    public const UPDATED_AT = "updated_at";
    public const CREATED_AT = "created_at";

    public function __destruct()
    {

        $this->table = strtolower($this->table);
    }

    public function berita_komentars()
    {
        return $this->hasMany(BeritaKomentar::class);
    }

    public function berita_disukais()
    {
        return $this->hasMany(BeritaDisukai::class);
    }

    public function berita_dilihats()
    {
        return $this->hasMany(BeritaDilihat::class);
    }

    public function berita_dishares()
    {
        return $this->hasMany(BeritaDishare::class);
    }

    public function berita_kategori()
    {
        return $this->belongsTo(BeritaKategori::class);
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