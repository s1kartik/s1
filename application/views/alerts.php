<?php $this->load->view('header_admin');
$alert_title 			= (isset($s1_alerts['st_title']) && $s1_alerts['st_title']) ? $s1_alerts['st_title'] : '';
$alert_summary			= (isset($s1_alerts['st_summary']) && $s1_alerts['st_summary']) ? $s1_alerts['st_summary'] : '';
$alert_locations 		= (isset($s1_alerts['st_locations']) && $s1_alerts['st_locations']) ? $s1_alerts['st_locations'] : '';
$alert_legal_requirements = (isset($s1_alerts['st_legal_requirements']) && $s1_alerts['st_legal_requirements']) ? $s1_alerts['st_legal_requirements'] : '';
$alert_precautions 		= (isset($s1_alerts['st_precautions']) && $s1_alerts['st_precautions']) ? $s1_alerts['st_precautions'] : '';
$alert_images 			= (isset($s1_alerts['st_images']) && $s1_alerts['st_images']) ? explode(",", $s1_alerts['st_images']) : array();
$alert_video 			= (isset($s1_alerts['st_video']) && $s1_alerts['st_video']) ? $s1_alerts['st_video'] : '';
$alert_status 			= (isset($s1_alerts['in_status']) && $s1_alerts['in_status']) ? $s1_alerts['in_status'] : '';
?>
<script type="text/javascript" src="<?php echo $base;?>js/library.js"></script>
<script type="text/javascript" src="<?php echo $base;?>js/tinymce/tinymce.min.js"></script>
<!-- Start - Fancy box image --> 
	<!-- Add fancyBox main JS and CSS files -->
		<script type="text/javascript" src="<?php echo $base."plugin/fancybox/source/jquery.fancybox.js?v=2.1.5";?>"></script>
		<link rel="stylesheet" type="text/css" href="<?php echo $base."plugin/fancybox/source/jquery.fancybox.css?v=2.1.5";?>" media="screen" />
<!-- End - Fancy box image --> 
<script type="text/javascript" src="<?php echo $base;?>js/regulation.js"></script>
<script type="text/javascript">
getTinymceEditor();
function deleteAlertImage( id )
{
	$('#'+id).slideUp('medium', function () {
		$("#"+id).html('');
		$("#"+id).remove('');
	});
	$cnt_alert_image = $('#hidn_alert_image').val();
	$('#hidn_alert_image').val( parseInt($cnt_alert_image-1) );
}
function addMoreAlertImage()
{
	var cntImage 	= parseInt( $('#hidn_alert_image').val() );
	if( cntImage <= 3 ) {
		cntImage = (cntImage+1);
		var imageAppend = '<div class="control-group" id="id_div_image_alert'+cntImage+'"><label class="control-label" for="image">Select Image</label>';
		imageAppend += '<div class="controls"><input name="userfile[]" id="alert_image'+cntImage+'" type="file" class="input-xlarge"/>';
		imageAppend += '&nbsp;<a href="javascript:void(0);" del-count="'+cntImage+'" title="Delete Image" onclick=javascript:deleteAlertImage("id_div_image_alert'+cntImage+'");>Delete</a>';
		imageAppend += '</div></div>';
	
		$('#id_alert_image_bucket').append( imageAppend );
		$('#hidn_alert_image').val(cntImage);
	}
	else {
		alert('You can add maximum of 3 Images');
		return false;
	}
}
</script>

