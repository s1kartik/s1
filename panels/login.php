<h1>LOGIN</h1>
<?php 
set_include_path("../");
/*Include sidebar */
include("inc/sidebar.php");
$request_uri = explode("panels",$_SERVER['REQUEST_URI']);
$request_uri = $request_uri[0];
?>
<form class="form-inline frm_login" id="frm_login" method="post" action="" name="frm_login" >
	<input type="text" onkeydown="javascript: (event.keyCode==13) ? checkEmailExists('login') : '';" name="login" id="login" class="input-medium" placeholder="Email" required style="font-size:15px;font-weight:bold;width:70%;" />
	<input type="password" onkeydown="javascript: (event.keyCode==13) ? checkEmailExists('login') : '';" name="password" id="password" class="input-medium" placeholder="Password" required style="font-size:15px;font-weight:bold;width:70%;"/>
    
	<div id="id_div_login"></div>
	<button type="button" onclick="javascript:checkEmailExists('login');" class="btn-info btn" style="font-size:14px;font-weight:bold;">Log in</button>
	<input type="hidden" name="action" value="SIGNIN" />
</form>

<div class="metro-accordion">
<br>
	<button type="button" onclick="location.href='<?php echo $request_uri;?>?signup=industry';" class="redButton" style="font-size:20px;font-weight:bold;">NEW USER SIGN UP!</button>
	<h3>forgot password?</h3>
	<div id="forgotModal" class="modal">
		<form class="frm_forgot_pwd" id="frm_forgot_pwd" method="post">
			<div class="modal-body" id="id_forgot_pwd">
				<fieldset>
					<em>Email*</em>
					<input class="input-xlarge" id="email_addr" name="email_addr" type="text" placeholder="" required />									
					<div id="id_div_forgot_pwd"></div>
					<div class="text-right">
						<div style=" display:inline	">* - required fields</div>
						<button type="button" onclick="javascript:checkEmailExists('forgot_pwd');" class="btn btn-info">Submit</button>
						<input type="hidden" name="action" value="RESETPASSWORD" />
					</div>
				</fieldset>
			</div>
		</form>
	</div>
	<!--h3>get sign up email</h3>
	<div id="confirm_signupModal" class="modal">
		<form class="frm_confirm_signup" id="frm_confirm_signup" method="post">
			<div class="modal-body" id="id_confirm_signup">
				<fieldset>
					<em>Email*</em>
					<input class="input-xlarge" id="txt_confirm_signupemail" name="txt_confirm_signupemail" type="text" placeholder="" required />									
					<div id="id_div_confirm_signup"></div>
					<div class="text-right">
						<div style=" display:inline	">* - required fields</div>
						<button type="button" onclick="javascript:checkEmailExists('confirm_signup');" class="btn btn-info">Got it</button>
						<input type="hidden" name="action" value="CONFIRM_SIGNUP_EMAIL" />
					</div>
				</fieldset>
			</div>
		</form>
	</div-->
	<h3>Contact Us</h3>
	<div class="wrapper">
		<div class="row-fluid">
			<div class="span12">
					<div class="contact-details panel-login">
						<h5>Please email us any comments or concerns you may have.
						 We will answer your inquiries in a thorough and timely manner.
						Email: <a href="mailto:info@mys1s.ca">info@mys1s.ca</a></h5>    					
					</div><!-- end contact-details -->
				</div>
		</div>
		<div class="row-fluid">
			<div class="span12">
				<div class="copyright">
					<p>&copy; 2013 <strong>S1</strong>. All Rights Reserved.
					<a href="http://www.hrqsolutions.com/" target="_new"><img src="<?php echo $request_uri;?>img/hrq/signature.png" /></a></p>
				</div><!-- end copyright -->
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="js/jquery.validate.js"></script>
<script type="text/javascript">
$(document).ready(function () {
	$("#login").focus();
	
	$.validator.addMethod(
		'strongPassword',
		function (value) {
			var lowercase = /[a-z]/
			var uppercase = /[A-Z]/
			var numeric = /[0-9]/
			
			return lowercase.test(value) && uppercase.test(value) && numeric.test(value);
		},  
		'Your password must be at least 8 characters long, and contains at least one digit, one uppercase letter and one lowercase letter'
	);
	
	$('.frm_login').validate({
		highlight: function(element) {
			$('label').addClass('bg-error'),
			$("#id_div_login").html('')
		}, 
		rules: {
			login: {
			  required: true,
			  email: true
			}, 
			password: {
			  required: true, 
			  minlength: 8,
			  strongPassword: true
			}
		},
		messages: {
			login: {
				required: "Enter your email.",
				email: "Enter valid email."
			},
			password: {
				required: "Enter your password",
				minlength: "Your password must be at least 8 characters long"
			}
		}
	});

	$('.frm_forgot_pwd').validate({
		highlight: function(element) {
			$('label').addClass('bg-error'),
			$("#id_div_forgot_pwd").html('')
			// $('label').addClass('mart10')
		}, 
		rules: {
			email_addr: {
			  required: true,
			  email: true
			}
		},
		messages: {
			email_addr: {
				required: "Enter your email.",
				email: "Enter valid email."
			}
		}
	});
	
	$('.frm_confirm_signup').validate({
		highlight: function(element) {
			$('label').addClass('bg-error'),
			$("#id_div_confirm_signup").html('')
		}, 
		rules: {
			txt_confirm_signupemail: {
			  required: true,
			  email: true
			}
		}, 
		messages: {
			txt_confirm_signupemail: {
				required: "Enter your email.",
				email: "Enter valid email."
			}
		}
	});
});

function checkEmailExists(sectionName)
{
	if( true == $("#frm_"+sectionName).valid() ) {
		var request_uri = '<?php echo $request_uri;?>';
		var frmSerializeId = '#frm_'+sectionName;
		$.ajax({
			url: '?sendemail='+sectionName,
			type: 'post', 
			data: $(frmSerializeId).serialize()+'&section='+sectionName, 
			async: false, 
			success: function(output) {
				if( !isNaN(output) ) {
					var redirectUrl = (output==1) ? request_uri+"admin" : request_uri+"admin/dashboard";
					$("#frm_login").attr("action", redirectUrl);
					frm_login.submit();
				}
				else {
					$("#id_div_"+sectionName).html('<label class="bg-error">'+output+'</label>');
				}
				return false;
			},
			error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(xhr.statusText);
                alert(thrownError);
				return false;
            }
		});
	}
	else {
		$("#id_div_"+sectionName).html('');
	}
}

function enableForgot() {
	$("#forgotModal").show();
}
createAccordions();
</script>

