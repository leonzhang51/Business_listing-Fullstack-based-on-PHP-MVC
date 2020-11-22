<?php $this->titre = "Sireta community business shop"; ?>

<?php $userIdentity=1; //user id ?>

		

		<div class="page-title" style="background-image: url('images/background16.jpg');">
		
			<div class="inner">
				<h2>See our latest products & services</h2>
				
			</div> <!-- end .inner -->
		</div> <!-- end .page-title -->



		<div class="section boxed-section light">
			<div class="inner">
				<div class="container">
					<div class="box transparent">
						<div class="row">
							<div class="col-md-4">
								<div class="shop-sidebar">
									<div class="sidebar-widget">
										<form id="sort" action="shop?action=sortingAD" method="post">
											<select name="sortingAD" id="sortingAD">
												<option>Sorting AD by title</option>
												<option value="desc">High to Low</option>
												<option value="asc">Low to High</option>
												
											</select>
											
										</form>
										<script type="text/javascript">
											$('#sortingAD').change(function(){
												$('#sort').submit();
											}); // SUBMIT FORM
										</script>

									</div> <!-- end .sidebar-widget -->
									<div class="sidebar-widget">
										<h5>Search Products</h5>
										<form class="searchform" action="shop?action=searchAD" method="post" id="searchTitle">
											<input name="searchTitle" type="text" placeholder="Type here ...">
											<button id="goSearch"><i class="pe-7s-search"></i></button>
										</form>
										<script type="text/javascript">
												$('#goSearch').click(function(){
													$('#searchTitle').submit();
												}); // SUBMIT FORM
										</script>
									</div> <!-- end .sidebar-widget -->
									<div class="sidebar-widget">
										<h5>Product Categories</h5>
										<div class="categories">
											<form id="subcate" action="shop?action=sortingCategorie" method="post">
												<select id="subcategory" name="subcategory" class="active"><i class="pe-7s-right-arrow"></i>
													<option>choose category</option>
													<?php foreach($datas['subcategory'] as $subcategory): ?>
														<option value=<?php echo $subcategory['id']?>><?php echo $subcategory['name']?></option>
													<?php endforeach; ?>
												</select>
											</form>
											<script type="text/javascript">
												$('#subcategory').change(function(){
													$('#subcate').submit();
												}); // SUBMIT FORM
											</script>
									
										</div>
									</div> <!-- end .sidebar-widget -->
									<div class="sidebar-widget text-center">
										<h5>Filter By Price</h5>
										<div class="price-slider"><div id="price-slider"></div></div>
										<div class="price-slider-value">Price:<span class="price">$<span id="price-min"></span></span>—<span class="price">$<span id="price-max"></span></span></div>
										
										<form action="shop?action=sortingPrice" method="post">
											<input type="hidden" id="priceFilterMax" value="" name="priceFilterMax">
											<input type="hidden" id="priceFilterMin" value="" name="priceFilterMin">
											<input type="submit" class="button" value="Filter">
										</form>
										
										<script type="text/javascript">
												$('body').on('DOMSubtreeModified', "#price-max",function(){
													$('#priceFilterMax').val($('#price-max').text());
													$('#priceFilterMin').val($('#price-min').text());
												}); // SUBMIT FORM
											</script>
									</div> <!-- end .sidebar-widget -->
									<div class="sidebar-widget">
										<h5>Feature Products</h5>
										<!-- start .featured-product -->
										<?php foreach($datas['product']as $product): ?>
										<div class="featured-product clearfix">           
                                                <a href=""><img src="<?php echo $product['photo'] ?>" alt="image"></a>
                                                <div class="content">
                                                    <p class="title"><a href=""><?php echo $product['name'] ?>></a></p>
                                                    <p class="price"><?php echo $product['price'] ?></p>
                                                </div> <!-- end .content -->                                          
										</div> 
										<?php endforeach;?> <!-- end .featured-product -->										
									</div> <!-- end .sidebar-widget -->
								</div> <!-- end .shop-sidebar -->
							</div> <!-- end .col-md-4 -->
							<div class="col-md-8">

							<!-- no serach action -->
							<?php if(!isset($datas['results'])): ?>
								<?php if(!empty($datas['product'])||!empty($datas['service'])): ?>
									<!--start content to show-->
										<div class="row products">
											<?php foreach($datas['product']as $product): ?>
											<div class="col-sm-4">
												<div class="product">
												
													<img src="<?php echo $product['photo'] ?>" alt="image" class="img-responsive">
													<div class="overlay"></div>
													<div class="content">
														<h5><a href=""><?php echo $product['name'] ?></a></h5>
														<p>$<?php echo $product['price'] ?></p>
														
													</div> <!-- end .content -->
													
													<a href="shop?action=addCart&iduser=<?php echo $userIdentity?>&annonceProduct_idannonce=<?php echo $product['idannonce']?>" class="button">Add to Cart</a>
												
												</div> <!-- end .product -->
											</div> <!-- end .col-sm-4 -->
											<?php endforeach; ?>
											


										</div> <!-- end .row -->
										<!-- start row service -->
										<div class="row products">
											<?php foreach($datas['service']as $service): ?>
												<div class="col-sm-4">
														<div class="product">
														
															<img src="<?php echo $service['photo'] ?>" alt="image" class="img-responsive">
															<div class="overlay"></div>
															<div class="content">
																<h5><a href=""><?php echo $service['name'] ?></a></h5>
																<p>$<?php echo $service['price'] ?>/hr</p>
																
															</div> <!-- end .content -->
															
															<a href="shop?action=addCart&iduser=<?php echo $userIdentity?>&annonceService_idannonce=<?php echo $service['idannonce']?>" class="button">Add to Cart</a>
														
														</div> <!-- end .product -->
												</div> <!-- end .col-sm-4 -->
											<?php endforeach; ?>
										</div> <!-- end .row service-->
										<!--end show product and service-->
										<?php else:?>
										<div class="col-sm-6 mt-5">
														<div class="product">
														
															
															<div class="overlay"></div>
															<div class="content">
																<h5 style="color:red">No product and service in this category</h5>
																<p></p>
																
															</div> <!-- end .content -->
															
															
														
														</div> <!-- end .product -->
												</div> <!-- end .col-sm-4 -->
									<?php endif; ?>
							<?php endif; ?>

								<!--There is a action of searching -->
								<?php if(isset($datas['results'])): ?>
									<div></div>
									<!--show search result in productAD-->
									<?php if(!empty($datas['results']['resultProduit'])): ?>
										<!--start content to show-->
										<div class="row products">
											<?php foreach($datas['results']['resultProduit']as $product_search): ?>
												<div class="col-sm-4">
													<div class="product">
													
														<img src="<?php echo $product_search['infoproduit'][0]['photo'] ?>" alt="image" class="img-responsive">
														<div class="overlay"></div>
														<div class="content">
															<h5><a href=""><?php echo $product_search['infoproduit'][0]['name'] ?></a></h5>
															<p>$<?php echo $product_search['infoproduit'][0]['price'] ?></p>
															<p><?php echo $product_search['infoproduit'][0]['description'] ?></p>
														</div> <!-- end .content -->
														
														<a href="shop?action=addCart&iduser=<?php echo $userIdentity?>&annonceProduct_idannonce=<?php echo $product_search['idannonce']?>" class="button">Add to Cart</a>
													
													</div> <!-- end .product -->
												</div> <!-- end .col-sm-4 -->
											<?php endforeach; ?>
										</div> <!-- end .row -->


									<?php else: ?>
										<div class="col-sm-6 mt-5">
													<div class="product ">
														<div class="overlay"></div>
														<div class="content">
														<p></p>
															<p></p>
															<h5 style="color:red">Sorry no such product in our system!</h5>
															
														</div> <!-- end .content -->																									
													</div> <!-- end .product -->
										</div> <!-- end .col-sm-4 -->
									<?php endif; ?>


									<!--show search result in service AD-->
									<?php if(!empty($datas['results']['resultService'])): ?>
										<!--start content to show-->
										<div class="row products">
											<?php foreach($datas['results']['resultService']as $service_search): ?>
												<div class="col-sm-4">
													<div class="product">
													
														<img src="<?php echo $service_search['infoservice'][0]['photo'] ?>" alt="image" class="img-responsive">
														<div class="overlay"></div>
														<div class="content">
															<h5><a href=""><?php echo $service_search['infoservice'][0]['name'] ?></a></h5>
															<p>$<?php echo $service_search['infoservice'][0]['price'] ?></p>
															<p><?php echo $service_search['infoservice'][0]['description'] ?></p>
														</div> <!-- end .content -->
														
														<a href="shop?action=addCart&iduser=<?php echo $userIdentity?>&annonceProduct_idannonce=<?php echo $service_search['idannonce']?>" class="button">Add to Cart</a>
													
													</div> <!-- end .service -->
												</div> <!-- end .col-sm-4 -->
											<?php endforeach; ?>
										</div> <!-- end .row -->
											

									<?php else: ?>
										<div class="col-sm-4 mt-5">
													<div class="product">
														<div class="overlay"></div>
														<div class="content">
															<h5 style="color:red">Sorry no such service in our system!</h5>
															<p></p>
															<p></p>
														</div> <!-- end .content -->																									
													</div> <!-- end .product -->
										</div> <!-- end .col-sm-4 -->
									<?php endif; ?>

                                <?php endif; ?>
							</div> <!-- end .col-md-8 -->
						</div> <!-- end .row -->
						<div class="text-center">
							<a href="" id="products-load-more" class="button">Load More</a>
						</div> <!-- end .blog-load-more -->
					</div> <!-- end .box -->
				</div> <!-- end .container -->
			</div> <!-- end .inner -->
		</div> <!-- end .section -->