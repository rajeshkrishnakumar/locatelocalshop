	<div class="services-breadcrumb">
		<div class="agile_inner_breadcrumb">
			<div class="container">
				<ul class="w3_short">
					<li>
						<a href="/">Home</a>
						<i>|</i>
					</li>
					<li>Customer</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- //page -->
	<!-- payment page-->
	<div class="privacy">
		<div class="container">
			<!-- tittle heading -->
			<h3 class="tittle-w3l">Customer
				<span class="heading-style">
					<i></i>
					<i></i>
					<i></i>
				</span>
			</h3>
			<form  name="editaddress" id='editaddress' method="post" class="creditly-card-form agileinfo_form">
								<div class="creditly-wrapper wthree, w3_agileits_wrapper">
									<div class="credit-card-wrapper">
										<div class="first-row form-group">
											<div class="controls">
												<label class="control-label">First Name</label>
												<input class="billing-address-name form-control" type="text" name="add_first_name" placeholder="First Name" value="<?php echo $profile['first_name']; ?>">
												<input  type="hidden" name="entity_id" value="<?php echo $this->uri->segment(4); ?>">
											</div>
											<div class="w3_agileits_card_number_grids">
												<div class="w3_agileits_card_number_grid_left">
													<div class="controls">
														<label class="control-label">Last Name</label>
														<input class="form-control" type="text" name="add_last_name" placeholder="Last Name" value="<?php echo $profile['last_name']; ?>">
													</div>
												</div>
												<div class="w3_agileits_card_number_grid_right">
													<div class="controls">
														<label class="control-label">Address 1</label>
														<input class="form-control" type="text" name="address_1" placeholder="Address" value="<?php echo $profile['address_1']; ?>" >
													</div>
												</div>
												<div class="clear"> </div>
											</div>
											<div class="controls">
												<label class="control-label">Address 2</label>
												<input class="form-control" type="text" name="address_2" placeholder="Address"  value="<?php echo $profile['address_2']; ?>">
											</div>
											<div class="controls">
												<label class="control-label">Mobile</label>
												<input class="form-control" type="text" name="add_mobile" placeholder="Mobile"  value="<?php echo $profile['mobile']; ?>">
											</div>
											<div class="controls">
												<label class="control-label">City</label>
												<input class="form-control" type="text" name="city" placeholder="City"  value="<?php echo $profile['city']; ?>">
											</div>
											<div class="controls">
												<label class="control-label">State</label>
												<input class="form-control" type="text" name="state" placeholder="State"  value="<?php echo $profile['state']; ?>">
											</div>
											<div class="controls">
												<label class="control-label">Pincode</label>
												<input class="form-control" type="text" name="pincode" placeholder="Pincode"  value="<?php echo $profile['pincode']; ?>">
											</div>

										</div>
										<button  id="editaddressbtn" class="submit">
											<span>Submit</span>
										</button> 
										<div class="alert alert-danger" role="alert" id="editaddresserrormsg" style="display: none;">
											 
										</div>
									</div>
								</div>
							</form>
							
	

						</div>
     	</div>
	</div>

	
	 