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
<script type="text/javascript" src="<?php echo $base;?>js/metro/metro.min.js"></script>
<div class="homebg metro profile-view">
	<!--BEGIN PAGE TITLE-->
    <div class="container">
        <div class="main-content padding-metro-header subheader-secondary clearfix fg-grayLighter">
        <em class="margin20">PROFILE SETTINGS&nbsp;&nbsp;
        	<a href="#info_profile_settings_student_modal" data-toggle='modal'><span class="icon-info-2 s1_info fg-white"></span></a>
        </em> 
        </div>
    </div>
    <!-- Start INFO Modal --> 
    <?php // Modal: INFO//
	$this->load->view('info/profile_settings_student_modal');?>	
    <!-- End INFO Modal -->
    <!--END PAGE TITLE-->
    <div class="container">
        <div class="main-content padding-metro-home clearfix"> 
        <!--START CODE FOR METRO STYLE-->  
        <div class="profileCon clearfix">        
        <div class="tile-group three no-margin no-padding popOuter" >
        <!-------BEGIN FIRST ROW FIRST COLUMN OF TILES------>              
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
			<!--begin my professional tile -->
				<a class="tile bg-black" href="#modal_professional" onclick="javascript:ajaxProfileDetails('professional');" data-toggle='modal'>
					<div class="tile-content icon"><span class="icon"><img src="<?php echo $base;?>img/myprofile/professional.png"></span></div>
					<div class="brand"><div class="label">My Professional</div></div>
				</a>
			<!--end my professional  tile-->

			<!--begin my personal tile -->
				<a class="tile bg-black" href="#modal_personal" onclick="javascript:ajaxProfileDetails('personal');" data-toggle='modal'>
					<div class="tile-content icon"><span class="icon"><img src="<?php echo $base;?>img/myprofile/personal.png"></span></div>
					<div class="brand"><div class="label">My Personal</div></div>
				</a>
			<!--end  my personal  tile-->
			
			<!--begin my points tile -->
				<a class="tile bg-black" href='<?php echo $base."admin/my_wallet";?>' >
					<div class="tile-content icon"><span class="icon"><img src="<?php echo $base;?>img/myprofile/credits.png"></span></div>
					<div class="brand"><div class="label">My Wallet</div></div>
				</a>
			<!--end  my points  tile-->
			<?php $url_myworker = ("8"==$this->sess_usertype||"7"==$this->sess_usertype||"12"==$this->sess_usertype) ? $base."admin/myworkers_metro" : '#';?>
			<!--begin my workers tile -->
				<a class="tile bg-black" href="<?php echo $url_myworker;?>">
					<div class="tile-content icon"><span class="icon"><img src="<?php echo $base;?>img/myprofile/workers.png"></span></div>
					<div class="brand"><div class="label">My Workers</div></div>
				</a>
			<!--end  my workers tile-->

			<!--begin connections tile -->
				<a class="tile bg-black" href="<?php echo $base."admin/connections_metro";?>">
					<div class="tile-content icon">
					<?php 
					$newmessages = $this->users->newMessageCount($user['email_addr'], 'connection request');
					if($newmessages>0) {?>
						<div class="badge bg-red pull-right"><?php echo $newmessages;?></div>
						<?php 
					}?>
					<span class="icon"><img src="<?php echo $base;?>img/myprofile/connections.png"></span></div>
					<div class="brand"><div class="label">Connections</div></div>
				</a>
			<!--end connections tile-->

			<!--begin my points tile -->
				<?php $url_my_data = ($this->sess_usertype==9 || $this->sess_usertype==8) ? $base."admin/my_data_collection" : '#';?>
				<a class="tile bg-black" href="<?php echo $url_my_data;?>">
					<div class="tile-content icon"><span class="icon"><img src="<?php echo $base;?>img/myprofile/my_data.png"></span></div>
					<div class="brand"><div class="label">My Data</div></div>
				</a>
				<?php /*($this->sess_usertype=='9' || $this->sess_usertype=='8') ? $this->load->view('my_data') : ''*/;?>
			<!--end  my points  tile-->

			<!--begin terms tile -->
				<a class="tile bg-black" href='<?php echo $base."admin/badges";?>' data-toggle='modal'>
					<div class="tile-content icon"><span class="icon"><img src="<?php echo $base;?>img/myprofile/badges.png"></span></div>
					<div class="brand"><div class="label">D.R.O.T</div></div>
				</a>
			<!--end  Terms tile-->
			
			<!--begin privacy policy tile -->
				<?php 
				if( "8" == $this->sess_usertype || "9" == $this->sess_usertype ) {
					$href_union = "modal_my_union";
				}
				else {
					$href_union = "";
				}?>
				<a class="tile bg-black" href='#<?php echo $href_union;?>' data-toggle='modal'>
					<div class="tile-content icon"><span class="icon"><img src="<?php echo $base;?>img/myprofile/union.png"></span></div>
					<div class="brand"><div class="label">My Union</div></div>
				</a>
				
			<!--end  Privacy Policy tile-->
		</div>
		
		
        <div class="tile-group two no-margin no-padding" >
			<!--begin Rewards Code tile -->
				<a class="tile double bg-darkCobalt" href="<?php echo $base;?>admin/reward" >
					<div class="tile-content image-set">
						<img src="<?php echo $base;?>img/reward/rewards.png">
						<img src="<?php echo $base;?>img/reward/reward1.png">
						<img src="<?php echo $base;?>img/reward/reward2.png">
						<img src="<?php echo $base;?>img/reward/reward3.png">
						<img src="<?php echo $base;?>img/reward/reward4.png">
					</div>
					<div class="brand">
						<?php 
						$points_level 	= $this->users->getMetaDataList('users_points_level', 'in_user_id="'.$this->sess_userid.'"', '', 'in_points_level');
						$label_points_level 	= (isset($points_level[0]['in_points_level']) && $points_level[0]['in_points_level']==2) ? 'L2' : '';
						if( $label_points_level ) {?>
							<div class="badge bg-black"><?php echo "<b>".$label_points_level."</b>";?></div>
							<?php
						}?>
						<span class="label fg-white"><strong>REWARDS</strong></span>
					</div>
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
						else {?><img class="w100" src="<?php echo $base;?>img/default.png" /><?php }?>

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

        <div class="tile-group three no-margin no-padding" >
			<!--begin Charities tile -->
				<a class="tile bg-black" data-click="transform" href='#modal_charities' data-toggle='modal'>
					<div class="tile-content icon"><span class="icon"><img src="<?php echo $base;?>img/myprofile/charities.png"></span></div>
					<div class="brand"><div class="label">Charities</div></div>
				</a>
				
			<!--end Charities tile-->
			<!--begin mKnow Your Rights tile -->
				<a class="tile bg-black" href='#modal_know_your_rights' data-toggle='modal'>
					<div class="tile-content icon"><span class="icon"><img src="<?php echo $base;?>img/myprofile/know_your_rights.png"></span></div>
					<div class="brand"><div class="label">Know Your Rights</div></div>
				</a>
                
			<!--end Know Your Rights  tile-->
			<!--begin Digital Hazards tile -->
			<a class="tile bg-black" href="<?php echo $base."admin/hazard";?>">
				<div class="tile-content icon"><span class="icon"><img src="<?php echo $base;?>img/myprofile/digitalhazards.png"></span></div>
				<div class="brand"><div class="label">Digital Hazards</div></div>
			</a>
			<!--end  Digital Hazards  tile-->
			<!--begin Young Workers tile -->
			<a class="tile bg-black" href='#modal_young_workers' data-toggle='modal'>
				<div class="tile-content icon"><span class="icon"><img src="<?php echo $base;?>img/general/young_workers.png"></span></div>
				<div class="brand"><div class="label">Young Workers</div></div>
			</a>
            
			<!--end  Young Workers  tile-->
			<!--begin Skilled Job Section tile -->
			<a class="tile bg-black" href="<?php echo $base."admin/skilledjob_main";?>">
				<div class="tile-content icon"><span class="icon"><img src="<?php echo $base;?>img/general/skill_job_section.png"></span></div>
				<div class="brand"><div class="label">Skilled Job Section</div></div>
			</a>
			<!--end  Skilled Job Section tile-->
			<!--begin Safety Equipment tile -->
			<a class="tile bg-black" href="<?php echo $base."admin/construction";?>">
				<div class="tile-content icon"><span class="icon"><img src="<?php echo $base;?>img/profile-home/safety_equipment.png"></span></div>
				<div class="brand"><div class="label">Safety Equipment</div></div>
			</a>
			<!--end  Safety Equipment tile-->
			<!--begin Ontario Health &amp; Safety Network  tile -->
			<a class="tile bg-black" href="#modal_hsnetwork" data-toggle='modal'>
				<div class="tile-content icon"><span class="icon"><img src="<?php echo $base;?>img/general/health_and_safety_network.png"></span></div>
				<div class="brand"><div class="label">Ontario Health &amp; <br>Safety Network</div></div>
			</a>
            
			<!--end  Ontario Health &amp; Safety Network tile-->
			<!--begin About us  tile -->
			<a class="tile bg-black" href='#modal_about_us' data-toggle='modal'>
				<div class="tile-content icon"><span class="icon"><img src="<?php echo $base;?>img/general/about_us.png"></span></div>
				<div class="brand"><div class="label">About us</div></div>
			</a>
            
			<!--end  About us tile-->
			<!--begin Fatality Breakdown tile -->
			<a class="tile bg-black" href="<?php echo $base."admin/fatality_metro";?>">
				<div class="tile-content icon"><span class="icon"><img src="<?php echo $base;?>img/profile-home/fatality_breakdown.png"></span></div>
				<div class="brand"><div class="label">Fatality <br>Breakdown</div></div>
			</a>
			<!--end  Fatality Breakdown tile-->
        </div>
        </div>
    </div>
    </div>
     <div class="model-data-container">
        <div id="modal_professional" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-header bg-red"><h3 id="myModalLabel">My Professional<i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal"></i></h3></div>
            <div class="modal-body"><div class="charities-container cls_professional" style="padding:0px 0px 0px 0px;box-shadow: none;"></div></div>
            <div class="modal-footer"><button class="btn" data-dismiss="modal">Close</button></div>
        </div>
        <div id="modal_personal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-header bg-red"><h3 id="myModalLabel">My Personal<i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal"></i></h3></div>
            <div class="modal-body"><div class="charities-container cls_personal" style="padding:0px 0px 0px 0px;box-shadow: none;"></div></div>
            <div class="modal-footer"><button class="btn" data-dismiss="modal">Close</button></div>
        </div>
        
           <!--  red tile popup my alerts -->
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
											if(sizeof($alert_images)>0) {?>
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
              <!--  red tile popup my alerts -->
        
        <!--  profile pic popup my alerts -->
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
       <!--  profile pic popup my alerts -->
       
       <!--  my union model -->  
       <div id="modal_my_union" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					<div class="modal-header bg-red"><h3 id="myModalLabel">My Unions<i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal"></i></h3></div>
					<div class="modal-body">
					<div class="charities-container cls_my_union" style="padding:0px 0px 0px 0px;box-shadow: none;">
						<form class="form-horizontal adminfrm" method="post" action="<?php echo $base;?>admin/profile_setting?section=professional" enctype="multipart/form-data">
							<div id="union_group">
								<?php 
								$my_unions = $this->users->getMetaDataList( 'user_unions', 'in_user_id="'.$this->sess_userid.'"', '', '*' );
								$val_union = isset($my_unions[0]) ? $my_unions[0] : '';
								// common::pr($val_union);
								
								$unions = $this->users->getUnions();
								$industries = $this->users->getMetaDataList('industry', 'date_start<=CURDATE() AND (date_end="" OR date_end>CURDATE())');
								if( "9" == $this->sess_usertype ) {?>
									<input type="hidden" name="deleted_union" id="deleted_union" value="" />
									<?php 
										$cnt_myunion 	= 1;
										$user_union_id 	= isset($val_union['in_user_union_id']) ? $val_union['in_user_union_id'] : '';
										$union_id 		= isset($val_union['in_union_id']) ? $val_union['in_union_id'] : '';
										$union_number 		= isset($val_union['st_union_number']) ? $val_union['st_union_number'] : '';
										$union_industry = isset($val_union['in_industry_id']) ? $val_union['in_industry_id'] : '';
										$union_sector 	= isset($val_union['in_sector_id']) ? $val_union['in_sector_id'] : '';
										$union_trade 	= isset($val_union['in_trade_id']) ? $val_union['in_trade_id'] : '';?>
										<br>
										<div id="union_list<?php echo $cnt_myunion;?> myunion_list">
											<div class="control-group">
											  <label class="control-label" for="union[]">Union</label>
											  <div class="controls">
											  <?php 
											  if( isset($unions) && sizeof($unions) ) {?>
												<select id="union<?php echo $cnt_myunion;?>" name="union[new][]" class="input-xlarge">
													<option value="">select</option>
													<?php 
													foreach($unions as $em) {
														$selected = ($union_id==$em['user_id'])?'selected="selected"':'';?>
														<option value="<?php echo $em['user_id'];?>" <?php echo $selected;?>><?php echo $em['meta_value'];?></option>
														<?php 
													}?>
												</select>
												<?php 
											  }?>
											  </div>
											</div>
											<div class="control-group">
											  <label class="control-label" for="union_number">Union Name</label>
											  <div class="controls">
												<input type="text" name="union_number[new][]" id="union_number<?php echo $cnt_myunion;?>" placeholder="Union" class="input-xlarge" value="<?php echo $union_number;?>" />
											  </div>
											</div>
											<div class="control-group">
											  <label class="control-label" for="industry_id[]">Industry</label>
											  <div class="controls">
												<select  id="industry_id<?php echo $cnt_myunion;?>" name="industry_id[new][]" onchange="javascript:getSectors('<?php echo $cnt_myunion;?>');" class="input-xlarge">
													<option value="">-select-</option>
													<?php 
													foreach($industries as $in):
														$selected = ($union_industry==$in['id'])?'selected="selected"':'';?>
														<option value="<?php echo $in['id'];?>" <?php echo $selected;?>><?php echo $in['industryname'];?></option>
													<?php endforeach;?>
												</select>
											  </div>
											</div>

											<div class="control-group">
											  <label class="control-label" for="section_id[]">Sector</label>
											  <div class="controls">
													<select id="section_id<?php echo $cnt_myunion;?>" name="section_id[new][]" onchange="javascript:getTrades('<?php echo $cnt_myunion;?>');" class="input-xlarge">
														<option value="17">ALL</option>
														<?php 
														if((int)$union_industry>0){
															$sections = $this->users->getRelatedElement('tbl_section', 'industry_id', $union_industry);
															foreach($sections as $sc):
																$selected = ($union_sector==$sc['id'])?'selected="selected"':'';?>
																<option value="<?php echo $sc['id'];?>" <?php echo $selected;?>><?php echo $sc['sectionname'];?></option>
															<?php endforeach;
														}?>
													</select>
											  </div>
											</div>
											
											<div class="control-group">
											  <label class="control-label" for="trade_id">Trade</label>
											  <div class="controls">
												<select id="trade_id<?php echo $cnt_myunion;?>" name="trade_id[new][]" class="trade_id" class="input-xlarge">
													<option value="33">ALL</option>
													<?php 
													if((int)$union_industry>0 && (int)$union_sector>0){
														$trades = $this->users->getRelatedElementTwo('tbl_section2trade_view', 'industry_id', $union_industry, 'section_id', $union_sector);
														foreach($trades as $td) {
															$selected = ($union_trade==$td['trade_id'])?'selected="selected"':'';?>
															<option value="<?php echo $td['trade_id'];?>" <?php echo $selected;?>><?php echo $td['tradename'];?></option>
															<?php
														}
													}?>
												</select>
											  </div>
											</div>
										</div>
										<input type="hidden" name="user_union_id[new][]" value="<?php echo $user_union_id;?>">
										<span></span>
										<?php 
								}
								else if( "8" == $this->sess_usertype ) {
									$my_unions = $this->users->getMetaDataList( 'user_unions', 'in_user_id="'.$this->sess_userid.'"', '', '*' );
									$sizeof_my_unions = sizeof($my_unions);
									
									$unions = $this->users->getUnions();
									$industries = $this->users->getMetaDataList('industry', 'date_start<=CURDATE() AND (date_end="" OR date_end>CURDATE())');
									foreach( $my_unions AS $key_union => $val_union ) {
										$cnt_myunion 	= ($key_union+1);
										$user_union_id 	= isset($val_union['in_user_union_id']) ? $val_union['in_user_union_id'] : '';
										$union_id 		= isset($val_union['in_union_id']) ? $val_union['in_union_id'] : '';
										$union_industry = isset($val_union['in_industry_id']) ? $val_union['in_industry_id'] : '';
										$union_sector 	= isset($val_union['in_sector_id']) ? $val_union['in_sector_id'] : '';?>
										<br>
										<div id="union_list<?php echo $cnt_myunion;?> myunion_list">
											<a style="float:right;" href="javascript:void(0);" onclick="javascript:deleteS1Module('<?php echo $user_union_id;?>', 'myunion');" title="Remove"><i class="icon-minus-2"></i></a>

											<div class="control-group">
											  <label class="control-label" for="union[]">Union</label>
											  <div class="controls">
											  <?php 
											  if( isset($unions) && sizeof($unions) ) {?>
												<select id="union<?php echo $cnt_myunion;?>" name="union[]" class="input-xlarge">
													<option value="">select</option>
													<?php 
													foreach($unions as $em) {
														$selected = ($union_id==$em['user_id'])?'selected="selected"':'';?>
														<option value="<?php echo $em['user_id'];?>" <?php echo $selected;?>><?php echo $em['meta_value'];?></option>
														<?php 
													}?>
												</select>
												<?php 
											  }?>
											  </div>
											</div>
											<div class="control-group">
											  <label class="control-label" for="industry_id[]">Industry</label>
											  <div class="controls">
												<select  id="industry_id<?php echo $cnt_myunion;?>" name="industry_id[]" onchange="javascript:getSectors('<?php echo $cnt_myunion;?>');" class="input-xlarge">
													<option value="">-select-</option>
													<?php 
													foreach($industries as $in):
														$selected = ($union_industry==$in['id'])?'selected="selected"':'';?>
														<option value="<?php echo $in['id'];?>" <?php echo $selected;?>><?php echo $in['industryname'];?></option>
													<?php endforeach;?>
												</select>
											  </div>
											</div>

											<div class="control-group">
											  <label class="control-label" for="section_id[]">Sector</label>
											  <div class="controls">
													<select id="section_id<?php echo $cnt_myunion;?>" name="section_id[]" onchange="javascript:getTrades('<?php echo $cnt_myunion;?>');" class="input-xlarge">
														<option value="17">ALL</option>
														<?php 
														if((int)$union_industry>0){
															$sections = $this->users->getRelatedElement('tbl_section', 'industry_id', $union_industry);
															foreach($sections as $sc):
																$selected = ($union_sector==$sc['id'])?'selected="selected"':'';?>
																<option value="<?php echo $sc['id'];?>" <?php echo $selected;?>><?php echo $sc['sectionname'];?></option>
															<?php endforeach;
														}?>
													</select>
											  </div>
											</div>
										</div>
										<input type="hidden" name="user_union_id[]" value="<?php echo $user_union_id;?>">
										<span></span>
										<?php 
									}
								}?>
							</div>
							<?php 
							if( $section_allowed ) {?>
								<!--Added by Marcio on 17Feb2015 <div class="row-fluid"><label data-click="transform" onclick="" title="Add"> <i class="icon-plus-2"></i> ADD MORE (MAX OF 10)*** this is just for employers, workers should have only one Union.(Kartik remove this comment after ***)</label></div>-->
								<div class="row-fluid"><label data-click="transform" onclick="javascript: addMoreUnion(1);" title="Add"><i class="icon-plus-2"></i> ADD MORE (MAX OF 10)</label></div>
								<?php
							}?>
							<div class="inline text-center">
								<button class="btn btn-primary">Save</button>
								<button type="button" class="btn btn-danger" onclick="javascript:window.location.href='<?php echo $base.'admin/profile_view_integrated';?>';">Cancel</button>
								<input type="hidden" name="page" value="professional">
								<input type="hidden" name="page_design" value="metro">
							</div>
						</form>
                    </div>
					</div>
					<div class="modal-footer"><button class="btn" data-dismiss="modal">Close</button></div>
				</div>
       <!--  my union model -->  
        
        <?php //$this->load->view('frontend/modal_charities');?>
		<?php //$this->load->view('frontend/modal_know_your_rights');?>
		<?php //$this->load->view('frontend/modal_young_workers');?>
		<?php //$this->load->view('frontend/modal_health_safety_network');?>
		<?php //$this->load->view('frontend/modal_about_us');?>
        <script type="text/javascript">
			//$('#modal_professional').css({ 'max-height':'620px'});
			//$('.modal-body').css({ 'max-height':'500px' });
			//$('.document-content').css({ 'margin-bottom':'0px !important' });
		</script>
    </div>  
</div>
<!--END OF CODE FOR METRO STYLE-->
<?php $this->load->view('footer_admin');?>
<script type="text/javascript" src="<?php echo $base;?>js/regulation.js"></script>
<script type="text/javascript" src="<?php echo $base;?>js/common.js"></script>
<script type="text/javascript">
$(function() {
		$('#modal_alerts').on('hidden.bs.modal', function () {
			$("#modal_alerts iframe").attr("src", $("#modal_alerts iframe").attr("src"));
		});
	});
	$("#modal_alerts .btn-close,.icon-cancel-2").click(function() {
		$("#modal_alerts iframe").attr("src", $("#myModal iframe").attr("src"));
	});
	$usertype 			= '<?php echo $this->sess_usertype;?>';
	$sizeof_my_unions 	= '<?php echo isset($sizeof_my_unions) ? $sizeof_my_unions : '';?>';
	
	function addMoreUnion()
	{
		var s = parseInt($("div #union_group span").length);
		if( s >= 10) {
			alert("You have reached 10 unions.");
			return false;
		}
		s 	= (s+1);

		unionAppend = '<div id="union_list'+s+'" myunion_list><br>';
		if( s > 0 ) {
			unionAppend += '<a style="float:right;" href="javascript:void(0);" onclick=javascript:deleteSection("union_list'+s+'"); title="Remove"><i class="icon-minus-2"></i></a>';
		}
		unionAppend += '<div class="control-group">';
		unionAppend += '<label class="control-label" for="union">Union</label>';
		unionAppend += '<div class="controls">';
		unionAppend += '<select id="union'+s+'" name="union[new][]" class="input-xlarge"><option value="">select</option>';
		
		<?php 
		if( isset($unions) ) {
		foreach($unions as $em) {?>
			unionAppend += '<option value="<?php echo $em['user_id'];?>"><?php echo $em['meta_value'];?></option>';
			<?php 
		}
		}?>
		
		unionAppend += '</select>';
		unionAppend += '</div>';
		unionAppend += '</div>';
			
		unionAppend += '<div class="control-group">';
		unionAppend += '<label class="control-label" for="email">Industry</label>';
		unionAppend += '<div class="controls">';
		unionAppend += '<select id="industry_id'+s+'" name="industry_id[new][]" onchange="javascript:getSectors('+s+');" class="input-xlarge">';
		unionAppend += '<option value="">-select-</option>';

		<?php 
		if( isset($industries) ) {
		foreach($industries as $in) {?>
			unionAppend += '<option value="<?php echo $in['id'];?>"><?php echo $in['industryname'];?></option>';
			<?php 
		}
		}?>
		unionAppend += '</select>';
		unionAppend += '</div>';
		unionAppend += '</div>';

		unionAppend += '<div class="control-group">';
		unionAppend += '<label class="control-label" for="section_id">Sector</label>';
		unionAppend += '<div class="controls">';
		unionAppend += '<select id="section_id'+s+'" name="section_id[new][]" class="input-xlarge">';
		unionAppend += '<option value="17">ALL</option>';
		
		<?php
			if( isset($sections) ) {
			foreach($sections as $sc) {?>
				unionAppend += '<option value="<?php echo $sc['id'];?>"><?php echo $sc['sectionname'];?></option>';
				<?php 
			}
			}
			?>
		unionAppend += '</select>';
		unionAppend += '</div>';
		unionAppend += '</div><span></span>';
		unionAppend += '<input type="hidden" name="user_union_id[new][]" value="">';
		unionAppend += '</div>';

		$('#union_group').append( unionAppend );
	}
	
	function ajaxProfileDetails(profileSection) 
	{
		$.ajax({
			url: '<?php echo $base;?>ajax/ajaxProfileDetails',  
			type: 'post', 
			data: {'profileSection': profileSection },
			success: function(output) {
				$(".cls_"+profileSection).html(output);
			},
			error: function(errMsg) {
				alert( errMsg.responseText );
				return false;
			}
		});
	}

	function getSectors(cntId)
	{
		var cntId = (cntId) ? cntId : '';
		$industry_id = $("#industry_id"+cntId).val();
		$.post('<?php echo $base;?>admin/getRelatedElement', {'table': 'tbl_section', 'field': 'industry_id', 'value': $industry_id, 'field_fetch': 'sectionname'}, function(data){
			$("#section_id"+cntId).html(data);
		});
	}
	
	function getTrades(cntId)
	{
		var cntId = (cntId) ? cntId : '';
		if( $usertype == '9' ) {
			$industry_id = $('#industry_id'+cntId).val();
			$section_id = $('#section_id'+cntId).val();
			$.post('<?php echo $base;?>admin/getRelatedElementTwo', {'table': 'tbl_section2trade_view', 'field1': 'industry_id', 'value1': $industry_id, 'field2': 'section_id', 'value2': $section_id, 'field_fetch': 'tradename'}, function(data){
				$("#trade_id"+cntId).html(data);
			});
		}
	}
	
	$(document).ready(function () {
		if( $sizeof_my_unions == 0 && $usertype=='8' ) {
			addMoreUnion(1);
		}
	
		if( $usertype == '9' ) {
			if( $('#union').val() ) {
				$('#deleted_union').val( $('#union').val() );
				$('#id_div_union_number').show();
			}
			else {
				$('#union_number').val("");
				$('#id_div_union_number').hide();
			}
			$('#union').change(function(){
				if( $('#union').val() ) {
					$('#deleted_union').val( $('#union').val() );
					$('#id_div_union_number').show();
				}
				else {
					$('#union_number').val("");
					$('#id_div_union_number').hide();
				}
			});
		}
	});
</script>