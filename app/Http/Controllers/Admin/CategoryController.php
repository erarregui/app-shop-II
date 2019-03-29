<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Category;

class CategoryController extends Controller
{
    public function index()
    {
    	$categories = Category::OrderBy('name')->paginate(5);
    	//devuelve        esta vista         con         estos datos
    	return view('admin.categories.index')->with(compact('categories'));  //listado
    	//le inyectamos a la vista (index.blade.php) la variable products
    }

    public function create()
    {
    	return view('admin.categories.create'); //formulario de registro
    }

    public function store(Request $request)
    {
    	//registrar el nuevo producto en la BD
    	//dd($request->all());
    	
    	//validar
    	$messages=[
    		'name.required' => 'Es necesario ingresar un nombre para la categoria',
    		'name.min' => 'El nombre de la categoria debe tener al menos 3 caracateres',
    		'name.unique'=> 'Esta categoria ya se encuentra registrada',
    		'description.required' => 'La descripcion  es un campo requerido',
    		'description.max' => 'La descripcion solo adminte hasta 250 caracateres',
    		
    	];

    	$rules=[
    		'name'=> 'required|min:3',
    		'name'=> 'unique:categories,name',
    		'description'=> 'required|max:200',

    	];

    	$this->validate($request, $rules, $messages);

    	$category = new Category();

    	$category->name = $request->input('name');
    	$category->description = $request->input('description');
    	$category->save();
        
        //redirije a la ruta /admin/products
    	return redirect('/admin/categories')->with('notification', 'Categoria registrada exitosamente');
    }

    public function edit($id)
    {
    	//return "Mostrar aqui el form de edicion para el producto con id $id";
    	$category = Category::find($id);
    	return view('admin.categories.edit')->with(compact('category')); //formulario de edicion
    }

    public function update(Request $request, $id)
    {
    	//actualizar el producto
    	//dd($request->all());
    	$messages=[
    		'name.required' => 'Es necesario ingresar un nombre para la categoria',
    		'name.min' => 'El nombre de la categoria debe tener al menos 3 caracateres',
    		'description.required' => 'La descripcion  es un campo requerido',
    		'description.max' => 'La descripcion solo adminte hasta 250 caracateres',
    		
    	];

    	$rules=[
    		'name'=> 'required|min:3',
    		'description'=> 'required|max:200',
    	];

    	$this->validate($request, $rules, $messages);

    	$category = Category::find($id);
    	$category->name = $request->input('name');
    	$category->description = $request->input('description');
    	
    	$category->update(); //ACTUALIZAR
        
        //redirije a la ruta /admin/products
    	return redirect('/admin/categories')->with('notification', 'Categoria actualizada exitosamente');
        //return back()->with('notification', 'Equipo registrado exitosamente.');
    }

    public function destroy($id)
    {
    	//eliminar el producto

    	
    	$category = Category::find($id);
    	$category->delete(); //ELIMINAR
        
        //redirije a la ruta /admin/products
    	return back();
    }
}
