
      <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Dashboard</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Customer</li>
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
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Email</th>
                                                <th>Mobile</th>
                                                <th>Created At</th>
                                                 
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Entity id</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Email</th>
                                                <th>Mobile</th>
                                                <th>Created At</th>
                                                 
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php
                                             if (count($customer)) { 

                                             foreach ($customer as $customeritemskey => $customeritemsvalue) { ?>
                                                    <tr>
                                                        <td><?php echo $customeritemsvalue['entity_id']; ?></td>
                                                        <td><?php echo $customeritemsvalue['first_name']; ?></td>
                                                        <td><?php echo $customeritemsvalue['last_name']; ?></td>
                                                        <td><?php echo $customeritemsvalue['email']; ?></td>
                                                        <td><?php echo $customeritemsvalue['mobile']; ?></td>
                                                        <td><?php echo $customeritemsvalue['created_at']; ?></td>
                                                                                                           
                                                    </tr>
                                            <?php  } }else {?>
                                                    <tr>
                                                        <td colspan="12">No customer</td>
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