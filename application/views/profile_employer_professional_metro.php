<form class="form-horizontal adminfrm" method="post" action="<?php echo $base;?>admin/profile_setting?section=professional" enctype="multipart/form-data">

<div class="control-group">
  <label class="control-label" for="public_company_name">Public Company Name</label>
  <div class="controls">
    <input id="public_company_name" name="public_company_name" type="text" placeholder="Public Company Name" value="<?php echo isset($usermeta['public_company_name'])?$usermeta['public_company_name']:"";?>" class="input-xlarge" class="input-xlarge">
  </div>
</div>

<div class="control-group">
<label class="control-label" for="industry_id">Industry</label>
  <div class="controls">
	<select id="industry_id" class="industry_id" name="industry_id" class="input-xlarge">
		<option value="">-select-</option>
		<?php 
		$industries = $this->users->getMetaDataList('industry', 'date_start<=CURDATE() AND (date_end="" OR date_end>CURDATE())');
		foreach($industries as $in) {
			$selected = ($usermeta['industry_id']==$in['id'])?'selected="selected"':'';?>
			<option value="<?php echo $in['id'];?>" <?php echo $selected;?>><?php echo $in['industryname'];?></option>
			<?php 
		}?>
	</select>
  </div>
</div>

<div class="control-group">
  <label class="control-label" for="section_id">Sector</label>
  <div class="controls">
		<select id="section_id" class="section_id" name="section_id" class="input-xlarge">
			<option value="17">ALL</option>
			<?php 
				$sections = $this->users->getRelatedElement('tbl_section', 'industry_id', $usermeta['industry_id']);
				foreach($sections AS $sc) {
					$selected = ($usermeta['section_id']==$sc['id'])?'selected="selected"':'';?>
					<option value="<?php echo $sc['id'];?>" <?php echo $selected;?>><?php echo $sc['sectionname'];?></option>
				<?php 
				}
			?>
		</select>
  </div>
</div>

<div class="control-group">
  <label class="control-label" for="trade_id">Trade</label>
  <div class="controls">
	<select id="trade_id" name="trade_id" class="trade_id" class="input-xlarge">
		<option value="33">ALL</option>
		<?php 
		$trades = $this->users->getRelatedElementTwo('tbl_section2trade_view', 'industry_id', $usermeta['industry_id'], 'section_id', $usermeta['section_id']);
		foreach($trades as $td) {
			$selected = ($usermeta['trade_id']==$td['trade_id'])?'selected="selected"':'';?>
			<option value="<?php echo $td['trade_id'];?>" <?php echo $selected;?>><?php echo $td['tradename'];?></option>
			<?php 
		}?>
	</select>
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="branch">Headoffice/Branch</label>
  <div class="controls">
    <select id="branch" name="branch" placeholder="Headoffice/Branch" class="input-xlarge">
	    <option value="">-select-</option>
		<?php $selected = (isset($usermeta['branch'])&&$usermeta['branch']==$in['id'])?'selected="selected"':'';?>
	    <option value="Headoffice" <?php echo (isset($usermeta['branch'])&&$usermeta['branch']=="Headoffice")?'selected="selected"':'';?>>Headoffice</option>
	    <option value="Branch" <?php echo (isset($usermeta['branch'])&&$usermeta['branch']=="Branch")?'selected="selected"':'';?>>Branch</option>
    </select>
  </div>
</div>
<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="headoffice_name">Headoffice Name</label>
  <div class="controls">
    <input id="headquarters_name" name="headoffice_name" type="text" placeholder="Headoffice" class="input-xlarge" value="<?php echo isset($usermeta['headoffice_name'])?$usermeta['headoffice_name']:"";?>"/>
  </div>
</div>
<!-- Text input-->
<div class="control-group">
	<label class="control-label" for="employee_number"># of Workers</label>
	<div class="controls">
		<input id="employee_number" name="employee_number" type="text" placeholder="# of Workers" class="input-xlarge" value="<?php echo isset($usermeta['employee_number'])?$usermeta['employee_number']:"";?>"/>
	</div>
</div>

<div class="control-group">
  <label class="control-label" for="wsib_rate_group">WSIB Rate Group</label>
	<?php $rate_groups = $this->users->getMetaDataList('wsib_rategroup', 'in_status=1', '', 'in_rate_group, st_rate_group_description');?>
	<div class="controls">
		<select id="wsib_rate_group" name="wsib_rate_group" class="input-xlarge">
			<option value="">-select-</option>
			<?php 
			$rate_groups = isset($rate_groups[0]['in_rate_group']) ? $rate_groups : array();
			foreach($rate_groups AS $val_rate_group) {
				$rate_group 	= $val_rate_group['in_rate_group'];
				$rate_group_desc= $val_rate_group['st_rate_group_description'];
				
				$selected = (isset($usermeta['wsib_rate_group'])&&$usermeta['wsib_rate_group']==$rate_group)?'selected="selected"':'';?>
				<option value="<?php echo $rate_group;?>" <?php echo $selected;?>><?php echo $rate_group." - ".$rate_group_desc;?></option>
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

<script type="text/javascript">
	$(document).ready(function () {
		$(".industry_id").change(function(){
			$industry_id = $(this).val();
			$('.trade_id').html("<option value=''>-select-</option>");
			$.post('<?php echo $base;?>admin/getRelatedElement', {'table': 'tbl_section', 'field': 'industry_id', 'value': $industry_id, 'field_fetch': 'sectionname'}, function(data){
				$(".section_id").html(data);
			});
		});
		
		$(".section_id").change(function(){
			$industry_id = $('.industry_id').val();
			$section_id = $(this).val();
			$.post('<?php echo $base;?>admin/getRelatedElementTwo', {'table': 'tbl_section2trade_view', 'field1': 'industry_id', 'value1': $industry_id, 'field2': 'section_id', 'value2': $section_id, 'field_fetch': 'tradename'}, function(data){
				$(".trade_id").html(data);
			});
		});
	});
</script>
