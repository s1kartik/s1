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
          <span id="hazard-title"><h3><span class="icon on-left" ><img src="<?php echo $base;?>img/library/hazards.png" width="40" height="40"></span>&nbsp;High Rise Front Side </h3></span>
          <span  class="metro" style="float:right">________ Select ________<br />
          <div class="styled-select">
          <select id="high-rise-front-dropdown" onchange="javascript:updateHazardData(this.value);" class="hazard-drop-down bg-red fg-white" >
          	<option value="">- Select Section</option>
            <option value="fall">Fall At Heights</option>
          	<option value="falling">Falling Objects</option>
            <option value="struck">Struck By </option>
			<option value="trench">Trench Collapse</option>
          </select>
          </div>
         </div>
         <div class="cart-info hazard_heading"><h5><?php echo lang("digital_hazard_heading");?></h5></div>
		</div>
    <!-- End cart widget -->
  </div>
  </div>    
    <div id="equip-container" class="row-fluid"> 
    <div id="hazards-image"  class="span12">
        <div class="profile-content-box"> 
          <div class="equip-dots">
			<?php 
			$rows	= $this->points->hasUserGainedPointsGetPoints(1, 1, $checkPointsGained=1);
			$img 	= ($rows['has_points_gained']) ? "equip-dot-green" : 'equip-dot';
			?>
		    <a id="dot_fall" href="#fall" data-toggle='modal' onclick="updateHazardData('fall',1);">
            <img class="equip-dot" target="1" data-toggle="tooltip" title="" src="<?php echo $base."img/equip/".$img.".png";?>" style="top: 47%;left: 62%;" data-original-title="Fall At Heights">
			</a>
			<?php 
			$rows	= $this->points->hasUserGainedPointsGetPoints(1, 2, $checkPointsGained=1);
			$img 	= ($rows['has_points_gained']) ? "equip-dot-green" : 'equip-dot';
			?>
			<a id="dot_falling" href="#falling" data-toggle='modal' onclick="updateHazardData('falling',2);">
            <img class="equip-dot" target="2" data-toggle="tooltip" title="" src="<?php echo $base."img/equip/".$img.".png";?>" style="top: 65%;left: 37%;" data-original-title="Falling Objects">
			</a>
			<?php 
			$rows	= $this->points->hasUserGainedPointsGetPoints(1, 3, $checkPointsGained=1);
			$img 	= ($rows['has_points_gained']) ? "equip-dot-green" : 'equip-dot';
			?>
			<a id="dot_struck" href="#struck" data-toggle='modal' onclick="updateHazardData('struck',3);">
            <img class="equip-dot" target="3" data-toggle="tooltip" title="" src="<?php echo $base."img/equip/".$img.".png";?>" style="top: 67%;left: 53%;" data-original-title="Struck By">
			</a>
			<?php 
			$rows	= $this->points->hasUserGainedPointsGetPoints(1, 4, $checkPointsGained=1);
			$img 	= ($rows['has_points_gained']) ? "equip-dot-green" : 'equip-dot';
			?>
			 <a id="dot_trench" href="#trench" data-toggle='modal' onclick="updateHazardData('trench',4);">
             <img class="equip-dot" target="4" data-toggle="tooltip" title="" src="<?php echo $base."img/equip/".$img.".png";?>" style="top: 68%;left: 10%;" data-original-title="Trench Collapse ">
			 </a>
			</div>         
            <img src="<?php echo $base;?>img/hazards/construction/high_rise/front/high_front.jpg">
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
<!-- Start Fall At Heights Modal --> 
    <div class="metro">
      <div id="fall" class="modal hide fade hazard-item " active_hazard_item="fall" pointpage_section_id="1" tabindex="-1" style="max-width:600px;" role="dialog" aria-labelledby="myModalLabel">
      	<div class="modal-header bg-red">
            <h3><span class="icon on-left" ><img src="<?php echo $base;?>img/library/hazards.png" width="30" height="30"></span><strong>Fall at Heights</strong><i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal" onclick="window.location.reload();"></i></h3>
        </div>
       <div class="modal-body" id="body1">
       		<center>
                <div class="flexslider" style="max-width:600px;">
                    <ul class="slides fall">
                        <li rel=1><img src="<?php echo $base;?>img/hazards/construction/high_rise/front/haz-1.jpg"/></li>
                        <li rel=2><img src="<?php echo $base;?>img/hazards/construction/high_rise/front/haz-2.jpg"/></li>
                        <li rel=3><img src="<?php echo $base;?>img/hazards/construction/high_rise/front/haz-3.jpg"/></li>
                        <li rel=4><img src="<?php echo $base;?>img/hazards/construction/high_rise/front/haz-4.jpg"/></li>
                        <li rel=5><img src="<?php echo $base;?>img/hazards/construction/high_rise/front/haz-5.jpg"/></li>
                        <li rel=6><img src="<?php echo $base;?>img/hazards/construction/high_rise/front/haz-6.jpg"/></li>
                        <li rel=7><img src="<?php echo $base;?>img/hazards/construction/stats_message.png"/></li>
                    </ul>
		        </div>
               </center>
				<div class="padding5 clearfix"><?php echo $this->common->callLanguageSelectBox('cmb_hazard_lang', $to_lang, 'cmb_hazard_lang select-right');?></div>

				<div class="profile-user" style="overflow:auto">
                <div class="tab-control no-margin" data-effect="fade" data-role="tab-control">
                    <ul class="tabs">
                        <li class="active user_tab"><a href="#box1description" class="hazard-tab"><i class="on-left-more"><img src="<?php echo $base;?>img/library/hazards.png" width="18" height="18"></i>Hazard</a></li>
                        <li class="user_tab"><a href="#fall_at_heights_status_modal" class="hazard-tab" data-toggle='modal'><i class="icon-stats-up on-left-more"></i>Stats</a></li>
                        <li class="user_tab"><a href="#box1controls" class="hazard-tab"><i class="icon-dashboard on-left-more"></i>Controls</a></li>
                        <li class="user_tab"><a href="#box1library" class="hazard-tab"><i class="on-left-more"><img src="<?php echo $base;?>img/library/header_menu_training_blank.png" /></i>Library</a></li>
                    </ul>
                    <div class="frames">
                        <div class="frame text-left" id="box1description">
                            <p class="s1content_body_section"><strong>Hazard</strong></p>
                            <p class="s1content_body_section box1hazard"><?php lang("fall_hazard");?></p>
                        </div>
                        <div class="frame text-left" id="box1stats"><p><a  href='#fall_at_heights_status_modal' data-toggle='modal'>Stats</a></p></div>
                        <div class="frame text-left" id="box1controls">
                            <p class="s1content_body_section" ><strong>Controls</strong></p>
							<p class="s1content_body_section box1controls"><?php lang("fall_controls");?></p>
                        </div>
                        <div class="frame text-left" id="box1library">
                            <div class="row-fluid">
                            <a href='#fall_at_heights1' data-toggle='modal' class="tile half-library  bg-darker add_to_cart description fall_at_heights1" >
								<div class="half bg-darker">
									<img src="<?php echo $base;?>img/library/hazards.png">
									<span class="fg-white" style="position:absolute;top:0px;"><small>Fall From Heights</small></span>
								</div>
								<div class="brand">
									<span class="label fg-white text-center">&nbsp;<small><i class=""><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:16px;"></i>&nbsp;5&nbsp;<i class=""><img src="<?php echo $base;?>img/icons_xp.png" style="height:16px;"></i>&nbsp;5</small></span>
								</div>
							</a>
                           
                            <a href='#fall_at_heights2' data-toggle='modal' class="tile half-library  bg-darker add_to_cart description fall_at_heights2">
								<div class="half bg-darker">
									<img src="<?php echo $base;?>img/library/procedures.png">
									<span class="fg-white" style="position:absolute;top:0px;"><small>Fall Arrest</small></span>
								</div>
								<div class="brand">                                              
									<span class="label fg-white text-center">&nbsp;<small><i class=""><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:16px;"></i>&nbsp;20&nbsp;<i class=""><img src="<?php echo $base;?>img/icons_xp.png" style="height:16px;"></i>&nbsp;10</small></span>
								</div>
							</a>
							 <a href='#fall_at_heights3' data-toggle='modal' class="tile half-library  bg-darker add_to_cart description fall_at_heights3" >
								<div class="half bg-darker">
									<img src="<?php echo $base;?>img/library/inspections.png">
									<span class="fg-white" style="position:absolute;top:0px;"><small>Fall Protection</small></span>
								</div>
								<div class="brand">                                              
									<span class="label fg-white text-center">&nbsp;<small><i class=""><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:16px;"></i>&nbsp;20&nbsp;<i class=""><img src="<?php echo $base;?>img/icons_xp.png" style="height:16px;"></i>&nbsp;200</small></span>
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
    <!-- End Fall at Heights Modal -->
	
    <!-- *********** start Fall at Heights Stats MODAL page ******************************** -->
	<div id="fall_at_heights_status_modal" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top:-2%; max-width:700px; max-height:500px" >
		<div class="modal-body"><a href="#" ><img src="<?php echo $base;?>img/hazards/construction/high_rise/front/fall_at_heights_stats.png" /></a></div>
		<div class="modal-footer bg-gray"><button class="btn" data-dismiss="modal" onclick="$('#fall_at_heights_status_modal').hide();">Close</button></div>
	</div>
