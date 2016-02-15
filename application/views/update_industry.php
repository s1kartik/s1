<?php $this->load->view('header_admin'); ?>
<?php if($_SERVER['REQUEST_METHOD']=='POST'){
    foreach($_POST as $key=>$val)
        $admin[$key] = $val;
}
?>
<div class="info-container">
    <div class="document-content">
     <form class="form-horizontal frm_upd_industry" id="frm_upd_industry" method="post">
    <fieldset>
    <!-- Form Name -->
    <legend>Industry</legend>
    <!-- Text input-->
    <div class="control-group">
      <label class="control-label" for="firstname">Industry Name</label>
      <div class="controls">
        <input id="industryname" name="industryname" type="text" placeholder="Industry Name" class="input-xlarge" title="<?php echo $admin['industryname'];?>" value="<?php echo $admin['industryname'];?>" required />
        <?php if(isset($update) && $update=='duplicated'):?>
            <label class="errormsg" for="email">This industry name is already in use.</label>
        <?php endif;?>
      </div>
    </div>
    <!-- Text input-->
    <div class="control-group">
      <label class="control-label" for="firstname">Description</label>
      <div class="controls">
        <textarea  id="desc" name="desc" type="text" placeholder="Description" class="input-xlarge" required><?php echo $admin['description'];?></textarea>
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
        <input id="enddate" name="enddate" type="text" placeholder="End Date " class="input-xlarge datepicker" value="<?php echo $admin['date_end'];?>"/>
      </div>
    </div>
    <div class="inline text-center">
    <input type="hidden" name="id" value="<?php echo $admin['id'];?>" />
    <input type="hidden" name="type" value="industry" />
    <input type="hidden" name="field" value="industryname" />
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
        $(document).on('change', 'input[name=industryname]', function(){
            obj = $(this);
            $initial_value = $(this).attr('title');
            if($initial_value!=$(this).val()){
                $.post(
                        '<?php echo $base;?>admin/validateMetaData',
                        {'table': 'tbl_industry', 'field': 'industryname', 'value': $(this).val()},
                        function(data) {
                            if(data=='false'){
                                if(obj.parent().children('label').size()<1)
                                    obj.parent().append('<label class="error" for="email">This industry name is already in use.</label>');
                            }else{
                                obj.parent().children('label').remove();
                            }
                        }
                ); 
            }else{
                obj.parent().children('label').remove();
            }                  
        })        
	   
        $('#frm_upd_industry').validate();
    });
    </script>    
</div>    
<?php $this->load->view('footer_admin'); ?>