	<!-- page -->
	<div class="services-breadcrumb">
		<div class="agile_inner_breadcrumb">
			<div class="container">
				<ul class="w3_short">
					<li>
						<a href="/">Home</a>
						<i>|</i>
					</li>
					<li>Cart</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- //page -->
	<!-- checkout page -->
	<div class="privacy">
		<div class="container">
			<!-- tittle heading -->
			<h3 class="tittle-w3l">Checkout
				<span class="heading-style">
					<i></i>
					<i></i>
					<i></i>
				</span>
			</h3>
			<!-- //tittle heading -->
									
			<div class="checkout-right">
				<h4>Your shopping cart contains:
					<span><?php echo round($this->session->userdata("quote")['items_count']); ?></span>
				</h4>
				<div class="table-responsive">
					<table class="timetable_sub">
						<thead>
							<tr>								 
								<th>Product</th>
								<th>Quality</th>
								<th>Product Name</th>

								<th>Price</th>
								<th>Remove</th>
							</tr>
						</thead>
						<tbody>
							<?php
								if(isset($product) && is_array($product) && count($product) ){ 
									    
								 foreach ($product as $productkey => $productvalue) { ?>
								 
									
							<form name="cart" id="<?php echo $productkey; ?>" >

							<tr class="rem1">
								<td class="invert-image">
									<a href="<?php echo base_url('shop/'.$productvalue['display_name']); ?>">
										<img src="<?php echo asset_url('images/'.$productvalue['image_gallery']);?>" alt=" " class="img-responsive">
									</a>
								</td>
								<td class="invert">
									<div class="quantity">
										<div class="quantity-select">
											<div rowid='<?php echo $productkey; ?>'  class="entry value-minus">&nbsp;</div>
											<div class="entry value">
												<span><?php echo round($productvalue['qty'],2) ?></span>
											</div>
											<div rowid='<?php echo $productkey; ?>' class="entry value-plus active">&nbsp;</div>
										</div>
									</div>
								</td>
								<input type="hidden" class="cartqty" type="number" min="1" value="<?php echo $productvalue['qty'] ?>" name="qty">
								<input type="hidden" name="product_id" value="<?php echo $productvalue['product_id']; ?>">
										<input type="hidden" name="vendor_id" value="<?php echo $productvalue['vendor_id']; ?>">
								<td class="invert"><?php echo ucwords($productvalue['product_name']); ?></td>
								<td class="invert"><?php echo round($productvalue['row_total'],2); ?></td>
								<td class="invert">
									<div class="rem">
										<div  rowid='<?php echo $productkey; ?>' class="close1"> </div>
									</div>
								</td>
							</tr>
							</form>
							<?php } ?>
						

							 <?php }else{ ?>
							 <tr>
							 	<td colspan="5"> No product to show <a href="<?php echo base_url('shoplocator'); ?>">click here </a> to shop </td>
							 </tr>

							 <?php } ?> 
						</tbody>
					</table>
				</div>
			</div>
			<?php
					if(isset($product) && is_array($product) && count($product) ){ ?> 
					<hr>
					<div class="resp-tabs-container hor_1">
						<form name="cartcoupon" id="cartcoupon">
						<div>
							<div class="vertical_post check_box_agile">
								<h5>Coupon</h5>
								<div class="checkbox">
									<div class="check_box_one cashon_delivery">
										<label class="anim">
										<input type="text" class="checkbox" name="coupon" >
										</label>
										<div style="float: right;">
											<h5>Price</h5>
											<table align="center" >
												<tr>
												<td><strong>Subtotal</strong></td>
												<td><?php echo $price['sub_total']; ?></td>
										     	</tr>
										     	<tr>
												<td><strong>Discount</strong></td>
												<td><?php echo $price['discount']; ?></td>
										     	</tr>
										     	<tr>
												<td><strong>Shipping charge</strong></td>
												<td><?php echo $price['delivery_charge']; ?></td>
										     	</tr>
										     	<tr>
												<td><strong>Grand Total</strong></td>
												<td><?php echo $price['grant_total']; ?></td>
										     	</tr>
											</table>
										</div>
									</div>


								</div> 
								<div class="checkbox">
									<div class="check_box_one cashon_delivery">
										<label class="anim">
											 
											<div class="form_group">
												<input class="btn btn-secondary sbm_btn" id="placeorder" type="button" value="Place Order">									 
												</div>
										</label>
									</div>

								</div>
								</form>
							</div>							


			<div class="checkout-left">
				<div class="address_form_agile">
					<h4>Add a new Details</h4>
					<form  method="post" name='cartaddress' id='cartaddress' class="creditly-card-form agileinfo_form">
						<div class="wthree">
							<div class="information-wrapper">
								<div class="first-row">
									<div class="controls">
										<input class="billing-address-name" type="text" name="add_first_name" placeholder="First Name" required="">
									</div>
									<div class="controls">
										<input class="billing-address-name" type="text" name="add_last_name" placeholder="Last Name" required="">
									</div>
									<div class="w3_agileits_card_number_grids">
										<div class="w3_agileits_card_number_grid_left">
											<div class="controls">
												<input type="text" placeholder="Mobile Number" name="add_mobile" required="">
											</div>
										</div>
											<div class="w3_agileits_card_number_grid_left">
											<div class="controls">
												<input type="text" placeholder="Address 1" name="address_1" required="">
											</div>
										</div>
											<div class="w3_agileits_card_number_grid_left">
											<div class="controls">
												<input type="text" placeholder="Address 2" name="address_2" required="">
											</div>
										</div>
											<div class="w3_agileits_card_number_grid_left">
											<div class="controls">
												<input type="text" placeholder="Pincode" name="pincode" required="">
											</div>
										</div

										<div class="w3_agileits_card_number_grid_right">
											<div class="controls">
												<input type="text" placeholder="State" name="state" required="">
											</div>
										</div>
										<div class="clear"> </div>
									</div>
									<div class="controls">
										<input type="text" placeholder="Town/City" name="city" required="">
									</div>
									 
								</div>
								<button class="submit check_out" id='addresssubmit'>Delivery to this Address</button>
							</div>
						</div>
					</form>
					<div class="checkout-right-basket">
						<a href="<?php echo base_url('checkout')?>">Make a Payment
							<span class="fa fa-hand-o-right" aria-hidden="true"></span>
						</a>
					</div>
					<?php } ?>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>

						
	</div>
	<div class="alert alert-danger" role="alert" id="carterrormsg" style="display: none;">
											 
										</div>
			<div class="alert alert-success cartsuccess" role="alert" style="display: none;">
					<strong>Well done!</strong> You successfully added address !
   </div> 	
	<!-- //checkout page -->