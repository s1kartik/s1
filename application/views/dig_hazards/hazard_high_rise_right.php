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
          <span id="hazard-title"><h3><span class="icon on-left" ><img src="<?php echo $base;?>img/library/hazards.png" width="40" height="40"></span>&nbsp;High Rise Right Side </h3></span>
          
          <span  class="metro" style="float:right">________ Select ________<br />
          <div class="styled-select">
          <select id="high-rise-right-dropdown" class="bg-red fg-white" onchange="javascript:updateHazardData(this.value);" >
          	<option value="">- Select Section</option>
            <option value="office">Site Office</option>
          	<option value="excavation_collapse">Excavation Collapse</option>
            <option value="overhead">Contact With Overhead Power Lines</option>
            <option value="ladders">Ladders</option>
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
			$rows	= $this->points->hasUserGainedPointsGetPoints(1, 13, $checkPointsGained=1);
			$img 	= ($rows['has_points_gained']) ? "equip-dot-green" : 'equip-dot';
			?>
		    <a id="dot_office" href="#office" data-toggle='modal' onclick="updateHazardData('office',1);">
            <img class="equip-dot" target="1" data-toggle="tooltip" title="" src="<?php echo $base."img/equip/".$img.".png";?>" style="top: 78%;left: 31%;" data-original-title="Site Office">
			</a>
			
			<?php 
			$rows	= $this->points->hasUserGainedPointsGetPoints(1, 14, $checkPointsGained=1);
			$img 	= ($rows['has_points_gained']) ? "equip-dot-green" : 'equip-dot';
			?>
			<a id="dot_excavation_collapse" href="#excavation_collapse" data-toggle='modal' onclick="updateHazardData('excavation_collapse',2);">
            <img class="equip-dot" target="2" data-toggle="tooltip" title="" src="<?php echo $base."img/equip/".$img.".png";?>" style="top: 68%;left: 39%;" data-original-title="Excavation Collapse">
			</a>

			<?php 
			$rows	= $this->points->hasUserGainedPointsGetPoints(1, 1019, $checkPointsGained=1);
			$img 	= ($rows['has_points_gained']) ? "equip-dot-green" : 'equip-dot';
			?>
			<a id="dot_overhead" href="#overhead" data-toggle='modal' onclick="updateHazardData('overhead',3);">
            <img class="equip-dot" target="3" data-toggle="tooltip" title="" src="<?php echo $base."img/equip/".$img.".png";?>" style="top: 84%;left: 46%;" data-original-title="Contact With Overhead Power Lines">
			</a>
			 
			<?php 
			$rows	= $this->points->hasUserGainedPointsGetPoints(1, 1020, $checkPointsGained=1);
			$img 	= ($rows['has_points_gained']) ? "equip-dot-green" : 'equip-dot';
			?>
			 <a id="dot_ladders" href="#ladders" data-toggle='modal' onclick="updateHazardData('ladders',4);">
             <img class="equip-dot" target="4" data-toggle="tooltip" title="" src="<?php echo $base."img/equip/".$img.".png";?>" style="top: 62%;left: 62%;" data-original-title="Ladders">
			 </a>

            </div>         
            <img src="<?php echo $base;?>img/hazards/construction/high_rise/right/high_right.jpg">
                    
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


