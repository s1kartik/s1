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
      <div  id="equip-landing" class="profile-menu-box">
         <div class="profile-menu-heading clearfix">
          <h3>Safety Equipment<a  href='#nurse' data-toggle='modal' class="metro" style="float:right;">
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
            <h3>Sharps Container<a href='#sharpscontainer' data-toggle='modal' class="metro" style="float:right;">
            <button class="hazard-sponsor">Ad</button></a></h3>
			<hr/>
			<p id="box1_desc">A safe disposable container for needles, syringes, lancets, razors and other sharp objects.</p>
			<input type="hidden" id="box1_desc_en" value="A safe disposable container for needles, syringes, lancets, razors and other sharp objects.">
			<div class="item-img"><img src="<?php echo $base;?>img/equip/nur-1.jpg" /></div>
			<div style="padding:10px !important;" id="id_safetyequipment_36" quiz_section_id="36"></div>
        </div> 
      </div>      
    <!-- End First Menu Box --> 
    
    <!-- Start First Menu Box --> 
	<div id="box2" class="profile-menu-box equip-item">
		<div class="close-box"><a class="icon-chevron-left"></a></div>
		<div class="profile-user clearfix">
		<h3>N95 Mask<a  href='#n95mask' data-toggle='modal' class="metro" style="float:right;">
		<button class=" hazard-sponsor" >Ad</button></a></h3>
		<hr/>
		<p id="box2_desc">Helps stop the spread of pathogens and protects the person wearing it from splashes or sprays from reaching the mouth and nose.</p>
		<input type="hidden" id="box2_desc_en" value="Helps stop the spread of pathogens and protects the person wearing it from splashes or sprays from reaching the mouth and nose.">
		<div class="item-img"><img src="<?php echo $base;?>img/equip/nur-2.jpg" /></div>
		<div style="padding:10px !important;" id="id_safetyequipment_37" quiz_section_id="37"></div>
		</div>
	</div>
	<!-- End First Menu Box --> 

    <!-- Start First Menu Box --> 
      <div id="box3" class="profile-menu-box equip-item">
           <div class="close-box"><a class="icon-chevron-left"></a></div>

        <div class="profile-user clearfix">
             <h3>Nitrile Gloves<a  href='#nitrilegloves' data-toggle='modal' class="metro" style="float:right;">
                <button class=" hazard-sponsor" >Ad</button></a></h3>
         <hr/>
        <p id="box3_desc">Type of disposable gloves made of synthetic rubber. Excellent resistance to wear and tears and offers resistance to chemicals and some biological hazards such as blood.</p>
        <input type="hidden" id="box2_desc_en" value="Type of disposable gloves made of synthetic rubber. Excellent resistance to wear and tears and offers resistance to chemicals and some biological hazards such as blood.">
        <div class="item-img"><img src="<?php echo $base;?>img/equip/nur-3.jpg" /></div>
		<div style="padding:10px !important;" id="id_safetyequipment_38" quiz_section_id="38"></div>
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
				$rows	= $this->points->hasUserGainedPointsGetPoints(6, 36, $checkPointsGained=1);
				$img 	= ($rows['has_points_gained']) ? "equip-dot-green" : 'equip-dot';
				?>
				<a href="javascript:void(0);" quiz_section_id="36" onclick="javascript:$('#box1').delay(200).fadeIn(150);translateData(36,1)">
				<img  class="equip-dot" target="1"  data-toggle="tooltip" title="Sharps Container" src="<?php echo $base."img/equip/".$img.".png";?>"  style="top:45%;left:20%"> 
				</a>
				<?php 
				$rows	= $this->points->hasUserGainedPointsGetPoints(6, 37, $checkPointsGained=1);
				$img 	= ($rows['has_points_gained']) ? "equip-dot-green" : 'equip-dot';
				?>
				<a href="javascript:void(0);" quiz_section_id="37" onclick="javascript:$('#box2').delay(200).fadeIn(150);translateData(37,1)">
				<img  class="equip-dot" target="2"  data-toggle="tooltip" title="N95 Mask" src="<?php echo $base."img/equip/".$img.".png";?>" style="top:12%;left:45%">
				</a>
				<?php 
				$rows	= $this->points->hasUserGainedPointsGetPoints(6, 38, $checkPointsGained=1);
				$img 	= ($rows['has_points_gained']) ? "equip-dot-green" : 'equip-dot';
				?>
				<a href="javascript:void(0);" quiz_section_id="38" onclick="javascript:$('#box3').delay(200).fadeIn(150);translateData(38,1)">
				<img  class="equip-dot" target="3"  data-toggle="tooltip" title="Nitrile Gloves" src="<?php echo $base."img/equip/".$img.".png";?>" style="top:29%;left:52%">
				</a>
			</div>
            <img src="<?php echo $base;?>img/equip/nurse.jpg">  
        </div>

    </div>
    
   <!-- End Profile Content -->
  
    
   </div>
 <div class="row-fluid">
<!-- Bottom Banner Ad -->
<?php $this->load->view('center-leaderboard.php'); ?>    
<!-- end bottom banner ad -->
<input id="id_noof_box" type="hidden" value="3">
</div>
</div>
</div>

<!-- *********** start add MODAL page NURSE******************************** -->
	<div id="nurse" class="metro modal hide fade equip-model" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top: 15%; max-width:462px;" data-backdrop="false">
		<a href="http://www.surgelearning.com/" target="new">
        <img src="<?php echo $base;?>img/ad/ppe/nurse/ppe.jpg" />
        </a>
		<div class="modal-footer bg-gray">
			<button class="btn" data-dismiss="modal" >Close</button>
		</div>
	</div>
	<!-- ******************** end sponsored by modal page ************************************* --> 
      
	<!-- *********** start add MODAL page sharpscontainer******************************** -->
	<div id="sharpscontainer" class="metro modal hide fade equip-model" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top: 15%; max-width:462px;" data-backdrop="false">
		<a href="http://www.surgelearning.com/" target="new">
        <img src="<?php echo $base;?>img/ad/ppe/nurse/sharpscontainer.jpg" />
        </a>
		<div class="modal-footer bg-gray">
			<button class="btn" data-dismiss="modal" >Close</button>
		</div>
	</div>
	<!-- ******************** end sponsored by modal page ************************************* --> 
      
	<!-- *********** start add MODAL page n95mask******************************** -->	
	<div id="n95mask" class="metro modal hide fade equip-model" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top: 15%; max-width:462px;" data-backdrop="false">
		<a href="http://www.surgelearning.com/" target="new">
        <img src="<?php echo $base;?>img/ad/ppe/nurse/n95mask.jpg" />
        </a>
		<div class="modal-footer bg-gray">
			<button class="btn" data-dismiss="modal" >Close</button>
		</div>
	</div>
	<!-- ******************** end sponsored by modal page ************************************* -->    
      
	<!-- *********** start add MODAL page nitrilegloves******************************** -->
	<div id="nitrilegloves" class="metro modal hide fade equip-model" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background-color:none;	margin-top: 15%; max-width:462px;" data-backdrop="false">
		<a href="http://www.surgelearning.com/" target="new">
        <img src="<?php echo $base;?>img/ad/ppe/nurse/nitrilegloves.jpg" />
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
   