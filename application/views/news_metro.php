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
	<div class="homebg metro profile-home">
    	<!--BEGIN PAGE TITLE-->
    <div class="container-fluid">
        <div class="main-content padding-metro-header subheader-secondary clearfix fg-grayLighter">
        <em class="margin20">S1 NEWSROOM &nbsp;&nbsp;
        	<!--a href="#info_news_modal" data-toggle='modal'><span class="icon-info-2 s1_info fg-white"></span></a-->
        </em> 
        </div>
    </div>
    <!-- Start INFO Modal - -> 
    < ?php // Modal: INFO//
					$this->load->view('info/news_modal');
				?>	
    <!-- End INFO Modal -->
    <!--END PAGE TITLE-->
		<div class="container">
			<div class="main-content news_metro padding-metro-home  clearfix"> 
							<!--START CODE FOR METRO STYLE-->
								<!-------BEGIN FIRST ROW first column OF TILES------>
                                <div class="tile-group no-margin no-padding width260 five" > 
								<!--begin text information paragraphs -->
											<div class="tile quadro marcio_profile_home double-vertical ol-transparent bg-white" >
												<div class="tile-content">
													<div class="panel no-border">
														<div class=" bg-hazards-tiles fg-white">
														<!--BEGIN SLIDER-------------------------------------->	
                                                        
    <!--begin slider-->
<div id ="myCarousel" class="carousel slide">
    <!-- Carousel items -->
    <div class="carousel-inner">
    <div class="active item" >
    	<a href="<?php echo $base;?>admin/reward" >
       		<img src="<?php echo $base;?>img/s1news/banner-1.jpg" />
        </a>
    </div>
    <div class="item">
    	<a href="<?php echo $base;?>admin/reward" >
       		<img src="<?php echo $base;?>img/s1news/banner-2.jpg" />
        </a>
    </div>
	<div class="item">
    	<a href="<?php echo $base;?>admin/reward" >
       		<img src="<?php echo $base;?>img/s1news/banner-3.jpg" />
        </a>
    </div>
    <div class="item">
    	<a href="<?php echo $base;?>admin/reward" >
       		<img src="<?php echo $base;?>img/s1news/banner-4.jpg" />
        </a>
    </div>
    <div class="item">
    	<a href="<?php echo $base;?>admin/reward" >
       		<img src="<?php echo $base;?>img/s1news/banner-5.jpg" />
        </a>
     </div>
    
    </div>
    </div>       <!-- End Iosslider/Main Slider Navigation Row -->
       
														<!--END SLIDER -------------------------------------->	
														</div>
														
													</div>
												</div>
											</div>
                                                       <br />                      	
                                   <!--begin small tile-->
                                    <a class="tile bg-red" href="<?php echo $base;?>admin/news?tile=1" title="S1 News">
                                    	<div class="tile-content">
											<img src="<?php echo $base;?>img/s1news/ontario_employment.png">
										</div>
										<!--div class="brand">
											<span class="label fg-white">S1 NEWS</span>
										</div-->
									</a>
								<!--end small tile--> 
                                <!--begin small tile-->
									<a class="tile bg-red" href="<?php echo $base;?>admin/news?tile=2" title="News from the Ministry of Labour">
										<div class="tile-content icon">
											<span class="icon"><img src="<?php echo $base;?>img/s1news/ministry_labour.png"></span>
										</div>
										<div class=" brand"><span class="label">Ministry of Labour</span></div>									</a>
								<!--end small tile--> 
                                
                                <!--begin small tile-->
									<a class="tile  bg-red" href="<?php echo $base;?>admin/news?tile=3" title="News from Canadian Centre for Occupational Health and Safety">
										<div class="tile-content icon">
											<span class="icon"><img src="<?php echo $base;?>img/s1news/ccohs.png"></span>
										</div>
										<div class=" brand"><span class="label">CCOHS</span></div>
									</a>
								<!--end small tile--> 
								<!--begin small tile-->
									<a class="tile  bg-red" href="<?php echo $base;?>admin/news?tile=4" title="News from COS Magazine">
										<div class="tile-content">
											<img  src="<?php echo $base;?>img/s1news/cos.png">
										</div>
										<div class=" brand"><span class="label">COS Magazine</span></div>
									</a>
								<!--end small tile-->
								<!--begin small tile-->
									<a class="tile  bg-red" href="<?php echo $base;?>admin/news?tile=6" title="News from WSIAT">
										<div class="tile-content">
											<img class="padding10" src="<?php echo $base;?>img/s1news/wsiat.png">
										</div>
										<div class=" brand"><span class="label">WSIAT</span></div>									</a>
								<!--end small tile-->  
										<!--end text information paragraphs--> 
                                 </div>

                                 <!-------END FIRST ROW first column OF TILES------> 
                                 <!-- BEGIN SECOND COLUMN FIRST ROW -->
                                <div class="tile-group no-margin no-padding clearfix width150 span2">
                                	<!--begin small tile-->
									<a class="tile bg-red" href="https://www.facebook.com/mys1s">
										<div class="tile-content icon">
											<span class="icon"><img src="<?php echo $base;?>img/s1news/facebook.png"></span>
										</div>
										<!--div class="brand">
											<span class="label fg-white">Facebook</span>
										</div-->
									</a>
								<!--end small tile-->
                                <!--begin small tile-->
									<a class="tile bg-red" href="javascript:void(0);" title="View to earn <?php echo $social_media_points;?> points" onclick="setPagePoints('8','21','id_modal_points','modal_points', 'instagram');" >
										<div class="tile-content icon">
											<span class="icon"><img src="<?php echo $base;?>img/s1news/instagram.png"></span>
										</div>
										<!--div class="brand">
											<span class="label fg-white">Instagram</span>
										</div-->
									</a>
								<!--end small tile--> 
                                
                                <!--begin small tile-->
									<a class="tile  bg-red" href="<?php echo $base;?>admin/news?tile=5" title="News from Workplace Safety and Insurance Board">
										<div class="tile-content icon">
											<span class="icon"><img src="<?php echo $base;?>img/s1news/wsib.png"></span>
										</div>
										<div class=" brand"><span class="label">WSIB</span></div>
									</a>
								<!--end small tile--> 
									</div>
                                 <!-- END SECOND COLUMN FIRST ROW -->

                                
                                 <!-------BEGIN THIRD COLUMN FIRST ROW OF TILES------>
                            <div class="tile-group no-margin no-padding clearfix span2" >                    
                                <div class="tile double profile-content-box tab-content">
                                <a target="new" href="http://www.bairrada.ca/">
                                <img src="<?php echo $base;?>img/ad/news/ad1.png">
                                </a>
                                </div>
                                <div class="tile double profile-content-box tab-content">
                                <a target="new" href="http://www.remax.ca/on/brian-jeronimo-91397-ag/">
                                <img src="<?php echo $base;?>img/ad/news/ad2.png">
                                </a>
                                </div>
                                <div class="tile double profile-content-box tab-content">
                                <a target="new" href="http://newcanadians.hhstores.ca/">
                                <img src="<?php echo $base;?>img/ad/news/ad3.png">
                                </a>
                                </div>
                        
                                
                            </div>
                        <!-------END  THIRD COLUMN FIRST ROW OF TILES------> 

                                
                                  
				
			</div>
		</div>
	</div>
<!--END OF CODE FOR METRO STYLE-->
<?php $this->load->view('footer_admin');?>
<script type="text/javascript">
$('.carousel').carousel({ interval: 4000 });
</script>