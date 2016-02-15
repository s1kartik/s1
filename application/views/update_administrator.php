<?php $this->load->view('header_admin'); ?>
<div class="info-container">
    <div class="document-content">
    <form class="form-horizontal frm_upd_administrator" id="frm_upd_administrator" method="post" enctype="multipart/form-data" action="">
    <fieldset>
    <!-- Form Name -->
    <legend>Administrator</legend>
    <!-- Text input-->
    <div class="control-group">
      <label class="control-label" for="email">Email</label>
      <div class="controls">
        <input id="email" name="email" type="email" placeholder="Email" class="input-xlarge required" value="<?php echo $admin['email_addr'];?>" readonly="readonly" />
      </div>
    </div>
    <!-- Text input-->
    <div class="control-group">
      <label class="control-label" for="nickname">Nickname</label>
      <div class="controls">
        <input id="nickname" name="nickname" type="text" placeholder="nickname" class="input-xlarge required" title="<?php echo $admin['nickname'];?>" value="<?php echo $admin['nickname'];?>">
      </div>
    </div>
    <!-- Text input-->
    <div class="control-group">
      <label class="control-label" for="firstname">First Name</label>
      <div class="controls">
        <input id="firstname" name="firstname" type="text" placeholder="First Name" class="input-xlarge required" value="<?php echo $admin['firstname'];?>">
      </div>
    </div>
    <!-- Text input-->
    <div class="control-group">
      <label class="control-label" for="lastname">Last Name</label>
      <div class="controls">
        <input id="lastname" name="lastname" type="text" placeholder="Last Name" class="input-xlarge required" value="<?php echo $admin['lastname'];?>">
      </div>
    </div>
    <!-- Password input-->
    <div class="control-group">
      <label class="control-label" for="password">Password</label>
      <div class="controls">
        <input id="password" name="password" type="password" placeholder="Password" class="input-xlarge" autocomplete="off" />
      </div>
    </div>
    <!-- Password input-->
    <div class="control-group">
      <label class="control-label" for="confirmpassword">Confirm Password</label>
      <div class="controls">
        <input id="confirmpassword" name="confirmpassword" type="password" placeholder="Confirm Password" class="input-xlarge"/>
      </div>
    </div>
    <!-- Password input-->
    <div class="control-group">
      <label class="control-label" for="confirmpassword">Upload Image</label>
      <div class="controls">
      <?php 
	  if(!empty($admin['profile_image'])):?>
		<img src="<?php echo $base.$this->path_upload_profiles.$admin['profile_image'];?>" title="<?php echo $admin['nickname'];?>" width="100" /><br />
      <?php endif;?>
	  
      <input class="input-xlarge" id="userfile" name="userfile" placeholder="Upload Image" type="file">
    </div>
    </div>
    <!-- Text input-->
    <div class="control-group">
      <label class="control-label" for="startdate">Start Date</label>
      <div class="controls">
        <input id="startdate" name="startdate" type="text" placeholder="Start Date" class="input-xlarge datepicker" value="<?php echo $admin['date_start'];?>" />
      </div>
    </div>
    <!-- Text input-->
    <div class="control-group">
      <label class="control-label" for="enddate">End Date</label>
      <div class="controls">
        <input id="enddate" name="enddate" type="text" placeholder="End Date" class="input-xlarge datepicker" value="<?php echo $admin['date_end'];?>" />
      </div>
    </div>
    <div class="inline text-center">
    <input type="hidden" name="userid" value="<?php echo $admin['id'];?>" />
    <input type="hidden" name="type" value="administrator" />
    <input type="submit" name="submit" value="Save" class="btn btn-primary btn-validate-date" />
     <input type="button" name="cancel" value="Cancel" class="btn btn-danger" onclick="javascript:window.location.href='<?php echo $base;?>admin/metadata?type=administrator'" />
    </div>
    </fieldset>
    </form>
    </div>
    <script type="text/javascript">
	$(document).ready(function () {
	    $('input.datepicker').Zebra_DatePicker({onSelect: function(e, selectedDate, $td, obj) {
            obj.val(e);	          
        }});
        /*
        $('input[name=email]').change(function(){
            obj = $(this);
            $.post(
                    '<?php echo $base;?>admin/validateEmail',
                    {'email': $(this).val()},
                    function(data) {
                        if(data=='false'){
                            obj.parent().append('<label class="error" for="email">This email address is already taken.</label>')
                        }else{
                            obj.parent().children('label').remove();
                        }
                    }
            );   
        })*/
        
        $('input[name=nickname]').change(function(){
            obj = $(this);
            $initial_value = $(this).attr('title');
            if($initial_value!=$(this).val()){
                $.post(
                        '<?php echo $base;?>admin/validateNickname',
                        {'nickname': $(this).val()},
                        function(data) {
                            if(data=='false'){
                                if(obj.parent().children('label').size()<1)
                                    obj.parent().append('<label class="error" for="email">This nickname is already taken.</label>')
                            }else{
                                obj.parent().children('label').remove();
                            }
                        }
                );                
            }else{
                obj.parent().children('label').remove();
            }   
        })        
        $.validator.addMethod(
            'strongPassword',
            function (value) { 
                var lowercase = /[a-z]/
                var uppercase = /[A-Z]/
                var numeric = /[0-9]/
                
                return lowercase.test(value) && uppercase.test(value) && numeric.test(value)||value.trim()=="";
            },  
            'Your password must be at least 8 characters long, and contains at least one digit, one uppercase letter and one lowercase letter'
        );	   
        $('#frm_upd_administrator').validate({
    		rules: {
    		    email: {
                  required: true,
                  email: true
                },
                nickname: {
                  required: true
                },
    			password: {
    				minlength: 8,
                    strongPassword: true,
    			},
    			confirmpassword: {
    				minlength: 8,
    				equalTo: "#password"
    			}
    		},
    		messages: {
    		    email: {
                    required: "Please enter your email address.",
                    email: "Please enter a valid email address."
                },
                email: {
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
        $('#startdate, #enddate').change(function(){
            $date_end = $('#enddate').val();
            if($date_end!=""){
                alert('check');
            }
        })
    });
    </script>    
</div>    
<?php $this->load->view('footer_admin'); ?>