<?php $this->load->view('header_admin');?>
	<div class="homebg metro ">
            	<!--BEGIN PAGE TITLE-->
    <div class="container-fluid">
        <div class="main-content padding-metro-header subheader-secondary clearfix fg-grayLighter">
        <em class="margin20">TERMS & CONDITIONS</em>
        </div>
     </div>
	<!--END PAGE TITLE-->
		<div class="container-fluid ">
        
			<div class="main-content padding-metro-home clearfix"> 
							<div class="clearfix s1LibCon">		
							<!--START CODE FOR METRO STYLE-->
								<!-------BEGIN FIRST ROW OF TILES------>
									<div class="tile-group no-margin no-padding clearfix span3" >                    
										<!--begin tiles menus left side general page -->
                                        <?php $this->load->view('profile_view_tiles_menu_left');?>
										<!--end tile menus left side general page-->  
										 
										
										
									</div>
								<!-------END FIRST ROW OF TILES------> 
                                <!-- BEGIN SECOND COLUMN FIRST ROW -->
                                <div class="tile-group no-margin no-padding clearfix middleTile" > 
								<!--begin text information paragraphs -->
											<div class="tile quadro marcio-profile midBox triple-vertical ol-transparent bg-white" >
												<div class="tile-content">
													<div class="panel no-border">
														
  <!-- Begin Charity -->                                                      
 <div class="charities-container" style="padding:10px 10px 0px 20px;box-shadow: none;">
 <h4>TERMS &AMP; CONDITIONS</h4>
<h4>Agreement to Terms of Use</h4>
<p>The Terms and Conditions of Use apply to the S1 Integration System website located at <a href="http://www.mys1s.ca" target="_new">www.mys1s.ca</a> or <a href="http://www.mys1s.com" target="_new">www.mys1s.com</a> and its affiliates and subsidiaries.  The site is the property of S1 Integration System and by using this site you agree to the terms and conditions detailed in this agreement.</p>
<p>S1 Integration System reserves the right at its sole discretion to change, remove portions or modify the Terms of Use.  It is your responsibility to check the Terms of Use from time to time for changes.  </p>
<p><strong>1.	Content disclaimer</strong></p>
<p>All content (information, images, artwork, text, video, audio, pictures, hyperlinks and other materials) on this website has 
been posted to be...</p>
    <div href='#modal_terms' data-toggle='modal'><strong>...read more...</strong></div>
	<?php echo $this->load->view('frontend/modal_terms_of_use');?>
 </div>   
 
<!-- End Charity -->

													
													</div>
												</div>
											</div>
										<!--end text information paragraphs--> 
                                 </div>
                                 <!-- END SECOND COLUMN FIRST ROW -->
                                 <!-------BEGIN THIRD COLUMN FIRST ROW OF TILES------>
									<div class="tile-group no-margin no-padding clearfix span4" >                    
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
	</div>
<!--END OF CODE FOR METRO STYLE-->

<?php $this->load->view('footer_admin');?>