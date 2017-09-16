@extends('layouts.frontPage')
@section('title')
{{$pv->name}}
@endsection
@section('styles')
<link href="../../../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="../../../css/flexslider.css" type="text/css" media="screen" />
<link href="../../../css/font-awesome.css" rel="stylesheet"> 
<link href="../../../css/easy-responsive-tabs.css" rel='stylesheet' type='text/css'/>
<link href="../../../css/style.css" rel="stylesheet" type="text/css" media="all" />
@endsection
@section('content')
<!--/=====page banner-->
<div class="page-head_agile_info_w3l">
		<div class="container">
			<h3>Emmat <span>Mall</span></h3>
			<!--/w3_short-->
				 <div class="services-breadcrumb">
						<div class="agile_inner_breadcrumb">

						   <ul class="w3_short">
								<li><a href="index.html">Home</a><i>|</i></li>
								<li>{{$pv->name}}</li>
							</ul>
						 </div>
				</div>
	   <!--//w3_short-->
	</div>
</div>
<!--endpageBanner-->

<!--begingProdct-->
<div class="banner-bootom-w3-agileits">
	<div class="container">
	     <div class="col-md-4 single-right-left ">
			<div class="grid images_3_of_2">
				<div class="flexslider">
					
					<ul class="slides">
						<li data-thumb="../../../products/{{$pv->image}}">
							<div class="thumb-image"> <img src="../../../products/{{$pv->image}}" data-imagezoom="true" class="img-responsive"> </div>
						</li>
						@foreach($pv->images as $im)
						<li data-thumb="../../../products/{{$im->name}}">
							<div class="thumb-image"> <img src="../../../products/{{$im->name}}" data-imagezoom="true" class="img-responsive"> </div>
						</li>
						@endforeach	
					</ul>
					<div class="clearfix"></div>
				</div>	
			</div>
		</div>
		<div class="col-md-8 single-right-left simpleCart_shelfItem">
					<h3>{{$pv->name}}</h3>
					<p><span class="item_price">GHS{{$pv->net_price}}</span> <del>GHS{{$pv->price}}</del></p>
					<div class="rating1">
						<span class="starRating">
							<input id="rating5" type="radio" name="rating" value="5">
							<label for="rating5">5</label>
							<input id="rating4" type="radio" name="rating" value="4">
							<label for="rating4">4</label>
							<input id="rating3" type="radio" name="rating" value="3" checked="">
							<label for="rating3">3</label>
							<input id="rating2" type="radio" name="rating" value="2">
							<label for="rating2">2</label>
							<input id="rating1" type="radio" name="rating" value="1">
							<label for="rating1">1</label>
						</span>
					</div>
					<div class="color-quality">
						<div class="color-quality-right">
							<h5>Quantity :</h5>
							<input type="number" name="qty" size="3">
						</div>
					</div>
					<div class="occasional">
						<h5>Size :</h5>
						<div class="colr ert">
							<label class="radio"><input type="radio" name="radio" checked=""><i></i>Small</label>
						</div>
						<div class="colr">
							<label class="radio"><input type="radio" name="radio"><i></i>Medium </label>
						</div>
						<div class="colr">
							<label class="radio"><input type="radio" name="radio"><i></i>Large</label>
						</div>
						<div class="clearfix"> </div>
					</div>	
		      </div>
	 			<div class="clearfix"> </div>
				<!-- /new_arrivals --> 
	<div class="responsive_tabs_agileits"> 
				<div id="horizontalTab">
						<ul class="resp-tabs-list">
							<li>Description</li>
							<li>Information</li>
						</ul>
					<div class="resp-tabs-container">
					<!--/tab_one-->
					   <div class="tab1">

							<div class="single_page_agile_its_w3ls">
							  <h6>{{$pv->name}}</h6>
							   <p>{{$pv->discription}}</p>
							</div>
						</div>
						<!--//tab_one-->
						   <div class="tab3">

							<div class="single_page_agile_its_w3ls">
							  <h6>{{$pv->name}}</h6>
							   <p>{!!$pv->detail!!}</p>
							</div>
						</div>
					</div>
				</div>	
			</div>
	<!-- //new_arrivals --> 
	  	<!--/slider_owl-->
	
@include('frontPage.products')
	        </div>
 </div>
@endsection
@section('scripts')
<script type="text/javascript" src="../../../js/jquery-2.1.4.min.js"></script>
<!-- //js -->
<script src="../../../js/modernizr.custom.js"></script>
	<!-- Custom-JavaScript-File-Links --> 
	<!-- cart-js -->
	<script src="../../../js/minicart.min.js"></script>
<script>
	// Mini Cart
	paypal.minicart.render({
		action: '#'
	});

	if (~window.location.search.indexOf('reset=true')) {
		paypal.minicart.reset();
	}
</script>

	<!-- //cart-js --> 
	<!-- single -->
<script src="../../../js/imagezoom.js"></script>
<!-- single -->
<!-- script for responsive tabs -->						
<script src="../../../js/easy-responsive-tabs.js"></script>
<script>
	$(document).ready(function () {
	$('#horizontalTab').easyResponsiveTabs({
	type: 'default', //Types: default, vertical, accordion           
	width: 'auto', //auto or any width like 600px
	fit: true,   // 100% fit in a container
	closed: 'accordion', // Start closed if in accordion view
	activate: function(event) { // Callback function if tab is switched
	var $tab = $(this);
	var $info = $('#tabInfo');
	var $name = $('span', $info);
	$name.text($tab.text());
	$info.show();
	}
	});
	$('#verticalTab').easyResponsiveTabs({
	type: 'vertical',
	width: 'auto',
	fit: true
	});
	});
</script>
<!-- FlexSlider -->
<script src="../../../js/jquery.flexslider.js"></script>
						<script>
						// Can also be used with $(document).ready()
							$(window).load(function() {
								$('.flexslider').flexslider({
								animation: "slide",
								controlNav: "thumbnails"
								});
							});
						</script>
					<!-- //FlexSlider-->
<!-- //script for responsive tabs -->		
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="../../../js/move-top.js"></script>
<script type="text/javascript" src="../../../js/jquery.easing.min.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
<!-- //here ends scrolling icon -->

<!-- for bootstrap working -->
<script type="text/javascript" src="../../../js/bootstrap.js"></script>
@endsection