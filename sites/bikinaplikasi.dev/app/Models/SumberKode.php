<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SumberKode extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'sumber_kode';
    protected $fillable = ['nama_program', 'deskripsi', 'berbayar', 'link'];
}
