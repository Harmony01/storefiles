<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;
use App\pcategory;
use Gloudemans\Shoppingcart\Facades\Cart;

class frontPage extends Controller
{
    public function index(){
   	$cc = Cart::content(); 	
    $pc =Pcategory::all();	
     $pd = Product::select('*')->orderby('created_at', 'desc')->get(); 	
    	return view('main', compact('pd','pc','cc'));
    }
}
