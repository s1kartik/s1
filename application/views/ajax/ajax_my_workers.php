<form class="form-horizontal adminfrm frm_my_workers" method="post" action="<?php echo $this->base;?>admin/profile_setting?section=myworker">
	<!-- Text input-->
	<?php
	$worker_firstname 	= isset($worker['firstname']) ? $worker['firstname'] : '';
	$worker_lastname 	= isset($worker['lastname']) ? $worker['lastname'] : '';
	$worker_id 			= isset($worker['id']) ? $worker['id'] : '';
	?>
	<div class="control-group">
		<label class="control-label"><img src="<?php if(empty($worker['profile_image'])):?><?php echo $this->base;?>img/default.png<?php else:?><?php echo $this->base.$this->path_upload_profiles.$worker['profile_image'];?><?php endif;?>" rel="" style="width: 100px;"/></label>
		<div class="controls"><label><span class="lead"><?php echo $worker_firstname.' '.$worker_lastname;?></span></</label></div>
	</div>
	<!-- Multiple Radios (inline) -->
	<div class="control-group cls_div_myworker">
		<label class="control-label">My Worker</label>
		<div class="controls">
			<label class="radio inline" id="my_worker_y"><input type="radio" name="my_worker" class="rdb_my_worker_y" value="y" <?php if(isset($workermeta['my_worker']) && $workermeta['my_worker']=="y"):?>checked="checked"<?php endif;?> /> Y</label>
			<label class="radio inline" id="my_worker_n"><input type="radio" name="my_worker" class="rdb_my_worker_n" value="n" <?php if(!isset($workermeta['my_worker']) || $workermeta['my_worker']=="n"):?>checked="checked"<?php endif;?> /> N</label>
		</div>
	</div>
	<?php 
	if( "12" == $this->sess_usertype ) {?>
		<div class="control-group">
			<label class="control-label">Consultant Instructor</label>
			<div class="controls">
				<label class="radio inline" id="yes_worker_instructor"><input type="radio" name="consultant_instructor" value="y" <?php if(isset($workermeta['consultant_instructor']) && $workermeta['consultant_instructor']=="y"):?>checked="checked"<?php endif;?> /> Y</label>
				<label class="radio inline" id="no_worker_instructor"><input type="radio" name="consultant_instructor" value="n" <?php if(isset($workermeta['consultant_instructor']) && $workermeta['consultant_instructor']=="n"):?>checked="checked"<?php endif;?> /> N</label><br>
				<input id="instructor_pwd" style="display:none;" name="instructor_pwd" value="" type="password" class="input-large" placeholder="Password"/><br>
				<input id="confirm_instructor_pwd" style="display:none;" name="confirm_instructor_pwd" value="" type="password" class="input-large" placeholder="Confirm Password" required/>
			</div>
		</div>
		<?php
	}

	if( "7" == $this->sess_usertype ) {?>
		<div class="control-group">
			<label class="control-label">Union Instructor</label>
			<div class="controls">
				<label class="radio inline" id="yes_union_instructor"><input type="radio" name="union_instructor" value="y" <?php if(isset($workermeta['union_instructor']) && $workermeta['union_instructor']=="y"):?>checked="checked"<?php endif;?> /> Y</label> 
				<label class="radio inline" id="no_union_instructor"><input type="radio" name="union_instructor" value="n" <?php if(!isset($workermeta['union_instructor']) || $workermeta['union_instructor']!="y"):?>checked="checked"<?php endif;?> /> N</label>
				<br>
				<input id="instructor_pwd" style="display:none;" name="instructor_pwd" value="" type="password" class="input-large" placeholder="Password"/>
				<input id="confirm_instructor_pwd" style="display:none;" name="confirm_instructor_pwd" value="" type="password" class="input-large" placeholder="Confirm Password" required/>
			</div>
		</div>
		<?php 
	}?>
	<div class="control-group">
		<label class="control-label">H&S REP</label>
		<div class="controls">
			<label class="radio inline"><input type="radio" name="hsrep" value="y" <?php if(isset($workermeta['hsrep']) && $workermeta['hsrep']=="y"):?>checked="checked"<?php endif;?> /> Y</label> 
			<label class="radio inline"><input type="radio" name="hsrep" value="n" <?php if(!isset($workermeta['hsrep']) || $workermeta['hsrep']!="y"):?>checked="checked"<?php endif;?> /> N</label>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label">JHSC</label>
		<div class="controls">
			<label class="radio inline"><input type="radio" name="jhsrep" value="y" <?php if(isset($workermeta['jhsrep']) && $workermeta['jhsrep']=="y"):?>checked="checked"<?php endif;?> /> Y</label>
			<label class="radio inline"><input type="radio" name="jhsrep" value="n" <?php if(!isset($workermeta['jhsrep']) || $workermeta['jhsrep']!="y"):?>checked="checked"<?php endif;?> /> N</label>
		</div>
	</div><!-- Multiple Radios (inline) -->
	<div class="control-group">
		<label class="control-label">Supervisor</label>
		<div class="controls">
			<label class="radio inline"><input type="radio" name="supervisor" value="y" <?php if(isset($workermeta['supervisor']) && $workermeta['supervisor']=="y"):?>checked="checked"<?php endif;?> /> Y</label> 
			<label class="radio inline"><input type="radio" name="supervisor" value="n" <?php if(!isset($workermeta['supervisor']) || $workermeta['supervisor']!="y"):?>checked="checked"<?php endif;?> /> N</label>
		</div>
	</div>
	<div class="inline text-center">
		<button class="btn btn-primary">Save</button>
		<button type="button" class="btn btn-danger" onclick="javascript:window.location.href='<?php echo $this->base.'admin/'.$redirect_to;?>';">Cancel</button>
		<button href='#modal_worker_id_card' class="btn-myworkers bg-red fg-white" data-toggle='modal' onclick="javascript:ajaxMyIDCard('<?php echo $worker_id;?>', '', '<?php echo $connect_status;?>');" data-toggle='modal'><b>My ID Card</b></button>
		<input type="hidden" name="userid" value="<?php echo $worker_id;?>" />
		<input type="hidden" name="page_redirect" value="<?php echo $redirect_to;?>"/>
		<input type="hidden" name="page" value="myworkers"/>
		<input type="hidden" name="page_design" value="metro"/>
	</div>
