<?php

namespace App\Tokoku;

use App\Tokoku\Transaction;
use Illuminate\Database\Eloquent\Model;

class Product extends Model 
{

    protected $table = 'product';
    public $timestamps = true;
    protected $fillable = array('name', 'code', 'measure_id', 'price', 'warn_stock', 'berat', 'gambar');
    protected $hidden = array('id', 'measure_id','created_at','updated_at');

    public function measure()
    {
        return $this->belongsTo('App\Tokoku\Measure','measure_id');
    } 

    public function supplier()
    {
        return $this->belongsTo('App\Tokoku\Supplier', 'supplier_id', 'id');
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function transaction()
    {
        return $this->hasOne(Transaction::class);
    }
}