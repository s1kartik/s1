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
          <span id="hazard-title"><h3><span class="icon on-left"><img src="<?php echo $base;?>img/library/hazards.png" width="40" height="40"></span>&nbsp;High Rise Back Side </h3></span>

          <span  class="metro" style="float:right">________ Select ________<br />
          <div class="styled-select">
          <select id="high-rise-back-dropdown" class="bg-red fg-white" onchange="javascript:updateHazardData(this.value);" >
          	<option value="">- Select Section</option>
            <option value="washroom">Washroom Facilities</option>
          	<option value="unguarded">Unguarded Machinery</option>
            <option value="exposure">Exposure to Chemicals </option>
            <option value="explosions">Explosions</option>
          	
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
			$rows	= $this->points->hasUserGainedPointsGetPoints(1, 5, $checkPointsGained=1);
			$img 	= ($rows['has_points_gained']) ? "equip-dot-green" : 'equip-dot';
			?>
		    <a id="dot_washroom" href="#washroom" data-toggle='modal' onclick="updateHazardData('washroom',1);">
            <img class="equip-dot" target="1" data-toggle="tooltip" title="" src="<?php echo $base."img/equip/".$img.".png";?>" style="top: 55%;left: 25%;" data-original-title="Washroom Facilities">
			</a>

			<?php 
			$rows	= $this->points->hasUserGainedPointsGetPoints(1, 6, $checkPointsGained=1);
			$img 	= ($rows['has_points_gained']) ? "equip-dot-green" : 'equip-dot';
			?>
			<a id="dot_unguarded" href="#unguarded" data-toggle='modal' onclick="updateHazardData('unguarded',2);">
            <img class="equip-dot" target="2" data-toggle="tooltip" title="" src="<?php echo $base."img/equip/".$img.".png";?>" style="top: 49%;left: 44%;" data-original-title="Unguarded Machinery">
			</a>

			<?php 
			$rows	= $this->points->hasUserGainedPointsGetPoints(1, 7, $checkPointsGained=1);
			$img 	= ($rows['has_points_gained']) ? "equip-dot-green" : 'equip-dot';
			?>
			<a id="dot_exposure" href="#exposure" data-toggle='modal' onclick="updateHazardData('exposure',3);">
            <img class="equip-dot" target="3" data-toggle="tooltip" title="" src="<?php echo $base."img/equip/".$img.".png";?>" style="top: 74%;left: 66%;" data-original-title="Exposure To Chemicals">
			</a>

			<?php 
			$rows	= $this->points->hasUserGainedPointsGetPoints(1, 8, $checkPointsGained=1);
			$img 	= ($rows['has_points_gained']) ? "equip-dot-green" : 'equip-dot';
			?>
			 <a id="dot_explosions" href="#explosions" data-toggle='modal' onclick="updateHazardData('explosions',4);">
             <img class="equip-dot" target="4" data-toggle="tooltip" title="" src="<?php echo $base."img/equip/".$img.".png";?>" style="top: 69%;left: 88%;" data-original-title="Explosions">
			 </a>
            </div>         
            <img src="<?php echo $base;?>img/hazards/construction/high_rise/back/high_back.jpg">
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


