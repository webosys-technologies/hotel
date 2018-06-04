<?php $this->load->view('common/header'); ?>

<section class="section fullscreen background parallax" style="padding:172px 0 !important; background-image:url('<?php echo base_url()?>/assets/upload/parallax_slider_02.jpg');" data-img-width="1920" data-img-height="1133" data-diff="100">
    <div class="container">
    <div class="row">
      <div class="col-md-12 col-xs-12">
        <div class="home-form">
          <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="tab_01">
             <center> <h5>WHERE WOULD YOU LIKE TO GO?</h6></center>
              <form class="bookform form-inline row" method="POST" accept="" action="<?php echo base_url('search'); ?>">
               <div class="form-group col-md-2 col-sm-2 col-xs-12 col-md-offset-2">
                <div class="input-group">
                  <input type="text" class="form-control" name="checkin" required="required" placeholder="Check in" id="datepicker">
                  <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                </div>
              </div>
              <div class="form-group col-md-2 col-sm-2 col-xs-12">
                <div class="input-group">
                  <input type="text" class="form-control" name="checkout" required="required" placeholder="Check out" id="datepicker1">
                  <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                </div>
              </div>
              <div class="form-group col-md-2 col-sm-2 col-xs-12">
                <div class="dropdown">
                  <select class="selectpicker" data-style="btn-white" name="bed_type" id="bed_type" required="required">
                 <option value="1">Single Bed</option>
                 <option value="2">Double Bed</option>
                 <option value="3">Triple Bed</option>
                 <option value="4">Hall</option>
                  </select>
                </div>
              </div>
                   <!-- <div class="form-group col-md-2 col-sm-2 col-xs-12">
              
                  <input type="text" class="form-control" name="no_of_room" required="required" placeholder="No. of Room">
                
                </div> -->
              <div class="form-group col-md-2 col-sm-2 col-xs-12">
                <button type="submit" class="btn btn-primary btn-block"><i class="icon-search"></i>SEARCH</button>
              </div>
            </form>
          </div><!-- end tab-pane -->
        </div><!-- end tab-content -->
      </div><!-- end homeform -->
    </div><!-- end col -->
    <div class="col-md-6 col-xs-12">
      <div class="home-message">
        <h1>LET’S DISCOVER THE<br>WORLD TOGETHER</h1>
        <p>Template based on deep research on the most popular travel booking websites such as booking.com, tripadvisor, yahoo travel, expedia, priceline, hotels.com, travelocity, kayak, orbitz, etc. This guys can’t be wrong. You should definitely give it a shot :)</p>
        <a href="#" class="btn btn-primary btn-lg border-radius">READ MORE</a>
      </div><!-- end homemessage -->
    </div><!-- end col -->            
  </div><!-- end row -->