<!-- Start Site Office Modal --> 
    <div class="metro">
      <div id="office" class="modal hide fade hazard-item " active_hazard_item="office" pointpage_section_id="13" tabindex="-1" style="max-width:600px;" role="dialog" aria-labelledby="myModalLabel" >
      <!--class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="cursor:pointer;"-->
     
      	<div class="modal-header bg-red">
            <h3 ><span class="icon on-left" ><img src="<?php echo $base;?>img/library/hazards.png" width="30" height="30"></span><strong>Site Office</strong><i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal" onclick="window.location.reload();"></i></h3>
        </div>
       <div class="modal-body" id="body1" >
       		<center>
                
                <div class="flexslider" style="max-width:600px;">
                    <ul class="slides office">
                        <li><img src="<?php echo $base;?>img/hazards/construction/high_rise/right/haz-1.jpg"/></li>
                        <li><img src="<?php echo $base;?>img/hazards/construction/high_rise/right/haz-2.jpg"/></li>
                        <li><img src="<?php echo $base;?>img/hazards/construction/high_rise/right/haz-3.jpg"/></li>
                        <li><img src="<?php echo $base;?>img/hazards/construction/high_rise/right/haz-4.jpg"/></li>
                        <li><img src="<?php echo $base;?>img/hazards/construction/high_rise/right/haz-5.jpg"/></li>
                        <li><img src="<?php echo $base;?>img/hazards/construction/high_rise/right/haz-6.jpg"/></li>
                        <li><img src="<?php echo $base;?>img/hazards/construction/high_rise/right/office.png" style="max-height:350px;"/></li>
                        <li>
                        	<iframe src="https://www.youtube.com/embed/erEP-Nuh-Uo?wmode=transparent&amp;showinfo=0&amp;rel=0" id="modalframe" allowfullscreen="" frameborder="0" ></iframe>                        </li>
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
                        <li class="user_tab"><a href='#site_office_status_modal' data-toggle='modal' class="hazard-tab"><i class="icon-stats-up on-left-more"></i>Stats</a></li>
                        <li class="user_tab"><a href="#box1controls" class="hazard-tab"><i class="icon-dashboard on-left-more"></i>Controls</a></li>
                        <li class="user_tab"><a href="#box1library" class="hazard-tab"><i class="on-left-more"><img src="<?php echo $base;?>img/library/header_menu_training_blank.png" /></i>Library</a></li>
                    </ul>
                    <div class="frames">
                        <div class="frame text-left" id="box1description">
							<p class="s1content_body_section box1hazard"><?php lang('office_hazard');?></p>
                        </div>
                        <div class="frame text-left" id="box1stats">                         
                            <p>Stats</p>
                        </div>
                        <div class="frame text-left" id="box1controls">
							<p class="s1content_body_section box1controls"><?php lang('office_controls');?></p>
                        </div>                     
                        <div class="frame text-left" id="box1library">
                            <div class="row-fluid">
                            
                            <a href='#office1' data-toggle='modal' class="tile half-library office2 bg-darker add_to_cart description">
									<div class="half bg-darker">
										<img src="<?php echo $base;?>img/library/training.png">
										<span class="fg-white" style="position:absolute;top:0px;"><small>S.A.T.</small></span>
									</div>
									<div class="brand">                                              
										<span class="label fg-white text-center">&nbsp;<small><i class=""><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:16px;"></i>&nbsp;120&nbsp;<i class=""><img src="<?php echo $base;?>img/icons_xp.png" style="height:16px;"></i>&nbsp;80</small></span>
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
                <button class=" hazard-sponsor" ><b>Sponsored By</b></button></a>&nbsp;
				<!--button href="<?php echo $base;?>admin/libraries_metro?libtype=1" class="btn">S1 Library</button--> &nbsp;
				<button class="btn" data-dismiss="modal" onclick="window.location.reload();">Close</button>
			</div> 
      </div> 
      </div>
            
    <!-- End Site Office Modal -->
         <!-- *********** start Site Office STATS MODAL page ******************************** -->
    
	<div id="site_office_status_modal" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top:-2%; max-width:700px;" >
		<a href="#" >
        <img src="<?php echo $base;?>img/hazards/construction/high_rise/right/site_office_stats.png" />
        
        </a>
		<div class="modal-footer bg-gray">
			<button class="btn" data-dismiss="modal" onclick="$('#site_office_status_modal').hide();">Close</button>
		</div>
	</div>
   
<!-- ******************** end  Site Office   Stats modal page ************************************* --> 
        <!-- *********** start office1 library Procedure MODAL page ******************************** -->
    
	<div id="office1" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top: 10%; width:462px;" >
    <h5 class='margin10'>Supervisors Awareness Training</h5>
    <h6 class='margin10'><i ><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:20px" /></i>&nbsp;120 - <i ><img src="<?php echo $base;?>img/icons_xp.png" style="height:20px" /></i>&nbsp;80</h6>
		
		<div class="modal-footer bg-gray">
        	<a href="<?php echo $base;?>admin/libraries_metro?libtype=1"><button  class="btn hazard_btn">S1 Training</button></a>
			<button class="btn" data-dismiss="modal" onclick="$('#office1').hide();">Close</button>
		</div>
	</div>
<!-- ******************** end office1 library Procedure modal page ************************************* -->
 
<script type="text/javascript">