<!-- ******************** end  Fall at Heights Stats modal page ************************************* --> 
    <!-- *********** start fall_at_heights1 library Hazard MODAL page ******************************** -->
	<div id="fall_at_heights1" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top: 10%; width:462px;" >
    <h5 class='margin10'>Fall From Heights Hazard</h5>
    <p class='margin10'><strong>When a worker is exposed to a fall related hazards that could cause the worker to fall from one or more levels to the next, these falls include but are not limited to; Roofs, scaffolds, ladders, multiple levels of a building, heavy equipment.</strong></p>
    <h6 class='margin10'>$5.00 - <i ><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:20px" /></i>&nbsp;5 - <i ><img src="<?php echo $base;?>img/icons_xp.png" style="height:20px" /></i>&nbsp;5</h6>
		<div class="modal-footer bg-gray">
        	<a href="<?php echo $base;?>admin/libraries_metro?libtype=3"><button  class="btn hazard_btn">S1 Hazards</button></a>
			<button class="btn" data-dismiss="modal" onclick="$('#fall_at_heights1').hide();">Close</button>
		</div>
	</div>
<!-- ******************** end fall_at_heights1 library Hazard modal page ************************************* --> 
     <!-- *********** start fall_at_heights2 library Procedure MODAL page ******************************** -->
    
	<div id="fall_at_heights2" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top: 10%; width:462px;" >
    <h5 class='margin10'>Fall Arrest Procedure</h5>
    <h6 class='margin10'>$14.00 - <i ><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:20px" /></i>&nbsp;20 - <i ><img src="<?php echo $base;?>img/icons_xp.png" style="height:20px" /></i>&nbsp;10</h6>
		
		<div class="modal-footer bg-gray">
        	<a href="<?php echo $base;?>admin/libraries_metro?libtype=4"><button  class="btn hazard_btn">S1 Procedures</button></a>
			<button class="btn" data-dismiss="modal" onclick="$('#fall_at_heights2').hide();">Close</button>
		</div>
	</div>
