<?php 
$uid = $this->session->userdata("userid");
if(!$uid) {
	header('Location:'.$base);
}
$type = $this->session->userdata("usertype");
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
<meta content="utf-8" http-equiv="encoding" />
<title>S1 Integration Systems</title>
<link rel="icon" href="<?php echo $base;?>img/favicon.png" type="image/png">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=3.0" />
<link type="text/css" rel="stylesheet" href="<?php echo $base;?>css/futuraLT/futuraLT.css" media="screen" />
<link type="text/css" rel="stylesheet" href="<?php echo $base;?>css/bootstrap.css" media="screen" />
<link type="text/css" rel="stylesheet" href="<?php echo $base;?>css/bootstrap-responsive.css" media="screen" />
<link type="text/css" rel="stylesheet" href="<?php echo $base;?>css/main.css" media="screen" />
<link type="text/css" rel="stylesheet" href="<?php echo $base;?>css/print.css" media="print" />
<link type="text/css" rel="stylesheet" href="<?php echo $base;?>css/metro-bootstrap.css" media="screen" />
<link type="text/css" rel="stylesheet" href="<?php echo $base;?>css/metro-bootstrap-responsive.css" media="screen" />
<link type="text/css" rel="stylesheet" href="<?php echo $base;?>css/mediaquerie.css" media="screen" />
<!--style for s1 standard view of contents-->
<link type="text/css" rel="stylesheet" href="<?php echo $base;?>css/content/s1content.css" media="screen" />
<!-- end of style for s1 standard view of contents-->
<script type="text/javascript" src="<?php echo $base;?>js/jquery/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo $base;?>js/jquery/jquery.widget.min.js"></script>
<script type="text/javascript" src="<?php echo $base;?>js/jquery.validate.js"></script>
<script type="text/javascript" src="<?php echo $base;?>js/bootstrap.js"></script>
<script type="text/javascript" src="<?php echo $base;?>js/zebra_datepicker.js"></script>
<script type="text/javascript">
	var js_base_path= '<?php echo $base;?>';
	var js_method 	= '<?php echo $this->router->fetch_method();?>';
	var js_userid 	= '<?php echo (isset($_GET['userid'])&&(int)$_GET['userid']&&"12"==$this->sess_usertype) ? (int)$_GET['userid'] : '';?>';
</script>
<script type="text/javascript" src="<?php echo $base;?>js/common.js"></script>
<link rel="stylesheet" href="<?php echo $base;?>css/datepicker.css" type="text/css" />
<script type="text/javascript">
	$(document).ready(function () {
		if( true == $('input').hasClass('btn-validate-date') ) {
			$('.btn-validate-date').click(function(e){
				if($('#startdate').val()==""){
					alert('please pick a start date');
					e.preventDefault();
				}
				else if($('#enddate').val()!="" && $('#startdate').val()>$('#enddate').val()){
					alert('End date should be greater then start date.');
					e.preventDefault();
				}
			});
		}                
		$('#genericSearch').click(function(e){                    
			   if($('#cmb_hdr_usertype').val()=="" && $('#txt_hdr_username').val()==""){
						alert('Please select atleast one Search Criteria');
						e.preventDefault();
				}
		});
	});

	function ajaxHeaderMyIDCard(userId)
	{
		$.ajax({
			url: js_base_path+'ajax/ajaxMyIDCard', 
			type: 'post', 
			data: {'userId': userId },
			success: function(output) {
				$(".cls_header_idcard").html(output);
				$("#modal_header_idcard").modal("show");
			},
			error: function(errMsg) {
				alert( errMsg.responseText );
				return false;
			}
		});
	}
