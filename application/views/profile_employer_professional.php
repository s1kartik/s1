<?php $this->load->view('header_admin'); ?>
<div class="info-container">
<div class="document-content">
<form class="form-horizontal adminfrm" method="post">

<!-- Form Name -->
<legend>Employer Professional Information</legend>
<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="public_company_name">Public Company Name</label>
  <div class="controls">
    <input id="public_company_name" name="public_company_name" type="text" placeholder="Public Company Name" value="<?php echo isset($usermeta['public_company_name'])?$usermeta['public_company_name']:"";?>" class="input-xlarge" class="input-xlarge">
  </div>
</div>
<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="union">Union</label>
  <div class="controls">
  <?php $unions = $this->users->getUnions();
  if( isset($unions) && sizeof($unions) ) {
  ?>
	<select id="union" name="union" class="input-xlarge">
        <?php 
            foreach($unions as $em):
                $selected = (isset($usermeta['union']) && $usermeta['union']==$em['user_id'])?'selected="selected"':'';
        ?>
            <option value="<?php echo $em['user_id'];?>" <?php echo $selected;?>><?php echo $em['meta_value'];?></option>
        <?php endforeach;?>        
    </select>
  <?php 
  }?>
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <div class="controls">
	<input type="text" required name="union_number" placeholder="Union" class="input-xlarge" value="<?php echo isset($usermeta['union_number'])?$usermeta['union_number']:"";?>" />
</div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="industry_id">Industry</label>
  <div class="controls">
	<select  id="industry_id" name="industry_id" class="input-xlarge" required>
		<option value="">-select-</option>
		<?php
			$industries = $this->users->getMetaDataList('industry');
			foreach($industries as $in):
			$selected = (isset($usermeta['industry_id'])&&$usermeta['industry_id']==$in['id'])?'selected="selected"':'';
		?>
		<option value="<?php echo $in['id'];?>" <?php echo $selected;?>><?php echo $in['industryname'];?></option>
		<?php endforeach;?>
	</select>
  </div>
</div>
<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="branch">Headquarters/Branch</label>
  <div class="controls">
    <select id="branch" name="branch" placeholder="Headquarters/Branch" class="input-xlarge">
	    <option value="">-select-</option>
		<?php $selected = (isset($usermeta['branch'])&&$usermeta['branch']==$in['id'])?'selected="selected"':'';?>
	    <option <?php echo (isset($usermeta['branch'])&&$usermeta['branch']=="Headquarters")?'selected="selected"':'';?>>Headquarters</option>
	    <option <?php echo (isset($usermeta['branch'])&&$usermeta['branch']=="Branch")?'selected="selected"':'';?>>Branch</option>
    </select>
  </div>
</div>
<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="headquarters_name">Headquartes Name</label>
  <div class="controls">
    <input id="headquarters_name" name="headquarters_name" type="text" placeholder="Headquarters" class="input-xlarge" value="<?php echo isset($usermeta['headquarters_name'])?$usermeta['headquarters_name']:"";?>"/>
  </div>
</div>
<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="employee_number"># of Workers</label>
  <div class="controls">
    <input id="employee_number" name="employee_number" type="text" placeholder="# of Workers" class="input-xlarge" value="<?php echo isset($usermeta['employee_number'])?$usermeta['employee_number']:"";?>"/>
  </div>
</div>
<div class="inline text-center">
<button class="btn btn-primary">Save</button>
<button class="btn btn-danger">Cancel</button>
<input type="hidden" name="page" value="professional"/>
</div>

</form>
</div>
</div>
<?php $this->load->view('footer_admin'); ?>