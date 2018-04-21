
      <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Dashboard</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Customer Address</li>
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
                                                <th>Customer Id</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>mobile</th>
                                                <th>Address 1</th>
                                                <th>Address 2</th>
                                                <th>Pincode</th>
                                                <th>City</th>
                                                <th>State</th>
                                                <th>Created At</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                               <th>Entity id</th>
                                                <th>Customer Id</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>mobile</th>
                                                <th>Address 1</th>
                                                <th>Address 2</th>
                                                <th>Pincode</th>
                                                <th>City</th>
                                                <th>State</th>
                                                <th>Created At</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php
                                             if (count($customeraddress)) {  

                                             foreach ($customeraddress as $customeraddresskey => $customeraddressvaluevalue) { ?>
                                                    <tr>
                                                        <td><?php echo $customeraddressvaluevalue['entity_id']; ?></td>
                                                        <td><?php echo $customeraddressvaluevalue['customer_id']; ?></td>
                                                        <td><?php echo $customeraddressvaluevalue['first_name']; ?></td>
                                                        <td><?php echo $customeraddressvaluevalue['last_name']; ?></td>
                                                        <td><?php echo $customeraddressvaluevalue['mobile']; ?></td>
                                                        <td><?php echo $customeraddressvaluevalue['address_1']; ?></td>
                                                        <td><?php echo $customeraddressvaluevalue['address_2']; ?></td>
                                                        <td><?php echo $customeraddressvaluevalue['pincode']; ?></td>  
                                                        <td><?php echo $customeraddressvaluevalue['city']; ?></td>
                                                        <td><?php echo $customeraddressvaluevalue['state']; ?></td>
                                                        <td><?php echo $customeraddressvaluevalue['created_at']; ?></td>                                                     
                                                    </tr>
                                            <?php  } }else {?>
                                                    <tr>
                                                        <td colspan="12">No customeraddress</td>
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