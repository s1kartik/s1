<?php $rows_my_data = $this->users->getMyDataOfUser($this->sess_userid);?>
<div id="modal_my_data" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-header bg-red">
		<h3 id="myModalLabel">My Data<i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal"></i></h3>
	</div>
	<div class="modal-body">
		<div class="charities-container" style="padding:10px 10px 0px 20px;box-shadow: none;">
			<?php 
			if( sizeof($rows_my_data) > 0 ) {?>
				<table class="table table-striped table-bordered table-condensed table-hover" style="width:100%;">
					<?php 
					// Points //
						$points = $this->points->getS1Points($this->sess_userid, $this->sess_usertype);
					// Credits //
						$credits = $this->points->getS1Credits("",$this->sess_userid);
	
					$level 		= isset($rows_my_data['user_wallet']['level']) ? $rows_my_data['user_wallet']['level'] : '';
					$language 	= isset($rows_my_data['user_wallet']['language']) ? $rows_my_data['user_wallet']['language'] : '';
					?>
					<tr><th>Points</th><td><?php echo $points;?></td></tr>
					<tr><th>Credits</th><td><?php echo $credits;?></td></tr>
					<tr><th>Level</th><td><?php echo $level;?></td></tr>
					<tr><th>Language</th><td><?php echo $language;?></td></tr>

					<tr>
						<th>Employer(s)</th>
						<td>
							<?php 
							if( isset($rows_my_data['user_connections'][8]) && sizeof($rows_my_data['user_connections'][8]) ) {
								foreach( $rows_my_data['user_connections'][8] AS $val_employers) {
									$arr_employers[] = isset($val_employers['nickname']) ? $val_employers['nickname'] : '';
								}
								echo isset($arr_employers) ? implode(", ", $arr_employers) : '-';
							}
							else {
								echo "<h6>No data found</h6>";
							}?>
						</td>
					</tr>
					
					<tr>
						<th>Union(s)</th>
						<td>
							<?php 
							if( isset($rows_my_data['user_connections'][7]) && sizeof($rows_my_data['user_connections'][7]) ) {
								foreach( $rows_my_data['user_connections'][7] AS $val_unions) {
									$arr_unions[] 	= isset($val_unions['nickname']) ? $val_unions['nickname'] : '';
								}
								echo isset($arr_unions) ? implode(", ", $arr_unions) : '-';
							}
							else {
								echo "<h6>No data found</h6>";
							}?>
						</td>
					</tr>
					
					<tr>
						<th>Hazards</th>
						<td>
							<table class="table-striped table-bordered table-condensed table-hover" style="width:100%;">
								<tr>
									<th>Completed</th>
									<?php $arr_hazards_completed = $rows_my_data['user_libraries']['hazards']['completed'];?>
									<th>Total: <?php echo $arr_hazards_completed['total'];?></th>
								</tr>
								<?php 
								if( isset($arr_hazards_completed[0]) ) { ?>
									<tr><th>Title</th><th>Date Completed</th></tr>
									<tr>
										<?php 
										foreach( $arr_hazards_completed AS $key_completed => $val_completed ) {
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
									<?php $arr_hazards_assigned = $rows_my_data['user_libraries']['hazards']['assigned'];?>
									<th>Total: <?php echo $arr_hazards_assigned['total'];?></th>
								</tr>
								<?php 
								if( isset($arr_hazards_assigned[0]) ) { ?>
									<tr><th>Title</th><th>Date Assigned</th></tr>
									<tr>
										<?php 
										foreach( $arr_hazards_assigned AS $key_assigned => $val_assigned ) {
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
									<?php $arr_hazards_purchased = $rows_my_data['user_libraries']['hazards']['purchased'];?>
									<th>Total: <?php echo $arr_hazards_purchased['total'];?></th>
								</tr>
								<?php 
								if( isset($arr_hazards_purchased[0]) ) { ?>
									<tr><th>Title</th><th>Date Bought</th></tr>
									<tr>
										<?php 
										foreach( $arr_hazards_purchased AS $key_purchased => $val_purchased ) {
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
					
					<tr>
						<th>Procedures</th>
						<td>
							<table class="table-striped table-bordered table-condensed table-hover" style="width:100%;">
								<tr>
									<th>Completed</th>
									<?php $arr_procedures_completed = $rows_my_data['user_libraries']['procedures']['completed'];?>
									<th>Total: <?php echo $arr_procedures_completed['total'];?></th>
								</tr>
								<?php 
								if( isset($arr_procedures_completed[0]) ) { ?>
									<tr><th>Title</th><th>Date Completed</th></tr>
									<tr>
										<?php 
										foreach( $arr_procedures_completed AS $key_completed => $val_completed ) {
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
									<?php $arr_procedures_assigned = $rows_my_data['user_libraries']['procedures']['assigned'];?>
									<th>Total: <?php echo $arr_procedures_assigned['total'];?></th>
								</tr>
								<?php 
								if( isset($arr_procedures_assigned[0]) ) { ?>
									<tr><th>Title</th><th>Date Assigned</th></tr>
									<tr>
										<?php 
										foreach( $arr_procedures_assigned AS $key_assigned => $val_assigned ) {
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
									<?php $arr_procedures_purchased = $rows_my_data['user_libraries']['procedures']['purchased'];?>
									<th>Total: <?php echo $arr_procedures_purchased['total'];?></th>
								</tr>
								<?php 
								if( isset($arr_procedures_purchased[0]) ) { ?>
									<tr><th>Title</th><th>Date Bought</th></tr>
									<tr>
										<?php 
										foreach( $arr_procedures_purchased AS $key_purchased => $val_purchased ) {
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
					
					<tr>
						<th>Inspections</th>
						<td>
							<table class="table-striped table-bordered table-condensed table-hover" style="width:100%;">
								<tr>
									<th>Completed</th>
									<?php $arr_inspections_completed = $rows_my_data['user_libraries']['inspections']['completed'];?>
									<th>Total: <?php echo $arr_inspections_completed['total'];?></th>
								</tr>
								<?php 
								if( isset($arr_inspections_completed[0]) ) { ?>
									<tr><th>Title</th><th>Date Completed</th></tr>
									<tr>
										<?php 
										foreach( $arr_inspections_completed AS $key_completed => $val_completed ) {
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
									<?php $arr_inspections_assigned = $rows_my_data['user_libraries']['inspections']['assigned'];?>
									<th>Total: <?php echo $arr_inspections_assigned['total'];?></th>
								</tr>
								<?php 
								if( isset($arr_inspections_assigned[0]) ) { ?>
									<tr><th>Title</th><th>Date Assigned</th></tr>
									<tr>
										<?php 
										foreach( $arr_inspections_assigned AS $key_assigned => $val_assigned ) {
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
									<?php $arr_inspections_purchased = $rows_my_data['user_libraries']['inspections']['purchased'];?>
									<th>Total: <?php echo $arr_inspections_purchased['total'];?></th>
								</tr>
								<?php 
								if( isset($arr_inspections_purchased[0]) ) { ?>
									<tr><th>Title</th><th>Date Bought</th></tr>
									<tr>
										<?php 
										foreach( $arr_inspections_purchased AS $key_purchased => $val_purchased ) {
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
					
					<tr>
						<th>Investigations</th>
						<td>
							<table class="table-striped table-bordered table-condensed table-hover" style="width:100%;">
								<tr>
									<th>Completed</th>
									<?php $arr_investigations_completed = $rows_my_data['user_libraries']['investigations']['completed'];?>
									<th>Total: <?php echo $arr_investigations_completed['total'];?></th>
								</tr>
								<?php 
								if( isset($arr_investigations_completed[0]) ) { ?>
									<tr><th>Title</th><th>Date Completed</th></tr>
									<tr>
										<?php 
										foreach( $arr_investigations_completed AS $key_completed => $val_completed ) {
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
									<?php $arr_investigations_assigned = $rows_my_data['user_libraries']['investigations']['assigned'];?>
									<th>Total: <?php echo $arr_investigations_assigned['total'];?></th>
								</tr>
								<?php 
								if( isset($arr_investigations_assigned[0]) ) { ?>
									<tr><th>Title</th><th>Date Assigned</th></tr>
									<tr>
										<?php 
										foreach( $arr_investigations_assigned AS $key_assigned => $val_assigned ) {
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
									<?php $arr_investigations_purchased = $rows_my_data['user_libraries']['investigations']['purchased'];?>
									<th>Total: <?php echo $arr_investigations_purchased['total'];?></th>
								</tr>
								<?php 
								if( isset($arr_investigations_purchased[0]) ) { ?>
									<tr><th>Title</th><th>Date Bought</th></tr>
									<tr>
										<?php 
										foreach( $arr_investigations_purchased AS $key_purchased => $val_purchased ) {
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
</div>