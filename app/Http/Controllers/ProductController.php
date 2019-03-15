<?php

namespace App\Http\Controllers;
use App\Product;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show($id)
    {
    	$product = Product::find($id);
    	//obtenemos las imagenes asociadad al producto
    	$images = $product->images;
    	//dividimos en dos colecciones
    	$imagesLeft = collect();
    	$imagesRight = collect();
    	//aqui recorremos el array $mages y mediante la clave $key obtenemos un indice
    	//si el valor de $key es par ($key modulo % 2 =0) asignamos la imagen a la colleccion $imagesLeft con el
    	//metodo ->push, si es impar se lo asigna a la ota coleccion
    	foreach ($images as $key => $image) {
    		if ($key%2==0)
    			$imagesLeft->push($image);
    		else
    			$imagesRight->push($image);
    	}

    	return view('products.show')->with(compact('product', 'imagesLeft', 'imagesRight'));
    }
}