</script>
<?php 
if($this->uri->segment(2)=="documents") {?>
	<!-- begin reveal js for new library vew-->
		<link rel="stylesheet" href="<?php echo $base;?>css/reveal.min.css">
		<link rel="stylesheet" href="<?php echo $base;?>css/theme/default.css" id="theme">    
		<!--Add support for earlier versions of Internet Explorer -->
		<!--[if lt IE 9]>
		<script type="text/javascript" src="lib/js/html5shiv.js"></script>
		<![endif]-->
	<!--end reveal js for new library vew--> 
<?php 
}?>
<!-- Load JavaScript Libraries -->
    <script type="text/javascript" src="<?php echo $base;?>js/jquery/jquery.mousewheel.js"></script>
    <script type="text/javascript" src="<?php echo $base;?>js/prettify/prettify.js"></script>

	<?php /*
    <!-- Metro UI CSS JavaScript plugins -->
    <script type="text/javascript" src="<?php echo $base;?>js/load-metro.js"></script>
    <!-- Local JavaScript -->
    <script type="text/javascript" src="<?php echo $base;?>js/docs.js"></script>
    <script type="text/javascript" src="<?php echo $base;?>js/github.info.js"></script>	
	*/?>

	<?php 
	$ci 			 = & get_instance();
	$controller_name = $ci->router->fetch_method();
	$arr_metro_notrequired = array("news_metro","profile","my_client_page","dashboard","getstart_metro","s1_public_page","s1_public_page_union","s1_public_page_consultant","instructor_portal","participant_portal");
	if( !in_array($controller_name, $arr_metro_notrequired) ) {?>
		<script type="text/javascript" src="<?php echo $base;?>js/metro/metro.min.js"></script>
		<?php 
	}?>
