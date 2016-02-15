<?php $this->load->view('header_admin'); 
$check_instructor 		= $this->users->getUserMetaByID($this->sess_userid);
$is_instructor 			= isset($check_instructor['is_instructor']) && $check_instructor['is_instructor'] ? $check_instructor['is_instructor'] : '';
$title_instructor_portal= ("y"==$is_instructor) ? " INSTRUCTOR PORTAL" : "My Trainings";

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
        <em class="margin20"><h3><?php echo $title_instructor_portal;?></h3></em>
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
							<select name="cmb_union_campus" id="cmb_union_campus" class="span3 selectpicker" data-style="btn-warning">
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
							<select name="cmb_union_libtype" id="cmb_union_libtype" class="span2 selectpicker" data-style="btn-warning">
								<option  value="">-Select Library Type-</option>
								<?php 
								foreach( $union_lib_types AS $key_union_libtype => $val_union_libtype ) {
									$selected = (isset($_POST['cmb_union_libtypes']) && $_POST['cmb_union_libtypes']==$val_union_libtype['id']) ? 'selected="selected"' : '';?>
									<option value="<?php echo $val_union_libtype['id'];?>" <?php echo $selected;?>><?php echo $val_union_libtype['library_type'];?></option>
								<?php
								}?>
							</select>
							<!--select class="span2 selectpicker" data-style="btn-warning">
								 <option value="">-Program Name-</option>
								 <option value="">Brick and Stone Level 1</option>
								 <option value="">CCW Level 1</option>
								 <option value="">Cement Finisher Level 1</option>
								 <option value="">High Rise Layout</option>
								 <option value="">Rodman</option>
							</select-->
							<input type="text" name="txt_union_libtext" id="txt_union_libtext" class="span5"  placeholder="SEARCH"/>
							<button class="span1 btn btn-warning" id="btn-go" type="button">Go!</button>							
						 </div>
					</fieldset>
				 </form>
			</div>
			<div style="display:none;" id="img_data_loader" align="center"><img width="65" height="65" src="<?php echo $base."img/loading_icon.gif";?>"></div>
			<div class="results_union_library">
				<!-- AJAX Union Library search-->
				<?php 
				
				if( isset($union_libraries) && sizeof($union_libraries) ) {
					foreach( $union_libraries AS $union_libtype => $val_union_library ) {
						$library_type_name 	= $this->users->getMetaDataList('library_types', 'id="'.$union_libtype.'"', '', 'library_type');
						$library_type_name 	= isset($library_type_name[0]['library_type']) && $library_type_name[0]['library_type'] ? $library_type_name[0]['library_type'] : '';
						?>
						<h5 class="title"><?php echo $library_type_name;?></h5>
						<div class="heading clearfix">
							<?php 
							$cnt_unionlib = 1;
							foreach( $val_union_library AS $key_lib => $val_lib ) {
								$title 				= isset($val_lib['title']) && $val_lib['title'] ? $val_lib['title'] : '';?>
								<?php 
								if( $cnt_unionlib%3==1 ) {?>
									<div class="row-fluid">
								<?php }?>
									<div class="span4">
										<div href="#" class=" heading-item heading-item-padded clearfix">
											<div class="clearfix">
												<span class="btn-warning pull-left"><i class="sprite-brick sprite-white"></i></span>	
												<div class="training-details">
													<h5><?php echo $title;?></h5>
													<?php 
													$rows_union_courses = $this->users->getMetaDataList('union_courses', 
																		'in_union_id="'.$union_id.'" AND in_instructor_id="'.$this->sess_userid.'" 
																		AND in_library_id="'.$val_lib['library_id'].'"', '', 'id, in_status');
													$union_course_id 	= isset($rows_union_courses[0]['id'])&&$rows_union_courses[0]['id'] ? $rows_union_courses[0]['id'] : '';
													$course_status = (isset($rows_union_courses[0]['in_status']) && "1"==$rows_union_courses[0]['in_status']) ? $rows_union_courses[0]['in_status'] : '';
													// common::pr($rows_union_courses);
													if( "1"==$course_status ) {
														$lbl_active = 'Activated';
														$cls_active = 'btn';?>
														<script>$('#start<?php echo $val_lib['library_id'];?>').show();</script>
														<?php  
													}
													else {
														$lbl_active = 'Activate';
														$cls_active = 'btn btn-danger';?>
														<?php 
													}
													?>
                                                    <button title="Click to view Activation Code" class="<?php echo $cls_active;?>" id="activate<?php echo $val_lib['library_id'];?>" onclick="javascript:generateUnionCourse('<?php echo $val_lib['library_id'];?>');"><?php echo $lbl_active;?></button>

													<a <?php if("1"!==$course_status) { echo "style=display:none;"; }?> class="btn btn-warning " target="_blank" href="<?php echo $base."admin/instructor_library_view?libtype=".$union_libtype."&libid=".$val_lib['library_id']."&section=desc&language=".$val_lib['language']."&union=".$union_id;?>" id="start<?php echo $val_lib['library_id'];?>">Start</a>
												</div>
											</div>
										</div>
									</div>
								<?php 
								if( $cnt_unionlib%3==0) {?>
									</div>
									<?php 
								}
								$cnt_unionlib++;
							}?>
							</div>
							</div>
						<?php 
					}
				}
				else {?>
					<div class="well">
						<div class="row-fluid">
							<div class="span12"><span class="btn btn-warning pull-left">!</span><h5>There are no items matching your search, please try a different option</h5></div>
						</div>
					</div>
				<?php }?>
			</div>
		</div>
		<!--------END FILTER-------->		
	</div>
</div>
<?php $this->load->view('footer_admin'); ?>

<script type="text/javascript">
$(document).on('click', '#btn-go', function() {
	$union_libtype 	= $("#cmb_union_libtype").val();
	$union_libtext 	= $("#txt_union_libtext").val();
	$union_campus 	= $("#cmb_union_campus").val();

	$("#img_data_loader").show();
	$(".results_union_library").hide();

	$.post( js_base_path+'ajax/ajaxUnionLibraries', 
		{'unionId': '<?php echo $union_id;?>', 'union_libtype':$union_libtype, 'union_libtext':$union_libtext, 'union_campus':$union_campus},
		function(data) {
			// alert( data);
			$(".results_union_library").show();
			$(".results_union_library").html(data);
			$("#img_data_loader").hide();
		}
	)
});
</script>
