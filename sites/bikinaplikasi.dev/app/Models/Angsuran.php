<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Angsuran extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'angsuran';
    protected $guarded = [];

    public function user()
    {

        return $this->belongsTo(User::class);
    }
    
    public function admin_user()
    {

        return $this->belongsTo(AdminUser::class, 'user_id', 'id');
    }
    
    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class);
    }
    
    public function tripay()
    {
        return $this->hasOne(Tripay::class);
    }

    public function voucher()
    {
        
        return $this->belongsTo(Voucher::class, 'voucher_id');
    }
}