<!-- Start washroom facilities Modal --> 
    <div class="metro">
      <div id="washroom" class="modal hide fade hazard-item " active_hazard_item="washroom" pointpage_section_id="5" tabindex="-1" style="max-width:600px;" role="dialog" aria-labelledby="myModalLabel" >    
      	<div class="modal-header bg-red">
            <h3 ><span class="icon on-left" ><img src="<?php echo $base;?>img/library/hazards.png" width="30" height="30"></span><strong>Washroom Facilities</strong><i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal" onclick="window.location.reload();"></i></h3>
        </div>
       <div class="modal-body" id="body1" >
       		<center>
                <div class="flexslider" style="max-width:600px;">
                    <ul class="slides washroom">
                        <li><img src="<?php echo $base;?>img/hazards/construction/high_rise/back/haz-1.jpg"/></li>
                        <li><img src="<?php echo $base;?>img/hazards/construction/high_rise/back/haz-2.jpg"/></li>
                        <li><img src="<?php echo $base;?>img/hazards/construction/high_rise/back/haz-3.jpg"/></li>
                        <li><img src="<?php echo $base;?>img/hazards/construction/high_rise/back/haz-4.jpg"/></li>
                        <li><img src="<?php echo $base;?>img/hazards/construction/high_rise/back/haz-5.jpg"/></li>
                        <li><img src="<?php echo $base;?>img/hazards/construction/high_rise/back/haz-6.jpg"/></li>
                        <li><img src="<?php echo $base;?>img/hazards/construction/stats_message.png"/></li>
                    </ul>
                    
		        </div>
               </center>
			   <div class="padding5 clearfix"><?php echo $this->common->callLanguageSelectBox('cmb_hazard_lang', $to_lang, 'cmb_hazard_lang select-right');?></div>

	        <div class="profile-user">
                <div class="tab-control no-margin" data-effect="fade" data-role="tab-control">
                    <ul class="tabs">
                        <li class="active user_tab"><a href="#box1description" class="hazard-tab"><i class="on-left-more"><img src="<?php echo $base;?>img/library/hazards.png" width="18" height="18"></i>Hazard</a></li>
                        <li class="user_tab"><a href='#washroom_status_modal' data-toggle='modal' class="hazard-tab"><i class="icon-stats-up on-left-more"></i>Stats</a></li>
                        <li class="user_tab"><a href="#box1controls" class="hazard-tab"><i class="icon-dashboard on-left-more"></i>Controls</a></li>
                        <li class="user_tab"><a href="#box1library" class="hazard-tab"><i class="on-left-more"><img src="<?php echo $base;?>img/library/header_menu_training_blank.png" /></i>Library</a></li>
                    </ul>
                    <div class="frames">
                        <div class="frame text-left" id="box1description">
                            <p class="s1content_body_section"><strong>Hazard</strong></p>
							<p class="s1content_body_section box1hazard"><?php lang("washroom_hazard");?></p>
                        </div>
                        <div class="frame text-left" id="box1stats">
                            <p><a href='#washroom_status_modal' data-toggle='modal'>Stats</a></p>
                        </div>
                        <div class="frame text-left" id="box1controls">
                            <p class="s1content_body_section" ><strong>Controls</strong>
							<p class="s1content_body_section box1controls"><?php lang("washroom_controls");?></p>
                        </div>
                     
                        <div class="frame text-left" id="box1library">
                            <div class="row-fluid">
                                                        
                            <a href='#washroom2' data-toggle='modal' class="tile half-library washroom2 bg-darker add_to_cart description">
									<div class="half bg-darker">
										<img src="<?php echo $base;?>img/library/procedures.png">
										<span class="fg-white" style="position:absolute;top:0px;"><small>Toilet and Washroom</small></span>
									</div>
									<div class="brand">                                              
										<span class="label fg-white text-center">&nbsp;<small><i class=""><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:16px;"></i>&nbsp;20&nbsp;<i class=""><img src="<?php echo $base;?>img/icons_xp.png" style="height:16px;"></i>&nbsp;10</small></span>
									</div>
								</a>
								<a href='#washroom3' data-toggle='modal' class="tile half-library washroom3 bg-darker add_to_cart description" >
									<div class="half bg-darker">
										<img src="<?php echo $base;?>img/library/inspections.png">
										<span class="fg-white" style="position:absolute;top:0px;"><small>Toilet and Washroom</small></span>
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
            
    <!-- End washroom facilities Modal -->
         <!-- *********** start Washroom Facilities Stats MODAL page ******************************** -->
    
	<div id="washroom_status_modal" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top:-2%; max-width:700px;" >
		<a href="#" >
        <img src="<?php echo $base;?>img/hazards/construction/high_rise/back/toilets_stats.png" />
        
        </a>
		<div class="modal-footer bg-gray">
			<button class="btn" data-dismiss="modal" onclick="$('#washroom_status_modal').hide();">Close</button>
		</div>
	</div>
   
<!-- ******************** end  Washroom Facilities Stats modal page ************************************* --> 
    
    <!-- *********** start washroom2 library Procedure MODAL page ******************************** -->
    
	<div id="washroom2" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top: 10%; width:462px;" >
    <h5 class='margin10'>Toilet and Washroom Facilities Procedure</h5>
    <h6 class='margin10'>$14.00 - <i ><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:20px" /></i>&nbsp;20 - <i ><img src="<?php echo $base;?>img/icons_xp.png" style="height:20px" /></i>&nbsp;10</h6>
		
		<div class="modal-footer bg-gray">
        	<a href="<?php echo $base;?>admin/libraries_metro?libtype=4"><button  class="btn hazard_btn">S1 Procedures</button></a>
			<button class="btn" data-dismiss="modal" onclick="$('#washroom2').hide();">Close</button>
		</div>
	</div>
