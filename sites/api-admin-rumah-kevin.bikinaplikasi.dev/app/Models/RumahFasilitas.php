<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RumahFasilitas extends Model
{

    protected $table = 'rumah_fasilitas';
    protected $guarded = [];
    public $timestamps = false;

    public function __destruct()
    {

        $this->table = strtolower($this->table);
    }

    public function rumah()
    {
        return $this->belongsTo(Rumah::class);
    }

    public function fasilitas()
    {
        return $this->belongsTo(Fasilitas::class);
    }

}
