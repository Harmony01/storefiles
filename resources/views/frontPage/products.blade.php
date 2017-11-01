	<div class="new_arrivals_agile_w3ls_info"> 
		<div class="container">
		    <h3 class="wthree_text_info">New <span>Arrivals</span></h3>		
					<!--/tab_one-->
					@foreach($pd->chunk(4) as $p)
					<div class="row" id="stock">
					  @foreach($p as $ps)
							<div class="col-md-3 product-men">
								<div class="men-pro-item simpleCart_shelfItem">
									<div class="men-thumb-item">
									  <a href="/product/{{$ps->dash}}">
										<img src="../../../products/{{$ps->image}}" alt="" class="pro-image-front">
										<img src="../../../products/{{$ps->image}}" alt="" class="pro-image-back">
										</a>
											<div class="men-cart-pro">
												<div class="inner-men-cart-pro">
													<a href="/view/{{$ps->dash}}/{{$ps->category_id}}" class="link-product-add-cart">Quick View</a>
												</div>
											</div>

											<span class="product-new-top">New</span>
									</div>
									<div class="item-info-product ">
										<h4><a href="/view/{{$ps->dash}}/{{$ps->category_id}}">{{$ps->name}}</a></h4>
										<div class="info-product-price">
											<span class="item_price" >GHS {{ number_format($ps->net_price,2)}}</span>
											<del>GHS {{ number_format($ps->price,2)}}</del><br><br>
											<div id="cart2"><a href="/cart/{{$ps->id}}/add"><i class="fa fa-cart-arrow-down"> buy now</i></a></div>
										</div>
													
									</div>
								</div>
							</div>
				  @endforeach
				  </div>			
				@endforeach			
							<div class="clearfix"></div>
						<!--//tab_one-->
						
							<div class="clearfix"></div>
				</div>	
			</div>