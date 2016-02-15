<?php $this->load->view('header_admin');
$quizurl = '';
$sizeof_page = sizeof($page);
?>
<script type="text/javascript">
$(window).load(function() {
	$('.flexslider').flexslider({
		controlNav: false,
		prevText:"",
		nextText:"",
		// animation: "slide", 
		// itemWidth: 1,
		minItems: 2,
		maxItems: 3,
		move: 2,
		reverse: false,
		slideshow: false
	});
});
</script>
<form class="form-horizontal forms1" method="post">
	<div class="homebg metro">
		<div class="container-fluid">
			<div class="main-content padding20 clearfix">
				<div class="tile-area no-padding clearfix">
					<?php 
					if( $sizeof_page>0 && isset($page[0]['page_id']) ) {
						for( $cnt=0; $cnt<$sizeof_page; $cnt++ ) 
						{
							$pn 					= $page[$cnt]['pn'];
							$page_id 				= $page[$cnt]['page_id'];
							$paragraph_id 			= $page[$cnt]['paragraph_id'];
							$paragraph_title 		= $page[$cnt]['paragraph_title'];
							$paragraph_subtitle 	= $page[$cnt]['paragraph_subtitle'];
							$paragraph_description 	= $page[$cnt]['paragraph_description'];
							?>
							<?php switch ($library_type_id){
									case "3":
									$icon_name = "hazards_dark";
									$bg_color = "bg-hazards-tiles";
									$font_color = "fg-dark";//could be darker or gray or black
									break;
								default:
									$icon_name = "training";
									$bg_color = "bg-training-tiles";
									$font_color = "fg-white";
									break;	
									}
							?>
							<!--START CODE FOR METRO STYLE-->
								<!-------BEGIN FIRST ROW OF TILES------>
								<div class="tile-group no-margin no-padding clearfix" style="width: 100%">
									<!--begin text information paragraphs -->
										<div class="tile instructor-content ol-transparent bg-white" >
											<div class="tile-content">
												<div class="panel no-border">
													<div class="panel-header <?php echo $bg_color." ".$font_color;?>" href="#mypageModal" data-toggle="modal"  style="cursor:pointer;">
														<span class="icon " ><img src="<?php echo $base;?>img/library/<?php echo $icon_name;?>_blank.png" width="30" height="30" ></span>
														<strong><?php echo $library_title;?></strong>
													</div>
													<!--begin library content-->
													
													<div class=" panel-content fg-dark nlp nrp padding10 tab-content instructor-scrollable">
													<?php /* 
													// PLEASE DO NOT DELETE THIS SCRIPT //panel-instructor fg-dark padding10 instructor-scrollable
													if( "library_page_contents" == $this->uri->segment(2) ) {?>
														<meta name="google-translate-customization" content="e177509a3831646f-8599ed056708191b-g71d7560f82537811-c"></meta>
														<!-- START - Google Translator Plugin -->
															<div class="padding5 place-right" id="google_translate_element">
															<script type="text/javascript">
																function googleTranslateElementInit() {
																	new google.translate.TranslateElement({pageLanguage: 'en', includedLanguages: 'pt,it,es,pl,el,zh-CN', layout: google.translate.TranslateElement.FloatPosition.TOP_RIGHT, multilanguagePage: true}, 'google_translate_element');
																}// Portuguese, Italian, Spanish, Polish, Greek and Chinese, 
															</script>
															<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
															</div>
														<!-- END - Google Translator Plugin -->
														<?php
													}*/
													?>
													<div class="padding5 place-right" id="google_translate_element">
														<?php echo $this->common->callLanguageSelectBox("cmb_s1lib_lang", $to_lang);?>
													</div>
													<?php 
													//if( isset($paragraph_title) && $paragraph_title ) {
														//echo "<span class='padding5'>".$paragraph_title."</span>";
													//}?>
													<br><br>
														<?php 
														//if( isset($paragraph_subtitle) && $paragraph_subtitle ) {
															//echo "<span class='padding5'>".$paragraph_subtitle."</span>";
														//}?>
														
														<div style="display:none;" id="img_data_loader" align="center"><img width="70" height="70" src="<?php echo $base."img/loading_icon.gif";?>"></div>
														<div class="margin10" >
															<span href="#mypageModal" data-toggle="modal" class="cls-page-libcontents cls_pagedesc">
																<?php 
																if( isset($paragraph_description) && $paragraph_description ) {
																	// mb_internal_encoding("UTF-8");
																	echo googletranslatetool::translate($paragraph_description, $lang, $to_lang);
																}?>
															</span>
														</div>
														<!--start modal page-->
															<div id="mypageModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
																<div class="modal-header <?php echo $bg_color;?>">
																	<h3 id="myModalLabel" class="<?php echo $font_color;?>">
																	<span class="icon" ><img src="<?php echo $base;?>img/library/<?php echo $icon_name;?>_blank.png" width="35" height="35"></span>
																	<?php echo $library_title;?><i class="pull-right icon-cancel-2 icon-top-close" data-dismiss="modal"></i></h3>
																</div>
																<div class="modal-body modal_library_body">
																	<?php 
																	//if( isset($paragraph_title) && $paragraph_title ) {
																		//echo "<h4>".$paragraph_title."</h4>";
																	//}
																	//if( isset($paragraph_subtitle) && $paragraph_subtitle ) {
																		//echo "<h5>".$paragraph_subtitle."</h5>";
																	//}
																	?>
																	<span class='cls-modal-libcontents cls_pagedesc'>
																	<?php
																	if( isset($paragraph_description) && $paragraph_description ) {
																	// mb_internal_encoding("UTF-8");
																	echo googletranslatetool::translate($paragraph_description, $lang, $to_lang);
																	}?>
																	</span>
																	<?php

																	$this->load->view('library_pagination');
																	if( $sizeof_page>0) {?>
																		<input type="hidden" name="current_page_id" value="<?php echo $page_id;?>" />
																		<?php 
																	}?>
																</div>
																<div class="modal-footer"><button class="btn" data-dismiss="modal">Close</button></div>
															</div>
															<script type="text/javascript">
																$('#mypageModal').css({ 'width':'98%', 'left':'1%', 'margin-left': '0px', 'top':'1%' });
																$('.modal_library_body').css({ 'max-height':'80vh','overflow-y':'auto','overflow-x':'hidden'});
															</script>
														<!--end modal page-->
														
														<!-- Pagination -->
															<?php 
															$this->load->view('library_pagination');
															if( $sizeof_page>0) {?>
																<input type="hidden" name="current_page_id" value="<?php echo $page_id;?>" />
																<?php 
															}?>
													</div>
												</div>
											</div>
										</div>
										<!--end text information paragraphs-->
                                            <!--begin  images-->
												<?php 
												$images = $this->libraries->getImagesByParagraphPageID( $page_id, $paragraph_id );
												// common::pr($images);
												if( count($images)>0 && isset($images[0]['image'])) {
													if( count($images) > 0 && isset($images[0]['image']) ) {
													$sizeof_images = (sizeof($images)>8) ? 8 : sizeof($images);
													//MAXIMUM OF 8 IMAGES//
													 
													for( $cntimg=0; $cntimg<$sizeof_images; $cntimg++ ) 
													{
													$image_name = $images[$cntimg]['image'];
													$image_description = $images[$cntimg]['image_description'];
													//common::pr($image_description);
													if( file_exists(FCPATH.$this->path_upload_paragraph_images.$image_name) ) {?>
													<a id= "imagelink<?php echo $cntimg?>" href="#imageModal<?php echo $cntimg?>" class="tile  ol-transparent" data-toggle="modal">
														<div class="tile-content ">
														<img class="w120 h120" src="<?php echo $base.$this->path_upload_paragraph_images.$image_name;?>" />
														</div>
													</a>
												 <!--start image modal page-->
													<div id="imageModal<?php echo $cntimg?>" class="modal hide fade cls-img modal_images" tabindex="-1" role="dialog" aria-labelledby="myModalLabel<?php echo $cntimg?>">
													<div class="modal-header <?php echo $bg_color;?>">
														<h3 id="myModalLabel<?php echo $cntimg?>" class="<?php echo $font_color;?>">
															<span class="icon" ><img src="<?php echo $base;?>img/library/<?php echo $icon_name;?>_blank.png" width="35" height="35"></span>
															<strong><?php echo $library_title;?></strong>&nbsp;<i class="pull-right icon-cancel-2 icon-top-close" data-dismiss="modal"></i></h3>
													</div>
													<div class="modal-body modal-body-image">
													<div style="padding-bottom:5px;">
													<select name="cmb_s1lib_lang_img" id="cmb_s1lib_lang_img<?php echo $cntimg?>">
													<option value="">-select language-</option>
													<option value="en" <?php echo ($to_lang=='en') ? 'selected="selected"' : '';?>>English</option>
													<option value="pt" <?php echo ($to_lang=='pt') ? 'selected="selected"' : '';?>>Portuguese</option>
													<option value="es" <?php echo ($to_lang=='es') ? 'selected="selected"' : '';?>>Spanish</option>
													<option value="it" <?php echo ($to_lang=='it') ? 'selected="selected"' : '';?>>Italian</option>
													<option value="pl" <?php echo ($to_lang=='pl') ? 'selected="selected"' : '';?>>Polish</option>
													<option value="el" <?php echo ($to_lang=='el') ? 'selected="selected"' : '';?>>Greek</option>
													<option value="zh-CN" <?php echo ($to_lang=='zh-CN') ? 'selected="selected"' : '';?>>Chinese</option>
													<option value="ar" <?php echo ($to_lang=='ar') ? 'selected="selected"' : '';?>>Arabic</option>
													<option value="de" <?php echo ($to_lang=='de') ? 'selected="selected"' : '';?>>German</option>
													<option value="ru" <?php echo ($to_lang=='ru') ? 'selected="selected"' : '';?>>Russian</option>
													<option value="tgl" <?php echo ($to_lang=='tgl') ? 'selected="selected"' : '';?>>Tagalog</option>
													</select>
													 </div>
													 <div style="padding-bottom:5px;">
														<div class="img_library_page" style="float:left"><img  src="<?php echo $base.$this->path_upload_paragraph_images.$image_name;?>"/></div>
														<div style="float:left;padding: 10px" class="cls-modal-libimg-contents<?php echo $cntimg;?> " id="imgdesc_<?php echo $cntimg;?>">
															<?php 
															echo "&nbsp;&nbsp;".googletranslatetool::translate($image_description, $this->session->userdata('s1lib_fromlang'), $this->session->userdata('s1lib_tolang'));?>
														</div>
													  </div>																	  
													</div>
													<div class="modal-footer"><button class="btn" data-dismiss="modal" onclick="javascript:location.reload();">Close</button></div>
													</div>
													<script type="text/javascript">
													$(document).ready (function(){
														$('#imagelink<?php echo $cntimg?>').click(function(){
														$image_description 	= '<?php echo base64_encode($image_description);?>';
														var $from_lang = '<?php echo $this->session->userdata('s1lib_fromlang');?>';
														var $to_lang = $("#cmb_s1lib_lang").val();
														if( $to_lang ) {
															$.post('<?php echo $base;?>ajax/getTranslatedImageDesc', {'translateSection':"s1_library", 'imageDescription':$image_description, 'fromLang':$from_lang, 'toLang':$to_lang}, 
															function(data){
																$(".cls-modal-libimg-contents<?php echo $cntimg;?>").html(data);
																$("#cmb_s1lib_lang_img<?php echo $cntimg;?>").val($to_lang);
															});
														}
														else {
															alert("Please select language");
															return false;
														}
														});
														 $('#cmb_s1lib_lang_img<?php echo $cntimg;?>').change(function(){
															$from_lang 				= '<?php echo $lang;?>';
															$to_lang 				= $(this).val();
															$image_description 	= '<?php echo base64_encode($image_description);?>';
															if( $to_lang ) {
																$.post('<?php echo $base;?>ajax/getTranslatedImageDesc', {'translateSection':"s1_library", 'imageDescription':$image_description, 'fromLang':$from_lang, 'toLang':$to_lang}, 
																function(data){					
																		$(".cls-modal-libimg-contents<?php echo $cntimg;?>").html(data);
																});
															}
															else {
																alert("Please select language");
																return false;
															}
														});
														});                
														$('i').css({'cursor': 'pointer'});
														</script>
														<!--end image modal page-->
																	 <?php 
																		}
																}
														}
												}?>
                             <script type="text/javascript">
								$('.img_library_page img').css({ 'width':'100%',  'display':'block', 'height':'100%', 'max-width':'720px'});
								$('.modal-body-image').css({ 'margin-left':'0px',  'padding':'0px', 'max-height':'80vh','overflow-y':'auto','overflow-x':'hidden', 'max-width':'720px',  'width':'100%' });
								$('.modal-header').css({'border':'0px'});
								$('.modal-footer').css({'border-radius':'0px'});
								$('.modal_images').css({ 'max-width':'720px','width':'100%','top':'1%' });
							</script>
							<!--end  images-->									
							</div>
								<!-------END FIRST ROW OF TILES------>  

								<!------- START - QUIZ ------->
								<?php 
								if( $pages == $current_page) {
									$this->libraries->updateReadingHistory($this->session->userdata("userid"), (int)$_GET['libid'], $page_id);
									if(sizeof($page_questions)>0) {
										$quizurl = "href='#myQuizModal' data-toggle='modal' onclick='enableAnsStatus();'";?>
										<script type="text/javascript">
										$(document).ready (function(){ 
											$('#test').removeClass('half-opacity');
											$('.msg_quiz').html('<br><br><h4 class="s1content_title">Start test by clicking on <img src="<?php echo $base;?>img/library-page/test_shot.png" class="w70"> below.</h4>');	 
										});
										</script>
										<?php 
									}
								}
								?>
							<div id="myQuizModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
								<div class="modal-header bg-red">
									<h3 id="myModalLabel"><img src="<?php echo $base;?>img/library-page/test_icon.png" width="30" height="30"> <?php echo $library_title;?><i class="pull-right icon-cancel-2 icon-top-close" style="margin-right:10px;" data-dismiss="modal"></i></h3>
								</div>
								<div class="modal-body">
									<?php 
									if(sizeof($page_questions)>0) {
										$final_arr_quiz = array();?>
										<div>
											<?php 
											$cnt_ques=0;
											foreach($page_questions as $question) {
												$ques_id= $question['question_id'];
												$page_id= $question['page_id'];
												$ques 	= $question['question'];
												$user_answer= isset($_SESSION['final_arr_quiz'][$page_id][$ques_id]['user_answer']) 
														? $_SESSION['final_arr_quiz'][$page_id][$ques_id]['user_answer'] : 'na';													
												$highlight_wrong_ans = ('1'!=$user_answer) ? 'bglightred' :'';

												$arr_quiz[$ques_id]['page_id'] 		= $question['page_id'];
												$arr_quiz[$ques_id]['question_id']	= $question['question_id'];
												$arr_quiz[$ques_id]['question'] 	= $ques;
												?>
												<div class="span6 pull-left">
													<div class="flexslider">
														<div id="questions" class="ques">															
															<h5 id="id_img_wrong_ans_<?php echo $ques_id;?>" class="wordbreak <?php echo $highlight_wrong_ans;?>"><?php echo ($cnt_ques+1).")&nbsp;".$ques;?>
															
															&nbsp;<span id="ques_status<?php echo $ques_id;?>"></span></h5>
															<ul class="" style="list-style:lower-latin;">
																<?php 
																$choices = $this->libraries->getQuestionAnswers($ques_id);
																foreach( $choices as $ch ) {
																	$answer_id 	= $ch['answer_id'];
																	$answer 	= $ch['answer'];
																	$choice 	= $ch['choice'];
										
																	$sel_answer_id = isset($_SESSION['final_arr_quiz'][$page_id][$ques_id]['sel_answer_id']) 
																					? $_SESSION['final_arr_quiz'][$page_id][$ques_id]['sel_answer_id']
																					: '';
																	$selected 	= ($sel_answer_id==$answer_id) ? 'checked="checked"' : '';
																	
																	$arr_quiz[$ques_id]['answer_id'] = $answer_id;
																	($answer==1) ? $arr_quiz[$ques_id]['answer'] = $choice : '';
																	?>
																	<li for="answer<?php echo $ques_id;?>">
																		<input type="radio" class="my_answer wordbreak" onchange="checkAnswer(this.value, '<?php echo $answer;?>', '<?php echo $ques_id;?>', '<?php echo $page_id;?>')" <?php echo $selected;?> name="answer<?php echo $ques_id;?>" value="<?php echo $answer_id;?>" />
																		<?php echo "&nbsp;".$choice;?>
																	</li>
																	<?php 
																}?>
															</ul>
														</div>
													</div>
												</div>
												<?php 
												$cnt_ques++;
											}
											if( !isset($_SESSION['final_arr_quiz'][$page_id]) ) {
												$_SESSION['final_arr_quiz'][$page_id] = $arr_quiz;
											}?>
										</div>
										<?php 
									}
									if( !$paragraph_id ) {?>
										<div class="row-fluid fglightgrey">No data available</div>
										<?php 
									}?>
								</div>
								<div class="modal-footer">
									<button class="btn btn-warning" href='#myQuizSummaryModal' data-toggle='modal'>Get Summary</button>
									<button class="btn" data-dismiss="modal">Close</button>
								</div>
							</div>
							<!------- END - QUIZ ------->
							<?php 
						}?>


						<div id="myQuizSummaryModal" class="modal fade hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							<div class="modal-header bg-red">
								<h3 id="myModalLabel"><?php echo "Summary - ".$library_title;?><i class="pull-right icon-cancel-2 icon-top-close" style="margin-right:10px;" data-dismiss="modal"></i></h3>
							</div>
							<div class="modal-body">
								<div id="id_page_summary">
									<?php 
									$rows_quiz = isset($_SESSION['final_arr_quiz']) ? $_SESSION['final_arr_quiz'] : array();
									if(count($rows_quiz)>0) {
										?>
										<div class="span6 pull-left">
											<?php 
											$cnt_page = $cnt_ques = $rate = 0;
											foreach( $rows_quiz AS $key_page => $val_page )
											{?>
												<div class="flexslider">
													<?php 
													$cnt_page++;
													$page_id = $key_page;
													foreach( $val_page AS $key_ques => $val_ques ) {
														$cnt_ques++;
														$ques_id 	= $key_ques;
														$ques 		= $val_ques['question'];
														$ans_id 	= $val_ques['answer_id'];
														$ans 		= isset($val_ques['answer']) ? $val_ques['answer'] : '';
														$user_ans 	= (isset($val_ques['user_answer']) && $val_ques['user_answer']>=0) ? $val_ques['user_answer'] : '';
														?>
													
														<h5 class="wordbreak"><strong><?php echo $cnt_ques.")&nbsp;".$ques;?></strong></h5>
														<ul class="no-list-style">
															<?php 
															if( '' != $user_ans ) {?>
																<?php /*<li class="wordbreak"><?php echo "<strong>Correct answer: </strong>".$ans;?></li>*/?>
															<?php 
															}?>
															<li class="wordbreak"><strong>Your answer: </strong>
																<?php 
																if('1' == $user_ans) {
																	$rate++;
																	?><img src='../img/library-page/right.png' width='25' height='20'>
																	<?php
																}
																else if('0' == $user_ans) {?>
																	<img src='../img/library-page/wrong.png' width='25' height='20'>
																	<?php
																}
																else {
																	echo "n/a";
																}?>
															</li>
														</ul>
														<?php 
													}
													?>
												</div>
											<?php 
											}?>
										</div>
										
										<div class="span6 pull-left">
											<div class="flexslider">
												<?php 
												if( $cnt_ques>0 && $rate>0 ) {
													$score = round( ($rate/$cnt_ques)*100 ) ;
													if( $score < 75 ) {
														echo "<h6>Sorry, You have reached ".$score."% of right answers, You are not eligible to earn any points, Please try again.</h6>";
													}
													else {
														echo "<h6>Congratulations, You have reached ".$score."% of right answers, You have earn points.</h6>";?>
														<script type="text/javascript">
															setPagePoints(2, 27, 'id_modal_points', 'modal_points', 'library');
														</script>
														<?php 
													}
												}?>
											</div>
										</div>
									<?php
									}
									else {
										echo "<h5>No data found<h5>";
									}?>
								</div>
							</div>
							<div class="modal-footer"><button class="btn" data-dismiss="modal">Close</button></div>
						</div><br><br>		
										

						<!-------BEGIN SECOND ROW OF TILES------>				
							<div class="tile-group no-margin no-padding clearfix" style="width: 100%">
								<!--begin small tile-->
									<a class="tile bg-black" id="id_s1lib_inspections_model" href='#modal_inspection' data-toggle='modal'>
										<div class="tile-content icon"><span class="icon">
											<img src="<?php echo $base;?>img/library-page/inspection_icon.png"></span>
										</div>
										<div class="brand"><span class="label fg-white"><small>INSPECTIONS</small></span></div>
									</a>
									<!--/////////// START MODAL - INSPECTIONS page-->
										<div id="modal_inspection" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
											<div class="modal-header bg-red">
												<h3 id="myModalLabel"><img width="35px" src="<?php echo $base;?>img/library/inspections_blank.png"> INSPECTIONS<i class="pull-right icon-cancel-2 icon-top-close" style="margin-right:10px;" data-dismiss="modal"></i></h3>
											</div>
											<div class="modal-body">
												<?php 
												if( "3" == $library_type_id ) {?>
													<div class="padding5 place-right" id="google_translate_element"><?php echo $this->common->callLanguageSelectBox("cmb_s1lib_model_inspection", $to_lang);?></div>
													<?php
												}?>
												<div class="row-fluid">
													<h4 class="s1content_title">Inspections</h4>
												    <hr class="s1content_line" />
													<p class="s1content_body_section">
													<?php 
													$desc_inspections_model ='Inspections are conducted to carefully examine and identify potential and existing hazards and potential injuries workers are being exposed to in the workplace and developing control measures to reduce or eliminate worker exposure to these hazards.  Inspections are not only performed in the workplace but are also required to be performed on all equipment, machinery and vehicles workers are using to ensure they are well maintained and operating safely.  Inspections can be performed by a competent worker designated by the supervisor, by a JHSC (Joint Health & Safety Committee) or H&S Rep.</p>';
													?>
													<p class="s1content_body_section inspections_modal">
														<?php echo googletranslatetool::translate($desc_inspections_model, $lang, $to_lang);?>
													</p>
													<?php if( "3" == $library_type_id ) {
														$file_name = "img/s1library_images/hazard/inspection_hazard_id".$library_id.".png";
														if (file_exists($file_name)) {?>
														    <img src="<?php echo $base;?>img/s1library_images/hazard/<?php echo "inspection_hazard_id".$library_id.".png";?>">
														    <?php 
														} else {
														    echo "<img src='".$base."img/s1library_images/inspection_standard.png' >";
														}
													}
													else{?>
														<img src="<?php echo $base;?>img/s1library_images/inspection_standard.png">
														<?php 
													}?>
												</div>
												<script type="text/javascript">
													<?php
													if( "3" == $library_type_id ) {?>
														$(document).ready (function(){
														$('#id_s1lib_inspections_model').click(function(){
															$from_lang 	= '<?php echo $lang;?>';
															$to_lang 	= $("#cmb_s1lib_lang").val();
															$desc_inspections_model = '<?php echo $desc_inspections_model;?>';
															if( $to_lang ) {
																$.post(js_base_path+'ajax/getTranslatedText', {'translateSection':"s1_library", 'isPlainText':'1', 'paragraphDescription':$desc_inspections_model, 'fromLang':$from_lang, 'toLang':$to_lang}, 
																function(data){ 
																	$("p.inspections_modal").html(data); 
																	$("#cmb_s1lib_model_inspection").val($to_lang);
																});
															}
														});
														});
														$('#cmb_s1lib_model_inspection').change(function(){
															$from_lang 	= '<?php echo $lang;?>';
															$to_lang 	= $(this).val();
															$desc_inspections_model = '<?php echo $desc_inspections_model;?>';
															if( $to_lang ) {
																$.post(js_base_path+'ajax/getTranslatedText', {'translateSection':"s1_library", 'isPlainText':'1', 'paragraphDescription':$desc_inspections_model, 'fromLang':$from_lang, 'toLang':$to_lang}, 
																function(data){ $("p.inspections_modal").html(data); });
															}
															else {
																alert("Please select language");
																return false;
															}
														});
														<?php 
													}?>
												</script>
												<?php 
												$cnt_insp_pending = 0;
												$related_inspections = $this->libraries->getRelatedLibraryIdsOfLibrary($library_id, 5);
												// Check all the inspections are purchased or not.
													foreach( $related_inspections AS $id_insp ) {
														$is_inspection_bought = $this->libraries->checkLibraryBought($id_insp, 'normal_inspection');
														('0' == $is_inspection_bought) ? $cnt_insp_pending=1 : "";
													}
													echo (sizeof($related_inspections) > '0' ) ? "<h4 class='s1content_title'>Hazard Related Inspections</h4><hr class='s1content_line' />" : "";
													// Put in comments on Oct-26-2015 as per item 184 - S1 request - Marcio
													//echo (sizeof($related_inspections) && $cnt_insp_pending==1) ? "<p class='s1content_body_section'><strong>S1 Message - </strong> Inspections can be assigned to you by your employer</p>" : "";?>

												<div class="row-fluid">
													<?php 
													// BELOW LINE REQUESTED BY PHILL TO SHOW ONLY A MAX OF FOUR ON SEP-10-2015
													$related_inspections = array_splice($related_inspections,0,4);

													foreach( $related_inspections AS $id_insp ) {
														$rows_inspections 	= $this->users->getMetaDataList( 'inspection', "id='".$id_insp."' AND status=1 AND (date_inspection_end>".date('Y-m-d')." OR date_inspection_end = '0000-00-00')", '', 'id, st_inspection_name AS title, 
														in_price, in_earning_points, in_credits_buy, st_icon_path as icon_path' );

														$price		= $rows_inspections[0]['in_price'];
														$points     = $data['item_points'] = $rows_inspections[0]['in_earning_points'];
														$credits    = $data['item_credits'] = $rows_inspections[0]['in_credits_buy'];
														$insp_name	= (isset($rows_inspections[0]['title']) && $rows_inspections[0]['title']) ? $rows_inspections[0]['title'] : '';
														$insp_id	= $data['item_id'] = (isset($rows_inspections[0]['id']) && $rows_inspections[0]['id']) ? $rows_inspections[0]['id'] : '';
														$icon_path	= $rows_inspections[0]['icon_path'];
														$is_inspection_bought = $this->libraries->checkLibraryBought($insp_id, 'normal_inspection');
														$icon_credits = '<i><img src="'.$base.'img/icons_s1credit.png" style="height:16px;" /></i>&nbsp;'.$credits;
														// ITEMS REMOVED BY PHILL REQUEST ON SEP-10-2015
														//if( $is_inspection_bought == '1' ) {
															//$redirect_page = $base."admin/my_inspection_page_metro?id=".$insp_id."&type=normal_inspection";
															$class_inpection = "";
															//$icon_credits = "";
														//}
														//else {
															//$class_inpection =  "half-opacity add_to_cart";
														//}
														//$cart_href_string 	= 'id="'.$insp_id.'" description="" inspection_type="normal" library_type="normal_inspection" libtitle="'.$insp_name.'" price="'.$price.'" points="'.$points.'" credits="'.$credits.'"';
														?>
														
														<a href="#modal_shopping_items<?php echo $insp_id;?>"  class="tile half-library fg-white bg-darker <?php echo $class_inpection;?> select_custom_inspection" data-toggle="modal" >
														  <?php 
															if( isset($icon_path) && $icon_path ) {?>
																<img class="w50" src="<?php echo $icon_path;?>" >
															<?php }
															else {?>
																<img src="<?php echo $base.$this->path_img_library."inspections.png";?>">
															<?php 
															}?>
															<span class="fg-white" style="position:absolute;top:5px;"><small><?php echo substr($insp_name,0,18)."..."; ?></small></span>
															<div class="brand">                                              
																<span class="label fg-white text-center">&nbsp;
																<small>
																<?php echo $icon_credits;?>&nbsp;
																<i class=""><img src="<?php echo $base;?>img/icons_xp.png" style="height:16px;"></i>&nbsp;
																<?php echo $points;?>
																</small>
																</span>
															</div>
														</a>
														<?php 
														//  ITEMS REMOVED BY PHILL REQUEST ON SEP-10-2015, kept in comments due to future changes
														//if( trim($class_inpection) ) 
														//{?>
															<!--div id="modal_shopping_items<?php echo $insp_id;?>" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"></div-->
															<?php 
															//$this->load->view('modal_shopping_options', $data);
														//}
													}?>
												</div>
											</div>
											<div class="modal-footer"><button class="btn btn-close" data-dismiss="modal">Close</button></div>
										</div>
									 <!--/////////// END MODAL - INSPECTIONS page-->
								<!--end small tile-->
								
								<!--begin small tile-->
									<?php 
									$related_duediligence 	= $this->libraries->getRelatedLibraryIdsOfLibrary($library_id, 57);
									$tile_duediligence 		= 'half-opacity';
									$model_duediligence 	= "";
									if( isset($related_duediligence) && sizeof($related_duediligence) ) {
										$tile_duediligence = '';
										$model_duediligence = 'data-toggle="modal"';
									}?>
									<a class="tile bg-black <?php echo $tile_duediligence;?>" href='#duediligenceModal' <?php echo $model_duediligence;?>>
										<div class="tile-content icon">
											<span class="icon"><img src="<?php echo $base;?>img/library-page/duediligence_icon.png"></span>
										</div>
										<div class="brand"><span class="label fg-white"><small>DUE DILIGENCE</small></span></div>
									</a>
								<!--end small tile-->
								
                                <!-- /////////// START MODAL - DUE DILIGENCE page-->
                                <div id="duediligenceModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-header bg-red">
                                        <h3 id="myModalLabel"><img width="35px" src="<?php echo $base;?>img/library-page/duediligence_icon.png"> DUE DILIGENCE<i class="pull-right icon-cancel-2 icon-top-close" style="margin-right:10px;" data-dismiss="modal"></i></h3>
                                    </div>
                                    <div class="modal-body">
										<div class="row-fluid">
											<?php 
											// Due Diligence library description from the Library Table //
												if( isset($related_duediligence) && sizeof($related_duediligence) ) {
												foreach( $related_duediligence AS $id_duediligence ) {
													$order_by = " ORDER BY st_regulation_number ASC, CAST(SUBSTRING(st_section,LOCATE(' ',st_section)+1) AS SIGNED), SUBSTRING(st_section,-1), CAST(SUBSTRING(st_subsection,LOCATE(' ',st_subsection)+1) AS SIGNED), SUBSTRING(st_subsection,-1), st_item, st_subitem";
													$rows_due_regulations = $this->users->getMetaDataList('library_regulation', 'in_status=1 AND in_library_id="'.$id_duediligence.'"', $order_by, 'in_regulation_content_id, st_regulation_number, st_section, st_subsection, st_item, st_subitem');
													$arr_duereg = array();
													if( sizeof($rows_due_regulations) && $rows_due_regulations[0] ) {
													  foreach( $rows_due_regulations AS $key_due_regulation => $val_duereg ) {
														$regno	 	= isset($val_duereg['st_regulation_number']) ? $val_duereg['st_regulation_number'] : '';
														$section 	= isset($val_duereg['st_section']) ? $val_duereg['st_section'] : '';
														$subsection = isset($val_duereg['st_subsection']) ? $val_duereg['st_subsection'] : '';
														$item 		= isset($val_duereg['st_item']) ? $val_duereg['st_item'] : '';
														$subitem 	= isset($val_duereg['st_subitem']) ? $val_duereg['st_subitem'] : '';
														$reg_content_id	= isset($val_duereg['in_regulation_content_id'])?$val_duereg['in_regulation_content_id']:'';
														
														if( $section ) {
															$arr_duereg['regulation'][$regno][$section][$subsection][$item]['subitem'][] = $subitem;
															$arr_duereg['regulation'][$regno][$section][$subsection]['content_id'] = $reg_content_id;

															$where_regcontents = 'st_regulation_number="'.$regno.'"';
															($section) ? $where_regcontents .= ' AND st_section="'.$section.'"' : '';
															($subsection) ? $where_regcontents .= ' AND st_subsection="'.$subsection.'"' : '';
															($item) ? $where_regcontents .= ' AND st_item="'.$item.'"' : '';
															($subitem) ? $where_regcontents .= ' AND st_subitem="'.$subitem.'"' : '';

															$rows_regcontents = $this->users->getMetaDataList('regulation_sections', $where_regcontents, '', 'st_content');

															$reg_contents 	= isset($rows_regcontents[0]['st_content']) ? $rows_regcontents[0]['st_content'] : '';
															$arr_duereg['regulation'][$regno][$section][$subsection][$item]['contents'][] = $reg_contents;
														}
													  }
													}
													$this->session->set_userdata('arr_duereg', $arr_duereg);
													
													if( isset($arr_duereg['regulation']) && is_array($arr_duereg['regulation']) ) {
														$cnt_subsection=0;
														foreach ( $arr_duereg['regulation'] AS $key_regno => $val_regno){
															$reg_data = $this->regulation->getRegulationTitleFromContentId($key_regno,'');
															$regulation_title 	= isset($reg_data['regulation_title'])?$reg_data['regulation_title']:'';
															echo "<br><p><b> O. Reg ".$key_regno." - ".$regulation_title."</b></p>";
															echo "<ul>";

															foreach( $val_regno AS $key_section => $val_section ) {
																foreach( $val_section AS $key_subsection => $val_subsection ) {
																	if( isset($key_section) ) {
																	 $reg_content_id = $val_subsection['content_id'];
																	 $reg_data = $this->regulation->getRegulationTitleFromContentId($key_regno,$reg_content_id);
																	 $regulation_part 	= isset($reg_data['regulation_part'])?$reg_data['regulation_part']:'';
																	 $regulation_subpart = isset($reg_data['regulation_subpart'])?$reg_data['regulation_subpart']:'';

																	 $section 	= ($key_section) ? "Sec. ".trim($key_section) : '';
																	 $subsection = ($key_subsection) ? "(".trim($key_subsection).")" : '';
																	 $cnt_subsection++;
																	}
																	?>
																	<li class="padt10">
																		<a href='#modalRegulationContents<?php echo $cnt_subsection;?>' class="s1content_link" data-toggle="modal">
																			<?php echo $section;?><?php echo $subsection." - ".$regulation_part." ".$regulation_subpart ;?></a>
																	</li>
																	<?php 
																}
															}
															echo "</ul>";
														}
													}

													// Due Diligence Description //
													//REMOVED THIS VIEW AS PER PHILL REQUESTS ON NOV-19-2015 ITEM 231 TASKSHEET 2015 //
														//$where				= "library_id='".$id_duediligence."' AND status=1";
														//$rows_duediligence	= $this->users->getMetaDataList( "library", $where, '', 'library_id, title' );
														//$duediligence_id	= (isset($rows_duediligence[0]['library_id']) && $rows_duediligence[0]['library_id']) ? $rows_duediligence[0]['library_id'] : '';
														//$desc_duediligence  = $this->users->getMetaDataList( "library_paragraph", 'library_id="'.$duediligence_id.'"', '', 'paragraph_description' );
														//$desc_duediligence 	= isset($desc_duediligence[0]['paragraph_description']) ? $desc_duediligence[0]['paragraph_description'] : '';?>
														<!--span><?php echo "<br><h4>Description: </h4>".$desc_duediligence;?></span-->
													<?php 
												}
												}?>
										</div>
									</div>
									<div class="modal-footer"><button class="btn" data-dismiss="modal">Close</button></div>
								</div>
								<!--END modal DUE DILIGENCE page-->
							
								<!--BEGIN modal DUE DILIGENCE/REGULATION page-->
								<?php 
								$arr_duereg = $this->session->userdata('arr_duereg');
								// common::pr($arr_duereg);
								$key_regno = $val_regno = $key_section = $val_section = $key_subsection = $val_subsection = '';
								if( isset($arr_duereg['regulation']) && is_array($arr_duereg['regulation']) ) {
									$cnt_regcontents=0;
									foreach ( $arr_duereg['regulation'] AS $key_regno => $val_regno){
										$reg_data = $this->regulation->getRegulationTitleFromContentId($key_regno);
										$parent_reg_title= isset($reg_data['parent_regulation_title']) ? $reg_data['parent_regulation_title'] : '';
										$regulation_title		= isset($reg_data['regulation_title']) ? $reg_data['regulation_title'] : '';
										foreach( $val_regno AS $key_section => $val_section ) {
											foreach( $val_section AS $key_subsection => $val_subsection ) {
												if( isset($key_section) ) {
													$reg_content_id = $val_subsection['content_id'];
													$reg_data 		= $this->regulation->getRegulationTitleFromContentId($key_regno,$reg_content_id);

													$regulation_part 	= isset($reg_data['regulation_part'])?$reg_data['regulation_part']:'';
													$regulation_subpart = isset($reg_data['regulation_subpart'])?$reg_data['regulation_subpart']:'';

													$section 	= ($key_section) ? "Sec. ".$key_section : '';
													$subsection = ($key_subsection) ? "(".$key_subsection.")" : '';
													$cnt_regcontents++;
													?>
													<div id="modalRegulationContents<?php echo $cnt_regcontents;?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
														<div class="modal-header bg-red">
															<h3 id="myModalLabel">
																<img width="30px" src="<?php echo $base;?>img/library-page/duediligence_icon.png">O. Reg <?php echo $key_regno." - ".$regulation_title." - ".$regulation_part." - ".$regulation_subpart;?>
																<i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal"></i>
															</h3>
														</div>
														<div class="modal-body">
															<?php 
															echo "<br><p><b>".$parent_reg_title."<br>".$key_regno."</b></p>";
															foreach( $val_subsection AS $key_item => $val_item ) {
																$item = ($key_item) ? "(".$key_item.")" : '';
																if( isset($val_item['subitem']) ) {
																foreach( $val_item['subitem'] AS $key_subitem => $val_subitem ) {
																	$subitem 		= ($val_subitem) ? "(".$val_subitem.")" : '';
																	$due_regcontents= $val_item['contents'][$key_subitem];?>
																	
																	<p><b><?php echo $section.$subsection.$item.$subitem;?></b></p>
																	<p><?php echo $due_regcontents;?></p>
																	<?php 
																}
																}
															}
															?>
														</div>
														<div class="modal-footer"><button class="btn" data-dismiss="modal">Close</button></div>
													</div>
													<?php 
												}
											}
										}
									}
									$this->session->unset_userdata('arr_duereg');
								}?>
								<!--END modal DUE DILIGENCE/REGULATION page-->

								
								<!--begin small tile-->  
								<a class="tile  bg-black" id="id_s1lib_procedure_model" href='#proceduresModal' data-toggle='modal'>
									<div class="tile-content icon" ><span class="icon"><img src="<?php echo $base;?>img/library-page/procedures_icon.png"></span></div>
									<div class="brand"><span class="label fg-white"><small>PROCEDURES</small></span></div>
								</a>
								<!--end small tile-->
								
                                <!--start modal PROCEDURES page-->
                                <div id="proceduresModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-header bg-red">
                                        <h3 id="myModalLabel"><img width="35px" src="<?php echo $base;?>img/library/procedures_blank.png"> PROCEDURES<i class="pull-right icon-cancel-2 icon-top-close" style="margin-right:10px;" data-dismiss="modal"></i></h3>
                                    </div>
                                    <div class="modal-body">
									<?php
									if( "3" == $library_type_id ) {?>
										<div class="padding5 place-right" id="google_translate_element">
											<?php echo $this->common->callLanguageSelectBox("cmb_s1lib_model_procedures", $to_lang);?>
										</div>
										<?php
									}?>
                                    <div class="row-fluid">
									<h4 class="s1content_title">&nbsp;</h4>
									<?php 
									$desc_procedures_model = '<p class="s1content_body_section">';
									$desc_procedures_model .= 'Procedures relating to Health & Safety are step by step sequences of activities or course of action that must be followed in that order to complete a task.  Examples include the instructions on how to safety operate equipment, guard rail installation, fire extinguishing equipment, and safe use of chemicals.';
									$desc_procedures_model .= '</p>';
									$desc_procedures_model .= '<p class="s1content_body_section">';
									$desc_procedures_model .= 'Workers must be trained on procedures to ensure good understanding of the steps and actions they must follow to minimize the risk of injury or death to themselves and their co-workers.';
									$desc_procedures_model .= '</p>';
									$desc_procedures_model .= '<p class="s1content_body_section">';
									$desc_procedures_model .= 'Procedures are also known as Safe Working Procedures.';
									$desc_procedures_model .= '</p>';
									?>
									<div class="procedures_modal"><?php echo googletranslatetool::translate($desc_procedures_model, $lang, $to_lang);?></div>
									</div>
									<?php if( "3" == $library_type_id ) {
										$file_name_proc = "img/s1library_images/hazard/procedure_hazard_id".$library_id.".png";
										if (file_exists($file_name_proc)) {?>
										<img src="<?php echo $base;?>img/s1library_images/hazard/<?php echo "procedure_hazard_id".$library_id.".png";?>">
										<?php 
										} else {
										echo "<img src='".$base."img/s1library_images/procedure_standard.png' >";
										}
									}
									else{?>
										<img src="<?php echo $base;?>img/s1library_images/procedure_standard.png">
										<?php 
									}
									
									if( "3" == $library_type_id ) {?>
									<script type="text/javascript">
										$(document).ready (function(){
											$('#id_s1lib_procedure_model').click(function(){
											$from_lang 	= '<?php echo $lang;?>';
											$to_lang 	= $("#cmb_s1lib_lang").val();
											$desc_procedures_model = '<?php echo $desc_procedures_model;?>';
											if( $to_lang ) {
												$.post(js_base_path+'ajax/getTranslatedText', {'translateSection':"s1_library", 'isPlainText':'1', 'paragraphDescription':$desc_procedures_model, 'fromLang':$from_lang, 'toLang':$to_lang}, 
												function(data){ 
													$("div.procedures_modal").html(data); 
													$("#cmb_s1lib_model_procedures").val($to_lang);
												});
											}
											});
										});
										$('#cmb_s1lib_model_procedures').change(function(){
											$from_lang 	= '<?php echo $lang;?>';
											$to_lang 	= $(this).val();
											$desc_procedures_model = '<?php echo $desc_procedures_model;?>';
											if( $to_lang ) {
												$.post(js_base_path+'ajax/getTranslatedText', {'translateSection':"s1_library", 'isPlainText':'1', 'paragraphDescription':$desc_procedures_model, 'fromLang':$from_lang, 'toLang':$to_lang}, 
												function(data){ $("div.procedures_modal").html(data); });
											}
											else {
												alert("Please select language");
												return false;
											}
										});
									</script>
									<?php
									}
										$related_procedures = $this->libraries->getRelatedLibraryIdsOfLibrary($library_id, 4);
										$cnt_proc_pending = 0;
										
										// Check all the procedures are purchased or not.
											foreach( $related_procedures AS $id_proc ) {
												$is_procedure_bought = $this->libraries->checkLibraryBought($id_proc, 'Procedures');
												('0' == $is_procedure_bought) ? $cnt_proc_pending=1 : "";
											}
										echo (sizeof($related_procedures) > '0' ) ? "<h4 class='s1content_title'>Hazard Related Procedures </h4><hr class='s1content_line' />" : "";
										echo (sizeof($related_procedures) && $cnt_proc_pending=='1' ) ? "<p class='s1content_body_section'><strong>S1 Message - </strong>Some hazard related procedures are listed here, you can find more procedures in the S1 Library.</p>" : "";
										?>
										
										<div class="row-fluid">
											<?php 
											// BELOW LINE REQUESTED BY PHILL TO SHOW ONLY A MAX OF FOUR ON SEP-10-2015
											$related_procedures = array_splice($related_procedures,0,4);
											foreach( $related_procedures AS $id_proc ) {
												$where	= "id='".$id_proc."' AND status=1 AND (dt_date_end>".date('Y-m-d')." OR dt_date_end='0000-00-00' OR dt_date_end IS NULL)";
												$rows_procedures= $this->users->getMetaDataList( "procedures", $where, '', 'id, st_procedure_name AS title' );
												$proc_name		= (isset($rows_procedures[0]['title']) && $rows_procedures[0]['title']) ? $rows_procedures[0]['title'] : '';
												$proc_id		= $data['item_id'] = (isset($rows_procedures[0]['id']) && $rows_procedures[0]['id']) ? $rows_procedures[0]['id'] : '';

												$procedures_price	= $this->users->getMetaDataList('price_settings', 'price_settingsname="procedures"', '', "in_price, in_points, in_credits");
												$price 			= (isset($procedures_price[0]['in_price'])&&$procedures_price[0]['in_price']) ? $procedures_price[0]['in_price'] : '0';
												$points 		= $data['item_points'] = (isset($procedures_price[0]['in_points'])&&$procedures_price[0]['in_points']) ? $procedures_price[0]['in_points'] : '0';
												$credits 		= $data['item_credits'] = (isset($procedures_price[0]['in_credits'])&&$procedures_price[0]['in_credits']) ? $procedures_price[0]['in_credits'] : '0';
												
												$is_procedure_bought = $this->libraries->checkLibraryBought($proc_id, 's1procedures');
												
												//$cart_href_string 	= 'id="'.$proc_id.'" description="" library_type="s1procedures" libtitle="'.$proc_name.'" price="'.$price.'" points="'.$points.'" credits="'.$credits.'"';
												$icon_credits = '<i><img src="'.$base.'img/icons_s1credit.png" style="height:16px;" /></i>&nbsp;'.$credits;
												//  ITEMS REMOVED BY PHILL REQUEST ON SEP-10-2015, kept in comments due to future changes
												//if( 1 == $is_procedure_bought ) {
													//$redirect_page = $base."admin/my_created_procedures_metro?id=".$proc_id."&section=desc&type=s1procedures";
													$class_procedure = "";
													//$icon_credits = "";
												//}
												//else {
													//$class_procedure =  "half-opacity add_to_cart";
												//}?>
												<a href="#modal_shopping_items<?php echo $proc_id;?>"   class="tile half-library fg-white ttrain <?php echo $class_procedure;?> description"   data-toggle="modal" >
													<div class="half bg-darker">
														<img src="<?php echo $base.$this->path_img_library."procedures.png";?>" />
														<span class="fg-white" style="position:absolute;top:0px;"><small><?php echo $this->common->subString($proc_name,18);?></small></span>
													</div>
													<div class="brand">
														<span class="label fg-white text-center">&nbsp;<small><?php echo $icon_credits;?>&nbsp;<i class=""><img src="<?php echo $base;?>img/icons_xp.png" style="height:16px;" /></i>&nbsp;<?php echo $points;?></small></span>
													</div>
												</a>
												<?php 
												//  ITEMS REMOVED BY PHILL REQUEST ON SEP-10-2015, kept in comments due to future changes
												//if( trim($class_procedure) ) 
												//{?>
													<!--div id="modal_shopping_items<?php echo $proc_id;?>" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"></div-->
													<?php 
													//$this->load->view('modal_shopping_options', $data);
												//}
											}?>
										</div>
                                    </div>
                                    <div class="modal-footer"><button class="btn btn-close" data-dismiss="modal">Close</button></div>
                                </div>
								<!--end modal PROCEDURES page--> 

                                <!--begin INJURIES -->
                                <?php 
                                	$related_injuries = $this->libraries->getRelatedLibraryIdsOfLibrary($library_id, 8);
                                	$injuries_url = '';
									if(count($related_injuries)>0) {
										$injuries_url = "href='#modal_injuries' id='id_injuries_model' data-toggle='modal' ";?>
                                        <script type="text/javascript">$(document).ready (function(){ $('#id_injuries_model').removeClass('half-opacity'); });</script>
								<?php }; ?>
									<a <?php echo $injuries_url;?> class="half-opacity tile bg-black">
										<div class="tile-content icon"><span class="icon"><img src="<?php echo $base;?>img/library-page/injuries_icon.png"></span></div>
										<div class="brand"><span class="label fg-white"><small>INJURIES</small></span></div>
									</a>
								<!--end INJURIES-->
                                <!-----BEGIN MODAL INJURIES------>
                                <div id="modal_injuries" class=" modal hide fade " tabindex="-1"  role="dialog" aria-labelledby="myModalLabel" >
									<div class="modal-header bg-red">
										<h3 id="myModalLabel"><img width="30px" src="<?php echo $base;?>img/library-page/injuries_icon.png"> INJURIES<i class="pull-right icon-cancel-2 icon-top-close" style="margin-right:10px;" data-dismiss="modal" ></i></h3>
									</div>
									<div class="modal-body">
										<!--?php $related_injuries = $this->libraries->getRelatedLibraryIdsOfLibrary($library_id, 8);?-->
										<div class="row-fluid">
										<?php $library_type_name = ('3' == $library_type_id)?'Hazard':'Training';?>
										<h4 class='s1content_title'><?php echo $library_type_name;?> Related Injuries </h4><hr class='s1content_line' />
										<p class="s1content_body_section">Listed here are injuries that are commonly associated with this hazard. Click on one of the injuries below to get a full description. </p>
											<?php 
											//echo count($related_injuries);//common::pr($related_injuries);
											foreach( $related_injuries AS $id_injuries ) {
												$where			= "library_id='".$id_injuries."' AND status=1";
												$rows_injuries	= $this->users->getMetaDataList( "library", $where, '', 'library_id, title' );
												$injury_name	= (isset($rows_injuries[0]['title']) && $rows_injuries[0]['title']) ? $rows_injuries[0]['title'] : '';
												$injury_id		= (isset($rows_injuries[0]['library_id']) && $rows_injuries[0]['library_id']) ? $rows_injuries[0]['library_id'] : '';
												$href = $base."admin/library_page_contents?libtype=8&libid=".$injury_id."&section=desc";?>
												<a href="#modal_injuries<?php echo $injury_id;?>" id="<?php echo $injury_id;?>" class="tile half-library bg-red fg-white ttrain" style="padding-left:5px;"  onclick="changeInjDescription('<?php echo $injury_id;?>', '<?php echo $this->session->userdata('s1lib_tolang');?>')" data-toggle='modal'>
													<span class=""><strong><?php echo substr($injury_name, 0, 42);?></strong></span>
												</a>
												<?php 
											}?>
										</div>
									</div>
									<div class="modal-footer"><button class="btn btn-close" data-dismiss="modal">Close</button></div>
								</div>
								<script type="text/javascript">
									$('.modal-body').css({ 'max-height':'80vh','overflow-y':'auto','overflow-x':'hidden' });
									$('#modal_injuries').css({ 'width':'100%',  'max-width':'800px' });
								</script>

								<?php 
								// common::pr( $related_injuries );
								foreach( $related_injuries AS $id_injuries1 ) {
									$desc_injuries_model = '';
									$where			= "library_id='".$id_injuries1."' AND status=1";
									$rows_modelinjuries	= $this->users->getMetaDataList( "library", $where, '', 'library_id, title' );
									$injury_name	= (isset($rows_modelinjuries[0]['title']) && $rows_modelinjuries[0]['title']) ? $rows_modelinjuries[0]['title'] : '';
									$injury_modelid	= (isset($rows_modelinjuries[0]['library_id']) && $rows_modelinjuries[0]['library_id']) ? $rows_modelinjuries[0]['library_id'] : '';
									?>
									<div id="modal_injuries<?php echo $injury_modelid;?>" class="each_modal_injury modal hide fade " tabindex="-1"  role="dialog" aria-labelledby="myModalLabel">
										<div class="modal-header bg-red">
											<h3 id="myModalLabel"><img width="30px" src="<?php echo $base;?>img/library-page/injuries_icon.png"> <?php echo $injury_name;?><i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal" ></i></h3>
										</div>
										<div class="modal-body" >
											<div class="row-fluid">
											<!-- Start - Injury Images -->
											<?php 
											$images = $this->users->getMetaDataList('library_images', 'library_id="'.$injury_modelid.'" AND status=1', '', 'image' );
											if( sizeof($images)>0 && isset($images[0]['image'])) {
												echo "<div class='flexslider' >";
												echo "<ul class='slides' >";
												foreach( $images AS $val_injury_images ) {
													$inj_image = isset($val_injury_images['image']) ? $val_injury_images['image'] : '';
													if( $inj_image ) {?>
														<li><img src="<?php echo $base.$this->path_upload_paragraph_images.$inj_image;?>"  /></li>
														<?php 
													}
												}
												echo "</ul>";
												echo "</div>";
											}
											else {
												echo "<h5>No Images available</h5>";
											}?>
											<!-- End - Injury Images -->
											
											
											<div class="profile-user<?php echo $injury_modelid;?>">
											
											<?php 
											if( sizeof($related_injuries) > 0 && "3" == $library_type_id ) { ?>
												<div id="google_translate_element<?php echo $injury_modelid;?>">
												<select id="cmb_s1lib_injuries_model<?php echo $injury_modelid;?>" onchange="changeInjDescription('<?php echo $injury_modelid;?>', this.value );">
													<option value="">-select language-</option>
													<option value="en" <?php echo ($to_lang=='en') ? 'selected="selected"' : '';?>>English</option>
													<option value="pt" <?php echo ($to_lang=='pt') ? 'selected="selected"' : '';?>>Portuguese</option>
													<option value="es" <?php echo ($to_lang=='es') ? 'selected="selected"' : '';?>>Spanish</option>
													<option value="it" <?php echo ($to_lang=='it') ? 'selected="selected"' : '';?>>Italian</option>
													<option value="pl" <?php echo ($to_lang=='pl') ? 'selected="selected"' : '';?>>Polish</option>
													<option value="el" <?php echo ($to_lang=='el') ? 'selected="selected"' : '';?>>Greek</option>
													<option value="zh-cn" <?php echo ($to_lang=='zh-cn') ? 'selected="selected"' : '';?>>Chinese</option>
													<option value="ar" <?php echo ($to_lang=='ar') ? 'selected="selected"' : '';?>>Arabic</option>
													<option value="de" <?php echo ($to_lang=='de') ? 'selected="selected"' : '';?>>German</option>
													<option value="ru" <?php echo ($to_lang=='ru') ? 'selected="selected"' : '';?>>Russian</option>
													<option value="tgl" <?php echo ($to_lang=='tgl') ? 'selected="selected"' : '';?>>Tagalog</option>
												</select>												
												</div>
												<div>&nbsp;</div>
												<?php
											}?>
											
											<div class="tab-control no-margin" data-effect="fade" data-role="tab-control">
											<ul class="tabs">
												<li class="active user_tab">
													<a href="#description<?php echo $injury_modelid;?>"><i class="icon-newspaper on-left-more"></i>Description</a>
												</li>
												<li class="user_tab">
													<a href="#symptom<?php echo $injury_modelid;?>"><i class="icon-thermometer on-left-more"></i>Symptoms</a>
												</li>
												<li class="user_tab">
													<a href="#treatment<?php echo $injury_modelid;?>"><i class="icon-coffee on-left-more"></i>Recovery</a>
												</li>
												<li class="user_tab">
													<a href="#recovery<?php echo $injury_modelid;?>"><i class="icon-stats-up on-left-more"></i>Stats</a>
												</li>
											</ul>
										
											<div class="frames">
												<?php 
												$rows_injdesc	= $this->users->getMetaDataListMarcio($injury_modelid);

												$injury_lib_page1 	= (isset($rows_injdesc[0]['paragraph_description'])&&$rows_injdesc[0]['paragraph_description']) ? $rows_injdesc[0]['paragraph_description'] : 'No data available';
												$injury_lib_page1 = str_replace(array("\r\n","\r","\n","<hr />"), "", $injury_lib_page1);
												// common::pr($injury_lib_page1);
												
												$injury_lib_page2 	= (isset($rows_injdesc[1]['paragraph_description'])&&$rows_injdesc[1]['paragraph_description']) ? $rows_injdesc[1]['paragraph_description'] : 'No data available';
												$injury_lib_page2 = str_replace(array("\r\n","\r","\n","<hr />"), "", $injury_lib_page2);
												// common::pr($injury_lib_page2);

												$injury_lib_page3 	= (isset($rows_injdesc[2]['paragraph_description'])&&$rows_injdesc[2][
												'paragraph_description']) ? $rows_injdesc[2]['paragraph_description'] : 'No data available';
												$injury_lib_page3 = str_replace(array("\r\n","\r","\n","<hr />"), "", $injury_lib_page3);
												// common::pr($injury_lib_page3);
												
												$injury_lib_page4 	= (isset($rows_injdesc[3]['paragraph_description'])&&$rows_injdesc[3]['paragraph_description'])?$rows_injdesc[3]['paragraph_description']:'No data available';
												$injury_lib_page4 = str_replace(array("\r\n","\r","\n","<hr />"), "", $injury_lib_page4);
												// common::pr($injury_lib_page4);
												?>
												<div class="frame text-left" style="display:none;" id="description_en<?php echo $injury_modelid;?>">
												<p class="item-title-secondary fg-black"><?php echo $injury_lib_page1;?></p>
												</div>
												<?php 
												$trans1 = '<div class="frame text-left" id="description'.$injury_modelid.'"><p class="item-title-secondary fg-black">'.$injury_lib_page1.'</p></div>';
												echo googletranslatetool::translate($trans1, $lang, $to_lang);
												?>
												
												<div class="frame text-left" style="display:none;" id="symptom_en<?php echo $injury_modelid;?>">
												<p class="item-title-secondary fg-black"><?php echo $injury_lib_page2;?></p>
												</div>
												<?php 
												echo $trans2 = '<div class="frame text-left no-margin" id="symptom'.$injury_modelid.'"><p class="item-title-secondary fg-black">'.$injury_lib_page2.'</p></div>';
												// echo googletranslatetool::translate($trans2, $lang, $to_lang);
												?>

												<div class="frame text-left" style="display:none;" id="treatment_en<?php echo $injury_modelid;?>">
												<p class="item-title-secondary fg-black"><?php echo $injury_lib_page3;?></p>
												</div>
												<?php 
												$trans3 = '<div class="frame text-left no-margin" id="treatment'.$injury_modelid.'"><p class="item-title-secondary fg-black">'.$injury_lib_page3.'</p></div>';
												echo googletranslatetool::translate($trans3, $lang, $to_lang);
												?>
												
												<div class="frame text-left" style="display:none;" id="recovery_en<?php echo $injury_modelid;?>">
												<p class="item-title-secondary fg-black"><?php echo $injury_lib_page4;?></p>
												</div>
												<?php 
												$trans4 = '<div class="frame text-left no-margin" id="recovery'.$injury_modelid.'"><p class="item-title-secondary fg-black">'.$injury_lib_page4.'</p></div>';
												echo googletranslatetool::translate($trans4, $lang, $to_lang);
												?>
											</div>
											<div>&nbsp;</div>
											
											<?php 
											if( "3" == $library_type_id ) {?>
											<script type="text/javascript">
												$(document).ready (function(){
													$trans2 	= $("#symptom_en<?php echo $injury_modelid;?>").html();
													$.post(js_base_path+'ajax/getTranslatedText', {'translateSection':"s1_library", 'isPlainText':'1', 'paragraphDescription':$trans2, 'fromLang':'<?php echo $lang;?>', 'toLang':'<?php echo $to_lang;?>'}, function(data){
													 $("#symptom<?php echo $injury_modelid;?>").html(data);
													});
												});
												
												function changeInjDescription($injury_id, $toVal)
												{
													$from_lang 	= '<?php echo $lang;?>';
													$to_lang 	= $("#cmb_s1lib_injuries_model"+$injury_id).val();
													
													$trans1 	= $("#description_en"+$injury_id).html();
													if( $to_lang ) {
												$.post(js_base_path+'ajax/getTranslatedText', {'translateSection':"s1_library", 'isPlainText':'1', 'paragraphDescription':$trans1, 'fromLang':$from_lang, 'toLang':$to_lang}, function(data){
													$("#description"+$injury_id).html(data);
												});
													
												$trans2 	= $("#symptom_en"+$injury_id).html();
												$.post(js_base_path+'ajax/getTranslatedText', {'translateSection':"s1_library", 'isPlainText':'1', 'paragraphDescription':$trans2, 'fromLang':$from_lang, 'toLang':$to_lang}, function(data){
													 $("#symptom"+$injury_id).html(data);
												});
												
												$trans3 	= $("#treatment_en"+$injury_id).html();
												$.post(js_base_path+'ajax/getTranslatedText', {'translateSection':"s1_library", 'isPlainText':'1', 'paragraphDescription':$trans3, 'fromLang':$from_lang, 'toLang':$to_lang}, function(data){
													$("#treatment"+$injury_id).html(data);
												});
												
												$trans4 	= $("#recovery_en"+$injury_id).html();
												$.post(js_base_path+'ajax/getTranslatedText', {'translateSection':"s1_library", 'isPlainText':'1', 'paragraphDescription':$trans4, 'fromLang':$from_lang, 'toLang':$to_lang}, function(data){
													$("#recovery"+$injury_id).html(data);
												});
													}
													else {
														alert("Please select language");
														return false;
													}
												}
											</script>
											<?php 
											}?>
											
											</div>
											</div>
											</div>
											
										</div>
										<div class="modal-footer"><button class="btn" data-dismiss="modal">Close</button></div>
									</div>
									<?php 
								}?>
								<script type="text/javascript">
									$('.modal-body').css({ 'max-height':'80vh','overflow-y':'auto','overflow-x':'hidden' });
									$('.each_modal_injury').css({ 'width':'100%',  'max-width':'800px' });
								</script>
								<!-----END MODAL INJURIES------>

								<?php 
								$media_url = '';
								$cls_media_tile = "half-opacity";
								if( $library_type_id != 3 ) {?>
									<a class="tile bg-black <?php echo $cls_media_tile;?>" <?php echo $media_url;?> id="libmedia">
										<div class="tile-content icon"><span class="icon" ><img src="<?php echo $base;?>img/library-page/media_icon.png"></span></div>
										<div class="brand"><span class="label fg-white"><small>MEDIA</small></span></div>
									</a>
									<?php 
								}
								else { // For Library type Hazards only //
									$images = $this->libraries->getImagesByParagraphPageID( '', '', $library_id );
									// echo "<br>MEDIA";common::pr($images);
									$sizeof_images = sizeof($images);
									$videos = $this->libraries->getVideosByParagraphPageID( '', '', $library_id );
									$sizeof_videos = sizeof($videos);
									if( ($sizeof_images>0 && isset($images[0]['image'])) || ($sizeof_videos>0 && isset($videos[0]['video'])) ) {
										$cls_media_tile = '';
										$media_url = 'href="#mymediaModal" data-toggle="modal"';
									}?>
									<a class="tile bg-black <?php echo $cls_media_tile;?>" <?php echo $media_url;?> id="libmedia">
										<div class="tile-content icon"><span class="icon" ><img src="<?php echo $base;?>img/library-page/media_icon.png"></span></div>
										<div class="brand"><span class="label fg-white"><small>MEDIA</small></span></div>
									</a>
									
									<!--start MEDIA MODEL page-->
									<div id="mymediaModal" class="modal hide fade modal_images" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
										<div class="modal-header bg-red">
										<h3 id="myModalLabel">
										<span class="icon"><img src="<?php echo $base;?>img/library-page/media_icon.png" width="30" height="30"></span> MEDIA<i class="pull-right icon-cancel-2 icon-top-close" style="margin-right:10px;" data-dismiss="modal"></i></h3>
										</div>
										<div class="modal-body modal-body-image" >
											<div class="padding5" id="google_translate_element"><?php echo $this->common->callLanguageSelectBox("cmb_s1lib_lang_imagevideo", $to_lang);?></div>
											<!--Begin Images-->
											<?php 
											if( $sizeof_images > 0 ) {?>											
												<div class="flexslider">
												<p class="s1content_subtitle padding5">Images</p>
													<ul class="slides" style="padding-left:0px;margin-left:0px;">
													<?php 
													for( $cntimg=0; $cntimg<$sizeof_images; $cntimg++ ) {
														$image_name 		= $images[$cntimg]['image'];
														$image_description 	= ($images[$cntimg]['image_description']) ? ($images[$cntimg]['image_description']) : 'Test Image Description';
														if( file_exists(FCPATH.$this->path_upload_paragraph_images.$image_name) ) {?>
															<li>
																<div class="img_library_page"><img  src="<?php echo $base.$this->path_upload_paragraph_images.$image_name;?>" /></div>
																<div class="cls-libimage-desc<?php echo $cntimg;?>" id="imgdesc_<?php echo $cntimg;?>">
																<?php 
																echo "&nbsp;&nbsp;".googletranslatetool::translate($image_description, $this->session->userdata('s1lib_fromlang'), $this->session->userdata('s1lib_tolang'));
																?>
																</div>
															</li>
															<?php 
														}
													}?>
													</ul>
												</div>
												<?php
											}
											?>
											<!--end  images-->

											<?php
											if( $sizeof_videos > 0 ) {?>
												<div class="flexslider">
												<p class="s1content_subtitle padding5">Videos</p>
													<ul class="slides" style="padding-left:0px;margin-left:0px;">
													<?php
													for( $cntvideo=0; $cntvideo<$sizeof_videos; $cntvideo++ ) {//common::pr($videos);
														$video_url 			= $videos[$cntvideo]['video'];
														//$expl_video_url 	= explode("v=", $video_url);
														//$video_url 			= $expl_video_url[1];
														$video_description 	= ($videos[$cntvideo]['video_description']) ? ($videos[$cntvideo]['video_description']) : "Test Video Description";?>
														<li>
															<div>
															<iframe frameborder="0" allowfullscreen="0" src="<?php echo $video_url;?>?wmode=transparent&showinfo=0&rel=0"></iframe>
															</div>
															<div class="cls-libvideo-desc<?php echo $cntvideo;?>" id="viddesc_<?php echo $cntvideo;?>">
															<?php 
															echo "&nbsp;&nbsp;".googletranslatetool::translate($video_description, $this->session->userdata('s1lib_fromlang'), $this->session->userdata('s1lib_tolang'));
															?>
															</div>
														</li>
														<?php 
													}?>
													</ul>
												</div>
												<?php
											}
											else {
												echo "<h4>No video available</h4>";
											}
											?>
										</div>
										<div class="modal-footer"><button class="btn btn-close" data-dismiss="modal">Close</button></div>
									</div>
									<script type="text/javascript">
										$('.img_library_page img').css({ 'width':'100%',  'display':'block', 'height':'100%', 'max-width':'720px'});
										$('.modal-body-image').css({ 'margin-left':'0px',  'padding':'0px', 'max-height':'80vh','overflow-y':'auto','overflow-x':'hidden', 'max-width':'720px',  'width':'100%' });
										$('.modal-header').css({'border':'0px'});
										$('.modal-footer').css({'border-radius':'0px'});
										$('.modal_images').css({ 'max-width':'720px','width':'100%','top':'1%' });
									</script>
									<!--End MEDIA MODEL page-->
									
									<script type="text/javascript">
									$('#cmb_s1lib_lang_imagevideo').change(function() {
										var $from_lang 	= '<?php echo $lang;?>';
										var $to_lang 	= $(this).val();
										<?php 
										for( $cntimg=0; $cntimg<$sizeof_images; $cntimg++ ) {
											$image_description = base64_encode($images[$cntimg]['image_description']);?>
											var $image_description 	= '<?php echo $image_description;?>';
											
											if( $to_lang && $image_description ) {
												$.post(js_base_path+'ajax/getTranslatedImageDesc', {'translateSection':"s1_library", 'imageDescription':$image_description, 'fromLang':$from_lang, 'toLang':$to_lang}, 
												function(data){ 
													$(".cls-libimage-desc<?php echo $cntimg;?>").html(data); 
												});
											}
											<?php 
										}
										for( $cntvideo=0; $cntvideo<$sizeof_videos; $cntvideo++ ) {
											$video_description = base64_encode($videos[$cntvideo]['video_description']);?>
											var $video_description 	= '<?php echo $video_description;?>';
											
											if( $to_lang && $video_description ) {
												$.post(js_base_path+'ajax/getTranslatedVideoDesc', {'translateSection':"s1_library", 'videoDescription':$video_description, 'fromLang':$from_lang, 'toLang':$to_lang}, 
												function(data){ 
													$(".cls-libvideo-desc<?php echo $cntvideo;?>").html(data); 
												});
											}
											<?php 
										}?>
									});
									</script>
									<?php
								}?>
													
								<!--begin small tile-->  
									<a class="tile bg-black half-opacity" <?php echo $quizurl;?> id="test" >
										<div class="tile-content icon"><span class="icon"><img src="<?php echo $base;?>img/library-page/test_icon.png"></span></div>
										<div class="brand"><span class="label fg-white"><small>TEST/SUMMARY</small></span></div>
									</a>   
								<!--end small tile-->  
								<!--begin small tile-->								
								<a href="#modal_glossary" data-toggle='modal' class="tile bg-black">
									<div class="tile-content icon" ><span class="icon"><img src="<?php echo $base;?>img/library-page/glossary_icon.png"></span></div>
									<div class="brand"><span class="label fg-white"><small>GLOSSARY</small></span></div>
								</a>
								<div id="modal_glossary" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									<div class="modal-header bg-red"><h3 id="myModalLabel"><img src="<?php echo $base;?>img/library-page/glossary_icon.png" width="30" height="30"> GLOSSARY<i class="pull-right icon-cancel-2 icon-top-close" style="margin-right:10px;" data-dismiss="modal"></i></h3></div>
									<div class="modal-body">
										<?php $related_glossary = $this->libraries->getRelatedLibraryIdsOfLibrary($library_id, 70);?>
										
										<div class="row-fluid">
											<?php 
											foreach( $related_glossary AS $id_glossary ) {
												$rows_glossary_desc	= $this->users->getMetaDataList( "library_paragraph", 'library_id="'.$id_glossary.'"', '', 'paragraph_description', '');
												$glossary_desc = (isset($rows_glossary_desc[0]['paragraph_description'])&&$rows_glossary_desc[0]['paragraph_description']) ? $rows_glossary_desc[0]['paragraph_description'] : 'No data available';
												echo $glossary_desc;
											}?>
										</div>
									</div>
									<div class="modal-footer"><button class="btn" data-dismiss="modal">Close</button></div>
								</div>
								<!--end small tile-->  
								
								<div class="tile bg-black"><img src="<?php echo $base;?>img/library-page/sponsor.png" /></div>
							</div>
						<!-------END SECOND ROW OF TILES------>				
						<?php 
					}
					else {
						echo "<h4 class='fglightgrey' align='center'>No data available.</h4>";
					} // final if?>
				</div>
			</div>
		</div>
	</div>
<!--END OF CODE FOR METRO STYLE-->
</form>
<?php $this->load->view('footer_admin');?>
<!-- Place in the <head>, after the three links --> 
<script type="text/javascript" charset="utf-8">
	$(".btn-close, .icon-top-close").click(function(){
		window.location.reload(); 
	});
	function checkAnswer(selAnswerId, choice, quesId, pageId)
	{
		if( choice == 1) {
			$("#id_img_wrong_ans_"+quesId).attr('alt', "");			
		}
		else {
			$("#id_img_wrong_ans_"+quesId).attr('alt',"bglightred");			
		}

		$.ajax({
			url: js_base_path+'ajax/ajaxSetQuiz',
			type: 'post', 
			data: {'userAnswer':choice, 'selAnswerId':selAnswerId, 'quesId':quesId, 'pageId':pageId, 'libId':'<?php echo $library_id;?>', 'pn':'<?php echo $current_page;?>'},
			success: function(output) {
				$("#id_page_summary").html(output);
			},
			error: function(errMsg) {
				alert( errMsg.responseText );
				return false;
			}
		});
	}

	$(document).ready(function() {
		$('a.add_to_cart').click(function(e){
			if( confirm("You have to finish payment procedures in order to have it available in your inventory") ) 
			{
				$item_id = $(this).attr('id');
				$.ajax({
					url: '<?php echo $base;?>admin/modal_shopping_items',
					type: 'post', 
					data: {'id':$item_id, 'library_type':$(this).attr('library_type'), 'title':$(this).attr('libtitle'), 'inspection_type':$(this).attr('inspection_type'), 'description':$(this).attr('description'), 'price':$(this).attr('price'), 'points':$(this).attr('points'), 'credits':$(this).attr('credits')},
					success: function(output) {
						$("#modal_shopping_items"+$item_id).html(output);
						// $("#proceduresModal").modal("hide");
					},
					error: function(errMsg) {
						alert( errMsg.responseText );
						return false;
					}
				});
			}
			else 
			{
				return false;
			}
        });
		
		$from_lang 				= '<?php echo $lang;?>';
		$to_lang 				= '<?php echo $to_lang;?>';
		$paragraph_description 	= '<?php echo base64_encode($paragraph_description);?>';
		$.post('<?php echo $base;?>ajax/getTranslatedText', {'translateSection':"s1_library", 'paragraphDescription':$paragraph_description, 'fromLang':$from_lang, 'toLang':$to_lang}, function(data){
			$(".cls-page-libcontents").show();
			$(".cls-page-libcontents").html(data);
			$(".cls-modal-libcontents").html(data);
			$("#img_data_loader").hide();
		});

		$('#cmb_s1lib_lang').change(function(){
			$from_lang 				= '<?php echo $lang;?>';
			$to_lang 				= $(this).val();
			$paragraph_description 	= '<?php echo base64_encode($paragraph_description);?>';

			if( $to_lang ) {
				$("#img_data_loader").show();
				$(".cls-page-libcontents").hide();
				$.post('<?php echo $base;?>ajax/getTranslatedText', {'translateSection':"s1_library", 'paragraphDescription':$paragraph_description, 'fromLang':$from_lang, 'toLang':$to_lang}, function(data){
					$(".cls-page-libcontents").show();
					$(".cls-page-libcontents").html(data);
					$(".cls-modal-libcontents").html(data);
					$("#img_data_loader").hide();
				});
			}
			else {
				alert("Please select language");
				return false;
			}
		});
		});
              
	<!-- Start - JS QUIZ -->
		function calculateQuiz( e )
		{
			var rate = 0;
			$questions = $('.ques').size();			
			$('.my_answer').each(function(){
				if($(this).is(':checked')){
					$my_answer = 1;
				}
				else {
					$my_answer = 0;
				}
				if( $my_answer==$(this).val() && $my_answer != 0 ){
					rate ++;
				}
				//alert( "\n val:"+$(this).val()+"\n my_answer:"+$my_answer );
			})
			$score = (rate/$questions)*100;
			// alert( "\n rate: "+rate+"\n question: "+$questions+"\n score:"+$score );
			
			if( e ) {
				if( $score < 75 ) {
					e.preventDefault(); 
					alert('Sorry, You have reached '+$score.toFixed(0)+'% of right answers, please try again.');
				}
			}
			return $score;
		}
	<!-- End - JS QUIZ -->
	function enableAnsStatus()
	{
		<?php if(count($page_questions)>0) {
			foreach($page_questions as $question) {?>
				var ques = $("#id_img_wrong_ans_<?php echo $question['question_id'];?>");
				
				if( ques.attr('alt') == "" ) {
					ques.removeClass('bglightred');
				}
				else {
					ques.addClass( ques.attr('alt') );
				}
			<?php			
			}
		}?>
	}
</script>