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
          <span id="hazard-title"><h3><span class="icon on-left" ><img src="<?php echo $base;?>img/library/hazards.png" width="40" height="40"></span>&nbsp;Office 2 </h3></span>
          <span  class="metro" style="float:right">________ Select ________<br />
          <div class="styled-select">
          <select id="high-rise-front-dropdown" onchange="javascript:updateHazardData(this.value);" class="hazard-drop-down bg-red fg-white" >
          	<option value="">- Select Section</option>
            <option value="electrical">Electrical Hazard</option>
          	<option value="exposure">Exposure to Chemicals</option>
            <option value="fall_heights">Fall from Heights</option>
			<option value="fall_same">Fall Same Level (Slips/trips)</option>
			<option value="falling">Falling Objects</option>
			<option value="struck">Struck By</option>

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
			$rows	= $this->points->hasUserGainedPointsGetPoints(12, 1032, $checkPointsGained=1);
			$img 	= ($rows['has_points_gained']) ? "equip-dot-green" : 'equip-dot';
			?>
		    <a id="dot_fall_heights" href="#fall_heights" data-toggle='modal' onclick="updateHazardData('fall_heights',1);">
            <img class="equip-dot" target="1" data-toggle="tooltip" title="" src="<?php echo $base."img/equip/".$img.".png";?>" style="top:  15.16%;left:33.24%;" data-original-title="Fall from Heights">
			</a>
			<?php 
			$rows	= $this->points->hasUserGainedPointsGetPoints(12, 1033, $checkPointsGained=1);
			$img 	= ($rows['has_points_gained']) ? "equip-dot-green" : 'equip-dot';
			?>
			<a id="dot_electrical" href="#electrical" data-toggle='modal' onclick="updateHazardData('electrical',2);">
            <img class="equip-dot" target="2" data-toggle="tooltip" title="" src="<?php echo $base."img/equip/".$img.".png";?>" style="top: 46.17%;left: 34.31%;" data-original-title="Electrical Hazard">
			</a>
			<?php 
			$rows	= $this->points->hasUserGainedPointsGetPoints(12, 1034, $checkPointsGained=1);
			$img 	= ($rows['has_points_gained']) ? "equip-dot-green" : 'equip-dot';
			?>
			<a id="dot_exposure" href="#exposure_office2" data-toggle='modal' onclick="updateHazardData('exposure_office2',3);">
            <img class="equip-dot" target="3" data-toggle="tooltip" title="" src="<?php echo $base."img/equip/".$img.".png";?>" style="top: 62.2%;left: 45.1%;" data-original-title="Exposure to Chemicals">
			</a>
			<?php 
			$rows	= $this->points->hasUserGainedPointsGetPoints(12, 1035, $checkPointsGained=1);
			$img 	= ($rows['has_points_gained']) ? "equip-dot-green" : 'equip-dot';
			?>
			 <a id="dot_fall_same" href="#fall_same" data-toggle='modal' onclick="updateHazardData('fall_same',4);">
             <img class="equip-dot" target="4" data-toggle="tooltip" title="" src="<?php echo $base."img/equip/".$img.".png";?>" style="top: 23.52%;left: 51.07%;" data-original-title="Fall Same Level (Slips/trips)">
			 </a>
			 <?php 
			$rows	= $this->points->hasUserGainedPointsGetPoints(12, 1036, $checkPointsGained=1);
			$img 	= ($rows['has_points_gained']) ? "equip-dot-green" : 'equip-dot';
			?>
			 <a id="dot_falling" href="#falling_office2" data-toggle='modal' onclick="updateHazardData('falling_office2',5);">
             <img class="equip-dot" target="5" data-toggle="tooltip" title="" src="<?php echo $base."img/equip/".$img.".png";?>" style="top: 29.79%;left: 62.65%;" data-original-title="Falling Objects">
			 </a>
			<?php 
			$rows	= $this->points->hasUserGainedPointsGetPoints(12, 1037, $checkPointsGained=1);
			$img 	= ($rows['has_points_gained']) ? "equip-dot-green" : 'equip-dot';
			?>
			 <a id="dot_struck" href="#struck_office2" data-toggle='modal' onclick="updateHazardData('struck_office2',6);">
             <img class="equip-dot" target="6" data-toggle="tooltip" title="" src="<?php echo $base."img/equip/".$img.".png";?>" style="top: 46.17%;left: 65.20%;" data-original-title="Struck By">
			 </a>

			</div>         
            <img src="<?php echo $base;?>img/hazards/office/2/office_2.jpg">
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
<!-- Start fall_heights  Modal --> 
    <div class="metro">
      <div id="fall_heights" class="modal hide fade hazard-item " active_hazard_item="fall_heights" pointpage_section_id="1032" tabindex="-1" style="max-width:600px;" role="dialog" aria-labelledby="myModalLabel">
      	<div class="modal-header bg-red">
            <h3><span class="icon on-left" ><img src="<?php echo $base;?>img/library/hazards.png" width="30" height="30"></span><strong>Fall from Heights</strong><i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal" onclick="window.location.reload();"></i></h3>
        </div>
       <div class="modal-body" id="body1">
       		<center>
                <div class="flexslider" style="max-width:600px;">
                    <ul class="slides fall_heights">
                        <li rel=1><img src="<?php echo $base;?>img/hazards/office/2/fall_heights1.png"/></li>
                        <li rel=2><img src="<?php echo $base;?>img/hazards/office/2/fall_heights2.png"/></li>
                        <li rel=3><img src="<?php echo $base;?>img/hazards/office/2/fall_heights3.png"/></li>
                        <li rel=4><img src="<?php echo $base;?>img/hazards/office/2/fall_heights4.png"/></li>
                        <li rel=5><img src="<?php echo $base;?>img/hazards/office/stats_message.png"/></li>
                    </ul>
		        </div>
               </center>
				<div class="padding5 clearfix"><?php echo $this->common->callLanguageSelectBox('cmb_hazard_lang', $to_lang, 'cmb_hazard_lang select-right');?></div>

				<div class="profile-user" style="overflow:auto">
                <div class="tab-control no-margin" data-effect="fade" data-role="tab-control">
                    <ul class="tabs">
                        <li class="active user_tab"><a href="#box1description" class="hazard-tab"><i class="on-left-more"><img src="<?php echo $base;?>img/library/hazards.png" width="18" height="18"></i>Hazard</a></li>
                        <li class="user_tab"><a href="#fall_heights_status_modal" class="hazard-tab" data-toggle='modal'><i class="icon-stats-up on-left-more"></i>Stats</a></li>
                        <li class="user_tab"><a href="#box1controls" class="hazard-tab"><i class="icon-dashboard on-left-more"></i>Controls</a></li>
                        <li class="user_tab"><a href="#box1library" class="hazard-tab"><i class="on-left-more"><img src="<?php echo $base;?>img/library/header_menu_training_blank.png" /></i>Library</a></li>
                    </ul>
                    <div class="frames">
                        <div class="frame text-left" id="box1description">
                            <p class="s1content_body_section"><strong>Hazard</strong></p>
                            <p class="s1content_body_section box1hazard"><?php lang("fall_heights_hazard");?></p>
                        </div>
                        <div class="frame text-left" id="box1stats"><p><a  href='#fall_heights_status_modal' data-toggle='modal'>Stats</a></p></div>
                        <div class="frame text-left" id="box1controls">
                            <p class="s1content_body_section" ><strong>Controls</strong></p>
							<p class="s1content_body_section box1controls"><?php lang("fall_heights_controls");?></p>
                        </div>
                        <div class="frame text-left" id="box1library">
                            <div class="row-fluid">
                            <a href='#fall_heights1' data-toggle='modal' class="tile half-library  bg-darker add_to_cart description fall_heights1" >
								<div class="half bg-darker">
									<img src="<?php echo $base;?>img/library/hazards.png">
									<span class="fg-white" style="position:absolute;top:0px;"><small>Fall from Heights</small></span>
								</div>
								<div class="brand">
									<span class="label fg-white text-center">&nbsp;<small><i class=""><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:16px;"></i>&nbsp;10&nbsp;<i class=""><img src="<?php echo $base;?>img/icons_xp.png" style="height:16px;"></i>&nbsp;10</small></span>
								</div>
							</a>
                           
                            <a href='#fall_heights2' data-toggle='modal' class="tile half-library  bg-darker add_to_cart description fall_heights2">
								<div class="half bg-darker">
									<img src="<?php echo $base;?>img/library/procedures.png">
									<span class="fg-white" style="position:absolute;top:0px;"><small>Ladders</small></span>
								</div>
								<div class="brand">                                              
									<span class="label fg-white text-center">&nbsp;<small><i class=""><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:16px;"></i>&nbsp;8&nbsp;<i class=""><img src="<?php echo $base;?>img/icons_xp.png" style="height:16px;"></i>&nbsp;30</small></span>
								</div>
							</a>
							 <a href='#fall_heights3' data-toggle='modal' class="tile half-library  bg-darker add_to_cart description fall_heights3" >
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
    <!-- End fall_heights at Heights Modal -->
	
    <!-- *********** start fall_heights at Heights Stats MODAL page ******************************** -->
	<div id="fall_heights_status_modal" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top:-2%; max-width:700px; max-height:500px" >
		<div class="modal-body"><a href="#" ><img src="<?php echo $base;?>img/hazards/office/2/fall_heights.png" /></a></div>
		<div class="modal-footer bg-gray"><button class="btn" data-dismiss="modal" onclick="$('#fall_heights_status_modal').hide();">Close</button></div>
	</div>
