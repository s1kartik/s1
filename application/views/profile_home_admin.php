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
	<div class="homebg metro profile-home">
    	<!--BEGIN PAGE TITLE-->
    <div class="container-fluid">
        <div class="main-content padding-metro-header subheader-secondary clearfix fg-grayLighter">
        <em class="margin20">HOME - ADMIN</em>
        </div>
    </div>
    <!--END PAGE TITLE-->
		<div class="container">
			<div class="main-content padding-metro-home clearfix">		
							<!--START CODE FOR METRO STYLE-->
                            <div class="clearfix profilehomeCon">
								<!-------BEGIN FIRST ROW first column OF TILES------>
                                <div class="tile-group five no-margin no-padding clearfix" > 
								<!--begin text information paragraphs -->
											<div class="dashboard-content tile quadro marcio_profile_home double-vertical ol-transparent bg-white" >
												<div class="tile-content">
													<div class="panel no-border">
														<div class="  fg-white">
<!------------------BEGIN SLIDER-------------------------------------->	
<!--begin slider-->
<div id="myCarousel" class="carousel slide">
    <!-- Carousel items -->
    <div class="carousel-inner">
	    <div class="active item">
	       	<img src="<?php echo $base;?>img/profile-slider/admin/banner-0.jpg" />
	    </div>
	
	    <div class="item">
	       		<img src="<?php echo $base;?>img/profile-slider/admin/banner-1.jpg" />
	    </div>
	    
		<div class="item">
	    	<img src="<?php echo $base;?>img/profile-slider/admin/banner-2.jpg" />
	    </div>
	    
	    <div class="item">
	    	<img src="<?php echo $base;?>img/profile-slider/admin/banner-3.jpg" />
	    </div>
	    <div class="item">
	    	<img src="<?php echo $base;?>img/profile-slider/admin/banner-4.jpg" />
	    </div>
	    <div class="item">
	    	<img src="<?php echo $base;?>img/profile-slider/admin/banner-5.jpg" />
	    </div>
	    <div class="item">
	    	<img src="<?php echo $base;?>img/profile-slider/admin/banner-6.jpg" />
	    </div>
	    <div class="item">
	    	<img src="<?php echo $base;?>img/profile-slider/admin/banner-7.jpg" />
	    </div>
	    <div class="item">
	    	<img src="<?php echo $base;?>img/profile-slider/admin/banner-8.jpg" />
	    </div>
	    <div class="item">
	    	<img src="<?php echo $base;?>img/profile-slider/admin/banner-9.jpg" />
	    </div>
	    
    </div>
</div>      
       
<!----------------END SLIDER -------------------------------------->
														</div>
														
													</div>
												</div>
											</div>
                                                       <br />                      	<!--begin small tile-->
                                    <a class="tile   bg-black" href="<?php echo $base;?>admin/profile_view_integrated">
                                    	<div class="tile-content icon">
											<span class="icon"><img src="<?php echo $base;?>img/profile-home/profile.png"></span>
										</div>
										<div class="brand">
											<span class="label fg-white">PROFILE</span>
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
                                <?php 
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
								?>
									<a class="tile  bg-black <?php echo $dpclass;?>" href="<?php echo $dplink;?>">
										<div class="tile-content icon">
											<span class="icon "><img src="<?php echo $base;?>img/profile-home/digital_project.png"></span>
										</div>
										<div class="brand">
											<span class="label fg-white">DIGITAL PROJECT</span>
										</div>
									</a>
								<!--end small tile--> 
                                <!--begin small tile-->
									<a class="tile  bg-black" href="<?php echo $base."admin/jhsc_metro";?>">
										<div class="tile-content icon">
											<span class="icon"><img src="<?php echo $base;?>img/profile-home/jhsc.png"></span>
										</div>
										<div class="brand">
											<span class="label fg-white">JHSC</span>
										</div>
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
<!--END OF CODE FOR METRO STYLE-->
<?php $this->load->view('footer_admin');?>
<script type="text/javascript">
$('.carousel').carousel({ interval: 4000 });
</script>