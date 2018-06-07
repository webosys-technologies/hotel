<style type="text/css">
	input[type=text], select {
    width: 80%;
    padding: 4px 6px;
    margin: 3px 0;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
</style>

<div class="content-wrapper">
	<section class="content-header">
		<h1><?php echo $page_title; ?></h1>
        </section>
	<section class="content">
		<?php echo get_flashdata('message'); ?>
		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary">

					<div class="box-body dataTables_wrapper form-inline dt-bootstrap table-responsive">
						<table id="hotel_table" class="table table-bordered table-hover dataTable" data-page-length='10'>
							<thead>
								<tr>
									<th class="nowrap">S.No.</th>
                                                                        <th class="nowrap">Hotel Name</th>
                                                                        <th class="nowrap">Room Pic</th>
									<th class="nowrap">Room No.</th>
									
									<th class="nowrap">Bed Type</th>
									
									<th class="nowrap" >Price</th>
									<th class="nowrap">Room Type</th>
									<th class="nowrap">Allowed person</th>
									<th class="nowrap">Status</th>
								
									<th class="nowrap">View/Delete</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								if(isset($roomdata) && count($roomdata)>0):
									foreach ($roomdata as $key => $value):
										?>
									<tr>
										<form id="form<?php echo $value->hotel_room_id ?>"  enctype="multipart/form-data">
											<input type="hidden" name="hotel_room_id" value="<?php echo $value->hotel_room_id ?>">
											<input type="hidden" name="hotel_name" value="<?php echo $value->hotel_name; ?>">
										<td><span><?php echo $key+1; ?></span></td>
										<td><span class="l<?php echo $value->hotel_room_id ?>"><?php echo $value->hotel_name; ?></span><input type="text" name="hotel_name" value="<?php echo $value->hotel_name; ?>" class="i<?php echo $value->hotel_room_id ?>"  hidden="hidden" readonly></td>
										<td style="width: 10px">
											<input type="file" name="room_pic" id="room_pic" class="pic<?php echo $value->hotel_room_id ?>" style="display: none;" >
										</td>

										<td><span class="lb<?php echo $value->hotel_room_id ?>"><?php echo $value->room_no; ?></span><input type="text" name="room_no" value="<?php echo $value->room_no; ?>" class="in<?php echo $value->hotel_room_id ?>" hidden="hidden"></td>

										<td><span class="lb<?php echo $value->hotel_room_id ?>"><?php if(($value->bed_type)==1){ echo 'Single Bed'; } ?>
                                                  <?php if(($value->bed_type)==2){ echo 'Double Bed'; } ?> 
                                                  <?php if(($value->bed_type)==3){ echo 'Triple Bed'; } ?> 
                                                  <?php if(($value->bed_type)==4){ echo 'Four Bed'; } ?> 
                                                  <?php if(($value->bed_type)==5){ echo 'Hall'; } ?></span>
                                                  <select name="bed_type" class="sel<?php echo $value->hotel_room_id ?>" class="form-control" style="display: none" >
                   <option <?php if(($value->bed_type)==1){ echo 'selected'; } ?> value="1">Single Bed</option>
                 <option <?php if (($value->bed_type)== 2) {echo 'selected' ;} ?> value="2">Double Bed</option>
                 <option <?php if (($value->bed_type)== 3){ echo 'selected' ;} ?> value="3">Triple Bed</option>
                 <option <?php if (($value->bed_type)== 4){ echo 'selected' ;} ?> value="4">Four Bed</option>
                 <option <?php if (($value->bed_type)== 5){ echo 'selected' ;} ?> value="5">Hall</option>                 
               </select></td>

                                        <td><span class="lb<?php echo $value->hotel_room_id ?>"><?php echo $value->price; ?></span><input type="text" name="price" value="<?php echo $value->price; ?>" class="in<?php echo $value->hotel_room_id ?>" hidden="hidden"></td>

										<td><span class="lb<?php echo $value->hotel_room_id ?>"> <?php if(($value->ac_non_room)==1){ echo 'AC'; } ?> 
                                                  <?php if(($value->ac_non_room)==2){ echo 'Non AC'; } ?> </span>
                                            <select name="ac_non_room"  class="sel<?php echo $value->hotel_room_id ?>" style="display: none;">
                 <option <?php if ($value->ac_non_room == 1 ) echo 'selected' ; ?> value="1">AC</option>
                 <option <?php if ($value->ac_non_room == 2 ) echo 'selected' ; ?> value="2">Non Ac</option>
               </select> </td>
										<td><span class="lb<?php echo $value->hotel_room_id ?>"><?php echo $value->person_allowed; ?></span><input type="text" name="person_allowed" value="<?php echo $value->person_allowed; ?>" class="in<?php echo $value->hotel_room_id ?>" hidden="hidden"></td>
										<td>
											<?php
											$message="checkout";
											$status="bg-red";
											if($value->booking_status == 1){
												echo "CheckedIn";
											}else
											{
												echo 'CheckedOut';
											}
											?></td>
                                                                               
										<td>
											<button type="button" onclick="edit(<?php echo $value->hotel_room_id ?>)" id="bte<?php echo $value->hotel_room_id ?>" class="btn btn-info btn-xs" title="Edit"><i class="fa fa-edit"></i></button>

											<button type="button" onclick="save(<?php echo $value->hotel_room_id ?>)" id="bts<?php echo $value->hotel_room_id ?>" class="btn btn-success btn-xs " title="Edit" style="display: none"><i class="fa fa-save"></i></button>

											<a href="<?php echo base_url('admin/rooms/delete_room')."?hotel_room_id=".custom_encode($value->hotel_room_id);?>" onClick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger btn-xs " title="Delete"><i class="fa fa-trash"></i></a>
										</td>
									</form>
									</tr>
								<?php endforeach; endif; ?>
							</tbody>
						</table>
					</div><!-- .box-body -->
				</div><!-- .box -->
			</div><!-- .col-md-12 -->
		</div><!-- .row -->
	</section>
</div>
<script type="text/javascript">
	$(document).ready(function ($) {
		var datatable = $('#hotel_table').DataTable({
			"ordering": true,
			"searching": true,
				// "bLengthChange": true,
				"order": [[0, "asc"]],
				"aoColumns": [
				{"bSortable": true},
				{"bSortable": true},
				{"bSortable": true},
				{"bSortable": true},
				{"bSortable": true},
				{"bSortable": true},
				{"bSortable": true},
//                                {"bSortable": true},
				{"bSortable": false},
				]
			});
		// changing active status
		var onoffswitch_ajax = false;
		datatable.on("change", '.onoffswitch-checkbox', function () {
			var chkbox = $(this);
			var active = '';
			var id = chkbox.data('id');
			
			var value = (this.checked ? false : true);

			chkbox.attr({'disabled': 'disabled'});
			chkbox.parent().css({'opacity': '0.4'})

			if (!onoffswitch_ajax) {
				onoffswitch_ajax = true;
				$.ajax({
					url: "<?php echo base_url('admin/hotel/status'); ?>",
					type: "GET",
					data: {id: id, value: value},
					dataType : "JSON",
					success: function (response) {
						if (response.error == false) {
							chkbox.removeAttr('checked');
						}
						onoffswitch_ajax = false;
						chkbox.removeAttr('disabled');
						chkbox.parent().css({'opacity': '1'})
					},
					error: function (XMLHttpRequest, textStatus, errorThrown) {
						alert("Status: " + textStatus + "\nError: " + errorThrown)
					}
				});
			}
		});

		datatable.on('click', '.delete_job', function () {
			var button = $(this);
			var id = button.data('id');
			var confirmDelete = confirm('Are you sure to delete this record ?');
			if (!onoffswitch_ajax && confirmDelete) {
			// alert("Welcome");

			button.attr('disabled', 'disabled').addClass('disabled');
			onoffswitch_ajax = true;
			$.ajax({
				url: "<?php echo base_url('admin/hotel/delete_hotel'); ?>",
				type: "GET",
				data: {id: id},
				dataType: "JSON",
				success: function (response) {
					if (response.errors == false) {
						alert("User deleted!!");
						button.closest("tr").remove();
						location.reload();
					} 
					button.removeAttr('disabled').removeClass('disabled');

					onoffswitch_ajax = false;
				},
				error: function (XMLHttpRequest, textStatus, errorThrown) {
					alert("Status: " + textStatus + "\nError: " + errorThrown);
					button.removeAttr('disabled').removeClass('disabled');
					onoffswitch_ajax = false;
				}
			});
		}
	})

		
	});

	function edit(id)
		{
		//$('#edit').click(function (){
			// alert(id);
			$('.pic'+id).show();
			$('.lb'+id).hide();
			$('.in'+id).removeAttr('hidden');
			$('.sel'+id).removeAttr('style');
			$('#bte'+id).attr('style','display:none');
			$('#bts'+id).removeAttr('style');



		//})
	}

	function save(id)
	{
		var data= $('#form'+id).serialize();

		$.ajax({
				url: "<?php echo base_url('admin/Rooms/update_hotel_room'); ?>",
				type: "Post",
				data: data,
				dataType: "JSON",
				success: function (response) {

						// location.reload();
					
				},
				error: function (XMLHttpRequest, textStatus, errorThrown) {
					alert('Error while updating');
				}
			});

	}



</script>
