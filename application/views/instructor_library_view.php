<?php $this->load->view('header_admin');?>
<form class="form-horizontal forms1" method="post">
	<div class="homebg metro">
		<div class="container-fluid">
			<div class="main-content padding20 clearfix">
			<?php
			if( $course_status==1 ) {?>
				<script>
				$(document).ready(function() {
					$course_code 	= '<?php echo $course_code;?>';
					setInterval(function(){
						$.post(js_base_path+'ajax/getCourseRemainingTime', {'course_start_time':'<?php echo $course_start_time;?>','union_id':'<?php echo $union_id;?>', 'course_id':'<?php echo $library_id;?>'}, function(data){
							if( "Time Over" == data.trim() ) {
								alert(data);
								window.location.href = js_base_path+"admin/participant_portal?id=<?php echo $union_id;?>";
							}
							else {
								$course_timeleft= data;
								$("#id_timeleft").html("<div>ACTIVATION CODE: "+$course_code+"</div>"+"<div>Time: "+$course_timeleft+" (2hrs)</div>");
							}
						});
					}, 1000);
				});
				</script>
				<div id="id_timeleft"></div>
				<?php 
			}
			?>
			<br><div class="tile-area no-padding clearfix">
				<?php 
				$sizeof_page = sizeof($page);
				if( $sizeof_page>0 && isset($page[0]['page_id']) ) {
					for( $cntlibpage=0; $cntlibpage<$sizeof_page; $cntlibpage++ ) {
						$pn 					= $page[$cntlibpage]['pn'];
						$page_id 				= $page[$cntlibpage]['page_id'];
						$paragraph_id 			= $page[$cntlibpage]['paragraph_id'];
						$paragraph_title 		= $page[$cntlibpage]['paragraph_title'];
						$paragraph_subtitle 	= $page[$cntlibpage]['paragraph_subtitle'];
						$paragraph_description 	= $page[$cntlibpage]['paragraph_description'];?>
						<!--START CODE FOR METRO STYLE-->
							<!-------BEGIN FIRST ROW OF TILES------>
								<div class="tile-group no-margin no-padding clearfix" style="width: 100%">                    
									<!--*****************************begin  images***************************************************************-->
										<?php 
										$images = $this->libraries->getImagesByParagraphPageID( '', '', $library_id );
										if( count($images)>0 && isset($images[0]['image']) ) {
											$sizeof_images = sizeof($images);
											//MAXIMUM OF 8 IMAGES//?>
											<div class="tile-content">
												<div class="tile ol-transparent image-tile" style="height:100%;">
													<ul class="no-padding">
														<?php 
														$image_name = $images[0]['image'];
														if( file_exists(FCPATH.$this->path_upload_paragraph_images.$image_name) ) {?>
															<li><a href="#modal_instructor_image" data-toggle="modal"><img src="<?php echo $base.$this->path_upload_paragraph_images.$image_name;?>" /></a></li>
															<?php 
														}?>
													</ul>
												</div>
											</div>

											<!--start image modal page-->
											<div id="modal_instructor_image" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
												<div class="modal-header bg-red fg-white">
													<h3 id="myModalLabel"><?php echo strtoupper($library_title);?>&nbsp;<i class="pull-right icon-cancel-2"></i></h3>
												</div>
												<div class="modal-body" id="imageBody">
													<center>
													<div class="flexslider" style="height:100%;">
													<?php 
													for( $cntimg1=0; $cntimg1<$sizeof_images; $cntimg1++ ) {
														$image_name 		= isset($images[$cntimg1]['image']) ? $images[$cntimg1]['image'] : '';
														if( file_exists(FCPATH.$this->path_upload_paragraph_images.$image_name) && $image_name ) {?>
														<ul class="slides no-padding">
														<li>
														<img src="<?php echo $base.$this->path_upload_paragraph_images.$image_name;?>" class="slide-image" />
														<!------*********ACCORDION FOR IMAGE TEXT*******************--->
														<div class="accordion with-marker  no-margin " data-role="accordion" data-closeany="false">
														<div class="accordion-frame">
															<a class="heading bg-red fg-white" href="#"><?php echo "<strong>Description of Image ".($cntimg1+1)."</strong>";?></a>
															<div class="content">
															<?php 
															$image_id	= $images[$cntimg1]['paragraph_image_id'];
															$image_description	= $images[$cntimg1]['image_description'];?>
															<div class="row">
																<div class="place-right padding10" id="google_translate_element">
														<select name="cmb_s1lib_langimg" image-id="<?php echo $image_id;?>" id="cmb_s1lib_langimg<?php echo $image_id;?>" image-description="<?php echo base64_encode($image_description);?>">
															<option value="">-select language-</option>
															<option value="en" <?php echo ($to_lang=='en') ? 'selected="selected"' : '';?>>English</option>
															<option value="pt" <?php echo ($to_lang=='pt') ? 'selected="selected"' : '';?>>Portuguese</option>
															<option value="it" <?php echo ($to_lang=='it') ? 'selected="selected"' : '';?>>Italian</option>
															<option value="es" <?php echo ($to_lang=='es') ? 'selected="selected"' : '';?>>Spanish</option>
															<option value="pl" <?php echo ($to_lang=='pl') ? 'selected="selected"' : '';?>>Polish</option>
															<option value="el" <?php echo ($to_lang=='el') ? 'selected="selected"' : '';?>>Greek</option>
															<option value="zh-CN" <?php echo ($to_lang=='zh-CN') ? 'selected="selected"' : '';?>>Chinese</option>
														</select>
																</div>
															</div>
															<div style="display:none;" id="libimg_data_loader<?php echo $image_id;?>" align="center"><img width="70" height="70" src="<?php echo $base."img/loading_icon.gif";?>"></div>
															<div class="row">
															<span class="cls-image-libcontents<?php echo $image_id;?> padding5">
															<?php echo "&nbsp;&nbsp;".googletranslatetool::translate($image_description, $this->session->userdata('instructor_lib_fromlang'), $this->session->userdata('instructor_lib_tolang'));?>
															</span>
															</div>    
															</div>
														</div>
													</div>
												<!--**************END ACCORDION FOR IMAGE TEXT***************-->
													</li>
													<script type="text/javascript">
													$(document).ready(function() {	
														var image_id = '<?php echo $image_id;?>';
														$('#cmb_s1lib_langimg'+image_id).change(function(){
															$from_lang 			= '<?php echo $lang;?>';
															$to_lang 			= $(this).val();
															$image_description 	= $(this).attr('image-description');
															// $image_id 			= $(this).attr('image-id');
															if( $to_lang ) {
																$("#libimg_data_loader"+image_id).show();
																$(".cls-image-libcontents"+image_id).hide();
																$.post(js_base_path+'ajax/getTranslatedText', {'paragraphDescription':$image_description, 'fromLang':$from_lang, 'toLang':$to_lang, 'translateSection': 'instructor_library'}, function(data){
																	$(".cls-image-libcontents"+image_id).show();
																	$(".cls-image-libcontents"+image_id).html(data);
																	$("#libimg_data_loader"+image_id).hide();
																});
															}
															else {
																$(".cls-image-libcontents"+image_id).html('Please select language');
																return false;
															}
														});
													});
													</script>
													<?php 
													}
													}?>
													</ul>
													</div>
													</center>
												</div>
												<div class="modal-footer"><button id="btn-close" class="btn">Close</button></div>
											</div>
											<script type="text/javascript">
												$('#modal_instructor_image').css({ 'width':'95%', 'left':'1%', 'margin-left': '0px', 'top':'1%' });
												$('#imageBody').css({ 'max-height':'550px' });
												$('i').css({'cursor': 'pointer'});
											</script>
											<!--end image modal page-->
											<?php 
										} 
										else {?>
											<a href="#" class="tile ol-transparent image-tile" data-toggle="modal">
												<div class="tile-content">
												<div style="height:100%;">
												<ul class="slides no-padding"><li><img src="<?php echo $base."img/no_image.jpg";?>" width="640" height="500"></li></ul>
												</div>
												</div>
											</a>
											<?php 
										}?>
										<script type="text/javascript">
											$('.image-tile').css({ 'width':'640px', 'height':'510px' });
											$('.slide-image').css({ 'width':'auto' });
										</script>
										<!--**********************************end images**********************************************************-->

										
										<!--*************************begin text information paragraphs ***************************************-->
										<div class="tile instructor-content ol-transparent bg-white" >
											<div class="tile-content">
												<div class="panel no-border">
													<div class="panel-header bg-red fg-white" href="#mypageModal" data-toggle="modal"  style="cursor:pointer;">
														<span class="icon" ><img src="<?php echo $base;?>img/library-page/training_icon.png" width="30" height="30"></span>
														<?php echo $library_title;?>
													</div>
													<!--begin library content-->
													
													<div class="panel-content fg-dark nlp nrp padding10 tab-content instructor-scrollable">
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
														}*/?>

														<div class="padding5 place-right" id="google_translate_element">
														   <select name="cmb_s1lib_lang" id="cmb_s1lib_lang" paragraph-description="<?php echo base64_encode($paragraph_description);?>">
																<option value="">-select language-</option>
																<option value="en" <?php echo ($to_lang=='en') ? 'selected="selected"' : '';?>>English</option>
																<option value="pt" <?php echo ($to_lang=='pt') ? 'selected="selected"' : '';?>>Portuguese</option>
																<option value="it" <?php echo ($to_lang=='it') ? 'selected="selected"' : '';?>>Italian</option>
																<option value="es" <?php echo ($to_lang=='es') ? 'selected="selected"' : '';?>>Spanish</option>
																<option value="pl" <?php echo ($to_lang=='pl') ? 'selected="selected"' : '';?>>Polish</option>
																<option value="el" <?php echo ($to_lang=='el') ? 'selected="selected"' : '';?>>Greek</option>
																<option value="zh-CN" <?php echo ($to_lang=='zh-CN') ? 'selected="selected"' : '';?>>Chinese</option>
														   </select>
														</div>
														<?php echo (isset($paragraph_title) && $paragraph_title) ? "<span class='padding5'>".$paragraph_title."</span>" : '';?>
														<br><br>
														<?php echo (isset($paragraph_subtitle) && $paragraph_subtitle) ? "<span class='padding5'>".$paragraph_subtitle."</span>" : '';?>
														<div style="display:none;" id="lib_data_loader" align="center"><img width="70" height="70" src="<?php echo $base."img/loading_icon.gif";?>"></div>
														<div class="margin10">
															<span href="#mypageModal<?php echo $paragraph_id;?>" data-toggle="modal" class="cls-page-libcontents">
																<?php 
																if( isset($paragraph_description) && $paragraph_description ) {
																	// mb_internal_encoding("UTF-8");
																	echo googletranslatetool::translate($paragraph_description, $lang, $to_lang);
																}?>
															</span>
														</div>
														
														<!--start modal page-->
														<div id="mypageModal<?php echo $paragraph_id;?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
														<div class="modal-header bg-red">
															<h3 id="myModalLabel"><?php echo strtoupper($library_title);?>&nbsp;<i class="pull-right icon-cancel-2"></i></h3>
														</div>
														<div class="modal-body" id="mypageBody">
														<center>
														<div class="" style="height:100%;">
														<ul class="no-padding">
														<?php 
														$sizeof_modal_pages = sizeof($modal_pages);
														if( $sizeof_modal_pages>0 && isset($modal_pages[0]['page_id']) ) {?>
														<li>
														<div class="padding5 place-right" id="google_translate_element">
														<select name="cmb_instructor_liblang_modal" id="cmb_instructor_liblang_modal<?php echo $paragraph_id;?>" paragraph_description="<?php echo base64_encode($paragraph_description);?>">
														<option value="">-select language-</option>
														<option value="en" <?php echo ($to_lang=='en') ? 'selected="selected"' : '';?>>English</option>
														<option value="pt" <?php echo ($to_lang=='pt') ? 'selected="selected"' : '';?>>Portuguese</option>
														<option value="it" <?php echo ($to_lang=='it') ? 'selected="selected"' : '';?>>Italian</option>
														<option value="es" <?php echo ($to_lang=='es') ? 'selected="selected"' : '';?>>Spanish</option>
														<option value="pl" <?php echo ($to_lang=='pl') ? 'selected="selected"' : '';?>>Polish</option>
														<option value="el" <?php echo ($to_lang=='el') ? 'selected="selected"' : '';?>>Greek</option>
														<option value="zh-CN" <?php echo ($to_lang=='zh-CN') ? 'selected="selected"' : '';?>>Chinese</option>
														</select>
														</div><br><br>
														<?php echo (isset($paragraph_title) && $paragraph_title) ? "<h4>".$paragraph_title."</h4>" : '';?>

														<span style="display:none;" id="libmodal_data_loader<?php echo $paragraph_id;?>" align="center"><img width="70" height="70" src="<?php echo $base."img/loading_icon.gif";?>"></span>
														<span class="cls-modal-libcontents<?php echo $paragraph_id;?>">
															<?php echo googletranslatetool::translate($paragraph_description, $lang, $to_lang);?>
														</span>
														</li>
														<script>
														$(document).ready(function() {
															var paragraph_id = '<?php echo $paragraph_id;?>';
															$('#cmb_instructor_liblang_modal'+paragraph_id).change(function(){
																$from_lang 			= '<?php echo $lang;?>';
																$to_lang 			= $(this).val();
																$paragraph_description 	= $(this).attr('paragraph_description');
																if( $to_lang ) {
																	$("#libmodal_data_loader"+paragraph_id).show();
																	$(".cls-modal-libcontents"+paragraph_id).hide();
																	$.post('<?php echo $base;?>ajax/getTranslatedText', {'paragraphDescription':$paragraph_description, 'fromLang':$from_lang, 'toLang':$to_lang, 'translateSection': 'instructor_library'}, function(data){
																		$(".cls-modal-libcontents"+paragraph_id).show();
																		$(".cls-modal-libcontents"+paragraph_id).html(data);
																	});
																	$("#libmodal_data_loader"+paragraph_id).hide();
																}
																else {
																	$(".cls-modal-libcontents"+paragraph_id).html('Please select language');
																	$(".cls-modal-libcontents"+paragraph_id).addClass("fg-red");
																	return false;
																}
															});
														});
														</script>
														<?php
														}?>
														</ul>
														</div>
														</center>
														</div>
														<div class="modal-footer"><button id="btn-close" class="btn">Close</button></div>
														</div>
														<script type="text/javascript">
														$('#mypageModal<?php echo $paragraph_id;?>').css({ 'width':'95%', 'left':'1%', 'max-height':'700px', 'margin-left': '0px', 'top':'1%' });
														$('#mypageBody').css({ 'width':'95%', 'left':'1%', 'max-height':'550px', 'margin-left': '0px', 'top':'1%' });
														$('i').css({'cursor': 'pointer'});
														$(".instructor-content").css({ 'width':'380px' });
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
									<!--*************************end text information paragraphs******************************************-->
									</div>
								<!-------END FIRST ROW OF TILES------>  
								
								
								<!------- START - QUIZ ------->
									<?php 
									// $page_id     	= $page[$cntlibpage]['page_id'];
									// $paragraph_id   = $page[$cntlibpage]['paragraph_id'];//Marcio inserted only to make test works
									$questions = $this->libraries->getPageQuestionByParagraphPageID( $page_id, $paragraph_id );
									$this->libraries->updateReadingHistory($this->session->userdata("userid"), (int)$_GET['libid'], $page_id);
									if( $pages == $current_page) {
										if(sizeof($questions)>0) {
											$quizurl = "href='#myQuizModal' data-toggle='modal' onclick='enableAnsStatus();'";?>
											<script type="text/javascript">
												$(document).ready (function(){ 
													$('#test').removeClass('half-opacity');
												});
											</script>
											<?php 
											// Start - Get quiz details of the selected library // 
												foreach($questions as $question) {
													$ques_id	= $question['question_id'];
													$page_id	= $question['page_id'];
													$ques 		= $question['question'];
													$arr_quiz[$page_id][$ques_id]['page_id'] 		= $page_id;
													$arr_quiz[$page_id][$ques_id]['question_id']	= $ques_id;
													$arr_quiz[$page_id][$ques_id]['question'] 		= $ques;
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
										<div class="modal-header bg-red">
											<h3 id="myModalLabel"><?php echo $library_title;?>
											<i class="pull-right icon-cancel-2 icon-top-close" style="margin-right:10px;" data-dismiss="modal"></i></h3>
										</div>
										<div class="modal-body">
											<?php 
											if(count($questions)>0) {
												$final_arr_quiz = array();?>
												<div>
													<?php 
													$cnt_ques=0;
													foreach($questions as $question) {
														$ques_id= $question['question_id'];
														$page_id= $question['page_id'];
														$ques 	= $question['question'];
														
														$rows_user_answer = $this->users->getMetaDataList('quiz_master', 'in_quiz_section_id="'.$library_id.'" AND 
																		 st_quiz_section_name="instructor_library" AND in_quiz_performed_by="'.$this->sess_userid.'" 
																		 AND in_quiz_id="'.$ques_id.'"', '', 'is_answer_correct, in_answer_by_user, is_answer_correct');
														$is_answer_correct	= isset($rows_user_answer[0]['is_answer_correct']) ? $rows_user_answer[0]['is_answer_correct'] : 0;
														$answer_by_user	= isset($rows_user_answer[0]['in_answer_by_user']) ? $rows_user_answer[0]['in_answer_by_user'] : 0;
														
														$highlight_wrong_ans = ('1'!=$is_answer_correct) ? 'bglightred' :'';

														$user_answer= isset($_SESSION['final_arr_quiz'][$page_id][$ques_id]['user_answer']) 
																? $_SESSION['final_arr_quiz'][$page_id][$ques_id]['user_answer'] : 'na';
														
														$arr_quiz[$page_id][$ques_id]['user_answer'] = $is_answer_correct;
														?>
														<div class="span6 pull-left">
															<div class="flexslider">
																<div id="questions" class="ques">
																<h5 id="id_img_wrong_ans_<?php echo $ques_id;?>" class="wordbreak <?php echo $highlight_wrong_ans;?>"><?php echo ($cnt_ques+1).")&nbsp;".$ques;?>
																&nbsp;<span id="ques_status<?php echo $ques_id;?>"></span></h5>
																<ul class="" style="list-style:lower-latin;">
																<?php 
																$choices = $this->libraries->getQuestionAnswers($ques_id);
																$key_instrlib_ans=0;
																foreach( $choices as $ch ) {
																	$key_instrlib_ans++;
																	$answer_id 	= $ch['answer_id'];
																	$answer 	= $ch['answer'];
																	$choice 	= $ch['choice'];
																	$selected 	= ($answer_by_user==$key_instrlib_ans) ? 'checked="checked"' : '';?>
																	<li for="answer<?php echo $ques_id;?>">
														<input type="radio" class="my_answer wordbreak" ans_number="<?php echo $key_instrlib_ans;?>" onchange="checkAnswer(this.value, '<?php echo $answer;?>', '<?php echo $ques_id;?>', '<?php echo $page_id;?>')"  <?php echo $selected;?> name="answer<?php echo $ques_id;?>" value="<?php echo $answer_id;?>" />
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

						<div id="myQuizSummaryModal" class="modal fade hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							<div class="modal-header">
								<h3 id="myModalLabel"><?php echo "Summary - ".$library_title;?>
								<i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal"></i>
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
													echo "<h4><u>Page-".$cnt_page."</u></h4><br>";
													foreach( $val_page AS $key_ques => $val_ques ) {
														$cnt_ques++;
														$ques_id 	= $key_ques;
														$ques 		= $val_ques['question'];
														$ans_id 	= $val_ques['answer_id'];
														$ans 		= isset($val_ques['answer']) ? $val_ques['answer'] : '';
														$user_ans 	= (isset($val_ques['user_answer']) && $val_ques['user_answer']>=0) ? $val_ques['user_answer'] : '';?>
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
														<?php 
													}?>
												</div>
											<?php 
											}?>
										</div>

										<div class="span6 pull-left">
											<div class="flexslider">
											<?php 
											// echo $rate." ".$cnt_ques;
											$score = round( ($rate/$cnt_ques)*100 ) ;
											if( $score < 75 ) {
												echo "<h6>Sorry, You have reached ".$score."% of right answers, You are not eligible to earn any points, Please try again.</h6>";
												$course_status = "Failed";
											}
											else {
												echo "<h6>Congratulations, You have reached ".$score."% of right answers, You have earn points.</h6>";
												$course_status = "Passed";
												?>
												<script type="text/javascript">
													$(document).ready(function(){
														setPagePoints(2, 27, 'id_modal_points', 'modal_points', 'library');
													});
												</script>
												<?php 
											}

											// Update course quiz status //
												$arrupd_union_course 	= array( 'st_course_status'=>$course_status );
												$arrwhere_union_course 	= array( 'in_union_id'=>$union_id, 'in_instructor_id'=>$this->sess_userid, 'in_library_id'=>$library_id );
												$this->parentdb->manageDatabaseEntry( 'tbl_union_courses', 'UPDATE', $arrupd_union_course, $arrwhere_union_course );
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
							<div class="modal-footer"><button class="btn" data-dismiss="modal">Close</button></div>
						</div><br><br>		

						
						
						<!-------BEGIN SECOND ROW OF TILES------>				
							<div class="tile-group no-margin no-padding clearfix" style="width: 100%">
								<!--begin small tile-->
									<a class="tile bg-black" href='#modal_inspection' data-toggle='modal'>
										<div class="tile-content icon"><span class="icon"><img src="<?php echo $base;?>img/library-page/inspection_icon.png"></span></div>
										<div class="brand"><span class="label fg-white"><small>INSPECTIONS</small></span></div>
										<!---CRIAR MODAL COM TYPE INSPECTIONS ** NOME: CONTACTING OVERHEAD POWERLINES-->
									</a>
									<!--/////////// START MODAL - INSPECTIONS page-->
										<div id="modal_inspection" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
											<div class="modal-header bg-red">
												<h3 id="myModalLabel">INSPECTIONS<i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal"></i></h3>
											</div>
											<div class="modal-body">
												<h2>Construction - FIRE EXTINGUISHERS</h2>
												<div class="row-fluid">
											<img src="<?php echo $base;?>img/union/local183/inspection_screenshot.png" />
												</div>
											</div>
											<div class="modal-footer"><button class="btn" data-dismiss="modal">Close</button></div>
										</div>
									 <!--/////////// END MODAL - INSPECTIONS page-->
								<!--end small tile-->
								
								<!--begin small tile-->
									<a class="tile bg-black" href='#duediligenceModal' data-toggle='modal'>
										<div class="tile-content icon"><span class="icon"><img src="<?php echo $base;?>img/library-page/duediligence_icon.png"></span></div>
										<div class="brand">
											<span class="label fg-white"><small>DUE DILIGENCE</small></span>
                                            <!---CRIAR MODAL COM TYPE MOL ** NOME: CONTACTING OVERHEAD POWERLINES-->
										</div>
									</a>
								<!--end small tile-->
								
								
                                <!-- START - DUE DILIGENCE -->
                                <div id="duediligenceModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-header bg-red">
                                        <h3 id="myModalLabel">DUE DILIGENCE<i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal"></i></h3>
                                    </div>
                                    <div class="modal-body">
										<h3>Due Diligence</h3>
										<div class="row-fluid">
											<?php 
											// Due Diligence library description from the Library Table //
												$related_duediligence = $this->libraries->getRelatedLibraryIdsOfLibrary($library_id, 57);
												if( isset($related_duediligence) && sizeof($related_duediligence) ) {
												foreach( $related_duediligence AS $id_duediligence ) {
													
													// Due Diligence Regulation Details //
													$order_by = " ORDER BY CAST(SUBSTRING(st_section,LOCATE(' ',st_section)+1) AS SIGNED), SUBSTRING(st_section,-1), 
															CAST(SUBSTRING(st_subsection,LOCATE(' ',st_subsection)+1) AS SIGNED), SUBSTRING(st_subsection,-1), st_item, st_subitem";
													$rows_due_regulations = $this->users->getMetaDataList('library_regulation', 'in_status=1 AND in_library_id="'.$id_duediligence.'"', $order_by, 'in_regulation_content_id, st_regulation_number, st_section, st_subsection, st_item, st_subitem');
													$arr_duereg = array();
													if( sizeof($rows_due_regulations) && $rows_due_regulations[0] ) {
														$cnt_arr_duereg=0;
														foreach( $rows_due_regulations AS $key_due_regulation => $val_duereg ) {
															$reg_content_id	= isset($val_duereg['in_regulation_content_id'])?$val_duereg['in_regulation_content_id']:'';
															$regno 		= isset($val_duereg['st_regulation_number']) ? $val_duereg['st_regulation_number'] : '';
															$arr_duereg['regulation'][$regno][$cnt_arr_duereg]['regno'] = $val_duereg['st_regulation_number'];
															$arr_duereg['regulation'][$regno][$cnt_arr_duereg]['section'] = $val_duereg['st_section'];
															$arr_duereg['regulation'][$regno][$cnt_arr_duereg]['subsection'] = $val_duereg['st_subsection'];
															$arr_duereg['regulation'][$regno][$cnt_arr_duereg]['item'] = $val_duereg['st_item'];
															$arr_duereg['regulation'][$regno][$cnt_arr_duereg]['subitem'] = $val_duereg['st_subitem'];
															$arr_duereg[$regno]['reg_content_id'] = $reg_content_id;
															$cnt_arr_duereg++;
														}
													}
													if( isset($arr_duereg['regulation']) && is_array($arr_duereg['regulation']) ) {
														echo "<ul>";
														foreach( $arr_duereg['regulation'] AS $key_regno => $val_regno_duedili ) {
															$reg_duecontent_id = $arr_duereg[$key_regno]['reg_content_id'];
															$reg_data = $this->regulation->getRegulationTitleFromContentId($key_regno,$reg_duecontent_id);
															$parent_regulation_title= isset($reg_data['parent_regulation_title']) ? $reg_data['parent_regulation_title'] : '';
															echo "<br><p><b>".$parent_regulation_title."<br>".$key_regno."</b></p>";
															foreach( $val_regno_duedili AS $key_due_regulation => $val_duereg ) {
																if( isset($val_duereg['section']) ) {
																$section 	= (isset($val_duereg['section'])&&$val_duereg['section']) ? "Sec. ".trim($val_duereg['section']) : '';
																$subsection 	= (isset($val_duereg['subsection'])&&$val_duereg['subsection']) ? "(".trim($val_duereg['subsection']).")" : '';
																$item 	= (isset($val_duereg['item'])&&$val_duereg['item']) ? "(".trim($val_duereg['item']).")" : '';
																$subitem 	= (isset($val_duereg['subitem'])&&$val_duereg['subitem']) ? "(".trim($val_duereg['subitem']).")" : '';
																}?>
																<li class="padt10"><a href='#modalRegulationContents<?php echo ($key_due_regulation+1);?>' data-toggle="modal"><?php echo $section;?></a><?php echo $subsection.$item.$subitem;?></li>
																<?php 
															}
														}
														echo "</ul>";
													}

													// Due Diligence Description //
													$where				= "library_id='".$id_duediligence."' AND status=1";
													$rows_duediligence	= $this->users->getMetaDataList( "library", $where, '', 'library_id, title' );
													$duediligence_id	= (isset($rows_duediligence[0]['library_id']) && $rows_duediligence[0]['library_id']) ? $rows_duediligence[0]['library_id'] : '';
													$desc_duediligence= $this->users->getMetaDataList( "library_paragraph", 'library_id="'.$duediligence_id.'"', '', 'paragraph_description' );
													$desc_duediligence = isset($desc_duediligence[0]['paragraph_description']) ? $desc_duediligence[0]['paragraph_description'] : '';?>
													<span><?php echo $desc_duediligence;?></span>
													<?php 
												}
												}?>
										</div>
									</div>
									<div class="modal-footer"><button class="btn" data-dismiss="modal">Close</button></div>
								</div>
								<!--END DUE DILIGENCE-->
							
								<!--BEGIN modal DUE DILIGENCE/REGULATION page-->
								<?php 
								if( isset($related_duediligence) && sizeof($related_duediligence) && $rows_due_regulations[0] ) {?>
									<?php 
									foreach( $rows_due_regulations AS $key_due_regcontent => $val_due_regcontent ) {
										if( isset($val_due_regcontent['st_section']) ) {
											$regno 		= isset($val_due_regcontent['st_regulation_number']) ? $val_due_regcontent['st_regulation_number'] : '';
											$reg_data 	= $this->regulation->getRegulationTitleFromContentId($regno);
											$parent_regulation_title= (isset($reg_data['parent_regulation_title'])&&$reg_data['parent_regulation_title']) ? $reg_data['parent_regulation_title'] : '';
											$regulation_title 		= (isset($reg_data['regulation_title'])&&$reg_data['regulation_title']) ? $reg_data['regulation_title'] : '';
											
											$section 	= (isset($val_due_regcontent['st_section'])&&$val_due_regcontent['st_section']) ? trim($val_due_regcontent['st_section']) : '';
											$subsection = (isset($val_due_regcontent['st_subsection'])&&$val_due_regcontent['st_subsection']) ? trim($val_due_regcontent['st_subsection']) : '';
											$item 		= (isset($val_due_regcontent['st_item'])&&$val_due_regcontent['st_item']) ? trim($val_due_regcontent['st_item']) : '';
											$subitem 	= (isset($val_due_regcontent['st_subitem'])&&$val_due_regcontent['st_subitem']) ? trim($val_due_regcontent['st_subitem']) : '';
											
											$where_regcontents = 'st_regulation_number="'.$regno.'" AND st_section="'.$section.'" AND st_subsection="'.$subsection.'" AND st_item="'.$item.'" AND st_subitem="'.$subitem.'"';
											$rows_due_regcontents = $this->users->getMetaDataList('regulation_sections', $where_regcontents, '', 'st_content');
											$due_regcontents = isset($rows_due_regcontents[0]['st_content']) ? $rows_due_regcontents[0]['st_content'] : '';
											?>
											<div id="modalRegulationContents<?php echo ($key_due_regcontent+1);?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
												<div class="modal-header bg-red">
													<h3 id="myModalLabel"><?php echo $regno;?><i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal"></i></h3>
												</div>
												<div class="modal-body">
													<p><?php echo $parent_regulation_title."<br>".$regulation_title;?></p>
													<p><?php echo ($section) ? "Sec. ".$section : '';?></p>
													<p><?php echo $due_regcontents;?></p>
												</div>
											</div>
											<?php
										}
									}
								}?>
								<!--END modal DUE DILIGENCE/REGULATION page-->

								<!--begin small tile-->  
								<a class="tile  bg-black" href='#proceduresModal' data-toggle='modal'>
									<div class="tile-content icon" ><span class="icon"><img src="<?php echo $base;?>img/library-page/hazard_procedure_icon.png"></span></div>
									<div class="brand"><span class="label fg-white"><small>PROCEDURES</small></span></div>
								</a>
								<!--end small tile-->
								
                                <!--start modal PROCEDURES page-->
                                <div id="proceduresModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-header bg-red">
                                        <h3 id="myModalLabel">PROCEDURES<i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal"></i></h3>
                                    </div>
                                    <div class="modal-body">
										<?php 
										$related_procedures = $this->libraries->getRelatedLibraryIdsOfLibrary($library_id, 4);
										$cnt_proc_pending 	= 0;
										// Check all the procedures are purchased or not.
											//foreach( $related_procedures AS $id_proc ) {
												//$is_procedure_bought = $this->libraries->checkLibraryBought($id_proc, 's1procedures');
												//('0' == $is_procedure_bought) ? $cnt_proc_pending=1 : "";
											//}
										//echo (sizeof($related_procedures) && $cnt_proc_pending=='1' ) ? "<b>S1 Message - </b>You don't have all procedures related in your inventory, prior to read them please click over their tile and proceed the purchase." : "";?>
										<!--h2>Procedures</h2-->
										<div class="row-fluid">
											<?php 
											foreach( $related_procedures AS $id_proc ) {
												//$where			= "library_id='".$id_proc."' AND status=1";
												//$rows_procedures= $this->users->getMetaDataList( "library", $where, '', 'library_id, title' );
												//$proc_name		= (isset($rows_procedures[0]['title']) && $rows_procedures[0]['title']) ? $rows_procedures[0]['title'] : '';
												//$proc_id		= (isset($rows_procedures[0]['library_id']) && $rows_procedures[0]['library_id']) ? $rows_procedures[0]['library_id'] : '';
												//$is_procedure_bought = $this->libraries->checkLibraryBought($proc_id, 's1procedures');												
												//if( 1 == $is_procedure_bought ) {
												//$redirect_page = $base."my_created_procedures_metro?id=".$proc_id."&type=s1procedures#modalPreview";
												//$class_procedure = "";
												//}
												//else {
													//$class_procedure =  "half-opacity add_to_cart";
												//}
												?>
												<a title="Fire Extinguisher Procedure" href="<?php echo $base;?>admin/my_created_procedures_metro?id=<?php echo $id_proc;?>&amp;type=s1procedures#modalPreview" class="opc08 bg-darker tile half-library description" data-toggle="popover" data-content="" data-original-title="" data-placement="bottom" data-trigger="hover" target="new">
											
											<img src="<?php echo $base;?>img/library/procedures.png">
											<span class="fg-white margin10" style="position:absolute;top:0px;"><small>Fire Extinguish..</small></span>
											
											<div class="brand"><span class="label fg-white text-center"><small>2015-03-15</small></span></div>
											</a>
												<?php 
											}?>
										</div>
                                    </div>
                                    <div class="modal-footer"><button class="btn" data-dismiss="modal">Close</button></div>
                                </div>
								<!--end modal PROCEDURES page--> 
								
                                <!--begin INJURIES -->
									<a href='#modal_injuries' data-toggle='modal' class="tile bg-black">
										<div class="tile-content icon"><span class="icon"><img src="<?php echo $base;?>img/library-page/injuries_icon.png"></span></div>
										<div class="brand"><span class="label fg-white"><small>INJURIES</small></span></div>
									</a>
								<!--end INJURIES-->
                                <!-----BEGIN MODAL INJURIES------>
                                <div id="modal_injuries" class=" modal hide fade " tabindex="-1" style="width:800px;" role="dialog" aria-labelledby="myModalLabel" >
									<div class="modal-header bg-red">
										<h3 id="myModalLabel">INJURIES<i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal" ></i></h3>
									</div>
									<div class="modal-body">
										<?php $related_injuries = $this->libraries->getRelatedLibraryIdsOfLibrary($library_id, 8);?>
										<div class="row-fluid">
											<?php 
											foreach( $related_injuries AS $id_injuries ) {
												$where			= "library_id='".$id_injuries."' AND status=1";
												$rows_injuries	= $this->users->getMetaDataList( "library", $where, '', 'library_id, title' );
												$injury_id		= (isset($rows_injuries[0]['library_id']) && $rows_injuries[0]['library_id']) ? $rows_injuries[0]['library_id'] : '';
												if( (int)$injury_id ) {
													$injury_name	= (isset($rows_injuries[0]['title']) && $rows_injuries[0]['title']) ? $rows_injuries[0]['title'] : '';
													$href = $base."admin/library_page_contents?libtype=8&libid=".$injury_id."&section=desc";?>
													<a href="#modal_injuries<?php echo $injury_id;?>" id="<?php echo $injury_id;?>" class="tile half-library bg-red fg-white ttrain" data-toggle='modal'><span><?php echo $injury_name;?></span></a>
													<?php 
												}
											}?>
										</div>
										<div class="modal-footer"><button class="btn" data-dismiss="modal">Close</button></div>
									</div>
								</div>
								
								<?php 
								foreach( $related_injuries AS $id_injuries ) {
									$where			= "library_id='".$id_injuries."' AND status=1";
									$rows_injuries	= $this->users->getMetaDataList( "library", $where, '', 'library_id, title' );
									$injury_name	= (isset($rows_injuries[0]['title']) && $rows_injuries[0]['title']) ? $rows_injuries[0]['title'] : '';
									$injury_id		= (isset($rows_injuries[0]['library_id']) && $rows_injuries[0]['library_id']) ? $rows_injuries[0]['library_id'] : '';?>
									<div id="modal_injuries<?php echo $injury_id;?>" class=" modal hide fade " tabindex="-1" style="width:800px;" role="dialog" aria-labelledby="myModalLabel">
										<div class="modal-header bg-red">
											<h3 id="myModalLabel"><?php echo $injury_name;?><i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal" ></i></h3>
										</div>
										<div class="modal-body" id="modal_injuries<?php echo $injury_id;?>" style="max-height:600px">
											<div class="row-fluid">
												<?php 
												$images = $this->users->getMetaDataList('library_images', 'library_id="'.$injury_id.'" AND status=1', 'ORDER BY paragraph_image_id ASC', 'image' );
												if( sizeof($images)>0 && isset($images[0]['image'])) {
													echo "<center>";
													echo "<div class='flexslider' style='max-width:700px;'>";
													echo "<ul class='slides'>";
													
													foreach( $images AS $val_injury_images ) {
														$inj_image = isset($val_injury_images['image']) ? $val_injury_images['image'] : '';
														if( $inj_image ) {?>
															<li><img src="<?php echo $base.$this->path_upload_paragraph_images.$inj_image;?>"/></li>
															<?php 
														}
													}
													echo "</ul></div></center>";
												}
												else {
													echo "<h5>No Images available</h5>";
												}?>
												<div class="profile-user">
													<div class="tab-control no-margin" data-effect="fade" data-role="tab-control">
														<ul class="tabs">
															<li class="active user_tab"><a href="#description<?php echo $injury_id;?>"><i class="icon-user-2 on-left-more"></i>Description</a></li>
															<li class="user_tab"><a href="#treatment<?php echo $injury_id;?>"><i class="icon-tools on-left-more"></i>Treatment</a></li>
															<li class="user_tab"><a href="#recovery<?php echo $injury_id;?>"><i class="icon-wrench on-left-more"></i>Recovery</a></li>
															<li class="user_tab"><a href="#stats<?php echo $injury_id;?>"><i class="icon-wrench on-left-more"></i>Stats</a></li>
														</ul>
														<div class="frames">
															<?php 
															$rows_injury_desc	= $this->users->getMetaDataList( "library_paragraph", 'library_id="'.$injury_id.'"', 'ORDER BY page_id', 'paragraph_description', '', '0,4' );
															$injury_lib_page1 = (isset($rows_injury_desc[0]['paragraph_description'])&&$rows_injury_desc[0]['paragraph_description']) ? $rows_injury_desc[0]['paragraph_description'] : 'No data available';
															$injury_lib_page2 = (isset($rows_injury_desc[1]['paragraph_description'])&&$rows_injury_desc[1]['paragraph_description']) ? $rows_injury_desc[1]['paragraph_description'] : 'No data available';
															$injury_lib_page3 = (isset($rows_injury_desc[2]['paragraph_description'])&&$rows_injury_desc[2]['paragraph_description']) ? $rows_injury_desc[2]['paragraph_description'] : 'No data available';
															$injury_lib_page4 = (isset($rows_injury_desc[3]['paragraph_description'])&&$rows_injury_desc[3]['paragraph_description']) ? $rows_injury_desc[3]['paragraph_description'] : 'No data available';?>
															<div class="frame text-left" id="description<?php echo $injury_id;?>"><p class="item-title-secondary fg-black"><?php echo $injury_lib_page1;?></p></div>
															<div class="frame text-left no-margin" id="treatment<?php echo $injury_id;?>"><p class="item-title-secondary fg-black"><?php echo $injury_lib_page2;?></p></div>
															<div class="frame text-left no-margin" id="recovery<?php echo $injury_id;?>"><p class="item-title-secondary fg-black"><?php echo $injury_lib_page3;?></p></div>
															<div class="frame text-left" id="stats<?php echo $injury_id;?>"><p class="item-title-secondary fg-black"><?php echo $injury_lib_page4;?></p></div>
														</div>
													</div>
												</div>
											</div>
											<div class="modal-footer"><button class="btn" data-dismiss="modal">Close</button></div>
										</div>
									</div>
									<?php
								}?>
								<!-----END MODAL INJURIES------>

								
                                <!--begin small tile-->
									<!-- Start - Videos -->
									<?php 
									$media_url = '';
									$videos = $this->libraries->getVideosByParagraphPageID( $page_id, $paragraph_id );
									if( count($videos) > 0 && isset($videos[0]['video']) ) {
										$sizeof_videos = sizeof($videos);
										$media_url = "href='#mymediaModal' data-toggle='modal'";?>
										<script type="text/javascript">$(document).ready (function(){ $('#media').removeClass('half-opacity');});</script>
										<!--start modal page-->
										<div id="mymediaModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
											<div class="modal-header bg-red">
											  <h3 id="myModalLabel"><span class="icon"><img src="<?php echo $base;?>img/library-page/training_icon.png" width="30" height="30"></span> MEDIA<i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal"></i></h3>
											</div>
											<div class="modal-body" style="overflow:hidden;padding:0px;margin-left:0px;">
												<div class="flexslider">
													<ul class="slides" style="padding-left:0px;margin-left:0px;">
														<?php 
														for( $cntvideo=0; $cntvideo<$sizeof_videos; $cntvideo++ ) {
														$video_url = $videos[$cntvideo]['video'];?>
															<li><iframe frameborder="0" allowfullscreen="" src="<?php echo $video_url;?>?wmode=transparent&showinfo=0&rel=0&autoplay=0"></iframe></li>
															<?php 
														}?>
													</ul>
												</div>
											</div>
											<div class="modal-footer"><button class="btn" data-dismiss="modal">Close</button></div>
										</div>
										<!--end modal page-->
										<?php 
									}?>
									<!-- End - Videos -->
                                    <a class="tile bg-black half-opacity" href="<?php echo $base."admin/union_media?libid=".$library_id;?>" target="_blank" id="media">
									<div class="tile-content icon"><span class="icon" ><img src="<?php echo $base;?>img/library-page/media_icon.png"></span></div>
									<div class="brand"><span class="label fg-white"><small>MEDIA</small></span></div>
									</a>
								<!--end small tile-->  
								
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
									<div class="modal-header bg-red">
										<h3 id="myModalLabel">GLOSSARY<i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal"></i></h3>
									</div>
									<div class="modal-body">
										<?php $related_glossary = $this->libraries->getRelatedLibraryIdsOfLibrary($library_id, 70);?>
										<h2>Glossary</h2>
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
								<!--begin small tile-->
									<div class="tile bg-black"><img src="<?php echo $base;?>img/library-page/sponsor.png" /></div>
								<!--end small tile-->
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
<script type="text/javascript">
	$(".btn-close, .icon-top-close").click(function(){
		window.location.reload(); 
	});

	$(window).load(function() {
		$('.flexslider').flexslider({
			controlNav: false,
			prevText:"",
			nextText:"",
			// animation: "slide", 
			// itemWidth: 1,
			minItems: 2,
			maxItems: 3,
			move: 1,
			reverse: false,
			slideshow: false
		});
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
			$.post(js_base_path+'ajax/addQuizDetails', {'quizId':quesId, 'quizSectionId':'<?php echo $library_id;?>', 'userAnswer':user_answer, 'correctAns':correctAns, 'quizSection':'instructor_library'}, function(data) {
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
			if( confirm("You have to finish the shopping cart process in order to have it available in your Inventory") ) {
				e.preventDefault();
				$.post('<?php echo $base;?>ecommerce/addItem', {'id':$(this).attr('rel'), 'library_type':$(this).attr('library_type'), 'inspection_type':$(this).attr('inspection_type')}, function(data){
					var cart = $.parseJSON(data);
					$('#qty-in_cart').text(cart.qty);
					$('#amount_in_cart').text(cart.amount);
				})
			}
			else {
				return false;
			}
        })

		$('#cmb_s1lib_lang').change(function(){
			$from_lang 				= '<?php echo $lang;?>';
			$to_lang 				= $(this).val();
			$paragraph_description 	= $(this).attr('paragraph-description');

			if( $to_lang ) {
				$("#lib_data_loader").show();
				$(".cls-page-libcontents").hide();
				$.post('<?php echo $base;?>ajax/getTranslatedText', {'paragraphDescription':$paragraph_description, 'fromLang':$from_lang, 'toLang':$to_lang, 'translateSection': 'instructor_library'}, function(data){
					$(".cls-page-libcontents").show();
					$(".cls-page-libcontents").html(data);
					$(".cls-modal-libcontents").html(data);
					$("#lib_data_loader").hide();
				});
			}
			else {
				$(".cls-page-libcontents").html('<center>Please select language</center>');
				$(".cls-modal-libcontents").html('<center>Please select language</center>');
				$(".cls-modal-libcontents").addClass("fg-red");
				$(".cls-page-libcontents").addClass("fg-red");
				return false;
			}
		});
		
												
		$('.btn-checkquiz').click(function(e){
            calculateQuiz( e );
	   })
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
		<?php if(count($questions)>0) {
			foreach($questions as $question) {?>
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