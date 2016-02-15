<?php $this->load->view('header_admin');
$free_price = 0;
?>
<script type="text/javascript">
	$(window).load(function() {
		$('.flexslider').flexslider({
			controlNav: false,
			prevText:"",
			nextText:"",
			// animation: "slide", 
			// itemWidth: 1,
			minItems: 2,
			maxItems: 3,
			move: 2,
			reverse: false,
			slideshow: false
		});
	});
</script>
	<div class="homebg metro ">
    	<!--BEGIN PAGE TITLE-->
    <div class="container-fluid">
        <div class="main-content padding-metro-header subheader-secondary clearfix fg-grayLighter">
        <em class="margin20">S1 LIBRARY - Safety Talks
        	<a href="#info_s1library_safety_talks_modal" data-toggle='modal'><span class="icon-info-2 s1_info fg-white"></span></a>
            </em>
        </div>
    </div>
    <!-- Start INFO Modal --> 
    <?php // Modal: INFO//
					$this->load->view('info/s1library_safety_talks_modal');
				
				?>	
    <!-- End INFO Modal -->
	<!--END PAGE TITLE-->
	
	<div class="container-fluid">
		<div class="main-content padding-metro-home clearfix"> 
			<!--START CODE FOR METRO STYLE-->
            <div class="clearfix s1LibCon">
				<!-------BEGIN FIRST ROW OF TILES------>
					<div class="tile-group no-margin no-padding clearfix span3" >                    
						<!--begin tiles menus left side general page -->
						<?php $this->load->view('library_tiles_menu_left');?>
						<!--end tile menus left side general page-->
					</div>
				<!-------END FIRST ROW OF TILES------>  
				<!-- BEGIN SECOND COLUMN FIRST ROW -->
				<div class="tile-group libtiles no-margin no-padding clearfix draggable middleTile" max-width="100%;"> 
		   <!--*****************************code pages s1-library-contents *****************-->

<!-- NEW -->
<?php 
$ret_safetytalks_price	= $this->users->getMetaDataList('price_settings', 'price_settingsname="safetytalks"', '', "in_price, in_points, in_credits");
$ct_title 				= "NEW SAFETY TALKS";
$ct_price               = $ret_safetytalks_price[0]['in_price'];
$ct_points              = $data['item_points'] = $ret_safetytalks_price[0]['in_points'];
$ct_credits             = $data['item_credits'] = $ret_safetytalks_price[0]['in_credits'];
$new_contents_on_hover  = '<h6>$'.$ct_price.' - <img src='.$base.'img/icons_s1credit.png style=height:20px />&nbsp;'.$ct_credits.' - <img src='.$base.'img/icons_xp.png style=height:20px />&nbsp;'.$ct_points.'</h6>';

$library_type 			= $data['item_libtype'] = 'new_normal_safetytalks';
$item_id 				= $data['item_id'] = 'new_normal_safetytalks';
$cart_href_string 		= 'id="'.$item_id.'" library_type="'.$library_type.'" ct_title="'.$ct_title.'" price="'.$ct_price.'" points="'.$ct_points.'" credits="'.$ct_credits.'"';

$class_addtocart = ($ct_price>$free_price) ? 'add_to_cart' : 'free_library';
?>
<a href="#modal_shopping_items<?php echo $item_id;?>" rel="#" <?php echo $cart_href_string;?> class="tile half-library bg-yellow <?php echo $class_addtocart;?> description" style="opacity:0.8;" data-toggle="modal" data-content="<?php echo $new_contents_on_hover;?>" data-original-title="<?php echo "<h6 class='margin10'>".$ct_title."</h6>";?>" data-placement="bottom" data-trigger="hover">
	<?php echo "<h6 class='margin10 fg-white'>".$ct_title."</h6>";?>
</a>

<?php 
if( 'add_to_cart' == $class_addtocart ) {?>
	<div id="modal_shopping_items<?php echo $item_id;?>" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"></div>
	<?php 
	$this->load->view('modal_shopping_options', $data);
}
?>


