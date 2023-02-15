<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'pembayaran';
    protected $guarded = [];

    public function admin_user()
    {

        return $this->belongsTo(AdminUser::class, 'user_admin_id');
    }
    
    public function akun_pembayaran()
    {

        return $this->belongsTo(AkunPembayaran::class);
    }
}
