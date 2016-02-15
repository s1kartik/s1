<?php $this->load->view('header_admin'); ?>
<div class="info-container">
    <div class="document-content">
    <form class="form-horizontal frm_new_admin" id="frm_new_admin" method="post" enctype="multipart/form-data" action="">
    <fieldset>
    <!-- Form Name -->
    <legend>Administrator</legend>
    <!-- Text input-->
    <div class="control-group">
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
    <!-- Password input-->
    <div class="control-group">
      <label class="control-label" for="confirmpassword">Upload Image</label>
      <div class="controls">
      <input class="input-xlarge" id="userfile" name="userfile" placeholder="Upload Image" type="file"/>
    </div>
    </div>
    <!-- Text input-->
    <div class="control-group">
      <label class="control-label" for="startdate">Start Date</label>
      <div class="controls">
        <input id="startdate" name="startdate" type="text" placeholder="Start Date" class="input-xlarge datepicker"/>
      </div>
    </div>
    <!-- Text input-->
    <div class="control-group">
      <label class="control-label" for="enddate">End Date</label>
      <div class="controls">
        <input id="enddate" name="enddate" type="text" placeholder="End Date" class="input-xlarge datepicker"/>
      </div>
    </div>
    <div class="inline text-center">
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
        $('input[name=email]').change(function(){
            obj = $(this);
            $.post(
                    '<?php echo $base;?>admin/validateEmail',
                    {'email': $(this).val()},
                    function(data) {
                        if(data=='false'){
                            if(obj.parent().children('label').size()<1)
                            obj.parent().append('<label class="error" for="email"><?php echo lang('msg_email_already_taken');?></label>')
                        }else{
                            obj.parent().children('label').remove();
                        }
                    }
            );   
        })
        $('input[name=nickname]').change(function(){
            obj = $(this);
            $.post(
                    '<?php echo $base;?>admin/validateNickname',
                    {'nickname': $(this).val()},
                    function(data) {
                        if(data=='false'){
                            if(obj.parent().children('label').size()<1)
                            obj.parent().append('<label class="error" for="nickname"><?php echo lang('msg_nickname_already_taken');?></label>')
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
            '<?php echo lang('msg_validate_password');?>'
        );	   
        $('#frm_new_admin').validate({
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
                    required: "<?php echo lang('msg_enter_email');?>",
                    email: "<?php echo lang('msg_valid_email');?>"
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
</div>    
<?php $this->load->view('footer_admin'); ?>