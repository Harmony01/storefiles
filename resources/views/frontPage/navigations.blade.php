@include('frontPage.hearder1')
@include('frontPage.hearder2')
<div class="ban-top">
	<div class="container">
		<div class="top_nav_left">
			<nav class="navbar navbar-default">
			  <div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
				  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse menu--shylock" id="bs-example-navbar-collapse-1">
				  <ul class="nav navbar-nav menu__list">
					<li class="active menu__item menu__item--current"><a class="menu__link" href="/">Home <span class="sr-only">(current)</span></a></li>
					<li class=" menu__item"><a class="menu__link" href="about.html">About</a></li>
					@foreach($pc as $pcs)
					<li class="menu__item dropdown">
					   <a class="menu__link" href="#" class="dropdown-toggle" data-toggle="dropdown">{{$pcs->name}}<b class="caret"></b></a>
								<ul class="dropdown-menu agile_short_dropdown">
								   @foreach($pcs->category as $pp)
									<li><a href="/{{$pp->name}}/{{$pp->id}}">{{$pp->name}} <span class="badge">{{count($pp->product)}}</span></a></li>
									@endforeach
								</ul>
					</li>
			 @endforeach		
				  </ul>
				</div>
			  </div>
			</nav>	
		</div>
		<div class="top_nav_right">
			<div class="wthreecartaits wthreecartaits2 cart cart box_1"> 
			  <a href="/cart" class="w3view-cart" type="submit" name="submit" value=""><i class="fa fa-cart-arrow-down" aria-hidden="true"></i><span class="btn btn-warning badge">{{Cart::count()}}</span>

			  </a>  
		    </div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>

<style type="text/css">
.w3view-cart{
	position: relative;
}
	.w3view-cart .badge{
	position: absolute;
	top:0px;
}
</style>