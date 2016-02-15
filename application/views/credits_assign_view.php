<?php $this->load->view('header_admin'); ?>
<div class="info-container metro">
<div class="tab-pane  admin-settings" id="administrators">
    <h4>Assign Credits</h4>
		<a class="admin-new" href="<?php echo $base;?>admin/credits_assign"><i class="icon-plus-2"></i> Assign Credit</a>
        <?php if(count($list)>0):?>
            <table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
					<tr>
						<th>Credits Assign To</th>
						<th>Assigned Date</th>
						<th>Credits Assigned</th>
						<th>Price Set</th>
						<th>Status</th>
						<th>Action</th>	
					</tr>
                </thead>
                <?php 
				foreach($list AS $admin) {
					$username = $this->users->getMetaDataList('user','status=1 AND id="'.$admin['in_credits_assign_to'].'"','ORDER BY email_addr','id,CONCAT(firstname," ",lastname) AS username');
					$username = isset($username[0]['username']) ? $username[0]['username'] : '';?>
					<tr>
						<td><?php echo $username;?></td>
						<td><?php echo $admin['dt_credits_assigned'];?></td>
						<td><?php echo $admin['in_credits_assigned'];?></td>
						<td><?php echo "$".$admin['in_credits_price'];?></td>
						<td><?php echo ucwords($admin['st_credits_assign_status']);?></td>
						<td data-title="Edit"><a href="<?php echo $base;?>admin/credits_assign?id=<?php echo $admin['id'];?>"><i class="icon-enter"></i></a></td>
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