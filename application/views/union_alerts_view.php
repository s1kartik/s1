<?php 
$this->load->view('header_admin');
$union['id'] 	= isset($union['id']) ? $union['id'] : '';

$is_training_centre		= '';
if( "7" == $this->sess_usertype ) {
	$check_training_centre 	= $this->users->getUserMetaByID($this->sess_userid);
	$is_training_centre 	= isset($check_training_centre['union_training_centre']) && $check_training_centre['union_training_centre'] ? $check_training_centre['union_training_centre'] : '';
	$campus_names			= isset($check_training_centre['campus_name']) && $check_training_centre['campus_name'] ? $check_training_centre['campus_name'] : '';	
}
?>

<div class="homebg ">
	<!--BEGIN PAGE TITLE-->
    <div class="container-fluid">
        <div class="main-content padding-metro-header subheader-secondary clearfix fg-grayLighter">
        <em class="margin20"><h3>HAZARDS ALERTS - <?php echo isset($union['firstname']) ? strtoupper($union['firstname']) : '';?> <?php echo isset($union['lastname']) ? strtoupper($union['lastname']) : '';?></h3></em>
        </div>
    </div>
    <!--END PAGE TITLE-->

<div class="union-container u-metro">
		<!--------START UNION PROFILE HEAD-------->
		<div class="heading ad-heading">
        
			<span class="ad-tab " ><a data-toggle="modal" class="btn btn-warning" href="#ad-modal">ADVERTISING</a></span>
			<!-- START ADVERTISING MODAL -->
			<div id="ad-modal" class="modal fade hide">
				<span data-dismiss="modal" class="remove"><i class="icon-remove icon-white"></i></span>
				<img src="<?php echo $base;?>img/ad-examples/nissan_1024x724.jpg"/>
			</div>
			<!-- END MODAL -->	
			
			<div class="row-fluid">
				<!-- START HEADER INFORMATION-->
				<div class="span3">					
					<div class="u-img">
						<?php 
						$pimg = (!empty($union['profile_image'])) ? $base.$this->path_upload_profiles.$union['profile_image'] : $base."img/default.png";?>
						<img src="<?php echo $pimg;?>">
					</div>
				</div>			
				<div class="span9">
					<div class="u-details">
						<?php 
						$city = $province = $country = '';
						if( isset($is_training_centre) && "on" == $is_training_centre ) {
							foreach( $parent_unions AS $key_parent_unions => $val_parent_unions ) {
								$union 		= $this->users->getUserByID( $val_parent_unions );
								$usermeta 	= $this->users->getUserMetaByID( $val_parent_unions );
								?>
								<h3 class="u-name"><?php echo isset($union['firstname']) ? strtoupper($union['firstname']) : '';?> <?php echo isset($union['lastname']) ? strtoupper($union['lastname']) : '';?>
                                <button class="btn btn-warning"  type="button" title="Connect"><img src="<?php echo $base;?>img/myprofile/connections.png" width="30"></button>
                                </h3>
								<h5 class="u-trade">
									<?php 
									$union['industry_id'] = isset($union['industry_id']) ? $union['industry_id'] : '';
									$industry = $this->users->getElementByID('tbl_industry', $union['industry_id']);
									if( isset($industry) && sizeof($industry) ) {
										$industry = $industry['industryname'];
										echo strtoupper($industry);
									}?>
								</h5>
								<?php 
								if(isset($usermeta['city_id'])) { // Get City //
									$city = $this->users->getElementByID('tbl_city', $usermeta['city_id']);
									$city = $city['cityname'];
								}
								if(isset($usermeta['province_id'])) { // Get Province //
									$province = $this->users->getElementByID('tbl_province', $usermeta['province_id']);
									$province = (isset($province['provincename'])&&$province['provincename']) ? ", ".$province['provincename'] : '';
								}
								if(isset($usermeta['country_id'])) { // Get Country //
									$country = $this->users->getElementByID('tbl_country', $usermeta['country_id']);
									$country = (isset($country['countryname'])&&$country['countryname']) ? ", ".$country['countryname'] : '';
								}
								$location = strtoupper($city." ".$province." ".$country);
								?>
								<h6 class="u-loc"><?php echo $location;?></h6>
							<?php
							}?>
							<br><br><div class="pull-right fr"><h5 class="u-loc"><?php echo "Campus Name: ";echo ($campus_names) ? $campus_names : 'N/A';?></h5></div>
							<?php 
						}
						else { ?>
							<h3 class="u-name"><?php echo isset($union['firstname']) ? strtoupper($union['firstname']) : '';?> <?php echo isset($union['lastname']) ? strtoupper($union['lastname']) : '';?> 
                            </h3>
                            
							<h5 class="u-trade">
								<?php 
								$union['industry_id'] = isset($union['industry_id']) ? $union['industry_id'] : '';
								$industry = $this->users->getElementByID('tbl_industry', $union['industry_id']);
								if( isset($industry) && sizeof($industry) ) {
									$industry = $industry['industryname'];
									echo strtoupper($industry);
								}
								?>
							</h5>
							<?php
							if(isset($usermeta['city_id'])) { // Get City //
								$city = $this->users->getElementByID('tbl_city', $usermeta['city_id']);
								$city = $city['cityname'];
							}
							if(isset($usermeta['province_id'])) { // Get Province //
								$province = $this->users->getElementByID('tbl_province', $usermeta['province_id']);
								$province = (isset($province['provincename'])&&$province['provincename']) ? ", ".$province['provincename'] : '';
							}
							if(isset($usermeta['country_id'])) { // Get Country //
								$country = $this->users->getElementByID('tbl_country', $usermeta['country_id']);
								$country = (isset($country['countryname'])&&$country['countryname']) ? ", ".$country['countryname'] : '';
							}
							$location = strtoupper($city." ".$province." ".$country);
							?>
							<h6 class="u-loc">60 CASTER AVENUE - <?php echo $location;?>, L4L 5Y9</h6>
						<?php 
						}?>
					</div>
				</div>
				<!-- END HEADER INFORMATION-->
			</div>
		</div>
		<!--------END UNION PROFILE HEAD-------->
		<div class="module">	
		<h5  class="title">HAZARDS ALERTS LIST FROM <?php echo isset($union['firstname']) ? strtoupper($union['firstname']) : '';?> <?php echo isset($union['lastname']) ? strtoupper($union['lastname']) : '';?></h5>
