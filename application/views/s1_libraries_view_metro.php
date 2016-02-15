<?php 
$this->load->view('header_admin');
$free_price = 0;
?>
<style>.flexslider .slides img {width: 200px; height: 160px; display: block;}</style>
<script type="text/javascript">
	$(window).load(function() {
		$('.flexslider').flexslider({
			controlNav: false,
			prevText:"",
			nextText:"",
			minItems: 2,
			maxItems: 3,
			move: 2,
			reverse: false,
			slideshow: false
		});
	});
</script>

<div class="homebg metro">
    <!--BEGIN PAGE TITLE-->
		<div class="container-fluid">
			<div class="main-content padding-metro-header subheader-secondary clearfix fg-grayLighter">
			<em class="margin20">S1 LIBRARY - <?php echo isset($library_type) ? strtoupper($library_type) : '';?>&nbsp;&nbsp;
        	<a href="#info_s1library_<?php echo isset($library_type) ? strtolower($library_type) : 'training';?>_modal" data-toggle='modal'><span class="icon-info-2 s1_info fg-white"></span></a>
        </em> 
        </div>
    </div>
    <!-- Start INFO Modal --> 
    <?php // Modal: INFO//
	$this->load->view("info/s1library_".(isset($library_type) ? strtolower($library_type) : 'training')."_modal");?>

    <!-- End INFO Modal -->
	<!--END PAGE TITLE-->
	<div class="container-fluid">
        <div class="main-content padding-metro-home clearfix"> 
		    <!--BEGIN FILTER ROW-->
            <div class="clearfix s1LibCon">
				<div class="container-fluid"><div id="row-filter"><div class="profile-content-filter"><?php $this->load->view('library_filter_metro');?></div></div></div>
			<!--END FILTER ROW-->

			<!--START CODE FOR METRO STYLE-->
				<!-------BEGIN FIRST ROW OF TILES------>
					<div class="tile-group no-margin no-padding clearfix span3" >                    
						<!--begin tiles menus left side general page -->
							<?php $this->load->view('library_tiles_menu_left');?>
						<!--end tile menus left side general page-->  
					</div>
				<!-------END FIRST ROW OF TILES------>  
				
				<!-- BEGIN SECOND COLUMN FIRST ROW -->
					<div class="tile-group libtiles no-margin no-padding clearfix draggable middleTile" width="100%" >
						<?php 
						if( '4' == $libtype ) { // PROCEDURES - NEW TILE //
							if( "1" == $this->sess_usertype ) {
								$href 	= $base."admin/s1_new_procedure_by_admin";
								$class	= "";
							}
							else {
								$href 	= "#modal_shopping_itemsnewproc";
								$class	= "add_to_cart";
							}
							$ret_procedure_price= $this->users->getMetaDataList('price_settings', 'price_settingsname="procedures"', '', "in_price, in_points, in_credits");
							$price 			= $ret_procedure_price[0]['in_price'];
							$points 		= $data['item_points'] = $ret_procedure_price[0]['in_points'];
							$credits 		= $data['item_credits'] = $ret_procedure_price[0]['in_credits'];
							$title 			= "NEW PROCEDURE";
							$library_type	= $data['item_libtype'] = "new_procedure";
							$new_tile_onhover 	= '<h6>$'.$price.' - <i ><img src='.$base.'img/icons_s1credit.png style=height:20px /></i>&nbsp;'.$credits.' - <i ><img src='.$base.'img/icons_xp.png style=height:20px /></i>&nbsp;'.$points.' </h6>';
							$item_id 		= $data['item_id'] = 'newproc';
							$cart_href_string = 'id="'.$item_id.'" library_type="'.$library_type.'" libtitle="'.$title.'" price="'.$price.'" points="'.$points.'" credits="'.$credits.'"';
							?>
							<!-- TILE TO BUY AND CREATE A NEW PROCEDURES ON S1 LIBRARY-->
								<a href="<?php echo $href;?>" <?php echo $cart_href_string;?> rel="#" data-toggle="modal" class="tile half-library bg-black <?php echo $class;?> description" style="opacity:0.8;" data-content="<?php echo $new_tile_onhover;?>" data-original-title="<?php echo "<h5 class='margin10'>".$title."</h5>";?>" data-placement="bottom" data-trigger="hover">
									<img src="<?php echo $base.$this->path_img_library."add55.png";?>" />
									<span class='margin5 fg-white' style="position:absolute;top:6px;"><b><small><?php echo $title;?></small></b></span>
								</a>
								<div id="modal_shopping_items<?php echo $item_id;?>" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"></div>
								<?php 
								$this->load->view('modal_shopping_options', $data);
						}

						$page = $inv_page = 1;
						$sizeof_libraries = sizeof($libraries);

						 // Training Worker
							$rows_worker[] 	= $this->points->hasUserGainedPointsGetPoints(2, 30, $checkPointsGained=1);
							$rows_worker[] 	= $this->points->hasUserGainedPointsGetPoints(2, 1018, $checkPointsGained=1);
							$rows_worker[] 	= $this->points->hasUserGainedPointsGetPoints(2, 1021, $checkPointsGained=1);
							$rows_worker[] 	= $this->points->hasUserGainedPointsGetPoints(2, 1022, $checkPointsGained=1);
							
						 // Training Supervisor
							$rows_supervisor[]= $this->points->hasUserGainedPointsGetPoints(2, 1023, $checkPointsGained=1);
							$rows_supervisor[]= $this->points->hasUserGainedPointsGetPoints(2, 1024, $checkPointsGained=1);
							$rows_supervisor[]= $this->points->hasUserGainedPointsGetPoints(2, 1025, $checkPointsGained=1);
							$rows_supervisor[]= $this->points->hasUserGainedPointsGetPoints(2, 1026, $checkPointsGained=1);

							$aw_worker_training = $aw_supervisor_training = '';

						if( $rows_worker[0]['has_points_gained']&&$rows_worker[1]['has_points_gained']&&$rows_worker[2]['has_points_gained']&&$rows_worker[3]['has_points_gained'] ) {
							$aw_worker_training = "completed";
						}
						if( $rows_supervisor[0]['has_points_gained']&&$rows_supervisor[1]['has_points_gained']&&$rows_supervisor[2]['has_points_gained']&&$rows_supervisor[3]['has_points_gained'] ) {
							$aw_supervisor_training = "completed";
						}
						
						// Worker Awareness Training //
							if( $aw_worker_training == "completed" ) {?>
								<a title="<?php echo "Worker Awareness Training";?>" href="<?php echo $base."admin/awareness_training?user=worker";?>" class="bg-darker tile half-library description" data-toggle="popover" data-content="" data-original-title="" data-placement="bottom" data-trigger="hover"><img src="<?php echo $base.$this->path_img_library."training.png";?>" />
									<span class="fg-white" style="position:absolute;top:0px;"><small><?php echo "Worker Awareness Training";?></small></span>
									<div class="brand"><span class="label fg-white text-right"><small><?php echo "100 Points";?></small></span></div>
								</a>
								<?php 
							}
						// Supervisor Awareness Training
							if( $aw_supervisor_training == "completed" ) {?>
								<a title="<?php echo "Supervisor Awareness Training";?>" href="<?php echo $base."admin/awareness_training?user=supervisor";?>" class="bg-darker tile half-library description" data-toggle="popover" data-content="" data-original-title="" data-placement="bottom" data-trigger="hover"><img src="<?php echo $base.$this->path_img_library."training.png";?>" />
									<span class="fg-white" style="position:absolute;top:0px;"><small><?php echo "Supervisor Awareness Training";?></small></span>
									<div class="brand"><span class="label fg-white text-right"><small><?php echo "100 Points";?></small></span></div>
								</a>
								<?php  
							}
							$worker_awtraining_libraries = $this->users->checkAwarenessTrainingCompletedByUser("worker");
							$worker_awtraining_libraries = $worker_awtraining_libraries['training_libraries'];
							$supervisor_awtraining_libraries = $this->users->checkAwarenessTrainingCompletedByUser("supervisor");
							$supervisor_awtraining_libraries = $supervisor_awtraining_libraries['training_libraries'];

						if( isset($libraries) && $sizeof_libraries ) {
							$inventory = $contents_on_hover = $href = '';
							foreach($libraries AS $library) {
								$library_id		= $library['library_id'];
								
								if( !in_array($library_id, $worker_awtraining_libraries) && !in_array($library_id, $supervisor_awtraining_libraries) )
								{
									
								$item_id 		= $data['item_id'] = $library_id;
								$library_type_id= $library['library_type_id'];
								$title 			= $library['title'];
								
								if( '4' == $library_type_id ) {
									$library_type 	= $data['item_libtype'] = 's1procedures';

									$procedures_price	= $this->users->getMetaDataList('price_settings', 'price_settingsname="'.$library_type.'"', '', "in_price, in_points, in_credits");
									$price 			= (isset($procedures_price[0]['in_price'])&&$procedures_price[0]['in_price']) ? $procedures_price[0]['in_price'] : '0';
									$points 		= $data['item_points'] = (isset($procedures_price[0]['in_points'])&&$procedures_price[0]['in_points']) ? $procedures_price[0]['in_points'] : '0';
									$credits 		= $data['item_credits'] = (isset($procedures_price[0]['in_credits'])&&$procedures_price[0]['in_credits']) ? $procedures_price[0]['in_credits'] : '0';
									$language       = strtolower($library['language']);
									$contents_on_hover 	= '<h6>$'.$price.' - <i ><img src='.$base.'img/icons_s1credit.png style=height:20px /></i>&nbsp;'.$credits.' - <i ><img src='.$base.'img/icons_xp.png style=height:20px /></i>&nbsp;'.$points.'</h6>';

									$class_addtocart= ($price>$free_price) ? "add_to_cart" : 'free_library';
									$metro_class 	= 'tile half-library  bg-darker ';									
									$href 			= "#modal_shopping_items".$item_id;
									$cart_href_string = 'id="'.$item_id.'" library_type="'.$library_type.'" libtitle="'.$title.'" price="'.$price.'" points="'.$points.'" credits="'.$credits.'"';?>
									
									<a href="<?php echo $href;?>" <?php echo $cart_href_string;?> rel="<?php echo $library_id;?>" class="<?php echo $metro_class.$class_addtocart;?> description" data-toggle="modal" data-content="<?php echo $contents_on_hover;?>" data-original-title="<?php echo "<h5 class='margin10'>".$title."</h5>"?>" data-placement="bottom" data-trigger="hover">
										<div class="half bg-darker">
											<img src="<?php echo $base.$this->path_img_library."procedures.png";?>" />
											<span class="fg-white" style="position:absolute;top:0px;"><small><?php echo $this->common->subString($title,18);?></small></span>
										</div>
										<p class="fg-white no-margin"><small><?php echo $this->common->subString($title,15);?></small></p>
										<div class="brand">
											<span class="label fg-white text-center">&nbsp;<small><i class=""><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:16px;" /></i>&nbsp;<?php echo $credits;?>&nbsp;<i class=""><img src="<?php echo $base;?>img/icons_xp.png" style="height:16px;" /></i>&nbsp;<?php echo $points;?></small></span>
										</div>
									</a>
									<?php 
								}
								else if( '4' != $library_type_id ) {
									if( '6' != $library_type_id ) { // LIBRARY TYPE != INVESTIGATION //
										// Get Inventory of the specific library //
											$rows_inventory = $this->libraries->getMyInventoriesByUserName($this->sess_useremail, $this->sess_userid,1," AND lib_id='".$library_id."'");
											$qty_ordered 	= isset($rows_inventory[0]['qty_ordered']) ? $rows_inventory[0]['qty_ordered'] : '0';
											$qty_assigned 	= isset($rows_inventory[0]['qty_assigned']) ? $rows_inventory[0]['qty_assigned'] : '0';
											$inventory 		= ($qty_ordered-$qty_assigned);
									}
									
									$total_pages 	= $this->libraries->getTotalPageNumber($library_id);
									$library_type 	= $data['item_libtype'] = $library['library_type'];
									$title 			= ('6' != $library_type_id ) ? $title : 'NEW';
									$item_title 	= ('6' == $library_type_id ) ? 'Investigation' : $title;
									$description 	= $library['description'];
									$price 			= $library['price'];
									$points 		= $data['item_points'] = $library['credits'];
									$credits 		= $data['item_credits'] = $library['creditsbuy'];
									$language       = strtolower($library['language']);
									$is_libbought 	= $this->libraries->checkLibraryBought($library_id);
									$contents_on_hover 	= '<p><b>'.$description.'</b></p><h6>$'.$price.' - <i ><img src='.$base.'img/icons_s1credit.png style=height:20px /></i>&nbsp;'.$credits.' - <i ><img src='.$base.'img/icons_xp.png style=height:20px /></i>&nbsp;'.$points.'</h6>';
									
									$href 	= "#modal_shopping_items".$item_id;
									
									$cart_href_string = 'id="'.$item_id.'" library_type="'.$library_type.'" libtitle="'.$item_title.'" description="'.$description.'" price="'.$price.'" points="'.$points.'" credits="'.$credits.'"';

									if( $library_type_id == '6' ) { // INVESTIGATION - NEW TILE //
										$class_addtocart = ($price>$free_price) ? 'add_to_cart' : 'free_library';
										$contents_on_hover 	= '<h6>$'.$price.' - <i ><img src='.$base.'img/icons_s1credit.png style=height:20px /></i>&nbsp;'.$credits.' - <i ><img src='.$base.'img/icons_xp.png style=height:20px /></i>&nbsp;'.$points.'</h6>';?>

										<a href="<?php echo $href;?>" <?php echo $cart_href_string;?> rel="<?php echo $library_id;?>" style="opacity:0.8" class="tile half-library bg-black <?php echo $class_addtocart;?> description" data-toggle="modal" data-content="<?php echo $contents_on_hover;?>" data-original-title="<?php echo "<h5 class='margin10'>".$title." INVESTIGATION</h5>"?>" data-placement="bottom" data-trigger="hover">
											<img src="<?php echo $base.$this->path_img_library."add55.png";?>" />
											<span class='margin5 fg-white' style="position:absolute;top:0px;"><b><small><?php echo $this->common->subString($title,25);?> INVESTIGATION</small></b></span>
										</a>
										<?php 
									}
									
									if( '6' != $library_type_id ) { // Library Type != INVESTIGATION //
										// if( '0' == $is_libbought || $inventory == 0 ) // Disabled By Kartik as per the request on the 27Nov2014
										{ // Library Piece not Bought //
											$class_addtocart= ($inventory>=0) ? 'add_to_cart' : '';
											$class_addtocart= ($inventory>=0&&$price>$free_price) ? $class_addtocart : 'free_library';
											$metro_class 	= 'tile half-library  bg-darker ';
											$href 			= "#modal_shopping_items".$library_id;
											
											/*
											// Awareness Training //
												if( "awareness_training_worker"==$library_type || "awareness_training_supervisor"==$library_type ) {
													$class_addtocart= '';
													if( "awareness_training_worker"==$library_type ) {
														$href 			= $base."admin/awareness_training?user=worker";
													}
													else if( "awareness_training_supervisor"==$library_type ) {
														$href 			= $base."admin/awareness_training?user=supervisor";
													}
												}
											*/

											switch( $library_type_id ) {
												case "1": {
													$imgname = "training";
													break;
												}
												case "3": {
													$imgname = "hazards";
													break;
												}
												case "6": {
													$imgname = "investigations";
													break;
												}
												default: {
													$imgname = "icon-".strtolower($library_type);
													break;
												}
											}?>
											<a href="<?php echo $href;?>" <?php echo $cart_href_string;?> rel="<?php echo $library_id;?>" class="<?php echo $metro_class.$class_addtocart;?> description" data-toggle="modal" data-content="<?php echo $contents_on_hover;?>" data-original-title="<?php echo "<h5 class='margin10'>".$title."</h5>"?>" data-placement="bottom" data-trigger="hover">
												<div class="half bg-darker">
													<img src="<?php echo $base.$this->path_img_library.$imgname.".png";?>" />
													<span class="fg-white" style="position:absolute;top:0px;"><small><?php echo $this->common->subString($title,18);?></small></span>
												</div>
												<p class="fg-white no-margin"><small><?php echo $this->common->subString($title,15);?></small></p>
												<div class="brand">                                              
													<span class="label fg-white text-center">&nbsp;<small><i class=""><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:16px;" /></i>&nbsp;<?php echo $credits;?>&nbsp;<i class=""><img src="<?php echo $base;?>img/icons_xp.png" style="height:16px;" /></i>&nbsp;<?php echo $points;?></small></span>
												</div>
											</a>
											<?php 
										}
										/* DO NOT ENABLE THIS SECTION: Updated By Kartik as per the request from client on the 27Nov2014
										else {
											if( $total_pages <= 0 ) {
												$contents_on_hover = '<h5><p><strong>No pages available.</h5>';
												$href = "#";
											}
											else {
												$href = $base."admin/library_page_contents?libtype=".$library_type_id."&libid=".$library_id."&section=desc";
											}
											("4" == $library_type_id) ? $href = $base."admin/my_created_procedures_metro" : '';?>
											
											<!-- LIBRARY BOUGHT-->
												<a href="<?php echo $href;?>" rel="<?php echo $library_id;?>" class="tile half-library bg-darker description" data-toggle="popover" data-content="<?php echo $contents_on_hover;?>" data-original-title="<?php echo "<h6 class='margin10'>".$title."</h6>"?>" data-placement="bottom" data-trigger="hover">
													<span class="list-title fg-white margin10"><small><?php echo $this->common->subString($title,25);?></small></span>
													<div class="brand">
														<span class="label fg-white text-center"><small><?php echo $points;?> points</small></span>
														<?php
														if( $inventory >= 0 ) {?>
															<span class="badge bg-red"><?php echo $inventory;?></span>
														<?php
														}?>
													</div>
												</a>
											<?php 
										}*/
									}
									// *** DISABLED THIS SECTION FROM PHILL REQUEST ON AUG-21-2015 **** //
									// *** ON S1 LIBRARY, DO NOT SHOW MY INVESTIGATIONS ALREADY PURCHASED **** //
									//else if( '6' == $library_type_id ) { // Library Type = INVESTIGATION //
										//$userid = $this->session->userdata("userid");
										// Get Investigation details from Library Id
									//		$rows_invforms = $this->users->getMetaDataList('inv_investigation_forms', 'in_inv_form_created_by="'.$userid.'"', '',  'in_inv_form_id, st_inv_form_no, in_investigation_id, is_inv_form_sealed');
									//		$sizeof_libraries = (sizeof($rows_invforms)+1);

									//		if( isset($rows_invforms) && sizeof($rows_invforms) ) {
									//			$cnt_inv_forms 		= 0;
									//			$contents_on_hover 	= '';
									//			$title 				= "Investigation";
									//			foreach( $rows_invforms AS $val_invforms ) {
									//				$inv_form_id 		= $rows_invforms[$cnt_inv_forms]['in_inv_form_id'];
									//				$investigation_id 	= $rows_invforms[$cnt_inv_forms]['in_investigation_id'];
									//				$inv_form_no 		= $rows_invforms[$cnt_inv_forms]['st_inv_form_no'];
									//				$inv_form_sealed 	= $rows_invforms[$cnt_inv_forms]['is_inv_form_sealed'];
									//				$inv_form_sealed 	= ($inv_form_sealed=='1')?'SEALED':'OPEN';
									//				$contents_on_hover 	= "<h6>Status: ".$inv_form_sealed."</h6>";
									//				$href 				= $base."admin/cover_page_investigation?invformid=".$inv_form_id;
													?>
									<!--				<a href="<?php echo $href;?>" <?php echo $cart_href_string;?> rel="<?php echo $library_id;?>" class="tile half-library bg-darker description" data-toggle="popover" data-content="<?php echo $contents_on_hover;?>" data-original-title="<?php echo "<h6 class='margin10'>".$title."</h6>"?>" data-placement="bottom" data-trigger="hover">
														<img src="<?php echo $base.$this->path_img_library."investigations.png";?>" />
														<span class="list-title fg-white margin10"><small><?php echo $inv_form_no;?></small></span>
														<div class="brand"><span class="label fg-white text-center"></span></div>
													</a>-->
													<?php 
									//				if ($inv_page == 2) {
									//					$inv_page = 0;
									//					echo "<br />";
									//				}
									//				$inv_page++;
									//				$cnt_inv_forms++;
									//			}
									//		}
									//}
								}
								if ($page == 3) {
									$page = 0;
									echo "<br />";
								}
								$page++;

								if( 'add_to_cart' == $class_addtocart ) {?>
									<div id="modal_shopping_items<?php echo $item_id;?>" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"></div>
									<?php 
									$this->load->view('modal_shopping_options', $data);
								}
								
								}
							}?>
							<!-- PAGINATION -->
								<div class="pagination small pull-right <?php if($total_libraries<2){echo 'hide';}?> marr5 mart25">
									<?php $this->common->getS1Pagination('libraries_metro?libtype='.$library_type_id, $total_libraries, $current_page, $this->s1lib_rows_limit, 10);?>
								</div>
							<?php 
						}
						if( $sizeof_libraries < $this->s1lib_rows_limit ) {
							$cnt_spans = ($sizeof_libraries==0) ? ($this->s1lib_rows_limit-1) : ($this->s1lib_rows_limit-($sizeof_libraries));
							for( $i=0;$i<$cnt_spans;$i++) {?>
								<span class="tile half-library bg-transparent description" style="box-shadow: 0px 0px 0px inset;"></span>
								<?php 
								echo ($i%3==0) ? "<br />" : '';
							}
						}?>
                    </div>
				<!-- END SECOND COLUMN FIRST ROW -->
				<!-------BEGIN THIRD COLUMN FIRST ROW OF TILES------>
				<div class="tile-group no-margin no-padding clearfix span4">  
        	<?php 
			$type_name = isset($library_type) ? strtolower($library_type) : 'training';
			($type_name == "s1procedures") ? $type_name = "procedures" : '';
			if( $type_name != "new_procedure" ) {
				$this->load->view('ad_s1'.$type_name.'_right_tile');
			}?>
        </div>
			<!-------END  THIRD COLUMN FIRST ROW OF TILES------> 
            </div>
			</div>
		</div>
	</div>