$(function () {
 	$(".office2").on('click', function() {
        $('#office3').modal('hide');
    });
 	$(".office3").on('click', function() {
        $('#office2').modal('hide');
    });
   
});
</script>

          
    
   
    <!-- Start Excavation Collapse Modal --> 
    <div class="metro">
      <div id="excavation_collapse" class="modal hide fade hazard-item " active_hazard_item="excavation_collapse" pointpage_section_id="14" tabindex="-1" style="max-width:600px;" role="dialog" aria-labelledby="myModalLabel" >
      <!--class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="cursor:pointer;"-->
     
      	<div class="modal-header bg-red">
            <h3 ><span class="icon on-left" ><img src="<?php echo $base;?>img/library/hazards.png" width="30" height="30"></span><b>Excavation Collapse</b><i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal" onclick="window.location.reload();"></i></h3>
        </div>
       <div class="modal-body" id="body2" >
       		<center>
                
                <div class="flexslider" style="max-width:600px;">
                    <ul class="slides excavation_collapse">
                        <li><img src="<?php echo $base;?>img/hazards/construction/high_rise/right/haz-7.jpg"/></li>
                        <li><img src="<?php echo $base;?>img/hazards/construction/high_rise/right/haz-8.jpg"/></li>
                        <li><img src="<?php echo $base;?>img/hazards/construction/high_rise/right/haz-9.jpg"/></li>
                        <li><img src="<?php echo $base;?>img/hazards/construction/high_rise/right/haz-10.jpg"/></li>
                        <li><img src="<?php echo $base;?>img/hazards/construction/high_rise/right/haz-11.jpg"/></li>
                        <li><img src="<?php echo $base;?>img/hazards/construction/high_rise/right/haz-12.jpg"/></li>
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
                        <li class="user_tab"><a href='#excavation_collapse_status_modal' data-toggle='modal' class="hazard-tab"><i class="icon-stats-up on-left-more"></i>Stats</a></li>
                        <li class="user_tab"><a href="#box2controls" class="hazard-tab"><i class="icon-dashboard on-left-more"></i>Controls</a></li>
                        <li class="user_tab"><a href="#box2library" class="hazard-tab"><i class="on-left-more"><img src="<?php echo $base;?>img/library/header_menu_training_blank.png" /></i>Library</a></li>
                    </ul>
                    <div class="frames">
                        
                        <div class="frame text-left" id="box2description">
							<p class="s1content_body_section" ><strong>Hazard</strong></p>
							<p class="s1content_body_section box2hazard"><?php lang('excavation_collapse_hazard');?></p>
                        </div>
                        <div class="frame text-left" id="box2stats"><p  >Stats</p></div>
                        <div class="frame text-left" id="box2controls">
                            <p class="s1content_body_section" ><strong>Controls</strong></p>
							<p class="s1content_body_section box2controls"><?php lang('excavation_collapse_controls');?></p>
                        </div>
                     
                        <div class="frame text-left" id="box2library">
                            <div class="row-fluid">
                            <a href='#excavation_collapse1' data-toggle='modal' class="tile half-library excavation_collapse1 bg-darker add_to_cart description">
									<div class="half bg-darker">
										<img src="<?php echo $base;?>img/library/hazards.png">
										<span class="fg-white" style="position:absolute;top:0px;"><small>Excavation Collapse</small></span>
									</div>
									<div class="brand">                                              
										<span class="label fg-white text-center">&nbsp;<small><i class=""><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:16px;"></i>&nbsp;5&nbsp;<i class=""><img src="<?php echo $base;?>img/icons_xp.png" style="height:16px;"></i>&nbsp;5</small></span>
									</div>
								</a>
                            
                            <a href='#excavation_collapse2' data-toggle='modal' class="tile half-library excavation_collapse2 bg-darker add_to_cart description">
									<div class="half bg-darker">
										<img src="<?php echo $base;?>img/library/procedures.png">
										<span class="fg-white" style="position:absolute;top:0px;"><small>Cave in Protection</small></span>
									</div>
									<div class="brand">                                              
										<span class="label fg-white text-center">&nbsp;<small><i class=""><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:16px;"></i>&nbsp;20&nbsp;<i class=""><img src="<?php echo $base;?>img/icons_xp.png" style="height:16px;"></i>&nbsp;10</small></span>
									</div>
								</a>
								<a href='#excavation_collapse3' data-toggle='modal' class="tile half-library excavation_collapse3 bg-darker add_to_cart description" >
									<div class="half bg-darker">
										<img src="<?php echo $base;?>img/library/inspections.png">
										<span class="fg-white" style="position:absolute;top:0px;"><small>Excavation</small></span>
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
                <button class=" hazard-sponsor" ><b>Sponsored By</b></button></a>&nbsp;
				<!--button href="<?php echo $base;?>admin/libraries_metro?libtype=1" class="btn">S1 Library</button--> &nbsp;
				<button class="btn" data-dismiss="modal" onclick="window.location.reload();">Close</button>
			</div> 
      </div> 
      </div>
            
    <!-- End Excavation Collapse Modal -->
         <!-- *********** start Excavation Collapse STATS MODAL page ******************************** -->
    
	<div id="excavation_collapse_status_modal" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top:-2%; max-width:700px;" >
		<a href="#" >
        <img src="<?php echo $base;?>img/hazards/construction/high_rise/right/excavation_collapse_stats.png" />
        
        </a>
		<div class="modal-footer bg-gray">
			<button class="btn" data-dismiss="modal" onclick="$('#excavation_collapse_status_modal').hide();">Close</button>
		</div>
	</div>
   
