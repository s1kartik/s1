<?php $this->load->view('header_admin'); ?>

<h3> UNION NEWS</h3>
<div class="union-container">
	<div class="module">	
		<h5  class="title">NEWS FROM THE MINISTRY OF LABOUR</h5>
		
			
			
			<!--------START  ITEM-------->
			<button  href="#acc-1" data-toggle="collapse" class="btn collapse-btn collapsed">
				<div class="row-fluid">
						<div class="span8 item-title">
							<h4 class="collapse-basic" >Scotiabank Offers for LIUNA Local 183 Members </h4>
						</div>
						
						<div class="span4 u-time" >
							<i class="icon-time "></i> 9/6/2013 6:09 PM
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
								<p>As a Member of LiUNA Local 183, Scotiabank would like to offer you a series of special benefits by signing up for any of the following services offered:</p>


								<ul>
								<li>Scotia Moneyback Account or Scotia One Account</li>
								<li>Scotiabank Gold American Express card		  </li>
								<li>Scotia Momentum Visa card					  </li>
								<li>Scotabank Value VISA card					  </li>
								<li>ScotiaLine Personal Line of Credit			  </li>
								<li>Scotia iTRADE								  </li>
								</ul>
								<p>Benefits include cash back, extended overdraft protection, bonus Scotia Rewards points, low interest rates, and free trades.</p>
								
																
							</div>
							
					</div>
		
			</div>
			<!--------END ITEM-------->


			<!--------START  ITEM-------->
			<button  href="#acc-2" data-toggle="collapse" class="btn collapse-btn collapsed">
				<div class="row-fluid">
						<div class="span8 item-title">
							<h4 class="collapse-basic">Important Notice: September Eastern Meeting</h4>
						</div>
						
						<div class="span4 u-time" >
							<i class="icon-time "></i> 8/12/2013 2:41 PM
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
								<p>IMPORTANT NOTICE:</p>

								<p>To all Eastern Office Local 183 Members</p>

								<p>Due to a Leadership Conference, the regular monthly information meeting scheduled for September 15, 2013, at the Cobourg office will be cancelled and re-scheduled for the following Sunday, September 22, 2013.</p>

								<p>Local 183 invites you to attend a special Training Centre BBQ following the information meeting on September 22, 2013.</p>

								<p>EASTERN OFFICE 560 DODGE STREET COBOURG, ONTARIO</p>

								<p>WE LOOK FORWARD TO SEEING YOU THERE.</p>

								<p>Sincerely,</p>

								<p>Nelson Melo</p>

								<p>President</p>
								
																
							</div>
							
					</div>
		
			</div>
			<!--------END ITEM-------->

			<!--------START  ITEM-------->
			<button  href="#acc-3" data-toggle="collapse" class="btn collapse-btn collapsed">
				<div class="row-fluid">
						<div class="span8 item-title">
							<h4 class="collapse-basic">Office Closure: 31-MAY-2013 </h4>
						</div>
						
						<div class="span4 u-time text-right" >
							<i class="icon-time "></i> 5/29/2013 1:10 PM
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
								<p>Please be advised that the LIUNA Local 183 Offices will be CLOSING EARLY on Friday May 31, 2013 at 1:30 PM for a Mandatory Staff Meeting.</p>

								<p>We will resume regular office hours on Saturday June 1, 2013.</p>
								
																
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

