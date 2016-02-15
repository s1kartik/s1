
	<div id="id_hsprogram" class="modal_getstarted modal hide fade info-item " pointpage_section_id="27" tabindex="-1"  role="dialog" aria-labelledby="myModalLabel" >
    
      	<div class="modal-header bg-red text-right">
            
            <span class="modal-header-h3 pull-left">H&S PROGRAM</span>
                        <!--**translate element begins**-->
            <span id="google_translate_element">
				<?php echo $this->common->callLanguageSelectBox("cmb_liblang_hsprogram", $to_lang, 's1select_translate_box');?>
            </span>
			<!--**translate element ends**-->          
        </div>
       <div class="modal-body" id="body1">
       		<center>
                <div class="flexslider flexslider_info" >
                    <ul class="slides model_hsprogram">
						<?php 
                        echo '<li class="en1 slides-li" style="display:block;">';
						$desc1 = '<img src="'.$base.$this->path_img_getstarted."slides/slide-5-1.jpg".'"/>';
						$desc1 .= '<p class="s1content_body_title "><strong>Health and Safety Program</strong></p>';
						$desc1 .= '<p class="s1content_body_section_left icon_height"><img src="'.$base.$this->path_img_getstarted."profiles/employer_letter.png".'" class="profile_letter" alt="Employer" /> Access the S1 Library to start building your Custom H&S Program(looking for something we don’t have? Contact us and we’ll build it for you) or If you currently have a H&S Program contact us to Upload it to your system</p>';
						$desc1 .= '<p class="s1content_body_section_left">Add interactive animations and Multi Languages to your H&S Program (optional)</p>';
						$desc1 .= '<p class="s1content_body_section_left">Purchase Functions to perform Safety Talks/Inspections/Investigations and Procedures</p>';
						$desc1 .= '<p class="s1content_body_section_left icon_height"><img src="'.$base.$this->path_img_getstarted."slides/number_1.png".'" class="getstart_number"  />  Filter S1 Library</p>';
						$desc1 .= '<p class="s1content_body_section_left icon_height"><img src="'.$base.$this->path_img_getstarted."slides/number_2.png".'" class="getstart_number"  />  Sections of Content</p>';
						$desc1 .= '<p class="s1content_body_section_left icon_height"><img src="'.$base.$this->path_img_getstarted."slides/number_3.png".'" class="getstart_number"  /> Available content</p>';
                        echo '</li>';
						
                        echo '<li class="en2 slides-li" style="display:block;">';
                        $desc2 = '<img src="'.$base.$this->path_img_getstarted."slides/slide-5-2.jpg".'" >';
                        $desc2 .= '<p class="s1content_body_title" >Health and Safety Program - Animations</p>';
                        echo '</li>';
						
                        echo '<li class="en3 slides-li" style="display:block;">';
						$desc3 .= '<img src="'.$base.$this->path_img_getstarted."slides/slide-5-3.jpg".'"  >';
						$desc3 .= '<p class="s1content_body_title "><strong>Health and Safety Program</strong></p>';
						$desc3 .= '<p class="s1content_body_section_left">See Descriptions of Content prior to Purchasing</p>';
						$desc3 .= '<p class="s1content_body_section_left icon_height"><img src="'.$base.$this->path_img_getstarted."slides/number_1.png".'" class="getstart_number"  /> 	S1 Library Section</p>';
						$desc3 .= '<p class="s1content_body_section_left icon_height"><img src="'.$base.$this->path_img_getstarted."slides/number_2.png".'" class="getstart_number"  /> 	Click for more Info on content</p>';
                        echo '</li>';
						
                        echo '<li class="en4 slides-li" style="display:block;">';
						$desc4 = '<img src="'.$base.$this->path_img_getstarted."slides/slide-5-4.jpg".'" alt="S1 Profile Information" >';
						$desc4 .= '<p class="s1content_body_title "><strong>Health and Safety Program</strong></p>';
						$desc4 .= '<p class="s1content_body_section_left icon_height"><img src="'.$base.$this->path_img_getstarted."profiles/employer_letter.png".'" class="profile_letter" alt="Employer" /> Build your custom H&S program</p>';
						$desc4 .= '<p class="s1content_body_section_left">Train/Assign to your Workers</p>';
						$desc4 .= '<p class="s1content_body_section_left icon_height"><img src="'.$base.$this->path_img_getstarted."slides/number_1.png".'" class="getstart_number"  /> 	Type of Content in your H&S Program</p>';
						$desc4 .= '<p class="s1content_body_section_left icon_height"><img src="'.$base.$this->path_img_getstarted."slides/number_2.png".'" class="getstart_number"  /> 	View Completed/Assigned/Purchased</p>';
						$desc4 .= '<p class="s1content_body_section_left icon_height"><img src="'.$base.$this->path_img_getstarted."slides/number_3.png".'" class="getstart_number"  />	Number of Items available (Based on Number of Workers to assign Content)</p>';
						echo '</li>';
						?>
                    </ul>        
		        </div>
               </center>
            </div>
            <div class="modal-footer"><button class="btn btn-close" data-dismiss="modal">Close</button></div>
		</div> 
		<script type="text/javascript">
			function callModelHSprogram()
			{
				$from_lang 	= '<?php echo $from_lang;?>';
				$to_lang 	= $("#cmb_liblang_hsprogram").val();

				if( $to_lang != '' ) {
					$.post(js_base_path+'ajax/getTranslatedText', {'translateSection':"s1_library", 'isPlainText':'1', 'paragraphDescription':'<?php echo $desc1;?>', 'fromLang':$from_lang,'toLang':$to_lang}, 
					function(data) { $("ul.model_hsprogram li.en1").html(data); });

					$.post(js_base_path+'ajax/getTranslatedText', {'translateSection':"s1_library", 'isPlainText':'1', 'paragraphDescription':'<?php echo $desc2;?>', 'fromLang':$from_lang,'toLang':$to_lang}, 
					function(data) { $("ul.model_hsprogram li.en2").html(data); });
					
					$.post(js_base_path+'ajax/getTranslatedText', {'translateSection':"s1_library", 'isPlainText':'1', 'paragraphDescription':'<?php echo $desc3;?>', 'fromLang':$from_lang,'toLang':$to_lang}, 
					function(data) { $("ul.model_hsprogram li.en3").html(data); });
					
					$.post(js_base_path+'ajax/getTranslatedText', {'translateSection':"s1_library", 'isPlainText':'1', 'paragraphDescription':'<?php echo $desc4;?>', 'fromLang':$from_lang,'toLang':$to_lang}, 
					function(data) { $("ul.model_hsprogram li.en4").html(data); });
				}
			}
			$('#cmb_liblang_hsprogram').change(function(){ callModelHSprogram(); });
		</script>
        