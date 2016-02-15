<?php $this->load->view('header_admin');
// Common::pr($list);
?>
<div class="info-container metro">
<div class="tab-pane  admin-settings" id="administrators">
    <h4>Alerts</h4>
        <a class="admin-new" href="<?php echo $base;?>admin/alerts"><i class="icon-plus-2"></i> New Alert</a>
        <div class="input-prepend input-append">
            <form method="post">
				<input type="hidden" name="searchby" value="st_title" />
				<input type="text" name="searchval" value="" class="input-large" list="searchresults" autocomplete="off" />
				<input class="btn" type="submit" value="Search"/>
            </form>
        </div>
        <?php 
		if(count($list)>0):?>
            <table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
					<tr>
						<th>Title</th>
						<th>Summary</th>
						<th>Locations</th>
						<th>Legel Requirements</th>
						<th>Precautions</th>
						<th>Alert Criteria: User(s)</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
                </thead>
                <?php 
				foreach($list as $admin) {
					$users_alerted 	= array();
					$id 			= isset($admin['id']) ? $admin['id'] : '';
					$rows_users_alerted = $this->users->getMetaDataList('alerts_criteria_users', 'in_status=1 AND in_alert_id="'.$id.'"', '', 'st_alert_criteria, st_users_alerted');
					foreach( $rows_users_alerted AS $user ) {
						$users_alerted[$user['st_alert_criteria']] = (isset($user['st_users_alerted']) && $user['st_users_alerted']) ? json_decode($user['st_users_alerted']) : array();
					}
					$show_users = '';?>
					<tr>
						<td class="wordbreak"><?php echo wordwrap($admin['st_title'],20,"<br>\n",true);?></td>
						<td class="wordbreak"><?php echo $admin['st_summary'];?></td>
						<td class="wordbreak"><?php echo $admin['st_locations'];?></td>
						<td class="wordbreak"><?php echo $admin['st_legal_requirements'];?></td>
						<td class="wordbreak"><?php echo $admin['st_precautions'];?></td>
						<?php
						// Common::pr($users_alerted);
						if( isset($users_alerted) && $users_alerted ) {
							foreach( $users_alerted AS $key_alert_criteria => $val_alert_criteria ) {
								if( isset($val_alert_criteria) && $val_alert_criteria ) {
									// Common::pr($val_alert_criteria);
									$list_users 		= array();
									$users_alerted_ids 	= implode(",",$val_alert_criteria);
									$rows_users 		= $this->users->getMetaDataList('user', 'id IN ('.$users_alerted_ids.')', '', 'nickname');
									$show_users 		.= "<b>".ucwords($key_alert_criteria)."</b>";
									foreach( $rows_users AS $user ) {
										$list_users[] 	= (isset($user['nickname']) && $user['nickname']) ? $user['nickname'] : '';
									}
									$show_users 		.= ": ".implode(", ",$list_users)."<br>";
								}
							}?>
							<td><?php echo $show_users;?></td>
						<?php 
						}
						else {
							echo "<td>&nbsp;</td>";
						}?>
						<td><?php echo ($admin['in_status']=='1') ? 'Active' : 'Inactive';?></td>
						<td title="Edit Alert"><a href="<?php echo $base;?>admin/alerts?alertid=<?php echo $admin['id'];?>"><i class="icon-enter"></i></a></td>
					</tr>
				<?php 
				}?>
            </table>
        <?php else:?>
            <h6>No data found</h6>            
        <?php endif;?>
</div>       
</div>  
<?php $this->load->view('footer_admin'); ?>