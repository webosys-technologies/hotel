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
									<th char="nowrap">OrderID</th>
									<th class="nowrap">Transaction id</th>
                                    <th class="nowrap">Hotel Name</th>													
									<th class="nowrap">Customer Name</th>
									<th class="nowrap">Customer Mobile</th>
									<th class="nowrap">Booked room</th>									
									<th class="nowrap">Amount Paid</th>
									<th class="nowrap">Remaining Amount</th>
									<th class="nowrap">Paid Percentage</th>
                                    <!-- <th class="nowrap">Status</th>									 -->
									<th class="nowrap">Created at</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								// echo '<pre>';
								// print_r($orderlist);
								// echo '</pre>';
								if(isset($orderlist) && count($orderlist)>0):
									foreach ($orderlist as $key => $value):
										?>
									<tr>
										<td><?php echo $key+1; ?></td>
										<td><?php echo $value->orderid?></td>
										<td><?php echo $value->transaction_id; ?></a></td>
										<td><?php echo $value->hotel_name; ?></td>
										<td><?php echo $value->fname." ".$value->lname ; ?></td>
										<td><?php echo $value->phone; ?></td>
										<td><?php echo $value->room_no; ?></td>				
										<td><i class="fa fa-inr"></i><?php echo $value->amount_pay; ?></td>
										<td><i class="fa fa-inr"></i><?php if($value->paid_percentage != 0){ echo $value->price; }else{ echo 0;}  ?></a></td>
										<td><?php echo $value->paid_percentage ; ?></td>
										<!-- <td>
											<?php
											$message="checkout";
											$status="bg-red";
											if($value->status){
												$message="checkin";
												$status="bg-green";
											}
											?>
											<a href="<?php echo base_url('admin/orders/status')."?status=".urlencode($message)."&id=".custom_encode($value->id)."&no_of_room=".($value->no_of_room)."&room_nos=".($value->room_nos)."&hotel_id=".($value->hotel_id)."&avl_room=".($value->avl_room); ?>" onClick="return confirm('Are you sure you want to change status ?');"><span class=" -->pull-right badge <?php echo $status; ?>"><?php echo $message; ?></span></a></td>
										<td><?php echo $value->created_At; ?></td>
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
				{"bSortable": true},
				{"bSortable": true},
				{"bSortable": true},
				{"bSortable": false},
				]
			});
	});

</script>
