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
			<!-- //tittle heading -->
			<div class="checkout-right">
				<!--Horizontal Tab-->
				<div id="parentHorizontalTab">
					<ul  class="resp-tabs-list hor_1">
						<li>Order</li>
						<li>Profile</li>
						<li>Address</li>
					 
					</ul>

					<div class="resp-tabs-container hor_1">

						<div>
							<div class="vertical_post check_box_agile">
								<h5>Orders</h5>
								<div class="checkbox">
									 <table class="table table-striped">
										<thead>
											<tr>
												<th>Entity id</th>
												<th>Status</th>
												<th>Items count</th>
												<th>Coupon code</th>
												<th>Discount</th>
												<th>Delivery Charge</th>
												<th>Sub Total</th>
												<th>Grand Total</th>
												<th>Payment</th>
												<th>Shipment Method</th>

											</tr>
										</thead>
										<tbody>
										<?php  if (count($order)) { ?>
											
											<?php foreach ($order as $orderkey => $ordervalue) { ?>
												 <tr>
												 	<td><?php echo $ordervalue['entity_id']; ?> </td>
												 	<td><?php echo $ordervalue['status']; ?></td>
												 	<td><?php echo $ordervalue['items_count']; ?></td>
												 	<td><?php echo $ordervalue['coupon_code']; ?></td>	
												 	<td><?php echo $ordervalue['discount']; ?></td>
												 	<td><?php echo $ordervalue['delivery_charge']; ?></td>
												 	<td><?php echo $ordervalue['sub_total']; ?></td>
												 	<td><?php echo $ordervalue['grant_total']; ?></td>
												 	<td><?php echo $ordervalue['payment_method']; ?></td>
												 	<td><?php echo $ordervalue['shipment_method']; ?></td>
												 </tr>
											

											<?php }  ?>
										 										
										<?php } else { ?>
												<tr align="center">
													<td colspan="10">No Address saved still :( <a href="<?php echo base_url(); ?>"> Shop here </a></td>
												</tr>
										<?php }?>		
										</tbody>
									 </table>	
								</div>
							</div>
						</div>
						<div>
							<form  name="custprofile" id='custprofile' method="post" class="creditly-card-form agileinfo_form">
								<div class="creditly-wrapper wthree, w3_agileits_wrapper">
									<div class="credit-card-wrapper">
										<div class="first-row form-group">
											<div class="controls">
												<label class="control-label">First Name</label>
												<input class="billing-address-name form-control" type="text" name="first_name" placeholder="First Name" value="<?php echo $profile['first_name']; ?>">
											</div>
											<div class="w3_agileits_card_number_grids">
												<div class="w3_agileits_card_number_grid_left">
													<div class="controls">
														<label class="control-label">Last Name</label>
														<input class="form-control" type="text" name="last_name" placeholder="Last Name" value="<?php echo $profile['last_name']; ?>">
													</div>
												</div>
												<div class="w3_agileits_card_number_grid_right">
													<div class="controls">
														<label class="control-label">Email</label>
														<input class="form-control" type="text" name="email"  value="<?php echo $profile['email']; ?>" readonly >
													</div>
												</div>
												<div class="clear"> </div>
											</div>
											<div class="controls">
												<label class="control-label">Mobile</label>
												<input class="form-control" type="text" name="mobile" placeholder="Mobile"  value="<?php echo $profile['mobile']; ?>">
											</div>
										</div>
										<button  id="updateprofilebtn" class="submit">
											<span>Submit</span>
										</button> 
										<div class="alert alert-success" id="custprofilesucessmsg" role="alert" style="display: none;">
											 
										</div>
										<div class="alert alert-danger" role="alert" id="custprofileerrormsg" style="display: none;">
											 
										</div>
									</div>
								</div>
							</form>
							<hr> 	
							<div  style="display: block;">
							<form id="changepass" name="changepass" method="post" class="creditly-card-form agileinfo_form">
								<div class="creditly-wrapper wthree, w3_agileits_wrapper">
									<div class="credit-card-wrapper">
										<div class="first-row form-group">
											<div class="w3_agileits_card_number_grids">
												<div class="w3_agileits_card_number_grid_left">
													<div class="controls">
														<label class="control-label">New password</label>
														<input class="form-control" type="password" name="password_profile" id="password_profile" placeholder="Password">
													</div>
												</div>
												<div class="w3_agileits_card_number_grid_right">
													<div class="controls">
														<label class="control-label">Confirm password</label>
														<input class="form-control" type="password" name="password_conf_profile" id="password_conf_profile" placeholder="Confirm Password">
													</div>
												</div>
												<div class="clear"> </div>
											</div>
										 </div>
										<button id="changepassbtn" class="submit">
											<span>Submit</span>
										</button>
										<div class="alert alert-success" id="changepasssucessmsg" role="alert" style="display: none;">
											 
										</div>
										<div class="alert alert-danger" role="alert" id="changepasserrormsg" style="display: none;">
											 
										</div>

									</div>
								</div>
							</form>

						</div>
	

						</div>
						<div>
							<div class="vertical_post">
								<h5>Address</h5> <span>
								<a href="#" data-toggle="modal" data-target="#addressmodal">
							<span class="fa fa-pencil-square-o" aria-hidden="true"></span> Add Address </a></span>
								<div class="modal fade" id="addressmodal" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body modal-body-sub_agile">
					<div class="main-mailposi">
						<span class="fa fa-envelope-o" aria-hidden="true"></span>
					</div>
					<div class="modal_body_left modal_body_left1">
						<h3 class="agileinfo_sign">Add Address</h3>
						<p>
							Come join the Grocery Shoppy! Let's Add Address.
						</p>
						<form id='addaddress' name ="addaddress" method="post">
							<div class="styled-input agile-styled-input-top">
								<input type="text" placeholder="First Name" name="add_first_name" required="">
							</div>
								<div class="styled-input">
								<input type="text" placeholder="Last Name" name="add_last_name" required="">
							</div>
							<div class="styled-input">
								<input type="text" placeholder="Address 1" name="address_1" required="">
							</div>
								<div class="styled-input">
								<input type="text" placeholder="Address 2" name="address_2" required="">
							</div>
							<div class="styled-input">
								<input type="text" placeholder="City" name="city"  required="">
							</div>
							<div class="styled-input">
								<input type="text" placeholder="State" name="state" required="">
							</div>
							<div class="styled-input">
								<input type="text" placeholder="Pincode" name="pincode" required="">
							</div>
							<div class="styled-input">
								<input type="text" placeholder="Mobile" name="add_mobile" required="">
							</div>
							<input type="button" id="addaddresssubmit" value="Submit">
						</form>
						<p>
							<a href="#">By clicking register, I agree to your terms</a>
						</p>
						<div class="alert alert-danger" id="addaddresserror" role="alert" style="display: none;">
							
						</div>
					</div>
				</div>
			</div>
			<!-- //Modal content-->
		</div>
	</div>
							<br><br>
								 <table class="table table-striped">
										<thead>
											<tr>
												<th>Entity id</th>
												<th>First name</th>
												<th>Last name</th>
												<th>Mobile</th>
												<th>Address 1</th>
												<th>Address 2</th>
												<th>Pincode</th>
												<th>City</th>
												<th>State</th>
												<th>Edit</th>
												<th>Delete</th>
											</tr>
										</thead>
										<tbody>
										<?php if (count($address)) { ?>
											
											<?php foreach ($address as $addresskey => $addressvalue) { ?>
												 <tr>
												 	<td><?php echo $addressvalue['entity_id']; ?> </td>
												 	<td><?php echo $addressvalue['first_name']; ?></td>
												 	<td><?php echo $addressvalue['last_name']; ?></td>
												 	<td><?php echo $addressvalue['mobile']; ?></td>	
												 	<td><?php echo $addressvalue['address_1']; ?></td>
												 	<td><?php echo $addressvalue['address_2']; ?></td>
												 	<td><?php echo $addressvalue['pincode']; ?></td>
												 	<td><?php echo $addressvalue['city']; ?></td>
												 	<td><?php echo $addressvalue['state']; ?></td>
												 	<td><a href="<?php echo base_url().'customer/address/edit/'.$addressvalue['entity_id'];  ?>" class="btn btn-info">Edit</a></td>
												 	<td><a href="<?php echo base_url().'customer/address/delete/'.$addressvalue['entity_id'];  ?>" class="btn btn-danger">Delete</a></td>
												 </tr>
											

											<?php }  ?>
										 										
										<?php } else { ?>
												<tr align="center">
													<td colspan="10">No address saved :( <a href="<?php echo base_url(); ?>"> Shop here </a></td>
												</tr>
										<?php }?>		
										</tbody>


									 </table>	
							</div>
						</div>
						 
					</div>
				</div>
				<!--Plug-in Initialisation-->
			</div>
		</div>
	</div>
