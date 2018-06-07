<div class="content-wrapper">
    <style>
        .hotel_room_margin{
            margin-bottom: 15px;
        }
    </style>
    <section class="content-header">
        <h1><?php echo $page_title; ?></h1>
        <?php echo get_flashdata('message'); ?>

    </section>
    <section class="content">
        <div class="row">
            <div class="col-sm-12">
                <div class="box box-primary">
                    <form class="form-horizontal" method="POST" action="<?php echo base_url('htl/user/add_hotel');?>"  id="addhotel" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group">
                                <div class="col-sm-6">
                                    <label for="h_name">Name of the Hotel </label>
                                    <input type="text" class="form-control" id="hotel_name"  name="hotel_name"  value="<?php if(isset($client_info[0]->hotel_name)){ echo $client_info[0]->hotel_name; } ?>" autofocus=""  placeholder="Enter Hotel Name">
                                </div>
                                <?php if(isset($client_info[0]->hotel_id)): ?>
                                
                                    <input type="hidden" name="hotel_id" value="<?php echo custom_encode($client_info[0]->hotel_id); ?>" />
<!--                                    <input type="hidden" name="room_id" value="<?php //echo custom_encode($client_info[0]->hotel_room_id); ?>">   -->
<!--                                    <input type="hidden" name="price_id" value="<?php// echo custom_encode($client_info[0]->price_id); ?>">-->
                                   <?php if(isset($hotel_room[0]->hotel_id)): ?>
                                    <input type="hidden" name="hotel_room_id" value="<?php echo custom_encode($hotel_room[0]->hotel_room_id); ?>">
                                  <?php  endif; ?> 
                                        <?php  endif; ?> 
                                <input type="hidden" name="create_user" value="<?php if(isset($client_info[0]->create_user)){echo $client_info[0]->create_user; }else{ echo "admin";}?>">
                                <input type="hidden" name="isverified" value="<?php if(isset($client_info[0]->isverified)){echo $client_info[0]->isverified; }else{ echo "0";}?>" />
                                <div class="col-sm-6">
                                    <label >Hotel Address </label>
                                    <input type="text" class="form-control" name="hotel_address" id="hotel_address" value="<?php if(isset($client_info[0]->hotel_address)){ echo $client_info[0]->hotel_address; } ?>"  >
                                </div>
                            </div>
                            <div class="form-group">    
                                <div class="col-sm-6">
                                    <label >City</label>
                                    <input type="text" class="form-control" name="city" id="city" value="<?php if(isset($client_info[0]->city)){ echo $client_info[0]->city; } ?>"  required="required">
                                </div>  
                                <div class="col-sm-6">
                                    <label >Pincode</label>
                                    <input type="text" class="form-control" name="pincode" id="pincode" value="<?php if(isset($client_info[0]->pincode)){ echo $client_info[0]->pincode; } ?>"  required="required">
                                </div> 
                            </div>
                            <div class="form-group">

                             <div class="col-sm-6">
                                <label >State</label>
                             <input type="text" class="form-control" name="state" id="state" value="<?php if(isset($client_info[0]->state)){ echo $client_info[0]->state; } ?>"  required="required" >
                                </div> 
                                <div class="col-sm-6">
                                <label >Country</label>
                                 <input type="text" class="form-control" name="country" id="country" value="india"  readonly>
                                </div> 
                            </div> 
                         <div class="form-group">    
                                <div class="col-sm-6">
                                    <label >Website</label>
                                    <input type="text" class="form-control" name="website" id="website" value="<?php if(isset($client_info[0]->website)){ echo $client_info[0]->website; } ?>"   required="required">
                                </div>  
                                <div class="col-sm-6">
                                    <label >Mobile No.</label>
                                    <input type="text" class="form-control" name="mobile_no" id="mobile_no" value="<?php if(isset($client_info[0]->mobile_no)){ echo $client_info[0]->mobile_no; } ?>"   required="required">
                                </div> 
                            </div>
                              <div class="form-group">    
                                <div class="col-sm-6">
                                    <label >Telephone No.</label>
                                    <input type="text" class="form-control" name="telephone_no" id="telephone_no" value="<?php if(isset($client_info[0]->telephone_no)){ echo $client_info[0]->telephone_no; } ?>"  required="required" >
                                </div>  
                                <div class="col-sm-6">
                                    <label >Nearest Railway Station</label>
                                    <input type="text" class="form-control" name="near_railway_st" id="near_railway_st" value="<?php if(isset($client_info[0]->near_railway_st)){ echo $client_info[0]->near_railway_st; } ?>"  required="required" >
                                </div> 
                            </div>
                         <div class="form-group">    
                                <div class="col-sm-6">
                                    <label >Check-In time</label>
                                    <input type="text" class="form-control" name="checkin_time" id="checkin_time" value="<?php if(isset($client_info[0]->checkin_time)){ echo $client_info[0]->checkin_time; } ?>"   required="required">
                                </div>  
                                <div class="col-sm-6">
                                    <label >Check-Out time</label>
                                    <input type="text" class="form-control" name="checkout_time" id="checkout_time" value="<?php if(isset($client_info[0]->checkout_time)){ echo $client_info[0]->checkout_time; } ?>"   required="required">
                                </div>  
                                 
                            </div>
                               <div class="form-group">
                                   <div class="col-sm-6">
                                    <label >Star Category</label>
                                    <select name="star" id="star" class="form-control">
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                         <option value="2">2</option>
                                          <option value="3">3</option>
                                           <option value="4">4</option> 
                                           <option value="5">5</option>           
                                    </select>
                               </div>
                            <div class="col-sm-6">  
                                <label >Hotel Picture</label>
                                <input type="file" class="form-control" name="hotel_pic" id="hotel_pic" value="<?php if(isset($client_info[0]->hotel_pic)){ echo $client_info[0]->hotel_pic; } ?>" >
                                <?php if(isset($client_info[0]->hotel_pic)): ?>
                                    <img src="<?php echo FILE .$client_info[0]->hotel_pic; ?>" width="100" height="100">    
                                <?php endif; ?>
                            </div>
                        </div>
                              <div class="form-group">    
                                <div class="cl-md-12 col-sm-12">
                                    <label >Hotel Description</label>
                                    <textarea row="5" cols="45" class="form-control" id="hotel_description" name="hotel_description"  required="required"><?php if(isset($client_info[0]->hotel_description)){ echo $client_info[0]->hotel_description; } ?></textarea> 
                                </div>
                              </div>          
                            <!-- <h4>Contact Information</h4>
                        <hr>
                         <div class="form-group">    
                                <div class="col-sm-6">
                                    <label>Your Name*</label>
                                    <input type="text" class="form-control" name="owner_name" id="owner_name" value="<?php if(isset($client_info[0]->owner_name)){ echo $client_info[0]->owner_name; } ?>"  required="required" >
                                </div>  
                                <div class="col-sm-6">
                                    <label >Mobile No.</label>
                                    <input type="text" class="form-control" name="owner_mobile_no" id="owner_mobile_no" value="<?php if(isset($client_info[0]->owner_mobile_no)){ echo $client_info[0]->owner_mobile_no; } ?>"  >
                                </div> 
                            </div>
                         <div class="form-group">    
                                <div class="col-sm-6">
                                    <label>Telephone No.</label>
                                    <input type="text" class="form-control" name="owner_telephone" id="owner_telephone" value="<?php if(isset($client_info[0]->owner_telephone)){ echo $client_info[0]->owner_telephone; } ?>"   required="required">
                                </div>  
                                <div class="col-sm-6">
                                    <label>E-mail</label>
                                    <input type="text" class="form-control" name="owner_email" id="owner_email" value="<?php if(isset($client_info[0]->owner_email)){ echo $client_info[0]->owner_email; } ?>"   required="required">
                                </div> 
                            </div>
                        
                         -->
                        
                        
                         <h4>Room Information</h4>
                        <hr>
    <div class="col-md-12 ">
     <div class="col-md-2 col-sm-4 col-xs-6">
         <label >Bed Type</label> 
     </div>    
        <div class="col-md-2 col-sm-4 col-xs-6">
         <label>Room Price</label> 
     </div> 
        <div class="col-md-2 col-sm-4 col-xs-6">
         <label >AC/Non AC</label> 
     </div> 
        <div class="col-md-2 col-sm-4 col-xs-6">
         <label >Room No</label> 
     </div> 
         <div class="col-md-2 col-sm-4 col-xs-6">
         <label >Person Allowed</label> 
     </div> 
   </div>
            <div class="row form-group  after-add-more">
            <div class="col-md-12 ">
             <div class="col-md-2 col-sm-4 col-xs-6">
               <select name="bed_type[]" class="form-control">
                  <?php if(isset($hotel_room[0]->bed_type)) {
                      ?> 
                     <option <?php if(($hotel_room[0]->bed_type)==1){ echo 'selected'; } ?> value="1">Single Bed</option>
                 <option <?php if (($hotel_room[0]->bed_type)== 2) {echo 'selected' ;} ?> value="3">Double Bed</option>
                 <option <?php if (($hotel_room[0]->bed_type)== 3){ echo 'selected' ;} ?> value="5">Triple Bed</option>
                 <option <?php if (($hotel_room[0]->bed_type)== 4){ echo 'selected' ;} ?> value="6">Four Bed</option>
                 <option <?php if (($hotel_room[0]->bed_type)== 5){ echo 'selected' ;} ?> value="7">Hall</option>
                 
                      <?php
                }
                else {
                    ?>
                 <option value="1">Single Bed</option>
                 <option value="3">Double Bed</option>
                 <option value="5">Triple Bed</option>
                 <option value="6">Four Bed</option>
                 <option value="7">Hall</option>
                      
                <?php } ?>
               </select>  

             </div>
             <div class=" col-md-2 col-sm-4 col-xs-6">
                 <input type="text" class="form-control" name="price[]" value="<?php if(isset($hotel_room[0]->price)){ echo $hotel_room[0]->price; }  ?>" placeholder="Room Price"  required="required">
             </div>
              <div class="col-md-2 col-sm-4 col-xs-6">
               <select name="ac_non_room[]" class="form-control">
                    <?php if(isset($hotel_room[0]->ac_non_room)) {
                      ?> 
                   <option <?php if (($hotel_room[0]->ac_non_room) == 1 ) echo 'selected' ; ?> value="1">AC</option>
                   <option <?php if (($hotel_room[0]->ac_non_room) == 2 ) echo 'selected' ; ?> value="2">Non Ac</option>
                         <?php
                }
                else {
                    ?>
                 <option  value="1">AC</option>
                   <option  value="2">Non Ac</option>
                      
                <?php } ?>
               </select>
             </div>
              <div class="col-md-2 col-sm-4 col-xs-6">
                <input type="text" class="form-control" name="room_no[]" placeholder="Room Number" value="<?php if(isset($hotel_room[0]->room_no)){ echo $hotel_room[0]->room_no; }?>" required="required">
             </div>
              <div class="col-md-2 col-sm-4 col-xs-6">
                  
                   <input type="text" class="form-control" name="person_allowed[]" placeholder="Allowed Person" value="<?php if(isset($hotel_room[0]->person_allowed)){ echo $hotel_room[0]->person_allowed; }?>" required="required">
             </div>