<!-- ******************** end fall_at_heights2 library Procedure modal page ************************************* --> 
    <!-- *********** start fall_at_heights3 library Inspection MODAL page ******************************** -->
    <div id="fall_at_heights3" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top: 10%; width:462px;" >
    <h5 class='margin10'>Fall Protection and Travel Restraint Inspection</h5>
    <h6 class='margin10'>$4.00 - <i ><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:20px" /></i>&nbsp;20 - <i ><img src="<?php echo $base;?>img/icons_xp.png" style="height:20px" /></i>&nbsp;200</h6>
		
		<div class="modal-footer bg-gray">
        	<a href="<?php echo $base;?>admin/s1_library_inspection_view_metro"><button  class="btn hazard_btn">S1 Inspections</button></a>
			<button class="btn" data-dismiss="modal" onclick="$('#fall_at_heights3').hide();">Close</button>
		</div>
	</div>
	
<!-- ******************** end fall_at_heights3 library Inspection modal page ************************************* --> 
<script type="text/javascript">

$(function () {
    $(".fall_at_heights1").on('click', function() {
        $('#fall_at_heights2').modal('hide');
        $('#fall_at_heights3').modal('hide');
    });
 	$(".fall_at_heights2").on('click', function() {
        $('#fall_at_heights1').modal('hide');
        $('#fall_at_heights3').modal('hide');
    });
 	$(".fall_at_heights3").on('click', function() {
        $('#fall_at_heights1').modal('hide');
        $('#fall_at_heights2').modal('hide');
    });
   
});
</script>

    <!-- Start FALLING OBJECTS Modal --> 
    <div class="metro">
      <div id="falling" class="modal hide fade hazard-item " active_hazard_item="falling" pointpage_section_id="2" tabindex="-1" style="max-width:600px;" role="dialog" aria-labelledby="myModalLabel" >
      	<div class="modal-header bg-red">
            <h3 ><span class="icon on-left" ><img src="<?php echo $base;?>img/library/hazards.png" width="30" height="30"></span><strong>Falling Objects</strong><i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal" onclick="window.location.reload();"></i></h3>
        </div>
       <div class="modal-body" id="body2" >
       		<center>
                <div class="flexslider" style="max-width:600px;">
                    <ul class="slides falling">
                        <li><img src="<?php echo $base;?>img/hazards/construction/high_rise/front/haz-7.jpg"/></li>
                        <li><img src="<?php echo $base;?>img/hazards/construction/high_rise/front/haz-8.jpg"/></li>
                        <li><img src="<?php echo $base;?>img/hazards/construction/high_rise/front/haz-9.jpg"/></li>
                        <li><img src="<?php echo $base;?>img/hazards/construction/high_rise/front/haz-10.jpg"/></li>
                        <li><img src="<?php echo $base;?>img/hazards/construction/high_rise/front/haz-11.jpg"/></li>
                        <li><img src="<?php echo $base;?>img/hazards/construction/high_rise/front/haz-12.jpg"/></li>
                        <li><img src="<?php echo $base;?>img/hazards/construction/stats_message.png"/></li>
                    </ul>
		        </div>
               </center>
            
			<div class="padding5 clearfix"><?php echo $this->common->callLanguageSelectBox('cmb_hazard_lang', $to_lang, 'cmb_hazard_lang select-right');?></div>
				
	        <div class="profile-user">
                <div class="tab-control no-margin" data-effect="fade" data-role="tab-control">
                    <ul class="tabs">
                        <li class="active user_tab"><a href="#box2description" class="hazard-tab"><i class="on-left-more"><img src="<?php echo $base;?>img/library/hazards.png" width="18" height="18"></i>Hazard</a></li>
                        <li class="user_tab"><a href="#falling_objects_status_modal" class="hazard-tab" data-toggle='modal'><i class="icon-stats-up on-left-more"></i>Stats</a></li>
                        <li class="user_tab"><a href="#box2controls" class="hazard-tab"><i class="icon-dashboard on-left-more"></i>Controls</a></li>
                        <li class="user_tab"><a href="#box2library" class="hazard-tab"><i class="on-left-more"><img src="<?php echo $base;?>img/library/header_menu_training_blank.png" /></i>Library</a></li>
                    </ul>
                    <div class="frames">
                        
                        <div class="frame text-left" id="box2description">
                        	<p class="s1content_body_section" ><strong>Hazard</strong></p>
							<p class="s1content_body_section box2hazard"><?php lang("falling_hazard");?></p>
                        </div>
                        <div class="frame text-left" id="box2stats">
                            <p><a  href='#falling_objects_status_modal' data-toggle='modal'>Stats</a></p>
                        </div>
                        <div class="frame text-left" id="box2controls">
                         <p class="s1content_body_section" ><strong>Controls</strong></p>
						 <p class="s1content_body_section box2controls"><?php lang("falling_controls");?></p>
                        </div>
                     
                        <div class="frame text-left" id="box2library">
                            <div class="row-fluid">
                            <a href='#falling1' data-toggle='modal' class="tile half-library  bg-darker add_to_cart description falling1">
									<div class="half bg-darker">
										<img src="<?php echo $base;?>img/library/hazards.png">
										<span class="fg-white" style="position:absolute;top:0px;"><small>Falling Objects</small></span>
									</div>
									<div class="brand">                                              
										<span class="label fg-white text-center">&nbsp;<small><i class=""><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:16px;"></i>&nbsp;5&nbsp;<i class=""><img src="<?php echo $base;?>img/icons_xp.png" style="height:16px;"></i>&nbsp;5</small></span>
									</div>
								</a>
                            
                            <a href='#falling2' data-toggle='modal' class="tile half-library  bg-darker add_to_cart description falling2">
									<div class="half bg-darker">
										<img src="<?php echo $base;?>img/library/procedures.png">
										<span class="fg-white" style="position:absolute;top:0px;"><small>Floor Opening</small></span>
									</div>
									<div class="brand">                                              
										<span class="label fg-white text-center">&nbsp;<small><i class=""><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:16px;"></i>&nbsp;20&nbsp;<i class=""><img src="<?php echo $base;?>img/icons_xp.png" style="height:16px;"></i>&nbsp;10</small></span>
									</div>
								</a>
								<a href='#falling3' data-toggle='modal' class="tile half-library  bg-darker add_to_cart description falling3" >
									<div class="half bg-darker">
										<img src="<?php echo $base;?>img/library/inspections.png">
										<span class="fg-white" style="position:absolute;top:0px;"><small>Overhead Protection</small></span>
									</div>
									<div class="brand">                                              
										<span class="label fg-white text-center">&nbsp;<small><i class=""><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:16px;"></i>&nbsp;20&nbsp;<i class=""><img src="<?php echo $base;?>img/icons_xp.png" style="height:16px;"></i>&nbsp;200</small></span>
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
    <!-- End FALLING OBJECTS Modal -->
	
	
             <!-- *********** start FALLING OBJECTS Stats MODAL page ******************************** -->
	<div id="falling_objects_status_modal" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top:-2%; max-width:700px;" >
		<div class="modal-body"><a href="#" ><img src="<?php echo $base;?>img/hazards/construction/high_rise/front/falling_objects_stats.png" /></a></div>
		<div class="modal-footer bg-gray"><button class="btn" data-dismiss="modal" onclick="$('#falling_objects_status_modal').hide();">Close</button></div>
	</div>