<!-- ******************** end washroom2 library Procedure modal page ************************************* -->
     <!-- *********** start washroom3 library Inspection MODAL page ******************************** -->
    
	<div id="washroom3" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top: 10%; width:462px;" >
    <h5 class='margin10'>Toilet and Washroom Facilities Inspection</h5>
    <h6 class='margin10'>$4.00 - <i ><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:20px" /></i>&nbsp;20 - <i ><img src="<?php echo $base;?>img/icons_xp.png" style="height:20px" /></i>&nbsp;200</h6>
		
		<div class="modal-footer bg-gray">
        	<a href="<?php echo $base;?>admin/s1_library_inspection_view_metro"><button  class="btn hazard_btn">S1 Inspections</button></a>
			<button class="btn" data-dismiss="modal" onclick="$('#washroom3').hide();">Close</button>
		</div>
	</div>
<!-- ******************** end washroom3 library Inspection modal page ************************************* --> 
<script type="text/javascript">

$(function () {
    
 	$(".washroom2").on('click', function() {
       $('#washroom3').modal('hide');
    });
 	$(".washroom3").on('click', function() {
        $('#washroom2').modal('hide');
    });
   
});
</script> 
 

   
    <!-- Start unguarded machinery Modal --> 
    <div class="metro">
      <div id="unguarded" class="modal hide fade hazard-item " active_hazard_item="unguarded" pointpage_section_id="6" tabindex="-1" style="max-width:600px;" role="dialog" aria-labelledby="myModalLabel" >     
      	<div class="modal-header bg-red">
            <h3 ><span class="icon on-left" ><img src="<?php echo $base;?>img/library/hazards.png" width="30" height="30"></span><strong>Unguarded Machinery</strong><i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal" onclick="window.location.reload();"></i></h3>
        </div>
       <div class="modal-body" id="body2" >
       		<center>
                
                <div class="flexslider" style="max-width:600px;">
                    <ul class="slides unguarded">
                        <li><img src="<?php echo $base;?>img/hazards/construction/high_rise/back/haz-7.jpg"/></li>
                        <li><img src="<?php echo $base;?>img/hazards/construction/high_rise/back/haz-8.jpg"/></li>
                        <li><img src="<?php echo $base;?>img/hazards/construction/high_rise/back/haz-9.jpg"/></li>
                        <li><img src="<?php echo $base;?>img/hazards/construction/high_rise/back/haz-10.jpg"/></li>
                        <li><img src="<?php echo $base;?>img/hazards/construction/high_rise/back/haz-11.jpg"/></li>
                        <li><img src="<?php echo $base;?>img/hazards/construction/high_rise/back/haz-12.jpg"/></li>
                        <li><img src="<?php echo $base;?>img/hazards/construction/stats_message.png"/></li>
                    </ul>
                    
		        </div>
				</center>
				<div class="padding5 clearfix"><?php echo $this->common->callLanguageSelectBox('cmb_hazard_lang', $to_lang, 'cmb_hazard_lang select-right');?></div>
            
	        <div class="profile-user">
                <div class="tab-control no-margin" data-effect="fade" data-role="tab-control">
                    <ul class="tabs">
                        <li class="active user_tab"><a href="#box2description" class="hazard-tab"><i class="on-left-more"><img src="<?php echo $base;?>img/library/hazards.png" width="18" height="18"></i>Hazard</a></li>
                        <li class="user_tab"><a href='#unguarded_machinery_status_modal' data-toggle='modal' class="hazard-tab"><i class="icon-stats-up on-left-more"></i>Stats</a></li>
                        <li class="user_tab"><a href="#box2controls" class="hazard-tab"><i class="icon-dashboard on-left-more"></i>Controls</a></li>
                        <li class="user_tab"><a href="#box2library" class="hazard-tab"><i class="on-left-more"><img src="<?php echo $base;?>img/library/header_menu_training_blank.png" /></i>Library</a></li>
                    </ul>
                    <div class="frames">
                        
                        <div class="frame text-left" id="box2description">
                            <p class="s1content_body_section"><strong>Hazard</strong></p>
                            <p class="s1content_body_section box2hazard"><?php lang("unguarded_hazard");?></p>
                        </div>
                        <div class="frame text-left" id="box2stats"><p>Stats</p></div>
                        <div class="frame text-left" id="box2controls">
                            <p class="s1content_body_section"><strong>Controls</strong></p>
                            <p class="s1content_body_section box2controls"><?php lang("unguarded_controls");?></p>
                        </div>
                     
                        <div class="frame text-left" id="box2library">
                            <div class="row-fluid">
                            <a href='#unguarded2' data-toggle='modal' class="tile half-library unguarded2 bg-darker add_to_cart description">
									<div class="half bg-darker">
										<img src="<?php echo $base;?>img/library/procedures.png">
										<span class="fg-white" style="position:absolute;top:0px;"><small>Machine Guarding</small></span>
									</div>
									<div class="brand">                                              
										<span class="label fg-white text-center">&nbsp;<small><i class=""><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:16px;"></i>&nbsp;20&nbsp;<i class=""><img src="<?php echo $base;?>img/icons_xp.png" style="height:16px;"></i>&nbsp;10</small></span>
									</div>
								</a>
								<a href='#unguarded3' data-toggle='modal' class="tile half-library unguarded3 bg-darker add_to_cart description" >
									<div class="half bg-darker">
										<img src="<?php echo $base;?>img/library/inspections.png">
										<span class="fg-white" style="position:absolute;top:0px;"><small>Explosive Actuated</small></span>
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
            
    <!-- End unguarded Machinery Modal -->
         <!-- *********** start unguarded Machinery Stats MODAL page ******************************** -->
    
	<div id="unguarded_machinery_status_modal" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top:-2%; max-width:700px;" >
		<a href="#" >
        <img src="<?php echo $base;?>img/hazards/construction/high_rise/back/unguarded_machinery_stats.png" />
        
        </a>
		<div class="modal-footer bg-gray">
			<button class="btn" data-dismiss="modal" onclick="$('#unguarded_machinery_status_modal').hide();">Close</button>
		</div>
	</div>
   