<!--*******************------BEGIN HAZARD ALERTS VIEW BODY------***************************************-->
<div class="info-container metro">
<div class="tab-pane  admin-settings" id="administrators">
    <h4>Alerts</h4>
        <a class="admin-new" href="<?php echo $base;?>admin/union_alerts?id=<?php echo $union_id;?>"><i class="icon-plus-2"></i> New Alert</a>
        <div class="input-prepend input-append">
            <form method="post">
				<input type="hidden" name="searchby" value="st_title" />
				<input type="text" name="searchval" value="" class="input-large" list="searchresults" autocomplete="off" />
				<input class="btn" type="submit" value="Search"/>
            </form>
        </div>
        <?php 
		if(isset($list)&&count($list)>0):?>
            <table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
					<tr>
						<th>Title</th>
						<th>Summary</th>
						<th>Locations</th>
						<th>Legal Requirements</th>
						<th>Precautions</th>
						<th>Alert Criteria: User(s)</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
                </thead>
                <?php 
				foreach($list as $admin) {
					$users_alerted 	= array();
					$id 			= isset($admin['id']) ? $admin['id'] : '';
					$rows_users_alerted = $this->users->getMetaDataList('alerts_criteria_users', 'in_status=1 AND in_alert_id="'.$id.'"', '', 'st_alert_criteria, st_users_alerted');
					foreach( $rows_users_alerted AS $user ) {
						$users_alerted[$user['st_alert_criteria']] = (isset($user['st_users_alerted']) && $user['st_users_alerted']) ? json_decode($user['st_users_alerted']) : array();
					}
					// common::pr($users_alerted);
					$show_users = '';?>
					<tr>
						<td class="wordbreak"><?php echo wordwrap($admin['st_title'],20, "<br>\n",true);?></td>
						<td class="wordbreak"><?php echo $admin['st_summary'];?></td>
						<td class="wordbreak"><?php echo $admin['st_locations'];?></td>
						<td class="wordbreak"><?php echo $admin['st_legal_requirements'];?></td>
						<td class="wordbreak"><?php echo $admin['st_precautions'];?></td>
						<?php 
						if( isset($users_alerted) && $users_alerted ) {
							foreach( $users_alerted AS $key_alert_criteria => $val_alert_criteria ) {
								if( isset($val_alert_criteria) ) {
									if($val_alert_criteria) {
										$list_users 		= array();
										$users_alerted_ids 	= implode(",",$val_alert_criteria);
										$rows_users 		= $this->users->getMetaDataList('user', 'id IN ('.$users_alerted_ids.')', '', 'nickname');
										foreach( $rows_users AS $user ) {
											$list_users[] 	= (isset($user['nickname']) && $user['nickname']) ? $user['nickname'] : '';
										}
										$show_users 		= implode(", ",$list_users)."<br>";
									}
								}
							}?>
							<td><?php echo "<b>".ucwords($key_alert_criteria).": </b>";echo (isset($show_users)&&$show_users) ? $show_users : 'N/A';?></td>
							<?php 
						}
						else {
							echo "<td>&nbsp;</td>";
						}?>
						<td><?php echo ($admin['in_status']=='1') ? 'Active' : 'Inactive';?></td>
						<td title="Edit Alert"><a href="<?php echo $base;?>admin/union_alerts?id=<?php echo $union_id;?>&alertid=<?php echo $admin['id'];?>"><i class="icon-enter"></i></a></td>
					</tr>
				<?php 
				}?>
            </table>
        <?php else:?>
            <h6>No data found</h6>            
        <?php endif;?>
</div>       
</div>
<!--*******************------END HAZARD ALERTS VIEW BODY----****************---->
	</div>
</div>
</div>
<?php $this->load->view('footer_admin'); ?>