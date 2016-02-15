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
          <span id="hazard-title"><h3><span class="icon on-left" ><img src="<?php echo $base;?>img/library/hazards.png" width="40" height="40"></span>&nbsp;High Rise Left Side </h3></span>

          <span  class="metro" style="float:right">________ Select ________<br />
          <div class="styled-select">
          <select id="high-rise-left-dropdown" class="bg-red fg-white" onchange="javascript:updateHazardData(this.value);" >
          	<option value="">- Select Section</option>
            <option value="crushed">Crushed By</option>
          	<option value="fire">Fire</option>
            <option value="fall_level">Fall From Same Level</option>
            <option value="scaffolds">Scaffolds</option>
          	
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
			$rows	= $this->points->hasUserGainedPointsGetPoints(1, 9, $checkPointsGained=1);
			$img 	= ($rows['has_points_gained']) ? "equip-dot-green" : 'equip-dot';
			?>
		    <a id="dot_crushed" href="#crushed" data-toggle='modal' onclick="updateHazardData('crushed',1);">
            <img class="equip-dot" target="1" data-toggle="tooltip" title="" src="<?php echo $base."img/equip/".$img.".png";?>" style="top: 67%;left: 31%;" data-original-title="Crushed By">
			</a>
			
			<?php 
			$rows	= $this->points->hasUserGainedPointsGetPoints(1, 10, $checkPointsGained=1);
			$img 	= ($rows['has_points_gained']) ? "equip-dot-green" : 'equip-dot';
			?>
			<a id="dot_fire" href="#fire" data-toggle='modal' onclick="updateHazardData('fire',2);">
            <img class="equip-dot" target="2" data-toggle="tooltip" title="" src="<?php echo $base."img/equip/".$img.".png";?>" style="top: 63%;left: 40%;" data-original-title="Fire">
			</a>
			
			<?php 
			$rows	= $this->points->hasUserGainedPointsGetPoints(1, 11, $checkPointsGained=1);
			$img 	= ($rows['has_points_gained']) ? "equip-dot-green" : 'equip-dot';
			?>
			<a id="dot_fall_level" href="#fall_level" data-toggle='modal' onclick="updateHazardData('fall_level',3);">
            <img class="equip-dot" target="3" data-toggle="tooltip" title="" src="<?php echo $base."img/equip/".$img.".png";?>" style="top: 41%;left: 46%;" data-original-title="Fall From Same Level">
			</a>
			 
			<?php 
			$rows	= $this->points->hasUserGainedPointsGetPoints(1, 12, $checkPointsGained=1);
			$img 	= ($rows['has_points_gained']) ? "equip-dot-green" : 'equip-dot';
			?>
			 <a id="dot_scaffolds" href="#scaffolds" data-toggle='modal' onclick="updateHazardData('scaffolds',4);">
             <img class="equip-dot" target="4" data-toggle="tooltip" title="" src="<?php echo $base."img/equip/".$img.".png";?>" style="top: 82%;left: 46%;" data-original-title="Scaffolds">
			 </a>		 
            </div>         
            <img src="<?php echo $base;?>img/hazards/construction/high_rise/left/high_left.jpg">
                    
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


