<?php $this->load->view('header_admin'); ?>
<h3 id="top">FATALITY BREAKDOWN</h3>

<!--List of videos -->
<!--NOTE:Images in folder "img/fatality"-->
 <!-- Videos:
      	  [id=1, title= "Swinging Cranes Prevention", link="TCu470B9K4Y", img= "swing-crane-prev.jpg"]
      	  
          [id=2, title= "Crane Boom Contacts Power Lines", link="KoDKI6LBEho", img= "crane-boom-power.jpg"]
          
          [id=3, title= "Fixed Scaffolds Prevention", link="ZixVMQFs1Qg", img= "fixed-scaffold-prev.jpg"]
          
          [id=4, title= "Vehicle Back Over Prevention", link="iAKOofmcc8U", img= "vehicle-back-prev.jpg"]
          
          [id=5, title= "Leading Edge Work Prevention ", link="dpI7L-LDI28", img= "leading-edge-work.jpg"]
          
	      [id=6, title= "There Are No Accidents - The Chef", link="7vD0U08iXQY", img= "accidents-chef.jpg"]
	      
	      [id=7, title= "There Are No Accidents - Retail", link="J1hlBg1gJyU", img= "accidents-retail.jpg"]
	      
	      [id=8, title= "There Are No Accidents - Family Man", link="fPMI84ugQQk", img= "accidents-family.jpg"]
	      
	      [id=9, title= "Forklift Accident", link="JDujjCejk7Q", img= "accidents-forklift.jpg"]
	  	  
	  	  [id=10, title= "Worker pulled through woodchipper", link="ji_-m_ylq10", img= "worker-woodchipper.jpg"]
	  	  
		  	  [id=11, title= "Excavator accident: Concrete barrier strikes worker", link="5fxi-xkX9X8", img= "excavator-accident-concrete.jpg"]
	  	  
	  	  [id=12, title= "Forklift crushes worker", link="KOO4CJysvCo", img= "forklift-crush-worker.jpg"]
	  	  
	  	  [id=13, title= "Workers killed while servicing tires", link="uQbKCd3ezrA", img= "killed-servicing-tires.jpg"]
	  	  
	  	  [id=14, title= "Concrete pump hose whips, killing worker", link="Iaud0QI3i3M", img= "concrete-hose-whip.jpg"]
	  	  
	  	  [id=15, title= "You're a Pro: Falls from ladders", link="FQ_bQZ3V1S0", img= "fall-from-ladder.jpg"]
	  	 
	  	  [id=16, title= "Worker falls after gutter hits power line", link="OGBr_MfhhT0", img= "worker-fall-gutter.jpg"]
	  	  
	  	  [id=17, title= "It was raining rocks!" , link="SqNHgzF7oCI", img= "raining-rocks.jpg"]
	  	  
	  	  [id=18, title= "Drum Explodes During Welding, Killing Worker", link="9DP5l9yYt-g", img= "drum-explodes-welding.jpg"]
	  	  			
	  			
      				
      				[id=, title= "", link="", img= ""]
      
       -->




<div class="fatality-container">
<div id="full-size-video" class="video-wrapper">
			<!----Container for the Full size video------>
			
					<!-----Video Title Variable goes inside the H tag----->
				 	<h3><?php echo $title;?></h3>
			  		<div class="video-container">
			  		<!-----Code for Youtube video goes in the src attribute ----->
			  		<!-----In this case the variable is: TCu470B9K4Y----->
			  		<!-----The rest are standard parameters an can remain the same----->
                 		<iframe width="853" height="510" frameborder="0" allowfullscreen="" src="https://www.youtube.com/embed/<?php echo $video;?>?wmode=transparent&showinfo=0&rel=0"></iframe>
				 	</div>
				 	<div class="fatality-desc clearfix">
				 	
				 		<!--<a id="back"  class="btn btn-small pull-left btn-warning action-button" href="#top"><i class="icon-chevron-left icon-white"></i>Back to main</a>
						<a id="next" class="btn btn-small pull-right btn-warning action-button" href="#top"><i class="icon-chevron-right icon-white"></i>Next video</a>-->

				 	</div>
			  </div>
</div>



