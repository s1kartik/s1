<form class="form-horizontal" method="post" enctype="multipart/form-data" action="<?php echo $base;?>admin/profile_setting?section=professional">
<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="lastname">Educational Institution Name</label>
  <div class="controls">
	<select id="company" name="company" placeholder="Institution Name" class="input-xlarge required">
		<option value="">-select-</option>
		<?php 
		$employers = $this->users->getEmployers();
		foreach($employers as $em) {
			$selected = (isset($usermeta['company']) && $usermeta['company']==$em['user_id'])?'selected="selected"':'';
		?>
			<option value="<?php echo $em['user_id'];?>" <?php echo $selected;?>><?php echo $em['meta_value'];?></option>
		<?php 
		}?>
	</select>
  </div>
</div>
<div class="inline text-center">
<button class="btn btn-primary">Save</button>
<button type="button" class="btn btn-danger" onclick="javascript:window.location.href='<?php echo $base.'admin/profile_view_integrated';?>';">Cancel</button>
<input type="hidden" name="page" value="professional"/>
<input type="hidden" name="page_design" value="metro"/>
</div>
</form>