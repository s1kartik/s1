<?php 
$this->load->view('header_admin');
?>
<?php if($_SERVER['REQUEST_METHOD']=='POST'){
    foreach($_POST as $key=>$val) {
        $admin[$key] = $val;
	}
}
?>


<div class="info-container">
    <div class="document-content">
    <form class="form-horizontal frm_update_reggroup" name="frm_update_reggroup" id="frm_update_reggroup" method="post">
		<fieldset>
		<!-- Form Name -->
		<legend>Regulation Content</legend>
		
		<div class="control-group"><label></label><div class="controls" id="id_msg_updreggroup"></div></div>
		
		<div class="control-group">
		  <label class="control-label" for="cmb_parent_regulation">Parent Regulation</label>
		  <div class="controls">
			<select id="cmb_parent_regulation" name="cmb_parent_regulation" placeholder="Select Parent Regulation" class="input-xlarge" required>
				<option value="">-select-</option>
				<?php 
				$regulations = $this->users->getMetaDataList('regulations');
				foreach($regulations as $reg):
					$selected = ($reg['id'] == $admin['in_parent_regulation_id']) ? 'selected="selected"' : '';
				?>
					<option value="<?php echo $reg['id'];?>" <?php echo $selected;?>><?php echo $reg['st_parent_regulation_title'];?></option>
				<?php endforeach;?>
			</select>
		  </div>
		</div>
		<!-- Text input-->
		<div class="control-group">
		  <label class="control-label" for="txt_regulation_number">Regulation Number</label>
		  <div class="controls">
			<input id="txt_regulation_number" name="txt_regulation_number" type="text" title="<?php echo isset($_POST['txt_regulation_number'])?$_POST['txt_regulation_number']:$admin['st_regulation_number'];?>" value="<?php echo isset($_POST['txt_regulation_number'])?$_POST['txt_regulation_number']:$admin['st_regulation_number'];?>" placeholder="Regulation Number" class="input-xlarge" required />
		  </div>
		</div>
		<!-- Text input-->
		<div class="control-group">
		  <label class="control-label" for="txt_title">Title</label>
		  <div class="controls">
			<input id="txt_title" name="txt_title" type="text" title="<?php echo isset($_POST['txt_title'])?$_POST['txt_title']:$admin['st_title'];?>" value="<?php echo isset($_POST['txt_title'])?$_POST['txt_title']:$admin['st_title'];?>" placeholder="Title" class="input-xlarge" required>
		  </div>
		</div>
		<!-- Text input-->
		<div class="control-group">
		  <label class="control-label" for="txt_part">Part</label>
		  <div class="controls">
			<input id="txt_part" name="txt_part" type="text" title="<?php echo isset($_POST['txt_part'])?$_POST['txt_part']:$admin['st_part'];?>" value="<?php echo isset($_POST['txt_part'])?$_POST['txt_part']:$admin['st_part'];?>" placeholder="Part" placeholder="Part" class="input-xlarge" required>
		  </div>
		</div>
		<!-- Text input-->
		<div class="control-group">
		  <label class="control-label" for="txt_subpart">Sub Part</label>
		  <div class="controls">
			<input id="txt_subpart" name="txt_subpart" type="text" title="<?php echo isset($_POST['txt_subpart'])?$_POST['txt_subpart']:$admin['st_subpart'];?>" value="<?php echo isset($_POST['txt_subpart'])?$_POST['txt_subpart']:$admin['st_subpart'];?>" placeholder="Sub Part" placeholder="Sub Part" class="input-xlarge">
		  </div>
		</div>
		
		<div class="inline text-center">
		<input type="hidden" name="id" value="<?php echo $admin['id'];?>" />
		<input type="hidden" name="type" value="regulation_contents" />
		<input type="hidden" name="field" value="st_title" />
		
		<input type="button" id="btn_save_reggroup" class="btn btn-primary" value="Save">
		<input type="button" name="cancel" value="Cancel" class="btn btn-danger" onclick="javascript:window.location.href='<?php echo $base;?>admin/metadata?type=regulation_contents'" />
		</div>
		</fieldset>
    </form>
    </div>

	<?php $type = (isset($_GET['type'])&&$_GET['type']) ? $_GET['type']:''; ?>
	
	<script type="text/javascript">
		function validateRegGroup()
		{
			$.ajax({
				url: '<?php echo $base;?>admin/validateRegGroup', 
				type: 'post', 
				data: $("#frm_update_reggroup").serialize()+"&action=update", 

				success: function(output) {
					if( output.trim() == '' ) {
						window.location.href = "<?php echo $this->base."admin/metadata?type=".$type;?>";
					}
					else {
						$("#id_msg_updreggroup").html(output);
						$("#id_msg_updreggroup").addClass("text-error");
						// $('html, body').animate({ scrollTop: 0 }, 0);
						return false;
					}
				}, 
				error: function(errMsg) {
					alert( errMsg.responseText );
					return false;
				}
			});
		}

		$('#btn_save_reggroup').click(function(e) {
			var parent_regulation 	= $("#cmb_parent_regulation");
			var reg_no 				= $("#txt_regulation_number");
			var title 				= $("#txt_title");
			var part 				= $("#txt_part");
			var $error 				= 0;
			
			if( parent_regulation.val() == '' ) {
				$error = 1;
				parent_regulation.next().remove();
				parent_regulation.parent("div").append("<div class='text-error'>Please select Parent Regulation.</div>");
			}
			else {
				parent_regulation.next().remove();
			}
			if( reg_no.val() == '' ) {
				$error = 1;
				reg_no.next().remove();
				reg_no.parent("div").append("<div class='text-error'>Please select Regulation Number.</div>")
			}
			else {
				reg_no.next().remove();
			}

			if( title.val() == '' ) {
				$error = 1;
				title.next().remove();
				title.parent("div").append("<div class='text-error'>Please select Title.</div>")
			}
			else {
				title.next().remove();
			}
			if( part.val() == '' ) {
				$error = 1;
				part.next().remove();
				part.parent("div").append("<div class='text-error'>Please select Part.</div>")
			}
			else {
				part.next().remove();
			}
			if( $error <= 0 ) {
				$("#id_msg_updreggroup").removeClass("text-error");
				$("#id_msg_updreggroup").html("");
				validateRegGroup();
			}
		});
    </script>   
	
</div>    
<?php $this->load->view('footer_admin'); ?>