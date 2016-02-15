<?php $this->load->view('header_admin');?>
		
<div class="homebg metro ">
    <!--BEGIN PAGE TITLE-->
		<div class="container-fluid">
			<div class="main-content padding-metro-header subheader-secondary clearfix fg-grayLighter"><em class="margin20">GET STARTED</em></div>
		</div>
    <!--END PAGE TITLE-->
    <div class="container-fluid padding-metro-home ">
    <div class="proceCon clearfix">
        <div class="row-fluid">
			<?php 
			$rows 			= $this->points->hasUserGainedPointsGetPoints(2, 23, $checkPointsGained=1);
			if( $rows['has_points_gained'] ) {
				$tile_class = "selected";
				$title		= "";
			}
			else {
				$tile_class = "";
				$title		= "Learn to earn ". $rows['page_points']." points";
			}?>
			<a href="#id_dashboard" data-toggle='modal' onclick="callModelDashboard();">
				<div class="tile double triple-half bg-black <?php echo $tile_class;?>">
					<div class="tile-content icongetstarted"><img src="<?php echo $base.$this->path_img_getstarted."dashboard.png";?>"></div>
					<div class="tile-status"><span class="name">DASHBOARD NAVIGATION</span></div>
				</div>
			</a>
			<?php 
			$rows 			= $this->points->hasUserGainedPointsGetPoints(2, 24, $checkPointsGained=1);
			if( $rows['has_points_gained'] ) {
				$tile_class = "selected";
				$title		= "";
			}
			else {
				$tile_class = "";
				$title		= "Learn to earn ".$rows['page_points']." points";
			}
			?>
			<a href="#id_profile" data-toggle='modal' onclick="callModelProfile();">
				<div class="tile double triple-half bg-black <?php echo $tile_class;?>">
					<div class="tile-content icongetstarted"><img src="<?php echo $base.$this->path_img_getstarted."profile.png";?>"></div>
					<div class="tile-status"><span class="name">PROFILE HOME</span></div>
				</div>
			</a>
			<?php 
			$rows 			= $this->points->hasUserGainedPointsGetPoints(2, 25, $checkPointsGained=1);
			if( $rows['has_points_gained'] ) {
				$tile_class = "selected";
				$title		= "";
			}
			else {
				$tile_class = "";
				$title		= "Learn to earn ".$rows['page_points']." points";
			}
			?>
			<a href="#id_message_connections" data-toggle='modal' onclick="callModelMessagingConnections();">
				<div class="tile double triple-half bg-black <?php echo $tile_class;?>">
					<div class="tile-content icongetstarted "><img src="<?php echo $base.$this->path_img_getstarted."connections.png";?>"></div>
					<div class="tile-status"><span class="name">MESSAGING/CONNECTIONS</span></div>
				</div>
			</a>
			<?php 
			$rows 			= $this->points->hasUserGainedPointsGetPoints(2, 26, $checkPointsGained=1);
			if( $rows['has_points_gained'] ) {
				$tile_class = "selected";
				$title		= "";
			}
			else {
				$tile_class = "";
				$title		= "Learn to earn ".$rows['page_points']." points";
			}
			?>
			<a href="#id_records_training" data-toggle='modal' onclick="callModelRecordsTraining();">
				<div class="tile double triple-half bg-black <?php echo $tile_class;?>">
					<div class="tile-content icongetstarted"><img src="<?php echo $base.$this->path_img_getstarted."records_training.png";?>"></div>
					<div class="tile-status"><span class="name">DIGITAL RECORDS OF TRAINING</span></div>
				</div>
			</a>
        </div>
        <div class="row-fluid">
			<?php 
			$rows 			= $this->points->hasUserGainedPointsGetPoints(2, 27, $checkPointsGained=1);
			if( $rows['has_points_gained'] ) {
				$tile_class = "selected";
				$title		= "";
			}
			else {
				$tile_class = "";
				$title		= "Learn to earn ".$rows['page_points']." points";
			}
			?>
			<a href="#id_hsprogram" data-toggle='modal' onclick="callModelHSprogram();">
				<div class="tile double triple-half bg-black <?php echo $tile_class;?>">
					<div class="tile-content icongetstarted"><img src="<?php echo $base.$this->path_img_getstarted."library.png";?>"></div>
					<div class="tile-status"><span class="name">HEALTH & SAFETY PROGRAM</span></div>
				</div>
			</a>
			<?php 
			$rows 			= $this->points->hasUserGainedPointsGetPoints(2, 28, $checkPointsGained=1);
			if( $rows['has_points_gained'] ) {
				$tile_class = "selected";
				$title		= "";
			}
			else {
				$tile_class = "";
				$title		= "Learn to earn ".$rows['page_points']." points";
			}?>
			<a href="#id_due_diligence" data-toggle='modal' onclick="callModelDueDiligence();">
				<div class="tile double triple-half bg-black <?php echo $tile_class;?>">
					<div class="tile-content icongetstarted"><img src="<?php echo $base.$this->path_img_getstarted."duediligence.png";?>"></div>
					<div class="tile-status"><span class="name">DUE DILIGENCE</span></div>
				</div>
			</a>
			<?php 
			$rows 			= $this->points->hasUserGainedPointsGetPoints(2, 29, $checkPointsGained=1);
			$tile_class = '';
			if( $rows['has_points_gained'] ) {
				$tile_class = "selected";
				$title		= "";
			}
			else {
				$tile_class = "";
				$title		= "Learn to earn ".$rows['page_points']." points";
			}
			?>
			<a href="#id_purchases" data-toggle='modal' onclick="callModelPurchases();">
				<div class="tile double triple-half bg-black <?php echo $tile_class;?>">
					<div class="tile-content icongetstarted"><img src="<?php echo $base.$this->path_img_getstarted."purchases.png";?>"></div>
					<div class="tile-status"><span class="name">PURCHASES</span></div>
				</div>
			</a>

			<?php 
			$tile_class = '';
			// Training Worker
				$rows_worker[] 	= $this->points->hasUserGainedPointsGetPoints(2, 30, $checkPointsGained=1);
				$rows_worker[] 	= $this->points->hasUserGainedPointsGetPoints(2, 1018, $checkPointsGained=1);
				$rows_worker[] 	= $this->points->hasUserGainedPointsGetPoints(2, 1021, $checkPointsGained=1);
				$rows_worker[] 	= $this->points->hasUserGainedPointsGetPoints(2, 1022, $checkPointsGained=1);

			 // Training Supervisor
				$rows_supervisor[]= $this->points->hasUserGainedPointsGetPoints(2, 1023, $checkPointsGained=1);
				$rows_supervisor[]= $this->points->hasUserGainedPointsGetPoints(2, 1024, $checkPointsGained=1);
				$rows_supervisor[]= $this->points->hasUserGainedPointsGetPoints(2, 1025, $checkPointsGained=1);
				$rows_supervisor[]= $this->points->hasUserGainedPointsGetPoints(2, 1026, $checkPointsGained=1);

			// common::pr($rows_worker);
			// common::pr($rows_supervisor);
			if( $rows_worker[0]['has_points_gained']&&$rows_worker[1]['has_points_gained']&&$rows_worker[2]['has_points_gained']&&$rows_worker[3]['has_points_gained'] 
			    && $rows_supervisor[0]['has_points_gained']&&$rows_supervisor[1]['has_points_gained']&&$rows_supervisor[2]['has_points_gained']&&$rows_supervisor[3]['has_points_gained'] ) {
				$tile_class = "selected";
				$title		= "";
			}
			else {
				$tile_class = "";
				$title		= "Learn to earn ".$rows['page_points']." points";
			}?>
			<a href='#modalUsertype'  data-toggle='modal'>
				<div class="tile double triple-half bg-black <?php echo $tile_class;?>">
					<div class="tile-content icongetstarted"><img src="<?php echo $base.$this->path_img_getstarted."training.png";?>"></div>
					<div class="tile-status"><span class="name">TRAINING</span></div>
				</div>
			</a>
        </div>
        </div>
    </div>

    <?php 
	
	// Modal: Complete Profile //
		$this->load->view('getstarted/modal_hsprogram');
	// Modal: Rewards //
		$this->load->view('getstarted/modal_message_connections');
	// Modal: Dashboard //
	$data['to_lang'] = $to_lang;
		$this->load->view('getstarted/modal_dashboard', $data);
	// Modal: Connections //
		$this->load->view('getstarted/modal_profile');
	// Modal: Library //
		$this->load->view('getstarted/modal_purchases');
	// Modal: My Wallet //
		$this->load->view('getstarted/modal_records_training');
	// Modal: Due Diligence //
		$this->load->view('getstarted/modal_due_diligence');
	?>
