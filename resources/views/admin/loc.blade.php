@extends('layouts.adminLayout')
@section('styles')
<link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">
   <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
@endsection
@section('content')
<div class="row">
	<div class="col-md-4 col-md-offset-4">
	  @if(Session::has('flash_message'))
             <div class="alert success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <i class="fa fa-check"></i> {{ Session::get('flash_message') }}
              </div>
              @endif
	<form action="{{Route('add.loc')}}" method="POST">
	 {{ csrf_field() }}
	<div class="panel panel-default">
		
		  <div class="panel-heading" style="background-color: #fff;">
		  	Add District
		  </div>
		  <div class="panel-body">
		  	
		  		<div class="form-group">
		  			<label>District</label>
		  			<input type="text" name="name" class="form-control">
		  		</div>
		  		<div class="form-group">
		  			<select class="form-control" name="region_id">
		  				<option>----select Region---</option>
		  				@foreach($reg as $rg)
		  				<option value="{{$rg->id}}">{{$rg->name}}</option>
		  				@endforeach
		  			</select>
		  		</div>
		  	
		  </div>
		 	<div class="panel-footer">
		 		<div class="form-group clearfix">
		 			<button type="submit" class="btn btn-primary pull-right">submit</button>
		 		</div>
		 	</div>
		</div>
		</form> 
	</div>
</div>
@endsection
@section('script')
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="../../bower_components/fastclick/lib/fastclick.js"></script>
<script src="../../dist/js/adminlte.min.js"></script>
<script src="../../dist/js/demo.js"></script>
<script src="../../js/custom.js"></script>
@endsection
