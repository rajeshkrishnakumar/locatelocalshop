<div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Dashboard</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Edit Shipment Method</li>
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
                                <h4 class="m-b-0 text-white">Edit Shipment Method</h4>
                            </div>
                            <div class="card-body">
                                <form method="post" name='editshipment' id='editshipment'>

                                    <div class="form-body">
                                        <h3 class="card-title m-t-15">Shipment Method Info</h3>
                                        <hr>
                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Shipment Method</label>
                                                    <input type="text" name='method_name' id="method_name" class="form-control" placeholder="Shipment Method" value="<?php echo $shipment['method_name'];  ?>" >
                                                     <input type="hidden" name='entity_id' id="entity_id" class="form-control"  value="<?php echo $shipment['entity_id'];  ?>">
                                                     </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Shipment Method Info</label>
                                                    <input type="text"  id="shipment_method_info" name='shipment_method_info' class="form-control" placeholder="Shipment Method Info" value="<?php echo $shipment['shipment_method_info'];  ?>">
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