<!--               <select name="room_avalivality[]" class="form-control">
                   <?php //if(isset($hotel_room[0]->room_avalivality)) {
                      ?> 
                   <option  <?php //if (($hotel_room[0]->room_avalivality)== 1 ) echo 'selected' ; ?> value="1">Yes</option>
                   <option  <?php //if (($hotel_room[0]->room_avalivality) == 1 ) echo 'selected' ; ?> value="2">No</option>
                       <?php
              //  }
                //else {
                    ?>
                  <option  value="1">Yes</option>
                   <option   value="2">No</option>
                      
                      
                <?php //} ?>
               </select>-->
          
              
                  <div class="input_fields_wrap">
                      <button class="btn btn-success add-more" type="button">Add More Fields</button>
    <div></div>
                  </div>
                      
            </div>
             </div>

<!-- code>cop -->
<?php 
	if(isset($room_info) && count($room_info)>0):
	foreach ($room_info as $key => $value):?>
<div class="row ">
  <div class="col-md-12 control-group2 hotel_room_margin" >
  
             <div class="col-md-2 col-sm-4 col-xs-6">
               <select name="bed_type[]" class="form-control">
                   <option <?php if(($hotel_room[0]->bed_type)==1){ echo 'selected'; } ?> value="1">Single Bed</option>
                 <option <?php if (($hotel_room[0]->bed_type)== 2) {echo 'selected' ;} ?> value="3">Double Bed</option>
                 <option <?php if (($hotel_room[0]->bed_type)== 3){ echo 'selected' ;} ?> value="5">Triple Bed</option>
                 <option <?php if (($hotel_room[0]->bed_type)== 4){ echo 'selected' ;} ?> value="6">Four Bed</option>
                 <option <?php if (($hotel_room[0]->bed_type)== 5){ echo 'selected' ;} ?> value="7">Hall</option>
                 
               </select>  
             </div>
             <div class="col-md-2 col-sm-4 col-xs-6">
                <input type="text" class="form-control" name="price[]" value="<?php echo $value->price; ?>" placeholder="Room Price" >
             </div>
              <div class="col-md-2 col-sm-4 col-xs-6">
               <select name="ac_non_room[]" class="form-control">
                 <option <?php if ($value->ac_non_room == 1 ) echo 'selected' ; ?> value="1">AC</option>
                 <option <?php if ($value->ac_non_room == 2 ) echo 'selected' ; ?> value="2">Non Ac</option>
               </select>
             </div>
              <div class="col-md-2 col-sm-4 col-xs-6">
                <input type="text" class="form-control" name="room_no[]" value="<?php echo $value->room_no; ?>" placeholder="Room Number" >
             </div>
             <div class="col-md-2 col-sm-4 col-xs-6">
                  <input type="text" class="form-control" name="person_allowed[]" placeholder="Allowed Person" value="<?php echo $value->person_allowed; ?>">
             </div>
