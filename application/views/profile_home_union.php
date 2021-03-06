<?php $this->load->view('header_admin');?>
<style>.flexslider .slides img {width: 220px; height: 180px; display: block;}</style>
<script type="text/javascript">
	$(window).load(function() {
		$('.flexslider').flexslider({
			controlNav: false,
			prevText:"",
			nextText:"",
			// animation: "slide", 
			// itemWidth: 1,
			minItems: 2,
			maxItems: 3,
			move: 2,
			reverse: false,
			slideshow: false
		});
	});
</script>
<?php

// 29Aug2014: Library functionality has been reverted for Union User //
	// $union_libtypes 	= $this->libraries->getUnionLibtypes();
	// $id_first_union_libtype 	= isset($union_libtypes[0]['id']) ? $union_libtypes[0]['id'] : '';
	// $libtype = (7!=$this->sess_usertype) ? 1 : $id_first_union_libtype;
	// $my_library_page = (7!=$this->sess_usertype) ? "mylibrary_training_metro" : "mylibrary_union_metro";

$libtype 			= 1;
$my_library_page	= "mylibrary_training_metro";
$union_url 			= ("7" == $this->sess_usertype) ? $base."admin/s1_public_page_union?id=".$this->sess_userid : $base.'admin/my_union_metro';
?>
	
	<div class="homebg metro profile-home">
    	<!--BEGIN PAGE TITLE-->
    <div class="container-fluid">
        <div class="main-content padding-metro-header subheader-secondary clearfix fg-grayLighter">
        <em class="margin20">HOME - UNION&nbsp;&nbsp;
        <a href="#info_profile_home_union_modal" data-toggle='modal'><span class="icon-info-2 s1_info fg-white"></span></a>
            </em>
        </div>
    </div>
    <!-- Start INFO Modal --> 
    <?php // Modal: INFO//
					$this->load->view('info/profile_home_union_modal');
				
				?>	
    <!-- End INFO Modal -->
    <!--END PAGE TITLE-->
		<div class="container">
			<div class="main-content padding-metro-home clearfix">		
							<!--START CODE FOR METRO STYLE-->
                            <div class="clearfix profilehomeCon">
								<!-------BEGIN FIRST ROW first column OF TILES------>
                                <div class="tile-group five no-margin no-padding clearfix" > 
								<!--begin text information paragraphs -->
											<div class="dashboard-content tile quadro marcio_profile_home  double-vertical ol-transparent bg-white" >
												<div class="tile-content">
													<div class="panel no-border">
														<div class="  fg-white">
<!------------------BEGIN SLIDER-------------------------------------->	
<!--begin slider-->
<div id="myCarousel" class="carousel slide">
    <!-- Carousel items -->
    <div class="carousel-inner">
	    <div class="active item">
	       	<img src="<?php echo $base;?>img/profile-slider/union/banner-0.jpg" />
	    </div>
	
	    <div class="item">
	       		<img src="<?php echo $base;?>img/profile-slider/union/banner-1.jpg" />
	    </div>
	    
		<div class="item">
	    	<img src="<?php echo $base;?>img/profile-slider/union/banner-2.jpg" />
	    </div>
	    
	    <div class="item">
	    	<img src="<?php echo $base;?>img/profile-slider/union/banner-3.jpg" />
	    </div>
	    <div class="item">
	    	<img src="<?php echo $base;?>img/profile-slider/union/banner-4.jpg" />
	    </div>
	    <div class="item">
	    	<img src="<?php echo $base;?>img/profile-slider/union/banner-5.jpg" />
	    </div>
	    <div class="item">
	    	<img src="<?php echo $base;?>img/profile-slider/union/banner-6.jpg" />
	    </div>
	    <div class="item">
	    	<img src="<?php echo $base;?>img/profile-slider/union/banner-7.jpg" />
	    </div>
	    <div class="item">
	    	<img src="<?php echo $base;?>img/profile-slider/union/banner-8.jpg" />
	    </div>
	    <div class="item">
	    	<img src="<?php echo $base;?>img/profile-slider/union/banner-9.jpg" />
	    </div>
	    
    </div>
