<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukTag extends Model
{
    use HasFactory;
    
    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }
    
    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }
}