<!-- ******************** end  unguarded Machinery Stats modal page ************************************* -->  
 <!-- *********** start unguarded2 library Procedure MODAL page ******************************** -->
    
	<div id="unguarded2" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top: 10%; width:462px;" >
    <h5 class='margin10'>Machine Guarding Procedure</h5>
    <h6 class='margin10'>$14.00 - <i ><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:20px" /></i>&nbsp;20 - <i ><img src="<?php echo $base;?>img/icons_xp.png" style="height:20px" /></i>&nbsp;10</h6>
		
		<div class="modal-footer bg-gray">
        	<a href="<?php echo $base;?>admin/libraries_metro?libtype=4"><button  class="btn hazard_btn">S1 Procedures</button></a>
			<button class="btn" data-dismiss="modal" onclick="$('#unguarded2').hide();">Close</button>
		</div>
	</div>
<!-- ******************** end unguarded2 library Procedure modal page ************************************* -->
     <!-- *********** start unguarded3 library Inspection MODAL page ******************************** -->
    
	<div id="unguarded3" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top: 10%; width:462px;" >
    <h5 class='margin10'>Explosive Actuated Fastening Tools</h5>
    <h6 class='margin10'>$4.00 - <i ><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:20px" /></i>&nbsp;20 - <i ><img src="<?php echo $base;?>img/icons_xp.png" style="height:20px" /></i>&nbsp;200</h6>
		
		<div class="modal-footer bg-gray">
        	<a href="<?php echo $base;?>admin/s1_library_inspection_view_metro"><button  class="btn hazard_btn">S1 Inspections</button></a>
			<button class="btn" data-dismiss="modal" onclick="$('#unguarded3').hide();">Close</button>
		</div>
	</div>
<!-- ******************** end unguarded3 library Inspection modal page ************************************* --> 
 <script type="text/javascript">

