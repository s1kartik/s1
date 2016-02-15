<?php $this->load->view('header_admin'); ?>
<div class="info-container metro">
<div class="tab-pane admin-settings" id="administrators">
    <h4>Points</h4>
        <a class="admin-new" href="<?php echo $base;?>admin/new_metadata?type=point_page"><i class="icon-plus-2"></i> New Page</a>        
        <?php 
		if(count($list)>0) {?>
            <table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                <tr><th>Page</th><th>Number of Points</th><th>Total Value</th><th>Status</th><th>Action</th></tr>
                </thead>
                <?php 
                    foreach($list as $admin) {
						$points = $this->points->getPagePointSummaryByPageID($admin['id']);
					?>
					<tr>
						<td data-title="Page"><?php echo $admin['st_point_pagename'];?></td>
						<td data-title="Number of Points" class="textright"><?php echo $points['points'];?></td>
						<td data-title="Total Value" class="textright"><?php echo $points['credits'];?></td>
						<td data-title="Status" class="textright"><?php echo ($admin['in_status']==1) ? "Active" : "InActive";?></td>
						<td data-title="Edit" ><a href="<?php echo $base;?>admin/update_meta?type=point_page&id=<?php echo $admin['id'];?>"><i class="icon-enter"></i></a></td>
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
</div>         
</div>
<?php $this->load->view('footer_admin'); ?>