<!-- ******************** end  FALLING OBJECTS Stats modal page ************************************* --> 
     <!-- *********** start Falling1 library Hazard MODAL page ******************************** -->
    
	<div id="falling1" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top: 10%; width:462px;" >
    <h5 class='margin10'>Falling Objects Hazard</h5>
    <p class='margin10'><strong>Clothing and equipment used to protect worker from workplace health and safety hazards.</strong></p>
    <h6 class='margin10'>$5.00 - <i ><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:20px" /></i>&nbsp;5 - <i ><img src="<?php echo $base;?>img/icons_xp.png" style="height:20px" /></i>&nbsp;5</h6>
		
		<div class="modal-footer bg-gray">
        	<a href="<?php echo $base;?>admin/libraries_metro?libtype=3"><button  class="btn hazard_btn">S1 Hazards</button></a>
			<button class="btn" data-dismiss="modal" onclick="$('#falling1').hide();">Close</button>
		</div>
	</div>
<!-- ******************** end falling1 library Hazard modal page ************************************* --> 
    <!-- *********** start falling2 library Procedure MODAL page ******************************** -->
    
	<div id="falling2" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top: 10%; width:462px;" >
    <h5 class='margin10'>Floor Opening Procedure</h5>
    <h6 class='margin10'>$14.00 - <i ><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:20px" /></i>&nbsp;20 - <i ><img src="<?php echo $base;?>img/icons_xp.png" style="height:20px" /></i>&nbsp;10</h6>
		
		<div class="modal-footer bg-gray">
        	<a href="<?php echo $base;?>admin/libraries_metro?libtype=4"><button  class="btn hazard_btn">S1 Procedures</button></a>
			<button class="btn" data-dismiss="modal" onclick="$('#falling2').hide();">Close</button>
		</div>
	</div>