<!-- ******************** end  fall_heights at Heights Stats modal page ************************************* --> 
    <!-- *********** start fall_heights_at_heights1 library Hazard MODAL page ******************************** -->
	<div id="fall_heights1" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top: 10%; width:462px;" >
    <h5 class='margin10'>Fall from Heights Hazard - Office</h5>
    <p class='margin10'><strong>Hazards resulting from falling from a height.</strong></p>
    <h6 class='margin10'>$1.00 - <i ><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:20px" /></i>&nbsp;10 - <i ><img src="<?php echo $base;?>img/icons_xp.png" style="height:20px" /></i>&nbsp;10</h6>
		<div class="modal-footer bg-gray">
        	<a href="<?php echo $base;?>admin/libraries_metro?libtype=3"><button  class="btn hazard_btn">S1 Hazards</button></a>
			<button class="btn" data-dismiss="modal" onclick="$('#fall_heights1').hide();">Close</button>
		</div>
	</div>
<!-- ******************** end fall_heights_at_heights1 library Hazard modal page ************************************* --> 
     <!-- *********** start fall_heights_at_heights2 library Procedure MODAL page ******************************** -->
    
	<div id="fall_heights2" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top: 10%; width:462px;" >
    <h5 class='margin10'>Ladders Procedure – Office</h5>
    <h6 class='margin10'>$1.80 - <i ><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:20px" /></i>&nbsp;8 - <i ><img src="<?php echo $base;?>img/icons_xp.png" style="height:20px" /></i>&nbsp;30</h6>
		
		<div class="modal-footer bg-gray">
        	<a href="<?php echo $base;?>admin/libraries_metro?libtype=4"><button  class="btn hazard_btn">S1 Procedures</button></a>
			<button class="btn" data-dismiss="modal" onclick="$('#fall_heights2').hide();">Close</button>
		</div>
	</div>
<!-- ******************** end fall_heights_at_heights2 library Procedure modal page ************************************* --> 
    <!-- *********** start fall_heights_at_heights3 library Inspection MODAL page ******************************** -->
    <div id="fall_heights3" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top: 10%; width:462px;" >
    <h5 class='margin10'>Housekeeping Inspection - Office</h5>
    <h6 class='margin10'>$4.00 - <i ><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:20px" /></i>&nbsp;20 - <i ><img src="<?php echo $base;?>img/icons_xp.png" style="height:20px" /></i>&nbsp;50</h6>
		
		<div class="modal-footer bg-gray">
        	<a href="<?php echo $base;?>admin/s1_library_inspection_view_metro"><button  class="btn hazard_btn">S1 Inspections</button></a>
			<button class="btn" data-dismiss="modal" onclick="$('#fall_heights3').hide();">Close</button>
		</div>
	</div>
	
<!-- ******************** end fall_heights_at_heights3 library Inspection modal page ************************************* --> 
<script type="text/javascript">

