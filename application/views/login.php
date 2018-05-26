<?php $this->load->view('common/header1'); ?>
<section id="page-header" class="section background">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <ul class="c1 breadcrumb text-left">
          <li><a href="#">Pages</a></li>
          <li>Page Login & Register</li>
        </ul>
        <h3>Login & Register</h3>
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
          <div id="content" class="col-md-12 col-sm-12 col-xs-12">
            <div class="post-wrapper row clearfix">
              <div class="col-md-6">
                <h5>NEW COSTUMER</h5>
                <p>By creating an account you will be able to shop faster, be up to date on an order’s status, and keep track of the orders you have previously made.</p>
                <hr>
                <a href="<?php echo base_url('regester'); ?>" class="btn btn-primary btn-normal border-radius">Register Now</a>
                
              </div><!-- end col -->

              <div class="col-md-6">
                <h5>COSTUMER LOGIN</h5>
                <p>I am a returning customer</p>
                <br>
                <form class="form-horizontal" method="POST" action="<?php echo base_url('login/login'); ?>" id="loginForm">
                  <div class="form-group">
                    <div class="col-sm-12 flashdata">
                     <?php echo get_flashdata('message'); ?>
                   </div>
                 </div>
                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Username:</label>
                  <div class="col-sm-10">
                    <input type="test" class="form-control" id="inputEmail3" name="email" placeholder="Email  or  Mobile" required="required">
                    <span class="text-danger" id="no_err"></span>
                    <span class="text-success" id="email_success"></span>
                  </div>
                  <div id="send_btn" class="form-group" style="display: none">
                   <center> <input type="button" class="btn btn-success border-radius" name="send_otp"  value="Send OTP" id="send_otp"></center>
                  </div>
                  <div id="pass" >
                  <label for="inputPassword3" class="col-sm-2 control-label">Password:</label>
                  <div class="col-sm-10" >
                    <input type="password" class="form-control" name="password" id="inputPassword3" placeholder="Password" required="required">
                  </div>
                  </div>
                  <div id="otp" style="display: none">
                  <label for="inputPassword3" class="col-sm-2 control-label">OTP:</label>
                  <div class="col-sm-10" >
                    <input type="text" class="form-control" name="otp" id="inputotp" placeholder="OTP" required="required">
                  </div>
                  </div>
                  <div class="col-sm-offset-2 col-sm-10">
                    <hr>
                    <input type="submit" class="btn btn-primary btn-normal border-radius pull-left" name="signin" value="Sign in">
                    <input type="button" class="btn btn-info btn-normal border-radius pull-right" id="otp_btn" value="OTP Login">
                    <input type="button" class="btn btn-info btn-normal border-radius pull-right" id="pass_btn" value="Password Login" style="display: none">
                    <!-- <button type="submit" class="btn btn-primary btn-normal border-radius pull-right">Sign in</button> -->
                  </div>
                </div>
              </form>
            </div><!-- end col -->
          </div><!-- end post-wrapper -->
        </div><!-- end col -->
      </div><!-- end row -->
      <!-- END CONTENT -->

    </div><!-- end fullwidth -->
  </div><!-- end row -->
</div><!-- end container -->
</section><!-- end section -->
<?php $this->load->view('common/footer'); ?>

<script type="text/javascript">

  $('#loginForm').validate({
    rules:{
      // inputEmail3: {
      //   required: true,
      //   // email:true,
      // },
      // inputPassword3:{
      //   // required: true,
      // }
    },
    errorPlacement: function(error, element) {},
    highlight: function(element) {
      $(element).parent('div').addClass('has-error');
    },
    unhighlight: function(element) {
      $(element).parent('div').removeClass('has-error');
    }
  });

  $('#otp_btn').click(function () {
    $('#pass').hide();
    $('#otp').show();
    $('#otp_btn').hide();
    $('#pass_btn').show();
    $('#send_btn').show();

  });

  $('#pass_btn').click(function () {
    $('#pass').show();
    $('#otp').hide();
    $('#otp_btn').show();
    $('#pass_btn').hide();
    $('#send_btn').hide();
  });


  $('#send_otp').click(function () {

    var mobile=$('#inputEmail3').val();
    
       if(!isNaN(mobile))
        { 
          $("#no_err").html(" ");
          var x=mobile.toString().length;

         // alert(x);
          if(x==10 || x==11)
        {
          $("#no_err").html(" ");


               $.ajax({
           url : "<?php echo base_url('index.php/Otp/send_otp'); ?>" ,        
           type: "post",
            data:{member_email : mobile},
           dataType: "json",
           success: function(data)
           {            
            
              if (data.send) {
              $('#email_success').html(data.send);
              $('#no_err').html("");
            }
            else{
              $('#email_success').html("");
              $('#no_err').html(data.mobile_error);            
            }

           },
           error: function (jqXHR, textStatus, errorThrown)
           {
             // alert('Error...!');
             $("#no_err").html("Error While OTP Sending");
           }
         
      });
  }          
            else
            {
              $("#no_err").html("Not a valid Phone Number");
             // alert("Not a valid Phone Number");
             // return false;
            }

  }    else{
          // alert('exit');

    $("#no_err").html("Please Enter Mobile No For OTP Login");
  }  
  });



</script>