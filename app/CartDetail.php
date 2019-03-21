<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartDetail extends Model
{
    //un detalle de compra puede tener solo un producto asociado
    //CartDetail N      1 Product
    public function product()
    {
    	return $this->belongsTo(Product::class);
    }
}
