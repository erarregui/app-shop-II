<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    //$productImage->product (para saber a que producto pertenece c/imagen)
    public function product()
    {
    	return $this->belongsTo(Product::class);
    	//Esta (this) imagen pertenece a un (belongsTo) producto determinado (Product)
    }

}
