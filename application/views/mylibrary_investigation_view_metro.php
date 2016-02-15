<?php $this->load->view('header_admin');?>
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
    <div class="main-content padding-metro-header subheader-secondary clearfix fg-grayLighter"> <em class="margin20">MY INVESTIGATIONS&nbsp;
        	<a href="#info_mylibrary_investigations_modal" data-toggle='modal'><span class="icon-info-2 s1_info fg-white"></span></a>
            </em>
        </div>
    </div>
    <!-- Start INFO Modal --> 
    <?php // Modal: INFO//
					$this->load->view('info/mylibrary_investigations_modal');
				
				?>	
    <!-- End INFO Modal -->
  <!--END PAGE TITLE-->
  <div class="container-fluid ">
    <div class="main-content padding-metro-home clearfix"> 
      <!--START CODE FOR METRO STYLE-->
      <div class="clearfix libraryCon"> 
        <!-------BEGIN FIRST ROW OF TILES------>
        <div class="tile-group no-margin no-padding clearfix span3 firstTile" > 
          <!--begin tiles menus left side general page -->
          <?php $this->load->view('mylibrary_tiles_menu_left');?>
          <!--end tile menus left side general page--> 
        </div>
        <!-------END FIRST ROW OF TILES------> 
        
        <!-- BEGIN SECOND COLUMN FIRST ROW -->
        <div class="tile-group no-margin no-padding clearfix draggable middleTile" max-width="100%;" style="z-index:1000;"> 
          <!--************BEGIN TAB MENU***************-->
          <ul class="nav nav-tabs" style="margin-right: 10px;">
            <li class="profile"><a href="#purchased" data-toggle="tab" class="fg-white fg-hover-black">Purchased</a></li>
            <li class="profile"><a href="#assigned" data-toggle="tab" class="fg-white fg-hover-black" >Assigned</a></li>
            <?php 
						if( sizeof($documents_free) ) {?>
            <li class="profile"><a href="#free" data-toggle="tab" class="fg-white fg-hover-black">Free</a></li>
            <?php
						}?>
          </ul>
          <!--************END TAB MENU***************--> 
          
          <!--****Begin MY INVESTIGATIONS ************-->
          <div class="tab-content"> 
            <!--****Begin FREE************-->
            <div class="tab-pane fade" id="free"> 
              <!-- Mylibrary item-->
              <?php 
								$page = 1;
								$sizeof_doc_free = sizeof($documents_free);
								if( isset($documents_free) && $sizeof_doc_free ) {
									$title = "Investigations";
									foreach($documents_free as $doc) {
										$inventory = ( $doc['qty_ordered'] - $doc['qty_assigned'] );
										if( $inventory>0 && $doc['price']<=0 ) {
										// Get Investigation form details from Investigation Id
											$rows_invforms = $this->users->getMetaDataList('inv_investigation_forms', 'in_inv_form_id="'.$doc['in_inv_form_id'].'"', '', 'in_inv_form_id, st_inv_form_no, is_inv_form_sealed');
											if( isset($rows_invforms) && sizeof($rows_invforms) ) {
												foreach( $rows_invforms AS $val_invforms ) {
													$inv_form_id 		= $val_invforms['in_inv_form_id'];
													$inv_form_no 		= $val_invforms['st_inv_form_no'];
													$inv_form_sealed 	= $val_invforms['is_inv_form_sealed'];
													$inv_form_sealed 	= ($inv_form_sealed=='1')?'SEALED':'OPEN';

													$contents_on_hover 	= "<h5>Status: ".$inv_form_sealed."</h5>";

													$href = $base."admin/cover_page_investigation?invformid=".$inv_form_id;
													?>
              <a href="<?php echo $href;?>" lib_id="<?php echo $doc['lib_id'];?>" libdata="<?php echo $doc['in_inv_form_id']."-6-".$doc['lib_id'];?>" class="investigation tile half-library half-library bg-darker description" data-toggle="popover" data-content="<?php echo $contents_on_hover;?>"  data-original-title="<?php echo "<h6 class='margin10'>".$title."</h6>"?>" data-placement="bottom" data-trigger="hover" libtype_section="Investigations"> <i class="icon on-left"><img src="<?php echo $base.$this->path_img_library."investigations.png";?>"></i> <span class="list-title fg-white margin5"><small><?php echo $inv_form_no;?></small></span>
              <div class="brand"> <span class="label fg-white text-center"><small></small></span> </div>
              </a>
              <?php 
												}
											}
											if ($page == 3) {
												$page = 0;
												echo "<div class='clear'></div>";
											}
											$page++;
									}
									}
								}
								else {
									
								}
								echo !isset($inv_form_id) ? "<h3 class='fl'>No data available</h3>" : '';
								
								if( $sizeof_doc_free < $this->mylib_rows_limit ) {
									$cnt_spans = ($sizeof_doc_free==0) ? ($this->mylib_rows_limit-1) : ($this->mylib_rows_limit-($sizeof_doc_free));
									for( $i=0;$i<$cnt_spans;$i++) {?>
              <span class="tile half-library bg-transparent description" style="box-shadow: 0px 0px 0px inset;"></span>
              <?php 
										echo ($i%3==0) ? "<div class='clear'></div>" : '';
									}
								}
								// Pagination //
									$total_free_pages = ceil( $total_free/$this->mylib_rows_limit );
									echo "<div class='pull-right mart25 marr5 pagination small opacity'>"; 
									$this->common->getS1Pagination($this->router->fetch_method()."?1", $total_free_pages, $pgno_free, $this->mylib_rows_limit, 10, '#free');
									echo "</div>";
								?>
              <!-- end mylibrary item --> 
            </div>
            <!--****END FREE ************--> 
            
            <!--****Begin ASSIGNEd ************-->
            <div class="tab-pane fade" id="assigned"> 
              <!-- Mylibrary item-->
              <?php 
								$page = 1;
								$title = "Investigations";
								$sizeof_doc_assigned = sizeof($documents_assigned);
								if( isset($documents_assigned) && $sizeof_doc_assigned ) {
									foreach($documents_assigned as $doc) {//common::pr($doc);
										$points = $doc['credits'];
										// Get Investigation forms details from Investigation Id
										$rows_invforms = $this->users->getMetaDataList('inv_investigation_forms', 'in_inv_form_id="'.$doc['in_inv_form_id'].'"', '', 'in_inv_form_id, st_inv_form_no, is_inv_form_sealed');

										if( isset($rows_invforms) && sizeof($rows_invforms) ) {
											foreach( $rows_invforms AS $val_invforms ) {
												$inv_form_id 		= $val_invforms['in_inv_form_id'];
												$inv_form_no 		= $val_invforms['st_inv_form_no'];
												$inv_form_sealed 	= $val_invforms['is_inv_form_sealed'];
												$inv_form_sealed 	= ($inv_form_sealed=='1')?'SEALED':'OPEN';

												$contents_on_hover 	= "<h6>Status: ".$inv_form_sealed."</h6><h6><i ><img src=".$base."img/icons_xp.png style=height:20px /></i>&nbsp;".$points."</h6>";

												$href = $base."admin/cover_page_investigation?invformid=".$inv_form_id;
												?>
              <a href="<?php echo $href;?>" class="tile half-library bg-darker description" data-toggle="popover" data-content="<?php echo $contents_on_hover;?>" data-original-title="<?php echo "<h5 class='margin10'>".$title."</h5>"?>" data-placement="bottom" data-trigger="hover"> <i class="icon on-left"><img src="<?php echo $base.$this->path_img_library."investigations.png";?>"></i> <span class="list-title fg-white margin5" style="position:absolute;top:0px;"><small><?php echo $inv_form_no;?></small></span>
              <div class="brand"> <span class="label fg-white text-center"><small><img src="<?php echo $base;?>img/icons_xp.png" style="height:16px;" />&nbsp;<?php echo $points;?></small></span> </div>
              </a>
              <?php 
											}
										}
										if ($page == 3) {
											$page = 0;
											echo "<div class='clear'></div>";
										}
										$page++;
									}									
								}
								if( $sizeof_doc_assigned <=0 ) {
									echo "<h3 class='fl'>No data available</h3>";
								}

								if( $sizeof_doc_assigned < $this->mylib_rows_limit ) {
									$cnt_spans = ($sizeof_doc_assigned==0) ? ($this->mylib_rows_limit-1) : ($this->mylib_rows_limit-($sizeof_doc_assigned));
									for( $i=0;$i<$cnt_spans;$i++) {?>
              <span class="tile half-library bg-transparent description" style="box-shadow: 0px 0px 0px inset;"></span>
              <?php 
										echo ($i%3==0) ? "<div class='clear'></div>" : '';
									}
								}
								// Pagination //
								$total_assigned_pages = ceil( $total_assigned/$this->mylib_rows_limit );
								echo "<div class='pull-right mart25 marr5 pagination small opacity'>"; 
								$this->common->getS1Pagination($this->router->fetch_method()."?1", $total_assigned_pages, $pgno_assigned, $this->mylib_rows_limit, 10, '#assigned');
								echo "</div>";
								?>
              <!-- end mylibrary item --> 
            </div>
            <!--****END ASSIGNED ************--> 
            
            <!--****Begin PURCHASED************-->
            <div class="tab-pane fade" id="purchased"> 
              <!-- Mylibrary item-->
              <?php 
								$page = 1;
								$sizeof_doc_purchased = sizeof($documents_purchased);						
								if( isset($documents_purchased) && $sizeof_doc_purchased ) {
									$title = "Investigations";
									 //common::pr($documents_purchased);
									 $ret_investigation_points= $this->users->getMetaDataList('price_settings', 'price_settingsname="investigation"', '', "in_points");
									$points 		=  $ret_investigation_points[0]['in_points'];
									//common::pr($ret_investigation_points);
									foreach($documents_purchased as $doc) {//common::pr($doc);
										$inventory = ( $doc['qty_ordered'] - $doc['qty_assigned'] );
										if( $inventory>0 && $doc['price']>0 ) {
										// Get Investigation form details from Investigation Id
											$rows_invforms = $this->users->getMetaDataList('inv_investigation_forms', 'in_inv_form_id="'.$doc['in_inv_form_id'].'"', '', 'in_inv_form_id, st_inv_form_no, is_inv_form_sealed');
											if( isset($rows_invforms) && sizeof($rows_invforms) ) {
												foreach( $rows_invforms AS $val_invforms ) {
													$inv_form_id 		= $val_invforms['in_inv_form_id'];
													$inv_form_no 		= $val_invforms['st_inv_form_no'];
													$inv_form_sealed 	= $val_invforms['is_inv_form_sealed'];
													$inv_form_sealed 	= ($inv_form_sealed=='1')?'SEALED':'OPEN';

													$contents_on_hover 	= "<h6>Status: ".$inv_form_sealed."</h6><h6><i ><img src=".$base."img/icons_xp.png style=height:20px /></i>&nbsp;".$points."</h6>";

													$href = $base."admin/cover_page_investigation?invformid=".$inv_form_id;
													?>
              <a href="<?php echo $href;?>" lib_id="<?php echo $doc['lib_id'];?>" libdata="<?php echo $doc['in_inv_form_id']."-6-".$doc['lib_id'];?>" class="investigation tile half-library half-library bg-darker description" data-toggle="popover" data-content="<?php echo $contents_on_hover;?>"  data-original-title="<?php echo "<h5 class='margin10'>".$title."</h5>"?>" data-placement="bottom" data-trigger="hover" libtype_section="Investigations"> <i class="icon on-left"><img src="<?php echo $base.$this->path_img_library."investigations.png";?>"></i> <span class="list-title fg-white margin5" style="position:absolute;top:0px;"><small><?php echo Common::subString($inv_form_no,15);?></small></span>
              <div class="brand"> <span class="label fg-white text-center"><small><img src="<?php echo $base;?>img/icons_xp.png" style="height:16px;" />&nbsp;<?php echo $points;?></small></span> </div>
              </a>
              <?php 
												}
											}
											if ($page == 3) {
												$page = 0;
												echo "<div class='clear'></div>";
											}
											$page++;
									}
									}
								}
								else {
									echo "<h3 class='fl'>No data available</h3>";
								}
								if( $sizeof_doc_purchased < $this->mylib_rows_limit ) {
									$cnt_spans = ($sizeof_doc_purchased==0) ? ($this->mylib_rows_limit-1) : ($this->mylib_rows_limit-($sizeof_doc_purchased));
									for( $i=0;$i<$cnt_spans;$i++) {?>
              <span class="tile half-library bg-transparent description" style="box-shadow: 0px 0px 0px inset;"></span>
              <?php 
										echo ($i%3==0) ? "<div class='clear'></div>" : '';
									}
								}
								// Pagination //
									$total_purchased_pages = ceil( $total_purchased/$this->mylib_rows_limit );
									echo "<div class='pull-right mart25 marr5 pagination small opacity'>"; 
									$this->common->getS1Pagination($this->router->fetch_method()."?1", $total_purchased_pages, $pgno_purchased, $this->mylib_rows_limit, 10, '#purchased');
									echo "</div>";
								?>
              <!-- end mylibrary item --> 
            </div>
            <!--****END PURCHASED ************--> 
          </div>
          <!--****END MY INVESTIGATIONS ************--> 
        </div>
        <!-- END SECOND COLUMN FIRST ROW --> 
        
        <!-------BEGIN THIRD COLUMN FIRST ROW OF TILES------>
        <!--<div class="tile-group no-margin no-padding clearfix span4 lastTile">
          <div class="tile double profile-content-box tab-content"> <img src="< ?php echo $base;?>img/ad/mylibrary/investigations/ad1.png"> </div>
          <div class="tile double profile-content-box tab-content"> <img src="< ?php echo $base;?>img/ad/mylibrary/investigations/ad2.png"> </div>
          <div class="tile double profile-content-box tab-content"> <img src="< ?php echo $base;?>img/ad/mylibrary/investigations/ad3.png"> </div>
        </div> -->
        <!-------END  THIRD COLUMN FIRST ROW OF TILES------> 
      </div>
    </div>
  </div>
