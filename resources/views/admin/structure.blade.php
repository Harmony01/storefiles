@extends('layouts.adminLayout')
@section('styles')
<link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">
   <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" type="text/css" href="../../css/front.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
@endsection
@section('content')
<div class="row">
	<div class="col-md-6">
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
		  	Add New Thumbnail
		  </div>
		  <div class="panel-body">
                <div class="form-group">
                    <label>Thumbnail's Name</label>
		  			<input type="text" name="name" class="form-control">     
		  		 </div>
		  		 <div class="form-group">
                    <label>Description</label>
		  			<textarea name="description" class="form-control"></textarea>
		  		 </div>
		        <table class="table">
		  	<tr>
		  		<th>Asigne Menu</th>
		  		<th></th>
		  	</tr>
		  	<tbody id="tbody1">
		  		<tr>	
		  		     <td>
		  		     	<select id="dis" class="form-control" name="disctrict_id[]">
		  				<option>----select District---</option>
		  				@forelse($cat as $d)
		  				<option value="{{$d->id}}">{{$d->name}}</option>
		  				@empty
		  				<option value="0">No data</option>
		  				@endforelse
		  			  </select>
		  		     </td>
		  		     <td>
		  		     	<a href="#" class="add btn btn-flat btn-primary" title="Add another role"><i class="fa fa-plus"></i></a>

		  		     </td>
		  		</tr>
		  	</tbody>
		  </table>		  	
		 </div>
		 	<div class="panel-footer">
		 		<div class="form-group clearfix">
		 			<button id="sendDis" type="submit" class="btn btn-primary pull-right">submit</button>
		 		</div>
		 	</div>
		</div>
  </form>
    <form>
    	<div class="panel panel-default">
    	   <div class="panel-heading" style="background-color: #fff;">
    	   	 Add Menu
    	   </div>
    	   <div class="panel-body">
    	   	 <div class="form-group">
    	   	    <label>Menu's Name</label>
    	   	 	<input type="text" name="name" class="form-control">
    	   	 </div>
    	   	 <div class="form-group">
    	   	 	<select id="dis" class="form-control" name="disctrict_id[]">
		  				<option>----select District---</option>
		  				@forelse($th as $d)
		  				<option value="{{$d->id}}">{{$d->name}}</option>
		  				@empty
		  				<option value="0">No data</option>
		  				@endforelse
		  			  </select>
    	   	 </div>
    	   </div>
    	   <div class="panel-footer">
    	   	 <div class="form-group clearfix">
    	   	 	<button type="submit" class="btn btn-flat btn-primary pull-right">Add menu</button>
    	   	 </div>
    	   </div>	
    	</div>
    </form>		
	</div>
	<div class="col-md-6">
	 <div class="panel panel-default">
	 	<div class="panel-heading" style="background-color: #fff;">
	 		Thumbnails
	 	</div>
	 		<div class="panel-body">
	 			<table class="table">
	 				<tr>
	 					<th>Name</th>
	 					<th>Name</th>
	 					<th>Action</th>
	 				</tr>
	 				 @forelse($th as $t)
	 				  <tr>
	 				  <td>{{ $t->name}}</td>
	 				  <td><a href="" class="btn btn-danger"><i class="fa fa-trash"></i></a>
	 				  <a href="" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
	 				  </td>
	 				 </tr>
	 				@empty
	 				<tr>
	 					<td>No data found</td>
	 				</tr>
	 				@endforelse	
	 			</table>
	 		</div>
	 </div>
		<div class="panel panel-default">
		
		  <div class="panel-heading" style="background-color: #fff;">
		   Menus
		  </div>
		  <div class="panel-body">
		  <span>Sort By:</span>
		<form id="sendMe" action="" method="POST">
		{{ csrf_field() }} 
		  <select id="reg1" class="form-control" name="wr">
		  				  <option>----select Region---</option>
		  				  @foreach($th as $rg)
		  				  <option value="{{$rg->id}}">{{$rg->name}}</option>
		  				  @endforeach
		  </select>
       </form> 		  
 <form action="{{Route('add.price')}}" method="POST">
	 {{ csrf_field() }}

		 <table class="table">
		  	<tr>
		  		<th>Select District</th>
		  		<th>Price</th>
		  		<th></th>
		  	</tr>
		  	<tbody id="tbody2">
		  		<tr>
		  			<td>
		  				<div class="form-group">
		  			      <select id="dis" class="form-control" name="disctrict_id[]">
		  				<option>----select District---</option>
		  				@forelse($cat as $d)
		  				<option value="{{$d->id}}">{{$d->name}}</option>
		  				@empty
		  				<option value="0">No data</option>
		  				@endforelse
		  			  </select>
		  		      </div>
		  		    </td>  
		  		    <td>
		  		     	<div class="form-group">
		  			      <div class="input-group">
		  			       <span class="input-group-addon">GHS</span>
		  			       <input type="text" name="Dprice[]" class="form-control">
		  			    </div>
		  		    </div>
		  		     </td>
		  		     <td>
		  		     	<a href="#" class="add1 btn btn-flat btn-primary" title="Add another role"><i class="fa fa-plus"></i></a>

		  		     </td>
		  		</tr>
		  	</tbody>
		  </table>
		  <div class="form-group clearfix">
		 			<button type="submit" class="btn btn-primary pull-right">submit</button>
		 		</div>
		 </form>  	
		  </div>
		 	<div class="panel-footer">
		 		
		 	</div>
		</div>
	</div>
