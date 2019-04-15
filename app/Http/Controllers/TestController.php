<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Category;

class TestController extends Controller
{
    public function welcome()
    {
    	$notification='';
    	$categories = Category::has('products')->get();
    	return view('welcome')->with(compact('categories', 'notification'));
    }
}
