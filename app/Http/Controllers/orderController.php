<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\pcategory;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\mail\OrderNotice;
use App\region;
use App\disctrict;
use Session;
use Mail;
class orderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cc = Cart::content();
        $pc = Pcategory::all();
        $reg = Region::orderby('name','asc')->get();
        if (Auth::check()){
            return view('orderInformation', compact('pc', 'cc','reg'));
        }
        return view('orderLogin');
    }

    public function seek($id){
        $d = Disctrict::where('region_id', $id)->orderby('name','asc')->get();
        return view('orderInformation', compact('d'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $order = $user->order()->create([
             'tel'=>$request->tel,
             'location'=>$request->location,
             'amount'=>$request->amount,
             'tId'=>$request->tId,
             'Information'=>$request->Information,
             'reference'=>$request->refrence,
             'orderId'=>$request->orderId,
             'paymentType'=>$request->paymentType,
             'status'=>$request->status,
            'total_price'=>$request->total_price
          ]);
        $cartItems = Cart::content();
        foreach ($cartItems as $cartItem) {
            $order->orderItem()->attach($cartItem->id, [
             'qty'=>$cartItem->qty,
             'total' =>$cartItem->qty*$cartItem->price
            ]);
        }
       Mail::to('obeng066@gmail.com')->send(new OrderNotice());
     Session::flash('flash_message', 'Your Order has been successfully sent. Order will be processed as soon as posible');
       return redirect()->route('user.orders'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
