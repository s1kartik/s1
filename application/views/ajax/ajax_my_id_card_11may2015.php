<script type="text/javascript" src="<?php echo $this->base;?>js/metro/metro.min.js"></script>
<div class="panel no-border span6 no-margin">
	<div class="panel-content fg-dark nlp nrp">
		<?php 
		if( file_exists(FCPATH.$this->path_upload_profiles.$user_wallet['profile_image']) ) {?>
			<img src="<?php echo $this->base.$this->path_upload_profiles.$user_wallet['profile_image'];?>" rel="" style="width: 180px;" class="place-left margin10 nlm ntm size2">
			<?php 
		}
		else {?>
			<img src="<?php echo $this->base;?>img/default.png" rel="" style="width: 180px;" class="place-left margin10 nlm ntm size2">
		<?php }?>

		<span  class="text-center padding20" >
		<h3 class="fg-black"><strong><?php echo (isset($user_wallet['username']) && $user_wallet['username']) ? ucwords($user_wallet['username']) : ucwords($user_wallet['firstname'])."<br>".ucwords($user_wallet['lastname']);?></strong></h3>
			<p class="item-title-secondary fg-black">
			<?php 
			if( "9" == $user_wallet['type_id'] || "11" == $user_wallet['type_id']) {
				$user_language = isset($user_wallet['language']) ? strtolower($user_wallet['language']) : 'en';?>
				<img src="<?php echo $this->base."img/myprofile/flags/icon-".$user_language.".png";?>">
				<?php 
			}
			echo ("8"==$user_wallet['type_id']) ? " Workers: ".$total_users : '';
			echo ( "7"==$user_wallet['type_id']) ? " Members: ".$total_users : '';
			?>
			</p>
		</span>
	</div>
</div>
<div class="tab-control span6 no-margin" data-effect="fade" data-role="tab-control">
	<ul class="tabs">
		<li class="active user_tab"><a href="#profile"><i class="icon-user-2 on-left-more"></i>Profile</a></li>
		<li class="user_tab"><a href="#industry"><i class="icon-tools on-left-more"></i>Industry</a></li>
		<li class="user_tab"><a href="#trade"><i class="icon-wrench on-left-more"></i>Trade</a></li>
		
		<?php
		if( "9"==$user_wallet['type_id'] || "12"==$user_wallet['type_id']) {?>
			<li class="user_tab"><a href="#designation"><i class="icon-user-3 on-left-more"></i>Designation</a></li>
			<?php
		}
		if( "11" == $user_wallet['type_id'] ) {?>
			<li class="user_tab"><a href="#designation"><i class="icon-user-3 on-left-more"></i>Institution</a></li>
			<?php
		}?>
	</ul>

	<?php 
	$points_reading = $this->points->getReadingPointsByUserID($user_id, $user_wallet['type_id']);
	if(in_array($user_wallet['type_id'], array(8,9,11))) { // 8=Employer, 9=Worker, 11=Student //
		$points_page = $this->points->getPagePointsByUserID($user_id);
		$points_page = isset($points_page['points']) ? $points_page['points'] : 0;
	}
	else {
		$points_page = 0;
	}									
	$total_points = (int)$points_reading + (int)$points_page;

	$rows_points_level 	= $this->points->getPointsLevel($total_points,1);
	$points_of_level 	= isset($rows_points_level[0]['in_points_of_level']) ? $rows_points_level[0]['in_points_of_level'] : 10;

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
		}
		// Update points and level //
			$this->points->updateUsersPointsWithLevelHistory('', $user_id, $total_points);
	?>
	<div class="frames">
		<div class="frame text-center" id="profile">                                         
			<p><img src="<?php echo $this->base."img/points-level/level_".$points_level.".png";?>" style="height:90px;width:90px;"></p>
			<h5 class="fg-steel text-center"><?php echo number_format($total_points)." POINTS";?></h5>
			<div class="progress-bar " data-role="progress-bar" data-value="<?php echo $progressbar_value;?>">
				<div class="bar bg-steel" style="width: <?php echo $progressbar_value;?>%;"></div>
			</div>
		</div>
		<div class="frame text-center no-margin" id="industry">
		   <p class="item-title-secondary fg-black"><?php echo isset($user_wallet['industry']) ? ucwords($user_wallet['industry']) : '';?></p>
		</div>
		<div class="frame text-center no-margin" id="trade">
		   <p class="item-title-secondary fg-black"><?php echo isset($user_wallet['trade']) ? ucwords($user_wallet['trade']) : '';?></p>
		</div>
		<div class="frame text-center no-margin" id="designation">
			<p class="item-title-secondary fg-black">
				<?php 
				if( ("9" == $user_wallet['type_id'] || ("12"==$user_wallet['type_id']&&"8"==$this->sess_usertype) ) && $connect_status=="1") {
					echo $designations;?>
					&nbsp;<button href='#modal_worker_profile' class="bg-red fg-white" data-toggle='modal' onclick="javascript:ajaxMyWorkers('<?php echo $user_wallet['firstname']." ".$user_wallet['lastname'];?>', '<?php echo $connect_status;?>');" data-toggle='modal'><b>Designate</b></button>
					<?php 
				}
				else if("11" == $user_wallet['type_id'] && isset($user_wallet['institution_name']) ) {
					$user_wallet['institution_name'];
				}?>
			</p>
		</div>
	</div>
</div>

<div class="accordion with-marker span6 place-left no-margin " data-role="accordion" data-closeany="false">
	<div class="accordion-frame">
		<a class="heading bg-red  fg-white" href="#"><strong>BADGES</strong></a>
		<div class="content">
			<?php
			if( isset($user_badges) && sizeof($user_badges) ) {
				foreach( $user_badges AS $val_user_badges ) {
					$badge_image	= $val_user_badges['st_badge_image'];?>
					<img src="<?php echo $this->base."img/badges/".$badge_image;?>" />
					<?php 
				}
			}?>
		</div>
	</div>
</div>
<?php 
if( $accessS1PublicPage=="yes" ) { ?>
	<div><button type="button" class="bg-red fg-white" onclick="javascript:location.href='<?php echo $this->base."admin/".$url_s1_public_page."?id=".$user_id;?>';">
	<strong>My Page</strong>
	</button></div>    
	<?php 
}?>