<!--*********Begin Customized Safetytalks************-->
	<?php 
	$ct_page = 0;
	if(count($ct_list)>0) {
		foreach($ct_list as $ct_val_safetytalks) {
			$ct_language 		 	= $ct_val_safetytalks['st_language'];
			$ct_safetytalks_id 		= $data['item_id'] = $ct_val_safetytalks['id'];
			$ret_safetytalks_topics	= $this->users->getMetaDataList('custom_safetytalks_links', 'in_custom_safetytalks_id="'.$ct_safetytalks_id.'"', '', "in_safetytalks_id, (SELECT st_safetytalks_topic from tbl_safetytalks where id = in_safetytalks_id) AS topic_name");
			$arr_safety_topics = array();
			foreach( $ret_safetytalks_topics AS $val ) {
				$arr_safety_topics[] = $val['topic_name'];
			}
			$topics = sizeof($arr_safety_topics) ? implode("<br>", $arr_safety_topics) : '<h6>No Topics</h6>';

			$ct_safetytalks_name 	= $ct_val_safetytalks[$field_ct_safetytalks_name];
			$ct_date_safetytalks_start = $ct_val_safetytalks['date_safetytalks_start'];
			$ct_date_safetytalks_end   = $ct_val_safetytalks['date_safetytalks_end'];
			$ct_status 		 	      = $ct_val_safetytalks['status'];

			$item_points 			= $ct_points;
			$item_credits 			= $ct_credits;
			$ct_contents_on_hover   = '<h6>$'.$ct_price.' - <img src='.$base.'img/icons_s1credit.png style=height:20px />&nbsp;'.$ct_credits.' - <img src='.$base.'img/icons_xp.png style=height:20px />&nbsp;'.$ct_points.'</h6><h6>Topics: </h6><h6>'.$topics.'</h6>';
			
			$class_addtocart = ($ct_price>$free_price) ? 'add_to_cart' : 'free_library';
			
			$library_type 			= $data['item_libtype'] = 'custom_safetytalks';
			$cart_href_string 		= 'id="'.$ct_safetytalks_id.'" library_type="'.$library_type.'" ct_title="'.$ct_safetytalks_name.'" price="'.$ct_price.'" points="'.$ct_points.'" credits="'.$ct_credits.'"';
			?>
			<!--not bought-->					
				<a href="#modal_shopping_items<?php echo $ct_safetytalks_id;?>" <?php echo $cart_href_string;?> rel="<?php echo $ct_safetytalks_id;?>" class="tile half-library half-opacity bg-darker <?php echo $class_addtocart;?> description" data-toggle="modal" data-content="<?php echo $ct_contents_on_hover;?>" data-original-title="<?php echo "<h6 class='margin10'>".$ct_safetytalks_name."</h6>"?>" data-placement="bottom" data-trigger="hover">
					<img src="<?php echo $base.$this->path_img_library."safety_talks.png";?>" />
					<span class='margin10 fg-white'><b><small><?php echo $ct_safetytalks_name;?></small></b></span>
				</a>
			<?php 
			if ($ct_page == 6) {
				$ct_page = -3;
				echo "<br />";
			}
			$ct_page = $ct_page + 3;
			if( 'add_to_cart' == $class_addtocart ) {?>
				<div id="modal_shopping_items<?php echo $ct_safetytalks_id;?>" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"></div>
				<?php 
				$this->load->view('modal_shopping_options', $data);
			}
			
		}// END FOR EACH
	}// END IF COUNT
	?>
