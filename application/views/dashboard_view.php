<?php $this->load->view('header_admin');?>
<div class="homebg">
  <div class="container-fluid">
  <div class="wrapper">
   <!-- Start MainSlider Row -->
    <div class="row-fluid dashboard-ads-container">
      <div class="span12 dashboard-content">
        <div class="slider-wrapper">
    <!--begin slider-->
    <div id ="myCarousel" class="carousel slide">
    <!-- Carousel items -->
    <div class="carousel-inner">
    <div class="active item">
	<div class="carousel-content"><div class="carousel-content-inner"><h3></h3><p></b></p></div></div>
    <img src="<?php echo $base.$this->path_img_slider."banner-0.jpg";?>" />
    </div>
    <div class="item"><img src="<?php echo $base.$this->path_img_slider."banner-1.jpg";?>" /></div>
    <div class="item"><img src="<?php echo $base.$this->path_img_slider."banner-2.jpg";?>" /></div>
    <div class="item"><img src="<?php echo $base.$this->path_img_slider."banner-3.jpg";?>" /></div>
    <div class="item"><img src="<?php echo $base.$this->path_img_slider."banner-4.jpg";?>" /></div>
	<div class="item"><img src="<?php echo $base.$this->path_img_slider."banner-5.jpg";?>" /></div>
    <div class="item"><img src="<?php echo $base.$this->path_img_slider."banner-6.jpg";?>" /></div>
    <div class="item"><img src="<?php echo $base.$this->path_img_slider."banner-7.jpg";?>" /></div>
    <div class="item"><img src="<?php echo $base.$this->path_img_slider."banner-8.jpg";?>" /></div>
    <div class="item"><img src="<?php echo $base.$this->path_img_slider."banner-9.jpg";?>" /></div>
    </div>
    </div>
	<!--end slider-->
        </div>
      </div>
    </div>
	
	<?php
	// Modal: Health and Safety Network //
		$this->load->view('frontend/modal_health_safety_network');
	// Modal: Know your Rights //
		$this->load->view('frontend/modal_know_your_rights');
	?>
     <!-- End MainSlider Row -->
	 
      <!--Start More Separator Row -->
   <div class="row-fluid dashboard-ads-container">
      <div id="more-separator" class="span12">
        <div id="more" class="pull-right">
        <a href="<?php echo $base;?>admin/profile">MORE ></a>
        </div>
      </div>
    </div>    
      <!--End More Separator Row -->
      <!-- Start S1 newsfeeds / Equipment Row -->
    <div id="news-row" class="dashboard-ads-container row-fluid">
      <div class="span3"> <div class="text-center"><a href="<?php echo $base;?>admin/news_metro"> <img src="<?php echo $base;?>img/dashboard/news.jpg" /></a></div>
        
        <h4><a href="<?php echo $base;?>admin/news_metro">NEWSROOM</a></h4>
        
        <!--p>Leading news from around the world.  Top stories from the Ministry of Labour and Premiers Office.  Keep in the know with S1’s direct link to what’s making headlines.</p-->
      </div>
      <div class="span3"> <div class="text-center"><a href="<?php echo $base;?>admin/fatality_metro"> <img src="<?php echo $base;?>img/dashboard/fatality.jpg" /></a></div>
        <h4><a href="<?php echo $base;?>admin/fatality_metro">FATALITY BREAKDOWN</a></h4>
        <!--p>Leading news from around the world.  Top stories from the Ministry of Labour and Premiers Office.  Keep in the know with S1’s direct link to what’s making headlines.</p-->
      </div>
      <div class="span3"><div class="text-center"> <a href="<?php echo $base;?>admin/construction"><img src="<?php echo $base;?>img/dashboard/safety-equip.jpg" /></a></div>
        <h4><a href="<?php echo $base;?>admin/construction">SAFETY EQUIPMENT</a></h4>
        <!--p>Take health and safety into your own hands with S1’s interactive tool; find out what safety equipment you will need to do your job safely.  </p-->
      </div>
      
      <div class="span3"><div class="text-center"> <a href="<?php echo $base;?>admin/hazard"><img src="<?php echo $base;?>img/dashboard/dig_hazard.jpg" /></a></div>
        <h4><a href="<?php echo $base;?>admin/hazard">DIGITAL HAZARDS</a></h4>
        <!--p>Do you know what hazards are in your workplace? Can you spot them and know what to do when you come across them? Test your knowledge with S1’s virtual workplaces and learn how to prevent injuries before they happen. </p-->
      </div>
      
      </div>
      <div id="news-row" class="row-fluid dashboard-ads-container">
      
      <div class="span3"><div class="text-center"> <a href="<?php echo $base;?>admin/mol?stats=field_visits"><img src="<?php echo $base;?>img/dashboard/mol.jpg" /></a></div>
        <h4><a href="<?php echo $base;?>admin/map">MOL ENFORCEMENT STATS</a></h4>
        <!--p>Take health and safety into your own hands with S1’s interactive tool; find out what safety equipment you will need to do your job safely.  </p-->
      </div>
      
      <div class="span3"><div class="text-center"> <a href="<?php echo $base;?>admin/reward"><img src="<?php echo $base;?>img/dashboard/rewards.jpg" /></a></div>
        <h4><a href="<?php echo $base;?>admin/reward">REWARDS</a></h4>
        <!--p>Do you know what hazards are in your workplace? Can you spot them and know what to do when you come across them? Test your knowledge with S1’s virtual workplaces and learn how to prevent injuries before they happen. </p-->
      </div>
      
      <div class="span3"><div class="text-center"> <a href="#modal_hsnetwork" data-toggle='modal'><img src="<?php echo $base;?>img/dashboard/h&S_network.jpg" /></a></div>
        <h4><a href="<?php echo $base;?>admin/reward">Ont. H&S NETWORK</a></h4>
        <!--p>Do you know what hazards are in your workplace? Can you spot them and know what to do when you come across them? Test your knowledge with S1’s virtual workplaces and learn how to prevent injuries before they happen. </p-->
      </div>
      
      <div class="span3"><div class="text-center"> <a href="#modal_young_workers" data-toggle='modal'><img src="<?php echo $base;?>img/dashboard/young_worker.jpg" /></a></div>
        <h4><a href="<?php echo $base;?>admin/reward">YOUNG WORKERS</a></h4>
        <!--p>Do you know what hazards are in your workplace? Can you spot them and know what to do when you come across them? Test your knowledge with S1’s virtual workplaces and learn how to prevent injuries before they happen. </p-->
      </div>
      
    </div>
      <!-- End S1 newsfeeds / Equipment Row -->

     <!-- Start Newsticker -->
   <?php
 