</div>
@endsection
@section('script')
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
 <script type="text/javascript">
	$('.add').on('click', function(){
      addRow();   
    });
    function addRow(){
     var addNewRow = '<tr>'+
		  		      '<td> <select class="form-control" name="disctrict_id[]"><option>----select Menu---</option>'+
		  		      '@forelse($cat as $d)'+
		  		      '<option value="{{$d->id}}">{{$d->name}}</option>'+
		  		      '@empty'+
		  		      '<option value="0">No data</option>'+
		  		      '@endforelse'+
		  		      '</select>'+
		  		      '</td>'+		
		  		     '<td>'+
		  		     '<a href="#" class="sub btn btn-flat btn-danger" title="remove"><i class="fa fa-minus"></i></a>'+
		  		     '</td>'+
		  		     '</tr>';
$('#tbody1').append(addNewRow);		  		     
		  		   
    }
$('body').delegate('.sub', 'click', function(){
  $(this).parent().parent().remove();
});
//fetch region--------------------------
 $('#reg1').on('change', function(){
 	   var id = $(this).val();
 	   $(this).parent().attr('action', '/fetchdis/'+id);
      $(this).parent().submit();
    });
 //addd and remove row for price
 	$('.add1').on('click', function(){
      addRow1();   
    });
    function addRow1(){
     var addNewRow = '<tr>'+
		  		      '<td> <select class="form-control" name="disctrict_id[]"><option>----select District---</option>'+
		  		      '@forelse($cat as $d)'+
		  		      '<option value="{{$d->id}}">{{$d->name}}</option>'+
		  		      '@empty'+
		  		      '<option value="0">No data</option>'+
		  		      '@endforelse'+
		  		      '</select>'+
		  		      '</td>'+	
		  		     '<td>'+
		  		     '<div class="input-group">'+
		  		     '<span class="input-group-addon">GHS</span>'+
		  		     '<input type="text" name="Dprice[]" class="form-control">'+
		  		     '</div>'+
		  		     '</td>'+
		  		     '<td><a href="#" class="sub1 btn btn-flat btn-danger" title="remove row"><i class="fa fa-minus"></i></a></td>'+
		  		     '</tr>';
$('#tbody2').append(addNewRow);		  		     
		  		   
    }
$('body').delegate('.sub1', 'click', function(){
  $(this).parent().parent().remove();
});
</script>
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="../../bower_components/fastclick/lib/fastclick.js"></script>
<script src="../../dist/js/adminlte.min.js"></script>
<script src="../../dist/js/demo.js"></script>
<script src="../../js/custom.js"></script>
@endsection
