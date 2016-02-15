<?php $this->load->view('header_admin');
// Get Library Images and Videos // 
	$rows_library_images = $this->users->getMetaDataList( 'library_images', 'status=1 AND library_id="'.$libid.'" AND page_id=0 AND paragraph_id=0', '', 'paragraph_image_id, image' );
	// common::pr($rows_library_images);
	$rows_library_videos = $this->users->getMetaDataList( 'library_videos', 'status=1 AND library_id="'.$libid.'" AND page_id=0 AND paragraph_id=0', '', 'paragraph_video_id, video' );
?>
<script type="text/javascript">
	$(window).load(function() {
		$('.flexslider').flexslider({
			controlNav: false,
			prevText:"",
			nextText:"",
			// animation: "slide", 
			// itemWidth: 1,
			minItems: 2,
			maxItems: 3,
			move: 2,
			reverse: false,
			slideshow: false
		});
	});
</script>
<div class="homebg metro ">
	<!--BEGIN PAGE TITLE-->
    <div class="container-fluid">
        <div class="main-content padding-metro-header subheader-secondary clearfix fg-grayLighter"><em class="margin20">S1 IMAGES</em> </div>
    </div>
    <!--END PAGE TITLE-->
    <div class="container-fluid fatality_metro">
        <div class="main-content padding-metro-header clearfix"> 
			<!--START CODE FOR METRO STYLE-->
            <div class="fatalityCon clearfix">
			<!-------BEGIN FIRST ROW FIRST COLUMN OF TILES------>
			<?php 
			if(sizeof($rows_library_images)>0) {
				foreach($rows_library_images AS $key_img => $val_img) {
					$cnt_libimg = ($key_img+1);
					if( file_exists(FCPATH.$this->path_upload_paragraph_images.$val_img['image']) ) {
						$libimg_modal = "image_modal".$cnt_libimg;?>
						<a href="#<?php echo $libimg_modal;?>" data-toggle='modal' class="tile fatality-img" video="" title="" >
							<img src="<?php echo $base.$this->path_upload_paragraph_images.$val_img['image'];?>">
						</a>
						<div id="<?php echo $libimg_modal;?>" class="modal hide fade info-item " tabindex="-1" style="max-width:600px;" role="dialog" aria-labelledby="myModalLabel" >						 
							<div class="modal-header bg-red ">
								<h3 >&nbsp;<b>S1 Images</b><i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal" onclick="$('#<?php echo $libimg_modal;?>').hide();"></i></h3>
							</div>
						   <div class="modal-body" id="body1"  >
								<center>
									
									<div class="flexslider flexslider_info" style="max-width:600px;">
										<ul class="slides">
											<li>
												<img src="<?php echo $base.$this->path_upload_paragraph_images.$val_img['image'];?>">
												<p class="s1content_body_section" ><strong>Title 1</strong>
												<ul class="s1content_ul_disc text-left">
													<li>Description 1 description description description description description </li>
													<li>Description description 1 description description description description </li>
													<li>Description description description 1 description description description </li>
													<li>Description description description description 1 description description </li>
												</ul>
												</p>
											</li>
										</ul>										
									</div>
								   </center>
								</div>
								<div class="modal-footer">
									<button class="btn" data-dismiss="modal" onclick="$('#image_modal1').hide();">Close</button>
								</div> 
						  </div>
						  <!--END MODAL1 IMAGES-->						
						<?php 
					}
				}
			}
			else {
				echo "<h3>No Images available</h3>";
			}?>
			<!-------BEGIN THIRD COLUMN FIRST ROW OF TILES------>
			<!-------END  THIRD COLUMN FIRST ROW OF TILES------> 
		</div>
        </div>
    </div>
	
	
    <div class="container-fluid">
		<div class="main-content padding-metro-header subheader-secondary clearfix fg-grayLighter"><em class="margin20">S1 VIDEOS</em></div>
    </div>
	
    <div class="container-fluid fatality_metro">
        <div class="main-content padding-metro-header clearfix"> 
			<!--START CODE FOR METRO STYLE-->
            <div class="fatalityCon clearfix">
				<!-------BEGIN FIRST ROW FIRST COLUMN OF TILES------>
					<?php 
			if(sizeof($rows_library_videos)>0) {
				foreach($rows_library_videos AS $key_video => $val_video) {
					$cnt_libvideo = ($key_video+1);										
					if( file_exists(FCPATH.$this->path_upload_paragraph_images.$val_video['video']) ) {
						$libvideo_modal = "video".$cnt_libvideo."_modal";?>
						<a href="#<?php echo $libvideo_modal;?>" data-toggle='modal' class="tile fatality-img" video="" title="" >
							<div class="img-overlay"></div>
							<video controls="controls" width="130" height="110">
								<source src='<?php echo $base.$this->path_upload_paragraph_images.$val_video['video'];?>' type="video/mp4">
							</video>
						</a>						
						<div id="<?php echo $libvideo_modal;?>" class="modal hide fade info-item " tabindex="-1" style="max-width:600px;" role="dialog" aria-labelledby="myModalLabel" >    
							<div class="modal-header bg-red ">
								<h3 >&nbsp;<b>S1 Videos</b>
									<i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal" onclick="$('#<?php echo $libvideo_modal;?>').hide();"></i>
								</h3>
							</div>
						   <div class="modal-body" id="body1" >
								<center>
								  <video controls="controls" width="260" height="180">
									<source src='<?php echo $base.$this->path_upload_paragraph_images.$val_video['video'];?>' type="video/mp4" height="200" width="200">
								  </video>
								  <p class="s1content_body_section" ><strong>Title </strong>
									<ul class="s1content_ul_disc text-left">
										<li>Description description description description description description </li>
										<li>Description description  description description description description </li>
										<li>Description description description  description description description </li>
										<li>Description description description description description description </li>
									</ul> 
								   </center>    
								</div>
							<div class="modal-footer">
								<button class="btn btn-close" data-dismiss="modal" onclick="$('#<?php echo $libvideo_modal;?>').hide();">Close</button>
							</div> 
						</div>
						
						<script type="text/javascript">
							$("#<?php echo $libvideo_modal;?> .btn-close,.icon-cancel-2").click(function() {
								$("#<?php echo $libvideo_modal;?> video source").attr("src", $("#<?php echo $libvideo_modal;?> video source").attr("src"));
							});	
						</script>
						<?php
					}
				}
			}
			else {
				echo "<h3>No Videos available</h3>";
			}
			?>
			<!-------BEGIN THIRD COLUMN FIRST ROW OF TILES------>
				
			<!-------END  THIRD COLUMN FIRST ROW OF TILES------> 
		</div>
        </div>
    </div>
<!--END OF CODE FOR METRO STYLE-->
</div>

<?php $this->load->view('footer_admin'); ?>
<script type="text/javascript">
	$('.info-item').css({ 'top':'1%', });
	$('.flexslider_info').css({ 'border':'0px',  'box-shadow':'0px', 'padding':'0px', 'margin':'0px' });
	$('.flexslider_info .slides img').css({ 'width':'auto',  'display':'block', 'max-height':'350px'});
	$('.flex-direction-nav a').css({ 'top':'50%'});
	$('.slides').css({ 'margin-left':'0px',  'padding':'0px' });
	$('.modal-body').css({ 'margin-left':'0px',  'padding':'0px', 'max-height':'80vh','overflow-y':'auto','overflow-x':'hidden' });
	$('.modal-header').css({'border':'0px' });
	$('.modal-footer').css({'border-radius':'0px'});
	$('.fatality-img').hover(
		function(){
			$('.img-overlay',this).stop(true, false).fadeTo(300,0.5);
		}, 
		function(){
			$('.img-overlay',this).stop(true, false).fadeTo(300,0);
		}
	);
</script>
        