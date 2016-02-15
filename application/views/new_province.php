<?php $this->load->view('header_admin'); ?>
<div class="info-container">
    <div class="document-content">
    <form class="form-horizontal frm_new_province" id="frm_new_province" method="post">
    <fieldset>
    <!-- Form Name -->
    <legend>Province</legend>
    <!-- Text input-->
    <div class="control-group">
      <label class="control-label">Country </label>
      <div class="controls">
        <select  id="country_id" name="country_id" type="select" placeholder="Country Name" class="input-xlarge" required/>
            <option value="">-select-</option>
            <?php
                $countries = $this->users->getMetaDataList('country');
                foreach($countries as $in):
            ?>
    	    <option value="<?php echo $in['id'];?>"><?php echo $in['countryname'];?></option>
            <?php endforeach;?>
        </select>
      </div>
    </div>
    <!-- Text input-->
    <div class="control-group">
      <label class="control-label" >Province Name</label>
      <div class="controls">
        <input  id="provincename" name="provincename" type="text" placeholder="Province Name" class="input-xlarge" required/>
      </div>
    </div>
    <!-- Text input-->
    <div class="control-group">
      <label class="control-label">Abbreviation</label>
      <div class="controls">
        <input  id="abbreviation" name="abbreviation" type="text" placeholder="Country Abbreviation" class="input-xlarge" required/>
      </div>
    </div>
    <div class="control-group">
      <label class="control-label">Tax Abbr</label>
      <div class="controls">
        <input  id="taxabbr" name="tax_abbr" type="text" placeholder="HST" class="input-xlarge"/>
      </div>
    </div>
    <div class="control-group">
      <label class="control-label">Tax Rate</label>
      <div class="controls">
        <input  id="taxrate" name="rate" type="text" placeholder="0.13" class="input-xlarge"/>
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
    <input type="button" name="cancel" value="Cancel" class="btn btn-danger" onclick="javascript:window.location.href='<?php echo $base;?>admin/metadata?type=province'" />

    </div>
    </fieldset>
    </form>
    </div>
    <script type="text/javascript">
	$(document).ready(function () {
	    $('input.datepicker').Zebra_DatePicker({onSelect: function(e, selectedDate, $td, obj) {
            obj.val(e);	          
        }});
        $('#provincename, #country_id').change(function(){
            obj = $('#provincename');
            $.post(
                    '<?php echo $base;?>admin/validateMetaDataRelated',
                    {'table': 'tbl_province', 'field': 'provincename', 'value': $('#provincename').val(), 'filed_related': 'country_id', 'value_related': $('#country_id').val()},
                    function(data) {
                        if(data=='false'){
                            if(obj.parent().children('label').size()<1)
                            obj.parent().append('<label class="error" for="email">This province name is already in use with the country you selected.</label>')
                        }else{
                            obj.parent().children('label').remove();
                        }
                    }
            );   
        })        
	   
        $('#frm_new_province').validate({});
    });
    </script>    
</div>    
<?php $this->load->view('footer_admin'); ?>