<?php $this->load->view('common/header1'); ?>
<section id="page-header" class="section background">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <ul class="c1 breadcrumb text-left">
          <li><a href="#">USER</a></li>
          <li>Home</li>
        </ul>
        <h3>Welcome To Trips</h3>
      </div>
    </div>
  </div>
</section>
<section class="section clearfix">
  <div class="container">
    <div class="row">
      <div id="fullwidth" class="col-sm-12">
        <div class="section-container">
          <div class="home-form">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs nav-tabs2" role="tablist">
              <li class="active"><a href="#tab_01" aria-controls="tab_01" role="tab" data-toggle="tab"><i class="fa fa-user-circle-o" aria-hidden="true"></i> USER PROFILE</a></li>
              <!-- <li><a href="#tab_02" aria-controls="tab_02" role="tab" data-toggle="tab"><i class="fa fa-unlock-alt" aria-hidden="true"></i> CHANGE PASSWORD</a></li> -->
              <!-- <li><a href="#tab_03" aria-controls="tab_03" role="tab" data-toggle="tab"><i class="fa fa-home" aria-hidden="true"></i>ADD HOTEL</a></li> -->
            </ul>
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="tab_01">
                <form class="bookform form-inline row" method="post" action="<?php echo base_url('regester/signup'); ?>" id="profileform">
                  <?php echo get_flashdata('message');?>
                  <div class="form-group col-md-4 col-sm-6 col-xs-12">
                   <label for="prodId">First Name</label>
                   <input type="text" class="form-control" id="fname"  name="fname"  value="<?php if(isset($userinfo[0]->fname)){ echo $userinfo[0]->fname; } ?>" autofocus="" required="required"  placeholder="Enter First Name">
                 </div>
                 <?php if(isset($userinfo[0]->id)): ?>
                  <input type="hidden" name="userid" value="<?php echo custom_encode($userinfo[0]->id); ?>" />
                  <input type="hidden" name="status" value="<?php echo $userinfo[0]->isverified; ?>" />
                <?php  endif; ?> 
                
                <div class="form-group col-md-4 col-sm-6 col-xs-12">
                  <label for="prodType">Last Name</label>
                  <input type="text" class="form-control" id="lname"  name="lname" value="<?php if(isset($userinfo[0]->lname)){ echo $userinfo[0]->lname; } ?>"   placeholder="Enter Last Name">
                </div>
                <div class="form-group col-md-4 col-sm-6 col-xs-12">
                 <label >Phone</label>
                 <input type="text" class="form-control" id="phone" name="phone"  value="<?php if(isset($userinfo[0]->phone)){ echo $userinfo[0]->phone; } ?>"  readonly required="required" placeholder="Enter Phone No.">
               </div>
               <div class="form-group col-md-4 col-sm-6 col-xs-12">
                 <label >Password</label>
                 <input type="password" class="form-control" id="password" name="password"  value="<?php if(isset($userinfo[0]->password)){ echo $userinfo[0]->password; } ?>" required="required" placeholder="Enter Phone No.">
               </div>
               <div class="form-group col-md-4 col-sm-6 col-xs-12">
                 <label >Confirm Password</label>
                 <input type="password" class="form-control" id="confpassword" name="confpassword"  value="<?php if(isset($userinfo[0]->password)){ echo $userinfo[0]->password; } ?>" required="required" placeholder="Enter Phone No.">
               </div>
               <div class="form-group col-md-4 col-sm-6 col-xs-12">
                 <label >Email address</label>
                 <input type="text" class="form-control" id="email" name="email"  value="<?php if(isset($userinfo[0]->email)){ echo $userinfo[0]->email; } ?>" readonly placeholder="Enter Email Address">
               </div>
               <div class="form-group col-md-4 col-sm-6 col-xs-12">
                 <label >D.o.b</label>
                 <input type="text"  class="form-control" id="dob" name="dob"  value="<?php if(isset($userinfo[0]->dob)){ echo $userinfo[0]->dob; } ?>"   placeholder="Select dob">
               </div>
               <div class="form-group col-md-4 col-sm-6 col-xs-12">
                 <label >Select Address</label>
                 <input type="text" class="form-control" id="address" name="address" value="<?php  if(isset($userinfo[0]->id)){ echo $userinfo[0]->country.", ".$userinfo[0]->state; } ?>"  placeholder="Select Address">
               </div>
               <div class="form-group col-md-4 col-sm-6 col-xs-12">
                <label >Country</label>
                <input type="text" class="form-control" id="country" name="country" value="<?php if(isset($userinfo[0]->country)){ echo $userinfo[0]->country; } ?>"  placeholder="Select Country">
              </div>
              <div class="form-group col-md-4 col-sm-6 col-xs-12">
               <label >State</label>
               <input type="text"  class="form-control" id="state" name="state" value="<?php if(isset($userinfo[0]->state)){ echo $userinfo[0]->state; } ?>"  placeholder="Select State">
             </div>
             <div class="form-group col-md-4 col-sm-6 col-xs-12">
              <label >City</label>
              <input type="text"  class="form-control" id="city" name="city" value="<?php if(isset($userinfo[0]->city)){ echo $userinfo[0]->city; } ?>"  placeholder="Select city">
            </div>
            <div class="form-group col-md-2 col-sm-6 col-xs-12">
              <label ></label>
              <input type="submit" name="Update" class="btn btn-primary" value="Update Profile">
            </div>
          </form>
        </div>
        <!-- end tab-pane -->
        <!--   <div role="tabpanel" class="tab-pane" id="tab_02">

            <form class="bookform form-inline row">
              <div class="form-group col-md-4 col-sm-6 col-xs-12">
                <label>Old password</label>
                <input type="text" class="form-control" placeholder="Old Password">
              </div>
              <div class="form-group col-md-4 col-sm-6 col-xs-12">
                <label>New password</label>
                <input type="text" class="form-control" placeholder="New Password">
              </div>
              <div class="form-group col-md-2 col-sm-6 col-xs-12">
                <label class="update"></label>
                <button type="submit" class="btn btn-primary">Update Password</button>
              </div>
            </form>
          </div> -->
          <!-- end tab-pane -->
