<form name="frm_assign_badge" class="frm_assign_badge" action="" method="post">
	<input type="hidden" name="hidn_worker_id" id="hidn_worker_id" value="<?php echo $worker_id;?>">
	<input type="hidden" name="badgeId" value="<?php echo $badge_id;?>">
	<input type="hidden" name="redirectFrom" value="<?php echo $redirect_from;?>">
	<input type="hidden" name="libtypeBought" value="<?php echo $libtype_bought;?>">

	<?php 
	if( "badge" == $libtype_bought ) {?>
		<label for="cmb_provider_type">Provider Type</label>
		<select name="cmb_provider_type" id="cmb_provider_type">
			<?php 
			$badge_provider_types 	= $this->users->getMetaDataList('badge_provider_types', 'in_status=1', '', 'id, st_badge_provider_type');
			foreach( $badge_provider_types AS $val_provider_types ) {
				$provider_type_id 		= isset($val_provider_types['id']) ? $val_provider_types['id'] : '';
				$provider_type 			= isset($val_provider_types['st_badge_provider_type']) ? $val_provider_types['st_badge_provider_type'] : '';?>
				<option value="<?php echo $provider_type_id;?>"><?php echo $provider_type;?></option>
				<?php
			}?>
		</select>
		<label for="txt_provider_name">Provider Name</label>
		<input id="txt_provider_name" name="txt_provider_name" type="text" placeholder="Provider Name" class="input-xlarge">
		<label for="txt_provider_location">Provider Location</label>
		<input id="txt_provider_location" name="txt_provider_location" type="text" placeholder="Provider Location" class="input-xlarge">
		<label for="txt_instructor_name">Instructor Name</label>
		<input id="txt_instructor_name" name="txt_instructor_name" type="text" placeholder="Instructor Name" class="input-xlarge">
		<label for="txt_date_badge_attended">Date of D.R.O.T  Attended</label>
		<span id="badge_date">
			<input id="txt_date_badge_attended" name="txt_date_badge_attended" type="text" placeholder="Date of D.R.O.T Attended " class="input-xlarge badgedate">
		</span>
		<label for="txt_date_badge_expiry">D.R.O.T  Expiry Date</label>
		<span id="badge_expiry_date">
			<input id="txt_date_badge_expiry" name="txt_date_badge_expiry" type="text" placeholder="D.R.O.T Expiry Date" class="input-xlarge badgeexpirydate">
		</span>
		<?php
	}
	else {?>
		<label for="txt_provider_name">Provider type: S1</label>
		<label for="txt_provider_name">Provider name: S1</label>
		<label for="txt_provider_name">Provider Location: Online</label>
		<label for="txt_provider_name">Instructor Name: S1</label>
		<?php 
	}?>
	<p align="center"><button class="btn btn_assign_badge" type="submit" name="btn_assign_badge">Assign</button></p>
</form>
<script type="text/javascript" src="<?php echo $this->base;?>js/metro/metro-calendar.js"></script>
<script type="text/javascript" src="<?php echo $this->base;?>js/metro/metro-datepicker.js"></script>
<script type="text/javascript" src="<?php echo $this->base;?>js/metro/metro.min.js"></script>
<script>
	$("#badge_date, #badge_expiry_date").datepicker({
		// set init date //
			format: "yyyy-mm-dd", // set output format
			effect: "fade", // none, slide, fade
			position: "bottom", // top or bottom,
		// 'ru' or 'en', default is $.Metro.currentLocale
	});
	$('.badgedate,.badgeexpirydate').css('cursor', 'pointer');
	$('.frm_assign_badge').submit(function(){
		$.ajax({
			url: js_base_path+'ajax/ajaxAssignBadgeModal',
			async: false,
			type: 'post', 
			data: $('.frm_assign_badge').serialize(),
			success: function(output) {
				alert( "D.R.O.T successfully assigned" );
				window.location.href = js_base_path+"admin/badges";
				return false;
			}, 
			error: function(errMsg) {
				alert( errMsg.responseText );
				return false;
			}
		});
	});
</script>
