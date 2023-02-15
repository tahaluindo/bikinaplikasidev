<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Balasan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'balasans';

    public function komen(){
        return $this->belongsTo(Komen::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
