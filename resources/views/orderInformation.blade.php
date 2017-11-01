@extends('layouts.frontPage')
@section('title')
Order and Payment
@endsection
@section('styles')
<link href="../../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" type="text/css" href="../../css/jquery-ui.css">
<link href="../../css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="../../css/font-awesome.css" rel="stylesheet"> 
<link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
<style type="text/css">
  .alert{
    color: red;
  }
 .inf{
  font-style: italic;
   font-size: 10px;
 }
</style>
@endsection
@section('content')
<div class="page-head_agile_info_w3l">
		<div class="container">
			<h3><span>Order And Payment Information</span></h3>
			<!--/w3_short-->
				 <div class="services-breadcrumb">
						<div class="agile_inner_breadcrumb">

						   <ul class="w3_short">
								<li><a href="index.html">Home</a><i>|</i></li>
								<li>Order</li>
							</ul>
						 </div>
				</div>
	</div>
</div><br>
<div class="container">
	<div class="row">
    <form id="payment" action="{{route('order.store')}}" method="POST">
      {{ csrf_field() }}	
		<div class="col-md-6">  
			<div class="panel panel-default">
				<div class="panel-heading" style="background-color: #fff;">
					<h3>Delivery Information</h3>
				</div>
				<div class=" panel-body">
                      <div class="form-group">
                        <label>Location and Address <span style="color:red;">*</span></label>
                 	    <textarea name="location" class="form-control" required></textarea>
                      </div>
                      <div class="form-group">
                        <label>Telephone Number  <span style="color:red;">*</span></label><br>
                        <span class="text-muted inf" id="telCheck">
                          Eg 0546XXXXXX
                        </span>
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-phone"></i>+233</span>
                 	          <input type="text" name="tel" class="form-control" id="tel" required>
                          </div>  
                       </div>
                  <div class="form-group">
                    <label id="regCheck">Select Region <span style="color:red;">*</span></label>
                    <select class="form-control" name="region_id" id="reg">
                      <option>--please select--</option>
                      @foreach($reg as $rg)
                      <option value="{{$rg->id}}">{{$rg->name}}</option>
                      @endforeach 
                    </select>
                  </div>
                  <div class="form-group">
                    <label id="disCheck">Select District <span style="color:red;">*</span></label>
                    <select class="form-control" name="disctrict_id" id="dis">
                      <option>--please select--</option>
                  </select>
                  </div>
                  <input type="hidden" name="Dprice" id="dprice"> 
                  <div class="form-group">
                        <label>Additional Information <span style="color:red;">*</span></label><br>
                        <span class="text-muted" style="font-style: italic; font-size: 10px;">Tell us the size of clothing all foot wear you need if such items are included in your order. eg you can tell us you need small, medium and larg of cloth selected or size of footwear</span>
                      <textarea name="Information" class="form-control" required></textarea>
                  </div>
                  <div class="form-group">
                        <label>Provide reference</label><br>
                        <span class="text-muted inf">Please provide the number of the person who introduced you to Emmat Mall</span>
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-phone"></i>+233</span>
                            <input type="text" name="reference" class="form-control">
                          </div>  
                  </div>
                  <input type="hidden" name="status" value="0">
                  <input type="hidden" name="total_price" value="<?php echo str_replace(",","", Cart::total()) ?>">
                  <input type="hidden" name="orderId" value="<?php  echo uniqid(); ?>">    
				</div>				
			</div>
     
		</div>
  <div class="col-md-6">
    <div class="panel panel-default" style="border: none;">
        <div class="panel-heading">
          <h3>You have selected These Goods</h3>
        </div>
        <div class=" panel-body">
         <div class="table-responsive">
          <table class="table table-hover table-striped">
            <tr>
              <th>Product</th>
              <th>Quantity</th>
              <th>Price (GHS)</th>
              <th></th>
            </tr>
            <tbody>
            @foreach($cc as $c)
              <tr>
               <form method="post" action="cartUpdate/{{$c->rowId}}" id="cart-form">
               {{ csrf_field() }}
               <td>{{$c->name}}</td>
               <td>
               <input style="width: 20%;" type="text" name="qty" value="{{$c->qty}}">
               <button class="btn btn-sm btn-flat btn-success" title="change Quantity"><i class="fa fa-pencil"></i></button>
               </td>

               <td>{{$c->price}}</td>
               <td><a href="/cartDelete/{{$c->rowId}}" class="btn btn-flat btn-sm btn-danger" title="remove item"><i class="fa fa-times"></i></a></td>
               </form>        
              </tr>
           @endforeach  
            </tbody>
          </table>
        </div>
          <hr>
          <table class="table">
            <tr>
                <th style="text-align: right;">
                <span style="text-decoration: underline;">Summary</span><br>
                Total Items: {{Cart::count()}}<br>
                Sub Tatal: GHS {{Cart::subtotal()}}<br>
                Tax component: GHS {{Cart::tax()}}<br>
                Total Price: GHS {{Cart::total()}}
                <hr>
                <span style="color: red"  id="dp"></span><br>
                </th>
              </tr> 
          </table>
        </div>
      </div>
            <div class="panel panel-default" id="paymentPanel">
        <div class="panel-heading" style="background-color: #fff;">
         <h3> Payment</h3> 
        </div>
        <div class="panel-body">
                   <label>select Payment type</label>
                   <br>
                   <br>
                    <div class="form-group">
                      <input type="radio" name="paymentType" value="mtn mobile money" id="mtn">
                      <label><img src="../../images/mtnmoney.jpg" id="network"></label><br>
                    </div>
                    <div class="form-group">
                      <input type="radio" name="paymentType" value="vodafone cash" id="vodafone">
                      <label><img src="../../images/vodafonmoney.jpg" id="network"></label>
                    </div>
                    <div class="form-group">
                      <input type="radio" name="paymentType" value="Tigo cash" id="tigo">
                      <label><img src="../../images/tigomoney.jpg" id="network"></label>
                    </div>
                    <div class="form-group">
                      <input type="radio" name="paymentType" value="Aitel cash" id="aitel">
                      <label><img src="../../images/artelmoney.jpg" id="network"></label>
                    </div>
                    <span style="display: none;">
                      <!--modal trigger buttons-->
                      <a href="#" data-toggle="modal" data-target="#mtnT" id="mtna"></a>
                      <a href="#" data-toggle="modal" data-target="#vodafoneT" id="vodafonea"></a>
                      <a href="#" data-toggle="modal" data-target="#tigoT" id="tigoa"></a>
                      <a href="#" data-toggle="modal" data-target="#aitelT" id="aitela"></a>
                      <!--//modal trigger buttons-->
                    </span>
                    <div class="form-group">
                       <label>Amount sent <span style="color: red;">*</span></label><br>
                       <span  id="amountCheck" class="text-muted inf"></span>
                        <div class="input-group">
                         <span class="input-group-addon">GHS</span>
                      <input type="text" id="amt" name="amount" class="form-control" required>
                      </div>
                    </div>
                    <div class="form-group">
                       <label id="tIdCheck">Transaction ID <span style="color: red;">*</span></label>
                      <input type="text" name="tId" class="form-control" id="tIdCheck" required>
                    </div><br>
        </div>
        <div class="panel-footer">
        <p id="result"></p>
          <div class="form-group clearfix">
            <button type="submit" id="submit" class="btn btn-info pull-right">Submit order</button>
          </div>
        </div>
      </div>
  </div>
  </form>  		
	</div>
</div>
@include('frontPage.paymentModal')
@endsection
@section('scripts')
<script type="text/javascript" src="../../js/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="../../js/move-top.js"></script>
<script type="text/javascript" src="../../js/bootstrap.js"></script>
<script type="text/javascript" src="{{ asset('js/custom.js') }}"></script>
<script>
  $(document).ready(function(){
    //----fetch region-------------
    $('#reg').on('change', function(){
       var id = $(this).val();
       var dataSend = {'id': id};

     $.ajax({

         type: 'GET',
         url: '/fetch',
         dataType: 'html',
         data: dataSend,
         success: function(data){
          $('#dis').html(data);
         }
     })  
    });
    //--------------------------------------
    //--------------fetch price---------------
    $('#dis').on('change', function(){
       var id = $(this).val();
       var dataFetch = {'id':id};

       $.ajax({
        type:'GET',
        url:'/price',
        dataType:'json',
        data: dataFetch,
        success:function(data){
          var dPrice = data.Dprice;
          $('#dp').text('Delivery Cost : GHS' + dPrice);
          $('#dprice').val(dPrice);
        }
       })
    });
  });
</script>
@endsection
