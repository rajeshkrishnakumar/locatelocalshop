<div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Dashboard</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Edit Vendor</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-outline-primary"> 
                                <h4 class="m-b-0 text-white">Edit Vendor</h4>
                            </div>
                            <div class="card-body">
                                <form method="post" name='editvendor' id='editvendor'>

                                    <div class="form-body">
                                        <h3 class="card-title m-t-15">Vendor Info</h3>
                                        <hr>
                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">First Name</label>
                                                    <input type="text" name='first_name' id="first_name" class="form-control" placeholder="First Name" value="<?php echo $editvendor['first_name']; ?>" >
                                                     </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Last Name</label>
                                                    <input type="text"  id="last_name" name='last_name' class="form-control" placeholder="Last Name" value="<?php echo $editvendor['last_name']; ?>" >
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <!--/row-->
                                        
                                        <!--/row-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Mobile</label>
                                                      <input type="text"  id="mobile" name='mobile' class="form-control" placeholder="Mobile" value="<?php echo $editvendor['mobile']; ?>">
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Email</label>
                                                    <input type="text"  id="email" name='email' class="form-control" placeholder="Email" value="<?php echo $editvendor['email']; ?>" readonly>
                                                    <small class="form-control-feedback"> Should be unique </small>
                                                </div>
                                            </div>

                                                 <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Display Name</label>
                                                    <input type="text"  id="display_name" name='display_name' class="form-control" placeholder="Display Name" value="<?php echo $editvendor['display_name']; ?>">
                                                </div>
                                            </div>
                                            <!--/span-->

                                        </div>
                                         <h3 class="box-title m-t-40">Address</h3>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-12 ">
                                                <div class="form-group">
                                                    <label>Address 1</label>
                                                    <input type="text" name='address_1'  value="<?php echo $editvendor['address_1']; ?>"  class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                         <div class="row">
                                            <div class="col-md-12 ">
                                                <div class="form-group">
                                                    <label>Address 2</label>
                                                    <input type="text" name='address_2' value="<?php echo $editvendor['address_2']; ?>" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>City</label>
                                                    <input type="text" name='city' value="<?php echo $editvendor['city']; ?>" class="form-control">
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>State</label>
                                                    <input type="text" name='state' value="<?php echo $editvendor['state']; ?>" class="form-control">
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <!--/row-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Post Code</label>
                                                    <input type="text" name='pincode' value="<?php echo $editvendor['pincode']; ?>"  class="form-control">
                                                </div>
                                            </div>
                                      </div>
                                        <!--/row-->
                                         
                                    </div>
                                    <div class="form-actions">
                                        <button type="submit" id='addsubmit' class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                                        <button type="button" class="btn btn-inverse">Cancel</button>
                                    </div>
                                </form>
                                        <div class="alert alert-success" id="addsucessmsg" role="alert" style="display: none;">
                                             
                                        </div>
                                        <div class="alert alert-danger" role="alert" id="adderrormsg" style="display: none;">

                             
                                        </div>
                            </div>
                        </div>
                    </div>

 
                </div>
                <!-- Row -->
            
                <!-- End PAge Content -->
            </div>
            <!-- End Container fluid  -->
        </div>
        +