$(function () {
    $(".fall_heights1").on('click', function() {
        $('#fall_heights2').modal('hide');
        $('#fall_heights3').modal('hide');
    });
 	$(".fall_heights2").on('click', function() {
        $('#fall_heights1').modal('hide');
        $('#fall_heights3').modal('hide');
    });
 	$(".fall_heights3").on('click', function() {
        $('#fall_heights1').modal('hide');
        $('#fall_heights2').modal('hide');
    });
   
});
</script>

    <!-- Start electrical OBJECTS Modal --> 
    <div class="metro">
      <div id="electrical" class="modal hide fade hazard-item " active_hazard_item="electrical" pointpage_section_id="1033" tabindex="-1" style="max-width:600px;" role="dialog" aria-labelledby="myModalLabel" >
      	<div class="modal-header bg-red">
            <h3 ><span class="icon on-left" ><img src="<?php echo $base;?>img/library/hazards.png" width="30" height="30"></span><strong>Electrical</strong><i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal" onclick="window.location.reload();"></i></h3>
        </div>
       <div class="modal-body" id="body2" >
       		<center>
                <div class="flexslider" style="max-width:600px;">
                    <ul class="slides electrical">
                        <li rel=1><img src="<?php echo $base;?>img/hazards/office/2/electrical1.png"/></li>
                        <li rel=2><img src="<?php echo $base;?>img/hazards/office/2/electrical2.png"/></li>
                        <li rel=3><img src="<?php echo $base;?>img/hazards/office/2/electrical3.png"/></li>
                        <li rel=4><img src="<?php echo $base;?>img/hazards/office/2/electrical4.png"/></li>
                        <li rel=5><img src="<?php echo $base;?>img/hazards/office/2/electrical5.png"/></li>
                        <li rel=6><img src="<?php echo $base;?>img/hazards/office/stats_message.png"/></li>

                    </ul>
		        </div>
               </center>
            
			<div class="padding5 clearfix"><?php echo $this->common->callLanguageSelectBox('cmb_hazard_lang', $to_lang, 'cmb_hazard_lang select-right');?></div>
				
	        <div class="profile-user">
                <div class="tab-control no-margin" data-effect="fade" data-role="tab-control">
                    <ul class="tabs">
                        <li class="active user_tab"><a href="#box2description" class="hazard-tab"><i class="on-left-more"><img src="<?php echo $base;?>img/library/hazards.png" width="18" height="18"></i>Hazard</a></li>
                        <li class="user_tab"><a href="#electrical_status_modal" class="hazard-tab" data-toggle='modal'><i class="icon-stats-up on-left-more"></i>Stats</a></li>
                        <li class="user_tab"><a href="#box2controls" class="hazard-tab"><i class="icon-dashboard on-left-more"></i>Controls</a></li>
                        <li class="user_tab"><a href="#box2library" class="hazard-tab"><i class="on-left-more"><img src="<?php echo $base;?>img/library/header_menu_training_blank.png" /></i>Library</a></li>
                    </ul>
                    <div class="frames">
                        
                        <div class="frame text-left" id="box2description">
                        	<p class="s1content_body_section" ><strong>Hazard</strong></p>
							<p class="s1content_body_section box2hazard"><?php lang("electrical_hazard");?></p>
                        </div>
                        <div class="frame text-left" id="box2stats">
                            <p><a  href='#electrical_status_modal' data-toggle='modal'>Stats</a></p>
                        </div>
                        <div class="frame text-left" id="box2controls">
                         <p class="s1content_body_section" ><strong>Controls</strong></p>
						 <p class="s1content_body_section box2controls"><?php lang("electrical_controls");?></p>
                        </div>
                     
                        <div class="frame text-left" id="box2library">
                            <div class="row-fluid">
                            <a href='#electrical1' data-toggle='modal' class="tile half-library  bg-darker add_to_cart description electrical1">
									<div class="half bg-darker">
										<img src="<?php echo $base;?>img/library/hazards.png">
										<span class="fg-white" style="position:absolute;top:0px;"><small>Electrical</small></span>
									</div>
									<div class="brand">                                              
										<span class="label fg-white text-center">&nbsp;<small><i class=""><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:16px;"></i>&nbsp;10&nbsp;<i class=""><img src="<?php echo $base;?>img/icons_xp.png" style="height:16px;"></i>&nbsp;10</small></span>
									</div>
								</a>
                            
                            <a href='#electrical2' data-toggle='modal' class="tile half-library  bg-darker add_to_cart description electrical2">
									<div class="half bg-darker">
										<img src="<?php echo $base;?>img/library/procedures.png">
										<span class="fg-white" style="position:absolute;top:0px;"><small>Lock out Tag Out</small></span>
									</div>
									<div class="brand">                                              
										<span class="label fg-white text-center">&nbsp;<small><i class=""><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:16px;"></i>&nbsp;8&nbsp;<i class=""><img src="<?php echo $base;?>img/icons_xp.png" style="height:16px;"></i>&nbsp;30</small></span>
									</div>
								</a>
								<a href='#electrical3' data-toggle='modal' class="tile half-library  bg-darker add_to_cart description electrical3" >
									<div class="half bg-darker">
										<img src="<?php echo $base;?>img/library/inspections.png">
										<span class="fg-white" style="position:absolute;top:0px;"><small>Electrical</small></span>
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
    <!-- End electrical OBJECTS Modal -->
	
	
             <!-- *********** start electrical OBJECTS Stats MODAL page ******************************** -->
	<div id="electrical_status_modal" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top:-2%; max-width:700px;" >
		<div class="modal-body"><a href="#" ><img src="<?php echo $base;?>img/hazards/office/2/electrical.png" /></a></div>
		<div class="modal-footer bg-gray"><button class="btn" data-dismiss="modal" onclick="$('#electrical_status_modal').hide();">Close</button></div>
	</div>
<!-- ******************** end  electrical OBJECTS Stats modal page ************************************* --> 
     <!-- *********** start electrical1 library Hazard MODAL page ******************************** -->
    
	<div id="electrical1" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top: 10%; width:462px;" >
    <h5 class='margin10'>Electrical Hazard - Office</h5>
    <p class='margin10'><strong>Office - Electrical Due Diligence</strong></p>
    <h6 class='margin10'>$1.00 - <i ><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:20px" /></i>&nbsp;10 - <i ><img src="<?php echo $base;?>img/icons_xp.png" style="height:20px" /></i>&nbsp;10</h6>
		
		<div class="modal-footer bg-gray">
        	<a href="<?php echo $base;?>admin/libraries_metro?libtype=3"><button  class="btn hazard_btn">S1 Hazards</button></a>
			<button class="btn" data-dismiss="modal" onclick="$('#electrical1').hide();">Close</button>
		</div>
	</div>
<!-- ******************** end electrical1 library Hazard modal page ************************************* --> 
    <!-- *********** start electrical2 library Procedure MODAL page ******************************** -->
    
	<div id="electrical2" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top: 10%; width:462px;" >
    <h5 class='margin10'>Lock out Tag Out Procedure - Office</h5>
    <h6 class='margin10'>$1.80 - <i ><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:20px" /></i>&nbsp;8 - <i ><img src="<?php echo $base;?>img/icons_xp.png" style="height:20px" /></i>&nbsp;30</h6>
		
		<div class="modal-footer bg-gray">
        	<a href="<?php echo $base;?>admin/libraries_metro?libtype=4"><button  class="btn hazard_btn">S1 Procedures</button></a>
			<button class="btn" data-dismiss="modal" onclick="$('#electrical2').hide();">Close</button>
		</div>
	</div>
<!-- ******************** end electrical2 library Procedure modal page ************************************* -->
     <!-- *********** start electrical3 library Inspection MODAL page ******************************** -->
    
	<div id="electrical3" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top: 10%; width:462px;" >
    <h5 class='margin10'>Electrical Inspection - Office</h5>
    <h6 class='margin10'>$4.00 - <i ><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:20px" /></i>&nbsp;20 - <i ><img src="<?php echo $base;?>img/icons_xp.png" style="height:20px" /></i>&nbsp;50</h6>
		
		<div class="modal-footer bg-gray">
        	<a href="<?php echo $base;?>admin/s1_library_inspection_view_metro"><button  class="btn hazard_btn">S1 Inspections</button></a>
			<button class="btn" data-dismiss="modal" onclick="$('#electrical3').hide();">Close</button>
		</div>
	</div>
<!-- ******************** end electrical3 library Inspection modal page ************************************* --> 
 <script type="text/javascript">

