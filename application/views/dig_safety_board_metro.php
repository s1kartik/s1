<?php $this->load->view('header_admin');?>

<div class="homebg metro ">
	<!--BEGIN PAGE TITLE-->
    <div class="container-fluid">
        <div class="main-content padding-metro-header subheader-secondary clearfix fg-grayLighter">
        <em class="margin20">DIGITAL SAFETY BOARD</em>
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
                    <div class="tile-content icon">
                        <img src="<?php echo $base;?>img/dig-safety-board/form_1000.png"></i>
                    </div>
                    <div class="tile-status">
                            <span class="name"><small>FORM 1000</small></span>
                    </div>
                
                </a>
                <!--end tile-->
                <!--begin assign tile -->
                <a class="tile bg-black">
                    <div class="tile-content icon">
                        <img src="<?php echo $base;?>img/dig-safety-board/nop.png"></i>
                    </div>
                    <div class="tile-status">
                            <span class="name"><small>NOP</small></span>
                    </div>
                
                </a>
                <!--end assign tile-->
                <!--begin dig-safety-board tile -->
                <a class="tile bg-black">
                    <div class="tile-content icon">
                        <img src="<?php echo $base;?>img/dig-safety-board/events.png"></i>
                    </div>
                    <div class="tile-status">
                            <span class="name"><small>EVENTS</small></span>
                    </div>
                
                </a><br />
                <!--end dig-safety-board tile-->
                <!--begin inspections tile -->
                <a class="tile bg-black">
                    <div class="tile-content icon">
                        <img src="<?php echo $base;?>img/dig-safety-board/washroom.png"></i>
                    </div>
                    <div class="tile-status">
                            <span class="name"><small>WASHROOM</small></span>
                    </div>
                
                </a>
                <!--end inspections tile-->
                <!--begin investigations tile -->
                <a class="tile bg-black">
                    <div class="tile-content icon">
                        <img src="<?php echo $base;?>img/dig-safety-board/emergency_plan.png"></i>
                    </div>
                    <div class="tile-status">
                            <span class="name"><small>EMERGENCY PLAN</small></span>
                    </div>
                
                </a>
                <!--end investigations tile-->
                <!--begin safety talks tile -->
                <a class="tile bg-black">
                    <div class="tile-content icon">
                        <img src="<?php echo $base;?>img/dig-safety-board/hazards.png"></i>
                    </div>
                    <div class="tile-status">
                            <span class="name"><small>HAZARDS ALERTS</small></span>
                    </div>
                
                </a><br />
                <!--end safety talks tile-->
                <!--begin SAFETY BOARD tile -->
                <a class="tile bg-black">
                    <div class="tile-content icon">
                        <img src="<?php echo $base;?>img/dig-safety-board/mol_inspection.png"></i>
                    </div>
                    <div class="tile-status">
                            <span class="name"><small>MOL INSPECTION</small></span>
                    </div>
                
                </a>
                <!--end SAFETY BOARD tile-->
                <!--begin RNEW WORKER tile -->
                <a class="tile bg-black">
                    <div class="tile-content icon">
                        <img src="<?php echo $base;?>img/dig-safety-board/new_worker_orientation.png"></i>
                    </div>
                    <div class="tile-status" style="line-height:15px;">
                            <span class="name"><small>NEW WORKER ORIENTATION</small></span>
                    </div>
                
                </a>
                <!--end NEW WORKER tile-->
                <!--begin DATA tile -->
                <a class="tile bg-black">
                    <div class="tile-content icon">
                        <img src="<?php echo $base;?>img/dig-safety-board/act_reg.png"></i>
                    </div>
                    <div class="tile-status">
                            <span class="name"><small>ACT/REGULATION</small></span>
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
