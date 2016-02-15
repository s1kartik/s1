<form class="form-horizontal adminfrm" name="frm_employer_personal_info" id="frm_employer_personal_info" method="post" action="<?php echo $base;?>admin/profile_setting?section=personal" enctype="multipart/form-data">
	<!-- Form Name -->
	<!--legend>Employer Personal Information</legend>
	<!-- Text input-->

	

	<div class="control-group">
	  <label class="control-label" for="company_name">Company Name</label>
	  <div class="controls">
		<input id="company_name" style="font-size:12.5px;" name="company_name" type="text" placeholder="Official Company Name" value="<?php echo isset($usermeta['company_name'])?$usermeta['company_name']:"";?>" class="input-xlarge" required/>
	  </div>
	</div>

	<div class="control-group">
	  <label class="control-label" for="company_full_address">Company Full Address</label>
	  <div class="controls">
		<input id="company_full_address" style="font-size:12.5px;" name="company_full_address" type="text" placeholder="Company Full Address" value="<?php echo isset($usermeta['company_full_address'])?$usermeta['company_full_address']:"";?>" class="input-xlarge"/>
	  </div>
	</div>
	<!-- Text input-->

	<p align="center" id="msg_email" class="fgred"></p>
	<div class="control-group">
	  <label class="control-label" for="company_email">E-mail</label>
	  <div class="controls">
		<input id="company_email" style="font-size:12.5px;" name="company_email" type="text" placeholder="E-mail" value="<?php echo isset($usermeta['company_email'])?$usermeta['company_email']:"";?>" class="input-xlarge" required/>
	  </div>
	</div>
	
	<div class="control-group">
	  <label class="control-label" for="company_confirm_email">Confirm E-mail</label>
	  <div class="controls">
		<input id="company_confirm_email" style="font-size:12.5px;" name="company_confirm_email" type="text" placeholder="Confirm E-mail" class="input-xlarge"/>
	  </div>
	</div>
	
	
	<!-- Text input-->
	<div class="control-group">
	  <label class="control-label" for="company_phone">Contact Phone</label>
	  <div class="controls">
		<input id="company_phone" style="font-size:12.5px;" name="company_phone" type="text" placeholder="Contact Phone" value="<?php echo isset($usermeta['company_phone'])?$usermeta['company_phone']:"";?>" class="input-xlarge" required/>
	  </div>
	</div>
	<!-- Text input-->
	<div class="control-group">
	  <label class="control-label" for="street_number">Street #</label>
	  <div class="controls">
		<input id="street_number" style="font-size:12.5px;" name="street_number" type="text" placeholder="Street #" value="<?php echo isset($usermeta['street_number'])?$usermeta['street_number']:"";?>" class="input-xlarge"/>
	  </div>
	</div>
	<!-- Text input-->
	<div class="control-group">
	  <label class="control-label" for="street_name">Street Name</label>
	  <div class="controls">
		<input id="street_name" style="font-size:12.5px;" name="street_name" type="text" placeholder="Street Name" value="<?php echo isset($usermeta['street_name'])?$usermeta['street_name']:"";?>" class="input-xlarge"/>
	  </div>
	</div>
	<!-- Text input-->
	<div class="control-group">
	  <label class="control-label" for="apt_number">Unit/Apt</label>
	  <div class="controls">
		<input id="apt_number" style="font-size:12.5px;" name="apt_number" type="text" placeholder="Unit/Apt" value="<?php echo isset($usermeta['apt_number'])?$usermeta['apt_number']:"";?>" class="input-xlarge" />
	  </div>
	</div>
		<!-- Text input-->
		<div class="control-group">
		  <label class="control-label" for="country_id">Country</label>
		  <div class="controls">
			<select id="country_id" name="country_id" placeholder="Select Country" class="input-xlarge" required>
				<option value="">-select-</option>
				<?php
					$countries = $this->users->getMetaDataList('country');
					foreach($countries as $in):
					$selected = ($usermeta['country_id']==$in['id'])?'selected="selected"':'';
				?>
				<option value="<?php echo $in['id'];?>" <?php echo $selected;?>><?php echo $in['countryname'];?></option>
				<?php endforeach;?>
			</select>
		  </div>
		</div>                
		<!-- Text input-->
		<div class="control-group">
		  <label class="control-label" for="province_id">Province </label>
		  <div class="controls">
			<select id="province_id" name="province_id" placeholder="Select Province" class="input-xlarge" required>
				<option value="">-select-</option>
				<?php 
					if((int)$usermeta['province_id']>0){
						$provinces = $this->users->getRelatedElement('tbl_province', 'country_id', $usermeta['country_id']);
		
						foreach($provinces as $sc):
							$selected = ($usermeta['province_id']==$sc['id'])?'selected="selected"':'';
				?>
				<option value="<?php echo $sc['id'];?>" <?php echo $selected;?>><?php echo $sc['provincename'];?></option>
				<?php endforeach;                       
					}
				?>
			</select>
		  </div>
		</div>
		<!-- Text input-->
		<div class="control-group">
		  <label class="control-label" for="city_id">City</label>
		  <div class="controls">
			  <select id="city_id" name="city_id" class="input-xlarge" required>
					<option value="">-select-</option>
					<?php
						if((int)$usermeta['country_id']>0 && (int)$usermeta['province_id']>0){
						$cities = $this->users->getRelatedElementTwo('tbl_city', 'country_id', $usermeta['country_id'], 'province_id', $usermeta['province_id']);
						
						foreach($cities as $sc):
						$selected = ($usermeta['city_id']==$sc['id'])?'selected="selected"':'';
					?>
					<option value="<?php echo $sc['id'];?>" <?php echo $selected;?>><?php echo $sc['cityname'];?></option>
					<?php endforeach;                       
						}
					?>
				</select>                    
		  </div>
		</div>
	<!-- Text input-->
	<div class="control-group">
	  <label class="control-label" for="zip">Postal Code</label>
	  <div class="controls">
		<input id="zip" name="zip" style="font-size:12.5px;" type="text" placeholder="Postal Code" class="input-xlarge" value="<?php echo isset($usermeta['zip'])?$usermeta['zip']:"";?>" required/>
	  </div>
	</div>
	<?php /*
	<!-- Text input-->
	<div class="control-group">
	  <label class="control-label" for="enddate">BN Number</label>
	  <div class="controls">
		<input id="bn_number" style="font-size:12.5px;" name="bn_number" type="text" placeholder="BN Number" class="input-xlarge" value="<?php echo isset($usermeta['bn_number'])?$usermeta['bn_number']:"";?>" />
	  </div>
	</div>
	*/?>

	<div class="control-group">
		<label class="control-label" for="userfile">Upload Image</label>
		<div class="controls">
			<img id="preview_img" class="w45 h40" />
			<input class="input-xlarge" id="userfile" onchange="javascript:readImageUrl(this);" name="userfile" placeholder="Upload Image" type="file" />
			<?php 
			if( file_exists(FCPATH.$this->path_upload_profiles.$user['profile_image']) && $user['profile_image'] ) {?>
				<br>
				<b>Current Image: </b><a title="Profile Image"><img src="<?php echo $base.$this->path_upload_profiles.$user['profile_image'];?>" class="w45 h40"></a>
				<?php
			}
			else {?><img class="w50" src="<?php echo $base;?>img/default.png" /><?php }?>
		</div>
	</div>
	
	<!-- Text input-->
		<div class="control-group">
		  <label class="control-label" for="preferred_language">Preferred Language</label>
		  <div class="controls">
			<select id="preferred_language" name="preferred_language" class="input-xlarge">
				<option value="">-select-</option>
				<?php 
					$languages = $this->users->getMetaDataList('language');
					foreach($languages as $ln):
					$selected = ($usermeta['preferred_language']==$ln['language'])?'selected="selected"':'';
				?>
				<option value="<?php echo $ln['language'];?>" <?php echo $selected;?>><?php echo $ln['language'];?></option>
				<?php endforeach;?>
			</select>
		  </div>
		</div>
		
		<!-- Text input-->
		<div class="control-group">
		  <label class="control-label" for="second_language">Other Language</label>
		  <div class="controls">
			<select id="second_language" name="second_language" class="input-xlarge">
				<option value="">-select-</option>
				<?php
					$languages = $this->users->getMetaDataList('language');
					foreach($languages as $ln):
					$selected = ($usermeta['second_language']==$ln['language'])?'selected="selected"':'';
				?>
				<option value="<?php echo $ln['language'];?>" <?php echo $selected;?>><?php echo $ln['language'];?></option>
				<?php endforeach;?>
			</select>
		  </div>
		</div>
		

		<p align="center" id="msg_pwd" class="fgred"></p>
		<div class="control-group">
			<label class="control-label" for="txt_current_password">Edit Password</label>
			<div class="controls"><input id="txt_current_password" maxlength="8" class="input-xlarge" name="txt_current_password" type="password" placeholder="Enter Password"/></div>
		</div>
		<div class="control-group">
			<label class="control-label" for="txt_confirm_password">Confirm Password</label>
			<div class="controls"><input id="txt_confirm_password" maxlength="8" class="input-xlarge" name="txt_confirm_password" type="password" placeholder="Enter Password"/></div>
		</div>
		
	<div class="inline text-center">
	<button class="btn btn-primary">Save</button>
	<button type="button" class="btn btn-danger" onclick="javascript:window.location.href='<?php echo $base.'admin/profile_view_integrated';?>';">Cancel</button>
	<input type="hidden" name="page" value="personal"/>
	<input type="hidden" name="page_design" value="metro"/>
	</div>
