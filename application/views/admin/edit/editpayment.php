<div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Dashboard</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Edit Payment Method</li>
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
                            <div class="card-header">
                                <h4 class="m-b-0 text-white">Edit Payment Method</h4>
                            </div>
                            <div class="card-body">
                                <form method="post" name='editpayment' id='editpayment'>

                                    <div class="form-body">
                                        <h3 class="card-title m-t-15">Payment Method Info</h3>
                                        <hr>
                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Payment Method</label>
                                                    <input type="text" name='method_name' id="method_name" class="form-control" placeholder="Payment Method" value="<?php echo $payment['method_name'];  ?>">
                                                     <input type="hidden" name='entity_id' id="entity_id" class="form-control"  value="<?php echo $payment['entity_id'];  ?>">
                                                     </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Payment Method Info</label>
                                                    <input type="text"  id="payment_method_info" name='payment_method_info' class="form-control" placeholder="Payment Method Info"  value="<?php echo $payment['method_name'];  ?>" >
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        
                                         
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