<!-- Start Crushed By Modal --> 
    <div class="metro">
      <div id="crushed" class="modal hide fade hazard-item " active_hazard_item="crushed" pointpage_section_id="9" tabindex="-1" style="max-width:600px;" role="dialog" aria-labelledby="myModalLabel" >
      <!--class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="cursor:pointer;"-->
     
      	<div class="modal-header bg-red">
            <h3 ><span class="icon on-left" ><img src="<?php echo $base;?>img/library/hazards.png" width="30" height="30"></span><strong>Crushed By</strong><i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal" onclick="window.location.reload();"></i></h3>
        </div>
       <div class="modal-body" id="body1" >
       		<center>
                
                <div class="flexslider" style="max-width:600px;">
                    <ul class="slides crushed">
                        <li><img src="<?php echo $base;?>img/hazards/construction/high_rise/left/haz-1.jpg"/></li>
                        <li><img src="<?php echo $base;?>img/hazards/construction/high_rise/left/haz-2.jpg"/></li>
                        <li><img src="<?php echo $base;?>img/hazards/construction/high_rise/left/haz-3.jpg"/></li>
                        <li><img src="<?php echo $base;?>img/hazards/construction/high_rise/left/haz-4.jpg"/></li>
                        <li><img src="<?php echo $base;?>img/hazards/construction/high_rise/left/haz-5.jpg"/></li>
                        <li><img src="<?php echo $base;?>img/hazards/construction/high_rise/left/haz-6.jpg"/></li>
                        <li><img src="<?php echo $base;?>img/hazards/construction/stats_message.png"/></li>
                    </ul>
                    
		        </div>
               </center>
			   <div class="padding5 clearfix">
					<?php echo $this->common->callLanguageSelectBox("cmb_hazard_lang", $to_lang, 'cmb_hazard_lang select-right');?>
				</div>
            
	        <div class="profile-user">
                <div class="tab-control no-margin" data-effect="fade" data-role="tab-control">
                    <ul class="tabs">
                        <li class="active user_tab"><a href="#box1description" class="hazard-tab"><i class="on-left-more"><img src="<?php echo $base;?>img/library/hazards.png" width="18" height="18"></i>Hazard</a></li>
                        <li class="user_tab"><a href='#crushed_by_status_modal' data-toggle='modal' class="hazard-tab"><i class="icon-stats-up on-left-more"></i>Stats</a></li>
                        <li class="user_tab"><a href="#box1controls" class="hazard-tab"><i class="icon-dashboard on-left-more"></i>Controls</a></li>
                        <li class="user_tab"><a href="#box1library" class="hazard-tab"><i class="on-left-more"><img src="<?php echo $base;?>img/library/header_menu_training_blank.png" /></i>Library</a></li>
                    </ul>
                    <div class="frames">
                        
                        <div class="frame text-left" id="box1description">
							<p class="s1content_body_section"><strong>Hazard</strong></p>
                            <p class="s1content_body_section box1hazard"><?php lang('crushed_hazard');?></p>
                        </div>
                        <div class="frame text-left" id="box1stats">
                            <p>Stats</p>
						</div>
                        <div class="frame text-left" id="box1controls">
                            <p class="s1content_body_section" ><strong>Controls</strong></p>
                            <p class="s1content_body_section box1controls" ><?php lang('crushed_controls');?></p>
                           
                        </div>
                     
                        <div class="frame text-left" id="box1library">
                            <div class="row-fluid">
                            <a href='#crushed1' data-toggle='modal' class="tile half-library crushed1 bg-darker add_to_cart description">
									<div class="half bg-darker">
										<img src="<?php echo $base;?>img/library/hazards.png">
										<span class="fg-white" style="position:absolute;top:0px;"><small>Crushed By</small></span>
									</div>
									<div class="brand">                                              
										<span class="label fg-white text-center">&nbsp;<small><i class=""><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:16px;"></i>&nbsp;5&nbsp;<i class=""><img src="<?php echo $base;?>img/icons_xp.png" style="height:16px;"></i>&nbsp;5</small></span>
									</div>
								</a>
                            
                            <a href='#crushed2' data-toggle='modal' class="tile half-library crushed2 bg-darker add_to_cart description">
									<div class="half bg-darker">
										<img src="<?php echo $base;?>img/library/procedures.png">
										<span class="fg-white" style="position:absolute;top:0px;"><small>Heavy Equipment</small></span>
									</div>
									<div class="brand">                                              
										<span class="label fg-white text-center">&nbsp;<small><i class=""><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:16px;"></i>&nbsp;20&nbsp;<i class=""><img src="<?php echo $base;?>img/icons_xp.png" style="height:16px;"></i>&nbsp;10</small></span>
									</div>
								</a>
								<a href='#crushed3' data-toggle='modal' class="tile half-library crushed3 bg-darker add_to_cart description" >
									<div class="half bg-darker">
										<img src="<?php echo $base;?>img/library/inspections.png">
										<span class="fg-white" style="position:absolute;top:0px;"><small>Overhead</small></span>
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
            
    <!-- End Crushed By Modal -->
     <!-- *********** start Crushed By  Stats MODAL page ******************************** -->
    
	<div id="crushed_by_status_modal" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top:-2%; max-width:700px;" >
		<a href="#" >
        <img src="<?php echo $base;?>img/hazards/construction/high_rise/left/crushed_by_stats.png" />
        
        </a>
		<div class="modal-footer bg-gray">
			<button class="btn" data-dismiss="modal" onclick="$('#crushed_by_status_modal').hide();">Close</button>
		</div>
	</div>
   
<!-- ******************** end  Crushed By  Stats modal page ************************************* -->        
      <!-- *********** start crushed1 library Hazard MODAL page ******************************** -->
    
	<div id="crushed1" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top: 10%; width:462px;" >
    <h5 class='margin10'>Construction - Crushed by Object or Equipment Hazard</h5>
    <p class='margin10'><strong>Crushed by Object or Equipment</strong></p>
    <h6 class='margin10'>$5.00 - <i ><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:20px" /></i>&nbsp;5 - <i ><img src="<?php echo $base;?>img/icons_xp.png" style="height:20px" /></i>&nbsp;5</h6>
		
		<div class="modal-footer bg-gray">
        	<a href="<?php echo $base;?>admin/libraries_metro?libtype=3"><button  class="btn hazard_btn">S1 Hazards</button></a>
			<button class="btn" data-dismiss="modal" onclick="$('#crushed1').hide();">Close</button>
		</div>
	</div>
<!-- ******************** end crushed1 library Hazard modal page ************************************* --> 
    <!-- *********** start crushed2 library Procedure MODAL page ******************************** -->
    
	<div id="crushed2" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top: 10%; width:462px;" >
    <h5 class='margin10'>Heavy Equipment Procedure</h5>
    <h6 class='margin10'>$14.00 - <i ><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:20px" /></i>&nbsp;20 - <i ><img src="<?php echo $base;?>img/icons_xp.png" style="height:20px" /></i>&nbsp;10</h6>
		
		<div class="modal-footer bg-gray">
        	<a href="<?php echo $base;?>admin/libraries_metro?libtype=4"><button  class="btn hazard_btn">S1 Procedures</button></a>
			<button class="btn" data-dismiss="modal" onclick="$('#crushed2').hide();">Close</button>
		</div>
	</div>
