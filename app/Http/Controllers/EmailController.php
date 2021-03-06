<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Mail\NewOrder;
use App\Mail\NewMessage;
use Mail;


class EmailController extends Controller
{
   public function send(Request $request)
   {
   	/*$name = $request->input('name');
   	$email = $request->input('email');
   	$message = $request->input('message');*/

   	//dd($name, $email, $message);
   	//dd($request->all());
   	$admins = User::where('admin', true)->get();
    Mail::to($admins)->send(new NewMessage($request->name, $request->email, $request->consult));
    $notification = 'Tu consulta ha sido enviada correctamente. Te contactaremos pronto!';
    
    return back()->with(compact('notification'));
    
   }
}
