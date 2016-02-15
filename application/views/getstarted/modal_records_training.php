      <div id="id_records_training" class="modal_getstarted modal hide fade info-item " pointpage_section_id="26" tabindex="-1"  role="dialog" aria-labelledby="myModalLabel" >
      <!--class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="cursor:pointer;"-->     
      	<div class="modal-header bg-red text-right">
            <span class="modal-header-h3 pull-left">D.R.O.T</span>
<!--**translate element begins**-->
            <span id="google_translate_element">
                <?php echo $this->common->callLanguageSelectBox("cmb_liblang_records_training", $to_lang, 's1select_translate_box');?>
            </span>
			<!--**translate element ends**-->
        </div>
       <div class="modal-body" id="body1"  >
       		<center>
                <div class="flexslider flexslider_info" >
                    <ul class="slides model_records_training">
						<?php 
                        echo '<li class="en1 slides-li" style="display:block;">';
						$desc1 = '<img src="'.$base.$this->path_img_getstarted."slides/slide-4-1.jpg".'"/>';
						$desc1 .= '<p class="s1content_body_title "><strong>Digital Records of Training (D.R.O.T)</strong></p>';
                        $desc1 .= '<p class="s1content_body_section_left icon_height"><img src="'.$base.$this->path_img_getstarted."profiles/worker_letter.png".'" class="profile_letter" alt="Worker" /> Tired of Carrying all Your Records of training with you? Ask your Employer to Digitize your Cards and have them available to you anytime</p>';
                        $desc1 .= '<p class="s1content_body_section_left">Your Records of Training will be available to you  in your profile</p>';
                        $desc1 .= '<p class="s1content_body_section_left icon_height"><img src="'.$base.$this->path_img_getstarted."profiles/employer_letter.png".'" class="profile_letter" alt="Employer" /> Digitize/ Catalogue and organize all your Workers Records of Training</p>';
                        $desc1 .= '<p class="s1content_body_section_left icon_height"><img src="'.$base.$this->path_img_getstarted."slides/number_1.png".'" class="getstart_number"  />  Select or search D.R.O.T</p>';
                        $desc1 .= '<p class="s1content_body_section_left icon_height"><img src="'.$base.$this->path_img_getstarted."slides/number_2.png".'" class="getstart_number"  />  Select</p>';
                        $desc1 .= '<p class="s1content_body_section_left icon_height"><img src="'.$base.$this->path_img_getstarted."slides/number_3.png".'" class="getstart_number"  /> Purchase ( based on Number of workers that have this specific training)</p>';
                        echo '</li>';
						 
                        echo '<li class="en2 slides-li" style="display:block;">';
                        $desc2 = '<img src="'.$base.$this->path_img_getstarted."slides/slide-4-2.jpg".'" >';
                        $desc2 .= '<p class="s1content_body_title "><strong>Digital Records of Training (D.R.O.T)</strong></p>';
						$desc2 .= '<p class="s1content_body_section_left">Build Your Inventory and Assign Records of Training To “My Workers”</p>';
						$desc2 .= '<p class="s1content_body_section_left icon_height"><img src="'.$base.$this->path_img_getstarted."slides/number_1.png".'" class="getstart_number"  /> Search Your Inventory</p>';
						$desc2 .= '<p class="s1content_body_section_left icon_height"><img src="'.$base.$this->path_img_getstarted."slides/number_2.png".'" class="getstart_number"  /> Number Of Items Available</p>';
						$desc2 .= '<p class="s1content_body_section_left icon_height"><img src="'.$base.$this->path_img_getstarted."slides/number_3.png".'" class="getstart_number"  />Select D.R.O.T</p>';
						$desc2 .= '<p class="s1content_body_section_left icon_height"><img src="'.$base.$this->path_img_getstarted."slides/number_4.png".'" class="getstart_number"  />Assign to Worker</p>';
                        echo '</li>';
						?>
                    </ul>
		        </div>
               </center>
            </div>
            <div class="modal-footer"><button class="btn btn-close" data-dismiss="modal">Close</button></div>
      </div>

	  <script type="text/javascript">
		function callModelRecordsTraining()
		{
			$from_lang 	= '<?php echo $from_lang;?>';
			$to_lang 	= $("#cmb_liblang_records_training").val();

			if( $to_lang != '' ) {
				$.post(js_base_path+'ajax/getTranslatedText', {'translateSection':"s1_library", 'isPlainText':'1', 'paragraphDescription':'<?php echo $desc1;?>', 'fromLang':$from_lang,'toLang':$to_lang}, 
				function(data) { $("ul.model_records_training li.en1").html(data); });

				$.post(js_base_path+'ajax/getTranslatedText', {'translateSection':"s1_library", 'isPlainText':'1', 'paragraphDescription':'<?php echo $desc2;?>', 'fromLang':$from_lang,'toLang':$to_lang}, 
				function(data) { $("ul.model_records_training li.en2").html(data); });
			}
		}
		$('#cmb_liblang_records_training').change(function(){ callModelRecordsTraining(); });
	</script>

        