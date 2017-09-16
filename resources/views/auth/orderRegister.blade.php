@extends('layouts.userLogin')
@section('title')
Customer Registration
@endsection
@section('styles')
<link href="../../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" type="text/css" href="../../css/jquery-ui.css">
<link href="../../css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="../../css/font-awesome.css" rel="stylesheet">
<link rel="stylesheet" href="../../dist/css/AdminLTE.min.css"> 
@endsection
@section('content')
<style type="text/css">
    body{
        padding-top: 100px;
        background-color: #EEE;
    }
 </style>   
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading" style="background-color: #fff;">Register</div>
                <div class="panel-body">
                    <form method="POST" action="{{ route('order.registered') }}" id="payment">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label>Name</label>
                                <input id="name" type="text" class="form-control input-lg" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label>E-Mail Address</label>
                                <input id="email" type="email" class="form-control input-lg" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label>Password</label>
                                <input id="password" type="password" class="form-control input-lg" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group">
                            <label>Confirm Password</label>
                                <input id="password-confirm" type="password" class="form-control input-lg" name="password_confirmation" required>
                        </div>

                        <div class="form-group">
                            <div class="clearfix">
                                <button type="submit" class="btn btn-primary pull-right">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
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
