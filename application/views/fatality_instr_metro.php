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
        <em class="margin20">INSTRUCTIONAL VIDEOS &nbsp;&nbsp;
        <i class="icon "><img src="<?php echo $base;?>img/fatality/youtube.png" /></i> 
        </em> 
        </div>
    </div>
    <div class="container-fluid fatality_metro">
        <div class="main-content padding-metro-home clearfix"> 
			<!--START CODE FOR METRO STYLE-->
            <div class="fatalityCon clearfix">
				<!-------BEGIN FIRST ROW FIRST COLUMN OF TILES------>
					<?php 
					$cnt_fatalityinstr_video = 1;
					for($fat=0;$fat<18;$fat++) {
						// $rows_fatality_videos
					}
					foreach( $rows_fatality_videos AS $val_fatality_videos ) {
						if( $cnt_fatalityinstr_video <= $records_limit ) {
							$video_id 			= isset($val_fatality_videos['id']) ? $val_fatality_videos['id'] : '';
							$video_url 			= $val_fatality_videos['st_fatality_video'];
							$video_thumbnail 	= $val_fatality_videos['st_fatality_video_thumbnail'];
							$video_title		= $val_fatality_videos['st_fatality_video_title'];
							$rows 			= $this->points->hasUserGotPointsOfPageSection($this->session->userdata['userid'], $video_id, 5);
							$rows	= isset($rows['has_points']) ? $rows['has_points'] : "";

							$tile_class = $rows ? "selected" : "";

							if( $cnt_fatalityinstr_video%9==1 ){?>
								<div class="tile-group no-margin no-padding clearfix width390">
								<?php 
							}?>							
							<a onclick="getFatalityQuiz('<?php echo $video_id;?>');" class="tile fatality-img <?php echo $tile_class;?>" video="<?php echo $video_url;?>" title="<?php echo $video_title;?>" videoid="<?php echo $video_id;?>">
								<div class="img-overlay"></div>
								<img src="<?php echo $base."img/fatality/".$video_thumbnail;?>" alt="<?php echo $video_title;?>"/>
							</a>
							<?php 
							if( $cnt_fatalityinstr_video%9==0 ){?>
								</div>
								<?php  
							}
							$cnt_fatalityinstr_video++;
						}
					}
					
					if( sizeof($rows_fatality_videos) < $records_limit ) {
						$cnt_spans = (sizeof($rows_fatality_videos)==0) ? ($records_limit-1) : ($records_limit-(sizeof($rows_fatality_videos)));
						for( $i=$cnt_fatalityinstr_video;$i<=18;$i++) {
							echo ($i%9==1) ? '<div class="tile-group no-margin no-padding clearfix width390">' : '';?>
							<a style="height:120px;width:120px;">&nbsp;</a>
							<?php 
							echo ( $i%9==0) ? '</div>' : '';
						}
					}
					?>
					
				<!-------BEGIN THIRD COLUMN FIRST ROW OF TILES------>
				<div class="tile-group no-margin no-padding clearfix span4" >
					<!--begin Restaurants Code tile -->
                    <a href="<?php echo $base;?>admin/fatality_metro" class="tile bg-red">
						<div class="tile-content icon">
							<i class="icon "><img src="<?php echo $base;?>img/fatality/fatality_breakdown.png" /></i>
						</div>
						<div class=" brand">
							<span class="label fg-white">Fatality Breakdown</span>
						</div>
					</a>
					<a href="<?php echo $base;?>admin/fatality_metro?fat=mol" class="tile bg-red">
						<div class="tile-content icon"><i class="icon "><img src="<?php echo $base;?>img/mol/mol.png" /></i></div>
						<div class=" brand"><span class="label">Ministry of Labour</span></div>
					</a>
					<!--end Restaurants Code tile-->
					<!--begin Contractors tile -->
                    <a href="<?php echo $base;?>admin/fatality_metro?fat=instr" class="tile bg-red">
						<div class="tile-content icon"><i class="icon "><img src="<?php echo $base;?>img/fatality/media_icon.png" /></i></div>
						<div class=" brand" style="margin: 5px 20px -1px -8px;"><div class="label">Instructional Videos</div></div>
					</a>
					<a href="<?php echo $base;?>admin/fatality_metro?fat=funny" class="tile bg-red">
						<div class="tile-content icon"><i class="icon "><img src="<?php echo $base;?>img/fatality/lol.png"></i></div>
						<div class=" brand"><span class="label">Funny Videos</span></div>
					</a>
					<!--end constractors Code tile--> 
					<!--begin S1 News tile -->
					<a href='#fatality_modal1' data-toggle='modal' class="tile  bg-red">
						<div class="tile-content"><img src="<?php echo $base;?>img/ad/fatality/ad1.jpg" class="w120 h120"></div>
						
					</a>
                    <a href='#fatality_modal2' data-toggle='modal' class="tile  bg-red">
						<div class="tile-content"><img src="<?php echo $base;?>img/ad/fatality/ad2.jpg" class="w120 h120"></div>
						
					</a>
					<!--end S1 News Code tile-->
				</div>
			<!-------END  THIRD COLUMN FIRST ROW OF TILES------> 
            <!-- *********** start AD1 MODAL page ******************************** -->
    
	<div id="fatality_modal1" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;width:462px;" >
    
		<a href="http://globalwasteservice.ca/" target="new">
        <img src="<?php echo $base;?>img/ad/fatality/ad1.jpg" />
        </a>
		<div class="modal-footer bg-gray">
			<button class="btn" data-dismiss="modal" onclick="$('#fatality_modal1').hide();">Close</button>
		</div>
	</div>
