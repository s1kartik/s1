<?php $this->load->view('header_admin');
if( !$this->session->userdata('hazard_tolang') ) {
	$this->session->set_userdata('hazard_tolang',"en");
}
$to_lang 	= $this->session->userdata('hazard_tolang');
?>
<script type="text/javascript" src="<?php echo $this->base;?>js/metro/metro.min.js"></script>
<div class="homebg">
<div class="container container-profile">
  <div class="profile-wrapper">
  <div id="equip-container" class="row-fluid">
   <!-- Start Profile Menu Navigation -->
    <div id="equip-items"  class="span12">
     <!-- Start cart widget --> 
      <div  id="equip-landing" class="profile-menu-box">
     <style type="text/css">
	 .styled-select select {
   background: transparent;
  	font-weight:bold;
   text-shadow: 2px 2px 0px #000;
   border: 0;
   border-radius: 0;
  -moz-appearance:none;
   -webkit-appearance: none;
   }
   .metro .tab-control .tabs > li.active a {
  border-bottom-color: #ffffff;
  background-color: #e51400;
  border-top: 2px #e51400 solid;
  color:#fff;
}
.metro .tab-control .tabs > li.active:hover a {
  background-color: #e51400;
  color:#fff;
}
	 </style>      
         <div class="profile-menu-heading clearfix">
          <span id="hazard-title"><h3><span class="icon on-left" ><img src="<?php echo $base;?>img/library/hazards.png" width="40" height="40"></span>&nbsp;Office 1 </h3></span>
          <span  class="metro" style="float:right">________ Select ________<br />
          <div class="styled-select">
          <select id="high-rise-front-dropdown" onchange="javascript:updateHazardData(this.value);" class="hazard-drop-down bg-red fg-white" >
          	<option value="">- Select Section</option>
            <option value="indoor">Indoor Air Quality</option>
          	<option value="fire">Fire</option>
            <!--option value="trench">First Aid</option-->
            <option value="ladders">Ladders</option>
			<option value="lighting">Lighting</option>
			<option value="msd">Musculoskeletal Disorders</option>
			</select>
          </div>
         </div>
         <div class="cart-info hazard_heading " style="margin-left:10px;"><h5><?php echo lang("digital_hazard_heading");?></h5></div>
		</div>
    <!-- End cart widget -->
  </div>
  </div>    
    <div id="equip-container" class="row-fluid"> 
    <div id="hazards-image"  class="span12">
        <div class="profile-content-box"> 
          <div class="equip-dots">
			<?php 
			$rows	= $this->points->hasUserGainedPointsGetPoints(12, 1027, $checkPointsGained=1);
			$img 	= ($rows['has_points_gained']) ? "equip-dot-green" : 'equip-dot';
			?>
		    <a id="dot_fire" href="#fire_office1" data-toggle='modal' onclick="updateHazardData('fire_office1',1);">
            <img class="equip-dot" target="1" data-toggle="tooltip" title="" src="<?php echo $base."img/equip/".$img.".png";?>" style="top:  17.9%;left:32.16%;" data-original-title="Fire">
			</a>
			<?php 
			$rows	= $this->points->hasUserGainedPointsGetPoints(12, 1028, $checkPointsGained=1);
			$img 	= ($rows['has_points_gained']) ? "equip-dot-green" : 'equip-dot';
			?>
			<a id="dot_indoor" href="#indoor" data-toggle='modal' onclick="updateHazardData('indoor',2);">
            <img class="equip-dot" target="2" data-toggle="tooltip" title="" src="<?php echo $base."img/equip/".$img.".png";?>" style="top: 35.7%;left: 41.18%;" data-original-title="Indoor Air Quality">
			</a>
			<?php 
			$rows	= $this->points->hasUserGainedPointsGetPoints(12, 1029, $checkPointsGained=1);
			$img 	= ($rows['has_points_gained']) ? "equip-dot-green" : 'equip-dot';
			?>
			 <a id="dot_lighting" href="#lighting" data-toggle='modal' onclick="updateHazardData('lighting',3);">
             <img class="equip-dot" target="3" data-toggle="tooltip" title="" src="<?php echo $base."img/equip/".$img.".png";?>" style="top: 67.25%;left: 54.41%;" data-original-title="Lighting ">
			 </a>
			 <?php 
			$rows	= $this->points->hasUserGainedPointsGetPoints(12, 1030, $checkPointsGained=1);
			$img 	= ($rows['has_points_gained']) ? "equip-dot-green" : 'equip-dot';
			?>
			 <a id="dot_msd" href="#msd" data-toggle='modal' onclick="updateHazardData('msd',4);">
             <img class="equip-dot" target="4" data-toggle="tooltip" title="" src="<?php echo $base."img/equip/".$img.".png";?>" style="top: 17.9%;left: 56.57%;" data-original-title="Musculoskeletal Disorders">
			 </a>
			<?php 
			$rows	= $this->points->hasUserGainedPointsGetPoints(12, 1031, $checkPointsGained=1);
			$img 	= ($rows['has_points_gained']) ? "equip-dot-green" : 'equip-dot';
			?>
			 <a id="dot_ladders" href="#ladders_office1" data-toggle='modal' onclick="updateHazardData('ladders_office1',5);">
             <img class="equip-dot" target="5" data-toggle="tooltip" title="" src="<?php echo $base."img/equip/".$img.".png";?>" style="top: 37.63%;left: 63.04%;" data-original-title="Ladders">
			 </a>

			</div>         
            <img src="<?php echo $base;?>img/hazards/office/1/office_1.jpg">
        </div>
    </div>
    </div>
  <div class="row-fluid">
<!-- Bottom Banner Ad -->
<?php $this->load->view('center-leaderboard.php'); ?>    
<!-- end bottom banner ad -->
  </div>
  </div>  
  </div>
