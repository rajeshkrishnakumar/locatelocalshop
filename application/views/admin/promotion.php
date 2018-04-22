
      <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Dashboard</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Promotion</li>
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
                                                <th>Coupon code</th>
                                                <th>Discount price</th>
                                                <th>Active</th>
                                                <th>From date</th>
                                                <th>To date</th>
                                                <th>User per customer</th>
                                                <th>Edit</th>
                                                  <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                              <th>Entity id</th>
                                                <th>Coupon code</th>
                                                <th>Discount price</th>
                                                <th>Active</th>
                                                <th>From date</th>
                                                <th>To date</th>
                                                <th>User per customer</th>
                                                 <th>Edit</th>
                                                  <th>Delete</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php
                                             if (count($promotion)) {   

                                             foreach ($promotion as $promotionkey => $promotionvalue) { ?>
                                                    <tr>
                                                        <td><?php echo $promotionvalue['entity_id']; ?></td>
                                                        <td><?php echo $promotionvalue['coupon_code']; ?></td>
                                                        <td><?php echo $promotionvalue['discount_price']; ?></td>
                                                        <td><?php echo $promotionvalue['is_active']; ?></td>
                                                        <td><?php echo $promotionvalue['from_date']; ?></td>
                                                        <td><?php echo $promotionvalue['to_date']; ?></td>
                                                        <td><?php echo $promotionvalue['use_per_customer']; ?></td>   
                                                        <td><a href="<?php echo base_url().'backend/promotion/edit/'.$promotionvalue['entity_id'];  ?>" class="btn btn-info">Edit</a></td>
                                                            <td><a href="<?php echo base_url().'backend/promotion/delete/'.$promotionvalue['entity_id'];  ?>" class="btn btn-danger">Delete</a></td>                                         
                                                    </tr>
                                            <?php  } }else {?>
                                                    <tr>
                                                        <td colspan="12">No Promotion</td>
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