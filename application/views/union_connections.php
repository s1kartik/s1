<?php $this->load->view('header_admin'); ?>

<h3> CONNECTIONS</h3>
<div class="union-container">
		
		<!--------START UNION PROFILE HEAD-------->
		<div class=" heading">
	   	
	    
		   	  <form class="form-large">
		   	  	  <legend><span class="title">FIND CONNECTIONS</span></legend>
			   	<fieldset>
			   	  <div class="row-fluid">
	    	          <div class="span5">
			          	<label class="btn-warning clearfix"><i class="pull-right sprite-white sprite-union-rep"></i>UNION REPS</label>
			          </div>
	    	          <div class="span7">
	    	          	<select class="selectpicker form-large-select span12">
		    	          	<option>All</option>
	    	          	</select>
	    	          	
	    	          	
			          </div>
			   	  </div>
			   	   <div class="row-fluid">
	    	          <div class="span5">
			          	<label class="btn-warning clearfix"><i class="pull-right sprite-white sprite-user-type"></i>USER TYPE</label>
			          </div>
	    	          <div class="span7">
	    	          	<select class="selectpicker form-large-select span12">
		    	          	<option>All</option>
		    	          	<option>Option1</option>
		    	          	<option>Option2</option>
	    	          	</select>
	    	          	
	    	          	
			          </div>
			   	  </div>
			   	   <div class="row-fluid">
	    	          <div class="span5">
			          	<label class="btn-warning clearfix"><i class="pull-right sprite-white sprite-industry"></i>INDUSTRY</label>
			          </div>
	    	          <div class="span7">
	    	          	<select class="selectpicker form-large-select span12">
		    	          	<option>All</option>
	    	          	</select>
	    	          	
	    	          	
			          </div>
			   	  </div>
			   	   <div class="row-fluid">
	    	          <div class="span5">
			          	<label class="btn-warning clearfix"><i class="pull-right sprite-white sprite-cog"></i>SECTOR</label>
			          </div>
	    	          <div class="span7">
	    	          	<select class="selectpicker form-large-select span12">
		    	          	<option>All</option>
	    	          	</select>
	    	          	
	    	          	
			          </div>
			   	  </div>
			   	   <div class="row-fluid">
	    	          <div class="span5">
			          	<label class="btn-warning clearfix"><i class="pull-right sprite-white sprite-wrench"></i>TRADE</label>
			          </div>
	    	          <div class="span7">
	    	          	<select class="selectpicker form-large-select span12">
		    	          	<option>All</option>
	    	          	</select>
	    	          	
	    	          	
			          </div>
			   	  </div>
			   	   <button class="btn btn-warning btn-large pull-right">SEARCH</button>
			   	   
			   	  
			   	  
			   	</fieldset>
		      </form> 
			    
	      
		</div>
		<!--------END UNION PROFILE HEAD-------->
		
		
		<!--------START CONNECTION RESULTS-------->
		<div class="module">
			
				<h5 class="title">SEARCH RESULTS</h5>
		
			
			<div class="results">
				<ul class="clearfix">
					
					
					<li>
					  
						<div class="u-img">
						<img src="<?php echo $base;?>img/union/blank-user.jpg"/>
						<span class="u-tag btn-inverse">WORKER</span>
						</div>
							<div class="u-results-details">
								<span class="pull-right u-action">
									<a class="btn btn-mini btn-warning">contact</a>
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
								<span class="pull-right u-action">
									<a class="btn btn-mini btn-warning">contact</a>
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
								<span class="pull-right u-action">
									<a class="btn btn-mini btn-warning">contact</a>
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
								<span class="pull-right u-action">
									<a class="btn btn-mini btn-warning">contact</a>
								</span>
								<div class="u-name"> Luis Filipe</div>
								<div class="u-trade"><i class="icon-briefcase "></i> Assistant Coordinator</div>
								<div class="u-trade"><i class="icon-wrench "></i> Bricklaying</div>
								<div class="u-loc" ><i class="icon-map-marker "></i> Brampton, Ontario</div>
								
							</div>
							
						
					</li>
				
					
					
				
					
					
				
				</ul>
			</div>
			
			
		</div>
		<!--------END CONNECTION RESULTS-------->
	
		

	
	


</div>

<?php $this->load->view('footer_admin'); ?>