<!-- ******************** end crushed2 library Procedure modal page ************************************* -->
     <!-- *********** start crushed3 library Inspection MODAL page ******************************** -->
    
	<div id="crushed3" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top: 10%; width:462px;" >
    <h5 class='margin10'>Overhead Inspection</h5>
    <h6 class='margin10'>$4.00 - <i ><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:20px" /></i>&nbsp;20 - <i ><img src="<?php echo $base;?>img/icons_xp.png" style="height:20px" /></i>&nbsp;200</h6>
		
		<div class="modal-footer bg-gray">
        	<a href="<?php echo $base;?>admin/s1_library_inspection_view_metro"><button  class="btn hazard_btn">S1 Inspections</button></a>
			<button class="btn" data-dismiss="modal" onclick="$('#crushed3').hide();">Close</button>
		</div>
	</div>
<!-- ******************** end crushed3 library Inspection modal page ************************************* --> 
 <script type="text/javascript">

$(function () {
    $(".crushed1").on('click', function() {
        $('#crushed2').modal('hide');
        $('#crushed3').modal('hide');
    });
 	$(".crushed2").on('click', function() {
        $('#crushed1').modal('hide');
        $('#crushed3').modal('hide');
    });
 	$(".crushed3").on('click', function() {
        $('#crushed1').modal('hide');
        $('#crushed2').modal('hide');
    });
   
});
</script>

  
    <!-- Start Fire Modal --> 
    <div class="metro">
      <div id="fire" class="modal hide fade hazard-item " active_hazard_item="fire" pointpage_section_id="10"  tabindex="-1" style="max-width:600px;" role="dialog" aria-labelledby="myModalLabel" >
      <!--class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="cursor:pointer;"-->
     
      	<div class="modal-header bg-red">
            <h3 ><span class="icon on-left" ><img src="<?php echo $base;?>img/library/hazards.png" width="30" height="30"></span><strong>Fire</strong><i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal" onclick="window.location.reload();"></i></h3>
        </div>
       <div class="modal-body" id="body2" >
       		<center>
                
                <div class="flexslider" style="max-width:600px;">
                    <ul class="slides fire">
                        <li><img src="<?php echo $base;?>img/hazards/construction/high_rise/left/haz-7.jpg"/></li>
                        <li><img src="<?php echo $base;?>img/hazards/construction/high_rise/left/haz-8.jpg"/></li>
                        <li><img src="<?php echo $base;?>img/hazards/construction/high_rise/left/haz-9.jpg"/></li>
                        <li><img src="<?php echo $base;?>img/hazards/construction/high_rise/left/haz-10.jpg"/></li>
                        <li><img src="<?php echo $base;?>img/hazards/construction/high_rise/left/haz-11.jpg"/></li>
                        <li><img src="<?php echo $base;?>img/hazards/construction/high_rise/left/haz-12.jpg"/></li>
                        <li><img src="<?php echo $base;?>img/hazards/construction/stats_message.png"/></li>
                    </ul>
                    
		        </div>
               </center>
			   
			   <div class="padding5 clearfix">
					<?php echo $this->common->callLanguageSelectBox("cmb_hazard_lang", $to_lang, 'cmb_hazard_lang select-right');?>
				</div>
            
	        <div class="profile-user">
                <div class="tab-control no-margin" data-effect="fade" data-role="tab-control">
                    <ul class="tabs">
                        <li class="active user_tab"><a href="#box2description" class="hazard-tab"><i class="on-left-more"><img src="<?php echo $base;?>img/library/hazards.png" width="18" height="18"></i>Hazard</a></li>
                        <li class="user_tab"><a href='#fire_status_modal' data-toggle='modal' class="hazard-tab"><i class="icon-stats-up on-left-more"></i>Stats</a></li>
                        <li class="user_tab"><a href="#box2controls" class="hazard-tab"><i class="icon-dashboard on-left-more"></i>Controls</a></li>
                        <li class="user_tab"><a href="#box2library" class="hazard-tab"><i class="on-left-more"><img src="<?php echo $base;?>img/library/header_menu_training_blank.png" /></i>Library</a></li>
                    </ul>
                    <div class="frames">
                        <div class="frame text-left" id="box2description">
							<p class="s1content_body_section"><strong>Hazard</strong></p>
                            <p class="s1content_body_section box2hazard"><?php lang('fire_hazard');?></p>
                        </div>
                        <div class="frame text-left" id="box2stats"><p>Stats</p></div>
                        <div class="frame text-left" id="box2controls">
                            <p class="s1content_body_section"><strong>Controls</strong></p>
							<p class="s1content_body_section box2controls"><?php lang('fire_controls');?></p>
                        </div>
                        <div class="frame text-left" id="box2library">
                            <div class="row-fluid">
                            <a href='#fire1' data-toggle='modal' class="tile half-library fire1 bg-darker add_to_cart description">
									<div class="half bg-darker">
										<img src="<?php echo $base;?>img/library/hazards.png">
										<span class="fg-white" style="position:absolute;top:0px;"><small>Fire Hazard</small></span>
									</div>
									<div class="brand">                                              
										<span class="label fg-white text-center">&nbsp;<small><i class=""><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:16px;"></i>&nbsp;5&nbsp;<i class=""><img src="<?php echo $base;?>img/icons_xp.png" style="height:16px;"></i>&nbsp;5</small></span>
									</div>
								</a>
                            
                            <a href='#fire2' data-toggle='modal' class="tile half-library fire2 bg-darker add_to_cart description">
									<div class="half bg-darker">
										<img src="<?php echo $base;?>img/library/procedures.png">
										<span class="fg-white" style="position:absolute;top:0px;"><small>Flammable Liquid</small></span>
									</div>
									<div class="brand">                                              
										<span class="label fg-white text-center">&nbsp;<small><i class=""><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:16px;"></i>&nbsp;20&nbsp;<i class=""><img src="<?php echo $base;?>img/icons_xp.png" style="height:16px;"></i>&nbsp;10</small></span>
									</div>
								</a>
								<a href='#fire3' data-toggle='modal' class="tile half-library fire3 bg-darker add_to_cart description" >
									<div class="half bg-darker">
										<img src="<?php echo $base;?>img/library/inspections.png">
										<span class="fg-white" style="position:absolute;top:0px;"><small>Fire Extinguisher</small></span>
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
            
    <!-- End Fire Modal -->
         <!-- *********** start Fire Stats MODAL page ******************************** -->
    
	<div id="fire_status_modal" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top:-2%; max-width:700px;" >
		<a href="#" >
        <img src="<?php echo $base;?>img/hazards/construction/high_rise/left/fire_stats.png" />
        
        </a>
		<div class="modal-footer bg-gray">
			<button class="btn" data-dismiss="modal" onclick="$('#fire_status_modal').hide();">Close</button>
		</div>
	</div>
   
