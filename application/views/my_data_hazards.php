<?php
$hazards_completed 	= $my_data_hazards['completed'];
$hazards_assigned 	= $my_data_hazards['assigned'];
$hazards_purchased 	= $my_data_hazards['purchased'];
$total_hazards 		= ($hazards_completed['total']+$hazards_assigned['total']+$hazards_purchased['total']);
?>
<div id="modal_my_data_hazards" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-header bg-red">
		<h3 id="myModalLabel"><img src="<?php echo $base;?>img/library/hazards_blank.png" width="35" height="35"> My Hazards<i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal"></i></h3>
	</div>
	<div class="modal-body">
		<?php
		if( $total_hazards > 0 ) {?>
			<div id="id_chart_mydata_hazards"></div>
			<?php
		}?>
		<div class="charities-container" style="padding:10px 10px 0px 20px;box-shadow: none;">
			<?php 
			if( sizeof($my_data_hazards) > 0 ) {?>
				
				<table class="table table-striped table-bordered table-condensed table-hover" style="width:100%;">
					<tr>
						<th>Hazards</th>
						<td>
							<table class="table-striped table-bordered table-condensed table-hover" style="width:100%;">
								<tr>
									<th>Completed</th>
									<th>Total: <?php echo $hazards_completed['total'];?></th>
								</tr>
								<?php 
								if( isset($hazards_completed[0]) ) { ?>
									<tr><th>Title</th><th>Date Completed</th></tr>
									<tr>
										<?php 
										foreach( $hazards_completed AS $key_completed => $val_completed ) {
											if( $key_completed !== "total" ) {
												echo "<tr><td>".$val_completed['lib_title']."</td>";
												echo "<td>".$val_completed['date_completed']."</td></tr>";
											}
										}
										?>
									</tr>
									<?php 
								}?>
							</table>
							<table class="table-striped table-bordered table-condensed table-hover" style="width:100%;">
								<tr>
									<th>Assigned</th>
									<th>Total: <?php echo $hazards_assigned['total'];?></th>
								</tr>
								<?php 
								if( isset($hazards_assigned[0]) ) { ?>
									<tr><th>Title</th><th>Date Assigned</th></tr>
									<tr>
										<?php 
										foreach( $hazards_assigned AS $key_assigned => $val_assigned ) {
											if( $key_assigned !== "total" ) {
												echo "<tr><td>".$val_assigned['lib_title']."</td>";
												echo "<td>".$val_assigned['date_assign']."</td></tr>";
											}
										}
										?>
									</tr>
									<?php
								}?>
							</table>
							<table class="table-striped table-bordered table-condensed table-hover" style="width:100%;">
								<tr>
									<th>Purchased</th>
									<th>Total: <?php echo $hazards_purchased['total'];?></th>
								</tr>
								<?php 
								if( isset($hazards_purchased[0]) ) { ?>
									<tr><th>Title</th><th>Date Bought</th></tr>
									<tr>
										<?php 
										foreach( $hazards_purchased AS $key_purchased => $val_purchased ) {
											if( $key_purchased !== "total" ) {
												echo "<tr><td>".$val_purchased['lib_title']."</td>";
												echo "<td>".$val_purchased['date_bought']."</td></tr>";
											}
										}
										?>
									</tr>
									<?php
								}?>
							</table>
						</td>
					</tr>	
				</table>
				<?php 
			}
			else {?>
				<h6>No data found</h6>
			<?php 
			}?>
		</div>
	</div>
	<div class="modal-footer"><button class="btn" data-dismiss="modal">Close</button></div>
	
	<?php 
	if( $total_hazards > 0 ) {?>
		<script type="text/javascript" src="https://www.google.com/jsapi"></script>
		<script type="text/javascript">
			google.load("visualization", "1", {packages:["corechart"]});
			google.setOnLoadCallback(drawChart);
			function drawChart() {
				
			var scrwidth = screen.width;
			var scrheight = screen.height;
			if( scrwidth < 501 ) {
			var chartwidth  = 280;
			var chartheight = 175;
			}
			   else {
				var chartwidth  = 500;
				var chartheight = 300;
			   }
			      
			var data = google.visualization.arrayToDataTable([
			  ['Task', 'My Hazards Data'],
			  ['Completed', <?php echo $hazards_completed['total'];?>],
			  ['Assigned', <?php echo $hazards_assigned['total'];?>],
			  ['Purchased', <?php echo $hazards_purchased['total'];?>]
			]);
			
			var options = {
			  pieHole: 0.4,
			  width:chartwidth, height:chartheight,
			  colors: ['#f0a30a', '#f9c20a', '#f9e10a'], 
			  pieSliceText: 'value',
			  pieSliceTextStyle: {
				fontSize: 14, color: '#000000',
			  },
			};
			var chart = new google.visualization.PieChart(document.getElementById('id_chart_mydata_hazards'));
			chart.draw(data, options);
			}
		</script>
		<?php 
	}?>
</div>