</div>
<!-- Start fire  Modal --> 
    <div class="metro">
      <div id="fire_office1" class="modal hide fade hazard-item " active_hazard_item="fire_office1" pointpage_section_id="1027" tabindex="-1" style="max-width:600px;" role="dialog" aria-labelledby="myModalLabel">
      	<div class="modal-header bg-red">
            <h3><span class="icon on-left" ><img src="<?php echo $base;?>img/library/hazards.png" width="30" height="30"></span><strong>Fire</strong><i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal" onclick="window.location.reload();"></i></h3>
        </div>
       <div class="modal-body" id="body1">
       		<center>
                <div class="flexslider" style="max-width:600px;">
                    <ul class="slides fire_office1">
                        <li rel=1><img src="<?php echo $base;?>img/hazards/office/1/fire1.png"/></li>
                        <li rel=2><img src="<?php echo $base;?>img/hazards/office/1/fire2.png"/></li>
                        <li rel=3><img src="<?php echo $base;?>img/hazards/office/1/fire3.png"/></li>
                        <li rel=4><img src="<?php echo $base;?>img/hazards/office/1/fire4.png"/></li>
                        <li rel=5><img src="<?php echo $base;?>img/hazards/office/1/fire5.png"/></li>
                        <li rel=6><img src="<?php echo $base;?>img/hazards/office/1/fire6.png"/></li>
                        <li rel=7><img src="<?php echo $base;?>img/hazards/office/stats_message.png"/></li>
                    </ul>
		        </div>
               </center>
				<div class="padding5 clearfix"><?php echo $this->common->callLanguageSelectBox('cmb_hazard_lang', $to_lang, 'cmb_hazard_lang select-right');?></div>

				<div class="profile-user" style="overflow:auto">
                <div class="tab-control no-margin" data-effect="fade" data-role="tab-control">
                    <ul class="tabs">
                        <li class="active user_tab"><a href="#box1description" class="hazard-tab"><i class="on-left-more"><img src="<?php echo $base;?>img/library/hazards.png" width="18" height="18"></i>Hazard</a></li>
                        <li class="user_tab"><a href="#fire_status_modal" class="hazard-tab" data-toggle='modal'><i class="icon-stats-up on-left-more"></i>Stats</a></li>
                        <li class="user_tab"><a href="#box1controls" class="hazard-tab"><i class="icon-dashboard on-left-more"></i>Controls</a></li>
                        <li class="user_tab"><a href="#box1library" class="hazard-tab"><i class="on-left-more"><img src="<?php echo $base;?>img/library/header_menu_training_blank.png" /></i>Library</a></li>
                    </ul>
                    <div class="frames">
                        <div class="frame text-left" id="box1description">
                            <p class="s1content_body_section"><strong>Hazard</strong></p>
                            <p class="s1content_body_section box1hazard"><?php lang("fire_office1_hazard");?></p>
                        </div>
                        <div class="frame text-left" id="box1stats"><p><a  href='#fire_at_heights_status_modal' data-toggle='modal'>Stats</a></p></div>
                        <div class="frame text-left" id="box1controls">
                            <p class="s1content_body_section" ><strong>Controls</strong></p>
							<p class="s1content_body_section box1controls"><?php lang("fire_office1_controls");?></p>
                        </div>
                        <div class="frame text-left" id="box1library">
                            <div class="row-fluid">
                            <a href='#fire1' data-toggle='modal' class="tile half-library  bg-darker add_to_cart description fire1" >
								<div class="half bg-darker">
									<img src="<?php echo $base;?>img/library/hazards.png">
									<span class="fg-white" style="position:absolute;top:0px;"><small>Office - Fire</small></span>
								</div>
								<div class="brand">
									<span class="label fg-white text-center">&nbsp;<small><i class=""><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:16px;"></i>&nbsp;10&nbsp;<i class=""><img src="<?php echo $base;?>img/icons_xp.png" style="height:16px;"></i>&nbsp;10</small></span>
								</div>
							</a>
                           
                            <a href='#fire2' data-toggle='modal' class="tile half-library  bg-darker add_to_cart description fire2">
								<div class="half bg-darker">
									<img src="<?php echo $base;?>img/library/procedures.png">
									<span class="fg-white" style="position:absolute;top:0px;"><small>Flammable Liquid</small></span>
								</div>
								<div class="brand">                                              
									<span class="label fg-white text-center">&nbsp;<small><i class=""><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:16px;"></i>&nbsp;8&nbsp;<i class=""><img src="<?php echo $base;?>img/icons_xp.png" style="height:16px;"></i>&nbsp;30</small></span>
								</div>
							</a>
							 <a href='#fire3' data-toggle='modal' class="tile half-library  bg-darker add_to_cart description fire3" >
								<div class="half bg-darker">
									<img src="<?php echo $base;?>img/library/inspections.png">
									<span class="fg-white" style="position:absolute;top:0px;"><small>Kitchen and Eating</small></span>
								</div>
								<div class="brand">                                              
									<span class="label fg-white text-center">&nbsp;<small><i class=""><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:16px;"></i>&nbsp;20&nbsp;<i class=""><img src="<?php echo $base;?>img/icons_xp.png" style="height:16px;"></i>&nbsp;50</small></span>
								</div>
							</a>
                            </div>                            
                        </div>
                    </div>
    			</div>
	        </div>
            </div>
            <div class="modal-footer">
				<a  href='#sponsoredby' data-toggle='modal'>
                <button class=" hazard-sponsor" ><strong>Sponsored By</strong></button></a>&nbsp;
				<!--button href="<?php echo $base;?>admin/libraries_metro?libtype=1" class="btn">S1 Library</button--> &nbsp;
				<button class="btn" data-dismiss="modal" onclick="window.location.reload();">Close</button>
			</div> 
      </div> 
      </div>
    <!-- End fire at Heights Modal -->
	
    <!-- *********** start fire at Heights Stats MODAL page ******************************** -->
	<div id="fire_status_modal" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top:-2%; max-width:700px; max-height:500px" >
		<div class="modal-body"><a href="#" ><img src="<?php echo $base;?>img/hazards/office/1/fire.png" /></a></div>
		<div class="modal-footer bg-gray"><button class="btn" data-dismiss="modal" onclick="$('#fire_status_modal').hide();">Close</button></div>
	</div>
<!-- ******************** end  fire at Heights Stats modal page ************************************* --> 
    <!-- *********** start fire_at_heights1 library Hazard MODAL page ******************************** -->
	<div id="fire1" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top: 10%; width:462px;" >
    <h5 class='margin10'>Office - Fire Hazard</h5>
    <p class='margin10'><strong>Hazards that may a occur when a fire takes place.</strong></p>
    <h6 class='margin10'>$1.00 - <i ><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:20px" /></i>&nbsp;10 - <i ><img src="<?php echo $base;?>img/icons_xp.png" style="height:20px" /></i>&nbsp;10</h6>
		<div class="modal-footer bg-gray">
        	<a href="<?php echo $base;?>admin/libraries_metro?libtype=3"><button  class="btn hazard_btn">S1 Hazards</button></a>
			<button class="btn" data-dismiss="modal" onclick="$('#fire1').hide();">Close</button>
		</div>
	</div>
<!-- ******************** end fire_at_heights1 library Hazard modal page ************************************* --> 
     <!-- *********** start fire_at_heights2 library Procedure MODAL page ******************************** -->
    
	<div id="fire2" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top: 10%; width:462px;" >
    <h5 class='margin10'>Flammable Liquid Safety Procedure</h5>
    <h6 class='margin10'>$1.80 - <i ><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:20px" /></i>&nbsp;8 - <i ><img src="<?php echo $base;?>img/icons_xp.png" style="height:20px" /></i>&nbsp;30</h6>
		
		<div class="modal-footer bg-gray">
        	<a href="<?php echo $base;?>admin/libraries_metro?libtype=4"><button  class="btn hazard_btn">S1 Procedures</button></a>
			<button class="btn" data-dismiss="modal" onclick="$('#fire2').hide();">Close</button>
		</div>
	</div>
<!-- ******************** end fire_at_heights2 library Procedure modal page ************************************* --> 
    <!-- *********** start fire_at_heights3 library Inspection MODAL page ******************************** -->
    <div id="fire3" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top: 10%; width:462px;" >
    <h5 class='margin10'>Office - Kitchen and Eating Areas</h5>
    <h6 class='margin10'>$4.00 - <i ><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:20px" /></i>&nbsp;20 - <i ><img src="<?php echo $base;?>img/icons_xp.png" style="height:20px" /></i>&nbsp;50</h6>
		
		<div class="modal-footer bg-gray">
        	<a href="<?php echo $base;?>admin/s1_library_inspection_view_metro"><button  class="btn hazard_btn">S1 Inspections</button></a>
			<button class="btn" data-dismiss="modal" onclick="$('#fire3').hide();">Close</button>
		</div>
	</div>
	
<!-- ******************** end fire_at_heights3 library Inspection modal page ************************************* --> 
<script type="text/javascript">

