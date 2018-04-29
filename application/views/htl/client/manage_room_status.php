<div class="content-wrapper">
	<section class="content-header">
		<h1><?php echo $page_title; ?></h1>
        </section>
    <script src="<?php echo base_url()?>/assets/backend/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
   
<!-- bootstrap datepicker -->
	<section class="content">
          
           <div class="alert alert-success hidden mssg alertmssg"></div>  
          <div class="alert alert-danger hidden danmssg danertmssg"></div>  
   
		<?php echo get_flashdata('message'); ?>
		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary">
                                    <div class="box-body dataTables_wrapper form-inline dt-bootstrap table-responsive">
                                        <form method="post"  name="searchform" id="searchform">
                                        <div class="col-md-6">
                                                  <label>from </label>
                      <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                          <input type="text"  name="fromdate"  class="form-control pull-right" id="datepicker">
                </div>
                                        </div>
                                               <div class="col-md-6">
                                                   <label> To </label>
                      <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                          <input type="text"  name="todate"  class="form-control pull-right" id="datepicker">
                </div>
                                        </div>
                                                                   <div class="col-md-12"  style=" margin-top: 39px;">
<?php 
								if(isset($roomdata) && count($roomdata)>0):
									foreach ($roomdata as $key => $value):
										?>
                     
                                        <div class="col-md-6">
                                            <div class="col-md-1"><input type="checkbox" name="hotel_room_id" id="checkbox"value="<?php echo $value->hotel_room_id; ?>"></div>
                                            <div class="col-md-3"><?php echo $value->hotel_name; ?></div>
						 <div class="col-md-2"><?php echo $value->room_no; ?></div>	
<!--                                                   <input type="hidden" id="tags" name="id">  -->
					   </div>
                                           
                                                     <?php endforeach; endif; ?>	
                                                 </div>
                                        <button type="button" onclick="checkvalue()"class="btn btn-sm btn-success pull-right">Submit</button>
                                          </form>
                                            </div>                               
									
                                        </div>
								
                                        
					</div><!-- .box-body -->
				</div><!-- .box -->
		
	
                
	</section>
</div>

    <script>
 
     $(document).ready(function () {
      
        var date_input = $('input[name="fromdate"]');
        var date_input1 = $('input[name="todate"]');
        var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";
        var options = {
            format: 'yyyy-mm-dd',
            container: container,
            todayHighlight: true,
            autoclose: true,
        };
        date_input.datepicker(options);
     date_input1.datepicker(options);
    })
</script>
<!--  <script>
function checkvalue(){
        $("input:checkbox[name=hotel_room_id]:checked").each(function(){
    var a=yourArray.push($(this).val());
    alert(a);
});
}
</script>-->
<script type="text/javascript">
var selected = new Array();


function checkvalue(){
  $("input:checkbox[name=hotel_room_id]:checked").each(function() {
       selected.push($(this).val());
  
  });
   var form = $("#searchform").serialize();
//   $('.mssg').addClass('hidden');
  	$.ajax({
				url: "<?php echo base_url('admin/room_status/update_room');?>",
				type: "POST",
				data: form + selected,
				dataType: "JSON",
				success: function (response) {
//                                    $data=response.message;
//                                     alert(response.error);
//console.log(response.error);
                            if(response.error==false){
                                      $('.mssg').removeClass('hidden');
                                      $('.alertmssg').html(response.message);	
                                      setTimeout(function() { $(".mssg").hide(); }, 3000);
                                  }else{
                                       $('.danmssg').removeClass('hidden');
                                      $('.danertmssg').html(response.message);	
                                      setTimeout(function() { $(".danmssg").hide(); }, 3000);
                                  }
				},
				
			});
  
}

</script>
<!--action="<?php //echo base_url('admin/room_status/update_room');?>"-->