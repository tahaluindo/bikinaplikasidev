<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'video';
    protected $fillable = ['judul', 'deskripsi', 'link'];

    public function admin_user()
    {

        return $this->belongsTo(AdminUser::class, 'admin_user_id');
    }
}