//Load the shiny new rssparse at controller/admin.php construct method
//$this->load->library('RSSParser', array('url' => 'http://news.ontario.ca/newsroom/en/rss/', 'life' => 2));
//Get six items from the feed

//$this->load->view('rss-dashboard.php');
    ?>
	<!-- Bottom Banner Ad -->
    <div class="dashboard-ads-container">
    <?php $this->load->view('center-leaderboard.php'); ?>    
    </div>
	<!-- end bottom banner ad -->
</div>
</div>
</div>

<!-- *********** start GETSTART MODAL page ******************************** -->
	<div id="getstart" class="modal hide fade dashboard-main-model" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;">
		<img src="<?php echo $base;?>img/dashboard/Welcome-to-S1.jpg" />
		<div class="modal-footer" style="background-color:#F01D1D">
			<button class="btn" data-dismiss="modal" >Dashboard</button>
			<a href="<?php echo $base;?>admin/getstart_metro"><button class="btn" style="float:left;">Get Started</button></a>
		</div>
	</div>
<!-- ******************** end GETSTART modal page ************************************* -->


<!-- *********** Start - EARN FIRST TIME LOGIN POINTS ******************************** -->
<?php 
if( '' == $user_already_login_firsttime && "7" != $this->sess_usertype ) 
{
	?>
	<div id="id_login_points" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;">
		<h4 align="center"><img src="<?php echo $base;?>img/points-level/plus_xp.png" /> <span class="fg-white points-number" ><?php echo $firsttime_login_points;?></span></h4>
		<button class="btn btn_login_points btn-danger bg-red fg-white" style="float:right;">Close</button>
	</div>
            <script type="text/javascript">
		$('#id_login_points').css({'width':'auto',
		'padding-top':'8%',
		'background-color':'transparent',
		'box-shadow':'none',
		'left':'35%'
	}); 
	$('.points-number').css({'font-size':'100px',
		'vertical-align':'middle',
		'font-weight':'bold'		
	}); 
</script>
	<?php
}
$rows_getstarted_tiles = $this->users->getMetaDataList('points_of_users', 'in_noof_page_occurance=1 AND in_page_id=2 AND in_user_id="'.$this->sess_userid.'"', '', 'COUNT(in_pointpage_section_id) AS total_getstarted_tiles');
$rows_getstarted_tiles = isset($rows_getstarted_tiles[0]['total_getstarted_tiles']) ? $rows_getstarted_tiles[0]['total_getstarted_tiles'] : 0;
?>
<!-- *********** End - EARN FIRST TIME LOGIN POINTS ******************************** -->

<script type="text/javascript">
	$(document).ready(function() {
		var $s1_getstarted_tiles 		= parseInt('<?php echo $s1_getstarted_tiles;?>');
		var $user_already_login_firsttime = '<?php echo $user_already_login_firsttime;?>';
		var $rows_getstarted_tiles 		= parseInt('<?php echo $rows_getstarted_tiles;?>');
		var $sess_usertype 				= '<?php echo $this->sess_usertype;?>';

		('7' != $sess_usertype) ? $('#id_login_points').modal('show') : '';

		/* $(".btn_login_points").click( function() {
			$('#id_login_points').modal('hide');
			if( $rows_getstarted_tiles < $s1_getstarted_tiles ) {
				$('#getstart').modal('show');
			}
		});
		*/

		if( $user_already_login_firsttime || '7' == $sess_usertype ) {
			$('#id_login_points').modal('hide');
			// alert( $rows_getstarted_tiles + $s1_getstarted_tiles );
			if( $rows_getstarted_tiles < $s1_getstarted_tiles ) {
				$('#getstart').modal('show');
			}
		}
	});
</script>
 
<script type="text/javascript">
    // You can also use "$(window).load(function() {"
    $(function () {
      // Slideshow 1
      $("#slider1").responsiveSlides({speed: 800});
    });
	$('.carousel').carousel({
		interval: 6000,
	});
	$('.carousel_ads').carousel({
		interval: 4000,
	});
	
</script>  
   
<?php $this->load->view('footer_admin'); ?>