<!--*********END Customized Safetytalks************-->

			<!--**************** fim codigo pagins s1-library-contents *****************-->                                
			</div>
			 <!-- END SECOND COLUMN FIRST ROW -->
			 <!-------BEGIN THIRD COLUMN FIRST ROW OF TILES------>
				<div class="tile-group no-margin no-padding clearfix span4" >                    
					<!--begin text information paragraphs -->
						<!--begin small tile-->
						<div class="tile double profile-content-box tab-content">
                        <a target="_new" href="http://www.advancesafetyworld.com/"><img src="<?php echo $base;?>img/ad/s1library/safetytalks/ad1.png">
                        </a>
                        </div>
                        <div class="tile double profile-content-box tab-content">
                        <a target="_new" href="http://silvanmechanical.com/"><img src="<?php echo $base;?>img/ad/s1library/safetytalks/ad2.png">
                        </a>
                        </div>
                        <div class="tile double profile-content-box tab-content">
                        <a target="_new" href="http://torcanlift.com/"><img src="<?php echo $base;?>img/ad/s1library/safetytalks/ad3.png">
                        </a>
                        </div>

			<!--end small tile-->			
			<!--end text information paragraphs-->  
				</div>
			<!-------END  THIRD COLUMN FIRST ROW OF TILES------>
            </div>
			</div>
		</div>
	</div>
<!--END OF CODE FOR METRO STYLE-->


<?php $this->load->view('footer_admin'); ?>
<script type="text/javascript">
	$(document).ready(function () {
        $('.description').popover({html: true});

		$('a.free_library').click(function(e){
            e.preventDefault();
            $.post('<?php echo $base;?>ajax/ajaxAddFreeLibrary', {'libid':$(this).attr('rel'), 'libtype':$(this).attr('library_type')}, function(data){
				if( data.trim() ) {
					alert("Successfully purchased");
					return false;
				}
            })
        })

        $('a.add_to_cart').click(function(e){
			$item_id = $(this).attr('id');
			/* 
			e.preventDefault();
			$.post('<?php echo $base;?>ecommerce/addItem', {'id':$(this).attr('rel'), 'library_type':$(this).attr('library_type')}, function(data){
                var cart = $.parseJSON(data);
                $('#qty-in_cart').text(cart.qty);
                $('#amount_in_cart').text(cart.amount);
            });
			*/
	
			$.ajax({
				url: '<?php echo $base;?>admin/modal_shopping_items',
				type: 'post', 
				data: {'id':$item_id, 'library_type':$(this).attr('library_type'), 'title':$(this).attr('ct_title'), 'description':$(this).attr('description'), 
					'price':$(this).attr('price'), 'points':$(this).attr('points'), 'credits':$(this).attr('credits')},
				success: function(output) {
					$("#modal_shopping_items"+$item_id).html(output);
				},
				error: function(errMsg) {
					alert( errMsg.responseText );
					return false;
				}
			});
        })
    });
</script>
<script type="text/javascript" src="<?php echo $base;?>js/jquery/jquery.min.js"></script> 
<script type="text/javascript" src="<?php echo $base;?>js/jquery-ui.js"></script>
<script type="text/javascript">
    var jq201 = jQuery.noConflict();	
    jq201(document).ready(function () {
        jq201('.draggable a.add_to_cart').draggable({helper:'clone', start: function (event, ui) {
			jq201(ui.helper).css("margin-left", event.clientX - (jq201(event.target).offset().left+90));
			jq201(ui.helper).css("margin-top", event.clientY - (jq201(event.target).offset().top+30));
        }});
        jq201('.cart-info').droppable({
			drop: function(event, ui) {
            jq201.post('<?php echo $base;?>ecommerce/addItem', {'id':ui.draggable.attr('id'), 'library_type':ui.draggable.attr('library_type')}, function(data) {
                var cart1 = $.parseJSON(data);
                jq201('#qty-in_cart').text(cart1.qty);
                jq201('#amount_in_cart').text(cart1.amount);
            });
          }
        });
    });
</script>
<style type="text/css">.library-item.ui-draggable-dragging { background: #ccc; opacity: 0.8; border: 1px solid #ccc; padding: 10px; border-radius: 5px;}</style>