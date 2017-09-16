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
        <div class="col-xs-12">
          <div class="box box-info">
            <div class="box-header with-border">
            @if(Session::has('flash_message'))
             <div class="alert success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <i class="fa fa-check"></i> {{ Session::get('flash_message') }}
              </div>
              @endif
              <h3 class="box-title">Latest Orders</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
                            <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
                    <th>Order ID</th>
                    <th>Name User</th>
                    <th>Location</th>
                    <th>Telephone</th>
                    <th>Status</th>
                    <th>Payment Summary</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td><a href="">{{$d->orderId}}</a></td>
                    <td>{{$d->user->name}}</td>
                    <td>{{$d->location}}</td>
                    <td>{{$d->tel}}</td>
                    <td> @if($d->status=='0')
                  <span class="label label-warning">new</span>
                  @elseif($d->status=='1')
                  <span class="label label-primary">received</span>
                  @elseif($d->status=='2')
                  <span class="label label-info">Delivery Initiated</span>
                  @elseif($d->status==3)
                  <span class="label label-success">processed</span>
                  @else
                  <span class="label label-danger">Pending</span>
                  @endif</td>
                    <td style="text-align: right; font-weight: bold;">
                    Payment Type: {{$d->paymentType}}<br>
                    Transaction Id: {{$d->tId}}<br>
                   Total Amount: GHS {{number_format($d->total_price,2)}}<br>
                    Amount Paid: GHS {{ number_format($d->amount,2)}}<br>
                      Outstanding: GHS
                        <?php 
                         $bal =$d->total_price -$d->amount;
                           if ($bal >0) {
                             echo "<span id='bal' style='color: red;'>".number_format($bal,2)."</span>";
                           }
                           else{
                            echo "<span id='bal'>".number_format($bal,2)."</span>";
                           }
                           
                         ?><br>
                      <form action="/send/payment" method="POST">
                        {{ csrf_field() }}
                        <div class="input-group">
                          <span class="input-group-addon">GHS</span>
                          <input style="width: 80%;" type="text" name="amount" class="form-control input-sm" placeholder="enter payment">
                          <button type="submit" class="btn btn-info btn-flat btn-sm">Ok</button>
                        </div>
                        <input type="hidden" name="id" value="{{$d->id}}">
                      </form>
                    </td>
                    <td>
                      <a href="/send/{{$d->orderId}}/deliver" class="btn btn-info btn-sm btn-flat" title="send delivery noticed" id="del"><i class="fa fa-truck"></i></a>
                      <a href="/send/{{$d->orderId}}/delivered" class="btn btn-success btn-sm btn-flat" title="declared delivered" id="delivered"><i class="fa  fa-bus"></i></a>
                      <a href="" class="btn btn-warning btn-sm btn-flat" title="send owing notice"><i class="fa fa-envelope"></i></a> 
                      <a href="" class="btn btn-danger btn-sm btn-flat" title="put order to pending"><i class="fa   fa-ambulance"></i></a> 
                    </td>
                  </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <h4>Products Details</h4>
              <!-- /.table-responsive -->
          <table class="table table-striped table-hover">
            <tr>
              <th>Product Name</th>
              <th>Quantity</th>
              <th>Unit Price</th>
              <th>Total Price</th>
            </tr>
            <tbody>
              @foreach($d->orderItem as $pp)
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
<style>
  .disabled{
    cursor: default;
    opacity: 0.7;
  }
</style>
<script>
  $(function () {
   var check = <?php echo $d->status;  ?>;
   if (check < 2 || check==4) {
    $('#delivered').addClass('disabled');
   }else if (check==2 || check==3){
    $('#del').addClass('disabled');
   }
 $('#delivered').click(function(e){
      var total = <?php echo $d->total_price; ?>;
      var amount = <?php echo $d->amount; ?>;
      var bal = total-amount;
      if (bal > 0) {
        e.preventDefault();
       alert('Delivery cannot be confirmed! Customer is owing, Delievery will only be confirmed when customer makes full payment. Enter Payment if customer has made full payment');

      }
    }); 

  })
  
</script>
@endsection