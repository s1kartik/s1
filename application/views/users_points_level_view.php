<?php $this->load->view('header_admin'); ?>
<div class="info-container metro">
<div class="tab-pane  admin-settings" id="administrators">
    <h4>Users Points Level</h4>
        <?php if(count($list)>0):?>
            <table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
					<tr>
						<th>User</th>
						<th>Points Gained</th>
						<th>Points Level</th>
						<th>Lifetime</th>
						<th>Date when<br>Level reached</th>
					</tr>
                </thead>
                <?php 
				foreach($list as $admin) {?>
					<tr>
						<?php 
						$username = '';
						if( isset($admin['in_user_id']) && (int)$admin['in_user_id'] ) {
							$username = $this->users->getMetaDataList('user', 'id="'.$admin['in_user_id'].'"', '', 'nickname');
							$username = isset($username[0]['nickname']) ? $username[0]['nickname'] : '';
						}
						?>
						<td><?php echo ucwords($username);?></td>
						<td><?php echo $admin['in_total_points_gained'];?></td>
						<td><?php echo $admin['in_points_level'];?></td>
						<td><?php echo $admin['in_lifetime'];?></td>
						<td><?php echo $admin['dt_when_users_level_reached'];?></td>
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