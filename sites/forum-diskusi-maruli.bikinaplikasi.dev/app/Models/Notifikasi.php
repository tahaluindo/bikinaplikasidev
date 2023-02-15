<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notifikasi extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'notifikasi';

    public function post() {
        return $this->belongsTo(Post::class);
    }

    public function dari_user() {
        return $this->belongsTo(User::class, 'dari_user', 'id');
    }

    public function ke_user() {
        return $this->belongsTo(User::class, 'ke_user', 'id');
    }
}