$(function () {
    $(".fire1").on('click', function() {
        $('#fire2').modal('hide');
        $('#fire3').modal('hide');
    });
 	$(".fire2").on('click', function() {
        $('#fire1').modal('hide');
        $('#fire3').modal('hide');
    });
 	$(".fire3").on('click', function() {
        $('#fire1').modal('hide');
        $('#fire2').modal('hide');
    });
   
});
</script>

    <!-- Start indoor OBJECTS Modal --> 
    <div class="metro">
      <div id="indoor" class="modal hide fade hazard-item " active_hazard_item="indoor" pointpage_section_id="1028" tabindex="-1" style="max-width:600px;" role="dialog" aria-labelledby="myModalLabel" >
      	<div class="modal-header bg-red">
            <h3 ><span class="icon on-left" ><img src="<?php echo $base;?>img/library/hazards.png" width="30" height="30"></span><strong>Indoor Air Quality</strong><i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal" onclick="window.location.reload();"></i></h3>
        </div>
       <div class="modal-body" id="body2" >
       		<center>
                <div class="flexslider" style="max-width:600px;">
                    <ul class="slides indoor">
                        <li rel=1><img src="<?php echo $base;?>img/hazards/office/1/indoor_air_quality1.png"/></li>
                        <li rel=2><img src="<?php echo $base;?>img/hazards/office/1/indoor_air_quality2.png"/></li>
                        <li rel=3><img src="<?php echo $base;?>img/hazards/office/1/indoor_air_quality3.png"/></li>
                        <li rel=4><img src="<?php echo $base;?>img/hazards/office/1/indoor_air_quality4.png"/></li>
                        <li rel=5><img src="<?php echo $base;?>img/hazards/office/stats_message.png"/></li>

                    </ul>
		        </div>
               </center>
            
			<div class="padding5 clearfix"><?php echo $this->common->callLanguageSelectBox('cmb_hazard_lang', $to_lang, 'cmb_hazard_lang select-right');?></div>
				
	        <div class="profile-user">
                <div class="tab-control no-margin" data-effect="fade" data-role="tab-control">
                    <ul class="tabs">
                        <li class="active user_tab"><a href="#box2description" class="hazard-tab"><i class="on-left-more"><img src="<?php echo $base;?>img/library/hazards.png" width="18" height="18"></i>Hazard</a></li>
                        <li class="user_tab"><a href="#indoor_status_modal" class="hazard-tab" data-toggle='modal'><i class="icon-stats-up on-left-more"></i>Stats</a></li>
                        <li class="user_tab"><a href="#box2controls" class="hazard-tab"><i class="icon-dashboard on-left-more"></i>Controls</a></li>
                        <li class="user_tab"><a href="#box2library" class="hazard-tab"><i class="on-left-more"><img src="<?php echo $base;?>img/library/header_menu_training_blank.png" /></i>Library</a></li>
                    </ul>
                    <div class="frames">
                        
                        <div class="frame text-left" id="box2description">
                        	<p class="s1content_body_section" ><strong>Hazard</strong></p>
							<p class="s1content_body_section box2hazard"><?php lang("indoor_hazard");?></p>
                        </div>
                        <div class="frame text-left" id="box2stats">
                            <p><a  href='#indoor_objects_status_modal' data-toggle='modal'>Stats</a></p>
                        </div>
                        <div class="frame text-left" id="box2controls">
                         <p class="s1content_body_section" ><strong>Controls</strong></p>
						 <p class="s1content_body_section box2controls"><?php lang("indoor_controls");?></p>
                        </div>
                     
                        <div class="frame text-left" id="box2library">
                            <div class="row-fluid">
                            <a href='#indoor1' data-toggle='modal' class="tile half-library  bg-darker add_to_cart description indoor1">
									<div class="half bg-darker">
										<img src="<?php echo $base;?>img/library/hazards.png">
										<span class="fg-white" style="position:absolute;top:0px;"><small>Indoor Air Quality</small></span>
									</div>
									<div class="brand">                                              
										<span class="label fg-white text-center">&nbsp;<small><i class=""><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:16px;"></i>&nbsp;10&nbsp;<i class=""><img src="<?php echo $base;?>img/icons_xp.png" style="height:16px;"></i>&nbsp;10</small></span>
									</div>
								</a>
                            
                            <a href='#indoor2' data-toggle='modal' class="tile half-library  bg-darker add_to_cart description indoor2">
									<div class="half bg-darker">
										<img src="<?php echo $base;?>img/library/procedures.png">
										<span class="fg-white" style="position:absolute;top:0px;"><small>Ventilation</small></span>
									</div>
									<div class="brand">                                              
										<span class="label fg-white text-center">&nbsp;<small><i class=""><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:16px;"></i>&nbsp;8&nbsp;<i class=""><img src="<?php echo $base;?>img/icons_xp.png" style="height:16px;"></i>&nbsp;30</small></span>
									</div>
								</a>
								<a href='#indoor3' data-toggle='modal' class="tile half-library  bg-darker add_to_cart description indoor3" >
									<div class="half bg-darker">
										<img src="<?php echo $base;?>img/library/inspections.png">
										<span class="fg-white" style="position:absolute;top:0px;"><small>Housekeeping</small></span>
									</div>
									<div class="brand">                                              
										<span class="label fg-white text-center">&nbsp;<small><i class=""><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:16px;"></i>&nbsp;20&nbsp;<i class=""><img src="<?php echo $base;?>img/icons_xp.png" style="height:16px;"></i>&nbsp;50</small></span>
									</div>
								</a>
								
                            </div>                            
                        </div>
                    </div>
    			</div>
	        </div>
            </div>
            <div class="modal-footer">
				<a  href='#sponsoredby' data-toggle='modal'>
                <button class=" hazard-sponsor" ><strong>Sponsored By</strong></button></a>&nbsp;
				<!--button href="<?php echo $base;?>admin/libraries_metro?libtype=1" class="btn">S1 Library</button--> &nbsp;
				<button class="btn" data-dismiss="modal" onclick="window.location.reload();">Close</button>
			</div>
      </div>
      </div>
    <!-- End indoor OBJECTS Modal -->
	
	
             <!-- *********** start indoor OBJECTS Stats MODAL page ******************************** -->
	<div id="indoor_status_modal" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top:-2%; max-width:700px;" >
		<div class="modal-body"><a href="#" ><img src="<?php echo $base;?>img/hazards/office/1/indoor_air_quality.png" /></a></div>
		<div class="modal-footer bg-gray"><button class="btn" data-dismiss="modal" onclick="$('#indoor_objects_status_modal').hide();">Close</button></div>
	</div>
<!-- ******************** end  indoor OBJECTS Stats modal page ************************************* --> 
     <!-- *********** start indoor1 library Hazard MODAL page ******************************** -->
    
	<div id="indoor1" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top: 10%; width:462px;" >
    <h5 class='margin10'>Office - Indoor Air Quality Hazard</h5>
    <p class='margin10'><strong>Hazards in regards to working with poor indoor air quality.</strong></p>
    <h6 class='margin10'>$1.00 - <i ><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:20px" /></i>&nbsp;10 - <i ><img src="<?php echo $base;?>img/icons_xp.png" style="height:20px" /></i>&nbsp;10</h6>
		
		<div class="modal-footer bg-gray">
        	<a href="<?php echo $base;?>admin/libraries_metro?libtype=3"><button  class="btn hazard_btn">S1 Hazards</button></a>
			<button class="btn" data-dismiss="modal" onclick="$('#indoor1').hide();">Close</button>
		</div>
	</div>
