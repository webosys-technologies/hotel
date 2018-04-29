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
                    <form class="form-horizontal" method="POST" action="<?php echo base_url('admin/rooms/update_room');?>"  id="addhotel" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group">
                                <div class="col-sm-6">
                                    <label for="h_name">Name of the Hotel </label>
                                    <input type="text" class="form-control" id="hotel_name"  name="hotel_name"  value="<?php if(isset($room_info[0]->hotel_name)){ echo $room_info[0]->hotel_name; } ?>" autofocus=""  placeholder="Enter Hotel Name">
                                </div>
                                <?php if(isset($room_info[0]->hotel_id)): ?>
                                
                                    <input type="hidden" name="hotel_id" value="<?php echo custom_encode($room_info[0]->hotel_id); ?>" />
                       <?php if(isset($room_info[0]->hotel_id)): ?>
                                    <input type="hidden" name="hotel_room_id" value="<?php echo custom_encode($room_info[0]->hotel_room_id); ?>">
                                  <?php  endif; ?> 
                                        <?php  endif; ?> 
                       

     <div class="col-sm-6">
         <label >Bed Type</label> 
          <select name="bed_type" class="form-control">
                  <?php if(isset($room_info[0]->bed_type)) {
                      ?> 
                     <option <?php if(($room_info[0]->bed_type)==1){ echo 'selected'; } ?> value="1">Single Bed</option>
                 <option <?php if (($room_info[0]->bed_type)== 2) {echo 'selected' ;} ?> value="3">Double Bed</option>
                 <option <?php if (($room_info[0]->bed_type)== 3){ echo 'selected' ;} ?> value="5">Triple Bed</option>
                 <option <?php if (($room_info[0]->bed_type)== 4){ echo 'selected' ;} ?> value="6">Four Bed</option>
                 <option <?php if (($room_info[0]->bed_type)== 5){ echo 'selected' ;} ?> value="7">Hall</option>
                 
                      <?php
                }
                else {
                    ?>
                 <option value="1">Single Bed </option>
                 <option value="2">Double Bed</option>
                 <option value="3">Triple Bed </option>
                 <option value="4">Four Bed </option>
                 <option value="5">Hall</option>
                      
                <?php } ?>
               </select>  
     </div>   
                            </div>
                <div class="form-group">
        <div class="col-sm-6">
         <label>Room Price</label> 
               <input type="text" class="form-control" name="price" value="<?php if(isset($room_info[0]->price)){ echo $room_info[0]->price; }  ?>" placeholder="Room Price" >
             
        </div> 
        <div class="col-sm-6 ">
         <label >AC/Non AC</label> 
          <select name="ac_non_room" class="form-control">
                    <?php if(isset($room_info[0]->ac_non_room)) {
                      ?> 
                   <option <?php if (($room_info[0]->ac_non_room) == 1 ) echo 'selected' ; ?> value="1">AC</option>
                   <option <?php if (($room_info[0]->ac_non_room) == 2 ) echo 'selected' ; ?> value="2">Non Ac</option>
                         <?php
                }
                else {
                    ?>
                 <option  value="1">AC</option>
                   <option  value="2">Non Ac</option>
                      
                <?php } ?>
               </select>
        </div> </div>
          <div class="form-group">
        <div class="col-sm-6 ">
         <label >Room No</label> 
              <input type="text" class="form-control" name="room_no" placeholder="Room Number" value="<?php if(isset($room_info[0]->room_no)){ echo $room_info[0]->room_no; }?>">
             
        </div> 
         <div class="col-sm-6 ">
         <label >Person Allowed</label> 
             <input type="text" class="form-control" name="person_allowed" placeholder="Person Allowed" value="<?php if(isset($room_info[0]->person_allowed)){ echo $room_info[0]->person_allowed; }?>">
       
         </div> </div>
               
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
