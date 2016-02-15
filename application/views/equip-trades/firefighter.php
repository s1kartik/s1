<?php 
$this->load->view('header_admin');
$to_lang 	= $this->session->userdata('safetyequip_tolang');
?>
<script type="text/javascript">
$from_lang 	= 'en';
$to_lang 	= '<?php echo $this->session->userdata('safetyequip_tolang');?>';
</script>
<div class="homebg">
<div class="container container-profile">

  <div class="profile-wrapper">

  <div id="equip-container" class="row-fluid">
  
 <!-- Start Profile Menu Navigation -->
    <div id="equip-items"  class="span6">
    
     <!-- Start cart widget --> 
      <div  id="equip-landing" class="profile-menu-box">
         <div class="profile-menu-heading clearfix">
          <h3>Safety Equipment<a  href='#firefighter' data-toggle='modal' class="metro" style="float:right;">
		  <button class=" hazard-sponsor" >Ad</button></a></h3>
		 </div>
         <div style="padding:15px !important">
		 <div class="padding5 place-right" id="google_translate_element">
			<?php echo $this->common->callLanguageSelectBox("cmb_s1lib_lang", $to_lang);?>
			<span id="msg_language" class="fgred"></span>
		</div>

         <div class="cart-info"> 
          <h5 id="info_safetytrade">Learn more about the equipment that is helping you stay safe. Click on the <span style="color:#e61e25" >red dots</span> to get more info.</h5>
		  <input type="hidden" id="info_safetytrade_en" value='Learn more about the equipment that is helping you stay safe. Click on the <span style="color:#e61e25" >red dots</span> to get more info.'>
         </div>
		</div>         
         
         </div> 
 <!-- End cart widget --> 
    
    <!-- Start First Menu Box --> 
      <div id="box1" class="profile-menu-box equip-item">
           <div class="close-box"><a class="icon-chevron-left"></a></div>
        <div class="profile-user clearfix">
             <h3>Helmet &amp; Flash Hood<a  href='#helmetflashood' data-toggle='modal' class="metro" style="float:right;">
             <button class=" hazard-sponsor" >Ad</button></a></h3>
         <hr/>
        <p id="box1_desc">Designed to provide thermal and impact protection.</p>
		<input type="hidden" id="box1_desc_en" value="Designed to provide thermal and impact protection.">
         <div class="item-img"><img src="<?php echo $base;?>img/equip/ff-1.jpg" /></div>
		 <div style="padding:10px !important;" id="id_safetyequipment_39" quiz_section_id="39"></div>
        </div> 
      </div>
    <!-- End First Menu Box --> 
    
      <!-- Start First Menu Box --> 
      <div id="box2" class="profile-menu-box equip-item">
        <div class="close-box"><a class="icon-chevron-left"></a></div>
        <div class="profile-user clearfix">
            <h3>Gloves<a  href='#firefightergloves' data-toggle='modal' class="metro" style="float:right;">
            <button class=" hazard-sponsor" >Ad</button></a></h3>      
        <hr/>
        <p id="box2_desc">Come in various types. Mainly designed for thermal and water protection for the wearer.</p>
		<input type="hidden" id="box2_desc_en" value="Come in various types. Mainly designed for thermal and water protection for the wearer.">
         <div class="item-img"><img src="<?php echo $base;?>img/equip/ff-2.jpg" /></div>
		 <div style="padding:10px !important;" id="id_safetyequipment_40" quiz_section_id="40"></div>
		</div> 
      </div> 
    <!-- End First Menu Box --> 
    
        <!-- Start First Menu Box --> 
      <div id="box3" class="profile-menu-box equip-item">
           <div class="close-box"><a class="icon-chevron-left"></a></div>

        <div class="profile-user clearfix">
         <h3>Boots<a  href='#firefighterboots' data-toggle='modal' class="metro" style="float:right;">
              <button class=" hazard-sponsor" >Ad</button></a></h3>
        <hr/>
        <p id="box3_desc">Designed to provide thermal and impact protection.</p>
		<input type="hidden" id="box3_desc_en" value="Designed to provide thermal and impact protection.">
        <div class="item-img"><img src="<?php echo $base;?>img/equip/ff-3.jpg" /></div>
		<div style="padding:10px !important;" id="id_safetyequipment_41" quiz_section_id="41"></div>
        </div> 
      </div> 
    <!-- End First Menu Box --> 

   <!-- Start First Menu Box --> 
      <div id="box4" class="profile-menu-box equip-item">
           <div class="close-box"><a class="icon-chevron-left"></a></div>
        <div class="profile-user clearfix">
             <h3>Flashlight<a  href='#firefighterflashlight' data-toggle='modal' class="metro" style="float:right;">
                <button class=" hazard-sponsor" >Ad</button></a></h3>
      
         <hr/>
        <p id="box4_desc">High Performance waterproof LED light for increased visibility.</p>
		<input type="hidden" id="box4_desc_en" value="High Performance waterproof LED light for increased visibility.">
         <div class="item-img"><img src="<?php echo $base;?>img/equip/ff-4.jpg" /></div>
		<div style="padding:10px !important;" id="id_safetyequipment_42" quiz_section_id="42"></div>
        </div> 
      </div> 
    <!-- End First Menu Box --> 
    
    <!-- Start First Menu Box --> 
      <div id="box5" class="profile-menu-box equip-item">
           <div class="close-box"><a class="icon-chevron-left"></a></div>

        <div class="profile-user clearfix">
             <h3>Drag Rescue Device (DRD)<a  href='#dragrescuedevice' data-toggle='modal' class="metro" style="float:right;">
                <button class=" hazard-sponsor" >Ad</button></a></h3>
      
         <hr/>
        <p id="box5_desc">A heavy duty strap found in coats. It provides a built in upper torso harness designed for rapid deployment to pull a downed firefighter.</p>
		<input id="box5_desc_en" type="hidden" value="A heavy duty strap found in coats. It provides a built in upper torso harness designed for rapid deployment to pull a downed firefighter.">
       
        <div class="item-img"><img src="<?php echo $base;?>img/equip/ff-5.jpg" /></div>
		<div style="padding:10px !important;" id="id_safetyequipment_43" quiz_section_id="43"></div>
        </div> 
      </div> 
    <!-- End First Menu Box --> 
    
        <!-- Start First Menu Box --> 
      <div id="box6" class="profile-menu-box equip-item">
           <div class="close-box"><a class="icon-chevron-left"></a></div>

        <div class="profile-user clearfix">
             <h3> SCBA (self contained breathing apparatus)<a  href='#scba' data-toggle='modal' class="metro" style="float:right;">
                <button class=" hazard-sponsor" >Ad</button></a></h3>
      
         <hr/>
        <p id="box6_desc">Provides breathable air. Main components consist of: High pressure tank, Pressure Regulator and Mouth Piece.</p>
		<input id="box6_desc_en" type="hidden" value="Provides breathable air. Main components consist of: High pressure tank, Pressure Regulator and Mouth Piece.">
        <div class="item-img"><img src="<?php echo $base;?>img/equip/ff-6.jpg" /></div>
		<div style="padding:10px !important;" id="id_safetyequipment_44" quiz_section_id="44"></div>
        </div> 
      </div> 
    <!-- End First Menu Box --> 

    <!-- Start First Menu Box --> 
      <div id="box7" class="profile-menu-box equip-item">
           <div class="close-box"><a class="icon-chevron-left"></a></div>

        <div class="profile-user clearfix">
             <h3> Bunker Gear<a  href='#bunkergear' data-toggle='modal' class="metro" style="float:right;">
                <button class=" hazard-sponsor" >Ad</button></a></h3>
      
         <hr/>
        <p id="box7_desc">Durable gear that provides a high level of protection against heat, water, and punctures/cuts. Contains materials such as Nomex and Kevlar.</p>
		<input id="box7_desc_en" type="hidden" value="Durable gear that provides a high level of protection against heat, water, and punctures/cuts. Contains materials such as Nomex and Kevlar.">
         <div class="item-img"><img src="<?php echo $base;?>img/equip/ff-7.jpg" /></div>
		 <div style="padding:10px !important;" id="id_safetyequipment_45" quiz_section_id="45"></div>
        </div> 
      </div> 
    <!-- End First Menu Box --> 
	
	<img id="img_loading" src="<?php echo $base."img/loading_icon.gif";?>" width="80px;" height="80px;" style="display:none;">
    </div>
      <!-- End Profile Menu Navigation --> 
     <!-- Start Profile Content -->
    
    <div id="equip-image"  class="span6">
        <?php $this->load->view('menu-trade'); ?>         
        <div class="profile-content-box">
            <div class="equip-dots">
				<?php 
				$rows	= $this->points->hasUserGainedPointsGetPoints(6, 39, $checkPointsGained=1);
				$img 	= ($rows['has_points_gained']) ? "equip-dot-green" : 'equip-dot';
				?>
				<a href="javascript:void(0);" quiz_section_id="39" onclick="javascript:$('#box1').delay(200).fadeIn(150);translateData(39,1)">
				<img  class="equip-dot" target="1"  data-toggle="tooltip" title="Helmet & Flash Hood" src="<?php echo $base."img/equip/".$img.".png";?>" style="top:4%;left:45%"> 
				</a>
				<?php 
				$rows	= $this->points->hasUserGainedPointsGetPoints(6, 40, $checkPointsGained=1);
				$img 	= ($rows['has_points_gained']) ? "equip-dot-green" : 'equip-dot';
				?>
				<a href="javascript:void(0);" quiz_section_id="40" onclick="javascript:$('#box2').delay(200).fadeIn(150);translateData(40,1)">
				<img  class="equip-dot" target="2"  data-toggle="tooltip" title="Gloves" src="<?php echo $base."img/equip/".$img.".png";?>" style="top:53%;left:72%">
				</a>
				<?php 
				$rows	= $this->points->hasUserGainedPointsGetPoints(6, 41, $checkPointsGained=1);
				$img 	= ($rows['has_points_gained']) ? "equip-dot-green" : 'equip-dot';
				?>
				<a href="javascript:void(0);" quiz_section_id="41" onclick="javascript:$('#box3').delay(200).fadeIn(150);translateData(41,1)">
				<img  class="equip-dot" target="3"  data-toggle="tooltip" title="Boots" src="<?php echo $base."img/equip/".$img.".png";?>" style="top:91%;left:35%">
				</a>
				<?php 
				$rows	= $this->points->hasUserGainedPointsGetPoints(6, 42, $checkPointsGained=1);
				$img 	= ($rows['has_points_gained']) ? "equip-dot-green" : 'equip-dot';
				?>
				<a href="javascript:void(0);" quiz_section_id="42" onclick="javascript:$('#box4').delay(200).fadeIn(150);translateData(42,1)">
				<img  class="equip-dot" target="4"  data-toggle="tooltip" title="Flashlight" src="<?php echo $base."img/equip/".$img.".png";?>" style="top:31%;left:57%">
				</a>
				<?php 
				$rows	= $this->points->hasUserGainedPointsGetPoints(6, 43, $checkPointsGained=1);
				$img 	= ($rows['has_points_gained']) ? "equip-dot-green" : 'equip-dot';
				?>
				<a href="javascript:void(0);" quiz_section_id="43" onclick="javascript:$('#box5').delay(200).fadeIn(150);translateData(43,1)">
				<img  class="equip-dot" target="5"  data-toggle="tooltip" title="DRD" src="<?php echo $base."img/equip/".$img.".png";?>" style="top:34%;left:32%">
				</a>
				<?php 
				$rows	= $this->points->hasUserGainedPointsGetPoints(6, 44, $checkPointsGained=1);
				$img 	= ($rows['has_points_gained']) ? "equip-dot-green" : 'equip-dot';
				?>
				<a href="javascript:void(0);" quiz_section_id="44" onclick="javascript:$('#box6').delay(200).fadeIn(150);translateData(44,1)">
				<img  class="equip-dot" target="6"  data-toggle="tooltip" title="SCBA" src="<?php echo $base."img/equip/".$img.".png";?>" style="top:22%;left:45%">
				</a>
				<?php 
				$rows	= $this->points->hasUserGainedPointsGetPoints(6, 45, $checkPointsGained=1);
				$img 	= ($rows['has_points_gained']) ? "equip-dot-green" : 'equip-dot';
				?>
				<a href="javascript:void(0);" quiz_section_id="45" onclick="javascript:$('#box7').delay(200).fadeIn(150);translateData(45,1)">
				<img  class="equip-dot" target="7"  data-toggle="tooltip" title="Bunker Gear" src="<?php echo $base."img/equip/".$img.".png";?>" style="top:49%;left:45%">
				</a>
			</div>
			<img src="<?php echo $base;?>img/equip/firefighter.jpg">
        </div>
    </div>
   <!-- End Profile Content -->
  </div>
  
  <div class="row-fluid">
  
