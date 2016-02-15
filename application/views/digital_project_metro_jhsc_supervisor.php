<?php $this->load->view('header_admin');?>
<div class="homebg metro ">
	<!--BEGIN PAGE TITLE-->
    <div class="container-fluid">
        <div class="main-content padding-metro-header subheader-secondary clearfix fg-grayLighter">
        <em class="margin20">DIGITAL PROJECTS - jhsc supervisor</em>
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
                <a class="tile bg-darker">
                    <div class="tile-content icon">
                        <img src="<?php echo $base.$this->path_img_digitalproject."connections.png";?>"></i>
                    </div>
                    <div class="tile-status">
                            <span class="name"><small>CONNECTIONS</small></span>
                    </div>
                
                </a>
                <!--end tile-->
                <!--begin assign tile -->
                <a class="tile bg-darker">
                    <div class="tile-content icon">
                        <img src="<?php echo $base.$this->path_img_digitalproject."assign.png";?>"></i>
                    </div>
                    <div class="tile-status">
                            <span class="name"><small>ASSIGN</small></span>
                    </div>
                
                </a>
                <!--end assign tile-->
                <!--begin jhsc tile -->
                <a href="<?php echo $base;?>admin/jhsc_metro" class="tile bg-darker">
                    <div class="tile-content icon">
                        <img src="<?php echo $base.$this->path_img_digitalproject."jhsc.png";?>"></i>
                    </div>
                    <div class="tile-status">
                            <span class="name"><small>JHSC</small></span>
                    </div>
                
                </a><br />
                <!--end jhsc tile-->
                <!--begin inspections tile -->
                <a class="tile bg-darker">
                    <div class="tile-content icon">
                        <img src="<?php echo $base.$this->path_img_digitalproject."inspections.png";?>"></i>
                    </div>
                    <div class="tile-status">
                            <span class="name"><small>INSPECTIONS</small></span>
                    </div>
                
                </a>
                <!--end inspections tile-->
                <!--begin investigations tile -->
                <a class="tile bg-darker">
                    <div class="tile-content icon">
                        <img src="<?php echo $base.$this->path_img_digitalproject."investigations.png";?>"></i>
                    </div>
                    <div class="tile-status">
                            <span class="name"><small>INVESTIGATIONS</small></span>
                    </div>
                
                </a>
                <!--end investigations tile-->
                <!--begin safety talks tile -->
                <a class="tile bg-darker">
                    <div class="tile-content icon">
                        <img src="<?php echo $base.$this->path_img_digitalproject."safety_talks.png";?>"></i>
                    </div>
                    <div class="tile-status">
                            <span class="name"><small>SAFETY TALKS</small></span>
                    </div>
                
                </a><br />
                <!--end safety talks tile-->
                <!--begin SAFETY BOARD tile -->
                <a href="<?php echo $base;?>admin/dig_safety_board_metro" class="tile bg-darker">
                    <div class="tile-content icon">
                        <img src="<?php echo $base.$this->path_img_digitalproject."safety_board.png";?>"></i>
                    </div>
                    <div class="tile-status">
                            <span class="name"><small>SAFETY BOARD</small></span>
                    </div>
                
                </a>
                <!--end SAFETY BOARD tile-->
                <!--begin RNEW WORKER tile -->
                <a class="tile bg-darker">
                    <div class="tile-content icon">
                        <img src="<?php echo $base.$this->path_img_digitalproject."new_worker.png";?>"></i>
                    </div>
                    <div class="tile-status" style="line-height:15px;">
                            <span class="name" ><small>NEW WORKER ORIENTATION</small></span>
                    </div>
                
                </a>
                <!--end NEW WORKER tile-->
                <!--begin DATA tile -->
                <a class="tile bg-darker">
                    <div class="tile-content icon">
                        <img src="<?php echo $base.$this->path_img_digitalproject."data.png";?>"></i>
                    </div>
                    <div class="tile-status">
                            <span class="name"><small>DATA</small></span>
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
