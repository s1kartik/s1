<?php $this->load->view('header_admin'); ?>

<h3> UPCOMING EVENTS</h3>
<div class="union-container">
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

