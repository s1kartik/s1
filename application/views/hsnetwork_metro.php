<?php $this->load->view('header_admin');?>

	<div class="homebg metro ">
                	<!--BEGIN PAGE TITLE-->
    <div class="container-fluid">
        <div class="main-content padding-metro-header subheader-secondary clearfix fg-grayLighter">
        <em class="margin20">ONTARIO HEALTH & SAFETY NETWORK</em>
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
 <div class="charities-container" style="padding:10px 10px 0px 20px;box-shadow: none;"> 
 <h4>Health &amp; Safety in Ontario</h4>
<p>Ontario has one of the best Health and Safety Networks in the world.  This section highlights the different Government Agencies and the role they play in keeping workers safe.  Here at S1, we are bringing these resources to you in one location for easy access.</p>
<!-- Begin item -->
  <div class="charity-item">
    <h4>Workplace Safety and Insurance Board</h4>
    <img src="<?php echo $base;?>img/hsnetwork/wsib.jpg" />

    

<p>WSIB assists workers, large companies and small business owners with many aspects of health and safety.  They provide no-fault liability insurance and access to information and training providers to assist employers to properly incorporate health and safety in their workplace.  </p>
   </div>
<!-- End item -->

    <div href='#modal_hsnetwork' data-toggle='modal'><strong>...read more...</strong></div>
	<?php echo $this->load->view('frontend/modal_health_safety_network');?>
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