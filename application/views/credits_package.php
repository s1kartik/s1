<?php $this->load->view('header_admin');
$creditspkg_name 	= (isset($credits_packages['st_creditspkg_name']) && $credits_packages['st_creditspkg_name']) ? $credits_packages['st_creditspkg_name'] : '';
$creditspkg_price 	= (isset($credits_packages['in_price']) && $credits_packages['in_price']) ? $credits_packages['in_price'] : '';
$creditspkg_credits	= (isset($credits_packages['in_credits']) && $credits_packages['in_credits']) ? $credits_packages['in_credits'] : '';
$creditspkg_status 	= (isset($credits_packages['in_status']) && $credits_packages['in_status']) ? $credits_packages['in_status'] : '';
?>
<div class="info-container">
    <div class="document-content">
    <form class="form-horizontal adminfrm" id="frm_credits_package" method="post" action="">
    <fieldset>
    <!-- Form Name -->
    <legend>Credits Package</legend>
    <!-- Text input-->
    <div class="control-group">
      <label class="control-label" for="txt_creditspkg_name">Select Credits Package</label>
      <div class="controls">
		<select name="cmb_creditspkg_name" required>
			<option value="">-Select-</option>
			<option value="bronze" <?php echo ('bronze'==$creditspkg_name)?'selected="selected"':'';?>>Bronze</option>
			<option value="silver" <?php echo ('silver'==$creditspkg_name)?'selected="selected"':'';?>>Silver-</option>
			<option value="gold" <?php echo ('gold'==$creditspkg_name)?'selected="selected"':'';?>>Gold</option>
			<option value="platinum" <?php echo ('platinum'==$creditspkg_name)?'selected="selected"':'';?>>Platinum</option>
		</select>
      </div>
    </div>
	
    <!-- Text input-->
    <div class="control-group">
      <label class="control-label" for="txt_creditspkg_price">Package Price</label>
      <div class="controls"><input type="text" name="txt_creditspkg_price" placeholder="Package Amount" value="<?php echo $creditspkg_price;?>"></div>
    </div>
	
	<div class="control-group">
      <label class="control-label" for="txt_creditspkg_credits">Credits</label>
      <div class="controls"><input type="text" name="txt_creditspkg_credits" placeholder="Credits" value="<?php echo $creditspkg_credits;?>"></div>
    </div>
	
	<div class="control-group">
		<label class="control-label">Status</label>
		<div class="controls">
			<?php $checked = 'checked="checked"';?>
			<label class="radio inline"><input type="radio" name="cmb_creditspkg_status" value="1" <?php echo ($creditspkg_status==1) ? $checked : '';?>/>&nbsp;Active</label> 
			<label class="radio inline"><input type="radio" name="cmb_creditspkg_status" value="0" <?php echo ($creditspkg_status==0) ? $checked : '';?>/>&nbsp;Inactive</label>
		</div>
	</div>
	
    <div class="inline text-center">
		<input type="submit" name="submit" value="Save" class="btn btn-primary" />
		<input type="button" name="cancel" value="Cancel" class="btn btn-danger" onclick="javascript:window.location.href='<?php echo $base;?>admin/metadata?type=credits_package'" />
    </div>
    </fieldset>
    </form>
    </div>
    <script type="text-javascript">
	$(document).ready(function () {
		$('#frm_credits_package').validate({
			highlight: function(element) {
					$(element).parent('div').addClass("text-error");
				},
			rules: {
    		    cmb_creditspkg_name: {
					required: true,
                }
    		},
    		messages: {
    		    cmb_creditspkg_name: {
                    required: "Please select Credits Package",
                }
    		}
		});
    });
    </script>   
</div>    
<?php $this->load->view('footer_admin'); ?>