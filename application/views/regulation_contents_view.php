<?php 
$this->load->view('header_admin');
?>
<div id="row-filter">
    <div class="profile-content-filter">
        <form class="form-inline" method="post" id="filterfrm">
            <fieldset>
                <div class="controls">
                    <h6>FILTER RESULTS:</h6>
                        <select name="cmb_parent_regulation" class="span3">
                            <option value="">-Parent Regulation-</option>
                            <?php 
                            $parent_regulation = $this->users->getMetaDataList('regulations');
                            foreach($parent_regulation as $val_parentreg) {
								$selected = (isset($_POST['cmb_parent_regulation'])&&$_POST['cmb_parent_regulation']==$val_parentreg['id'])?'selected="selected"':'';?>
								<option value="<?php echo $val_parentreg['id'];?>" <?php echo $selected;?>><?php echo $val_parentreg['st_parent_regulation_title'];?></option>
								<?php 
							}?>
                        </select>
						<input type="text" class="span3" name="txt_reg_number" placeholder="Regulation Number" value="<?php echo isset($_POST['txt_reg_number'])?htmlspecialchars($_POST['txt_reg_number']):"";?>" />
						<input type="text" class="spannews1" name="txt_reg_title" placeholder="Title" value="<?php echo isset($_POST['txt_reg_title'])?htmlspecialchars($_POST['txt_reg_title']):"";?>" />
						<input type="text" class="spannews1" name="txt_reg_part" placeholder="Part" value="<?php echo isset($_POST['txt_reg_part'])?htmlspecialchars($_POST['txt_reg_part']):"";?>" />
						<input type="text" class="spannews1" name="txt_reg_subpart" placeholder="Subpart" value="<?php echo isset($_POST['txt_reg_subpart'])?htmlspecialchars($_POST['txt_reg_subpart']):"";?>" />
                        <input type="hidden" name="action" value="FILTER"/>
                        <button type="submit" class="btn">Go!</button>
                </div>
            </fieldset>
        </form>
    </div>
</div>

<div class="info-container  metro">
<div class="tab-pane  admin-settings" id="administrators">
	<h4>Regulation Group</h4>
	<a class="admin-new" href="<?php echo $base;?>admin/new_metadata?type=regulation_contents"><i class="icon-plus-2"></i> New Regulation Group</a>
	<?php 
	if(count($list)>0) {
		?>
		<table class="table table-striped table-bordered table-condensed table-hover">
			<thead>
			<tr>
				<th>Parent Regulation</th>
				<th>Regulation Number</th>
				<th>Title</th>
				<th>Part</th>
				<th>Sub Part</th>
				<th>Action</th>
			</tr>
			</thead>
			<?php foreach($list as $admin):
			$rows_regcontents 	= $this->users->getElementByID('tbl_regulations', $admin['in_parent_regulation_id'] );
			$parent_regulation 	= $rows_regcontents['st_parent_regulation_title'];
			?>
			<tr>
				<td data-title="Parent Regulation"><?php echo $parent_regulation;?></td>
				<td data-title="Regulation Number"><?php echo $admin['st_regulation_number'];?></td>
				<td data-title="Title"><?php echo $admin['st_title'];?></td>
				<td data-title="Part"><?php echo $admin['st_part'];?></td>
				<td data-title="Sub Part"><?php echo $admin['st_subpart'];?></td>
				<td data-title="Action">
					<a title="Edit Regulation Content" href="<?php echo $base;?>admin/update_meta?type=regulation_contents&id=<?php echo $admin['id'];?>"><i class="icon-enter"></i></a>&nbsp;|&nbsp;<a href="<?php echo $base;?>admin/new_metadata?type=regulation_sections&reggroupid=<?php echo $admin['id'];?>" class="fg-red">Add Reg Section</a>&nbsp;|&nbsp;<a href="<?php echo $base;?>admin/metadata?type=regulation_sections&reggroupid=<?php echo $admin['id'];?>" onclick="" class="fg-red">View Reg Sections</a>
				</td>
			</tr>
			<?php endforeach;?>
		</table>
    <?php 
	}
	else
	{?>
        <h5>No data found</h5>
    <?php 
	}?>
</div>       
</div>  
<?php $this->load->view('footer_admin'); ?>