<div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Dashboard</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Edit Product</li>
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
                                <h4 class="m-b-0 text-white">Edit product</h4>
                            </div>
                            <div class="card-body">
                                <form method="post" name='editproduct' enctype="multipart/form-data" id='editproduct'>

                                    <div class="form-body">
                                        <h3 class="card-title m-t-15">Product Info</h3>
                                        <hr>
                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Sku</label>
                                                    <input type="hidden" name='entity_id' id="entity_id" class="form-control" value="<?php echo $editproduct['entity_id']; ?>">
                                                    <input type="text" name='sku' id="sku" class="form-control" placeholder="Sku" value='<?php echo $editproduct['sku']; ?>'" readonly >
                                                    <small class="form-control-feedback"> Should be unique </small> </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Price</label>
                                                    <input type="number" min='1' id="price" name='price' class="form-control" placeholder="Price" value="<?php echo $editproduct['price']; ?>">
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <!--/row-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Product Description</label>
                                                    <input type="text"  id="product_desc" name='product_desc' class="form-control" placeholder="Product Description" value="<?php echo $editproduct['product_desc']; ?>">
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                  <div class="form-group">
                                                    <label class="control-label">Brand</label>
                                                    <input type="text"  id="brand" name='brand' class="form-control" placeholder="Brand" value="<?php echo $editproduct['brand']; ?>">
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <!--/row-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Status</label>
                                                    <select class="form-control " name='status' id='status' data-placeholder="Choose a Status" tabindex="2">
                                                        <option value="1">Enable</option>
                                                        <option value="0">Disable</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group" >
                                                    <label class="control-label">Image</label>
                                                    <input type="file"  id="image_gallery" name='image_gallery' class="form-control" placeholder="Image">
                                                   <span style="float: right;"><img height="100" width="100" src="<?php echo asset_url('images/'.$editproduct['image_gallery']);?>"><?php echo $editproduct['image_gallery']; ?></span> 
                                                </div>
                                            </div>

                                                 <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Product Name</label>
                                                    <input type="text"  id="product_name" name='product_name' class="form-control" placeholder="Product Name" value="<?php echo $editproduct['product_name']; ?>">
                                                </div>
                                            </div>
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

          <script type="text/javascript">
            jQuery('#status').val('<?php echo $editproduct['status']; ?>');

        </script>