<!-- ******************** end indoor1 library Hazard modal page ************************************* --> 
    <!-- *********** start indoor2 library Procedure MODAL page ******************************** -->
    
	<div id="indoor2" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top: 10%; width:462px;" >
    <h5 class='margin10'>Ventilation - Office Procedure</h5>
    <h6 class='margin10'>$1.80 - <i ><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:20px" /></i>&nbsp;8 - <i ><img src="<?php echo $base;?>img/icons_xp.png" style="height:20px" /></i>&nbsp;30</h6>
		
		<div class="modal-footer bg-gray">
        	<a href="<?php echo $base;?>admin/libraries_metro?libtype=4"><button  class="btn hazard_btn">S1 Procedures</button></a>
			<button class="btn" data-dismiss="modal" onclick="$('#indoor2').hide();">Close</button>
		</div>
	</div>
<!-- ******************** end indoor2 library Procedure modal page ************************************* -->
     <!-- *********** start indoor3 library Inspection MODAL page ******************************** -->
    
	<div id="indoor3" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top: 10%; width:462px;" >
    <h5 class='margin10'>Office - Housekeeping Workspace Inspection</h5>
    <h6 class='margin10'>$4.00 - <i ><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:20px" /></i>&nbsp;20 - <i ><img src="<?php echo $base;?>img/icons_xp.png" style="height:20px" /></i>&nbsp;50</h6>
		
		<div class="modal-footer bg-gray">
        	<a href="<?php echo $base;?>admin/s1_library_inspection_view_metro"><button  class="btn hazard_btn">S1 Inspections</button></a>
			<button class="btn" data-dismiss="modal" onclick="$('#indoor3').hide();">Close</button>
		</div>
	</div>
<!-- ******************** end indoor3 library Inspection modal page ************************************* --> 
 <script type="text/javascript">

$(function () {
    $(".indoor1").on('click', function() {
        $('#indoor2').modal('hide');
        $('#indoor3').modal('hide');
    });
 	$(".indoor2").on('click', function() {
        $('#indoor1').modal('hide');
        $('#indoor3').modal('hide');
    });
 	$(".indoor3").on('click', function() {
        $('#indoor1').modal('hide');
        $('#indoor2').modal('hide');
    });
   
});
</script>   

<!--space reserved for FIRST AID-->
<!--BODY3 BOX3 TARGET3-->
<!--END SPACE RESERVED FOR FIRST AID-->
    

   

    <!-- Start lighting  Modal --> 
    <div class="metro">
      <div id="lighting" class="modal hide fade hazard-item " active_hazard_item="lighting" pointpage_section_id="1029" tabindex="-1" style="max-width:600px;" role="dialog" aria-labelledby="myModalLabel" >
     
      	<div class="modal-header bg-red">
            <h3 ><span class="icon on-left" ><img src="<?php echo $base;?>img/library/hazards.png" width="30" height="30"></span><strong>Lighting</strong><i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal" onclick="window.location.reload();"></i></h3>
        </div>
       <div class="modal-body" id="body3" >
       		<center>
                
                <div class="flexslider" style="max-width:600px;">
                    <ul class="slides lighting">
                        <li rel=1><img src="<?php echo $base;?>img/hazards/office/1/lighting1.png"/></li>
                        <li rel=2><img src="<?php echo $base;?>img/hazards/office/1/lighting2.png"/></li>
                        <li rel=3><img src="<?php echo $base;?>img/hazards/office/1/lighting3.png"/></li>
                        <li rel=4><img src="<?php echo $base;?>img/hazards/office/1/lighting4.png"/></li>
                        <li rel=5><img src="<?php echo $base;?>img/hazards/office/1/lighting5.png"/></li>
                        <li rel=6><img src="<?php echo $base;?>img/hazards/office/stats_message.png"/></li>

                    </ul>
                    
		        </div>
               </center>
            
			<div class="padding5 clearfix"><?php echo $this->common->callLanguageSelectBox('cmb_hazard_lang', $to_lang, 'cmb_hazard_lang select-right');?></div>
	        <div class="profile-user">
                <div class="tab-control no-margin" data-effect="fade" data-role="tab-control">
                    <ul class="tabs">
                        <li class="active user_tab"><a href="#box3description" class="hazard-tab"><i class="on-left-more"><img src="<?php echo $base;?>img/library/hazards.png" width="18" height="18"></i>Hazard</a></li>
                        <li class="user_tab"><a href="#lighting_status_modal" class="hazard-tab" data-toggle='modal'><i class="icon-stats-up on-left-more"></i>Stats</a></li>
                        <li class="user_tab"><a href="#box3controls" class="hazard-tab"><i class="icon-dashboard on-left-more"></i>Controls</a></li>
                        <li class="user_tab"><a href="#box3library" class="hazard-tab"><i class="on-left-more"><img src="<?php echo $base;?>img/library/header_menu_training_blank.png" /></i>Library</a></li>
                    </ul>
                    <div class="frames">
                        <div class="frame text-left" id="box3description">
                        <p class="s1content_body_section"><strong>Hazard</strong></p>
						<p class="s1content_body_section box3hazard"><?php lang("lighting_hazard");?></p>
                        </div>
                        <div class="frame text-left" id="box3stats"><p><a  href='#lighting_status_modal' data-toggle='modal'>Stats</a></p></div>
                        <div class="frame text-left" id="box3controls">
							<p class="s1content_body_section"><strong>Controls</strong></p>
							<p class="s1content_body_section box3controls"><?php lang("lighting_controls");?></p>
                        </div>
                        <div class="frame text-left" id="box3library">
                            <div class="row-fluid">
								<a href='#lighting1' data-toggle='modal' class="tile half-library lighting1 bg-darker add_to_cart description">
									<div class="half bg-darker">
										<img src="<?php echo $base;?>img/library/hazards.png">
										<span class="fg-white" style="position:absolute;top:0px;"><small>Lighting</small></span>
									</div>
									<div class="brand">                                              
										<span class="label fg-white text-center">&nbsp;<small><i class=""><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:16px;"></i>&nbsp;10&nbsp;<i class=""><img src="<?php echo $base;?>img/icons_xp.png" style="height:16px;"></i>&nbsp;10</small></span>
									</div>
								</a>
                            <a href='#lighting2' data-toggle='modal' class="tile half-library lighting2 bg-darker add_to_cart description">
								<div class="half bg-darker">
									<img src="<?php echo $base;?>img/library/procedures.png">
									<span class="fg-white" style="position:absolute;top:0px;"><small>Minimizing Slipping</small></span>
								</div>
								<div class="brand">                                              
									<span class="label fg-white text-center">&nbsp;<small><i class=""><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:16px;"></i>&nbsp;8&nbsp;<i class=""><img src="<?php echo $base;?>img/icons_xp.png" style="height:16px;"></i>&nbsp;30</small></span>
								</div>
							</a>
                            <a href='#lighting3' data-toggle='modal' class="tile half-library lighting3 bg-darker add_to_cart description" >
								<div class="half bg-darker">
									<img src="<?php echo $base;?>img/library/inspections.png">
									<span class="fg-white" style="position:absolute;top:0px;"><small>Access and Egress</small></span>
								</div>
								<div class="brand">
									<span class="label fg-white text-center">&nbsp;<small><i class=""><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:16px;"></i>&nbsp;20&nbsp;<i class=""><img src="<?php echo $base;?>img/icons_xp.png" style="height:16px;"></i>&nbsp;50</small></span>
								</div>
								</a>
                            </div>                            
                        </div>
                    </div>
    			</div>
	        </div>
            </div>
            <div class="modal-footer">
				<a  href='#sponsoredby' data-toggle='modal'>
                <button class=" hazard-sponsor" ><strong>Sponsored By</strong></button></a>&nbsp;
				<!--button href="<?php echo $base;?>admin/libraries_metro?libtype=1" class="btn">S1 Library</button--> &nbsp;
				<button class="btn" data-dismiss="modal" onclick="window.location.reload();">Close</button>
			</div> 
      </div> 
      </div>
            
    <!-- End lighting  Modal -->
