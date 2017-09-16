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
              <th>Order Id</th>
              <th>Total Amount</th>
              <th>Date</th>
              <th>Status</th>
              <th></th>
            </tr>
            <tbody>
              @forelse(Auth::user()->order as $orders)
              <tr>
                <td>{{$orders->orderId}}</td>
                <td>GHS{{$orders->total_price}}</td>
                <td>{{$orders->created_at}}</td>
                <td>
                   @if($orders->status=='0')
                  <span class="label label-warning">Processing...</span>
                  @elseif($orders->status=='1')
                  <span class="label label-primary">received</span>
                  @elseif($orders->status=='2')
                   <span class="label label-info">delivery initiated</span>
                   @elseif($orders->status=='3')
                    <span class="label label-success">Delivered, Payed</span>
                   @elseif($orders->status=='4')
                    <span class="label label-danger">Pending</span> 
                  @endif
                </td>
                <td><a href="{{Route('view.order',$orders->id)}}">View Details</a></td>
              </tr>
              @empty
              <tr>You have no orders</tr>
              @endforelse
            </tbody>
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
