<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\order;
use App\product;

class commonController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
    	$nd = Order::select('*')->where('status',0)->paginate(50);
        $d = Order::select('*')->orderby('created_at', 'desc')->paginate(8);
        $p = Product::select('*')->orderby('created_at', 'desc')->paginate(8);
        return view('admin.dashboard', compact('nd','d','p'));
    }
}
