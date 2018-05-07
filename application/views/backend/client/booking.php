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
						<table id="clients_table" class="table table-bordered table-hover dataTable" data-page-length='10'>
							<thead>
								<tr>
									<th class="nowrap">S.No.</th>
									<th char="nowrap">Hotel Name</th>
									<th class="nowrap">Room No</th>
									<th class="nowrap">From Date</th>
									<th class="nowrap">To Date</th>
									<th class="nowrap">Status</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								// echo '<pre>';
								// print_r($orderlist);
								// echo '</pre>';
								if(isset($roomlist) && count($roomlist)>0):
									foreach ($roomlist as $key => $value):
										?>
									<tr>
										<td><?php echo $key+1; ?></td>
										<td><?php echo $value->hotel_name?></td>
										<td><?php echo $value->room_no; ?></td>
										<td><?php echo $value->fromdate; ?></td>
										<td><?php echo $value->todate ?></td>
										<td>
											<?php
											$message="checkout";
											$status="bg-red";
											if($value->booking_status == 1){
												echo "CheckedIn";
											}
											?></td>
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
				{"bSortable": false},
				]
			});
	});

</script>
