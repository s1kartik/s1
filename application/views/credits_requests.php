<?php $this->load->view('header_admin');
$credits_requested_by 	 = (isset($credits_requests['st_credits_requested_by']) && $credits_requests['st_credits_requested_by']) ? $credits_requests['st_credits_requested_by'] : '';
$credits_requests_status = (isset($credits_requests['st_credits_request_status']) && $credits_requests['st_credits_request_status']) ? $credits_requests['st_credits_request_status'] : '';
$credits_requested 		 = (isset($credits_requests['in_credits_requested']) && $credits_requests['in_credits_requested']) ? $credits_requests['in_credits_requested'] : '';
$credits_price			 = (isset($credits_requests['in_credits_price']) && $credits_requests['in_credits_price']) ? $credits_requests['in_credits_price'] : '';
$credits_request_comments= (isset($credits_requests['st_credits_request_comments']) && $credits_requests['st_credits_request_comments']) ? $credits_requests['st_credits_request_comments'] : '';

$field_disabled = ("approved"==$credits_requests_status || "payment received"==$credits_requests_status) ? 'disabled' : '';

?>
<div class="info-container">
    <div class="document-content">
    <form class="form-horizontal adminfrm" id="frm_credits_requests" method="post" action="">
    <fieldset>
    <!-- Form Name -->
    <legend>Credits Request</legend>

	<div class="control-group">
      <label class="control-label" for="txt_credits_requested_by">Credits Requested By</label>
      <div class="controls"><input type="text" name="txt_credits_requested_by" readonly value="<?php echo $credits_requested_by;?>"></div>
    </div>

    <!-- Text input-->
    <div class="control-group">
      <label class="control-label" for="txt_credits_requested">Credits Requested</label>
      <div class="controls"><input type="text" name="txt_credits_requested" disabled value="<?php echo $credits_requested;?>"></div>
    </div>
	
	<div class="control-group">
      <label class="control-label" for="txt_credits_price">Set Credits Price</label>
      <div class="controls"><input type="text" name="txt_credits_price" <?php echo ("payment received"==$credits_requests_status)?'disabled':'';?> placeholder="Credits Amount" value="<?php echo $credits_price;?>"></div>
    </div>

	<div class="control-group">
      <label class="control-label" for="txt_creditspkg_name">Status</label>
      <div class="controls">
		<select name="cmb_credits_request_status" required <?php echo $field_disabled;?>>
			<option value="pending" <?php echo ('pending'==$credits_requests_status)?'selected="selected"':'';?>>Pending</option>
			<option value="approved" <?php echo ('approved'==$credits_requests_status)?'selected="selected"':'';?>>Approved</option>
			<option value="not approved" <?php echo ('not approved'==$credits_requests_status)?'selected="selected"':'';?>>Not Approved</option>
			<option value="payment received" <?php echo ('payment received'==$credits_requests_status)?'selected="selected"':'';?>>Payment Received</option>
		</select>
      </div>
    </div>
	
	<div class="control-group">
      <label class="control-label" for="txt_credits_request_comments">Comments</label>
      <div class="controls">
	  <textarea name="txt_credits_request_comments"><?php echo $credits_request_comments;?></textarea></div>
    </div>
	
    <div class="inline text-center">
		<input type="submit" name="submit" value="Save" class="btn btn-primary" />
		<input type="button" name="cancel" value="Cancel" class="btn btn-danger" onclick="javascript:window.location.href='<?php echo $base;?>admin/metadata?type=credits_requests'" />
    </div>
    </fieldset>
    </form>
    </div>
    <script type="text-javascript">
	$(document).ready(function () {
		$('#frm_credits_requests').validate({
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