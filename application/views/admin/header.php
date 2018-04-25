<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
        <script type="text/javascript">
            var URL="<?php echo base_url(); ?>";
        </script>

    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <title>LSS - Admin Dashboard Template</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo asset_url('admin/css/lib/bootstrap/bootstrap.min.css');?>" rel="stylesheet">
    <!-- Custom CSS -->

    <link href="<?php echo asset_url('admin/css/lib/calendar2/semantic.ui.min.css');?>" rel="stylesheet">
    <link href="<?php echo asset_url('admin/css/lib/calendar2/pignose.calendar.min.css');?>" rel="stylesheet">
    <link href="<?php echo asset_url('admin/css/lib/owl.carousel.min.css');?>" rel="stylesheet" />
    <link href="<?php echo asset_url('admin/css/lib/owl.theme.default.min.css');?>" rel="stylesheet" />
    <link href="<?php echo asset_url('admin/css/helper.css');?>" rel="stylesheet">
    <link href="<?php echo asset_url('admin/css/style.css');?>" rel="stylesheet">
     <script src="<?php echo asset_url('admin/js/lib/jquery/jquery.min.js');?>"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
    <!--[if lt IE 9]>
    <script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header fix-sidebar">
    <!-- Preloader - style you can find in spinners.css -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
			<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- Main wrapper  -->
    <div id="main-wrapper">
        <!-- header header  -->
        <div class="header">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- Logo -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="<?php echo base_url(); ?>">
                        <!-- Logo icon -->
                        <b><a href="http://local.locatelocalshop.com/">
                        <span style="color: #FF5722;">L</span>ocate  
                       <span style="color: #FF5722;">L</span>ocal 
                       <span style="color: #FF5722;">S</span>hop
                        <img src="http://local.locatelocalshop.com/assets/images/logo2.png" alt=" ">
                    </a></b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                       
                    </a>
                </div>
                <!-- End Logo -->
                <div class="navbar-collapse">
                    <!-- toggle and nav items -->
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted  " href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                         
                        <!-- End Messages -->
                    </ul>
                    <!-- User profile and search -->
                    <ul class="navbar-nav my-lg-0">

                        <!-- Search -->
                         
                         
                         <h2><?php echo ucwords($this->session->userdata("admin")['username']); ?></h2>
                        <!-- Profile -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?php echo asset_url('admin/images/users/5.jpg');?>" alt="user" class="profile-pic" /></a>
                            <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                                <ul class="dropdown-user">
                                    <?php $profileurl='backend/adminuser/edit/'.$this->session->userdata("admin")["user_id"]; ?>
                                    <li><a href="<?php echo base_url($profileurl); ?>"><i class="ti-user"></i> Profile</a></li>                                 
                                    <li><a href="<?php echo base_url('backend/logout'); ?>"><i class="fa fa-power-off"></i> Logout</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- End header header -->
        <!-- Left Sidebar  -->
        <div class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                        <li class="nav-label">Home</li>
                        <li> <a class="has-arrow  " href="<?php echo base_url('dashboard'); ?>" aria-expanded="false"><i class="fa fa-tachometer"></i><span class="hide-menu">Dashboard</span></a>
                           
                        </li>
                        <li class="nav-label">Order</li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-envelope"></i><span class="hide-menu">Orders</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo base_url('backend/orders'); ?>">Order</a></li>
                                <li><a href="<?php echo base_url('backend/ordersitems'); ?>">Order Items</a></li>
                                 <li><a href="<?php echo base_url('backend/orderstaus'); ?>">Order Status Change</a></li>
                                <li><a href="<?php echo base_url('backend/quotes'); ?>">Quote</a></li>
                                <li><a href="<?php echo base_url('backend/quotesitems'); ?>">Quote Items</a></li>
                            </ul>
                        </li>
                        <li class="nav-label">Customer</li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-bar-chart"></i><span class="hide-menu">Customer</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo base_url('backend/customer'); ?>">Customer Account View</a></li>
                                 <li><a href="<?php echo base_url('backend/customeraddress'); ?>"">Customer Address View</a></li>
                                <li><a href="<?php echo base_url('backend/contactus'); ?>"">Contact Us View</a></li>
                            </ul>
                        </li>
                        <li class="nav-label">Product</li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-suitcase"></i><span class="hide-menu">Catalog Product</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo base_url('backend/catalog'); ?>">View catalog product</a></li>
                                <li><a href="<?php echo base_url('backend/addproduct'); ?>">Add catalog product</a></li>
                                <li><a href="<?php echo base_url('backend/vendorcatalog'); ?>">View Vendor Product</a></li>
                                <li><a href="<?php echo base_url('backend/addproductassigment'); ?>">Add Vendor Product Assignment</a></li>
                                <li><a href="ui-dropdown.html">View Catagory</a></li>
                                <li><a href="ui-dropdown.html">Add Catagory</a></li>
                            </ul>
                        </li>
                        <li class="nav-label">Sales Promotion</li>
						<li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-suitcase"></i><span class="hide-menu">Promotion</span></a>
                             <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo base_url('backend/addpromotion'); ?>">Add Promotion</a></li>
                                 <li><a href="<?php echo base_url('backend/promotion') ;?>">View Promotion</a></li>
                            </ul>
                        </li>
                        <li class="nav-label">Vendors</li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-suitcase"></i><span class="hide-menu">Vendors</span></a>
                             <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo base_url('backend/addvendor'); ?> ">Add Vendors</a></li>
                                 <li><a href="<?php echo base_url('backend/vendor'); ?>">View Vendors</a></li>
                            </ul>
                        </li>
                        <li class="nav-label">Admin Config</li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-suitcase"></i><span class="hide-menu">Vendors</span></a>
                             <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo base_url('backend/addshipment'); ?>">Add Shipping method</a></li>
                                 <li><a href="<?php echo base_url('backend/shipment'); ?>">View Shipping method</a></li>
                                 <li><a href="<?php echo base_url('backend/addpayment'); ?>">Add Payment method</a></li>
                                  <li><a href="<?php echo base_url('backend/payment') ;?>">View Payment method</a></li>
                                   <li><a href="<?php echo base_url('backend/adminusers'); ?>">Admin users</a></li>
                                   <li><a href="<?php echo base_url('backend/addadminuser'); ?>">Add Admin users</a></li>
                            </ul>
                        </li>
                         <li class="nav-label">Profile</li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-suitcase"></i><span class="hide-menu">Change Password</span></a>
                             <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo base_url('backend/changepassword'); ?>">Change Password</a></li>
                             
                            </ul>
                        </li> 
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </div>
        <!-- End Left Sidebar  -->