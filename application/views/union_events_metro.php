<?php $this->load->view('header_admin'); ?>
<div class="homebg ">
		    <!--BEGIN PAGE TITLE-->
    <div class="container-fluid">
        <div class="main-content padding-metro-header subheader-secondary clearfix fg-grayLighter">
        <em class="margin20"><h3> UPCOMING EVENTS</h3></em>
        </div>
    </div>
    <!--END PAGE TITLE-->


<div class="union-container u-metro">

<!--------START UNION PROFILE HEAD-------->
		<div class="heading ad-heading">
			<span class="ad-tab " >
			
				<a data-toggle="modal" class="btn btn-warning" href="#ad-modal">ADVERTISING</a>
			
			</span>
			<!-- START ADVERTISING MODAL -->
			<div id="ad-modal" class="modal fade hide">
				<span data-dismiss="modal" class="remove"><i class="icon-remove icon-white"></i></span>
				<img src="<?php echo $base;?>img/ad-examples/nissan_1024x724.jpg"/>
			</div>
			<!-- END MODAL -->
			
			
	    <div class="row-fluid">	
	    	<div class="span3">
				<div class="u-img">	
					<img src="<?php echo $base;?>img/union/local183.jpg"/>
				</div>
			</div>
	    	<div class="span9">
	    		<div class="u-details">
					<h3 class="u-name">LIUNA LOCAL 183</h3>
					<h5 class="u-trade">CONSTRUCTION TRADES</h5>
					<h6 class="u-loc">ONTARIO, CANADA</h6>
	    		</div>
			</div>
	    </div>
		</div>
		<!--------END UNION PROFILE HEAD-------->

	<div class="module">	
		<h5  class="title">ALL EVENTS</h5>
		
			
			
			<!--------START  ITEM-------->
			<button  href="#acc-1" data-toggle="collapse" class="btn collapse-btn collapsed">
				<div class="row-fluid">
						<div class="span8 item-title">
							<h4 class="collapse-basic" >Monthly meeting</h4>
						</div>
						
						<div class="span4 u-time" >
							<i class="icon-time "></i> 11/3/2013
						</div>
				</div>
			</button>
			<div id="acc-1" class="module-inner collapse">				
				
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
			<button  href="#acc-2" data-toggle="collapse" class="btn collapse-btn collapsed">
				<div class="row-fluid">
						<div class="span8 item-title">
							<h4 class="collapse-basic">Monthly meeting</h4>
						</div>
						
						<div class="span4 u-time" >
							<i class="icon-time "></i> 
							11/10/2013	
						</div>
				</div>
			</button>
			<div id="acc-2" class="module-inner collapse">				
				
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
			<button  href="#acc-3" data-toggle="collapse" class="btn collapse-btn collapsed">
				<div class="row-fluid">
						<div class="span8 item-title">
							<h4 class="collapse-basic">Monthly meeting</h4>
						</div>
						
						<div class="span4 u-time" >
							<i class="icon-time "></i> 12/1/2013
						</div>
				</div>
			</button>
			<div id="acc-3" class="module-inner collapse">				
				
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
		

	
	


</div>

</div>


<!-- Place in the <head>, after the three links -->
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

<?php $this->load->view('footer_admin'); ?>

