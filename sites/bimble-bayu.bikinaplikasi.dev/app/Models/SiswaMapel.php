<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiswaMapel extends Model
{
    use HasFactory;

    protected $table = 'siswa_mapel';
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

    public function mapel_detail()
    {
        return $this->belongsTo(MapelDetail::class);
    }

}