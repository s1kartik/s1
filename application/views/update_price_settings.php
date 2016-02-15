<?php 
$this->load->view('header_admin');
if($_SERVER['REQUEST_METHOD']=='POST'){
    foreach($_POST as $key=>$val) {
        $admin[$key] = $val;
	}
}
?>
<div class="info-container">
    <div class="document-content">
    <form class="form-horizontal frm_upd_pricesettings" id="frm_upd_pricesettings" method="post" enctype="multipart/form-data" action="">
    <fieldset>
    <!-- Form Name -->
    <legend>Edit Price</legend>
	<div class="control-group">
      <label class="control-label" for="price_settingsname">Section Name</label>
      <div class="controls">
		<select id="price_settingsname" name="price_settingsname">
			<option value="safetytalks" <?php echo ("safetytalks"==$admin['price_settingsname']) ? 'selected="selected"':'';?>>Safety Talks</option>
			<option value="procedures" <?php echo ("procedures"==$admin['price_settingsname']) ? 'selected="selected"':'';?>>Procedures</option>
			<option value="s1procedures" <?php echo ("s1procedures"==$admin['price_settingsname']) ? 'selected="selected"':'';?>>S1 Procedures</option>
			<option value="badges" <?php echo ("badges"==$admin['price_settingsname']) ? 'selected="selected"':'';?>>D.R.O.T</option>
		</select>
		<?php if(isset($update) && $update=='duplicated'):?>
            <label class="errormsg" for="price_settingsname">This price section is already in use.</label>
        <?php endif;?>
      </div>
    </div>
	
    <!-- Text input-->
    <div class="control-group">
      <label class="control-label" for="txt_price">Price</label>
      <div class="controls">
        <input id="txt_price" name="txt_price" type="text" placeholder="Price" class="input-xlarge" value="<?php echo isset($_POST['txt_price'])?$_POST['txt_price']:isset($admin['in_price'])?$admin['in_price']:"";?>" required />
      </div>
    </div>
    <!-- Text input-->
    <div class="control-group">
      <label class="control-label" for="txt_points">Points</label>
      <div class="controls">
        <input id="txt_points" name="txt_points" type="text" placeholder="Points" class="input-xlarge" value="<?php echo isset($_POST['txt_points'])?$_POST['txt_points']:isset($admin['in_points'])?$admin['in_points']:"";?>">
      </div>
    </div>
    <!-- Text input-->
    <div class="control-group">
      <label class="control-label" for="enddate">Credits</label>
      <div class="controls">
        <input id="txt_credits" name="txt_credits" type="text" placeholder="Credits" class="input-xlarge" value="<?php echo isset($_POST['txt_credits'])?$_POST['txt_credits']:isset($admin['in_credits'])?$admin['in_credits']:"";?>">
      </div>
    </div>
    <div class="inline text-center">
    <input type="hidden" name="id" value="<?php echo isset($admin['id'])?$admin['id']:"";?>" />
    <input type="hidden" name="type" value="price_settings" />
    <input type="hidden" name="field" value="price_settingsname" />
    <input type="submit" name="submit" value="Save" class="btn btn-primary" />
     <input type="button" name="cancel" value="Cancel" class="btn btn-danger" onclick="javascript:window.location.href='<?php echo $base;?>admin/metadata?type=price_settings'" />
    </div>
    </fieldset>
    </form>
    </div>
	
	<script type="text/javascript">
	$(document).ready(function () {
        $('input[name=price_settingsname]').change(function(){
            obj = $(this);
            $initial_value = $(this).attr('title');
            if($initial_value!=$(this).val()){
                $.post(
					'<?php echo $base;?>admin/validateTypename', 
					{'price_settingsname': $(this).val()},
					function(data) {
						if(data=='false'){
							if(obj.parent().children('label').size()<1)
								obj.parent().append('<label class="error" for="email">This price section is already in use.</label>')
						}else{
							obj.parent().children('label').remove();
						}
					}
                );
            }else{
                obj.parent().children('label').remove();
            }   
        })        
	   
        $('#frm_upd_pricesettings').validate({});
    });
	</script>
</div>
<?php $this->load->view('footer_admin'); ?>