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
    <div class="main-content padding-metro-header subheader-secondary clearfix fg-grayLighter"> <em class="margin20">MY SAFETY TALKS &nbsp;
        	<a href="#info_mylibrary_safety_talks_modal" data-toggle='modal'><span class="icon-info-2 s1_info fg-white"></span></a>
            </em>
        </div>
    </div>
    <!-- Start INFO Modal --> 
    <?php // Modal: INFO//
					$this->load->view('info/mylibrary_safety_talks_modal');
				
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
        <div class="tile-group no-margin no-padding clearfix draggable middleTile" max-width="100%;" style="z-index:10;"> 
          <!--************BEGIN TAB MENU***************-->
          <ul class="nav nav-tabs " style="margin-right: 10px;">
            <li class="profile"><a href="#purchased" data-toggle="tab" class="fg-white fg-hover-black">Purchased</a></li>
            <li class="profile"><a href="#assigned" data-toggle="tab" class="fg-white fg-hover-black" >Assigned</a></li>
            <li class="profile"><a href="#completed" data-toggle="tab" class="fg-white fg-hover-black">Completed</a></li>
            <?php 
						if( sizeof($documents_free) ) {?>
            <!--li class="profile " ><a href="#free" data-toggle="tab" class="fg-white fg-hover-black">Free</a></li-->
            <?php
						}?>
          </ul>
          <!--************END TAB MENU***************-->
          
          <div class="tab-content"> 
            <!--****Begin FREE************- ->REMOVED ON DEC 15 2015 AT THE TIME TO FIX TILES STYLES - THERE IS NO FREE SAFETY TALKS AT THIS POINT********
            <div class="tab-pane fade" id="free" max-width="100%;"> 
              <!-- Mylibrary item- ->
              <?php 
								$page = 1;
								$cnt_free = 0;
								$sizeof_doc_free = sizeof($documents_free);
								if( isset($documents_free) && $sizeof_doc_free ) {
									foreach($documents_free as $doc) {
										$bg_class = ("normal_safetytalks"==$doc['libtype_section']) ? "bg-darkGreen" : "bg-darker";
										if( $doc['inventory']>0 && $safetytalks_price<=0 )  {
											$safetytalks_title = $this->users->getMetaDataList('safetytalks_information', 'in_safetytalks_id="'.$doc['lib_id'].'"', '', 'st_title');
											$safetytalks_title = (isset($safetytalks_title[0]['st_title'])&&$safetytalks_title[0]['st_title']) ? $safetytalks_title[0]['st_title'] : $doc['lib_title'];?>
              <a href="<?php echo $base."admin/my_safetytalks_page_metro?id=".$doc['lib_id']."&type=".$doc['libtype_section'];?>" rel="<?php echo $doc['lib_id'];?>" style="opacity:0.8;" class="safety tile half-library <?php echo $bg_class;?> description <?php if(!($doc['date_end']=="0000-00-00" || $doc['date_end']>date('Y-m-d'))):?> expired <?php endif;?>" data-toggle="popover" data-content="<h6><?php echo $doc['description'];?></h6>"  data-original-title="<h6><?php echo $safetytalks_title; ?></h6>" data-placement="bottom" data-trigger="hover" libtype_section="<?php echo $doc['libtype_section'];?>">
              <?php 
											if( isset($doc['st_icon_path']) && $doc['st_icon_path'] && "normal_safetytalks"==$doc['libtype_section'] ) {?>
              <i class="icon on-left"><img src="<?php echo $doc['st_icon_path'];?>" width="40" height="40"></i>
              <?php
											}
											else {?>
              <i class="icon on-left"><img src="<?php echo $base.$this->path_img_library."safety_talks.png";?>" width="40" height="40"></i>
              <?php 
											}?>
              <span class="list-title fg-white margin10"><small><?php echo Common::subString($safetytalks_title,16);?></small></span>
              <div class="brand"> <span class="label fg-white text-center"><small><i class=""><img src="<?php echo $base;?>img/icons_xp.png" style="height:16px;" /></i>&nbsp;<?php echo $doc['credits'];?></small></span>
                <span class="badge bg-red" id="balance_<?php echo $doc['libtype_section']?><?php echo $doc['lib_id'];?>"><?php echo $doc['inventory'];?></span>
              </div>
              </a>
              <?php 
											if ($page == 3) {
												$page = 0;
												echo "<div class='clear'></div>";
											}
											$page++;
											$cnt_free++;
										}
									}
								}
								if( $cnt_free <= 0 ) {
									echo "<h3 class='fl'>No data available</h3>";
								}
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
              <!-- end mylibrary item - -> 
            </div>
            <!--****END FREE ************--> 
            
            <!--****Begin MY Completed ************--> 
            
            <!--****Begin COMPLETED ************-->
            <div class="tab-pane fade" id="completed"> 
              <!-- Begin mylibrary items section --> 
              <!-- Mylibrary item-->
              <?php 
									$page = 1;
									$sizeof_doc_completed = sizeof($documents_completed);
									if( isset($documents_completed) && $sizeof_doc_completed ) {
										foreach($documents_completed as $doc) {
											$bg_class = ("normal_safetytalks"==$doc['libtype_section']) ? "bg-darkGreen" : "bg-darker";
											$safetytalks_title = $this->users->getMetaDataList('safetytalks_information', 'in_safetytalks_id="'.$doc['lib_id'].'"', '', 'st_title');
											$safetytalks_title = (isset($safetytalks_title[0]['st_title'])&&$safetytalks_title[0]['st_title']) ? $safetytalks_title[0]['st_title'] : $doc['st_safetytalks_topic'];
											$points 		= $safetytalks_credits;
											$description 	= $doc['description'];
											$contents_on_hover 	= '<p><b>'.$safetytalks_title.'</b></p><h6><i ><img src='.$base.'img/icons_xp.png style=height:20px /></i>&nbsp;'.$points.'</h6>';

											?>
              <a href="<?php echo $base."admin/my_safetytalks_page_metro?id=".$doc['lib_id']."&type=".$doc['libtype_section'];?>" 
											class="tile half-library  <?php echo $bg_class;?> description <?php if(!($doc['date_end']=="0000-00-00" || $doc['date_end']>date('Y-m-d'))):?> expired <?php endif;?>" data-toggle="popover" data-content="<?php echo $contents_on_hover; ?>" data-original-title="<h6 class='margin10'><?php echo $safetytalks_title; ?></h6>" data-placement="bottom" data-trigger="hover" >
											<div class="half">
              <?php 
											if( isset($doc['st_icon_path']) && $doc['st_icon_path'] && "normal_safetytalks"==$doc['libtype_section'] ) {?>
              <i class="icon on-left"><img src="<?php echo $doc['st_icon_path'];?>"  ></i>
              <?php 
											}
											else {?>
              <i class="icon on-left"><img src="<?php echo $base.$this->path_img_library."safety_talks.png";?>" ></i>
              <?php 
											  }?>
              <span class="list-title fg-white" style="position:absolute;top:0px;"><small><?php echo $this->common->subString($safetytalks_title,15);?></small></span>
              
              	</div>
              	<div class="brand"> <span class="label fg-white text-center"><small><i class=""><img src="<?php echo $base;?>img/icons_xp.png" style="height:16px;" /></i>&nbsp;<?php echo $points;?></small></span> </div>

              </a>
              <?php 
											if ($page == 3) {
												$page = 0;
												echo "<div class='clear'></div>";
											}
											$page++;
										}
									}
									else {
										echo "<h3 class='fl'>No data available</h3>";
									}
									if( $sizeof_doc_completed < $this->mylib_rows_limit ) {
										$cnt_spans = ($sizeof_doc_completed==0) ? ($this->mylib_rows_limit-1) : ($this->mylib_rows_limit-($sizeof_doc_completed));
										for( $i=0;$i<$cnt_spans;$i++) {?>
              <span class="tile half-library bg-transparent description" style="box-shadow: 0px 0px 0px inset;"></span>
              <?php 
											echo ($i%3==0) ? "<div class='clear'></div>" : '';
										}
									}
									// Pagination //
										$total_completed_pages = ceil( $total_completed/$this->mylib_rows_limit );
										echo "<div class='pull-right mart25 marr5 pagination small opacity'>"; 
										$this->common->getS1Pagination($this->router->fetch_method()."?1", $total_completed_pages, $pgno_completed, $this->mylib_rows_limit, 10, '#completed');
										echo "</div>";
									?>
              <!-- end mylibrary item --> 
              <!-- End mylibrary items section --> 
            </div>
            <!--****END COMPLETED************--> 
            
            <!--****Begin ASSIGNEd ************-->
            <div class="tab-pane fade" id="assigned"> 
              <!-- Mylibrary item-->
              <?php 
				$page = 1;
				$sizeof_doc_assigned = sizeof($documents_assigned);
				if( isset($documents_assigned) && $sizeof_doc_assigned ) {
					foreach($documents_assigned as $doc) {
						$safetytalks_title = $this->users->getMetaDataList('safetytalks_information', 'in_safetytalks_id="'.$doc['lib_id'].'"', '', 'st_title');
						$safetytalks_title = (isset($safetytalks_title[0]['st_title'])&&$safetytalks_title[0]['st_title']) ? $safetytalks_title[0]['st_title'] : $doc['title'];
						$bg_class = ("normal_safetytalks"==$doc['libtype_section']) ? "bg-darkGreen" : "bg-darker";
						$points 		= $safetytalks_credits;
						$description 	= $doc['description'];
						$contents_on_hover 	= '<p><b>'.$safetytalks_title.'</b></p><h6><i ><img src='.$base.'img/icons_xp.png style=height:20px /></i>&nbsp;'.$points.'</h6>';
						?>
					  <a href="<?php echo $base."admin/my_safetytalks_page_metro?id=".$doc['lib_id']."&type=".$doc['libtype_section'];?>" class="tile half-library  <?php echo $bg_class;?>  description <?php if(!($doc['date_end']=="0000-00-00" || $doc['date_end']>date('Y-m-d'))):?>expired<?php endif;?>" data-toggle="popover" data-content="<?php echo $contents_on_hover; ?>" data-original-title="<h5 class='margin10'><?php echo $safetytalks_title;?></h5>" data-placement="bottom" data-trigger="hover">
					  <div class="half">

					  <?php 
												if( isset($doc['st_icon_path']) && $doc['st_icon_path'] && "normal_safetytalks"==$doc['libtype_section'] ) {?>
					  <i class="icon on-left"><img src="<?php echo $doc['st_icon_path'];?>" ></i>
					  <?php 
												}
												else {?>
					  <i class="icon on-left"><img src="<?php echo $base.$this->path_img_library."safety_talks.png";?>"></i>
					  <?php 
												  }?>
					  <span class="list-title fg-white" style="position:absolute;top:0px;"><small><?php echo $this->common->subString($safetytalks_title,15);?></small></span>
					   </div>
					  <div class="brand"> <span class="label fg-white text-center"><small><i class=""><img src="<?php echo $base;?>img/icons_xp.png" style="height:16px;" /></i>&nbsp;<?php echo $points;?></small></span> </div>
					 
					  </a>
              <?php 
					if ($page == 3) {
						$page = 0;
						echo "<div class='clear'></div>";
					}
					$page++;
				}
			}
			else {
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
            <div class="tab-pane fade" id="purchased" max-width="100%;"> 
              <!-- Mylibrary item-->
              <?php 
								$page = 1;
								$cnt_purchased = 0;
								$sizeof_doc_purchased = sizeof($documents_purchased);
								if( isset($documents_purchased) && $sizeof_doc_purchased ) {
									// common::pr($documents_purchased);
									foreach($documents_purchased as $doc) {
										$bg_class = ("normal_safetytalks"==$doc['libtype_section']) ? "bg-darkGreen" : "bg-darker";
										if( $doc['inventory']>0 && $safetytalks_price>0 )  
										{
											$safetytalks_title = $this->users->getMetaDataList('safetytalks_information', 'in_safetytalks_id="'.$doc['lib_id'].'"', '', 'st_title');
											$safetytalks_title = (isset($safetytalks_title[0]['st_title'])&&$safetytalks_title[0]['st_title']) ? $safetytalks_title[0]['st_title'] : $doc['lib_title'];
											$points 		= $doc['credits'];
											$description 	= $doc['description'];
											$contents_on_hover 	= '<p><b>'.$description.'</b></p><h6><i ><img src='.$base.'img/icons_xp.png style=height:20px /></i>&nbsp;'.$points.'</h6>';
											?>
              <a href="<?php echo $base."admin/my_safetytalks_page_metro?id=".$doc['lib_id']."&type=".$doc['libtype_section'];?>" rel="<?php echo $doc['lib_id'];?>"  class="safety tile half-library <?php echo $bg_class;?> description <?php if(!($doc['date_end']=="0000-00-00" || $doc['date_end']>date('Y-m-d'))):?> expired <?php endif;?>" data-toggle="popover" data-content="<?php echo $contents_on_hover;?>"  data-original-title="<h5 class='margin10'><?php echo $safetytalks_title; ?></h5>" data-placement="bottom" data-trigger="hover" libtype_section="<?php echo $doc['libtype_section'];?>">
              <div class="half">
              <?php 
											if( isset($doc['st_icon_path']) && $doc['st_icon_path'] && "normal_safetytalks"==$doc['libtype_section'] ) {?>
              <i class="icon on-left"><img src="<?php echo $doc['st_icon_path'];?>"></i>
              <?php
											}
											else {?>
              <i class="icon on-left"><img src="<?php echo $base.$this->path_img_library."safety_talks.png";?>" ></i>
              <?php 
											}?>
              <span class="list-title fg-white " style="position:absolute;top:0px;"><small><?php echo $this->common->subString($safetytalks_title,15);?></small></span>
              </div>
              <div class="brand"> <span class="label fg-white text-center"><small><i class=""><img src="<?php echo $base;?>img/icons_xp.png" style="height:16px;" /></i>&nbsp;<?php echo $doc['credits'];?></small></span> <span class="badge bg-red" id="balance_<?php echo $doc['libtype_section']?><?php echo $doc['lib_id'];?>"><?php echo $doc['inventory'];?></span> </div>
              </a>
              <?php 
											if ($page == 3) {
												$page = 0;
												echo "<div class='clear'></div>";
											}
											$page++;
											$cnt_purchased++;
										}
									}
								}
								if( $cnt_purchased <= 0 ) {
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
          <!--****END MY INSPECTIONS ************--> 
        </div>
        <!-- END SECOND COLUMN FIRST ROW --> 
        
        <!-------BEGIN THIRD COLUMN FIRST ROW OF TILES------>
        <!--<div class="tile-group no-margin no-padding clearfix span4 lastTile">
          <div class="tile double profile-content-box tab-content"> <img src="< ?php echo $base;?>img/ad/mylibrary/safetytalks/ad1.png"> </div>
          <div class="tile double profile-content-box tab-content"> <img src="< ?php echo $base;?>img/ad/mylibrary/safetytalks/ad2.png"> </div>
          <div class="tile double profile-content-box tab-content"> <img src="< ?php echo $base;?>img/ad/mylibrary/safetytalks/ad3.png"> </div>
        </div> -->
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
	});
	var jq201 = jQuery.noConflict();
	jq201(document).ready(function () {
		jq201('.draggable a.safety').draggable({helper: 'clone', start: function (event, ui) {
			jq201(ui.helper).css("margin-left", event.clientX - (jq201(event.target).offset().left+90));
			jq201(ui.helper).css("margin-top", event.clientY - (jq201(event.target).offset().top+30));
		}});
		jq201('#members .clearfix').droppable({
		  drop: function( event, ui ) {
			$libtype_section= ui.draggable.attr('libtype_section');
			var libId 		= ui.draggable.attr('rel');
			jq201.post('<?php echo $base;?>ajax/ajax_assign_inventory', {'lib_id':libId, 'worker_id': $(this).attr('rel'), 'libtype_section':$libtype_section}, function(data){
				if(data.trim() != '')
					alert(data);
				else{
					$qty = $('#balance_'+$libtype_section+libId).text();
					$qty = parseInt($qty) - 1;
					$('#balance_'+$libtype_section+libId).text($qty);
					if($qty<1)
						ui.draggable.draggable('disable').parent().parent().parent().css({ opacity: 0.5 }).children().children('input[type=checkbox]').prop('disabled', true);
				}
			})
		  }
		});
	});
</script>
<script type="text/javascript" src="<?php echo $base."js/library.js";?>"></script>