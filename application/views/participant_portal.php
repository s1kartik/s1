<?php $this->load->view('header_admin');
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
        <em class="margin20"><h3>PARTICIPANT PORTAL</h3></em>
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
		
		<!--------START FILTER-------->
        <div class="row-fluid assign-container">
			<div class="search">
				<form method="post" id="filterfrm">
					<fieldset>
						 <div class="controls controls-row ">
							<select class="span2 selectpicker" data-style="btn-warning" name="cmb_union_campus" id="cmb_union_campus">
								<option value="">-Select Campus-</option>
								<option value="all">All</option>
								<?php 
								foreach( $rows_campus_names AS $val_campus_names ) {
									$campus_name = (isset($val_campus_names['campus_name'])&&$val_campus_names['campus_name']) ? trim($val_campus_names['campus_name']) : '';
									$arr_campus_names = $campus_name ? explode(",", $campus_name) : array();
									foreach( $arr_campus_names AS $val_campus ) {?>
										<option value="<?php echo $val_campus;?>"><?php echo $val_campus;?></option>
										<?php
									}
								}?>
							</select>
						 </div>
					</fieldset>	 
				 </form>
			</div>
			<div style="display:none;" id="img_data_loader" align="center"><img width="65" height="65" src="<?php echo $base."img/loading_icon.gif";?>"></div>
			<div class="cls_library_courses">
				<!-- AJAX Union Courses search-->
				<h5 class="title"></h5>
				<?php 
				if( isset($rows_union_courses) && sizeof($rows_union_courses) ) {?>
					<div class="heading clearfix">
						<?php 
						$cnt_courselib = 1;
						
						if( $_SERVER['SERVER_ADDR'] != "127.0.0.1" ) {
							date_default_timezone_set("America/New_York");
						}
						else {
							date_default_timezone_set("Asia/Kolkata");
						}
				
						// common::pr($rows_union_courses);
						foreach( $rows_union_courses AS $key_union_courses => $val_union_courses ) {
							$course_id 		= isset($val_union_courses['id']) && $val_union_courses['id'] ? $val_union_courses['id'] : '';
							$course_lib_id 	= isset($val_union_courses['in_library_id']) && $val_union_courses['in_library_id'] ? $val_union_courses['in_library_id'] : '';
							$course_libtype	= isset($val_union_courses['library_type_id']) && $val_union_courses['library_type_id'] ? $val_union_courses['library_type_id'] : '';
							$par_course_start_time	= isset($val_union_courses['dt_start_time']) && $val_union_courses['dt_start_time'] ? $val_union_courses['dt_start_time'] : '';
							
							$campus_name=isset($val_union_courses['st_campus_name']) && $val_union_courses['st_campus_name']?$val_union_courses['st_campus_name']:'';
							$course_code=isset($val_union_courses['in_course_code']) && $val_union_courses['in_course_code']?$val_union_courses['in_course_code']:'';

							// Delete Courses after 2 hours time //
							/*
								$datetime_info = Common::getDatetimeDiff(date('Y-m-d H:i:s'), $par_course_start_time);
								$datetime_info = explode("|", $datetime_info);
								// echo "<br>Current Datetime: ".date('Y-m-d H:i:s')."<br>Start Datetime: ".$par_course_start_time;
								if( $datetime_info['[0]']==0 && 
									($datetime_info['1']<2&&$datetime_info['1']>=0) && ($datetime_info['2']>0||$datetime_info['3']>0) ) {
									$course_status = '1';
								}
								else {
									$course_status = '0';
								}
								if( $course_status!=1 ) {
									// $del_union_course 	= $this->parentdb->deleteSection($course_code, 'union_course', $course_id);
								}
							*/
		
							$course_liblang		= isset($val_union_courses['language']) && $val_union_courses['language'] ? $val_union_courses['language'] : '';
							$course_lib_title 	= isset($val_union_courses['title']) && $val_union_courses['title'] ? $val_union_courses['title'] : '';

							if( $cnt_courselib%3==1 ) {?>
								<div class="row-fluid">
							<?php }?>
							<div class="span4">
								<div href="#" class=" heading-item heading-item-padded clearfix">
									<div class="clearfix">
										<span class="btn-warning pull-left"><i class="sprite-brick sprite-white"></i></span>
										<div class="training-details">
											<h5><?php echo $course_lib_title;?></h5>
											<p class="msg_course_actcode<?php echo $course_id;?> fgred"></p>
											<input type="password" name="txt_course_activation_code<?php echo $course_id;?>" id="txt_course_activation_code<?php echo $course_id;?>" value="" class="span5"  placeholder="Type Code" style="margin-bottom:0px;"/>
											<button class="btn btn-danger" id="participate<?php echo $course_id;?>">Participate</button>
											<script type="text/javascript">
												$(document).on('click', '#participate<?php echo $course_id;?>', function(){
													var course_lib_id 	= '<?php echo $course_lib_id;?>';
													var campus_name 	= '<?php echo $campus_name;?>';
													var course_id 		= '<?php echo $course_id;?>';
													var course_lib_title= '<?php echo $course_lib_title;?>';
													var participant_id 	= '<?php echo $this->sess_userid;?>';
													var course_actcode 	= $("#txt_course_activation_code"+course_id).val();

													$.post(
														'<?php echo $base."ajax/ajaxCheckCourseActivationCode";?>',
														{'courseActCode':course_actcode, 'courseId':course_id},
														function(data) {
															if( data == true ) {
																$(".msg_course_actcode"+course_id).html("");
																$.post(
																	'<?php echo $base."ajax/ajaxAddParticipants";?>', 
																	{'courseId': course_id, 
																	'courseLibraryId': course_lib_id, 
																	'unionId': "<?php echo $union_id;?>", 
																	'campusName':campus_name},
																	function(data) {
																		if( data==true ) {
																			$("#id_modal_participant").modal("show");
																			$("#id_participant_modal").html('You have participate now in Course '+course_lib_title+', redirecting to you on Course');
																			$(".btn_close_participant_modal").click(function() {
																				window.location.href="<?php echo $base."admin/instructor_library_view?libtype=".$course_libtype."&libid=".$course_lib_id."&section=desc&language=".$course_liblang."&union=".$union_id;?>";
																			});
																		}
																		else {
																			$("#id_modal_participant").modal("show");
																			$("#id_participant_modal").html('You already have participation in Course '+course_lib_title+', redirecting to you on Course');
																			$(".btn_close_participant_modal").click(function() {
																				window.location.href="<?php echo $base."admin/instructor_library_view?libtype=".$course_libtype."&libid=".$course_lib_id."&section=desc&language=".$course_liblang."&union=".$union_id;?>";
																			});
																		}
																	}
																);
															}
															else {
																$(".msg_course_actcode"+course_id).html(data);
																$("#txt_course_activation_code"+course_id).focus();
															}
														}
													);
												});
											</script>
										</div>
									</div>
								</div>
							</div>
							
							<!-- Participant Course status Modal -->
								<div id="id_modal_participant" class="modal metro fade hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									<div class="modal-header bg-red">
										<h3 id="myModalLabel">Participant Portal
										<i class="pull-right icon-cancel-2 btn_close_participant_modal" style="margin-right:10px;" data-dismiss="modal"></i></h3>
									</div>
									<div class="modal-body"><p id="id_participant_modal"></p></div>
									<div class="modal-footer">
										<div class="modal-footer"><button class="btn btn_close_participant_modal" data-dismiss="modal">Close</button></div>
									</div>
								</div>
							<?php 
							if( $cnt_courselib%3==0) {?>
								</div>
							<?php }
							$cnt_courselib++;
						}?>						
					</div>
				<?php
				}
				else {?>
					<div class="well">
						<div class="row-fluid">
							<div class="span12">
								<span class="btn btn-warning pull-left">!</span><h5>There are no items matching your search, please try a different option</h5>
							</div>
						</div>
					</div>
					<?php 
				}?>
				</div>
			</div>
		</div>
		<!--------END FILTER-------->		
	</div>
</div>
<?php $this->load->view('footer_admin');?>

<script>
$(document).on('change', '#cmb_union_campus', function() {
	$campus_name 	= $("#cmb_union_campus").val();
	$("#img_data_loader").show();
	$(".cls_library_courses").hide();
	$.post(
		'<?php echo $base;?>ajax/ajaxGetUnionCourses', 
		{'unionId': '<?php echo $union_id;?>', 'campus_name':$campus_name},
		function(data) {
			$(".cls_library_courses").show();
			$(".cls_library_courses").html(data);
			$("#img_data_loader").hide();
		}
	)
});
</script>
