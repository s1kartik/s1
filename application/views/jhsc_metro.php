<?php $this->load->view('header_admin');?>
<div class="homebg metro ">
	<!--BEGIN PAGE TITLE-->
    <div class="container-fluid">
        <div class="main-content padding-metro-header subheader-secondary clearfix fg-grayLighter">
        <em class="margin20">DIGITAL PROJECT JHSC</em>
        </div>
    </div>
    <!--END PAGE TITLE-->
    <div class="container-fluid ">
        <div class="main-content padding-metro-home clearfix"> 
        <!--START CODE FOR METRO STYLE-->
        <!-------BEGIN FIRST ROW FIRST COLUMN OF TILES------>
             <div class="tile-group no-margin no-padding clearfix " > 
                <?php $this->load->view('dig_proj_left_tile');?>
             </div>
        <!-- END  FIRST ROW FIRST COLUMN -->                                 
                <!-------BEGIN FIRST ROW SECOND COLUMN OF TILES------>
             <div class="tile-group no-margin no-padding clearfix " > 
                <!--begin CONNECTION tile -->
                <a class="tile bg-black">
                    
                        <img src="<?php echo $base;?>img/jhsc/sponsor.png"></i>
                    
                
                </a>
                <!--end tile-->
                <!--begin assign tile -->
                <a class="tile bg-black">
                    <div class="tile-content icon">
                        <img src="<?php echo $base;?>img/jhsc/connections.png"></i>
                    </div>
                    <div class="tile-status">
                            <span class="name"><small>CONNECTIONS</small></span>
                    </div>
                
                </a>
                <!--end assign tile-->
                <!--begin jhsc tile -->
                <a href="<?php echo $base;?>admin/jhsc_meetings_metro" class="tile bg-black">
                    <div class="tile-content icon">
                        <img src="<?php echo $base;?>img/jhsc/meetings.png"></i>
                    </div>
                    <div class="tile-status" style="line-height:15px;">
                            <span class="name"><small>MINUTES MEETINGS</small></span>
                    </div>
                
                </a><br />
                <!--end jhsc tile-->
                <!--begin inspections tile -->
                <a class="tile bg-black">
                    <div class="tile-content icon">
                        <img src="<?php echo $base;?>img/jhsc/inspections.png"></i>
                    </div>
                    <div class="tile-status">
                            <span class="name"><small>INSPECTIONS</small></span>
                    </div>
                
                </a>
                <!--end inspections tile-->
                <!--begin investigations tile -->
                <a class="tile bg-black">
                    <div class="tile-content icon">
                        <img src="<?php echo $base;?>img/jhsc/procedures.png"></i>
                    </div>
                    <div class="tile-status">
                            <span class="name"><small>PROCEDURES</small></span>
                    </div>
                
                </a>
                <!--end investigations tile-->
                <!--begin safety talks tile -->
                <a class="tile bg-black">
                    <div class="tile-content icon">
                        <img src="<?php echo $base;?>img/jhsc/safety_talks.png"></i>
                    </div>
                    <div class="tile-status">
                            <span class="name"><small>SAFETY TALKS</small></span>
                    </div>
                
                </a><br />
                <!--end safety talks tile-->
                <!--begin SAFETY BOARD tile -->
                <a href="<?php echo $base;?>admin/dig_safety_board_metro" class="tile bg-black">
                    <div class="tile-content icon">
                        <img src="<?php echo $base;?>img/jhsc/hazards.png"></i>
                    </div>
                    <div class="tile-status">
                            <span class="name"><small>HAZARDS</small></span>
                    </div>
                
                </a>
                <!--end SAFETY BOARD tile-->
                <!--begin RNEW WORKER tile -->
                <a class="tile bg-black">
                    <div class="tile-content icon">
                        <img src="<?php echo $base;?>img/jhsc/assign.png"></i>
                    </div>
                    <div class="tile-status">
                            <span class="name"><small>ASSIGN</small></span>
                    </div>
                
                </a>
                <!--end NEW WORKER tile-->
                <!--begin DATA tile -->
                <a href="<?php echo $base;?>admin/dig_safety_board_metro" class="tile bg-black">
                    <div class="tile-content icon">
                        <img src="<?php echo $base;?>img/jhsc/safety_board.png"></i>
                    </div>
                    <div class="tile-status">
                            <span class="name"><small>SAFETY BOARD</small></span>
                    </div>
                
                </a><br />
                <!--end  DATA tile-->
                 
             </div>
                          

         <!-- END SECOND COLUMN FIRST ROW -->
                                 <!-------BEGIN THIRD COLUMN FIRST ROW OF TILES------>
									<div class="tile-group no-margin no-padding clearfix span2" >                    
										<!--begin text information paragraphs -->
											<!--begin small tile-->
									<?php $this->load->view('advertisement_right_tile');?>
								<!--end small tile--> 
                                
										<!--end text information paragraphs-->  
										 
										
										
									</div>
								<!-------END  THIRD COLUMN FIRST ROW OF TILES------> 
        </div>
    </div>
</div>
<!--END OF CODE FOR METRO STYLE-->


<?php $this->load->view('footer_admin');?>
