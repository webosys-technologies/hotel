<?php $this->load->view('common/header1'); ?>

<section id="page-header" class="section background">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <ul class="c1 breadcrumb text-left">
          <!-- <li><a href="#">Pages</a></li> -->
          <!-- <li>Page Login & Register</li> -->
        </ul>
        <h3>Register with us</h3>
      </div>
    </div><!-- end row -->
  </div><!-- end container -->
</section><!-- end section -->
<section class="section clearfix">
  <div class="container">
    <div class="row">
      <div id="fullwidth" class="col-sm-12">
       <h5>Alread have an account ? <a href="<?php echo base_url('login'); ?>" class="btn btn-primary btn-normal  border-radius">SIGN IN</a></h5>
         <!--   <p>I am a returning customer</p>
       -->  <!-- START CONTENT -->
       <div class="row">
        <div id="content" class="col-md-12 col-sm-12 col-xs-12">
          <div class="post-wrapper row clearfix">
            <div class="col-md-12">
              <form class="form-horizontal" method="POST" action="<?php echo base_url('Login/index'); ?>" id="signupForm">
               <div class="form-group">
                <div class="hide alert alert-danger" id="errormessage"><a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>Incorrect Email or Password.</div>
              </div>

              <div class="form-group">
                <div class="col-sm-6">
                  <label for="fname" class="col-sm-3 control-label">First Name:</label>
                  <div class="col-sm-9">
                   <input type="text" class="form-control" id="fname" name="fname" placeholder="First Name" required="required" autofocus="autofocus">
                 </div>
               </div>
               <div class="col-sm-6">
                <label for="lname" class="col-sm-3 control-label">Last Name:</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="lname" id="lname" placeholder="Last Name" required="required">
                </div>
              </div>
              <div class="col-sm-6">
                <label for="email" class="col-sm-3 control-label">Email Address:</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="email" id="email" placeholder="Email Address" required="required">
                </div>
              </div><!-- 
              <div class="col-sm-6">
                <label for="password" class="col-sm-3 control-label">Password:</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="password" id="password" placeholder="Password" required="required">
                </div>
              </div>
              <div class="col-sm-6">
                <label for="confpassword" class="col-sm-3 control-label">Conf. Password:</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="confpassword" id="confpassword" placeholder="Confirm Password" required="required">
                </div>
              </div>
              <div class="col-sm-6">
                <label for="dob" class="col-sm-3 control-label">D.o.b:</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="dob" id="dob" placeholder="Date of Birth" required="required">
                </div>
              </div>
              <div class="col-sm-6">
                <label for="dob" class="col-sm-3 control-label">Select Address:</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="address" id="address" placeholder="Date of Birth" required="required">
                </div>
              </div>
              <div class="col-sm-6">
                <label for="country" class="col-sm-3 control-label">Country:</label>
                <div class="col-sm-9">
                  <select class="form-control" name="country" id="country"  required="required">
                    <option value="India">India</option>
                  </select> 
                </div>
              </div>
              <div class="col-sm-6">
                <label for="state" class="col-sm-3 control-label">State:</label>
                <div class="col-sm-9">
                  <select  class="form-control" name="state" id="state"  >
                    <option value="">--Select State--</option>
                    <?php if (isset($state)) {
                      foreach ($state as $key => $value) {
                           echo '<option value="'.$value->city_state.'">'.$value->city_state.'</option>';                     
                      }
                    } ?>

                  </select>
                </div>
              </div>
              <div class="col-sm-6">
                <label for="City" class="col-sm-3 control-label">City:</label>
                <div class="col-sm-9">
                  <select class="form-control" name="city" id="city"  >
                    <option value="">--Select City-- </option>
                  </select>
                </div>
              </div>

              <div class="col-sm-6" id="otp_div" style="display: none">
                <label for="otp" class="col-sm-3 control-label">OTP:</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="otp" id="otp" placeholder="OTP" required="required">
                  <span id="mobile_success"></span>
                </div>
              </div>
              <div class="col-sm-offset-2 col-sm-5" id="btn_otp">
                <input type="button" class="btn btn-primary btn-normal border-radius pull-right" name="" onclick="send_otp()" value="Send OTP">
                <!-- <button type="submit" class="btn btn-primary btn-normal border-radius pull-right">Sign in</button> -->
              <!--</div> -->

              <div class="col-sm-offset-2 col-sm-5" id="submit" >
                <input type="submit" class="btn btn-primary btn-normal border-radius pull-right" name="signup" value="Register with us">
                <!-- <button type="submit" class="btn btn-primary btn-normal border-radius pull-right">Sign in</button> -->
              </div>
            <!-- </div> -->
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

