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

    // accesor Featured_Image_Url featured_image_url
    public function  getFeaturedImageUrlAttribute()
    {
        //obtenemos la imagen destacada de este ($this) producto
        $featuredImage = $this->images()->where('featured', true)->first();
        //en el caso de que el producto no tenga una imagen destacada
        if (!$featuredImage){
            $featuredImage = $this->images()->first();
        }

        if ($featuredImage){
            return $featuredImage->url; //url es un accesor creado en el modelo ProductImage
        }

        //devolver una imagen por defecto
        return '/images/products/default.png';
    }

    public function getCategoryNameAttribute()
    {
        //Si la categoria del producto extiste devolvemos su categoria si no General
        if ($this->category)
            return $this->category->name;

        return 'General';
    }
}