</head>
<body id="bodyhrq">
<header>
    <div class="navbar-division1">
        <div class="container-fluid" >
            <div class="wrapper">
                <div class="navbar ">
                    <div class="navbar-inner ">
                        <div class="row-fluid" >
                        	<div class="span3 text-center"><a class="header-brand" href="<?php echo $base."admin/dashboard";?>"><img src="<?php echo $base."img/logo.png";?>" class="img_logo" ></a></div>
                            <?php
								$top_ad 		= rand(1,4);
								$top_ad_target 	= "new";
								switch ($top_ad){
									case 1:
										$top_ad_url = "http://www.globalwasteservice.ca/";
										break;
									case 2:
										$top_ad_url = "http://www.sensogroup.ca/";
										break;
									case 3:
										$top_ad_url = "http://torcanlift.com/";
										break;
									case 4:
										$top_ad_url = "http://www.bairrada.ca/";
										break;
									default:
										$top_ad_url = "#";
										$top_ad_target = "_self";
									}?>
                            <div class="span9 text-right top-ad"><a href="<?php echo $top_ad_url;?>" target="<?php echo $top_ad_target;?>"><img src="<?php echo $base;?>img/ad/header/top_ad<?php echo $top_ad;?>.png" /></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	
    <!-- header 2nd division-->
    <!--**************BEGIN NEW MENU BAR-->
   <div class="metro">
  <!------------------------------------------------------------------------>
    <nav class="navigation-bar bg-darker dark" id="mobile-collapse">
    <nav class="navigation-bar-content">
     <a class="element1 pull-menu" id="mobmenu"></a>
	  <?php $qrystr = (isset($_GET['userid'])&&(int)$_GET['userid']&&"12"==$this->sess_usertype) ? "?userid=".$_GET['userid'] : '';?>
      <ul class="element-menu" id="metro-left-menu">
     	<li><a href="<?php echo $base;?>admin/dashboard" title="DASHBOARD" ><i class="icon-grid-view "></i></a></li>
		<li class="element-divider"></li>
		<!-- Start - Profile Home Notifications -->
			<?php 
			$new_msg_libassign 					= $this->users->newMessageCount($user['email_addr'], 'assign');
			$new_msg_connecrequest 				= $this->users->newMessageCount($user['email_addr'], 'connection');
			$new_msg_hazardalert 				= $this->users->newMessageCount($user['email_addr'], 'new alert');
			$new_msg_attendee_completed_safety 	= $this->users->newMessageCount($user['email_addr'], 'safety talks');
			
			$profile_home_notifications 		= ($new_msg_libassign + $new_msg_connecrequest + $new_msg_hazardalert + $new_msg_attendee_completed_safety);		
			if( $profile_home_notifications>0 && ($type==8 || $type==12) ) { // 8=Employer, 12=Consultant //
				$profile_home_notifications 	= ($new_msg_libassign + $new_msg_hazardalert + $new_msg_attendee_completed_safety);
			}?>
			<li>
				<?php if( ($profile_home_notifications>0 && ($type!=8 && $type!=12)) || $new_msg_hazardalert>0 )		{ // 8=Employer, 12=Consultant // ?>
					<span class="notification-number"><span><?php echo $profile_home_notifications;?></span></span>
					<?php 
				}?>
				<a href="<?php echo $base."admin/profile".$qrystr;?>" title="PROFILE HOME"><i class="icon-home"></i></a>
			</li>
		<!-- End - Profile Home Notifications -->
		
		
		<!-- Start - Profile Settings Notifications -->
			<li class="element-divider"></li>
			<?php 
			$profile_settings_notifications = ( $new_msg_connecrequest+$new_msg_hazardalert+$new_msg_attendee_completed_safety );
			if( $type > 1 ) {?>
				<li>
					<?php 
					if($profile_settings_notifications>0 && ($type==8 || $type==12) ) { // 8=Employer, 12=Consultant //?>
						<span class="notification-number"><span><?php echo $profile_settings_notifications;?></span></span>
						<?php 
					}
					else if($profile_settings_notifications>0 && ($type!=8 && $type!=12)) { // 8=Employer, 12=Consultant //?>
						<span class="notification-number"><span><?php echo $profile_settings_notifications;?></span></span>
						<?php 
					}?>
					<a title="SETTINGS" href="<?php echo $base."admin/profile_view_integrated".$qrystr;?>"><i class="icon-cog"></i></a>
				</li>
				<?php 
			}
			else {?>
				<li><a title="SETTINGS" href="<?php echo $base;?>admin"><i class="icon-cog"></i></a></li>
				<?php 
			}?>
		<!-- End - Profile Settings Notifications -->
		
		
        <li class="element-divider"></li>
        <li><a href='#modal_contact_us' data-toggle='modal' title="CONTACT US"><i class="icon-comments-4"></i></a></li>
		<li class="element-divider"></li>
        <li class="notification-button cls_header_msgcnt">
			<?php 
			$newmessages = $this->users->newMessageCount( $user['email_addr'], '', array('connection request','alert') );
			if($newmessages>0) {?>
				<span class="notification-number"><span><?php echo $newmessages;?></span></span>
				<?php 
			}
			?>
			<a href="<?php echo $base."admin/message_metro".$qrystr;?>" title="MESSAGES"><i class="icon-mail"></i></a>
		</li>
        <li class="element-divider"></li>
        <li class="notification-button cart-info">
			<?php 
			if( $this->cart->total_items() ) {?>
				<span class="notification-number"><span id="qty-in_cart"><?php echo $this->cart->total_items();?></span></span>
				<?php 
			}?>
            <a href="<?php echo $base;?>ecommerce/shoppingcart" title="SHOPPING CART">
            <i class="icon-cart"></i></a>
        </li>
        <li class="element-divider"></li>
        <li>
            <a href='<?php echo $base;?>admin/libraries_metro?libtype=1' title="S1 LIBRARY"><i><img src="<?php echo $base;?>img/library/header_menu_training_blank.png" /></i></a>
        </li>
        <li class="element-divider"></li>
        <li><a href="https://www.facebook.com/mys1s" title="FACEBOOK" target="_new"><i class="icon-facebook"></i></a></li>
        <li class="element-divider"></li>
        <li>
			<?php 
			$rows_points	= $this->points->getPagePointsByPageID( 8, 21 );
			$points 		= isset($rows_points[0]['in_credits']) ? $rows_points[0]['in_credits'] : '';
			?>
			<a href="javascript:void(0);" onclick="setPagePoints('8','21','id_modal_points','modal_points','instagram');" id="id_instagram" title="INSTAGRAM"><i class="icon-instagram"></i></a>
		</li>
        <li class="element-divider"></li>	        
        <!--**************END NEW MENU BAR-->
        <?php //Common::pr($_POST);
        if($this->sess_usertype >= 1){ ?>
        <li class="topsearch" style="width:350px;margin-top:10px">            
            <form method="post" action="<?php echo $this->base;?>admin/user_list">
            <div class="input-control select size2 headerSearchSelect">
                       <select id="cmb_hdr_usertype" name="cmb_hdr_usertype" class="f13">
                               <option value="">Select User Type</option>
                              <?php if(isset($_POST['cmb_hdr_usertype']) && $_POST['cmb_hdr_usertype'] == 8 ) { ?>
                                    <option value="8" selected>Employer</option>
                              <?php } else {?>
                                    <option value="8" >Employer</option>
                              <?php } if(isset($_POST['cmb_hdr_usertype']) && $_POST['cmb_hdr_usertype'] == 9 ) { ?>
                                    <option value="9" selected>Worker</option>
                              <?php } else {?>
                                    <option value="9">Worker</option>
                              <?php }if(isset($_POST['cmb_hdr_usertype']) && $_POST['cmb_hdr_usertype'] == 11 ) { ?>
                                    <option value="11" selected>Student</option>
                              <?php } else {?>
                                    <option value="11">Student</option>
                              <?php } 
							  if(isset($_POST['cmb_hdr_usertype']) && $_POST['cmb_hdr_usertype'] == 7 ) { ?>
                                    <option value="7" selected>Union</option>
                              <?php } else {?>
                                    <option value="7">Union</option>
                              <?php }
							  // WAS DISABLED as per the request on 28Jul2015 //
							  // ENABLED as per the Opertional task sheet:171 //
								  if(isset($_POST['cmb_hdr_usertype']) && $_POST['cmb_hdr_usertype'] == "utc" ) { ?>
										<option value="utc" selected>Union Training Centre</option>
								  <?php } else {?>
										<option value="utc">Union Training Centre</option>
								  <?php }
							  
							  
							  if(isset($_POST['cmb_hdr_usertype']) && $_POST['cmb_hdr_usertype'] == 12 ) { ?>      
                                    <option value="12" selected>Consultants</option>
                              <?php } else {?>
                                     <option value="12">Consultants</option>
                              <?php }?>
                       </select>
               </div>                
               <div style="height:30px" class="input-control text size2">
                   <input type="text" class="" placeholder="User Name" id="txt_hdr_username" name="txt_hdr_username" value="<?php echo isset($_POST['txt_hdr_username']) ? $_POST['txt_hdr_username'] : ''?>">
                       
               </div>
            <div class = "floatR">
                <button id="genericSearch" class="bg-red fg-white" style="line-height:20px" type="submit"><strong>Go!</strong></button>
            </div>
            </form>
         </li>   
        <?php } ?>
        </ul> 
           <span id="metro-right-menu">
            <span class="element-divider place-right"></span>
            <a class="element place-right" href="<?php echo $base."welcome/logout";?>" onclick="javascript:localStorage.clear();" title="Log Out"><span class="icon-switch"></span></a>
            <span class="element-divider place-right"></span>

			<!-- VIEW POINTS EARNED BY USER-->
				<?php 
				if( isset($this->sess_usertype) && "7" != $this->sess_usertype ) {?>
					<a href="<?php echo $base;?>admin/my_wallet" class="element place-right " title="My Points">
						<span class=""><i class=""><img src="<?php echo $base;?>img/icons_xp.png" style="height:20px;" /></i></span>
						<span class="github-watchers">
							<?php echo $this->points->getS1Points($this->session->userdata("userid"), $type);?>
						</span>
					</a>
				<?php
				}?>

			<span class="element-divider place-right "></span>
            <!-- VIEW BALANCE OF CREDITS BY USER-->
				<?php $total_available_credits = $this->points->getS1Credits();?>
				<a class="element place-right" href='<?php echo $base;?>admin/my_wallet' title="My Credits"><i class=""><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:20px;" /></i>
					<span class="github-watchers fg-yellow"><?php echo $total_available_credits;?></span>
				</a>
            <span class="element-divider place-right "></span>
            <span class="element image-button image-left place-right">
                <a href="<?php echo $base;?>admin/profile_view_integrated" title="MY PROFILE">
					<span title="<?php echo $user['firstname'].' '.$user['lastname'];?>">
						<?php echo $this->common->subString($user['firstname'].' '.$user['lastname'], 13);?>
					</span>
				</a>

				<a href="#modal_header_idcard" onclick="javascript:ajaxHeaderMyIDCard('<?php echo $this->session->userdata('userid');?>');" title="MY PROFILE" data-toggle='modal'>
					<?php 
					if( file_exists(FCPATH.$this->path_upload_profiles.$user['profile_image']) && $user['profile_image'] ) {?>
						<img src="<?php echo $base.$this->path_upload_profiles.$user['profile_image'];?>" class="w50"/>
						<?php 
					}
					else {?><img class="w50" src="<?php echo $base;?>img/default.png" /><?php }?>
				</a>	
            </span>
		</nav>
	</nav>
   </div>
