
      <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Dashboard</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Admin User</li>
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
                                                <th>First name</th>
                                                <th>Last name</th>
                                                <th>Email</th>
                                                <th>Mobile</th>                                      
                                                <th>Created at</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                               <th>Entity id</th>
                                                <th>First name</th>
                                                <th>Last name</th>
                                                <th>Email</th>
                                                <th>Mobile</th>                                      
                                                <th>Created at</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php
                                             if (count($adminuser)) {  
                                                
                                             foreach ($adminuser as $adminuserkey => $adminuservalue) { ?>
                                                    <tr>
                                                        <td><?php echo $adminuservalue['entity_id']; ?></td>
                                                        <td><?php echo $adminuservalue['first_name']; ?></td>
                                                        <td><?php echo $adminuservalue['last_name']; ?></td>
                                                        <td><?php echo $adminuservalue['email']; ?></td>
                                                        <td><?php echo $adminuservalue['mobile']; ?></td>                                                    
                                                        <td><?php echo $adminuservalue['created_at']; ?></td>                                       
                                                    </tr>
                                            <?php  } }else {?>
                                                    <tr>
                                                        <td colspan="12">No Admin user</td>
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
          
        </div>