</form>

<script type="text/javascript">
$("#yes_union_instructor").click(function() {
	$("#instructor_pwd").show();
	$("#confirm_instructor_pwd").show();
});
$("#no_union_instructor").click(function() {
	$("#instructor_pwd").val("");
	$("#instructor_pwd").hide();
	$("#confirm_instructor_pwd").val("");
	$("#confirm_instructor_pwd").hide();
});

$("#yes_worker_instructor").click(function() {
	$("#instructor_pwd").show();
	$("#confirm_instructor_pwd").show();
});
$("#no_worker_instructor").click(function() {
	$("#instructor_pwd").val("");
	$("#instructor_pwd").hide();
	$("#confirm_instructor_pwd").val("");
	$("#confirm_instructor_pwd").hide();
});

// $access_for_training = $this->users->checkUnionIsInstructorsUnion($union['id']);


$.validator.addMethod("alphanumeric", function(value, element) {
	return this.optional(element) || /^\w+$/i.test(value);
}, "Password must be Letters or Numbers.");
$('.frm_my_workers').validate({
	rules: {
		instructor_pwd: {
			required: true, 
			minlength: 4, 
			maxlength: 6, 
			alphanumeric: true
		}, 
		confirm_instructor_pwd: {
			equalTo: "#instructor_pwd"
		}
	}, 
	messages: {
		instructor_pwd: {
			required: "Please enter Instructor Password.", 
			minlength: "Instructor Password should not be less than 4 and more than 6 characters.", 
			maxlength: "Instructor Password should not be less than 4 and more than 6 characters.",
		}, 
		confirm_instructor_pwd: {
			required: "Please enter Confirm Instructor Password.", 
			equalTo: "Please enter same Instructor Password."
		}
	}
});


$(document).ready(function() {	
	var is_myworker = '<?php echo isset($workermeta['my_worker'])&&$workermeta['my_worker'] ? $workermeta['my_worker'] : '';?>';
	if( is_myworker=="" || "n"==is_myworker ) { // Disable preceding designations if connections is new or myworker set as "n" //
		$("input[type='radio']").parent().parent().parent("div:not(.cls_div_myworker)").hide();
		$("input[type='radio']:checked").val("n");
	}
});

$(document).on('click', '#my_worker_n', function() {
	$("input[type='radio']:checked").val("n");
	// $("input[type='radio']").val("n").prop('checked',true);
	$("input[type='radio']").parent().parent().parent("div:not(.cls_div_myworker)").hide();
});

$(document).on('click', '#my_worker_y', function() {
	var user_type = '<?php echo $this->sess_usertype;?>';
	if( "7" == user_type ) {
		$.post('<?php echo $this->base;?>ajax/checkIfMyUnion', {'user_id':'<?php echo $worker_id;?>','union_id':'<?php echo $this->sess_userid;?>'}, function(data){
			if( data.trim() !== '' ) {
				alert(data);
				$("input[name=my_worker][value='n']").prop("checked",true);
				return false;
			}
			else {
				$("input[type='radio']").parent().parent().parent().show();
			}
		});
	}
	else {
		$("input[type='radio']").parent().parent().parent().show();
	}
});
</script>