<script type="text/javascript">
// ===== SCRIPT TO ACTIVATE TOOLTIPS =====
// ===== THE CONTENT OF THE TOOLTIP IS DEFINED BY THE "TITLE" ATTRIBUTE OF THE ELEMENT
$('#metro-left-menu').find("a").tooltip();
$('#metro-right-menu').find("a").tooltip();
<?php 
if( in_array($controller_name, $arr_metro_notrequired) ) {?>
	$("#mobmenu").click(function(){
		$("#metro-left-menu").slideToggle("slow");
		$(".element-divider").css("display", "none");
	});
	<?php
}?>
</script>

<!--**************END NEW MENU BAR-->
</header>

<?php if( isset($this->sess_usertype) && '7' != $this->sess_usertype ) {?>
	<!-- Instagram Modal ****switch in to hide font-size: 100px;
vertical-align: middle;
font-weight: bold;***** -->
	<div id="modal_points" class="metro modal fade hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="z-index:100000">
		<h4 align="center"><img src="<?php echo $base;?>img/points-level/plus_xp.png" /> <span id="id_modal_points" class="fg-white" ></span></h4>
		<a href="javascript:void(0);" style="float:right;" class="bg-red"><button type="button" class="btn btn_modal_redirect btn-danger bg-red fg-white" data-dismiss="modal" aria-hidden="true">Close</button></a>
	</div>
	<script type="text/javascript">
	$('#modal_points').css({'width':'auto',
		'padding-top':'8%',
		'background-color':'transparent',
		'box-shadow':'none',
		//'left':'35%'
	}); 
	$('#id_modal_points').css({'font-size':'100px',
		'vertical-align':'middle',
		'font-weight':'bold'		
	});
</script>
	<?php 
}?>

