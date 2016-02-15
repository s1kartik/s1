<?php $this->load->view('header_admin');?>
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
        <div class="main-content padding-metro-header subheader-secondary clearfix fg-grayLighter">
        <em class="margin20">S1 ANIMATION&nbsp;&nbsp;
        	<!--a href="#info_fatality_animation_modal" data-toggle='modal'><span class="icon-info-2 s1_info fg-white"></span></a-->
        </em> 
        </div>
    </div>
    <!-- Start INFO Modal - -> 
    < ?php // Modal: INFO//
					$this->load->view('info/fatality_animation_modal');
				?>	
    <!-- End INFO Modal -->
    <!--END PAGE TITLE-->
    <div class="container-fluid fatality_metro">
        <div class="main-content padding-metro-home clearfix"> 
			<!--START CODE FOR METRO STYLE-->
				<!-------BEGIN FIRST ROW FIRST COLUMN OF TILES------>
					<?php 
					$cnt_fatality_video = 1;
					foreach( $rows_fatality_videos AS $val_fatality_videos ) {
						if( $cnt_fatality_video <= $records_limit ) {
							$video_id 			= $val_fatality_videos['id'];
							$video_url 			= $val_fatality_videos['st_fatality_video'];
							$video_thumbnail 	= $val_fatality_videos['st_fatality_video_thumbnail'];
							$video_title		= $val_fatality_videos['st_fatality_video_title'];

							$rows 			= $this->points->hasUserGotPointsOfPageSection($this->session->userdata['userid'], $video_id, 5);
							$rows	= isset($rows['has_points']) ? $rows['has_points'] : "";
							if( $rows ) {
								$tile_class = "selected";
							}
							else {
								$tile_class = "";
							}

							if( $cnt_fatality_video%9==1 ) {?>
								<div class="tile-group no-margin no-padding clearfix width390">
							<?php 
							}?>
							<a onclick="setPagePoints('5','<?php echo $video_id;?>','id_modal_points','modal_points', 'fatality_video');getFatalityQuiz('<?php echo $video_id;?>');" class="tile fatality-img <?php echo $tile_class;?>" video="<?php echo $video_url;?>" title="<?php echo $video_title;?>">
								<div class="img-overlay"></div>
								<img src="<?php echo $base."img/fatality/".$video_thumbnail;?>" alt="<?php echo $video_title;?>"/>
							</a> 
							<?php 
							if( $cnt_fatality_video%3==0){?> <?php }

							if( $cnt_fatality_video%9==0 ) {?>
								</div>
							<?php 
							}
							$cnt_fatality_video++;
						}
					}
					
					/*
					$sizeof_fatality_videos = sizeof($rows_fatality_videos);
					if( $sizeof_fatality_videos < 18 ) {
						$cnt_spans = ($sizeof_fatality_videos==0) ? 17 : (18-$sizeof_fatality_videos)+($cnt_fatality_video-1);
						for( $i=1;$i<=$cnt_spans;$i++) {
							if( $i%9==1 ) {?>
								<div class="tile-group no-margin no-padding clearfix ">
								<?php 
								}?>
								<a class="tile bg-transparent" style="box-shadow: 0px 0px 0px inset;">
									<div class="img-overlay"></div><img>
								</a>
								<?php 
							if( $i%3==0){?> <br /> <?php }
							if( $i%9==0 ) {?></div><?php }
						}
					}*/?>
					
					
				<!-------BEGIN THIRD COLUMN FIRST ROW OF TILES------>
				<div class="tile-group no-margin no-padding clearfix width300" > 
					<!--begin Restaurants Code tile -->
                    <a href="<?php echo $base;?>admin/fatality_metro" class="tile bg-red">
						<div class="tile-content icon">
							<i class="icon "><img src="<?php echo $base;?>img/fatality/fatality_breakdown.png" /></i>
						</div>
						<div class=" brand">
							<span class="label fg-white"><strong>FATALITY</strong></span>
						</div>
					</a>
					<a href="<?php echo $base;?>admin/hazard" class="tile bg-red">
						<div class="tile-content icon">
							<i class="icon "><img src="<?php echo $base;?>img/fatality/digital_hazards.png" /></i>
						</div>
						<div class=" brand">
							<span class="label fg-white"><strong>Digital<br /> HAZARDS</strong></span>
						</div>
					</a><br />
					<!--end Restaurants Code tile-->
					<!--begin Contractors tile -->
                    <a href="<?php echo $base;?>admin/fatality_metro_animation" class="tile bg-red">
						<div class="tile-content icon">
							<i class="icon "><img src="<?php echo $base;?>img/fatality/media_icon.png" /></i>
						</div>
						<div class=" brand">
							<span class="label fg-white"><strong>S1 ANIMATION</strong></span>
						</div>
					</a>
					<a href="<?php echo $base;?>admin/construction" class="tile bg-red">
						<div class="tile-content  icon">
							<i class="icon "><img src="<?php echo $base;?>img/fatality/safety_equipment.png"></i>
						</div>
						<div class=" brand">
							<span class="label fg-white"><strong>Safety<br /> EQUIPMENT</strong></span>
						</div>
					</a><br />
					<!--end constractors Code tile--> 
					<!--begin S1 News tile -->
					<a href="<?php echo $base;?>admin/news_metro" class="tile  bg-red"   >
						<div class="tile-content  icon">
							<i class="icon "><img src="<?php echo $base;?>img/fatality/s1_news.png"></i>
						</div>
						<div class=" brand"><span class="label fg-white"><strong>S1 NEWS</strong></span></div>
					</a>
                    <a href="#" class="tile bg-red">
						<div class="tile-content icon">
							<i class="icon "><img src="<?php echo $base;?>img/fatality/media_icon.png" /></i>
						</div>
						<div class=" brand">
							<span class="label fg-white"><strong>Union<br />INSTRUCIONAL</strong></span>
						</div>
					</a>
					<!--end S1 News Code tile--> 

				</div>
				
			<!-------END  THIRD COLUMN FIRST ROW OF TILES------> 
		
		<?php 
		if( $total_fatality_videos > $records_limit ) {
			$total_pages = ceil($total_fatality_videos/$records_limit);?>
			<div class="pagination small opacity pull-right" style="padding-right:30%;">
				 <?php $this->common->getS1Pagination('fatality_metro?1', $total_pages, $current_page, $records_limit, 10);?>
			</div>
			<?php
		}?>
        </div>
		
    </div>
