<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\order;
use App\region;
use App\disctrict;
use App\ districtPrice;
use Session;


class adminOrderController extends Controller
{
      public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function Rec($type=""){
    	$nc = Order::select('*')->where('status',0)->paginate(50);
    	$d = Order::select('*')->paginate(10);
    	$po = Order::select('*')->where('status',4)->paginate(50);
    	$dp = Order::select('*')->where('status',3)->paginate(50);
    	if ($type=='new') {
    	 $nd = Order::select('*')->where('status',0)->paginate(50);
    		return view('admin.orders',compact('nd','po','dp','nc','d'));
    	}
    	
        elseif ($type=='delivered') {
           $nd = Order::select('*')->where('status',3)->get();
        	return view('admin.orders',compact('nd','po','dp','nc','d'));
        }elseif ($type=='all') {
        	 $nd = Order::all();
        	return view('admin.orders',compact('nd','po','dp','nc','d'));
        }elseif ($type=='pending') {
        	 $nd = Order::select('*')->where('status',4)->get();
        	return view('admin.orders',compact('nd','po','dp','nc','d'));
        }
    }

   public function view($orderid, $type="")
   {
   	  if($type=='new'){
   	  	 Order::where('orderId', $orderid)->update(['status'=>1]);
   	  	 $d =Order::select('*')->where('orderId',$orderid)->firstOrFail();
         return view('admin.order',compact('d'));
   	  }
   	  elseif ($type=="viewed") {
   	  	$d =Order::select('*')->where('orderId',$orderid)->firstOrFail();
         return view('admin.order',compact('d'));
   	  }
   }

   public function status($orderid, $status=""){
   	 if ($status=='deliver') {
   	 	Order::where('orderId', $orderid)->update(['status'=>2]);
   	 	Session::flash('flash_message', 'Order delivery initiation message sent successfully!');
   	 	return redirect()->back();
   	 }

   	 elseif ($status=='delivered') {
   	 	Order::where('orderId', $orderid)->update(['status'=>3]);
   	 	Session::flash('flash_message', 'Order successfully firmed as delivered');
   	 	return redirect()->back();
   	 }

   }

   public function pay(Request $request)
   {
   	$id = $request->id;
   	$take = Order::findOrFail($id);
   	$oldAmount = $take->amount;
   	$newAmount = $request->amount + $oldAmount;

   	Order::where('id',$id)->update(['amount' => $newAmount]);
   	Session::flash('flash_message', 'Payment added successfully!');
   	 	return redirect()->back();

   }

   public function location(){
    $reg = Region::orderby('name','asc')->get();
    $dis = Disctrict::select('*')->orderby('name','asc')->get();
    return view('admin.loc', compact('reg', 'dis'));

   }
   public function fetchdis($id){
         
          $dis = Disctrict::select('*')->where('region_id', $id)->orderby('name','asc')->get();
          $reg = Region::orderby('name','asc')->get();
          return view('admin.loc', compact('reg', 'dis'));

   }

    public function add(Request $request){
    if (!empty($request->region_id)) {
      foreach ($request->name as $key => $names) {
        $data = array('region_id'=>$request->region_id, 'name'=>$names);

        Disctrict::insert($data);
      }
    }
    Session::flash('flash_message', 'District added successfully!');
    return redirect()->back();
      

   }

   public function addP(Request $request){
      foreach ($request->Dprice as $key => $d) {
        $data = array('disctrict_id' => $request->disctrict_id[$key], 'Dprice' => $d);
       DistrictPrice::insert($data) ;
       }

    Session::flash('flash_message', 'Price added successfully!');
    return redirect('/locations');
      

   }


}