<!-- ******************** end  Fire  Stats modal page ************************************* -->   
     <!-- *********** start fire1 library Hazard MODAL page ******************************** -->
    
	<div id="fire1" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top: 10%; width:462px;" >
    <h5 class='margin10'>Construction - Fire Hazard</h5>
    <p class='margin10'><strong>The state of combustion in which inflammable material burns, producing heat, flames and often smoke</strong></p>
    <h6 class='margin10'>$5.00 - <i ><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:20px" /></i>&nbsp;5 - <i ><img src="<?php echo $base;?>img/icons_xp.png" style="height:20px" /></i>&nbsp;5</h6>
		
		<div class="modal-footer bg-gray">
        	<a href="<?php echo $base;?>admin/libraries_metro?libtype=3"><button  class="btn hazard_btn">S1 Hazards</button></a>
			<button class="btn" data-dismiss="modal" onclick="$('#fire1').hide();">Close</button>
		</div>
	</div>
<!-- ******************** end fire1 library Hazard modal page ************************************* --> 
    <!-- *********** start fire2 library Procedure MODAL page ******************************** -->
    
	<div id="fire2" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top: 10%; width:462px;" >
    <h5 class='margin10'>Flammable Liquid Procedure</h5>
    <h6 class='margin10'>$14.00 - <i ><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:20px" /></i>&nbsp;20 - <i ><img src="<?php echo $base;?>img/icons_xp.png" style="height:20px" /></i>&nbsp;10</h6>
		
		<div class="modal-footer bg-gray">
        	<a href="<?php echo $base;?>admin/libraries_metro?libtype=4"><button  class="btn hazard_btn">S1 Procedures</button></a>
			<button class="btn" data-dismiss="modal" onclick="$('#fire2').hide();">Close</button>
		</div>
	</div>
<!-- ******************** end fire2 library Procedure modal page ************************************* -->
     <!-- *********** start fire3 library Inspection MODAL page ******************************** -->
    
	<div id="fire3" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top: 10%; width:462px;" >
    <h5 class='margin10'>Fire Extinguisher Inspection</h5>
    <h6 class='margin10'>$4.00 - <i ><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:20px" /></i>&nbsp;20 - <i ><img src="<?php echo $base;?>img/icons_xp.png" style="height:20px" /></i>&nbsp;200</h6>
		
		<div class="modal-footer bg-gray">
        	<a href="<?php echo $base;?>admin/s1_library_inspection_view_metro"><button  class="btn hazard_btn">S1 Inspections</button></a>
			<button class="btn" data-dismiss="modal" onclick="$('#fire3').hide();">Close</button>
		</div>
	</div>
