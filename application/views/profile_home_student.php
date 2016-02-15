<?php $this->load->view('header_admin');
// 29Aug2014: Library functionality has been reverted for Union User //
	// $union_libtypes 	= $this->libraries->getUnionLibtypes();
	// $id_first_union_libtype 	= isset($union_libtypes[0]['id']) ? $union_libtypes[0]['id'] : '';
	// $libtype = (7!=$this->sess_usertype) ? 1 : $id_first_union_libtype;
	// $my_library_page = (7!=$this->sess_usertype) ? "mylibrary_training_metro" : "mylibrary_union_metro";

$libtype 			= 1;
$my_library_page	= "mylibrary_training_metro";
$union_url 			= ("7" == $this->sess_usertype) ? $base."admin/view_union_metro?id=".$this->sess_userid : $base.'admin/my_union_metro';
?>
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
	<div class="homebg metro profile-home">
    	<!--BEGIN PAGE TITLE-->
    <div class="container-fluid">
        <div class="main-content padding-metro-header subheader-secondary clearfix fg-grayLighter">
        <em class="margin20">HOME <a href="#info_profile_home_student_modal" data-toggle='modal'><span class="icon-info-2 s1_info fg-white"></span></a>
            </em>
        </div>
    </div>
    <!-- Start INFO Modal --> 
    <?php // Modal: INFO//
					$this->load->view('info/profile_home_student_modal');
				
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
											<div class="dashboard-content  tile quadro marcio_profile_home double-vertical ol-transparent" >
												<div class="tile-content">
													<div class="panel no-border">
														<div class="fg-white">
<!------------------BEGIN SLIDER-------------------------------------->	
<!--begin slider-->
<div id="myCarousel" class="carousel slide">
    <!-- Carousel items -->
    <div class="carousel-inner">
	    <div class="active item">
	       	<img src="<?php echo $base;?>img/profile-slider/student/banner-0.jpg" />
	    </div>
	
	    <div class="item">
	       		<img src="<?php echo $base;?>img/profile-slider/student/banner-1.jpg" />
	    </div>
	    
		<div class="item">
	    	<img src="<?php echo $base;?>img/profile-slider/student/banner-2.jpg" />
	    </div>
	    
	    <div class="item">
	    	<img src="<?php echo $base;?>img/profile-slider/student/banner-3.jpg" />
	    </div>
	    <div class="item">
	    	<img src="<?php echo $base;?>img/profile-slider/student/banner-4.jpg" />
	    </div>
	    <div class="item">
	    	<img src="<?php echo $base;?>img/profile-slider/student/banner-5.jpg" />
	    </div>
	    <div class="item">
	    	<img src="<?php echo $base;?>img/profile-slider/student/banner-6.jpg" />
	    </div>
	    <div class="item">
	    	<img src="<?php echo $base;?>img/profile-slider/student/banner-7.jpg" />
	    </div>
	    <div class="item">
	    	<img src="<?php echo $base;?>img/profile-slider/student/banner-8.jpg" />
	    </div>
	    <div class="item">
	    	<img src="<?php echo $base;?>img/profile-slider/student/banner-9.jpg" />
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
										<div class="brand"><span class="label fg-white">UNION</span></div>
									</a>
								<!--end small tile--> 
                                <!--begin small tile-->
                                
									<a href="#" class="tile bg-black half-opacity">
                                        <div class="tile-content icon"><img src="<?php echo $base;?>img/jhsc/safety_board.png"></i></div>
                                        <div class="tile-status"><span class="name"><small>COMING SOON</small></span></div>
                                    </a>
								<!--end small tile--> 
                                

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
                                        <!--begin small tile-->
									<a class="tile double bg-red" href="<?php echo $base;?>admin/fatality_metro">
										<div class="tile-content icon">
											<span class="icon"><img src="<?php echo $base;?>img/profile-home/fatality_breakdown.png"></span>
										</div>
										<div class="brand">
											<span class="label fg-white">FATALITY BREAKDOWN</span>
										</div>
									</a>
								<!--end small tile--> 
											<!--begin small tile-->
									<a class="tile double  bg-red" href="<?php echo $base;?>admin/construction">
										<div class="tile-content icon">
											<span class="icon"><img src="<?php echo $base;?>img/profile-home/safety_equipment.png"></span>
										</div>
										<div class="brand">
											<span class="label fg-white">SAFETY EQUIPMENT</span>
										</div>
									</a>
								<!--end small tile--> 
                                <!--begin small tile-->
									<a class="tile double bg-red" href="<?php echo $base;?>admin/news_metro">
										<div class="tile-content icon">
											<span class="icon"><img src="<?php echo $base;?>img/profile-home/s1_news.png"></span>
										</div>
										<div class="brand">
											<span class="label fg-white">S1 NEWS</span>
										</div>
									</a>
								<!--end small tile--> 
                                
                                		
									</div>
								<!-------END  THIRD COLUMN FIRST ROW OF TILES------> 
</div>


			</div>
			
			
			
			
		</div>
	</div>
	
	 <div class="model-data-container alert-model-data">
			<div id="modal_save_profilephoto" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
			
			</div>
<!--END OF CODE FOR METRO STYLE-->
<?php $this->load->view('footer_admin');?>
<script type="text/javascript">
$('.carousel').carousel({ interval: 4000 });
</script>  