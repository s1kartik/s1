<?php $this->load->view('frontend/signup_header'); ?>

<div class="metro ">
    <!--BEGIN PAGE TITLE-->
    <div class="container-fluid">
        <div class="main-content padding-metro-header subheader-secondary clearfix fg-grayLighter">
        <em class="margin20">Change Password</em>
        </div>
    </div>
    <!--END PAGE TITLE-->
    <div class="container-fluid padding-metro-home right">
        <div class="row-fluid" >
			<div class="tile quadro triple-vertical bg-black" id="id_div_changepwd_success">
            <form class="padding20 frm_changepwd" id="frm_changepwd" name="frm_changepwd" method="post" action="">
				<fieldset>
					<div id="id_div_changepwd_errors"></div>
					<div class="input-control password" data-role="input-control">
						<input id="password1" name="password1" type="password" placeholder="Enter New Password" required/>
					</div>
					<div class="input-control password" data-role="input-control">
						<input id="password2" name="password2" type="password" placeholder="Enter Confirm Password" required/>
					</div>
					<div class="text-right">
					<label class="checkbox text-left">
                            <p class="fg-red"><strong>* Your password must be at least 8 characters long, and contains at least one digit, one uppercase letter and one lowercase letter</strong></p> 
                        </label>

						<div style=" display:inline	" class="fg-white">* - required fields</div>
						<button class="image-button danger" type="submit" name="submit" value="Submit">Submit<i class="icon-forward bg-red"></i></button>
						<button class="image-button bg-gray fg-white" onclick="resetForm();" type="button" name="reset" value="Reset">Reset<i class="icon-undo bg-steel"></i></button>
						<input type="hidden" name="action" value="UPDATEPASSWORD" />
						<input type="hidden" name="hidn_from_admin" value="<?php echo $from_admin;?>" />
						<input type="hidden" name="hidn_email_addr" value="<?php echo (isset($user))?$user['email_addr']:0;?>" />
						<input type="hidden" name="userid" value="<?php echo (isset($user))?$user['id']:0;?>" />
					</div>
				</fieldset>
			</form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
$.fn.clearForm = function() {
	return this.each(function() {
	    var type = this.type, tag = this.tagName.toLowerCase();
  	  	if (tag == 'form') {
			return $(':input',this).clearForm();
		}

		if (type == 'text' || type == 'password' || type == 'email' || tag == 'textarea') {
      		this.value = '';
		}
		else if (type == 'checkbox' || type == 'radio') {
      		this.checked = false;
		}
    	else if (tag == 'select') {
      		this.selectedIndex = 0;
		}
  		});
};

function resetForm( idDiv )
{
	$("#"+idDiv).html("");
	$('form').clearForm();
}

$(document).ready(function () {
	<?php
	if( isset($message) && $message ) {?>
		$('#id_div_changepwd_success').html('<label class="fg-grayLighter"><?php echo $message;?></label>');
	<?php 
	}?>

	$.validator.addMethod(
		'strongPassword',
		function (value) { 
			var lowercase = /[a-z]/
			var uppercase = /[A-Z]/
			var numeric = /[0-9]/
			
			return lowercase.test(value) && uppercase.test(value) && numeric.test(value);
		},  
		'<?php echo lang('msg_validate_password');?>'
	);
	
	$.validator.setDefaults({
		errorPlacement: function(error, element) {
			error.appendTo('#id_div_changepwd_errors');
		}
	});
	
	
	$('#frm_changepwd').validate({
		highlight: function(element) {
			$('label').addClass('fg-darkRed')
			// $('label').addClass('mart10')
		}, 
		rules: {
			password1: {
				required: true,
				minlength: 8,
				strongPassword: true,
			},
			password2: {
				required: true,
				minlength: 8,
				equalTo: "#password1",
			}
		},
		messages: {
			password1: {
				required: "<?php echo lang('msg_provide_password');?>"
			},
			password2: {
				required: "<?php echo lang('msg_provide_confirm_password');?>."
			}
		}
	});
});
</script>
<?php $this->load->view('frontend/signup_footer'); ?>

