<?php $this->load->view('header_admin');
?>
<div class="homebg ">
	<!--BEGIN PAGE TITLE-->
    <div class="container-fluid">
        <div class="main-content padding-metro-header subheader-secondary clearfix fg-grayLighter">
        <em class="margin20"><h3>CONSULTANT S1 PUBLIC PAGE</h3></em>
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
						$pimg = $base."img/default.png";?>
						<img src="<?php echo $pimg;?>" rel="<?php echo $userDetail['id'];?>"/>
					</div>
				</div>			
				<div class="span9">
					<div class="u-details">
						<?php 
						$city = $province = $country = '';?>
							<h3 class="u-name"><?php echo isset($userDetail['firstname']) ? strtoupper($userDetail['firstname']) : '';?> <?php echo isset($userDetail['lastname']) ? strtoupper($userDetail['lastname']) : '';?></h3>
							<h5 class="u-trade">
								<?php 
								$usermeta['industry_id'] = isset($usermeta['industry_id']) ? $usermeta['industry_id'] : '';
								$industry = $this->users->getElementByID('tbl_industry', $usermeta['industry_id']);
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
							$location = strtoupper($city." ".$province." ".$country);
							?>
							<h6 class="u-loc">60 CASTER AVENUE - <?php echo $location;?>, L4L 5Y9</h6>
						<?php 
						?>
					</div>
				</div>
				<!-- END HEADER INFORMATION-->
			</div>
		</div>
		<!--------END UNION PROFILE HEAD-------->
		<!--menu bar-->
        <div class="metro">
  <!------------------------------------------------------------------------>
    <nav class="navigation-bar  dark" id="mobile-collapse">
    <nav class="navigation-bar-content title" style="padding:0px 0px 0px;">
            <a class="element1 pull-menu"></a>

      <ul class="element-menu" id="metro-left-menu">
     	<li><a href="#" data-target="#myCarousel" data-slide-to="0"><strong>ABOUT US</strong></a></li>
        <li class="element-divider"></li>
        <li><a href="#" data-target="#myCarousel" data-slide-to="1"><strong>NEWS</strong></a></li>
        <li class="element-divider"></li>
		<li><a href="#" data-target="#myCarousel" data-slide-to="2"><strong>CHARITY</strong></a></li>
		<li class="element-divider"></li>
        <li class="element-menu">
						<a href="#" data-target="#myCarousel" data-slide-to="3"><strong>OUR SERVICES</strong></a>
		</li>
        <li class="element-divider"></li>
        <li class="element-menu">
						<a href="#" data-target="#myCarousel" data-slide-to="4"><strong>OUR CLIENTS</strong></a>
		</li>
        <li class="element-divider"></li>
         <li class="element-menu">
						<a href="#" data-target="#myCarousel" data-slide-to="5"><strong>CONTACT US</strong></a>
		</li>
        <li class="element-divider"></li>     
        
        <li><a data-original-title="FACEBOOK" href="#" title="" target="_new"><i class="icon-facebook"></i></a></li>
        <li class="element-divider"></li>
        
        <li class="element-divider"></li>
	   </ul>
 
           </nav></nav></div>
            <!--END MENU BAR-->
   		<!---------END ROW FOR INSTRUCTOR SIGN IN TO UNION LIBRARY-------->        
		<!--slider-->
        <div class="row-fluid">
		<div class="module">
        
        <!-- Start MainSlider Row -->
    <div class="row-fluid">
      <div class="span12">
        <div class="slider-wrapper">
    
    <!--begin slider-->
    <div id ="myCarousel" class="carousel slide">
    <!-- Carousel items -->
    <div class="carousel-inner">
    <div class="active item">
		<div class="carousel-content">
       		<div class="carousel-content-inner">
				<h3>ABOUT US</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla lacinia neque, non pretium turpis pharetra et. Aliquam a nisi nec risus varius feugiat. Suspendisse fermentum, ex ullamcorper tempor aliquam, dolor leo iaculis purus, ut rutrum ante velit at lorem. Phasellus non feugiat leo.</p>
				<a href="#about" class="btn btn-danger">Read more!</a>
       		</div>
		</div>
		<img src="<?php echo $base.$this->path_img_slider."banner-0.jpg";?>" />       		
    </div>
    <div class="item">
		<div class="carousel-content">
       		<div class="carousel-content-inner">
            <h3>NEWS</h3>
       			<p>Here at S1 we care about your Health and Safety</p>
       			<a href="<?php echo $base;?>admin/profile_view_integrated" class="btn btn-danger">Learn More</a>
       		</div>
		</div>
		<img src="<?php echo $base.$this->path_img_slider."banner-1.jpg";?>" />
    </div>
    
	<div class="item">
    
   <div class="carousel-content">
       		
       		<div class="carousel-content-inner">
            <h3>CHARITY</h3>
       			<p>Here’s your opportunity to earn valuable points as you learn about Health and Safety in the workplace. Check out our participating retailers providing YOU the member discounts!</p>
       			<a href="<?php echo $base;?>admin/my_wallet" class="btn btn-danger">Start Saving</a>
       		</div>
       		</div>
    	<img src="<?php echo $base.$this->path_img_slider."banner-2.jpg";?>" />
    </div>
    <div class="item">
   <div class="carousel-content">
		<div class="carousel-content-inner">
		<h3>OUR SERVICES</h3>
			<p>Based on the industry and sector you’re in, the system will make recommendations for the information you need. Select, purchase, drag and drop, learn and earn points.</p>
			<a href="<?php echo $base;?>admin/profile_view_integrated" class="btn btn-danger">Learn More</a>
		</div>
    </div>
    					<img src="<?php echo $base.$this->path_img_slider."banner-3.jpg";?>" />
    </div>
    <div class="item">
     <div class="carousel-content">
       		
       		<div class="carousel-content-inner">
            <h3>OUR CLIENTS</h3>
       			<p>The S1 Trailer is on the road, traveling from workplace to workplace bringing workers and employers up to speed on Health and Safety. </p><p><b>Send us an email if you want us to visit your workplace or event.</b></p>
       			<a href="<?php echo $base;?>admin/profile_view_integrated" class="btn btn-danger">Learn More</a>
       			
       		</div>

       		</div>
     <img src="<?php echo $base.$this->path_img_slider."banner-4.jpg";?>" />
     </div>
     <div class="item">
     <div class="carousel-content">       		
       		<div class="carousel-content-inner">
            <h3>CONTACT US</h3>
       			<p>This interactive map is an ideal way to keep track of the amazing condos that will soon be a fixture across the GTA. S1 we’ll keep you up-to-date as more buildings are constructed.</p>
       			<a href="<?php echo $base;?>admin/map" class="btn btn-danger">Learn More</a>
       		</div>
     </div>
       		<img src="<?php echo $base.$this->path_img_slider."banner-5.jpg";?>" />
      </div>
    </div>
    </div>
	<!--end slider-->     
    
     
    
        </div>
      </div>
    </div>
     <!-- End MainSlider Row -->
        </div>
        </div>

		<!--end slider-->
        
		
		
		
		<!--------START UPCOMING EVENTS, NEWS AND UPCOMING TRAINING-------->
		<div class="row-fluid">
			
			<div class="span8 module-2-3">
			<!--------START UPCOMING EVENTS-------->
				<div class="module">
                	<a name="about"></a>
					<h5  class="title">ABOUT US</h5>
					
					<div class="module-inner">
					<div class="row-fluid">
						<div class="span7">
							<h4 class=" item-title">Our History</h4>
					</div>
						
					</div>
				
					<div class="content-margin">	
					<p>Monthly General Membership Meetings will be held on the first (1st) Sunday of every month (except where noted) and will commence at 9:00 am.</p>

					<p>Members are strongly encouraged to attend these meetings in order to remain informed about current events within the Local.</p>
				
						<!--a href="<?php echo $base;?>admin/union_events_metro" class="btn btn-warning">all events</a-->
					
				</div>
                
				</div>
                <!--------START  ITEM-------->
			<button  href="#acc-1" data-toggle="collapse" class="btn collapse-btn collapsed">
				<div class="row-fluid">
						<div class="span8 item-title">
							<h4 class="collapse-basic" >Our Value</h4>
						</div>
						
						
				</div>
			</button>
			<div id="acc-1" class="module-inner collapse">				
				
					<div class="row-fluid collapse-inner">
					
					
							<div class="span12">
								<p>Monthly General Membership Meetings will be held on the first (1st) Sunday of every month (except where noted) and will commence at 9:00 am.</p>

								
								
																
							</div>
							
					</div>
		
			</div>
			<!--------END ITEM-------->
