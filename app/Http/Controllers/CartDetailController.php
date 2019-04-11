<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CartDetail;

class CartDetailController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function store(Request $request)
    {
    	//generamos una nueva instancia del objeto CartDetail
    	$cartDetail = new CartDetail();
    	$cartDetail->cart_id = auth()->user()->cart->id;
    	//en el campo product_id cargamos lo que nos devuelve el request->product_id
    	$cartDetail->product_id = $request->product_id;
    	//en el campo quantity cargamos lo que nos devuelve el request->quantity
    	$cartDetail->quantity = $request->quantity;
    	//grabamos el nuevo registro
    	$cartDetail->save();

    	$notification = 'El producto se ha agregado correctamente al carrito de compras.';
    	return back()->with(compact('notification'));
    }

    public function destroy(Request $request)
    {
    	//obtenemos del campo oculto ($request->cart_detail_id)
    	$cartDetail = CartDetail::find($request->cart_detail_id);
    	if ($cartDetail->cart_id == auth()->user()->cart->id)
    		$cartDetail->delete();
    	    	
    	$notification = 'El producto se ha eliminado del carrito de compras correctamente';
    	return back()->with(compact('notification'));
    }
}
