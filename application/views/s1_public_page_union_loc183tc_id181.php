<?php 
$this->load->view('header_admin');
$union['id'] 	= isset($union['id']) ? $union['id'] : '';
// common::pr($union);

$is_training_centre		= '';
if( "7" == $this->sess_usertype ) {
	$check_training_centre 	= $this->users->getUserMetaByID($this->sess_userid);
	$is_training_centre 	= isset($check_training_centre['union_training_centre']) && $check_training_centre['union_training_centre'] ? $check_training_centre['union_training_centre'] : '';
	$campus_names			= isset($check_training_centre['campus_name']) && $check_training_centre['campus_name'] ? $check_training_centre['campus_name'] : '';	
}

// Check if Selected Union from url, is Instructor's own union or included in his parent unions //
	$access_for_training = $this->users->checkUnionIsInstructorsUnion($union['id']);
?>

<div class="homebg ">
	<!--BEGIN PAGE TITLE-->
    <div class="container-fluid">
        <div class="main-content padding-metro-header subheader-secondary clearfix fg-grayLighter">
        <em class="margin20"><h3>LOCAL 183 TRAINING CENTRE PUBLIC PAGE</h3></em>
        </div>
    </div>
    <!--END PAGE TITLE-->	

<div class="union-container u-metro">
		<!--------START UNION PROFILE HEAD-------->
		<div class="heading ad-heading">
			<span class="ad-tab " ><a data-toggle="modal" class="btn btn-local183" href="#ad-modal">ADVERTISING</a></span>
			<!-- START ADVERTISING MODAL -->
			<div id="ad-modal" class="modal fade hide">
				<span data-dismiss="modal" class="remove"><i class="icon-remove icon-white"></i></span>
				<img src="<?php echo $base;?>img/union/local183/ad_local183.jpg"/>
			</div>
			<!-- END MODAL -->	
			
			<div class="row-fluid">
				<!-- START HEADER INFORMATION-->
				<div class="span3">
					<div class="u-img">
						<?php 
						$pimg = (!empty($union['profile_image'])) ? $base.$this->path_upload_profiles.$union['profile_image'] : $base."img/default.png";?>
						<img src="<?php echo $pimg;?>"/>
					</div>
				</div>
				<div class="span9">
					<div class="u-details">
						<?php 
						$city = $province = $country = '';
						$parent_unions = array();
						//if( isset($is_training_centre) && "on" == $is_training_centre ) {
							foreach( $parent_unions AS $key_parent_unions => $val_parent_unions ) {
								$union 		= $this->users->getUserByID( $val_parent_unions );
								$usermeta 	= $this->users->getUserMetaByID( $val_parent_unions );
								?>
								<h3 class="u-name"><?php echo isset($union['firstname']) ? strtoupper($union['firstname']) : '';?> <?php echo isset($union['lastname']) ? strtoupper($union['lastname']) : '';?>
                                <button class="btn btn-local183 cls_connect"  type="button" title="Connect"><img src="<?php echo $base;?>img/myprofile/connections.png" width="30"></button>
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
							
							<?php 
						//}
						//else { ?>
							<h3 class="u-name"><?php echo isset($union['firstname']) ? strtoupper($union['firstname']) : '';?> <?php echo isset($union['lastname']) ? strtoupper($union['lastname']) : '';?> 
                            <button class="btn btn-local183 cls_connect"  type="button" title="Connect"><img src="<?php echo $base;?>img/myprofile/connections.png" width="30"></button></h3>
                            
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
							<h6 class="u-loc">
							<?php echo isset($usermeta['street_number'])?$usermeta['street_number']:"";?>, 
							<?php echo isset($usermeta['street_name'])?$usermeta['street_name']:"";?>
                             <?php echo $location;?>, 
                            <?php echo isset($usermeta['zip'])?$usermeta['zip']:"";?>
                            </h6>
						<?php 
						//}?>
					</div>
				</div>
				<!-- END HEADER INFORMATION-->
			</div>
		</div>
		<!--------END UNION PROFILE HEAD-------->
		

	<!--menu bar-->
	<div class="metro">
	<!------------------------------------------------------------------------>
    <nav class="navigation-bar dark" id="mobile-collapse">
    <nav class="navigation-bar-content title nav-local183" >
		<a class="element1 pull-menu"></a>
		<ul class="element-menu local183-menu" id="metro-left-menu">
			<li><a href="#" data-target="#myCarousel" data-slide-to="0"><strong>ABOUT US</strong></a></li>
			<li class="element-divider"></li>
			<li><a href="<?php echo $base;?>admin/union_news_metro?id=<?php echo $userid;?>" data-target="#myCarousel" data-slide-to="1"><strong>NEWS</strong></a></li>
			<li class="element-divider"></li>
			<li><a href="#" data-target="#myCarousel" data-slide-to="2"><strong>CHARITY</strong></a></li>
			<li class="element-divider"></li>
			<!--<li class="element-menu bg-local183"><a href="#" data-target="#myCarousel" data-slide-to="3"><strong>LIUNA TRAINING CENTRE</strong></a></li> -->
			<!--li class="element-divider"></li-->
			<li class="element-menu" ><a href="<?php echo $base;?>admin/participant_portal?id=<?php echo $userid;?>" ><strong>PARTICIPANT PORTAL</strong></a></li>
			<li class="element-divider"></li>
			<li class="element-menu nav-local183">
			<a href="#" title=""><strong><img src="<?php echo $base;?>img/myprofile/connections.png" width="20"><?php echo $total_s1_connections;?></strong></a>
			</li>
			<li class="element-divider"></li>
			<li class="nav-local183"><a data-original-title="FACEBOOK" href="https://www.facebook.com/pages/Liuna-Local-183-Training-Centre/377897052280110" title="" target="_new"><i class="icon-facebook"></i></a></li>
			<li class="element-divider"></li>
		</ul> 
    </nav>
	</nav>
	</div>
	<!--END MENU BAR-->
	<!--slider-->
	
        <div class="row-fluid">
		<div class="module">

        <!-- Start MainSlider Row -->
    <div class="row-fluid">
      <div class="span12">
		<div class="slider-wrapper">
    <!--begin slider-->
    <div id ="myCarousel" class="carousel slide">
    <!-- Carousel items -->
    <div class="carousel-inner">
    <div class="active item">
		<div class="carousel-content">
       		<div class="carousel-content-inner">
				<h3 style="color:#FFF">About Us</h3>
				<!--<p style="color:#FFF"><strong>LiUNA! Local 183</strong> is the largest Construction Local Union in North America.</p> -->
				<span><a href="https://www.183training.com/index.php/8-information/45-about-us" class="btn btn-local183" target="new">Read More</a></span>
       		</div>
		</div>
		<img src="<?php echo $base;?>img/union/local183/liuna_trainingcentre_header.jpg" />       		
    </div>
    <div class="item">
		<div class="carousel-content">
       		<div class="carousel-content-inner">
            <h3 style="color:#FFF">News & Meetings</h3>
       			<!--<p style="color:#FFF"></p> -->
                <br /><br /><br /><br />
       			<span><a href="<?php echo $base;?>admin/union_news_metro?id=181" class="btn btn-local183">Read More</a></span>
       		</div>
		</div>
		<img src="<?php echo $base;?>img/union/local183/liuna_trainingcentre_header.jpg" />
    </div>
    <div class="item">
		<div class="carousel-content">
       		<div class="carousel-content-inner">
            <h3 style="color:#FFF">Giving Back to the Community</h3>
            <br /><br /><br /><br />
       			<!--<p>Here at S1 we care about your Health and Safety</p> -->
       			<span><a href="<?php echo $base;?>admin/union_events_metro?id=181" class="btn btn-local183">Read More</a></span>
       		</div>
		</div>
		<img src="<?php echo $base;?>img/union/local183/liuna_trainingcentre_header.jpg" />
    </div>
    
    
    </div>
    </div>
	<!--end slider-->     
        </div>
      </div>
    </div>
     <!-- End MainSlider Row -->
        </div>
        </div>
		<!--end slider-->

		<?php 
		if( "7" == $this->sess_usertype || 'yes' == $access_for_training ) {
			$rows_instructordata = $this->users->getDesignationData('tbl_union_designations', array("in_worker_id"=>$this->sess_userid, 
																									"in_union_id"=>$union['id'], "st_designation"=>"union_instructor") );
			$is_instructor 	= (isset($rows_instructordata[0]['meta_value'])&&"y"==$rows_instructordata[0]['meta_value']) ? "y" : "";
			$title_public_view 	= ("y"==$is_instructor) ? "Instructor, please type your credentials to access your portal:" : "My Union Library Training";?>
			
			<div class="row-fluid">	
				<?php 
				if( "y" == $is_instructor || ("7" == $this->sess_usertype && $union['id'] == $this->sess_userid) ) {?>
					<div class="span3 module-1-3">
						<div class="module">
							<h4 class="title-local183"><?php echo $title_public_view;?></h4>
							<div class="module-inner">
								<?php 
								if( "y" == $is_instructor ) {?>
									<div class="search">
										<form method="post" id="instructor_form">
											<fieldset>
												 <div class="controls controls-row content-margin">
													<input type="password" name="instructor_key" id="instructor_key" value="" class="span3"  placeholder="TYPE INSTRUCTOR KEY"/>
													<button class="span2 btn btn-local183" id="btn-instructor" type="button" >Go!</button>
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
											<button class="span2 btn btn-local183" id="btn_union_library" type="button" onclick="javascript:location.href='<?php echo $base."admin/instructor_portal?id=".$union['id']."&instrkey=1";?>'">Go!</button>
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
				
				if( ("7" == $this->sess_usertype && $union['id'] == $this->sess_userid) && "on"!=$is_training_centre && !$is_instructor ) 
				{?>
					<!-------------------------------->
					<div class="span3 module-1-3">
						<div class="module">
						<h4 class="title-local183">Union Hazard Alerts</h4>
						<div class="module-inner">
							<div class="search">
								<div class="controls controls-row content-margin">
									<a href="<?php echo $base."admin/union_alerts_view?id=".$union['id']."&type=alerts";?>" class="span3 btn btn-local183" id="btn-hazard-alerts" type="button" >Go!</a>
								</div>
							</div>
							
						</div>
						</div>
					</div>
					<!-------------------------------->

					<!-------------------------------->
					<div class="span3 module-1-3">
						<div class="module">
						<h4 class="title-local183">My Data Collection</h4>
						<div class="module-inner">
							<div class="search">
								<div class="controls controls-row content-margin">
									<a class="span3 btn btn-local183" id="btn-data-collection" type="button" >Go!</a>
								</div>
							</div>
							
						</div>
						</div>
					</div>
					<!-------------------------------->
					<?php
				}?>
			</div>
			<?php 
		}?>
        <!--------END ROW FOR INSTRUCTOR SIGN IN TO UNION LIBRARY-------->   
        

		
		<!--------START UPCOMING EVENTS, NEWS AND UPCOMING TRAINING-------->
		<div class="row-fluid">
			<div class="span8 module-2-3">
			<!--------START UPCOMING EVENTS-------->
				<div class="module">
					<h5 class="title-local183">UPCOMING COMMUNITY EVENTS & CHARITY</h5>
					<div class="module-inner">
						<div class="row-fluid">
							<div class="span7"><h4 class=" item-title">Welcome to the LiUNA Local 183 16th Annual Charity Golf Classic!</h4></div>
							<div class="span5 u-time"><i class="icon-time "></i> June 23rd, 2015</div>
						</div>
						<div class="content-margin">	
							<p>On June 23rd, 2015 along with LiUNA Local 183, you will be raising money for charity while enjoying a wonderful day of golf on one of our five courses.</p>
							<p>We are excited to announce this year that we have added three new Courses to the selection, spots will fill up quickly so make sure to register your foursome today to get your preferred course.</p>
							<a href="<?php echo $base;?>admin/union_events_metro?id=181" class="btn btn-local183">all events</a>
						</div>
					</div>
				</div>
			<!--------END UPCOMING EVENTS-------->	
			<!-- START NEWS -->
				<div class="module">
					<h5  class="title-local183">NEWS & MEETINGS</h5>
					<div class="module-inner">
					<div class="row-fluid">
						<div class="span7"><h4 class="item-title">Occupational Health and Safety Prevention and Innovation Program</h4></div>
						<div class="span5 u-time"><i class="icon-time "></i> May 6, 2015</div>
					</div>			
					<div class="content-margin">	
						<p>The new Occupational Health and Safety Prevention and Innovation Program aims to improve occupational health and safety outcomes in Ontario workplaces by funding initiatives that strongly align with the Ministry of Labour’s prevention priorities and Ontario’s Integrated Health and Safety Strategy.</p>
						<a href="<?php echo $base;?>admin/union_news_metro?id=181" class="btn btn-local183">more news</a>
					</div>
					</div>
				</div>
			<!-- END NEWS -->
			</div>
			
			<!--------START UPCOMING TRAINING-------->
			<div class="span4 module-1-3">
				<h5  class="title-local183">HEALTH & SAFETY</h5>
				<ul style="list-style:none;">
					<li class="clearfix">
						<span class="btn-local183 pull-left"><i class="sprite-welding sprite-white"></i></span>
						<div class="training-details">
							<h5>Basics of Supervising</h5>
							
						</div>
					</li>
					<li class="clearfix">	
						<span class="btn-local183 pull-left"><i class="sprite-utility sprite-white"></i></span>
						<div class="training-details">
							<h5>Bell Canada Confined Space Safety Training</h5>
							
						</div>
					</li>
					<li class="clearfix">	
						<span class="btn-local183 pull-left"><i class="sprite-rail sprite-white"></i></span>
						<div class="training-details">
							<h5>Chainsaw Operator Safety Training</h5>
							
						</div>
					</li>
					<li class="clearfix">	
						<span class="btn-local183 pull-left">
							<i class="sprite-rail sprite-white"></i>
						</span>
						<div class="training-details">
							<h5>Concrete and Drain Safety Program (1 Day)</h5>
							
						</div>
					</li>
					<li class="clearfix">	
						<span class="btn-local183 pull-left"><i class="sprite-rail sprite-white"></i></span>
						<div class="training-details">
							<h5>Confined Space Awareness Training</h5>
							
						</div>
					</li>
					<!-- buton to link to all upcoming training // Felipe 25 Oct 2013 -->
					<li class="clearfix">
						<div><a class="btn btn-local183 " href="https://www.183training.com/index.php/programs/health-safety">Sign Up</a></div>
					</li>
					<!-- end button to link to all upcoming training -->
				</ul>
			</div>
			<!--------END UPCOMING TRAINING-------->
		</div>
		<!--------END UPCOMING EVENTS AND UPCOMING TRAINING-------->
        
        <!--------START CONSTRUCTION SKILLS-------->
		<div class="row-fluid skilPad">
			<div class="span9 module-1-1">
                <div class="module">
                    <h5  class="title-local183">CONSTRUCTION SKILLS</h5>
                    <div class="module-inner">
                        <div class="row-fluid">
                            <div class="metro tile-group three no-margin no-padding" >
                				<?php $this->load->view('local183_construction_skills'); ?>
                
                
                            </div>
                        </div>
                    </div>
                </div>
			</div>
            <div class="span3 skilRight">
                <div class="module">
                    <h5  class="title-local183">SKILLED TRADES</h5>
                    <div class="module-inner">
                        <div class="row-fluid">
                            <div class="metro tile-group three no-margin no-padding" >
                <!--begin Brick and Stone tile -->
                    <a href="<?php echo $base;?>admin/constr_trade_metro?item=2" rel="#" class="tile half-library bg-black description" data-toggle="modal" data-content="<p><b>Brick and stone masons construct and repair structures. They may work on walls, arches, paving, floo..</b></p><h6> </h6><h6>Red Seal</h6>" data-original-title="<h5 class='margin10'>Brick and Stone Mason (401A)</h5>" data-placement="bottom" data-trigger="hover">
                        <div class="half bg-local183">
							<i class="icon on-left">
                            	<img src="<?php echo $base;?>img/skilled-job/construction_55x55.png">
                            </i>
                            <span class="fg-white" style="position:absolute;top:0px;">
                            	<small>Brick and Stone M..</small>
                            </span>
                        </div>
                        <div class="brand ">
                        	<div class="badge no-margin fg-white bg-red" style="right:40px;">
                            	<span class="icon-picassa"></span>
                            </div>
                        </div>
					</a>
                    
                <!--end  Brick and Stone tile-->
                <!--begin Cement Finisher tile -->
                    <a href="<?php echo $base;?>admin/constr_trade_metro?item=3" rel="#" class="tile half-library bg-black description" data-toggle="modal" data-content="<p><b>Cement Finishers finish concrete floors, sidewalks and patios by hand or machine.  They expose and f..</b></p><h6> </h6><h6> </h6>" data-original-title="<h5 class='margin10'>Cement (Concrete) Finisher (244G)</h5>" data-placement="bottom" data-trigger="hover">
                        <div class="half bg-local183">
							<i class="icon on-left">
                            	<img src="<?php echo $base;?>img/skilled-job/construction_55x55.png">
                            </i>
                            <span class="fg-white" style="position:absolute;top:0px;">
                            	<small>Cement (Concrete)..</small>
                            </span>
                        </div>
                        <div class="brand ">
                        </div>
					</a>
                    
                <!--end Cement finisher  tile-->
                <!--begin Construction Craft Worker tile -->
                <a href="<?php echo $base;?>admin/constr_trade_metro?item=6" rel="#" class="tile half-library bg-black description" data-toggle="modal" data-content="<p><b>Construction craft workers prepare, excavate, backfill, compact, and clean up a work site. They also..</b></p><h6> </h6><h6>Red Seal</h6>" data-original-title="<h5 class='margin10'>Construction Craft Worker (450A)</h5>" data-placement="bottom" data-trigger="hover">
                    <div class="half bg-local183">
						<i class="icon on-left"><img src="<?php echo $base;?>img/skilled-job/construction_55x55.png"></i>
                        <span class="fg-white" style="position:absolute;top:0px;">
                        	<small>Construction Craf..</small>
                        </span>
                    </div>
                    <div class="brand ">
                        <div class="badge no-margin fg-white bg-red" style="right:40px;">
                        	<span class="icon-picassa"></span>
                        </div>
                    </div>
				</a>
                
                <!--end Construction Craft Worker tile-->
                            </div>
                        </div>
                    </div>
                </div>
			</div>
		</div>              
		<!--------END CONSTRUCTION SKILLS-------->
        

</div>
</div>
<script type="text/javascript">
$(document).ready(function () {
$('.description').popover({html: true});

});
</script>
<?php $this->load->view('footer_admin'); ?>
<script type="text/javascript">
	var user_id = '<?php echo $union['id'];?>';
	$(document).on('click', '.cls_connect', function(){
		$.post(
			js_base_path+'ajax/connectToUnionInPublicPage',
			{'user_id':user_id},
			function(data) {
				alert(data.trim());
				window.location.reload();
				return false;
			}
		)
	});
	
	$(document).on('click', '#btn-go', function(){
		$sector 		= $("#cmb_sector").val();
		$job_title 		= $("#cmb_job_title").val();
		$unionreps_text = $("#txt_unionreps_text").val();
		
		$("#img_data_loader").show();
		$(".results").hide();
		
		$.post(
			'<?php echo $base;?>ajax/ajaxPublicUnion',
			{'cmb_sector':$sector, 'cmb_job_title':$job_title, 'txt_unionreps_text':$unionreps_text},
			function(data) {
				$(".results").show();
				$(".results").html(data);
				$("#img_data_loader").hide();
			})
	});
	
	$(document).on('click', '#btn-instructor', function() {
		var instructor_key 	= $("#instructor_key").val();
		$($.post(
			'<?php echo $base;?>ajax/ajaxCheckUnionInstructorKey',
			{'instructorKey':instructor_key, 'instructorId':'<?php echo $union['id'];?>'},
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
		if($this->session->userdata("usertype") == 7) {
			$url = $base."admin/union_datacollection?id=".$union['id']."&redirectfrom=public";
		}?>
		$(document).on('click', '#btn-data-collection', function(){
			var url = "<?php echo $url;?>";
			$(location).attr('href',url);
		});

		
	$(window).load(function() {
	$('.flexslider').flexslider({
    	controlNav: false,
		prevText:"",
	    nextText:""
    });
	//$('.modal').css('max-height','900px');
	//$('.modal').css('width','660px');
	 });
	
	</script>
    <!--STYLE IN PAGE CREATED ONLY FOR LOCAL 183 and its Training Centre PUBLIC PAGE-->
    <link type="text/css" rel="stylesheet" href="<?php echo $base;?>css/union/local183.css" media="screen" />