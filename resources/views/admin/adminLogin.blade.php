<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Emmat Mall</title>
  
  
  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Open+Sans:600'>

      <link rel="stylesheet" href="css/login.css">
      <link rel="stylesheet" href="css/bootstrap.css">

  
</head>

<body>
  <div class="login-wrap">
    
	<div class="login-html">
	 <div class="foot-lnk">
	  <img src="images/logo.jpg" class="img-responsive">
					<a href="#">Adminstrative login page</a>
		</div>
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
		<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab"></label>
		<div class="login-form">
		  <form method="post" action="{{ route('admin.login') }}">
		   {{ csrf_field() }}
			<div class="sign-in-htm">
				<div class="group{{ $errors->has('email') ? ' has-error' : '' }}">
					<label for="user" class="label">Username</label>
					<input id="user" type="email" class="input" name="email" value="{{ old('email') }}" required autofocus>
					 @if ($errors->has('email'))
                                    <span class="help-block" style="color: red;">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
				</div>
				<div class="group{{ $errors->has('password') ? ' has-error' : '' }}">
					<label for="pass" class="label">Password</label>
					<input id="pass" type="password" class="input" data-type="password" name="password">
					 @if ($errors->has('password'))
                                    <span class="help-block" style="color:red;">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
				</div>
				<div class="group">
					<input id="check" type="checkbox" class="check" checked>
					<label for="check"><span class="icon"></span> Keep me Signed in</label>
				</div>
				<div class="group">
					<button type="submit" class="button">Sign In</button>
				</div>
		  </form>		
				<div class="hr"></div>
				<div class="foot-lnk">
					<a href="">Forgot Password?</a>
				</div>
			</div>
		</div>
	</div>
</div>
  
  
</body>
</html>
