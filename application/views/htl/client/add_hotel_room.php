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
                    <form class="form-horizontal" method="POST" action="<?php echo base_url('htl/user/add_hotelroom');?>"  id="addhotel" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group">
                                <?php if(isset($hotelid)): ?>
                                
                                    <input type="hidden" name="hotel_id" value="<?php echo $hotelid ?>" />
                                     <?php if(isset($hotelid)): ?>
                                    <input type="hidden" name="hotelroomid" value="<?php echo $hotelid; ?>">
                                  <?php  endif; ?> 
                                        <?php  endif; ?> 
                                 <input type="hidden" name="create_user" value="<?php if(isset($client_info[0]->create_user)){echo $client_info[0]->create_user; }else{ echo "admin";}?>">
                                
                                    <input type="hidden" name="isverified" value="<?php if(isset($client_info[0]->isverified)){echo $client_info[0]->isverified; }else{ echo "0";}?>" />
                              
                            </div>
                         
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
                 <option value="2">Double Bed</option>
                 <option value="3">Triple Bed</option>
                 <option value="4">Four Bed</option>
                 <option value="5">Hall</option>
                      
                <?php } ?>
               </select>  

             </div>
             <div class=" col-md-2 col-sm-4 col-xs-6">
                 <input type="text" class="form-control" name="price[]" value="<?php if(isset($hotel_room[0]->price)){ echo $hotel_room[0]->price; }  ?>" placeholder="Room Price" >
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
                <input type="text" class="form-control" name="room_no[]" placeholder="Room Number" value="<?php if(isset($hotel_room[0]->room_no)){ echo $hotel_room[0]->room_no; }?>">
             </div>
              <div class="col-md-2 col-sm-4 col-xs-6">
             <input type="text" class="form-control" name="person_allowed[]" placeholder="Person Allowed" value="<?php if(isset($hotel_room[0]->person_allowed)){ echo $hotel_room[0]->person_allowed; }?>">
             </div>
              
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
                 <option <?php if (($hotel_room[0]->bed_type)== 2) {echo 'selected' ;} ?> value="2">Double Bed</option>
                 <option <?php if (($hotel_room[0]->bed_type)== 3){ echo 'selected' ;} ?> value="3">Triple Bed</option>
                 <option <?php if (($hotel_room[0]->bed_type)== 4){ echo 'selected' ;} ?> value="4">Four Bed</option>
                 <option <?php if (($hotel_room[0]->bed_type)== 5){ echo 'selected' ;} ?> value="5">Hall</option>
                 
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
               <input type="text" class="form-control" name="person_allowed[]" placeholder="Person Allowed" value="<?php if(isset($hotel_room[0]->person_allowed)){ echo $hotel_room[0]->person_allowed; }?>">
             </div>
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
                <option value="1">Single Bed</option>
                 <option value="2">Double Bed</option>
                 <option value="3">Triple Bed</option>
                 <option value="4">Four Bed</option>
                 <option value="5">Hall</option>
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
               <input type="text" class="form-control" name="person_allowed[]" placeholder="Person Allowed" >
             </div>
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