<!-- ******************** end  Excavation Collapse   Stats modal page ************************************* -->   
     <!-- *********** start excavation_collapse1 library Hazard MODAL page ******************************** -->
    
	<div id="excavation_collapse1" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top: 10%; width:462px;" >
    <h5 class='margin10'>Construction - Excavation Collapse Hazard</h5>
    <p class='margin10'><strong>Excavations are holes left in the ground as the result of removing materials.  When the walls of the
excavation are not able to support the horizontal loads and forces that are being applied, the wall will cave in and soil begins to slide down to the bottom of the excavation.</strong></p>
    <h6 class='margin10'>$5.00 - <i ><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:20px" /></i>&nbsp;5 - <i ><img src="<?php echo $base;?>img/icons_xp.png" style="height:20px" /></i>&nbsp;5</h6>
		
		<div class="modal-footer bg-gray">
        	<a href="<?php echo $base;?>admin/libraries_metro?libtype=3"><button  class="btn hazard_btn">S1 Hazards</button></a>
			<button class="btn" data-dismiss="modal" onclick="$('#excavation_collapse1').hide();">Close</button>
		</div>
	</div>
<!-- ******************** end excavation_collapse1 library Hazard modal page ************************************* --> 
    <!-- *********** start excavation_collapse2 library Procedure MODAL page ******************************** -->
    
	<div id="excavation_collapse2" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top: 10%; width:462px;" >
    <h5 class='margin10'>Cave in Protection Procedure</h5>
    <h6 class='margin10'>$14.00 - <i ><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:20px" /></i>&nbsp;20 - <i ><img src="<?php echo $base;?>img/icons_xp.png" style="height:20px" /></i>&nbsp;10</h6>
		
		<div class="modal-footer bg-gray">
        	<a href="<?php echo $base;?>admin/libraries_metro?libtype=4"><button  class="btn hazard_btn">S1 Procedures</button></a>
			<button class="btn" data-dismiss="modal" onclick="$('#excavation_collapse2').hide();">Close</button>
		</div>
	</div>
<!-- ******************** end excavation_collapse2 library Procedure modal page ************************************* -->
     <!-- *********** start excavation_collapse3 library Inspection MODAL page ******************************** -->
    
	<div id="excavation_collapse3" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top: 10%; width:462px;" >
    <h5 class='margin10'>Excavation Inspection</h5>
    <h6 class='margin10'>$4.00 - <i ><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:20px" /></i>&nbsp;20 - <i ><img src="<?php echo $base;?>img/icons_xp.png" style="height:20px" /></i>&nbsp;200</h6>
		
		<div class="modal-footer bg-gray">
        	<a href="<?php echo $base;?>admin/s1_library_inspection_view_metro"><button  class="btn hazard_btn">S1 Inspections</button></a>
			<button class="btn" data-dismiss="modal" onclick="$('#excavation_collapse3').hide();">Close</button>
		</div>
	</div>
<!-- ******************** end excavation_collapse3 library Inspection modal page ************************************* --> 
<script type="text/javascript">

