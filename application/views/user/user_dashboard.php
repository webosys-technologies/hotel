<?php $this->load->view('common/header1'); ?>

<section id="page-header" class="section background">
 <div class="container">
  <div class="row">
   <div class="col-sm-12">
    <ul class="c1 breadcrumb text-left">
    </ul>
    <h3>Welcome To Trips</h3>
  </div>
</div><!-- end row -->
</div><!-- end container -->
</section><!-- end section -->
<section class="section clearfix">
 <div class="container">
  <div class="row">
   <div id="fullwidth" class="col-sm-12">
    <!-- START CONTENT -->
    <div class="row">
      <?php
      // echo '<pre>';
      // print_r($hoteldata);
      // echo "</pre>";
      if(isset($hoteldata) && count($hoteldata)>0):
        foreach ($hoteldata as $key => $value):
         ?>
       <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="post-wrapper clearfix border-bottom">
         <div class="hotel-wrapper">
          <div class="post-media">
           <a href="<?php echo base_url('hotel/detail')."?hotel_id=".custom_encode($value->hotel_id);?>"><img src="<?php  echo FILE.$value->hotel_pic; ?>" alt="" class="img-responsive hotel_pic"></a>
          </div><!-- end media -->
          <div class="post-title clearfix">
           <div class="pull-left">
           <h5><a href="<?php echo base_url('hotel/detail')."?hotel_id=".custom_encode($value->hotel_id);?>"><?php echo $value->hotel_name; ?></a></h5>
          </div><!-- end left -->
<!--          <div class="pull-right">
            <h6>&#x20b9 <?php echo $value->hotel_price; ?></h6>
          </div> end left -->
        </div><!-- end title -->
<!--          <div class="post-title clearfix">
           <div class="pull-left">
           <h6>Available Rooms</h6>
          </div> end left 
          <div class="pull-right">
            <h6><?php //echo $value->availabel_room; ?></h6>
          </div> end left 
        </div> end title -->
        <span class="rating">
          <i class="fa fa-star"></i>
          <i class="fa fa-star"></i>
          <i class="fa fa-star"></i>
          <i class="fa fa-star"></i>
          <i class="fa fa-star"></i>
        </span><!-- end rating -->
        <p><?php echo $value->hotel_description; ?></p>
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
</div><!-- end row -->
</div><!-- end fullwidth -->
</div><!-- end row -->
</div><!-- end container -->
</section><!-- end section -->
<?php $this->load->view('common/footer'); ?>

