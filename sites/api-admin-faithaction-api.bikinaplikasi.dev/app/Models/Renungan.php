<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Renungan extends Model
{
    use HasFactory;

    protected $table = 'renungan';
    protected $guarded = [];
    public $timestamps = true;

    public const UPDATED_AT = "updated_at";
    public const CREATED_AT = "created_at";

    public function __destruct()
    {

        $this->table = strtolower($this->table);
    }

    public function renungan_kategori()
    {
        return $this->belongsTo(RenunganKategori::class);
    }

    public function renungan_dilihats()
    {
        return $this->hasMany(RenunganDilihat::class);
    }

    public function renungan_dishares()
    {
        return $this->hasMany(RenunganDishare::class);
    }

    public function renungan_disukais()
    {
        return $this->hasMany(RenunganDisukai::class);
    }

    public function renungan_komentars()
    {
        return $this->hasMany(RenunganKomentar::class);
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