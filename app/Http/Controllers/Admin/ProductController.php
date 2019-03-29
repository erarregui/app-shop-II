<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class ProductController extends Controller
{
    public function index()
    {
    	$products = Product::paginate(10);
    	//devuelve        esta vista         con         estos datos
    	return view('admin.products.index')->with(compact('products'));  //listado
    	//le inyectamos a la vista (index.blade.php) la variable products
    }

    public function create()
    {
    	$categories = Category::orderBy('name')->get();
        return view('admin.products.create')->with(compact('categories')); //formulario de registro
    }

    public function store(Request $request)
    {
    	//registrar el nuevo producto en la BD
    	//dd($request->all());
    	
    	//validar
    	$messages=[
    		'name.required' => 'Es necesario ingresar un nombre para el producto',
    		'name.min' => 'El nombre del producto debe tener al menos 3 caracateres',
    		'description.required' => 'La descripcion corta es un campo requerido',
    		'description.max' => 'La descripcion corta solo adminte hasta 200 caracateres',
    		'price.required' => 'Es obligatorio definir un precio para el producto',
    		'price.numeric' => 'Ingrese un precio valido',
    		'price.min' => 'No se adminten valores negativos'
    	];

    	$rules=[
    		'name'=> 'required|min:3',
    		'description'=> 'required|max:200',
    		'price' => 'required|numeric|min:0'
    	];

    	$this->validate($request, $rules, $messages);

    	$product = new Product();

    	$product->name = $request->input('name');
    	$product->description = $request->input('description');
    	$product->price = $request->input('price');
    	$product->long_description = $request->input('long_description');
        $product->category_id = $request->category_id;
    	$product->save();
        
        //redirije a la ruta /admin/products
    	return redirect('/admin/products')->with('notification', 'Producto actualizado exitosamente');
    }

    public function edit($id)
    {
    	$categories = Category::orderBy('name')->get();
        //return "Mostrar aqui el form de edicion para el producto con id $id";
    	$product = Product::find($id);
    	return view('admin.products.edit')->with(compact('product', 'categories')); //formulario de edicion
    }

    public function update(Request $request, $id)
    {
    	//actualizar el producto
    	//dd($request->all());
    	$messages=[
    		'name.required' => 'Es necesario ingresar un nombre para el producto',
    		'name.min' => 'El nombre del producto debe tener al menos 3 caracateres',
    		'description.required' => 'La descripcion corta es un campo requerido',
    		'description.max' => 'La descripcion corta solo adminte hasta 200 caracateres',
    		'price.required' => 'Es obligatorio definir un precio para el producto',
    		'price.numeric' => 'Ingrese un precio valido',
    		'price.min' => 'No se adminten valores negativos'
    	];

    	$rules=[
    		'name'=> 'required|min:3',
    		'description'=> 'required|max:200',
    		'price' => 'required|numeric|min:0'
    	];

    	$this->validate($request, $rules, $messages);

    	$product = Product::find($id);
    	$product->name = $request->input('name');
    	$product->description = $request->input('description');
    	$product->price = $request->input('price');
    	$product->long_description = $request->input('long_description');
        $product->category_id = $request->category_id;
    	$product->update(); //ACTUALIZAR
        
        //redirije a la ruta /admin/products
    	return redirect('/admin/products')->with('notification', 'Producto actualizado exitosamente');
        //return back()->with('notification', 'Equipo registrado exitosamente.');
    }

    public function destroy($id)
    {
    	//eliminar el producto

    	
    	$product = Product::find($id);
    	$product->delete(); //ELIMINAR
        
        //redirije a la ruta /admin/products
    	return back();
    }
}