</div><!-- end container -->
</section><!-- end section -->
<section class="section fullscreen background parallax" style="background-image:url('<?php echo base_url(); ?>assets/upload/parallax_03.jpg');" data-img-width="1920" data-img-height="586" data-diff="10">
  <div class="container">
    <div id="testimonials">
      <div class="testi-item">
        <div class="hotel-title text-center">
          <h3>THE TRIPS SAVED MY LIFE!</h3>
          <hr>
          <p>Template based on deep research on the most popular travel booking websites such as booking.com, tripadvisor, yahoo<br>
            travel, expedia, priceline, hotels.com, travelocity, kayak, orbitz, etc. This guys can’t be wrong.<br>
            You should definitely give it a shot :)</p>
            <h6>- DAVID / CEO AGODA -</h6>
          </div>
        </div><!-- end testi-item -->

        <div class="testi-item">
          <div class="hotel-title text-center">
            <h3>THANKS YOU TRIPS! THIS IS AMAZING TRAVEL!</h3>
            <hr>
            <p>Template based on deep research on the most popular travel booking websites such as booking.com, tripadvisor, yahoo<br>
              travel, expedia, priceline, hotels.com, travelocity, kayak, orbitz, etc. This guys can’t be wrong.<br>
              You should definitely give it a shot :)</p>
              <h6>- DAVID / CEO AGODA -</h6>
            </div>
          </div><!-- end testi-item -->
        </div><!-- end testimonials -->
      </div><!-- end container -->
    </section><!-- end section -->

    <section class="nopadding clearfix">
      <div class="owl-fullwidth">
        <div class="owl-item-full">
            <img src="<?php echo base_url(); ?>assets/images/img12.jpg" alt="" width="675" height="455">
        </div>
        <div class="owl-item-full">
          <img src="<?php echo base_url();?>assets/images/img11.jpg" alt="" width="675" height="455">
        </div>
           <div class="owl-item-full">
            <img src="<?php echo base_url(); ?>assets/images/img9.jpg" alt="" width="675" height="455">
        </div>
           <div class="owl-item-full">
            <img src="<?php echo base_url(); ?>assets/images/img10.jpg" alt="" width="675" height="455">
        </div>
      </div><!-- end container -->
    </section><!-- end section -->

    <section class="section clearfix section-bottom hide">
      <div class="container">
        <div class="hotel-title">
          <h3>OUR SERVICES</h3>
          <hr class="left">
        </div><!-- end hotel-title -->
        <div class="row">
          <div class="col-md-9">
            <div class="service-style row">
              <div class="icon-container border-radius col-md-3 col-sm-3 col-xs-3">
                <i class="icon-hotel16"></i>
              </div>
              <div class="col-md-10 col-xs-10 col-sm-10">
                <h5>HOTEL ONLINE BOOKING SERVICE</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab aut dignissimos ea est, impedit incidunt, laboriosam maxime molestias numquam odio officiis. Ab aut dignissimos ea est, impedit incidunt.</p>
              </div>
            </div><!-- end service -->
          </div><!-- end col -->
          <div class="col-md-3">
            <img src="<?php echo base_url();?>assets/upload/girl.png" alt="" class="img-responsive">
          </div><!-- end col -->
        </div><!-- end row -->
      </div><!-- end container -->
    </section><!-- end section -->  
    <section class="section section-light clearfix">
      <div class="container">
       <div class="top-destinations clearfix">
        <div class="hotel-title text-center">
          <h3>BEST DESTINATIONS FOR SUMMER</h3>
          <p>Template based on deep research on the most popular travel booking websites such as booking.com, tripadvisor, yahoo<br> travel, expedia, priceline, hotels.com,travelocity, kayak, orbitz, etc. This guys can’t be wrong.<br> You should definitely give it a shot :)</p>
          <hr>
        </div>
      </div><!-- end related-hotels -->
      <div class="clearfix">
        <div class="row">
          <?php     
              // echo '<pre>';
              // print_r($hoteldata);
              // echo "</pre>";
          if(isset($hoteldata) && count($hoteldata)>0):
            foreach ($hoteldata as $key => $value): ?>
          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="post-wrapper clearfix border-bottom">
             <div class="hotel-wrapper">
              <div class="post-media">
                <a href="<?php echo base_url('hotel/detail')."?hotel_id=".custom_encode($value->hotel_id);?>"><img src="<?php  echo FILE.$value->hotel_pic; ?>" alt="" class="img-responsive hotel_pic"></a>
              </div><!-- end media -->
              <div class="post-title clearfix">
               <div class="pull-left">
               </div><!-- end left -->
               <div class="pull-right">
              </div><!-- end left -->
            </div><!-- end title -->
            <div class="post-title clearfix">
             <div class="pull-left">
<!--               <h6>Temple Distance</h6>-->
             </div><!-- end left -->
             <div class="pull-right">
            </div><!-- end left -->
          </div><!-- end title -->
<!--          <p><?php //echo $value->hotel_description; ?></p>-->
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
</div>
</div><!-- end container -->
</section><!-- end section -->
<section class="section fullscreen background parallax" style="background-image:url('<?php echo base_url() ?>assets/upload/parallax_05.jpg');" data-img-width="1921" data-img-height="665" data-diff="20">
  <div class="container">
    <div class="home-message text-center">
      <h1 id="firebas">LET’S DISCOVER THE<br>WORLD TOGETHER</h1>
      <p>Template based on deep research on the most popular travel booking websites such as booking.com, tripadvisor, yahoo<br> travel, expedia, priceline, hotels.com, travelocity, kayak, orbitz, etc. This guys can’t be wrong.<br> You should definitely give it a shot :)</p>
      <a href="#" class="btn btn-primary btn-lg border-radius">READ MORE</a>
    </div><!-- end homemessage -->
  </div><!-- end container -->
