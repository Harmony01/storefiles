<div class="header" id="home">
	<div class="container">
		<ul>
		  @if (Auth::guest())
		    <li> <a href="{{ route('login') }}" ><i class="fa fa-unlock-alt" aria-hidden="true"></i> Sign In </a></li>
			<li> <a href="{{ route('register') }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sign Up </a></li>
		 @else
		  <li><i class="fa fa-user" aria-hidden="true"></i>Hi, {{Auth::user()->name}}</li>
		  <li> <a href="{{Route('user.orders')}}" title="track orders"><i class="fa fa-unlock-alt" aria-hidden="true"></i>Your orders</a></li>
			<li>
			 <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
			 </li>
		@endif		
			<li><i class="fa fa-envelope-o" aria-hidden="true"></i> <a href="mailto:info@example.com">info@example.com</a></li>
		</ul>
	</div>
</div>