<?php $this->load->view('header_admin'); ?>
<div class="info-container metro">
<div class="tab-pane admin-settings" id="administrators">
    <h4>Inactive Users</h4>
        <div class="clear"></div>
        <?php if(count($list)>0) {?>
            <table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
					<tr>
						<th>Profile Image</th>
						<th>First Name</th>
						<th>Last Name</th>
						<th>Email</th>
						<th>Date Created</th>
						<th>Status</th>
						<th>Date Email Sent</th>
						<th>Action</th>
					</tr>
                </thead>
                <?php foreach($list as $admin) {
					if( $admin['date_confirm_email_by_admin'] ) {
						$date_confirm_email_by_admin = date( 'Y-m-d',strtotime($admin['date_confirm_email_by_admin']) );
						$title_text = "Resend Email";
					}
					else {
						$date_confirm_email_by_admin = "-";
						$title_text = "Send Email";
					}
					?>
					<tr>
						<td data-title="Profile Image">
							<?php 
							if( !empty($admin['profile_image']) ) {
								$pimg = $base.$this->path_upload_profiles.$admin['profile_image'];
							}
							else {
								$pimg = $base."img/default.png";
							}
							?>
							<img src="<?php echo $pimg;?>" rel="<?php echo $admin['id'];?>" width="70">
						</td>
						<td class="wordbreak" data-title="First Name"><?php echo $admin['firstname'];?></td>
						<td class="wordbreak" data-title="Last Name"><?php echo $admin['lastname'];?></td>
						<td class="wordbreak" data-title="Email"><?php echo $admin['email_addr'];?></td>
						<td data-title="Date Created"><?php echo date( 'Y-m-d',strtotime($admin['date_created']) );?></td>
						<td data-title="Status"><?php echo ($admin['status'] == 1)?'Active':'Inactive';?></td>
						<td data-title="Date Email Sent"><?php echo $date_confirm_email_by_admin;?></td>
						<td data-title="Action">
							<img id="img_data_loader<?php echo $admin['id'];?>" style="display:none;" src="<?php echo $base."img/loader_dark.gif";?>">
							<a id="id_email_icon<?php echo $admin['id'];?>" title="<?php echo $title_text;?>" href="javascript:void(0);" onclick="javascript:sendConfimEmailByAdmin('<?php echo $admin['id'];?>','<?php echo $admin['email_addr'];?>');">
								<i class="icon-mail "></i>
							</a>
							<?php 
								if( 1 == $admin['is_confirm_email_by_admin'] ) {
								?>
									<img id="id_email_sent_icon<?php echo $admin['id'];?>" src='<?php echo $base."img/icons/right.png";?>' width="20" height="20">
								<?php 
							}?>							
							<img style="display:none;" id="id_email_sent_icon<?php echo $admin['id'];?>" src='<?php echo $base."img/icons/right.png";?>' width="20" height="20">
						</td>
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

<script type="text/javascript">
	function sendConfimEmailByAdmin( userId, email )
	{
		
		$("#img_data_loader"+userId).show();
		$("#id_email_icon"+userId).hide();
		$("#id_email_sent_icon"+userId).hide();
		$($.post(
			'<?php echo $base;?>ajax/ajaxSendConfimEmailByAdmin', 
			{userId:userId, email:email},
			function(data) {
				// alert( data);
				if( 1 == data ) {
					$("#img_data_loader"+userId).hide();
					$("#id_email_icon"+userId).show();
					$("#id_email_sent_icon"+userId).show();
				}
				else {
					$("#img_data_loader"+userId).hide();
					$("#id_email_icon"+userId).show();
					// $("#id_email_sent_icon"+userId).show();
				}
			})
		)
	}
</script>