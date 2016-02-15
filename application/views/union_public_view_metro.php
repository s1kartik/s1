<?php $this->load->view('header_admin');
$union['id'] 	= isset($union['id']) ? $union['id'] : '';

$is_training_centre		= '';
if( "7" == $this->sess_usertype ) {
	$check_training_centre 	= $this->users->getUserMetaByID($this->sess_userid);
	$is_training_centre 	= isset($check_training_centre['union_training_centre']) && $check_training_centre['union_training_centre'] ? $check_training_centre['union_training_centre'] : '';
	$campus_names			= isset($check_training_centre['campus_name']) && $check_training_centre['campus_name'] ? $check_training_centre['campus_name'] : '';	
}

// Check id Selected Union from url, is Instructor's own union or included in his parent unions //
	$access_for_training = $this->users->checkUnionIsInstructorsUnion($union['id']);
	// echo $access_for_training;
?>
<div class="homebg ">
	<!--BEGIN PAGE TITLE-->
    <div class="container-fluid">
        <div class="main-content padding-metro-header subheader-secondary clearfix fg-grayLighter">
        <em class="margin20"><h3>UNION</h3></em>
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
					<?php 
					
					//$parent_unions	= $this->users->getUserMetaByID( $union['id'] );
					//$parent_unions	= (isset($parent_unions['parent_unions']) && $parent_unions['parent_unions']) ? explode(",", $parent_unions['parent_unions']) : array();
					//echo "***************".$union['profile_image'];
					//foreach( $parent_unions AS $key_parent_unions => $val_parent_unions ) {
						//$union 		= $this->users->getUserByID( $val_parent_unions );?>
						<div class="u-img">
							<?php 
							
							$pimg = (!empty($union['profile_image'])) ? $base.$this->path_upload_profiles.$union['profile_image'] : $base."img/default.png";?>
							<img src="<?php echo $pimg;?>" rel="<?php echo $union['id'];?>"/>
						</div>
					<?php
					//}?>
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
								<h3 class="u-name"><?php echo isset($union['firstname']) ? strtoupper($union['firstname']) : '';?> <?php echo isset($union['lastname']) ? strtoupper($union['lastname']) : '';?></h3>
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
							<h3 class="u-name"><?php echo isset($union['firstname']) ? strtoupper($union['firstname']) : '';?> <?php echo isset($union['lastname']) ? strtoupper($union['lastname']) : '';?></h3>
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
							<h6 class="u-loc"><?php echo $location;?></h6>
						<?php 
						}?>
					</div>
				</div>
				<!-- END HEADER INFORMATION-->
			</div>
		</div>
		<!--------END UNION PROFILE HEAD-------->
		
		<!--------START ROW FOR INSTRUCTOR SIGN IN TO UNION LIBRARY-------->
        <!-------- IT SHOULD BE HIDDEN FOR ALL USER, BUT VISIBLE TO INSTRUCTORS-------->
        <!-------- WHO ARE CONNECTED TO THEIR UNION ***************************-------->
		
		<?php 
		
		if( "7" == $this->sess_usertype || 'yes' == $access_for_training ) {
			$check_instructor 	= $this->users->getUserMetaByID($this->sess_userid);
			$is_instructor 		= (isset($check_instructor['is_instructor']) && $check_instructor['is_instructor']) ? $check_instructor['is_instructor'] : '';
			$title_public_view 	= ("y"==$is_instructor) ? "Instructor, please type your credentials to access your portal:" : "My Union Library Training";
			?>
			<div class="row-fluid">
				<?php 
				if( "y" == $is_instructor || "7" == $this->sess_usertype) {?>
					<div class="span3 module-1-3">
						<div class="module">
							<h4 class="title"><?php echo $title_public_view;?></h4>
							<div class="module-inner">
								<?php 
								if( "y" == $is_instructor ) {?>
									<div class="search">
										<form method="post" id="instructor_form">
											<fieldset>
												 <div class="controls controls-row content-margin">
													<input type="password" name="instructor_key" id="instructor_key" value="" class="span3"  placeholder="TYPE INSTRUCTOR KEY"/>
													<button class="span2 btn btn-warning" id="btn-instructor" type="button" >Go!</button>
													<label id="msg_instructor_key" class="fgred"></label>
												 </div>
											</fieldset>	 
										 </form>
									</div>
									<?php 
									if( isset($display_instructor_msg) && $display_instructor_msg ) {?>
										<div class="instructor_results"><?php echo "<h5>".$display_instructor_msg."</h5>";?></div>
										<?php 
									}
								}
								else {?>
									<div class="search">
										<div class="controls controls-row content-margin">
											<button class="span2 btn btn-warning" id="btn_union_library" type="button" onclick="javascript:location.href='<?php echo $base."admin/instructor_portal?id=".$union['id']."&instrkey=1";?>'">Go!</button>
										</div>
									</div>
									<?php
								}
								?>
							</div>
						</div>
					</div>
				<?php 
				}
				if( "7" == $this->sess_usertype && "on"!=$is_training_centre && !$is_instructor ) {?>
					<!-------------------------------->
					<div class="span4 module-1-3">
						<h4 class="title">My Data Collection</h4>
						<div class="module-inner">
							<div class="search">
								<div class="controls controls-row ">
									<a class="span4 btn btn-warning" id="btn-data-collection" type="button" >Go!</a>
								</div>
							</div>
							<?php 
							if( isset($display_instructor_msg) && $display_instructor_msg ) {?>
								<div class="instructor_results">
									<!-- AJAX Union search-->
									<?php echo "<h5>".$display_instructor_msg."</h5>";?>
								</div>
							<?php
							}?>
						</div>
					</div>
					<!-------------------------------->
				<?php
				}?>
			</div>
        <?php 
		}?>
		
   		<!---------END ROW FOR INSTRUCTOR SIGN IN TO UNION LIBRARY-------->        
		
		<!--------START REP SEARCH-------->
        <div class="row-fluid">
		<div class="module">
			
			
			<h5 class="title">SEARCH FOR REPS</h5>
		
			<div class="module-inner">
        		<div class="search">
				 <form method="post" id="filterfrm">
					<fieldset>
						 <div class="controls controls-row ">																	   
							<select name="cmb_sector" id="cmb_sector" class="span2 selectpicker" data-style="btn-warning">
								<option value="">-Sector-</option>
								<?php 
								$sectors = $this->users->getMetaDataList('sector', 1, 'ORDER BY sector');
								foreach($sectors as $sect) {
									$selected = ($cmb_sector == $sect['id'])?'selected="selected"':'';
									?>
									<option value="<?php echo $sect['id'];?>" <?php echo $selected;?>><?php echo $sect['sector'];?></option>
								<?php 
								}?>
							</select>
							<select name="cmb_job_title" id="cmb_job_title" class="span3 selectpicker" data-style="btn-warning">
								<option value="">-Role Title-</option>
								<?php 
								$job_titles = $this->users->getMetaDataList('job_title', 1, 'ORDER BY TRIM(job_title)');
								foreach($job_titles as $jt) {
									$selected = ($cmb_job_title == $jt['id'])?'selected="selected"':'';?>
									<option value="<?php echo $jt['id'];?>" <?php echo $selected;?>><?php echo $jt['job_title'];?></option>
								<?php 
								}?>
							</select>
							<input type="text" name="txt_unionreps_text" id="txt_unionreps_text" value="<?php echo $txt_unionreps_text;?>" class="span5"  placeholder="TYPE NAME"/>
							<button class="span1 btn btn-warning"  id="btn-go" type="button" >Go!</button>
						 </div>
					</fieldset>	 
				 </form>								 
			</div>
			<div style="display:none;" id="img_data_loader" align="center"><img width="65" height="65" src="<?php echo $base."img/loading_icon.gif";?>"></div>
			<div class="results">
				<!-- AJAX Union search-->
				<?php echo "<h5>".$display_msg."</h5>";?>
			</div>
            </div>
		</div>
        </div>
		<!--------END REP SEARCH-------->
		
		
		
		<!--------START UPCOMING EVENTS, NEWS AND UPCOMING TRAINING-------->
		<div class="row-fluid">
			
			<div class="span8 module-2-3">
			<!--------START UPCOMING EVENTS-------->
				<div class="module">
					<h5  class="title">UPCOMING EVENTS</h5>
					
					<div class="module-inner">
					<div class="row-fluid">
						<div class="span7">
							<h4 class=" item-title">Monthly meeting</h4>
					</div>
						<div class="span5 u-time">
							<i class="icon-time "></i> September 24 2013
						</div>
					</div>
				
					<div class="content-margin">	
					<p>Monthly General Membership Meetings will be held on the first (1st) Sunday of every month (except where noted) and will commence at 9:00 am.</p>

					<p>Members are strongly encouraged to attend these meetings in order to remain informed about current events within the Local.</p>
				
						<a href="<?php echo $base;?>admin/union_events_metro" class="btn btn-warning">all events</a>
					
				</div>
				</div>
				</div>
			<!--------END UPCOMING EVENTS-------->	
			<!-- START NEWS -->
				<div class="module">

					<h5  class="title">NEWS</h5>
					<div class="module-inner">
					<div class="row-fluid">
					<div class="span7">
						<h4 class="item-title">Scotiabank Offers for LIUNA Local 183 Members </h4>
					</div>
					
					<div class="span5 u-time">
						<i class="icon-time "></i> 9/6/2013 6:09 PM
					</div>
					</div>
			
					<div class="content-margin">	
					<p>As a Member of LiUNA Local 183, Scotiabank would like to offer you a series of special benefits by signing up for any of the following services offered:</p>
					
						<a href="<?php echo $base;?>admin/union_news_metro" class="btn btn-warning">more news</a>
					
				</div>
					</div>
				</div>
			<!-- END NEWS -->
			</div>
			
			
			
			<!--------START UPCOMING TRAINING-------->
			<div class="span4 module-1-3">
				<h5  class="title">UPCOMING TRAINING</h5>
				<ul>
					<li class="clearfix">
						<span class="btn-warning pull-left"><i class="sprite-welding sprite-white"></i></span>
						<div class="training-details">
							<h5>WELDING</h5>
							<p><i class="icon-time "></i> October 30 2013</p>
						</div>
					</li>
					<li class="clearfix">	
						<span class="btn-warning pull-left"><i class="sprite-utility sprite-white"></i></span>
						<div class="training-details">
							<h5>UTILITY</h5>
							<p><i class="icon-time "></i> October 30 2013</p>
						</div>
					</li>
					<li class="clearfix">	
						<span class="btn-warning pull-left"><i class="sprite-rail sprite-white"></i></span>
						<div class="training-details">
							<h5>RAILROAD LEVEL1</h5>
							<p><i class="icon-time "></i> October 30 2013</p>
						</div>
					</li>
					<li class="clearfix">	
						<span class="btn-warning pull-left">
							<i class="sprite-rail sprite-white"></i>
						</span>
						<div class="training-details">
							<h5>RAILROAD LEVEL 2</h5>
							<p><i class="icon-time "></i> October 30 2013</p>
						</div>
					</li>
					<li class="clearfix">	
						<span class="btn-warning pull-left"><i class="sprite-rail sprite-white"></i></span>
						<div class="training-details">
							<h5>RAILROAD LEVEL 3</h5>
							<p><i class="icon-time "></i> October 30 2013</p>
						</div>
					</li>
					<!-- buton to link to all upcoming training // Felipe 25 Oct 2013 -->
					<li class="clearfix">
						<div><a class="btn btn-warning " href="<?php echo $base;?>admin/union_training_metro">All Trainings</a></div>
					</li>
					<!-- end button to link to all upcoming training -->
				</ul>
			</div>
			<!--------END UPCOMING TRAINING-------->
		</div>
		<!--------END UPCOMING EVENTS AND UPCOMING TRAINING-------->
