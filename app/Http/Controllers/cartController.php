<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;
use App\pcategory;
use Gloudemans\Shoppingcart\Facades\Cart;

class cartController extends Controller
{
   public function index()
   {
   	$pc =Pcategory::all();	
   	$cc = Cart::content();
   	return view('cart', compact('cc','pc'));
   }

   public function add($id)
   {
     $p=Product::findOrFail($id);
     Cart::add($id,$p->name,1,$p->net_price);
     return redirect()->back();
   }
     public function update(Request $request, $id)
     {
      Cart::update($id, $request->qty);
      return redirect()->back();
     }

     public function destroy($id)
     {
      Cart::remove($id);
      return redirect()->back();
     }
}
