<?php $this->load->view('header_admin'); ?>
<div class="info-container">
    <div class="document-content">
     <form class="form-horizontal frm_new_industry" id="frm_new_industry" method="post">
    <fieldset>
    <!-- Form Name -->
    <legend>Industry</legend>
    <!-- Text input-->
    <div class="control-group">
      <label class="control-label" for="firstname">Industry Name</label>
      <div class="controls">
        <input id="industryname" name="industryname" type="text" placeholder="Industry Name" class="input-xlarge" required />
      </div>
    </div>
    <!-- Text input-->
    <div class="control-group">
      <label class="control-label" for="firstname">Description</label>
      <div class="controls">
        <textarea  id="desc" name="desc" type="text" placeholder="Description" class="input-xlarge" required></textarea>
      </div>
    </div>
    <!-- Text input-->
    <div class="control-group">
      <label class="control-label" for="startdate">Start Date</label>
      <div class="controls">
        <input id="startdate" name="startdate" type="text" placeholder="Start Date" class="input-xlarge datepicker" />
      </div>
    </div>
    <!-- Text input-->
    <div class="control-group">
      <label class="control-label" for="enddate">End Date</label>
      <div class="controls">
        <input id="enddate" name="enddate" type="text" placeholder="End Date " class="input-xlarge datepicker" />
      </div>
    </div>
    <div class="inline text-center">
    <input type="submit" name="submit" value="Save" class="btn btn-primary btn-validate-date" />
    <input type="button" name="cancel" value="Cancel" class="btn btn-danger" onclick="javascript:window.location.href='<?php echo $base;?>admin/metadata?type=industry'" />
    </div>
    </fieldset>
    </form>
    </div>
    <script type="text/javascript">
	$(document).ready(function () {
	    $('input.datepicker').Zebra_DatePicker({onSelect: function(e, selectedDate, $td, obj) {
            obj.val(e);	          
        }});
        $('input[name=industryname]').change(function(){
            obj = $(this);
            $.post(
                    '<?php echo $base;?>admin/validateMetaData',
                    {'table': 'tbl_industry', 'field': 'industryname', 'value': $(this).val()},
                    function(data) {
                        if(data=='false'){
                            if(obj.parent().children('label').size()<1)
                            obj.parent().append('<label class="error" for="email">This industry name is already in use.</label>')
                        }else{
                            obj.parent().children('label').remove();
                        }
                    }
            );   
        })        
	   
        $('#frm_new_industry').validate({});
    });
    </script>    
</div>    
<?php $this->load->view('footer_admin'); ?>