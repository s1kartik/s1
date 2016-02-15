<?php $this->load->view('header_admin'); ?>
<?php if($_SERVER['REQUEST_METHOD']=='POST'){
    foreach($_POST as $key=>$val)
        $admin[$key] = $val;
}
?>
<div class="info-container">
    <div class="document-content">
    <form class="form-horizontal frm_upd_province" id="frm_upd_province" method="post">
    <fieldset>
    <!-- Form Name -->
    <legend>Province</legend>
    <!-- Text input-->
    <div class="control-group">
      <label class="control-label">Country </label>
      <div class="controls">
        <select  id="country_id" name="country_id" type="select" placeholder="Country Name" class="input-xlarge" title="<?php echo $admin['country_id'];?>" required/>
            <option value="">-select-</option>
            <?php
                $countries = $this->users->getMetaDataList('country');
                foreach($countries as $in):
                $selected = ($admin['country_id']==$in['id'])?'selected="selected"':'';
            ?>
    	    <option value="<?php echo $in['id'];?>" <?php echo $selected;?>><?php echo $in['countryname'];?></option>
            <?php endforeach;?>
        </select>
      </div>
    </div>
    <!-- Text input-->
    <div class="control-group">
      <label class="control-label" >Province Name</label>
      <div class="controls">
        <input  id="provincename" name="provincename" type="text" placeholder="Province Name" class="input-xlarge" title="<?php echo $admin['provincename'];?>" value="<?php echo $admin['provincename'];?>" required/>
        <?php if(isset($update) && $update=='duplicated'):?>
            <label class="errormsg" for="email">This province name is already in use.</label>
        <?php endif;?>
      </div>
    </div>
    <!-- Text input-->
    <div class="control-group">
      <label class="control-label">Abbreviation</label>
      <div class="controls">
        <input  id="abbreviation" name="abbreviation" type="text" placeholder="Country Abbreviation" class="input-xlarge" value="<?php echo $admin['abbreviation'];?>" required/>
      </div>
    </div>
    <div class="control-group">
      <label class="control-label">Tax Abbr</label>
      <div class="controls">
        <input  id="taxabbr" name="tax_abbr" type="text" placeholder="HST" class="input-xlarge" value="<?php echo $admin['tax_abbr'];?>"/>
      </div>
    </div>
    <div class="control-group">
      <label class="control-label">Tax Rate</label>
      <div class="controls">
        <input  id="taxrate" name="rate" type="text" placeholder="0.13" class="input-xlarge" value="<?php echo $admin['rate'];?>"/>
      </div>
    </div>    
    <!-- Text input-->
    <div class="control-group">
      <label class="control-label" >Start Date</label>
      <div class="controls">
        <input id="startdate" name="startdate" type="text" placeholder="Start Date" class="input-xlarge datepicker" value="<?php echo $admin['date_start'];?>"/>
      </div>
    </div>
    <!-- Text input-->
    <div class="control-group">
      <label class="control-label" >End Date</label>
      <div class="controls">
        <input id="enddate" name="enddate" type="text" placeholder="End Date" class="input-xlarge datepicker" value="<?php echo $admin['date_end'];?>"/>
      </div>
    </div>
    <div class="inline text-center">
    <input type="hidden" name="id" value="<?php echo $admin['id'];?>" />
    <input type="hidden" name="type" value="province" />
    <input type="hidden" name="field" value="provincename" />
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
            $initial_country = $('#country_id').attr('title');
            $initial_province = $('#provincename').attr('title');

            if($initial_country!=$('#country_id').val() ||  $initial_province!=$('#provincename').val() ){
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
            }else{
                obj.parent().children('label').remove();
            }      
        })       
	   
        $('#frm_upd_province').validate({});
    });
    </script>    
</div>
<?php $this->load->view('footer_admin'); ?>