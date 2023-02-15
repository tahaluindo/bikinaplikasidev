<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PerpanjanganSewa extends Model
{
    //
    protected $guarded = [];
    protected $table = 'perpanjangan_sewas';

    public function tagihan()
    {
        return $this->belongsTo(\App\Tagihan::class, 'tagihan_id', 'invoice_id');
    } 
}
