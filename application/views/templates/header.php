
<script src="<?php echo asset_url('js/jquery-2.1.4.min.js');?>"></script>
<script type="text/javascript">
	var URL="<?php echo base_url(); ?>";
</script>
<html>
<head>
	<title>Locate Local Shop an Ecommerce Category| Home </title>
	<!--/tags -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Grocery Shoppy Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!--//tags -->
	<link href="<?php echo asset_url('css/bootstrap.css');?>" rel="stylesheet" type="text/css" media="all" />
	<link href="<?php echo asset_url('css/style.css');?>" rel="stylesheet" type="text/css" media="all" />
	<link href="<?php echo asset_url('css/font-awesome.css');?>" rel="stylesheet">
	<!--pop-up-box-->
	<link href="<?php echo asset_url('css/popuo-box.css');?>" rel="stylesheet" type="text/css" media="all" />
	<!--//pop-up-box-->
	<!-- price range -->
	<link rel="stylesheet" type="text/css" href="<?php echo asset_url('css/jquery-ui1.css');?>">
	<!-- fonts -->
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
</head>

<body>
	<div class="header-most-top">
		<p>Grocery Offer Zone Top Deals & Discounts</p>
	</div>
	<!-- //top-header -->
	<!-- header-bot-->
	<div class="header-bot">
		<div class="header-bot_inner_wthreeinfo_header_mid">
			<!-- header-bot-->
			<div class="col-md-4 logo_agile">
				<h1>
					<a href="<?php echo base_url() ?>">
						<span>L</span>ocate  
						<span>L</span>ocal 
						<span>S</span>hop
						<img src="<?php echo asset_url('images/logo2.png');?>" alt=" ">
					</a>
				</h1>
			</div>
			<!-- header-bot -->
			<div class="col-md-8 header">
				<!-- header lists -->
				<ul>
					<li>
						<a  href="<?php echo base_url('shoplocator'); ?>" >
							<span class="fa fa-map-marker" aria-hidden="true"></span> Shop Locator</a>
					</li>
					<li>
						<span class="fa fa-phone" aria-hidden="true"></span> 001 234 5678
					</li>
					<?php if(!isset($_SESSION['user'])){ ?>
					<li>
						<a href="#" data-toggle="modal" data-target="#myModal1">
							<span class="fa fa-unlock-alt" aria-hidden="true"></span> Sign In </a>
					</li>
					<li>
						<a href="#" data-toggle="modal" data-target="#myModal2">
							<span class="fa fa-pencil-square-o" aria-hidden="true"></span> Sign Up </a>
					</li>
					<?php }else{ ?>
					<li>
						<a href="<?php echo base_url('customer/account'); ?>">
							<span class="fa fa-user-circle" aria-hidden="true"></span> <?php echo ucwords($_SESSION['user']['username']); ?> </a>
					</li>
					<li>
						<a href="<?php echo base_url('logout'); ?>">
							<span class="fa fa-window-close-o" aria-hidden="true"></span> Logout </a>
					</li>
				<?php	} ?>
				</ul>
				<!-- //header lists -->
	
				<!-- cart details -->
				<div class="top_nav_right">
					 		<button class="w3view-cart" id='homecart' >
								<i class="w3view-cart fa fa-cart-arrow-down" aria-hidden="true"></i>
							</button>
						 
					</div>
				</div>
				<!-- //cart details -->
				<div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<!-- shop locator (popup) -->
	<!-- Button trigger modal(shop-locator) -->
	<!-- //shop locator (popup) -->
	<!-- signin Model -->
	<!-- Modal1 -->
	<div class="modal fade" id="myModal1" tabindex="-1" role="dialog">
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
						<h3 class="agileinfo_sign">Sign In </h3>
						<p>
							Sign In now, Let's start your Grocery Shopping. Don't have an account?
							<a href="#" data-toggle="modal" data-target="#myModal2">
								Sign Up Now</a>
						</p>
						<form id='login' name ="login" method="post">
							<div class="styled-input agile-styled-input-top">
								<input type="text" placeholder="Email" name="email" required="">
							</div>
							<div class="styled-input">
								<input type="password" placeholder="Password" name="password" required="">
							</div>
							<input type="button" id='loginsubmit' value="Sign In">
						</form>
						<div class="clearfix"></div>
						<div class="alert alert-danger" id="loginerror" role="alert" style="display: none;">
							<strong>Oh snap!</strong> Change a few things up and try submitting again.
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			<!-- //Modal content-->
		</div>
	</div>
	<!-- //Modal1 -->
	<!-- //signin Model -->
	<!-- signup Model -->
	<!-- Modal2 -->
	<div class="modal fade" id="myModal2" tabindex="-1" role="dialog">
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
						<h3 class="agileinfo_sign">Sign Up</h3>
						<p>
							Come join the Grocery Shoppy! Let's set up your Account.
						</p>
						<form id='register' name ="register" method="post">
							<div class="styled-input agile-styled-input-top">
								<input type="text" placeholder="First Name" name="first_name" required="">
							</div>
								<div class="styled-input">
								<input type="text" placeholder="Last Name" name="last_name" required="">
							</div>
							<div class="styled-input">
								<input type="email" placeholder="E-mail" name="email" required="">
							</div>
								<div class="styled-input">
								<input type="text" minlength='1' placeholder="Mobile" name="mobile" required="">
							</div>
							<div class="styled-input">
								<input type="password" placeholder="Password" name="password" id="password" required="">
							</div>
							<div class="styled-input">
								<input type="password" placeholder="Confirm Password" name="password_conf" id="password2" required="">
							</div>
							<input type="button" id="registersubmit" value="Sign Up">
						</form>
						<p>
							<a href="#">By clicking register, I agree to your terms</a>
						</p>
						<div class="alert alert-danger" id="registererror" role="alert" style="display: none;">
							
						</div>
					</div>
				</div>
			</div>
			<!-- //Modal content-->
		</div>
	</div>
