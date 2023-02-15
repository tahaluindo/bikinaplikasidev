<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminUser extends Model
{
    use HasFactory;
    protected $table = 'admin_users';
    protected $fillable = ['name', 'email', 'username', 'password', 'provider', 'github_id', 'avatar'];
    
    public function setPasswordAttribute($value){

        $this->attributes['password'] = \Hash::make($value);
    }
}
