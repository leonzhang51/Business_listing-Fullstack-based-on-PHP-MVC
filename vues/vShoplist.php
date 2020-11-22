<?php $this->titre = "Sireta community business shop cart"; ?>

<?php 
	$userIdentity=1; //user id
	$cartTotalPrice=0; 
?>

<div class="page-title" style="background-image: url('images/background05.jpg');">
			<div class="inner">
			</div> <!-- end .inner -->
		</div> <!-- end .page-title -->

		<div class="section boxed-section light">
			<div class="inner">
				<div class="container">
					<div class="box">
						<div class="table-responsive">
							<table class="table cart-items light-inputs">
							<form action="shoplist?action=modifyOrderNb" method="post">
							<!-- if have product order in shopping cart-->
							<?php if(!empty($datas['cartProduct'])): ?> 
								<thead>
									<tr>
										<th>Product</th>
										<th>Price</th>
										<th>Quantity</th>
										<th>Total</th>
										<th></th>
									</tr>
								</thead>
								
									<tbody>								
									<?php foreach($datas['cartProduct'] as $cartProduct): ?>
										<tr>
											<td>
												<div class="image"><img src="<?php echo $cartProduct['photo'] ?>" alt="product" class="img-responsive center-block"></div>
												<a href="#0"><?php echo $cartProduct['name'] ?></a>
											</td>
											<td>$<?php echo $cartProduct['price'] ?></td>
											<td><input name="orderNb[]" type="number" value="<?php echo $cartProduct['orderNb'] ?>"></td>
											<td>
												<?php 
													echo $cartProduct['price']*$cartProduct['orderNb'];
													$cartTotalPrice=$cartTotalPrice+$cartProduct['price']*$cartProduct['orderNb'];
												?>
											</td>
											<td><a href="shoplist?action=removeOrder&cartid=<?php echo $cartProduct['id'] ?>" class="remove"><i class="pe-7s-close-circle"></i></a></td>
										</tr>
										<input type="hidden" name="cartid[]" value="<?php echo $cartProduct['id'] ?>"> 
									<?php endforeach;?>
										
									</tbody>
								
							<?php endif; ?>
							<!--end show product-->
							<!-- if have service order in shopping cart-->
							<?php if(!empty($datas['cartService'])): ?> 
								<thead>
									<tr>
										<th>Service</th>
										<th>Rate</th>
										<th></th>
										<th></th>
										<th></th>
									</tr>
								</thead>
								<tbody>

								<?php foreach($datas['cartService'] as $cartService): ?>
									<tr>
										<td>
											<div class="image"><img src="<?php echo $cartService['photo'] ?>" alt="product" class="img-responsive center-block"></div>
											<a href="#0"><?php echo $cartService['name'] ?></a>
										</td>
										<td>$<?php echo $cartService['price'] ?>/hr</td>
										<td></td>
										<td ></td>
										<td><a href="shoplist?action=removeOrder&cartid=<?php echo $cartService['id'] ?>" class="remove"><i class="pe-7s-close-circle"></i></a></td>
									</tr>
								<?php endforeach;?>
									
								</tbody>
								
							<?php endif; ?>
							<!--end show service-->
							</table>
						</div> <!-- end table-->
						<div class="row">
							<div class="col-sm-6">
								
							</div> <!-- end .col-sm-6 -->
							<div class="col-sm-6">
								<div class="button-row light-inputs text-right">
									<input type="submit" value="Update Cart" class="button" data-text="Update Cart">	
								</div>
							</div> <!-- end .col-sm-6 -->
						</div> <!-- end .row -->
						</form>
						<div class="row">
							<div class="col-sm-6">
								<div class="cart-box">
									<h5>Cart Totals</h5>
									<table class="table cart-total">
										<tbody>
											<tr>
												<th>Subtotal</th>
												<td>$<?php echo $cartTotalPrice?></td>
											</tr>
											<tr>
												<th>Total(tax rate 5%)</th>
												<td>$<?php echo  number_format($cartTotalPrice*1.05, 2, '.', '');//output result with 2 digitial    ?></td>
											</tr>
										</tbody>
									</table>
								</div> <!-- end .cart-box -->
								<div class="submit text-right">
									<a href="shoplist?action=addToOrder&userid=<?php echo $userIdentity ?>" class="button" data-text="Proceed To Checkout"><span>Proceed To Checkout</span></a>
								</div> <!-- end .submit -->
							</div> <!-- end .col-sm-6 -->
						</div> <!-- end .row -->

					</div> <!-- end .box -->
				</div> <!-- end .container -->
			</div> <!-- end .inner -->
		</div> <!-- end .section -->