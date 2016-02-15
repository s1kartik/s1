<?php 
$this->load->view('header_admin');
$type 			= (isset($_GET['type'])&&$_GET['type']) ? $_GET['type']:'';
$reggroupid 	= (isset($_GET['reggroupid'])&&$_GET['reggroupid']) ? $_GET['reggroupid']:'';
$urlstring 		= "&reggroupid=".$reggroupid;
?>
<script type="text/javascript" src="<?php echo $base;?>js/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="<?php echo $base;?>js/regulation.js"></script>
<script type="text/javascript" src="<?php echo $base;?>js/library.js"></script>
<script type="text/javascript">
	getTinymceEditor(1, 1);

	function addMoreRegSection()
	{
		var s 	= parseInt( $('#hidn_reg_section').val() );
		
		s 		= (s+1);
		
		$('#id_tbl_regsection').append('<tr id="id_tr_regsection'+s+'"></tr>');

		sectionAppend = '&nbsp;<a style="float:right;" href="javascript:void(0);" onclick=javascript:deleteSection("id_tr_regsection'+s+'"); title="Delete Section">Delete Section</a>';
		sectionAppend += '<div class="control-group">';
		sectionAppend += '<label class="control-label" for="txt_section">Section</label>';
		sectionAppend += '<div class="controls">';
		sectionAppend += '<input id="txt_section'+s+'" name="txt_section[]" type="text" placeholder="Section" class="input-xlarge" required />';
		sectionAppend += '</div>';
		sectionAppend += '</div>';
		
		sectionAppend += '<div class="control-group">';
		sectionAppend += '<label class="control-label" for="txt_subsection">Sub Section</label>';
		sectionAppend += '<div class="controls">';
		sectionAppend += '<input id="txt_subsection'+s+'" name="txt_subsection[]" type="text" placeholder="Sub Section" class="input-xlarge">';
		sectionAppend += '</div>';
		sectionAppend += '</div>';

		sectionAppend += '<div class="control-group">';
		sectionAppend += '<label class="control-label" for="txt_item">Item</label>';
		sectionAppend += '<div class="controls">';
		sectionAppend += '<input id="txt_item'+s+'" name="txt_item[]" type="text" placeholder="Item" class="input-xlarge">';
		sectionAppend += '</div>';
		sectionAppend += '</div>';
		
		sectionAppend += '<div class="control-group">';
		sectionAppend += '<label class="control-label" for="txt_subitem">Sub Item</label>';
		sectionAppend += '<div class="controls">';
		sectionAppend += '<input id="txt_subitem'+s+'" name="txt_subitem[]" type="text" placeholder="Sub Item" class="input-xlarge">';
		sectionAppend += '</div>';
		sectionAppend += '</div>';
		
		sectionAppend += '<div class="control-group">';
		sectionAppend += '<label class="control-label" for="txtarea_content">Content</label>';
		sectionAppend += '<div class="controls">';
		sectionAppend += '<textarea id="txtarea_content'+s+'" required name="txtarea_content[]" placeholder="Content of the Regulation" class="content-editor"></textarea>';
		sectionAppend += '<div id="cnt_regcontent'+s+'"></div>';
		sectionAppend += '</div>';
		sectionAppend += '</div>';

		$('#id_tr_regsection'+s).append( sectionAppend );

		getTinymceEditor(s, 1);
		
		$('#hidn_reg_section').val(s);
	}
</script>

<div class="info-container">
    <div class="document-content">
		<form class="form-horizontal adminfrm" name="frm_new_regsection" id="frm_new_regsection" method="post" action="">
			<fieldset>
				<!-- Form Name -->
				<legend>Regulation Section</legend>
				<input type="hidden" name="hidn_reg_section" id="hidn_reg_section" value="1">
				<!-- Text input-->
				<?php  
				$rows_regcontents 		= $this->users->getElementByID('tbl_regulation_contents', $reggroupid );
				$regulation_number 		= $rows_regcontents['st_regulation_number'];
				$parent_regulation_id	= $rows_regcontents['in_parent_regulation_id'];
				?>
				<div class="control-group"><label></label><div class="controls text-error" id="id_msg_regsection"></div></div>
											
				<table align="center" id="id_tbl_regsection" width="100%">
					<tr id="id_tr_regsection1">
						<td>
							<div class="control-group">
								<label class="control-label">Regulation Number</label>
								<div class="controls">
									<input value="<?php echo $regulation_number;?>" type="text" class="input-xlarge" readonly />
								</div>
							</div>
							<!-- Text input-->
							<div class="control-group">
							  <label class="control-label" for="txt_section">Section</label>
							  <div class="controls">
								<input id="txt_section1" name="txt_section[]" type="text" placeholder="Section" class="input-xlarge" required />
							  </div>
							</div>
							<!-- Text input-->
							<div class="control-group">
							  <label class="control-label" for="txt_subsection">Sub Section</label>
							  <div class="controls">
								<input id="txt_subsection1" name="txt_subsection[]" type="text" placeholder="Sub Section" class="input-xlarge">
							  </div>
							</div>
							<!-- Text input-->
							<div class="control-group">
							  <label class="control-label" for="txt_item">Item</label>
							  <div class="controls">
								<input id="txt_item1" name="txt_item[]" type="text" placeholder="Item" class="input-xlarge">
							  </div>
							</div>
							<!-- Text input-->
							<div class="control-group">
							  <label class="control-label" for="txt_subitem">Sub Item</label>
							  <div class="controls">
								<input id="txt_subitem1" name="txt_subitem[]" type="text" placeholder="Sub Item" class="input-xlarge">
							  </div>
							</div>
							<!-- Text input-->
							<div class="control-group">
							  <label class="control-label" for="txtarea_content">Content</label>
							  <div class="controls">
								<textarea id="txtarea_content1" required name="txtarea_content[]" class="content-editor"></textarea>
								<div id="cnt_regcontent1"></div>
							  </div>
							</div>
						</td>
					</tr>
				</table>

				<input type="hidden" name="parent_regulation_id" id="parent_regulation_id" value="<?php echo $parent_regulation_id;?>">
				<input type="hidden" name="reggroupid" id="reggroupid" value="<?php echo $reggroupid;?>">
				<input type="hidden" name="regulation_number" id="regulation_number" value="<?php echo $regulation_number;?>">
				
				<div class="textright mart10"><input type="button" class="btn btn-warning" value="Add New Section" onclick="javascript: addMoreRegSection(1);" /></div>
				<div class="textright mart10">
					<a id="btn_save_regsection" onclick="javascript:validateSection('frm_new_regsection','insert', '<?php echo $type;?>', '<?php echo $urlstring;?>');" class="btn btn-primary">Save</a>
					<input type="button" name="cancel" value="Cancel" class="btn btn-danger" onclick="javascript:window.location.href='<?php echo $base;?>admin/metadata?type=regulation_sections&reggroupid=<?php echo $reggroupid;?>'" />
				</div>
			</fieldset>
		</form>
    </div>

	<script type="text/javascript">	
		$(document).ready(function () {
			$('#frm_new_regsection').validate({
				rules: {
					'txt_section[]': { required: true },
					'txtarea_content[]': { required: true },
				},
				messages: {
					'txt_section[]': { required: "Please enter Section." },
					'txtarea_content[]': { required: "Please enter Content." },
				},
				highlight: function(element) {
					$(element).parent('div').addClass("text-error");
				},
				unhighlight: function(element) {
					$(element).parent('div').removeClass("text-error");
				}
			});
		});
	</script>	
</div>    
<?php $this->load->view('footer_admin'); ?>