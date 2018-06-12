<?php $this->load->view('common/header1'); ?>
<section id="page-header" class="section background">
  <div class="container">
  
   <div class="row">
    <div class="col-sm-12">
     <h3>SUCCESSFUL PAYMENT</h3>
   </div>
 </div><!-- end row -->
</div><!-- end container -->
</section>
<section class="section clearfix">
 <div class="container">
   <div class="row">
    <div class="col-sm-12">
      <div class="accordion-toggle-1">
        <div class="panel-group" id="accordion">
          <div class="panel panel-default">
            <div class="panel-heading">
              <div class="panel-title">
                <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false">
                  <h3>Your order no #<?php echo $orderdata[0]->orderid; ?> is booked successfully. </h3>
                </a><i class="indicator pull-right icon-plus"></i>
              </div>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
              <div class="panel-body">
                <div class="col-md-12 col-sm-6 col-xs-12">
                  <div class="pricing-table">
                    <div class="pricing-table-header">
                      <span class="bestoffer border-radius">Order No</span>
                      <h3><?php echo $orderdata[0]->orderid; ?> </h3>
                      <span class="pull-right btn print"> <i class="fa fa-print"></i> Download</span>
                    </div><!-- end header -->
                    <div class="pricing-table-body" id="inovice">
                      <div class="pricing-price">
                        <h2><sup><i class="fa fa-inr"></i></sup> <?php echo $orderdata[0]->amount_pay; ?></h2>
                        <h4>You Paid</h4>
                      </div>
                      <ul>
                        <li><strong class="pull-left">Your Name</strong> -<span class="pull-right"><?php echo $orderdata[0]->fname." ".$orderdata[0]->lname; ?></span></li>
                        <li><strong  class="pull-left">Your Mobile</strong>- <span class="pull-right"> <?php echo $orderdata[0]->phone; ?></span></li>
                        <li><strong  class="pull-left">Your Email</strong>-  <span class="pull-right"> <?php echo $orderdata[0]->email; ?></span></li>
                        <li><strong  class="pull-left">Check in</strong>-  <span class="pull-right"> <?php echo $orderdata[0]->checkin; ?></span></li>
                        <li><strong  class="pull-left">Check out</strong>-   <span class="pull-right"><?php echo $orderdata[0]->checkout; ?></span></li>
                      </ul>
                    </div><!-- end body -->
                    <div class="pricing-table-footer">
                      <h3><a href="#">SEE MORE</a></h3>
                    </div><!-- end footer -->
                  </div><!-- end pricing-table -->
                </div>
              </div>
            </div>
          </div>


        </div>
      </div><!-- accordion -->
    </div>

    <div id="content" class="col-md-12 col-sm-12 col-xs-12">
      <div class="post-wrapper text-center clearfix">
        <div class="successful">
          <img src="<?php echo base_url('assets/images/successful.png'); ?>" alt="">
        </div>
        <h6>Dear customer,</h6>
        <p>Thank you very much for ordering our product. You will be receiving an e-mail within next 72 hours, with the attachment or instructions to download.<br>
          For any problems please <a href="mailto:mail@yoursite.com">mail@yoursite.com</a> </p>
          <a href="<?php echo base_url(); ?>" class="btn btn-primary btn-normal btn-lg">CONTINUE BOOKING</a>
        </div><!-- end post-wrapper -->
      </div><!-- end col -->
    </div>
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