$(function () {
    $(".electrical1").on('click', function() {
        $('#electrical2').modal('hide');
        $('#electrical3').modal('hide');
    });
 	$(".electrical2").on('click', function() {
        $('#electrical1').modal('hide');
        $('#electrical3').modal('hide');
    });
 	$(".electrical3").on('click', function() {
        $('#electrical1').modal('hide');
        $('#electrical2').modal('hide');
    });
   
});
</script>   


    <!-- Start exposure  Modal --> 
    <div class="metro">
      <div id="exposure_office2" class="modal hide fade hazard-item " active_hazard_item="exposure_office2" pointpage_section_id="1034" tabindex="-1" style="max-width:600px;" role="dialog" aria-labelledby="myModalLabel" >
     
      	<div class="modal-header bg-red">
            <h3 ><span class="icon on-left" ><img src="<?php echo $base;?>img/library/hazards.png" width="30" height="30"></span><strong>Exposure to Chemicals</strong><i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal" onclick="window.location.reload();"></i></h3>
        </div>
       <div class="modal-body" id="body3" >
       		<center>
                
                <div class="flexslider" style="max-width:600px;">
                    <ul class="slides exposure_office2">
                        <li rel=1><img src="<?php echo $base;?>img/hazards/office/2/exposure1.png"/></li>
                        <li rel=2><img src="<?php echo $base;?>img/hazards/office/2/exposure2.png"/></li>
                        <li rel=3><img src="<?php echo $base;?>img/hazards/office/2/exposure3.png"/></li>
                        <li rel=4><img src="<?php echo $base;?>img/hazards/office/2/exposure4.png"/></li>
                        <li rel=5><img src="<?php echo $base;?>img/hazards/office/stats_message.png"/></li>

                    </ul>
                    
		        </div>
               </center>
            
			<div class="padding5 clearfix"><?php echo $this->common->callLanguageSelectBox('cmb_hazard_lang', $to_lang, 'cmb_hazard_lang select-right');?></div>
	        <div class="profile-user">
                <div class="tab-control no-margin" data-effect="fade" data-role="tab-control">
                    <ul class="tabs">
                        <li class="active user_tab"><a href="#box3description" class="hazard-tab"><i class="on-left-more"><img src="<?php echo $base;?>img/library/hazards.png" width="18" height="18"></i>Hazard</a></li>
                        <li class="user_tab"><a href="#exposure_status_modal" class="hazard-tab" data-toggle='modal'><i class="icon-stats-up on-left-more"></i>Stats</a></li>
                        <li class="user_tab"><a href="#box3controls" class="hazard-tab"><i class="icon-dashboard on-left-more"></i>Controls</a></li>
                        <li class="user_tab"><a href="#box3library" class="hazard-tab"><i class="on-left-more"><img src="<?php echo $base;?>img/library/header_menu_training_blank.png" /></i>Library</a></li>
                    </ul>
                    <div class="frames">
                        <div class="frame text-left" id="box3description">
                        <p class="s1content_body_section"><strong>Hazard</strong></p>
						<p class="s1content_body_section box3hazard"><?php lang("exposure_office2_hazard");?></p>
                        </div>
                        <div class="frame text-left" id="box3stats"><p><a  href='#exposure_status_modal' data-toggle='modal'>Stats</a></p></div>
                        <div class="frame text-left" id="box3controls">
							<p class="s1content_body_section"><strong>Controls</strong></p>
							<p class="s1content_body_section box3controls"><?php lang("exposure_office2_controls");?></p>
                        </div>
                        <div class="frame text-left" id="box3library">
                            <div class="row-fluid">
								<a href='#exposure1' data-toggle='modal' class="tile half-library exposure1 bg-darker add_to_cart description">
									<div class="half bg-darker">
										<img src="<?php echo $base;?>img/library/hazards.png">
										<span class="fg-white" style="position:absolute;top:0px;"><small>Exposure</small></span>
									</div>
									<div class="brand">                                              
										<span class="label fg-white text-center">&nbsp;<small><i class=""><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:16px;"></i>&nbsp;10&nbsp;<i class=""><img src="<?php echo $base;?>img/icons_xp.png" style="height:16px;"></i>&nbsp;10</small></span>
									</div>
								</a>
                            <a href='#exposure2' data-toggle='modal' class="tile half-library exposure2 bg-darker add_to_cart description">
								<div class="half bg-darker">
									<img src="<?php echo $base;?>img/library/procedures.png">
									<span class="fg-white" style="position:absolute;top:0px;"><small>Clean Up Spills</small></span>
								</div>
								<div class="brand">                                              
									<span class="label fg-white text-center">&nbsp;<small><i class=""><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:16px;"></i>&nbsp;8&nbsp;<i class=""><img src="<?php echo $base;?>img/icons_xp.png" style="height:16px;"></i>&nbsp;30</small></span>
								</div>
							</a>
                            <a href='#exposure3' data-toggle='modal' class="tile half-library exposure3 bg-darker add_to_cart description" >
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
            
    <!-- End exposure  Modal -->
<!-- *********** start exposure  Stats MODAL page ******************************** -->
    
	<div id="exposure_status_modal" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top:-2%; max-width:700px;" >
		<div class="modal-body"><a href="#"><img src="<?php echo $base;?>img/hazards/office/2/exposure.png"/></a></div>
		<div class="modal-footer bg-gray"><button class="btn" data-dismiss="modal" onclick="$('#exposure_status_modal').hide();">Close</button></div>
	</div>
<!-- ******************** end exposure Stats modal page ************************************* -->     

	<!-- *********** start exposure1 library Hazard MODAL page ******************************** -->
	<div id="exposure1" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top: 10%; width:462px;" >
		<h5 class='margin10'>Exposure to Chemicals Hazard – Office</h5>
		<p class='margin10'><strong>Hazards associated with exposure to chemicals.</strong></p>
		<h6 class='margin10'>$1.00 - <i ><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:20px" /></i>&nbsp;10 - <i ><img src="<?php echo $base;?>img/icons_xp.png" style="height:20px" /></i>&nbsp;10</h6>
		<div class="modal-footer bg-gray">
        	<a href="<?php echo $base;?>admin/libraries_metro?libtype=3"><button  class="btn hazard_btn">S1 Hazards</button></a>
			<button class="btn" data-dismiss="modal" onclick="$('#exposure1').hide();">Close</button>
		</div>
	</div>
	<!-- ******************** end exposure1 library Hazard modal page ************************************* --> 
    
	<!-- *********** start exposure2 library Procedure MODAL page ******************************** -->
	<div id="exposure2" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top: 10%; width:462px;" >
    <h5 class='margin10'>Clean Up Spills (Chemicals) Procedure – Office</h5>
    <h6 class='margin10'>$1.80 - <i ><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:20px" /></i>&nbsp;8 - <i ><img src="<?php echo $base;?>img/icons_xp.png" style="height:20px" /></i>&nbsp;30</h6>
		
		<div class="modal-footer bg-gray">
        	<a href="<?php echo $base;?>admin/libraries_metro?libtype=4"><button  class="btn hazard_btn">S1 Procedures</button></a>
			<button class="btn" data-dismiss="modal" onclick="$('#exposure2').hide();">Close</button>
		</div>
	</div>
<!-- ******************** end exposure2 library Procedure modal page ************************************* --> 
     <!-- *********** start exposure3 library Inspection MODAL page ******************************** -->
    
	<div id="exposure3" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top: 10%; width:462px;" >
    <h5 class='margin10'>Housekeeping Inspection - Office</h5>
    <h6 class='margin10'>$4.00 - <i ><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:20px" /></i>&nbsp;20 - <i ><img src="<?php echo $base;?>img/icons_xp.png" style="height:20px" /></i>&nbsp;50</h6>
		
		<div class="modal-footer bg-gray">
        	<a href="<?php echo $base;?>admin/s1_library_inspection_view_metro"><button  class="btn hazard_btn">S1 Inspections</button></a>
			<button class="btn" data-dismiss="modal" onclick="$('#exposure3').hide();">Close</button>
		</div>
	</div>
<!-- ******************** end exposure3 library Inspection modal page ************************************* --> 
<script type="text/javascript">

