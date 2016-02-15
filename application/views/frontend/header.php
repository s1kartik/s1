<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta content="text/html;charset=utf-8" http-equiv="Content-Type" />
<meta content="utf-8" http-equiv="encoding" />
<title>S1 Integration Systems</title>
<link rel="icon" href="<?php echo "$base";?>img/favicon.png" type="image/png">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<link type="text/css" rel="stylesheet" href="<?php echo $base;?>css/futuraLT/futuraLT.css" media="screen" />
<link type="text/css" rel="stylesheet" href="<?php echo $base;?>css/bootstrap.css" media="screen" />
<link type="text/css" rel="stylesheet" href="<?php echo $base;?>css/bootstrap-responsive.css" media="screen" />
<link type="text/css" rel="stylesheet" href="<?php echo $base;?>css/main.css" media="screen" />
<link type="text/css" rel="stylesheet" href="<?php echo $base;?>css/print.css" media="print" />
<script type="text/javascript" src="<?php echo $base;?>js/jquery/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo $base;?>js/bootstrap.js"></script>
<script type="text/javascript" src="<?php echo $base;?>js/main.js"></script>
<script type="text/javascript" src="<?php echo $base;?>js/jquery.validate.js"></script>
<script type="text/javascript" src="<?php echo $base;?>js/zebra_datepicker.js"></script>
<link rel="stylesheet" href="<?php echo $base;?>css/datepicker.css" type="text/css">
</head>
<body id="bodyhrq" class="landing">
    <div id="splash-division1" class="navbar-division1">
        <div class="container-fluid" >
            <div class="wrapper">
                <div class="navbar navbar-inverse">
                    <div class="navbar-inner ">
                         <div class="row-fluid" >
                            <div class="span4 text-center"><a class="brand" href="#"><img src="<?php echo $base;?>img/s1logo.png" /></a></div>
                            <div class="span8 text-right">
                                <?php if(isset($textmsg) && !empty($textmsg)):?><div class="text-warning"><?php echo $textmsg;?></div><?php endif;?>
                                <form action="<?php echo $base;?>welcome" method="post" class="form-inline">
                                    <input type="text" name="login" class="input-medium" placeholder="Email" value="<?php echo isset($user_email)?$user_email:'';?>"/>
                                    <input type="password" name="password" class="input-medium" placeholder="Password"/>
                                    <button type="submit" class="btn-info btn">Log in</button>
                                    <input type="hidden" name="action" value="SIGNIN" />
                                </form>
                                <h6><a href="#forgotModal" data-toggle="modal">forgot password?</a>&nbsp;|&nbsp;<a href="#confirm_signupModal" data-toggle="modal">get sign up email</a></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="navbar-division2">
