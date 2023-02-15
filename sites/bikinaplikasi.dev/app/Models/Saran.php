<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Saran extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'saran';
    protected $guarded = [];

    public function admin_user()
    {

        return $this->belongsTo(AdminUser::class, 'admin_user_id');
    }
}
