<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //$product->category

    public function category()
    {

    	return $this->belongsTo(Category::class);
    	//un producto ($this) pertenece (belongsTo) a una categoria (Category)
		// 			    esto 	    
    }

        //cuando tengamos un objeto product vamos a quere acceder a sus imagenes
        //a trvez de images
        //product->images
    public function images()
    {
    	return $this->hasMany(ProductImage::class);
    				     	    
    }
}