<div class="navbar-division-inner">
        <div class="container-fluid">
            <div class="wrapper">
               <div class="row-fluid ">
                    <div class="span12">
                        <div id="login-signup" class="pull-right">
                            <h4> New to S1?    <a href="#betaModal" data-toggle="modal" >Sign Up</a></h4>
                        </div>
                        <div id="betaModal" class="modal hide fade">
                            <div class="modal-header">
                                <button class="close" data-dismiss="modal">×</button>
                                <h3>Sign up to S1</h3>
                            </div>
                            <form class="signfrm" id="frm_signup" name="frm_signup" method="post" action="">
								<div class="modal-body">
									<fieldset>
										<input id="firstname" name="firstname" value="<?php echo $this->input->post('firstname');?>" class="input-xlarge" type="text" placeholder="First Name" required />
										<input id="lastname" name="lastname" value="<?php echo $this->input->post('lastname');?>" class="input-xlarge" type="text" placeholder="Last Name" required />
										<input id="email" name="email" type="email" value="<?php echo $this->input->post('email');?>" class="input-xlarge" placeholder="Email" required />
										<div id="id_div_email"></div>
										<input id="reemail" name="reemail" value="<?php echo $this->input->post('reemail');?>" type="email" class="input-xlarge" type="text" placeholder="Confirm Email" required />
										<input id="nickname" name="nickname" value="<?php echo $this->input->post('nickname');?>" class="input-xlarge" type="text" placeholder="Nickname" required />
										<!--<input class="input-xlarge" type="text" placeholder="Postal Code" />-->
										<select id="industry_id" name="industry_id" class="input-xlarge" required>
											<option value="">Select Industry</option>
											<?php 
											$selected = '';
											$industries = $this->users->getMetaDataList('industry');
											foreach($industries as $in):
											$selected = ($this->input->post('industry_id')==$in['id']) ? "selected=selected" : '';
											?>
											<option value="<?php echo $in['id'];?>" <?php echo $selected;?>><?php echo $in['industryname'];?></option>
											<?php endforeach;?>
										</select>
										<select id="type_id" name="type_id" class="input-xlarge" required>
											<option value="">Select User Type</option>
											<?php
												$selected = '';
												$types = $this->users->getMetaDataList('usertype', 'is_registrable>0');
												foreach($types as $in):
												$selected = ($this->input->post('type_id')==$in['id']) ? "selected=selected" : '';
											?>
											<option value="<?php echo $in['id'];?>" <?php echo $selected;?>><?php echo $in['typename'];?></option>
											<?php endforeach;?>
										</select>
										<input id="password" name="password" value="<?php echo $this->input->post('password');?>" type="password" class="input-xlarge" placeholder="Password" required/>
										<input id="confirmpassword" name="confirmpassword" value="<?php echo $this->input->post('confirmpassword');?>" type="password" class="input-xlarge" placeholder="Confirm Password" required/>
										<div class="text-right">
											<div style=" display:inline	">* - required fields</div>
											<input type="submit" name="submit" value="Submit" class="btn btn-info"/>
											<input type="button" onclick="resetForm('id_div_email');" name="reset" value="Reset" class="btn" />
											<input type="hidden" name="action" value="SIGNUP" />
										</div>
									</fieldset>
								</div>
                            </form>
                        </div>
						
                        <div id="forgotModal" class="modal hide fade">
                            <div class="modal-header">
                                <button class="close" data-dismiss="modal">×</button>
                                <h3>Password Recover</h3>
                            </div>
                            <form class="forgetfrm" id="frm_forgotpwd" method="post">
                            <div class="modal-body">
								<fieldset>
									<label>Email*</label>
									<input class="input-xlarge" id="email_addr" name="email_addr" type="text" placeholder="" required />									
									<div id="id_div_forgotemail"></div>
									<div class="text-right">
										<div style=" display:inline	">* - required fields</div>
										<button type="submit" class="btn btn-info">Submit</button>
										<input type="hidden" name="action" value="RESETPASSWORD" />
									</div>
								</fieldset>
                            </div>
                            </form>
                        </div>
						
						<div id="confirm_signupModal" class="modal hide fade">
                            <div class="modal-header">
                                <button class="close" data-dismiss="modal">×</button>
                                <h3>Confirmation Email</h3>
                            </div>
                            <form class="confirm_signupfrm" id="frm_confirm_signup" method="post">
                            <div class="modal-body">
								<fieldset>
									<label>Email*</label>
									<input class="input-xlarge" id="txt_confirm_signupemail" name="txt_confirm_signupemail" type="text" placeholder="" required />									
									<div id="id_div_confirm_signup"></div>
									<div class="text-right">
										<div style=" display:inline	">* - required fields</div>
										<button type="submit" class="btn btn-info">Got it</button>
										<input type="hidden" name="action" value="CONFIRM_SIGNUP_EMAIL" />
									</div>
								</fieldset>
                            </div>
                            </form>
                        </div>
						
                        <div id="changepassModal" class="modal hide fade">
                            <div class="modal-header">
								<button class="close" data-dismiss="modal">×</button>
								<h4>Create New Password</h4>
                            </div>
                            <form class="resetfrm" id="frm_reset" method="post" action="<?php echo $base;?>">
                                <div class="modal-body">
									<fieldset>
									  <label>Enter New Password</label>
									  <input id="password1" name="password1" class="input-xlarge" type="password" placeholder="">
									  <label>Confirm New Password</label>
									  <input id="password2" name="password2" class="input-xlarge" type="password" placeholder="">
									  <div class="text-right">
									  <input type="submit" name="submit" value="Submit" class="btn btn-info" />
										<input type="hidden" name="action" value="UPDATEPASSWORD" />
										<input type="hidden" name="hidn_from_admin" value="<?php echo $from_admin;?>" />
										<input type="hidden" name="hidn_email_addr" value="<?php echo (isset($user))?$user['email_addr']:0;?>" />
										<input type="hidden" name="userid" value="<?php echo (isset($user))?$user['id']:0;?>" />
									  </div>
									</fieldset>
									<?php 
									if( 1 == $from_admin ) { 
									?>
										<div class="text-left"><strong>After submit new password, system will activate your account.</strong></div>
									<?php 
									}?>
                                </div>
                            </form>
                        </div>
						
                        <div id="msgModal" class="modal hide fade">
                            <div class="modal-header">
                                <button class="close" data-dismiss="modal">×</button>
                                <h3>Message</h3>
                            </div>
                            <div class="modal-body">
                                <?php if(isset($message)){echo $message;}?>
                            </div>
                        </div>
                    </div>
                </div>
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
		if(isset($signup) && $signup=="SIGNUP") {?>
			$('#betaModal').modal('show');
			$("#id_div_email").html('<label class="error" for="email">This email address is already taken.</label>');
			
        <?php 
		}

		if(isset($reset) && $reset=="RESET") {?>
			$('#changepassModal').modal('show');
        <?php 
		}

		if(isset($recover) && $recover=="RECOVER") {?>
			$('#forgotModal').modal('show');
			$("#id_div_forgotemail").html('<label class="error" for="email_addr">This email address is not registered.</label>');
        <?php 
		}

		if(isset($confirm_signup) && $confirm_signup=="CONFIRM_SIGNUP") {?>
			$('#confirm_signupModal').modal('show');
			$("#id_div_confirm_signup").html('<label class="error" for="txt_confirm_signupemail">This email address does not match with your email.</label>');
        <?php 
		}
		
		if(isset($message)) {?>
			$('#msgModal').modal('show');
        <?php 
		}?>
		
		/*
		$(document).on('change', 'input[name=email_addr]', function(){
            obj = $(this);
            $.ajax({
				url: '<?php echo $base;?>admin/validateMetaData',
				type: 'post', 
				data: {'table': 'tbl_login_users', 'field': 'email_addr', 'value': $(this).val()},
				success: function(output)
				{
					if( output.trim() == '' ) {
						if(obj.parent().children('label').size()<1) {
							obj.parent().append('<label class="error" for="email">This email address is already taken.</label>');
						}
					}
					else {
						obj.parent().children('label').remove();
					}
				},
				error: function(errMsg)
				{
					alert( errMsg.responseText );
					return false;
				}
            });
        });
		*/
		
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
        $('#frm_forgotpwd').validate({
			rules: {
    		    email_addr: {
                  required: true,
                  email: true
                }
    		},
    		messages: {
    		    email_addr: {
                    required: "<?php echo lang('msg_enter_email');?>",
                    email: "<?php echo lang('msg_valid_email');?>"
                }
    		}
		});
		
		$('#frm_confirm_signup').validate({
			rules: {
    		    txt_confirm_signupemail: {
                required: true,
                email: true
                }
    		},
    		messages: {
    		    txt_confirm_signupemail: {
                    required: "<?php echo lang('msg_enter_confirm_email');?>",
                    email: "<?php echo lang('msg_valid_confirm_email');?>"
                }
    		}
		});

        $('#frm_reset').validate({
    		rules: {
    			password1: {
    				required: true,
    				minlength: 8,
                    strongPassword: true,
    			},
    			password2: {
    				required: true,
    				minlength: 8,
    				equalTo: "#password1"
    			}
    		},
    		messages: {
    			password1: {
    				required: "<?php echo lang('msg_provide_password');?>",
    				minlength: "<?php echo lang('msg_password_length');?>"
    			},
    			password2: {
    				required: "<?php echo lang('msg_provide_confirm_password');?>",
    				minlength: "<?php echo lang('msg_password_length');?>",
    				equalTo: "<?php echo lang('msg_enter_same_password');?>"
    			}
    		}
    	});        	   
        $('#frm_signup').validate({
    		rules: {
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
    				equalTo: "#password"
    			}
    		},
    		messages: {
    		    email: {
                    required: "<?php echo lang('msg_enter_email');?>",
                    email: "<?php echo lang('msg_valid_email');?>"
                },
    			reemail: {
    				required: "<?php echo lang('msg_enter_confirm_email');?>",
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
    			}
    		}
    	});
    });
    </script>    