<div id="video-tiles"  class="fatality-container">
	
			  
			<!----Video Tiles ------>
			<!-----NOTE: you can only have 4 span3 elements in each row-->
			<!---- After that you must open another <div class="row-fluid">----->
			
			<div class="row-fluid">
				<div class="span4">
				  		<div class="fatality-item">
					  		<div class="text-center">
       			<div class="fatality-img">
       				<a href="<?php echo $base;?>admin/fatality?video=<?php echo "Iaud0QI3i3M";?>&title=<?php echo "Concrete pump hose whips, killing worker";?>">					<div class="img-overlay"></div>
       				<img src="<?php echo $base;?>img/fatality/concrete-hose-whip.jpg" alt="Concrete pump hose whips, killing worker"/></a>
       				
       				<div class="status-icon icon-success">
       					<i class="icon-white icon-ok"></i>
       				</div>
       				
       			</div>
       		</div>
					  		<div class="fatality-desc">
						  		<h4>Concrete pump hose whips, killing worker</h4>
       				
						  	</div>
						</div>
			 	    </div>
				<div class="span4">
				  <div class="fatality-item">
    
       			
       		
       		
       		<div class="text-center">
       			<div class="fatality-img">
       				<a href="<?php echo $base;?>admin/fatality?video=<?php echo "KoDKI6LBEho";?>&title=<?php echo "Crane Boom Contacts Power Lines";?>"><div class="img-overlay">
       				</div>
       				<img src="<?php echo $base;?>img/fatality/crane-boom-power.jpg" alt="Crane Boom Contacts Power Lines"/></a>
       				
       				<div class="status-icon icon-success">
       					<i class="icon-white icon-ok"></i>
       				</div>
       				
       			</div>
       		</div>
       		<div class="fatality-desc">
       				<h4>Crane Boom Contacts Power Lines</h4>
       				
       			</div>
       		
     
       </div>
			 	</div>
				<div class="span4">
				  <div class="fatality-item">
				  
       		<div class="text-center">
       			<div class="fatality-img">
       				<a href="<?php echo $base;?>admin/fatality?video=<?php echo "9DP5l9yYt-g";?>&title=<?php echo "Drum Explodes During Welding, Killing Worker";?>"><div class="img-overlay">
       				</div>
       				<img src="<?php echo $base;?>img/fatality/drum-explodes-welding.jpg" alt="Drum Explodes During Welding, Killing Worker"/></a>
       				
       				<div class="status-icon icon-success">
       					<i class="icon-white icon-ok"></i>
       				</div>
       				
       			</div>
       		</div>
       		<div class="fatality-desc">
       				<h4>Drum Explodes During Welding, Killing Worker</h4>
       				
       			</div>
       		
     
       </div>
			 	</div>
			</div>
			<div class="row-fluid">
				<div class="span4">
				  		<div class="fatality-item">
					  		<div class="text-center">
       			<div class="fatality-img">
       				<a href="<?php echo $base;?>admin/fatality?video=<?php echo "5fxi-xkX9X8";?>&title=<?php echo "Excavator accident: Concrete barrier strikes worker";?>">					<div class="img-overlay"></div>
       				<img src="<?php echo $base;?>img/fatality/excavator-accident-concrete.jpg" alt="Excavator accident: Concrete barrier strikes worker"/></a>
       				
       				<div class="status-icon icon-success">
       					<i class="icon-white icon-ok"></i>
       				</div>
       				
       			</div>
       		</div>
					  		<div class="fatality-desc">
						  		<h4>Excavator accident: Concrete barrier strikes worker</h4>
       				
						  	</div>
						</div>
			 	    </div>
				<div class="span4">
				  <div class="fatality-item">
				  
       		<div class="text-center">
       			<div class="fatality-img">
       				<a href="<?php echo $base;?>admin/fatality?video=<?php echo "ZixVMQFs1Qg";?>&title=<?php echo "Fixed Scaffolds Prevention";?>"><div class="img-overlay">
       				</div>
       				<img src="<?php echo $base;?>img/fatality/fixed-scaffold-prev.jpg" alt="Fixed Scaffolds Prevention"/></a>
       				
       				<div class="status-icon icon-success">
       					<i class="icon-white icon-ok"></i>
       				</div>
       				
       			</div>
       		</div>
       		<div class="fatality-desc">
       				<h4>Fixed Scaffolds Prevention</h4>
       				
       			</div>
       		
     
       </div>
			 	</div>
				<div class="span4">
				  		<div class="fatality-item">
					  		<div class="text-center">
       			<div class="fatality-img">
       				<a href="<?php echo $base;?>admin/fatality?video=<?php echo "JDujjCejk7Q";?>&title=<?php echo "Forklift Accident";?>">					<div class="img-overlay"></div>
       				<img src="<?php echo $base;?>img/fatality/accidents-forklift.jpg" alt="Forklift Accident"/></a>
       				
       				<div class="status-icon icon-success">
       					<i class="icon-white icon-ok"></i>
       				</div>
       				
       			</div>
       		</div>
					  		<div class="fatality-desc">
						  		<h4>Forklift Accident</h4>
       				
						  	</div>
						</div>
			 	    </div>
			</div>	
			<div class="row-fluid">
				<div class="span4">
				  		<div class="fatality-item">
					  		<div class="text-center">
       			<div class="fatality-img">
       				<a href="<?php echo $base;?>admin/fatality?video=<?php echo "KOO4CJysvCo";?>&title=<?php echo "Forklift crushes worker";?>">					<div class="img-overlay"></div>
       				<img src="<?php echo $base;?>img/fatality/forklift-crush-worker.jpg" alt="Forklift crushes worker"/></a>
       				
       				<div class="status-icon icon-success">
       					<i class="icon-white icon-ok"></i>
       				</div>
       				
       			</div>
       		</div>
					  		<div class="fatality-desc">
						  		<h4>Forklift crushes worker</h4>
       				
						  	</div>
						</div>
			 	    </div>
				<div class="span4">
				  		<div class="fatality-item">
					  		<div class="text-center">
       			<div class="fatality-img">
       				<a href="<?php echo $base;?>admin/fatality?video=<?php echo "SqNHgzF7oCI";?>&title=<?php echo "It was raining rocks!";?>">					<div class="img-overlay"></div>
       				<img src="<?php echo $base;?>img/fatality/raining-rocks.jpg" alt="It was raining rocks!"/></a>
       				
       				<div class="status-icon icon-success">
       					<i class="icon-white icon-ok"></i>
       				</div>
       				
       			</div>
       		</div>
					  		<div class="fatality-desc">
						  		<h4>It was raining rocks!</h4>
       				
						  	</div>
						</div>
			 	    </div>
				<div class="span4">
				  <div class="fatality-item">
				  
       		<div class="text-center">
       			<div class="fatality-img">
       				<a href="<?php echo $base;?>admin/fatality?video=<?php echo "dpI7L-LDI28";?>&title=<?php echo "Leading Edge Work Prevention";?>"><div class="img-overlay">
       				</div>
       				<img src="<?php echo $base;?>img/fatality/leading-edge-work.jpg" alt="Leading Edge Work Prevention"/></a>
       				
       				<div class="status-icon icon-success">
       					<i class="icon-white icon-ok"></i>
       				</div>
       				
       			</div>
       		</div>
       		<div class="fatality-desc">
       				<h4>Leading Edge Work Prevention</h4>
       				
       			</div>
       		
     
       </div>
			 	</div>
			</div>
			<div class="row-fluid">
				<div class="span4">
				  		<div class="fatality-item">
					  		<div class="text-center">
       			<div class="fatality-img">
       				<a href="<?php echo $base;?>admin/fatality?video=<?php echo "TCu470B9K4Y";?>&title=<?php echo "Swinging Cranes Prevention";?>">					<div class="img-overlay"></div>
       				<img src="<?php echo $base;?>img/fatality/swing-crane-prev.jpg" alt="Swinging Cranes Prevention"/></a>
       				
       				<div class="status-icon icon-success">
       					<i class="icon-white icon-ok"></i>
       				</div>
       				
       			</div>
       		</div>
					  		<div class="fatality-desc">
						  		<h4>Swinging Cranes Prevention</h4>
       				
						  	</div>
						</div>
			 	    </div>
				<div class="span4">
				  		<div class="fatality-item">
					  		<div class="text-center">
       			<div class="fatality-img">
       				<a href="<?php echo $base;?>admin/fatality?video=<?php echo "fPMI84ugQQk";?>&title=<?php echo "There Are No Accidents - Family Man";?>">					<div class="img-overlay"></div>
       				<img src="<?php echo $base;?>img/fatality/accidents-family.jpg" alt="There Are No Accidents - Family Man"/></a>
       				
       				<div class="status-icon icon-success">
       					<i class="icon-white icon-ok"></i>
       				</div>
       				
       			</div>
       		</div>
					  		<div class="fatality-desc">
						  		<h4>There Are No Accidents - Family Man</h4>
       				
						  	</div>
						</div>
			 	    </div>
				<div class="span4">
				  		<div class="fatality-item">
					  		<div class="text-center">
       			<div class="fatality-img">
       				<a href="<?php echo $base;?>admin/fatality?video=<?php echo "J1hlBg1gJyU";?>&title=<?php echo "There Are No Accidents - Retail";?>">					<div class="img-overlay"></div>
       				<img src="<?php echo $base;?>img/fatality/accidents-retail.jpg" alt="There Are No Accidents - Retail"/></a>
       				
       				<div class="status-icon icon-success">
       					<i class="icon-white icon-ok"></i>
       				</div>
       				
       			</div>
       		</div>
					  		<div class="fatality-desc">
						  		<h4>There Are No Accidents - Retail</h4>
       				
						  	</div>
						</div>
			 	    </div>
			</div>
			<div class="row-fluid">
				<div class="span4">
				  		<div class="fatality-item">
					  		<div class="text-center">
       			<div class="fatality-img">
       				<a href="<?php echo $base;?>admin/fatality?video=<?php echo "7vD0U08iXQY";?>&title=<?php echo "There Are No Accidents - The Chef";?>">					<div class="img-overlay"></div>
       				<img src="<?php echo $base;?>img/fatality/accidents-chef.jpg" alt="There Are No Accidents - The Chef"/></a>
       				
       				<div class="status-icon icon-success">
       					<i class="icon-white icon-ok"></i>
       				</div>
       				
       			</div>
       		</div>
					  		<div class="fatality-desc">
						  		<h4>There Are No Accidents - The Chef</h4>
       				
						  	</div>
						</div>
			 	    </div>
				<div class="span4">
				  <div class="fatality-item">
				  
       		<div class="text-center">
       			<div class="fatality-img">
       				<a href="<?php echo $base;?>admin/fatality?video=<?php echo "iAKOofmcc8U";?>&title=<?php echo "Vehicle Back Over Prevention";?>"><div class="img-overlay">
       				</div>
       				<img src="<?php echo $base;?>img/fatality/vehicle-back-prev.jpg" alt="Vehicle Back Over Prevention"/></a>
       				
       				<div class="status-icon icon-success">
       					<i class="icon-white icon-ok"></i>
       				</div>
       				
       			</div>
       		</div>
       		<div class="fatality-desc">
       				<h4>Vehicle Back Over Prevention</h4>
       				
       			</div>
       		
     
       </div>
			 	</div>
				<div class="span4">
				  		<div class="fatality-item">
					  		<div class="text-center">
       			<div class="fatality-img">
       				<a href="<?php echo $base;?>admin/fatality?video=<?php echo "OGBr_MfhhT0";?>&title=<?php echo "Worker falls after gutter hits power line";?>">					<div class="img-overlay"></div>
       				<img src="<?php echo $base;?>img/fatality/worker-fall-gutter.jpg" alt="Worker falls after gutter hits power line"/></a>
       				
       				<div class="status-icon icon-success">
       					<i class="icon-white icon-ok"></i>
       				</div>
       				
       			</div>
       		</div>
					  		<div class="fatality-desc">
						  		<h4>Worker falls after gutter hits power line</h4>
       				
						  	</div>
						</div>
			 	    </div>
			</div>
			
			<div class="row-fluid">
				<div class="span4">
				  		<div class="fatality-item">
					  		<div class="text-center">
       			<div class="fatality-img">
       				<a href="<?php echo $base;?>admin/fatality?video=<?php echo "ji_-m_ylq10";?>&title=<?php echo "Worker pulled through woodchipper";?>">					<div class="img-overlay"></div>
       				<img src="<?php echo $base;?>img/fatality/worker-woodchipper.jpg" alt="Worker pulled through woodchipper"/></a>
       				
       				<div class="status-icon icon-success">
       					<i class="icon-white icon-ok"></i>
       				</div>
       				
       			</div>
       		</div>
					  		<div class="fatality-desc">
						  		<h4>Worker pulled through woodchipper</h4>
       				
						  	</div>
						</div>
			 	    </div>
				<div class="span4">
				  		<div class="fatality-item">
					  		<div class="text-center">
       			<div class="fatality-img">
       				<a href="<?php echo $base;?>admin/fatality?video=<?php echo "uQbKCd3ezrA";?>&title=<?php echo "Workers killed while servicing tires";?>">					<div class="img-overlay"></div>
       				<img src="<?php echo $base;?>img/fatality/killed-servicing-tires.jpg" alt="Workers killed while servicing tires"/></a>
       				
       				<div class="status-icon icon-success">
       					<i class="icon-white icon-ok"></i>
       				</div>
       				
       			</div>
       		</div>
					  		<div class="fatality-desc">
						  		<h4>Workers killed while servicing tires</h4>
       				
						  	</div>
						</div>
			 	    </div>
				<div class="span4">
				  		<div class="fatality-item">
					  		<div class="text-center">
       			<div class="fatality-img">
       				<a href="<?php echo $base;?>admin/fatality?video=<?php echo "FQ_bQZ3V1S0";?>&title=<?php echo "You're a Pro: Falls from ladders";?>">					<div class="img-overlay"></div>
       				<img src="<?php echo $base;?>img/fatality/fall-from-ladder.jpg" alt="You're a Pro: Falls from ladders"/></a>
       				
       				<div class="status-icon icon-success">
       					<i class="icon-white icon-ok"></i>
       				</div>
       				
       			</div>
       		</div>
					  		<div class="fatality-desc">
						  		<h4>You're a Pro: Falls from ladders</h4>
       				
						  	</div>
						</div>
			 	    </div>
			</div>
	

  
</div>
	<script>
		(function(){
		$('.fatality-img').hover(
			function(){
				$('.img-overlay',this).stop(true, false).fadeTo(300,0.5);
			},
			function(){
				$('.img-overlay',this).stop(true, false).fadeTo(300,0);
			});
			
		
		})()
	</script>
	

<?php $this->load->view('footer_admin'); ?>