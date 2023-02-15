<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BibleReadingUser extends Model
{
    use HasFactory;

    protected $table = 'bible_reading_user';
    protected $guarded = [];
    public $timestamps = true;
    public const UPDATED_AT = "updated_at";
    public const CREATED_AT = "created_at";

    public function __destruct()
    {

        $this->table = strtolower($this->table);
    }

    public function bible_reading()
    {
        return $this->belongsTo(BibleReading::class);
    }

    public function users()
    {
        return $this->belongsTo( User::class);
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