$(function () {
    $(".exposure1").on('click', function() {
        $('#exposure2').modal('hide');
        $('#exposure3').modal('hide');
    });
 	$(".exposure2").on('click', function() {
        $('#exposure1').modal('hide');
        $('#exposure3').modal('hide');
    });
 	$(".exposure3").on('click', function() {
        $('#exposure1').modal('hide');
        $('#exposure2').modal('hide');
    });
   
});
</script> 
    

   

    <!-- Start fall_same  Modal --> 
    <div class="metro">
      <div id="fall_same" class="modal hide fade hazard-item " active_hazard_item="fall_same" pointpage_section_id="1035" tabindex="-1" style="max-width:600px;" role="dialog" aria-labelledby="myModalLabel" >
     
      	<div class="modal-header bg-red">
            <h3 ><span class="icon on-left" ><img src="<?php echo $base;?>img/library/hazards.png" width="30" height="30"></span><strong>Fall Same Level (Slips/trips)</strong><i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal" onclick="window.location.reload();"></i></h3>
        </div>
       <div class="modal-body" id="body4" >
       		<center>
                
                <div class="flexslider" style="max-width:600px;">
                    <ul class="slides fall_same">
                        <li rel=1><img src="<?php echo $base;?>img/hazards/office/2/fall_same1.png"/></li>
                        <li rel=2><img src="<?php echo $base;?>img/hazards/office/2/fall_same2.png"/></li>
                        <li rel=3><img src="<?php echo $base;?>img/hazards/office/2/fall_same3.png"/></li>
                        <li rel=4><img src="<?php echo $base;?>img/hazards/office/2/fall_same4.png"/></li>
                        <li rel=5><img src="<?php echo $base;?>img/hazards/office/2/fall_same5.png"/></li>
                        <li rel=6><img src="<?php echo $base;?>img/hazards/office/stats_message.png"/></li>

                    </ul>
                    
		        </div>
               </center>
            
			<div class="padding5 clearfix"><?php echo $this->common->callLanguageSelectBox('cmb_hazard_lang', $to_lang, 'cmb_hazard_lang select-right');?></div>
	        <div class="profile-user">
                <div class="tab-control no-margin" data-effect="fade" data-role="tab-control">
                    <ul class="tabs">
                        <li class="active user_tab"><a href="#box4description" class="hazard-tab"><i class="on-left-more"><img src="<?php echo $base;?>img/library/hazards.png" width="18" height="18"></i>Hazard</a></li>
                        <li class="user_tab"><a href="#fall_same_status_modal" class="hazard-tab" data-toggle='modal'><i class="icon-stats-up on-left-more"></i>Stats</a></li>
                        <li class="user_tab"><a href="#box4controls" class="hazard-tab"><i class="icon-dashboard on-left-more"></i>Controls</a></li>
                        <li class="user_tab"><a href="#box4library" class="hazard-tab"><i class="on-left-more"><img src="<?php echo $base;?>img/library/header_menu_training_blank.png" /></i>Library</a></li>
                    </ul>
                    <div class="frames">
                        <div class="frame text-left" id="box4description">
                        <p class="s1content_body_section"><strong>Hazard</strong></p>
						<p class="s1content_body_section box4hazard"><?php lang("fall_same_hazard");?></p>
                        </div>
                        <div class="frame text-left" id="box4stats"><p><a  href='#fall_same_status_modal' data-toggle='modal'>Stats</a></p></div>
                        <div class="frame text-left" id="box4controls">
							<p class="s1content_body_section"><strong>Controls</strong></p>
							<p class="s1content_body_section box4controls"><?php lang("fall_same_controls");?></p>
                        </div>
                        <div class="frame text-left" id="box4library">
                            <div class="row-fluid">
								<a href='#fall_same1' data-toggle='modal' class="tile half-library fall_same1 bg-darker add_to_cart description">
									<div class="half bg-darker">
										<img src="<?php echo $base;?>img/library/hazards.png">
										<span class="fg-white" style="position:absolute;top:0px;"><small>Fall Same Level</small></span>
									</div>
									<div class="brand">                                              
										<span class="label fg-white text-center">&nbsp;<small><i class=""><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:16px;"></i>&nbsp;10&nbsp;<i class=""><img src="<?php echo $base;?>img/icons_xp.png" style="height:16px;"></i>&nbsp;10</small></span>
									</div>
								</a>
                            <a href='#fall_same2' data-toggle='modal' class="tile half-library fall_same2 bg-darker add_to_cart description">
								<div class="half bg-darker">
									<img src="<?php echo $base;?>img/library/procedures.png">
									<span class="fg-white" style="position:absolute;top:0px;"><small>Housekeeping</small></span>
								</div>
								<div class="brand">                                              
									<span class="label fg-white text-center">&nbsp;<small><i class=""><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:16px;"></i>&nbsp;8&nbsp;<i class=""><img src="<?php echo $base;?>img/icons_xp.png" style="height:16px;"></i>&nbsp;30</small></span>
								</div>
							</a>
                            <a href='#fall_same3' data-toggle='modal' class="tile half-library fall_same3 bg-darker add_to_cart description" >
								<div class="half bg-darker">
									<img src="<?php echo $base;?>img/library/inspections.png">
									<span class="fg-white" style="position:absolute;top:0px;"><small>General Workplace</small></span>
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
            
    <!-- End fall_same  Modal -->
<!-- *********** start fall_same  Stats MODAL page ******************************** -->
    
	<div id="fall_same_status_modal" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top:-2%; max-width:700px;" >
		<div class="modal-body"><a href="#"><img src="<?php echo $base;?>img/hazards/office/2/fall_same.png"/></a></div>
		<div class="modal-footer bg-gray"><button class="btn" data-dismiss="modal" onclick="$('#fall_same_status_modal').hide();">Close</button></div>
	</div>
<!-- ******************** end fall_same Stats modal page ************************************* -->     

	<!-- *********** start fall_same1 library Hazard MODAL page ******************************** -->
	<div id="fall_same1" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top: 10%; width:462px;" >
		<h5 class='margin10'>Fall From Same Level Hazard – Office</h5>
		<p class='margin10'><strong>Hazards when falling on same level.</strong></p>
		<h6 class='margin10'>$1.00 - <i ><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:20px" /></i>&nbsp;10 - <i ><img src="<?php echo $base;?>img/icons_xp.png" style="height:20px" /></i>&nbsp;10</h6>
		<div class="modal-footer bg-gray">
        	<a href="<?php echo $base;?>admin/libraries_metro?libtype=3"><button  class="btn hazard_btn">S1 Hazards</button></a>
			<button class="btn" data-dismiss="modal" onclick="$('#fall_same1').hide();">Close</button>
		</div>
	</div>
	<!-- ******************** end fall_same1 library Hazard modal page ************************************* --> 
    
	<!-- *********** start fall_same2 library Procedure MODAL page ******************************** -->
	<div id="fall_same2" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top: 10%; width:462px;" >
    <h5 class='margin10'>Housekeeping Procedure – Office</h5>
    <h6 class='margin10'>$1.80 - <i ><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:20px" /></i>&nbsp;8 - <i ><img src="<?php echo $base;?>img/icons_xp.png" style="height:20px" /></i>&nbsp;30</h6>
		
		<div class="modal-footer bg-gray">
        	<a href="<?php echo $base;?>admin/libraries_metro?libtype=4"><button  class="btn hazard_btn">S1 Procedures</button></a>
			<button class="btn" data-dismiss="modal" onclick="$('#fall_same2').hide();">Close</button>
		</div>
	</div>
