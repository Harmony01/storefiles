<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;
use App\pcategory;
use Gloudemans\Shoppingcart\Facades\Cart;
class frontPageInfo extends Controller
{
    public function product($dash, $cd){
     $pc =Pcategory::all();
     $cc = Cart::content();	 	
     $pv = Product::where('dash',$dash)->firstOrFail();
     $pd = Product::select('*')->where('category_id',$cd)->get();	
      return view('productIndex',compact('pd','pv','pc','cc'));
    }
}
