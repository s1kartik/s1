<?php $this->load->view('header_admin'); 
$paragraph_description = $this->libraries->getParagraphsOfLibrary( $_GET['lib'] );
?>
<script type="text/javascript" src="<?php echo $base;?>js/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="<?php echo $base;?>js/regulation.js"></script>
<script type="text/javascript" src="<?php echo $base;?>js/library.js"></script>
<script type="text/javascript">getTinymceEditor();</script>
<div class="info-container">
<div class="document-content">
    <form class="form-horizontal adminfrm" enctype="multipart/form-data" method="post" action="">
        <fieldset>
            <!-- Form Name -->
            <legend>New Page in <?php echo $library['title'];?></legend>
				<input type="hidden" name="hidn_paragraph_section" id="hidn_paragraph_section" value="1">
				<input type="hidden" name="hidn_paragraph_question" id="hidn_paragraph_question" value="1">
				<input type="hidden" name="hidn_paragraph_image" id="hidn_paragraph_image" value="1">
				<input type="hidden" name="hidn_paragraph_video" id="hidn_paragraph_video" value="1">
				
				<table align="center" id="id_tbl_paragraph" width="100%">
				<tr id="id_tr_paragraph1">
					<td>
					<div class="paragraphblock-sample" id="id_div_paragraph1"> 
						<div id="id_div_pr1title1">
							<div class="control-group">
							  <label class="control-label" for="">Enter Title</label>
							  <div class="controls">
								<input id="title_pr1title1" name="paragraph_title[pr1][]" type="text" placeholder="Type Paragraph Title" class="input-xlarge">
							  </div>
							</div>
						</div>
						
						<div id="id_div_pr1subtitle1">
							<div class="control-group">
							  <label class="control-label" for="">Enter Sub-Title</label>
							  <div class="controls">
								<input id="title_pr1subtitle1" name="paragraph_subtitle[pr1][]" type="text" placeholder="Type Paragraph Sub-Title" class="input-xlarge">
							  </div>
							</div>
						</div>
						
						<?php if(isset($paragraph_description) && $paragraph_description ) {
						?>
							<div class="control-group">
								<label class="control-label" for="">Previous Description</label>
								<div class="controls">
								<?php echo $paragraph_description;?>
								</div>
							</div>
						<?php
						}
						?>

						<div class="descblock-sample" id="id_div_desc_pr1desc1">
							<div class="control-group">
							  <label class="control-label" for="">Description</label>
							  <div class="controls">
								<textarea id="description_pr1desc1" name="description[pr1][]" placeholder="Type in the Description for the Paragraph" class="content-editor"></textarea>
								<div id="cnt_prdesc1"></div>
							  </div>
							</div>
						</div>

						<div class="questionblock-sample" id="id_div_question_pr1">
							<div id="id_div_pr1ques1">
								<div class="control-group">
								  <label class="control-label" for="">Enter Question</label>
								  <div class="controls">
									<input id="question_pr1ques1" name="question[pr1][]" type="text" placeholder="Type in Question" class="input-xlarge"/>
								  </div>
								</div>
								
								<div class="answerblock">
									<div class="control-group">
									  <label class="control-label" for="">Enter Answer</label>
									  <div class="controls">
										<input id="answer_pr1choice1" name="choice[pr1][ques1][]" type="text" placeholder="Type First Answer" class="input-xlarge"/>
									  </div>
									</div>
									<div class="control-group">
									  <label class="control-label">Is Answer: Right or Wrong</label>
									  <div class="controls">
										<select id="answer_pr1ans1" name="answer[pr1][ques1][]" class="input-xlarge answer">
											<option value="">-select-</option>
											<option value="1">Right</option>
											<option value="0">Wrong</option>
										</select>
									  </div>
									</div>
								</div>
							</div>
						</div>
			
						<div class="imageblock-sample" id="id_div_image_pr1">
							<!-- Text input-->
							<div class="control-group" id="id_div_image_pr1img1">
							  <label class="control-label" for="">Select Image</label>
							  <div class="controls">
								<input type="file" name="userfile[pr1][new][]" id="userfile_pr1img1" class="input-xlarge"/>
							  </div>
							  <?php 
								if( $show_desc ) {?>
								  <div class="controls">
									<textarea id="description_pr1imgdesc1" name="description_img[pr1][]" placeholder="Image Description" class="content-editor"></textarea>
									<div id="cnt_primgdesc1"></div>
								  </div>
								 <?php
								}?>
							</div>
						</div>
						
						<div class="videoblock-sample" id="id_div_video_pr1">
							<!-- Text input-->
							<div class="control-group" id="id_div_video_pr1vid1">
							  <label class="control-label" for="">Enter Video Link</label>
							  <div class="controls">
								<input id="paragraph_video_pr1vid1" name="paragraph_video[pr1][]" type="text" placeholder="Type in Video" class="input-xlarge"/>
							  </div>
							  <?php 
							  if( $show_desc ) {?>
							  <div class="controls">
								<textarea id="description_pr1viddesc1" name="description_vid[pr1][]" placeholder="Video Description" class="content-editor"></textarea>
								<div id="cnt_prviddesc1"></div>
							  </div>
								<?php
							  }?>
							</div>
						
						<div class="textright mart10">
							<div style=" display:inline	">* - required fields</div>
							<input type="button" class="btn btn-warning btn-add-question" value="Add Question" onclick="javascript: addMoreQuestion(1);" />
							<input type="button" class="btn btn-warning btn-add-image" value="Add Image" onclick="javascript: addMoreImage(1,'','<?php echo $show_desc;?>');" />
							<input type="button" class="btn btn-warning btn-add-video" value="Add Video" onclick="javascript: addMoreVideo(1,'','<?php echo $show_desc;?>');" />
						</div>
					</div>
					</td>
				</tr>
				</table>
		
				<div class="mart10">
					<input type="submit" class="btn btn-info" name="submit" value="Next Page" /> 
					<input type="hidden" name="pn" value="<?php echo $pn;?>" />
					<input type="button" name="cancel" value="Cancel" class="btn btn-cancel" <?php if($pn===1):?>disabled="disabled"<?php endif;?> /> 
					<input type="submit" class="btn" name="submit" value="Finish" />
					<input type="hidden" name="lib_id" value="<?php echo $library['library_id'];?>" />
				</div>
        </fieldset>
    </form>
</div>
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
            if(confirm("Are you sure you want to Delete this page?")){
                window.location.replace("<?php echo $base;?>admin/library");
            }
        })
    });
    </script>    
</div>    
<?php $this->load->view('footer_admin'); ?>