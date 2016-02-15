<?php $this->load->view('header_admin'); ?>
<div class="info-container metro">
<div class="tab-pane  admin-settings" id="administrators">
    <h4>Points Levels</h4>
        <a class="admin-new" href="<?php echo $base;?>admin/points_level"><i class="icon-plus-2"></i> New Points Level</a>
        <?php if(count($list)>0):?>
            <table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
					<tr>
						<th>Level</th>
						<th>Points of Level</th>
						<th>Label</th>
						<th>Image</th>
						<th>Lifetime</th>
						<th>Benefits & Discounts Allowed?</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
                </thead>
                <?php 
				foreach($list as $admin) {?>
					<tr>
						<td><?php echo ucwords($admin['in_level']);?></td>
						<td><?php echo $admin['in_points_of_level'];?></td>
						<td><?php echo $admin['st_label'];?></td>
						<td><img src="<?php echo $base."img/points-level/".$admin['st_image'];?>" width="75" height="75"></td>
						<td><?php echo $admin['in_lifetime'];?></td>
						<td><?php echo ($admin['has_benefits_to_level']=='1') ? 'Yes' : 'No';?></td>
						<td><?php echo ($admin['in_status_of_level']=='1') ? 'Active' : 'Inactive';?></td>
						<td title="Edit Points Level"><a href="<?php echo $base;?>admin/points_level?id=<?php echo $admin['in_points_level_id'];?>"><i class="icon-enter"></i></a></td>
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