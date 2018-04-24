
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Dashboard</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-inr f-s-40 color-primary"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2><?php echo round($dashboard['totalrevenue']['totalrevenue'],2); ?></h2>
                                    <p class="m-b-0">Total Revenue</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-shopping-cart f-s-40 color-success"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2><?php echo $dashboard['ordercount']['ordercount']; ?></h2>
                                    <p class="m-b-0">Sales Items</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">  
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-archive f-s-40 color-warning"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2><?php echo $dashboard['vendorcount']['vendorcount']; ?></h2>
                                    <p class="m-b-0">My Catalog items</p>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                </div>

                <div class="row bg-white m-l-0 m-r-0 box-shadow ">
                    <div class="col-lg-8">
                      <div class="card">
                            <div class="card-title">
                                <h4>Shipped Orders </h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Order ID</th>
                                                <th>Quantity</th>
                                                 <th>Payment method</th>
                                                 <th>Shipment method</th>
                                                <th>Status</th>
                                                
                                               
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                                <?php foreach ($shiporder as $shiporderkey => $shipordervalue) { ?>                                                     
                                                
                                            <tr>
                                                <td><?php echo $shiporderkey+1; ?> </td>
                                                <td><?php echo $shipordervalue['entity_id']; ?></td>
                                                <td><span><?php echo $shipordervalue['items_count']; ?></span></td>
                                                <td><span><?php echo $shipordervalue['payment_method']; ?></span></td>
                                                <td><span><?php echo $shipordervalue['shipment_method']; ?></span></td>
                                                <td><span class="badge badge-success"><?php echo $shipordervalue['status']; ?></span></td>

                                            </tr>
                                            <?php }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                            <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="year-calendar"></div>
                                </div>
                            </div>
                        </div>
                   
                    <!-- column -->
                </div>
                <div class="row">
					<div class="col-lg-3">
                        <div class="card bg-dark">
                            <div class="testimonial-widget-one p-17">
                                <div class="testimonial-widget-one owl-carousel owl-theme">
                                    <div class="item">
                                        <div class="testimonial-content">
                                            <img class="testimonial-author-img" src="<?php echo asset_url('admin/images/avatar/2.jpg');?>" alt="" />
                                            <div class="testimonial-author">John</div>
                                            <div class="testimonial-author-position">Founder-Ceo. Dell Corp</div>

                                            <div class="testimonial-text">
                                                <i class="fa fa-quote-left"></i>  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation .
                                                <i class="fa fa-quote-right"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="testimonial-content">
                                            <img class="testimonial-author-img" src="<?php echo asset_url('admin/images/avatar/3.jpg');?>" alt="" />
                                            <div class="testimonial-author">Abraham</div>
                                            <div class="testimonial-author-position">Founder-Ceo. Dell Corp</div>

                                            <div class="testimonial-text">
                                                <i class="fa fa-quote-left"></i>  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation .
                                                <i class="fa fa-quote-right"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="testimonial-content">
                                            <img class="testimonial-author-img" src="<?php echo asset_url('admin/images/avatar/1.jpg');?>" alt="" />
                                            <div class="testimonial-author">Lincoln</div>
                                            <div class="testimonial-author-position">Founder-Ceo. Dell Corp</div>

                                            <div class="testimonial-text">
                                                <i class="fa fa-quote-left"></i>  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation .
                                                <i class="fa fa-quote-right"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="testimonial-content">
                                            <img class="testimonial-author-img" src="<?php echo asset_url('admin/images/avatar/4.jpg');?>" alt="" />
                                            <div class="testimonial-author">TYRION LANNISTER</div>
                                            <div class="testimonial-author-position">Founder-Ceo. Dell Corp</div>

                                           <div class="testimonial-text">
                                                <i class="fa fa-quote-left"></i>  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation .
                                                <i class="fa fa-quote-right"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="testimonial-content">
                                            <img class="testimonial-author-img" src="<?php echo asset_url('admin/images/avatar/5.jpg');?>" alt="" />
                                            <div class="testimonial-author">TYRION LANNISTER</div>
                                            <div class="testimonial-author-position">Founder-Ceo. Dell Corp</div>

                                            <div class="testimonial-text">
                                                <i class="fa fa-quote-left"></i>  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation .
                                                <i class="fa fa-quote-right"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="testimonial-content">
                                            <img class="testimonial-author-img" src="<?php echo asset_url('admin/images/avatar/6.jpg');?>" alt="" />
                                            <div class="testimonial-author">TYRION LANNISTER</div>
                                            <div class="testimonial-author-position">Founder-Ceo. Dell Corp</div>

                                            <div class="testimonial-text">
                                                <i class="fa fa-quote-left"></i>  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation .
                                                <i class="fa fa-quote-right"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="card">
                            <div class="card-title">
                                <h4>Recent Orders </h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Order ID</th>
                                                <th>Quantity</th>
                                                 <th>Payment method</th>
                                                 <th>Shipment method</th>
                                                <th>Status</th>
                                                
                                               
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                                <?php foreach ($lastorder as $lastorderkey => $lastordervalue) { ?>                                                     
                                                
                                            <tr>
                                                <td><?php echo $lastorderkey+1; ?> </td>
                                                <td><?php echo $lastordervalue['entity_id']; ?></td>
                                                <td><span><?php echo $lastordervalue['items_count']; ?></span></td>
                                                <td><span><?php echo $lastordervalue['payment_method']; ?></span></td>
                                                <td><span><?php echo $lastordervalue['shipment_method']; ?></span></td>
                                                <td><span class="badge badge-success"><?php echo $lastordervalue['status']; ?></span></td>

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
          