<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Gerejaku extends Model
{
    use HasFactory;

    protected $table = 'gerejaku';
    protected $guarded = [];
    public $timestamps = true;
    public const UPDATED_AT = "updated_at";
    public const CREATED_AT = "created_at";

    public function __destruct()
    {

        $this->table = strtolower($this->table);
    }
    
    public function gerejaku_dishares()
    {
        return $this->hasMany(GerejakuDishare::class);
    }

    public function gerejaku_kategori()
    {
        return $this->belongsTo(GerejakuKategori::class);
    }

    public function gerejaku_dilihats()
    {
        return $this->hasMany(GerejakuDilihat::class);
    }

    public function gerejaku_komentars()
    {
        return $this->hasMany(GerejakuKomentar::class);
    }

    public function gerejaku_disukais()
    {
        return $this->hasMany(GerejakuDisukai::class);
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