<!--END OF CODE FOR METRO STYLE-->
<?php $this->load->view('footer_admin');?>
<script type="text/javascript" src="<?php echo $base;?>js/jquery/jquery.min.js"></script> 
<script type="text/javascript" src="<?php echo $base;?>js/jquery-ui.js"></script>
<script type="text/javascript">
	$(document).ready(function () {
        $('.description').popover({html: true});
		$('a.free_library').click(function(e){
            e.preventDefault();
            $.post(js_base_path+'ajax/ajaxAddFreeLibrary', {'libid':$(this).attr('rel'), 'libtype':$(this).attr('library_type')}, function(data) {
				if( data.trim() ) {
					alert("Successfully purchased");
					return false;
				}
			})
        })

        $('a.add_to_cart').click(function(e) {
			$item_id = $(this).attr('id');
			
			$.ajax({
				url: js_base_path+'admin/modal_shopping_items',
				type: 'post', 
				data: {'id':$item_id, 'library_type':$(this).attr('library_type'), 'title':$(this).attr('libtitle'), 'description':$(this).attr('description'), 
					'price':$(this).attr('price'), 'points':$(this).attr('points'), 'credits':$(this).attr('credits')},
				success: function(output) {
					$("#modal_shopping_items"+$item_id).html(output);
				},
				error: function(errMsg) {
					alert( errMsg.responseText );
					return false;
				}
			});
        });
    });
    var jq201 = jQuery.noConflict();
    jq201(document).ready(function () {
        jq201('.draggable a.add_to_cart').draggable({helper:'clone', start: function (event, ui) {
			jq201(ui.helper).css("margin-left", event.clientX - (jq201(event.target).offset().left+90) );
			jq201(ui.helper).css("margin-top", event.clientY - (jq201(event.target).offset().top+25) );
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