<!-- ******************** end fall_same2 library Procedure modal page ************************************* --> 
     <!-- *********** start fall_same3 library Inspection MODAL page ******************************** -->
    
	<div id="fall_same3" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top: 10%; width:462px;" >
    <h5 class='margin10'>General Workplace Practise Inspection - Office</h5>
    <h6 class='margin10'>$4.00 - <i ><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:20px" /></i>&nbsp;20 - <i ><img src="<?php echo $base;?>img/icons_xp.png" style="height:20px" /></i>&nbsp;50</h6>
		
		<div class="modal-footer bg-gray">
        	<a href="<?php echo $base;?>admin/s1_library_inspection_view_metro"><button  class="btn hazard_btn">S1 Inspections</button></a>
			<button class="btn" data-dismiss="modal" onclick="$('#fall_same3').hide();">Close</button>
		</div>
	</div>
<!-- ******************** end fall_same3 library Inspection modal page ************************************* --> 
<script type="text/javascript">

$(function () {
    $(".fall_same1").on('click', function() {
        $('#fall_same2').modal('hide');
        $('#fall_same3').modal('hide');
    });
 	$(".fall_same2").on('click', function() {
        $('#fall_same1').modal('hide');
        $('#fall_same3').modal('hide');
    });
 	$(".fall_same3").on('click', function() {
        $('#fall_same1').modal('hide');
        $('#fall_same2').modal('hide');
    });
   
});
</script> 

    <!-- Start falling  Modal --> 
    <div class="metro">
      <div id="falling_office2" class="modal hide fade hazard-item " active_hazard_item="falling_office2" pointpage_section_id="1036" tabindex="-1" style="max-width:600px;" role="dialog" aria-labelledby="myModalLabel" >
     
      	<div class="modal-header bg-red">
            <h3 ><span class="icon on-left" ><img src="<?php echo $base;?>img/library/hazards.png" width="30" height="30"></span><strong>Falling Objects</strong><i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal" onclick="window.location.reload();"></i></h3>
        </div>
       <div class="modal-body" id="body5" >
       		<center>
                
                <div class="flexslider" style="max-width:600px;">
                    <ul class="slides falling_office2">
                        <li rel=1><img src="<?php echo $base;?>img/hazards/office/2/falling1.png"/></li>
                        <li rel=2><img src="<?php echo $base;?>img/hazards/office/2/falling2.png"/></li>
                        <li rel=3><img src="<?php echo $base;?>img/hazards/office/stats_message.png"/></li>

                    </ul>
                    
		        </div>
               </center>
            
			<div class="padding5 clearfix"><?php echo $this->common->callLanguageSelectBox('cmb_hazard_lang', $to_lang, 'cmb_hazard_lang select-right');?></div>
	        <div class="profile-user">
                <div class="tab-control no-margin" data-effect="fade" data-role="tab-control">
                    <ul class="tabs">
                        <li class="active user_tab"><a href="#box5description" class="hazard-tab"><i class="on-left-more"><img src="<?php echo $base;?>img/library/hazards.png" width="18" height="18"></i>Hazard</a></li>
                        <li class="user_tab"><a href="#falling_status_modal" class="hazard-tab" data-toggle='modal'><i class="icon-stats-up on-left-more"></i>Stats</a></li>
                        <li class="user_tab"><a href="#box5controls" class="hazard-tab"><i class="icon-dashboard on-left-more"></i>Controls</a></li>
                        <li class="user_tab"><a href="#box5library" class="hazard-tab"><i class="on-left-more"><img src="<?php echo $base;?>img/library/header_menu_training_blank.png" /></i>Library</a></li>
                    </ul>
                    <div class="frames">
                        <div class="frame text-left" id="box5description">
                        <p class="s1content_body_section"><strong>Hazard</strong></p>
						<p class="s1content_body_section box5hazard"><?php lang("falling_office2_hazard");?></p>
                        </div>
                        <div class="frame text-left" id="box5stats"><p><a  href='#falling_status_modal' data-toggle='modal'>Stats</a></p></div>
                        <div class="frame text-left" id="box5controls">
							<p class="s1content_body_section"><strong>Controls</strong></p>
							<p class="s1content_body_section box5controls"><?php lang("falling_office2_controls");?></p>
                        </div>
                        <div class="frame text-left" id="box5library">
                            <div class="row-fluid">
								<a href='#falling1' data-toggle='modal' class="tile half-library falling1 bg-darker add_to_cart description">
									<div class="half bg-darker">
										<img src="<?php echo $base;?>img/library/hazards.png">
										<span class="fg-white" style="position:absolute;top:0px;"><small>Falling Objects</small></span>
									</div>
									<div class="brand">                                              
										<span class="label fg-white text-center">&nbsp;<small><i class=""><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:16px;"></i>&nbsp;10&nbsp;<i class=""><img src="<?php echo $base;?>img/icons_xp.png" style="height:16px;"></i>&nbsp;10</small></span>
									</div>
								</a>
                            <a href='#falling2' data-toggle='modal' class="tile half-library falling2 bg-darker add_to_cart description">
								<div class="half bg-darker">
									<img src="<?php echo $base;?>img/library/procedures.png">
									<span class="fg-white" style="position:absolute;top:0px;"><small>Material Handling</small></span>
								</div>
								<div class="brand">                                              
									<span class="label fg-white text-center">&nbsp;<small><i class=""><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:16px;"></i>&nbsp;8&nbsp;<i class=""><img src="<?php echo $base;?>img/icons_xp.png" style="height:16px;"></i>&nbsp;30</small></span>
								</div>
							</a>
                            <a href='#falling3' data-toggle='modal' class="tile half-library falling3 bg-darker add_to_cart description" >
								<div class="half bg-darker">
									<img src="<?php echo $base;?>img/library/inspections.png">
									<span class="fg-white" style="position:absolute;top:0px;"><small>Housekeeping </small></span>
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
            
    <!-- End falling  Modal -->
<!-- *********** start falling  Stats MODAL page ******************************** -->
    
	<div id="falling_status_modal" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top:-2%; max-width:700px;" >
		<div class="modal-body"><a href="#"><img src="<?php echo $base;?>img/hazards/office/2/falling.png"/></a></div>
		<div class="modal-footer bg-gray"><button class="btn" data-dismiss="modal" onclick="$('#falling_status_modal').hide();">Close</button></div>
	</div>
