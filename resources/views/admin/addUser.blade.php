@extends('layouts.adminLayout')
@section('styles')
 <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="../../bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="../../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="../../plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="../../bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="../../plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../../bower_components/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
@endsection
@section('content')
<div class="row">
		<div class="col-md-12">
		 <div class="box box-primary">
		    <div class="box box-body">
		    @if($errors->any())
                 <div class="alert alert-danger">
                   @foreach($errors->all() as $error)
                     <p><i class="fa fa-times"></i> Error! {{ $error }}</p>
                   @endforeach
                 </div>
                @endif
		     <h3><i class="fa fa-plus"></i>Add new User</h3>
		    <hr>
		    <a href="{{ route('admin.users') }}" class="btn btn-sm btn-flat btn-info pull-right" title="View added users"><i class="fa  fa-hand-o-right"></i> Users</a>
		    <br>
		    <form id="input-user" method="post" action="/admin/new-user">
		    	{{ csrf_field() }}
		    	<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
		    		<label><i class="fa fa-user"></i> User Name</label>
		    		<input type="text" name="name" class="form-control input-lg" value="{{ old('name') }}" required>
		    		 @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
		    	</div>
		    	<div class="form-group{{ $errors->has('position') ? ' has-error' : '' }}">
		    		<label><i class="fa fa-cubes"></i> Position</label>
		    		<input type="text" name="position" class="form-control input-lg" value="{{ old('position') }}" required>
		    		 @if ($errors->has('position'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('position') }}</strong>
                                    </span>
                                @endif
		    	</div>
		    	<div class="row">
		    		<div class="col-md-6">
		    		  <div class="form-group{{ $errors->has('telephone') ? ' has-error' : '' }}">
		    		    <label><i class="fa fa-phone"></i> Telephone</label>
		    		    <input type="tel" name="telephone" class="form-control" value="{{ old('telephone') }}" required>
		    		     @if ($errors->has('position'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('position') }}</strong>
                                    </span>
                                @endif
		    	     </div>
		    		</div>
		    		<div class="col-md-6">
		    		  <div class="form-group">
                        <label><i class="fa  fa-legal (alias)"></i> User Role</label>
                          <select class="form-control select2" name="role[]" multiple="multiple" data-placeholder="Select User Role"
      style="width: 100%;">
                            @foreach($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                      </div>	
		    		</div>
		    	</div>
		    	<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
		    		<label><i class="fa  fa-envelope"></i> Email</label>
		    		<input type="email" name="email" class="form-control input-lg" value="{{ old('email') }}" required>
		    		 @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
		    	</div>
		    	<input type="hidden" name="image" value="ceo.jpg">
		    	<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
		    		<label><i class="fa  fa-lock"></i> Password</label>
		    		<input type="password" name="password" class="form-control input-lg" required>
		    		 @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
		    	</div>
		    	<div class="form-group">
		    		<label><i class="fa  fa-lock"></i> Verify Password</label>
		    		<input type="password" name="password_confirmation" class="form-control input-lg" required>
		    	</div>
		    	<button type="submit" class="btn btn-flat btn-primary btn-lg pull-right"><i class="fa fa-plus"></i> Add User</button>
		    </form>
		    </div>
		</div>
	</div>
</div>
 
@endsection
@section('script')

<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="../../bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="../../plugins/input-mask/jquery.inputmask.js"></script>
<script src="../../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="../../plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="../../bower_components/moment/min/moment.min.js"></script>
<script src="../../bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="../../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap color picker -->
<script src="../../bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="../../plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll -->
<script src="../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="../../plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="../../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<script>
      //Initialize Select2 Elements
    $('.select2').select2()

    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    ) 
</script>
@endsection