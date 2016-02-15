<script type="text/javascript" src="<?php echo $this->base;?>js/metro/metro.min.js"></script>
<style type="text/css">
	.styled-select select {
   background: transparent;
  	font-weight:bold;
   text-shadow: 2px 2px 0px #000;
   
   border: 0;
   border-radius: 0;
  -moz-appearance:none;
   -webkit-appearance: none;
   }
   .metro .tab-control .tabs > li.active a {
  border-bottom-color: #ffffff;
  background-color: #e51400;
  border-top: 2px #e51400 solid;
  color:#fff;
}
.metro .tab-control .tabs > li.active:hover a {
  background-color: #e51400;
  color:#fff;
}
</style>
<div class="profile-model-content">
<div class="panel no-border span6 no-margin">
	<div class="panel-content fg-dark nlp nrp">
		<?php 
		if( file_exists(FCPATH.$this->path_upload_profiles.$user_wallet['profile_image']) && $user_wallet['profile_image'] ) {?>
			<img src="<?php echo $this->base.$this->path_upload_profiles.$user_wallet['profile_image'];?>" rel=""  class="place-left margin10 nlm ntm  s1_card_img">
			<?php 
		}
		else {?>
			<img src="<?php echo $this->base;?>img/default.png" rel=""  class="place-left margin10 nlm ntm  s1_card_img">
		<?php }?>

		<span  class="padding10" >
		<h3 class="fg-black ">&nbsp;<strong><?php echo (isset($user_wallet['username']) && $user_wallet['username']) ? strtoupper($user_wallet['username']) : strtoupper($user_wallet['firstname'])." ".strtoupper($user_wallet['lastname']);?></strong></h3>
        <p class="s1content_body_section fg-red"><strong>&nbsp;<?php echo isset($user_wallet['industry']) ? strtoupper($user_wallet['industry']) : '';?></strong></p>
        <p class="s1content_body_section fg-red"><strong>&nbsp;<?php echo isset($user_wallet['trade']) ? strtoupper($user_wallet['trade']) : '';?></strong></p>
        	
			<p class="s1content_body_section fg-red"><strong>
			<?php //echo "<pre>"; print_r($user_wallet) ;  echo "</pre>";
			echo ("8"==$user_wallet['type_id']) ? " Workers: ".$total_users : '';
			echo ( "7"==$user_wallet['type_id']) ? " Connections: ".$total_users : '';
			?></strong>
			</p>
		</span>
	</div>
</div>
<div class="tab-control span6 no-margin" data-effect="fade" data-role="tab-control">
	<ul class="tabs">
		<li class="active user_tab"><a href="#profile"><i class="icon-user-2 on-left-more"></i>Profile</a></li>
		<?php
		if( "9"==$user_wallet['type_id'] ) {?>
			<li class="user_tab"><a href="#designation" ><i class="icon-user-3 on-left-more"></i>Designation</a></li>
			<?php
		}
		if( "11" == $user_wallet['type_id'] ) {?>
			<li class="user_tab"><a href="#designation"><i class="icon-user-3 on-left-more"></i>Institution</a></li>
			<?php
		}?>
	</ul>

	
	<?php 
	$total_points = $this->points->getS1Points($user_id, $user_wallet['type_id']);
	
	$rows_points_level 	= $this->points->getPointsLevel($total_points,1);			
	$points_of_level 	= isset($rows_points_level[0]['in_points_of_level']) ? $rows_points_level[0]['in_points_of_level'] : 10;

	// Update points and level //
		$this->points->updateUsersPointsWithLevelHistory('', $user_id, $total_points);
				
	// Get points Level
	
		$points_level 	= $this->users->getMetaDataList('users_points_level', 'in_user_id="'.$user_id.'"', '', 'in_points_level');
		$points_level 	= isset($points_level[0]['in_points_level']) ? $points_level[0]['in_points_level'] : '0';

	// Get next level points //
		$next_level_points 	= Common::getNextLevelPoints($points_level);
		
		if( $total_points == 0 ) {
			$progressbar_value = 0;
		}
		else {
			if( $total_points >= $next_level_points ) {
				$progressbar_value = 100;
			}
			else {
				//$progressbar_value = ($points_level==0 ) ? (100 / ($next_level_points/$total_points)) : (100 / ($points_of_level/($total_points-$points_of_level)));
				$progressbar_value = ($points_level==0 ) ? (100 / ($next_level_points/$total_points)) : (100*$total_points/$next_level_points);
			}
		}		
	?>

	<div class="frames">
		<div class="frame text-center" id="profile"> 		 
            <?php if (2 <= $points_level){ ?>
            	<p class="s1content_subtitle">Rewards have been unlocked.</p>
            	
            <?php };?> 
                                                   
			<p><img src="<?php echo $this->base."img/points-level/level_".$points_level.".png";?>" style="height:90px;width:90px;"></p>
			<h5 class="fg-steel text-center"><?php echo number_format($total_points)." POINTS";?></h5>
            <!--?php echo $progressbar_value;?><br />
            < ?php echo $points_level;?><br />
            < ?php echo $next_level_points;?><br />
            < ?php echo $total_points;?><br />
            < ?php echo $points_of_level;?><br /-->
            <center>
			<div class="span4 progress-bar" data-role="progress-bar" data-value="<?php echo $progressbar_value;?>" style="width:100%;height:15px;">
				<div class="bar " style="width: <?php echo $progressbar_value;?>%;"></div>                
			</div>
            <div ><h5 class="fg-steel text-center"><?php echo number_format($next_level_points);?></h5></div>
            </center>
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
<?php 
if( isset($user_badges) && sizeof($user_badges) ) { ?>
	<div class="accordion with-marker span6 place-left no-margin " data-role="accordion" data-closeany="false">
		<div class="accordion-frame">
			<a class="heading bg-red  fg-white" href="#"><strong>D.R.O.T</strong></a>
			<div class="content">
			<?php foreach( $user_badges AS $val_user_badges ) {
					$badge_image	= $val_user_badges['st_badge_image'];
					if( $badge_image ) {
						if( file_exists(FCPATH."img/badges/".$badge_image) ) {?>
							<img class="w100" src="<?php echo $this->base."img/badges/".$badge_image;?>" />
							<?php 
						}
						else {?>
							<img class="w100" src="<?php echo $base;?>img/default.png" />
							<?php 
						}
					}
				}?>
			</div>
		</div>
	</div>				
<?php }?>

<?php 
if( $accessS1PublicPage=="yes" ) { ?>
	<div class="span6 no-margin"><button type="button" class="bg-red fg-white martopbottom20" onclick="javascript:location.href='<?php echo $this->base."admin/".$url_s1_public_page."?id=".$user_id;?>';">
	<strong>My Page</strong>
	</button></div>    
	<?php 
}?>

</div>