<form class="form-inline no-margin" method="post">
<div class="main-content padding-metro-home clearfix">
	<div class="tile-group three fg-black no-margin no-padding">
		<?php 
		$worker_ids = (isset($worker_ids)&&$worker_ids) ? $worker_ids : '';
		$where_supervisors		= 'st_designation="supervisor" AND st_status="y" AND in_user_id="'.$this->sess_userid.'"';
		$rows_supervisors		= $this->users->getMetaDataList("employer_consultant_designations", $where_supervisors, '', 'in_worker_id');
		// common::pr($rows_supervisors);
		?>
		<fieldset>
			<table>
				<tr>
				<td valign="top"><h5>Select Supervisor:&nbsp;</h5></td>
				<td>
					<div class="input-control select">
						<select name="cmb_supervisor" id="cmb_supervisor" required>
							<option value="">-select-</option>
							<?php 
							foreach( $rows_supervisors AS $val_supervisors ) {
								$supervisor_name = $this->users->getMetaDataList( 'user','status=1 AND id = "'.$val_supervisors['in_worker_id'].'"','','CONCAT(firstname," ",lastname) AS supervisorname' );
								$supervisor_name = isset($supervisor_name[0]['supervisorname']) ? $supervisor_name[0]['supervisorname'] : '';
								// $selected = (trim($my_employer)!='' && $val_supervisors['id']==$my_employer) ? 'selected="selected"' : '';?>
								<option value="<?php echo $val_supervisors['in_worker_id'];?>"><?php echo $supervisor_name;?></option>
								<?php 
							}?>
						</select>
					</div>
				</td>
				</tr>
				<?php 
				if( !isset($supervisor_id) ) {?>
				<tr>
					<td valign="top"><h5>Enter Crew Label:&nbsp;</h5></td>
					<td><div class="input-control text size3" style="height:30px"><input type="text" name="txt_crew_label" placeholder="Enter Crew Label"/></div></td>
				</tr>
				<?php
				}?>
			</table>
		</fieldset>

		<?php 
		if( !isset($supervisor_id) ) {
			$selected_crew_workers 	= $this->users->getMyLinksByUserID($this->sess_userid, $this->sess_usertype, 1, 'id IN ('.$worker_ids.')');
			if( isset($selected_crew_workers) && sizeof($selected_crew_workers) ) {
				foreach( $selected_crew_workers AS $ln ) {?>
					<div class="tile half-library bg-black myworker" id="">
						<div class="tile-content email">								
							<div class="email-image" style="height:36px; width:36px;">
								<?php $img_worker =(!empty($ln['profile_image'])) ? $this->base.$this->path_upload_profiles.$ln['profile_image'] : $this->base."img/default.png";?>
								<a href='#'><img src="<?php echo $img_worker;?>"/></a>
							</div>
							<div class="email-data" style="margin-left:40px;margin-top:-5px;">
								<span class="email-data-text"><?php echo $ln['firstname']." ".$ln['lastname'];?></span>
							</div>
						</div>
						<div class="brand"><div class="badge no-margin fg-white bg-transparent"><span class="icon-checkmark"></span></div></div>
					</div>
					<?php 
				}
			}
		}?>
	</div>
</div>
<div align="center"><button id="id_btn_create_crew" class="btn">Save</button></div>
<?php
if( !isset($supervisor_id) ) {?>
	<input type="hidden" name="selected_crew_workers" value="<?php echo $worker_ids;?>">
	<?php
}?>
</form>