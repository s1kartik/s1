<?php $this->load->view('header_admin');?>
	<div class="homebg metro ">
                	<!--BEGIN PAGE TITLE-->
    <div class="container-fluid">
        <div class="main-content padding-metro-header subheader-secondary clearfix fg-grayLighter">
        <em class="margin20">YOUNG WORKERS</em>
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
<h4>Young Workers - Education</h4>
<p>Young workers are workers who work part or full time and are between 14 and 25 years of age. Young workers can be found in all industries and sectors but are most prevalent in positions that are geared towards seasonal or part time employment.</p>

<!-- Begin Charity -->
  <div class="charity-item">
    <h4>Ryerson University</h4>
    <img src="<?php echo $base;?>img/charities/ryerson.jpg" />
    <p>Workplaces in Canada are safer than ever before, thanks in large part to occupational health and safety professionals. Ryerson graduates working in this progressive field help prevent injury and illness by anticipating, evaluating and controlling physical, biological, chemical and other hazards in workplaces.</p>
  </div>
<!-- End Charity -->


    <div href='#modal_young_workers' data-toggle='modal'><strong>...read more...</strong></div>
	<?php $this->load->view('frontend/modal_young_workers');?>
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