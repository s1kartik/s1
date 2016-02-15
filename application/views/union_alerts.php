<?php $this->load->view('header_admin');
$union['id'] 	= isset($union['id']) ? $union['id'] : '';

$is_training_centre		= '';
if( "7" == $this->sess_usertype ) {
	$check_training_centre 	= $this->users->getUserMetaByID($this->sess_userid);
	$is_training_centre 	= isset($check_training_centre['union_training_centre']) && $check_training_centre['union_training_centre'] ? $check_training_centre['union_training_centre'] : '';
	$campus_names			= isset($check_training_centre['campus_name']) && $check_training_centre['campus_name'] ? $check_training_centre['campus_name'] : '';	
}

// Check id Selected Union from url, is Instructor's own union or included in his parent unions //
	$access_for_training = $this->users->checkUnionIsInstructorsUnion($union['id']);
	// echo $access_for_training;
	?>
<div class="homebg ">
	<!--BEGIN PAGE TITLE-->
    <div class="container-fluid">
        <div class="main-content padding-metro-header subheader-secondary clearfix fg-grayLighter">
        <em class="margin20"><h3>HAZARDS ALERTS - <?php echo isset($union['firstname']) ? strtoupper($union['firstname']) : '';?> <?php echo isset($union['lastname']) ? strtoupper($union['lastname']) : '';?></h3></em>
        </div>
    </div>
    <!--END PAGE TITLE-->

	<div class="union-container u-metro">
		<!--------START UNION PROFILE HEAD-------->
		<div class="heading ad-heading">
			<span class="ad-tab " ><a data-toggle="modal" class="btn btn-warning" href="#ad-modal">ADVERTISING</a></span>
			<!-- START ADVERTISING MODAL -->
			<div id="ad-modal" class="modal fade hide">
				<span data-dismiss="modal" class="remove"><i class="icon-remove icon-white"></i></span>
				<img src="<?php echo $base;?>img/ad-examples/nissan_1024x724.jpg"/>
			</div>
			<!-- END MODAL -->	
			
			<div class="row-fluid">
				<!-- START HEADER INFORMATION-->
				<div class="span3">
					<div class="u-img">
						<?php 
						$pimg = (!empty($union['profile_image'])) ? $base.$this->path_upload_profiles.$union['profile_image'] : $base."img/default.png";?>
						<img src="<?php echo $pimg;?>">
					</div>
				</div>			
				<div class="span9">
					<div class="u-details">
						<?php 
						$city = $province = $country = '';
						if( isset($is_training_centre) && "on" == $is_training_centre ) {
							foreach( $parent_unions AS $key_parent_unions => $val_parent_unions ) {
								$union 		= $this->users->getUserByID( $val_parent_unions );
								$usermeta 	= $this->users->getUserMetaByID( $val_parent_unions );
								?>
								<h3 class="u-name"><?php echo isset($union['firstname']) ? strtoupper($union['firstname']) : '';?> <?php echo isset($union['lastname']) ? strtoupper($union['lastname']) : '';?>
                                <button class="btn btn-warning"  type="button" title="Connect"><img src="<?php echo $base;?>img/myprofile/connections.png" width="30"></button>
                                </h3>
								<h5 class="u-trade">
									<?php 
									$union['industry_id'] = isset($union['industry_id']) ? $union['industry_id'] : '';
									$industry = $this->users->getElementByID('tbl_industry', $union['industry_id']);
									if( isset($industry) && sizeof($industry) ) {
										$industry = $industry['industryname'];
										echo strtoupper($industry);
									}?>
								</h5>
								<?php 
								if(isset($usermeta['city_id'])) { // Get City //
									$city = $this->users->getElementByID('tbl_city', $usermeta['city_id']);
									$city = $city['cityname'];
								}
								if(isset($usermeta['province_id'])) { // Get Province //
									$province = $this->users->getElementByID('tbl_province', $usermeta['province_id']);
									$province = (isset($province['provincename'])&&$province['provincename']) ? ", ".$province['provincename'] : '';
								}
								if(isset($usermeta['country_id'])) { // Get Country //
									$country = $this->users->getElementByID('tbl_country', $usermeta['country_id']);
									$country = (isset($country['countryname'])&&$country['countryname']) ? ", ".$country['countryname'] : '';
								}
								$location = strtoupper($city." ".$province." ".$country);
								?>
								<h6 class="u-loc"><?php echo $location;?></h6>
							<?php
							}?>
							<br><br><div class="pull-right fr"><h5 class="u-loc"><?php echo "Campus Name: ";echo ($campus_names) ? $campus_names : 'N/A';?></h5></div>
							<?php 
						}
						else { ?>
							<h3 class="u-name"><?php echo isset($union['firstname']) ? strtoupper($union['firstname']) : '';?> <?php echo isset($union['lastname']) ? strtoupper($union['lastname']) : '';?> 
                            </h3>
                            
							<h5 class="u-trade">
								<?php 
								$union['industry_id'] = isset($union['industry_id']) ? $union['industry_id'] : '';
								$industry = $this->users->getElementByID('tbl_industry', $union['industry_id']);
								if( isset($industry) && sizeof($industry) ) {
									$industry = $industry['industryname'];
									echo strtoupper($industry);
								}
								?>
							</h5>
							<?php
							if(isset($usermeta['city_id'])) { // Get City //
								$city = $this->users->getElementByID('tbl_city', $usermeta['city_id']);
								$city = $city['cityname'];
							}
							if(isset($usermeta['province_id'])) { // Get Province //
								$province = $this->users->getElementByID('tbl_province', $usermeta['province_id']);
								$province = (isset($province['provincename'])&&$province['provincename']) ? ", ".$province['provincename'] : '';
							}
							if(isset($usermeta['country_id'])) { // Get Country //
								$country = $this->users->getElementByID('tbl_country', $usermeta['country_id']);
								$country = (isset($country['countryname'])&&$country['countryname']) ? ", ".$country['countryname'] : '';
							}
							$location = strtoupper($city." ".$province." ".$country);?>
							<h6 class="u-loc">60 CASTER AVENUE - <?php echo $location;?>, L4L 5Y9</h6>
						<?php 
						}?>
					</div>
				</div>
				<!-- END HEADER INFORMATION-->
			</div>
		</div>
	<!--------END UNION PROFILE HEAD-------->
	<div class="module">	
	<h5 class="title">HAZARDS ALERTS FROM <?php echo isset($union['firstname']) ? strtoupper($union['firstname']) : '';?> <?php echo isset($union['lastname']) ? strtoupper($union['lastname']) : '';?></h5>
