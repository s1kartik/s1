<?php
$training_completed = $my_data_training['completed'];
$training_assigned 	= $my_data_training['assigned'];
$training_purchased = $my_data_training['purchased'];
$total_training 	= ($training_completed['total']+$training_assigned['total']+$training_purchased['total']);
?>
<div id="modal_my_data_trainings" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-header bg-red">
		<h3 id="myModalLabel"><img src="<?php echo $base;?>img/library/training_blank.png" width="35" height="35"> My Trainings<i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal"></i></h3>
	</div>
	<div class="modal-body">
		<?php
		if( $total_training > 0 ) {?>
			<div id="id_chart_mydata_training"></div>
			<?php
		}?>
		<div class="charities-container" style="padding:10px 10px 0px 20px;box-shadow: none;">
			<?php 
			if( sizeof($my_data_training) > 0 ) {?>
				<table class="table table-striped table-bordered table-condensed table-hover" style="width:100%;">
					<tr>
						<th>Tranings</th>
						<td>
							<table class="table-striped table-bordered table-condensed table-hover" style="width:100%;">
								<tr>
									<th>Completed</th>
									<th>Total: <?php echo $training_completed['total'];?></th>
								</tr>
								<?php 
								if( isset($training_completed[0]) ) { ?>
									<tr><th>Title</th><th>Date Completed</th></tr>
									<tr>
										<?php 
										foreach( $training_completed AS $key_completed => $val_completed ) {
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
									<th>Total: <?php echo $training_assigned['total'];?></th>
								</tr>
								<?php 
								if( isset($training_assigned[0]) ) { ?>
									<tr><th>Title</th><th>Date Assigned</th></tr>
									<tr>
										<?php 
										foreach( $training_assigned AS $key_assigned => $val_assigned ) {
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
									<th>Total: <?php echo $training_purchased['total'];?></th>
								</tr>
								<?php 
								if( isset($training_purchased[0]) ) { ?>
									<tr><th>Title</th><th>Date Bought</th></tr>
									<tr>
										<?php 
										foreach( $training_purchased AS $key_purchased => $val_purchased ) {
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
	if( $total_training > 0 ) {?>
		<script type="text/javascript" src="https://www.google.com/jsapi"></script>
		<script type="text/javascript">
			google.load("visualization", "1", {packages:["corechart"]});
			google.setOnLoadCallback(drawChart);
			function drawChart() {
				
				var scrwidth = screen.width;
				var scrheight = screen.height;
				if( scrwidth < 500 ) {
				var chartwidth  = 280;
				var chartheight = 175;
				}
				   else {
					var chartwidth  = 500;
					var chartheight = 300;
				   }
				
			var data = google.visualization.arrayToDataTable([
			  ['Task', 'My Training Data'],
			  ['Completed', <?php echo $training_completed['total'];?>],
			  ['Assigned', <?php echo $training_assigned['total'];?>],
			  ['Purchased', <?php echo $training_purchased['total'];?>]
			]);
			var options = {
			  pieHole: 0.4,
			  width:chartwidth, height:chartheight,
			  colors: ['#1ba1e2', '#1bb9e2', '#1bd2e2'], 
			  pieSliceText: 'value',
			  pieSliceTextStyle: {
				fontSize: 14, color: '#000000',
			  },
			};
			var chart = new google.visualization.PieChart(document.getElementById('id_chart_mydata_training'));
			chart.draw(data, options);
			}
		</script>
		<?php
	}?>
</div>