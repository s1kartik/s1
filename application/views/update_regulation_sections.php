<?php 
$this->load->view('header_admin');
$type 			= (isset($_GET['type'])&&$_GET['type']) ? $_GET['type']:'';
$reggroupid 	= (isset($_GET['reggroupid'])&&$_GET['reggroupid']) ? $_GET['reggroupid']:'';
$urlstring 		= "&reggroupid=".$reggroupid;
?>
<div class="info-container">
    <div class="document-content">
    <form class="form-horizontal" method="post" id="frm_upd_regsection" name="frm_upd_regsection" action="">
		<fieldset>
		<!-- Form Name -->
		<legend>Regulation Section</legend>
		<!-- Text input-->
		<?php  
		$rows_regcontents 		= $this->users->getElementByID('tbl_regulation_contents', $reggroupid );
		$regulation_number 		= $rows_regcontents['st_regulation_number'];
		$parent_regulation_id	= $rows_regcontents['in_parent_regulation_id'];
		?>
		
		<div class="control-group"><label></label><div class="controls text-error" id="id_msg_regsection"></div></div>
		
		<div class="control-group">
		  <label class="control-label">Regulation Number</label>
		  <div class="controls"><input value="<?php echo $regulation_number;?>" type="text" class="input-xlarge" readonly /></div>
		</div>

		<!-- Text input-->
		<div class="control-group">
		  <label class="control-label" for="txt_section">Section</label>
		  <div class="controls">
			<input id="txt_section" name="txt_section" type="text" title="<?php echo isset($_POST['txt_section'])?$_POST['txt_section']:$admin['st_section'];?>" value="<?php echo isset($_POST['txt_section'])?$_POST['txt_section']:$admin['st_section'];?>" placeholder="Section" class="input-xlarge" required />
		  </div>
		</div>
		<!-- Text input-->
		<div class="control-group">
		  <label class="control-label" for="txt_subsection">Sub Section</label>
		  <div class="controls">
			<input id="txt_subsection" name="txt_subsection" type="text" title="<?php echo isset($_POST['txt_subsection'])?$_POST['txt_subsection']:$admin['st_subsection'];?>" value="<?php echo isset($_POST['txt_subsection'])?$_POST['txt_subsection']:$admin['st_subsection'];?>" placeholder="Sub Section" class="input-xlarge">
		  </div>
		</div>
		<!-- Text input-->
		<div class="control-group">
		  <label class="control-label" for="txt_item">Item</label>
		  <div class="controls">
			<input id="txt_item" name="txt_item" type="text" placeholder="Item" title="<?php echo isset($_POST['txt_item'])?$_POST['txt_item']:$admin['st_item'];?>" value="<?php echo isset($_POST['txt_item'])?$_POST['txt_item']:$admin['st_item'];?>" class="input-xlarge">
		  </div>
		</div>
		<!-- Text input-->
		<div class="control-group">
		  <label class="control-label" for="txt_subitem">Sub Item</label>
		  <div class="controls">
			<input id="txt_subitem" name="txt_subitem" type="text" title="<?php echo isset($_POST['txt_subitem'])?$_POST['txt_subitem']:$admin['st_subitem'];?>" value="<?php echo isset($_POST['txt_subitem'])?$_POST['txt_subitem']:$admin['st_subitem'];?>" placeholder="Sub Item" class="input-xlarge">
		  </div>
		</div>
		<!-- Text input-->
		<div class="control-group">
		  <label class="control-label" for="txtarea_content">Content</label>
		  <div class="controls">
			<textarea id="txtarea_content" required name="txtarea_content" title="<?php echo isset($_POST['txtarea_content'])?$_POST['txtarea_content']:$admin['st_content'];?>" placeholder="Content of the Regulation" class="content-editor"><?php echo isset($_POST['txtarea_content'])?$_POST['txtarea_content']:$admin['st_content'];?></textarea>
		  </div>
		</div>

		<input type="hidden" name="reggroupid" id="reggroupid" value="<?php echo $reggroupid;?>">
		<input type="hidden" name="parent_regulation_id" id="parent_regulation_id" value="<?php echo $parent_regulation_id;?>">
		<input type="hidden" name="id" value="<?php echo $admin['id'];?>" />
		<input type="hidden" name="field" value="st_section" />
		<input type="hidden" name="type" value="regulation_sections" />
		<input type="hidden" name="regulation_number" id="regulation_number" value="<?php echo $regulation_number;?>">

		<div class="inline text-center">
		<a id="btn_save_regsection" onclick="javascript:validateSection('frm_upd_regsection','update', '<?php echo $type;?>', '<?php echo $urlstring;?>');" class="btn btn-primary">Save</a>
		<input type="button" name="cancel" value="Cancel" class="btn btn-danger" onclick="javascript:window.location.href='<?php echo $base;?>admin/metadata?type=regulation_sections&reggroupid=<?php echo $reggroupid;?>'" />
		</div>
		</fieldset>
    </form>
    </div>

<script type="text/javascript" src="<?php echo $base;?>js/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="<?php echo $base;?>js/regulation.js"></script>
<script type="text/javascript" src="<?php echo $base;?>js/library.js"></script>
<script type="text/javascript">
	getTinymceEditor();
</script>

<script type="text/javascript">
	$(document).ready(function () {
		$('#frm_upd_regsection').validate({
			rules: {
				txt_section: { required: true },
				txtarea_content: { required: true }
			},
			messages: {
				txt_section: { required: "Please select Section." },
				txtarea_content: { required: "Please enter Content." }
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