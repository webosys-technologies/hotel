<?php $this->load->view('common/header1'); ?>
<section id="page-header" class="section background">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h3> <?php echo ($hotelroom[0]->hotel_name)?></h3>
                <p>

                    <?php echo ($hotelroom[0]->hotel_address)?></p>
                </div>
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end section -->

    <section class="section clearfix">
        <div class="container">
            <div class="row">
            <div id="fullwidth" class="col-sm-12">
                    <!-- START CONTENT -->
                    <div class="single-hotel-wrapper">
                        <div class="single-hotel-image">
                             <img src="<?php echo FILE .$hotelroom[0]->hotel_pic; ?>" alt="" class="img-responsive">

                            <div class="single-hotel-bottom">
<!--                                <p>
                                    <i class="icon-location38"></i> <strong>Area:</strong> Marina Bay 
                                    <i class="icon-person199"></i> <strong>Rooms:</strong> 2561 
                                    <i class="icon-wifi10"></i> <strong>Free:</strong> Wifi
                                </p>-->
                            </div><!-- end bottom -->
                        </div><!-- end image -->

                        <hr class="hotel-hr">

                        <div class="row">
                            <div id="content" class="col-md-9 col-sm-12 col-xs-12">
                                <div class="book-widget">
                                    <div class="hotel-title">
                                        <h5>BOOK HOTEL NOW</h5>
                                    </div>

                                    <form class="bookform form-inline row">
                                  <?php if($bookedroom['0']->numid > 0){ ?>
                                        <a class="btn btn-block booknow" href="<?php echo base_url('user/book_hotel').'/'.custom_encode($hotelroom[0]->hotel_id); ?>">Book Now </a>
                                                <?php }else{ ?>
                                        
                                         <a class="btn btn-block booknow" href="#">No RoOM Avilable </a>
                                               
                                      <?php  }?>
                                    </form>

                                    <div class="clearfix"></div>

                                    <hr>
                                    <br>


                                    <div class="row hotel-desc">
                                        <div class="col-md-12">
                                            <h5>ABOUT THE HOTEL</h5>
                                            <p> <?php echo $hotelroom[0]->hotel_description; ?></p>
 </div><!-- end col -->
                                    </div><!-- end hote-desc -->
                                </div><!-- end book-widget -->

                                <div class="clearfix"></div>
                                <hr>
                                <br>


                        <div class="leave-a-feedback text-center clearfix">
                            <h6>PLEASE <a href="<?php echo base_url('login'); ?>">LOGIN / REGISTER</a></h6>
                        </div><!-- end leave-a-feedback -->

                        <div class="related-hotels clearfix">
                            <div class="hotel-title">
                                <h5>RELATED HOTELS</h5>
                            </div>

                            <div class="row">
                                  <?php     
             
          if(isset($hoteldata) && count($hoteldata)>0):
            foreach ($hoteldata as $key => $value): ?>
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <div class="post-wrapper clearfix border-bottom">
                                        <div class="hotel-wrapper">
                                            <div class="post-media">
                                                <a href="<?php echo base_url('hotel/detail')."?hotel_id=".custom_encode($value->hotel_id);?>"><img src="<?php  echo FILE.$value->hotel_pic; ?>" alt="" class="img-responsive"></a>
                                            </div><!-- end media -->
                                            <div class="post-title clearfix">
                                                <div class="pull-left">
                                                    <h5><a href="<?php echo base_url('hotel/detail')."?hotel_id=".custom_encode($value->hotel_id);?>" title=""><?php  echo $value->hotel_name; ?></a></h5>
                                                </div><!-- end left -->
                                                <div class="pull-right">
<!--                                                    <h6>$500</h6>-->
                                                </div><!-- end left -->
                                            </div><!-- end title -->
                                         
                                        </div><!-- end hotel-wrapper -->                            
                                    </div><!-- end post-wrapper -->
                                </div><!-- end col -->
  <?php endforeach; else:   ?>
                                 <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="post-wrapper clearfix border-bottom">
     <div class="hotel-wrapper">
      <div class="post-title clearfix">      
       <h5 class="centertext">No Hotel is present</h5>
     </div><!-- end title -->
   </div><!-- end hotel-wrapper -->                            
 </div><!-- end post-wrapper -->
</div><!-- end col -->
<?php endif; ?>
                              <!-- end col -->
                            </div><!-- end row -->
                        </div><!-- end related-hotels -->
                    </div><!-- end content -->

                    <div id="sidebar" class="col-md-3 col-sm-12 col-xs-12">
                        <div class="widget clearfix">
                            <div class="widget-title">
                                <h6>CLIENTS LIKE THIS HOTEL FOR:</h6>
                            </div><!-- end title -->


                            <div class="hotel-widget clearfix">
                                <p><i class="icon-air6"></i>Nearest airport:</p>
                                <small><?php echo $hotelroom[0]->near_airport; ?></small>
                            
                            </div><!-- end listwidget -->
                            
                            <div class="hotel-widget clearfix">
                                <p><i class="icon-car82"></i> Nearest Railway Station:</p>
                                <small><?php echo $hotelroom[0]->near_railway_st; ?></small>
                            </div><!-- end listwidget -->



                        </div><!-- end widget -->
                    </div><!-- end sidebar -->
                </div><!-- end row -->
            </div><!-- end single-hotel-wrapper -->
            <!-- END CONTENT -->

        </div><!-- end fullwidth -->
    </div><!-- end row -->
</div><!-- end container -->
</section><!-- end section -->
<?php $this->load->view('common/footer'); ?>