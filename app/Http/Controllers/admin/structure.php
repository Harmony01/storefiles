<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\pcategory;
use App\thumbnail;

class structure extends Controller
{
     public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
    	$th = Thumbnail::orderby('name', 'desc')->get();
    	$cat = Pcategory::orderby('name', 'desc')->get();
    	return view('admin.structure', compact('th', 'cat'));
    }
}
