<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
   //$category->products

    public function products()
    {
    	return $this->hasMany(Product::class);
    	//esto ($this) tiene muchos (hasMany) productos (Product)
    }

    public function getFeaturedImageUrlAttribute()
    {
    	$featuredProduct = $this->products()->first();
    	return $featuredProduct->featured_image_url;
    }
}
