<?php $this->load->view('frontend/signup_header');
?>
<div class="metro signup">
    <!--BEGIN PAGE TITLE-->
    <div class="container-fluid">
        <div class="main-content padding-metro-header subheader-secondary clearfix fg-grayLighter">
        <em class="margin20">USER PROFILE SETTINGS</em>
        </div>
    </div>
    <!--END PAGE TITLE-->
    <div class="container-fluid padding-metro-home right">
        <div class="row-fluid" >
        <div class="tile quadro triple-vertical bg-black" id="id_signup_success" style="height:auto;">        	
            <form class="padding20 signfrm" id="frm_signup" name="frm_signup" method="post" action="">
				<fieldset>
					<!--legend>Type your personal information</legend-->
					<div style="margin-bottom:10px;" id="id_div_email"></div>
					<div style="margin-bottom:10px;" id="id_div_signup_errors" class="fg-red"></div>
					<?php
					if( "8"==$usertype_id ) {?>
						<div class="input-control text" data-role="input-control">
							<input id="companyname" name="companyname" value="<?php echo $this->input->post('companyname');?>"  type="text" placeholder="Company Name" required />
						</div>
						<div class="input-control text" data-role="input-control">                                        
							<input id="companyfulladdress" name="companyfulladdress" value="<?php echo $this->input->post('companyfulladdress');?>" class="" type="text" placeholder="Company Full Address" />
						</div>
						<?php 
					}?>
					<div class="input-control text" data-role="input-control">
						<input id="firstname" name="firstname" value="<?php echo $this->input->post('firstname');?>"  type="text" placeholder="First Name" required />
					</div>
					<div class="input-control text" data-role="input-control">                                        
						<input id="lastname" name="lastname" value="<?php echo $this->input->post('lastname');?>" class="" type="text" placeholder="Last Name" required />
					</div>
					<div class="input-control text" data-role="input-control">
						<input id="email" name="email" type="email" value="<?php echo $this->input->post('email');?>" class="" placeholder="Email" required />
					</div>
					<div class="input-control text" data-role="input-control">
						<input id="reemail" name="reemail" value="<?php echo $this->input->post('reemail');?>" type="email" class="" type="text" placeholder="Confirm Email" required />
					</div>
					<?php
					if( "8"!=$usertype_id ) {?>
						<div class="input-control text" data-role="input-control">
							<input id="nickname" name="nickname" value="<?php echo $this->input->post('nickname');?>" class="input-xlarge" type="text" placeholder="Nickname" required />
						</div>
						<?php 
					}?>
					<div class="input-control password" data-role="input-control">
						<input id="password" name="password" value="<?php echo $this->input->post('password');?>" type="password" class="" placeholder="Password" required/>
					</div>
					<div class="input-control password" data-role="input-control">
						<input id="confirmpassword" name="confirmpassword" value="<?php echo $this->input->post('confirmpassword');?>" type="password" class="" placeholder="Confirm Password" required/>
					</div>
                    <label class="checkbox">
                            <p class="fg-red">* Your password must be at least 8 characters long, and contains at least one digit, one uppercase letter and one lowercase letter</p> 
                        </label>

                    <div class="input-control checkbox fg-white">
                        <label class="checkbox">
                            <input type="checkbox"  id="terms_checkbox"/>
                            <span class="check"></span>
                             I agree with the 
                            <a href='#modal_terms' data-toggle='modal' title="Terms of Use" class="fg-red">Terms of Use</a> 
                            and 
                            <a href='#modal_privacy_policy' data-toggle='modal' title="Privacy Policy" class="fg-red">Privacy Policy</a>
                        </label>
                        
                    </div>

					<div class="text-right">
						<div style=" display:inline	" class="fg-white">* - required fields</div>
						<button class="image-button danger half-opacity" disabled="disabled" type="submit" id="btn_terms" name="submit" value="Submit">Submit<i class="icon-forward bg-red"></i></button>
						<button class="image-button bg-gray fg-white" onclick="resetForm('id_div_email');" type="button" name="reset" value="Reset">Reset<i class="icon-undo bg-steel"></i></button>
						
						<input type="hidden" name="action" value="SIGNUP" />
						<input type="hidden" name="industry_id" value="<?php echo $industry_id;?>" />
						<input type="hidden" name="type_id" value="<?php echo $usertype_id;?>" />
					</div>
				</fieldset>
			</form>
            </div>
        </div>
    </div>
