<?php 
$this->load->view('header_admin');
(isset($unionmeta)) ? $usermeta = $unionmeta : '';

if($_SERVER['REQUEST_METHOD']=='POST'){
	$usermeta['union_training_centre'] 	= (isset($_POST['union_training_centre']) && $_POST['union_training_centre']) ? $_POST['union_training_centre'] : '';
	$usermeta['parent_unions'] 			= (isset($_POST['parent_unions']) && $_POST['parent_unions']) ? implode(",",$_POST['parent_unions']) : '';
	$usermeta['campus_name'] 			= (isset($_POST['campus_name']) && $_POST['campus_name']) ? $_POST['campus_name'] : '';
}
$firstname 	= (isset($union_personal_info['firstname']) && $union_personal_info['firstname']) ? $union_personal_info['firstname'] : '';
$lastname 	= (isset($union_personal_info['lastname']) && $union_personal_info['lastname']) ? $union_personal_info['lastname'] : '';
$email_addr = (isset($union_personal_info['email_addr']) && $union_personal_info['email_addr']) ? $union_personal_info['email_addr'] : '';
$nickname 	= (isset($union_personal_info['nickname']) && $union_personal_info['nickname']) ? $union_personal_info['nickname'] : '';
$industry 	= (isset($union_personal_info['industry_id']) && $union_personal_info['industry_id']) ? $union_personal_info['industry_id'] : '';
?>
<div class="info-container">
    <div class="document-content">
    <form class="form-horizontal frm_new_union" id="frm_new_union" method="post" enctype="multipart/form-data" action="">
    <fieldset>
    <!-- Form Name -->
    <legend>Union Account</legend>
    <!-- Text input-->
	<div><a href="<?php echo $base."admin/view_union_users";?>">View All Unions</a></div><br>
	<div style="margin-bottom:10px;" id="id_div_email"></div>
    <div class="control-group">
        <!-- Text input-->
    <div class="control-group">
      <label class="control-label" for="firstname">First Name</label>
      <div class="controls">
        <input id="firstname" name="firstname" type="text" placeholder="First Name" value="<?php echo $firstname;?>" class="input-xlarge required"/>
      </div>
    </div>
    <!-- Text input-->
    <div class="control-group">
      <label class="control-label" for="lastname">Last Name</label>
      <div class="controls">
        <input id="lastname" name="lastname" type="text" placeholder="Last Name" value="<?php echo $lastname;?>" class="input-xlarge required"/>
      </div>
    </div>
      <label class="control-label" for="email">Email</label>
      <div class="controls">
        <input id="email" name="email" type="email" placeholder="Email" value="<?php echo $email_addr;?>" class="input-xlarge required"/>
      </div>
    </div>
    <!-- Text input-->
    <div class="control-group">
      <label class="control-label" for="nickname">Nickname</label>
      <div class="controls">
        <input id="nickname" name="nickname" type="text" placeholder="nickname" value="<?php echo $nickname;?>" class="input-xlarge required"/>
      </div>
    </div>
    
    <div class="control-group">
      <label class="control-label" for="nickname">Industry</label>
      <div class="controls">
        <select id="industry_id" name="industry_id" class="input-xlarge" required>
            <option value="">Select Industry</option>
            <?php 
			$industries = $this->users->getMetaDataList('industry', 'date_start<=CURDATE() AND (date_end="" OR date_end>CURDATE())');
			foreach($industries as $in) {
				$selected = ($in['id'] == $industry) ? 'selected="selected"' : '';?>
				<option value="<?php echo $in['id'];?>" <?php echo $selected;?>><?php echo $in['industryname'];?></option>
			<?php 
			}?>
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
			<?php 
			$arr_campus_names = (isset($usermeta['campus_name'])&&$usermeta['campus_name']) ? explode(",", $usermeta['campus_name']) : array();
			$sizeof_campus_names = sizeof($arr_campus_names);
			?>
			
			<input type="hidden" name="hidn_campus" id="hidn_campus" value="<?php echo $sizeof_campus_names;?>">
		  <label class="control-label" for="campus_name">Campus Name</label>
		  <div class="controls" id="id_div_campus">
			<?php 
			if( isset($arr_campus_names) && $sizeof_campus_names )  {
				$cntitem = 0;
				foreach( $arr_campus_names AS $val_campus ) {
					$cntitem++;
					$val_campus = trim($val_campus);?>
					<div id="id_campus_section<?php echo $cntitem;?>"> 
						<input id="campus_name<?php echo $cntitem;?>" name="campus_name[]" type="text" placeholder="Campus Name" value="<?php echo isset($val_campus) ? $val_campus : "";?>" class="input-xlarge"/>&nbsp;<a href="javascript:void(0);" title="Delete Campus" onclick="javascript:deleteSection('id_campus_section<?php echo $cntitem;?>');">Delete</a><br>
					</div>
					<?php 
				}
			}
			else {?>
				<div id="id_campus_section1">
					<input id="campus_name1" name="campus_name[]" type="text" placeholder="Campus Name" class="input-xlarge"/>&nbsp;<a href="javascript:void(0);" title="Delete Campus" onclick="javascript:deleteSection('id_campus_section1');">Delete</a><br>
				</div>
				<?php 
			}
			?>
		  </div>
		  <div class="padl100" align="center"><a href="javascript:void(0);" class="btn btn-warning" onclick="javascript: addMoreCampus(1);">Add New Campus</a></div>
		</div>
	</div>
	
    <div class="inline text-center">
    <input type="submit" name="submit" value="Next" class="btn btn-primary" />
    <input type="hidden" name="action" value="ACCOUNT" />
    <input type="hidden" name="type_id" value="7" />
	<input type="hidden" name="page" value="register_union"/>
    <input type="reset" name="reset" value="Reset" class="btn" />
    </div>
    </fieldset>
    </form>
    </div>

    <script type="text/javascript">
		function deleteSection( id )
		{
			$('#'+id).slideUp('medium', function () {
				$("#"+id).html('');
				$("#"+id).remove('');
			});
		}

		function addMoreCampus()
		{
			var s 	= parseInt( $('#hidn_campus').val() );
			s 		= (s+1);

			sectionAppend = '<div id="id_campus_section'+s+'">';
			sectionAppend += '<input id="campus_name'+s+'" name="campus_name[]" type="text" placeholder="Campus Name" class="input-xlarge"/>';
			sectionAppend += '&nbsp;<a href="javascript:void(0);" title="Delete Campus" onclick=javascript:deleteSection("id_campus_section'+s+'");>Delete</a><br>';

			$('#id_div_campus').append( sectionAppend );
			$('#hidn_campus').val(s);
		}

		<?php 
		if( isset($email_exists) && $email_exists ) {?>
			$("#id_div_email").html('<label class="text-error" for="email"><?php echo lang('msg_email_already_taken');?></label>');		
			<?php 
		}?>
	
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
			
			$('#frm_new_union').validate({
				highlight: function(element) {
					$(element).parent('div').addClass("text-error");
				},
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
					nickname: {
						required: "<?php echo lang('msg_enter_nickname');?>"
					},
					industry_id: {
						required: "<?php echo lang('msg_select_industry');?>"
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
			
			$('form').submit(function(e) {
				if( e == 1 ) {
					e.preventDefault();
					return false;
				}
			});
		});
    </script>    
</div>    
<?php $this->load->view('footer_admin'); ?>