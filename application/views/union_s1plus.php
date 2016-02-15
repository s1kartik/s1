<?php $this->load->view('header_admin'); ?>

<h3> S1 PLUS</h3>
<div class="union-container assign-container">
		<h5 class="title">TRAINING PACKS</h5>
		<!--------START S1 PLUS CONTAINER-------->
		<div class="heading clearfix">
	   		<div class="overlay">
	   		</div>
	   
	   			<div class="row-fluid">	
	   			
		   			<div class="span6 heading-item">
			   			 
	   					<h5 class="checkbox">
	   					<input type="checkbox" value="">
	   						FALLING PREVENTION PACK
	   					</h5>
	   					<img src="<?php echo $base;?>img/hazards/haz-1.jpg"/>
	   					<span title="High Rise" class="btn-warning">
								<i class="sprite-high-rise sprite-white sprite-half"></i>
						</span>
						<span title="Low Rise" class="btn-warning">
								<i class="sprite-low-rise sprite-white sprite-half"></i>
						</span>
						<span title="Road Work" class="btn-warning">
								<i class="sprite-road sprite-white sprite-half"></i>
						</span>
	   				
			   	    </div>
			   	    <div class="span6 heading-item">
			   			 
	   					<h5 class="checkbox">
	   					<input type="checkbox" value="">
	   						TRENCHES PACK
	   					</h5>
	   					<img src="<?php echo $base;?>img/hazards/haz-4.jpg"/>
	   					<span title="High Rise" class="btn-warning">
								<i class="sprite-high-rise sprite-white sprite-half"></i>
						</span>
						<span title="Low Rise" class="btn-warning">
								<i class="sprite-low-rise sprite-white sprite-half"></i>
						</span>
						<span title="Road Work" class="btn-warning">
								<i class="sprite-road sprite-white sprite-half"></i>
						</span>

	   				
			   	    </div>
			   	 
	   			</div>
	   			<div class="row-fluid">
		   			<div class="span6 heading-item">
			   			 
	   					<h5 class="checkbox">
	   					<input type="checkbox" value="">
	   						EXCAVATIONS PACK
	   					</h5>
	   					<img src="<?php echo $base;?>img/hazards/haz-2.jpg"/>
	   					<span title="High Rise" class="btn-warning">
								<i class="sprite-high-rise sprite-white sprite-half"></i>
						</span>
						<span title="Low Rise" class="btn-warning">
								<i class="sprite-low-rise sprite-white sprite-half"></i>
						</span>
						<span title="Road Work" class="btn-warning">
								<i class="sprite-road sprite-white sprite-half"></i>
						</span>

	   				
			   	    </div>
			   	    <div class="span6 heading-item">
			   			 
	   					<h5 class="checkbox">
	   					<input type="checkbox" value="">
	   						SCAFFOLDING PACK
	   					</h5>
	   					<img src="<?php echo $base;?>img/hazards/haz-3.jpg"/>
	   					<span title="High Rise" class="btn-warning">
								<i class="sprite-high-rise sprite-white sprite-half"></i>
						</span>
						<span title="Low Rise" class="btn-warning">
								<i class="sprite-low-rise sprite-white sprite-half"></i>
						</span>
						<span title="Road Work" class="btn-warning">
								<i class="sprite-road sprite-white sprite-half"></i>
						</span>

	   				
			   	    </div>
			   	   
	   			</div>    
			   	<a href="#assign-module" id="assign-button" data-toggle="modal" class="btn btn-warning btn-large pull-right">ASSIGN</a>
			   	<div>
			   	</div>    	 

		</div>
		<!--------END S1 PLUS CONTAINER-------->
		
		
		<!--------START SELECT PERSON FOR ASSIGN -------->
		
		<div id="assign-module" class="fadein-module modal hide fade">
		   <div class="module ">
				<span data-dismiss="modal" class="remove"><i class="icon-remove icon-white"></i></span>
				<h5 class="title">ASSIGN TO MEMBERS</h5>
		
				<div class="search">
				
						 <form method="post" id="filterfrm">
							<fieldset>
								 <div class="controls controls-row ">				
								
									<input type="text" class="span12"  placeholder="SEARCH USERS"/>
									
									
								 </div>
							</fieldset>	 
						 </form>
						
						<h6><input type="checkbox"/> ASSIGN TO ALL</h6>		 
			</div>
			
				<div class="results">
				<ul class="clearfix">
					
					
					<li>
					  
						<div class="u-img">
						<img src="<?php echo $base;?>img/union/blank-user.jpg"/>
						<span class="u-tag btn-inverse">WORKER</span>
						</div>
							<div class="u-results-details">
								<span class="pull-right u-action checkbox">
									<input type="checkbox" value="" />
								</span>
								<div class="u-name"> Jack Oliveira </div>
								<div class="u-trade"><i class="icon-briefcase "></i> Business Manager</div>
								<div class="u-loc" ><i class="icon-map-marker "></i> Brampton, Ontario</div>
								
							</div>
							
						
					</li>
					<li>
					  
						<div class="u-img">
						<img src="<?php echo $base;?>img/union/blank-user.jpg"/>
						<span class="u-tag btn-inverse">WORKER</span>
						</div>
							<div class="u-results-details">
								<span class="pull-right u-action checkbox">
									<input type="checkbox" value="" />
								</span>
								<div class="u-name">Luis Camara </div>
								<div class="u-trade"><i class="icon-briefcase "></i> Secretary Treasurer</div>
								<div class="u-loc" ><i class="icon-map-marker "></i> Brampton, Ontario</div>
								
							</div>
							
						
					</li>
					<li>
					  
						<div class="u-img">
						<img src="<?php echo $base;?>img/union/blank-user.jpg"/>
						<span class="u-tag btn-inverse">WORKER</span>
						</div>
							<div class="u-results-details">
								<span class="pull-right u-action checkbox">
									<input type="checkbox" value="" />
								</span>
								<div class="u-name">Cesar Rodrigues </div>
								<div class="u-trade"><i class="icon-briefcase "></i> Sector Coordinator</div>
								<div class="u-trade"><i class="icon-wrench "></i> Bricklaying</div>
								<div class="u-loc" ><i class="icon-map-marker "></i> Brampton, Ontario</div>
								
							</div>
							
						
					</li>
					<li>
					  
						<div class="u-img">
						<img src="<?php echo $base;?>img/union/blank-user.jpg"/>
						<span class="u-tag btn-inverse">WORKER</span>
						</div>
							<div class="u-results-details">
								<span class="pull-right u-action checkbox">
									<input type="checkbox" value="" />
								</span>
								<div class="u-name"> Luis Filipe</div>
								<div class="u-trade"><i class="icon-briefcase "></i> Assistant Coordinator</div>
								<div class="u-trade"><i class="icon-wrench "></i> Bricklaying</div>
								<div class="u-loc" ><i class="icon-map-marker "></i> Brampton, Ontario</div>
								
							</div>
							
						
					</li>
				
					
					
				
					
					
				
				</ul>
				<button class="btn btn-warning btn-large pull-right">OK</button>
				</div>
			
			
		   </div>
		</div>
		
		
		
		<!--------END SELECT PERSON FOR ASSIGN-------->
		

	
	


</div>
<script type="text/javascript">

// ===== SCRIPT TO ACTIVATE TOOLTIPS =====
// ===== THE CONTENT OF THE TOOLTIP IS DEFINED BY THE "TITLE" ATTRIBUTE OF THE ELEMENT 

$('.heading-item').find("span").tooltip()

</script>

<?php $this->load->view('footer_admin'); ?>

