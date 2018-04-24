<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <title>LLS - Admin Dashboard Template</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo asset_url('admin/css/lib/bootstrap/bootstrap.min.css');?>" rel="stylesheet">
    <script type="text/javascript">
            var URL="<?php echo base_url(); ?>";
        </script>
    <!-- Custom CSS -->

    <link href="<?php echo asset_url('admin/css/helper.css');?>" rel="stylesheet">
    <link href="<?php echo asset_url('admin/css/style.css');?>" rel="stylesheet">
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

        <div class="unix-login">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-4">
                        <div class="login-content card">
                            <div class="login-form">
                                <h4>Login</h4>
                                <form name='vendorlogin' id='vendorlogin' method="post">
                                    <div class="form-group">
                                        <label>Email address</label>
                                        <input type="email" name='email' class="form-control" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name='password' class="form-control" placeholder="Password">
                                    </div>
                                     
                                    <button type="submit" id='vendorloginsubmit' class="btn btn-primary btn-flat m-b-30 m-t-30">Sign in</button>
                                    
                                </form>
                                <div class="alert alert-danger" id="loginerror" role="alert" style="display: none;">
                            <strong>Oh snap!</strong> Change a few things up and try submitting again.
                        </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- End Wrapper -->

  </body>  

    <!-- footer -->
            <footer class="footer"> © 2018 All rights reserved. Template designed by <a href="https://colorlib.com">Colorlib</a></footer>
            <!-- End footer -->
        </div>
        <!-- End Page wrapper  -->
    </div>
    <!-- End Wrapper -->
    <!-- All Jquery -->
    <script src="<?php echo asset_url('admin/js/lib/jquery/jquery.min.js');?>"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo asset_url('admin/js/lib/bootstrap/js/bootstrap.min.js');?>"></script>
 
    <!-- scripit init-->
        <script src="<?php echo asset_url('js/jquery.validate.min.js');?>"></script>

    <script src="<?php echo asset_url('admin/js/common.js');?>"></script>
</body>

</html>