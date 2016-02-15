<?php $this->load->view('header_admin');
$libtype = (int)$_GET['search_libtype'] ? (int)$_GET['search_libtype'] : '';
$free_price = 0;
?>
<div class="homebg metro ">
	<div class="container-fluid ">
         <div class="main-content padding-metro-home clearfix"> 
			<!--START CODE FOR METRO STYLE-->
				<!-------BEGIN FIRST ROW OF TILES------>
					<div class="tile-group no-margin no-padding clearfix span3" >                    
						<!--begin tiles menus left side general page -->
						<?php //$this->load->view('library_tiles_menu_left');?>
						<!--end tile menus left side general page-->  
					</div>
				<!-------END FIRST ROW OF TILES------> 
                
				<!-- BEGIN SECOND COLUMN FIRST ROW -->
					<div class="tile-group libtiles no-margin no-padding clearfix draggable" width="100%" style="z-index:10000000000000" >
						<!--*****************************code pages s1-library-contents *****************-->
							<?php 
							$page 		= 1;
							$inv_page 	= 1;
							$sizeof_libraries = sizeof($libraries);

							if( isset($libraries) && $sizeof_libraries ) {
								$inventory = $contents_on_hover = $href = '';

								foreach($libraries AS $library) {
									$library_id		= $library['library_id'];
									$library_type_id= $library['library_type_id'];

									if( '6' != $library_type_id ) {
										// Get Inventory of the specific library //
											$rows_inventory = $this->libraries->getMyInventoriesByUserName($this->session->userdata("username"),$this->session->userdata("userid"),1," AND lib_id='".$library_id."'");
											$qty_ordered = isset($rows_inventory[0]['qty_ordered']) ? $rows_inventory[0]['qty_ordered'] : '0';
											$qty_assigned = isset($rows_inventory[0]['qty_assigned']) ? $rows_inventory[0]['qty_assigned'] : '0';
											$inventory = ($qty_ordered-$qty_assigned);
									}

									$total_pages 	= $this->libraries->getTotalPageNumber($library_id);
									$library_type 	= $library['library_type'];
									$title 			= ('6'!=$library_type_id ) ? $library['title'] : 'NEW';
									$description 	= $library['description'];
									$price 			= $library['price'];
									$points 		= $library['credits'];
									$credits 		= $library['creditsbuy'];
									$language       = strtolower($library['language']);
									$is_libbought 	= $this->libraries->checkLibraryBought($library_id);

									if( '6' != $library_type_id ) {
										$contents_on_hover 	= '<p>'.$description.'</p><h6>$'.$price.' - '.$credits.' Credits - '.$points.' Points</h6>';
									}
									else if( '6' == $library_type_id ) {
										$contents_on_hover 	= '<h5>Price: $'.$price.'</h5>';
									}

									if( '6' != $library_type_id ) {
										// if( '0' == $is_libbought || $inventory == 0 ) // Disabled By Kartik as per the request on the 27Nov2014
										{ // Library Piece not Bought //
											$class_addtocart = ($inventory>=0) ? 'add_to_cart' : '';
											$class_addtocart = ($inventory>=0&&$price>$free_price) ? $class_addtocart : 'free_library';
											$metro_class = 'tile half-library half-opacity bg-darker ';
											?>
												<a href="#" rel="<?php echo $library_id;?>" id="<?php echo $library_id;?>" class="<?php echo $metro_class.$class_addtocart;?> description " library_type="<?php echo $library_type_id;?>" data-toggle="popover" data-content="<?php echo $contents_on_hover;?>" data-original-title="<?php echo "<h6 class='margin10'>".$title."</h6>"?>" data-placement="bottom" data-trigger="hover">
													<!--<i class="icon on-left"><img src="<?php echo $base.$this->path_img_library."icon-".$language.".png";?>" id="<?php echo $library_id;?>"></i>-->
													<span class="list-title fg-white margin10"><small><?php echo $this->common->subString($title,25);?></small></span>
													<div class="brand">
														<span class="label fg-white text-right"><small><?php echo $points;?> points - <?php echo $credits;?> credits</small> <strong>&#36;<?php echo $price;?></strong></span>
													</div>
												</a>
											<?php 
										}
										/* DO NOT ENABLE THIS SECTION: Updated By Kartik as per the request on the 27Nov2014
										else {
											if( $total_pages <= 0 ) {
												$contents_on_hover = '<h5><p><strong>No pages available.</h5>';
												$href = "#";
											}
											else {
												$href = $base."admin/library_page_contents?libtype=".$library_type_id."&libid=".$library_id."&section=desc";
											}
											?>
											<!--bought-->
											  <a href="<?php echo $href;?>" rel="<?php echo $library_id;?>" class="tile half-library bg-darker description" data-toggle="popover" data-content="<?php echo $contents_on_hover;?>" data-original-title="<?php echo "<h6 class='margin10'>".$title."</h6>"?>" data-placement="bottom" data-trigger="hover">
											   
											   <!--i class="icon on-left"><img src="<?php echo $base.$this->path_img_library."icon-".$language.".png";?>"></i-->
											   <span class="list-title fg-white margin10"><small><?php echo $this->common->subString($title,25);?></small></span>
												<div class="brand">
													<span class="label fg-white text-center"><small><?php echo $points;?> points</small></span>
													<?php
													if( $inventory >= 0 ) { ?>
														<span class="badge bg-red"><?php echo $inventory;?></span>
													<?php
													}?>
												</div>
											   </a>
											<?php 
										}
										*/
									}
									else if( $library_type_id == '6' ) { // INVESTIGATION //
										?>
										<a href="#" rel="<?php echo $library_id;?>" id="<?php echo $library_id;?>" class="tile half-library half-opacity bg-lightOrange add_to_cart description" library_type="<?php echo $library_type_id;?>" data-toggle="popover" data-content="<?php echo $contents_on_hover;?>" data-original-title="<?php echo "<h6 class='margin10'>".$title."</h6>"?>" data-placement="bottom" data-trigger="hover">
										  <!--i class="icon on-left"><img src="<?php echo $base.$this->path_img_library."icon-".$language.".png";?>"></i--> 
											<span class="list-title fg-white margin10"><small><?php echo $this->common->subString($title,25);?></small></span>
											<div class="brand">                                             
												<span class="label fg-white text-right"><small><?php echo "Price: &#36;".$price;?></small></span>
											</div>
										</a>
										<?php 
										$userid = $this->session->userdata("userid");
										// Get Investigation details from Library Id
											$rows_invforms = $this->users->getMetaDataList('inv_investigation_forms', 'in_inv_form_created_by="'.$userid.'"', '',  'in_inv_form_id, st_inv_form_no, in_investigation_id, is_inv_form_sealed');
											$sizeof_libraries = (sizeof($rows_invforms)+1);

											if( isset($rows_invforms) && sizeof($rows_invforms) ) {
												$cnt_inv_forms=0;
												$contents_on_hover = '';
												$title = "Investigations";
												foreach( $rows_invforms AS $val_invforms ) {
													$inv_form_id 	= $rows_invforms[$cnt_inv_forms]['in_inv_form_id'];
													$investigation_id 	= $rows_invforms[$cnt_inv_forms]['in_investigation_id'];
													$inv_form_no 		= $rows_invforms[$cnt_inv_forms]['st_inv_form_no'];
													$inv_form_sealed 	= $rows_invforms[$cnt_inv_forms]['is_inv_form_sealed'];
													$inv_form_sealed 	= ($inv_form_sealed=='1')?'SEALED':'OPEN';

													$contents_on_hover 	= "<h5>Status: ".$inv_form_sealed."</h5>";

													$href = $base."admin/cover_page_investigation?invformid=".$inv_form_id;
													?>
													
													<a href="<?php echo $href;?>" rel="<?php echo $library_id;?>" class="tile half-library bg-darker description" data-toggle="popover" data-content="<?php echo $contents_on_hover;?>" data-original-title="<?php echo "<h6 class='margin10'>".$title."</h6>"?>" data-placement="bottom" data-trigger="hover">
											   
												   <!--i class="icon on-left"><img src="<?php echo $base.$this->path_img_library."icon-".$language.".png";?>"></i-->
												   <span class="list-title fg-white margin10">
												   <small><?php echo $inv_form_no;?></small>
												   </span>
													<div class="brand">
														<span class="label fg-white text-center"><small></small></span>
													</div>
												   </a>
												   <?php 
												   if ($inv_page == 2) {
													$inv_page = 0;
													echo "<br />";
													}
													$inv_page++;
													$cnt_inv_forms++;
												}
											}
									}

									if ($page == 3) {
										$page = 0;
										echo "<br />";
									}
									$page++;
									$cnt_libtype++;
								}
								?>
								<!-- PAGINATION -->
								<div class="pagination small pull-right <?php if($total_libraries<2){echo 'hide';}?> marr5 mart25">
									<?php $this->common->getS1Pagination('libraries_metro?libtype='.$library_type_id, $total_libraries, $current_page, $this->s1lib_rows_limit, 10);?>
								</div>
								<?php 
							}
							else {?>
								<h4 align="center" class="fglightgrey">No data available.</h4>
							<?php
							}

							if( $sizeof_libraries < 3 ) {
								$cnt_spans = ($sizeof_libraries==0) ? 0 : (3-($sizeof_libraries));
								for( $i=0;$i<$cnt_spans;$i++) {
									?><span class="tile half-library bg-transparent description" style="box-shadow: 0px 0px 0px inset;"></span>
									<?php 
								}
							}
							?>
					<!--**************** fim codigo pagins s1-library-contents *****************-->                                                                
                    </div>
				<!-- END SECOND COLUMN FIRST ROW -->
			</div>
		</div>
	</div>
<!--END OF CODE FOR METRO STYLE-->

<script type="text/javascript" src="<?php echo $base;?>js/jquery/jquery.min.js"></script> 
<script type="text/javascript" src="<?php echo $base;?>js/jquery-ui.js"></script>

<script type="text/javascript">
	$(document).ready(function () {         
        $('.description').popover({html: true});
        $('a.add_to_cart').click(function(e){
            e.preventDefault();
            $.post('<?php echo $base;?>ecommerce/addItem', {'id':$(this).attr('rel'), 'library_type':$(this).attr('library_type')}, function(data){
                var cart = $.parseJSON(data);
                $('#qty-in_cart').text(cart.qty);
                $('#amount_in_cart').text(cart.amount);
            })
        })
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
<!---END SCRIPTS FOR CONNECTIONS-->
<?php $this->load->view('footer_admin'); ?>
