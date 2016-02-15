<?php $this->load->view('header_admin'); ?>
<div class="info-container metro">
<div class="tab-pane  admin-settings" id="administrators">
    <h4>Credits Packages</h4>
        <a class="admin-new" href="<?php echo $base;?>admin/credits_package"><i class="icon-plus-2"></i> New Credits Package</a>
        <?php if(count($list)>0):?>
            <table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
					<tr>
						<th>Credits Package</th>
						<th>Price</th>
						<th>Credits</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
                </thead>
                <?php 
				foreach($list as $admin) {?>
					<tr>
						<td><?php echo ucwords($admin['st_creditspkg_name']);?></td>
						<td><?php echo "$".$admin['in_price'];?></td>
						<td><?php echo $admin['in_credits'];?></td>
						<td><?php echo ($admin['in_status']=='1') ? 'Active' : 'Inactive';?></td>
						<td data-title="Edit"><a href="<?php echo $base;?>admin/credits_package?id=<?php echo $admin['in_creditspkg_id'];?>"><i class="icon-enter"></i></a></td>
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