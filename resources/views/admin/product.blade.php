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
<!--==============/-->
<div class="row">
  <form id="input-product" method="POST" action="" enctype="multipart/form-data">
                        {{ csrf_field() }}
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading" style="background-color: #fff;">Product's Information</div>
                <div class="panel-body">
                  <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
		    		 <label><i class="fa fa-cubes"></i> Product's Name</label>
		    		   <input type="text" name="name" class="form-control input-lg" value="{{$read->name }}" required>
		    		    @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
		    	 </div>
                  <div class="form-group">
                  	<label>Products Description</label>
                  	 <textarea class="form-control" name="discription">{{ $read->discription}}</textarea>
                  </div>
                     <textarea id="editor1" name="detail" rows="10" cols="80">{{$read->detail }}</textarea>  
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading" style="background-color: #fff;">Product's Main Image</div>
                <div class="panel-body">
                 <div class="row">
                   <div class="col-sm-6">
                    <p></p>
                     <img src="../../products/{{$read->image}}" class="img-responsive img-thumbnail">
                       <input type="file" name="file" class="imageUpdate" id="imageUpdate"><br><br>
                   </div>
                  </div>
                </div>   
                   <div class="panel-footer">
                   <label for="imageUpdate" class="imageLable"><span id="show"><i class="fa fa-upload"></i> Upload new</span></label> <button type="submit" formaction="/products/image/{{$read->id}}" class="btn btn-primary">Update</button>
                   </div>
               </div>  
        </div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading" style="background-color: #fff;">Product's Pricing Detals</div>
                <div class="panel-body">
                 <label>Actual Price</label>
                  <div class="input-group">
		    		<span class="input-group-addon">GHS</span>
		    		  <input type="text" id="price" name="price" class="form-control input-lg" placeholder="Actual price" oninput="calculate()" value="{{$read->price}}" required>
		    	  </div>
                  <span id="check1" style="color: red;"></span>
                  <br>
                  <label>Discount</label>
                  <div class="input-group">
		    		<input type="text" id="discount" name="discount" class="form-control input-lg" oninput="calculate()" required value="{{$read->discount}}">
		    		<span class="input-group-addon">%</span>
		    	 </div>
                 <span id="check2" style="color: red;"></span>
                 <br>
                 <label>Net Price</label>
                 <div class="input-group">
		    		<span class="input-group-addon">GHS</span>
		    		 <input type="text" id="nprice" name="net_price" class="form-control input-lg" value="{{$read->net_price}}" required>
		    	</div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading" style="background-color: #fff;">Product's Categories and Manufacturers</div>
                <div class="panel-body">
                 <label>Prduct's Category</label><br>
		    			<select class="category" name="category_id" id="category">
		    		        <option value="{{$read->category->id}}">{{$read->category->name}}</option>
		    		        @foreach($fetch as $ft)
		    		    	<option value="{{ $ft->id }}">{{ $ft->name }}</option>
		    		    	@endforeach
		    		    </select> <a href="#" data-toggle="modal" data-target="#cat" class="btn btn-default" title="Add new category"><i class="fa fa-plus"></i></a><br>
                  <br>
                  <label>Prduct's Manufacture</label><br>
		    			<select class="category" name="manufacturer_id" id="category">
		    		        <option value="{{$read->manufacturer->id}}">{{$read->manufacturer->name}}</option>
		    		        @foreach($man as $m)
		    		    	<option value="{{ $m->id }}">{{ $m->name }}</option>
		    		    	@endforeach
		    		    </select> <a href="#" data-toggle="modal" data-target="#man" class="btn btn-default" title="Add new Manufaturer"><i class="fa fa-plus"></i></a>
                 <br>
                 
                </div>
                 <div class="panel-footer">
                 <div class="form-group clearfix">
                 	<button type="submt" formaction="/products/{{$read->id}}" class="btn btn-info pull-right">Update</button>
                 </div>
                 </div>
            </div>

              <div class="panel panel-default">
              <div class="panel-heading" style="background-color: #fff;">Other Images</div>
                <div class="panel-body">  
                 <div class="row" id="otherImage">
                   @forelse($read->images as $img)
                   <div class="col-xs-3">
                    <input type="checkbox" name="id[]" value="{{ $img->id }}">
                     <img src="../../products/{{$img->name}}" class="img-responsive img-rounded">
                   </div>
                  @empty
                  <p>Product has no other image</p>
                  @endforelse 
                 </div>
                </div> 
                 <div class="panel-footer">
                   <input type="file" name="image" class="imageUpdate" id="imageUpdate1">
                       <label for="imageUpdate1" class="imageLable"><span id="show1"><i class="fa fa-upload"></i> Upload More</span></label> <button type="submit" formaction="/product/more-image" class="btn btn-primary btn-flat" title="add new image"><i class="fa fa-plus"></i></button> <button type="submit" formaction="/delete" class="btn btn-flat btn-danger" title="delete selected image"><i class="fa fa-trash"></i></button>
                 </div>
            </div>   
        </div>
        <input type="hidden" name="product_id" value="{{$read->id}}">
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
              <label>categry name</label>
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
</script>
@endsection