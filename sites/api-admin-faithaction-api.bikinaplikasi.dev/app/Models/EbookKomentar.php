<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class EbookKomentar extends Model
{
    use HasFactory;

    public const UPDATED_AT = "updated_at";
    public const CREATED_AT = "created_at";
    public $timestamps = true;

    protected $table = 'ebook_komentar';
    protected $guarded = [];

    public function __destruct()
    {

        $this->table = strtolower($this->table);
    }

    public function ebook()
    {
        return $this->belongsTo(Ebook::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
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