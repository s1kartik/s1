<?php $this->load->view('header_admin');
$rate_group_sector 		= (isset($wsib_rategroup_data['st_sector']) && $wsib_rategroup_data['st_sector']) ? $wsib_rategroup_data['st_sector'] : '';
$rate_group 			= (isset($wsib_rategroup_data['in_rate_group']) && $wsib_rategroup_data['in_rate_group']) ? $wsib_rategroup_data['in_rate_group'] : '';
$rate_group_description = (isset($wsib_rategroup_data['st_rate_group_description']) && $wsib_rategroup_data['st_rate_group_description']) ? $wsib_rategroup_data['st_rate_group_description'] : '';
$rategroup_status 		= (isset($wsib_rategroup_data['in_status']) && $wsib_rategroup_data['in_status']) ? $wsib_rategroup_data['in_status'] : '';
?>
<div class="info-container">
    <div class="document-content">
    <form class="form-horizontal adminfrm" id="frm_upd_wsib_rategroup" method="post" action="">
    <fieldset>
    <legend>WSIB Rate Group</legend>
    <div class="control-group">
      <label class="control-label" for="txt_sector">Sector</label>
      <div class="controls">
        <input id="txt_sector" name="txt_sector" type="text" placeholder="Sector" class="input-xlarge" value="<?php echo $rate_group_sector;?>" required />
      </div>
    </div>
	
	<div class="control-group">
      <label class="control-label" for="txt_rate_group">Rate Group</label>
      <div class="controls">
        <input id="txt_rate_group" name="txt_rate_group" type="text" placeholder="Rate Group" class="input-xlarge" value="<?php echo $rate_group;?>" required />
      </div>
    </div>

	<div class="control-group">
      <label class="control-label" for="txt_rate_group_description">Rate Group Description</label>
      <div class="controls">
		<textarea id="txt_rate_group_description" style="margin:0;" name="txt_rate_group_description" maxlength="200" onkeyup="showRemainingChars(1,200,10,'txt_rate_group_description');" placeholder="Rate Group Description" class="content-editor"><?php echo $rate_group_description;?></textarea>
		<div id="cnt_itemname1"></div>
	  </div>
	</div>

	<div class="control-group">
		<label class="control-label" for="rdb_rategroup_status">Status</label>
		<div class="controls">
			<?php $checked = 'checked="checked"';?>
			<label class="radio inline"><input type="radio" name="rdb_rategroup_status" value="1" <?php echo ($rategroup_status==1) ? $checked : '';?>/>&nbsp;Active</label> 
			<label class="radio inline"><input type="radio" name="rdb_rategroup_status" value="0" <?php echo ($rategroup_status==0) ? $checked : '';?>/>&nbsp;Inactive</label>
		</div>
	</div>
    <div class="inline text-center">
		<input type="submit" name="submit" value="Save" class="btn btn-primary" />
		<input type="button" name="cancel" value="Cancel" class="btn btn-danger" onclick="javascript:window.location.href='<?php echo $base;?>admin/metadata?type=wsib_rategroup'" />
    </div>
    </fieldset>
    </form>
    </div>
</div>    
<?php $this->load->view('footer_admin'); ?>
<style>.flexslider .slides img {width: 130px; height: 115px; display: block;}</style>
<script type="text/javascript" src="<?php echo $base;?>js/common.js"></script>
<script type="text/javascript">
	$(document).ready(function () {			
		$('#frm_upd_wsib_rategroup').validate({
			highlight: function(element) {
				$(element).parent('div').addClass("text-error");
			},
			rules: {
				txt_sector: {required: true}
			},
			messages: {
				txt_sector: {required: "Please enter Sector"}
			}
		});
	});
</script>   