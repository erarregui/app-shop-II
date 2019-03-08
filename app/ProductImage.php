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

    //accesors 
    //se crea un metodo getXAtrribute don de X es el nombre del metodo 
    //campo calculado "Url"
    public function getUrlAttribute()
    {
    	//  si el atribuo image empieza con http 
    	if (substr($this->image, 0, 4) === "http"){
    	// se devuelve la ruta original 	
    		return $this->image;
    	}

    	//de lo contrario se devuelve la imagen guardada en forma local
    	return '/images/products/' . $this->image;
    	//con esto colocamos exactamente lo que tiene que ir en el atributo
    	//src de la etiqueta img en HTM
    }

}
