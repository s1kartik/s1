<?php
$rows_credits_purchased = $this->users->getMetaDataList('my_credits', 'in_user_id="'.$this->sess_userid.'"', '', 
							'st_credits_package, in_credits_purchased, (SELECT SUM(in_credits_purchased*in_qty_ordered) FROM tbl_my_credits WHERE in_user_id="'.$this->sess_userid.'") AS total_purchased, 
							in_qty_ordered, in_credits_price, dt_date_purchased');
$total_purchased 		= isset($rows_credits_purchased[0]['total_purchased']) ? $rows_credits_purchased[0]['total_purchased'] : '0';
$rows_libcontents_credits_buy = $this->users->getMetaDataList('my_library', 'user_id="'.$this->sess_userid.'" AND transaction_type="s1credits"', 'ORDER BY lib_title', 
								'lib_title, creditsbuy, 
							(SELECT SUM(creditsbuy) FROM tbl_my_library WHERE user_id="'.$this->sess_userid.'" AND transaction_type="s1credits") AS total_bought, date_bought');
$total_bought 			= isset($rows_libcontents_credits_buy[0]['total_bought']) ? $rows_libcontents_credits_buy[0]['total_bought'] : '0';
?>

<div id="modal_credits_history" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-header bg-red">
		<h3 id="myModalLabel">History of Credits<i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal"></i></h3>
	</div>
	<div class="modal-body">
		<div class="charities-container" style="padding:10px 10px 0px 20px;box-shadow: none;">
			<h3 id="myModalLabel">Credits Purchased</h3>
			<!-- Start First Menu Box --> 				
				 <?php 
				 if( sizeof($rows_credits_purchased) > 0 ) {
					?>
					<table class="table table-striped table-bordered table-condensed table-hover">
						<thead>
							<tr>
								<th>Credits Package</th>
								<th>Credits Purchased</th>
								<th>Qty</th>
								<th>Price</th>
								<th>Purchased Date</th>
							</tr>
						</thead>
						<?php 
						foreach($rows_credits_purchased as $val_credits_purchased) {
							$credits_package 	= isset($val_credits_purchased['st_credits_package']) ? $val_credits_purchased['st_credits_package'] : '';
							$qty_ordered 		= isset($val_credits_purchased['in_qty_ordered']) ? $val_credits_purchased['in_qty_ordered'] : '';
							$credits_purchased 	= isset($val_credits_purchased['in_credits_purchased']) ? $val_credits_purchased['in_credits_purchased'] : '';
							$total_credits_purchased= ($qty_ordered * $credits_purchased);
							$credits_price 		= isset($val_credits_purchased['in_credits_price']) ? $val_credits_purchased['in_credits_price'] : '';
							$total_credits_price= ($qty_ordered * $credits_price);
							$date_purchased 	= isset($val_credits_purchased['dt_date_purchased']) ? $val_credits_purchased['dt_date_purchased'] : '';
							?>
							<tr>
								<td><?php echo ucwords($credits_package);?></td>
								<td><?php echo $total_credits_purchased;?></td>
								<td><?php echo $qty_ordered;?></td>
								<td><?php echo $total_credits_price;?></td>
								<td><?php echo $date_purchased;?></td>
							</tr>
						<?php 
						}?>
					</table>
					<?php 
					}
					else {?>
						<h6>No data found</h6>
					<?php 
					}?>
	
			<h3 id="myModalLabel">Credits used in Library Contents</h3>
			
				 <?php 
				 if( sizeof($rows_libcontents_credits_buy) > 0 ) {?>
					<table class="table table-striped table-bordered table-condensed table-hover">
						<thead>
							<tr>
								<th>Library Title</th>
								<th>Credits</th>
								<th>Purchased Date</th>
							</tr>
						</thead>
						<?php 
						foreach($rows_libcontents_credits_buy as $val_libcontents_credits_buy) {
							$lib_title = isset($val_libcontents_credits_buy['lib_title']) ? $val_libcontents_credits_buy['lib_title'] : '';
							$creditsbuy = isset($val_libcontents_credits_buy['creditsbuy']) ? $val_libcontents_credits_buy['creditsbuy'] : '';
							$date_bought = isset($val_libcontents_credits_buy['date_bought']) ? $val_libcontents_credits_buy['date_bought'] : '';
							?>
							<tr>
								<td><?php echo ucwords($lib_title);?></td>
								<td><?php echo $creditsbuy;?></td>
								<td><?php echo $date_bought;?></td>
							</tr>
						<?php 
						}?>
					</table>
					<?php 
					}
					else {?>
						<h6>No data found</h6>
					<?php 
					}?>

			<!-- End First Menu Box --> 
			
			<?php echo "<h5>Balance of Credits: ".($total_purchased-$total_bought)."</h5><br>";?>
		</div>
	</div>
	<div class="modal-footer"><button class="btn" data-dismiss="modal">Close</button></div>
</div>