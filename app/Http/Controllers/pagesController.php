<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pcategory;
use App\category;
use App\product;
use Gloudemans\Shoppingcart\Facades\Cart;

class pagesController extends Controller
{
    public function index($name, $id)

    {
      $cc = Cart::content();
      $pd = Product::where('category_id',$id)->select('*')->get();
      $ct = Category::where('id',$id)->firstOrFail();
      $ca = Category::all();
       $pc =Pcategory::all();		
       return view('Pages', compact('pc','pd','ct','ca','cc')); 
    }
}
