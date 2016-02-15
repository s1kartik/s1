<?php $this->load->view('header_admin');
$quizurl = '';
$sizeof_page = sizeof($page);
//common::pr($page_questions);
?>
<script type="text/javascript" src="<?php echo $this->base;?>js/metro/metro.min.js"></script>
<form class="form-horizontal forms1" method="post">
	<div class="homebg metro">
		<div class="container-fluid">
			<div class="main-content padding20 clearfix">
				<p><a class="fg-white" href="<?php echo $base."admin/awareness_training?user=".$awtraining;?>"><<&nbsp;Back to Awareness Training</a></p>
				<div class="tile-area no-padding clearfix">
					<?php 
					$sizeof_page = sizeof($page);
					if( $sizeof_page>0 && isset($page[0]['page_id']) ) {
						for( $cnt=0; $cnt<$sizeof_page; $cnt++ ) {
							$pn  					= $page[$cnt]['pn'];
							$page_id 				= $page[$cnt]['page_id'];
							$paragraph_id 			= $page[$cnt]['paragraph_id'];

							$ret = $this->libraries->getQuizScore($page_id, $paragraph_id);

							$paragraph_title 		= $page[$cnt]['paragraph_title'];
							$paragraph_subtitle 	= $page[$cnt]['paragraph_subtitle'];
							$paragraph_description 	= $page[$cnt]['paragraph_description'];?>
							<!--START CODE FOR METRO STYLE-->
								<!-------BEGIN FIRST ROW OF TILES------>
									<div class="tile-group no-margin no-padding clearfix" style="width: 100%">                    
										<!--begin text information paragraphs -->
											<div class="tile instructor-content ol-transparent bg-white" >
												<div class="tile-content">
													<div class="panel no-border">
														<div class="panel-header bg-training-tiles fg-white" href="#mypageModal" data-toggle="modal"  style="cursor:pointer;">
															<span class="icon">
																<img src="<?php echo $base;?>img/library/training_blank.png" width="30" height="30">
															</span>
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
														if( isset($paragraph_title) && $paragraph_title ) {
															echo "<span class='padding5'>".$paragraph_title."</span>";
														}?>
														<br><br>
															<?php 
															if( isset($paragraph_subtitle) && $paragraph_subtitle ) {
																echo "<span class='padding5'>".$paragraph_subtitle."</span>";
															}?>
															<div style="display:none;" id="img_data_loader" align="center"><img width="70" height="70" src="<?php echo $base."img/loading_icon.gif";?>"></div>
															<div class="margin10" >
																<span href="#mypageModal" data-toggle="modal" class="cls-page-libcontents cls_pagedesc">
																	<?php 
																	if( isset($paragraph_description) && $paragraph_description ) {
																		// echo $paragraph_description;
																		// mb_internal_encoding("UTF-8");
																		echo googletranslatetool::translate($paragraph_description, $lang, $to_lang);
																	}?>
																</span>
															</div>
															<!--start modal page-->
																<div id="mypageModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
																	<div class="modal-header bg-training-tiles">
																		<h3 id="myModalLabel"><img src="<?php echo $base;?>img/library/training_blank.png" width="35" height="35"> <?php echo strtoupper($library_title);?><i class="pull-right icon-cancel-2 icon-top-close" data-dismiss="modal"></i></h3>
																	</div>
																	<div class="modal-body modal_library_body">
																	<span class='cls-modal-libcontents cls_pagedesc'>
																		<?php 
																		
																		if( isset($paragraph_description) && $paragraph_description ) {
																		echo googletranslatetool::translate($paragraph_description, $lang, $to_lang);
																		}
																		// echo "<p class='cls-modal-libcontents cls_pagedesc'>".$paragraph_description."</p>";
																		?>
																		</span>
                                                                        <?php 
																$this->load->view('library_pagination');
																if( $sizeof_page>0) {?>
																	<input type="hidden" name="current_page_id" value="<?php echo $page_id;?>" />
																	<?php 
																}?>
																	</div>
																	<div class="modal-footer"><button class="btn btn-close" data-dismiss="modal">Close</button></div>
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
										
										<!--Begin Images-->
										<?php 
										$images = $this->libraries->getImagesByParagraphPageID( $page_id, $paragraph_id );
										if( count($images) > 0 && isset($images[0]['image']) ) {
											$sizeof_images = (sizeof($images)>8) ? 8 : sizeof($images);
											//MAXIMUM OF 8 IMAGES//
											for( $cntimg=0; $cntimg<$sizeof_images; $cntimg++ ) {
												$image_name 		= $images[$cntimg]['image'];
												$image_description 	= $images[$cntimg]['image_description'];
												if( file_exists(FCPATH.$this->path_upload_paragraph_images.$image_name) ) {?>
													<a id="imagelink<?php echo $cntimg?>" href="#imageModal<?php echo $cntimg?>" class="tile  ol-transparent" data-toggle="modal">
														<div class="tile-content "><img class="w120 h120" src="<?php echo $base.$this->path_upload_paragraph_images.$image_name;?>" /></div>
													</a>
													<!--start image modal page-->
													<div id="imageModal<?php echo $cntimg?>" class="modal hide fade cls-img modal_images" tabindex="-1" role="dialog" aria-labelledby="myModalLabel<?php echo $cntimg?>">
														<div class="modal-header bg-training-tiles fg-white">
															<h3 id="myModalLabel<?php echo $cntimg?>"><?php echo strtoupper($library_title);?>&nbsp;<i class="pull-right icon-cancel-2 icon-top-close" data-dismiss="modal"></i></h3>
														</div>
														<div class="modal-body modal-body-image">
															<div style="padding-bottom:5px;">
															<?php echo $this->common->callLanguageSelectBox("cmb_s1lib_lang_img".$cntimg,$to_lang,'select-right');?>
															</div>
															<div style="padding-bottom:5px;">
																<div class="img_library_page" style="float:left"><img  src="<?php echo $base.$this->path_upload_paragraph_images.$image_name;?>"/></div>
																<div style="float:left;padding: 10px" class="cls-modal-libimg-contents<?php echo $cntimg;?>" id="imgdesc_<?php echo $cntimg;?>">
																	<?php 
																	echo "&nbsp;&nbsp;".googletranslatetool::translate($image_description, $this->session->userdata('s1lib_fromlang'), $this->session->userdata('s1lib_tolang'));?>
																</div>
															</div>																	  
														</div>
														<div class="modal-footer"><button class="btn btn-close" data-dismiss="modal">Close</button></div>
													</div>
													<script type="text/javascript">
														$(document).ready (function(){
															$('#imagelink<?php echo $cntimg?>').click(function() {
																$image_description 	= '<?php echo base64_encode($image_description);?>';
																var $from_lang 		= '<?php echo $this->session->userdata('s1lib_fromlang');?>';
																var $to_lang 		= $("#cmb_s1lib_lang").val();
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
																$from_lang 	= '<?php echo $lang;?>';
																$to_lang 	= $(this).val();
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
										}?>
										<script type="text/javascript">
											$('.img_library_page img').css({ 'width':'100%', 'display':'block', 'height':'100%', 'max-width':'720px'});
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
									$this->libraries->updateReadingHistory($this->session->userdata("userid"), (int)$_GET['libid'], $page_id);
									if( $pages == $current_page) {
										if(sizeof($page_questions)>0) {
											$quizurl = "href='#myQuizModal' data-toggle='modal' onclick='enableAnsStatus();'";?>
											<script type="text/javascript">
												$(document).ready (function(){ 
													$('#test').removeClass('half-opacity');
													$('.msg_quiz').html('<br><br><h4 class="s1content_title">Start test by clicking on <img src="<?php echo $base;?>img/library-page/test_shot.png" class="w70"> below.</h4>');	 
												});
											</script>
											<?php 
											// Start - Get quiz details of the selected library // 
												foreach($page_questions as $question) {
													$ques_id	= $question['question_id'];
													$page_id	= $question['page_id'];
													$ques 		= $question['question'];
													$arr_quiz[$page_id][$ques_id]['page_id'] 		= $page_id;
													$arr_quiz[$page_id][$ques_id]['question_id']	= $ques_id;
													$arr_quiz[$page_id][$ques_id]['question'] 	= $ques;
													$choices 	= $this->libraries->getQuestionAnswers($ques_id);				
													foreach( $choices as $ch ) {
														$answer_id 	= $ch['answer_id'];
														$arr_quiz[$page_id][$ques_id]['answer_id'] = $answer_id;
													}
												}
												$rows_quiz = $arr_quiz;
											// End - Get quiz details of the selected library //
										}
									}?>
								
									<div id="myQuizModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
										<div class="modal-header bg-training-tiles">
											<h3 id="myModalLabel"><img src="<?php echo $base;?>img/library-page/test_icon.png" width="30" height="30"> <?php echo $library_title;?><i class="pull-right icon-cancel-2 icon-top-close" style="margin-right:10px;" data-dismiss="modal"></i></h3>
										</div>
										<div class="modal-body">
											<?php 
											if(count($page_questions)>0) {
												// Start - Check if All quiz answers are correct or not //
													$rows_quiz_answers = $this->users->getMetaDataList('quiz_master', 'in_quiz_section_id="'.$library_id.'" AND 
																		 st_quiz_section_name="awareness_training" AND in_quiz_performed_by="'.$this->sess_userid.'" 
																		 AND is_answer_correct=1', '', 'in_quiz_id');
													$total_user_quiz_answers= (isset($rows_quiz_answers[0]['in_quiz_id']) && $rows_quiz_answers[0]['in_quiz_id'] ) 
																				? sizeof($rows_quiz_answers) : 0;
													$arr_awtraining_quiz 	= array();
													if( isset($rows_quiz) && is_array($rows_quiz) ) {
														foreach($rows_quiz AS $key_page => $val_page) {
															$arr_awtraining_quiz = array_keys($val_page);
														}
													}
													$cnt_awtraining_quiz 	= sizeof($arr_awtraining_quiz);
													$score_awtraining_quiz 	= ($cnt_awtraining_quiz>0) ? round(($total_user_quiz_answers/$cnt_awtraining_quiz)*100) : '0';
												// End - Check if All quiz answers are correct or not //
												
												?>
												<div>
													<?php 
													$cnt_ques=0;
													foreach($page_questions as $question) {
														$ques_id= $question['question_id'];
														$page_id= $question['page_id'];
														$ques 	= $question['question'];
														$rows_user_answer = $this->users->getMetaDataList('quiz_master', 'in_quiz_section_id="'.$library_id.'" AND 
																		 st_quiz_section_name="awareness_training" AND in_quiz_performed_by="'.$this->sess_userid.'" 
																		 AND in_quiz_id="'.$ques_id.'"', '', 'is_answer_correct, in_answer_by_user, is_answer_correct');
														$is_answer_correct	= isset($rows_user_answer[0]['is_answer_correct']) ? $rows_user_answer[0]['is_answer_correct'] : 0;
														$answer_by_user	= isset($rows_user_answer[0]['in_answer_by_user']) ? $rows_user_answer[0]['in_answer_by_user'] : 0;

														$highlight_wrong_ans = ('1'!=$is_answer_correct) ? 'bglightred' :'';
														$arr_quiz[$page_id][$ques_id]['user_answer'] = $is_answer_correct;
														// common::pr($arr_quiz);
														?>
														<div class="span6 pull-left">
															<div class="flexslider">
																<div id="questions" class="ques">															
																	<h5 id="id_img_wrong_ans_<?php echo $ques_id;?>" class="wordbreak <?php echo $highlight_wrong_ans;?>"><?php echo ($cnt_ques+1).")&nbsp;".$ques;?>
																	
																	&nbsp;<span id="ques_status<?php echo $ques_id;?>"></span></h5>
																	<ul class="" style="list-style:lower-latin;">
																		<?php 
																		$choices = $this->libraries->getQuestionAnswers($ques_id);
																		$key_awtraining_ans=0;

																		foreach( $choices as $ch ) {
																			$key_awtraining_ans++;
																			$answer_id 	= $ch['answer_id'];
																			$answer 	= $ch['answer'];
																			$choice 	= $ch['choice'];
																			$selected 	= ($answer_by_user==$key_awtraining_ans) ? 'checked="checked"' : '';
																			?>
																			<li for="answer<?php echo $ques_id;?>">
																				<input type="radio"  <?php echo ($score_awtraining_quiz>=75) ? 'disabled' : '';?> class="my_answer wordbreak" onclick="checkAnswer(this.value, '<?php echo $answer;?>', '<?php echo $ques_id;?>', '<?php echo $page_id;?>')" <?php echo $selected;?> name="answer<?php echo $ques_id;?>" ans_number="<?php echo $key_awtraining_ans;?>" value="<?php echo $answer_id;?>" />
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
													
													$_SESSION['final_arr_quiz'] = $arr_quiz;
													?>
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
											<button class="btn btn-close" data-dismiss="modal">Close</button>
										</div>
									</div>
								<!------- END - QUIZ ------->
							<?php 
						}?>

						<!-- QUIZ summary modal -->
						<div id="myQuizSummaryModal" class="modal fade hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							<div class="modal-header bg-training-tiles">
								<h3 id="myModalLabel"><?php echo "Summary - ".$library_title;?>
								<i class="pull-right icon-cancel-2 icon-top-close" style="margin-right:10px;" data-dismiss="modal"></i>
								</h3>
							</div>
							<div class="modal-body">
								<div id="id_page_summary">
									<?php 
									$rows_quiz = $arr_quiz;
									if( isset($rows_quiz) && is_array($rows_quiz) ) {?>
										<div class="span6 pull-left">
											<?php 
											$cnt_page = $cnt_ques = $rate = 0;
											foreach( $rows_quiz AS $key_page => $val_page ) {?>
												<div class="flexslider">
													<?php 
													$cnt_page++;
													$page_id = $key_page;
													// echo "<h4><u>Page-".$cnt_page."</u></h4><br>";
													foreach( $val_page AS $key_ques => $val_ques ) {
														$cnt_ques++;
														$ques 		= $val_ques['question'];
														$user_ans 	= (isset($val_ques['user_answer']) && $val_ques['user_answer']>=0) ? $val_ques['user_answer'] : '';
														?>
														<h5 class="wordbreak"><strong><?php echo $cnt_ques.")&nbsp;".$ques;?></strong></h5>
														<ul class="no-list-style">
															<li class="wordbreak"><strong>Your answer: </strong>
																<?php 
																if('1' == $user_ans) {
																	$rate++;?>
																	<img src='../img/library-page/right.png' width='25' height='20'>
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
														<?php }
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
														echo "<h6>Congratulations, You have reached ".$score."% of right answers, You have earn points.</h6>";
													}
												}
												?>
											</div>
										</div>
									<?php
									}
									else {
										echo "<h5>No data found<h5>";
									}?>
								</div>
							</div>
							<div class="modal-footer"><button class="btn btn-close" data-dismiss="modal">Close</button></div>
						</div><br><br>
						<script type="text/javascript">
							$(".btn-close,.icon-cancel-2 icon-top-close").click(function() { window.location.reload(); });
						</script>
						<!-------BEGIN SECOND ROW OF TILES------>				
							<div class="tile-group no-margin no-padding clearfix" style="width: 100%">
								<!--begin small tile-->
									<a class="tile bg-black" id="id_inspections_modal" href='#modal_inspection' data-toggle='modal'>
										<div class="tile-content icon"><span class="icon"><img src="<?php echo $base;?>img/library-page/inspection_icon.png"></span></div>
										<div class="brand"><span class="label fg-white"><small>INSPECTIONS</small></span></div>
									</a>
									<!--/////////// START MODAL - INSPECTIONS page-->
										<div id="modal_inspection" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
											<div class="modal-header bg-red">
												<h3 id="myModalLabel"><img width="35px" src="<?php echo $base;?>img/library/inspections_blank.png"> INSPECTIONS<i class="pull-right icon-cancel-2 icon-top-close" style="margin-right:10px;" data-dismiss="modal"></i></h3>
											</div>
											<div class="modal-body">
												<div class="padding5 place-right" id="google_translate_element">
													<?php echo $this->common->callLanguageSelectBox("cmb_lang_inspection_modal", $to_lang);?>
												</div>
												<div class="row-fluid">
													<img src="<?php echo $base;?>img/awareness_training/inspections.png" />
													<h4 class="s1content_title">Inspections</h4>
												    <hr class="s1content_line" />
													<?php 
													$desc_inspections_modal ='Inspections are conducted to carefully examine and identify potential and existing hazards and potential injuries workers are being exposed to in the workplace and developing control measures to reduce or eliminate worker exposure to these hazards.  Inspections are not only performed in the workplace but are also required to be performed on all equipment, machinery and vehicles workers are using to ensure they are well maintained and operating safely.  Inspections can be performed by a competent worker designated by the supervisor, by a JHSC (Joint Health & Safety Committee) or H&S Rep.';?>
													<p class="s1content_body_section inspections_modal">
														<?php echo googletranslatetool::translate($desc_inspections_modal, $lang, $to_lang);?>
													</p>
												</div>
												<script type="text/javascript">
													$(document).ready (function(){
														$('#id_inspections_modal').click(function(){
															$from_lang 	= '<?php echo $lang;?>';
															$to_lang 	= $("#cmb_s1lib_lang").val();
															$desc_inspections_modal = '<?php echo $desc_inspections_modal;?>';
															if( $to_lang ) {
																$.post(js_base_path+'ajax/getTranslatedText', {'translateSection':"s1_library", 'isPlainText':'1', 'paragraphDescription':$desc_inspections_modal, 'fromLang':$from_lang, 'toLang':$to_lang}, 
																function(data){ 
																	$("p.inspections_modal").html(data); 
																	$("#cmb_lang_inspection_modal").val($to_lang);
																});
															}
														});
													});
													$('#cmb_lang_inspection_modal').change(function(){
														$from_lang 	= '<?php echo $lang;?>';
														$to_lang 	= $(this).val();
														$desc_inspections_modal = '<?php echo $desc_inspections_modal;?>';
														if( $to_lang ) {
															$.post(js_base_path+'ajax/getTranslatedText', {'translateSection':"s1_library", 'isPlainText':'1', 'paragraphDescription':$desc_inspections_modal, 'fromLang':$from_lang, 'toLang':$to_lang}, 
															function(data){ $("p.inspections_modal").html(data); });
														}
														else {
															alert("Please select language");
															return false;
														}
													});                                                                                   
												</script>
											</div>
											<div class="modal-footer"><button class="btn btn-close" data-dismiss="modal">Close</button></div>
										</div>
									 <!--/////////// END MODAL - INSPECTIONS page-->
								<!--end small tile-->

								<!--begin small tile-->
									<a id="id_due_diligence_modal" class="tile bg-black" href='#duediligenceModal' data-toggle='modal'>
										<div class="tile-content icon"><span class="icon"><img src="<?php echo $base;?>img/library-page/duediligence_icon.png"></span></div>
										<div class="brand">
											<span class="label fg-white"><small>DUE DILIGENCE</small></span>
                                            <!---CRIAR MODAL COM TYPE MOL ** NOME: CONTACTING OVERHEAD POWERLINES-->
										</div>
									</a>
								<!--end small tile-->
                                <!-- /////////// START MODAL - DUE DILIGENCE page-->
                                <div id="duediligenceModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-header bg-red">
                                        <h3 id="myModalLabel"><img width="35px" src="<?php echo $base;?>img/library-page/duediligence_icon.png"> DUE DILIGENCE<i class="pull-right icon-cancel-2 icon-top-close" style="margin-right:10px;" data-dismiss="modal"></i></h3>
                                    </div>
                                    <div class="modal-body">
										<div class="padding5 place-right" id="google_translate_element">
											<?php echo $this->common->callLanguageSelectBox("cmb_lang_due_modal", $to_lang);?>
										</div>
										<div class="row-fluid">
											<h4 class="s1content_title">Due Diligence</h4>
											<hr class="s1content_line" />
											<?php 
											$desc_due_modal = '<p class="s1content_body_section">';
											$desc_due_modal .= '<strong>The Internal Responsibility System (IRS)</strong> is defined as a system by which workers, supervisors, employers and worker representatives all have legal duties to keep their workplace safe and healthy.  The IRS is also comprised of health and safety policies and procedures designed specifically to minimize or eliminate hazards in the workplace.  Failure to have an adequate IRS increases the risk of injuries and fatalities.';
											$desc_due_modal .= '</p>';
											$desc_due_modal .= '<p class="s1content_body_section">';
											$desc_due_modal .= 'Every workplace party, including employers, constructors, supervisors and workers must ensure compliance with the OHSA and related regulations, failure to do so may result in charges being laid by the Ministry of Labour.  This means that employers and supervisors must take all reasonable precautions to make sure the workplace is safe.';
											$desc_due_modal .= '</p>';
											$desc_due_modal .= '<h4 class="s1content_subtitle">Employer Responsibility</h4>';
											$desc_due_modal .= '<p class="s1content_body_section">';
											$desc_due_modal .= 'The employer has a responsibility to ensure all workers comply with OHSA and related regulations.  They must ensure adequate PPE is provided, maintained and used appropriately.  An employer is also required to create safe work practises and procedures and ensure they are being followed to protect the workers from hazards and injuries. For more duties and responsibilities of an employer review section 25 and 26 of the OHSA.';
											$desc_due_modal .= '</p>';
											$desc_due_modal .= '<p class="s1content_body_section">';
											$desc_due_modal .= 'As an employer your responsibilities include:';
											$desc_due_modal .= '</p>';
											$desc_due_modal .= '<ul class="s1content_ul_disc">';
											$desc_due_modal .= '<li >Ensuring health and safety policies and procedures for the workplace are created.';
											$desc_due_modal .= '</li>';
											$desc_due_modal .= '<li >Ensuring workers are adequately trained on the H&S policies and other job required training.';
											$desc_due_modal .= '</li>';
											$desc_due_modal .= '<li >Making sure workers are informed of the hazards and dangers in the workplace.';
											$desc_due_modal .= '</li>';
											$desc_due_modal .= '<li >Ensuring adequate PPE is provided, maintained and used appropriately';
											$desc_due_modal .= '</li>';
											$desc_due_modal .= '<li >Taking all reasonable precautions to protect the health and safety of workers.';
											$desc_due_modal .= '</li>';
											$desc_due_modal .= '<li >Ensuring that equipment, materials is maintained in good condition.';
											$desc_due_modal .= '</li>';
											$desc_due_modal .= '<li >Providing information, instruction and supervision to protect worker health and safety.';
											$desc_due_modal .= '</li>';
											$desc_due_modal .= '<li >Taking all reasonable precautions to protect the health and safety of workers.';
											$desc_due_modal .= '</li>';
											$desc_due_modal .= '</ul>';
											$desc_due_modal .= '<h4 class="s1content_subtitle">Supervisor Responsibility</h4>';
											$desc_due_modal .= '<p class="s1content_body_section">';
											$desc_due_modal .= 'The supervisor has a responsibility to ensure health and safety is followed in workplace. They are also to ensure the employers procedures and safe work practises are being followed and that all PPE is well maintained and being used by all workers. They must also ensure that all worker are properly trained for the work they are performing. For more duties and responsibilities of an employer review section 27 of the OHSA.';
											$desc_due_modal .= '</p>';
											$desc_due_modal .= '<p class="s1content_body_section">';
											$desc_due_modal .= 'As a Supervisor you are responsible for the safety of all the workers in your workplace. Some of the responsibilities you have include:';
											$desc_due_modal .= '</p>';
											$desc_due_modal .= '<ul class="s1content_ul_disc">';
											$desc_due_modal .= '<li >Ensuring workers, follow the law and the company safety rules.';
											$desc_due_modal .= '</li>';
											$desc_due_modal .= '<li >Making sure workers work safely and use the required safety equipment.';
											$desc_due_modal .= '</li>';
											$desc_due_modal .= '<li >Informing workers of the potential health and safety risks and hazards in their work area, and show them how to work safely.';
											$desc_due_modal .= '</li>';
											$desc_due_modal .= '<li >Ensuring workers are adequately trained to perform their jobs safely';
											$desc_due_modal .= '</li>';
											$desc_due_modal .= '<li >Taking all reasonable precautions to protect the health and safety of workers.';
											$desc_due_modal .= '</li>';
											$desc_due_modal .= '</ul>';
											$desc_due_modal .= '<h4 class="s1content_subtitle">Worker Responsibility</h4>';
											$desc_due_modal .= '<p class="s1content_body_section">';
											$desc_due_modal .= 'All workers have the responsibility to ensure all safe work practices and procedures are being followed, that they are using the proper PPE for the work they are performing and that all unsafe work practises and hazards are reported immediately. For more duties and responsibilities of a worker review section 28 of the OHSA';
											$desc_due_modal .= '</p>';
											$desc_due_modal .= '<p class="s1content_body_section">';
											$desc_due_modal .= 'As a worker you have the responsibility to ensure:';
											$desc_due_modal .= '</p>';
											$desc_due_modal .= '<ul class="s1content_ul_disc">';
											$desc_due_modal .= '<li >You wear the appropriate PPE for the task being performed and that it is adequately maintained.';
											$desc_due_modal .= '</li>';
											$desc_due_modal .= '<li >You are adequately trained to perform all tasks required of you, as well as the H&S policies.';
											$desc_due_modal .= '</li>';
											$desc_due_modal .= '<li >You are aware of all health and safety hazards in the workplace';
											$desc_due_modal .= '</li>';
											$desc_due_modal .= '<li >You tell your supervisor immediately if you observe a hazard or damaged or defective equipment.';
											$desc_due_modal .= '</li>';
											$desc_due_modal .= '<li >Work safely and ensure you follow all the safety rules and regulation put out by your employer and identified within the OHSA and it’s Regs.';
											$desc_due_modal .= '</li>';
											$desc_due_modal .= '</ul>';
											?>
											<div class="due_modal">
											<?php echo googletranslatetool::translate($desc_due_modal, $lang, $to_lang);?>
											</div>
										</div>
										<script type="text/javascript">
											$(document).ready (function(){
												$('#id_due_diligence_modal').click(function(){
													$from_lang 	= '<?php echo $lang;?>';
													$to_lang 	= $("#cmb_s1lib_lang").val();
													$desc_due_modal = '<?php echo $desc_due_modal;?>';
													if( $to_lang ) {
														$.post(js_base_path+'ajax/getTranslatedText', {'translateSection':"s1_library", 'isPlainText':'1', 'paragraphDescription':$desc_due_modal, 'fromLang':$from_lang, 'toLang':$to_lang}, 
														function(data){ 
															$("div.due_modal").html(data); 
															$("#cmb_lang_due_modal").val($to_lang);
														});
													}
												});
											});
											$('#cmb_lang_due_modal').change(function(){
												$from_lang 	= '<?php echo $lang;?>';
												$to_lang 	= $(this).val();
												$desc_due_modal = '<?php echo $desc_due_modal;?>';
												if( $to_lang ) {
													$.post(js_base_path+'ajax/getTranslatedText', {'translateSection':"s1_library", 'isPlainText':'1', 'paragraphDescription':$desc_due_modal, 'fromLang':$from_lang, 'toLang':$to_lang}, 
													function(data){ $("div.due_modal").html(data); });
												}
												else {
													alert("Please select language");
													return false;
												}
											});                                                                                   
										</script>
									</div>
									<div class="modal-footer"><button class="btn btn-close" data-dismiss="modal">Close</button></div>
								</div>
								<!--END modal DUE DILIGENCE page-->
								
								<!--begin small tile-->  
								<a class="tile bg-black" id="id_proc_modal" href='#proceduresModal' data-toggle='modal'>
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
										<div class="padding5 place-right" id="google_translate_element">
											<?php echo $this->common->callLanguageSelectBox("cmb_lang_procedure_modal", $to_lang);?>
										</div>
										<div class="row-fluid">
											<img src="<?php echo $base;?>img/awareness_training/procedures.png" />
											<h4 class="s1content_title">Procedures</h4>
											<hr class="s1content_line" />
											<?php 
											$desc_procedures_modal = '<p class="s1content_body_section">';
											$desc_procedures_modal .= 'Procedures relating to Health & Safety are step by step sequences of activities or course of action that must be followed in that order to complete a task.  Examples include the instructions on how to safety operate equipment, guard rail installation, fire extinguishing equipment, and safe use of chemicals.';
											$desc_procedures_modal .= '</p>';
											$desc_procedures_modal .= '<p class="s1content_body_section">';
											$desc_procedures_modal .= 'Workers must be trained on procedures to ensure good understanding of the steps and actions they must follow to minimize the risk of injury or death to themselves and their co-workers.';
											$desc_procedures_modal .= '</p>';
											$desc_procedures_modal .= '<p class="s1content_body_section">';
											$desc_procedures_modal .= 'Procedures are also known as Safe Working Procedures.';
											$desc_procedures_modal .= '</p>';?>
											<div class="procedures_modal"><?php echo googletranslatetool::translate($desc_procedures_modal, $lang, $to_lang);?></div>
										</div>
									</div>
                                    <div class="modal-footer"><button class="btn btn-close" data-dismiss="modal">Close</button></div>
                                </div>
								<script type="text/javascript">
									$(document).ready (function(){
										$('#id_proc_modal').click(function(){
											$from_lang 	= '<?php echo $lang;?>';
											$to_lang 	= $("#cmb_s1lib_lang").val();
											$desc_procedures_modal = '<?php echo $desc_procedures_modal;?>';
											if( $to_lang ) {
												$.post(js_base_path+'ajax/getTranslatedText', {'translateSection':"s1_library", 'isPlainText':'1', 'paragraphDescription':$desc_procedures_modal, 'fromLang':$from_lang, 'toLang':$to_lang}, 
												function(data){ 
													$("div.procedures_modal").html(data); 
													$("#cmb_lang_procedure_modal").val($to_lang);
												});
											}
										});
									});
									$('#cmb_lang_procedure_modal').change(function(){
										$from_lang 	= '<?php echo $lang;?>';
										$to_lang 	= $(this).val();
										$desc_procedures_modal = '<?php echo $desc_procedures_modal;?>';
										if( $to_lang ) {
											$.post(js_base_path+'ajax/getTranslatedText', {'translateSection':"s1_library", 'isPlainText':'1', 'paragraphDescription':$desc_procedures_modal, 'fromLang':$from_lang, 'toLang':$to_lang}, 
											function(data){ $("div.procedures_modal").html(data); });
										}
										else {
											alert("Please select language");
											return false;
										}
									});
								</script>
								<!--end modal PROCEDURES page--> 
								
                                <!--begin INJURIES -->
									<a href='#modal_injuries' id="id_injuries_modal" data-toggle='modal' class="tile bg-black">
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
										<div class="padding5 place-right" id="google_translate_element">
											<?php echo $this->common->callLanguageSelectBox("cmb_lang_injuries_modal", $to_lang);?>
										</div>
									<div class="row-fluid">
										<h4 class="s1content_title">Injuries</h4>
										<hr class="s1content_line" />
										<?php 
										$desc_injuries_modal = '<p class="s1content_body_section">';
										$desc_injuries_modal .= 'Based on current data, the hazards (high hazards) where workers are most frequently injured and the types of injuries experienced are';
										$desc_injuries_modal .= '</p>';
										$desc_injuries_modal .= '<h4 class="s1content_subtitle">Slips, Trips, Falls</h4>';
										$desc_injuries_modal .= '<ul class="s1content_ul_disc">';
										$desc_injuries_modal .= '<li>Broken Arm</li>';
										$desc_injuries_modal .= '<li>Broken Leg</li>';
										$desc_injuries_modal .= '</ul>';
										$desc_injuries_modal .= '<h4 class="s1content_subtitle">Falls From Heights</h4>';
										$desc_injuries_modal .= '<ul class="s1content_ul_disc">';
										$desc_injuries_modal .= '<li >Closed Head Injuries</li>';
										$desc_injuries_modal .= '<li >Spinal Cord Injuries</li>';
										$desc_injuries_modal .= '</ul>';
										$desc_injuries_modal .= '<h4 class="s1content_subtitle">Struck By</h4>';
										$desc_injuries_modal .= '<ul class="s1content_ul_disc">';
										$desc_injuries_modal .= '<li >Concussion</li>';
										$desc_injuries_modal .= '<li >Loss of Limb</li>';
										$desc_injuries_modal .= '</ul>';
										$desc_injuries_modal .= '<h4 class="s1content_subtitle">Crushed By</h4>';
										$desc_injuries_modal .= '<ul class="s1content_ul_disc">';
										$desc_injuries_modal .= '<li >Blunt Force & Crushing Injuries </li>';
										$desc_injuries_modal .= '<li >Loss of Limb</li>';
										$desc_injuries_modal .= '</ul>';
										$desc_injuries_modal .= '<h4 class="s1content_subtitle">Ergonomics</h4>';
										$desc_injuries_modal .= '<ul class="s1content_ul_disc">';
										$desc_injuries_modal .= '<li >Muscle and soft tissue injury</li>';
										$desc_injuries_modal .= '</ul>';
										?>
										<div class="injuries_modal"><?php echo googletranslatetool::translate($desc_injuries_modal, $lang, $to_lang);?></div>
									</div>
									</div>
									<script type="text/javascript">
										$(document).ready (function(){
											$('#id_injuries_modal').click(function(){
												$from_lang 	= '<?php echo $lang;?>';
												$to_lang 	= $("#cmb_s1lib_lang").val();
												$desc_injuries_modal = '<?php echo $desc_injuries_modal;?>';
												if( $to_lang ) {
													$.post(js_base_path+'ajax/getTranslatedText', {'translateSection':"s1_library", 'isPlainText':'1', 'paragraphDescription':$desc_injuries_modal, 'fromLang':$from_lang, 'toLang':$to_lang}, 
													function(data){ 
														$("div.injuries_modal").html(data); 
														$("#cmb_lang_injuries_modal").val($to_lang);
													});
												}
											});
										});
										$('#cmb_lang_injuries_modal').change(function(){
											$from_lang 	= '<?php echo $lang;?>';
											$to_lang 	= $(this).val();
											$desc_injuries_modal = '<?php echo $desc_injuries_modal;?>';
											if( $to_lang ) {
												$.post(js_base_path+'ajax/getTranslatedText', {'translateSection':"s1_library", 'isPlainText':'1', 'paragraphDescription':$desc_injuries_modal, 'fromLang':$from_lang, 'toLang':$to_lang}, 
												function(data){ $("div.injuries_modal").html(data); });
											}
											else {
												alert("Please select language");
												return false;
											}
										});
									</script>
									<div class="modal-footer"><button class="btn btn-close" data-dismiss="modal">Close</button></div>
								</div>
								
								<!-----END MODAL INJURIES------>

								
								
                                <!--begin small tile-->
									<!-- Start - Videos -->
										<?php 
										$media_url = '';
										$videos = $this->libraries->getVideosByParagraphPageID( $page_id, $paragraph_id );
										$sizeof_videos = 0;
										if( count($videos) > 0 && isset($videos[0]['video']) ) {
											$sizeof_videos = sizeof($videos);
											$media_url = "href='#mymediaModal' data-toggle='modal'";?>
											<script type="text/javascript">$(document).ready (function(){ $('#media').removeClass('half-opacity'); });</script>
											<div id="mymediaModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
												<div class="modal-header bg-red">
												  <h3 id="myModalLabel"><span class="icon"><img src="<?php echo $base;?>img/library-page/media_icon.png" width="30" height="30"></span> MEDIA<i class="pull-right icon-cancel-2 icon-top-close" style="margin-right:10px;" data-dismiss="modal"></i></h3>
												</div>
												<div class="modal-body" style="overflow:hidden;padding:0px;margin-left:0px;">
												  <div class="flexslider">
														<ul class="slides" style="padding-left:0px;margin-left:0px;">
														<div style="padding-bottom:5px;">
															<?php echo $this->common->callLanguageSelectBox("cmb_s1lib_lang_video",$to_lang,'select-right');?>
														</div>
														<?php
														for( $cntvideo=0; $cntvideo<$sizeof_videos; $cntvideo++ ) {
														$video_url = $videos[$cntvideo]['video'];
														$video_description = $videos[$cntvideo]['video_description'];?>
														<li>
														<iframe frameborder="0" allowfullscreen="" src="<?php echo $video_url;?>?wmode=transparent&showinfo=0&rel=0&autoplay=0"></iframe>
														<div class="cls-modal-libvideo-contents<?php echo $cntvideo;?>" id="imgdesc_<?php echo $cntimg;?>">
														<?php echo "&nbsp;&nbsp;".googletranslatetool::translate($video_description, $this->session->userdata('s1lib_fromlang'), $this->session->userdata('s1lib_tolang'));?>
														</div>
														</li>   
															<?php 
														}?>
														</ul>
													</div>
												</div>
												<div class="modal-footer"><button class="btn btn-close" data-dismiss="modal" id="modalCloseVideo">Close</button></div>
											</div>
											<script>
											$('#cmb_s1lib_lang_video').change(function(){
												<?php 
												for( $cntvideo=0; $cntvideo<$sizeof_videos; $cntvideo++ ) {
													$video_description = $videos[$cntvideo]['video_description'];?>
													var $from_lang 	= '<?php echo $lang;?>';
													var $to_lang 	= $(this).val();
													var $video_description 	= '<?php echo base64_encode($video_description);?>';
													if( $to_lang ) {
														$.post(js_base_path+'ajax/getTranslatedVideoDesc', {'translateSection':"s1_library", 'videoDescription':$video_description, 'fromLang':$from_lang, 'toLang':$to_lang}, 
														function(data) {
															$(".cls-modal-libvideo-contents<?php echo $cntvideo;?>").html(data);
														});
													}
													else {
														alert("Please select language");
														return false;
													}
													<?php 
												}?>
											});
											</script>
											<?php 
										}?>
									<!-- End - Videos -->
									<a class="tile bg-black half-opacity" <?php echo $media_url;?> id="media">
										<div class="tile-content icon"><span class="icon" ><img src="<?php echo $base;?>img/library-page/media_icon.png"></span></div>
										<div class="brand"><span class="label fg-white"><small>MEDIA</small></span></div>
									</a>
								<!--end small tile-->  
									<script>
										$('#media').click(function(){
											<?php
											for( $cntvideo=0; $cntvideo<$sizeof_videos; $cntvideo++ ) {
												$video_description = $videos[$cntvideo]['video_description'];?>
												var $from_lang 	= '<?php echo $lang;?>';
												var $to_lang 	= $('#cmb_s1lib_lang').val();
												var $video_description 	= '<?php echo base64_encode($video_description);?>';
												if( $to_lang ) {
													$.post(js_base_path+'ajax/getTranslatedVideoDesc', {'translateSection':"s1_library", 'videoDescription':$video_description, 'fromLang':$from_lang, 'toLang':$to_lang}, 
													function(data){					
														$(".cls-modal-libvideo-contents<?php echo $cntvideo;?>").html(data);
													});
												}
												else {
													alert("Please select language");
													return false;
												}
											<?php 
										}?>
										$('#cmb_s1lib_lang_video').val($to_lang);
									});
									</script>

								<!--begin small tile-->  
									<a class="tile bg-black half-opacity" <?php echo $quizurl;?> id="test">
										<div class="tile-content icon"><span class="icon"><img src="<?php echo $base;?>img/library-page/test_icon.png"></span></div>
										<div class="brand"><span class="label fg-white"><small>TEST/SUMMARY</small></span></div>
									</a>
								<!--end small tile-->
								<!--begin small tile-->
								<a href="#modal_glossary" data-toggle='modal' class="tile bg-black">
									<div class="tile-content icon"><span class="icon"><img src="<?php echo $base;?>img/library-page/glossary_icon.png"></span></div>
									<div class="brand"><span class="label fg-white"><small>GLOSSARY</small></span></div>
								</a>
								
								<div id="modal_glossary" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									<div class="modal-header bg-red">
										<h3 id="myModalLabel"><img src="<?php echo $base;?>img/library-page/glossary_icon.png" width="30" height="30"> GLOSSARY<i class="pull-right icon-cancel-2 icon-top-close" style="margin-right:10px;" data-dismiss="modal"></i></h3>
									</div>
									<div class="modal-body">
										<?php $related_glossary = $this->libraries->getRelatedLibraryIdsOfLibrary($library_id, $library_type_id=70);?>
										<h2>Glossary</h2>
										<div class="row-fluid">
											<?php 
											foreach( $related_glossary AS $id_glossary ) {
												$rows_glossary_desc	= $this->users->getMetaDataList("library_paragraph", 'library_id="'.$id_glossary.'"', '', 'paragraph_description', '');
												$glossary_desc = (isset($rows_glossary_desc[0]['paragraph_description'])&&$rows_glossary_desc[0]['paragraph_description']) ? $rows_glossary_desc[0]['paragraph_description'] : 'No data available';
												echo $glossary_desc;
											}?>
										</div>
									</div>
									<div class="modal-footer"><button class="btn" data-dismiss="modal">Close</button></div>
								</div>
								<!--end small tile-->  

								<!--begin small tile-->
								<?php 
								// echo $current_libcnt;
								if( $current_libcnt <= 4 ) {
									// Check user has read >= 75% if library pages 
										$rows_training_progress = $this->users->checkAwarenessTrainingCompletedByUser($awtraining);
										$lib_progress 	= isset($rows_training_progress[$library_id]) ? $rows_training_progress[$library_id] : 0;
										
									$nextlibid = isset($rows_training_progress['training_libraries'][$current_libcnt]) ? $rows_training_progress['training_libraries'][$current_libcnt] : '';

									// Check if All quiz answers are correct //
										$rows_quiz_answers 	= $this->users->getMetaDataList('quiz_master', 'in_quiz_section_id="'.$library_id.'" AND 
																	st_quiz_section_name="awareness_training" AND in_quiz_performed_by="'.$this->sess_userid.'" 
																	AND is_answer_correct=1', '', 'in_quiz_id');
										$total_user_quiz_answers = (isset($rows_quiz_answers[0]['in_quiz_id']) && $rows_quiz_answers[0]['in_quiz_id'] ) ? sizeof($rows_quiz_answers) : 0;

										$arr_awtraining_quiz = array();
										// common::pr( $rows_quiz );
										if( isset($rows_quiz) && is_array($rows_quiz) ) {
											foreach($rows_quiz AS $key_page => $val_page) {
												$arr_awtraining_quiz = array_keys($val_page);
											}
										}
										$cnt_awtraining_quiz 	= sizeof($arr_awtraining_quiz);
										$score_awtraining_quiz 	= ($cnt_awtraining_quiz>0) ? round(($total_user_quiz_answers/$cnt_awtraining_quiz)*100) : '0';

									// echo "<br>lib_progress: ".$lib_progress.", score_awtraining_quiz: ".$score_awtraining_quiz;

									if( $lib_progress >= 75 && $score_awtraining_quiz >= 75 ) {
										$next_nextlibid = isset($rows_training_progress['training_libraries'][$current_libcnt+1]) ? $rows_training_progress['training_libraries'][$current_libcnt+1] : '';

										$cls_next_module 		= ($current_libcnt<4) ? '' : 'half-opacity';
										switch( $current_libcnt ) {
											case 1: {$point_page_section_id = ($awtraining=="worker") ? 30 : 1023;break;}
											case 2: {$point_page_section_id = ($awtraining=="worker") ? 1018 : 1024;break;}
											case 3: {$point_page_section_id = ($awtraining=="worker") ? 1021 : 1025;break;}
											case 4: {$point_page_section_id = ($awtraining=="worker") ? 1022 : 1026;break;}
										}
										// Pageid=14: Check Module completed //
											/*$rows_check_module_completed = $this->points->hasUserGotPointsOfPageSection($this->session->userdata('userid'), $library_id, 14);
											*/

										// Assign requested D.R.O.T after WAT or SAT completed to the logged in User //
											if( "worker"==$awtraining ) {
												$item = array('libid' => 33, 'transaction_type'=>'s1credits', 'qty' => 1, 'price' => '', 
															'name'=>'WAT Badge', 'library_type'=>'WAT_badge', 'options'=>array('Credits'=>'','Creditsbuy'=>''));
												$this->libraries->addItemInCartToMyLibrary($this->sess_userid, $this->sess_useremail, $item, $item['options']);
											}
											else if( "supervisor"==$awtraining ) {
												$item = array('libid' => 32, 'transaction_type'=>'s1credits', 'qty' => 1, 'price' => '', 
															'name'=>'SAT Badge', 'library_type'=>'SAT_badge', 'options'=>array('Credits'=>'','Creditsbuy'=>''));
												$this->libraries->addItemInCartToMyLibrary($this->sess_userid, $this->sess_useremail, $item, $item['options']);
											}
											$modal_text = ($current_libcnt<4) ? " and click on Next Module for module ".($current_libcnt+1) : '';
											?>
											
										<script>
											setPagePoints(2, '<?php echo $point_page_section_id;?>', 'id_modal_points', 'modal_points', '<?php echo $awtraining."_module".$current_libcnt;?>');
											$(document).ready(function () {
												$("#id_modal_complete_libmodule").modal("show");											
												$(".id_complete_libmodule").html('<?php echo "You have successfully complete module ".$current_libcnt.$modal_text;?>');
											});
										</script>
										<?php 
										// $module_completed= isset($rows_check_module_completed['has_points']) ? $rows_check_module_completed['has_points'] : "";
										// if( !$module_completed )
										{
											// $add_pagesection_points = $this->points->addPagePoints($this->session->userdata('userid'), 14, $library_id);
										}
										
										$current_libcnt++;
										$href 	= $base."admin/library_page_contents?libtype=1&libid=".$nextlibid."&section=desc&language=".$lang."&awtraining=".$awtraining."&clib=".$current_libcnt."&nextlibid=".$next_nextlibid."&prog=".$lib_progress;
									}
									else {
										$cls_next_module = 'half-opacity';
										$href = "#";
									}
								}
								else {
									$cls_next_module = 'half-opacity';
									$href = "#";
								}?>
								<a href="<?php echo $href;?>" class="tile bg-black <?php echo $cls_next_module;?>" id="next_module">
									<div class="tile-content icon"><span class="icon"><img src="<?php echo $base;?>img/library-page/next_icon.png"></span></div>
									<div class="brand"><span class="label fg-white"><small>NEXT MODULE</small></span></div>
								</a>
								<!--end small tile-->
								
								<div id="id_modal_complete_libmodule" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									<div class="modal-header bg-red">
										<h3 id="myModalLabel">Library
										<i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal"></i></h3>
									</div>
									<div class="modal-body id_complete_libmodule"></div>
									<div class="modal-footer">
										<div class="modal-footer"><button class="btn" data-dismiss="modal">Close</button></div>
									</div>
								</div>
								
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
	$(".btn-close, .icon-top-close").click(function() { window.location.reload(); });

	$(window).load(function() {
		$('.flexslider').flexslider({
			controlNav: false, 
			prevText:"",
			nextText:"",
			slideshow: false
		});
		var collapseCont = $(".module-inner:first-of-type");    
		collapseCont
		.delay(4000)
		.collapse(10000);
		collapseCont
		.prev("button")
		.delay(4000)
		.removeClass("collapsed")       
	});
	function checkAnswer(selAnswerId, correctAns, quesId, pageId)
	{
		var user_answer 		= $("input[name='answer"+quesId+"']:checked").attr('ans_number');
		if( correctAns == 1 ) {
			$("#id_img_wrong_ans_"+quesId).attr('alt', "");			
		}
		else {
			$("#id_img_wrong_ans_"+quesId).attr('alt',"bglightred");			
		}

		// Add User Quiz details //
			$.post(js_base_path+'ajax/addQuizDetails', {'quizId':quesId, 'quizSectionId':'<?php echo $library_id;?>', 'userAnswer':user_answer, 'correctAns':correctAns, 'quizSection':'awareness_training'}, function(data) {
				return true;
			});

		$.ajax({
			url: js_base_path+'ajax/ajaxSetQuiz',
			type: 'post', 
			data: {'userAnswer':correctAns, 'selAnswerId':selAnswerId, 'quesId':quesId, 'pageId':pageId, 'libId':'<?php echo $library_id;?>', 'pn':'<?php echo $current_page;?>'},
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
					url: js_base_path+'admin/modal_shopping_items',
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