<!-- ******************** end falling2 library Procedure modal page ************************************* -->
     <!-- *********** start falling3 library Inspection MODAL page ******************************** -->
    
	<div id="falling3" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top: 10%; width:462px;" >
    <h5 class='margin10'>Overhead Protection Inspection</h5>
    <h6 class='margin10'>$4.00 - <i ><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:20px" /></i>&nbsp;20 - <i ><img src="<?php echo $base;?>img/icons_xp.png" style="height:20px" /></i>&nbsp;200</h6>
		
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

    
    <!-- Start STRUCK BY Modal --> 
    <div class="metro">
      <div id="struck" class="modal hide fade hazard-item " active_hazard_item="struck" pointpage_section_id="3" tabindex="-1" style="max-width:600px;" role="dialog" aria-labelledby="myModalLabel" >
      	<div class="modal-header bg-red">
            <h3 ><span class="icon on-left" ><img src="<?php echo $base;?>img/library/hazards.png" width="30" height="30"></span><strong>Struck By</strong><i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal" onclick="window.location.reload();"></i></h3>
        </div>
       <div class="modal-body" id="body3" >
       		<center>
                
                <div class="flexslider" style="max-width:600px;">
                    <ul class="slides struck">
                        <li><img src="<?php echo $base;?>img/hazards/construction/high_rise/front/haz-13.jpg"/></li>
                        <li><img src="<?php echo $base;?>img/hazards/construction/high_rise/front/haz-14.jpg"/></li>
                        <li><img src="<?php echo $base;?>img/hazards/construction/high_rise/front/haz-15.jpg"/></li>
                        <li><img src="<?php echo $base;?>img/hazards/construction/high_rise/front/haz-16.jpg"/></li>
                        <li><img src="<?php echo $base;?>img/hazards/construction/high_rise/front/haz-17.jpg"/></li>
                        <li><img src="<?php echo $base;?>img/hazards/construction/high_rise/front/haz-18.jpg"/></li>
                        <li><img src="<?php echo $base;?>img/hazards/construction/stats_message.png"/></li>
                    </ul>
                    
		        </div>
               </center>
            
			<div class="padding5 clearfix"><?php echo $this->common->callLanguageSelectBox('cmb_hazard_lang', $to_lang, 'cmb_hazard_lang select-right');?></div>
	        <div class="profile-user">
                <div class="tab-control no-margin" data-effect="fade" data-role="tab-control">
                    <ul class="tabs">
                        <li class="active user_tab"><a href="#box3description" class="hazard-tab"><i class="on-left-more"><img src="<?php echo $base;?>img/library/hazards.png" width="18" height="18"></i>Hazard</a></li>
                        <li class="user_tab"><a href="#struck_by_status_modal" class="hazard-tab" data-toggle='modal'><i class="icon-stats-up on-left-more"></i>Stats</a></li>
                        <li class="user_tab"><a href="#box3controls" class="hazard-tab"><i class="icon-dashboard on-left-more"></i>Controls</a></li>
                        <li class="user_tab"><a href="#box3library" class="hazard-tab"><i class="on-left-more"><img src="<?php echo $base;?>img/library/header_menu_training_blank.png" /></i>Library</a></li>
                    </ul>
                    <div class="frames">
                        
                        <div class="frame text-left" id="box3description">
                        	<p class="s1content_body_section" ><strong>Hazard</strong></p>
							<p class="s1content_body_section box3hazard"><?php lang("struck_hazard");?></p>
                        </div>
                        <div class="frame text-left" id="box3stats">
                         
                            <p><a  href='#struck_by_status_modal' data-toggle='modal'>Stats</a></p>
                          
                           
                        </div>
                        <div class="frame text-left" id="box3controls">
                         <p class="s1content_body_section" ><strong>Controls</strong></p>
						 <p class="s1content_body_section box3controls"><?php lang("struck_controls");?></p>
                        </div>
                     
                        <div class="frame text-left" id="box3library">
                            <div class="row-fluid">
                             <a href='#struck1' data-toggle='modal' class="tile half-library struck1 bg-darker add_to_cart description">
									<div class="half bg-darker">
										<img src="<?php echo $base;?>img/library/hazards.png">
										<span class="fg-white" style="position:absolute;top:0px;"><small>Struck By</small></span>
									</div>
									<div class="brand">                                              
										<span class="label fg-white text-center">&nbsp;<small><i class=""><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:16px;"></i>&nbsp;5&nbsp;<i class=""><img src="<?php echo $base;?>img/icons_xp.png" style="height:16px;"></i>&nbsp;5</small></span>
									</div>
								</a>
                            
                            <a href='#struck2' data-toggle='modal' class="tile half-library struck2 bg-darker add_to_cart description">
									<div class="half bg-darker">
										<img src="<?php echo $base;?>img/library/procedures.png">
										<span class="fg-white" style="position:absolute;top:0px;"><small>Backing Up Vehicles</small></span>
									</div>
									<div class="brand">                                              
										<span class="label fg-white text-center">&nbsp;<small><i class=""><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:16px;"></i>&nbsp;20&nbsp;<i class=""><img src="<?php echo $base;?>img/icons_xp.png" style="height:16px;"></i>&nbsp;10</small></span>
									</div>
								</a>
								<a href='#struck3' data-toggle='modal' class="tile half-library struck3 bg-darker add_to_cart description" >
									<div class="half bg-darker">
										<img src="<?php echo $base;?>img/library/inspections.png">
										<span class="fg-white" style="position:absolute;top:0px;"><small>Guardrail Inspection</small></span>
									</div>
									<div class="brand">                                              
										<span class="label fg-white text-center">&nbsp;<small><i class=""><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:16px;"></i>&nbsp;20&nbsp;<i class=""><img src="<?php echo $base;?>img/icons_xp.png" style="height:16px;"></i>&nbsp;200</small></span>
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
            
    <!-- End STRUCK BY Modal -->
 <!-- *********** start STRUCK BY Stats MODAL page ******************************** -->
    
	<div id="struck_by_status_modal" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top:-2%; max-width:700px;" >
		<div class="modal-body">
        <a href="#" >
        <img src="<?php echo $base;?>img/hazards/construction/high_rise/front/struck_by_stats.png" />
        
        </a>
        </div>
		<div class="modal-footer bg-gray">
			<button class="btn" data-dismiss="modal" onclick="$('#struck_by_status_modal').hide();">Close</button>
		</div>
	</div>