</div>      
       
<!----------------END SLIDER -------------------------------------->														</div>
														
													</div>
												</div>
											</div>
                                                       <br />   
                <!--begin MY picture tile -->
				<a class="tile bg-black" href='#modal_save_profilephoto'  data-toggle='modal'>
					<?php 
					if( file_exists(FCPATH.$this->path_upload_profiles.$user['profile_image']) && $user['profile_image'] ) {?>
						<img src="<?php echo $base.$this->path_upload_profiles.$user['profile_image'];?>" class="w120 h120"/>
						<?php 
					}
					else {?><img class="w120 h120" src="<?php echo $base;?>img/default.png" /><?php }?>
				</a>
				
			<!--end MY picture tile-->                   	
                              <!--begin small tile-->
                                    <a class="tile   bg-black" href="<?php echo $base;?>admin/profile_view_integrated">
                                    	<div class="tile-content icon">
											<span class="icon"><img src="<?php echo $base;?>img/profile-home/profile.png"></span>
										</div>
										<div class="brand">
											<span class="label fg-white">SETTINGS</span>
										</div>
									</a>
								<!--end small tile--> 
                                
                                <!--begin small tile-->
								
									<a class="tile bg-black" href="<?php echo $base."admin/connections_metro";?>">
										<div class="tile-content icon">
											<?php 
											$newmessages = $this->users->newMessageCount($user['email_addr'], 'connection request');
											$new_msg_attendee_completed_safety = $this->users->newMessageCount($user['email_addr'], 'safety talks');
											$total_hs_items 		= ($newmessages + $new_msg_attendee_completed_safety);
											if($total_hs_items>0) {?>
												<div class="badge bg-red pull-right"><?php echo $total_hs_items;?></div>
												<?php 
											}?>
											<span class="icon"><img src="<?php echo $base;?>img/myprofile/connections.png"></span>
										</div>
										<div class="brand"><div class="label">CONNECTIONS</div>
											
										</div>
									</a>
								<!--end small tile--> 
                                <!--begin small tile-->
									<a class="tile  bg-black" href="<?php echo $union_url;?>">
										<div class="tile-content icon">
											<span class="icon"><img src="<?php echo $base;?>img/profile-home/union.png"></span>
										</div>
										<div class="brand"><span class="label fg-white">PUBLIC PAGE</span></div>
									</a>
								<!--end small tile--> 
                                <!--begin small tile- ->
                                < ?php 
									$type = $this->session->userdata("usertype");
									switch ($type) {
										case 1://Admin
											$dpclass = "";
											$dplink =  $base."admin/digital_project_metro";
											break;
										case 8://Employer
											$dpclass = "";
											$dplink =  $base."admin/digital_project_metro_employer";
											break;
										case 9://Worker
											//$dpclass = "half-opacity";
											//$dplink = $base."admin/profile";
											//$dplink =  $base."admin/digital_project_metro_worker";
											// create a condition where if worker is JHSC OR SUPERVISOR 
											// he should go to admin/digital_project_metro_worker
											$dplink=$dpclass='';
											break;
										case 11://Student
											$dpclass = "half-opacity";
											$dplink =  "#";
											break;
										default:
											$dpclass = "half-opacity";
											$dplink =  "#";
									}
								? >
									<!-- *** TILE REMOVED ON AUG-11-2015 BY MARCIO, REQ BY PHILL****
                                    <a class="tile  bg-black < ?php echo $dpclass;?>" href="< ?php echo $dplink;?>">
										<div class="tile-content icon">
											<span class="icon "><img src="< ?php echo $base;?>img/profile-home/digital_project.png"></span>
										</div>
										<div class="brand">
											<!--span class="label fg-white">DIGITAL PROJECT</span- ->
										</div>
									</a> -->
								<!--end small tile--> 
                                <!--begin small tile-->
                                <!-- *** TILE REMOVED ON AUG-11-2015 BY MARCIO, REQ BY PHILL****
									<a class="tile  bg-black < ?php echo $dpclass;?>" href="< ?php echo $dplink;?>">
										<div class="tile-content icon">
											<span class="icon"><img src="< ?php echo $base;?>img/profile-home/jhsc.png"></span>
										</div>
										<div class="brand">
											<!--span class="label fg-white">JHSC</span- ->
										</div>
									</a>
								<!--end small tile--> 
                                <a href="" class="tile bg-black half-opacity">
                                        <div class="tile-content icon">
                                            <img src="<?php echo $base;?>img/jhsc/safety_board.png"></i>
                                        </div>
                                        <div class="tile-status">
                                                <span class="name"><small>COMING SOON</small></span> 
                                        </div>
                                    
                                    </a>

										<!--end text information paragraphs--> 
                                 </div>

                                 <!-------END FIRST ROW first column OF TILES------> 
                                 <!-- BEGIN SECOND COLUMN FIRST ROW -->
                                <div class="tile-group no-margin no-padding clearfix span1" >
                                	<!--begin small tile-->
									<a class="tile  bg-black" href="<?php echo $base."admin/".$my_library_page;?>">
										<div class="tile-content icon">
											<?php 
											$newmessages = $this->users->newMessageCount($user['email_addr'], 'assign');
											$cnt_normal_safetytalks = $this->safetytalks->getTotalCompletedSafetytalksByAttendee('safetytalks', $this->sess_userid);
											$cnt_custom_safetytalks = $this->safetytalks->getTotalCompletedSafetytalksByAttendee('custom_safetytalks', $this->sess_userid);
											$total_hs_items 		= ($newmessages+$cnt_normal_safetytalks+$cnt_custom_safetytalks);
											if($total_hs_items>0) {?>
												<div class="badge bg-red pull-right"><?php echo $total_hs_items;?></div>
												<?php 
											}?>
											<span class="icon"><img src="<?php echo $base;?>img/profile-home/my_library.png"></span>
										</div>
										<div class="brand">
											<span class="label fg-white">H&S PROGRAM</span>
										</div>
									</a>
								<!--end small tile--> 
                                <!--begin small tile-->
									<a class="tile  bg-black" href="<?php echo $base;?>admin/libraries_metro?libtype=<?php echo $libtype;?>">
										<div class="tile-content icon">
											<span class="icon"><img src="<?php echo $base;?>img/profile-home/s1_library.png"></span>
										</div>
										<div class="brand">
											<span class="label fg-white">S1 LIBRARY</span>
										</div>
									</a>
								<!--end small tile--> 
                                <!--begin small tile-->
									<a class="tile  bg-black" href="<?php echo $base;?>admin/getstart_metro">
										<div class="tile-content icon">
											<span class="icon"><img src="<?php echo $base;?>img/profile-home/get_started.png"></span>
										</div>
										<div class="brand">
											<span class="label fg-white">GET STARTED</span>
										</div>
									</a>
								<!--end small tile--> 
									</div>
                                 <!-- END SECOND COLUMN FIRST ROW -->

                                
                                 <!-------BEGIN THIRD COLUMN FIRST ROW OF TILES------>
									<div class="tile-group no-margin no-padding clearfix span4" >                    
										<!--begin text information paragraphs -->
                                        <!--begin Rewards Code tile -->
				<a class="tile double bg-darkCobalt" href="<?php echo $base;?>admin/reward" >
					<div class="tile-content image-set">
					<img src="<?php echo $base;?>img/reward/rewards.png">
					<img src="<?php echo $base;?>img/reward/reward1.png">
					<img src="<?php echo $base;?>img/reward/reward2.png">
					<img src="<?php echo $base;?>img/reward/reward3.png">
					<img src="<?php echo $base;?>img/reward/reward4.png">
					</div>
					<div class=" brand"><span class="label fg-white"><strong>S1 REWARDS</strong></span></div>
				</a>
			<!--end Rewards Code tile-->
  <!--begin Messages tile -->
            <a href="<?php echo $base;?>admin/message_metro" class="tile double bg-lightBlue live" >
                <div class="tile-content email">
                    <div class="email-image">
					<?php 
					if( isset($rows_my_messages[0]['profile_image']) && $rows_my_messages[0]['profile_image'] && file_exists(FCPATH.$this->path_upload_profiles.$rows_my_messages[0]['profile_image']) ) {?>
						<img src="<?php echo $base.$this->path_upload_profiles.$rows_my_messages[0]['profile_image'];?>" class="w100"/>
						<?php 
					}
					else {?><img class="w100 padding10" src="<?php echo $base;?>img/default.png" /><?php }?>
					</div>
                    <div class="email-data">
                        <span class="email-data-subtitle"><?php echo isset($rows_my_messages[0]['nickname'])?$rows_my_messages[0]['nickname']:'';?></span>
                        <span class="email-data-subtitle"><?php echo isset($rows_my_messages[0]['subject'])?$rows_my_messages[0]['subject']:'';?></span>
                        <span class="email-data-text"><?php echo isset($rows_my_messages[0]['message'])? $rows_my_messages[0]['message']:'';?></span>
                    </div>
                </div>
                <div class="brand">
                    <div class="label"><h3 class="no-margin fg-white"><span class="icon-mail"></span></h3></div>
                    <div class="badge"><?php echo $my_total_new_messages;?></div>
                </div>
            </a>
            <!--end Messages Code tile--> 

