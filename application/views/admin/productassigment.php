<div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Dashboard</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Add Product Assignment</li>
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
                                <h4 class="m-b-0 text-white">Add product assignment</h4>
                            </div>
                            <div class="card-body">
                                <form method="post" name='addproductassignment' id='addproductassignment'>

                                    <div class="form-body">
                                        <h3 class="card-title m-t-15">Product Info</h3>
                                        <hr>
                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Qty</label>
                                                    <input type="number" min="1" name='qty' id="qty" class="form-control" placeholder="Qty">
                                                   </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Price</label>
                                                    <input type="number" min='1' id="price" name='price' class="form-control" placeholder="Price">
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <!--/row-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Vendor ID</label>
                                                    <select class="form-control " name='vendor_id' id='vendor_id' data-placeholder="Choose a Vendor ID" >
                                                        <?php 
                                                            if (!empty($vendor_id) && count($vendor_id)) {
                                                             foreach ($vendor_id as $vendor_idkey => $vendor_idvalue) {
                                                              
                                                         ?>   
                                                        <option value="<?php echo $vendor_idvalue['entity_id'] ?>"><?php echo $vendor_idvalue['display_name']; ?></option>
                                                        <?php }}?>
                                                    </select>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                 <div class="form-group">
                                                    <label class="control-label">Product ID</label>
                                                    <select class="form-control " name='product_id' id='product_id' data-placeholder="Choose a Product ID">
                                                        <?php
                                                            if (!empty($product_id) && count($product_id)) {
                                                             foreach ($product_id as $product_idkey => $product_idvalue) {
                                                              
                                                         ?>
                                                       <option value="<?php echo $product_idvalue['entity_id'] ?>"><?php echo $product_idvalue['product_name']; ?></option>
                                                         <?php }}?>

                                                    </select>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <!--/row-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Status</label>
                                                    <select class="form-control " name='status' id='status' data-placeholder="Choose a Status" tabindex="1">
                                                        <option value="1">Enable</option>
                                                        <option value="0">Disable</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            
                                            <!--/span-->
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