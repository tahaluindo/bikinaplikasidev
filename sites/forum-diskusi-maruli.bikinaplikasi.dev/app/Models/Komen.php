<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komen extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $timestamps = true;

    public function balasans()
    {
        return $this->hasMany(Balasan::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