</div>
</div>
<?php $this->load->view('footer_admin'); ?>
<script type="text/javascript">
	$(document).on('click', '#btn-go', function(){
		$sector 		= $("#cmb_sector").val();
		$job_title 		= $("#cmb_job_title").val();
		$unionreps_text = $("#txt_unionreps_text").val();
		
		$("#img_data_loader").show();
		$(".results").hide();
		
		$($.post(
			'<?php echo $base;?>ajax/ajaxPublicUnion',
			{'cmb_sector':$sector, 'cmb_job_title':$job_title, 'txt_unionreps_text':$unionreps_text},
			function(data) {
				$(".results").show();
				$(".results").html(data);
				$("#img_data_loader").hide();
			})
		)
	});
	
	$(document).on('click', '#btn-instructor', function() {
		var instructor_key 	= $("#instructor_key").val();
		$($.post(
			'<?php echo $base;?>ajax/ajaxCheckUnionInstructorKey',
			{'instructorKey':instructor_key},
			function(data) {
				if( data == true ) {
					var url = "<?php echo $base;?>admin/instructor_portal?id=<?php echo $union['id'];?>&instrkey=1";
					$(location).attr('href',url);	
				}
				else {
					$("#msg_instructor_key").html(data);
					$("#instructor_key").focus();
				}
			}
			));
	});
	
	<?php 
		$url = "";
		if($this->session->userdata("usertype") == 7):
         $url = $base."admin/union_datacollection";
		endif;?>
		$(document).on('click', '#btn-data-collection', function(){
		
		var url = "<?php echo $url;?>";    
		$(location).attr('href',url);
				
		
	});
	
</script>