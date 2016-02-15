<?php $this->load->view('header_admin');?>
<style>.flexslider .slides img {width: 220px; height: 180px; display: block;}</style>
	<div class="homebg metro ">
		<!--BEGIN PAGE TITLE-->
		<div class="container-fluid">
			<div class="main-content padding-metro-header subheader-secondary clearfix fg-grayLighter"><em class="margin20">MY HAZARD ALERTS</em></div>
		</div>
		<!--END PAGE TITLE-->

		<div class="container-fluid ">
			<div class="main-content hazard-alert-container padding-metro-home  clearfix"> 
				<!--START CODE FOR METRO STYLE-->
					<!-------BEGIN FIRST ROW OF TILES------>
				
				<div class="container"><div id="row-filter"><div class="profile-content-filter"><?php $this->load->view('hazard_alert_filter');?></div></div></div>
				
				<div class="tile-group six no-margin no-padding clearfix " > 
					<!-- Begin TILE CONTENT -->                                                      
						<div class="tile-content" >
							<!--begin tab control-->
								<div class="tab-content">
									<?php 
									// common::pr($users_alerts);
									if( $total_users_alerts ) {
										foreach( $users_alerts AS $val_alerts ) {
											$alert_id			= (isset($val_alerts->id)&&$val_alerts->id) ? $val_alerts->id : '';
											$has_selected_byuser= $this->points->hasUserGotPointsOfPageSection( $this->sess_userid, $alert_id, 12);
											$has_selected_byuser= isset($has_selected_byuser['has_points']) ? $has_selected_byuser['has_points'] : "";
											$cls_alert_read 	= (!$has_selected_byuser) ? "bg-red" : "bg-gray";
											
											$id_alert_sent_by	= (isset($val_alerts->in_alert_sent_by)&&$val_alerts->in_alert_sent_by) ? $val_alerts->in_alert_sent_by : '12';
											$alert_sent_by		= (isset($val_alerts->username_alert_sentby)&&$val_alerts->username_alert_sentby) ? $val_alerts->username_alert_sentby : '';
											$usertype_alert_sentby		= (isset($val_alerts->usertype_alert_sentby)&&$val_alerts->usertype_alert_sentby) ? $val_alerts->usertype_alert_sentby : '';
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
											$alert_sentby_image 		= (isset($val_alerts->alert_sentby_image) && $val_alerts->alert_sentby_image) ? $val_alerts->alert_sentby_image : '';
											?>
											<div class="tile double cls-div-<?php echo $alert_id;?> <?php echo $cls_alert_read;?> live">
												<div class="tile-content email">
													<div class="email-image">
														<a href='#modal_worker_id_card' data-toggle='modal' onclick="javascript:ajaxMyIDCard('<?php echo $id_alert_sent_by;?>');" data-toggle='modal' >
														<?php 
														if( file_exists(FCPATH.$this->path_upload_profiles.$alert_sentby_image) ) {?>
															<img src="<?php echo $base.$this->path_upload_profiles.$alert_sentby_image;?>" class="w100" />
															<?php
														}
														else {?>
															<img class="w100" src="<?php echo $base;?>img/default.png" />
															<?php
														}?>
														</a>
													</div>
													<div class="email-data">
														<a href="#" alert_id="<?php echo $alert_id;?>" id="id_alert_title<?php echo $alert_id;?>" data-toggle='modal'>
														<span class="email-data-subtitle"><b><?php echo $alert_title;?></b></span></a>
														<a href="#" alert_id="<?php echo $alert_id;?>" id="id_alert_sentby<?php echo $alert_id;?>" data-toggle='modal'>
														<span class="email-data-subtitle "><?php echo $alert_sent_by;?></span></a>
														<a href="#" alert_id="<?php echo $alert_id;?>" id="id_alert_usertypesentby<?php echo $alert_id;?>" data-toggle='modal'>
														<span class="email-data-text"><?php echo $usertype_alert_sentby;?></span></a>
													</div>
													<a href="#" alert_id="<?php echo $alert_id;?>" id="id_alert_sentdate<?php echo $alert_id;?>" data-toggle='modal'>
													<div class="brand text-right" style="padding-right:10px;"><?php echo $alert_sent_date;?></div></a>
												</div>
											</div>
											<input type="hidden" name="hidn_sel_user" id="hidn_sel_user">

											<script type="text/javascript">
												$("#id_alert_title<?php echo $alert_id;?>, #id_alert_sentby<?php echo $alert_id;?>, #id_alert_usertypesentby<?php echo $alert_id;?>, #id_alert_sentdate<?php echo $alert_id;?>").click(function() {
													var alert_id = $(this).attr('alert_id');
													$.ajax({
														url: js_base_path+'ajax/ajax_section_read', 
														type: 'post', 
														data: {'userId': '<?php echo $this->sess_userid;?>', 'alertId':alert_id },
														success: function(output) {
															if( output.trim() == "" ) {
																$(".cls-div-"+alert_id).addClass("bg-gray");
															}
															$("#modal_alerts"+alert_id).modal("show");															
														},
														error: function(errMsg) {
															alert( errMsg.responseText );
															return false;
														}
													});
												});
											</script>
											<div id="modal_alerts<?php echo $alert_id;?>" class="modal hide fade bg-dark w900" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
												<div class="modal-header bg-red">
													<h3 id="myModalLabel">
													<img src="<?php echo $base."img/library/hazards.png";?>" width="30" height="25">
													<strong><?php echo wordwrap($alert_title, 50, "<br>\n",true);?></strong>
													<i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal"></i></h3>
												</div>
												<div class="modal-body">
												<div class="charities-container" style="padding:0px 0px 0px 0px;box-shadow: none;">
													<div class="tile-content">
														<div class="accordion-frame span6">
															<a class="heading bg-red fg-white" href="#"><?php echo "&nbsp;&nbsp;".$alert_sent_by."&nbsp;&nbsp;".$alert_sent_date."<br><br>";?></a>
															<div class="content">
																<div class="">
																	<?php 
																	if(sizeof($alert_images)>0) {?>
																		<div class="flexslider">
																		<ul class="slides">
																		<?php 
																		foreach($alert_images as $val_img) {?>
																			<?php 
																			if( isset($val_img) && file_exists(FCPATH.$this->path_upload_alerts.$val_img) )
																			{?>
																				<li><img src="<?php echo $base.$this->path_upload_alerts.$val_img;?>"></li>
																				<li><img src="<?php echo $base.$this->path_upload_alerts;?>"></li>
																				<?php 
																			}
																		}?>
																		</ul>
																		</div>
																		<?php 
																	}
																	else {
																		echo "No Image(s) available";
																	}
																	?>
																</div>
																</div>
																<div class="content">
																<div class="grid fluid">
																	<?php 
																	if( $alert_video ) {?>
																		<div class="row no-margin">
																			<div class="span12">
																			   <div class="bottom flexslider">
																				<ul class="slides">
																					<li><iframe style="width:200px;height:160px;" frameborder="0" allowfullscreen="0" src="<?php echo "https://youtube.com/embed/".$alert_video;?>?wmode=transparent&showinfo=0&rel=0"></iframe>
																					
																					<!--<a class="fancybox fancybox.iframe" href="<?php echo "https://youtube.com/embed/".$alert_video;?>?autoplay=1">
																						<img src="<?php echo $base."img/dark_wall.png";?>">
																					</a>-->
																					</li>
																				</ul>
																				</div>
																			</div>
																		</div><br>
																		<?php 
																	}
																	else {
																		echo "No Video(s) available";
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
													</div>
												</div>
												</div>
												<div class="modal-footer"><button class="btn" data-dismiss="modal">Close</button></div>
											</div>
				
				
											<?php 
										}
									}
									else {
											echo "<h5>No Hazards Alerts.</h5>";
									}
									?>
									</div>
									<?php
									if( $total_users_alerts > 9 ) {
										// Pagination //
											$total_hazard_alerts = ceil( $total_users_alerts/9 );
											echo '<div class="pagination small opacity pull-right">'; 
											$this->common->getS1Pagination($this->router->fetch_method()."?1", $total_hazard_alerts, $pgno_alerts, 9, 10);
											echo '</div>';
									}
									?>

								<div id="modal_worker_id_card" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									<div class="modal-header bg-red">
										<h3 id="myModalLabel">PROFILE ID CARD<i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal"></i></h3>
									</div>
									<div class="modal-body"><div class="charities-container cls_myidcard" style="padding:0px 0px 0px 0px;box-shadow: none;"></div></div>
									<div class="modal-footer">
										<button style="display:none;" rel="" class="btn cls-btn-accept">Accept</button>                                                
										<button class="btn" data-dismiss="modal">Close</button>
									</div>
								</div>
							<!--end tab control-->    
						</div>
					<!-- End TILE CONTENT -->
				</div>
                <!-------END FIRST ROW OF TILES------> 
				<!-- begin SECOND COLUMN FIRST ROW -->
                <!--<div class="tile-group two no-margin no-padding clearfix div-messages">
							<div class="tile double profile-content-box tab-content">
            <img src="< ?php echo $base;?>img/ad/hazardalerts/ad1.png">
            </div>
            <div class="tile double profile-content-box tab-content">
            <img src="< ?php echo $base;?>img/ad/hazardalerts/ad2.png">
            </div>
            <div class="tile double profile-content-box tab-content">
            <img src="< ?php echo $base;?>img/ad/hazardalerts/ad3.png">
            </div>                  </div> -->
                <!-- END SECOND COLUMN FIRST ROW -->
			</div>
		</div>
	</div>
<!--END OF CODE FOR METRO STYLE-->

<?php $this->load->view('footer_admin');?>
<script type="text/javascript">
	$(window).load(function() {
		$('.flexslider').flexslider({
			controlNav: false,
			// prevText:"",
			// nextText:"",
			// animation: "slide",
			// itemWidth: 1,
			minItems: 2,
			maxItems: 3,
			move: 2,
			// animationLoop: false,
			reverse: false,
			slideshow: false
		});
	});
	function ajaxMyIDCard(userId, iconClass, connectStatus)
	{	
		$("#hidn_sel_user").val(userId);
		$.ajax({
			url: '<?php echo $base;?>ajax/ajaxMyIDCard', 
			type: 'post', 
			data: {'userId': userId, 'connectStatus':connectStatus },
			success: function(output) {
				$(".cls_myidcard").html(output);
			},
			error: function(errMsg) {
				alert( errMsg.responseText );
				return false;
			}
		});
	}
</script>