<!--          <div role="tabpanel" class="tab-pane" id="tab_03">
            <?php 

            // print_r($_SESSION);

            ?>
            <div class="form-group">
              <div class="hide alert alert-danger" id="errormessage"><a href="#" class="close" data-dismiss="alert" aria-label="close">×</a></div>
            </div>
            <form class="form-inline bookform row" method="POST"  id="addhotel" enctype="multipart/form-data">
                <div class="row">
             <div class="form-group col-md-4 col-sm-6 col-xs-12">
               <label for="h_name">Hotel Name</label>              
               <input type="text" class="form-control" id="hotel_name"  name="hotel_name"   value="" autofocus=""  placeholder="Enter Hotel Name" required="required">
               <input type="hidden" name="isverified" value="0" />
               <input type="hidden" name="create_user" value="<?php if(isset($_SESSION['userid'])){ echo $_SESSION['userid'];}else{ echo '0';} ?>" />
             </div>         
             <div class="form-group col-md-4 col-sm-6 col-xs-12">
               <label >Hotel Address</label>
                    <input type="text" class="form-control" id="hotel_address" name="hotel_address" value=""  placeholder="Enter Hotel address" required="required">
           
           </div>
             <div class="form-group col-md-4 col-sm-6 col-xs-12">
               <label >City</label>
               <input type="text" class="form-control" name="city" id="city1" placeholder="Enter City" required="required">             
             </div>
             <div class="form-group col-md-4 col-sm-6 col-xs-12">
               <label >Pincode</label>
               <input type="text" class="form-control" name="pincode" id="pincode" placeholder="Enter Pincode No." value=""  required="required">
             </div>
                <div class="form-group col-md-4 col-sm-6 col-xs-12">
              <label >State</label>
                <input type="text" class="form-control" name="state" id="state1" placeholder="Enter State Name" required="required">
            </div>
             <div class="form-group col-md-4 col-sm-6 col-xs-12">
               <label >Country</label>
               <input type="text" class="form-control" name="country" id="country1" placeholder="Enter Country Name" value=""  required="required">
             </div>
                <div class="form-group col-md-4 col-sm-6 col-xs-12">
                    <label >Website</label>
                    <input type="text" class="form-control" name="website" id="website" placeholder="Enter Website Name" value=""  required="required">       
                </div>
                <div class="form-group col-md-4 col-sm-6 col-xs-12">
                    <label >Mobile No</label>
                    <input type="text" class="form-control" name="mobile_no" id="mobile_no" placeholder="Enter Mobile No" value=""  required="required">       
                </div>
                <div class="form-group col-md-4 col-sm-6 col-xs-12">
                    <label >Telephone No.</label>
                    <input type="text" class="form-control" name="telephone_no" id="telephone_no" placeholder="Enter Telephone No." value=""  required="required">       
                </div>
                <div class="form-group col-md-4 col-sm-6 col-xs-12">
                    <label >fax No</label>
                    <input type="text" class="form-control" name="fax_no" id="fax_no" placeholder="Enter Fax No." value=""  required="required">       
                </div>
                <div class="form-group col-md-4 col-sm-6 col-xs-12">
                    <label >Check-In time</label>
                    <input type="text" class="form-control" name="checkin_time" id="checkin_time" placeholder="Enter Checkin Time" value=""  required="required">       
                </div>
                <div class="form-group col-md-4 col-sm-6 col-xs-12">
                    <label >Check-Out time</label>
                    <input type="text" class="form-control" name="checkout_time" id="checkout_time" placeholder="Enter Checkout Time" value=""  required="required">       
                </div>
                  <div class="form-group col-md-4 col-sm-6 col-xs-12">
                  <label >Star Category</label>
                  <select name="star" id="star" class="form-control">
                                        <option value="1">1</option>
                                         <option value="2">2</option>
                                          <option value="3">3</option>
                                           <option value="4">4</option> 
                                           <option value="5">5</option>           
                                    </select>
                  </div>
                   <div class="form-group col-md-4 col-sm-6 col-xs-12">
                    <label >Nearest Airport</label>
                    <input type="text" class="form-control" name="near_airport" id="near_airport" placeholder="Enter Nearest Airport Name" value=""  required="required">       
                </div>
                   <div class="form-group col-md-4 col-sm-6 col-xs-12">
                    <label >Nearest Railway Station</label>
                    <input type="text" class="form-control" name="near_railway_st" id="near_railway_st" placeholder="Enter Nearest Railway Station Name" value=""  required="required">       
                </div>
                 <div class="form-group col-md-4 col-sm-6 col-xs-12">
                    <label >Hoter Picture</label>
                    <input type="file" class="form-control" name="hotel_pic" id="hotel_pic" placeholder="Enter Hotel Picture" value=""  required="required">       
              
                 </div>
                  <div class="form-group col-md-12 col-sm-12 col-xs-12">
                    <label >Hotel Description</label>
                    <input type="text" class="form-control" name="hotel_description" id="hotel_description" placeholder="Enter Hotel Description" value=""  required="required">       
                </div>
                </div>
            <hr>
            <div class="row">
             <h4>Contact Information</h4>
              <div class="form-group col-md-4 col-sm-6 col-xs-12">
                    <label >Owner Name</label>
                    <input type="text" class="form-control" name="owner_name" id="owner_name" placeholder="Enter Owner Name" value=""  required="required">       
                </div>
              <div class="form-group col-md-4 col-sm-6 col-xs-12">
                    <label >Owner Mobile No</label>
                    <input type="text" class="form-control" name="owner_mobile_no" id="owner_mobile_no" placeholder="Enter Owner Mobile No" value=""  required="required">       
                </div>
              <div class="form-group col-md-4 col-sm-6 col-xs-12">
                    <label >Owner Telephone</label>
                    <input type="text" class="form-control" name="owner_telephone" id="owner_telephone" placeholder="Enter Owner Telephone" value=""  required="required">       
                </div>
              <div class="form-group col-md-4 col-sm-6 col-xs-12">
                    <label >Owner Email</label>
                    <input type="text" class="form-control" name="owner_email" id="owner_email" placeholder="Enter Owner Email" value=""  required="required">       
                </div>
            </div>
                <hr>
                
                 <div class="row">
                     <h4>Room Information</h4></div>
            <div class="row after-add-more">
            <div class="col-md-12 ">
                <div class="col-md-12">
                <div class="form-group col-md-2 col-sm-4 col-xs-6">
                    Bed Type
                </div>    
                   <div class="form-group col-md-2 col-sm-4 col-xs-6">
                  Room Price
                </div>   
                   <div class="form-group col-md-2 col-sm-4 col-xs-6">
                AC/Non AC
                </div>   
                   <div class="form-group col-md-2 col-sm-4 col-xs-6">
               Room No
                </div>   
                    <div class="form-group col-md-2 col-sm-4 col-xs-6">
               Person Allowed
                    </div> </div>
             <div class="form-group col-md-2 col-sm-4 col-xs-6">
               <select name="bed_type[]" class="form-control">
                 <option value="1">Single Bed</option>
                 <option value="2">Double Bed</option>
                 <option value="3">Triple Bed</option>
                 <option value="4">Four Bed</option>
                 <option value="5">Hall</option>
               </select>  
             </div>
             <div class="form-group col-md-2 col-sm-4 col-xs-6">
                <input type="text" class="form-control" name="price[]" placeholder="Room Price" >
             </div>
              <div class="form-group col-md-2 col-sm-4 col-xs-6">
               <select name="ac_non_room[]" class="form-control">
                 <option value="1">AC</option>
                 <option value="2">Non Ac</option>
               </select>
             </div>
              <div class="form-group col-md-2 col-sm-4 col-xs-6">
                <input type="text" class="form-control" name="room_no[]" placeholder="Room Number" >
             </div>
             <div class="form-group col-md-2 col-sm-4 col-xs-6">
                  <input type="text" class="form-control" name="person_allowed[]" placeholder="Person Allowed" >
               <select name="room_avalivality[]" class="form-control">
                 <option value="1">Yes</option>
                 <option value="2">No</option>
               </select>
             </div>
                  <div class="input_fields_wrap">
                      <button class="btn btn-success add-more" type="button">Add More Fields</button>
    <div></div>
             </div></div>
             </div>

 code>cop 
