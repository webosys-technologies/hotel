<?php $this->load->view('common/header1'); ?>
<style type="text/css">
  .hotel_img{
    width: 100%;
    height: 100%;
  }
</style>
<section id="page-header" class="section background">
 <div class="container">
  <div class="row">
   <div class="col-sm-12">
    <ul class="c1 breadcrumb text-left">
    </ul>
    <h3>Welcome To <?php echo  SITE_NAME; ?></h3>
  </div>
</div><!-- end row -->
</div><!-- end container -->
</section><!-- end section -->
<section class="section clearfix backgroundsection">
 <div class="container">
  <div class="row">
   <div id="fullwidth" class="col-sm-12">
    <!-- START CONTENT -->
    <div class="row">
      <?php 
      // echo "<pre>";
      // print_r($booking_info);
      // echo "</pre>";
      //$finalprice=($booking_info[0]->hotel_price*30)/100;
      ?>
      <!-- end col -->
      <div class="col-md-7 col-sm-7 col-xs-12 section1 section2">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="cart-page-tile address-tile">
              <form  id="order_details" method="post" action="">
  <input type="hidden" class="form-control"  value="<?php echo $booking_info[0]->hotel_id; ?>"  name="hotel_id" >
  <input type="hidden" name="left_hotel" value="<?php echo $booking_info[0]->left_hotel; ?>">         
                <div class="form-group">
                  <label class="weight-light">Your Name *</label>
                  <input type="text" class="form-control" name="name" id="name" placeholder="Customer Name" value="" required>
                </div>
                <div class="form-group">
                  <label class="weight-light">Your Email *</label>
                  <input type="text" class="form-control" name="email" id="email" placeholder=" Customer Email" value="" required>
                </div>
                <div class="form-group">
                  <label class="weight-light">Your Mobile *</label>
                  <input type="text" class="form-control" name="mobile_no" placeholder="Customer Mobile" value="" required>
                </div>

                <div class="form-group">
                  <label class="weight-light">Checkin *</label>
                  <input type="text" class="form-control datepicker" name="checkin" placeholder="Checkin Date" id="datepicker" value="<?php if(isset($pickup['checkin'])) echo $pickup['checkin']; ?>" required>
                </div>
                <div class="form-group">
                  <label class="weight-light">Checkout *</label>
                  <input type="text" class="form-control" name="checkout" placeholder="Checkout Date" id="datepicker1" value="<?php if(isset($pickup['checkout'])) echo $pickup['checkout']; ?>" required>
                </div>
       <div class="form-group ">
              
                  <input type="text" class="form-control"  id="no_of_rom" name="no_of_room" required="required" placeholder="No. of Room">
                
                </div>
                <div class="form-group">
                  <label class="weight-light">Bed Type *</label>
                  <select class="form-control" data-style="btn-white" name="bed_type" id="bed_type" required="required" onchange="getprice()">
                   <?php if(!empty($pickup['bed_type'])): ?>
                    <option value="<?php echo $pickup['bed_type']; ?>"  selected><?php echo $pickup['bed_type']; ?></option>
                  <?php else:  ?>
                 <option value="">Select Bed Type</option>
                 <?php endif; ?>
                 <option value="1">Single Bed</option>
                 <option value="2">Double Bed</option>
                 <option value="3">Triple Bed</option>
               </select>
             </div>
              
<!--                  <div class="form-group">
               <label class="weight-light">City</label>
               <input type="text" class="form-control"  placeholder="City" name="city" value=""  required>
             </div> -->
             <div class="form-group">
               <label class="weight-light">City</label>
               <input type="text" class="form-control"  placeholder="City" name="city" value=""  required>
             </div>            
             <div class="form-group">
              <label class="weight-light">You Pay</label>
              <input type="text" class="form-control youpay" name="youpay" id="youpay" value=""  readonly >
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-3 col-sm-4 col-xs-6">
                  <p class="error_message"></p>
                  <input type="submit" class="btn booknow" value="CONFIRM BOOKING">
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div><!-- end col -->

  <div class="col-md-5 col-sm-5 col-xs-12 section1">
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="cart-page-tile amount-tile">
          <div class="row">
           <div class="">
               <input type="hidden" class="form-control"  value="<?php echo $booking_info[0]->hotel_id; ?>"  name="hotel_id" >
                
            <img src="<?php echo base_url().'upload/img/'.$booking_info[0]->hotel_pic; ?>" class="img-responsive hotel_img">
          </div>
