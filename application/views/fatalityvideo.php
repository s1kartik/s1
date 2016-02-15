<?php 
$this->load->view('header_admin');
$fatality_video_url 	= (isset($fatality_video['st_fatality_video']) && $fatality_video['st_fatality_video']) ? $fatality_video['st_fatality_video'] : '';

$fatality_video_thumbnail 	= (isset($fatality_video['st_fatality_video_thumbnail']) && $fatality_video['st_fatality_video_thumbnail']) ? $fatality_video['st_fatality_video_thumbnail'] : '';
$arr_thumbnail 		= pathinfo($fatality_video_thumbnail);
$thumbnail_filename = $arr_thumbnail['filename'];

$fatality_thumbnail_text 	= (isset($fatality_video['st_fatality_thumbnail_text']) && $fatality_video['st_fatality_thumbnail_text']) ? $fatality_video['st_fatality_thumbnail_text'] : $thumbnail_filename;
$fatality_video_title 	= (isset($fatality_video['st_fatality_video_title']) && $fatality_video['st_fatality_video_title']) ? $fatality_video['st_fatality_video_title'] : '';
$fatality_video_status 	= (isset($fatality_video['in_fatality_video_status']) && $fatality_video['in_fatality_video_status']) ? $fatality_video['in_fatality_video_status'] : '';
?>
<div class="info-container">
    <div class="document-content">
    <form class="form-horizontal frm_fatality_video" id="frm_fatality_video" method="post" enctype="multipart/form-data" action="">
    <fieldset>
    <!-- Form Name -->
    <legend>Fatality Video</legend>
    <!-- Text input-->
	<div class="control-group">
      <label class="control-label" for="txt_fatality_video_title">Fatality Video Title</label>
      <div class="controls">
        <input id="txt_fatality_video_title" name="txt_fatality_video_title" type="text" placeholder="Fatality Video Title" value="<?php echo $fatality_video_title;?>" class="input-xlarge required"/>
      </div>
    </div>
    <!-- Text input-->
    <div class="control-group">
      <label class="control-label" for="txt_fatality_video_thumbnail">Thumbnail Image</label>
      <div class="controls">
		<?php 
		if( $fatality_video_thumbnail ) {?>
			<img src="<?php echo $base."img/fatality/".$fatality_video_thumbnail;?>" width="75" height="75"/>
		<?php
		}?>
		<input type="file" name="userfile">
		<input id="txt_fatality_thumbnail_text" name="txt_fatality_thumbnail_text" type="text" placeholder="Fatality Thumbnail Text" value="<?php echo $fatality_thumbnail_text;?>" class="input-xlarge"/>	
      </div>
    </div>
	<div class="control-group">
      <label class="control-label" for="txt_fatality_video">Fatality Video Url</label>
      <div class="controls">
        <input id="txt_fatality_video" name="txt_fatality_video" type="text" placeholder="Fatality Video Url" value="<?php echo $fatality_video_url;?>" class="input-xlarge required"/>
		<?php if( $fatality_video_url ) {?>
			<a id="id_fatality_video" class="fancybox fancybox.iframe" href="<?php echo "https://youtube.com/embed/".$fatality_video_url;?>?autoplay=1">See Video</a>
		<?php 
		}?>
      </div>
	</div>
	<div class="control-group">
		<label class="control-label">Status</label>
		<div class="controls">
			<?php $checked = 'checked="checked"';?>
			<label class="radio inline"><input type="radio" name="txt_fatality_video_status" value="1" <?php echo ($fatality_video_status==1) ? $checked : '';?>/>&nbsp;Active</label> 
			<label class="radio inline"><input type="radio" name="txt_fatality_video_status" value="0" <?php echo ($fatality_video_status==0) ? $checked : '';?>/>&nbsp;Inactive</label>
		</div>
	</div>

    <div class="inline text-center">
    <input type="submit" name="submit" value="Submit" class="btn btn-primary" />
    <input type="button" name="cancel" value="Cancel" class="btn btn-danger" onclick="javascript:window.location.href='<?php echo $base;?>admin/metadata?type=fatality_videos'" />
    </div>
    </fieldset>
    </form>
    </div>
	
	<!-- Start - Fancy box image --> 
	<!-- Add fancyBox main JS and CSS files -->
		<script type="text/javascript" src="<?php echo $base."plugin/fancybox/source/jquery.fancybox.js?v=2.1.5";?>"></script>
		<link rel="stylesheet" type="text/css" href="<?php echo $base."plugin/fancybox/source/jquery.fancybox.css?v=2.1.5";?>" media="screen" />
	<!-- End - Fancy box image --> 
	<script type="text/javascript" src="<?php echo $base;?>js/common.js"></script>
	
    <script type="text/javascript">
		$(document).ready(function () {
			var fatality_video_thumbnail = '<?php echo $fatality_video_thumbnail;?>';
			$('#frm_fatality_video').validate({
				highlight: function(element) {
					$(element).parent('div').addClass("text-error");
				},
				rules: {
					txt_fatality_video_title: {
						required: true
					},
					txt_fatality_video: {
						required: true, 
					}
				}, 
				messages: {
					txt_fatality_video_title: {
						required: "<?php echo lang('msg_enter_fatality_title');?>"
					},
					txt_fatality_video: {
						required: "<?php echo lang('msg_enter_fatality_url');?>"
					}
				}
			});
		});
		
		$("#txt_fatality_video").keyup(function() {
			if( $(this).val() == '' ) {
				$("#id_fatality_video").hide();
			}
			else {
				$("#id_fatality_video").show();
			}
		});
    </script>    
</div>    
<?php $this->load->view('footer_admin'); ?>