
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
                                                <th>Name</th>
                                                <th>Subject</th>
                                                <th>Email</th>
                                                <th>Status</th>
                                                <th>Created At</th>
                                                 <th>Close</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Entity id</th>
                                                <th>Name</th>
                                                <th>Subject</th>
                                                <th>Email</th>
                                                <th>Status</th>
                                                <th>Created At</th>
                                                 <th>Close</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php
                                             if (count($contactus)) { 

                                             foreach ($contactus as $contactuskey => $contactusvalue) { ?>
                                                    <tr>
                                                        <td><?php echo $contactusvalue['entity_id']; ?></td>
                                                        <td><?php echo $contactusvalue['name']; ?></td>
                                                        <td><?php echo $contactusvalue['subject']; ?></td>
                                                        <td><?php echo $contactusvalue['email']; ?></td>
                                                        <td><?php echo $contactusvalue['status']; ?></td>
                                                        <td><?php echo $contactusvalue['created_at']; ?></td>
                                                       <td><a href="<?php echo base_url().'backend/contactus/complete/'.$contactusvalue['entity_id'];  ?>" class="btn btn-danger">Close</a></td>                                                    
                                                    </tr>
                                            <?php  } }else {?>
                                                    <tr>
                                                        <td colspan="12">No Complaint</td>
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