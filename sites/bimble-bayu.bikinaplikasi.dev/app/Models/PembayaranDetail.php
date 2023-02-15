<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembayaranDetail extends Model
{
    use HasFactory;

    protected $table = 'pembayaran_detail';
    protected $guarded = [];
    public $timestamps = false;

    public function __destruct()
    {
        $this->table = strtolower($this->table);
    }

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

    public function pembayaran()
    {
        return $this->belongsTo(Pembayaran::class);
    }
}