	<div id="id_dashboard" class="modal_getstarted modal hide fade info-item" pointpage_section_id="23" tabindex="-1"  role="dialog" aria-labelledby="myModalLabel" >
      	<div class="modal-header bg-red text-right">
            <span class="modal-header-h3 pull-left">DASHBOARD</span>
			<!--**translate element begins**-->
            <span id="google_translate_element"><?php $this->common->callLanguageSelectBox("cmb_liblang_dashboard", $to_lang);?></span>
			<!--**translate element ends**-->            
        </div>
		<div class="modal-body" id="body1">
       		<center>
                <div class="flexslider flexslider_info">
                    <ul class="slides model_dashboard">
						<?php 
						echo '<li class="en1 slides-li" style="display:block;">';
						$desc1 = '<img src="'.$base.$this->path_img_getstarted."slides/slide-1-1.jpg".'"/>';
						$desc1 .= '<p class="s1content_body_title "><strong>Welcome to S1</strong></p>';
						$desc1 .= '<p class="s1content_body_section_left">The Health and Safety System designed for:</p>';
						$desc1 .= '<ul class="s1content_body_section_left">';
						$desc1 .= '<li><img src="'.$base.$this->path_img_getstarted."profiles/worker_letter.png".'" class="profile_letter" alt="Worker" />';
						$desc1 .= '<span>Workers: Learn, Stay Safe, Earn Points, Access S1 Rewards</span>';
						$desc1 .= '</li>';
						$desc1 .= '<li><img src="'.$base.$this->path_img_getstarted."profiles/employer_letter.png".'" class="profile_letter" alt="Employer" /> Employers: The first Incentive based H&S Digital Due Diligence and Communication System </li>';
						$desc1 .= '<li><img src="'.$base.$this->path_img_getstarted."profiles/union_letter.png".'" class="profile_letter" alt="Union" /> Unions: Contact Us for System Upgrades to the way you Train and Communicate with your Members </li>';
						$desc1 .= '<li><img src="'.$base.$this->path_img_getstarted."profiles/consultant_letter.png".'" class="profile_letter" alt="Consultant" /> Consultants: Upgrade the Way you manage and Enforce Health and Safety for your Clients </li>';
						$desc1 .= '</ul><p class="s1content_body_section">S1---- For Workers By Workers</p>';						
						// echo googletranslatetool::translate($desc1, $from_lang, $to_lang);
						echo '</li>';
						
                        echo '<li class="en2 slides-li" style="display:block;">';
                        $desc2 = '<img src="'.$base.$this->path_img_getstarted."slides/slide-1-2.jpg".'">';
                        $desc2 .= '<p class="s1content_body_title" >Dashboard Navigation</p>';
                        $desc2 .= '<ul class="s1content_ul_disc text-left">';
                        $desc2 .= '<li>Learn about Ontario’s Health and Safety Network</li>';
                        $desc2 .= '<li>Access available Stats on Enforcement</li>';
                        $desc2 .= '<li>Earn Points in our Digital Hazard and Fatality Breakdown sections</li>';
                        $desc2 .= '<li>Description description description description 1 description description </li>';
                        $desc2 .= '</ul>';
                        $desc2 .= '<p class="s1content_body_section_left icon_height"><img src="'.$base.$this->path_img_getstarted."slides/number_1.png".'" class="getstart_number"  /> Navigation Bar and S1 Tools</p>';
                        $desc2 .= '<p class="s1content_body_section_left icon_height"><img src="'.$base.$this->path_img_getstarted."slides/number_2.png".'" class="getstart_number"  /> Profile Info Bar</p>';
                        $desc2 .= '<p class="s1content_body_section_left icon_height"><img src="'.$base.$this->path_img_getstarted."slides/number_3.png".'"  class="getstart_number"  /> Dashboard Feature</p>';
                        echo '</li>';

                        echo '<li class="en3 slides-li" style="display:block;">';
                        $desc3 = '<img src="'.$base.$this->path_img_getstarted."slides/slide-1-3.jpg".'">';
                        $desc3 .= '<p class="s1content_body_title" >Easy to use Site Navigation Toolbar to access various system components</p>';
                        $desc3 .= '<p class="s1content_body_section_left icon_height"><img src="'.$base.$this->path_img_getstarted."slides/number_1.png".'" class="getstart_number"  /> Navigation Bar and S1 Tools</p>';
                        $desc3 .= '<p class="s1content_body_section_left icon_height"><img src="'.$base.$this->path_img_getstarted."slides/number_2.png".'" class="getstart_number"  /> Search for various User Types </p>';
                        $desc3 .= '<p class="s1content_body_section_left icon_height"><img src="'.$base.$this->path_img_getstarted."slides/number_3.png".'" class="getstart_number" />Search Bar by Name</p>';
                        echo '</li>';
						
                        echo '<li class="en4 slides-li" style="display:block;">';
						$desc4 = '<img src="'.$base.$this->path_img_getstarted."slides/slide-1-4.jpg".'" alt="S1 Profile Information" >';
                        $desc4 .= '<p class="s1content_body_title" >Features and Opportunities</p>';
                        $desc4 .= '<p class="s1content_body_section_left icon_height"><img src="'.$base.$this->path_img_getstarted."slides/number_1.png".'" class="getstart_number"  /> Additional Dashboard Features</p>';
                        $desc4 .= '<p class="s1content_body_section_left icon_height"><img src="'.$base.$this->path_img_getstarted."slides/number_2.png".'" class="getstart_number"  /> Advertising Opportunities</p>';
                        $desc4 .= '<p class="s1content_body_section_left icon_height"><img src="'.$base.$this->path_img_getstarted."slides/number_3.png".'" class="getstart_number"  />Advertising Opportunities</p>';
                        echo '</li>';
						?>
                    </ul>
		        </div>
               </center>
            </div>
            <div class="modal-footer"><button class="btn btn-close" data-dismiss="modal">Close</button></div>
		</div>
		<script type="text/javascript">
			function callModelDashboard()
			{
				$from_lang 	= '<?php echo $from_lang;?>';
				$to_lang 	= $("#cmb_liblang_dashboard").val();
				if( $to_lang != '' ) {
					$.post(js_base_path+'ajax/getTranslatedText', {'translateSection':"s1_library", 'isPlainText':'1', 'paragraphDescription':'<?php echo $desc1;?>', 'fromLang':$from_lang,'toLang':$to_lang}, 
					function(data) { $("ul.model_dashboard li.en1").html(data); });

					$.post(js_base_path+'ajax/getTranslatedText', {'translateSection':"s1_library", 'isPlainText':'1', 'paragraphDescription':'<?php echo $desc2;?>', 'fromLang':$from_lang,'toLang':$to_lang}, 
					function(data) { $("ul.model_dashboard li.en2").html(data); });

					$.post(js_base_path+'ajax/getTranslatedText', {'translateSection':"s1_library", 'isPlainText':'1', 'paragraphDescription':'<?php echo $desc3;?>', 'fromLang':$from_lang,'toLang':$to_lang}, 
					function(data) { $("ul.model_dashboard li.en3").html(data); });

					$.post(js_base_path+'ajax/getTranslatedText', {'translateSection':"s1_library", 'isPlainText':'1', 'paragraphDescription':'<?php echo $desc4;?>', 'fromLang':$from_lang,'toLang':$to_lang}, 
					function(data) { $("ul.model_dashboard li.en4").html(data); });
				}
			}
			$('#cmb_liblang_dashboard').change(function(){ callModelDashboard(); });
		</script>