$(function () {
    $(".excavation_collapse1").on('click', function() {
        $('#excavation_collapse2').modal('hide');
        $('#excavation_collapse3').modal('hide');
    });
 	$(".excavation_collapse2").on('click', function() {
        $('#excavation_collapse1').modal('hide');
        $('#excavation_collapse3').modal('hide');
    });
 	$(".excavation_collapse3").on('click', function() {
        $('#excavation_collapse1').modal('hide');
        $('#excavation_collapse2').modal('hide');
    });
   
});
</script>

    
    
    <!-- Start Contact With Overhead Power Lines Modal --> 
    <div class="metro">
      <div id="overhead" class="modal hide fade hazard-item " active_hazard_item="overhead" pointpage_section_id="1019" tabindex="-1" style="max-width:600px;" role="dialog" aria-labelledby="myModalLabel" >
      	<div class="modal-header bg-red">
            <h3 ><span class="icon on-left" ><img src="<?php echo $base;?>img/library/hazards.png" width="30" height="30"></span><b>Contact With Overhead Power Lines</b><i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal" onclick="window.location.reload();"></i></h3>
        </div>
       <div class="modal-body" id="body3" >
       		<center>
                
                <div class="flexslider" style="max-width:600px;">
                    <ul class="slides overhead">
                        <li><img src="<?php echo $base;?>img/hazards/construction/high_rise/right/haz-13.jpg"/></li>
                        <li><img src="<?php echo $base;?>img/hazards/construction/high_rise/right/haz-14.jpg"/></li>
                        <li><img src="<?php echo $base;?>img/hazards/construction/high_rise/right/haz-15.jpg"/></li>
                        <li><img src="<?php echo $base;?>img/hazards/construction/high_rise/right/haz-16.jpg"/></li>
                        <li><img src="<?php echo $base;?>img/hazards/construction/high_rise/right/haz-17.jpg"/></li>
                        <li><img src="<?php echo $base;?>img/hazards/construction/high_rise/right/haz-18.jpg"/></li>
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
                        <li class="user_tab"><a href='#overhead_power_lines_status_modal' data-toggle='modal' class="hazard-tab"><i class="icon-stats-up on-left-more"></i>Stats</a></li>
                        <li class="user_tab"><a href="#box3controls" class="hazard-tab"><i class="icon-dashboard on-left-more"></i>Controls</a></li>
                        <li class="user_tab"><a href="#box3library" class="hazard-tab"><i class="on-left-more"><img src="<?php echo $base;?>img/library/header_menu_training_blank.png" /></i>Library</a></li>
                    </ul>
                    <div class="frames">
                        
                        <div class="frame text-left" id="box3description">
                        
                            <p class="s1content_body_section" ><strong>Hazard</strong></p>
							<p class="s1content_body_section box3hazard"><?php lang('overhead_hazard');?></p>
                          
                        </div>
                        <div class="frame text-left" id="box3stats">
                         
                            <p  >
                            Stats
                                
                            </p>
                          
                           
                        </div>
                        <div class="frame text-left" id="box3controls">
                         
                           <p class="s1content_body_section" ><strong>Controls</strong></p>
						   <p class="s1content_body_section box3controls"><?php lang('overhead_controls');?></p>

                        </div>
                     
                        <div class="frame text-left" id="box3library">
                            <div class="row-fluid">
                            <a href='#overhead1' data-toggle='modal' class="tile half-library overhead1 bg-darker add_to_cart description">
									<div class="half bg-darker">
										<img src="<?php echo $base;?>img/library/hazards.png">
										<span class="fg-white" style="position:absolute;top:0px;"><small>Overhead Power Lines</small></span>
									</div>
									<div class="brand">                                              
										<span class="label fg-white text-center">&nbsp;<small><i class=""><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:16px;"></i>&nbsp;5&nbsp;<i class=""><img src="<?php echo $base;?>img/icons_xp.png" style="height:16px;"></i>&nbsp;5</small></span>
									</div>
								</a>
                            
                            <a href='#overhead2' data-toggle='modal' class="tile half-library overhead2 bg-darker add_to_cart description">
									<div class="half bg-darker">
										<img src="<?php echo $base;?>img/library/procedures.png">
										<span class="fg-white" style="position:absolute;top:0px;"><small>Overhead Power Lines</small></span>
									</div>
									<div class="brand">                                              
										<span class="label fg-white text-center">&nbsp;<small><i class=""><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:16px;"></i>&nbsp;20&nbsp;<i class=""><img src="<?php echo $base;?>img/icons_xp.png" style="height:16px;"></i>&nbsp;10</small></span>
									</div>
								</a>
								<a href='#overhead3' data-toggle='modal' class="tile half-library overhead3 bg-darker add_to_cart description" >
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
                <button class=" hazard-sponsor" ><b>Sponsored By</b></button></a>&nbsp;
				<!--button href="<?php echo $base;?>admin/libraries_metro?libtype=1" class="btn">S1 Library</button--> &nbsp;
				<button class="btn" data-dismiss="modal" onclick="window.location.reload();">Close</button>
			</div> 
      </div> 
      </div>
            
    <!-- End Contact With Overhead Power Lines Modal -->
         <!-- *********** start Contact With Overhead Power Lines STATS MODAL page ******************************** -->
    
	<div id="overhead_power_lines_status_modal" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top:-2%; max-width:700px;" >
		<a href="#" >
        <img src="<?php echo $base;?>img/hazards/construction/high_rise/right/overhead_power_lines_stats.png" />
        
        </a>
		<div class="modal-footer bg-gray">
			<button class="btn" data-dismiss="modal" onclick="$('#overhead_power_lines_status_modal').hide();">Close</button>
		</div>
	</div>
   