<!-- *********** start lighting  Stats MODAL page ******************************** -->
    
	<div id="lighting_status_modal" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top:-2%; max-width:700px;" >
		<div class="modal-body"><a href="#"><img src="<?php echo $base;?>img/hazards/office/1/lighting.png"/></a></div>
		<div class="modal-footer bg-gray"><button class="btn" data-dismiss="modal" onclick="$('#lighting_status_modal').hide();">Close</button></div>
	</div>
<!-- ******************** end lighting Stats modal page ************************************* -->     

	<!-- *********** start lighting1 library Hazard MODAL page ******************************** -->
	<div id="lighting1" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top: 10%; width:462px;" >
		<h5 class='margin10'>Office - Lighting</h5>
		<p class='margin10'><strong>Lighting Hazard</strong></p>
		<h6 class='margin10'>$1.00 - <i ><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:20px" /></i>&nbsp;10 - <i ><img src="<?php echo $base;?>img/icons_xp.png" style="height:20px" /></i>&nbsp;10</h6>
		<div class="modal-footer bg-gray">
        	<a href="<?php echo $base;?>admin/libraries_metro?libtype=3"><button  class="btn hazard_btn">S1 Hazards</button></a>
			<button class="btn" data-dismiss="modal" onclick="$('#lighting1').hide();">Close</button>
		</div>
	</div>
	<!-- ******************** end lighting1 library Hazard modal page ************************************* --> 
    
	<!-- *********** start lighting2 library Procedure MODAL page ******************************** -->
	<div id="lighting2" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top: 10%; width:462px;" >
    <h5 class='margin10'>Minimizing Slipping</h5>
    <h6 class='margin10'>$1.80 - <i ><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:20px" /></i>&nbsp;8 - <i ><img src="<?php echo $base;?>img/icons_xp.png" style="height:20px" /></i>&nbsp;30</h6>
		
		<div class="modal-footer bg-gray">
        	<a href="<?php echo $base;?>admin/libraries_metro?libtype=4"><button  class="btn hazard_btn">S1 Procedures</button></a>
			<button class="btn" data-dismiss="modal" onclick="$('#lighting2').hide();">Close</button>
		</div>
	</div>
<!-- ******************** end lighting2 library Procedure modal page ************************************* --> 
     <!-- *********** start lighting3 library Inspection MODAL page ******************************** -->
    
	<div id="lighting3" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top: 10%; width:462px;" >
    <h5 class='margin10'>Access and Egress Inspection - Office</h5>
    <h6 class='margin10'>$4.00 - <i ><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:20px" /></i>&nbsp;20 - <i ><img src="<?php echo $base;?>img/icons_xp.png" style="height:20px" /></i>&nbsp;50</h6>
		
		<div class="modal-footer bg-gray">
        	<a href="<?php echo $base;?>admin/s1_library_inspection_view_metro"><button  class="btn hazard_btn">S1 Inspections</button></a>
			<button class="btn" data-dismiss="modal" onclick="$('#lighting3').hide();">Close</button>
		</div>
	</div>
<!-- ******************** end lighting3 library Inspection modal page ************************************* --> 
<script type="text/javascript">

$(function () {
    $(".lighting1").on('click', function() {
        $('#lighting2').modal('hide');
        $('#lighting3').modal('hide');
    });
 	$(".lighting2").on('click', function() {
        $('#lighting1').modal('hide');
        $('#lighting3').modal('hide');
    });
 	$(".lighting3").on('click', function() {
        $('#lighting1').modal('hide');
        $('#lighting2').modal('hide');
    });
   
});
</script> 

    <!-- Start msd  Modal --> 
    <div class="metro">
      <div id="msd" class="modal hide fade hazard-item " active_hazard_item="msd" pointpage_section_id="1030" tabindex="-1" style="max-width:600px;" role="dialog" aria-labelledby="myModalLabel" >
     
      	<div class="modal-header bg-red">
            <h3 ><span class="icon on-left" ><img src="<?php echo $base;?>img/library/hazards.png" width="30" height="30"></span><strong>Musculoskeletal Disorders</strong><i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal" onclick="window.location.reload();"></i></h3>
        </div>
       <div class="modal-body" id="body4" >
       		<center>
                
                <div class="flexslider" style="max-width:600px;">
                    <ul class="slides msd">
                        <li rel=1><img src="<?php echo $base;?>img/hazards/office/1/msd1.png"/></li>
                        <li rel=2><img src="<?php echo $base;?>img/hazards/office/1/msd2.png"/></li>
                        <li rel=3><img src="<?php echo $base;?>img/hazards/office/1/msd3.png"/></li>
                        <li rel=4><img src="<?php echo $base;?>img/hazards/office/1/msd4.png"/></li>
                        <li rel=5><img src="<?php echo $base;?>img/hazards/office/1/msd5.png"/></li>
                        <li rel=6><img src="<?php echo $base;?>img/hazards/office/stats_message.png"/></li>

                    </ul>
                    
		        </div>
               </center>
            
			<div class="padding5 clearfix"><?php echo $this->common->callLanguageSelectBox('cmb_hazard_lang', $to_lang, 'cmb_hazard_lang select-right');?></div>
	        <div class="profile-user">
                <div class="tab-control no-margin" data-effect="fade" data-role="tab-control">
                    <ul class="tabs">
                        <li class="active user_tab"><a href="#box4description" class="hazard-tab"><i class="on-left-more"><img src="<?php echo $base;?>img/library/hazards.png" width="18" height="18"></i>Hazard</a></li>
                        <li class="user_tab"><a href="#msd_status_modal" class="hazard-tab" data-toggle='modal'><i class="icon-stats-up on-left-more"></i>Stats</a></li>
                        <li class="user_tab"><a href="#box4controls" class="hazard-tab"><i class="icon-dashboard on-left-more"></i>Controls</a></li>
                        <li class="user_tab"><a href="#box4library" class="hazard-tab"><i class="on-left-more"><img src="<?php echo $base;?>img/library/header_menu_training_blank.png" /></i>Library</a></li>
                    </ul>
                    <div class="frames">
                        <div class="frame text-left" id="box4description">
                        <p class="s1content_body_section"><strong>Hazard</strong></p>
						<p class="s1content_body_section box4hazard"><?php lang("msd_hazard");?></p>
                        </div>
                        <div class="frame text-left" id="box4stats"><p><a  href='#msd_status_modal' data-toggle='modal'>Stats</a></p></div>
                        <div class="frame text-left" id="box4controls">
							<p class="s1content_body_section"><strong>Controls</strong></p>
							<p class="s1content_body_section box4controls"><?php lang("msd_controls");?></p>
                        </div>
                        <div class="frame text-left" id="box4library">
                            <div class="row-fluid">
								<a href='#msd1' data-toggle='modal' class="tile half-library msd1 bg-darker add_to_cart description">
									<div class="half bg-darker">
										<img src="<?php echo $base;?>img/library/hazards.png">
										<span class="fg-white" style="position:absolute;top:0px;"><small>(MSD) Hazard</small></span>
									</div>
									<div class="brand">                                              
										<span class="label fg-white text-center">&nbsp;<small><i class=""><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:16px;"></i>&nbsp;10&nbsp;<i class=""><img src="<?php echo $base;?>img/icons_xp.png" style="height:16px;"></i>&nbsp;10</small></span>
									</div>
								</a>
                            <a href='#msd2' data-toggle='modal' class="tile half-library msd2 bg-darker add_to_cart description">
								<div class="half bg-darker">
									<img src="<?php echo $base;?>img/library/procedures.png">
									<span class="fg-white" style="position:absolute;top:0px;"><small>Workstation</small></span>
								</div>
								<div class="brand">                                              
									<span class="label fg-white text-center">&nbsp;<small><i class=""><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:16px;"></i>&nbsp;8&nbsp;<i class=""><img src="<?php echo $base;?>img/icons_xp.png" style="height:16px;"></i>&nbsp;30</small></span>
								</div>
							</a>
                            <a href='#msd3' data-toggle='modal' class="tile half-library msd3 bg-darker add_to_cart description" >
								<div class="half bg-darker">
									<img src="<?php echo $base;?>img/library/inspections.png">
									<span class="fg-white" style="position:absolute;top:0px;"><small>Ergonomics</small></span>
								</div>
								<div class="brand">
									<span class="label fg-white text-center">&nbsp;<small><i class=""><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:16px;"></i>&nbsp;20&nbsp;<i class=""><img src="<?php echo $base;?>img/icons_xp.png" style="height:16px;"></i>&nbsp;50</small></span>
								</div>
								</a>
                            </div>                            
                        </div>
                    </div>
    			</div>
	        </div>
            </div>
            <div class="modal-footer">
				<a  href='#sponsoredby' data-toggle='modal'>
                <button class=" hazard-sponsor" ><strong>Sponsored By</strong></button></a>&nbsp;
				<!--button href="<?php echo $base;?>admin/libraries_metro?libtype=1" class="btn">S1 Library</button--> &nbsp;
				<button class="btn" data-dismiss="modal" onclick="window.location.reload();">Close</button>
			</div> 
      </div> 
      </div>
            
    <!-- End msd  Modal -->
