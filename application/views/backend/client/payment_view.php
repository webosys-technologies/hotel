<div class="content-wrapper">
	<section class="content-header">
		<h1><?php echo $page_title; ?></h1>
<!-- 		<a href="<?php echo base_url('admin/Owners/profile')."/na"; ?>" class="btn btn-primary btn-xs pull-right" style="margin-top:-25px "><i class="fa fa-plus"></i> Add Owner</a> -->
	</section>
	<section class="content">
		<?php echo get_flashdata('message'); ?>
		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary">
								
					<div class="box-body dataTables_wrapper form-inline dt-bootstrap table-responsive">
						<table id="clients_table" class="table table-bordered table-hover dataTable" data-page-length='10'>
							<thead>
								<tr>
									<th class="nowrap">S.No.</th>
									<th class="nowrap">Order Id</th>
									<th class="nowrap">Transaction Id</th>
									<th class="nowrap">Amount Paid</th>
									<th class="nowrap">Paid Percentage</th>
									<th class="nowrap">Status</th>
									<th class="nowrap">Date</th>
								</tr>
							</thead>
							<tbody>
								<?php 
							// echo '<pre>';
							// print_r($userdata);
							// echo '</pre>';
								// echo count($userdata);
								if(isset($userdata) && count($userdata)>0):
									foreach ($userdata as $key => $value):
										?>
									<tr>
										<td><?php echo $key+1; ?></td>
										<td><?php echo $value->orderid ?></td>
										<td><?php echo $value->transaction_id; ?></td>
										<td><?php echo $value->amount_paid; ?></td>
										<td><?php echo $value->paid_percentage; ?></td>
										<td><?php echo $value->payment_status; ?></td>
										<td><?php echo $value->created_at; ?></td>
											<td>
											<!-- 	<a href="<?php echo base_url('admin/Owners/profile')."/".custom_encode($value->owner_id); ?>" class="btn btn-info btn-xs" title="Edit"><i class="fa fa-edit"></i></a>
												<a href="<?php echo base_url('admin/Owners/delete_owner')."?id=".custom_encode($value->owner_id);?>" onClick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger btn-xs" title="Delete"><i class="fa fa-trash"></i></a> -->
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
		
			var datatable = $('#clients_table').DataTable({
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
					url: "<?php echo base_url('admin/clients/change_status'); ?>",
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
				url: "<?php echo base_url('admin/clients/delete_user'); ?>",
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