<!--               <select name="room_avalivality[]" class="form-control">
                 <option <?php// if ($value->room_avalivality == 1 ) echo 'selected' ; ?> value="1">Yes</option>
                 <option <?php //if ($value->room_avalivality == 2 ) echo 'selected' ; ?> value="2">No</option>
               </select>
             </div>-->
              <div class="input-group-btn"> 
                  <button class="btn btn-danger remove" type="button"><i class="glyphicon glyphicon-remove"></i> Remove Fields</button>
            </div>
             </div>

</div>
<?php endforeach; endif; ?>
<!-- <----copy cde> -->
<!-- code>cop -->

<div class="row copy hidden ">
  <div class="col-md-12 control-group hotel_room_margin" >
  
             <div class="col-md-2 col-sm-4 col-xs-6">
               <select name="bed_type[]" class="form-control">
                <option value="1">Single Bed + 1 person</option>
                   <option value="2">Single Bed + 2 person</option>
                 <option value="3">Double Bed + 1 person</option>
                 <option value="4">Double Bed + 4 person</option>
                 <option value="5">Triple Bed + max 8 persson</option>
                 <option value="6">Four Bed + max 12 person</option>
                 <option value="7">Hall +max 50 person</option>
               </select>  
             </div>
             <div class="col-md-2 col-sm-4 col-xs-6">
                <input type="text" class="form-control" name="price[]"  placeholder="Room Price" >
             </div>
              <div class="col-md-2 col-sm-4 col-xs-6">
               <select name="ac_non_room[]" class="form-control">
                 <option  value="1">AC</option>
                 <option  value="2">Non Ac</option>
               </select>
             </div>
              <div class="col-md-2 col-sm-4 col-xs-6">
                <input type="text" class="form-control" name="room_no[]" placeholder="Room Number" >
             </div>
            <div class="col-md-2 col-sm-4 col-xs-6">
                 <input type="text" class="form-control" name="person_allowed[]" placeholder="Allowed Person" >
             </div>