<!-- *********** start msd  Stats MODAL page ******************************** -->
    
	<div id="msd_status_modal" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top:-2%; max-width:700px;" >
		<div class="modal-body"><a href="#"><img src="<?php echo $base;?>img/hazards/office/1/musculoskeletal_disorder.png"/></a></div>
		<div class="modal-footer bg-gray"><button class="btn" data-dismiss="modal" onclick="$('#msd_status_modal').hide();">Close</button></div>
	</div>
<!-- ******************** end msd Stats modal page ************************************* -->     

	<!-- *********** start msd1 library Hazard MODAL page ******************************** -->
	<div id="msd1" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top: 10%; width:462px;" >
		<h5 class='margin10'>Musculoskeletal Disorders (MSD) Hazard – Office</h5>
		<p class='margin10'><strong>Hazards associated with MSD injuries.</strong></p>
		<h6 class='margin10'>$5.00 - <i ><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:20px" /></i>&nbsp;5 - <i ><img src="<?php echo $base;?>img/icons_xp.png" style="height:20px" /></i>&nbsp;5</h6>
		<div class="modal-footer bg-gray">
        	<a href="<?php echo $base;?>admin/libraries_metro?libtype=3"><button  class="btn hazard_btn">S1 Hazards</button></a>
			<button class="btn" data-dismiss="modal" onclick="$('#msd1').hide();">Close</button>
		</div>
	</div>
	<!-- ******************** end msd1 library Hazard modal page ************************************* --> 
    
	<!-- *********** start msd2 library Procedure MODAL page ******************************** -->
	<div id="msd2" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top: 10%; width:462px;" >
    <h5 class='margin10'>Workstation Procedure – Office</h5>
    <h6 class='margin10'>$1.80 - <i ><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:20px" /></i>&nbsp;8 - <i ><img src="<?php echo $base;?>img/icons_xp.png" style="height:20px" /></i>&nbsp;30</h6>
		
		<div class="modal-footer bg-gray">
        	<a href="<?php echo $base;?>admin/libraries_metro?libtype=4"><button  class="btn hazard_btn">S1 Procedures</button></a>
			<button class="btn" data-dismiss="modal" onclick="$('#msd2').hide();">Close</button>
		</div>
	</div>
<!-- ******************** end msd2 library Procedure modal page ************************************* --> 
     <!-- *********** start msd3 library Inspection MODAL page ******************************** -->
    
	<div id="msd3" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top: 10%; width:462px;" >
    <h5 class='margin10'>Ergonomics Inspection </h5>
    <h6 class='margin10'>$4.00 - <i ><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:20px" /></i>&nbsp;20 - <i ><img src="<?php echo $base;?>img/icons_xp.png" style="height:20px" /></i>&nbsp;50</h6>
		
		<div class="modal-footer bg-gray">
        	<a href="<?php echo $base;?>admin/s1_library_inspection_view_metro"><button  class="btn hazard_btn">S1 Inspections</button></a>
			<button class="btn" data-dismiss="modal" onclick="$('#msd3').hide();">Close</button>
		</div>
	</div>
<!-- ******************** end msd3 library Inspection modal page ************************************* --> 
<script type="text/javascript">

