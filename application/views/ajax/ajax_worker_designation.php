<form class="form-horizontal frm_worker_designation" method="post" action="<?php echo $this->base."ajax/multiconnect_connection";?>">
	<?php 
	foreach( $arrWorkers AS $key => $val) { ?>
		<h5>Worker: <?php echo $val['worker_name']?></h5>
		<div class="control-group">
			<label class="control-label">My Worker</label>
			<div class="controls">
				<label class="radio inline"><input type="radio" name="<?php echo $val['worker_id'];?>[my_worker]" value="y"> Y</label> 
				<label class="radio inline"><input type="radio" name="<?php echo $val['worker_id'];?>[my_worker]" checked value="n"> N</label>
			</div>
		</div>
		<?php 
		if( "12" == $this->sess_usertype ) {?>
			<div class="control-group">
				<label class="control-label">My Worker Instructor</label>
				<div class="controls">
					<label class="radio inline" id="yes_worker_instructor"><input type="radio" name="<?php echo $val['worker_id'];?>[consultant_instructor]" value="y"> Y</label> 
					<label class="radio inline" id="no_worker_instructor"><input type="radio" name="<?php echo $val['worker_id'];?>[consultant_instructor]" checked value="n"> N</label>
					<br>
					<input id="instructor_pwd" style="display:none;" name="instructor_pwd" value="" type="password" class="input-large" placeholder="Password"/>
				</div>
			</div>
		<?php
		}?>
		<div class="control-group">
			<label class="control-label">First Aider</label>
			<div class="controls">
				<label class="radio inline"><input type="radio" name="<?php echo $val['worker_id'];?>[first_aider]" value="y"/> Y</label>
				<label class="radio inline"><input type="radio" name="<?php echo $val['worker_id'];?>[first_aider]" checked value="n"/> N</label>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">H&S REP</label>
			<div class="controls">
				<label class="radio inline"><input type="radio" name="<?php echo $val['worker_id'];?>[hsrep]" value="y"/> Y</label>
				<label class="radio inline"><input type="radio" name="<?php echo $val['worker_id'];?>[hsrep]" checked value="n"/> N</label>
			</div>
		</div>
		<div class="control-group">		
			<label class="control-label">JHSC</label>
			<div class="controls">
			<label class="radio inline"><input type="radio" name="<?php echo $val['worker_id'];?>[jhsc]" value="y"/> Y</label>
			<label class="radio inline"><input type="radio" name="<?php echo $val['worker_id'];?>[jhsc]" checked value="n"/> N</label>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Supervisor</label>
			<div class="controls">
			<label class="radio inline"><input type="radio" name="<?php echo $val['worker_id'];?>[supervisor]" value="y"/> Y</label>
			<label class="radio inline"><input type="radio" name="<?php echo $val['worker_id'];?>[supervisor]" checked value="n"/> N</label>
			</div>
		</div>
		<input type="hidden" name="<?php echo $val['worker_id'];?>[connect_status]" value="<?php echo $val['connect_status'];?>">
		<?php
	}?>
	<div class="inline text-center"><button class="btn btn-primary">Save</button></div>
	<input type="hidden" name="page" value="myworkers">
</form>

<script>
$("#yes_worker_instructor").click(function() {
	$("#instructor_pwd").show();
});
$("#no_worker_instructor").click(function() {
	$("#instructor_pwd").hide();
});
	$.validator.addMethod("alphanumeric", function(value, element) {
		return this.optional(element) || /^\w+$/i.test(value);
	}, "Password must be Letters or Numbers.");
	$('.frm_worker_designation').validate({
		rules: {
			instructor_pwd: {
				required: true, 
				minlength: 4, 
				maxlength: 6, 
				alphanumeric: true
			}
		}, 
		messages: {
			instructor_pwd: {
				required: "Please enter Password.", 
				minlength: "Password should not be less than 4 and more than 6 characters.", 
				maxlength: "Password should not be less than 4 and more than 6 characters.",
			}
		}
	});
</script>