<!-- ******************** end fire3 library Inspection modal page ************************************* --> 
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
 
    
    <!-- Start Fall From Same Level Modal --> 
    <div class="metro">
      <div id="fall_level" class="modal hide fade hazard-item " active_hazard_item="fall_level" pointpage_section_id="11" tabindex="-1" style="max-width:600px;" role="dialog" aria-labelledby="myModalLabel" >
      <!--class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="cursor:pointer;"-->
     
      	<div class="modal-header bg-red">
            <h3 ><span class="icon on-left" ><img src="<?php echo $base;?>img/library/hazards.png" width="30" height="30"></span><strong>Fall From Same Level</strong><i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal" onclick="window.location.reload();"></i></h3>
        </div>
       <div class="modal-body" id="body3" >
       		<center>
                
                <div class="flexslider" style="max-width:600px;">
                    <ul class="slides fall_level">
                        <li><img src="<?php echo $base;?>img/hazards/construction/high_rise/left/haz-13.jpg"/></li>
                        <li><img src="<?php echo $base;?>img/hazards/construction/high_rise/left/haz-14.jpg"/></li>
                        <li><img src="<?php echo $base;?>img/hazards/construction/high_rise/left/haz-15.jpg"/></li>
                        <li><img src="<?php echo $base;?>img/hazards/construction/high_rise/left/haz-16.jpg"/></li>
                        <li><img src="<?php echo $base;?>img/hazards/construction/high_rise/left/haz-17.jpg"/></li>
                        <li><img src="<?php echo $base;?>img/hazards/construction/high_rise/left/haz-18.jpg"/></li>
                        <li><img src="<?php echo $base;?>img/hazards/construction/stats_message.png"/></li>
                    </ul>
                    
		        </div>
               </center>
			   
			   <div class="padding5 clearfix">
					<?php echo $this->common->callLanguageSelectBox("cmb_hazard_lang", $to_lang, 'cmb_hazard_lang select-right');?>
				</div>
            
	        <div class="profile-user">
                <div class="tab-control no-margin" data-effect="fade" data-role="tab-control">
                    <ul class="tabs">
                        <li class="active user_tab"><a href="#box3description" class="hazard-tab"><i class="on-left-more"><img src="<?php echo $base;?>img/library/hazards.png" width="18" height="18"></i>Hazard</a></li>
                        <li class="user_tab"><a href='#fall_from_same_level_status_modal' data-toggle='modal' class="hazard-tab"><i class="icon-stats-up on-left-more"></i>Stats</a></li>
                        <li class="user_tab"><a href="#box3controls" class="hazard-tab"><i class="icon-dashboard on-left-more"></i>Controls</a></li>
                        <li class="user_tab"><a href="#box3library" class="hazard-tab"><i class="on-left-more"><img src="<?php echo $base;?>img/library/header_menu_training_blank.png" /></i>Library</a></li>
                    </ul>
                    <div class="frames">
                        <div class="frame text-left" id="box3description">
                            <p class="s1content_body_section" ><strong>Hazard</strong></p>
                            <p class="s1content_body_section box3hazard"><?php lang('fall_level_hazard');?></p>
                        </div>
                        <div class="frame text-left" id="box3stats">
                            <p  >
                            Stats
                            </p>
                        </div>
                        <div class="frame text-left" id="box3controls">
                            <p class="s1content_body_section" ><strong>Controls</strong></p>
							<p class="s1content_body_section box3controls"><?php lang('fall_level_controls');?></p>                           
                        </div>
                     
                        <div class="frame text-left" id="box3library">
                            <div class="row-fluid">
                            <a href='#fall_level1' data-toggle='modal' class="tile half-library fall_level1 bg-darker add_to_cart description">
									<div class="half bg-darker">
										<img src="<?php echo $base;?>img/library/hazards.png">
										<span class="fg-white" style="position:absolute;top:0px;"><small>Fall from Same Level</small></span>
									</div>
									<div class="brand">                                              
										<span class="label fg-white text-center">&nbsp;<small><i class=""><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:16px;"></i>&nbsp;5&nbsp;<i class=""><img src="<?php echo $base;?>img/icons_xp.png" style="height:16px;"></i>&nbsp;5</small></span>
									</div>
								</a>
                            
                            <a href='#fall_level2' data-toggle='modal' class="tile half-library fall_level2 bg-darker add_to_cart description">
									<div class="half bg-darker">
										<img src="<?php echo $base;?>img/library/procedures.png">
										<span class="fg-white" style="position:absolute;top:0px;"><small>Slipping</small></span>
									</div>
									<div class="brand">                                              
										<span class="label fg-white text-center">&nbsp;<small><i class=""><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:16px;"></i>&nbsp;20&nbsp;<i class=""><img src="<?php echo $base;?>img/icons_xp.png" style="height:16px;"></i>&nbsp;10</small></span>
									</div>
								</a>
								<a href='#fall_level3' data-toggle='modal' class="tile half-library fall_level3 bg-darker add_to_cart description" >
									<div class="half bg-darker">
										<img src="<?php echo $base;?>img/library/inspections.png">
										<span class="fg-white" style="position:absolute;top:0px;"><small>Stairs</small></span>
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
            
    <!-- End Fall From Same Level Modal -->
         <!-- *********** start Fall From Same Level Stats MODAL page ******************************** -->
    
	<div id="fall_from_same_level_status_modal" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top:-2%; max-width:700px;" >
		<a href="#" >
        <img src="<?php echo $base;?>img/hazards/construction/high_rise/left/fall_from_same_level_stats.png" />
        
        </a>
		<div class="modal-footer bg-gray">
			<button class="btn" data-dismiss="modal" onclick="$('#fall_from_same_level_status_modal').hide();">Close</button>
		</div>
	</div>
   
<!-- ******************** end  Fall From Same Level  Stats modal page ************************************* -->     
     <!-- *********** start fall_level1 library Hazard MODAL page ******************************** -->
    
	<div id="fall_level1" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top: 10%; width:462px;" >
    <h5 class='margin10'>Construction - Falls from Same Level Hazard</h5>
    <p class='margin10'><strong>Unintentionally sliding for a short distance. Typically labeled as someone losing their balance or footing or catching one’s foot on something and stumbling or falling. This hazard is most commonly known as slips, trips, loss of balance or falls under 3 feet.</strong></p>
    <h6 class='margin10'>$5.00 - <i ><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:20px" /></i>&nbsp;5 - <i ><img src="<?php echo $base;?>img/icons_xp.png" style="height:20px" /></i>&nbsp;5</h6>
		
		<div class="modal-footer bg-gray">
        	<a href="<?php echo $base;?>admin/libraries_metro?libtype=3"><button  class="btn hazard_btn">S1 Hazards</button></a>
			<button class="btn" data-dismiss="modal" onclick="$('#fall_level1').hide();">Close</button>
		</div>
	</div>
