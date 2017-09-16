<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\pcategory;
use App\order;

class userController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
  
  public function index(){
  	$pc = Pcategory::all();
  	return view('orders', compact('pc'));
  }
  public function show($id){
  	$pc = Pcategory::all();
  	$od = Order::findOrFail($id);
  	return view('orderView', compact('pc','od'));
  }
}
