<div id="id_purchases" class="modal_getstarted modal hide fade info-item " pointpage_section_id="29" tabindex="-1"  role="dialog" aria-labelledby="myModalLabel" >     
      	<div class="modal-header bg-red text-right">
            
            <span class="modal-header-h3 pull-left">PURCHASES</span>
                        <!--**translate element begins**-->
            <span id="google_translate_element">
               <?php echo $this->common->callLanguageSelectBox("cmb_liblang_purchases", $to_lang, 's1select_translate_box');?>
            </span>
			<!--**translate element ends**-->
        </div>
       <div class="modal-body" id="body1"  >
       		<center>
                <div class="flexslider flexslider_info" >
                    <ul class="slides model_purchases">
						<?php 
                        echo '<li class="en1 slides-li" style="display:block;">';
						$desc1 = '<img src="'.$base.$this->path_img_getstarted."slides/slide-7-1.jpg".'"/>';
						$desc1 .= '<p class="s1content_body_title" >Purchases</p>';
						$desc1 .= '<p class="s1content_body_section_left">S1 is a pay as you go system designed to save Employers money on H&S costs</p>';
						$desc1 .= '<p class="s1content_body_section_left">You Can Purchase H&S content with Cash or S1 Credits for only what you need</p>';
						$desc1 .= '<p class="s1content_body_section_left icon_height"><img src="'.$base.$this->path_img_getstarted."slides/number_1.png".'" class="getstart_number"  />  Click on Items to Purchase</p>';
						$desc1 .= '<p class="s1content_body_section_left icon_height"><img src="'.$base.$this->path_img_getstarted."slides/number_2.png".'" class="getstart_number"  />  Content description</p>';
						$desc1 .= '<p class="s1content_body_section_left icon_height"><img src="'.$base.$this->path_img_getstarted."slides/number_3.png".'" class="getstart_number"  /> Payment Options</p>';
                        echo '</li>';
						
                        echo '<li class="en2 slides-li" style="display:block;">';
						$desc2 = '<img src="'.$base.$this->path_img_getstarted."slides/slide-7-2.jpg".'" >';
						$desc2 .= '<p class="s1content_body_title" >Purchases</p>';
						$desc2 .= '<p class="s1content_body_section_left">Add Items Purchased to Checkout</p>';
						$desc2 .= '<p class="s1content_body_section_left">Pay via S1 Credits or Credit Card</p>';
						$desc2 .= '<p class="s1content_body_section_left icon_height"><img src="'.$base.$this->path_img_getstarted."slides/number_1.png".'" class="getstart_number"  />  Remove items</p>';
						$desc2 .= '<p class="s1content_body_section_left icon_height"><img src="'.$base.$this->path_img_getstarted."slides/number_2.png".'" class="getstart_number"  />  Credits available</p>';
						$desc2 .= '<p class="s1content_body_section_left icon_height"><img src="'.$base.$this->path_img_getstarted."slides/number_3.png".'" class="getstart_number"  /> Content Selected</p>';
						$desc2 .= '<p class="s1content_body_section_left icon_height"><img src="'.$base.$this->path_img_getstarted."slides/number_4.png".'" class="getstart_number"  /> Items Purchased</p>';
						$desc2 .= '<p class="s1content_body_section_left icon_height"><img src="'.$base.$this->path_img_getstarted."slides/number_5.png".'" class="getstart_number"  /> Checkout</p>';
                        echo '</li>';
						
                        echo '<li class="en3 slides-li" style="display:block;">';
						$desc3 = '<img src="'.$base.$this->path_img_getstarted."slides/slide-7-3.jpg".'"  >';
						$desc3 .= '<p class="s1content_body_title" >Purchases</p>';
						$desc3 .= '<p class="s1content_body_section_left">Access Information on Credits and Purchases in your Home Profile</p>';
						$desc3 .= '<p class="s1content_body_section_left icon_height"><img src="'.$base.$this->path_img_getstarted."slides/number_1.png".'" class="getstart_number"  /> 	View your XP points, Level up to Hit S1 Rewards</p>';
						$desc3 .= '<p class="s1content_body_section_left icon_height"><img src="'.$base.$this->path_img_getstarted."slides/number_2.png".'" class="getstart_number"  /> 	Purchase  S1 Credits</p>';
						$desc3 .= '<p class="s1content_body_section_left icon_height"><img src="'.$base.$this->path_img_getstarted."slides/number_3.png".'" class="getstart_number"  />	Credit Purchase History (money spent on H&S) with Printable report</p>';
						$desc3 .= '<p class="s1content_body_section_left icon_height"><img src="'.$base.$this->path_img_getstarted."slides/number_4.png".'" class="getstart_number"  />	Purchase History</p>';
						$desc3 .= '<p class="s1content_body_section_left icon_height"><img src="'.$base.$this->path_img_getstarted."slides/number_5.png".'" class="getstart_number"  />	S1 Tips</p>';
                        echo '</li>';

                        echo '<li class="en4 slides-li" style="display:block;">';
						$desc4 = '<img src="'.$base.$this->path_img_getstarted."slides/slide-7-4.jpg".'" alt="S1 purchases Information" >';
						$desc4 .= '<p class="s1content_body_title" >Purchases</p>';
                        echo '</li>';
						?>
                    </ul>
		        </div>
               </center>
            </div>
            <div class="modal-footer"><button class="btn btn-close" data-dismiss="modal">Close</button></div>
		</div>
		<script type="text/javascript">
			function callModelPurchases()
			{
				$from_lang 	= '<?php echo $from_lang;?>';
				$to_lang 	= $("#cmb_liblang_purchases").val();

				if( $to_lang != '' ) {
					$.post(js_base_path+'ajax/getTranslatedText', {'translateSection':"s1_library", 'isPlainText':'1', 'paragraphDescription':'<?php echo $desc1;?>', 'fromLang':$from_lang,'toLang':$to_lang}, 
					function(data) { $("ul.model_purchases li.en1").html(data); });

					$.post(js_base_path+'ajax/getTranslatedText', {'translateSection':"s1_library", 'isPlainText':'1', 'paragraphDescription':'<?php echo $desc2;?>', 'fromLang':$from_lang,'toLang':$to_lang}, 
					function(data) { $("ul.model_purchases li.en2").html(data); });
					
					$.post(js_base_path+'ajax/getTranslatedText', {'translateSection':"s1_library", 'isPlainText':'1', 'paragraphDescription':'<?php echo $desc3;?>', 'fromLang':$from_lang,'toLang':$to_lang}, 
					function(data) { $("ul.model_purchases li.en3").html(data); });

					$.post(js_base_path+'ajax/getTranslatedText', {'translateSection':"s1_library", 'isPlainText':'1', 'paragraphDescription':'<?php echo $desc4;?>', 'fromLang':$from_lang,'toLang':$to_lang}, 
					function(data) { $("ul.model_purchases li.en4").html(data); });
				}
			}
			$('#cmb_liblang_purchases').change(function(){ callModelPurchases(); });
		</script>

        