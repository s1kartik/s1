<?php $this->load->view('header_admin');?>
	<div class="homebg metro ">
            	<!--BEGIN PAGE TITLE-->
    <div class="container-fluid">
        <div class="main-content padding-metro-header subheader-secondary clearfix fg-grayLighter">
        <em class="margin20">PRIVACY POLICY</em>
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
											<div class="tile quadro priveciy-data-content marcio-profile midBox triple-vertical ol-transparent bg-white" >
												<div class="tile-content">
													<div class="panel no-border">
														
  <!-- Begin Charity -->                                                      
 <div class="charities-container" style="padding:10px 10px 20px 20px;box-shadow: none;">
 <h3>PRIVACY POLICY</h3>
 <h4>Our Policy</h4>
<p>S1 Integration System is committed to protect your personal information.  Your privacy is important to us.  This policy covers how we collect, use, disclose, transfer and store your personal information. </p> 
<p><strong>Collection of personal information</strong></p>
<p>S1 Integration System asks for your personal information when you register with us.  This information may include your name, email, mailing address, and phone number, date of birth, and contact preferences.  This information is secured and all users using our system will have a user name and password to access the system.  </p>
<p>We use your personal information to keep you posted on new products, upcoming events, information sharing, announcements... </p>

    <div href='#modal_privacy_policy' data-toggle='modal'><strong>...read more...</strong></div>
</div>   
<?php $this->load->view('frontend/modal_privacy_policy');?>  
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