<!-- ******************** end  Contact With Overhead Power Lines   Stats modal page ************************************* -->       
      <!-- *********** start overhead1 library Hazard MODAL page ******************************** -->
    
	<div id="overhead1" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top: 10%; width:462px;" >
    <h5 class='margin10'>Construction - Contact with Overhead Power Lines Hazard</h5>
    <p class='margin10'><strong>Hazards resulting from contact with overhead power lines.</strong></p>
    <h6 class='margin10'>$5.00 - <i ><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:20px" /></i>&nbsp;5 - <i ><img src="<?php echo $base;?>img/icons_xp.png" style="height:20px" /></i>&nbsp;5</h6>
		
		<div class="modal-footer bg-gray">
        	<a href="<?php echo $base;?>admin/libraries_metro?libtype=3"><button  class="btn hazard_btn">S1 Hazards</button></a>
			<button class="btn" data-dismiss="modal" onclick="$('#overhead1').hide();">Close</button>
		</div>
	</div>
<!-- ******************** end overhead1 library Hazard modal page ************************************* --> 
    <!-- *********** start overhead2 library Procedure MODAL page ******************************** -->
    
	<div id="overhead2" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top: 10%; width:462px;" >
    <h5 class='margin10'>Contact with Overhead Power Lines Procedure</h5>
    <h6 class='margin10'>$14.00 - <i ><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:20px" /></i>&nbsp;20 - <i ><img src="<?php echo $base;?>img/icons_xp.png" style="height:20px" /></i>&nbsp;10</h6>
		
		<div class="modal-footer bg-gray">
        	<a href="<?php echo $base;?>admin/libraries_metro?libtype=4"><button  class="btn hazard_btn">S1 Procedures</button></a>
			<button class="btn" data-dismiss="modal" onclick="$('#overhead2').hide();">Close</button>
		</div>
	</div>
<!-- ******************** end overhead2 library Procedure modal page ************************************* -->
     <!-- *********** start overhead3 library Inspection MODAL page ******************************** -->
    
	<div id="overhead3" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top: 10%; width:462px;" >
    <h5 class='margin10'>Overhead Protection Inspection</h5>
    <h6 class='margin10'>$4.00 - <i ><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:20px" /></i>&nbsp;20 - <i ><img src="<?php echo $base;?>img/icons_xp.png" style="height:20px" /></i>&nbsp;200</h6>
		
		<div class="modal-footer bg-gray">
        	<a href="<?php echo $base;?>admin/s1_library_inspection_view_metro"><button  class="btn hazard_btn">S1 Inspections</button></a>
			<button class="btn" data-dismiss="modal" onclick="$('#overhead3').hide();">Close</button>
		</div>
	</div>
<!-- ******************** end overhead3 library Inspection modal page ************************************* --> 
<script type="text/javascript">

