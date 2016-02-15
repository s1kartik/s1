<?php 
$this->load->view('header_admin');
$total_points = $this->points->getS1Points($this->sess_userid, $this->sess_usertype);

// Get points Level
	// $points_level = (isset($my_user_wallet['level']) && $my_user_wallet['level']) ? $my_user_wallet['level'] : '0';
	$points_level 	= $this->users->getMetaDataList('users_points_level', 'in_user_id="'.$this->sess_userid.'"', '', 'in_points_level');
	$points_level 	= $data['points_level'] = isset($points_level[0]['in_points_level']) ? $points_level[0]['in_points_level'] : '0';
	// $points_level = 2;

// Get next level points //
	$next_level_points = $data['next_level_points'] = Common::getNextLevelPoints(1);

	if(2==$points_level) {
		$href_rewards	=  'href="http://www.perkopolis.com/Registration-Form-Perkopolis-2013" target="new"';
		$img_url = $base."img/reward/rewards_unlocked.png";
	}
	else {
		$href_rewards	= 'href="#modal_reward"';
		$img_url = $base."img/reward/rewards_locked.png";
	}
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
    <div class="container">
        <div class="main-content padding-metro-header subheader-secondary clearfix fg-grayLighter">
        <em class="margin20">REWARDS SYSTEM&nbsp;&nbsp;
        	<!--a href="#info_rewards_modal" data-toggle='modal'><span class="icon-info-2 s1_info fg-white"></span></a-->
        </em> 
        </div>
    </div>
    <!-- Start INFO Modal - -> 
    < ?php // Modal: INFO//
	$this->load->view('info/rewards_modal');?>	
    <!-- End INFO Modal -->
    <!--END PAGE TITLE-->
    <div class="container">
        <div class="main-content padding-metro-home  reward-data-container clearfix"> 
        <!-- ***************** second part test *************** -->
        <div class="tile-group three no-margin no-padding" >
        <!-------BEGIN FIRST ROW FIRST COLUMN OF TILES------>
			<!--begin Member Id Code tile -->
			<a <?php echo $href_rewards;?> data-toggle='modal' class="tile triple bg-white reward-header"><img src="<?php echo $img_url;?>"></a>
			<!--end Member Id Code tile-->
			
			<!--begin Perkopolis tile -->
			<a <?php echo $href_rewards;?> data-toggle='modal' class="tile double-vertical triple bg-white reward-registration">
				<div class="tile-content "><img src="<?php echo $base;?>img/reward/perkopolis.png"></div>
			</a>
			<!--end Perkopolis Code tile-->
         </div>
		 
         <div class="tile-group three no-margin no-padding" >
			<!--begin Reward 1 Code tile -->
			<a href="http://www.perkopolis.com/Cirque-Du-Soleil" class="tile bg-white" target="new"><img src="<?php echo $base;?>img/reward/reward1.png"></a>
			<!--end Reward 1 Code tile-->
			<!--begin Reward 2 Code tile -->
			<a href="http://www.perkopolis.com/Shopping/Shopping-Michael-Kors" class="tile bg-white" target="new"><img src="<?php echo $base;?>img/reward/reward2.png"></a>
			<!--end Reward 2 Code tile-->
			<!--begin Reward 3 Code tile -->
			<a href="http://www.perkopolis.com/Attractions/Attractions-View-All/Canadas-Wonderland-PERK" class="tile bg-white" target="new"><img src="<?php echo $base;?>img/reward/reward3.png"></a>
			<!--end Reward 3 Code tile-->
			<!--begin Reward 4 Code tile -->
			<a href="http://www.perkopolis.com/Bell" class="tile bg-white" target="new"><img src="<?php echo $base;?>img/reward/reward4.png"></a>
			<!--end Reward 4 Code tile-->
			<!--begin Reward 5 Code tile -->
			<a href="http://www.perkopolis.com/Whats-New" class="tile bg-white" target="new"><img src="<?php echo $base;?>img/reward/reward5.png"></a>
			<!--end Reward 5 Code tile-->
			<!--begin Reward 6 Code tile -->
			<a href="http://www.perkopolis.com/Shopping/Hugo-Boss" class="tile bg-white" target="new"><img src="<?php echo $base;?>img/reward/reward6.png"></a>
			<!--end Reward 6 Code tile-->
			<!--begin Reward 7 Code tile -->
			<a href="http://www.perkopolis.com/Travel/Via-Train/VIARail" class="tile bg-white" target="new"><img src="<?php echo $base;?>img/reward/reward7.png"></a>
			<!--end Reward 7 Code tile-->
			<!--begin Reward 8 Code tile -->
			<a href="http://www.perkopolis.com/Movies/Cineplex-Theatres" class="tile bg-white" target="new"><img src="<?php echo $base;?>img/reward/reward8.png"></a>
			<!--end Reward 8 Code tile-->
			<!--begin Reward 9 Code tile -->
			<a href="http://www.perkopolis.com/Imperial-Oil-Esso" class="tile bg-white" target="new"><img src="<?php echo $base;?>img/reward/reward9.png"></a>
			<!--end Reward 9 Code tile-->
         </div>
		   
		   
           <!--<div class="tile-group three no-margin no-padding" >
                <!--begin Restaurants Code tile - ->
                <a class="tile double bg-darkCobalt">
                    <div class="tile-content icon">
                        <i class="icon "><img src="< ?php echo $base;?>img/reward/reward-blue1.png" /></i>
                    </div>
                    <div class=" brand">
                        <span class="label fg-white"><strong>RESTAURANTS</strong></span>
                    </div>
                </a>
                <!--end Restaurants Code tile- ->
              
                <!--begin Contractors tile - ->
                <a class="tile double bg-darkCobalt">
                    <div class="tile-content  icon">
                        <i class="icon "><img src="< ?php echo $base;?>img/reward/reward-blue2.png"></i>
                    </div>
                    <div class=" brand">
                        <span class="label fg-white"><strong>CONTRACTORS</strong></span>
                    </div>
                </a>
                <!--end constractors Code tile--> 
                
                <!--begin S1 News tile - ->
                <a class="tile double bg-darkCobalt">
                    <div class="tile-content  icon">
                        <i class="icon "><img src="< ?php echo $base;?>img/reward/reward-blue3.png"></i>
                    </div>
                	<div class=" brand">
                        <span class="label fg-white"><strong>S1 NEWS</strong></span>
                    </div>
                </a>
                <!--end S1 News Code tile- -> 
        <!-- END  FIRST ROW FIRST COLUMN - ->  
        </div> -->
        <!-- ****************** end second part test ******************* -->
         
		 
		 
        </div>
    </div>
</div>
<!--END OF CODE FOR METRO STYLE-->
<?php 
$this->load->view('frontend/modal_reward', $data);
$this->load->view('footer_admin');
?>