</div>

<!--********************* BEGIN MODAL  WORKER/SUPERVISOR ******************* -->
<div id="modalUsertype" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<!--BEGIN PAGE TITLE-->
		<div class="container-fluid">
			<div class="main-content padding-metro-header subheader-secondary clearfix fg-grayLighter">
				<em class="margin20"><strong>SELECT TRAINING</strong></em>
			</div>
		</div>
    <!--END PAGE TITLE-->
    <div class="container-fluid">
        <div class="row-fluid">
            <a href='<?php echo $base;?>admin/awareness_training?user=worker' data-toggle='modal'  class="tile double bg-darker training_user">
            	<div class="tile-content icon"><img src="<?php echo $base.$this->path_img_getstarted."profiles/icons_worker.png";?>"></div>
                <div class="tile-status" ><span class="name">WORKER</span></div>
            </a>
            <a href='<?php echo $base;?>admin/awareness_training?user=supervisor'  data-toggle='modal'  class="tile double bg-darker training_user">
	            <div class="tile-content  icon"><img src="<?php echo $base.$this->path_img_getstarted."profiles/icons_supervisor.png";?>"></div>
                <div class="tile-status"><span class="name">SUPERVISOR</span></div>
            </a>
            <a href='<?php echo $base;?>admin/dashboard'  class="tile double bg-darker training_user" >
                <div class="tile-content icon" >
                    <span class="icon"><img src="<?php echo $base;?>img/library-page/next_icon.png"></span>
                </div>
                <div class="brand">
                    <span class="label fg-white"><strong>SKIP</strong></span>
                </div>
            </a>
			<span id="proc_training_tab" class=""></span>
        </div>
    </div>
