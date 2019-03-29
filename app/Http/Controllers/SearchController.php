<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class SearchController extends Controller
{
	public function show(Request $request)
    {	
    	
        //Accedo al texto de la consulta que ha escrito el usuario  $request->input('query');
        $query = $request->input('query');
        
        //busco producto segun lo que hay en $query %$query% buca cualquie parte del texto ingresado
    	$products = Product::where('name', 'like', "%$query%")->paginate(5);
    	
    	if ($products->count() == 1) {
    		$id = $products->first()->id;
    		return redirect("products/$id"); // 'products/'.$id
    	}

    	return view('search.show')->with(compact('products', 'query'));
    }

    public function data()
    {
    	$products = Product::pluck('name');
    	return $products;
    }    
}


