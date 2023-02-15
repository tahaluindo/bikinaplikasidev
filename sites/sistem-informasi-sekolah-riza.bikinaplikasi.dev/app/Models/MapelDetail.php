<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MapelDetail extends Model
{
    use HasFactory;

    protected $table = 'mapel_detail';
    protected $guarded = [];
    public $timestamps = false;

    public function __destruct()
    {

        $this->table = strtolower($this->table);
    }

    public function mapel()
    {
        return $this->belongsTo(Mapel::class);
    }
    
    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }
    
    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
    
}