<!-- ******************** end STRUCK BY Stats modal page ************************************* --> 
     <!-- *********** start struck1 library Hazard MODAL page ******************************** -->
    
	<div id="struck1" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top: 10%; width:462px;" >
    <h5 class='margin10'>Construction - Struck By Objects or Equipment Hazard</h5>
    <p class='margin10'><strong>Being hit by (struck by) tools, material, equipment or vehicles. You can be struck by objects moving across a space, swinging objects, falling objects, and rolling objects.</strong></p>
    <h6 class='margin10'>$5.00 - <i ><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:20px" /></i>&nbsp;5 - <i ><img src="<?php echo $base;?>img/icons_xp.png" style="height:20px" /></i>&nbsp;5</h6>
		
		<div class="modal-footer bg-gray">
        	<a href="<?php echo $base;?>admin/libraries_metro?libtype=3"><button  class="btn hazard_btn">S1 Hazards</button></a>
			<button class="btn" data-dismiss="modal" onclick="$('#struck1').hide();">Close</button>
		</div>
	</div>
<!-- ******************** end struck1 library Hazard modal page ************************************* --> 
     <!-- *********** start struck2 library Procedure MODAL page ******************************** -->
     
	<div id="struck2" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top: 10%; width:462px;" >
    <h5 class='margin10'>Backing Up Vehicles Procedure</h5>
    <h6 class='margin10'>$14.00 - <i ><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:20px" /></i>&nbsp;20 - <i ><img src="<?php echo $base;?>img/icons_xp.png" style="height:20px" /></i>&nbsp;10</h6>
		
		<div class="modal-footer bg-gray">
        	<a href="<?php echo $base;?>admin/libraries_metro?libtype=4"><button  class="btn hazard_btn">S1 Procedures</button></a>
			<button class="btn" data-dismiss="modal" onclick="$('#struck2').hide();">Close</button>
		</div>
	</div>

