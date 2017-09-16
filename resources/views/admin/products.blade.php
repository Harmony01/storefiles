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
          <div class="box box-primary">
            <div class="box-header">
            @if(Session::has('flash_message'))
              <div class="alert alert-success">
                  <i class="fa fa-check"></i> {{ Session::get('flash_message') }}
              </div>
             
              @endif
              <h2 class="box-title">Products</h2><br><br><br>
              <a href="" class="btn btn-flat btn-sm btn-danger pull-right" id="delete"><i class="fa fa-trash"></i>delete</a>
               <a href="" class="btn btn-flat btn-sm btn-info pull-right" id="update"><i class="fa fa-check"></i>Update</a>
              <a href="{{ Route('product.create') }}" class="btn btn-flat btn-sm btn-info pull-info"><i class="fa fa-plus"></i> new Product</a>
            </div>
            <form id="form1" method="POST" action="">
            {{ csrf_field() }}
            <div class="box-body">
              <div class="table-responsive">
              	<table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr style="background-color: #5499C7; color: #FFF">
                  <th>Select</th>
                  <th>Name</th>
                  <th>Price</th>
                  <th>Discount</th>
                  <th>Net Price</th>
                  <th>Date Posted</th>
                  <th>Manufacturer</th>
                  <th>Category</th>
                  <th>publisher</th>
                </tr>
                </thead>
                <tbody>
                @foreach($fetch as $ft)
                <tr>
                 <td><input type="checkbox" name="id[]" value="{{ $ft->id }}" required>
                 <input type="hidden" name="ids[]" value="{{ $ft->id }}" required size="3">
                 </td>
                  <td><a href="/product/{{ $ft->id }}/edit">{{ $ft->name }}</a>
                  </td>
                  <td style="font-size: 12px; color: #5499C7;">GHS<input type="text"  name="price[]" value="{{ $ft->price }}" size="3"></td>
                  <td style="font-size: 12px; color: #5499C7;"><input type="text" name="discount[]" value="{{ $ft->discount }}" size="3">%</td>
                  <td style="font-size: 12px; color: #5499C7;">GHS{{ $ft->net_price }}</td>
                  <td style="font-size: 12px; color: #5499C7;">{{ $ft->date }}</td>
                  <td style="font-size: 12px; color: #5499C7;">{{ $ft->manufacturer->name }}</td>
                  <td style="font-size: 12px; color: #5499C7;">{{ $ft->category->name }}</td>
                  <td style="font-size: 12px; color: #5499C7;">{{ $ft->publisher }}</td>
                </tr>
               @endforeach 
                </tbody>
                </table> 
              </div>
           </div>
        </form>        
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