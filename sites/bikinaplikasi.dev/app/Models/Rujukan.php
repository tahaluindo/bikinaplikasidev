<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rujukan extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'rujukan';
    protected $fillable = ['user_admin_id', 'user_admin_id_r'];
    
    public function user_admin()
    {
        
        return $this->belongsTo(AdminUser::class, 'user_admin_id', 'id');
    }
    
    public function user_admin_r()
    {
        
        return $this->belongsTo(AdminUser::class, 'user_admin_id_r', 'id');
    }
}