<!-- ******************** end falling Stats modal page ************************************* -->     

	<!-- *********** start falling1 library Hazard MODAL page ******************************** -->
	<div id="falling1" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top: 10%; width:462px;" >
		<h5 class='margin10'>Falling Objects Hazards – Office</h5>
		<p class='margin10'><strong>Hazards resulting from falling objects.</strong></p>
		<h6 class='margin10'>$1.00 - <i ><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:20px" /></i>&nbsp;10 - <i ><img src="<?php echo $base;?>img/icons_xp.png" style="height:20px" /></i>&nbsp;10</h6>
		<div class="modal-footer bg-gray">
        	<a href="<?php echo $base;?>admin/libraries_metro?libtype=3"><button  class="btn hazard_btn">S1 Hazards</button></a>
			<button class="btn" data-dismiss="modal" onclick="$('#falling1').hide();">Close</button>
		</div>
	</div>
	<!-- ******************** end falling1 library Hazard modal page ************************************* --> 
    
	<!-- *********** start falling2 library Procedure MODAL page ******************************** -->
	<div id="falling2" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top: 10%; width:462px;" >
    <h5 class='margin10'>Material Handling Procedure – Office</h5>
    <h6 class='margin10'>$1.80 - <i ><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:20px" /></i>&nbsp;8 - <i ><img src="<?php echo $base;?>img/icons_xp.png" style="height:20px" /></i>&nbsp;30</h6>
		
		<div class="modal-footer bg-gray">
        	<a href="<?php echo $base;?>admin/libraries_metro?libtype=4"><button  class="btn hazard_btn">S1 Procedures</button></a>
			<button class="btn" data-dismiss="modal" onclick="$('#falling2').hide();">Close</button>
		</div>
	</div>
<!-- ******************** end falling2 library Procedure modal page ************************************* --> 
     <!-- *********** start falling3 library Inspection MODAL page ******************************** -->
    
	<div id="falling3" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top: 10%; width:462px;" >
    <h5 class='margin10'>Housekeeping Inspections - Office</h5>
    <h6 class='margin10'>$4.00 - <i ><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:20px" /></i>&nbsp;20 - <i ><img src="<?php echo $base;?>img/icons_xp.png" style="height:20px" /></i>&nbsp;50</h6>
		
		<div class="modal-footer bg-gray">
        	<a href="<?php echo $base;?>admin/s1_library_inspection_view_metro"><button  class="btn hazard_btn">S1 Inspections</button></a>
			<button class="btn" data-dismiss="modal" onclick="$('#falling3').hide();">Close</button>
		</div>
	</div>
<!-- ******************** end falling3 library Inspection modal page ************************************* --> 
<script type="text/javascript">

$(function () {
    $(".falling1").on('click', function() {
        $('#falling2').modal('hide');
        $('#falling3').modal('hide');
    });
 	$(".falling2").on('click', function() {
        $('#falling1').modal('hide');
        $('#falling3').modal('hide');
    });
 	$(".falling3").on('click', function() {
        $('#falling1').modal('hide');
        $('#falling2').modal('hide');
    });
   
});
</script> 



 <!-- Start struck  Modal --> 
    <div class="metro">
      <div id="struck_office2" class="modal hide fade hazard-item " active_hazard_item="struck_office2" pointpage_section_id="1037" tabindex="-1" style="max-width:600px;" role="dialog" aria-labelledby="myModalLabel" >
     
      	<div class="modal-header bg-red">
            <h3 ><span class="icon on-left" ><img src="<?php echo $base;?>img/library/hazards.png" width="30" height="30"></span><strong>Struck By</strong><i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal" onclick="window.location.reload();"></i></h3>
        </div>
       <div class="modal-body" id="body6" >
       		<center>
                
                <div class="flexslider" style="max-width:600px;">
                    <ul class="slides struck_office2">
                        <li rel=1><img src="<?php echo $base;?>img/hazards/office/2/struck1.png"/></li>
                        <li rel=2><img src="<?php echo $base;?>img/hazards/office/2/struck2.png"/></li>
                        <li rel=3><img src="<?php echo $base;?>img/hazards/office/2/struck3.png"/></li>
                        <li rel=4><img src="<?php echo $base;?>img/hazards/office/2/struck4.png"/></li>
                        <li rel=5><img src="<?php echo $base;?>img/hazards/office/stats_message.png"/></li>

                    </ul>
                    
		        </div>
               </center>
            
			<div class="padding5 clearfix"><?php echo $this->common->callLanguageSelectBox('cmb_hazard_lang', $to_lang, 'cmb_hazard_lang select-right');?></div>
	        <div class="profile-user">
                <div class="tab-control no-margin" data-effect="fade" data-role="tab-control">
                    <ul class="tabs">
                        <li class="active user_tab"><a href="#box6description" class="hazard-tab"><i class="on-left-more"><img src="<?php echo $base;?>img/library/hazards.png" width="18" height="18"></i>Hazard</a></li>
                        <li class="user_tab"><a href="#struck_status_modal" class="hazard-tab" data-toggle='modal'><i class="icon-stats-up on-left-more"></i>Stats</a></li>
                        <li class="user_tab"><a href="#box6controls" class="hazard-tab"><i class="icon-dashboard on-left-more"></i>Controls</a></li>
                        <li class="user_tab"><a href="#box6library" class="hazard-tab"><i class="on-left-more"><img src="<?php echo $base;?>img/library/header_menu_training_blank.png" /></i>Library</a></li>
                    </ul>
                    <div class="frames">
                        <div class="frame text-left" id="box6description">
                        <p class="s1content_body_section"><strong>Hazard</strong></p>
						<p class="s1content_body_section box6hazard"><?php lang("struck_office2_hazard");?></p>
                        </div>
                        <div class="frame text-left" id="box6stats"><p><a  href='#struck_status_modal' data-toggle='modal'>Stats</a></p></div>
                        <div class="frame text-left" id="box6controls">
							<p class="s1content_body_section"><strong>Controls</strong></p>
							<p class="s1content_body_section box6controls"><?php lang("struck_office2_controls");?></p>
                        </div>
                        <div class="frame text-left" id="box6library">
                            <div class="row-fluid">
								<a href='#struck1' data-toggle='modal' class="tile half-library struck1 bg-darker add_to_cart description">
									<div class="half bg-darker">
										<img src="<?php echo $base;?>img/library/hazards.png">
										<span class="fg-white" style="position:absolute;top:0px;"><small>Struck By</small></span>
									</div>
									<div class="brand">                                              
										<span class="label fg-white text-center">&nbsp;<small><i class=""><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:16px;"></i>&nbsp;10&nbsp;<i class=""><img src="<?php echo $base;?>img/icons_xp.png" style="height:16px;"></i>&nbsp;10</small></span>
									</div>
								</a>
                            <a href='#struck2' data-toggle='modal' class="tile half-library struck2 bg-darker add_to_cart description">
								<div class="half bg-darker">
									<img src="<?php echo $base;?>img/library/procedures.png">
									<span class="fg-white" style="position:absolute;top:0px;"><small>Falling Objects</small></span>
								</div>
								<div class="brand">                                              
									<span class="label fg-white text-center">&nbsp;<small><i class=""><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:16px;"></i>&nbsp;8&nbsp;<i class=""><img src="<?php echo $base;?>img/icons_xp.png" style="height:16px;"></i>&nbsp;30</small></span>
								</div>
							</a>
                            <a href='#struck3' data-toggle='modal' class="tile half-library struck3 bg-darker add_to_cart description" >
								<div class="half bg-darker">
									<img src="<?php echo $base;?>img/library/inspections.png">
									<span class="fg-white" style="position:absolute;top:0px;"><small>Material Storage</small></span>
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
            
    <!-- End struck  Modal -->
<!-- *********** start struck  Stats MODAL page ******************************** -->
    
	<div id="struck_status_modal" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top:-2%; max-width:700px;" >
		<div class="modal-body"><a href="#"><img src="<?php echo $base;?>img/hazards/office/2/struck.png"/></a></div>
		<div class="modal-footer bg-gray"><button class="btn" data-dismiss="modal" onclick="$('#struck_status_modal').hide();">Close</button></div>
	</div>