<!-- ******************** end struck2 library Procedure modal page ************************************* --> 
    <!-- *********** start struck3 library Inspection MODAL page ******************************** -->
        
	<div id="struck3" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top: 10%; width:462px;" >
    <h5 class='margin10'>Guardrail Inspection</h5>
    <h6 class='margin10'>$4.00 - <i ><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:20px" /></i>&nbsp;20 - <i ><img src="<?php echo $base;?>img/icons_xp.png" style="height:20px" /></i>&nbsp;200</h6>
		
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

    <!-- Start TRENCH COLLAPSE Modal --> 
    <div class="metro">
      <div id="trench" class="modal hide fade hazard-item " active_hazard_item="trench" pointpage_section_id="4" tabindex="-1" style="max-width:600px;" role="dialog" aria-labelledby="myModalLabel" >
     
      	<div class="modal-header bg-red">
            <h3 ><span class="icon on-left" ><img src="<?php echo $base;?>img/library/hazards.png" width="30" height="30"></span><strong>Trench Collapse</strong><i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal" onclick="window.location.reload();"></i></h3>
        </div>
       <div class="modal-body" id="body4" >
       		<center>
                
                <div class="flexslider" style="max-width:600px;">
                    <ul class="slides trench">
                        <li><img src="<?php echo $base;?>img/hazards/construction/high_rise/front/haz-19.jpg"/></li>
                        <li><img src="<?php echo $base;?>img/hazards/construction/high_rise/front/haz-20.jpg"/></li>
                        <li><img src="<?php echo $base;?>img/hazards/construction/high_rise/front/haz-21.jpg"/></li>
                        <li><img src="<?php echo $base;?>img/hazards/construction/high_rise/front/haz-22.jpg"/></li>
                        <li><img src="<?php echo $base;?>img/hazards/construction/high_rise/front/haz-23.jpg"/></li>
                        <li><img src="<?php echo $base;?>img/hazards/construction/high_rise/front/haz-24.jpg"/></li>
                        <li><img src="<?php echo $base;?>img/hazards/construction/stats_message.png"/></li>
                    </ul>
                    
		        </div>
               </center>
            
			<div class="padding5 clearfix"><?php echo $this->common->callLanguageSelectBox('cmb_hazard_lang', $to_lang, 'cmb_hazard_lang select-right');?></div>
	        <div class="profile-user">
                <div class="tab-control no-margin" data-effect="fade" data-role="tab-control">
                    <ul class="tabs">
                        <li class="active user_tab"><a href="#box4description" class="hazard-tab"><i class="on-left-more"><img src="<?php echo $base;?>img/library/hazards.png" width="18" height="18"></i>Hazard</a></li>
                        <li class="user_tab"><a href="#trench_collapse_status_modal" class="hazard-tab" data-toggle='modal'><i class="icon-stats-up on-left-more"></i>Stats</a></li>
                        <li class="user_tab"><a href="#box4controls" class="hazard-tab"><i class="icon-dashboard on-left-more"></i>Controls</a></li>
                        <li class="user_tab"><a href="#box4library" class="hazard-tab"><i class="on-left-more"><img src="<?php echo $base;?>img/library/header_menu_training_blank.png" /></i>Library</a></li>
                    </ul>
                    <div class="frames">
                        <div class="frame text-left" id="box4description">
                        <p class="s1content_body_section"><strong>Hazard</strong></p>
						<p class="s1content_body_section box4hazard"><?php lang("trench_hazard");?></p>
                        </div>
                        <div class="frame text-left" id="box4stats"><p><a  href='#trench_collapse_status_modal' data-toggle='modal'>Stats</a></p></div>
                        <div class="frame text-left" id="box4controls">
							<p class="s1content_body_section"><strong>Controls</strong></p>
							<p class="s1content_body_section box4controls"><?php lang("trench_controls");?></p>
                        </div>
                        <div class="frame text-left" id="box4library">
                            <div class="row-fluid">
								<a href='#trench1' data-toggle='modal' class="tile half-library trench1 bg-darker add_to_cart description">
									<div class="half bg-darker">
										<img src="<?php echo $base;?>img/library/hazards.png">
										<span class="fg-white" style="position:absolute;top:0px;"><small>Trench Collapse</small></span>
									</div>
									<div class="brand">                                              
										<span class="label fg-white text-center">&nbsp;<small><i class=""><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:16px;"></i>&nbsp;5&nbsp;<i class=""><img src="<?php echo $base;?>img/icons_xp.png" style="height:16px;"></i>&nbsp;5</small></span>
									</div>
								</a>
                            <a href='#trench2' data-toggle='modal' class="tile half-library trench2 bg-darker add_to_cart description">
								<div class="half bg-darker">
									<img src="<?php echo $base;?>img/library/procedures.png">
									<span class="fg-white" style="position:absolute;top:0px;"><small>Cave-In Protection</small></span>
								</div>
								<div class="brand">                                              
									<span class="label fg-white text-center">&nbsp;<small><i class=""><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:16px;"></i>&nbsp;20&nbsp;<i class=""><img src="<?php echo $base;?>img/icons_xp.png" style="height:16px;"></i>&nbsp;10</small></span>
								</div>
							</a>
                            <a href='#trench3' data-toggle='modal' class="tile half-library trench3 bg-darker add_to_cart description" >
								<div class="half bg-darker">
									<img src="<?php echo $base;?>img/library/inspections.png">
									<span class="fg-white" style="position:absolute;top:0px;"><small>Excavations</small></span>
								</div>
								<div class="brand">
									<span class="label fg-white text-center">&nbsp;<small><i class=""><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:16px;"></i>&nbsp;20&nbsp;<i class=""><img src="<?php echo $base;?>img/icons_xp.png" style="height:16px;"></i>&nbsp;200</small></span>
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
            
    <!-- End TRENCH COLLAPSE Modal -->
<!-- *********** start TRENCH COLLAPSE Stats MODAL page ******************************** -->
    
	<div id="trench_collapse_status_modal" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top:-2%; max-width:700px;" >
		<div class="modal-body"><a href="#"><img src="<?php echo $base;?>img/hazards/construction/high_rise/front/trench_collapse_stats.png"/></a></div>
		<div class="modal-footer bg-gray"><button class="btn" data-dismiss="modal" onclick="$('#trench_collapse_status_modal').hide();">Close</button></div>
	</div>
<!-- ******************** end TRENCH COLLAPSE Stats modal page ************************************* -->     

	<!-- *********** start Trench1 library Hazard MODAL page ******************************** -->
	<div id="trench1" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top: 10%; width:462px;" >
		<h5 class='margin10'>Construction - Trench Collapse Hazard</h5>
		<p class='margin10'><strong>Trenches are excavations whose depth exceeds its width.  They are holes left in the ground as the result of removing materials.</strong></p>
		<h6 class='margin10'>$5.00 - <i ><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:20px" /></i>&nbsp;5 - <i ><img src="<?php echo $base;?>img/icons_xp.png" style="height:20px" /></i>&nbsp;5</h6>
		<div class="modal-footer bg-gray">
        	<a href="<?php echo $base;?>admin/libraries_metro?libtype=3"><button  class="btn hazard_btn">S1 Hazards</button></a>
			<button class="btn" data-dismiss="modal" onclick="$('#trench1').hide();">Close</button>
		</div>
	</div>
	<!-- ******************** end Trench1 library Hazard modal page ************************************* --> 
    
	<!-- *********** start Trench2 library Procedure MODAL page ******************************** -->
	<div id="trench2" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top: 10%; width:462px;" >
    <h5 class='margin10'>Cave-In Protection</h5>
    <h6 class='margin10'>$14.00 - <i ><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:20px" /></i>&nbsp;20 - <i ><img src="<?php echo $base;?>img/icons_xp.png" style="height:20px" /></i>&nbsp;10</h6>
		
		<div class="modal-footer bg-gray">
        	<a href="<?php echo $base;?>admin/libraries_metro?libtype=4"><button  class="btn hazard_btn">S1 Procedures</button></a>
			<button class="btn" data-dismiss="modal" onclick="$('#trench2').hide();">Close</button>
		</div>
	</div>
