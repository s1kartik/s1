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
    <div id="equip-items" class="span6">
     <!-- Start cart widget --> 
      <div  id="equip-landing" class="profile-menu-box">
         <div class="profile-menu-heading clearfix">
          <h3>Safety Equipment<a  href='#hockey' data-toggle='modal' class="metro" style="float:right;">
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
             <h3>Helmet &amp; Face Mask<a  href='#hockeyhelmetfacemask' data-toggle='modal' class="metro" style="float:right;">
                <button class=" hazard-sponsor" >Ad</button></a></h3>
        
         <hr/>
        <p id="box1_desc">Designed to protect the head and face from cuts lacerations and concussions.</p>
        <input id="box1_desc_en" type="hidden" value="Designed to protect the head and face from cuts lacerations and concussions.">
         <div class="item-img"><img src="<?php echo $base;?>img/equip/hock-1.jpg" /></div>
		 <div style="padding:10px !important;" id="id_safetyequipment_46" quiz_section_id="46"></div>
        </div>
      </div> 
      
       
    <!-- End First Menu Box --> 
    
      <!-- Start First Menu Box --> 
      <div id="box2" class="profile-menu-box equip-item">
           <div class="close-box"><a class="icon-chevron-left"></a></div>

        <div class="profile-user clearfix">
             <h3>Shoulder pads and chest protector<a  href='#shoulderpads' data-toggle='modal' class="metro" style="float:right;">
                <button class=" hazard-sponsor" >Ad</button></a></h3>
      
         <hr/>
        <p id="box2_desc">Standard shoulder pads and chest protectors provide protection for the clavicle (collarbone) and upper arms, while giving you the ability to move freely on the ice and handle your stick. Several types of chest protectors include both the chest and the back as one piece.</p>
		<input id="box2_desc_en" type="hidden" value="Standard shoulder pads and chest protectors provide protection for the clavicle (collarbone) and upper arms, while giving you the ability to move freely on the ice and handle your stick. Several types of chest protectors include both the chest and the back as one piece.">
         <div class="item-img"><img src="<?php echo $base;?>img/equip/hock-2.jpg" /></div>
		 <div style="padding:10px !important;" id="id_safetyequipment_47" quiz_section_id="47"></div>
       </div>  
      </div> 
      
      
    <!-- End First Menu Box --> 
    
        <!-- Start First Menu Box --> 
      <div id="box3" class="profile-menu-box equip-item">
           <div class="close-box"><a class="icon-chevron-left"></a></div>

        <div class="profile-user clearfix">
             <h3>Gloves and Elbow Pads<a  href='#gloveselbowpads' data-toggle='modal' class="metro" style="float:right;">
                <button class=" hazard-sponsor" >Ad</button></a></h3>
         <hr/>
        <p id="box3_desc">Purchase gloves with maximum protection over the thumb . The cuff of the glove should be flexible but still offer protection. Cuffs that run too far up the arm will hinder your flexibility. Make sure the laces of the gloves are always tied and in good condition.</p>
		<input id="box3_desc_en" type="hidden" value="Purchase gloves with maximum protection over the thumb . The cuff of the glove should be flexible but still offer protection. Cuffs that run too far up the arm will hinder your flexibility. Make sure the laces of the gloves are always tied and in good condition.">
         <div class="item-img"><img src="<?php echo $base;?>img/equip/hock-3.jpg" /></div>
		 <div style="padding:10px !important;" id="id_safetyequipment_48" quiz_section_id="48"></div>
        </div>
      </div> 
      
     
    <!-- End First Menu Box --> 

   <!-- Start First Menu Box --> 
      <div id="box4" class="profile-menu-box equip-item">
           <div class="close-box"><a class="icon-chevron-left"></a></div>

        <div class="profile-user clearfix">
             <h3>Hockey Pants<a  href='#hockeypants' data-toggle='modal' class="metro" style="float:right;">
                <button class=" hazard-sponsor" >Ad</button></a></h3>
      
         <hr/>
        <p id="box4_desc">Most hockey pants today are manufactured with pads built inside to cover and protect the hips, thighs, kidneys, and tailbone. Properly fitted pants can prevent your pads from sliding out of place and exposing an area to injury. Your garter belt, which is used to hold your pants up, should be checked frequently for wear and tear.</p>
		<input id="box4_desc_en" type="hidden" value="Most hockey pants today are manufactured with pads built inside to cover and protect the hips, thighs, kidneys, and tailbone. Properly fitted pants can prevent your pads from sliding out of place and exposing an area to injury. Your garter belt, which is used to hold your pants up, should be checked frequently for wear and tear.">
       
         <div class="item-img"><img src="<?php echo $base;?>img/equip/hock-4.jpg" /></div>
		 <div style="padding:10px !important;" id="id_safetyequipment_49" quiz_section_id="49"></div>
        </div> 
  
      </div> 
      
      
      
    <!-- End First Menu Box --> 
    
    <!-- Start First Menu Box --> 
      <div id="box5" class="profile-menu-box equip-item">
           <div class="close-box"><a class="icon-chevron-left"></a></div>
        <div class="profile-user clearfix">
             <h3>Leg Guard<a  href='#hockeylegguard' data-toggle='modal' class="metro" style="float:right;">
                <button class=" hazard-sponsor" >Ad</button></a></h3>
      
         <hr/>
        <p id="box5_desc">Good leg guards have a knee cup pad, wrap-around padding to cover the sides of the knee, and wide side flaps. Make sure they are not too bulky and the length is correct.</p>
        <input id="box5_desc_en" type="hidden" value="Most hockey pants today are manufactured with pads built inside to cover and protect the hips, thighs, kidneys, and tailbone. Properly fitted pants can prevent your pads from sliding out of place and exposing an area to injury. Your garter belt, which is used to hold your pants up, should be checked frequently for wear and tear.">
         <div class="item-img"><img src="<?php echo $base;?>img/equip/hock-5.jpg" /></div>
		 <div style="padding:10px !important;" id="id_safetyequipment_50" quiz_section_id="50"></div>
        </div> 
  
      </div> 
      
    <!-- End First Menu Box --> 
    
        <!-- Start First Menu Box --> 
      <div id="box6" class="profile-menu-box equip-item">
           <div class="close-box"><a class="icon-chevron-left"></a></div>

        <div class="profile-user clearfix">
             <h3> Mouth Guard<a  href='#hockeymouthguard' data-toggle='modal' class="metro" style="float:right;">
                <button class=" hazard-sponsor" >Ad</button></a></h3>
      
         <hr/>
        <p id="box6_desc">Mouth guards are cheaper than dental bills. You can have them specially molded for you. </p>
        <input id="box6_desc_en" type="hidden" value="Mouth guards are cheaper than dental bills. You can have them specially molded for you. ">
         <div class="item-img"><img src="<?php echo $base;?>img/equip/hock-6.jpg" /></div>
		 <div style="padding:10px !important;" id="id_safetyequipment_51" quiz_section_id="51"></div>
        </div>
     </div>
      
    <!-- End First Menu Box --> 

    <!-- Start First Menu Box --> 
      <div id="box7" class="profile-menu-box equip-item">
           <div class="close-box"><a class="icon-chevron-left"></a></div>

        <div class="profile-user clearfix">
             <h3> Groin Protection<a  href='#hockeygroinprotection' data-toggle='modal' class="metro" style="float:right;">
                <button class=" hazard-sponsor" >Ad</button></a></h3>
      
         <hr/>
        <p id="box7_desc">For groin protection, the larger, heavily padded, boxer-style cup is better than the traditional small plastic cup.</p>
        <input id="box7_desc_en" type="hidden" value="For groin protection, the larger, heavily padded, boxer-style cup is better than the traditional small plastic cup.">
         <div class="item-img"><img src="<?php echo $base;?>img/equip/hock-7.jpg" /></div>
		 <div style="padding:10px !important;" id="id_safetyequipment_52" quiz_section_id="52"></div>
        </div>
	</div> 
	<img id="img_loading" src="<?php echo $base."img/loading_icon.gif";?>" width="80px;" height="80px;" style="display:none;">
  
    <!-- End First Menu Box --> 
  
    </div>
      <!-- End Profile Menu Navigation --> 
     <!-- Start Profile Content -->
    
    <div id="equip-image"  class="span6">
        <?php $this->load->view('menu-trade'); ?>
         
        <div class="profile-content-box"> 
            <div class="equip-dots">
				<?php 
				$rows	= $this->points->hasUserGainedPointsGetPoints(6, 46, $checkPointsGained=1);
				$img 	= ($rows['has_points_gained']) ? "equip-dot-green" : 'equip-dot';
				?>
				<a href="javascript:void(0);" quiz_section_id="46" onclick="javascript:$('#box1').delay(200).fadeIn(150);translateData(46,1)">
				<img  class="equip-dot" target="1"  data-toggle="tooltip" title="Helmet and Face Mask" src="<?php echo $base."img/equip/".$img.".png";?>"  style="top:6%;left:44%"> 
				</a>
				<?php 
				$rows	= $this->points->hasUserGainedPointsGetPoints(6, 47, $checkPointsGained=1);
				$img 	= ($rows['has_points_gained']) ? "equip-dot-green" : 'equip-dot';
				?>
				<a href="javascript:void(0);" quiz_section_id="47" onclick="javascript:$('#box2').delay(200).fadeIn(150);translateData(47,1)">
				<img  class="equip-dot" target="2"  data-toggle="tooltip" title="Shoulder pads and chest protector" src="<?php echo $base."img/equip/".$img.".png";?>"  style="top:18%;left:32%">
				</a>
				<?php 
				$rows	= $this->points->hasUserGainedPointsGetPoints(6, 48, $checkPointsGained=1);
				$img 	= ($rows['has_points_gained']) ? "equip-dot-green" : 'equip-dot';
				?>
				<a href="javascript:void(0);" quiz_section_id="48" onclick="javascript:$('#box3').delay(200).fadeIn(150);translateData(48,1)">
				<img  class="equip-dot" target="3"  data-toggle="tooltip" title="Gloves and Elbow Pads" src="<?php echo $base."img/equip/".$img.".png";?>"  style="top:38%;left:44%">
				</a>
				<?php 
				$rows	= $this->points->hasUserGainedPointsGetPoints(6, 49, $checkPointsGained=1);
				$img 	= ($rows['has_points_gained']) ? "equip-dot-green" : 'equip-dot';
				?>
				<a href="javascript:void(0);" quiz_section_id="49" onclick="javascript:$('#box4').delay(200).fadeIn(150);translateData(49,1)">
				<img  class="equip-dot" target="4"  data-toggle="tooltip" title="Hockey Pants" src="<?php echo $base."img/equip/".$img.".png";?>"  style="top:55%;left:53%">
				</a>
				<?php 
				$rows	= $this->points->hasUserGainedPointsGetPoints(6, 50, $checkPointsGained=1);
				$img 	= ($rows['has_points_gained']) ? "equip-dot-green" : 'equip-dot';
				?>
				<a href="javascript:void(0);" quiz_section_id="50" onclick="javascript:$('#box5').delay(200).fadeIn(150);translateData(50,1)">
				<img  class="equip-dot" target="5"  data-toggle="tooltip" title="Leg Guards" src="<?php echo $base."img/equip/".$img.".png";?>"  style="top:68%;left:34%">
				</a>
				<?php 
				$rows	= $this->points->hasUserGainedPointsGetPoints(6, 51, $checkPointsGained=1);
				$img 	= ($rows['has_points_gained']) ? "equip-dot-green" : 'equip-dot';
				?>
				<a href="javascript:void(0);" quiz_section_id="51" onclick="javascript:$('#box6').delay(200).fadeIn(150);translateData(51,1)">
				<img  class="equip-dot" target="6"  data-toggle="tooltip" title="Mouth Guard" src="<?php echo $base."img/equip/".$img.".png";?>"  style="top:14%;left:48%">
				</a>
				<?php 
				$rows	= $this->points->hasUserGainedPointsGetPoints(6, 52, $checkPointsGained=1);
				$img 	= ($rows['has_points_gained']) ? "equip-dot-green" : 'equip-dot';
				?>
				<a href="javascript:void(0);" quiz_section_id="52" onclick="javascript:$('#box7').delay(200).fadeIn(150);translateData(52,1)">
				<img  class="equip-dot" target="7"  data-toggle="tooltip" title="Groin Protection" src="<?php echo $base."img/equip/".$img.".png";?>"  style="top:49%;left:44%">
				</a>
            </div>
            <img src="<?php echo $base;?>img/equip/hockey.jpg">
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
 
	 <!-- *********** start add MODAL page NURSE******************************** -->
	<div id="hockey" class="metro modal hide fade equip-model" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top: 15%; max-width:462px;" data-backdrop="false">
		<a href="http://www.bairrada.ca/" target="new">
        <img src="<?php echo $base;?>img/ad/ppe/hockey/ppe.jpg" />
        </a>
		<div class="modal-footer bg-gray">
			<button class="btn" data-dismiss="modal" >Close</button>
		</div>
	</div>
	<!-- ******************** end sponsored by modal page ************************************* -->
      
      <!-- *********** start add MODAL page hockeyhelmetfacemask******************************** -->
    
	<div id="hockeyhelmetfacemask" class="metro modal hide fade equip-model" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top: 15%; max-width:462px;" data-backdrop="false">
		<a href="http://www.bairrada.ca/" target="new">
        <img src="<?php echo $base;?>img/ad/ppe/hockey/hockeyhelmetfacemask.jpg" />
        </a>
		<div class="modal-footer bg-gray">
			<button class="btn" data-dismiss="modal" >Close</button>
		</div>
	</div>