$(function () {
    $(".msd1").on('click', function() {
        $('#msd2').modal('hide');
        $('#msd3').modal('hide');
    });
 	$(".msd2").on('click', function() {
        $('#msd1').modal('hide');
        $('#msd3').modal('hide');
    });
 	$(".msd3").on('click', function() {
        $('#msd1').modal('hide');
        $('#msd2').modal('hide');
    });
   
});
</script> 

 <!-- Start ladders  Modal --> 
    <div class="metro">
      <div id="ladders_office1" class="modal hide fade hazard-item " active_hazard_item="ladders_office1" pointpage_section_id="1031" tabindex="-1" style="max-width:600px;" role="dialog" aria-labelledby="myModalLabel" >
     
      	<div class="modal-header bg-red">
            <h3 ><span class="icon on-left" ><img src="<?php echo $base;?>img/library/hazards.png" width="30" height="30"></span><strong>Ladders</strong><i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal" onclick="window.location.reload();"></i></h3>
        </div>
       <div class="modal-body" id="body5" >
       		<center>
                
                <div class="flexslider" style="max-width:600px;">
                    <ul class="slides ladders_office1">
                        <li rel=1><img src="<?php echo $base;?>img/hazards/office/1/ladders1.png"/></li>
                        <li rel=2><img src="<?php echo $base;?>img/hazards/office/1/ladders2.png"/></li>
                        <li rel=3><img src="<?php echo $base;?>img/hazards/office/1/ladders3.png"/></li>
                        <li rel=4><img src="<?php echo $base;?>img/hazards/office/stats_message.png"/></li>

                    </ul>
                    
		        </div>
               </center>
            
			<div class="padding5 clearfix"><?php echo $this->common->callLanguageSelectBox('cmb_hazard_lang', $to_lang, 'cmb_hazard_lang select-right');?></div>
	        <div class="profile-user">
                <div class="tab-control no-margin" data-effect="fade" data-role="tab-control">
                    <ul class="tabs">
                        <li class="active user_tab"><a href="#box5description" class="hazard-tab"><i class="on-left-more"><img src="<?php echo $base;?>img/library/hazards.png" width="18" height="18"></i>Hazard</a></li>
                        <li class="user_tab"><a href="#ladders_status_modal" class="hazard-tab" data-toggle='modal'><i class="icon-stats-up on-left-more"></i>Stats</a></li>
                        <li class="user_tab"><a href="#box5controls" class="hazard-tab"><i class="icon-dashboard on-left-more"></i>Controls</a></li>
                        <li class="user_tab"><a href="#box5library" class="hazard-tab"><i class="on-left-more"><img src="<?php echo $base;?>img/library/header_menu_training_blank.png" /></i>Library</a></li>
                    </ul>
                    <div class="frames">
                        <div class="frame text-left" id="box5description">
                        <p class="s1content_body_section"><strong>Hazard</strong></p>
						<p class="s1content_body_section box5hazard"><?php lang("ladders_office1_hazard");?></p>
                        </div>
                        <div class="frame text-left" id="box5stats"><p><a  href='#ladders_status_modal' data-toggle='modal'>Stats</a></p></div>
                        <div class="frame text-left" id="box5controls">
							<p class="s1content_body_section"><strong>Controls</strong></p>
							<p class="s1content_body_section box5controls"><?php lang("ladders_office1_controls");?></p>
                        </div>
                        <div class="frame text-left" id="box5library">
                            <div class="row-fluid">
								<a href='#ladders1' data-toggle='modal' class="tile half-library ladders1 bg-darker add_to_cart description">
									<div class="half bg-darker">
										<img src="<?php echo $base;?>img/library/hazards.png">
										<span class="fg-white" style="position:absolute;top:0px;"><small>Ladders</small></span>
									</div>
									<div class="brand">                                              
										<span class="label fg-white text-center">&nbsp;<small><i class=""><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:16px;"></i>&nbsp;10&nbsp;<i class=""><img src="<?php echo $base;?>img/icons_xp.png" style="height:16px;"></i>&nbsp;10</small></span>
									</div>
								</a>
                            <a href='#ladders2' data-toggle='modal' class="tile half-library ladders2 bg-darker add_to_cart description">
								<div class="half bg-darker">
									<img src="<?php echo $base;?>img/library/procedures.png">
									<span class="fg-white" style="position:absolute;top:0px;"><small>Rolling Work</small></span>
								</div>
								<div class="brand">                                              
									<span class="label fg-white text-center">&nbsp;<small><i class=""><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:16px;"></i>&nbsp;8&nbsp;<i class=""><img src="<?php echo $base;?>img/icons_xp.png" style="height:16px;"></i>&nbsp;30</small></span>
								</div>
							</a>
                            <a href='#ladders3' data-toggle='modal' class="tile half-library ladders3 bg-darker add_to_cart description" >
								<div class="half bg-darker">
									<img src="<?php echo $base;?>img/library/inspections.png">
									<span class="fg-white" style="position:absolute;top:0px;"><small>Ergonomics</small></span>
								</div>
								<div class="brand">
									<span class="label fg-white text-center">&nbsp;<small><i class=""><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:16px;"></i>&nbsp;20&nbsp;<i class=""><img src="<?php echo $base;?>img/icons_xp.png" style="height:16px;"></i>&nbsp;50</small></span>
								</div>
								</a>
                            </div>                            
                        </div>
                    </div>
    			</div>
	        </div>
            </div>
            <div class="modal-footer">
				<a  href='#sponsoredby' data-toggle='modal'>
                <button class=" hazard-sponsor" ><strong>Sponsored By</strong></button></a>&nbsp;
				<!--button href="<?php echo $base;?>admin/libraries_metro?libtype=1" class="btn">S1 Library</button--> &nbsp;
				<button class="btn" data-dismiss="modal" onclick="window.location.reload();">Close</button>
			</div> 
      </div> 
      </div>
            
    <!-- End ladders  Modal -->
<!-- *********** start ladders  Stats MODAL page ******************************** -->
    
	<div id="ladders_status_modal" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top:-2%; max-width:700px;" >
		<div class="modal-body"><a href="#"><img src="<?php echo $base;?>img/hazards/office/1/ladder.png"/></a></div>
		<div class="modal-footer bg-gray"><button class="btn" data-dismiss="modal" onclick="$('#ladders_status_modal').hide();">Close</button></div>
	</div>
<!-- ******************** end ladders Stats modal page ************************************* -->     

	<!-- *********** start ladders1 library Hazard MODAL page ******************************** -->
	<div id="ladders1" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top: 10%; width:462px;" >
		<h5 class='margin10'>Ladder Hazard – Office</h5>
		<p class='margin10'><strong>Hazards resulting from use of ladders.</strong></p>
		<h6 class='margin10'>$1.00 - <i ><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:20px" /></i>&nbsp;10 - <i ><img src="<?php echo $base;?>img/icons_xp.png" style="height:20px" /></i>&nbsp;10</h6>
		<div class="modal-footer bg-gray">
        	<a href="<?php echo $base;?>admin/libraries_metro?libtype=3"><button  class="btn hazard_btn">S1 Hazards</button></a>
			<button class="btn" data-dismiss="modal" onclick="$('#ladders1').hide();">Close</button>
		</div>
	</div>
	<!-- ******************** end ladders1 library Hazard modal page ************************************* --> 
    
	<!-- *********** start ladders2 library Procedure MODAL page ******************************** -->
	<div id="ladders2" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top: 10%; width:462px;" >
    <h5 class='margin10'>Rolling Work Platforms Procedure – Office</h5>
    <h6 class='margin10'>$1.80 - <i ><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:20px" /></i>&nbsp;8 - <i ><img src="<?php echo $base;?>img/icons_xp.png" style="height:20px" /></i>&nbsp;30</h6>
		
		<div class="modal-footer bg-gray">
        	<a href="<?php echo $base;?>admin/libraries_metro?libtype=4"><button  class="btn hazard_btn">S1 Procedures</button></a>
			<button class="btn" data-dismiss="modal" onclick="$('#ladders2').hide();">Close</button>
		</div>
	</div>
<!-- ******************** end ladders2 library Procedure modal page ************************************* --> 
     <!-- *********** start ladders3 library Inspection MODAL page ******************************** -->
    
	<div id="ladders3" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top: 10%; width:462px;" >
    <h5 class='margin10'>Ergonomics Inspection - Office</h5>
    <h6 class='margin10'>$4.00 - <i ><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:20px" /></i>&nbsp;20 - <i ><img src="<?php echo $base;?>img/icons_xp.png" style="height:20px" /></i>&nbsp;50</h6>
		
		<div class="modal-footer bg-gray">
        	<a href="<?php echo $base;?>admin/s1_library_inspection_view_metro"><button  class="btn hazard_btn">S1 Inspections</button></a>
			<button class="btn" data-dismiss="modal" onclick="$('#ladders3').hide();">Close</button>
		</div>
	</div>