<!--begin body -->
<?php if(!isset($module) || $module!="dashboard") {?>
<div class="homebg">
<div class="container-fluid container-profile">
  <div class="profile-wrapper">
  <div class="row-fluid">
   <!-- Start Profile Menu Navigation -->
    <div  class="span2">
    <!-- Start First Menu Box --> 
      <div  class="profile-menu-box">
        <div class="profile-user text-center">
         <div class="profile-img">
            <?php 
			if( file_exists(FCPATH.$this->path_upload_profiles.$user['profile_image']) && $user['profile_image'] ) {?>
				<img src="<?php echo $base.$this->path_upload_profiles.$user['profile_image'];?>" class="w50"/>
				<?php 
			}
			else {?><img class="w50" src="<?php echo $base;?>img/default.png" /><?php }?>
         </div>
         <div class="profile-user-name">
           <div class="text-left">
              <p><strong><?php echo $user['firstname'].' '.$user['lastname'];?></strong></p>
              <?php 
                if($type>1) {?>
				<p><small>
               <?php
                if(isset($usermeta['city_id'])){
                    $city=$this->users->getElementByID('tbl_city', $usermeta['city_id']);
                    echo $city['cityname'];
                }
                if(isset($usermeta['province_id'])){
                    $province=$this->users->getElementByID('tbl_province', $usermeta['province_id']);
                    echo ", ".$province['provincename'];
                }?></small></p>
               <?php }?>
           </div>
         </div>
        </div>
        <div class="profile-points-box">
        <?php 
		$total_points = $this->points->getS1Points($this->session->userdata("userid"), $type);
		
		// Update points and level //
			$this->points->updateUsersPointsWithLevelHistory( '', $this->session->userdata('userid'), $total_points );

		// Get points Level //
			$points_level 	= $this->users->getMetaDataList('users_points_level', 'in_user_id="'.$this->session->userdata('userid').'"', '', 'in_points_level');
			$points_level 	= isset($points_level[0]['in_points_level']) ? $points_level[0]['in_points_level'] : '0';
			$next_level_points	= Common::getNextLevelPoints($points_level); // Next Level Points //
		?>
        <h5>LEVEL <?php echo $points_level;?></h5><h4><?php echo $total_points;?> pts</h4>
		<hr />
		<?php 
		if( $next_level_points ) {?>
			<h6>NEXT LEVEL:</h6><h6><span><?php echo $next_level_points;?>&nbsp;pts</span></h6>
			<?php
		}?>
        </div>
		
	
      </div> 
    <!-- End First Menu Box -->
	
	<!-- Start cart widget --> 
		<div  class="profile-menu-box">
			<div class="profile-menu-heading clearfix"><i class="icon-shopping-cart icon-white"></i><h6>Shopping Cart </h6></div>
			<div class="cart-info"> 
				<p><span id="qty-in_cart"><?php echo $this->cart->total_items();?></span> item (s)</p>
				<p><strong>Total:</strong> $<span id="amount_in_cart"><?php echo number_format($this->cart->total(), 2);?></span></p>
				<p><a href="<?php echo $base;?>ecommerce/shoppingcart">view cart</a></p>
			</div>
		</div>

	<!-- Start 2nd Menu Box --> 
	  <div  class="profile-menu-box">
		 <div class="profile-menu-heading">        
			<?php 
			if(!isset($module)){
				$module 	= "admin";
				$title_menu = "Settings";
				echo $title_menu;			
			}
			else{
				$title_menu = ($module=="setting") ? "Settings" : "Toolbox";
				echo $title_menu;
			}?>
		</div>
		<?php $this->load->view('menus/'.$module.'_menu');?>
		</div>
		
        <!-- Start 3rd Menu Box --> 
			<?php if(isset($module) && $module=="profile") {?>
			   <div  class="accordion-group profile-menu-box">
				 <div class="accordion-heading profile-menu-heading"><a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">General</a></div>
			   <div id="collapseTwo" class="accordion-body collapse">
				<div class="accordion-inner">
				 <ul class="nav">
				   <li><a href="<?php echo $base;?>admin/benefit" >Benefits</a></li>
				   <li><a href="<?php echo $base;?>admin/getstart_metro" >Get Started</a></li>
				   <li><a href="<?php echo $base;?>admin/general" >Charities <!--/ Family Support--></a></li>
				   <li><a href="<?php echo $base;?>admin/knowyourrights_metro">Know your Rights</a></li>
				   <li><a href="<?php echo $base;?>admin/youngworkers_metro">Young Workers <!--/ Support / Education--></a></li>
				   <li><a href="<?php echo $base;?>admin/skilledjob_main">Skilled Job Section</a></li>
				   <li><a href="<?php echo $base;?>admin/hsnetwork_metro">Ontario Health &amp; Safety Network</a></li>
				   <li><a href="<?php echo $base;?>admin/aboutus_metro">About Us</a></li>
				   <!--li><a href="<?php echo $base;?>admin/faq">FAQ</a></li-->
				   <li><a href="<?php echo $base;?>admin/terms_metro">Terms &amp; Conditions</a></li>
				   <li><a href="<?php echo $base;?>admin/privacy_metro">Privacy Policy</a></li>
				</ul> 
				</div><!--accordion-inner-->
				</div><!--collapseTwo-->      
				</div>
				<?php 
			}?>
    </div>
	<!-- End Profile Menu Navigation --> 

    <!-- Start Profile Content -->
    <div  class="span10">
      <div class="border-red">
        <div class="profile-content-box"> 
            <div id="profile-content">
	<?php 
}