<!-- ******************** end fall_level1 library Hazard modal page ************************************* --> 
    <!-- *********** start fall_level2 library Procedure MODAL page ******************************** -->
    
	<div id="fall_level2" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top: 10%; width:462px;" >
    <h5 class='margin10'>Minimizing Risk of Slipping Procedure</h5>
    <h6 class='margin10'>$14.00 - <i ><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:20px" /></i>&nbsp;20 - <i ><img src="<?php echo $base;?>img/icons_xp.png" style="height:20px" /></i>&nbsp;10</h6>
		
		<div class="modal-footer bg-gray">
        	<a href="<?php echo $base;?>admin/libraries_metro?libtype=4"><button  class="btn hazard_btn">S1 Procedures</button></a>
			<button class="btn" data-dismiss="modal" onclick="$('#fall_level2').hide();">Close</button>
		</div>
	</div>
<!-- ******************** end fall_level2 library Procedure modal page ************************************* -->
     <!-- *********** start fall_level3 library Inspection MODAL page ******************************** -->
    
	<div id="fall_level3" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top: 10%; width:462px;" >
    <h5 class='margin10'>Stairs Inspection</h5>
    <h6 class='margin10'>$4.00 - <i ><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:20px" /></i>&nbsp;20 - <i ><img src="<?php echo $base;?>img/icons_xp.png" style="height:20px" /></i>&nbsp;200</h6>
		
		<div class="modal-footer bg-gray">
        	<a href="<?php echo $base;?>admin/s1_library_inspection_view_metro"><button  class="btn hazard_btn">S1 Inspections</button></a>
			<button class="btn" data-dismiss="modal" onclick="$('#fall_level3').hide();">Close</button>
		</div>
	</div>
<!-- ******************** end fall_level3 library Inspection modal page ************************************* --> 
<script type="text/javascript">

$(function () {
    $(".fall_level1").on('click', function() {
        $('#fall_level2').modal('hide');
        $('#fall_level3').modal('hide');
    });
 	$(".fall_level2").on('click', function() {
        $('#fall_level1').modal('hide');
        $('#fall_level3').modal('hide');
    });
 	$(".fall_level3").on('click', function() {
        $('#fall_level1').modal('hide');
        $('#fall_level2').modal('hide');
    });
   
});
</script>


    <!-- Start Scaffolds  Modal --> 
    <div class="metro">
      <div id="scaffolds" class="modal hide fade hazard-item " active_hazard_item="scaffolds" pointpage_section_id="12" tabindex="-1" style="max-width:600px;" role="dialog" aria-labelledby="myModalLabel" >
      <!--class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="cursor:pointer;"-->
     
      	<div class="modal-header bg-red">
            <h3 ><span class="icon on-left" ><img src="<?php echo $base;?>img/library/hazards.png" width="30" height="30"></span><strong>Scaffolds</strong><i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal" onclick="window.location.reload();"></i></h3>
        </div>
       <div class="modal-body" id="body4" >
       		<center>
                
                <div class="flexslider" style="max-width:600px;">
                    <ul class="slides scaffolds">
                        <li><img src="<?php echo $base;?>img/hazards/construction/high_rise/left/haz-19.jpg"/></li>
                        <li><img src="<?php echo $base;?>img/hazards/construction/high_rise/left/haz-20.jpg"/></li>
                        <li><img src="<?php echo $base;?>img/hazards/construction/high_rise/left/haz-21.jpg"/></li>
                        <li><img src="<?php echo $base;?>img/hazards/construction/high_rise/left/haz-22.jpg"/></li>
                        <li><img src="<?php echo $base;?>img/hazards/construction/high_rise/left/haz-23.jpg"/></li>
                        <li><img src="<?php echo $base;?>img/hazards/construction/high_rise/left/haz-24.jpg"/></li>
                        <li><img src="<?php echo $base;?>img/hazards/construction/stats_message.png"/></li>
                    </ul>
                    
		        </div>
               </center>
			   <div class="padding5 clearfix">
					<?php echo $this->common->callLanguageSelectBox("cmb_hazard_lang", $to_lang, 'cmb_hazard_lang select-right');?>
				</div>
            
	        <div class="profile-user">
                <div class="tab-control no-margin" data-effect="fade" data-role="tab-control">
                    <ul class="tabs">
                        <li class="active user_tab"><a href="#box4description" class="hazard-tab"><i class="on-left-more"><img src="<?php echo $base;?>img/library/hazards.png" width="18" height="18"></i>Hazard</a></li>
                        <li class="user_tab"><a href='#scaffolds_status_modal' data-toggle='modal' class="hazard-tab"><i class="icon-stats-up on-left-more"></i>Stats</a></li>
                        <li class="user_tab"><a href="#box4controls" class="hazard-tab"><i class="icon-dashboard on-left-more"></i>Controls</a></li>
                        <li class="user_tab"><a href="#box4library" class="hazard-tab"><i class="on-left-more"><img src="<?php echo $base;?>img/library/header_menu_training_blank.png" /></i>Library</a></li>
                    </ul>
                    <div class="frames">
                        
                        <div class="frame text-left" id="box4description">
                        
                            <p class="s1content_body_section" ><strong>Hazard</strong></p>
                            <p class="s1content_body_section box4hazard"><?php lang('scaffolds_hazard');?></p>
                        </div>
                        <div class="frame text-left" id="box4stats">
                         
                            <p  >
                            Stats
                                
                            </p>
                          
                           
                        </div>
                        <div class="frame text-left" id="box4controls">
                            <p class="s1content_body_section" ><strong>Controls</strong></p>
							<p class="s1content_body_section box4controls"><?php lang('scaffolds_controls');?></p>
                        </div>
                     
                        <div class="frame text-left" id="box4library">
                            <div class="row-fluid">
                             <a href='#scaffolds1' data-toggle='modal' class="tile half-library scaffolds1 bg-darker add_to_cart description">
									<div class="half bg-darker">
										<img src="<?php echo $base;?>img/library/hazards.png">
										<span class="fg-white" style="position:absolute;top:0px;"><small>Scaffolds</small></span>
									</div>
									<div class="brand">                                              
										<span class="label fg-white text-center">&nbsp;<small><i class=""><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:16px;"></i>&nbsp;5&nbsp;<i class=""><img src="<?php echo $base;?>img/icons_xp.png" style="height:16px;"></i>&nbsp;5</small></span>
									</div>
								</a>
                            
                            <a href='#scaffolds2' data-toggle='modal' class="tile half-library scaffolds2 bg-darker add_to_cart description">
									<div class="half bg-darker">
										<img src="<?php echo $base;?>img/library/procedures.png">
										<span class="fg-white" style="position:absolute;top:0px;"><small>Scaffolds</small></span>
									</div>
									<div class="brand">                                              
										<span class="label fg-white text-center">&nbsp;<small><i class=""><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:16px;"></i>&nbsp;20&nbsp;<i class=""><img src="<?php echo $base;?>img/icons_xp.png" style="height:16px;"></i>&nbsp;10</small></span>
									</div>
								</a>
								<a href='#scaffolds3' data-toggle='modal' class="tile half-library scaffolds3 bg-darker add_to_cart description" >
									<div class="half bg-darker">
										<img src="<?php echo $base;?>img/library/inspections.png">
										<span class="fg-white" style="position:absolute;top:0px;"><small>Scaffolds</small></span>
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
            
    <!-- End Scaffolds Modal -->
         <!-- *********** start Scaffolds Stats MODAL page ******************************** -->
    
	<div id="scaffolds_status_modal" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top:-2%; max-width:700px;" >
		<a href="#" >
        <img src="<?php echo $base;?>img/hazards/construction/high_rise/left/scaffolds_stats.png" />
        
        </a>
		<div class="modal-footer bg-gray">
			<button class="btn" data-dismiss="modal" onclick="$('#scaffolds_status_modal').hide();">Close</button>
		</div>
	</div>
   