</div>
<!--END OF CODE FOR METRO STYLE-->

<!-- Button to trigger modal -->

 
<!-- Modal -->
<div id="myModal" class="modal fade hide " tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header bg-red">
    <h3 id="myModalLabel"><i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal"></i></h3>
  </div>
  <div class="modal-body video-wrapper">
		<div class="video-container">
			<!-----Code for Youtube video goes in the src attribute ----->
			<!-----In this case the variable is: TCu470B9K4Y----->
			<!-----The rest are standard parameters an can remain the same----->
			<iframe id="modalframe" width="853" height="510" frameborder="0" allowfullscreen="" ></iframe>
		</div>
		<div id="id_video_quiz"></div>
  </div>
  <div class="modal-footer"><button class="btn" data-dismiss="modal" aria-hidden="true" >Close</button></div>
</div>

<script type="text/javascript">
	$('.fatality-img').click(function(){
		//$('#myModal').modal('show');
		$('#myModalLabel').html($(this).attr("title"));
		$('#modalframe').attr('src',"https://www.youtube.com/embed/"+$(this).attr("video")+"?wmode=transparent&showinfo=0&rel=0");
	});
	(function(){
		$('.fatality-img').hover(
			function(){
				$('.img-overlay',this).stop(true, false).fadeTo(300,0.5);
			}, 
			function(){
				$('.img-overlay',this).stop(true, false).fadeTo(300,0);
			});
	})()
	
	function getFatalityQuiz(videoId)
	{
		$.post('<?php echo $base;?>ajax/ajaxGetFatalityQuiz', {'videoId':videoId}, function(data) {
			$("#id_video_quiz").html(data);
		});
	}
	
	function checkQuizAnswer(quizId, isAnsCorrect)
	{
		(isAnsCorrect) ? setPagePoints('5', quizId, 'id_modal_points', 'modal_points', 'fatality_video') : '';
	}
</script>

<?php $this->load->view('footer_admin'); ?>