<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Progress extends Model
{
    use HasFactory;

    protected $table = 'progress';
    protected $guarded = [];
    public $timestamps = false;

    public function __destruct()
    {

        $this->table = strtolower($this->table);
    }

    public function progress_details()
    {
        return $this->hasMany(ProgressDetail::class);
    }

    public function jenjang()
    {
        return $this->belongsTo(Jenjang::class);
    }
    
    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
    
    public function mapel()
    {
        return $this->belongsTo(Mapel::class);
    }
    
}