<!-- ******************** end Trench2 library Procedure modal page ************************************* --> 
     <!-- *********** start Trench3 library Inspection MODAL page ******************************** -->
    
	<div id="trench3" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top: 10%; width:462px;" >
    <h5 class='margin10'>Construction - Excavations</h5>
    <h6 class='margin10'>$4.00 - <i ><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:20px" /></i>&nbsp;20 - <i ><img src="<?php echo $base;?>img/icons_xp.png" style="height:20px" /></i>&nbsp;200</h6>
		
		<div class="modal-footer bg-gray">
        	<a href="<?php echo $base;?>admin/s1_library_inspection_view_metro"><button  class="btn hazard_btn">S1 Inspections</button></a>
			<button class="btn" data-dismiss="modal" onclick="$('#trench3').hide();">Close</button>
		</div>
	</div>
<!-- ******************** end Trench3 library Inspection modal page ************************************* --> 
<script type="text/javascript">

$(function () {
    $(".trench1").on('click', function() {
        $('#trench2').modal('hide');
        $('#trench3').modal('hide');
    });
 	$(".trench2").on('click', function() {
        $('#trench1').modal('hide');
        $('#trench3').modal('hide');
    });
 	$(".trench3").on('click', function() {
        $('#trench1').modal('hide');
        $('#trench2').modal('hide');
    });
   
});
</script> 
     <!-- *********** start Sponsored by MODAL page ******************************** -->
    
	<div id="sponsoredby" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none; max-width:462px;" >
		<a href="http://newcanadians.hhstores.ca/" target="new">
        <img src="<?php echo $base;?>img/sponsor/construction/high_rise_front/ad1.jpg" />
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
			if( "fall" == $active_hazard_item ) {
				$hazard 	= '<?php echo lang("fall_hazard");?>';
				$controls 	= '<?php echo lang("fall_controls");?>';
			}
			else if( "falling" == $active_hazard_item ) {
				$hazard 	= '<?php echo lang("falling_hazard");?>';
				$controls 	= '<?php echo lang("falling_controls");?>';
			}
			else if( "struck" == $active_hazard_item ) {
				$hazard 	= '<?php echo lang("struck_hazard");?>';
				$controls 	= '<?php echo lang("struck_controls");?>';
			}
			else if( "trench" == $active_hazard_item ) {
				$hazard 	= '<?php echo lang("trench_hazard");?>';
				$controls 	= '<?php echo lang("trench_controls");?>';
			}
			$data_hazards = $hazard+"FRONT_HAZARD"+$controls;

			$.post(js_base_path+'ajax/getTranslatedText', {'paragraphDescription':$data_hazards,'translateSection':"digital_hazards", 'fromLang':"en", 'toLang':$to_lang}, function(data){
				var $front_hazard_text = data.split("FRONT_HAZARD");
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
					$pointpage_section_id 	= $(".hazard-item.in").attr('pointpage_section_id');
					
					if( "fall" == $active_hazard_item ) {
						$hazard 	= '<?php echo lang("fall_hazard");?>';
						$controls 	= '<?php echo lang("fall_controls");?>';
					}
					else if( "falling" == $active_hazard_item ) {
						$hazard 	= '<?php echo lang("falling_hazard");?>';
						$controls 	= '<?php echo lang("falling_controls");?>';
					}
					else if( "struck" == $active_hazard_item ) {
						$hazard 	= '<?php echo lang("struck_hazard");?>';
						$controls 	= '<?php echo lang("struck_controls");?>';
					}
					else if( "trench" == $active_hazard_item ) {
						$hazard 	= '<?php echo lang("trench_hazard");?>';
						$controls 	= '<?php echo lang("trench_controls");?>';
					}
					$data_hazards = $hazard+"FRONT_HAZARD"+$controls;
					$.post(js_base_path+'ajax/getTranslatedText', {'paragraphDescription':$data_hazards,'translateSection':"digital_hazards", 'fromLang':"en", 'toLang':$to_lang}, function(data){
						var $front_hazard_text = data.split("FRONT_HAZARD");
						$hazard_text 	= $front_hazard_text[0];
						//alert($hazard_text);
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
				if( window.curSlide == $total_slides ) {
					setPagePoints(1, $pointpage_section_id, 'id_modal_points', 'modal_points', $active_hazard_item);
				}
			}
		});
	});
</script>
