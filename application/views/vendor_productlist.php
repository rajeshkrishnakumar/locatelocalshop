

<link href="<?php echo asset_url('css/common.css');?>" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo asset_url('css/bulk_order.css');?>" rel="stylesheet" type="text/css" media="all" />
<?php 
if(isset($_GET['msg'])){
	if($_GET['msg']=='success'){ ?>
	<div class="alert alert-success cartsuccess" role="alert">
					<strong>Well done!</strong> You successfully added product to cart. proceed to checkout. <a href="<?php echo base_url('cart'); ?>">click here</a>
   </div> 
   <script type="text/javascript">
	setTimeout(function(){
                     jQuery(".cartsuccess").hide();
                     }, 3000);
	
</script>
	 <?php }

	elseif ($_GET['msg']=='error') { ?>
		<div class="alert alert-danger carterror" role="alert">
					<strong>Oh snap!</strong> Change a few things up and try submitting again.
				</div>	
				<script type="text/javascript">
	setTimeout(function(){
                     jQuery(".carterror").hide();
                     }, 3000);
	
</script>			
<?php	}
}
?>




<div class="container"> 
<div class="row">
<div class="row">
 
 			<div class="list clearfix">
					 
									<ul style="padding: 50px;" class="desc_list">
										<li>Company Name: <b><?php echo ucwords($vendor['display_name']); ?></b></li>
										<li>Email: <b><?php echo $vendor['email']; ?></b></li>
										<li>Mobile: <b><?php echo $vendor['mobile']; ?></b></li>
										<li>Address: <b><?php echo $vendor['address_1'].' '.$vendor['address_2'].' '.$vendor['city'].' '.$vendor['state'].' - '.$vendor['pincode']; ?></b></li>
										 
									</ul>

							 
					</div>
			 <div class="prds col-lg-20 col-md-24">
			 	<hr>
			 </div>
 	 


					 	<?php foreach ($product as $productkey => $productvalue) { ?>
				
					 	<div class="prds col-lg-20 col-md-24">
	
		 
					<div class="list clearfix">

							<div class="prd_img"><span><img class="img-fluid" src="<?php echo asset_url('images/'.$productvalue['image_gallery']);?>" alt="" /></span></div>
							<div class="prd_info">
									<h3><?php echo $productvalue['product_name']; ?></h3>
									<div class="amt-n-odr">
										<div class="price">
											Price : <b><?php echo $productvalue['price']; ?></b>   
										</div>
	
									</div>
									<ul class="desc_list">
										 
										<li>Brand: <b><?php echo $productvalue['brand'];  ?></b></li>
										<li>Description: <b><?php echo $productvalue['product_desc']; ?></b></li>
										<?php echo $productvalue['product_offers']; ?>
									</ul>
							</div>
						 
						 	<?php if($productvalue['qty'] > 0 ) { ?>
								<div class="prd_add">
									<form action="<?php echo base_url('cart/add'); ?>" method="post">	 
									<div class="qat">
										<input type="hidden" name="product_id" value="<?php echo $productvalue['product_id']; ?>">
										<input type="hidden" name="vendor_id" value="<?php echo $productvalue['vendor_id']; ?>">
										
									</div>
									<div class="form_group">
									<input class="quantity" type="number" value="1" min="1" maxlength="<?php echo $productvalue['qty'] ?>" name="qty">
									</div>		
									<div class="form_group">
									<input class="btn btn-secondary sbm_btn" type="submit" value="Add to cart">
									
									</div>
									
								</div>
								</form>	
		 			<?php } else { ?>	
			 				<span class="no-stk">Out Of Stock</span>
			 		<?php } ?>		
					</div>
					</div>	 	
					 <div class="prds col-lg-20 col-md-24">
			 	<hr>
			 </div> 
					 <?php	} ?>
					

 		<div class="prds col-lg-20 col-md-24">
			 	<hr>
			 </div> 	

		<div class="checkout-right-basket">
						<a href="<?php echo base_url('checkout')?>">Make a Payment
							<span class="fa fa-hand-o-right" aria-hidden="true"></span>
						</a>
					</div>
	<div class="prds col-lg-20 col-md-24">
			 	<hr>
			 </div> 



</div>
</div>
</div>
<script type="text/javascript">
jQuery(document).ready(function () {
jQuery(".incr-btn").on("click", function (e) {
		var btn = jQuery(this);
		var oldValue = btn.parent().find('.quantity').val();
		btn.parent().find('.incr-btn[data-action="decrease"]').removeClass('inactive');
		if (btn.data('action') == "increase") {

			if(parseFloat(oldValue) < btn.data('qty')){
				var newVal = parseFloat(oldValue) + 1;
			}else{
				var newVal = parseFloat(oldValue)
			}
		} else {
				// Don't allow decrementing below 1
				if (oldValue > 1) {
						var newVal = parseFloat(oldValue) - 1;
				} else {
						newVal = 1;
						btn.addClass('inactive');
				}
		}
		btn.parent().find('.quantity').val(newVal);
		e.preventDefault();
});
jQuery("input:checkbox").change(function() {
    if(this.checked) {
        //jQuery(this).parent().next().children().removeAttr("disabled");
				jQuery(this).parent().next().show();
    }else {
    	//jQuery(this).parent().next().children().prop('disabled', true);
			jQuery(this).parent().next().hide();
    }
});

});
</script>
