<?php 
$this->load->view('header_admin');
$union['id'] 	= isset($union['id']) ? $union['id'] : '';

$is_training_centre		= '';
if( "7" == $this->sess_usertype ) {
	$check_training_centre 	= $this->users->getUserMetaByID($this->sess_userid);
	$is_training_centre 	= isset($check_training_centre['union_training_centre']) && $check_training_centre['union_training_centre'] ? $check_training_centre['union_training_centre'] : '';
	$campus_names			= isset($check_training_centre['campus_name']) && $check_training_centre['campus_name'] ? $check_training_centre['campus_name'] : '';	
}?>
	
<div class="homebg ">
		    <!--BEGIN PAGE TITLE-->
    <div class="container-fluid">
        <div class="main-content padding-metro-header subheader-secondary clearfix fg-grayLighter">
        <em class="margin20"><h3> UPCOMING TRAINING</h3></em>
        </div>
    </div>
    <!--END PAGE TITLE-->



<div class="union-container u-metro ">

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
						$pimg = (!empty($union['profile_image'])) ? $base.$this->path_upload_profiles.$union['profile_image'] : $base."img/default.png";?>
						<img src="<?php echo $pimg;?>">
					</div>
				</div>			
				<div class="span9">
					<div class="u-details">
						<?php 
						$city = $province = $country = '';
						if( isset($is_training_centre) && "on" == $is_training_centre ) {
							foreach( $parent_unions AS $key_parent_unions => $val_parent_unions ) {
								$union 		= $this->users->getUserByID( $val_parent_unions );
								$usermeta 	= $this->users->getUserMetaByID( $val_parent_unions );
								?>
								<h3 class="u-name"><?php echo isset($union['firstname']) ? strtoupper($union['firstname']) : '';?> <?php echo isset($union['lastname']) ? strtoupper($union['lastname']) : '';?>
                                <button class="btn btn-warning"  type="button" title="Connect"><img src="<?php echo $base;?>img/myprofile/connections.png" width="30"></button>
                                </h3>
								<h5 class="u-trade">
									<?php 
									$union['industry_id'] = isset($union['industry_id']) ? $union['industry_id'] : '';
									$industry = $this->users->getElementByID('tbl_industry', $union['industry_id']);
									if( isset($industry) && sizeof($industry) ) {
										$industry = $industry['industryname'];
										echo strtoupper($industry);
									}?>
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
								<h6 class="u-loc"><?php echo $location;?></h6>
							<?php
							}?>
							<br><br><div class="pull-right fr"><h5 class="u-loc"><?php echo "Campus Name: ";echo ($campus_names) ? $campus_names : 'N/A';?></h5></div>
							<?php 
						}
						else { ?>
							<h3 class="u-name"><?php echo isset($union['firstname']) ? strtoupper($union['firstname']) : '';?> <?php echo isset($union['lastname']) ? strtoupper($union['lastname']) : '';?> 
                            </h3>
                            
							<h5 class="u-trade">
								<?php 
								$union['industry_id'] = isset($union['industry_id']) ? $union['industry_id'] : '';
								$industry = $this->users->getElementByID('tbl_industry', $union['industry_id']);
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
						}?>
					</div>
				</div>
				<!-- END HEADER INFORMATION-->
			</div>
		</div>
		<!--------END UNION PROFILE HEAD-------->

		<!--------START FILTER-------->
			<div class="row-fluid assign-container">
			<div class="search">
				
						 <form method="post" id="filterfrm">
							<fieldset>
								 <div class="controls controls-row ">
									
								    <select class="span2 selectpicker" data-style="btn-warning">
										 <option  value="">-Location-</option>
										 <option value="">Vaughan Campus</option>
										 <option value="">Cobourg Campus</option>
										 <option value="">Barrie Campus</option>
									</select>
									<select class="span2 selectpicker" data-style="btn-warning">
										 <option value="">-Program Name-</option>
										 <option value="">Brick and Stone Level 1</option>
										 <option value="">CCW Level 1</option>
										 <option value="">Cement Finisher Level 1</option>
										 <option value="">High Rise Layout</option>
										  <option value="">Rodman</option>
										 
									</select>
									
									<input type="text" class="span5"  placeholder="SEARCH"/>
									<button class="span1 btn btn-warning"  type="submit" >Go!</button>
									
								 </div>
							</fieldset>	 
						 </form>
								 
			</div>
            </div>
		<!--------END FILTER-------->
		
		<h5 class="title">APPRENTICE</h5>
		<!--------START SKILLED JOBS CONTAINER 1-------->	
		<div class="heading clearfix">
	   		
	   			<div class="row-fluid">	
	   			
		   			<div class="span6">
			   			<div href="#" class=" heading-item heading-item-padded clearfix">
	   						<div class="clearfix">
	   							<span class="btn-warning pull-left">
									<i class="sprite-brick sprite-white"></i>
								</span>
							
						
						
								<div class="training-details">
							<h4>Brick and Stone Level 1</h4>
							</div>
	   						</div>
	   						<hr/>
							<p>A Brick and Stone Mason is also know as a Bricklayer. The Bricklayer prepares and lays brick, concrete blocks, stone and structural tiles.</p>
							
							
								<h6 ><i class="icon-map-marker"></i> <u>Location:</u></h6>
							    	<p>Vaughan Campus</p>
							    <h6 ><i class="icon-time"></i> <u>Dates:</u></h6>
							    	<p><b>Starts:</b> January 14 2013 <br/>
								<b>Ends:</b> March 15 2013</p>
							    
							    <a class="btn btn-warning" href="<?php echo $base;?>admin/view_union_metro">more details</a>
							
			   			</div>
	   				
			   	    </div>
		   			<div class="span6">
			   			<div href="#" class=" heading-item heading-item-padded clearfix">
	   						<div class="clearfix">
	   							<span class="btn-warning pull-left">
									<i class="sprite-brick sprite-white"></i>
								</span>
							
						
						
								<div class="training-details">
							<h4>Brick and Stone Level 2</h4>
							</div>
	   						</div>
	   						<hr/>
							<p>A Brick and Stone Mason is also know as a Bricklayer. The Bricklayer prepares and lays brick, concrete blocks, stone and structural tiles.</p>
							
							
								<h6 ><i class="icon-map-marker"></i> <u>Location:</u></h6>
							    	<p>Vaughan Campus</p>
							    <h6 ><i class="icon-time"></i> <u>Dates:</u></h6>
							    	<p><b>Starts:</b> March 18 2013 <br/>
								<b>Ends:</b> May 10 2013</p>
							    
							    <a class="btn btn-warning" href="<?php echo $base;?>admin/view_union_metro">more details</a>
							
			   			</div>
	   				
			   	    </div>
			   	  
	   		</div>
	   		<div class="row-fluid">	
	   			
		   			<div class="span6">
			   			<div href="#" class=" heading-item heading-item-padded clearfix">
	   						<div class="clearfix">
	   							<span class="btn-warning pull-left">
									<i class="sprite-trowel sprite-white"></i>
								</span>
							
						
						
							<div class="training-details">
							<h4>Cement Finisher Level 1</h4>
							</div>
	   						</div>
	   						<hr/>
	   						
							<p>In our Concrete Finishing Apprenticeship, trainees will learn how to place, finish and protect concrete surfaces. Concrete finishers work on a wide variety of vertical and horizontal surfaces.</p>
							<span id="collapse-desc-1" class="collapse show-content"> <p>These surfaces include sidewalks, curbs, stairs, gutters, dams, bridges and tunnells. They also texture, chip, grind and cure finished concerte work</p></span>
							
							<a href="#collapse-desc-1" class="pull-right btn btn-info btn-mini show-content-btn collapsed" data-toggle="collapse"></a>
								
								<h6 ><i class="icon-map-marker"></i> <u>Location:</u></h6>
							    <p>Vaughan Campus</p>
							    
							    <h6 ><i class="icon-time"></i> <u>Dates:</u></h6>
							    <p><b>Starts:</b> May 20 2013 <br/>
								<b>Ends:</b> July 12 2013</p>
							    
							    <a class="btn btn-warning" href="<?php echo $base;?>admin/view_union_metro">more details</a>
							
			   			</div>
	   				
			   	    </div>		   	  
	   		</div>
	 
	   		
	   			
	   		
			   	 

		</div>
		<!--------END SKILLED JOBS CONTAINER 2-------->
		
		
		<h5 class="title">CONSTRUCTION SKILLS COURSES</h5>

		<!--------START SKILLED JOBS CONTAINER 1-------->
		<div class="heading clearfix">
	   		
	   		<div class="row-fluid">	
	   			
		   			<div class="span6">
			   			<div href="#" class=" heading-item heading-item-padded clearfix">
	   						<div class="clearfix">
	   							<span class="btn-warning pull-left">
									<i class="sprite-high-rise sprite-white"></i>
								</span>
							
						
						
								<div class="training-details">
							<h4>High Rise Layout</h4>
							</div>
	   						</div>
	   						<hr/>
							<p>In the High Rise Rodman course trainees will learn to cut, ben, lay out and place reinforcing steel rods, welded wire fabric and composite materials in a variety of poured concrete products and structures, highways, bridges and towers.</p>
							
							
								<h6 ><i class="icon-map-marker"></i> <u>Location:</u></h6>
							    	<p>Vaughan Campus</p>
							    <h6 ><i class="icon-time"></i> <u>Dates:</u></h6>
							    	<p><b>Starts:</b> February 4 2013 <br/>
								<b>Ends:</b> February 22 2013</p>
							    
							    <a class="btn btn-warning" href="<?php echo $base;?>admin/view_union_metro">more details</a>
							
			   			</div>
	   				
			   	    </div>
		   			<div class="span6">
			   			<div href="#" class=" heading-item heading-item-padded clearfix">
	   						<div class="clearfix">
	   							<span class="btn-warning pull-left">
									<i class="sprite-welding sprite-white"></i>
								</span>
							
						
						
								<div class="training-details">
							<h4>Welding</h4>
							</div>
	   						</div>
	   						<hr/>
							<p>Welders permanently join pieces of metal by applying heat, using filler metal or fusion process. They join parts being manufactured, build structures and repair damaged or worn parts. </p>
							
							
								<h6 ><i class="icon-map-marker"></i> <u>Location:</u></h6>
							    	<p>Vaughan Campus</p>
							    <h6 ><i class="icon-time"></i> <u>Dates:</u></h6>
							    	<p><b>Starts:</b> January 14 2013 <br/>
								<b>Ends:</b> February 8 2013</p>
							    
							    <a class="btn btn-warning" href="<?php echo $base;?>admin/view_union_metro">more details</a>
							
			   			</div>
	   				
			   	    </div>
			   	  
	   		</div>
	   		
	   		
			   	 
	   		<!-- CONTAINER FOR "NO RESULTS TO SEARCH" -->
	   		<!-- OPTIONAL -->
	   		
	   		<div class="well">
	   			<div class="row-fluid">
	   				<div class="span12">
	   					<span class="btn btn-warning pull-left">!</span><h5>There are no items matching your search, please try a different option</h5>
	   				</div>
	   			</div>
	   		</div>
	   		
	   		<!-- END NO QUERY CONTAINER --> 
		</div>
		<!--------END SKILLED JOBS CONTAINER 2-------->
	
	
		
		
		


</div>
</div>

<?php $this->load->view('footer_admin'); ?>