<!-- ******************** end  Scaffolds  Stats modal page ************************************* -->      
     <!-- *********** start scaffolds1 library Hazard MODAL page ******************************** -->
    
	<div id="scaffolds1" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top: 10%; width:462px;" >
    <h5 class='margin10'>Construction - Scaffold Hazard</h5>
    <p class='margin10'><strong>A scaffold is an elevated temporary work platform and its supporting structure is used for supporting material or employees or both.  A supported scaffold is one or more platforms supported by rigged load bearing members, such as poles, posts, upright leg frames and outriggers.</strong></p>
    <h6 class='margin10'>$5.00 - <i ><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:20px" /></i>&nbsp;5 - <i ><img src="<?php echo $base;?>img/icons_xp.png" style="height:20px" /></i>&nbsp;5</h6>
		
		<div class="modal-footer bg-gray">
        	<a href="<?php echo $base;?>admin/libraries_metro?libtype=3"><button  class="btn hazard_btn">S1 Hazards</button></a>
			<button class="btn" data-dismiss="modal" onclick="$('#scaffolds1').hide();">Close</button>
		</div>
	</div>
<!-- ******************** end scaffolds1 library Hazard modal page ************************************* --> 
    <!-- *********** start scaffolds2 library Procedure MODAL page ******************************** -->
    
	<div id="scaffolds2" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top: 10%; width:462px;" >
    <h5 class='margin10'>Scaffold Procedure</h5>
    <h6 class='margin10'>$14.00 - <i ><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:20px" /></i>&nbsp;20 - <i ><img src="<?php echo $base;?>img/icons_xp.png" style="height:20px" /></i>&nbsp;10</h6>
		
		<div class="modal-footer bg-gray">
        	<a href="<?php echo $base;?>admin/libraries_metro?libtype=4"><button  class="btn hazard_btn">S1 Procedures</button></a>
			<button class="btn" data-dismiss="modal" onclick="$('#scaffolds2').hide();">Close</button>
		</div>
	</div>
<!-- ******************** end scaffolds2 library Procedure modal page ************************************* -->
     <!-- *********** start scaffolds3 library Inspection MODAL page ******************************** -->
    
	<div id="scaffolds3" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top: 10%; width:462px;" >
    <h5 class='margin10'>Scaffold Inspection</h5>
    <h6 class='margin10'>$4.00 - <i ><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:20px" /></i>&nbsp;20 - <i ><img src="<?php echo $base;?>img/icons_xp.png" style="height:20px" /></i>&nbsp;200</h6>
		
		<div class="modal-footer bg-gray">
        	<a href="<?php echo $base;?>admin/s1_library_inspection_view_metro"><button  class="btn hazard_btn">S1 Inspections</button></a>
			<button class="btn" data-dismiss="modal" onclick="$('#scaffolds3').hide();">Close</button>
		</div>
	</div>