<!--------START  ITEM-------->
			<button  href="#acc-2" data-toggle="collapse" class="btn collapse-btn collapsed">
				<div class="row-fluid">
						<div class="span8 item-title">
							<h4 class="collapse-basic">Our Vision</h4>
						</div>
						
						
				</div>
			</button>
			<div id="acc-2" class="module-inner collapse">				
				
					<div class="row-fluid collapse-inner">
							
							
							
							<div class="span12">
								<p>Monthly General Membership Meetings will be held on the first (1st) Sunday of every month (except where noted) and will commence at 9:00 am.</p>

								
								
																
							</div>
							
					</div>
		
			</div>
			<!--------END ITEM-------->

			<!--------START  ITEM-------->
			<button  href="#acc-3" data-toggle="collapse" class="btn collapse-btn collapsed">
				<div class="row-fluid">
						<div class="span8 item-title">
							<h4 class="collapse-basic">Mission Statement</h4>
						</div>
						
						
				</div>
			</button>
			<div id="acc-3" class="module-inner collapse">				
				
					<div class="row-fluid collapse-inner">
							
							
							
							<div class="span12">
								<p>Monthly General Membership Meetings will be held on the first (1st) Sunday of every month (except where noted) and will commence at 9:00 am.</p>

								
								
																
							</div>
							
					</div>
		
			</div>
			<!--------END ITEM-------->

			
				</div>
			<!--------END UPCOMING EVENTS-------->	
			<!-- START NEWS -->
				<div class="module">

					<h5  class="title">OUR PORTFOLIO</h5>
					<!--------START  ITEM-------->
			<button  href="#ac-1" data-toggle="collapse" class="btn collapse-btn collapsed">
				<div class="row-fluid">
						<div class="span8 item-title">
							<h4 class="collapse-basic" >XPTO PROJECT</h4>
						</div>
						
						<div class="span4 u-time" >
							<i class="icon-time "></i> 2013
						</div>
				</div>
			</button>
			<div id="ac-1" class="module-inner collapse">				
				
					<div class="row-fluid collapse-inner">
					
					
							<div class="span6 pull-left">
								<div class="flexslider">
									<ul class="slides">
										<li> <img src="<?php echo $base;?>img/ad-examples/img_1024x724_1.jpg"/></li>
									
										 <li><img src="<?php echo $base;?>img/ad-examples/img_1024x724_2.jpg"/></li>
								
										 <li><img src="<?php echo $base;?>img/ad-examples/img_1024x724_3.jpg"/></li>
									</ul>
								</div>
							</div>
							
							
							<div class="span6">
								<p>Monthly General Membership Meetings will be held on the first (1st) Sunday of every month (except where noted) and will commence at 9:00 am.</p>

								<p>Members are strongly encouraged to attend these meetings in order to remain informed about current events within the Local.</p>

								<p>Any changes to this schedule will be made known to you well in advance.	</p>
								
																
							</div>
							
					</div>
		
			</div>
			<!--------END ITEM-------->


			<!--------START  ITEM-------->
			<button  href="#ac-2" data-toggle="collapse" class="btn collapse-btn collapsed">
				<div class="row-fluid">
						<div class="span8 item-title">
							<h4 class="collapse-basic">ABC PROJECT</h4>
						</div>
						
						<div class="span4 u-time" >
							<i class="icon-time "></i> 
							2014	
						</div>
				</div>
			</button>
			<div id="ac-2" class="module-inner collapse">				
				
					<div class="row-fluid collapse-inner">
							<div class="span6 pull-left">
								<div class="flexslider">
									<ul class="slides">
										<li> <img src="<?php echo $base;?>img/ad-examples/img_1024x724_1.jpg"/></li>
									
										 <li><img src="<?php echo $base;?>img/ad-examples/img_1024x724_2.jpg"/></li>
								
										 <li><img src="<?php echo $base;?>img/ad-examples/img_1024x724_3.jpg"/></li>
									</ul>
								</div>
							</div>
							
							
							<div class="span6">
								<p>Monthly General Information Meetings will be held in Cobourg on the second (2nd) Sunday of every month (except where noted) and will commence at 9:00 am.</p>

								<p>Members are strongly encouraged to attend these meetings in order to remain informed about current events within the Local.</p>

								<p>Any changes to this schedule will be made known to you well in advance.		</p>													
							</div>
							
					</div>
		
			</div>
			<!--------END ITEM-------->

			<!--------START  ITEM-------->
			<button  href="#ac-3" data-toggle="collapse" class="btn collapse-btn collapsed">
				<div class="row-fluid">
						<div class="span8 item-title">
							<h4 class="collapse-basic">HRQ PORTFOLIO</h4>
						</div>
						
						<div class="span4 u-time" >
							<i class="icon-time "></i> 2015
						</div>
				</div>
			</button>
			<div id="ac-3" class="module-inner collapse">				
				
					<div class="row-fluid collapse-inner">
							<div class="span6 pull-left">
								<div class="flexslider">
									<ul class="slides">
										<li> <img src="<?php echo $base;?>img/ad-examples/img_1024x724_1.jpg"/></li>
									
										 <li><img src="<?php echo $base;?>img/ad-examples/img_1024x724_2.jpg"/></li>
								
										 <li><img src="<?php echo $base;?>img/ad-examples/img_1024x724_3.jpg"/></li>
									</ul>
								</div>
							</div>
							<div class="span6">
								<p>Monthly General Membership Meetings will be held on the first (1st) Sunday of every month (except where noted) and will commence at 9:00 am.</p>

								<p>Members are strongly encouraged to attend these meetings in order to remain informed about current events within the Local.</p>

								<p>Any changes to this schedule will be made known to you well in advance.	</p>
							</div>
							
					</div>
		
			</div>
			<!--------END ITEM-------->
				</div>
			<!-- END NEWS -->
			</div>
			
			
			
			<!--------START UPCOMING TRAINING-------->
			<div class="span4 module-1-3">
				<h5  class="title">OUR SERVICES</h5>
				<ul>
					<li class="clearfix">
						<span class="btn-warning pull-left"><i class="sprite-welding sprite-white"></i></span>
						<div class="training-details">
							<h5>WELDING</h5>
							<p><i class="icon-time "></i> October 30 2013</p>
						</div>
					</li>
					<li class="clearfix">	
						<span class="btn-warning pull-left"><i class="sprite-utility sprite-white"></i></span>
						<div class="training-details">
							<h5>UTILITY</h5>
							<p><i class="icon-time "></i> October 30 2013</p>
						</div>
					</li>
					<li class="clearfix">	
						<span class="btn-warning pull-left"><i class="sprite-rail sprite-white"></i></span>
						<div class="training-details">
							<h5>RAILROAD LEVEL1</h5>
							<p><i class="icon-time "></i> October 30 2013</p>
						</div>
					</li>
					<li class="clearfix">	
						<span class="btn-warning pull-left">
							<i class="sprite-rail sprite-white"></i>
						</span>
						<div class="training-details">
							<h5>RAILROAD LEVEL 2</h5>
							<p><i class="icon-time "></i> October 30 2013</p>
						</div>
					</li>
					<li class="clearfix">	
						<span class="btn-warning pull-left"><i class="sprite-rail sprite-white"></i></span>
						<div class="training-details">
							<h5>RAILROAD LEVEL 3</h5>
							<p><i class="icon-time "></i> October 30 2013</p>
						</div>
					</li>
					
				</ul>
			</div>
			<!--------END UPCOMING TRAINING-------->
		</div>
		<!--------END UPCOMING EVENTS AND UPCOMING TRAINING-------->
</div>
</div>
<?php $this->load->view('footer_admin'); ?>
<script type="text/javascript" charset="utf-8">
  $(window).load(function() {
    $('.flexslider').flexslider({
    	controlNav: false,
	    prevText:"",
	    nextText:""
    });
    
    var collapseCont = $(".module-inner:first-of-type");
    
    collapseCont
    .delay(4000)
    .collapse(10000);
    
    collapseCont
    .prev("button")
    .delay(4000)
    .removeClass("collapsed")
    
  });
</script>