</div>
<!--END OF CODE FOR METRO STYLE--> 
<?php $this->load->view('footer_admin'); ?>
<script type="text/javascript" src="<?php echo $base;?>js/jquery/jquery.min.js"></script> 
<script type="text/javascript" src="<?php echo $base;?>js/jquery-ui.js"></script> 
<script type="text/javascript">
$(document).ready(function () {
	$('.description').popover({html: true});
	});

	var jq201 = jQuery.noConflict();
	jq201(document).ready(function () {
		jq201('.draggable a.investigation').draggable({helper: 'clone', start: function (event, ui) {
			jq201(ui.helper).css("margin-left", event.clientX - (jq201(event.target).offset().left+90));
			jq201(ui.helper).css("margin-top", event.clientY - (jq201(event.target).offset().top+30));
		}});
		jq201('#members .clearfix').droppable({
		  drop: function( event, ui ) {
			$libtype_section= ui.draggable.attr('libtype_section');
			$lib_id 		= ui.draggable.attr('libdata');
			var libId 		= ui.draggable.attr('lib_id');

			jq201.post('<?php echo $base;?>ajax/ajax_assign_inventory', {'lib_id':$lib_id, 'worker_id': $(this).attr('rel'), 'libtype_section':$libtype_section}, function(data){
				if(data.trim() != '') {
					alert(data);
				}
			})
		  }
		});
	});
</script>
<script type="text/javascript" src="<?php echo $base."js/library.js";?>"></script>