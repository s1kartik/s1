<?php $this->load->view('header_admin');?>
<script type="text/javascript">
$from_lang 	= '<?php echo $from_lang;?>';
$to_lang 	= '<?php echo $to_lang;?>';
</script>
<div class="homebg">
<div class="container container-profile">
  <div class="profile-wrapper">
  <div id="equip-container" class="row-fluid">
   <!-- Start Profile Menu Navigation -->
    <div id="equip-items"  class="span6">
     <!-- Start cart widget --> 
      <div id="equip-landing" class="profile-menu-box">
        <div class="profile-menu-heading clearfix">
			<h3>Safety Equipment<a href='#construction' data-toggle='modal' class="metro" style="float:right;"><button class=" hazard-sponsor" >Ad</button></a></h3>
        </div>
		<div style="padding:15px !important">
		 <div class="padding5 place-right" id="google_translate_element">
			<?php echo $this->common->callLanguageSelectBox("cmb_s1lib_lang", $to_lang);?>
			<span id="msg_language" class="fgred"></span>
		 </div>
         <div class="cart-info"> 
          <h5 id="info_safetytrade">Learn more about the equipment that is helping you stay safe. Click on the <span style="color:#e61e25" >red dots</span> to get more info.</h5>
		  <input type="hidden" id="info_safetytrade_en" value='Learn more about the equipment that is helping you stay safe. Click on the <span style="color:#e61e25">red dots</span> to get more info.'>
         </div>
         </div> 
         </div> 
	<!-- End cart widget --> 

    <!-- Start First Menu Box --> 
      <div id="box1" class="profile-menu-box equip-item">
        <div class="close-box"><a class="icon-chevron-left"></a></div>
        <div class="profile-user clearfix">
			<h3>Hard Hat <a  href='#hardhat' data-toggle='modal' class="metro" style="float:right;">
            <button class=" hazard-sponsor" >Ad</button></a></h3>
			<hr/>
			<p id="box1_desc">Type of helmet used in construction to protect the head from impact with other objects</p>
			<input type="hidden" id="box1_desc_en" value="Type of helmet used in construction to protect the head from impact with other objects">
			<div class="item-img"><img src="<?php echo $base;?>img/equip/cons-1.jpg" /></div>
			<div style="padding:10px !important;" id="id_safetyequipment_31" quiz_section_id="31"></div>
        </div> 
      </div> 
    <!-- End First Menu Box --> 

	
      <!-- Start First Menu Box --> 
      <div id="box2" class="profile-menu-box equip-item">
           <div class="close-box"><a class="icon-chevron-left"></a></div>
        <div class="profile-user clearfix">
             <h3>Safety Footwear<a  href='#footwear' data-toggle='modal' class="metro" style="float:right;">
                <button class=" hazard-sponsor" >Ad</button></a></h3>
         <hr/>
        <p id="box2_desc">Protects the foot from falling objects or compression, usually combined with a mid-sole plate to protect against punctures from below.</p>
		<input type="hidden" id="box2_desc_en" value="Protects the foot from falling objects or compression, usually combined with a mid-sole plate to protect against punctures from below.">
        <div class="item-img"><img src="<?php echo $base;?>img/equip/cons-2.jpg" /></div>
    	<div style="padding:10px !important;" id="id_safetyequipment_32" quiz_section_id="32"></div>
        </div>     
      </div> 
      
    <!-- End First Menu Box --> 
    
        <!-- Start First Menu Box --> 
      <div id="box3" class="profile-menu-box equip-item">
           <div class="close-box"><a class="icon-chevron-left"></a></div>

        <div class="profile-user clearfix">
             <h3>Work Gloves<a  href='#workgloves' data-toggle='modal' class="metro" style="float:right;">
                <button class=" hazard-sponsor" >Ad</button></a></h3>
         <hr/>
        <p id="box3_desc">Generally designed to protect the hand from cuts and abrasions. Many makes and models to choose from, each offering a specific level of protection from various Safety Equipment - Construction.</p>
		<input type="hidden" id="box3_desc_en" value="Generally designed to protect the hand from cuts and abrasions. Many makes and models to choose from, each offering a specific level of protection from various Safety Equipment - Construction.">
        <div class="item-img"><img src="<?php echo $base;?>img/equip/cons-3.jpg" /></div>
    	<div style="padding:10px !important;" id="id_safetyequipment_33" quiz_section_id="33"></div>
        </div> 
      </div> 
    <!-- End First Menu Box --> 

   <!-- Start First Menu Box --> 
      <div id="box4" class="profile-menu-box equip-item">
           <div class="close-box"><a class="icon-chevron-left"></a></div>
        <div class="profile-user clearfix">
             <h3>Eye Protection<a  href='#eyeprotection' data-toggle='modal' class="metro" style="float:right;">
                <button class=" hazard-sponsor" >Ad</button></a></h3>
         <hr/>
        <p id="box4_desc">Designed to protect the eyes from various Safety Equipment - Construction. Some are even bulletproof</p>
		<input type="hidden" id="box4_desc_en" value="Designed to protect the eyes from various Safety Equipment - Construction. Some are even bulletproof">
         <div class="item-img"><img src="<?php echo $base;?>img/equip/cons-4.jpg" /></div>
         
    	<div style="padding:10px !important;" id="id_safetyequipment_34" quiz_section_id="34"></div>
        </div> 
      </div> 
    <!-- End First Menu Box --> 

    <!-- Start First Menu Box -->
      <div id="box5" class="profile-menu-box equip-item">
           <div class="close-box"><a class="icon-chevron-left"></a></div>
			<div class="profile-user clearfix">
			<h3>Fall Protection Harness<a  href='#fallprotectionharness' data-toggle='modal' class="metro" style="float:right;">
			<button class=" hazard-sponsor" >Ad</button></a></h3>
			<hr/>
			<p id="box5_desc">Designed to secure the body to a fall protection system that protects the user from falls from heights.</p>
			<input type="hidden" id="box5_desc_en" value="Designed to secure the body to a fall protection system that protects the user from falls from heights.">
			 <div class="item-img"><img src="<?php echo $base;?>img/equip/cons-5.jpg" /></div>
			</div>
		<div style="padding:10px !important;" id="id_safetyequipment_35" quiz_section_id="35"></div>
    </div> 
    <!-- End First Menu Box -->  

	<img id="img_loading" src="<?php echo $base."img/loading_icon.gif";?>" width="80px;" height="80px;" style="display:none;">
    </div>
    <!-- End Profile Menu Navigation --> 
    <!-- Start Profile Content -->
	
	

    <div id="equip-image"  class="span6">
		<?php $this->load->view('menu-trade');?>
		<div class="profile-content-box"> 
			<div class="equip-dots">
				<?php 
				$rows	= $this->points->hasUserGainedPointsGetPoints(6, 31, $checkPointsGained=1);
				$img 	= ($rows['has_points_gained']) ? "equip-dot-green" : 'equip-dot';
				?>
				<a href="javascript:void(0);" quiz_section_id="31" onclick="javascript:$('#box1').delay(200).fadeIn(150);translateData(31,1)">
					<img class="equip-dot" target="1" data-toggle="tooltip" title="Hard Hat" src="<?php echo $base."img/equip/".$img.".png";?>"  style="top:3%;left:48%">
				</a>
				<?php 
				$rows 	= $this->points->hasUserGainedPointsGetPoints(6, 32, $checkPointsGained=1);
				$img 	= ($rows['has_points_gained']) ? "equip-dot-green" : 'equip-dot';
				?>
				<a href="javascript:void(0);" quiz_section_id="32" onclick="javascript:$('#box2').delay(200).fadeIn(150);translateData(32,2)">
					<img class="equip-dot" target="2"  data-toggle="tooltip" title="Safety Boots" src="<?php echo $base."img/equip/".$img.".png";?>" style="top:94%;left:33%">
				</a>
				<?php 
				$rows 	= $this->points->hasUserGainedPointsGetPoints(6, 33, $checkPointsGsained=1);
				$img 	= ($rows['has_points_gained']) ? "equip-dot-green" : 'equip-dot';
				?>
				<a href="javascript:void(0);" quiz_section_id="33" onclick="javascript:$('#box3').delay(200).fadeIn(150);translateData(33,3)">
					<img class="equip-dot" target="3"  data-toggle="tooltip" title="Gloves" src="<?php echo $base."img/equip/".$img.".png";?>" style="top:37%;left:62%">
				</a>
				<?php 
				$rows 	= $this->points->hasUserGainedPointsGetPoints(6, 34, $checkPointsGained=1);
				$img 	= ($rows['has_points_gained']) ? "equip-dot-green" : 'equip-dot';
				?>
				<a href="javascript:void(0);" quiz_section_id="34" onclick="javascript:$('#box4').delay(200).fadeIn(150);translateData(34,4)">
					<img class="equip-dot" target="4"  data-toggle="tooltip" title="Eye Protection" src="<?php echo $base."img/equip/".$img.".png";?>"  style="top:8%;left:55%">
				</a>
				<?php 
				$rows 	= $this->points->hasUserGainedPointsGetPoints(6, 35, $checkPointsGained=1);
				$img 	= ($rows['has_points_gained']) ? "equip-dot-green" : 'equip-dot';
				?>
				<a href="javascript:void(0);" quiz_section_id="35" onclick="javascript:$('#box5').delay(200).fadeIn(150);translateData(35,5);">
					<img class="equip-dot" target="5" data-toggle="tooltip" title="Fall Protection Harness" src="<?php echo $base."img/equip/".$img.".png";?>"  style="top:23%;left:14%">
				</a>
			</div>
			<img src="<?php echo $base;?>img/equip/construction.jpg">                    
		</div>
    </div>
   <!-- End Profile Content -->
  </div>
  <div class="row-fluid">
	<!-- Bottom Banner Ad -->
