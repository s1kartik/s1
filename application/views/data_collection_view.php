<?php $this->load->view('header_admin');?>
<div class="info-container metro">
<div class="tab-pane admin-settings" id="administrators">
	<?php 
	if( "library" == $data_type ) {?>
		<div id="row-filter">
			<div class="profile-content-filter">
				<form class="form-inline" method="post" id="filterfrm">
					<fieldset>
						<div class="controls">
							<h6>FILTER RESULTS:</h6>
								<input type="text" class="spannews1" name="txt_username" placeholder="User Name" value="<?php echo isset($_POST['txt_username'])?htmlspecialchars($_POST['txt_username']):"";?>" />
								<button type="submit" class="btn">Go!</button>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
		<?php 
		if( sizeof($rows_my_data) > 0 ) {
			foreach( $rows_my_data AS $key_user => $val_user ) {?>
				<h5 class="fg-darkRed"><?php echo "User: ".$val_user['user']['username'];?></h5>
				<table class="table table-striped table-bordered table-condensed table-hover" style="width:100%;">
					<tr>
						<th>Hazards</th>
						<td>
							<table class="table-striped table-bordered table-condensed table-hover" style="width:100%;">
								<tr>
									<th>Purchased</th>
									<?php $arr_hazards_purchased = $val_user['hazards']['purchased'];?>
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
									<th>Purchased</th>
									<?php $arr_procedures_purchased = $val_user['procedures']['purchased'];?>
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
									<th>Purchased</th>
									<?php $arr_inspections_purchased = $val_user['inspections']['purchased'];?>
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
									<th>Purchased</th>
									<?php $arr_investigations_purchased = $val_user['investigations']['purchased'];?>
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
					<tr>
						<th>Safety Talks</th>
						<td>
							<table class="table-striped table-bordered table-condensed table-hover" style="width:100%;">
								<tr>
									<th>Purchased</th>
									<?php $arr_safety_purchased = $val_user['safetytalks']['purchased'];?>
									<th>Total: <?php echo $arr_safety_purchased['total'];?></th>
								</tr>
								<?php 
								if( isset($arr_safety_purchased[0]) ) { ?>
									<tr><th>Title</th><th>Date Bought</th></tr>
									<tr>
										<?php 
										foreach( $arr_safety_purchased AS $key_purchased => $val_purchased ) {
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
		}
		else {
			echo "<h6>No data found</h6>";
		}
		}
		else if( "user" == $data_type ) {?>
			<div id="row-filter">
				<div class="profile-content-filter">
					<form class="form-inline" method="post" id="filterfrm">
						<fieldset>
							<div class="controls">
								<h6>FILTER RESULTS:</h6>
									<input type="text" class="spannews1" name="txt_username" placeholder="User Name" value="<?php echo isset($_POST['txt_username'])?htmlspecialchars($_POST['txt_username']):"";?>" />
									<input type="text" class="spannews1" name="txt_useremail" placeholder="User Email" value="<?php echo isset($_POST['txt_useremail'])?htmlspecialchars($_POST['txt_useremail']):"";?>" />
									<select id="cmb_industry" name="cmb_industry" class="spannews1">
										<option value="">-Industry-</option>
										<?php
											$industries = $this->users->getMetaDataList('industry', 'date_start<=CURDATE() AND (date_end="" OR date_end>CURDATE())');
											foreach($industries as $in):
											$selected = (isset($_POST['cmb_industry'])&&$_POST['cmb_industry']==$in['id'])?'selected="selected"':'';
										?>
										<option value="<?php echo $in['id'];?>" <?php echo $selected;?>><?php echo $in['industryname'];?></option>
										<?php endforeach;?>
									</select>
									<button type="submit" class="btn">Go!</button>
							</div>
						</fieldset>
					</form>
				</div>
			</div>
			<?php 
			if( sizeof($rows_my_data) > 0 ) {
				foreach( $rows_my_data AS $key_user => $val_user ) {?>
					<table class="table table-striped table-bordered table-condensed table-hover" style="width:100%;">
					<tr>
						<th class="fg-darkRed"><?php echo ucwords($key_user);?></th>
						<td>
							<table class="table-striped table-bordered table-condensed table-hover" style="width:100%;">
								<tr>
								<th class="fg-darkRed">User Name</th>
								<th class="fg-darkRed">User Email</th>
								<th class="fg-darkRed">User Industry</th></tr>
								<?php
								foreach( $val_user AS $key_usertype => $val_usertype ) {
									if( isset($val_usertype) ) { ?>
										<tr>
											<td><?php echo $val_usertype['username'];?></td>
											<td><?php echo $val_usertype['email_addr'];?></td>
											<td><?php echo $val_usertype['industry_name'];?></td>
										</tr>
										<?php
									}
								}?>
								</tr>
							</table>
						</td>
					</tr>
					</table>
					<?php 
				}
			}
			else {
				echo "<h6>No data found</h6>";
			}
		}
	?>	
</div>
</div>
<?php $this->load->view('footer_admin'); ?>