$(function () {
    $(".overhead1").on('click', function() {
        $('#overhead2').modal('hide');
        $('#overhead3').modal('hide');
    });
 	$(".overhead2").on('click', function() {
        $('#overhead1').modal('hide');
        $('#overhead3').modal('hide');
    });
 	$(".overhead3").on('click', function() {
        $('#overhead1').modal('hide');
        $('#overhead2').modal('hide');
    });
   
});
</script>

       

    <!-- Start Ladders  Modal --> 
    <div class="metro">
      <div id="ladders" class="modal hide fade hazard-item " active_hazard_item="ladders" pointpage_section_id="1020" tabindex="-1" style="max-width:600px;" role="dialog" aria-labelledby="myModalLabel" >
      <!--class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="cursor:pointer;"-->
     
      	<div class="modal-header bg-red">
            <h3 ><span class="icon on-left" ><img src="<?php echo $base;?>img/library/hazards.png" width="30" height="30"></span><b>Ladders</b><i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal" onclick="window.location.reload();"></i></h3>
        </div>
       <div class="modal-body" id="body4" >
       		<center>
                <div class="flexslider" style="max-width:600px;">
                    <ul class="slides ladders">
                        <li><img src="<?php echo $base;?>img/hazards/construction/high_rise/right/haz-19.jpg"/></li>
                        <li><img src="<?php echo $base;?>img/hazards/construction/high_rise/right/haz-20.jpg"/></li>
                        <li><img src="<?php echo $base;?>img/hazards/construction/high_rise/right/haz-21.jpg"/></li>
                        <li><img src="<?php echo $base;?>img/hazards/construction/high_rise/right/haz-22.jpg"/></li>
                        <li><img src="<?php echo $base;?>img/hazards/construction/high_rise/right/haz-23.jpg"/></li>
                        <li><img src="<?php echo $base;?>img/hazards/construction/high_rise/right/haz-24.jpg"/></li>
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
                        <li class="user_tab"><a href='#ladders_status_modal' data-toggle='modal' class="hazard-tab"><i class="icon-stats-up on-left-more"></i>Stats</a></li>
                        <li class="user_tab"><a href="#box4controls" class="hazard-tab"><i class="icon-dashboard on-left-more"></i>Controls</a></li>
                        <li class="user_tab"><a href="#box4library" class="hazard-tab"><i class="on-left-more"><img src="<?php echo $base;?>img/library/header_menu_training_blank.png" /></i>Library</a></li>
                    </ul>
                    <div class="frames">
                        
                        <div class="frame text-left" id="box4description">
                        
                            <p class="s1content_body_section" ><strong>Hazard</strong></p>
							<p class="s1content_body_section box4hazard"><?php lang('ladders_hazard');?></p>
                        </div>
                        <div class="frame text-left" id="box4stats">
                         
                            <p  >
                            Stats
                                
                            </p>
                          
                           
                        </div>
                        <div class="frame text-left" id="box4controls">
                            <p class="s1content_body_section" ><strong>Controls</strong></p>
							<p class="s1content_body_section box4controls"><?php lang('ladders_controls');?></p>
                           
                        </div>
                     
                        <div class="frame text-left" id="box4library">
                            <div class="row-fluid">
                            <a href='#ladders1' data-toggle='modal' class="tile half-library ladders1 bg-darker add_to_cart description">
									<div class="half bg-darker">
										<img src="<?php echo $base;?>img/library/hazards.png">
										<span class="fg-white" style="position:absolute;top:0px;"><small>Ladders</small></span>
									</div>
									<div class="brand">                                              
										<span class="label fg-white text-center">&nbsp;<small><i class=""><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:16px;"></i>&nbsp;5&nbsp;<i class=""><img src="<?php echo $base;?>img/icons_xp.png" style="height:16px;"></i>&nbsp;5</small></span>
									</div>
								</a>
                            
                            <a href='#ladders2' data-toggle='modal' class="tile half-library ladders2 bg-darker add_to_cart description">
									<div class="half bg-darker">
										<img src="<?php echo $base;?>img/library/procedures.png">
										<span class="fg-white" style="position:absolute;top:0px;"><small>Ladders</small></span>
									</div>
									<div class="brand">                                              
										<span class="label fg-white text-center">&nbsp;<small><i class=""><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:16px;"></i>&nbsp;20&nbsp;<i class=""><img src="<?php echo $base;?>img/icons_xp.png" style="height:16px;"></i>&nbsp;10</small></span>
									</div>
								</a>
								<a href='#ladders3' data-toggle='modal' class="tile half-library ladders3 bg-darker add_to_cart description" >
									<div class="half bg-darker">
										<img src="<?php echo $base;?>img/library/inspections.png">
										<span class="fg-white" style="position:absolute;top:0px;"><small>Ladders</small></span>
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
                <button class=" hazard-sponsor" ><b>Sponsored By</b></button></a>&nbsp;
				<!--button href="<?php echo $base;?>admin/libraries_metro?libtype=1" class="btn">S1 Library</button--> &nbsp;
				<button class="btn" data-dismiss="modal" onclick="window.location.reload();">Close</button>
			</div> 
      </div> 
      </div>
            
    <!-- End Ladders Modal -->
         <!-- *********** start Ladders STATS MODAL page ******************************** -->
    
	<div id="ladders_status_modal" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top:-2%; max-width:700px;" >
		<a href="#" >
        <img src="<?php echo $base;?>img/hazards/construction/high_rise/right/ladders_stats.png" />
        
        </a>
		<div class="modal-footer bg-gray">
			<button class="btn" data-dismiss="modal" onclick="$('#ladders_status_modal').hide();">Close</button>
		</div>
	</div>
   
<!-- ******************** end  Ladders   Stats modal page ************************************* -->       
     <!-- *********** start ladders1 library Hazard MODAL page ******************************** -->
    
	<div id="ladders1" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top: 10%; width:462px;" >
    <h5 class='margin10'>Construction - Ladders Hazard</h5>
    <p class='margin10'><strong>A ladder is a structure made of wood, fiberglass, or metal.</strong></p>
    <h6 class='margin10'>$5.00 - <i ><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:20px" /></i>&nbsp;5 - <i ><img src="<?php echo $base;?>img/icons_xp.png" style="height:20px" /></i>&nbsp;5</h6>
		
		<div class="modal-footer bg-gray">
        	<a href="<?php echo $base;?>admin/libraries_metro?libtype=3"><button  class="btn hazard_btn">S1 Hazards</button></a>
			<button class="btn" data-dismiss="modal" onclick="$('#ladders1').hide();">Close</button>
		</div>
	</div>
