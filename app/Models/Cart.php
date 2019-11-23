<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public function produk(){
        return $this->belongsTo(Produk::class, "produk_id");
    }
}
