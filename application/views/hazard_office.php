<?php $this->load->view('header_admin'); ?>
<div class="homebg">
<div class="container container-profile">
  <div class="profile-wrapper" style="background:#333">
  <div id="equip-container" class="row-fluid">  
   <!-- Start Profile Menu Navigation -->
    <div id="equip-items"  class="span12">
    <!-- Start cart widget --> 
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
	</style>
      <div id="equip-landing" class="profile-menu-box">
         <div class="profile-menu-heading clearfix">
          <span id="hazard-title"><h3><span class="icon on-left" ><img src="<?php echo $base;?>img/library/hazards.png" width="40" height="40"></span>&nbsp;Workplace Hazards</h3></span>
           <span  class="metro" style="float:right">________ Select ________<br />
          <div class="styled-select">
          <select id="hazard-industry-dropdown" class="bg-red fg-white" >
          	<option value="construction" >Construction</option>
          	<option value="Office" selected="selected" >Office</option>
          </select>
          </div>
          </span>
         </div>
		</div>    
    <!-- End cart widget --> 
    <script type="text/javascript">
$('#hazard-industry-dropdown').change(function () {
    switch ($(this).val()){
    	case "construction":
    		$(location).attr('href','<?php echo $base."admin/hazard";?>');
    		break;
    	case "Office":
    		$(location).attr('href','<?php echo $base."admin/hazard_office";?>');
			break;
    }
       
});
</script>


    <!-- Start First Menu Box --> 
    <div class="metro">
    <div class="container-fluid">        
			<div class="main-content padding-metro-home clearfix"> 
						<!--START CODE FOR METRO STYLE-->
								
                                <!-- BEGIN SECOND COLUMN FIRST ROW -->
                                <div class="tile-group no-margin no-padding clearfix" > 
								<!--begin Digital Hazards STATS tile -->
                                    <a class="tile bg-black" href='#hazards_office_status_modal' data-toggle='modal'>
                                        <div class="tile-content icon">
                                        	<span class="icon">
                                        		<i class="icon-stats-up"></i>
                                            </span>
                                         </div>
                                        <div class="brand"><div class="label">STATS</div></div>
                                    </a>
                                <!--end  Digital Hazards STATS  tile-->
                                <!--begin Digital Hazards tile -->
                                    <a class="tile bg-black tile_hazards" href="<?php echo $base."admin/hazard_office1";?>">
                                        <div class="tile-content icon">
                                        	<span class="icon">
                                        		<img src="<?php echo $base;?>img/hazards/office/1/office_1.png">
                                            </span>
                                         </div>
                                        <div class="brand"><div class="label">Office 1</div></div>
                                    </a>
                                <!--end  Digital Hazards  tile-->
                                <!--begin Digital Hazards tile -->
                                    <a class="tile bg-black tile_hazards" href="<?php echo $base."admin/hazard_office2";?>">
                                        <div class="tile-content icon">
                                        	<span class="icon">
                                        		<img src="<?php echo $base;?>img/hazards/office/2/office_2.png">
                                            </span>
                                         </div>
                                        <div class="brand"><div class="label">Office 2</div></div>
                                    </a>
                                <!--end  Digital Hazards  tile-->
                                <!--begin Digital Hazards tile - ->
                                    <a class="tile bg-black tile_hazards" href="<?php echo $base."admin/hazard_high_rise_left";?>">
                                        <div class="tile-content icon">
                                        	<span class="icon">
                                        		<img src="<?php echo $base;?>img/hazards/construction/high_rise/left/high_left.png">
                                            </span>
                                         </div>
                                        <div class="brand"><div class="label">High Rise<br />  Left Side</div></div>
                                    </a>
                                <!--end  Digital Hazards  tile-->
                                <!--begin Digital Hazards tile - ->
                                    <a class="tile bg-black tile_hazards" href="<?php echo $base."admin/hazard_high_rise_right";?>">
                                        <div class="tile-content icon">
                                        	<span class="icon">
                                        		<img src="<?php echo $base;?>img/hazards/construction/high_rise/right/high_right.png">
                                            </span>
                                         </div>
                                        <div class="brand"><div class="label">High Rise<br />  Right Side</div></div>
                                    </a>
                                <!--end  Digital Hazards  tile-->                                
                                 </div>
                                 <!-- END SECOND COLUMN FIRST ROW -->
                                 <!-------BEGIN THIRD COLUMN FIRST ROW OF TILES------>
									<div class="tile-group no-margin no-padding clearfix" >                    
										<!--begin text information paragraphs -->
											<!--begin small tile-->
									<?php // $this->load->view('connection_tile');?>
								<!--end small tile--> 
										<!--end text information paragraphs-->  
									</div>
								<!-------END  THIRD COLUMN FIRST ROW OF TILES------> 
			</div>
		</div>
      </div> 
  </div>
  </div>
  </div>  
  </div>
</div>
<!-- *********** start HAZARDS Stats MODAL page ******************************** -->
	<div id="hazards_office_status_modal" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top:-2%; max-width:1000px;" >
    <div class="modal-body">
		<a href="#" >
        <img src="<?php echo $base;?>img/hazards/office/hazards_stats.png" />
        
        </a>
        </div>
		<div class="modal-footer bg-gray">
			<button class="btn" data-dismiss="modal" >Close</button>
		</div>
	</div>
<!-- ******************** end HAZARDS Stats modal page ************************************* -->   
<script type="text/javascript">
	$('.tile_hazards1').click(function(){
		$.ajax({
			url: js_base_path+'ajax/ajaxSetPointsForWholePageSection',
			type: 'post', 
			data: {'pointSection':'digital_hazards'},
			success: function(output) {
				$("#id_modal_points").html(output);
				$("#modal_points").modal('show');
			}, 
			error: function(errMsg) {
				alert( errMsg.responseText );
				return false;
			}
		});
	});
	
	$('.modal-body').css({ 'margin-left':'0px',  'padding':'0px', 'max-height':'90vh','overflow-y':'auto','overflow-x':'hidden' });
	$('#hazards_office_status_modal').css({ 'width':'100%',  'max-width':'800px' });
	
</script>
<?php $this->load->view('footer_admin'); ?>

