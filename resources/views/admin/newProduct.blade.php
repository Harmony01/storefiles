@extends('layouts.adminLayout')
@section('styles')
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
<link rel="stylesheet" type="text/css" href="../../css/custom.css">
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
@endsection
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="panel-default">
       <div class="panel-body">
          @if(Session::has('flash_message'))
             <div class="alert success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <i class="fa fa-check"></i> {{ Session::get('flash_message') }}
              </div>
              @endif
              @if(Session::has('error'))
             <div class="alert error alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <i class="fa fa-times"></i> {{ Session::get('error') }}
              </div>
              @endif
          @if($errors->any())
                   @foreach($errors->all() as $error)
                    <div class="alert error alert-dismissible" role="alert">
                       <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                       <i class="fa fa-times"></i> Error! {{ $error }}
                    </div>
                   @endforeach
                @endif    
       </div>
    </div>
  </div>
</div>
<!--/===================================/-->
<div class="row">
<form id="input-product" method="post" action="{{Route('product.store')}}" id="article-form" enctype="multipart/form-data">
		    	{{ csrf_field() }}
   <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading" style="background-color: #fff;">Product's Information</div>
                <div class="panel-body">
                 <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                  <label><i class="fa fa-text-height"></i> Product's Name</label>
                    <input type="text" name="name" class="form-control input-lg" value="{{ old('name') }}" required>
                       @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                   </div>
             <div class="form-group">
                <label>Product's Description</label>
                <textarea class="form-control" name="discription"></textarea>
                     @if ($errors->has('discription'))
                       <span class="help-block">
                          <strong>{{ $errors->first('discription') }}</strong>
                        </span>
                     @endif
              </div>
              <label>Full Product's Details</label>
                <textarea id="editor1" name="detail" rows="10" cols="80"></textarea>
                <input type="hidden" name="publisher" value="{{Auth::user()->name}}">
                <input type="hidden" name="date" value="<?php echo date('l, d M, Y'); ?>">
            </div>
            </div>

     </div>
            <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading" style="background-color: #fff;">Product's Categories and Manufacturers</div>
              <div class="panel-body">
                <label>Prduct's Category</label><br>
                <select class="category" name="category_id" id="category">
                  <option>---select category---</option>
                   @foreach($fetch as $ft)
                  <option value="{{ $ft->id }}">{{ $ft->name }}</option>
                  @endforeach
                </select> <a href="#" data-toggle="modal" data-target="#cat" class="btn btn-default" title="Add new category"><i class="fa fa-plus"></i></a><br>
                 <br>
                  <label>Prduct's Manufacture</label><br>
              <select class="category" name="manufacturer_id" id="category">
                <option>---select manufacturer---</option>
                  @foreach($man as $m)
                  <option value="{{ $m->id }}">{{ $m->name }}</option>
                  @endforeach
                </select> <a href="#" data-toggle="modal" data-target="#man" class="btn btn-default" title="Add new Manufaturer"><i class="fa fa-plus"></i></a>
                 
              </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading" style="background-color: #fff;">Product's Pricing Detals</div>
                <div class="panel-body">
                 <label>Actual Price</label>
                  <div class="input-group">
                    <span class="input-group-addon">GHS</span>
                      <input type="text" id="price" name="price" class="form-control input-lg" placeholder="Actual price" oninput="calculate()" required>
                   </div>
                      <span id="check1" style="color: red;"></span>
                        @if ($errors->has('price'))
                          <span class="help-block">
                            <strong>{{ $errors->first('price') }}</strong>
                          </span>
                       @endif
                <br>
                  <label>Discount</label>
                  <div class="input-group">
                     <input type="text" id="discount" name="discount" class="form-control input-lg" oninput="calculate()" required placeholder="discount">
                      <span class="input-group-addon">%</span>
                   </div>
                      <span id="check2" style="color: red;"></span>
                       @if ($errors->has('discount'))
                        <span class="help-block">
                          <strong>{{ $errors->first('discount') }}</strong>
                         </span>
                        @endif
                  <br>
                  <label>Net Price</label>
                  <div class="input-group">
                     <span class="input-group-addon">GHS</span>
                     <input type="text" id="nprice" name="net_price" class="form-control input-lg" placeholder="Net price" required>
                   </div>
                @if ($errors->has('net_price'))
                   <span class="help-block">
                        <strong>{{ $errors->first('net_price') }}</strong>
                    </span>
               @endif
                </div>
            </div>
              <div class="panel panel-default">
              <div class="panel-heading" style="background-color: #fff;">Product's Image</div>
                <div class="panel-body">  
                   <input type="file" name="image" class="imageUpdate" id="imageUpdate1">
                       <label for="imageUpdate1" class="imageLable"><span id="show1"><i class="fa fa-upload"></i> Upload image</span></label>
                       @if ($errors->has('image'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                @endif 
                </div> 
                 <div class="panel-footer">
                    <div class="clearfix">
                    	<button type="submit" class="btn btn-primary pull-right" title="add product"><i class="fa fa-plus"></i> Add product</button> 
                    </div>
                 </div>
            </div>   
        </div>
 </form>
</div>

<!--modals-->
		<div class="modal fade" id="cat" tabindex="-1" role="dialog">
			<div class="modal-dialog modal-sm">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h3>Add category</h3>
					</div>
					<div class="modal-body">
					 <form method="POST" action="{{route('category')}}">
					  {{csrf_field()}}
					 	<div class="form-group">
            <label>category name</label>
					 		<input type="text" name="name" class="form-control" placeholder="category name" required>
					 	</div>
            <div class="form-group">
             <label>Parent</label>
             <span style="color: red;">please select the right parent</span>
              <select class="form-control" name="pcategory_id">
               @foreach($pc as $pcs)
                <option value="{{$pcs->id}}">{{$pcs->name}}</option>
               @endforeach                
              </select>
            </div>
					 	<div class="form-group clearfix">
					 		<button type="submit" class="btn btn-sm btn-info btn-flat pull-right">Add</button>
					 	</div>
					 </form>
					</div>
				</div>
				<!-- //Modal content-->
			</div>
		</div>
		<div class="modal fade" id="man" tabindex="-1" role="dialog">
			<div class="modal-dialog modal-sm">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h3>Add Manufacturer</h3>
					</div>
					<div class="modal-body">
					 <form method="POST" action="{{route('man')}}">
					 {{csrf_field()}}
					 	<div class="form-group">
					 		<input type="text" name="name" class="form-control" placeholder="category name" required>
					 	</div>
					 	<div class="form-group clearfix">
					 		<button type="submit" class="btn btn-sm btn-info btn-flat pull-right">Add</button>
					 	</div>
					 </form>
					</div>
				</div>
				<!-- //Modal content-->
			</div>
		</div>
@endsection
@section('script')
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="../../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- CK Editor -->
<script src="../../bower_components/ckeditor/ckeditor.js"></script>
<script src="../../js/custom.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })

  $(document).ready(function(){
      $('#category').on('change', function(){
      	var check = $(this).val();
         if(check=="articles"){
            $('#article').fadeIn(200);
            $('#news').fadeOut(200);
         }else{
         	 $('#article').fadeOut(200);
         	  $('#news').fadeIn(200);
         }
      });
  });
</script>
@endsection