<!-- Bottom Banner Ad -->

<?php $this->load->view('center-leaderboard.php'); ?>    
<!-- end bottom banner ad -->
<input id="id_noof_box" type="hidden" value="7">
</div>
  </div>
 </div>
 
 <!-- *********** start add MODAL page firefighter******************************** -->
	<div id="firefighter" class="metro modal hide fade equip-model" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top: 15%; max-width:462px;" data-backdrop="false">
		<a href="http://www.thekneecapper.com/" target="new">
        <img src="<?php echo $base;?>img/ad/ppe/firefighter/ppe.jpg" />
        </a>
		<div class="modal-footer bg-gray">
			<button class="btn" data-dismiss="modal" >Close</button>
		</div>
	</div>
	<!-- ******************** end sponsored by modal page ************************************* --> 
      
      <!-- *********** start add MODAL page helmetflashood******************************** -->
	<div id="helmetflashood" class="metro modal hide fade equip-model" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top: 15%; max-width:462px;" data-backdrop="false">
		<a href="http://www.advancesafetyworld.com/" target="new">
        <img src="<?php echo $base;?>img/ad/ppe/firefighter/helmetflashood.jpg" />
        </a>
		<div class="modal-footer bg-gray">
			<button class="btn" data-dismiss="modal" >Close</button>
		</div>
	</div>
	<!-- ******************** end sponsored by modal page ************************************* --> 

    <!-- *********** start add MODAL page firefightergloves******************************** -->
	<div id="firefightergloves" class="metro modal hide fade equip-model" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top: 15%; max-width:462px;" data-backdrop="false">
		<a href="http://www.advancesafetyworld.com/" target="new">
        <img src="<?php echo $base;?>img/ad/ppe/firefighter/firefightergloves.jpg" />
        </a>
		<div class="modal-footer bg-gray">
			<button class="btn" data-dismiss="modal" >Close</button>
		</div>
	</div>
	<!-- ******************** end sponsored by modal page ************************************* --> 
      
      <!-- *********** start add MODAL page firefighterboots******************************** -->
	<div id="firefighterboots" class="metro modal hide fade equip-model" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top: 15%; max-width:462px;" data-backdrop="false">
		<a href="http://www.advancesafetyworld.com/" target="new">
        <img src="<?php echo $base;?>img/ad/ppe/firefighter/firefighterboots.jpg" />
        </a>
		<div class="modal-footer bg-gray">
			<button class="btn" data-dismiss="modal" >Close</button>
		</div>
	</div>
	<!-- ******************** end sponsored by modal page ************************************* --> 
    
      <!-- *********** start add MODAL page firefighterflashlight******************************** -->
	<div id="firefighterflashlight" class="metro modal hide fade equip-model" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top: 15%; max-width:462px;" data-backdrop="false">
		<a href="http://www.advancesafetyworld.com/" target="new">
        <img src="<?php echo $base;?>img/ad/ppe/firefighter/firefighterflashlight.jpg" />
        </a>
		<div class="modal-footer bg-gray">
			<button class="btn" data-dismiss="modal" >Close</button>
		</div>
	</div>
	<!-- ******************** end sponsored by modal page ************************************* --> 

    <!-- *********** start add MODAL page dragrescuedevice******************************** -->
	<div id="dragrescuedevice" class="metro modal hide fade equip-model" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top: 15%; max-width:462px;" data-backdrop="false">
		<a href="http://www.advancesafetyworld.com/" target="new">
        <img src="<?php echo $base;?>img/ad/ppe/firefighter/dragrescuedevice.jpg" />
        </a>
		<div class="modal-footer bg-gray">
			<button class="btn" data-dismiss="modal" >Close</button>
		</div>
	</div>
	<!-- ******************** end sponsored by modal page ************************************* --> 
      
    <!-- *********** start add MODAL page scba******************************** -->
	<div id="scba" class="metro modal hide fade equip-model" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top: 15%; max-width:462px;" data-backdrop="false">
		<a href="http://www.advancesafetyworld.com/" target="new">
        <img src="<?php echo $base;?>img/ad/ppe/firefighter/scba.jpg" />
        </a>
		<div class="modal-footer bg-gray">
			<button class="btn" data-dismiss="modal" >Close</button>
		</div>
	</div>
	<!-- ******************** end sponsored by modal page ************************************* --> 
      
      <!-- *********** start add MODAL page bunkergear******************************** -->
	<div id="bunkergear" class="metro modal hide fade equip-model" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top: 15%; max-width:462px;" data-backdrop="false">
		<a href="http://www.advancesafetyworld.com/" target="new">
        <img src="<?php echo $base;?>img/ad/ppe/firefighter/bunkergear.jpg" />
        </a>
		<div class="modal-footer bg-gray">
			<button class="btn" data-dismiss="modal" >Close</button>
		</div>
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
