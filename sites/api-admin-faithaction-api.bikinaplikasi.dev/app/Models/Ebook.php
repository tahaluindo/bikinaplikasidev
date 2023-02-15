<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Ebook extends Model
{
    use HasFactory;

    protected $table = 'ebook';
    protected $guarded = [];
    public $timestamps = true;

    public const UPDATED_AT = "updated_at";
    public const CREATED_AT = "created_at";

    public function __destruct()
    {

        $this->table = strtolower($this->table);
    }

    public function ebook_kategori()
    {
        return $this->belongsTo(EbookKategori::class);
    }

    public function ebook_dilihats()
    {
        return $this->hasMany(EbookDilihat::class);
    }

    public function ebook_dishares()
    {
        return $this->hasMany(EbookDishare::class);
    }

    public function ebook_disukais()
    {
        return $this->hasMany(EbookDisukai::class);
    }

    public function ebook_komentars()
    {
        return $this->hasMany(EbookKomentar::class);
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