<!-- ******************** end scaffolds3 library Inspection modal page ************************************* --> 
<script type="text/javascript">

$(function () {
    $(".scaffolds1").on('click', function() {
        $('#scaffolds2').modal('hide');
        $('#scaffolds3').modal('hide');
    });
 	$(".scaffolds2").on('click', function() {
        $('#scaffolds1').modal('hide');
        $('#scaffolds3').modal('hide');
    });
 	$(".scaffolds3").on('click', function() {
        $('#scaffolds1').modal('hide');
        $('#scaffolds2').modal('hide');
    });
   
});
</script>

     
     <!-- *********** start Sponsored by MODAL page ******************************** -->
    
	<div id="sponsoredby" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;max-width:462px;" >
		<a href="http://www.bairrada.ca/" target="new">
        <img src="<?php echo $base;?>img/sponsor/construction/high_rise_left/ad1.jpg" />
        </a>
		<div class="modal-footer bg-gray">
			<button class="btn" data-dismiss="modal" onclick="$('#sponsoredby').hide();">Close</button>
		</div>
	</div>
<!-- ******************** end sponsored by modal page ************************************* --> 

<script type="text/javascript">
		$('.hazard-item').css({ 'top':'1%', });
	//$('#imageBody').css({ 'max-height':'500px' });
	$('.flexslider').css({ 'border':'0px',  'box-shadow':'0px', 'padding':'0px', 'margin':'0px' });
	$('.flex-direction-nav a').css({ 'top':'50%'});
	$('.slides').css({ 'margin-left':'0px',  'padding':'0px' });
	$('.modal-body').css({ 'margin-left':'0px',  'padding':'0px', 'max-height':'80vh','overflow-y':'auto','overflow-x':'hidden' });
	$('.modal-header').css({'border':'0px' });
	$('.modal-footer').css({'border-radius':'0px'});
	$('.hazard_btn').click(function() {
   window.location = '<?php echo $base;?>admin/libraries_metro?libtype=3';
 });
	
	
</script>
<?php $this->load->view('footer_admin'); ?>
<script type="text/javascript">
	function updateHazardData($hazardSection,$pointPageSection)
	{
		var $to_lang 			= '<?php echo $to_lang;?>';
		$active_hazard_item 	= $hazardSection;
		$("#"+$active_hazard_item).each(function() {
			if( "crushed" == $active_hazard_item ) {
				$hazard 	= '<?php echo lang("crushed_hazard");?>';
				$controls 	= '<?php echo lang("crushed_controls");?>';
			}
			else if( "fire" == $active_hazard_item ) {
				$hazard 	= '<?php echo lang("fire_hazard");?>';
				$controls 	= '<?php echo lang("fire_controls");?>';
			}
			else if( "fall_level" == $active_hazard_item ) {
				$hazard 	= '<?php echo lang("fall_level_hazard");?>';
				$controls 	= '<?php echo lang("fall_level_controls");?>';
			}
			else if( "scaffolds" == $active_hazard_item ) {
				$hazard 	= '<?php echo lang("scaffolds_hazard");?>';
				$controls 	= '<?php echo lang("scaffolds_controls");?>';
			}
			$data_hazards = $hazard+"LEFT_HAZARD"+$controls;

			$.post(js_base_path+'ajax/getTranslatedText', {'paragraphDescription':$data_hazards,'translateSection':"digital_hazards", 'fromLang':"en", 'toLang':$to_lang}, function(data){
				var $digihazard_text = data.split("LEFT_HAZARD");
				$hazard_text 	= $digihazard_text[0];
				$(".box"+$pointPageSection+"hazard").html($hazard_text);
				
				$controls_text 	= $digihazard_text[1];
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
					if( "crushed" == $active_hazard_item ) {
						$hazard 	= '<?php echo lang("crushed_hazard");?>';
						$controls 	= '<?php echo lang("crushed_controls");?>';
						$pointpage_section_id 	= "1";
					}
					else if( "fire" == $active_hazard_item ) {
						$hazard 	= '<?php echo lang("fire_hazard");?>';
						$controls 	= '<?php echo lang("fire_controls");?>';
						$pointpage_section_id 	= "2";
					}
					else if( "fall_level" == $active_hazard_item ) {
						$hazard 	= '<?php echo lang("fall_level_hazard");?>';
						$controls 	= '<?php echo lang("fall_level_controls");?>';
						$pointpage_section_id 	= "3";
					}
					else if( "scaffolds" == $active_hazard_item ) {
						$hazard 	= '<?php echo lang("scaffolds_hazard");?>';
						$controls 	= '<?php echo lang("scaffolds_controls");?>';
						$pointpage_section_id 	= "4";
					}
					$data_hazards = $hazard+"LEFT_HAZARD"+$controls;

					$.post(js_base_path+'ajax/getTranslatedText', {'paragraphDescription':$data_hazards,'translateSection':"digital_hazards", 'fromLang':"en", 'toLang':$to_lang}, function(data){
						var $digihazard_text = data.split("LEFT_HAZARD");
						$hazard_text 	= $digihazard_text[0];
						$(".box"+$pointpage_section_id+"hazard").html($hazard_text);
						
						$controls_text 	= $digihazard_text[1];
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
	$('#high-rise-left-dropdown').change(function() {
		var $this = $(this),
      	$value = $this.val()
       $("#dot_"+$value).trigger("click");
	  ;
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
    