<!-- ******************** end sponsored by modal page ************************************* --> 
      <!-- *********** start add MODAL page shoulderpads******************************** -->
    
	<div id="shoulderpads" class="metro modal hide fade equip-model" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top: 15%; max-width:462px;" data-backdrop="false">
		<a href="http://www.bairrada.ca/" target="new">
        <img src="<?php echo $base;?>img/ad/ppe/hockey/shoulderpads.jpg" />
        </a>
		<div class="modal-footer bg-gray">
			<button class="btn" data-dismiss="modal" >Close</button>
		</div>
	</div>
<!-- ******************** end sponsored by modal page ************************************* --> 
      <!-- *********** start add MODAL page gloveselbowpads******************************** -->
    
	<div id="gloveselbowpads" class="metro modal hide fade equip-model" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top: 15%; max-width:462px;" data-backdrop="false">
		<a href="http://www.bairrada.ca/" target="new">
        <img src="<?php echo $base;?>img/ad/ppe/hockey/gloveselbowpads.jpg" />
        </a>
		<div class="modal-footer bg-gray">
			<button class="btn" data-dismiss="modal" >Close</button>
		</div>
	</div>
<!-- ******************** end sponsored by modal page ************************************* --> 
      
      <!-- *********** start add MODAL page hockeypants******************************** -->
    
	<div id="hockeypants" class="metro modal hide fade equip-model" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top: 15%; max-width:462px;" data-backdrop="false">
		<a href="http://www.bairrada.ca/" target="new">
        <img src="<?php echo $base;?>img/ad/ppe/hockey/hockeypants.jpg" />
        </a>
		<div class="modal-footer bg-gray">
			<button class="btn" data-dismiss="modal" >Close</button>
		</div>
	</div>
