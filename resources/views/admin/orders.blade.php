@extends('layouts.adminLayout')
@section('styles')
<link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="../../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">
   <link rel="stylesheet" href="../../css/custom.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
@endsection
@section('content')
<div class="row">
  <div class="col-md-4">
     <div class="info-box bg-aqua">
            <span class="info-box-icon"><i class="ion-ios-chatbubble-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">New Orders</span>
              <span class="info-box-number">{{$nc->total()}}</span>

              <div class="progress">
                <div class="progress-bar" style="width: {{($nc->total()/$d->total())*100}}%"></div>
              </div>
                 <span class="progress-description">
                    {{($nc->total()/$d->total())*100}}% of Total orders
                  </span>             
            </div>
            <!-- /.info-box-content -->
        </div>
  </div>
  <div class="col-md-4">
     <div class="info-box bg-green">
            <span class="info-box-icon"><i class="ion-ios-chatbubble-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">delivered</span>
              <span class="info-box-number">{{$dp->total()}}</span>

              <div class="progress">
                <div class="progress-bar" style="width: {{($dp->total()/$d->total())*100}}%"></div>
              </div>
                <span class="progress-description">
                    {{($dp->total()/$d->total())*100}}% of Total orders
                  </span>
            </div>
            <!-- /.info-box-content -->
        </div>
  </div>
  <div class="col-md-4">
     <div class="info-box bg-red">
            <span class="info-box-icon"><i class="ion-ios-chatbubble-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Pending Orders</span>
              <span class="info-box-number">{{$po->total()}}</span>

              <div class="progress">
                <div class="progress-bar" style="width: {{($po->total()/$d->total())*100}}%"></div>
              </div>
              <span class="progress-description">
                    {{($po->total()/$d->total())*100}}% of Total orders
                  </span>
            </div>
            <!-- /.info-box-content -->
        </div>
  </div>
</div>
<div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header">
            @if(Session::has('flash_message'))
              <div class="alert alert-success">
                  <i class="fa fa-check"></i> {{ Session::get('flash_message') }}
              </div>
             
              @endif
              <h2 class="box-title">Orders</h2><br><br><br>
              <a href="{{ Route('product.create') }}" class="btn btn-flat btn-sm btn-info pull-info"><i class="fa fa-plus"></i> new Product</a>
            </div>
            <div class="box-body">
              <div class="table-responsive">
              	<table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr style="background-color: #5499C7; color: #FFF">
                  <th>OrderId</th>
                  <th>Customer</th>
                  <th>Location </th>
                  <th>Telephone</th>
                  <th>Email</th>
                  <th>Total Amount</th>
                  <th>Pmt type</th>
                  <th>Date</th>
                  <th>Status</th>

                </tr>
                </thead>
                <tbody>
                @foreach($nd as $ft)
                <tr>
                  <td><a href="/product/{{ $ft->id }}/edit">{{ $ft->orderId }}</a>
                  </td>
                  <td style="font-size: 12px; color: #5499C7;">GHS{{ $ft->user->name }}</td>
                  <td style="font-size: 12px; color: #5499C7;">{{ $ft->location }}</td>
                  <td style="font-size: 12px; color: #5499C7;">{{ $ft->tel }}</td>
                  <td style="font-size: 12px; color: #5499C7;">{{ $ft->user->email }}</td>
                  <td style="font-size: 12px; color: #5499C7; text-align: right;">GHS {{ $ft->total_price}}</td>
                  <td style="font-size: 12px; color: #5499C7;">{{ $ft->paymentType }}</td>
                  <td style="font-size: 12px; color: #5499C7;">{{ $ft->created_at }}</td>
                  <td> @if($ft->status=='0')
                  <span class="label label-warning">new</span>
                  @elseif($ft->status=='1')
                  <span class="label label-primary">received</span>
                  @elseif($ft->status=='2')
                  <span class="label label-info">Payment confirmed</span>
                  @elseif($ft->status==3)
                  <span class="label label-success">processed</span>
                  @else
                  <span class="label label-danger">Pending</span>
                  @endif
                  </td>
                </tr>
               @endforeach 
                </tbody>
                </table> 
              </div>
           </div>        
      </div>      
    </div>        
 </div>           
@endsection
@section('script')
 <script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="../../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="../../bower_components/fastclick/lib/fastclick.js"></script>
<script src="../../dist/js/adminlte.min.js"></script>
<script src="../../dist/js/demo.js"></script>
<script src="../../js/custom.js"></script>

<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
@endsection