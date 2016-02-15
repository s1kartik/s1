<?php 
$this->load->view('header_admin');
$procedure_name = (isset($_POST['txt_procedure_name'])&&$_POST['txt_procedure_name']) ? $_POST['txt_procedure_name'] : '';
$status 		= (isset($_POST['cmb_status'])&&strlen($_POST['cmb_status'])) ? $_POST['cmb_status'] : '';
?>
<div class="info-container metro">
<div class="tab-pane  admin-settings" id="administrators">
	<a class="admin-new" href="<?php echo $base;?>admin/procedures"><i class="icon-plus-2"></i> Add New Procedure</a>
    <h4>Procedures</h4>
        <div class="input-prepend input-append">
            <form method="post">
				<input type="text" name="txt_procedure_name" id="txt_procedure_name" value="<?php echo $procedure_name;?>" placeholder="Procedure Name" class="input-large" list="searchresults" autocomplete="off" />
				<select name="cmb_status" id="cmb_status">
					<option value="">-select-</option>
					<option value="1" <?php if($status=='1'){?>selected="selected" <?php }?>>Active</option>
					<option value="0" <?php if($status=='0'){?>selected="selected" <?php }?>>Inactive</option>
				</select>
				<input class="btn" type="submit" value="Search"/>
            </form>
        </div>
        <?php 
		if(count($rows_procedures)>0) {?>
            <table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
					<tr>
						<th>Procedure Name</th>
						<th>Language</th>
						<th>Created By</th>
						<th>Date Created</th>
						<th width="100px;">Is Procedure Complete?</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
                </thead>
                <?php 
				foreach($rows_procedures as $admin) {?>
					<tr>
						<td class="wordbreak"><?php echo wordwrap($admin['st_procedure_name'],20,"<br>\n",true);?></td>
						<td><?php echo $admin['st_language'];?></td>
						<?php $rows_username = $this->users->getMetaDataList('user', 'id="'.$admin['in_created_by'].'"', '', 'CONCAT(firstname," ",lastname) AS username');
						if( isset($rows_username[0]['username'])&&$rows_username[0]['username'] ) {
							$username = $rows_username[0]['username'];
							$procedure_type = "new_procedure";
						}
						else {
							$username = "Admin";
							$procedure_type = "s1procedures";
						}
						?>
						
						<td><?php echo $username;?></td>
						<td><?php echo $admin['dt_date_start'];?></td>
						<td><?php echo ('completed'==$admin['st_procedure_status']) ? 'Yes' : 'No';?></td>
						<td><?php echo ($admin['status']=='1') ? 'Active' : 'Inactive';?></td>

						<td>
							<?php 
							// Edit procedure only possible if not active, not completed and not purchased by any frontend users //
								$where_procmylib = 'st_libtype_bought="s1procedures" AND user_id != "12" AND lib_id="'.$admin['id'].'"';
								$check_purchased = $this->users->getMetaDataList('my_library', $where_procmylib, '', 'lib_id');
								$check_purchased = (isset($check_purchased[0]['lib_id'])&&(int)$check_purchased[0]['lib_id']) ? $check_purchased[0]['lib_id'] : '';
								if( ($admin['status']!='1' || $admin['st_procedure_status']!='completed') && !$check_purchased ) {?>
									<a title="Edit Procedure" href="<?php echo $base;?>admin/procedures?id=<?php echo $admin['id'];?>"><i class="icon-enter"></i></a>
									<?php 
								}?>
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