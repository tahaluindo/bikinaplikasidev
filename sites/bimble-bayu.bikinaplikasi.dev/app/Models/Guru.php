<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    protected $table = 'guru';
    protected $guarded = [];
    public $timestamps = false;

    public function __destruct()
    {

        $this->table = strtolower($this->table);
    }

    public function mapel_details()
    {
        return $this->hasMany(MapelDetail::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}