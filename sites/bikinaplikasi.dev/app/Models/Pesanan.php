<?php

namespace App\Models;

use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'pesanan';
    protected $guarded = [];

    public function user()
    {

        return $this->belongsTo(User::class);
    }

    public function admin_user()
    {

        return $this->belongsTo(AdminUser::class, 'user_id');
    }

    public function pesanan_detail()
    {

        return $this->hasOne(PesananDetail::class);
    }

    public function angsurans()
    {

        return $this->hasMany(Angsuran::class);
    }

//    public function getStatusAttribute($attribute)
//    {
////        $pesanan = Pesanan::find($this->id); 
////
////        if ($pesanan->status == 'Belum Lunas') {
////            $href = route('admin.pesanan.batalkan', $this->id);
////
////            return $pesanan->status . " <a href='$href' class='badge bg-danger' onclick='return confirm(\"Yakin akan membatalkan pesanan ini?\")'>Batalkan</a>";
////        }
////
////        return $pesanan->status;
//    }

    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {

            $model->no = IdGenerator::generate(['field' => 'no', 'table' => 'pesanan', 'length' => 10, 'prefix' => 'PES']);
        });
    }
}