<div class="row copy hidden ">
  <div class="col-md-12 control-group" >
  
             <div class="form-group col-md-2 col-sm-4 col-xs-6">
               <select name="bed_type[]" class="form-control">
                 <option value="1">Single Bed</option>
                 <option value="2">Double Bed</option>
                 <option value="3">Triple Bed</option>
                 <option value="4">Hall</option>
               </select>  
             </div>
             <div class="form-group col-md-2 col-sm-4 col-xs-6">
                <input type="text" class="form-control" name="price[]" id="price" placeholder="Room Price" >
             </div>
              <div class="form-group col-md-2 col-sm-4 col-xs-6">
               <select name="ac_non_room[]" class="form-control">
                 <option value="1">AC</option>
                 <option value="2">Non Ac</option>
               </select>
             </div>
              <div class="form-group col-md-2 col-sm-4 col-xs-6">
                <input type="text" class="form-control" name="room_no[]" placeholder="Room Number" >
             </div>
             <div class="form-group col-md-2 col-sm-4 col-xs-6">
                   <input type="text" class="form-control" name="person_allowed[]" placeholder="Allowed Person" >
               <select name="room_avalivality[]" class="form-control">
                 <option value="1">Yes</option>
                 <option value="2">No</option>
               </select>
             </div>
              <div class="input-group-btn"> 
              <button class="btn btn-danger remove" type="button"><i class="glyphicon glyphicon-remove"></i> Remove Fields</button>
            </div>
             </div>