$(function () {
    $(".unguarded2").on('click', function() {
        $('#unguarded3').modal('hide');
    });
 	$(".unguarded3").on('click', function() {
        $('#unguarded2').modal('hide');
    });
   
});
</script> 
  
    
    <!-- Start Exposure To Chemicals Modal --> 
    <div class="metro">
      <div id="exposure" class="modal hide fade hazard-item " active_hazard_item="exposure" pointpage_section_id="7"  tabindex="-1" style="max-width:600px;" role="dialog" aria-labelledby="myModalLabel" >
      <!--class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="cursor:pointer;"-->
     
      	<div class="modal-header bg-red">
            <h3 ><span class="icon on-left" ><img src="<?php echo $base;?>img/library/hazards.png" width="30" height="30"></span><strong>Exposure To Chemicals</strong><i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal" onclick="window.location.reload();"></i></h3>
        </div>
       <div class="modal-body" id="body3" >
       		<center>
                
                <div class="flexslider" style="max-width:600px;">
                    <ul class="slides exposure">
                        <li><img src="<?php echo $base;?>img/hazards/construction/high_rise/back/haz-13.jpg"/></li>
                        <li><img src="<?php echo $base;?>img/hazards/construction/high_rise/back/haz-14.jpg"/></li>
                        <li><img src="<?php echo $base;?>img/hazards/construction/high_rise/back/haz-15.jpg"/></li>
                        <li><img src="<?php echo $base;?>img/hazards/construction/high_rise/back/haz-16.jpg"/></li>
                        <li><img src="<?php echo $base;?>img/hazards/construction/high_rise/back/haz-17.jpg"/></li>
                        <li><img src="<?php echo $base;?>img/hazards/construction/high_rise/back/haz-18.jpg"/></li>
                        <li><img src="<?php echo $base;?>img/hazards/construction/stats_message.png"/></li>
                    </ul>
                    
		        </div>
               </center>
				<div class="padding5 clearfix">
				<div class="padding5 clearfix"><?php echo $this->common->callLanguageSelectBox('cmb_hazard_lang', $to_lang, 'cmb_hazard_lang select-right');?></div>

	        <div class="profile-user">
                <div class="tab-control no-margin" data-effect="fade" data-role="tab-control">
                    <ul class="tabs">
                        <li class="active user_tab"><a href="#box3description" class="hazard-tab"><i class="on-left-more"><img src="<?php echo $base;?>img/library/hazards.png" width="18" height="18"></i>Hazard</a></li>
                        <li class="user_tab"><a href='#exposure_chemicals_status_modal' data-toggle='modal' class="hazard-tab"><i class="icon-stats-up on-left-more"></i>Stats</a></li>
                        <li class="user_tab"><a href="#box3controls" class="hazard-tab"><i class="icon-dashboard on-left-more"></i>Controls</a></li>
                        <li class="user_tab"><a href="#box3library" class="hazard-tab"><i class="on-left-more"><img src="<?php echo $base;?>img/library/header_menu_training_blank.png" /></i>Library</a></li>
                    </ul>
                    <div class="frames">
                        <div class="frame text-left" id="box3description">
                            <p class="s1content_body_section" ><strong>Hazard</strong></p>
                            <p class="s1content_body_section box3hazard" ><?php lang('exposure_hazard');?></p>                           
                        </div>
                        <div class="frame text-left" id="box3stats"><p>Stats</p></div>
                        <div class="frame text-left" id="box3controls">
                            <p class="s1content_body_section"><strong>Controls</strong></p>
							<p class="s1content_body_section box3controls"><?php lang('exposure_controls');?></p>
                        </div>
                     
                        <div class="frame text-left" id="box3library">
                            <div class="row-fluid">
                            <a href='#exposure1' data-toggle='modal' class="tile half-library exposure1 bg-darker add_to_cart description">
									<div class="half bg-darker">
										<img src="<?php echo $base;?>img/library/hazards.png">
										<span class="fg-white" style="position:absolute;top:0px;"><small>Exposure to Chem..</small></span>
									</div>
									<div class="brand">                                              
										<span class="label fg-white text-center">&nbsp;<small><i class=""><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:16px;"></i>&nbsp;5&nbsp;<i class=""><img src="<?php echo $base;?>img/icons_xp.png" style="height:16px;"></i>&nbsp;5</small></span>
									</div>
								</a>
                            
                            <a href='#exposure2' data-toggle='modal' class="tile half-library exposure2 bg-darker add_to_cart description">
									<div class="half bg-darker">
										<img src="<?php echo $base;?>img/library/procedures.png">
										<span class="fg-white" style="position:absolute;top:0px;"><small>Cleaning Up Spills</small></span>
									</div>
									<div class="brand">                                              
										<span class="label fg-white text-center">&nbsp;<small><i class=""><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:16px;"></i>&nbsp;20&nbsp;<i class=""><img src="<?php echo $base;?>img/icons_xp.png" style="height:16px;"></i>&nbsp;10</small></span>
									</div>
								</a>
								<a href='#exposure3' data-toggle='modal' class="tile half-library exposure3 bg-darker add_to_cart description" >
									<div class="half bg-darker">
										<img src="<?php echo $base;?>img/library/inspections.png">
										<span class="fg-white" style="position:absolute;top:0px;"><small>Material Storage</small></span>
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
            
    <!-- End Exposure To Chemicals Modal -->
 <!-- *********** start Exposure To Chemicals  Stats MODAL page ******************************** -->
    
	<div id="exposure_chemicals_status_modal" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top:-2%; max-width:700px;" >
		<a href="#" >
        <img src="<?php echo $base;?>img/hazards/construction/high_rise/back/exposure_chemicals_stats.png" />
        
        </a>
		<div class="modal-footer bg-gray">
			<button class="btn" data-dismiss="modal" onclick="$('#exposure_chemicals_status_modal').hide();">Close</button>
		</div>
	</div>
   