<?php $this->load->view('center-leaderboard.php');?>
<!-- end bottom banner ad -->
<input id="id_noof_box" type="hidden" value="5">
</div>
</div>
</div>

	<!-- *********** start add MODAL page Construction ******************************** -->
    <div id="construction" class="metro modal hide fade equip-model" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top: 15%; max-width:462px;" data-backdrop="false">
		<a href="http://www.thekneecapper.com/" target="new"><img src="<?php echo $base;?>img/ad/ppe/construction/ppe.jpg" /></a>
		<div class="modal-footer bg-gray"><button class="btn" data-dismiss="modal" >Close</button></div>
	</div>
    <!-- *********** end sponsored by modal page******************************** -->
    
    <!-- *********** start add MODAL page Hard HAR******************************** -->
	<div id="hardhat" class="metro modal hide fade equip-model" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top: 15%; max-width:462px;" data-backdrop="false">
		<a href="http://www.advancesafetyworld.com/" target="new"><img src="<?php echo $base;?>img/ad/ppe/construction/hardhat.jpg" /></a>
		<div class="modal-footer bg-gray"><button class="btn" data-dismiss="modal" >Close</button></div>
	</div>
	<!-- ******************** end sponsored by modal page ************************************* --> 
    
    <!-- *********** start add MODAL page FOOTWEAR******************************** -->
	<div id="footwear" class="metro modal hide fade equip-model" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top: 15%; max-width:462px;" data-backdrop="false">
		<a href="http://www.advancesafetyworld.com/" target="new"><img src="<?php echo $base;?>img/ad/ppe/construction/footwear.jpg" /></a>
		<div class="modal-footer bg-gray"><button class="btn" data-dismiss="modal" >Close</button></div>
	</div>
	<!-- ******************** end sponsored by modal page ************************************* --> 
    
    <!-- *********** start add MODAL page workgloves******************************** -->
	<div id="workgloves" class="metro modal hide fade equip-model" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top: 15%; max-width:462px;" data-backdrop="false">
		<a href="http://www.advancesafetyworld.com/" target="new"><img src="<?php echo $base;?>img/ad/ppe/construction/workgloves.jpg" /></a>
		<div class="modal-footer bg-gray"><button class="btn" data-dismiss="modal" >Close</button></div>
	</div>
	<!-- ******************** end sponsored by modal page ************************************* --> 
      
      <!-- *********** start add MODAL page EYEPROTECTION******************************** -->
	<div id="eyeprotection" class="metro modal hide fade equip-model" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top: 15%;max-width:462px;" data-backdrop="false">
		<a href="http://www.advancesafetyworld.com/" target="new"><img src="<?php echo $base;?>img/ad/ppe/construction/eyeprotection.jpg" /></a>
		<div class="modal-footer bg-gray"><button class="btn" data-dismiss="modal" >Close</button></div>
	</div>
	<!-- ******************** end sponsored by modal page ************************************* --> 

	<!-- *********** start add MODAL page FALL PROTECTION HARNESS******************************** -->
	<div id="fallprotectionharness" class="metro modal hide fade equip-model" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top: 15%; max-width:462px;" data-backdrop="false">
		<a href="http://www.advancesafetyworld.com/" target="new"><img src="<?php echo $base;?>img/ad/ppe/construction/fallprotectionharness.jpg" /></a>
		<div class="modal-footer bg-gray"><button class="btn" data-dismiss="modal" >Close</button></div>
	</div>
	<!-- ******************** end sponsored by modal page ************************************* --> 
    
