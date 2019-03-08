<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductImage;
use File;

class ImageController extends Controller
{
    public function index($id)
    {

    	$product = Product::find($id);
    	$images = $product->images;

    	return view('admin.products.images.index')->with(compact('product', 'images'));
    }

    public function store(Request $request, $id)
    {
    	
    	
    	//guardr el archivo img en nuestro proyecto
    	$file = $request->file('photo'); //aqui se obtiene el archivo que se esta subiendo y lo guarda en una variabel $file
    	
    	$path = public_path() . '/images/products'; //aqui se establece la ruta donde se va a guardar la imagen
    												//public_path() es la ruta absoluta a la carpeta public
    	//aqui se establece un nombre para el archivo se compone de un id unico "uniqid()" concatenado con el nombre
    	//origial del archvo "$file->getClientOrigianlName()"
    	$fileName = uniqid() . $file->getClientOriginalName();
		//aqui damos la orden para que el archivo se guarde en $path con el nombre $fileName
    	//$moved para saber si se ha guardado correctamente
    	$moved = $file->move($path, $fileName);

    	//crear 1 registro en la tabla pruduct_images
    	if ($moved){
    		$productImage = new ProductImage();
    		$productImage->image = $fileName;
    		$productImage->product_id = $id;
    		$productImage->save();
    	}

    	return back();
    }

    public function destroy(Request $request, $id) //usamos la clase Request
    {
    	//eleiminar el archivo
    	$productImage = ProductImage::find($request->input('image_id'));
    	//usando $request_>inmput podemos accder a un parametro que forma parte de la solicitud (request) usado en "<input type="hidden" name="image_id" value="{{ $image->id }}">"
    	//si la el $productImage comienza con HTTP la variable $deleted es = true
    	//de lo contrario es una imagen alaojada en el servidor local 
    	if (substr($productImage->image, 0, 4) === "http") {
    		$deleted = true;
    	}else {
    		$fullPath = public_path() . '/images/products/' . $productImage->image;
    		$deleted = File::delete($fullPath);
    	}

    	//eliminar el registro de l aimg en la bd
    	if ($deleted) {
    		$productImage->delete();
    	}

    	return back();



    }
}