<!-- ******************** end  Exposure To Chemicals  Stats modal page ************************************* -->         
     <!-- *********** start exposure1 library Hazard MODAL page ******************************** -->
    
	<div id="exposure1" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top: 10%; width:462px;" >
    <h5 class='margin10'>Construction - Exposure to Chemicals Hazard</h5>
    <p class='margin10'><strong>The Canadian Centre for Occupational Health and Safety (CCOHS) defines a hazardous chemical as any product that is combustible, explosive, flammable, reactive or has oxidizing properties that can cause immediate or delayed health hazards.</strong></p>
    <h6 class='margin10'>$5.00 - <i ><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:20px" /></i>&nbsp;5 - <i ><img src="<?php echo $base;?>img/icons_xp.png" style="height:20px" /></i>&nbsp;5</h6>
		
		<div class="modal-footer bg-gray">
        	<a href="<?php echo $base;?>admin/libraries_metro?libtype=3"><button  class="btn hazard_btn">S1 Hazards</button></a>
			<button class="btn" data-dismiss="modal" onclick="$('#exposure1').hide();">Close</button>
		</div>
	</div>
<!-- ******************** end exposure1 library Hazard modal page ************************************* --> 
    <!-- *********** start exposure2 library Procedure MODAL page ******************************** -->
    
	<div id="exposure2" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top: 10%; width:462px;" >
    <h5 class='margin10'>Cleaning Up Spills Procedure</h5>
    <h6 class='margin10'>$14.00 - <i ><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:20px" /></i>&nbsp;20 - <i ><img src="<?php echo $base;?>img/icons_xp.png" style="height:20px" /></i>&nbsp;10</h6>
		
		<div class="modal-footer bg-gray">
        	<a href="<?php echo $base;?>admin/libraries_metro?libtype=4"><button  class="btn hazard_btn">S1 Procedures</button></a>
			<button class="btn" data-dismiss="modal" onclick="$('#exposure2').hide();">Close</button>
		</div>
	</div>
<!-- ******************** end exposure2 library Procedure modal page ************************************* -->
     <!-- *********** start exposure3 library Inspection MODAL page ******************************** -->
    
	<div id="exposure3" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top: 10%; width:462px;" >
    <h5 class='margin10'>Material Storage Inspection</h5>
    <h6 class='margin10'>$4.00 - <i ><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:20px" /></i>&nbsp;20 - <i ><img src="<?php echo $base;?>img/icons_xp.png" style="height:20px" /></i>&nbsp;200</h6>
		
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
 

    <!-- Start Explosions  Modal --> 
    <div class="metro">
      <div id="explosions" class="modal hide fade hazard-item " active_hazard_item="explosions" pointpage_section_id="8" tabindex="-1" style="max-width:600px;" role="dialog" aria-labelledby="myModalLabel" >
      <!--class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="cursor:pointer;"-->
     
      	<div class="modal-header bg-red">
            <h3 ><span class="icon on-left" ><img src="<?php echo $base;?>img/library/hazards.png" width="30" height="30"></span><strong>Explosions</strong><i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal" onclick="window.location.reload();"></i></h3>
        </div>
       <div class="modal-body" id="body4" >
       		<center>
                
                <div class="flexslider" style="max-width:600px;">
                    <ul class="slides explosions">
                        <li><img src="<?php echo $base;?>img/hazards/construction/high_rise/back/haz-19.jpg"/></li>
                        <li><img src="<?php echo $base;?>img/hazards/construction/high_rise/back/haz-20.jpg"/></li>
                        <li><img src="<?php echo $base;?>img/hazards/construction/high_rise/back/haz-21.jpg"/></li>
                        <li><img src="<?php echo $base;?>img/hazards/construction/high_rise/back/haz-22.jpg"/></li>
                        <li><img src="<?php echo $base;?>img/hazards/construction/high_rise/back/haz-23.jpg"/></li>
                        <li><img src="<?php echo $base;?>img/hazards/construction/high_rise/back/haz-24.jpg"/></li>
                        <li><img src="<?php echo $base;?>img/hazards/construction/stats_message.png"/></li>
                    </ul>
                    
		        </div>
               </center>
			   <div class="padding5 clearfix">			   
			   <div class="padding5 clearfix"><?php echo $this->common->callLanguageSelectBox('cmb_hazard_lang', $to_lang, 'cmb_hazard_lang select-right');?></div>
			   
	        <div class="profile-user">
                <div class="tab-control no-margin" data-effect="fade" data-role="tab-control">
                    <ul class="tabs">
                        <li class="active user_tab"><a href="#box4description" class="hazard-tab"><i class="on-left-more"><img src="<?php echo $base;?>img/library/hazards.png" width="18" height="18"></i>Hazard</a></li>
                        <li class="user_tab"><a href='#explosions_status_modal' data-toggle='modal' class="hazard-tab"><i class="icon-stats-up on-left-more"></i>Stats</a></li>
                        <li class="user_tab"><a href="#box4controls" class="hazard-tab"><i class="icon-dashboard on-left-more"></i>Controls</a></li>
                        <li class="user_tab"><a href="#box4library" class="hazard-tab"><i class="on-left-more"><img src="<?php echo $base;?>img/library/header_menu_training_blank.png" /></i>Library</a></li>
                    </ul>
                    <div class="frames">
                        
                        <div class="frame text-left" id="box4description">
                            <p class="s1content_body_section"><strong>Hazard</strong></p>
                            <p class="s1content_body_section box4hazard"><?php lang('explosions_hazard');?></p>
                        </div>
                        <div class="frame text-left" id="box4stats">
                            <p>Stats</p>
                        </div>
                        <div class="frame text-left" id="box4controls">
                            <p class="s1content_body_section"><strong>Controls</strong></p>
							<p class="s1content_body_section box4controls"><?php lang('explosions_controls');?></p>
                        </div>
                     
                        <div class="frame text-left" id="box4library">
                            <div class="row-fluid">
                            <a href='#explosions1' data-toggle='modal' class="tile half-library explosions1 bg-darker add_to_cart description">
									<div class="half bg-darker">
										<img src="<?php echo $base;?>img/library/hazards.png">
										<span class="fg-white" style="position:absolute;top:0px;"><small>Explosion Hazard</small></span>
									</div>
									<div class="brand">                                              
										<span class="label fg-white text-center">&nbsp;<small><i class=""><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:16px;"></i>&nbsp;5&nbsp;<i class=""><img src="<?php echo $base;?>img/icons_xp.png" style="height:16px;"></i>&nbsp;5</small></span>
									</div>
								</a>
                            
                            <a href='#explosions2' data-toggle='modal' class="tile half-library explosions2 bg-darker add_to_cart description">
									<div class="half bg-darker">
										<img src="<?php echo $base;?>img/library/procedures.png">
										<span class="fg-white" style="position:absolute;top:0px;"><small>Explosion Safety</small></span>
									</div>
									<div class="brand">                                              
										<span class="label fg-white text-center">&nbsp;<small><i class=""><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:16px;"></i>&nbsp;20&nbsp;<i class=""><img src="<?php echo $base;?>img/icons_xp.png" style="height:16px;"></i>&nbsp;10</small></span>
									</div>
								</a>
								<a href='#explosions3' data-toggle='modal' class="tile half-library explosions3 bg-darker add_to_cart description" >
									<div class="half bg-darker">
										<img src="<?php echo $base;?>img/library/inspections.png">
										<span class="fg-white" style="position:absolute;top:0px;"><small>Compressed Gas</small></span>
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
            
    <!-- End Explosions Modal -->
     <!-- *********** start Explosions  Stats MODAL page ******************************** -->
    
	<div id="explosions_status_modal" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top:-2%; max-width:700px;" >
		<a href="#" >
        <img src="<?php echo $base;?>img/hazards/construction/high_rise/back/explosion_stats.png" />
        
        </a>
		<div class="modal-footer bg-gray">
			<button class="btn" data-dismiss="modal" onclick="$('#explosions_status_modal').hide();">Close</button>
		</div>
	</div>
   
