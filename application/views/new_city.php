<?php $this->load->view('header_admin'); ?>
<div class="info-container">
    <div class="document-content">
    <form class="form-horizontal frm_new_city" id="frm_new_city" method="post">
    <fieldset>
    <!-- Form Name -->
    <legend>City</legend>
    <!-- Text input-->
    <div class="control-group">
      <label class="control-label">Country</label>
      <div class="controls">
        <select id="country_id" name="country_id" placeholder="Select Country" class="input-xlarge" required>
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
      <label class="control-label">Province </label>
      <div class="controls">
        <select id="province_id" name="province_id" placeholder="Select Province" class="input-xlarge" required>
            <option value="">-select-</option>
        </select>
      </div>
    </div>
    <!-- Text input-->
    <div class="control-group">
      <label class="control-label" >City Name</label>
      <div class="controls">
        <input  id="cityname" name="cityname" type="text" placeholder="City Name" class="input-xlarge" required/>
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
    <input type="button" name="cancel" value="Cancel" class="btn btn-danger" onclick="javascript:window.location.href='<?php echo $base;?>admin/metadata?type=city'" />
    </div>
    </fieldset>
    </form>
    </div>
    <script type="text/javascript">
	$(document).ready(function () {
	    $('input.datepicker').Zebra_DatePicker({onSelect: function(e, selectedDate, $td, obj) {
            obj.val(e);	          
        }});
        $('#cityname, #country_id, #province_id').change(function(){
            obj = $('#cityname');
            $.post(
                    '<?php echo $base;?>admin/validateMetaDataRelatedTwo',
                    {'table': 'tbl_city', 'field': 'cityname', 'value': $('#cityname').val(), 'filed_related1': 'country_id', 'value_related1': $('#country_id').val(), 'filed_related2': 'province_id', 'value_related2': $('#province_id').val()},
                    function(data) {
                        if(data=='false'){
                            if(obj.parent().children('label').size()<1)
                            obj.parent().append('<label class="error" for="email">This city name is already in use with the country and province you selected.</label>')
                        }else{
                            obj.parent().children('label').remove();
                        }
                    }
            );   
        });
        
        $('#country_id').change(function(){
            $country_id = $(this).val();
            $.post('<?php echo $base;?>admin/getRelatedElement', {'table': 'tbl_province', 'field': 'country_id', 'value': $country_id, 'field_fetch': 'provincename'}, function(data){
                $("#province_id").html(data);
            });
        });
                
        $('#frm_new_city').validate({});
    });
    </script>    
</div>    
<?php $this->load->view('footer_admin'); ?>