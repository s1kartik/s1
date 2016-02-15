<?php $this->load->view('header_admin');?>

	<div class="homebg metro ">
            	<!--BEGIN PAGE TITLE-->
    <div class="container-fluid">
        <div class="main-content padding-metro-header subheader-secondary clearfix fg-grayLighter">
        <em class="margin20">CHARITIES</em>
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
 <div class="charities-container" style="padding:10px 10px 0px 20px;box-shadow: none;">   <h3> CHARITIES</h3>                                                    
<h4>Our Principles</h4>
<p>At S1 we believe in the fundamental principle of giving back.  We will be donating 10% of our library proceeds to charity.  In this section we look at some of the charities in the Health and Safety Network that are helping families of deceased workers. </p>

  
    <h4>Threads of Life</h4>
    <img src="<?php echo $base;?>img/charities/threadsoflife.jpg" />
    <p><strong>Who they are:</strong></p>
    <p>Threads of Life is an organization supported by a network of volunteers... </p>
    <div href='#modal_charities' data-toggle='modal'><strong>...read more...</strong></div>
	<?php echo $this->load->view('frontend/modal_charities');?>
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