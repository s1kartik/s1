<?php $this->load->view('header_admin'); ?>
<?php if($_SERVER['REQUEST_METHOD']=='POST'){
    foreach($_POST as $key=>$val)
        $admin[$key] = $val;
}
?>
<div class="info-container">
    <div class="document-content">
    <form class="form-horizontal frm_upd_regulation" id="frm_upd_regulation" method="post" enctype="multipart/form-data" action="">
    <fieldset>
    <!-- Form Name -->
    <legend>Regulation</legend>
    <!-- Text input-->
    <div class="control-group">
      <label class="control-label" for="firstname">Regulation Title</label>
      <div class="controls">
        <input id="regulation_title" name="regulation_title" type="text" placeholder="Regulation Title" class="input-xlarge" title="<?php echo isset($_POST['regulation_title'])?$_POST['regulation_title']:$admin['st_parent_regulation_title'];?>" value="<?php echo isset($_POST['regulation_title'])?$_POST['regulation_title']:$admin['st_parent_regulation_title'];?>" required />
        <?php if(isset($update) && $update=='duplicated'):?>
            <label class="errormsg" for="email">This regulation title is already in use.</label>
        <?php endif;?>
      </div>
    </div>
    <!-- Text input-->
    <div class="control-group">
      <label class="control-label" for="startdate">Start Date</label>
      <div class="controls">
        <input id="startdate" name="startdate" type="text" placeholder="Start Date" class="input-xlarge datestamp" value="<?php echo $admin['date_start'];?>">
      </div>
    </div>
    <!-- Text input-->
    <div class="control-group">
      <label class="control-label" for="enddate">End Date</label>
      <div class="controls">
        <input id="enddate" name="enddate" type="text" placeholder="End Date" class="input-xlarge datestamp" value="<?php echo $admin['date_end'];?>">
      </div>
    </div>
    <div class="inline text-center">
    <input type="hidden" name="id" value="<?php echo $admin['id'];?>" />
    <input type="hidden" name="type" value="regulations" />
    <input type="hidden" name="field" value="st_parent_regulation_title" />
    <input type="submit" name="submit" value="Save" class="btn btn-primary btn-validate-date" />
     <input type="button" name="cancel" value="Cancel" class="btn btn-danger" onclick="javascript:window.location.href='<?php echo $base;?>admin/metadata?type=regulations'" />
    </div>
    </fieldset>
    </form>
    </div>
	
	<link rel="stylesheet" href="<?php echo $base;?>css/jquery-ui.css" />
	<script type="text/javascript" src="<?php echo $base;?>js/jquery-ui.js"></script>
    <script type="text/javascript">
	$(document).ready(function () {
	    $(".datestamp").datepicker();
		/* $('input.datepicker').Zebra_DatePicker({onSelect: function(e, selectedDate, $td, obj) {
            obj.val(e);	          
        }});*/

        $('input[name=regulation_title]').change(function(){
            obj = $(this);
            $initial_value = $(this).attr('title');
            if($initial_value!=$(this).val()){
                $.post(
					'<?php echo $base;?>admin/validateRegulationTitle',
					{'regulation_title': $(this).val()},
					function(data) {
						if(data=='false'){
							if(obj.parent().children('label').size()<1)
								obj.parent().append('<label class="error" for="email">This regulation title is already in use.</label>')
						}else{
							obj.parent().children('label').remove();
						}
					}
                );
            }else{
                obj.parent().children('label').remove();
            }   
        })        
	   
        $('#frm_upd_regulation').validate({});
    });
    </script>   
</div>    
<?php $this->load->view('footer_admin'); ?>