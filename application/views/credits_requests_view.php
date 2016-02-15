<?php $this->load->view('header_admin'); ?>
<div class="info-container metro">
<div class="tab-pane  admin-settings" id="administrators">
    <h4>Credits Requests</h4>
        <?php if(count($list)>0):?>
            <table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
					<tr>
						<th>Credits Requested By</th>
						<th>Requested Date</th>
						<th>Credits Requested</th>
						<th>Price Set</th>
						<th>Status</th>
						<th>Reply By</th>
						<th>Reply Date</th>
						<th>Action</th>
					</tr>
                </thead>
                <?php 
				foreach($list as $admin) {?>
					<tr>
						<td><?php echo wordwrap($admin['st_credits_requested_by'],15,"<br>\n",true);?></td>
						<td><?php echo $admin['dt_credits_request'];?></td>
						<td><?php echo $admin['in_credits_requested'];?></td>
						<td><?php echo "$".$admin['in_credits_price'];?></td>
						<td><?php echo ucwords($admin['st_credits_request_status']);?></td>
						<td><?php echo wordwrap($admin['st_credits_request_reply_by'],15,"<br>\n",true);?></td>
						<td><?php echo $admin['dt_reply_credits_request'];?></td>
						<td data-title="Edit"><a href="<?php echo $base;?>admin/credits_requests?id=<?php echo $admin['id'];?>"><i class="icon-enter"></i></a></td>
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