</form>
<script type="text/javascript">
$(document).ready(function () {
	$.validator.setDefaults({
		errorPlacement: function(error, element) {
			// error.appendTo('#msg_emp_personal');
		}
	});
	
	var error_pwd = '';
	var error_email = '';
	$("form").submit(function(e){
		// Password Validation //
			var current_pwd = $("#txt_current_password").val();
			var confirm_pwd = $("#txt_confirm_password").val();
			if( current_pwd.length < 8 && current_pwd.length > 0 ) {
				$("#msg_pwd").html('<?php echo lang('msg_password_length');?><br>\n');
				error_pwd = 1;
			}
			else if( current_pwd.length < 8 && confirm_pwd.length > 0 ) {
				$("#msg_pwd").html('<?php echo lang('msg_password_length');?><br>\n');
				error_pwd = 1;
			}
			else if( current_pwd != confirm_pwd && confirm_pwd.length > 0 ) {
				$("#msg_pwd").html('<?php echo lang('msg_enter_same_password');?><br>\n');
				error_pwd = 1;
			}
			else {
				error_pwd = '';
				$("#msg_pwd").html("");
			}

		// Email Validation //
			var email = $("#company_email").val();
			var confirm_email = $("#company_confirm_email").val();
			if( email != confirm_email && confirm_email.length > 0 ) {
				$("#msg_email").html('<?php echo lang('msg_enter_same_email');?><br>\n');
				error_email = 1;
			}
			else {
				error_email = '';
				$("#msg_email").html("");
			}
		
		if( error_pwd != '' || error_email != '' ) {
			e.preventDefault(e);
		}
	});
	
	$("#preview_img").hide();
	$('#country_id').change(function(){
		$country_id = $(this).val();
		$.post('<?php echo $base;?>admin/getRelatedElement', {'table': 'tbl_province', 'field': 'country_id', 'value': $country_id, 'field_fetch': 'provincename'}, function(data){
			$("#province_id").html(data);
		});
	});
	$('#province_id').change(function(){
		$country_id = $('#country_id').val();
		$province_id = $('#province_id').val();
		$.post('<?php echo $base;?>admin/getRelatedElementTwo', {'table': 'tbl_city', 'field1': 'country_id', 'value1': $country_id, 'field2': 'province_id', 'value2': $province_id, 'field_fetch': 'cityname'}, function(data){
			$("#city_id").html(data);
		});
	});        
});
</script>
