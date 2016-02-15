<?php $this->load->view('header_admin');?>
	<div class="homebg metro ">
                	<!--BEGIN PAGE TITLE-->
    <div class="container-fluid">
        <div class="main-content padding-metro-header subheader-secondary clearfix fg-grayLighter">
        <em class="margin20">KNOW YOUR RIGHST</em>
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
 <h3> KNOW YOUR RIGHTS</h3>                                                    
    <h4>What are my Rights under the Act?</h4>
<p>A worker has three important rights under the Act:</p>
<ul>

<li><strong >The Right to Know:</strong> A worker has the right to know about hazards both in their workplace and in the work that they do.  The supervisor should provide every worker with instructions to ensure they are protected on the job.</li>
<li><strong >The Right to Participate:</strong> Each worker has the right to participate in identifying and remedying health and safety issues.  This can be done individually or with the aid of a joint health and safety committee (JHSC) or health and safety representative.</li>
<li><strong>The Right to Refuse:</strong> All workers have the right to refuse any work they feel is dangerous or unsafe to both themselves and other workers.</li>

</ul>
    <div href='#modal_know_your_rights' data-toggle='modal'><strong>...read more...</strong></div>
	<?php $this->load->view('frontend/modal_know_your_rights');?>	
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