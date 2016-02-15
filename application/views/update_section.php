<?php $this->load->view('header_admin'); ?>
<?php if($_SERVER['REQUEST_METHOD']=='POST'){
    foreach($_POST as $key=>$val)
        $admin[$key] = $val;
}
?>
<div class="info-container">
    <div class="document-content">
    <form class="form-horizontal frm_upd_sector" id="frm_upd_sector" method="post">
    <fieldset>
    <!-- Form Name -->
    <legend>Sector</legend>
    <!-- Text input-->
    <div class="control-group">
      <label class="control-label">Industry </label>
      <div class="controls">
        <select  id="industry_id" name="industry_id" type="select" placeholder="Industry Name" class="input-xlarge" title="<?php echo $admin['industry_id'];?>"  required>
            <?php
                $industries = $this->users->getMetaDataList('industry', 'date_start<=CURDATE() AND (date_end="" OR date_end>CURDATE())');
                foreach($industries as $in):
                $selected = ($admin['industry_id']==$in['id'])?'selected="selected"':'';
            ?>
    	    <option value="<?php echo $in['id'];?>" <?php echo $selected;?>><?php echo $in['industryname'];?></option>
            <?php endforeach;?>
        </select>
      </div>
    </div>
    <!-- Text input-->
    <div class="control-group">
      <label class="control-label" >Sector Name</label>
      <div class="controls">
        <input  id="sectionname" name="sectionname" type="text" placeholder="Sector Name" class="input-xlarge" title="<?php echo $admin['sectionname'];?>" value="<?php echo $admin['sectionname'];?>" required />
        <?php if(isset($update) && $update=='duplicated'):?>
            <label class="errormsg" for="email">This sector name is already in use.</label>
        <?php endif;?>
      </div>
    </div>
    <!-- Text input-->
    <div class="control-group">
      <label class="control-label" >Description</label>
      <div class="controls">
        <textarea  id="desc" name="desc" type="text" placeholder="Description" class="input-xlarge" required><?php echo $admin['description'];?></textarea>
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
    <input type="hidden" name="type" value="section" />
    <input type="hidden" name="field" value="sectionname" />
    <input type="submit" name="submit" value="Save" class="btn btn-primary btn-validate-date" />
    <input type="button" name="cancel" value="Cancel" class="btn btn-danger" onclick="javascript:window.location.href='<?php echo $base;?>admin/metadata?type=section'" />
    </div>
    </fieldset>
    </form>
    </div>
    <script type="text/javascript">
	$(document).ready(function () {
	    $('input.datepicker').Zebra_DatePicker({onSelect: function(e, selectedDate, $td, obj) {
            obj.val(e);	          
        }});
        $('#sectionname, #industry_id').change(function(){
            obj = $('#sectionname');
            $initial_industry = $('#industry_id').attr('title');
            $initial_sector = $('#sectionname').attr('title');

            if($initial_industry!=$('#industry_id').val() ||  $initial_sector!=$('#sectionname').val() ){
                $.post(
					'<?php echo $base;?>admin/validateMetaDataRelated',
					{'table': 'tbl_section', 'field': 'sectionname', 'value': $('#sectionname').val(), 'filed_related': 'industry_id', 'value_related': $('#industry_id').val()},
					function(data) {
						if(data=='false'){
							if(obj.parent().children('label').size()<1)
								obj.parent().append('<label class="error" for="email">This sector name is already in use with the industry you selected.</label>')
						}else{
							obj.parent().children('label').remove();
						}
					}
                );  
            }else{
                obj.parent().children('label').remove();
            }             
        })         
	   
        $('#frm_upd_sector').validate({});
    });
    </script>    
</div>    
<?php $this->load->view('footer_admin'); ?>