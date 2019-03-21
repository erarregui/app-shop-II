<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function update()
    {
    	//accedemos al usuario que iniciado seccion y a su carrito actual 
    	$cart = auth()->user()->cart;
    	//actualizamos la tabla 
    	$cart->status ='Pending';
    	$cart->save();

    	$notification = 'Tu pedido se ha registrado correctamente. Te contactaremos pronto via email!';
    	return back()->with(compact('notification'));
    }
}
