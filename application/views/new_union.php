<?php $this->load->view('header_admin');
if(isset($unionmeta)) {
    $usermeta = $unionmeta;
}
?>
<div class="info-container">
    <div class="document-content">
    <form class="form-horizontal frm_new_union" id="frm_new_union" method="post" enctype="multipart/form-data" action="">
    <fieldset>
    <!-- Form Name -->
    <legend>Union Account</legend>
    <!-- Text input-->
    <div class="control-group">
        <!-- Text input-->
    <div class="control-group">
      <label class="control-label" for="firstname">First Name</label>
      <div class="controls">
        <input id="firstname" name="firstname" type="text" placeholder="First Name" class="input-xlarge required"/>
      </div>
    </div>
    <!-- Text input-->
    <div class="control-group">
      <label class="control-label" for="lastname">Last Name</label>
      <div class="controls">
        <input id="lastname" name="lastname" type="text" placeholder="Last Name" class="input-xlarge required"/>
      </div>
    </div>
      <label class="control-label" for="email">Email</label>
      <div class="controls">
        <input id="email" name="email" type="email" placeholder="Email" class="input-xlarge required"/>
      </div>
    </div>
    <!-- Text input-->
    <div class="control-group">
      <label class="control-label" for="nickname">Nickname</label>
      <div class="controls">
        <input id="nickname" name="nickname" type="text" placeholder="nickname" class="input-xlarge required"/>
      </div>
    </div>
    
    <div class="control-group">
      <label class="control-label" for="nickname">Industry</label>
      <div class="controls">
        <select id="industry_id" name="industry_id" class="input-xlarge" required>
            <option value="">Select Industry</option>
            <?php
                $industries = $this->users->getMetaDataList('industry');
                foreach($industries as $in):
            ?>
            <option value="<?php echo $in['id'];?>"><?php echo $in['industryname'];?></option>
            <?php endforeach;?>
        </select>
      </div>
    </div>    

    <!-- Password input-->
    <div class="control-group">
      <label class="control-label" for="password">Password</label>
      <div class="controls">
        <input id="password" name="password" type="password" placeholder="Password" class="input-xlarge required"/>
      </div>
    </div>
    <!-- Password input-->
    <div class="control-group">
      <label class="control-label" for="confirmpassword">Confirm Password</label>
      <div class="controls">
        <input id="confirmpassword" name="confirmpassword" type="password" placeholder="Confirm Password" class="input-xlarge required"/>
      </div>
    </div>
	
	<div class="control-group">
		<label class="control-label">Training Centre</label>
		<div class="controls">
			<?php $training_selected = (isset($usermeta['union_training_centre']) && $usermeta['union_training_centre']) ? 'checked="checked"' : '';?>
			<input type="checkbox" <?php echo $training_selected;?> name="union_training_centre" id="union_training_centre" />
		</div>
	</div>
	
	<?php 
	$rows_unions 		= $this->users->getMetaDataList('user', 'type_id=7 AND status=1', '', 'id, nickname');
	$data['rows_unions']= $rows_unions;
	?>
	<div id="id_unions">
		<div class="control-group">
			<label class="control-label" for="parent_unions">Select Parent Union</label>
			<div class="controls">
				<select name="parent_unions[]" id="parent_unions" multiple>
					<?php 
					foreach( $rows_unions AS $val_unions ) {
						$union_training = $this->users->getMetaDataList('usermeta', 'user_id="'.$val_unions['id'].'" AND meta_key="union_training_centre"', '', 'meta_value');
						$union_training = isset($union_training[0]['meta_value']) ? $union_training[0]['meta_value'] : '';
						if( !$union_training ) {
							$selected = in_array($val_unions['id'], explode(",", $usermeta['parent_unions']))?'selected="selected"':'';
							?>
							<option value="<?php echo $val_unions['id'];?>" <?php echo $selected;?>><?php echo $val_unions['nickname'];?></option>
							<?php 
						}
					}?>
				</select>
			</div>
		</div>
		<div class="control-group">
		  <label class="control-label" for="campus_name">Campus Name</label>
		  <div class="controls">
			<input id="campus_name" name="campus_name" type="text" placeholder="Campus Name" value="<?php echo isset($usermeta['campus_name'])?$usermeta['campus_name']:"";?>" class="input-xlarge"/>
		  </div>
		</div>
	</div>
	
    <div class="inline text-center">
    <input type="submit" name="submit" value="Next" class="btn btn-primary btn-validate-date" />
    <input type="hidden" name="action" value="ACCOUNT" />
    <input type="hidden" name="type_id" value="7" />
    <input type="reset" name="reset" value="Reset" class="btn" />
    </div>
    </fieldset>
    </form>
    </div>
	
	
    <script type="text/javascript">
		$(document).ready(function () {
			var union_training_centre = '<?php echo isset($usermeta['union_training_centre']) ? $usermeta['union_training_centre'] : '';?>';
			(union_training_centre) ? $("#id_unions").show() : $("#id_unions").hide();		

			$("#union_training_centre").click(function() {
				if( $("#union_training_centre").is(':checked')) {
					$("#id_unions").show();
				}
				else {
					$("#union_training_centre").val('');
					$("#campus_name").val('');
					$("#parent_unions").val('');
					$("#id_unions").hide();
				}
			});
			
			$('input[name=email]').change(function(){
				obj = $(this);
				$.post(
						'<?php echo $base;?>admin/getUserByID',
						{'email': "'"+$(this).val()+"'"},
						function(data)
						{
							if(data==true) {
								if(obj.parent().children('label').size()<1)
									obj.parent().append('<label class="error" for="email">This email address is already taken.</label>')
							}else{
								obj.parent().children('label').remove();
							}
						}
				);   
			})
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
			$('#frm_new_union').validate({
				rules: {
					email: {
					  required: true,
					  email: true
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
						required: "Please enter your email address.",
						email: "Please enter a valid email address."
					},
					nickname: {
						required: "Please enter your nickname."
					},
					password: {
						required: "Please provide a password",
						minlength: "Your password must be at least 8 characters long"
					},
					confirmpassword: {
						required: "Please provide a password",
						minlength: "Your password must be at least 8 characters long",
						equalTo: "Please enter the same password as above"
					}
				}
			});
		});
    </script>    
</div>    
<?php $this->load->view('footer_admin'); ?>