<!--*******************------BEGIN HAZARD ALERTS FIELDS------***************************************-->
<?php 
$alert_title 			= (isset($s1_alerts['st_title']) && $s1_alerts['st_title']) ? $s1_alerts['st_title'] : '';
$alert_summary			= (isset($s1_alerts['st_summary']) && $s1_alerts['st_summary']) ? $s1_alerts['st_summary'] : '';
$alert_locations 		= (isset($s1_alerts['st_locations']) && $s1_alerts['st_locations']) ? $s1_alerts['st_locations'] : '';
$alert_legal_requirements = (isset($s1_alerts['st_legal_requirements']) && $s1_alerts['st_legal_requirements']) ? $s1_alerts['st_legal_requirements'] : '';
$alert_precautions 		= (isset($s1_alerts['st_precautions']) && $s1_alerts['st_precautions']) ? $s1_alerts['st_precautions'] : '';
$alert_images 			= (isset($s1_alerts['st_images']) && $s1_alerts['st_images']) ? explode(",", $s1_alerts['st_images']) : array();
$alert_videos 			= (isset($s1_alerts['st_video']) && $s1_alerts['st_video']) ? explode(",", $s1_alerts['st_video']) : array();
$alert_videosupd 		= (isset($s1_alerts['st_video_uploaded']) && $s1_alerts['st_video_uploaded']) ? explode(",", $s1_alerts['st_video_uploaded']) : array();
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
function deleteAlertVideo( id )
{
	$('#'+id).slideUp('medium', function () {
		$("#"+id).html('');
		$("#"+id).remove('');
	});
	$cnt_alert_video = $('#hidn_alert_video').val();
	$('#hidn_alert_video').val( parseInt($cnt_alert_video-1) );
}

function addMoreAlertImage()
{
	var cntImage 	= parseInt( $('#hidn_alert_image').val() );
	if( cntImage <= 3 ) {
		cntImage = (cntImage+1);
		var imageAppend = '<div class="control-group" id="id_div_image_alert'+cntImage+'"><label class="control-label" for="image">Select Image</label>';
		imageAppend += '<div class="controls"><input name="userfile[]" id="alert_image'+cntImage+'" type="file" class="input-xlarge"/>';
		imageAppend += '<span id="err_alert_image'+cntImage+'"></span>';
		imageAppend += '&nbsp;<button type="button" class="btn" del-count="'+cntImage+'" title="Delete Image" onclick=javascript:deleteAlertImage("id_div_image_alert'+cntImage+'");>Delete Image</button>';
		imageAppend += '</div></div>';

		$('#id_alert_image_bucket').append( imageAppend );
		$('#hidn_alert_image').val(cntImage);
	}
	else {
		alert('You can add maximum of 3 Images');
		return false;
	}
}

