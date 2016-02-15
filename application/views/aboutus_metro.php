<?php $this->load->view('header_admin');?>

	<div class="homebg metro ">
                	<!--BEGIN PAGE TITLE-->
    <div class="container-fluid">
        <div class="main-content padding-metro-header subheader-secondary clearfix fg-grayLighter">
        <em class="margin20">ABOUT US</em>
        </div>
     </div>
	<!--END PAGE TITLE-->
		<div class="container-fluid ">
        
			<div class="main-content padding-metro-home clearfix"> 
				
					
							<!--START CODE FOR METRO STYLE-->
								<!-------BEGIN FIRST ROW OF TILES------>
									<div class="tile-group no-margin no-padding clearfix span3" >                    
										<!--begin tiles menus left side general page -->
                                        <?php $this->load->view('general_tiles_menu_left');?>
										<!--end tile menus left side general page-->  
									</div>
								<!-------END FIRST ROW OF TILES------>  
                                <!-- BEGIN SECOND COLUMN FIRST ROW -->
                                <div class="tile-group no-margin no-padding clearfix span7" > 
								<!--begin text information paragraphs -->
											<div class="tile quadro marcio-profile triple-vertical ol-transparent bg-white" >
												<div class="tile-content">
													<div class="panel no-border">
														
  <!-- Begin Charity -->                                                      
 <div class="charities-container" style="padding:10px 10px 0px 20px;box-shadow: none;">   <h3> ABOUT US</h3>                                                    
<!-- Begin Item -->
  <div class="charity-item">
    
 <h4>About the S1 System</h4>
<p>As a former Inspector, I came to realize that Every fatality CAN be avoided and every injury CAN be prevented….. It all comes down to the Three principles of safety: Recognition, Assessment and Control of hazards. Too many workers including young and vulnerable workers have a great disadvantage at work when it comes to Health and Safety and not surprisingly the lack of or limited training played a factor in 99% of my investigations. So we wondered, if workers and employers had access to affordable, easily accessible Health and Safety information in a language the workers understand and give workplace parties a proactive reason to learn and instruct their workers, could we reduce the number of injuries and fatalities?</p>
  </div>

<!-- End Item -->
    <div href='#modal_about_us' data-toggle='modal'><strong>...read more...</strong></div>
	<?php echo $this->load->view('frontend/modal_about_us');?>
 </div>
<!-- End Charity -->
						
							
													</div>
												</div>
											</div>
										<!--end text information paragraphs--> 
                                 </div>
                                 <!-- END SECOND COLUMN FIRST ROW -->
                                 <!-------BEGIN THIRD COLUMN FIRST ROW OF TILES------>
									<div class="tile-group no-margin no-padding clearfix span2" >                    
										<!--begin text information paragraphs -->
											<!--begin small tile-->
									<?php $this->load->view('connection_tile');?>
								<!--end small tile--> 
                                
										<!--end text information paragraphs-->  
										 
										
										
									</div>
								<!-------END  THIRD COLUMN FIRST ROW OF TILES------> 

				
			</div>
		</div>
	</div>
<!--END OF CODE FOR METRO STYLE-->


<?php $this->load->view('footer_admin');?>