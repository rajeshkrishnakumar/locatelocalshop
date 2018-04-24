
      <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Dashboard</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Vendor Catalog</li>
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
                                                <th>Vendor id</th>
                                                <th>Product id</th>
                                                <th>Qty</th>
                                                <th>Meta Title</th>
                                                <th>Meta Desc</th>
                                                <th>Price</th>
                                                 <th>Status</th>
                                                 <th>Special price</th> 
                                                 <th>Edit</th> 
                                                 <th>Delete</th> 
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Entity id</th>
                                                <th>Vendor id</th>
                                                <th>Product id</th>
                                                <th>Qty</th>
                                                <th>Meta Title</th>
                                                <th>Meta Desc</th>
                                                <th>Price</th>
                                                 <th>Status</th>
                                                 <th>Special price</th> 
                                                 <th>Edit</th> 
                                                 <th>Delete</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php
                                             if (count($vendorcatalog)) {

                                             foreach ($vendorcatalog as $vendorcatalogkey => $vendorcatalogvalue) { ?>
                                                    <tr>
                                                        <td><?php echo $vendorcatalogvalue['entity_id']; ?></td>
                                                        <td><?php echo $vendorcatalogvalue['vendor_id']; ?></td>
                                                        <td><?php echo $vendorcatalogvalue['product_id']; ?></td>
                                                        <td><?php echo $vendorcatalogvalue['qty']; ?></td>
                                                        <td><?php echo $vendorcatalogvalue['meta_title']; ?></td>
                                                        <td><?php echo $vendorcatalogvalue['meta_desc']; ?></td>
                                                        <td><?php echo $vendorcatalogvalue['price']; ?></td>
                                                        <td><?php echo $vendorcatalogvalue['status']; ?></td>
                                                         <td><?php echo $vendorcatalogvalue['special_price']; ?></td>   
                                                          <td><a href="<?php echo base_url().'vendor/productassignment/edit/'.$vendorcatalogvalue['entity_id'];  ?>" class="btn btn-info">Edit</a></td>
                                                            <td><a href="<?php echo base_url().'vendor/productassignment/delete/'.$vendorcatalogvalue['entity_id'];  ?>" class="btn btn-danger">Delete</a></td>                                                 
                                                    </tr>
                                            <?php  } }else {?>
                                                    <tr>
                                                        <td colspan="12">No Vendor Catalog</td>
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