<!--               <select name="room_avalivality[]" class="form-control">
                 <option  value="1">Yes</option>
                 <option  value="2">No</option>
               </select>
             </div>-->
              <div class="input-group-btn"> 
                  <button class="btn btn-danger remove" type="button"><i class="glyphicon glyphicon-remove"></i> Remove Fields</button>
            </div>
             </div>

</div>

<!-- <----copy cde> -->
                    </div>
                    <div class="box-footer">
                        <input type="submit" class="btn btn-primary btn-normal border-radius pull-right"  value="Submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
</div>
<script type="text/javascript">
    $(document).ready(function ($) {

        $('#addhotel').validate({
            rules:{
             hotel_name:{
                required: true,
            },
            hotel_address: {
                required: true,
            },

        },
        errorPlacement: function(error, element) {},
        highlight: function (element) {
            $(element).parent('div').addClass('has-error');
        },
        unhighlight: function (element) {
            $(element).parent('div').removeClass('has-error');
        }
    });

    });
</script>
<script type="text/javascript">
//    function add_hotel_details() {
//     var formData = new FormData($('#addhotel')[0]);
//     $.ajax({
//       url: '<?php echo base_url('user/add_hotel'); ?>',
//       type: 'POST',
//       dataType: 'json',
//       data: formData ,
//       contentType: false,
//       processData: false,
//       success: function (data, textStatus, jqXHR) {
//          // if(data['success']){
//          //     alert('success');
//          // }
//      } 
//  });
// };

</script>
<script type="text/javascript">


 $(document).ready(function() {


      $(".add-more").click(function(){ 
          var html = $(".copy").html();
          $(".after-add-more").after(html);
      });


      $("body").on("click",".remove",function(){ 
          $(this).parents(".control-group").remove();
            $(this).parents(".control-group2").remove();
      });


    });
</script>
