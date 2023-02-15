<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotifikasiDetail extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'notifikasi_detail';

    public function pelanggan()
    {

        return $this->belongsTo(Pelanggan::class);
    }
}
