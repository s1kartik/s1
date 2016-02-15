
      <div id="id_due_diligence" class="modal_getstarted modal hide fade info-item " pointpage_section_id="28" tabindex="-1"  role="dialog" aria-labelledby="myModalLabel" >
      	<div class="modal-header bg-red text-right">
           <span class="modal-header-h3 pull-left">DUE DILIGENCE</span>
                        <!--**translate element begins**-->
            <span id="google_translate_element">
            	<?php echo $this->common->callLanguageSelectBox("cmb_liblang_due_diligence", $to_lang, 's1select_translate_box');?>                
            </span>
			<!--**translate element ends**-->
        </div>
       <div class="modal-body" id="body1"  >
       		<center>
                
                <div class="flexslider flexslider_info" >
                    <ul class="slides model_due_diligence">
						<?php 
                        echo '<li class="en1 slides-li" style="display:block;">';
						$desc1 = '<img src="'.$base.$this->path_img_getstarted."slides/slide-6-1.jpg".'"/>';
						$desc1 .= '<p class="s1content_body_title "><strong>Due Diligence – Safety Talks</strong></p>';
						$desc1 .= '<p class="s1content_body_section_left">Purchase and Assign Safety Talks that can be performed via any device (internet Connection required)</p>';
						$desc1 .= '<p class="s1content_body_section_left">Assign to Supervisors and H&S Reps and Track attendees and Completion</p>';
                        echo '</li>';
						
                        echo '<li class="en2 slides-li" style="display:block;">';
						$desc2 = '<img src="'.$base.$this->path_img_getstarted."slides/slide-6-2.jpg".'" >';
						$desc2 .= '<p class="s1content_body_title "><strong>Due Diligence – Custom Procedures</strong></p>';
						$desc2 .= '<p class="s1content_body_section_left">Access S1 Library to Purchase General workplace Procedures</p>';
						$desc2 .= '<p class="s1content_body_section_left">Or Build your own customizable workplace specific procedures </p>';
						$desc2 .= '<p class="s1content_body_section_left">Add-images/video and Multi languages to communicate with your Workers</p>';
                        echo '</li>';
						
                        echo '<li class="en3 slides-li" style="display:block;">';
						$desc3 = '<img src="'.$base.$this->path_img_getstarted."slides/slide-6-3.jpg".'"  >';
						$desc3 .= '<p class="s1content_body_title "><strong>Due Diligence – Custom Procedures</strong></p>';
						$desc3 .= '<p class="s1content_body_section_left">Customizable Procedures allow you to communicate Safe workplace Practices directly to your workers</p>';
                        echo '</li>';
						
                        echo '<li class="en4 slides-li" style="display:block;">';
						$desc4 = '<img src="'.$base.$this->path_img_getstarted."slides/slide-6-4.jpg".'" alt="S1 Profile Information" >';
						$desc4 .= '<p class="s1content_body_title "><strong>Due Diligence – Custom Procedures</strong></p>';
						$desc4 .= '<p class="s1content_body_section_left">Customizable Workplace Inspections that allow for Identification and control of Workplace Hazards and worker compliance with Employer H&S Program</p>';
						$desc4 .= '<p class="s1content_body_section_left">- Assign to Supervisors/H&S Reps or JHSC members</p>';
						$desc4 .= '<p class="s1content_body_section_left">Advanced Inspections also available in the S1 Library for seasoned H&S Professionals to identify Observations and Non-compliance Issues</p>';
                        echo '</li>';
						
                        echo '<li class="en5 slides-li" style="display:block;">';
						$desc5 = '<img src="'.$base.$this->path_img_getstarted."slides/slide-6-5.jpg".'" alt="S1 Profile Information" >';
						$desc5 .= '<p class="s1content_body_title "><strong>Due Diligence – Investigations</strong></p>';
						$desc5 .= '<p class="s1content_body_section_left">Conduct Workplace Investigations when required (Created by former H&S Enforcement officers)</p>';
						$desc5 .= '<p class="s1content_body_section_left">-Detail Incidents</p>';
						$desc5 .= '<p class="s1content_body_section_left">- Take injury Reports</p>';
						$desc5 .= '<p class="s1content_body_section_left">- Witness statements</p>';
						$desc5 .= '<p class="s1content_body_section_left">- Add photos</p>';
						$desc5 .= '<p class="s1content_body_section_left">Export and print</p>';
						$desc5 .= '<p class="s1content_body_section_left">- Purchase and Assign to investigation</p>';
                        echo '</li>';
						
                        echo '<li class="en6 slides-li" style="display:block;">';
						$desc6 = '<img src="'.$base.$this->path_img_getstarted."slides/slide-6-6.jpg".'" alt="S1 Profile Information" >';
						$desc6 .= '<p class="s1content_body_title" >Due Diligence – Data</p>';
						$desc6 .= '<p class="s1content_body_section_left">See Up to date Data on your H&S system</p>';
						$desc6 .= '<p class="s1content_body_section_left icon_height"><img src="'.$base.$this->path_img_getstarted."slides/number_1.png".'" class="getstart_number"  />  Profile Info</p>';
						$desc6 .= '<p class="s1content_body_section_left icon_height"><img src="'.$base.$this->path_img_getstarted."slides/number_2.png".'" class="getstart_number"  />  Levels and Credits</p>';
						$desc6 .= '<p class="s1content_body_section_left icon_height"><img src="'.$base.$this->path_img_getstarted."slides/number_3.png".'" class="getstart_number"  /> H&S Program Data</p>';
                        echo '</li>';
						
                        echo '<li class="en7 slides-li" style="display:block;">';
						$desc7 = '<img src="'.$base.$this->path_img_getstarted."slides/slide-6-7.jpg".'" alt="S1 Profile Information" >';
						$desc7 .= '<p class="s1content_body_title" >Due Diligence – Data</p>';
						$desc7 .= '<p class="s1content_body_section_left">View Completed Purchased and Assigned H&S content</p>';
						$desc7 .= '<p class="s1content_body_section_left icon_height"><img src="'.$base.$this->path_img_getstarted."slides/number_1.png".'" class="getstart_number"  /> Data Summary</p>';
                        echo '</li>';
						?>
                    </ul>
		        </div>
               </center>
            </div>
            <div class="modal-footer"><button class="btn btn-close" data-dismiss="modal">Close</button></div>
		</div> 
		<script type="text/javascript">
			function callModelDueDiligence()
			{
				$from_lang 	= '<?php echo $from_lang;?>';
				$to_lang 	= $("#cmb_liblang_due_diligence").val();

				if( $to_lang != '' ) {
					$.post(js_base_path+'ajax/getTranslatedText', {'translateSection':"s1_library", 'isPlainText':'1', 'paragraphDescription':'<?php echo $desc1;?>', 'fromLang':$from_lang,'toLang':$to_lang}, 
					function(data) { $("ul.model_due_diligence li.en1").html(data); });

					$.post(js_base_path+'ajax/getTranslatedText', {'translateSection':"s1_library", 'isPlainText':'1', 'paragraphDescription':'<?php echo $desc2;?>', 'fromLang':$from_lang,'toLang':$to_lang}, 
					function(data) { $("ul.model_due_diligence li.en2").html(data); });

					$.post(js_base_path+'ajax/getTranslatedText', {'translateSection':"s1_library", 'isPlainText':'1', 'paragraphDescription':'<?php echo $desc3;?>', 'fromLang':$from_lang,'toLang':$to_lang}, 
					function(data) { $("ul.model_due_diligence li.en3").html(data); });

					$.post(js_base_path+'ajax/getTranslatedText', {'translateSection':"s1_library", 'isPlainText':'1', 'paragraphDescription':'<?php echo $desc4;?>', 'fromLang':$from_lang,'toLang':$to_lang}, 
					function(data) { $("ul.model_due_diligence li.en4").html(data); });
					
					$.post(js_base_path+'ajax/getTranslatedText', {'translateSection':"s1_library", 'isPlainText':'1', 'paragraphDescription':'<?php echo $desc5;?>', 'fromLang':$from_lang,'toLang':$to_lang}, 
					function(data) { $("ul.model_due_diligence li.en5").html(data); });
					
					$.post(js_base_path+'ajax/getTranslatedText', {'translateSection':"s1_library", 'isPlainText':'1', 'paragraphDescription':'<?php echo $desc6;?>', 'fromLang':$from_lang,'toLang':$to_lang}, 
					function(data) { $("ul.model_due_diligence li.en6").html(data); });
					
					$.post(js_base_path+'ajax/getTranslatedText', {'translateSection':"s1_library", 'isPlainText':'1', 'paragraphDescription':'<?php echo $desc7;?>', 'fromLang':$from_lang,'toLang':$to_lang}, 
					function(data) { $("ul.model_due_diligence li.en7").html(data); });
				}
			}
			$('#cmb_liblang_due_diligence').change(function(){ callModelDueDiligence(); });
		</script>
        