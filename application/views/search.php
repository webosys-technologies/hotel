<?php $this->load->view('common/header1'); ?>
<section class="section fullscreen background parallax" style="style="padding:172px 0;" background-image:url('<?php echo base_url() ?>/assets/upload/parallax_04.jpg');" data-img-width="1920" data-img-height="1133" data-diff="100">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-xs-12">
                <div class="home-form">
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="tab_01">
                           <center> <h5>WHERE WOULD YOU LIKE TO GO?</h5></center>
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
                 <option value="3">Triple Bed </option>
                 <option value="4">Four Bed</option>
                 <option value="5">Hall</option>
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
        </div>
    </div><!-- end container -->
</section><!-- end section -->
<section class="section clearfix">
    <div class="container">
        <div class="row">
            <div id="fullwidth" class="col-sm-12">
                <!-- START CONTENT -->
                <div class="row">
                    <?php
                    // echo '<pre>';
                    // print_r($pickup);
                    // echo '</pre>';				
                    ?>
                    <?php if (isset($searchresult) && count($searchresult) > 0):
                        foreach ($searchresult as $key => $value):
                            ?>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="post-wrapper clearfix border-bottom">
                                    <div class="hotel-wrapper">
                                        <div class="post-media">
                                            <a href=""><img src="<?php echo FILE . $value->hotel_pic; ?>" alt="" class="img-responsive hotel_pic"></a>
                                        </div><!-- end media -->
                                        <div class="post-title clearfix">
                                            <div class="pull-left">
                                                <h5><a href="javascript:void(0);" title=""><?php echo $value->hotel_name; ?></a></h5>
                                            </div><!-- end left -->
<!--                                            <div class="pull-right">
                                                <h6>&#x20b9 <?php echo $value->hotel_price; ?></h6>
                                            </div> end left -->
                                        </div><!-- end title -->
<!--                                        <div class="post-title clearfix">
                                            <div class="pull-left">
                                                <h6>Available Rooms</h6>
                                            </div> end left 
                                            <div class="pull-right">
                                                <h6><?php //echo $value->availabel_room; ?></h6>
                                            </div> end left 
                                        </div> end title -->
                                        <span class="rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </span><!-- end rating -->
                                        <p><?php echo $value->hotel_description; ?></p>
                                    </div><!-- end hotel-wrapper -->    
                                    <form method="post" action="" id="form<?php echo $value->hotel_id;  ?>"> 
                                       <input type="hidden" name="hotel_id" value="<?php echo custom_encode($value->hotel_id); ?>">
                                        <input type="hidden" name="checkin" value="<?php if (isset($pickup['checkin'])) echo $pickup['checkin']; ?>">

                                        <input type="hidden" name="bed_type" value="<?php if (isset($pickup['bed_type'])) echo $pickup['bed_type']; ?>">
                                        <input type="hidden" name="checkout" value="<?php if (isset($pickup['checkout'])) {
                        echo $pickup['checkout'];
                    }; ?>">
                                        <input type="hidden" name="Adults" value="<?php if (isset($pickup['Adults'])) echo $pickup['Adults']; ?>">
                                        <button type="button" class="btn btn-block booknow"  onclick='check_room("<?php echo $value->hotel_id; ?>")'>Book Now </button> 
                                    </form>

                                </div><!-- end post-wrapper -->
                            </div><!-- end col -->
    <?php endforeach;
else: ?>
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
            </div><!-- end fullwidth -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end section -->
<?php $this->load->view('common/footer'); ?>
<script type="text/javascript">
    function book_hotel(hotel_id) {
        $.ajax({
            url: '<?php echo base_url('user/book_hotel'); ?>',
            type: 'POST',
            dataType: 'json',
            data: {hotel_id: hotel_id},
            beforeSend: function () {
                $('#loader').css("display", "inline-table");
            },
            complete: function () {
                $('#loader').css("display", "none");
                $(".alert_message").removeClass("hide");
            },
            success: function (res, textStatus, jqXHR) {
                if (res.error) {
                    $("#errormessage").text(res.message).removeClass('hide').removeClass("alert-success").addClass("alert-danger");
                } else {
                    $("#errormessage").text(res.message).removeClass('hide alert-danger').addClass('alert-success');
                }
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                alert("Status: " + textStatus + "\nError: " + errorThrown);
            }
        });
    };
    
    
//    function get_fb(){
//    var feedback = $.ajax({
//        type: "POST",
//        url: '<?php //echo base_url('user/avl_room'); ?>',
//        dataType: 'json',
////        async: false
//    }).success(function(res, textStatus, jqXHR){
//        
//        setTimeout(function(){get_fb();}, 10000);
//    }).responseText;
//}

var interval = 1000;  // 1000 = 1 second, 3000 = 3 seconds
// function doAjax() {
//     $.ajax({
//             type: 'POST',
//             url: '<?php echo base_url('user/avl_room'); ?>',
//             data: {},
//             dataType: 'json',
//             success: function (data) {
//                 console.log(data);
//                     $('#hidden').val(data);// first set the value     
//             },
//             complete: function (data) {
//                     // Schedule the next
//                     setTimeout(doAjax, interval);
//             }
//     });
// }
// setTimeout(doAjax, interval);

function check_room(id)
{
    
        var Formdata= $('#form'+id).serialize();
        // alert(Formdata);
        $.ajax({
                url: "<?php echo base_url('Search/room_available'); ?>",
                type: "Post",
                data: Formdata,
                dataType: "JSON",
                success: function (response) {

                  //  alert(response.hotel_id);
        window.location.href="<?php  echo base_url('User/book_hotel');?>/"+response.hotel_id;

                    
                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                  //  alert('Error while updating');
                }
            });
}

</script>