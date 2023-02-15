<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    protected $table = 'pasien';
    protected $guarded = [];
    public $timestamps = false;

//

    public function __destruct()
    {

        $this->table = strtolower($this->table);
    }

    public function user_id()
    {
        return $this->belongsTo('App\Models\User');
    }
    
}