</div>

<!--********************* BEGIN MODAL TERMS OF USE ******************* -->
<?php $this->load->view('frontend/modal_terms_of_use'); ?>                        
<!--********************* END MODAL TERMS OF USE ******************* -->	

<!--********************* BEGIN MODAL PRIVACY POLICY ******************* -->
<?php $this->load->view('frontend/modal_privacy_policy'); ?>                        
<!--********************* END MODAL PRIVACY POLICY ******************* -->


<script type="text/javascript">
//code for terms and conditions
  $('#terms_checkbox').click(function () {
	  if($('#terms_checkbox').prop('checked'))
	  {
		  $('#btn_terms').removeClass('half-opacity');
		  $('#btn_terms').removeAttr('disabled');
	  }
	  else
	  {
		  $('#btn_terms').attr('disabled','disabled');
		  $('#btn_terms').addClass('half-opacity');
	  };
    
});

$.fn.clearForm = function() {
	return this.each(function() {
	    var type = this.type, tag = this.tagName.toLowerCase();
  	  	if (tag == 'form') {
			return $(':input',this).clearForm();
		}

		if (type == 'text' || type == 'password' || type == 'email' || tag == 'textarea') {
      		this.value = '';
		}
		else if ( type == 'radio') {
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
	if( isset($signup) && $signup=="SIGNUP" ) {?>
		$("#id_div_email").html('<label class="bg-error" for="email"><?php echo lang('msg_email_already_taken');?></label>');
		<?php 
	}
	if( isset($message) && $message ) {?>
		$('#id_signup_success').html('<label class="fg-grayLighter"><?php echo $message;?></label>');
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
			error.appendTo('#id_div_signup_errors');
		}
	});
	
	$('#frm_signup').validate({
		rules: {
			companyname: {
			  required: true
			},
			firstname: {
			  required: true
			},
			lastname: {
			  required: true
			},
			email: {
			  required: true,
			  email: true
			},
			reemail: {
				required: true,
				equalTo: "#email"
			},
			nickname: {
			  required: true
			},
			password: {
				required: true,
				minlength: 8,
				strongPassword: true,
			},
			confirmpassword: {
				required: true,
				minlength: 8,
				equalTo: "#password",
			}
		},
		messages: {
			companyname: {
				required: "<?php echo lang('msg_enter_companyname');?>"
			},
			firstname: {
				required: "<?php echo lang('msg_enter_firstname');?>"
			},
			lastname: {
				required: "<?php echo lang('msg_enter_lastname');?>"
			},
			email: {
				required: "<?php echo lang('msg_enter_email');?>",
				email: "<?php echo lang('msg_valid_email');?>"
			},
			reemail: {
				required: "<?php echo lang('msg_enter_confirm_email');?>",
				email: "<?php echo lang('msg_valid_confirm_email');?>",
				equalTo: "<?php echo lang('msg_enter_same_email');?>"
			},
			nickname: {
				required: "<?php echo lang('msg_enter_nickname');?>"
			},
			password: {
				required: "<?php echo lang('msg_provide_password');?>",
				minlength: "<?php echo lang('msg_password_length');?>"
			},
			confirmpassword: {
				required: "<?php echo lang('msg_provide_confirm_password');?>",
				minlength: "<?php echo lang('msg_password_length');?>",
				equalTo: "<?php echo lang('msg_enter_same_password');?>"
			},
		},
		highlight: function(element) {
			$('label').addClass('fg-red')
			//$('label').addClass('bg-red')
			//$('label').addClass('text-center')
		},
	});
	
	
});
</script>

<?php $this->load->view('frontend/signup_footer'); ?>