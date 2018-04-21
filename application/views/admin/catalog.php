
      <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Dashboard</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Catalog</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Data Export</h4>
                                <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                             <tr>
                                                <th>Entity id</th>
                                                <th>Sku</th>
                                                <th>Product Name</th>
                                                <th>Price</th>
                                                <th>Special Price</th>
                                                <th>Description</th>
                                                <th>Brand</th>
                                                <th>Image Gallery</th>
                                                 <th>Status</th>
                                                 <th>Created At</th> 
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                  <th>Entity id</th>
                                                <th>Sku</th>
                                                <th>Product Name</th>
                                                <th>Price</th>
                                                <th>Special Price</th>
                                                <th>Description</th>
                                                <th>Brand</th>
                                                <th>Image Gallery</th>
                                                 <th>Status</th>
                                                 <th>Created At</th>
                                                 
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php
                                             if (count($catalog)) { 

                                             foreach ($catalog as $catalogkey => $catalogvalue) { ?>
                                                    <tr>
                                                        <td><?php echo $catalogvalue['entity_id']; ?></td>
                                                        <td><?php echo $catalogvalue['sku']; ?></td>
                                                        <td><?php echo $catalogvalue['product_name']; ?></td>
                                                        <td><?php echo $catalogvalue['price']; ?></td>
                                                        <td><?php echo $catalogvalue['special_price']; ?></td>
                                                        <td><?php echo $catalogvalue['product_desc']; ?></td>
                                                        <td><?php echo $catalogvalue['brand']; ?></td>
                                                        <td><img height="200" width="200" src="<?php echo asset_url('images/'.$catalogvalue['image_gallery']);?>"><?php echo $catalogvalue['image_gallery']; ?></td>
                                                        <td><?php echo $catalogvalue['status']; ?></td>
                                                         <td><?php echo $catalogvalue['created_at']; ?></td>                                                   
                                                    </tr>
                                            <?php  } }else {?>
                                                    <tr>
                                                        <td colspan="12">No Catalog Items</td>
                                                    </tr>
                                            <?php }?>
                                                
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <!-- End PAge Content -->
            </div>
            <!-- End Container fluid  -->
          
        </div