<?php $this->load->view('header_admin');?>
<div class="info-container metro">
<div class="tab-pane admin-settings" id="administrators">
    <h4>Unions</h4>
        <a class="admin-new" href="<?php echo $base;?>admin/union"><i class="icon-plus-2"></i> New Union</a>
        <?php if(count($rows_union) > 0) {?>
            <table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
					<tr>
						<th>Union</th>
						<th>Email</th>
						<th>Industry</th>
						<th>Is Training Centre</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
                </thead>
                <?php 
				foreach($rows_union as $admin) {
					$industry = $this->users->getMetaDataList('industry','id="'.$admin['industry_id'].'" AND date_start<=CURDATE() AND (date_end="" OR date_end>CURDATE())', '', 'industryname');
					$industry = $industry[0]['industryname'];

					$rows_usermeta = $this->users->getUserMetaByID( $admin['id'], 'meta_key, meta_value' );
					$is_training_centre = (isset($rows_usermeta['union_training_centre']) && $rows_usermeta['union_training_centre']) ? "yes" : "no";
					?>
					<tr>
						<td class="wordbreak" data-title="Union"><?php echo $admin['firstname']."&nbsp;".$admin['lastname'];?></td>
						<td class="wordbreak" data-title="Email"><?php echo $admin['email_addr'];?></td>
						<td class="wordbreak" data-title="Industry"><?php echo $industry;?></td>
						<td class="wordbreak" data-title="Training Centre"><?php echo $is_training_centre;?></td>
						<td class="wordbreak" data-title="Status"><?php echo ($admin['status'] == 1)?'Active':'Inactive';?></td>
						<td class="wordbreak" data-title="Action"><a href="<?php echo $base."admin/union?userid=".$admin['id'];?>"><i class="icon-enter"></i></td>
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