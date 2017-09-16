@extends('layouts.adminLayout')
@section('styles')
<link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="../../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
@endsection
@section('content')
<div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header">
            @if(Session::has('flash_message'))
              <div class="alert alert-success">
                  <i class="fa fa-times"></i> {{ Session::get('flash_message') }}
              </div>
              @endif
              <h2 class="box-title">Users</h2>
            </div>
            <div class="box-body">
              <div class="table-responsive">
              	<table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Username</th>
                  <th>Position</th>
                  <th>Email Address</th>
                  <th>Telephone</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($fetch as $ft)
                <tr>
                  <td>{{$ft->name }}</td>
                  <td>{{$ft->position }}
                  </td>
                  <td>{{$ft->email }}</td>
                  <td>{{$ft->telephone }}</td>
                  <td><a href="" class="btn btn-sm btn-flat btn-info" title="edit user"><i class="fa fa-pencil"></i></a></td>
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