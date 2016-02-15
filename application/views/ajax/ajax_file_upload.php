<?php $this->load->view('header_admin');?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<META NAME="ROBOTS" CONTENT="NOINDEX, NoFOLLOW" />
<title>Multiple File Upload</title>
<script type="text/javascript" src="<?php echo $base;?>js/jquery/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo $base;?>js/multifile/js/uploader.js"></script>
<link type="text/css" href="js/multifile/css/uploader.css" rel="stylesheet" />

<script type="text/javascript">
$(document).ready(function()
{
	new multiple_file_uploader
	({
		form_id: "fileUpload", 
		autoSubmit: true,
		server_url: "<?php echo $base;?>ajax/ajaxFileUpload" // PHP file for uploading the browsed files
	});
});
</script>
</head>
<body>

<form name="fileUpload" id="fileUpload" action="javascript:void(0);" enctype="multipart/form-data">
<div class="file_browser"><input type="file" name="multiple_files[]" id="_multiple_files" class="hide_broswe" multiple /></div>
<div class="file_upload"><input type="submit" value="Upload" class="upload_button" /> </div>
</form>
</div>	
<div class="file_boxes">
<span id="removed_files"></span>
</div>














</body>
</html>