<!-- ******************** end sponsored by modal page ************************************* --> 
      
      <!-- *********** start add MODAL page hockeylegguard******************************** -->
    
	<div id="hockeylegguard" class="metro modal hide fade equip-model" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top: 15%; max-width:462px;" data-backdrop="false">
		<a href="http://www.bairrada.ca/" target="new">
        <img src="<?php echo $base;?>img/ad/ppe/hockey/hockeylegguard.jpg" />
        </a>
		<div class="modal-footer bg-gray">
			<button class="btn" data-dismiss="modal" >Close</button>
		</div>
	</div>
<!-- ******************** end sponsored by modal page ************************************* --> 
      <!-- *********** start add MODAL page hockeymouthguard******************************** -->
    
	<div id="hockeymouthguard" class="metro modal hide fade equip-model" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top: 15%; max-width:462px;" data-backdrop="false">
		<a href="http://www.bairrada.ca/" target="new">
        <img src="<?php echo $base;?>img/ad/ppe/hockey/hockeymouthguard.jpg" />
        </a>
		<div class="modal-footer bg-gray">
			<button class="btn" data-dismiss="modal" >Close</button>
		</div>
	</div>
<!-- ******************** end sponsored by modal page ************************************* --> 
      <!-- *********** start add MODAL page hockeygroinprotection******************************** -->
    
	<div id="hockeygroinprotection" class="metro modal hide fade equip-model" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top: 15%; max-width:462px;" data-backdrop="false">
		<a href="http://www.bairrada.ca/" target="new">
        <img src="<?php echo $base;?>img/ad/ppe/hockey/hockeygroinprotection.jpg" />
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
