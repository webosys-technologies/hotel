
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <?php echo get_flashdata('message'); ?>
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-xs-6">

                <?php 

                // echo "<pre>";
                // print_r($usercount);
                // echo "</pre>";
                ?>
                <!-- small box -->
                <div class="small-box bg-light-blue color-palette">
                    <div class="inner">
                        <h3><?php echo $usercount; ?></h3>
                        <p>Total Users</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-users"></i>
                    </div>
                    <a href="<?php echo base_url('admin/clients'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-maroon disabled color-palette">
                    <div class="inner">
                        <h3><?php echo $ordercount; ?></h3>
                        <p>All Orders</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-credit-card"></i>
                    </div>
                    <a href="<?php echo base_url('admin/orders'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div> 
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green color-palette">
                    <div class="inner">
                              <h3><?php echo $hotelcount; ?></h3>
                        <p>All Hotels</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-home"></i>
                    </div>
                    <a href="<?php echo base_url('admin/hotel'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div> 
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-orange color-palette">
                    <div class="inner">
                              <h3><?php echo $paymentcount; ?></h3>
                        <p>Payment</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-credit-card"></i>
                    </div>
                    <a href="<?php echo base_url('admin/Payment'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-orange color-palette">
                    <div class="inner">
                              <h3><?php echo $paymentcount; ?></h3>
                        <p>Payment</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-credit-card"></i>
                    </div>
                    <a href="<?php echo base_url('admin/Payment'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>            

            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-orange color-palette">
                    <div class="inner">
                              <h3><?php echo $paymentcount; ?></h3>
                        <p>Payment</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-credit-card"></i>
                    </div>
                    <a href="<?php echo base_url('admin/Payment'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div> 
            
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-orange color-palette">
                    <div class="inner">
                              <h3><?php echo $paymentcount; ?></h3>
                        <p>Payment</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-credit-card"></i>
                    </div>
                    <a href="<?php echo base_url('admin/Payment'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div> 
        </div>
    </section>
    <!-- /.content -->
</div>
