<?php $this->load->view('header_admin');
$credits_assigned_to 	 = (isset($rows_credits_assign['in_credits_assign_to']) && $rows_credits_assign['in_credits_assign_to']) ? $rows_credits_assign['in_credits_assign_to'] : '';
$credits_assign_status = (isset($rows_credits_assign['st_credits_assign_status']) && $rows_credits_assign['st_credits_assign_status']) ? $rows_credits_assign['st_credits_assign_status'] : 'approved';
$credits_assigned 		 = (isset($rows_credits_assign['in_credits_assigned']) && $rows_credits_assign['in_credits_assigned']) ? $rows_credits_assign['in_credits_assigned'] : '';
$credits_price			 = (isset($rows_credits_assign['in_credits_price']) && $rows_credits_assign['in_credits_price']) ? $rows_credits_assign['in_credits_price'] : '';
$credits_assign_comments= (isset($rows_credits_assign['st_credits_assign_comments']) && $rows_credits_assign['st_credits_assign_comments']) ? $rows_credits_assign['st_credits_assign_comments'] : '';

$field_disabled = ("assigned"==$credits_assign_status) ? 'disabled' : '';
?>
<div class="info-container">
    <div class="document-content">
    <form class="form-horizontal adminfrm" id="frm_credits_assign" method="post" action="">
    <fieldset>
    <!-- Form Name -->
    <legend>Assign Credits</legend>

	<div class="control-group">
      <label class="control-label" for="cmb_credits_assign_to">Select User</label>
       <div class="controls">
		<select name="cmb_credits_assign_to" required <?php echo ($creditsassign_id) ? 'disabled' : '';?>>
			<option value="">-select-</option>
			<?php 
			$rows_users = $this->users->getMetaDataList('user','status=1','ORDER BY email_addr','id,email_addr');
			if( isset($rows_users) && sizeof($rows_users) ) {
			foreach( $rows_users AS $val_users ) {
				$selected = ($credits_assigned_to == $val_users['id']) ? 'selected="selected"' : '';
				?>
				<option value="<?php echo $val_users['id'];?>"<?php echo $selected;?>><?php echo $val_users['email_addr'];?></option>
				<?php 
			}
			}?>
		</select>
      </div>
    </div>

    <!-- Text input-->
    <div class="control-group">
      <label class="control-label" for="txt_credits_assigned">Credits</label>
      <div class="controls"><input type="text" name="txt_credits_assigned" value="<?php echo $credits_assigned;?>" <?php echo ($creditsassign_id) ? 'disabled' : '';?>></div>
    </div>
	
	<div class="control-group">
      <label class="control-label" for="txt_credits_price">Set Credits Price</label>
      <div class="controls"><input type="text" name="txt_credits_price" placeholder="Credits Amount" value="<?php echo $credits_price;?>" <?php echo ($creditsassign_id) ? 'disabled' : '';?>></div>
    </div>
	
	<div class="control-group">
      <label class="control-label" for="txt_creditspkg_name">Status</label>
      <div class="controls">
		<select name="cmb_credits_request_status" <?php echo $field_disabled;?> required>
			<option value="pending" <?php echo ('pending'==$credits_assign_status)?'selected="selected"':'';?>>Pending</option>
			<option value="assigned" <?php echo ('assigned'==$credits_assign_status)?'selected="selected"':'';?>>Assigned</option>
		</select>
      </div>
    </div>
	
	<div class="control-group">
      <label class="control-label" for="txt_credits_assign_comments">Comments</label>
      <div class="controls">
	  <textarea name="txt_credits_assign_comments"><?php echo $credits_assign_comments;?></textarea></div>
    </div>
	
    <div class="inline text-center">
		<input type="submit" name="submit" value="Save" class="btn btn-primary" />
		<input type="button" name="cancel" value="Cancel" class="btn btn-danger" onclick="javascript:window.location.href='<?php echo $base;?>admin/metadata?type=credits_assign'" />
    </div>
    </fieldset>
    </form>
    </div>
    <script type="text-javascript">
	$(document).ready(function () {
		$('#frm_credits_assign').validate({
			highlight: function(element) {
					$(element).parent('div').addClass("text-error");
				},
			rules: {
    		    cmb_credits_assigned_to: {
					required: true,
                }
    		},
    		messages: {
    		    cmb_credits_assigned_to: {
                    required: "Please select User",
                }
    		}
		});
    });
    </script>   
</div>    
<?php $this->load->view('footer_admin'); ?>