// Start - Check whether the LEVEL changed // 
	// Get total Points //
		$total_points = $this->points->getS1Points($this->session->userdata("userid"), $type);
		
	// Get points Level and next level //
		$points_level 		= $this->users->getMetaDataList('users_points_level', 'in_user_id="'.$this->session->userdata('userid').'"', '', 'in_points_level');
		$points_level 		= isset($points_level[0]['in_points_level']) ? $points_level[0]['in_points_level'] : '0';
		$current_level_points	= Common::getNextLevelPoints($points_level-1); // Next Level Points //

		$next_level_points	= Common::getNextLevelPoints($points_level); // Next Level Points //

	if( ($total_points >= $current_level_points) && $current_level_points > 0 ) {
		$rows 		= $this->points->hasUserGotPointsOfPageSection($this->session->userdata('userid'), 1, 13); // Pageid=13: Check LEVEL changed //
		$level_changed_done= isset($rows['has_points']) ? $rows['has_points'] : "";
		if( !$level_changed_done ) {
			$add_pagesection_points = $this->points->addPagePoints($this->session->userdata('userid'), 13, 1);?>
			<!-- LEVEL Changed Modal -->
				<div id="modal_level_changed" class="modal metro hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					<div class="modal-header bg-red"><h3 id="myModalLabel"><strong>Congratulations <?php echo ucfirst($user['firstname']);?>!</strong><!--?php echo $points_level;?--><i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal"></i></h3></div>
					<div class="modal-body">
						<?php 
						if (2 == $points_level){ ?>
							<div class="tile-content text-center "><p class="s1content_title">S1 Rewards Unlocked! </p></div>
							<?php 
						} ?>
						
						<div class="tile-content text-center "><p class="s1content_subtitle">You have reached</p></div>
						<div class="tile-content text-center"><p><img src="<?php echo $base."img/points-level/level_".$points_level.".png";?>" width="200" ></p> </div>
						<div class="tile-content text-center">
							<p class="s1content_body_title">
								<img src="<?php echo $base;?>img/points-level/plus_xp.png" width="70"  />
								<span class="fg-red"><strong><?php echo ($next_level_points-$points_page);?></strong></span> 
									are required to next level!
							</p>
						</div>
						<?php //echo common::pr($points_level);?>
					</div>
					<!--div class="modal-footer"><button class="btn" data-dismiss="modal">Close</button></div-->
				</div>
				<script type="text/javascript">
				$('#modal_level_changed').modal('show');
				$('#modal_level_changed').css({'max-width':'500px'});
				</script>
		<?php 
		}
	}
?>

<div id="modal_header_idcard" class="modal metro hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-header bg-red">
		<h3 id="myModalLabel"><strong>PROFILE ID CARD</strong><i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal"></i></h3>
	</div>
	<div class="modal-body"><div class="charities-container cls_header_idcard" style="box-shadow: none;"></div></div>
	<div class="modal-footer">
		<button style="display:none;" rel="" class="btn cls-btn-accept">Accept</button>                                                
		<button class="btn" data-dismiss="modal">Close</button>
	</div>
</div>
