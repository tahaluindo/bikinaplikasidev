<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjual extends Model
{
    use HasFactory;
    protected $table = 'penjual';
    protected $guarded = [];
    public $timestamps = false;

    public function menus()
    {

        return $this->hasMany(Menu::class);
    }  

    public function user()
    {

        return $this->belongsTo(User::class);
    }


}
