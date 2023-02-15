<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alat extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'alat';
    protected $fillable = ['nama', 'link', 'deskripsi'];

}
