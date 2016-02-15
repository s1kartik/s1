<?php $this->load->view('header_admin');?>
<div class="homebg metro ">
	<!--BEGIN PAGE TITLE-->
		<div class="container-fluid">
			<div class="main-content padding-metro-header subheader-secondary clearfix fg-grayLighter">
			<em class="margin20">ABOUT ME</em>
			</div>
		</div>
	<!--END PAGE TITLE-->
	<div class="container-fluid">
		<div class="main-content padding-metro-home clearfix">
			<!--START CODE FOR METRO STYLE-->
				<!-------BEGIN FIRST ROW OF TILES------>
					<div class="tile-group no-margin no-padding clearfix span3" >                    
						<!--begin tiles menus left side general page -->
						<?php $this->load->view('profile_view_tiles_menu_left');?>
						<!--end tile menus left side general page-->
					</div>
				<!-------END FIRST ROW OF TILES------> 
				
				<!-- BEGIN SECOND COLUMN FIRST ROW -->
					<div class="tile-group no-margin no-padding clearfix span7" > 
						<!--begin text information paragraphs -->
							<div class="tile quadro marcio-profile triple-vertical ol-transparent bg-white" >
								<div class="tile-content">
									<div class="panel no-border">
										<!-- Begin TILE CONTENT -->                                                      
											<div class="charities-container" style="padding:0px 0px 0px 0px;box-shadow: none;">
												<!--begin tab control-->
													<ul class="nav nav-tabs ">
														<?php 
														$type = $this->session->userdata("usertype");
														$active = "active";
														if($type>1) {
                                                            if($type==8 || $type==7) {?>
																<li class="profile  <?php echo $active;?>"><a href="#myworker" data-toggle="tab">My Worker</a></li>
																<?php 
																$active = "";	
															}?>
															<li class="profile <?php echo $active;?>"><a href="#personal" data-toggle="tab">Personal</a></li>
															<li class="profile "><a href="#professional" data-toggle="tab">Professional</a></li>
															<?php 
														}
														else {?>
															<li class="profile "><a href="#admin" data-toggle="tab">Administrator</a></li>
															<?php 
														}?>
													</ul>
													<div class="tab-content pre-scrollable">
														<?php 
														switch($type) {
															case 1: {//administrator
																?><!--begin Administrator tile content-->
																<div class="tab-pane fade in active" id="admin">
																	<a href="<?php echo $base;?>admin/metadata?type=administrator">Administrator</a>
																</div>
																<!--end Administrator tile content-->
																<?php	
																break;
															}
															case 7: {//Union
																?>
																<!--begin Union tile content-->
																<!--begin My Worker tab-->
																	<div class="tab-pane fade  in active " id="myworker">
																		<div class="document-content" >
																		<?php $this->load->view('profile_employer_myworker_metro');?>
																		</div>
																	</div>
																<!--end My Worker tab-->
																<!--begin Personal tab-->
																	<div class="tab-pane fade" id="personal">
																		<div class="document-content">
																		<?php $this->load->view('profile_union_personal_metro');?>
																		</div>															
																	</div>
																<!--end Personal tab-->
																<!--begin Professional tab-->
																	<div class="tab-pane fade " id="professional">
																		<div class="document-content">
																		<?php $this->load->view('profile_union_professional_metro');?>
																		</div>
																	</div>
																<!--end Professional tab-->
																<!--end Administrator tile content-->
																<?php 
																break;
															}
															case 8: {//Employer
																?>
																<!--begin Employer tile content-->
																<!--begin My Worker tab-->
																	<div class="tab-pane fade  in active " id="myworker">
																		<div class="document-content" >
																		<?php $this->load->view('profile_employer_myworker_metro');?>
																		</div>
																	</div>
																<!--end My Worker tab-->
																<!--begin Personal tab-->
																	<div class="tab-pane fade" id="personal">
																		<div class="document-content">
																		<?php $this->load->view('profile_employer_personal_metro');?>
																		</div>
																	</div>
																<!--end Personal tab-->
																<!--begin Professional tab-->
																	<div class="tab-pane fade " id="professional">
																		<div class="document-content" >
																		<?php $this->load->view('profile_employer_professional_metro');?>
																		</div>
																	</div>
																<!--end Professional tab-->																	
																<!--end Employer tile content-->
																<?php 
																break;
															}
															case 9: {//Worker?> 
																<!--begin Worker tile content-->
																<!--begin Personal tab-->
																	<div class="tab-pane fade in active" id="personal">
																		<div class="document-content" >
																		<?php $this->load->view('profile_worker_personal_metro');?>
																		</div>
																	</div>
																<!--end Personal tab-->
																<!--begin Professional tab-->
																	<div class="tab-pane fade" id="professional">
																		<div class="document-content" >
																		<?php $this->load->view('profile_worker_professional_metro');?>
																		</div>
																	</div>
																<!--end Professional tab-->
																<!--end Worker tile content-->
																<?php 
																break;
															}
															case 11: {// Student?>
																<!--begin Student tile content-->
																<!--begin Personal tab-->
																	<div class="tab-pane fade in active" id="personal">
																		<div class="document-content" >
																		<?php $this->load->view('profile_student_personal_metro');?>
																		</div>
																	</div>
																<!--end Personal tab-->
																<!--begin Professional tab-->
																	<div class="tab-pane fade" id="professional">
																		<div class="document-content" >
																		<?php $this->load->view('profile_student_professional_metro');?>
																		</div>
																	</div>
																<!--end Professional tab-->
																<!--end Student tile content-->
																<?php 
																break;
															}
														}?>
													</div>
												<!--end tab control-->    
											</div>  
										<!-- End TILE CONTENT -->
									</div>
								</div>
							</div>
						<!--end text information paragraphs--> 
					</div>
				<!-- END SECOND COLUMN FIRST ROW -->
				
				<!-------BEGIN THIRD COLUMN FIRST ROW OF TILES------>
					<div class="tile-group no-margin no-padding clearfix span2" >                    
						<!--begin right tile-->
							<?php $this->load->view('connection_tile');?>
						<!--end right tile--> 
					</div>
				<!-------END  THIRD COLUMN FIRST ROW OF TILES------> 
		</div>
	</div>
</div>
<!--END OF CODE FOR METRO STYLE-->

<!---BEGIN SCRIPTS FOR CONNECTIONS-->
<script type="text/javascript">
	$(document).ready(function () {
		$('.profile-user').droppable({
		  drop: function( event, ui ) {
			$.post('<?php echo $base;?>admin/connectRequest', {'id':ui.draggable.attr('rel'), 'from-id':<?php echo $this->session->userdata("userid");?>}, function(data){
				$('#btn'+ui.draggable.attr('rel')).removeClass('btn-danger btn-not-linked').addClass('btn-warning').html('requested');
			});
		  }
		});
	});
</script>
<!---END SCRIPTS FOR CONNECTIONS-->
<?php $this->load->view('footer_admin');?>