</div>
<?php $this->load->view('footer_admin'); ?>

<script type="text/javascript">
	function checkQuizAnswer(quizSectionId, quizId, correctAns, boxId)
	{
		var user_answer 		= $("input[name='ans"+quizSectionId+"_quiz"+quizId+"']:checked").val();
		// alert( "correctAns: "+correctAns + "user_answer: "+user_answer );
		// Add User Quiz details //
			$.post(js_base_path+'ajax/addQuizDetails', {'quizSectionId':quizSectionId,'quizId':quizId,'correctAns':correctAns,'userAnswer':user_answer, 'quizSection':'safety_equipment'}, function(data) {
				$.ajax({ url: js_base_path+'ajax/checkIfAllQuizAnswered', type: 'post', async: false, 
					data: {'quizSectionId':quizSectionId,'quizSection':"safety_equipment"}, 
					success: function(output) {
						if(output.trim()=='1') { // All quiz answers are correct //
							setPagePoints('6', quizSectionId, 'id_modal_points', 'modal_points', boxId);
							setTimeout(function(){
								window.location.reload();
							}, 2000);
						}
					}, 
					error: function(errMsg) {
						alert( errMsg.responseText );
						return false;
					}
				});
			});

		if(correctAns == user_answer) {
			$("#span_ques"+quizSectionId+"_quiz"+quizId).html("<img src="+js_base_path+"img/icons/right.png>");
		}
		else {
			$("#span_ques"+quizSectionId+"_quiz"+quizId).html("<img src="+js_base_path+"img/icons/wrong.png>");
		}
	}

	function translateData(quizSectionId)
	{
		if( $to_lang.trim() == '') {
			$to_lang = "en";
		}
		$("#img_loading").show();
		$("#id_safetyequipment_"+quizSectionId).hide();

		var prevSectionId = $(".clicked").attr("quiz_section_id");
		$("#id_safetyequipment_"+prevSectionId).removeClass("clicked");
		$("#id_safetyequipment_"+quizSectionId).addClass("clicked");

		$.post(js_base_path+'ajaxTranslate/translateS1Data', {'sectionToTranslate':"safety_equipment",'sectionId':quizSectionId,'fromLang':"en",'toLang':$to_lang}, 
			function(data) {
				$("#id_safetyequipment_"+quizSectionId).show();
				$("#id_safetyequipment_"+quizSectionId).html(data);
				$("#img_loading").hide();
			}
		);
	}

	$(document).ready(function() {
		if( $to_lang ) {
			$.post(js_base_path+'ajax/getTranslatedText', {'paragraphDescription':$("#info_safetytrade_en").val(), 'fromLang':"en", 'toLang':$to_lang, 'translateSection':"safety_equipment"}, function(data){
				$("#info_safetytrade").html(data);
			});
		}
		
		$('#cmb_s1lib_lang').change(function(){
			$to_lang 		= $(this).val();
			
			if( $to_lang ) {
				if( $("div").hasClass("clicked") ) {
					quizSectionId = $(".clicked").attr("quiz_section_id");
					$("#id_safetyequipment_"+quizSectionId).hide();
				}

				if (typeof quizSectionId !== 'undefined') {
					$("#img_loading").show();
					
					$.post(js_base_path+'ajaxTranslate/translateS1Data', {'sectionToTranslate':"safety_equipment",'sectionId':quizSectionId,'fromLang':$from_lang,'toLang':$to_lang}, function(data) { 
						$("#id_safetyequipment_"+quizSectionId).show();
						$("#id_safetyequipment_"+quizSectionId).html(data); 
						$("#img_loading").hide();
					});
				}

				var arr_trade 	= new Array();
				var noof_box 	= $("#id_noof_box").val();
				arr_trade[0] 	= $("#info_safetytrade_en").val();
				for(var $cnt_box=1;$cnt_box<=noof_box;$cnt_box++) {
					arr_trade[$cnt_box] = $("#box"+$cnt_box+"_desc_en").val();
				}
				$to_lang_text 	= $("#cmb_s1lib_lang option:selected").text();

				$.post(js_base_path+'ajax/getTranslatedText', {'arrTrade':arr_trade,'fromLang':$from_lang, 'toLang':$to_lang, 'translateSection':"safety_equipment"}, function(data){
					$("#msg_language").html($to_lang_text+' language set');

					$trade_data = $.parseJSON(data);
					($trade_data[0]) ? $("#info_safetytrade").html($trade_data[0]) : '';
					for(var $cnt_boxres=1;$cnt_boxres<=noof_box;$cnt_boxres++) {
						($trade_data[$cnt_boxres]) ? $("#box"+$cnt_boxres+"_desc").html($trade_data[$cnt_boxres]) : '';
					}
				});
			}
			else {
				alert("Please select language");
				return false;
			}
		});
	});
	$('.flexslider').css({ 'background-color':'#FFF'});
</script>