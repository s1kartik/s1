<?php 
$this->load->view('header_admin');
$union['id'] 	= isset($union['id']) ? $union['id'] : '';
$is_training_centre		= '';
if( "7" == $this->sess_usertype ) {
	$check_training_centre 	= $this->users->getUserMetaByID($this->sess_userid);
	$is_training_centre 	= isset($check_training_centre['union_training_centre']) && $check_training_centre['union_training_centre'] ? $check_training_centre['union_training_centre'] : '';
	$campus_names			= isset($check_training_centre['campus_name']) && $check_training_centre['campus_name'] ? $check_training_centre['campus_name'] : '';	
}
?>
<div class="homebg ">
	<!--BEGIN PAGE TITLE-->
    <div class="container-fluid"><div class="main-content padding-metro-header subheader-secondary clearfix fg-grayLighter"><em class="margin20"><h3>DATA COLLECTION</h3></em></div></div>
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
	
		<!--------START OVERALL-------->
        
		<div class="module">
			
				<h5 class="title">OVERALL</h5>
			<div class="module-inner">	
				<div class="row-fluid">
				<div class="span4">
					<h5 class="item-title">TOTAL CONNECTIONS</h5>
					<h3>35000</h3>
				</div>
				<div class="span4">
					<h5 class="item-title">CONNECTIONS BREAKDOWN</h5>
					<p><span class="graph-legend" style="background-color: #fda118"></span><b>Employers:</b> 7000</p>
					<p><span class="graph-legend" style="background-color: #f9c718"></span><b>Workers:</b> 43000</p>
				</div>
				<div class="span4">
					<div class="graph text-center">
						<img  src="<?php echo $base;?>img/union/donut.png" />
					</div>
				</div>
			</div>
			</div>
			
		</div>
		<!--------END OVERALL-------->
		
		
		<!--------START  LANGUAGE SECTION-------->
		<div class="module">
			
				<h5 class="title">LANGUAGE</h5>
			<div class="module-inner">	
				<div class="row-fluid">
				
				<div class="span8">
					<h5 class="item-title">LANGUAGE BREAKDOWN</h5>
					
					<div class="row-fluid">
					  
					   
					     <div class="span4 lang-item">
						
						<img class="pull-left" src="<?php echo $base;?>img/icons/icon-en.png" />
						
						<p>
							<b>English:</b>
								3000	
						</p>
						
					   </div>
					     <div class="span4 lang-item">
						
						<img class="pull-left" src="<?php echo $base;?>img/icons/icon-en.png" />
						
						<p>
							<b>English:</b>
								3000	
						</p>
						
					   </div>
						 <div class="span4 lang-item">
						
						<img class="pull-left" src="<?php echo $base;?>img/icons/icon-en.png" />
						
						<p>
							<b>English:</b>
								3000	
						</p>
						
					   </div>
						 <div class="span4 lang-item">
						
						<img class="pull-left" src="<?php echo $base;?>img/icons/icon-en.png" />
						
						<p>
							<b>English:</b>
								3000	
						</p>
						
					   </div>
					     <div class="span4 lang-item">
						
						<img class="pull-left" src="<?php echo $base;?>img/icons/icon-en.png" />
						
						<p>
							<b>English:</b>
								3000	
						</p>
						
					   </div>
						 <div class="span4 lang-item">
						
						<img class="pull-left" src="<?php echo $base;?>img/icons/icon-en.png" />
						
						<p>
							<b>English:</b>
								3000	
						</p>
						
					   </div>
					   
					</div>
					
				</div>
				
			</div>
			</div>
			
		</div>
		<!--------END LANGUAGE SECTION-------->
		
		
		<!--------START  INVESTIGATIONS-------->
		<div class="module">
			
				<h5 class="title">INVESTIGATIONS</h5>
			
			
			<div class="module-inner">
				<div class="row-fluid">
				<div class="span4">
                	<div class="search">
					
					<form method="post">
							
								 <div class="controls controls-row ">
									 
								    <select class="span4 selectpicker" data-style="btn-warning btn-small" >
										 <option  value="2014">2014</option>
                                         <option  value="2013">2013</option>
                                         <option  value="2012">2012</option>
									</select>
									
																										
								 </div>
							
						 </form>
                    </div>
				</div>
                
				<div class="span8">
					
					<h5 class="item-title">TOTAL INVESTIGATIONS: 950</h5>
                </div>
                
                </div>
                
                <div class="row-fluid">
                <div class="span12">    
                	<div class="row-fluid">
                        <div class="span6 lang-item">
                        <img class="pull-left" src="<?php echo $base;?>img/icons/icon-investigation.png" title="Near Miss" />
                            <p>
                           <b> Near Miss:</b>
                                100	
                            </p>
                        </div>			 
                        <div class="span6 lang-item">
                           <img class="pull-left" src="<?php echo $base;?>img/icons/icon-investigation.png" title="First Aid" />
                            <p>
                                <b>First Aid:</b>
                                200	
                            </p>
                        </div>
                    </div>
                	<div class="row-fluid">
                        <div class="span6 lang-item">
                           <img class="pull-left" src="<?php echo $base;?>img/icons/icon-investigation.png" title="Injuries" />
                            <p>
                                <b>Injuries:</b>
                                50	
                            </p>
                        </div>			 
                    	<div class="span6 lang-item">
                           <img class="pull-left" src="<?php echo $base;?>img/icons/icon-investigation.png" title="Material & Equipment" />
                            <p>
                                <b>Material & Equipment:</b>
                                150	
                            </p>
                        </div>			 
                    </div>
                	<div class="row-fluid">
                        <div class="span6 lang-item">
                           <img class="pull-left" src="<?php echo $base;?>img/icons/icon-investigation.png" title="Environment Incident" />
                            <p>
                                <b>Environment Incident:</b>
                                200	
                            </p>
                        </div>			 
                    	<div class="span6 lang-item">
                           <img class="pull-left" src="<?php echo $base;?>img/icons/icon-investigation.png" title="Work Refusal" />
                            <p>
                                <b>Work Refusal:</b>
                                50	
                            </p>
                        </div>			 
                    </div>
                	<div class="row-fluid">
                        <div class="span6 lang-item">
                           <img class="pull-left" src="<?php echo $base;?>img/icons/icon-investigation.png" title="Vehicle Accident" />
                            <p>
                                <b>Vehicle Accident:</b>
                                100	
                            </p>
                        </div>			 
                        <div class="span6 lang-item">
                           <img class="pull-left" src="<?php echo $base;?>img/icons/icon-investigation.png" title="Fatalities" />
                            <p>
                                <b>Fatalities:</b>
                                50	
                            </p>
                        </div>			 
                    </div>
                	<div class="row-fluid">
                        <div class="span6 lang-item">
                           <img class="pull-left" src="<?php echo $base;?>img/icons/icon-investigation.png" title="Others" />
                            <p>
                                <b>Others:</b>
                                100	
                            </p>
                        </div>			 
                    </div>
                    
                    	 					
				</div>
				
			</div>
			</div>
			
		</div>
		<!--------END INVESTIGATION-------->
		
			<!--------START PROFILE CONNECTED BREAKDOWN AND AGE FOR CONNECTED MEMBERS-------->
		<div class="module">
			
				
			
			
				<div class="row-fluid">
				    <!--------START PROFILE CONNECTED BREAKDOWN -------->
				    <div class="span6 module-1-2">
					
					 <h5 class="title">PROFILE CONNECTED BREAKDOWN</h5>
					 <div class="module-inner">	
					    <div class="row-fluid">
						<div class="span6 one-half">
						<h5 class="item-title">TOTAL BY:</h5>
						<h3>200</h3>
					</div>
						<div class="span6 one-half">
						<div class="search">
				
						 <form method="post">
							<fieldset>
								 <div class="controls controls-row ">

									<select class="span12 selectpicker" data-style="btn-warning btn-small">
										 <option value="">-INDUSTRY-</option>
									</select>
                                    <select class="span12 selectpicker" data-style="btn-warning btn-small">
										 <option value="">-SECTOR-</option>
									</select>
                                    <select class="span12 selectpicker" data-style="btn-warning btn-small">
										 <option value="">-TRADE-</option>
									</select>
									
									
									
								 </div>
							</fieldset>	 
						 </form>
								 
			</div>
					</div>
					</div>
					 </div>
					 
				</div>
				    <!--------END BREAKDOWN-------->
				    
				    
				    
				    
				    <!--------START AGE FOR CONNECTED MEMBERS-------->
				    <div class="span6 module-1-2">
					
					<h5 class="title">AGE FOR CONNECTED MEMBERS</h5>
					<div class="module-inner">
						<div class="row-fluid">
						<div class="span6 one-half">
							<h5 class="item-title">FROM 16 TO 25: 9999 </h5>
                            <h5 class="item-title">FROM 26 TO 32: 9999 </h5>
							<h5 class="item-title">FROM 33 TO 45: 9999 </h5>
                            <h5 class="item-title">FROM 46 TO 55: 9999 </h5>
                            <h5 class="item-title">FROM 56 TO ..: 9999 </h5>
						</div>
						
					</div>
					</div>
					</div>
				    <!--------END REPS-------->
				</div>
		</div>
		<!--------END COURSES AND REPS-------->
		
</div>
</div>
<?php $this->load->view('footer_admin'); ?>

