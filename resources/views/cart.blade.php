@extends('layouts.frontPage')
@section('tile')
View Cart
@endsection
@section('styles')
<link href="../../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" type="text/css" href="../../css/jquery-ui.css">
<link href="../../css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="../../css/font-awesome.css" rel="stylesheet"> 
@endsection
@section('content')
<div class="page-head_agile_info_w3l">
		<div class="container">
			<h3><span>Your Cart</span></h3>
			<!--/w3_short-->
				 <div class="services-breadcrumb">
						<div class="agile_inner_breadcrumb">

						   <ul class="w3_short">
								<li><a href="index.html">Home</a><i>|</i></li>
								<li>Cart</li>
							</ul>
						 </div>
				</div>
	</div>
</div><br>
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-success">
				<div class="panel-heading">
					<h3>Cart</h3>
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
					  		</th>
					  	</tr>	
					</table>
				</div>
				<div class="panel-footer">
					<span class="clearfix">
						<a href="{{Route('order.create')}}" class="btn btn-success pull-right">Check out</a>
					</span>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('scripts')
<script type="text/javascript" src="../../js/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="../../js/move-top.js"></script>
<script type="text/javascript" src="../../js/bootstrap.js"></script>
@endsection
