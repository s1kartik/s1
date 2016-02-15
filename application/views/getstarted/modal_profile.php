<div id="id_profile" class="modal_getstarted modal hide fade info-item " pointpage_section_id="24" tabindex="-1"  role="dialog" aria-labelledby="myModalLabel" >
      <!--class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="cursor:pointer;"-->
      	<div class="modal-header bg-red text-right">
            <span class="modal-header-h3 pull-left">PROFILE HOME</span>
                        <!--**translate element begins**-->
            <span id="google_translate_element"><?php echo $this->common->callLanguageSelectBox("cmb_liblang_profile", $to_lang, 's1select_translate_box');?></span>
			<!--**translate element ends**-->
        </div>
       <div class="modal-body" id="body1"  >
       		<center>
                <div class="flexslider flexslider_info" >
                    <ul class="slides modal_profile">
						<?php 
                        echo '<li class="en1 slides-li" style="display:block;">';
						$desc1 = '<img src="'.$base.$this->path_img_getstarted."slides/slide-2-1.jpg".'"/>';
                        $desc1 .= '<p class="s1content_body_title "><strong>Profile Home</strong></p>';
                        $desc1 .= '<p class="s1content_body_section_left icon_height"><img src="'.$base.$this->path_img_getstarted."profiles/employer_letter.png".'" class="profile_letter" alt="Employer" /> Profile Home is a Health and Safety Command Center for your Business</p>';
                        $desc1 .= '<p class="s1content_body_section_left">Get connected, create H&S programs, Communicate, Assign, Track, Build DIGITAL DUE DILIGENCE</p>';
                        $desc1 .= '<p class="s1content_body_section_left icon_height"><img src="'.$base.$this->path_img_getstarted."profiles/worker_letter.png".'" class="profile_letter" alt="Worker" /> Profile Home is the workers H&S Command Center</p>';
                        $desc1 .= '<p class="s1content_body_section_left">Connect to your Employer, Earn Points, Stay Safe, Level Up, Earn Rewards</p>';
                        $desc1 .= '<p class="s1content_body_section_left icon_height"><img src="'.$base.$this->path_img_getstarted."slides/number_1.png".'" class="getstart_number"  /> 	Profile Settings</p>';
                        $desc1 .= '<p class="s1content_body_section_left icon_height"><img src="'.$base.$this->path_img_getstarted."slides/number_2.png".'" class="getstart_number"  /> 	View Connections</p>';
                        $desc1 .= '<p class="s1content_body_section_left icon_height"><img src="'.$base.$this->path_img_getstarted."slides/number_3.png".'" class="getstart_number"  />	View D.R.O.T (Digital Records of Training)</p>';
                        $desc1 .= '<p class="s1content_body_section_left icon_height"><img src="'.$base.$this->path_img_getstarted."slides/number_4.png".'" class="getstart_number"  />	My Wallet</p>';
                        $desc1 .= '<p class="s1content_body_section_left icon_height"><img src="'.$base.$this->path_img_getstarted."slides/number_5.png".'" class="getstart_number"  />	Getting Started (system Tutorial)</p>';
                        echo '</li>';
						
                        echo '<li class="en2 slides-li" style="display:block;">';
                        $desc2 = '<img src="'.$base.$this->path_img_getstarted."slides/slide-2-2.jpg".'" >';
                        $desc2 .= '<p class="s1content_body_title" >Profile Home</p>';
                        $desc2 .= '<p class="s1content_body_section_left icon_height"><img src="'.$base.$this->path_img_getstarted."slides/number_1.png".'" class="getstart_number"  /> 	Access your H&S Program</p>';
                        $desc2 .= '<p class="s1content_body_section_left icon_height"><img src="'.$base.$this->path_img_getstarted."slides/number_2.png".'" class="getstart_number"  /> 	Access S1 H&S Content</p>';
                        $desc2 .= '<p class="s1content_body_section_left icon_height"><img src="'.$base.$this->path_img_getstarted."slides/number_3.png".'" class="getstart_number"  />	Access Reward System</p>';
                        $desc2 .= '<p class="s1content_body_section_left icon_height"><img src="'.$base.$this->path_img_getstarted."slides/number_4.png".'" class="getstart_number"  />	Internal Messaging and Communication System</p>';
                        $desc2 .= '<p class="s1content_body_section_left icon_height"><img src="'.$base.$this->path_img_getstarted."slides/number_5.png".'" class="getstart_number"  />	Hazard Alerts Sent Directly to You</p>';
                        echo '</li>';
						
                        echo '<li class="en3 slides-li" style="display:block;">';
						$desc3 = '<img src="'.$base.$this->path_img_getstarted."slides/slide-2-3.jpg".'"  >';
                        $desc3 .= '<p class="s1content_body_title" >Profile Home</p>';
                        $desc3 .= '<p class="s1content_body_section_left">The S1 Reward system provides Awesome Discounts to items and Attractions in Ontario</p>';
                        $desc3 .= '<p class="s1content_body_section_left">ITS Time To LEVEL UP!!!</p>';
                        $desc3 .= '<p class="s1content_body_section_left icon_height"><img src="'.$base.$this->path_img_getstarted."profiles/worker_letter.png".'" class="profile_letter" alt="Worker" /> Were giving workers another Reason to work safe</p>';
                        $desc3 .= '<p class="s1content_body_section_left">Watch Videos, Learn about Health and Safety, Completed assigned Tasks Earn POINTS and Level Up and Access S1 Rewards System.</p>';
                        $desc3 .= '<p class="s1content_body_section_left icon_height"><img src="'.$base.$this->path_img_getstarted."profiles/employer_letter.png".'" class="profile_letter" alt="Employer" /> Implement your own rewards system in your workplace and give your workers another reason to Stay Safe</p>';
                        $desc3 .= '<p class="s1content_body_section_left">Unlock your code and search for discounts (Additional Profile creation Required)</p>';
                        $desc3 .= '<p class="s1content_body_section_left">“Saving Money is almost as Good as Making Money”</p>';
                        echo '</li>';
						
                        echo '<li class="en4 slides-li" style="display:block;">';
						$desc4 = '<img src="'.$base.$this->path_img_getstarted."slides/slide-2-4.jpg".'" alt="S1 Profile Information" >';
                        $desc4 .= '<p class="s1content_body_title" >Profile Home</p>';
                        $desc4 .= '<p class="s1content_body_section_left icon_height"><img src="'.$base.$this->path_img_getstarted."slides/number_1.png".'" class="getstart_number"  /> 	Profile Info (The more we know about you, the better we can customize Health and Safety Information specifically for your industry and sector)</p>';
                        $desc4 .= '<p class="s1content_body_section_left icon_height"><img src="'.$base.$this->path_img_getstarted."slides/number_2.png".'" class="getstart_number"  /> 	Control Credits and Purchases</p>';
                        $desc4 .= '<p class="s1content_body_section_left icon_height"><img src="'.$base.$this->path_img_getstarted."slides/number_3.png".'" class="getstart_number"  />	Review your Data</p>';
                        $desc4 .= '<p class="s1content_body_section_left icon_height"><img src="'.$base.$this->path_img_getstarted."slides/number_4.png".'" class="getstart_number"  />	Search and Connect to your  Union</p>';
                        $desc4 .= '<p class="s1content_body_section_left icon_height"><img src="'.$base.$this->path_img_getstarted."slides/number_5.png".'" class="getstart_number"  />	Know Your Rights ( All workplace Parties have Duties and Responsibilities in Ontario)</p>';
                        $desc4 .= '<p class="s1content_body_section_left icon_height"><img src="'.$base.$this->path_img_getstarted."slides/number_6.png".'" class="getstart_number" />	Access Skilled Job Section ( Learn about the various types of Skilled Jobs in Ontario)</p>';
                        echo '</li>';
						
                        echo '<li class="en5 slides-li" style="display:block;">';
						$desc5 = '<img src="'.$base.$this->path_img_getstarted."slides/slide-2-5.jpg".'" alt="S1 Profile Information" >';
                        $desc5 .= '<p class="s1content_body_title" >Profile Home</p>';
                        $desc5 .= '<p class="s1content_body_section_left">Build Your Profile</p>';
                        $desc5 .= '<p class="s1content_body_section_left">The More we know about you the better we can customize H&S content and Alerts to keep you Safe</p>';
                        $desc5 .= '<p class="s1content_body_section_left icon_height"><img src="'.$base.$this->path_img_getstarted."slides/number_1.png".'" class="getstart_number"  /> Update Personal Info</p>';
                        $desc5 .= '<p class="s1content_body_section_left icon_height"><img src="'.$base.$this->path_img_getstarted."slides/number_2.png".'" class="getstart_number"  /> Update Professional Info</p>';
                        echo '</li>';

                        echo '<li class="en6 slides-li" style="display:block;">';
                        $desc6 = '<img src="'.$base.$this->path_img_getstarted."slides/slide-2-6.jpg".'" alt="S1 Profile Information" >';
						$desc6 .= '<p class="s1content_body_title" >Profile Home</p>';
                        echo '</li>';
						?>
                    </ul>                    
		        </div>
               </center>
            </div>
            <div class="modal-footer"><button class="btn btn-close" data-dismiss="modal">Close</button></div>
      </div> 

		<script type="text/javascript">
			function callModelProfile() 
			{
				$from_lang 	= '<?php echo $from_lang;?>';
				$to_lang 	= $("#cmb_liblang_profile").val();
				if( $to_lang != '' ) {
					$.post(js_base_path+'ajax/getTranslatedText', {'translateSection':"s1_library", 'isPlainText':'1', 'paragraphDescription':'<?php echo $desc1;?>', 'fromLang':$from_lang,'toLang':$to_lang}, 
					function(data) { $("ul.modal_profile li.en1").html(data); });

					$.post(js_base_path+'ajax/getTranslatedText', {'translateSection':"s1_library", 'isPlainText':'1', 'paragraphDescription':'<?php echo $desc2;?>', 'fromLang':$from_lang,'toLang':$to_lang}, 
					function(data) { $("ul.modal_profile li.en2").html(data); });

					$.post(js_base_path+'ajax/getTranslatedText', {'translateSection':"s1_library", 'isPlainText':'1', 'paragraphDescription':'<?php echo $desc3;?>', 'fromLang':$from_lang,'toLang':$to_lang}, 
					function(data) { $("ul.modal_profile li.en3").html(data); });

					$.post(js_base_path+'ajax/getTranslatedText', {'translateSection':"s1_library", 'isPlainText':'1', 'paragraphDescription':'<?php echo $desc4;?>', 'fromLang':$from_lang,'toLang':$to_lang}, 
					function(data) { $("ul.modal_profile li.en4").html(data); });
					
					$.post(js_base_path+'ajax/getTranslatedText', {'translateSection':"s1_library", 'isPlainText':'1', 'paragraphDescription':'<?php echo $desc5;?>', 'fromLang':$from_lang,'toLang':$to_lang}, 
					function(data) { $("ul.modal_profile li.en5").html(data); });
					
					$.post(js_base_path+'ajax/getTranslatedText', {'translateSection':"s1_library", 'isPlainText':'1', 'paragraphDescription':'<?php echo $desc6;?>', 'fromLang':$from_lang,'toLang':$to_lang}, 
					function(data) { $("ul.modal_profile li.en6").html(data); });
				}
			}
			$('#cmb_liblang_profile').change(function(){ callModelProfile(); });
		</script>
