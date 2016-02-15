<?php $this->load->view('header_admin'); ?>
<div class="info-container">
    <div class="document-content">
    <form class="form-horizontal frm_new_country" id="frm_new_country"  method="post">
    <fieldset>
    <!-- Form Name -->
    <legend>Country</legend>
    <!-- Text input-->
    <div class="control-group">
      <label class="control-label" >Name</label>
      <div class="controls">
        <input id="countryname" name="countryname" type="text" placeholder="Country Name" class="input-xlarge" required/>
      </div>
    </div>
    <!-- Text input-->
    <div class="control-group">
      <label class="control-label">Abbreviation</label>
      <div class="controls">
        <input  id="abbreviation" name="abbreviation" type="text" placeholder="Country Abbreviation" class="input-xlarge" required/>
      </div>
    </div>
    <!-- Text input-->
    <div class="control-group">
      <label class="control-label" >Start Date</label>
      <div class="controls">
        <input id="startdate" name="startdate" type="text" placeholder="Start Date" class="input-xlarge datepicker"/>
      </div>
    </div>
    <!-- Text input-->
    <div class="control-group">
      <label class="control-label" >End Date</label>
      <div class="controls">
        <input id="enddate" name="enddate" type="text" placeholder="End Date" class="input-xlarge datepicker"/>
      </div>
    </div>
    <div class="inline text-center">
    <input type="submit" name="submit" value="Save" class="btn btn-primary btn-validate-date" />
    <input type="button" name="cancel" value="Cancel" class="btn btn-danger" onclick="javascript:window.location.href='<?php echo $base;?>admin/metadata?type=country'" />
    </div>
    </fieldset>
    </form>
    </div>
    <script type="text/javascript">
	$(document).ready(function () {
	    $('input.datepicker').Zebra_DatePicker({onSelect: function(e, selectedDate, $td, obj) {
            obj.val(e);	          
        }});
        $('input[name=countryname]').change(function(){
            obj = $(this);
            $.post(
                    '<?php echo $base;?>admin/validateMetaData',
                    {'table': 'tbl_country', 'field': 'countryname', 'value': $(this).val()},
                    function(data) {
                        if(data=='false'){
                            if(obj.parent().children('label').size()<1)
                            obj.parent().append('<label class="error" for="email">This country name is already in use.</label>')
                        }else{
                            obj.parent().children('label').remove();
                        }
                    }
            );   
        })        
	   
        $('#frm_new_country').validate({});
    });
    </script>    
</div>    
<?php $this->load->view('footer_admin'); ?>