<!--begin Alerts tile -->
			<?php 
			if( sizeof($users_alerts)) {?>
				<a class="tile double bg-red live" href='#modal_alerts' data-toggle='modal'>
					<div class="tile-content email">
						<?php 
						if( isset($users_alerts->profile_image) && file_exists(FCPATH.$this->path_upload_profiles.$users_alerts->profile_image) ) {?>
							<div class="email-image"><img class="w50" src="<?php echo $base.$this->path_upload_profiles.$users_alerts->profile_image;?>" /></div>
							<?php 
						}
						else {?><div class="email-image"><img class="w50" src="<?php echo $base;?>img/default.png" /></div><?php }?>
						<div class="email-data">
							<span class="email-data-subtitle"><b><?php echo $users_alerts[0]->st_title;?></b></span>
							<span class="email-data-subtitle"><?php echo $users_alerts[0]->username_alert_sentby;?></span>
							<span class="email-data-text"><?php echo $users_alerts[0]->usertype_alert_sentby;?></span>
						</div>
						<div class="brand">
							<span class="label"><?php echo date('M-d-Y', strtotime($users_alerts[0]->dt_hazard_alert_created));?></span>
							<?php 
							$new_badge_notification = $this->users->newMessageCount($user['email_addr'], 'alert');
							if($new_badge_notification>0) {?>
								<div class="badge bg-black"><?php echo $new_badge_notification;?></div>
								<?php
							}?>
						</div>
					</div>
				</a>
				
				<?php
			}
			else {?>
				<a class="tile double bg-red" <?php echo (sizeof($users_alerts)) ? "href='#modal_alerts' data-toggle='modal'" : '';?>><div class="tile-status"><div class="label"><strong>No Hazard Alerts</strong></div></div></a>
				<?php 
			}?>
			<!--end Alerts tile--> 
			</div>
			<!-------END  THIRD COLUMN FIRST ROW OF TILES------> 