function addMoreAlertVideo()
{
	var cntVideo 	= parseInt( $('#hidn_alert_video').val() );
	if( cntVideo <= 2 ) {
		cntVideo = (cntVideo+1);

		var videoAppend = '<div class="control-group" id="id_div_video_alert'+cntVideo+'">';
		videoAppend += '<label class="control-label" for="">Alert Video</label>';
		videoAppend += '<div class="controls">';
		videoAppend += '<input id="txt_alert_video'+cntVideo+'" name="txt_alert_video[]" type="text" placeholder="Enter Video Code" class="input-xlarge">';
		videoAppend += '<br>-OR-<br><input type="file" name="alert_videoupd[]" id="alert_videoupd'+cntVideo+'" class="input-xlarge">';
		videoAppend += '<span id="err_alert_videoupd'+cntVideo+'"></span>';
		videoAppend += '&nbsp;<button type="button" class="btn" del-count="'+cntVideo+'" title="Delete Video" onclick=javascript:deleteAlertVideo("id_div_video_alert'+cntVideo+'");>Delete Video</button>';
		videoAppend += '</div></div>';

		$('#id_alert_video_bucket').append( videoAppend );
		$('#hidn_alert_video').val(cntVideo);
	}
	else {
		alert('You can add maximum of 2 Videos');
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

	<!-- Alert Images -->
		<div id="id_alert_image_bucket">
			<?php 
			$cnt_alert_image = 0;
			if(sizeof($alert_images)>0) {
				foreach($alert_images as $val_img) {
					$cnt_alert_image++;?>
					<div class="control-group" id="id_div_image_alert<?php echo $cnt_alert_image;?>">
					  <label class="control-label" for="">Select Image</label>
					  <div class="controls">
						<input type="file" name="userfile[]" id="alert_image<?php echo $cnt_alert_image;?>" class="input-xlarge"/>
						<span id="err_alert_image<?php echo $cnt_alert_image;?>"></span>
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
					<div class="controls">
						<input type="file" name="userfile[]" id="alert_image<?php echo $cnt_alert_image;?>" class="input-xlarge"/>
						<span id="err_alert_image<?php echo $cnt_alert_image;?>"></span>
					</div>
				</div>
				<?php 
				$cnt_alert_image = 1;
			}?>
		</div>
		<input type="hidden" id="hidn_alert_image" name="hidn_alert_image" value="<?php echo ($cnt_alert_image+1);?>">
		<div class="textright"><input type="button" class="btn btn-warning" value="Add New Image" onclick="javascript: addMoreAlertImage('<?php echo $cnt_alert_image;?>');" /></div><br>

	<!-- Alert Videos -->
    <div id="id_alert_video_bucket">
		<?php 
		$cnt_alert_video = 0;
		
		// common::pr( $alert_videos );
		$sizeof_alert_videos 	= sizeof($alert_videos);
		$sizeof_alert_videosupd = sizeof($alert_videosupd);

		if( $sizeof_alert_videos>0 OR $sizeof_alert_videosupd>0 ) {
			foreach( $alert_videos AS $key_alert_video => $val_alert_video ) {
				$video_id 		= isset($alert_videos[$key_alert_video]) ? $alert_videos[$key_alert_video] : '';
				$video_uploaded = isset($alert_videosupd[$key_alert_video]) ? $alert_videosupd[$key_alert_video] : '';
				
				$cnt_alert_video++;?>
				<div class="control-group" id="id_div_video_alert<?php echo $cnt_alert_video;?>">
					<label class="control-label" for="">Alert Video</label>
					<div class="controls">
						<input id="txt_alert_video<?php echo $cnt_alert_video;?>" name="txt_alert_video[]" type="text" placeholder="Enter Video Code" class="input-xlarge" value="<?php echo $video_id;?>">
						<!--<div id="ytplayer<?php echo $video_id;?>"></div>-->
						<?php 
						if($video_id) { ?>
							<iframe width="260" height="180" frameborder="0" allowfullscreen="" src="https://www.youtube.com/embed/<?php echo $video_id;?>?wmode=transparent&showinfo=0&rel=0&auto=0"></iframe>
							<?php /*
							<script>
								var tag = document.createElement('script');
								var vidid 	= '<?php echo $video_id;?>';
								tag.src 	= "https://www.youtube.com/iframe_api";
								tag.id		= <?php echo $cnt_alert_video+1;?>;
								var firstScriptTag = document.getElementsByTagName('script')[0];
								firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
								
								var player;
								function onYouTubeIframeAPIReady() {
									player = new YT.Player('ytplayer'+vidid, {
										height: '240',
										width: '380', 
										videoId: vidid, 
										playerVars: { 'autoplay':0,'controls':1,'modestbranding':1,'rel':0},
										events: {
											'onStateChange': onPlayerStateChange
										}
									});
								}
								function onPlayerStateChange(event) {
									if (event.data == YT.PlayerState.PLAYING) {
										var duration = player.getDuration();
										var ext = player.getVideoUrl();
										// alert( ext );
										if( duration > 60 ) {
											player.stopVideo();
											alert( "This video file is longer than 1 min, Please enter another code" );
											// $("#txt_alert_video<?php echo $cnt_alert_video+1;?>").focus();
											// return false;
										}
									}
								}
							</script>
							<?php 
							$video_url 	= 'https://www.youtube.com/watch?v='.$alert_video;
							$youtube 	= "http://www.youtube.com/oembed?url=".$video_url."&format=json";
							*/
						}?>
						<br>-OR-<br><input type="file" name="alert_videoupd[]" id="alert_videoupd<?php echo $cnt_alert_video;?>" class="input-xlarge"/>
						<?php 
						if( file_exists(FCPATH.$this->path_upload_alerts.$video_uploaded) && $video_uploaded ) {?>
							<video controls="controls" width="260" height="180">
								<source src='<?php echo $base.$this->path_upload_alerts.$video_uploaded;?>' type="video/mp4" height="200" width="200">
							</video>
							<?php 
						}?>
						<span id="err_alert_videoupd<?php echo $cnt_alert_video;?>"></span>
					</div>
				</div>
				<?php 
			}
		}
		else {?>
			<div class="control-group" id="id_div_video_alert1">
				<label class="control-label" for="">Alert Video</label>
				<div class="controls">
					<input id="txt_alert_video1" name="txt_alert_video[]" type="text" placeholder="Enter Video Code" class="input-xlarge">
					<br>-OR-<br><input type="file" name="alert_videoupd[]" id="alert_videoupd<?php echo ($cnt_alert_video+1);?>" class="input-xlarge"/>
					<span id="err_alert_videoupd<?php echo $cnt_alert_video;?>"></span>
				</div>
			</div>
			<?php 
			$cnt_alert_video = 1;
		}?>
	</div>
	<input type="hidden" id="hidn_alert_video" name="hidn_alert_video" value="<?php echo ($cnt_alert_video+1);?>">
	<div class="textright"><input type="button" class="btn btn-warning" value="Add New Video" onclick="javascript: addMoreAlertVideo('<?php echo $cnt_alert_video;?>');" /></div>
	<div class="control-group">
		<label class="control-label">Select the criteria to send the Alerts of your choice</label>
		<div class="span5" align="center">
			<select name="cmb_alert_criteria" id="cmb_alert_criteria" required class="">
				<option value="all" <?php echo ('all'==$s1_alert_criteria)?'selected="selected"':'';?> title="All S1 Users">All S1 Users</option>
				<option value="usertype" <?php echo ('usertype'==$s1_alert_criteria)?'selected="selected"':'';?> title="By Usertype">By Usertype</option>
				<option value="industry" <?php echo ('industry'==$s1_alert_criteria)?'selected="selected"':'';?> title="By Industry">By Industry</option>
				<option value="sector" <?php echo ('sector'==$s1_alert_criteria)?'selected="selected"':'';?> title="By Industry/Sector">By Industry/Sector</option>
				<option value="trade" <?php echo ('trade'==$s1_alert_criteria)?'selected="selected"':'';?> title="By Industry/Sector/Trade">By Industry/Sector/Trade</option>
				<option value="worker" <?php echo ('worker'==$s1_alert_criteria)?'selected="selected"':'';?> title="Worker">Worker</option>
				<?php 
				if( "7"==$this->sess_usertype ) {?>
					<option value="myworkers" <?php echo ('myworkers'==$s1_alert_criteria)?'selected="selected"':'';?> title="myworkers">My Workers</option>
					<?php 
				}
				else {?>
					<option value="alcr6" <?php echo ('alcr6'==$s1_alert_criteria)?'selected="selected"':'';?> title="Workers with Employer status selected as Self-employed or Unemployed">Workers with Employer status selected as "Self-employed" or "Unemployed"</option>
					<?php
				}?>
				<option value="student" <?php echo ('student'==$s1_alert_criteria)?'selected="selected"':'';?> title="Student">Student</option>
				<option value="employer" <?php echo ('employer'==$s1_alert_criteria)?'selected="selected"':'';?> title="Employer">Employer</option>
				<option value="employer-connection" <?php echo ('employer-connection'==$s1_alert_criteria)?'selected="selected"':'';?> title="All workers connected to Employer(s)">All workers connected to Employer(s)</option>
				<option value="union" <?php echo ('union'==$s1_alert_criteria)?'selected="selected"':'';?> title="Union">Union</option>
				<option value="union-connection" <?php echo ('union-connection'==$s1_alert_criteria)?'selected="selected"':'';?> title="All S1 users connected to Union">All S1 users connected to Union(s)</option>
			</select>
		</div>
	</div>

	<div class="control-group" id="id_alert_selected"></div>
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
		<input type="button" name="cancel" value="Cancel" class="btn btn-danger" onclick="javascript:window.location.href='<?php echo $base."admin/union_alerts_view?id=".$union['id']."&type=alerts";?>'" />
    </div>
    </fieldset>
    </form>
    </div>
	<script type="text/javascript" src="<?php echo $base;?>js/common.js"></script>

	<link rel="stylesheet" type="text/css" href="<?php echo $base."css/jquery-multiselect/jquery.multiselect.css";?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo $base."css/jquery-multiselect/jquery.multiselect.filter.css";?>" />
	<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/ui-lightness/jquery-ui.css" />
	<script type="text/javascript" src="<?php echo $base."js/jquery-ui.js";?>"></script>
	<script type="text/javascript" src="<?php echo $base."js/jquery/jquery-multiselect/jquery.multiselect.js";?>"></script>
	<script type="text/javascript" src="<?php echo $base."js/jquery/jquery-multiselect/jquery.multiselect.filter.js";?>"></script>
	<script type="text/javascript">
		$('input[type=submit]').click(function(e){
			// Image Validation //
				var $error_img 		= 0;
				var img_unionalerts = '';
				var allowed_alertimg_extensions = ['jpeg', 'jpg', 'png', 'gif', 'bmp'];
				$("#id_alert_image_bucket").find('input[type=file]').each(function() {
					img_unionalerts = $(this).attr("id");
					id_img_unionalerts = $("#"+img_unionalerts);
					if( id_img_unionalerts.val()!='' && ($.inArray(id_img_unionalerts.val().split('.').pop().toLowerCase(), allowed_alertimg_extensions) == -1) ) {
						$('#err_'+img_unionalerts).html("<br>\nOnly (jpeg, jpg, png, gif, bmp) formats are allowed.");
						$('#err_'+img_unionalerts).addClass("text-error");
						$error_img++;
					}
					else {
						$('#err_'+img_unionalerts).html("");
					}
				});
				if( $error_img > 0 ) { e.preventDefault(); }
			
			
			// Video Validation //
				var $error_vid 		= 0;
				var vid_unionalerts = '';
				var allowed_alertvid_extensions = ['mp4', 'mov', 'mpeg', 'mp3', 'avi', 'wmv', 'm4v'];
				$("#id_alert_video_bucket").find('input[type=file]').each(function() {
					vid_unionalerts = $(this).attr("id");
					id_vid_unionalerts = $("#"+vid_unionalerts);
					if( id_vid_unionalerts.val()!='' && ($.inArray(id_vid_unionalerts.val().split('.').pop().toLowerCase(), allowed_alertvid_extensions) == -1) ) {
						$('#err_'+vid_unionalerts).html("<br>\nOnly (mp4, mov, mpeg, mp3, avi, wmv, m4v) formats are allowed.");
						$('#err_'+vid_unionalerts).addClass("text-error");
						$error_vid++;
					}
					else {
						$('#err_'+vid_unionalerts).html("");
					}
				});			
				if( $error_vid > 0 ) { e.preventDefault(); }
		});

		$("#cmb_alert_criteria").change(function() {
			var val_alert_criteria 	= $(this).val();		
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
     <!--------END HAZARD ALERTS FIELDS-------->
	</div>
</div>
</div>
<?php $this->load->view('footer_admin'); ?>