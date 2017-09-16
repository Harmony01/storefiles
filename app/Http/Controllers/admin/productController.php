<?php

namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\category;
use App\product;
use App\manufacturer;
use App\image;
use App\pcategory;
use Session;

class productController extends Controller
{
  
   public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('editor');
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fetch = Product::select('*')->orderby('created_at', 'desc')->get();
        return view('admin.products', compact('fetch'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        $fetch = Category::all();
        $man = Manufacturer::all();
        $pc = Pcategory::all();
        return view('admin.newProduct', compact('fetch','man','pc'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request,[

            'name' => 'required',
            'image' => 'required',
            'price' => 'required',
            'discount' => 'required',
            'net_price' => 'required',
            'discription' => 'required',
            'image' => 'image|mimes:png,jpg,jpeg|max:10000',
            ]);
   if ($request->category_id=="---select category---") {
    Session::flash('Error', 'Please select news category');
       return redirect()->back();
   }
   if ($request->manufacturer_id=="---select manufacturer---") {
    Session::flash('Error', 'Please select products manufacturer');
       return redirect()->back();
   }
        $image = $request->image;
        if ($image) {
            $imageName =$image->getClientOriginalName();
            $image->move('products',$imageName);
        }

            $send = new Product;
            $send->name = $request->name;
            $send->image = $imageName;
            $send->price = $request->price;
            $send->discount = $request->discount;
            $send->net_price = $request->net_price;
            $send->discription = $request->discription;
            $send->detail = $request->detail;
            $send->publisher = $request->publisher;
           $send->dash =uniqid().str_replace(' ', '-', $request->name);
           $send->category_id = $request->category_id;
           $send->manufacturer_id = $request->manufacturer_id;
           $send->date = $request->date;
            $send->save();
            Session::flash('flash_message', 'Successful! You have added a new user');
            return redirect()->back();
    
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
        $pc = Pcategory::all(); 
        $fetch = Category::all();
        $man = Manufacturer::all();
        $read = Product::findOrFail($id);
        return view('admin.product', compact('read','fetch','man','pc'));
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

    }

    public function updates(Request $request, $id){
         $this->validate($request,[

            'name' => 'required',
            'price' => 'required',
            'discount' => 'required',
            'net_price' => 'required',
            'discription' => 'required',
            ]);

           $name= $request->name;
            $price = $request->price;
            $discount = $request->discount;
            $net_price = $request->net_price;
            $discription = $request->discription;
            $detail = $request->detail;
           $dash =uniqid().str_replace(' ', '-', $request->name);
           $category_id = $request->category_id;
           $manufacturer_id = $request->manufacturer_id;

           Product::where('id',$id)->update(['name' =>$name, 'price'=>$price, 'discount'=>$discount, 'net_price'=>$net_price, 'discription'=>$discription,'detail'=>$detail, 'dash'=>$dash, 'category_id' =>$category_id, 'manufacturer_id' => $manufacturer_id]);
           Session::flash('flash_message', 'Successful! You have updated the product');
        return redirect()->back();
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

    public function newCat(Request $request){
        Category::create($request->all());
        return redirect()->back();
    }

    public function newMan(Request $request){
        Manufacturer::create($request->all());
        return redirect()->back();
    }

    public function quickUpdate(Request $request){
        $this->validate($request,[
              'ids'=>'required'
            ]);
        foreach ($request->ids as $key => $idss) {
              $price = $request->price[$key];
              $discount =$request->discount[$key];
              $percent = $discount/100;
              $red = $percent*$price;
              $newP = $price-$red;
              $newPrice = round($newP, 2);
              $send=Product::where('id', $idss)->update(['price' => $price, 'discount' => $discount, 'net_price' => $newPrice]);
             
        }
         Session::flash('flash_message', 'Successful! update was Successful');
              return redirect()->back();

    }

    public function quickDelete(Request $request){
       $this->validate($request,[
              'id'=>'required'
            ]);
        foreach ($request->id as $key => $ids) {
             $delete = Product::find($ids);
             $delete->delete();
        }
        Session::flash('flash_message', 'Successful! You have deleted these the(se) product(s)');
            return redirect()->route('product.index');
    }

    public function Mimage(Request $request){
        $this->validate($request,[

            'image' => 'required',
            'image' => 'image|mimes:png,jpg,jpeg|max:10000',
            ]);
          $image = $request->image;
        if (!$image) {
            Session::flash('error', 'Error! Please select file!.');
           return redirect()->back(); 
        }

            $imageName =$image->getClientOriginalName();
            $image->move('products',$imageName);
            $send = new Image;
            $send->name = $imageName;
            $send->product_id = $request->product_id;
            $send->save();
            Session::flash('flash_message', 'Successful! You have added one more image');
            return redirect()->back();
    

    }

    public function image(Request $request, $id){
         $this->validate($request,[

            'file' => 'required',
            'file' => 'image|mimes:png,jpg,jpeg|max:10000',
            ]);
          $file = $request->file;
        if (!$file) {
            Session::flash('error', 'Error! Please select file!.');
           return redirect()->back(); 
        }

        $imageName =$file->getClientOriginalName();
        $file->move('products',$imageName);
        Product::where('id',$id)->update(['image' =>$imageName]);

        Session::flash('flash_message', 'Successful! You have updated product image');
            return redirect()->back();

    }

    public function delete(Request $request){
       $this->validate($request,[
              'id'=>'required'
            ]);
        foreach ($request->id as $key => $ids) {
             $delete = Image::find($ids);
             $delete->delete();
        }
        Session::flash('flash_message', 'Successful! You have deleted these the(se) product(s)');
        return redirect()->back();
    }
}
