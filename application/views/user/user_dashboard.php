

<?php $this->load->view('common/header1'); ?>
<section id="page-header" class="section background">
  <div class="container">
  
   <div class="row">
    <div class="col-sm-12">
     <h3>CUSTOMER DASHBOARD</h3>
   </div>
 </div><!-- end row -->
</div><!-- end container -->
</section>
<section class="section clearfix">
 <div class="container">
  <?php if(isset($hoteldata))
      {  foreach ($hoteldata as $key => $orderdata) { ?>
   <div class="row">
    <div class="col-sm-12">
      <div class="accordion-toggle-1">
        <div class="panel-group" id="accordion">
          <div class="panel panel-default">
            <div class="panel-heading">
              <div class="panel-title">
                <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo<?php echo $orderdata->id ?>" aria-expanded="false">
                  <h3>Your order no #<?php echo $orderdata->orderid; ?> . </h3>
                <i class="indicator pull-right icon-plus" style="color: white" ></i></a>
              </div>
            </div>
            <div id="collapseTwo<?php echo $orderdata->id; ?>" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
              <div class="panel-body">
                <div class="col-md-12 col-sm-6 col-xs-12">
                  <div class="pricing-table">
                    <div class="pricing-table-header">
                      <span class="bestoffer border-radius">Order No</span>
                      <h3><?php echo $orderdata->hotel_name; ?> </h3>
                      <span class="pull-right btn print"> <i class="fa fa-print"></i> Download</span>
                    </div><!-- end header -->
                    <div class="pricing-table-body" id="inovice">
                      <div class="pricing-price">
                        <h2><sup><i class="fa fa-inr"></i></sup> <?php echo $orderdata->amount_pay; ?></h2>
                        <h4>You Paid</h4>
                      </div>
                      <ul>
                        <li><strong class="pull-left">Hotel Name</strong> -<span class="pull-right"><?php echo $orderdata->hotel_name; ?></span></li>
                        <li><strong  class="pull-left">Hotel_Mobile</strong>- <span class="pull-right"> <?php echo $orderdata->mobile_no; ?></span></li>
                        <li><strong  class="pull-left">Your Email</strong>-  <span class="pull-right"> <?php //echo $orderdata->l; ?></span></li>
                        <li><strong  class="pull-left">Check in</strong>-  <span class="pull-right"> <?php echo $orderdata->checkin; ?></span></li>
                        <li><strong  class="pull-left">Check out</strong>-   <span class="pull-right"><?php echo $orderdata->checkout; ?></span></li>
                      </ul>
                    </div><!-- end body -->
                  </div><!-- end pricing-table -->
                </div>
              </div>
            </div>
          </div>


        </div>
      </div><!-- accordion -->
    </div>
    </div>
          <?php }} ?>

  </div><!-- end container -->
</section><!-- end section -->
<?php $this->load->view('common/footer'); ?>
<script type="text/javascript">

  $(document).on("click",".print",function() {
    var printContents = $("#inovice").html();

   
    var originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
  });

</script>


