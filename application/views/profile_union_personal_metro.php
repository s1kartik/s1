<?php 
(isset($union))?$user=$union:'';
(isset($unionmeta))?$usermeta=$unionmeta:'';
if(isset($textmsg)) {?>
	<div class="alert alert-block alert-error fade in">
		<button type="button" class="close" data-dismiss="alert">x</button>
		<?php echo $textmsg;?>
	</div>
<?php 
}?>
<script type="text/javascript" src="<?php echo $base;?>js/jquery-ui.js"></script>  
<form class="form-horizontal adminfrm" method="post" name="frm_union_personal_info" id="frm_union_personal_info" enctype="multipart/form-data" action="<?php if(isset($rel)):?><?php echo $base;?>admin/union_profile?section=professional&id=<?php echo $_GET['id'];?><?php else:?><?php echo $base;?>admin/profile_setting?section=personal<?php endif;?>">
		<!-- Text input-->
		<div class="control-group">
		  <label class="control-label" for="company_name">Union Name</label>
		  <div class="controls">
			<input id="company_name" name="company_name" type="text" placeholder="Union Name" value="<?php echo isset($usermeta['company_name'])?$usermeta['company_name']:"";?>" class="input-xlarge" required/>
		  </div>
		</div>
		<div class="control-group">
		  <label class="control-label" for="street_number">Street #</label>
		  <div class="controls">
			<input id="street_number" name="street_number" type="text" placeholder="Street #" value="<?php echo isset($usermeta['street_number'])?$usermeta['street_number']:"";?>" class="input-xlarge"/>
		  </div>
		</div>
		<!-- Text input-->
		<div class="control-group">
		  <label class="control-label" for="street_name">Street Name</label>
		  <div class="controls">
			<input id="street_name" name="street_name" type="text" placeholder="Street Name" value="<?php echo isset($usermeta['street_name'])?$usermeta['street_name']:"";?>" class="input-xlarge"/>
		  </div>
		</div>
		<!-- Text input-->
		<div class="control-group">
		  <label class="control-label" for="apt_number">Unit/Apt</label>
		  <div class="controls">
			<input id="apt_number" name="apt_number" type="text" placeholder="Unit/Apt" value="<?php echo isset($usermeta['apt_number'])?$usermeta['apt_number']:"";?>" class="input-xlarge" />
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
			<input id="zip" name="zip" type="text" placeholder="Postal Code" class="input-xlarge" value="<?php echo isset($usermeta['zip'])?$usermeta['zip']:"";?>" required/>
		  </div>
		</div>

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

		<?php 
		if( isset($usermeta['union_training_centre']) && $usermeta['union_training_centre'] ) {?>
			<div class="control-group">
				<label class="control-label">Training Centre</label>
				<div class="controls">
					<?php echo $training_selected = (isset($usermeta['union_training_centre']) && $usermeta['union_training_centre']) ? 'yes' : 'no';?>
				</div>
			</div>
		<?php 
		}	

		if( isset($usermeta['parent_unions']) && $usermeta['parent_unions'] ) {?>
			<div class="control-group">
				<label class="control-label" for="parent_unions">Parent Union(s)</label>
				<div class="controls">
					<?php $rows_selected_unions = $this->users->getMetaDataList('user', 'type_id=7 AND status=1 AND id IN ('.$usermeta['parent_unions'].')', '', 'id, nickname');
					$cnt_union = 0;
					$sizeof_union = sizeof($rows_selected_unions);
					foreach( $rows_selected_unions AS $key_union => $val_union ) {
						$cnt_union++;
						echo $val_union['nickname'];
						if( $cnt_union<$sizeof_union ) {
							echo ", ";
						}
					}
					?>
				</div>
			</div>			
		<?php
		}		
		if( isset($usermeta['campus_name']) && $usermeta['campus_name'] ) { ?>
			<div class="control-group">
			  <label class="control-label" for="campus_name">Campus Name(s)</label>
			  <div class="controls">
				<?php echo isset($usermeta['campus_name'])?$usermeta['campus_name']:"";?>
			  </div>
			</div>
		<?php
		}?>
		
		<div class="control-group">
			<label class="control-label" for=""></label>
			<div class="controls" id="id_msg_pwd"></div></div>
		</div>
		<div class="control-group">
			<label class="control-label" for="txt_current_password">Edit Password</label>
			<div class="controls"><input id="txt_current_password" maxlength="8" class="input-xlarge" name="txt_current_password" type="password" placeholder="Enter Password"/></div>
		</div>
		<div class="control-group">
			<label class="control-label" for="txt_confirm_password">Confirm Password</label>
			<div class="controls"><input id="txt_confirm_password" maxlength="8" class="input-xlarge" name="txt_confirm_password" type="password" placeholder="Enter Password"/></div>
		</div>
		
		
		<div class="inline text-center">
		<input name="firstname" type="hidden" value="<?php echo $user['firstname'];?>"/>
		<input name="lastname" type="hidden" value="<?php echo $user['lastname'];?>"/>
		<input name="nickname" type="hidden" value="<?php echo $user['nickname'];?>"/>
		<button class="btn btn-primary"><?php if(isset($rel)):?>Next<?php else:?>Save<?php endif;?></button>
		<button type="button" class="btn btn-danger" onclick="javascript:window.location.href='<?php echo $base.'admin/profile_view_integrated';?>';">Cancel</button>
		<input type="hidden" name="page" value="personal"/>
		<input type="hidden" name="page_design" value="metro"/>
		</div>
</form>
<script type="text/javascript">
var error_msg = '';
$("#txt_current_password").change(function() {
	error_msg = '';
	var current_pwd = $(this).val();
	if( current_pwd.length < 8 && current_pwd.length > 0 ) {
		error_msg += '<?php echo lang('msg_password_length');?><br>\n';
	}
	$("#id_msg_pwd").html(error_msg);
});
$("#txt_confirm_password").change(function() {
	error_msg = '';
	var current_pwd = $("#txt_current_password").val();
	var confirm_pwd = $(this).val();
	
	if( current_pwd.length < 8 && current_pwd.length > 0 ) {
		error_msg += '<?php echo lang('msg_password_length');?><br>\n';
	}
	else if( current_pwd != confirm_pwd ) {
		error_msg += '<?php echo lang('msg_enter_same_password');?><br>\n';
	}
	else {
		error_msg = '';
	}		
	$("#id_msg_pwd").html(error_msg);
});
	
$(document).ready(function () {
	$("form").submit(function(e){
		if( error_msg != '' ) {
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