<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SewaSatuan extends Model
{
    use HasFactory;

    protected $table = 'sewa_satuan';
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

    public function getCreatedAtAttribute($value)
    {
        return date("Y-m-d H:i:s", strtotime($value));
    }

    public function getUpdatedAtAttribute($value)
    {
        return date("Y-m-d H:i:s", strtotime($value));
    }
}