<!-- ******************** end AD1 modal page ************************************* --> 
 <!-- *********** start AD2 MODAL page ******************************** -->
    
	<div id="fatality_modal2" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;width:462px;" >
    
		<a href="http://globalwasteservice.ca/" target="new">
        <img src="<?php echo $base;?>img/ad/fatality/ad2.jpg" />
        </a>
		<div class="modal-footer bg-gray">
			<button class="btn" data-dismiss="modal" onclick="$('#fatality_modal2').hide();">Close</button>
		</div>
	</div>
<!-- ******************** end AD2 modal page ************************************* --> 
		</div>
		<?php 
		if( $total_fatality_videos > $records_limit ) {
			$total_pages = ceil($total_fatality_videos/$records_limit);?>
			<div class="pagination small opacity pull-right" style="padding-right:30%;">
				 <?php $this->common->getS1Pagination('fatality_metro?fat='.$fat_type, $total_pages, $current_page, $records_limit, 10);?>
			</div>
			<?php
		}?>
        </div>
    </div>
<!--END OF CODE FOR METRO STYLE-->
<!-- Button to trigger modal -->

<!-- Modal -->
<div id="myModal" class="modal fade hide " tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header bg-red">
    <h3 id="myModalLabel"><span id="fatality_title"></span><i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal"></i></h3>
  </div>
  <div class="modal-body">
	<div class="charities-container" style="padding:0px 0px 0px 0px;box-shadow: none;">
		<div class="video-container">
			<!-----Code for Youtube video goes in the src attribute ----->
			<!-----In this case the variable is: TCu470B9K4Y----->
			<!-----The rest are standard parameters an can remain the same----->
			<iframe id="modalframe" width="853" height="510" frameborder="0" allowfullscreen="" ></iframe>
		</div>
		<div id="id_video_quiz"></div>
  </div></div>
  <div class="modal-footer"><button class="btn btn-close" data-dismiss="modal">Close</button></div>
</div>
</div>

<script type="text/javascript">
	$(function() {
		$('#myModal').on('hidden.bs.modal', function () {
			$("#myModal iframe").attr("src", $("#myModal iframe").attr("src"));
		});
	});
	$("#myModal .btn-close,.icon-cancel-2").click(function() {
		// Add User Quiz details //
			$videoId = $("#id_video_quiz").attr('videoid');						
			$.ajax({
				url: '<?php echo $base;?>ajax/checkIfAllQuizAnswered', 
				type: 'post', 
				async: false,
				data: {'videoId':$videoId},
				success: function(output) {
					if( output.trim() == '1' ) { // All video quiz answers are correct //
						setPagePoints('5', $videoId, 'id_modal_points', 'modal_points', 'fatality_video');
						setTimeout(function(){
							window.location.href = js_base_path+"admin/fatality_metro?fat=<?php echo $fat_type;?>";
						}, 2000);
					}
				}, 
				error: function(errMsg) {
					alert( errMsg.responseText );
					return false;
				}
			});
		$("#myModal iframe").attr("src", $("#myModal iframe").attr("src"));
	});

	$('.fatality-img').click(function(){
		$('#myModal').modal('show');
		$('#fatality_title').html($(this).attr("title"));
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
		$.post(js_base_path+'ajax/ajaxGetFatalityQuiz', {'videoId':videoId}, function(data) {
			$("#id_video_quiz").html(data);
			$("#id_video_quiz").attr('videoid', videoId);
		});
	}

	function checkQuizAnswer(videoId, quizId, isAnsCorrect, totalQuizAnswers)
	{
		var val_answer 		= $("input[name='answer"+quizId+"']:checked").val();
		var video_quiz_id 	= "vid"+videoId+"_q"+quizId;

		// Add User Quiz details //
			$.post(js_base_path+'ajax/addQuizDetails', {'quizSectionId':videoId,'quizId':quizId,'correctAns':isAnsCorrect,'userAnswer':val_answer,'totalQuizAnswers':totalQuizAnswers, 'quizSection':'fatality_breakdown'}, function(data) {
				return true;
			});

		if(isAnsCorrect == val_answer) {
			$("#icon_"+quizId).html("<img src="+js_base_path+"img/icons/right.png>");
		}
		else {
			$("#icon_"+quizId).html("<img src="+js_base_path+"img/icons/wrong.png>");
		}
	}
</script>

<?php $this->load->view('footer_admin'); ?>