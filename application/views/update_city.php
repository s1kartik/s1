<?php $this->load->view('header_admin'); ?>
<?php if($_SERVER['REQUEST_METHOD']=='POST'){
    foreach($_POST as $key=>$val)
        $admin[$key] = $val;
}
?>
<div class="info-container">
    <div class="document-content">
    <form class="form-horizontal frm_upd_city" id="frm_upd_city" method="post">
    <fieldset>
    <!-- Form Name -->
    <legend>City</legend>
    <!-- Text input-->
    <div class="control-group">
      <label class="control-label">Country</label>
      <div class="controls">
        <select id="country_id" name="country_id" placeholder="Select Country" class="input-xlarge" title="<?php echo $admin['country_id'];?>" required>
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
      <label class="control-label">Province </label>
      <div class="controls">
        <select id="province_id" name="province_id" placeholder="Select Province" class="input-xlarge" title="<?php echo $admin['province_id'];?>" required>
            <?php
                $provinces = $this->users->getRelatedElement('tbl_province', 'country_id', $admin['country_id']);
                
                foreach($provinces as $sc):
                $selected = ($admin['province_id']==$sc['id'])?'selected="selected"':'';
            ?>
    	    <option value="<?php echo $sc['id'];?>" <?php echo $selected;?>><?php echo $sc['provincename'];?></option>
            <?php endforeach;?>
        </select>
      </div>
    </div>
    <!-- Text input-->
    <div class="control-group">
      <label class="control-label" >City Name</label>
      <div class="controls">
        <input  id="cityname" name="cityname" type="text" placeholder="City Name" class="input-xlarge" title="<?php echo $admin['cityname'];?>" value="<?php echo $admin['cityname'];?>" required/>
        <?php if(isset($update) && $update=='duplicated'):?>
            <label class="errormsg" for="email">This city name is already in use.</label>
        <?php endif;?>
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
    <input type="hidden" name="type" value="city" />
    <input type="hidden" name="field" value="cityname" />
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
            $initial_country = $('#country_id').attr('title');
            $initial_province = $('#province_id').attr('title');
            $initial_city = $('#cityname').attr('title');
            if($initial_country!=$('#country_id').val() ||  $initial_province!=$('#province_id').val() || $initial_city!=$('#cityname').val() ){
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
            }else{
                obj.parent().children('label').remove();
            }    
        });
        
        $('#country_id').change(function(){
            $country_id = $(this).val();
            $.post('<?php echo $base;?>admin/getRelatedElement', {'table': 'tbl_province', 'field': 'country_id', 'value': $country_id, 'field_fetch': 'provincename'}, function(data){
                $("#province_id").html(data);
            });
        });
                
        $('#frm_upd_city').validate({});
    });
    </script>    
</div>    
<?php $this->load->view('footer_admin'); ?>