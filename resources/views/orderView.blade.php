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
		<div class="col-md-12">
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Your orders</h3>
        </div>
        <div class="box-body">
         @if(Session::has('flash_message'))
             <div class="alert success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <i class="fa fa-check"></i> {{ Session::get('flash_message') }}
              </div>
              @endif
          <table class="table table-striped table-hover">
            <tr>
              <th>Product Name</th>
              <th>Quantity</th>
              <th>Unit Price</th>
              <th>Total Price</th>
            </tr>
            <tbody>
              @foreach($od->orderItem as $pp)
              <tr>
                <td>{{$pp->name}}</td>
                <td>{{$pp->pivot->qty}}</td>
                <td>GHS {{ number_format($pp->net_price,2)}}</td>
                <td>GHS{{ number_format($pp->pivot->total,2)}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="box-footer">
          <table class="table">
           
            <tr>
              <th style="text-align: right;">
              Order Summary<br>
                Order Status: @if($od->status=='0')
                  <span class="label label-warning">Processing...</span>
                  @elseif($od->status=='1')
                  <span class="label label-primary">received</span>
                  @elseif($od->status=='2')
                   <span class="label label-info">delivery initiated</span>
                   @elseif($od->status=='3')
                    <span class="label label-success">Delivered, Payed</span>
                   @elseif($od->status=='4')
                    <span class="label label-danger">Pending</span> 
                  @endif<br>

                  Sub Total: GHS {{number_format($od->total_price,2)}}<br>
                  Delivery Cost: GHS {{number_format($od->Dprice,2)}}<br>
                  Grand Total: GHS <?php echo number_format(($od->total_price + $od->Dprice),2); ?><br>

                  Amount Paid: GHS {{ number_format($od->amount,2)}}<br>
                  Outstanding: GHS <?php $net = ($od->total_price + $od->Dprice) - ($od->amount);
                    echo number_format($net,2);
                    ?>
              </th>
            </tr>
          </table>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
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