<div class="info-container">
    <div class="document-content">
    <form class="form-horizontal adminfrm" id="frm_upd_alerts" method="post" enctype="multipart/form-data" action="">
    <fieldset>
    <legend>Hazard Alerts</legend>
    <div class="control-group">
      <label class="control-label" for="txt_alert_title">Alert Title</label>
      <div class="controls">
        <input id="txt_alert_title" name="txt_alert_title" type="text" placeholder="Alert Title" class="input-xlarge" value="<?php echo $alert_title;?>" required />
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="txt_alert_summary">Summary</label>
      <div class="controls">
        <textarea id="txt_alert_summary" name="txt_alert_summary" class="content-editor"><?php echo $alert_summary;?></textarea>
      </div>
    </div>
	<div class="control-group">
      <label class="control-label" for="txt_alert_locations">Locations</label>
      <div class="controls">
        <textarea id="txt_alert_locations" name="txt_alert_locations" class="content-editor"><?php echo $alert_locations;?></textarea>
      </div>
    </div>
	<div class="control-group">
      <label class="control-label" for="txt_alert_legel_requirements">Legal Requirements</label>
      <div class="controls">
        <textarea id="txt_alert_legel_requirements" name="txt_alert_legel_requirements" class="content-editor"><?php echo $alert_legal_requirements;?></textarea>
      </div>
    </div>
	<div class="control-group">
      <label class="control-label" for="txt_alert_precautions">Precautions</label>
      <div class="controls">
        <textarea id="txt_alert_precautions" name="txt_alert_precautions" class="content-editor"><?php echo $alert_precautions;?></textarea>
      </div>
    </div>
      <div id="id_alert_image_bucket">
		<?php 
		$cnt_alert_image = 0;
		// Common::pr($alert_images);
		
		if(sizeof($alert_images)>0) {
			foreach($alert_images as $val_img) {
				$cnt_alert_image++;
				?>
				<div class="control-group" id="id_div_image_alert<?php echo ($cnt_alert_image+1);?>">
				  <label class="control-label" for="">Select Image</label>
				  <div class="controls">
					<input type="file" name="userfile[]" id="alert_image<?php echo ($cnt_alert_image+1);?>" class="input-xlarge"/>
					<?php 
					if( file_exists(FCPATH.$this->path_upload_alerts.$val_img) ) { ?>
						<a title="Click to see full image" class="fancybox-media" href="<?php echo $base.$this->path_upload_alerts.$val_img;?>" data-fancybox-group="gallery">
							<img class="w45 h40" src="<?php echo $base.$this->path_upload_alerts.$val_img;?>">
						</a>
						<?php 
					}?>
				  </div>
				</div>
				<?php 
			}
		}
		else {?>
			<div class="control-group" id="id_div_image_alert1">
			  <label class="control-label" for="">Select Image</label>
			  <div class="controls"><input type="file" name="userfile[]" id="alert_image1" class="input-xlarge"/></div>
			</div>
			<?php 
			$cnt_alert_image = 1;
		}?>
	  </div>
	  <input type="hidden" id="hidn_alert_image" name="hidn_alert_image" value="<?php echo ($cnt_alert_image+1);?>"><div class="textright">
	  <input type="button" class="btn btn-warning" value="Add New Image" onclick="javascript: addMoreAlertImage('<?php echo $cnt_alert_image;?>');" /></div>

	  <div class="control-group">
		  <label class="control-label" for="txt_alert_video">Alert Video(Enter Video Code)</label>
		  <div class="controls">
			<input id="txt_alert_video" name="txt_alert_video" type="text" placeholder="Enter Video Code" class="input-xlarge" value="<?php echo $alert_video;?>"/>
			<?php 
			if( $alert_video ) {?>
				<a class="fancybox fancybox.iframe" href="<?php echo "https://youtube.com/embed/".$alert_video;?>?autoplay=1">See Video</a>
			<?php 
			}?>
		  </div>
	  </div>
	
	<div class="control-group">
		<label class="control-label">Select the criteria to send the Alerts of your chioce</label>
		<div class="span5" align="center">
			<select name="cmb_alert_criteria" id="cmb_alert_criteria" required class="">
				<option value="all" <?php echo ('all'==$s1_alert_criteria)?'selected="selected"':'';?> title="All S1 Users">All S1 Users</option>
				<option value="usertype" <?php echo ('usertype'==$s1_alert_criteria)?'selected="selected"':'';?> title="By Usertype">By Usertype</option>
				<option value="industry" <?php echo ('industry'==$s1_alert_criteria)?'selected="selected"':'';?> title="By Industry">By Industry</option>
				<option value="sector" <?php echo ('sector'==$s1_alert_criteria)?'selected="selected"':'';?> title="By Industry/Sector">By Industry/Sector</option>
				<option value="trade" <?php echo ('trade'==$s1_alert_criteria)?'selected="selected"':'';?> title="By Industry/Sector/Trade">By Industry/Sector/Trade</option>
				<option value="worker" <?php echo ('worker'==$s1_alert_criteria)?'selected="selected"':'';?> title="Worker">Worker</option>
				<option value="alcr6" <?php echo ('alcr6'==$s1_alert_criteria)?'selected="selected"':'';?> title="Workers with Employer status selected as Self-employed or Unemployed">Workers with Employer status selected as "Self-employed" or "Unemployed"</option>
				<option value="student" <?php echo ('student'==$s1_alert_criteria)?'selected="selected"':'';?> title="Student">Student</option>
				<option value="employer" <?php echo ('employer'==$s1_alert_criteria)?'selected="selected"':'';?> title="Employer">Employer</option>
				<option value="employer-connection" <?php echo ('employer-connection'==$s1_alert_criteria)?'selected="selected"':'';?> title="All workers connected to Employer(s)">All workers connected to Employer(s)</option>
				<option value="union" <?php echo ('union'==$s1_alert_criteria)?'selected="selected"':'';?> title="Union">Union</option>
				<option value="union-connection" <?php echo ('union-connection'==$s1_alert_criteria)?'selected="selected"':'';?> title="All S1 users connected to Union">All S1 users connected to Union(s)</option>
			</select>
		</div>
	</div>
	
	<div class="control-group" id="id_alert_selected">
	</div>
	<?php // echo Ajax::ajaxHazardsAlertCriteria();?>
	
	
	<div class="control-group">
		<label class="control-label">Status</label>
		<div class="controls">
			<?php $checked = 'checked="checked"';?>
			<label class="radio inline"><input type="radio" name="txt_alert_status" value="1" <?php echo ($alert_status==1) ? $checked : '';?>/>&nbsp;Active</label> 
			<label class="radio inline"><input type="radio" name="txt_alert_status" value="0" <?php echo ($alert_status==0) ? $checked : '';?>/>&nbsp;Inactive</label>
		</div>
	</div>
    <div class="inline text-center">
		<input type="submit" name="submit" value="Save" class="btn btn-primary" />
		<input type="button" name="cancel" value="Cancel" class="btn btn-danger" onclick="javascript:window.location.href='<?php echo $base;?>admin/metadata?type=alerts'" />
    </div>
    </fieldset>
    </form>
    </div>
	
	<script type="text/javascript" src="<?php echo $base;?>js/common.js"></script>

	<link rel="stylesheet" type="text/css" href="<?php echo $base."css/jquery-multiselect/jquery.multiselect.css";?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo $base."css/jquery-multiselect/jquery.multiselect.filter.css";?>" />
	<!--<link rel="stylesheet" type="text/css" href="<?php echo $base."css/jquery.ui.css";?>" />-->
	<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/ui-lightness/jquery-ui.css" />
	<script type="text/javascript" src="<?php echo $base."js/jquery-ui.js";?>"></script>
	<script type="text/javascript" src="<?php echo $base."js/jquery/jquery-multiselect/jquery.multiselect.js";?>"></script>
	<script type="text/javascript" src="<?php echo $base."js/jquery/jquery-multiselect/jquery.multiselect.filter.js";?>"></script>
	<script type="text/javascript">
		$(function(){
			$("#cmb_alert_criteria").multiselect({
				multiple: false, 
				header: "Select an option", 
				noneSelectedText: "Select an Option"
			});
		});

		$("#cmb_alert_criteria").change(function() {
			var val_alert_criteria 	= $(this).val();
			// var alerted_users 	= '<?php echo $alerted_users;?>';
			$.ajax({
				url: js_base_path+'ajax/ajaxHazardsAlertCriteria', 
				type: 'post', 
				data: 'valAlertCriteria='+val_alert_criteria, 
				success: function(output) {
					$("#id_alert_selected").html(output);
				},
				error: function(errMsg) {
					alert( errMsg.responseText );
					return false;
				}
			});

			/*
			$('.div-alerts-criteria').show();
			if( val_salerts_criteria!="trade" || val_salerts_criteria!="sector" ) {
				$(".div-alerts-criteria div[class*='cls-alerts-']").hide();
			}
			$(".div-alerts-criteria").find('.cls-alerts-'+val_salerts_criteria).show();

			if( val_salerts_criteria=="trade" ) {
				$(".div-alerts-criteria .cls-alerts-industry").show();
				$(".div-alerts-criteria .cls-alerts-sector").show();
			}
			if( val_salerts_criteria=="sector" ) {
				$(".div-alerts-criteria .cls-alerts-industry").show();
			}*/
		});

		$(document).ready(function () {
			$('.div-alerts-criteria').hide();
			$('#frm_upd_alerts').validate({
				highlight: function(element) {
					$(element).parent('div').addClass("text-error");
				},
				rules: {
					txt_alert_text: {required: true,},
					"txt_users_alerted[]": {required: true,}
				},
				messages: {
					txt_alert_text: {required: "Please enter Alert Text",}, 
					"txt_users_alerted[]": {required: "Please select atleast 1 User",}
				}
			});
			
			var val_alert_criteria = '<?php echo $s1_alert_criteria;?>';
			var alerted_users = '<?php echo $alerted_users;?>';
			var alert_criteria_options = '<?php echo $st_alert_criteria_options;?>';
			$.ajax({
				url: js_base_path+'ajax/ajaxHazardsAlertCriteria', 
				type: 'post', 
				data: 'valAlertCriteria='+val_alert_criteria+'&alerted_users='+alerted_users+'&alert_criteria_options='+alert_criteria_options, 
				success: function(output) {
					$("#id_alert_selected").html(output);
				},
				error: function(errMsg) {
					alert( errMsg.responseText );
					return false;
				}
			});

		});
    </script>   
</div>    
<?php $this->load->view('footer_admin'); ?>