$(document).ready( function () {

  $("#state").change(function() {                          
        
   var el = $(this) ;
              $("#city").html("");


var state=el.val();

        if(state)
        {
          $('#city').append("");
            
      $.ajax({
       url : "<?php echo site_url('index.php/Regester/show_cities')?>/" + state,        
       type: "GET",
              
       dataType: "JSON",
       success: function(data)
       {
        
          $.each(data,function(i,row)
          {
          
              $("#city").append('<option value="'+ row.city_name +'">' + row.city_name+'</option>');
          }
          );
       },
       error: function (jqXHR, textStatus, errorThrown)
       {
        // alert('Error...!');
       }
     });
     }
    
 });  
 });

 $('#signupForm').validate({
  rules:{
    fname:{
      required: true,
    },
    email: {
      required: true,
      email:true,
    },
    lname:{
      required: true,
    },
    phone:{
      required:true,
      number:true,
    },
    password:{
      required:true,
    },
    confpassword:{
      required:true,
      equalTo:"#password"
    },
    dob:{
      required:true,
    },
    address:{
      required:true,
    }
  },
  errorPlacement: function(error, element) {},
  highlight: function(element) {
    $(element).parent('div').addClass('has-error');
  },
  unhighlight: function(element) {
    $(element).parent('div').removeClass('has-error');
  },
  submitHandler:function() {
    var contact_formdata=$("#signupForm").serialize();
    SignuUp(contact_formdata);
  }
});

 function SignuUp(contact_formdata) {
  $.ajax({
    url: '<?php echo base_url('regester/regester'); ?>',
    type: 'POST',
    dataType: 'json',
    data:contact_formdata,
    beforeSend: function () {
     $('#loader').css("display","inline-table");
   },
   complete: function () {
     $('#loader').css("display","none");
     $(".alert_message").removeClass("hide");
   }
 })
  .done(function (res) {
    if(res.error==true){
      $("#errormessage").text(res.message).removeClass('hide').removeClass("alert-success").addClass("alert-danger");
    }else{
      window.location.href='<?php echo base_url('Login/index'); ?>';
      $("#errormessage").text(res.message).removeClass('hide alert-danger').addClass('alert-success');
    }
  })
  .fail(function(res){
    $("#errormessage").html("Something went wrong").removeClass('hide');
  });
}

  function send_otp()
    {
    var mobile= $('[name="phone"]').val();
   // alert(mobile);
    var x=mobile.toString().length;
    //alert(x);
        if(x == 10 || x == 11)
        {
           $.ajax({
       url : "<?php echo site_url('index.php/Otp/regester_otp')?>" ,        
       type: "post",
        data:{member_email : mobile},
       dataType: "JSON",
       success: function(data)
       {            
          // alert(data.mobile_error);
          
          if (data.send) {
          $('#mobile_success').html(data.send);
          $('#mobile_err').html("");         
          $('#otp_div').show();
          $('#submit').show();
          $('#btn_otp').hide();
        }
        else{
          $('#mobile_success').html("");
          $('#mobile_err').html(data.mobile_error);            
        }

       },
       error: function (jqXHR, textStatus, errorThrown)
       {
         // alert('Error...!');
         $("#ajax").html("Error While Registration");
       }
     });
        }
        else
        {
         $("#mobile_err").html("Not a valid Phone Number");
         return false;
        }
        
    }
</script>