</section><!-- end section -->
<section class="section clearfix hide">
  <div class="container">
    <div class="popular-destinations clearfix">
      <div class="hotel-title">
        <h5>NEWS AND UPDATES</h5>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <div class="clearfix">
            <div class="post-media clearfix">
              <a href="blog-single.html"><img src="<?php echo base_url();?>assets/upload/home_blog_05.jpg" alt="" class="img-responsive"></a>
            </div><!-- end post-media -->

            <div class="post-title clearfix">
              <h5><a href="blog-single.html">THAILAND BY TRAIN WITH EASTERN AND ORIENTAL EXPRESS</a></h5>
            </div><!-- end ost-title -->

            <div class="post-meta home-blog-list clearfix">
              <span><i class="icon-attach"></i> 03 Feb 2015</span>
              <span><i class="icon-map110"></i> Asia, Thailand</span>
            </div><!-- ne dpost-meta -->

            <div class="post-content clearfix">
              <p>Template based on deep research on the most popular travel booking websites such as booking.com, tripadvisor, yahoo travel, expedia, priceline, hotels.com, travelocity, kayak, orbitz, etc. This guys can’t be wrong. You should definitely give it a shot :) ed on deep research on the most popular travel booking websites such as booking.com, tripadvisor, yahoo travel, expedia.</p>
            </div><!-- end post-content -->
          </div><!-- end post-wrapper -->
        </div><!-- end col -->

        <div class="col-md-6">
          <div class="row">
            <div class="clearfix">
              <div class="col-sm-6">
                <div class="post-media clearfix">
                  <a href="blog-single.html"><img src="<?php echo base_url();?>assets/upload/home_blog_06.jpg" alt="" class="img-responsive"></a>
                </div><!-- end post-media -->
              </div>
              <div class="col-sm-6">
                <div class="post-title clearfix">
                  <h5><a href="blog-single.html">SANTORINI - GREECE</a></h5>
                </div><!-- end ost-title -->

                <div class="post-meta home-blog-list clearfix">
                  <span><i class="icon-map110"></i> Greece, Santorina</span>
                </div><!-- ne dpost-meta -->

                <div class="post-content clearfix">
                  <p>Template based on deep research on the most popular travel booking websites such as booking.com, tripadvisor, yahoo travel, expedia</p>
                </div><!-- end post-content -->
              </div><!-- end col -->
            </div><!-- end clearfix -->

            <div class="clearfix">
              <div class="col-sm-6">
                <div class="post-media clearfix">
                  <a href="blog-single.html"><img src="<?php echo base_url();?>assets/upload/home_blog_07.jpg" alt="" class="img-responsive"></a>
                </div><!-- end post-media -->
              </div>
              <div class="col-sm-6">
                <div class="post-title clearfix">
                  <h5><a href="blog-single.html">YUCATAN - MEXICO..</a></h5>
                </div><!-- end ost-title -->

                <div class="post-meta home-blog-list clearfix">
                  <span><i class="icon-map110"></i> Amerika, Mexico</span>
                </div><!-- ne dpost-meta -->

                <div class="post-content clearfix">
                  <p>Template based on deep research on the most popular travel booking websites such as booking.com, tripadvisor, yahoo travel, expedia</p>
                </div><!-- end post-content -->
              </div><!-- end col -->
            </div><!-- end clearfix -->

            <div class="clearfix">
              <div class="col-sm-6">
                <div class="post-media clearfix">
                  <a href="blog-single.html"><img src="<?php echo base_url();?>assets/upload/home_blog_08.jpg" alt="" class="img-responsive"></a>
                </div><!-- end post-media -->
              </div>
              <div class="col-sm-6">
                <div class="post-title clearfix">
                  <h5><a href="blog-single.html">ISTANBUL - TURKEY..</a></h5>
                </div><!-- end ost-title -->

                <div class="post-meta home-blog-list clearfix">
                  <span><i class="icon-map110"></i> Asia, Turkey</span>
                </div><!-- ne dpost-meta -->

                <div class="post-content clearfix">
                  <p>Template based on deep research on the most popular travel booking websites such as booking.com, tripadvisor, yahoo travel, expedia</p>
                </div><!-- end post-content -->
              </div><!-- end col -->
            </div><!-- end clearfix -->
          </div><!-- end row -->
        </div><!-- end col -->
      </div><!-- end row -->
    </div><!-- end related-hotels -->
  </div><!-- end container -->
</section><!-- end section -->

<?php $this->load->view('common/footer'); ?>
<script src="https://sdk.accountkit.com/en_US/sdk.js"></script>
<script type="text/javascript">

 AccountKit_OnInteractive = function(){
  AccountKit.init(
  {
    appId:177340176194876, 
    state:"qwrt", 
    version:"v1.0",
  }
  );
};

function loginCallback(response) {
  console.log(response);
  if (response.status === "PARTIALLY_AUTHENTICATED") {
    var code = response.code;
    var csrf = response.state;
      // Send code to server to exchange for access token
    }
    else if (response.status === "NOT_AUTHENTICATED") {
      // handle authentication failure
    }
    else if (response.status === "BAD_PARAMS") {
      // handle bad parameters
    }
  }

  // email form submission handler
  function emailLogin(){
    var emailAddress = "ashishk.verma95@gmail.com";
    AccountKit.login(
      'EMAIL',
      {emailAddress: emailAddress},
      loginCallback
      );
  }
</script>

