<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tagihan extends Model
{
    use HasFactory;

    protected $table = 'tagihan';
    protected $guarded = [];
    public $timestamps = true;

    public function __destruct()
    {

        $this->table = strtolower($this->table);
    }

    public function pembeli()
    {
        return $this->belongsTo(Pembeli::class);
    }

    public function details()
    {
        return $this->hasMany(TagihanDetail::class);
    }

    public function cicilans()
    {
        return $this->hasMany(Cicilan::class);
    }
}