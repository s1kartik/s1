<?php $this->load->view('header_admin');
$level 				= (isset($points_level['in_level']) && $points_level['in_level']) ? $points_level['in_level'] : '';
$points_of_level 	= (isset($points_level['in_points_of_level']) && $points_level['in_points_of_level']) ? $points_level['in_points_of_level'] : '';
$points_level_label	= (isset($points_level['st_label']) && $points_level['st_label']) ? $points_level['st_label'] : '';
$points_level_image = (isset($points_level['st_image']) && $points_level['st_image']) ? $points_level['st_image'] : '';
$points_level_lifetime = (isset($points_level['in_lifetime']) && $points_level['in_lifetime']) ? $points_level['in_lifetime'] : '';
$benefits_to_level 	= (isset($points_level['has_benefits_to_level']) && $points_level['has_benefits_to_level']) ? $points_level['has_benefits_to_level'] : '';
$status_of_level 	= (isset($points_level['in_status_of_level']) && $points_level['in_status_of_level']) ? $points_level['in_status_of_level'] : '';
?>
<div class="info-container">
    <div class="document-content">
    <form class="form-horizontal adminfrm" id="frm_points_level" name="frm_points_level" enctype="multipart/form-data" method="post" action="">
    <fieldset>
    <legend>Points Level</legend>
    <div class="control-group">
      <label class="control-label" for="cmb_level">Level</label>
      <div class="controls">
		  <select name="cmb_level" required>
			<option value="">-Select-</option>
			<option value="1" <?php echo ('1'==$level) ? 'selected="selected"' : '';?>>1</option>
			<option value="2" <?php echo ('2'==$level) ? 'selected="selected"' : '';?>>2</option>
			<option value="3" <?php echo ('3'==$level) ? 'selected="selected"' : '';?>>3</option>
		  </select>
	  </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="txt_points_of_level">Points of Level</label>
      <div class="controls"><input type="text" name="txt_points_of_level" placeholder="Points of Level" value="<?php echo $points_of_level;?>" required></div>
    </div>
	<div class="control-group">
      <label class="control-label" for="txt_label">Label</label>
      <div class="controls"><input type="text" name="txt_label" placeholder="Label" value="<?php echo $points_level_label;?>"></div>
    </div>
	<div class="control-group">
      <label class="control-label" for="userimage">Image</label>
      <div class="controls">
		<?php 
		if( $points_level_image ) {?>
			<img src="<?php echo $base."img/points-level/".$points_level_image;?>" width="75" height="75"/>
		<?php 
		}?>
		<input type="file" name="userfile">
      </div>
    </div>
	<div class="control-group">
      <label class="control-label" for="txt_lifetime">Lifetime</label>
      <div class="controls"><input type="text" name="txt_lifetime" placeholder="Lifetime" value="<?php echo $points_level_lifetime;?>"></div>
    </div>
	<div class="control-group">
		<label class="control-label">Benefits & Discounts Allowed?</label>
		<div class="controls">
			<label class="radio inline"><input type="radio" name="rdb_benefits_to_level" value="1" <?php echo ($benefits_to_level==1) ? 'checked="checked"' : '';?>/>&nbsp;Yes</label> 
			<label class="radio inline"><input type="radio" name="rdb_benefits_to_level" value="0" <?php echo ($benefits_to_level==0) ? 'checked="checked"' : '';?>/>&nbsp;No</label>
		</div>
	</div>

	<div class="control-group">
		<label class="control-label">Status</label>
		<div class="controls">
			<label class="radio inline"><input type="radio" name="rdb_status_of_level" value="1" <?php echo ($status_of_level==1) ? 'checked="checked"' : '';?>/>&nbsp;Active</label> 
			<label class="radio inline"><input type="radio" name="rdb_status_of_level" value="0" <?php echo ($status_of_level==0) ? 'checked="checked"' : '';?>/>&nbsp;Inactive</label>
		</div>
	</div>

    <div class="inline text-center">
		<input type="submit" name="submit" value="Save" class="btn btn-primary" />
		<input type="button" name="cancel" value="Cancel" class="btn btn-danger" onclick="javascript:window.location.href='<?php echo $base;?>admin/metadata?type=points_level'" />
    </div>
    </fieldset>
    </form>
    </div>
    <script type="text/javascript">
		$(document).ready(function () {
			$('#frm_points_level').validate({
				highlight: function(element) {
					$(element).parent('div').addClass("text-error");
				},
				rules: {
					cmb_level: {
						required: true,
					}, 
					txt_points_of_level: {
						required: true,
					},
				},
				messages: {
					cmb_level: {
						required: "Please select Level",
					}, 
					txt_points_of_level: {
						required: "Please enter Points of Level",
					},
				}
			});
		});
    </script>   
</div>    
<?php $this->load->view('footer_admin'); ?>