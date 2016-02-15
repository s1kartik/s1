<?php $this->load->view('header_admin');?>
<div class="homebg metro ">
	<!--BEGIN PAGE TITLE-->
    <div class="container">
        <div class="main-content padding-metro-header subheader-secondary clearfix fg-grayLighter">
        <em class="margin20">MY DATA</em>
        </div>
    </div>
    <!--END PAGE TITLE-->
    <div class="model-data-container">
    <?php 
			if($this->sess_usertype=='9' || $this->sess_usertype=='8') {
				$this->load->view('my_data_hazards');
				$this->load->view('my_data_inspections');
				$this->load->view('my_data_investigations');
				$this->load->view('my_data_procedures');
				$this->load->view('my_data_safetytalks');
				$this->load->view('my_data_trainings');
			}	
			?>
     </div>       
    <div class="container">
        <div class="main-content padding-metro-home clearfix"> 
        <!--START CODE FOR METRO STYLE-->
        
        <div class="myDataColCon">
        <!-- ***************** second part test *************** -->
        <div class="tile-group three no-margin no-padding popOuter" >
        <!-------BEGIN FIRST ROW FIRST COLUMN OF TILES------>
			<!-------   --->

            <!--begin my profile tile -->
            <a class="tile triple bg-darker" href='<?php echo $base."admin/profile_view_integrated";?>'>
                <div class="tile-content">
					<i class="icon on-left">
					<?php 
					if( file_exists(FCPATH.$this->path_upload_profiles.$user['profile_image']) && $user['profile_image'] ) {?>
						<img src="<?php echo $base.$this->path_upload_profiles.$user['profile_image'];?>" class="w120 h120 padding10"/>
						<?php 
					}
					else {?><img class="w120 h120 padding10" src="<?php echo $base;?>img/default.png" /><?php }?>
					</i>
				</div>
                <span  class="text-right brand padding20" >
                    <h3 class="fg-white"><strong><?php echo isset($user['firstname']) ? $user['firstname'] : '';?></strong></h3>
                    <h3 class="fg-white"><strong><?php echo isset($user['lastname']) ? $user['lastname'] : '';?></strong></h3>                        
                </span>
            </a>
            <!--end my profile tile-->
			
        <!--begin points and credits  tile -->
            <?php 
			$total_points = $this->points->getS1Points($this->sess_userid, $this->sess_usertype);

			$rows_points_level 	= $this->points->getPointsLevel($total_points,1);			
			$points_of_level 	= isset($rows_points_level[0]['in_points_of_level']) ? $rows_points_level[0]['in_points_of_level'] : 10;

			// Update points and level //
				$this->points->updateUsersPointsWithLevelHistory('', $this->sess_userid, $total_points);
							
			// Get points Level
				$points_level 	= $this->users->getMetaDataList('users_points_level', 'in_user_id="'.$this->sess_userid.'"', '', 'in_points_level');
				$points_level 	= isset($points_level[0]['in_points_level']) ? $points_level[0]['in_points_level'] : '0';
		
			// Get next level points //
				$next_level_points 			= Common::getNextLevelPoints($points_level);
				if( $total_points == 0 ) {
					$progressbar_value = 0;
				}
				else {
					if( $total_points >= $next_level_points ) {
						$progressbar_value = 100;
					}
					else {
						$progressbar_value = ($points_level==0 ) ? (100 / ($next_level_points/$total_points)) : (100 / ($points_of_level/($total_points-$points_of_level)));
					}
				}?>
				<a class="tile double-vertical triple bg-darker" href='<?php echo $base."admin/my_wallet";?>'>
					<div class="tile-content" >
						<div class="padding10">
							<span style="margin-left:30%;" >
							<img src="<?php echo $base."img/points-level/level_".$points_level.".png";?>"  style="height:140px;width:140px;"/>
							</span>
							<h5 class="fg-steel text-center">
								<i class=""><img src="<?php echo $this->base;?>img/icons_xp.png" style="height:26px;" /></i>
								<?php echo number_format($total_points);?>
							</h5>
							<div class="progress-bar " data-role="progress-bar" data-value="<?php echo $progressbar_value;?>">
								<div class="bar bg-steel" style="width: <?php echo $progressbar_value;?>%;"></div>
							</div>
							<!-- VIEW BALANCE OF CREDITS BY USER-->
								<h4 class="fg-white text-center" title="My Credits" >
								<i ><img  src="<?php echo $this->base;?>img/icons_s1credit.png" style="height:28px;" /></i>&nbsp; 
								<?php echo $total_available_credits;?> </h4>
					   </div>
					</div>
				</a>
		 <!--end Points and credits tile-->
         </div>

		 
		 <div class="center-width">
         <div class="tile-group no-margin no-padding span1" >
                <!--begin Reward 1 Code tile -->
                <a class="tile bg-darker">
					
                </a>
                <!--end Reward 1 Code tile-->
                <!--begin Reward 2 Code tile -->
                <a class="tile bg-darker">
					<?php 
					//if( file_exists(FCPATH.$this->path_upload_profiles.$my_user_wallet['union_profile_image']) && trim($my_user_wallet['union_profile_image']) ) {?>
						<!--img src="<?php echo $base.$this->path_upload_profiles.$my_user_wallet['union_profile_image'];?>" class="w120 h120"/-->
						<?php 
					//}
					//else {?>
						<!--img src="<?php echo $base;?>img/myprofile/local183.jpg" class="w120 h120" /-->
						<?php //
					//}?>
				</a>
                <!--end Reward 2 Code tile-->
                <!--begin Reward 3 Code tile -->
                <a class="tile bg-darker">
                	<div class="tile-content icon">
                    	<span class="icon">
						<?php 
						//$user_language = isset($my_user_wallet['language']) ? strtolower($my_user_wallet['language']) : 'en';
						//$path_img = FCPATH."img/myprofile/flags/icon-".$user_language.".png";?>
						<!--img src="<?php echo $base."img/myprofile/flags/icon-".$user_language.".png";?>" class="w120 h120"/-->
                        </span>
                    </div>
                </a>
                <!--end Reward 3 Code tile-->
          </div>
          <div class="tile-group span1 no-margin no-padding" >
                <!--begin Reward 4 Code tile -->
                <a class="tile bg-amber" href="#modal_my_data_hazards" data-toggle="modal">
                	<span class="text-center padding20" >
						<h1 class="fg-white"><strong><?php echo ($my_data_hazards['completed']['total']+$my_data_hazards['assigned']['total']+$my_data_hazards['purchased']['total']);?></strong></h1>
					</span>
                    <div class="brand"><h6 class="fg-white margin5">HAZARDS</h6></div>
                </a>
                <!--end Reward 4 Code tile-->
                
				<!--begin Reward 5 Code tile -->
                <a class="tile bg-lime" href="#modal_my_data_procedures" data-toggle="modal">
                	<span  class="text-center padding20" >
						<h1 class="fg-white"><strong><?php echo ($my_data_procedures['completed']['total']+$my_data_procedures['assigned']['total']+$my_data_procedures['purchased']['total']);?></strong></h1>
					</span>
                    <div class="brand"><h6 class="fg-white margin5">PROCEDURES</h6></div>
                </a>
                <!--end Reward 5 Code tile-->
				
                <!--begin Reward 6 Code tile -->
                <a class="tile bg-cyan" href="#modal_my_data_trainings" data-toggle="modal">
                	<span class="text-center padding20" >
						<h1 class="fg-white"><strong><?php echo ($my_data_training['completed']['total']+$my_data_training['assigned']['total']+$my_data_training['purchased']['total']);?></strong></h1>
					</span>
                    <div class="brand"><h6 class="fg-white margin5">TRAININGS</h6></div>
                </a>
                <!--end Reward 6 Code tile-->
            </div>
          <div class="tile-group span1 no-margin no-padding" >
                <!--begin Reward 7 Code tile -->
                <a class="tile bg-darkOrange" href="#modal_my_data_safetytalks" data-toggle="modal">
                	<span  class="text-center padding20" >
						<h1 class="fg-white"><strong><?php echo ($my_data_safetytalks['completed']['total']+$my_data_safetytalks['assigned']['total']+$my_data_safetytalks['purchased']['total']);?></strong></h1>
					</span>
					<div class="brand"><h6 class="fg-white margin5">SAFETY TALKS</h6></div>
                </a>
                <!--end Reward 7 Code tile-->

                <!--begin Reward 8 Code tile -->
                <a class="tile bg-emerald" href="#modal_my_data_inspections" data-toggle="modal">
                	<span  class="text-center padding20" >
						<h1 class="fg-white"><strong><?php echo ($my_data_inspections['completed']['total']+$my_data_inspections['assigned']['total']+$my_data_inspections['purchased']['total']);?></strong></h1>
					</span>
                    <div class="brand"><h6 class="fg-white margin5">INSPECTIONS</h6></div>
                </a>
                <!--end Reward 8 Code tile-->

                <!--begin Reward 9 Code tile -->
                <a class="tile bg-darkCyan" href="#modal_my_data_investigations" data-toggle="modal">
                	<span  class="text-center padding20" >
						<h1 class="fg-white"><strong><?php echo ($my_data_investigations['completed']['total']+$my_data_investigations['assigned']['total']+$my_data_investigations['purchased']['total']);?></strong></h1>
					</span>
                    <div class="brand"><h6 class="fg-white margin5">INVESTIGATIONS</h6></div>
                </a>
                <!--end Reward 9 Code tile-->
           </div>
		   </div>
        <!-- ****************** end second part test ******************* -->         
        </div>
        </span>
    </div>
	</div>
</div>
<!--END OF CODE FOR METRO STYLE-->
<?php $this->load->view('footer_admin');?>