</div>
			</div>
		</div>
        <div class="model-data-container alert-model-data">
		
					 <div id="modal_save_profilephoto" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-header bg-red"><h3 id="myModalLabel">My Picture<i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal"></i></h3></div>
				<div class="modal-body">
					<div class="charities-container" align="center" style="box-shadow: none;">
						<form enctype="multipart/form-data" accept-charset="utf-8" name="userfile_upload" id="userfile_upload"  method="post">
							<?php 
							if( file_exists(FCPATH.$this->path_upload_profiles.$user['profile_image']) && $user['profile_image'] ) {?>
								<img src="<?php echo $base.$this->path_upload_profiles.$user['profile_image'];?>" width="300" height="280"/>
								<?php 
							}
							else {?><img width="300" height="280" src="<?php echo $base;?>img/default.png" /><?php }?>
							<div align="center">
								<br><input type="file" name="userfile" onchange="javascript:readImageUrl(this);" id="userimg_file" style="display:none;">
								<img id="preview_img" width="140" height="120" />
							</div>
							<div>
								<br><span title="Edit Picture" style="cursor:pointer;" href="javascript:void(0);" id="id_edit_picture" class="f16 image-button primary">Update Picture <i style="padding: 3px;" class="icon-enter bg-cobalt"></i></span>
								<button title="Save Picture" style="cursor:pointer; display:none;" href="javascript:void(0);" id="id_save_picture" class="f16 image-button primary">Save <i class="icon-enter bg-cobalt"></i></button>
							</div>
							<script type="text/javascript">
								$("#id_edit_picture").click(function(){
									$("#id_save_picture").show();
									$("#userimg_file").show();
									$("#id_edit_picture").hide();
								});
								$(document).ready(function (e){
									$('#userfile_upload').on('submit',(function(e) {
										e.preventDefault();
										$.ajax({
											url: js_base_path+'admin/uploadUserProfileImage', 
											type : 'POST', 
											data: new FormData(this),
											async: false,
											cache: false,
											contentType: false,
											processData: false,
											success: function(data) {
												$("#modal_profilephoto").modal("show");
												$("#modal_save_profilephoto").modal("hide");
												$("#body_modal_profilephoto").html('Profile picture updated successfully.');
												setTimeout(function(){window.location.reload();}, 2000);
											}
										});
									}));
								});
							</script>
						</form>
					</div>
				</div>
				<div class="modal-footer"><button class="btn" data-dismiss="modal">Close</button></div>
			</div>
			
			<div id="modal_profilephoto" class="modal metro fade hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-header bg-red">
					<h3 id="myModalLabel">My Picture
					<i class="pull-right icon-cancel-2 btn_modal_profilephoto" style="margin-right:10px;" data-dismiss="modal"></i></h3>
				</div>
				<div class="modal-body"><p id="body_modal_profilephoto"></p></div>
				<div class="modal-footer"><button class="btn btn_modal_profilephoto" data-dismiss="modal">Close</button></div>
			</div>

        <div id="modal_alerts" class="modal hide fade bg-dark w900" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					<div class="modal-header bg-red">
						<h3 id="myModalLabel">
							MY ALERTS<i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal"></i>
						</h3>
					</div>
					<div class="modal-body">
					<div class="charities-container" style="padding:0px 0px 0px 0px;box-shadow: none;">
						<div class="tile-content">
                        	<div class="accordion with-marker place-left" data-role="accordion" data-closeany="false" >
							<?php 
							foreach( $users_alerts AS $val_alerts ) {
								$alert_id			= (isset($val_alerts->id)&&$val_alerts->id) ? $val_alerts->id : '';
								$alert_sent_by		= (isset($val_alerts->username_alert_sentby)&&$val_alerts->username_alert_sentby) ? $val_alerts->username_alert_sentby : '';
								$alert_sent_date	= (isset($val_alerts->dt_date_created)&&$val_alerts->dt_date_created<=date('Y-m-d- h:i:s')) 
														? date('m-d-Y',strtotime($val_alerts->dt_date_created)) : '';
								$alert_title 		= (isset($val_alerts->st_title) && $val_alerts->st_title) ? $val_alerts->st_title : '';
								$alert_summary		= (isset($val_alerts->st_summary) && $val_alerts->st_summary) ? $val_alerts->st_summary : '';
								$alert_locations 	= (isset($val_alerts->st_locations) && $val_alerts->st_locations) ? $val_alerts->st_locations : '';
								$alert_legal_requirements = (isset($val_alerts->st_legal_requirements) && $val_alerts->st_legal_requirements)?$val_alerts->st_legal_requirements:'';
								$alert_precautions 	= (isset($val_alerts->st_precautions) && $val_alerts->st_precautions) ? $val_alerts->st_precautions : '';
								$alert_images 		= (isset($val_alerts->st_images) && $val_alerts->st_images) ? explode(",", $val_alerts->st_images) : array();
								$alert_video 		= (isset($val_alerts->st_video) && $val_alerts->st_video) ? $val_alerts->st_video : '';
								$alert_created 		= (isset($val_alerts->dt_hazard_alert_created) && $val_alerts->dt_hazard_alert_created) ? $val_alerts->dt_hazard_alert_created:'';
								?>
								<div class="accordion-frame span6">
									<a class="heading bg-red fg-white" href="#" onclick="javascript:hasAlertRead('<?php echo $alert_id;?>', '<?php echo $this->sess_userid;?>');">
										<img src="<?php echo $base."img/library/hazards.png";?>" width="30" height="25">
										<strong><?php echo wordwrap($alert_title, 50, "<br>\n",true);?></strong> 
										<?php echo "&nbsp;&nbsp;".$alert_sent_by."&nbsp;&nbsp;".$alert_sent_date;?>
									</a>
									<div class="content">
										<div class="grid fluid">
											<?php 
											// if(sizeof($alert_images)>0) 
											{?>
												<div class="row no-margin">
													<div class="span12">
														<div class="bottom flexslider">
														<ul class="slides">
														<?php 
														foreach($alert_images as $val_img) {?>
															<?php 
															if( file_exists(FCPATH.$this->path_upload_alerts.$val_img) ) {?>
																<li><img src="<?php echo $base.$this->path_upload_alerts.$val_img;?>"></li>
																<?php 
															}
														}?>
														</ul>
														</div>
													</div>
												</div>
												<?php 
											}
											
											if( $alert_video ) {?>
												<div class="row no-margin">
													<div class="span12">
													   <div class="bottom flexslider">
														<ul class="slides">
															<li><iframe style="width:200px;height:160px;" frameborder="0" allowfullscreen="0" src="<?php echo "https://youtube.com/embed/".$alert_video;?>?wmode=transparent&showinfo=0&rel=0"></iframe>
															</li>
														</ul>
														</div>
													</div>
												</div><br>
												<?php 
											}
											if($alert_summary || $alert_locations || $alert_legal_requirements || $alert_precautions) {?>
                                            <div class="row no-margin">
												<div class="span12">
													<div class="balloon bottom">
														<?php 
														if($alert_summary) {?>
															<div class="padding10"><label><b>Summary</b></label><strong><?php echo $alert_summary;?></strong></div>
															<?php 
														}
														if($alert_locations) {?>
															<div class="padding10"><label><b>Locations</b></label><strong><?php echo $alert_locations;?></strong></div>
															<?php 
														}
														if($alert_legal_requirements) {?>
															<div class="padding10"><label><b>Legal Requirements</b></label><strong><?php echo $alert_legal_requirements;?></strong></div>
															<?php 
														}
														if($alert_precautions) {?>
															<div class="padding10"><label><b>Precautions</b></label><strong><?php echo $alert_precautions;?></strong></div>
															<?php
														}?>
													</div>
												</div>
                                            </div>
											<?php
											}?>
										</div>
									</div>
								</div>
								<?php
							}?>
                            </div>
						</div>
					</div>
					</div>
					<div class="modal-footer">
						<button onclick="javascript:window.location.href='<?php echo $base.'admin/hazard_alerts?id='.$this->sess_userid;?>';" class="pull-left bg-red fg-white" title="My Hazard Alerts"><strong>See All</strong></button>
						<button class="btn" data-dismiss="modal">Close</button>
					</div>
				</div>
        </div>
        
	</div>
<!--END OF CODE FOR METRO STYLE-->


<?php $this->load->view('footer_admin');?>

<script type="text/javascript">
	$(function() {
		$('#modal_alerts').on('hidden.bs.modal', function () {
			$("#modal_alerts iframe").attr("src", $("#modal_alerts iframe").attr("src"));
		});
	});
	$("#modal_alerts .btn-close,.icon-cancel-2").click(function() {
		$("#modal_alerts iframe").attr("src", $("#myModal iframe").attr("src"));
	});
	$('.carousel').carousel({ interval: 4000; });
</script>