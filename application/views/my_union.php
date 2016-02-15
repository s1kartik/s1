<?php $this->load->view('header_admin'); ?>

<h3> MY UNIONS</h3>
<div class="union-container assign-container">
		
		<h5 class="title">UNIONS I'M CONNECTED TO</h5>
		<!--------START SKILLED JOBS CONTAINER 1-------->	
		<div class="heading clearfix">
	   		
	   			<div class="row-fluid">	
	   			
		   			<div class="span6 eq-height">
		   			 <a href="<?php echo $base;?>admin/view_union" class="heading-item text-center clearfix large-block">
			   			<h4 class="title-light">LIUNA LOCAL 183</h4>
	   					
								<img class="union-logo" src="<?php echo $base;?>img/union/local183.jpg"/>
	   					
							
						
						<hr/>
						<div >
							
							<h6>TORONTO, ONTARIO</h6>
						</div>
			   		
	   				
			   	    </a>
	   				</div>
		   			<div class="span6 eq-height">
		   			 <a href="<?php echo $base;?>admin/view_union" class="heading-item text-center clearfix large-block">
			   			<h4 class="title-light">LIUNA LOCAL 183</h4>
	   					
								<img class="union-logo" src="<?php echo $base;?>img/union/hrq-logo.jpg"/>
	   					
							
						
						<hr/>
						<div >
							
							<h6>TORONTO, ONTARIO</h6>
						</div>
			   		
	   				
			   	    </a>
	   				</div>
			   	    
			   	 
			   	    			   	    
			   	    
		   			
			   	  
	   			</div>
	   			
	   			
		</div>
		<!--------END SKILLED JOBS CONTAINER 2-------->

	
	


</div>


<script>
$(document).ready(function(){
	$(".eq-height").equalHeightColumns();
});

</script>

<?php $this->load->view('footer_admin'); ?>

