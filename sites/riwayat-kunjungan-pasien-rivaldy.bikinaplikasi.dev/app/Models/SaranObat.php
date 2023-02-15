<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaranObat extends Model
{
    use HasFactory;

    protected $table = 'saran_obat';
    protected $guarded = [];
    public $timestamps = false;

    public function __destruct()
    {

        $this->table = strtolower($this->table);
    }

    public function penyakit()
    {
        return $this->belongsTo(Penyakit::class);
    }

    public function obat()
    {
        return $this->belongsTo(Obat::class);
    }
    
}