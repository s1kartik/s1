<?php 
$reggroupid 	= isset($_GET['reggroupid']) ? $_GET['reggroupid'] : '';
$this->load->view('header_admin');
?>
<div id="row-filter">
    <div class="profile-content-filter">
        <form class="form-inline" method="post" id="filterfrm">
            <fieldset>
                <div class="controls">
                    <h6>FILTER RESULTS:</h6>
						<input type="text" class="spannews1" name="txt_reg_section" placeholder="Section" value="<?php echo isset($_POST['txt_reg_section'])?htmlspecialchars($_POST['txt_reg_section']):"";?>" />
						<input type="text" class="spannews1" name="txt_reg_subsection" placeholder="Sub Section" value="<?php echo isset($_POST['txt_reg_subsection'])?htmlspecialchars($_POST['txt_reg_subsection']):"";?>" />
						<input type="text" class="spannews1" name="txt_reg_item" placeholder="Item" value="<?php echo isset($_POST['txt_reg_item'])?htmlspecialchars($_POST['txt_reg_item']):"";?>" />
						<input type="text" class="spannews1" name="txt_reg_subitem" placeholder="Sub Item" value="<?php echo isset($_POST['txt_reg_subitem'])?htmlspecialchars($_POST['txt_reg_subitem']):"";?>" />
                        <input type="hidden" name="action" value="FILTER"/>
                        <button type="submit" class="btn">Go!</button>
                </div>
            </fieldset>
        </form>
    </div>
</div>
<div class="info-container metro">
<div class="tab-pane  admin-settings" id="administrators">
	<h4>Regulation Sections</h4>
	<a class="admin-new" href="<?php echo $base;?>admin/new_metadata?type=regulation_sections&reggroupid=<?php echo $reggroupid;?>"><i class="icon-plus-2"></i>&nbsp;New Regulation Section</a><a class="admin-new" href="<?php echo $base;?>admin/metadata?type=regulation_contents">Back to Regulation Group</a>
	<?php 
	if(count($list)>0) {
		$rows_regcontents 	= $this->users->getElementByID('tbl_regulation_contents', $reggroupid );
		$regulation_number 		= $rows_regcontents['st_regulation_number'];
		?>
		<h5 class="fr"><?php echo "Regulation Number: ".$regulation_number;?></h5>

		<table class="table table-striped table-bordered table-condensed table-hover">
			<thead>
			<tr>
				<th>Section</th>
				<th>Sub Section</th>
				<th>Item</th>
				<th>Sub Item</th>
				<th>Content</th>
				<th>Action</th>
			</tr>
			</thead>
			<?php foreach($list as $admin):
			?>
			<tr>
				<td data-title="Regulation Number"><?php echo $admin['st_section'];?></td>
				<td data-title="Title"><?php echo $admin['st_subsection'];?></td>
				<td data-title="Part"><?php echo $admin['st_item'];?></td>
				<td data-title="Sub Part"><?php echo $admin['st_subitem'];?></td>
				<td data-title="Sub Part"><?php echo $admin['st_content'];?></td>
				<td data-title="Action">
					<a title="Edit Regulation Section" href="<?php echo $base;?>admin/update_meta?type=regulation_sections&id=<?php echo $admin['id'];?>&reggroupid=<?php echo $reggroupid;?>"><i class="icon-enter"></i></a>
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