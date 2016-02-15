<?php $this->load->view('header_admin'); ?>
<div class="info-container">
    <div class="document-content">
     <form class="form-horizontal frm_new_usertype" id="frm_new_usertype" method="post">
    <fieldset>
    <!-- Form Name -->
    <legend>User Type</legend>
    <!-- Text input-->
    <div class="control-group">
      <label class="control-label" for="firstname">User Type Name</label>
      <div class="controls">
        <input id="usertypename" name="usertypename" type="text" placeholder="User Type Name" class="input-xlarge" required />
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
        <input id="enddate" name="enddate" type="text" placeholder="End Date" class="input-xlarge datepicker">
      </div>
    </div>
    <div class="inline text-center">
    <input type="submit" name="submit" value="Save" class="btn btn-primary btn-validate-date" />
    <input type="button" name="cancel" value="Cancel" class="btn btn-danger" onclick="javascript:window.location.href='<?php echo $base;?>admin/metadata?type=usertype'" />
    </div>
    </fieldset>
    </form>
    </div>
    <script type="text/javascript">
	$(document).ready(function () {
	    $('input.datepicker').Zebra_DatePicker({onSelect: function(e, selectedDate, $td, obj) {
            obj.val(e);	          
        }});
        $('input[name=usertypename]').change(function(){
            obj = $(this);
            $.post(
                    '<?php echo $base;?>admin/validateTypename',
                    {'typename': $(this).val()},
                    function(data) {
                        if(data=='false'){
                            if(obj.parent().children('label').size()<1)
                            obj.parent().append('<label class="error" for="email">This type name is already in use.</label>')
                        }else{
                            obj.parent().children('label').remove();
                        }
                    }
            );   
        })        
	   
        $('#frm_new_usertype').validate({});
    });
    </script>    
</div>    
<?php $this->load->view('footer_admin'); ?>