<!-- ******************** end  Explosions  Stats modal page ************************************* -->
     <!-- *********** start explosions1 library Hazard MODAL page ******************************** -->
    
	<div id="explosions1" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top: 10%; width:462px;" >
    <h5 class='margin10'>Construction - Explosion Hazard</h5>
    <p class='margin10'><strong>A violent shattering or blowing a part of something. Some causes of explosions include accelerants used to cause fire, compressed, combustible or flammable material not stored or handled properly and contact or surges of strong currents of electricity.</strong></p>
    <h6 class='margin10'>$5.00 - <i ><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:20px" /></i>&nbsp;5 - <i ><img src="<?php echo $base;?>img/icons_xp.png" style="height:20px" /></i>&nbsp;5</h6>
		
		<div class="modal-footer bg-gray">
        	<a href="<?php echo $base;?>admin/libraries_metro?libtype=3"><button  class="btn hazard_btn">S1 Hazards</button></a>
			<button class="btn" data-dismiss="modal" onclick="$('#explosions1').hide();">Close</button>
		</div>
	</div>
<!-- ******************** end explosions1 library Hazard modal page ************************************* --> 
    <!-- *********** start explosions2 library Procedure MODAL page ******************************** -->
    
	<div id="explosions2" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top: 10%; width:462px;" >
    <h5 class='margin10'>Explosion Safety Procedure</h5>
    <h6 class='margin10'>$14.00 - <i ><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:20px" /></i>&nbsp;20 - <i ><img src="<?php echo $base;?>img/icons_xp.png" style="height:20px" /></i>&nbsp;10</h6>
		
		<div class="modal-footer bg-gray">
        	<a href="<?php echo $base;?>admin/libraries_metro?libtype=4"><button  class="btn hazard_btn">S1 Procedures</button></a>
			<button class="btn" data-dismiss="modal" onclick="$('#explosions2').hide();">Close</button>
		</div>
	</div>
