 

	<div class="services-breadcrumb">
		<div class="agile_inner_breadcrumb">
			<div class="container">
				<ul class="w3_short">
					<li>
						<a href="index.html">Home</a>
						<i>|</i>
					</li>
					<li>Payment</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- //page -->
	<!-- payment page-->
	<div class="privacy">
		<div class="container">
			<!-- tittle heading -->
			<h3 class="tittle-w3l">Payment
				<span class="heading-style">
					<i></i>
					<i></i>
					<i></i>
				</span>
			</h3>

			<!-- //tittle heading -->
			<div class="checkout-right">
				<!--Horizontal Tab-->
				<div id="parentHorizontalTab">
					<ul class="resp-tabs-list hor_1">
						<li>Payment Info</li>						 
					</ul>
					<div class="resp-tabs-container hor_1">
						<form name="checkout" id="checkout">
						<div>
							<div class="vertical_post check_box_agile">
								<h5>Shipping</h5>
								<div class="checkbox">
									<div class="check_box_one cashon_delivery">
										<label class="anim">
											<input type="checkbox" class="checkbox" name="shipping" value="<?php echo $shipment[0]['method_name']; ?> ">
											<span> <?php echo $shipment[0]['shipment_method_info'] ?></span>
										</label>
									</div>

								</div>

								<h5>Payment</h5>
								<div class="checkbox">
									<div class="check_box_one cashon_delivery">
										<label class="anim">
											<input type="checkbox" class="checkbox" name="payment" value="<?php echo $payment[0]['method_name']; ?> ">
											<span> <?php echo $payment[0]['payment_method_info'] ?></span>

										 
										</label>
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
						</div>
						
				</div>
				<div class="alert alert-success" id="checkoutsucessmsgs" role="alert" style="display: none;">
											 
										</div>
										<div class="alert alert-danger" role="alert" id="checkouterrormsg" style="display: none;">

							 
					</div>
				<!--Plug-in Initialisation-->
			</div>
		</div>
	</div>
