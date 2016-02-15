<?php $this->load->view('header_admin'); ?>
<!-- Start - Fancy box image --> 
	<!-- Add fancyBox main JS and CSS files -->
		<script type="text/javascript" src="<?php echo $base."plugin/fancybox/source/jquery.fancybox.js?v=2.1.5";?>"></script>
		<link rel="stylesheet" type="text/css" href="<?php echo $base."plugin/fancybox/source/jquery.fancybox.css?v=2.1.5";?>" media="screen" />
<!-- End - Fancy box image --> 
						
<script type="text/javascript" src="<?php echo $base;?>js/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="<?php echo $base;?>js/regulation.js"></script>
<script type="text/javascript" src="<?php echo $base;?>js/library.js"></script>
<script type="text/javascript">
	getTinymceEditor();
</script>
<div class="info-container">
<div class="document-content">
    <form class="form-horizontal adminfrm" enctype="multipart/form-data" method="post" action="">
		<fieldset>
			<table align="center" id="id_tbl_paragraph" width="100%">
			<?php 
			for( $cnt_pr=0; $cnt_pr<sizeof($page); $cnt_pr++ ) {
				$pn 					= $page[$cnt_pr]['pn'];
				$page_id 				= $page[$cnt_pr]['page_id'];
				$paragraph_id			= $page[$cnt_pr]['paragraph_id'];
				$paragraph_title 		= $page[$cnt_pr]['paragraph_title'];
				$paragraph_subtitle 	= $page[$cnt_pr]['paragraph_subtitle'];
				$paragraph_description 	= $page[$cnt_pr]['paragraph_description'];
				?>
				<input type="hidden" name="hidn_paragraph_section" id="hidn_paragraph_section" value="<?php echo ($cnt_pr+1);?>">
				<input type="hidden" name="hidn_paragraph_question" id="hidn_paragraph_question" value="<?php echo ($cnt_pr+1);?>">
				<input type="hidden" name="hidn_paragraph_image" id="hidn_paragraph_image" value="<?php echo ($cnt_pr+1);?>">
				<input type="hidden" name="hidn_paragraph_video" id="hidn_paragraph_video" value="<?php echo ($cnt_pr+1);?>">

				<tr id="id_tr_paragraph<?php echo ($cnt_pr+1);?>">
					<td>
					<div class="paragraphblock-sample" id="id_div_paragraph<?php echo ($cnt_pr+1);?>"> 
						<div id="id_div_pr<?php echo ($cnt_pr+1);?>title1">
							<div class="control-group">
							  <label class="control-label" for="">Title</label>
							  <div class="controls">
								<input id="title_pr<?php echo ($cnt_pr+1);?>title1" name="paragraph_title[<?php echo $paragraph_id;?>]" type="text" placeholder="Type Paragraph Title" class="input-xlarge" value="<?php echo $paragraph_title;?>">
							  </div>
							</div>
						</div>
						
						<div id="id_div_pr<?php echo ($cnt_pr+1);?>subtitle1">
							<div class="control-group">
							  <label class="control-label" for="">Sub-Title</label>
							  <div class="controls">
								<input id="title_pr<?php echo ($cnt_pr+1);?>subtitle1" name="paragraph_subtitle[<?php echo $paragraph_id;?>]" type="text" placeholder="Type Paragraph Sub-Title" class="input-xlarge" value="<?php echo $paragraph_subtitle;?>">
							  </div>
							</div>
						</div>
						
						<div class="descblock-sample" id="id_div_desc_pr<?php echo ($cnt_pr+1);?>desc1">
							<div class="control-group">
							  <label class="control-label" for="">Description</label>
							  <div class="controls">
								<textarea rows="20" id="description_pr<?php echo ($cnt_pr+1);?>desc1" name="description[<?php echo $paragraph_id;?>]" placeholder="Type in the Description for the Paragraph" class="content-editor"><?php echo $paragraph_description;?></textarea>
								<div id="cnt_prdesc1"></div>
							  </div>
							</div>
						</div>

						<?php 
						// QUESTIONS //
							$questions = $this->libraries->getPageQuestionByParagraphPageID( $page_id, $paragraph_id );
							?>
							<div class="questionblock-sample" id="id_div_question_pr<?php echo ($cnt_pr+1);?>">
								<?php 
								if(count($questions)>0) {
									foreach($questions as $question) {
									?>
										<div class="control-group">
										  <label class="control-label" for="">Enter Question</label>
										  <div class="controls">
											<input id="question_pr<?php echo ($cnt_pr+1);?>ques1" name="question[<?php echo $paragraph_id;?>][<?php echo $question['question_id'];?>]" type="text" placeholder="Type in Question" class="input-xlarge" value="<?php echo $question['question'];?>"/><a class="fr" href="javascript:void(0);" onclick="javascript:deleteS1Module('<?php echo $question['question_id'];?>', 'quiz');">Delete Quiz</a>
										  </div>
										</div>
										
										<?php 
										$choices = $this->libraries->getQuestionAnswers($question['question_id']);
										foreach($choices as $ch) {?>
											<div class="answerblock">
												<div class="control-group">
												  <label class="control-label" for="nickname">Enter Answer</label>
												  <div class="controls">
													<input id="answer_pr<?php echo ($cnt_pr+1);?>choice1" name="choice[<?php echo $paragraph_id;?>][<?php echo $ch['answer_id'];?>]" type="text" placeholder="Type The Answer" class="input-xlarge" value="<?php echo $ch['choice'];?>"/>
												  </div>
												</div>
												  <!-- Text input-->
												<div class="control-group">
												  <label class="control-label">Is Answer: Right or Wrong</label>
												  <div class="controls">
													<select id="answer_pr<?php echo ($cnt_pr+1);?>ans1" name="answer[<?php echo $paragraph_id;?>][<?php echo $ch['answer_id'];?>]" class="input-xlarge">
														<option value="">-select-</option>
														<option value="1" <?php if($ch['answer']>0):?>selected="selected"<?php endif;?>>Right</option>
														<option value="0" <?php if($ch['answer']<1):?>selected="selected"<?php endif;?>>Wrong</option>
													</select>
												  </div>
												</div>
											</div>
										<?php 
										}
									}
								}
								?>
							</div>
							
						<?php 
						// IMAGES //
							$images = $this->libraries->getImagesByParagraphPageID( $page_id, $paragraph_id );
							?>
							<div class="imageblock-sample" id="id_div_image_pr<?php echo ($cnt_pr+1);?>">
							<?php 
							if(count($images)>0) {
								$cnt_img=0;
								foreach($images as $image) {
									$cnt_img++;?>
									<div class="control-group" id="<?php echo "id_div_image_pr".($cnt_pr+1)."img".$cnt_img;?>">
									  <label class="control-label" for="">Select Image</label>
									  <div class="controls">
										<input type="file" name="userfile[<?php echo $paragraph_id;?>][<?php echo $image['paragraph_image_id'];?>]" id="userfile_pr<?php echo ($cnt_pr+1);?>img1" class="input-xlarge"/>
										<?php if( file_exists(FCPATH.$this->path_upload_paragraph_images.$image['image']) ) { ?>
											<a title="Click to see full image" class="fancybox-media" href="<?php echo $base.$this->path_upload_paragraph_images.$image['image'];?>" data-fancybox-group="gallery">
											<img class="w200" src="<?php echo $base.$this->path_upload_paragraph_images.$image['image'];?>">
											</a>
											<a href="javascript:void(0);" onclick="javascript:deleteS1Module('<?php echo $image['paragraph_image_id'];?>', 'image');">Delete Image</a>
										<?php
										}?>
									  </div>
									  <?php 
									  if( $show_desc ) {?>
									  <div class="controls">
										<textarea id="<?php echo "description_pr.".($cnt_pr+1)."imgdesc".$cnt_img;?>" name="description_img[<?php echo $paragraph_id;?>][<?php echo $image['paragraph_image_id'];?>]" placeholder="Image Description" class="content-editor"><?php echo $image['image_description'];?></textarea>
										<div id="cnt_primgdesc<?php echo $image['paragraph_image_id'];?>"></div>
									  </div>
										<?php
									  }?>
									</div>
									<?php 
								}
							}?>
							</div>
						<?php 
						// VIDEOS //
							$videos = $this->libraries->getVideosByParagraphPageID( $page_id, $paragraph_id );?>
							<div class="videoblock-sample" id="id_div_video_pr<?php echo ($cnt_pr+1);?>">
							<?php 
							if(count($videos)>0) {
								$cnt_video=0;
								foreach($videos as $video) {?>
									<div class="control-group" id="<?php echo "id_div_video_pr".($cnt_pr+1)."vid".$cnt_video;?>">
									  <label class="control-label" for="">Enter Video Link</label>
									  <div class="controls">
										<input id="paragraph_video_pr<?php echo ($cnt_pr+1);?>vid1" name="paragraph_video[<?php echo $paragraph_id;?>][<?php echo $video['paragraph_video_id'];?>]" type="text" placeholder="Type in Video" class="input-xlarge" value="<?php echo $video['video'];?>"/>
										<?php 
										if( $video['video'] ) {?>
											<a class="fancybox fancybox.iframe" href="<?php echo $video['video'];?>?autoplay=1">See Video</a>&nbsp;|&nbsp;<a href="javascript:void(0);" onclick="javascript:deleteS1Module('<?php echo $video['paragraph_video_id'];?>', 'video');">Delete Video</a>
											<?php 
										}?>
									  </div>
									<?php 
									if( $show_desc ) {?>
										  <div class="controls">
											<textarea  id="<?php echo "description_pr".($cnt_pr+1)."viddesc".$cnt_video;?>" name="description_vid[<?php echo $paragraph_id;?>][<?php echo $video['paragraph_video_id'];?>]" placeholder="Video Description" class="content-editor"><?php echo $video['video_description'];?></textarea>
											<div id="cnt_prviddesc<?php echo $video['paragraph_video_id'];?>"></div>
										  </div>										
										<?php 
									}
									?>
									</div>
									<?php
									$cnt_video++;
								}
							}?>
							</div>
						

						<div class="textright mart10">
							<div style=" display:inline	"></div>
							<input type="button" class="btn btn-warning btn-add-question" value="Add Question" onclick="javascript: addMoreQuestion(<?php echo ($cnt_pr+1);?>, '<?php echo $paragraph_id;?>');" />
							<input type="button" class="btn btn-warning btn-add-image" value="Add Image" onclick="javascript: addMoreImage('<?php echo ($cnt_pr+1);?>', '<?php echo $paragraph_id;?>', '<?php echo $show_desc;?>');" />
							<input type="button" class="btn btn-warning btn-add-video" value="Add Video" onclick="javascript: addMoreVideo(<?php echo ($cnt_pr+1);?>, '<?php echo $paragraph_id;?>','<?php echo $show_desc;?>');" />
						</div>
					</div>
					</td>
				</tr>
				<tr><td>&nbsp;</td></tr>
			<?php 
			}?>
			</table>
			<div class="mart10">
				<div style=" display:inline	">* - required fields</div>
				<input type="submit" class="btn btn-info" name="submit" value="Save" />
				<input type="button" name="cancel" value="Cancel" class="btn btn-cancel"/> 
				<input type="hidden" name="page_id" value="<?php echo $page[0]['page_id'];?>" />
				<input type="hidden" name="lib_id" value="<?php echo $page[0]['library_id'];?>" />
			</div>
		</fieldset>
    </form>
    </div>    
</div>

<script type="text/javascript" src="<?php echo $base;?>js/common.js"></script>
    <script type="text/javascript">
	$(document).ready(function () {
        $(document).on('change', 'div.answerblock .answer', function(){
            if($(this).parent().parent().parent().parent().find('select').size()<4){
                var obj = $(this).parent().parent().parent().parent(); 
                $(this).parent().parent().parent().clone().appendTo(obj).find('input').val('');
                $(this).removeClass('answer');                 
            }
        })
        $('input[type=submit]').click(function(e){
            $validate = 1;
            $('.questionblock').each(function(){
                $right = 0;
                $(this).find('select').each(function(){
                    if($(this).val()==1)
                        $right++;
                })
                if($right>1){
                    $validate = 0;
                }
            })
            if($validate<1){
                e.preventDefault();
                alert('Please check answers for each question. One question can only have one correct answer.');
            }            
        })
		
		$('.btn-cancel').click(function(){
		if(confirm("Are you sure you want to cancel the changes?")){
			window.location.replace("<?php echo $base;?>admin/library_pages?lib=<?php echo $page[0]['library_id'];?>&page=<?php echo $_GET['pgnumber'];?>");
		}
	}) 	
    }); 
    </script>
<?php $this->load->view('footer_admin'); ?>