</div>
<script type="text/javascript">
$('#modalUsertype').css({'width':'auto',
	'padding-top':'15%',
	'background-color':'transparent',
	'box-shadow':'none',
	//'left':'35%'
}); 
</script>	   
<!--********************* END MODAL FOR WORKER/SUPERVISOR ******************* -->


 <!-- *********** start MODAL SKIP ******************************** -->
	<div id="modalSkip" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;">
		<a href="<?php echo $base;?>admin/dashboard">
        	<img src="<?php echo $base.$this->path_img_getstarted."skip.jpg";?>" />
        </a>
		<div class="modal-footer" style="background-color:#F01D1D">
			<button class="btn" data-dismiss="modal" style="float:left;">Keep me here.</button>
			<a href="#"><button class="btn btn_skip_keepmehere">Dashboard</button></a>
		</div>
	</div>
<!--********************* END MODAL SKIP ******************* -->  
<script type="text/javascript">
	$('.btn_skip_keepmehere').click(function(){
		if( confirm("Are you sure you want to skip Get Started") ) {
			$.ajax({
				url: js_base_path+'ajax/ajaxSetPointsForWholePageSection',
				type: 'post', 
				data: {'pointSection':'getstarted_awareness_training'},
				success: function(output) {
					$("#id_modal_points").html(output);
					$("#modal_points").modal('show');
					setTimeout(function() {
						window.location.href = js_base_path+"admin/dashboard";
					}, 2000);
				}, 
				error: function(errMsg) {
					alert( errMsg.responseText );
					return false;
				}				
			});
		}
	});
	$('.triple-half').click(function(){
		if($(this).hasClass('selected')){
			// $(this).removeClass('selected'); // Line is disabled because Tile should not unselected when its selected //
		}
		else{
			$(this).addClass('selected');
		}
	});

	/*script for equal height columns*/
	$(document).ready (function(){
		$('.flexslider').flexslider({
			controlNav: false, 
			animationLoop: false, 
			slideshow: false,
			prevText:"",
			nextText:"",
			after: function(slider) {
				$('.btn-close').click(function() {
					$pointpage_section_id 	= $("div.modal_getstarted.in").attr('pointpage_section_id');
					$total_slides 			= parseInt( $("div.modal_getstarted.in ul li.slides-li").length-1 );
					window.curSlide 		= slider.currentSlide;
					if( window.curSlide == $total_slides ) {
						setPagePoints(2, $pointpage_section_id, 'id_modal_points', 'modal_points', 'getstarted');
					}
					setTimeout(function() {
						window.location.reload();
					}, 2000);
				});
			}
		});

		$(".started-item .started-img").click(function(){		
			$("#started-overlay").addClass(" started-overlay ").stop().animate({opacity:0.7}),
			$(".started-i-c").fadeOut("fast"),
			$(this).siblings(".started-i-c").fadeIn(300, function(){			
				$(".started-item .icon-remove, .started-item .close-button ").click(function(){
					$(".started-i-c").fadeOut(500),
					$("#started-overlay").stop().animate({opacity:0},300, function(){
						$(this).removeClass(" started-overlay ")
					});
				});
			}),
			$(".item").addClass("active"),
			$('.item').equalHeightColumns(),
			$(".item").removeClass("active"),
			$(".item:first-child").addClass("active")
		});		
		$('.started-carousel').carousel({
			interval: false
		});
		$('.started-img').equalHeightColumns();
	});
</script>

<?php $this->load->view('footer_admin'); ?>
<script type="text/javascript">
	$('.info-item').css({ 'top':'1%', });
	$('.flexslider_info').css({ 'border':'0px',  'box-shadow':'0px', 'padding':'0px', 'margin':'0px' });
	$('.flexslider_info .slides img').css({ 'width':'100%',  'display':'block', 'height':'100%', 'max-width':'720px'});
	$('.s1content_body_section_left li').css({ 'line-height':'23pt'});
	$('.icon_height').css({ 'line-height':'23pt'});
	$('.s1content_body_section_left img').css({ 'float':'left', 'margin-right':'5px'});
	$('.slides').css({ 'margin-left':'0px',  'padding':'0px' });
	$('.modal-body').css({ 'margin-left':'0px',  'padding':'0px', 'max-height':'80vh','overflow-y':'auto','overflow-x':'hidden', 'max-width':'720px',  'width':'100%' });
	$('.modal-header').css({'border':'0px'});
	$('.modal-footer').css({'border-radius':'0px'});
	$('.modal_getstarted').css({ 'max-width':'720px','width':'100%'});
</script>