<!-- ******************** end ladders3 library Inspection modal page ************************************* --> 
<script type="text/javascript">

$(function () {
    $(".ladders1").on('click', function() {
        $('#ladders2').modal('hide');
        $('#ladders3').modal('hide');
    });
 	$(".ladders2").on('click', function() {
        $('#ladders1').modal('hide');
        $('#ladders3').modal('hide');
    });
 	$(".ladders3").on('click', function() {
        $('#ladders1').modal('hide');
        $('#ladders2').modal('hide');
    });
   
});
</script> 

     <!-- *********** start Sponsored by MODAL page ******************************** -->
    
	<div id="sponsoredby" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none; max-width:462px;" >
		<a href="http://newcanadians.hhstores.ca/" target="new">
        <img src="<?php echo $base;?>img/sponsor/office/1/ad1.jpg" />
        </a>
		<div class="modal-footer bg-gray">
			<button class="btn" data-dismiss="modal" onclick="$('#sponsoredby').hide();">Close</button>
		</div>
	</div>
<!-- ******************** end sponsored by modal page ************************************* --> 
<script type="text/javascript">
	$('.hazard-item').css({ 'top':'1%', });
	$('.flexslider').css({ 'border':'0px',  'box-shadow':'0px', 'padding':'0px', 'margin':'0px' });
	$('.flex-direction-nav a').css({ 'top':'50%'});
	$('.slides').css({ 'margin-left':'0px',  'padding':'0px' });
	$('.modal-body').css({ 'margin-left':'0px',  'padding':'0px', 'max-height':'80vh','overflow-y':'auto','overflow-x':'hidden' });
	$('.modal-header').css({'border':'0px' });
	$('.modal-footer').css({'border-radius':'0px'});	
</script>
<?php $this->load->view('footer_admin'); ?>

<script type="text/javascript">		   
	function updateHazardData($hazardSection,$pointPageSection)
	{
		var $to_lang = '<?php echo $to_lang;?>';
		$active_hazard_item 	= $hazardSection;
		$("#"+$active_hazard_item).each(function() {
			if( "fire_office1" == $active_hazard_item ) {
				$hazard 	= '<?php echo lang("fire_office1_hazard");?>';
				$controls 	= '<?php echo lang("fire_office1_controls");?>';
			}
			else if( "indoor" == $active_hazard_item ) {
				$hazard 	= '<?php echo lang("indoor_hazard");?>';
				$controls 	= '<?php echo lang("indoor_controls");?>';
			}
			else if( "lighting" == $active_hazard_item ) {
				$hazard 	= '<?php echo lang("lighting_hazard");?>';
				$controls 	= '<?php echo lang("lighting_controls");?>';
			}
			else if( "msd" == $active_hazard_item ) {
				$hazard 	= '<?php echo lang("msd_hazard");?>';
				$controls 	= '<?php echo lang("msd_controls");?>';
			}
			else if( "ladders_office1" == $active_hazard_item ) {
				$hazard 	= '<?php echo lang("ladders_office1_hazard");?>';
				$controls 	= '<?php echo lang("ladders_office1_controls");?>';
			}

			$data_hazards = $hazard+"OFFICE1_HAZARD"+$controls;

			$.post(js_base_path+'ajax/getTranslatedText', {'paragraphDescription':$data_hazards,'translateSection':"digital_hazards", 'fromLang':"en", 'toLang':$to_lang}, function(data){
				var $front_hazard_text = data.split("OFFICE1_HAZARD");
				$hazard_text 	= $front_hazard_text[0];
				$(".box"+$pointPageSection+"hazard").html($hazard_text);
				$controls_text 	= $front_hazard_text[1];
				$(".box"+$pointPageSection+"controls").html($controls_text);
			});
		});
	}

	$(document).ready(function() {
		var $to_lang = '<?php echo $to_lang;?>';
		// Onload Heading Text //
			$digital_hazard_heading 	= '<?php echo lang("digital_hazard_heading");?>';
			$.post(js_base_path+'ajax/getTranslatedText', {'paragraphDescription':$digital_hazard_heading,'translateSection':"digital_hazards", 'fromLang':"en", 'toLang':$to_lang}, function(data){
				$(".hazard_heading").html(data);
			});
		
        $('.cmb_hazard_lang').change(function() {
			$active_hazard_item	= $(".hazard-item.in").attr('active_hazard_item');
			var $to_lang 	= $(this).val();

			if( $to_lang) {
				$("#"+$active_hazard_item).each(function() {				
					if( "fire_office1" == $active_hazard_item ) {
						$hazard 	= '<?php echo lang("fire_office1_hazard");?>';
						$controls 	= '<?php echo lang("fire_office1_controls");?>';
						$pointpage_section_id = 1;
					}
					else if( "indoor" == $active_hazard_item ) {
						$hazard 	= '<?php echo lang("indoor_hazard");?>';
						$controls 	= '<?php echo lang("indoor_controls");?>';
						$pointpage_section_id = 2;
					}
					else if( "lighting" == $active_hazard_item ) {
						$hazard 	= '<?php echo lang("lighting_hazard");?>';
						$controls 	= '<?php echo lang("lighting_controls");?>';
						$pointpage_section_id = 3;
					}
					else if( "msd" == $active_hazard_item ) {
						$hazard 	= '<?php echo lang("msd_hazard");?>';
						$controls 	= '<?php echo lang("msd_controls");?>';
						$pointpage_section_id = 4;
					}
					else if( "ladders_office1" == $active_hazard_item ) {
						$hazard 	= '<?php echo lang("ladders_office1_hazard");?>';
						$controls 	= '<?php echo lang("ladders_office1_controls");?>';
						$pointpage_section_id = 5;
					}

					$data_hazards = $hazard+"OFFICE1_HAZARD"+$controls;
					$.post(js_base_path+'ajax/getTranslatedText', {'paragraphDescription':$data_hazards,'translateSection':"digital_hazards", 'fromLang':"en", 'toLang':$to_lang}, function(data){
						var $front_hazard_text = data.split("OFFICE1_HAZARD");
						$hazard_text 	= $front_hazard_text[0];
						$(".box"+$pointpage_section_id+"hazard").html($hazard_text);
						$controls_text 	= $front_hazard_text[1];
						$(".box"+$pointpage_section_id+"controls").html($controls_text);
					});
				});
			}
			else {
				alert("Please select language");
				return false;
			}
        });
	});
	
	
	
	$('#high-rise-front-dropdown').change(function() {
		var $this = $(this),
      	$value = $this.val()
		$("#dot_"+$value).trigger("click");
	});
	$(window).load(function() {
		$('.flexslider').flexslider({
			controlNav: false, 
			animationLoop: false,
			slideshow: false,
			prevText:"", 
			nextText:"", 
			after: function(slider) {
				$active_hazard_item 	= $(".hazard-item.in").attr('active_hazard_item');
				$pointpage_section_id 	= $(".hazard-item.in").attr('pointpage_section_id');
				$total_slides 			= parseInt( $('ul.slides.'+$active_hazard_item+' li').length-1 );
				window.curSlide 		= slider.currentSlide;
				// alert( window.curSlide + ":" + $total_slides + $active_hazard_item);
				if( window.curSlide == $total_slides ) {
					setPagePoints(12, $pointpage_section_id, 'id_modal_points', 'modal_points', $active_hazard_item);
				}
			}
		});
	});
</script>
