<?php $this->load->view('header_admin');?>

	<div class="homebg metro ">
                	<!--BEGIN PAGE TITLE-->
    <div class="container">
        <div class="main-content padding-metro-header subheader-secondary clearfix fg-grayLighter">
        <em class="margin20">SKILLED JOB SECTIONS</em>
        </div>
     </div>
	<!--END PAGE TITLE-->
		<div class="container-fluid">
        
			<div class="main-content skilljob-main-buttons padding-metro-home clearfix"> 
				
					
							<!--START CODE FOR METRO STYLE-->
								<!-------BEGIN FIRST ROW OF TILES------>
									<div class="tile-group no-margin no-padding clearfix span3" >                    
										<!--begin tiles menus left side general page -->
                                        <?php // $this->load->view('general_tiles_menu_left');?>
										<!--end tile menus left side general page-->  
									</div>
								<!-------END FIRST ROW OF TILES------>  
                                <!-- BEGIN SECOND COLUMN FIRST ROW -->
                                <div class=" tile-group no-margin no-padding clearfix" > 
								<!--begin tile construction -->
									<a href="<?php echo $base;?>admin/skilledjob_constr" class="tile double triple-half bg-darker">
                                    <div class="tile-content iconskilled icongetstarted"><img src="<?php echo $base;?>img/skilled-job/construction.png"></i></div>
                                    <div class="tile-status"><span class="name">CONSTRUCTION</span></div>
                                    </a>
								<!--end tile construction-->
                                <!--begin tile construction -->
									<a href="<?php echo $base;?>admin/skilledjob_ind" class="tile double triple-half bg-darker">
                                    <div class="tile-content iconskilled icongetstarted"><img src="<?php echo $base;?>img/skilled-job/industrial.png"></i></div>
                                    <div class="tile-status"><span class="name">INDUSTRIAL</span></div>
                                    </a>
                                    <div class="clearfix"></div>
								<!--end tile construction--> 
                                <!--begin tile construction -->
									<a href="<?php echo $base;?>admin/skilledjob_mp" class="tile double triple-half bg-darker">
                                    <div class="tile-content iconskilled icongetstarted"><img src="<?php echo $base;?>img/skilled-job/motive_power.png"></i></div>
                                    <div class="tile-status"><span class="name">MOTIVE POWER SECTOR</span></div>
                                    </a>
								<!--end tile construction--> 
                                <!--begin tile construction -->
									<a href="<?php echo $base;?>admin/skilledjob_trade" class="tile double triple-half bg-darker">
                                    <div class="tile-content iconskilled icongetstarted"><img src="<?php echo $base;?>img/skilled-job/trade-service.png"></i></div>
                                    <div class="tile-status">
                                        <span class="name">TRADE CERTIFICATION SERVICE</span>
                                    </div>
                                    </a>
								<!--end tile construction--> 
                                 </div>
                                 <!-- END SECOND COLUMN FIRST ROW -->
                                 <!-------BEGIN THIRD COLUMN FIRST ROW OF TILES------>
									<div class="tile-group no-margin no-padding clearfix span2" >                    
										<!--begin text information paragraphs -->
											<!--begin small tile-->
									<?php // $this->load->view('connection_tile');?>
								<!--end small tile--> 
                                
										<!--end text information paragraphs-->  
										 
										
										
									</div>
								<!-------END  THIRD COLUMN FIRST ROW OF TILES------> 

				
			</div>
		</div>
	</div>
<!--END OF CODE FOR METRO STYLE-->


<?php $this->load->view('footer_admin');?>