</div>

 <----copy cde> 

        
            <div class="form-group col-md-12 ">
              <input type="submit" class="btn btn-primary"  value="Add New Hotel">
            </div>
          </form>
        </div> -->
      </div>
    </div>
  </div>
  <!-- section-container -->
</div>
</div>
</div>
<!-- end container -->
</section>
<!-- end section -->
<?php $this->load->view('common/footer'); ?>
<script type="text/javascript">

  $('#profileform').validate({
    rules:{
      fname: {
        required: true,
      },
      lname: {
        required: true,
      },
      phone:{
        required: true,
        number:true,
      },
      password: {
        required: true,
      },
      confpassword:{
        required:true,
        equalTo:"#password",
      },
      email:{
        required:true,
        email:true,
      },
      dob:{
        required:true,
      },
      country:{
        required:true,
      },
      hotel_address:{
        required:true,
      }
    },
    errorPlacement: function(error, element) {},
    highlight: function(element) {
      $(element).parent('div').addClass('has-error');
    },
    unhighlight: function(element) {
      $(element).parent('div').removeClass('has-error');
    }
  });
  $('#addhotel').validate({
    rules:{
      hotel_name: {
        required: true,
      },
      hcountry: {
        required: true,
      },
      hstate:{
        required: true,
      },
      hcity: {
        required: true,
      },
      hotel_pic:{
        required:true,
      },
      temple_distance:{
        required:true,
      },
      availabel_room:{
        required:true,
        number:true,
      }
    },
    errorPlacement: function(error, element) {},
    highlight: function(element) {
      $(element).parent('div').addClass('has-error');
    },
    unhighlight: function(element) {
      $(element).parent('div').removeClass('has-error');
    },
    submitHandler:function(element){
      add_hotel_details();
    },

  });

  function add_hotel_details() {
    var formData = new FormData($('#addhotel')[0]);
    $.ajax({
      url: '<?php echo base_url('user/add_hotel'); ?>',
      type: 'POST',
      dataType: 'json',
      data: formData ,
      contentType: false,
      processData: false,
      beforeSend: function () {
        $('#loader').css("display","inline-table");
      },
      complete: function () {
        $('#loader').css("display","none");
        $(".alert_message").removeClass("hide");
      },
      success: function (res, textStatus, jqXHR) {
        if(res.error){
          $("#errormessage").text(res.message).removeClass('hide').removeClass("alert-success").addClass("alert-danger");
        }else{
          $("#errormessage").text(res.message).removeClass('hide alert-danger').addClass('alert-success');
        }
      },
      error: function (XMLHttpRequest, textStatus, errorThrown) {
        alert("Status: " + textStatus + "\nError: " + errorThrown);
      }
    });
  };
</script>
<script type="text/javascript">


 $(document).ready(function() {


      $(".add-more").click(function(){ 
          var html = $(".copy").html();
          $(".after-add-more").after(html);
      });


      $("body").on("click",".remove",function(){ 
          $(this).parents(".control-group").remove();
      });


    });
</script>