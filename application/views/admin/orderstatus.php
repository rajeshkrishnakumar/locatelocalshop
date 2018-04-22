<div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Dashboard</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Change Order Status</li>
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
                                <h4 class="m-b-0 text-white">Change Order Status</h4>
                            </div>
                            <div class="card-body">
                                <form method="post" name='orderstatuschange' id='orderstatuschange'>

                                    <div class="form-body">
                                        <h3 class="card-title m-t-15">Order Status Info</h3>
                                        <hr>
                                         
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Order ID</label>
                                                    <select class="form-control " name='entity_id' id='entity_id' data-placeholder="Choose a Order ID" >
                                                        <?php 
                                                            if (!empty($orderid) && count($orderid)) {
                                                             foreach ($orderid as $orderidkey => $orderidvalue) {
                                                              
                                                         ?>   
                                                        <option value="<?php echo $orderidvalue['entity_id'] ?>"><?php echo $orderidvalue['entity_id']; ?></option>
                                                        <?php }}?>
                                                    </select>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                 <div class="form-group">
                                                    <label class="control-label">Order Status</label>
                                                    <select class="form-control " name='status' id='status' data-placeholder="Choose a Order Status">
                                                        
                                                       <option value="processing">Processing</option>
                                                        <option value="shipped">Shipped</option>   
                                                        <option value="delivered">Delivered</option>
                                                    </select>
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