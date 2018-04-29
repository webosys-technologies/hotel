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
									<th class="nowrap">Room No.</th>
									
									<th class="nowrap">Bed Type</th>
									
									<th class="nowrap" >Price</th>
									<th class="nowrap">Room Type</th>
									<th class="nowrap">Allowed person</th>
								
									<th class="nowrap">View/Delete</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								if(isset($roomdata) && count($roomdata)>0):
									foreach ($roomdata as $key => $value):
										?>
									<tr>
										<td><?php echo $key+1; ?></td>
										<td><?php echo $value->hotel_name; ?></td>
										<td><?php echo $value->room_no; ?></td>										
										<td><?php if(($value->bed_type)==1){ echo 'Single Bed + 1 person'; } ?>
                                                                                    <?php if(($value->bed_type)==2){ echo 'Single Bed + 1 person'; } ?> 
                                                                                    <?php if(($value->bed_type)==3){ echo 'Single Bed + 1 person'; } ?> 
                                                                                    <?php if(($value->bed_type)==4){ echo 'Single Bed + 1 person'; } ?> 
                                                                                </td>
                                                                                <td><?php echo $value->price; ?></td>
										<td> <?php if(($value->ac_non_room)==1){ echo 'AC'; } ?> 
                                                                                 <?php if(($value->ac_non_room)==2){ echo 'Non AC'; } ?> </td>
										<td><?php echo $value->person_allowed; ?></td>
                                                                               
										<td>
											<a href="<?php echo base_url('htl/rooms/Roomprofile')."/".custom_encode($value->hotel_room_id); ?>" class="btn btn-info btn-xs" title="Edit"><i class="fa fa-edit"></i></a>
											<a href="<?php echo base_url('htl/rooms/delete_room')."?hotel_room_id=".custom_encode($value->hotel_room_id);?>" onClick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger btn-xs" title="Delete"><i class="fa fa-trash"></i></a>
										</td>
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

</script>
