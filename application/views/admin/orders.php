
      <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Dashboard</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Orders</li>
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
                                                <th>Status</th>
                                                <th>Items count</th>
                                                <th>Customer id</th>
                                                <th>Coupon code</th>
                                                 <th>Discount</th>
                                                 <th>Delivery charge</th>
                                                 <th>Shipment method</th>
                                                 <th>Payment method</th>
                                                 <th>Sub total</th>
                                                 <th>Grant total</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Entity id</th>
                                                <th>Vendor id</th>
                                                <th>Status</th>
                                                <th>Items count</th>
                                                <th>Customer id</th>
                                                <th>Coupon code</th>
                                                 <th>Discount</th>
                                                 <th>Delivery charge</th>
                                                 <th>Shipment method</th>
                                                 <th>Payment method</th>
                                                 <th>Sub total</th>
                                                 <th>Grant total</th>
                                                 
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php
                                             if (count($orders)) { 

                                             foreach ($orders as $orderskey => $ordersvalue) { ?>
                                                    <tr>
                                                        <td><?php echo $ordersvalue['entity_id']; ?></td>
                                                        <td><?php echo $ordersvalue['vendor_id']; ?></td>
                                                        <td><?php echo $ordersvalue['status']; ?></td>
                                                        <td><?php echo $ordersvalue['items_count']; ?></td>
                                                        <td><?php echo $ordersvalue['customer_id']; ?></td>
                                                        <td><?php echo $ordersvalue['coupon_code']; ?></td>
                                                        <td><?php echo $ordersvalue['discount']; ?></td>
                                                        <td><?php echo $ordersvalue['delivery_charge']; ?></td>
                                                        <td><?php echo $ordersvalue['shipment_method']; ?></td>
                                                        <td><?php echo $ordersvalue['payment_method']; ?></td>
                                                        <td><?php echo $ordersvalue['sub_total']; ?></td>
                                                        <td><?php echo $ordersvalue['grant_total']; ?></td>
                                                    </tr>
                                            <?php  } }else {?>
                                                    <tr>
                                                        <td colspan="12">No Orders</td>
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