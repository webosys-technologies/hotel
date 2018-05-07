<div class="content-wrapper">
	<section class="content-header">
		<h1><?php echo $page_title; ?></h1>
		<a href="<?php echo base_url('admin/Hotel/profile')."/na"; ?>" class="btn btn-primary btn-xs pull-right" style="margin-top:-25px "><i class="fa fa-plus"></i> Add Hotel</a>
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
									<th class="nowrap">No. Of Room</th>									
									<th class="nowrap">View/Delete</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								if(isset($hoteldata) && count($hoteldata)>0):
									foreach ($hoteldata as $key => $value):
										?>
									<tr class="clickable-row" data-href="<?php echo base_url('admin/Rooms/roomlist')."/".custom_encode($value->hotel_id); ?>">
										<td><?php echo $key+1; ?></td>
										<td><?php echo $value->hotel_name; ?></td>
										<td><?php $no=$this->Client_model->count_rooms($value->hotel_id);
										echo $no; ?></td>
                                             
											
										<td>
											<a href="<?php echo base_url('admin/Rooms/roomlist')."/".custom_encode($value->hotel_id); ?>" onclick="" class="btn btn-info btn-xs" title="Edit"><i class="fa fa-edit"></i></a>
											
<!--										        <a href="<?php //echo base_url('admin/hotel/addhotelroom')."?hotelid=".custom_encode($value->hotel_id); ?>" class="btn btn-info btn-xs" title="Add"><i class="fa fa-plus"></i>Room</a>
                                                                                        <a href="<?php //echo base_url('admin/hotel/updatehotelroom')."/".custom_encode($value->hotel_id); ?>" class="btn btn-primary btn-xs" title="Edit"><i class="fa fa-edit"></i>Room</a>
                                                                                -->
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

	jQuery(document).ready(function($) {
    $(".clickable-row").click(function() {
        window.location = $(this).data("href");
    });
});

	


</script>


 