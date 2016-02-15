<?php
$rows_libcontents_credits_buy = $this->users->getMetaDataList('my_library', 'user_id="'.$this->sess_userid.'" AND (transaction_type="s1credits" OR transaction_type="moneris")', 'ORDER BY date_bought DESC', 'lib_title, unit_price, creditsbuy, date_bought, transaction_type');
?>
<div id="modal_purchase_history" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-header bg-red">
		<h3 id="myModalLabel">My Purchases<i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal"></i></h3>
	</div>
	<div class="modal-body">
		<div class="charities-container" style="padding:10px 10px 0px 20px;box-shadow: none;">		
				 <?php 
				 if( sizeof($rows_libcontents_credits_buy) > 0 ) {?>
					<table class="table table-striped table-bordered table-condensed table-hover">
						<thead>
							<tr>
								<th>Library Title</th>
								<th>Credits</th>
								<th>Price</th>
								<th>Purchased Date</th>
								<th>Transaction Type</th>
							</tr>
						</thead>
						<?php 
						foreach($rows_libcontents_credits_buy as $val_libcontents_credits_buy) {
							$lib_title = isset($val_libcontents_credits_buy['lib_title']) ? $val_libcontents_credits_buy['lib_title'] : '';
							$creditsbuy = isset($val_libcontents_credits_buy['creditsbuy']) ? $val_libcontents_credits_buy['creditsbuy'] : '';
							$unit_price = isset($val_libcontents_credits_buy['unit_price']) ? $val_libcontents_credits_buy['unit_price'] : '';
							$date_bought = isset($val_libcontents_credits_buy['date_bought']) ? $val_libcontents_credits_buy['date_bought'] : '';
							$transaction_type = isset($val_libcontents_credits_buy['transaction_type']) ? $val_libcontents_credits_buy['transaction_type'] : '';
							?>
							<tr>
								<td><?php echo ucwords($lib_title);?></td>
								<td><?php echo $creditsbuy;?></td>
								<td><?php echo $unit_price;?></td>
								<td><?php echo $date_bought;?></td>
								<td><?php echo ucwords($transaction_type);?></td>
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
		</div>
	</div>
	<div class="modal-footer"><button class="btn" data-dismiss="modal">Close</button></div>
</div>