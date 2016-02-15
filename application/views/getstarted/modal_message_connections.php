
      <div id="id_message_connections" class="modal_getstarted modal hide fade info-item " pointpage_section_id="25" tabindex="-1"  role="dialog" aria-labelledby="myModalLabel" >
      <!--class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="cursor:pointer;"-->
      	<div class="modal-header bg-red text-right">
            
            <span class="modal-header-h3 pull-left">MESSAGE/CONNECTIONS</span>
                <!--**translate element begins**-->
            <span id="google_translate_element">
				<?php echo $this->common->callLanguageSelectBox("cmb_liblang_messeging_connection", $to_lang, 's1select_translate_box');?>
            </span>
			<!--**translate element ends**-->
        </div>
       <div class="modal-body" id="body1"  >
       		<center>
                <div class="flexslider flexslider_info" >
                    <ul class="slides modal_messeging_connection">
						<?php 
                        echo '<li class="en1 slides-li" style="display:block;">';
                        $desc1 = '<img src="'.$base.$this->path_img_getstarted."slides/slide-3-1.jpg".'"/>';
                        $desc1 .= '<p class="s1content_body_title" >Messaging / Connections</p>';
                        $desc1 .= '<p class="s1content_body_section_left">Internal Messaging S1 messaging system: Alerts and Communication</p>';
                        $desc1 .= '<p class="s1content_body_section_left icon_height"><img src="'.$base.$this->path_img_getstarted."profiles/employer_letter.png".'" class="profile_letter" alt="Employer" /> Communicate with your workers, Assign, Complete Tasks</p>';
                        $desc1 .= '<p class="s1content_body_section_left icon_height"><img src="'.$base.$this->path_img_getstarted."slides/number_1.png".'" class="getstart_number"  />  Communicate with your Connections (review Image Box for #1)</p>';
                        $desc1 .= '<p class="s1content_body_section_left icon_height"><img src="'.$base.$this->path_img_getstarted."slides/number_2.png".'" class="getstart_number"  />  Message Box</p>';
                        $desc1 .= '<p class="s1content_body_section_left icon_height"><img src="'.$base.$this->path_img_getstarted."slides/number_3.png".'" class="getstart_number"  /> Message Tiles</p>';
                        echo '</li>';

                        echo '<li class="en2 slides-li" style="display:block;">';
						$desc2 = '<img src="'.$base.$this->path_img_getstarted."slides/slide-3-2.jpg".'" >';
                        $desc2 .= '<p class="s1content_body_title" >Messaging / Connections</p>';
                        $desc2 .= '<p class="s1content_body_section_left">Receive Hazard Alerts From S1 and other High Level Users </p>';
                        $desc2 .= '<p class="s1content_body_section_left">Real time Information/Alerts designed to Provide Emergency Information sent directly to you based on your Industry/Sector  to keep you safe</p>';
                        $desc2 .= '<p class="s1content_body_section_left icon_height"><img src="'.$base.$this->path_img_getstarted."slides/number_1.png".'" class="getstart_number"  />  Filter Hazard Alerts</p>';
                        $desc2 .= '<p class="s1content_body_section_left icon_height"><img src="'.$base.$this->path_img_getstarted."slides/number_2.png".'" class="getstart_number"  />  Access all Hazard Alerts sent to you</p>';
                        $desc2 .= '<p class="s1content_body_section_left icon_height"><img src="'.$base.$this->path_img_getstarted."slides/number_3.png".'" class="getstart_number"  /> View Hazard Alerts</p>';
                        echo '</li>';
						
                        echo '<li class="en3 slides-li" style="display:block;">';
                        $desc3 = '<img src="'.$base.$this->path_img_getstarted."slides/slide-3-3.jpg".'" >';
						$desc3 .= '<p class="s1content_body_title" >Messaging / Connections</p>';
                        $desc3 .= '<p class="s1content_body_section_left">Search  the S1 system to Connect to Employers/ Workers/Unions and Consultants in your Industry</p>';
                        $desc3 .= '<p class="s1content_body_section_left icon_height"><img src="'.$base.$this->path_img_getstarted."profiles/employer_letter.png".'" class="profile_letter" alt="Employer" /> Designate your Connections as ‘’My Workers” to create your digital workforce</p>';
                        $desc3 .= '<p class="s1content_body_section_left">Employers can also connect to Sub-Contractors and Start creating their Network</p>';
                        $desc3 .= '<p class="s1content_body_section_left icon_height"><img src="'.$base.$this->path_img_getstarted."profiles/worker_letter.png".'" class="profile_letter" alt="Worker" /> Get connected to your Employer and Union to receive Health and Safety Information and other Unique Info based on your Union</p>';
                        $desc3 .= '<p class="s1content_body_section_left icon_height"><img src="'.$base.$this->path_img_getstarted."slides/number_1.png".'" class="getstart_number"  />  Search the S1 System</p>';
                        $desc3 .= '<p class="s1content_body_section_left icon_height"><img src="'.$base.$this->path_img_getstarted."slides/number_2.png".'" class="getstart_number"  />  Select Member</p>';
                        $desc3 .= '<p class="s1content_body_section_left icon_height"><img src="'.$base.$this->path_img_getstarted."slides/number_3.png".'" class="getstart_number"  /> Connect or Disconnect features</p>';
                        $desc3 .= '<p class="s1content_body_section_left icon_height"><img src="'.$base.$this->path_img_getstarted."slides/number_4.png".'" class="getstart_number"  /> Assign Contents</p>';
                        echo '</li>';
						
                        echo '<li class="en4 slides-li" style="display:block;">';
						$desc4 = '<img src="'.$base.$this->path_img_getstarted."slides/slide-3-4.jpg".'" alt="S1 Profile Information" >';
                        $desc4 .= '<p class="s1content_body_title" >Messaging / Connections </p>';
                        $desc4 .= '<p class="s1content_body_section_left">Search the System for Members:</p>';
                        $desc4 .= '<p class="s1content_body_section_left icon_height"><img src="'.$base.$this->path_img_getstarted."slides/number_1.png".'" class="getstart_number"  />  Click on image of Member to view Profile ID</p>';
                        $desc4 .= '<p class="s1content_body_section_left icon_height"><img src="'.$base.$this->path_img_getstarted."slides/number_2.png".'" class="getstart_number"  />  Select  Users and send Connection requests</p>';
                        echo '</li>';
						
                        echo '<li class="en5 slides-li" style="display:block;">';
						$desc5 .= '<img src="'.$base.$this->path_img_getstarted."slides/slide-3-5.jpg".'" alt="S1 Profile Information" >';
						$desc5 .= '<p class="s1content_body_title" >Messaging / Connections </p>';
                        $desc5 .= '<p class="s1content_body_section_left">Profile Information will register On your Profile ID Card which will allow other members to identify you during connection searches</p>';
                        $desc5 .= '<p class="s1content_body_section_left icon_height"><img src="'.$base.$this->path_img_getstarted."slides/number_1.png".'" class="getstart_number"  /> 	Profile ID Card Info</p>';
                        echo '</li>';
						
                        echo '<li class="en6 slides-li" style="display:block;">';
						$desc6 = '<img src="'.$base.$this->path_img_getstarted."slides/slide-3-6.jpg".'" alt="S1 Profile Information" >';
                        $desc6 .= '<p class="s1content_body_title" >Messaging / Connections</p>';
                        $desc6 .= '<p class="s1content_body_section_left icon_height"><img src="'.$base.$this->path_img_getstarted."profiles/employer_letter.png".'" class="profile_letter" alt="Employer" /> Start Customizing your Workforce:</p>';
                        $desc6 .= '<p class="s1content_body_section_left">Designate “My Workers”</p>';
                        $desc6 .= '<p class="s1content_body_section_left">Designate Worker Status: Supervisor, H&S rep</p>';
                        $desc6 .= '<p class="s1content_body_section_left">Create Crews or Divisions to reflect your workforce</p>';
                        $desc6 .= '<p class="s1content_body_section_left">Assign Content and Perform tasks based on Crews/Divisions</p>';
                        $desc6 .= '<p class="s1content_body_section_left icon_height"><img src="'.$base.$this->path_img_getstarted."slides/number_1.png".'" class="getstart_number"  />  Edit Crew Name</p>';
                        $desc6 .= '<p class="s1content_body_section_left icon_height"><img src="'.$base.$this->path_img_getstarted."slides/number_2.png".'" class="getstart_number"  />  Add Supervisors</p>';
                        $desc6 .= '<p class="s1content_body_section_left icon_height"><img src="'.$base.$this->path_img_getstarted."slides/number_3.png".'" class="getstart_number"  /> Add Workers to Crews</p>';
                        $desc6 .= '<p class="s1content_body_section_left icon_height"><img src="'.$base.$this->path_img_getstarted."slides/number_4.png".'" class="getstart_number"  /> Edit Crews</p>';
                        echo '</li>';
						
                        echo '<li class="en7 slides-li" style="display:block;">';
						$desc7 = '<img src="'.$base.$this->path_img_getstarted."slides/slide-3-7.jpg".'" alt="S1 Profile Information" >';
						$desc7 .= '<p class="s1content_body_title" >Messaging / Connections </p>';
						$desc7 .= '<p class="s1content_body_section_left icon_height"><img src="'.$base.$this->path_img_getstarted."profiles/employer_letter.png".'" class="profile_letter" alt="Employer" /> Start Customizing your Workforce</p>';
						$desc7 .= '<p class="s1content_body_section_left">Build Crews and Assign crew specific H&S Information</p>';
						$desc7 .= '<p class="s1content_body_section_left icon_height"><img src="'.$base.$this->path_img_getstarted."slides/number_1.png".'" class="getstart_number"  />  List of “My Workers”</p>';
						$desc7 .= '<p class="s1content_body_section_left icon_height"><img src="'.$base.$this->path_img_getstarted."slides/number_2.png".'" class="getstart_number"  />  Crew Lists</p>';
						$desc7 .= '<p class="s1content_body_section_left icon_height"><img src="'.$base.$this->path_img_getstarted."slides/number_3.png".'" class="getstart_number"  /> Create New Crews</p>';
                        echo '</li>';
						?>
                    </ul>
		        </div>
               </center>
            </div>
            <div class="modal-footer"><button class="btn btn-close" data-dismiss="modal">Close</button></div>
      </div>
	  
	  <script type="text/javascript">
		function callModelMessagingConnections() 
		{
			$from_lang 	= '<?php echo $from_lang;?>';
			$to_lang 	= $("#cmb_liblang_messeging_connection").val();

			if( $to_lang != '' ) {
				$.post(js_base_path+'ajax/getTranslatedText', {'translateSection':"s1_library", 'isPlainText':'1', 'paragraphDescription':'<?php echo $desc1;?>', 'fromLang':$from_lang,'toLang':$to_lang}, 
				function(data) { $("ul.modal_messeging_connection li.en1").html(data); });

				$.post(js_base_path+'ajax/getTranslatedText', {'translateSection':"s1_library", 'isPlainText':'1', 'paragraphDescription':'<?php echo $desc2;?>', 'fromLang':$from_lang,'toLang':$to_lang}, 
				function(data) { $("ul.modal_messeging_connection li.en2").html(data); });

				$.post(js_base_path+'ajax/getTranslatedText', {'translateSection':"s1_library", 'isPlainText':'1', 'paragraphDescription':'<?php echo $desc3;?>', 'fromLang':$from_lang,'toLang':$to_lang}, 
				function(data) { $("ul.modal_messeging_connection li.en3").html(data); });

				$.post(js_base_path+'ajax/getTranslatedText', {'translateSection':"s1_library", 'isPlainText':'1', 'paragraphDescription':'<?php echo $desc4;?>', 'fromLang':$from_lang,'toLang':$to_lang}, 
				function(data) { $("ul.modal_messeging_connection li.en4").html(data); });
				
				$.post(js_base_path+'ajax/getTranslatedText', {'translateSection':"s1_library", 'isPlainText':'1', 'paragraphDescription':'<?php echo $desc5;?>', 'fromLang':$from_lang,'toLang':$to_lang}, 
				function(data) { $("ul.modal_messeging_connection li.en5").html(data); });
				
				$.post(js_base_path+'ajax/getTranslatedText', {'translateSection':"s1_library", 'isPlainText':'1', 'paragraphDescription':'<?php echo $desc6;?>', 'fromLang':$from_lang,'toLang':$to_lang}, 
				function(data) { $("ul.modal_messeging_connection li.en6").html(data); });
				
				$.post(js_base_path+'ajax/getTranslatedText', {'translateSection':"s1_library", 'isPlainText':'1', 'paragraphDescription':'<?php echo $desc7;?>', 'fromLang':$from_lang,'toLang':$to_lang}, 
				function(data) { $("ul.modal_messeging_connection li.en7").html(data); });
			}
		}
		$('#cmb_liblang_messeging_connection').change(function(){ callModelMessagingConnections(); });
	</script>
	  