<!--          <div class="col-md-6 col-sm-6 col-xs-6">
            <div class="pull-left">
              <p>Available Rooms</p>
            </div>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-6">
            <div class="pull-right">
              <p><?php //echo $booking_info[0]->left_hotel; ?></p>
            </div>
          </div>-->
        </div>
<!--        <div class="row">
          <div class="col-md-6 col-sm-6 col-xs-6">
            <div class="pull-left">
              <p>TEMPLE DISTANCE</p>
            </div>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-6">
            <div class="pull-right">
              <p><?php //echo $booking_info[0]->temple_distance; ?></p>
            </div>
          </div>
        </div>-->
<!--        <div class="row">
          <div class="col-md-6 col-sm-6 col-xs-6">
            <div class="pull-left">
              <p>Price</p>
            </div>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-6">
            <div class="pull-right">
              <p> + <i class="fa fa-inr" aria-hidden="true"></i> <?php //echo $booking_info[0]->hotel_price; ?></p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 col-sm-6 col-xs-6">
            <div class="pull-left">
              <h5>Amount Payable</h5>
            </div>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-6">
            <div class="pull-right">
              <h5 > <i class="fa fa-inr" aria-hidden="true"></i><?php // echo number_format($finalprice,2); ?></h5>
            </div>
          </div>
        </div>-->
      </div>
    </div>
  </div>
</div>
</div><!-- end row -->
</div><!-- end fullwidth -->
</div><!-- end row -->
</div><!-- end container -->
</section><!-- end section -->
<?php $this->load->view('common/footer'); ?>

<!-- <button " style="background: #95bf18; padding: 6px 16px; border: 1px solid #729605; color: #fff; border-radius: 4px;">Pay Online</button> -->
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script type="text/javascript">
 var options = {
  "key": "rzp_test_pXXiqqbrbsz765",
  "amount": "100",
     // 2000 paise = INR 20
     "name": "MaihyaryYatra",
     "description": "Payment Details",
     "image": "http://images.jagran.com/ayodhya-sl-27-11-2011.jpg",
     "handler": function (response) {
      console.log(response);
      if (typeof (response.razorpay_payment_id) != "undefined" && response.razorpay_payment_id !== null) {
        checkout(response.razorpay_payment_id);
      } else {
        checkout(response.razorpay_payment_id);
        return false;
      }
    },
    "prefill": {
     "name":$("#name").val(),
     "email":$("#email").val()
   },
   "notes": {
    "address": "Noida"
  },
  "theme": {
    "color": "#9dc32c"
  }
};
var rzp1 = new Razorpay(options);



$('#order_details').validate({
  rules:{
    name: {
      required: true,
    },
    email: {
      required: true,
      email:true
    },
    mobile_no:{
      required: true,
      number:true,
    },
    address:{
      required:true,
    },
    pincode:{
      required: true,
      number:true,
    },
//    youpay:{required:true}
  },
  errorPlacement: function(error, element) {},
  highlight: function(element) {
    $(element).parent('div').addClass('has-error');
  },
  unhighlight: function(element) {
    $(element).parent('div').removeClass('has-error');
  },
  submitHandler:function(element){
   rzp1.open();
 }
});
</script>
<script>
  function checkout(razorpay_payment_id)
  {
    var formdata=$("#order_details").serialize()+"&razorpay_payment_id="+razorpay_payment_id;
    $.ajax({

      url: '<?php echo base_url("orders/index"); ?>',
      type: 'POST',
      data:formdata,
      dataType: 'json',
      beforeSend: function () {
        $('#loader').addClass('loader');
      },
      complete: function () {
        $('#loader').removeClass('loader');
      }
    })
    .done(function(res){
      console.log(res);
      
      if(res.data){
        window.location.href="<?php  echo base_url('success');?>/"+res.data;
      }else{
        alert("Failed to place order");
      }      
    })
    .fail(function(res) {
      alert("Some thing went wrong");
    });
  }
</script>
<script>

function getprice()
  {
    var formdata=$("#order_details").serialize();
    $.ajax({
      url: '<?php echo base_url("orders/getprice"); ?>',
      type: 'POST',
      data:formdata,
      dataType: 'json',
       success: function (response) {
//                    preloader_off();
                    if(response.data!=''){
                           $(".youpay").val(response.data);
                    }else{
                        
                      $(".youpay").val(response.data);
                    }
                   
                }
    })
  }
</script>