<!-- ******************** end struck Stats modal page ************************************* -->     

	<!-- *********** start struck1 library Hazard MODAL page ******************************** -->
	<div id="struck1" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top: 10%; width:462px;" >
		<h5 class='margin10'>Office - Struck by Objects/Material</h5>
		<p class='margin10'><strong>Hazards resulting from being struck by any objects or equipment.</strong></p>
		<h6 class='margin10'>$1.00 - <i ><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:20px" /></i>&nbsp;10 - <i ><img src="<?php echo $base;?>img/icons_xp.png" style="height:20px" /></i>&nbsp;10</h6>
		<div class="modal-footer bg-gray">
        	<a href="<?php echo $base;?>admin/libraries_metro?libtype=3"><button  class="btn hazard_btn">S1 Hazards</button></a>
			<button class="btn" data-dismiss="modal" onclick="$('#struck1').hide();">Close</button>
		</div>
	</div>
	<!-- ******************** end struck1 library Hazard modal page ************************************* --> 
    
	<!-- *********** start struck2 library Procedure MODAL page ******************************** -->
	<div id="struck2" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top: 10%; width:462px;" >
    <h5 class='margin10'>Falling Objects Procedure – Office</h5>
    <h6 class='margin10'>$1.80 - <i ><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:20px" /></i>&nbsp;8 - <i ><img src="<?php echo $base;?>img/icons_xp.png" style="height:20px" /></i>&nbsp;30</h6>
		
		<div class="modal-footer bg-gray">
        	<a href="<?php echo $base;?>admin/libraries_metro?libtype=4"><button  class="btn hazard_btn">S1 Procedures</button></a>
			<button class="btn" data-dismiss="modal" onclick="$('#struck2').hide();">Close</button>
		</div>
	</div>
<!-- ******************** end struck2 library Procedure modal page ************************************* --> 
     <!-- *********** start struck3 library Inspection MODAL page ******************************** -->
    
	<div id="struck3" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top: 10%; width:462px;" >
    <h5 class='margin10'>Material Storage Inspection - Office</h5>
    <h6 class='margin10'>$4.00 - <i ><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:20px" /></i>&nbsp;20 - <i ><img src="<?php echo $base;?>img/icons_xp.png" style="height:20px" /></i>&nbsp;50</h6>
		
		<div class="modal-footer bg-gray">
        	<a href="<?php echo $base;?>admin/s1_library_inspection_view_metro"><button  class="btn hazard_btn">S1 Inspections</button></a>
			<button class="btn" data-dismiss="modal" onclick="$('#struck3').hide();">Close</button>
		</div>
	</div>
<!-- ******************** end struck3 library Inspection modal page ************************************* --> 
<script type="text/javascript">

$(function () {
    $(".struck1").on('click', function() {
        $('#struck2').modal('hide');
        $('#struck3').modal('hide');
    });
 	$(".struck2").on('click', function() {
        $('#struck1').modal('hide');
        $('#struck3').modal('hide');
    });
 	$(".struck3").on('click', function() {
        $('#struck1').modal('hide');
        $('#struck2').modal('hide');
    });
   
});
</script> 

     <!-- *********** start Sponsored by MODAL page ******************************** -->
    
	<div id="sponsoredby" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none; max-width:462px;" >
		<a href="http://bairrada.ca/" target="new">
        <img src="<?php echo $base;?>img/sponsor/office/2/ad1.jpg" />
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
	// window.onload = updateHazardData("fall",1);
	function updateHazardData($hazardSection,$pointPageSection)
	{
		var $to_lang = '<?php echo $to_lang;?>';
		$active_hazard_item 	= $hazardSection;
		$("#"+$active_hazard_item).each(function() {
			if( "fall_heights" == $active_hazard_item ) {
				$hazard 	= '<?php echo lang("fall_heights_hazard");?>';
				$controls 	= '<?php echo lang("fall_heights_controls");?>';
			}
			else if( "electrical" == $active_hazard_item ) {
				$hazard 	= '<?php echo lang("electrical_hazard");?>';
				$controls 	= '<?php echo lang("electrical_controls");?>';
			}
			else if( "exposure_office2" == $active_hazard_item ) {
				$hazard 	= '<?php echo lang("exposure_office2_hazard");?>';
				$controls 	= '<?php echo lang("exposure_office2_controls");?>';
			}
			else if( "fall_same" == $active_hazard_item ) {
				$hazard 	= '<?php echo lang("fall_same_hazard");?>';
				$controls 	= '<?php echo lang("fall_same_controls");?>';
			}
			else if( "falling_office2" == $active_hazard_item ) {
				$hazard 	= '<?php echo lang("falling_office2_hazard");?>';
				$controls 	= '<?php echo lang("falling_office2_controls");?>';
			}
			else if( "struck_office2" == $active_hazard_item ) {
				$hazard 	= '<?php echo lang("struck_office2_hazard");?>';
				$controls 	= '<?php echo lang("struck_office2_controls");?>';
			}

			$data_hazards = $hazard+"OFFICE2_HAZARD"+$controls;

			$.post(js_base_path+'ajax/getTranslatedText', {'paragraphDescription':$data_hazards,'translateSection':"digital_hazards", 'fromLang':"en", 'toLang':$to_lang}, function(data){
				var $front_hazard_text = data.split("OFFICE2_HAZARD");
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
					if( "fall_heights" == $active_hazard_item ) {
						$hazard 	= '<?php echo lang("fall_heights_hazard");?>';
						$controls 	= '<?php echo lang("fall_heights_controls");?>';
						$pointpage_section_id = 1;
					}
					else if( "electrical" == $active_hazard_item ) {
						$hazard 	= '<?php echo lang("electrical_hazard");?>';
						$controls 	= '<?php echo lang("electrical_controls");?>';
						$pointpage_section_id = 2;
					}
					else if( "exposure_office2" == $active_hazard_item ) {
						$hazard 	= '<?php echo lang("exposure_office2_hazard");?>';
						$controls 	= '<?php echo lang("exposure_office2_controls");?>';
						$pointpage_section_id = 3;
					}
					else if( "fall_same" == $active_hazard_item ) {
						$hazard 	= '<?php echo lang("fall_same_hazard");?>';
						$controls 	= '<?php echo lang("fall_same_controls");?>';
						$pointpage_section_id = 4;
					}
					else if( "falling_office2" == $active_hazard_item ) {
						$hazard 	= '<?php echo lang("falling_office2_hazard");?>';
						$controls 	= '<?php echo lang("falling_office2_controls");?>';
						$pointpage_section_id = 5;
					}
					else if( "struck_office2" == $active_hazard_item ) {
						$hazard 	= '<?php echo lang("struck_office2_hazard");?>';
						$controls 	= '<?php echo lang("struck_office2_controls");?>';
						$pointpage_section_id = 6;
					}

					$data_hazards = $hazard+"OFFICE2_HAZARD"+$controls;
					$.post(js_base_path+'ajax/getTranslatedText', {'paragraphDescription':$data_hazards,'translateSection':"digital_hazards", 'fromLang':"en", 'toLang':$to_lang}, function(data){
						var $front_hazard_text = data.split("OFFICE2_HAZARD");
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