<!-- ******************** end ladders1 library Hazard modal page ************************************* --> 
    <!-- *********** start ladders2 library Procedure MODAL page ******************************** -->
    
	<div id="ladders2" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top: 10%; width:462px;" >
    <h5 class='margin10'>Ladders Procedure</h5>
    <h6 class='margin10'>$14.00 - <i ><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:20px" /></i>&nbsp;20 - <i ><img src="<?php echo $base;?>img/icons_xp.png" style="height:20px" /></i>&nbsp;10</h6>
		
		<div class="modal-footer bg-gray">
        	<a href="<?php echo $base;?>admin/libraries_metro?libtype=4"><button  class="btn hazard_btn">S1 Procedures</button></a>
			<button class="btn" data-dismiss="modal" onclick="$('#ladders2').hide();">Close</button>
		</div>
	</div>
<!-- ******************** end ladders2 library Procedure modal page ************************************* -->
     <!-- *********** start ladders3 library Inspection MODAL page ******************************** -->
    
	<div id="ladders3" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top: 10%; width:462px;" >
    <h5 class='margin10'>Ladders Inspection</h5>
    <h6 class='margin10'>$4.00 - <i ><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:20px" /></i>&nbsp;20 - <i ><img src="<?php echo $base;?>img/icons_xp.png" style="height:20px" /></i>&nbsp;200</h6>
		
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
    
	<div id="sponsoredby" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;max-width:462px;" >
		<a href="http://torcanlift.com/" target="new">
        <img src="<?php echo $base;?>img/sponsor/construction/high_rise_right/ad1.jpg" style="width:100%;height:100%;"/>
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
	// window.onload = updateHazardData("washroom",1);
	function updateHazardData($hazardSection,$pointPageSection)
	{
		var $to_lang 			= '<?php echo $to_lang;?>';
		$active_hazard_item 	= $hazardSection;
		$("#"+$active_hazard_item).each(function() {
			if( "office" == $active_hazard_item ) {
				$hazard 	= '<?php echo lang("office_hazard");?>';
				$controls 	= '<?php echo lang("office_controls");?>';
			}
			else if( "excavation_collapse" == $active_hazard_item ) {
				$hazard 	= '<?php echo lang("excavation_collapse_hazard");?>';
				$controls 	= '<?php echo lang("excavation_collapse_controls");?>';
			}
			else if( "overhead" == $active_hazard_item ) {
				$hazard 	= '<?php echo lang("overhead_hazard");?>';
				$controls 	= '<?php echo lang("overhead_controls");?>';
			}
			else if( "ladders" == $active_hazard_item ) {
				$hazard 	= '<?php echo lang("ladders_hazard");?>';
				$controls 	= '<?php echo lang("ladders_controls");?>';
			}
			$data_hazards = $hazard+"RIGHT_HAZARD"+$controls;

			$.post(js_base_path+'ajax/getTranslatedText', {'paragraphDescription':$data_hazards,'translateSection':"digital_hazards", 'fromLang':"en", 'toLang':$to_lang}, function(data){
				var $digihazard_text = data.split("RIGHT_HAZARD");
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
					if( "office" == $active_hazard_item ) {
						$hazard 	= '<?php echo lang("office_hazard");?>';
						$controls 	= '<?php echo lang("office_controls");?>';
						$pointpage_section_id 	= "1";
					}
					else if( "excavation_collapse" == $active_hazard_item ) {
						$hazard 	= '<?php echo lang("excavation_collapse_hazard");?>';
						$controls 	= '<?php echo lang("excavation_collapse_controls");?>';
						$pointpage_section_id 	= "2";
					}
					else if( "overhead" == $active_hazard_item ) {
						$hazard 	= '<?php echo lang("overhead_hazard");?>';
						$controls 	= '<?php echo lang("overhead_controls");?>';
						$pointpage_section_id 	= "3";
					}
					else if( "ladders" == $active_hazard_item ) {
						$hazard 	= '<?php echo lang("ladders_hazard");?>';
						$controls 	= '<?php echo lang("ladders_controls");?>';
						$pointpage_section_id 	= "4";
					}
					$data_hazards = $hazard+"RIGHT_HAZARD"+$controls;

					$.post(js_base_path+'ajax/getTranslatedText', {'paragraphDescription':$data_hazards,'translateSection':"digital_hazards", 'fromLang':"en", 'toLang':$to_lang}, function(data){
						var $digihazard_text = data.split("RIGHT_HAZARD");
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
	$('#high-rise-right-dropdown').change(function() {
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