<!-- ******************** end explosions2 library Procedure modal page ************************************* -->
     <!-- *********** start explosions3 library Inspection MODAL page ******************************** -->
    
	<div id="explosions3" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top: 10%; width:462px;" >
    <h5 class='margin10'>Compressed Gas Inspection</h5>
    <h6 class='margin10'>$4.00 - <i ><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:20px" /></i>&nbsp;20 - <i ><img src="<?php echo $base;?>img/icons_xp.png" style="height:20px" /></i>&nbsp;200</h6>
		
		<div class="modal-footer bg-gray">
        	<a href="<?php echo $base;?>admin/s1_library_inspection_view_metro"><button  class="btn hazard_btn">S1 Inspections</button></a>
			<button class="btn" data-dismiss="modal" onclick="$('#explosions3').hide();">Close</button>
		</div>
	</div>
<!-- ******************** end explosions3 library Inspection modal page ************************************* --> 
<script type="text/javascript">
$(function () {
    $(".explosions1").on('click', function() {
        $('#explosions2').modal('hide');
        $('#explosions3').modal('hide');
    });
 	$(".explosions2").on('click', function() {
        $('#explosions1').modal('hide');
        $('#explosions3').modal('hide');
    });
 	$(".explosions3").on('click', function() {
        $('#explosions1').modal('hide');
        $('#explosions2').modal('hide');
    });
   
});
</script>

     <!-- *********** start Sponsored by MODAL page ******************************** -->
    
	<div id="sponsoredby" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;max-width:462px;" >
		<a href="http://globalwasteservice.ca/" target="new">
        <img src="<?php echo $base;?>img/sponsor/construction/high_rise_back/ad1.jpg" />
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
		var $to_lang = '<?php echo $to_lang;?>';
		$active_hazard_item 	= $hazardSection;
		$("#"+$active_hazard_item).each(function() {
			if( "washroom" == $active_hazard_item ) {
				$hazard 	= '<?php echo lang("washroom_hazard");?>';
				$controls 	= '<?php echo lang("washroom_controls");?>';
			}
			else if( "unguarded" == $active_hazard_item ) {
				$hazard 	= '<?php echo lang("unguarded_hazard");?>';
				$controls 	= '<?php echo lang("unguarded_controls");?>';
			}
			else if( "exposure" == $active_hazard_item ) {
				$hazard 	= '<?php echo lang("exposure_hazard");?>';
				$controls 	= '<?php echo lang("exposure_controls");?>';
			}
			else if( "explosions" == $active_hazard_item ) {
				$hazard 	= '<?php echo lang("explosions_hazard");?>';
				$controls 	= '<?php echo lang("explosions_controls");?>';
			}
			$data_hazards = $hazard+"BACK_HAZARD"+$controls;

			$.post(js_base_path+'ajax/getTranslatedText', {'paragraphDescription':$data_hazards,'translateSection':"digital_hazards", 'fromLang':"en", 'toLang':$to_lang}, function(data){
				var $digihazard_text = data.split("BACK_HAZARD");
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
					if( "washroom" == $active_hazard_item ) {
						$hazard 	= '<?php echo lang("washroom_hazard");?>';
						$controls 	= '<?php echo lang("washroom_controls");?>';
						$pointpage_section_id 	= "1";
					}
					else if( "unguarded" == $active_hazard_item ) {
						$hazard 	= '<?php echo lang("unguarded_hazard");?>';
						$controls 	= '<?php echo lang("unguarded_controls");?>';
						$pointpage_section_id 	= "2";
					}
					else if( "exposure" == $active_hazard_item ) {
						$hazard 	= '<?php echo lang("exposure_hazard");?>';
						$controls 	= '<?php echo lang("exposure_controls");?>';
						$pointpage_section_id 	= "3";
					}
					else if( "explosions" == $active_hazard_item ) {
						$hazard 	= '<?php echo lang("explosions_hazard");?>';
						$controls 	= '<?php echo lang("explosions_controls");?>';
						$pointpage_section_id 	= "4";
					}
					$data_hazards = $hazard+"BACK_HAZARD"+$controls;

					$.post(js_base_path+'ajax/getTranslatedText', {'paragraphDescription':$data_hazards,'translateSection':"digital_hazards", 'fromLang':"en", 'toLang':$to_lang}, function(data){
						var $digihazard_text = data.split("BACK_HAZARD");
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
	
	$('#high-rise-back-dropdown').change(function() {
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