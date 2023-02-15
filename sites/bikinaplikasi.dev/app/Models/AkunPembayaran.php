<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AkunPembayaran extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'akun_pembayaran';

    public function user_admin()
    {

        return $this->belongsTo(AdminUser::class);
        
    }
}
