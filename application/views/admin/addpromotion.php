<div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Dashboard</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Add Promotion</li>
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
                                <h4 class="m-b-0 text-white">Add promotion</h4>
                            </div>
                            <div class="card-body">
                                <form method="post" name='addpromotion'  id='addpromotion'>

                                    <div class="form-body">
                                        <h3 class="card-title m-t-15">Promotion Info</h3>
                                        <hr>
                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Coupon Code</label>
                                                    <input type="text" name='coupon_code' id="coupon_code" class="form-control" placeholder="Coupon Code">
                                                    <small class="form-control-feedback"> Should be unique </small> </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Discount price</label>
                                                    <input type="number" min='1' id="discount_price" name='discount_price' class="form-control" placeholder="Discount price">
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <!--/row-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">From Date</label>
                                                    <input type="date" name='from_date' class="form-control" placeholder="yyyy/mm/dd">
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                  <div class="form-group">
                                                    <label class="control-label">To Date</label>
                                                    <input type="date" name='to_date' class="form-control" placeholder="yyyy/mm/dd">
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <!--/row-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Is Active</label>
                                                    <select class="form-control " name='is_active' id='is_active' data-placeholder="Choose a Active" tabindex="1">
                                                        <option value="1">Enable</option>
                                                        <option value="0">Disable</option>
                                                    </select>
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