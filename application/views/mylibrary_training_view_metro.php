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
    <div class="main-content padding-metro-header subheader-secondary clearfix fg-grayLighter"> <em class="margin20">MY TRAINING &nbsp;
        	<a href="#info_mylibrary_training_modal" data-toggle='modal'><span class="icon-info-2 s1_info fg-white"></span></a>
            </em>
        </div>
    </div>
    <!-- Start INFO Modal --> 
    <?php // Modal: INFO//
					$this->load->view('info/mylibrary_training_modal');
				
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
        <div class="tile-group no-margin no-padding clearfix middleTile" max-width="100%;" > 
          <!--************BEGIN TAB MENU***************-->
          <ul class="nav nav-tabs " style="margin-right: 10px;">
            <li class="profile"><a href="#purchased" data-toggle="tab" class="fg-white fg-hover-black">Purchased</a></li>
            <li class="profile"><a href="#assigned" data-toggle="tab" class="fg-white fg-hover-black" >Assigned</a></li>
            <li class="profile"><a href="#completed" data-toggle="tab" class="fg-white fg-hover-black">Completed</a></li>
            <?php 
						if( sizeof($documents_free) ) {?>
            <li class="profile"><a href="#free" data-toggle="tab" class="fg-white fg-hover-black">Free</a></li>
            <?php
						}?>
          </ul>
          <!--************END TAB MENU***************--> 
          
        <!--****Begin MY INSPECTIONS ************-->
		<div class="tab-content"> 
            <!--****Begin FREE************-->
            <div class="tab-pane fade" id="free"> 
				<!-- Mylibrary item-->
				<?php 
				$page = 1;
				$sizeof_doc_free = sizeof($documents_free);
				if( isset($documents_free) && $sizeof_doc_free ) {
				foreach($documents_free as $doc) {
					$description 	= $doc['description'];
					$points 		= $doc['credits'];
					$title 			= $doc['lib_title'];
					$contents_on_hover 	= '<p><b>'.$description.'</b></p><h6><i ><img src='.$base.'img/icons_xp.png style=height:20px /></i>&nbsp;'.$points.'</h6>';
					$inventory = ( $doc['qty_ordered'] - $doc['qty_assigned'] );
					if( $inventory>0 && $doc['price']<=0 ) {?>
						<a href="<?php echo $base;?>admin/library_page_contents?libtype=1&libid=<?php echo $doc['lib_id'];?>&section=desc&language=<?php echo $doc['language'];?>" class="tile half-library bg-darker   description <?php if(!($doc['date_end']=="0000-00-00" || $doc['date_end']>date('Y-m-d'))):?> expired <?php endif;?>" data-toggle="modal" data-content="<?php echo $contents_on_hover;?>" data-original-title="<?php echo "<h5 class='margin10'>".$title."</h5>"?>" data-placement="bottom" data-trigger="hover"> 
						<div class="half bg-darker">
							<img src="<?php echo $base.$this->path_img_library."training.png";?>" /> 
							<span  class="list-title fg-white" style="position:absolute;top:0px;"><small><?php echo substr($doc['lib_title'],0,15)
;?>...</small></span>
						</div>
						<div class="brand"><span class="label fg-white text-center"><small><i class=""><img src="<?php echo $base;?>img/icons_xp.png" style="height:16px;" /></i>&nbsp;<?php echo $doc['credits'];?></small></span></div>
						</a>
						<?php 
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

            <!--****Begin COMPLETED ************-->
            <div class="tab-pane fade" id="completed"> 
              <!-- Begin mylibrary items section --> 
			  
              <!-- Mylibrary item-->
			  <?php 
			  // Training Worker
				$rows_worker[] 	= $this->points->hasUserGainedPointsGetPoints(2, 30, $checkPointsGained=1);
				$rows_worker[] 	= $this->points->hasUserGainedPointsGetPoints(2, 1018, $checkPointsGained=1);
				$rows_worker[] 	= $this->points->hasUserGainedPointsGetPoints(2, 1021, $checkPointsGained=1);
				$rows_worker[] 	= $this->points->hasUserGainedPointsGetPoints(2, 1022, $checkPointsGained=1);
				// common::pr($rows_worker);
				
			 // Training Supervisor
				$rows_supervisor[]= $this->points->hasUserGainedPointsGetPoints(2, 1023, $checkPointsGained=1);
				$rows_supervisor[]= $this->points->hasUserGainedPointsGetPoints(2, 1024, $checkPointsGained=1);
				$rows_supervisor[]= $this->points->hasUserGainedPointsGetPoints(2, 1025, $checkPointsGained=1);
				$rows_supervisor[]= $this->points->hasUserGainedPointsGetPoints(2, 1026, $checkPointsGained=1);
				// common::pr($rows_supervisor);
			
				$aw_worker_training = $aw_supervisor_training = '';

			if( $rows_worker[0]['has_points_gained']&&$rows_worker[1]['has_points_gained']&&$rows_worker[2]['has_points_gained']&&$rows_worker[3]['has_points_gained'] ) {
				$aw_worker_training = "completed";
			}
			if( $rows_supervisor[0]['has_points_gained']&&$rows_supervisor[1]['has_points_gained']&&$rows_supervisor[2]['has_points_gained']&&$rows_supervisor[3]['has_points_gained'] ) {
				$aw_supervisor_training = "completed";
			}

			/*
			if( "7" == $this->sess_usertype ) {
				$where_arrworkers	= '(st_designation="my_worker" OR st_designation="supervisor") AND st_status="y" AND in_worker_id="'.$this->sess_userid.'"';
				$rows_my_workers	= $this->users->getMetaDataList("union_designations", $where_arrworkers, '', 'st_designation');
			}
			else {
				$where_arrworkers	= '(st_designation="my_worker" OR st_designation="supervisor") AND st_status="y" AND in_user_id="'.$this->sess_userid.'"';
				$rows_my_workers	= $this->users->getMetaDataList("employer_consultant_designations", $where_arrworkers, '', 'st_designation');
			}
			common::pr($rows_my_workers);
		
			$is_my_supervisor = '';					
			$is_my_worker= (isset($rows_my_workers[0]['st_designation'])&&$rows_my_workers[0]['st_designation']=="my_worker") ? 1 : '';
			if( $is_my_worker ) {
				$is_my_supervisor	= (isset($rows_my_workers[1]['st_designation'])&&$rows_my_workers[1]['st_designation']=="supervisor") ? 1 : '';
			}
			$aw_worker_training = ("9"==$this->sess_usertype) ? "completed" : ''
			$aw_supervisor_training = ("1"==$is_my_supervisor) ? "completed" : ''
			*/

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

				$page 			= 1;
				$cnt_completed 	= 0;
				$sizeof_doc_completed = sizeof($documents_completed);
				// common::pr($documents_completed);
				if( isset($documents_completed) && $sizeof_doc_completed ) {
					foreach($documents_completed as $doc) {
						// echo $doc['library_id'];common::pr($worker_awtraining_libraries);
						if( !in_array($doc['library_id'], $worker_awtraining_libraries) && !in_array($doc['library_id'], $supervisor_awtraining_libraries) ) {
							$description 	= $doc['description'];
							$points 		= $doc['credits'];
							$title 			= $doc['title'];
							$contents_on_hover 	= '<p><b>'.$description.'</b></p><h6><i ><img src='.$base.'img/icons_xp.png style=height:20px /></i>&nbsp;'.$points.'</h6>';?>
							<a href="<?php echo $base;?>admin/library_page_contents?libtype=1&libid=<?php echo $doc['library_id'];?>&section=desc&language=<?php echo $doc['language'];?>" class="tile half-library bg-darker description <?php if(!($doc['date_end']=="0000-00-00" || $doc['date_end']>date('Y-m-d'))):?> expired <?php endif;?>" data-toggle="popover" data-content="<?php echo $contents_on_hover;?>" data-original-title="<?php echo "<h5 class='margin10'>".$title."</h5>"?>" data-placement="bottom" data-trigger="hover"> 
							<div class="half bg-darker">
								<img src="<?php echo $base.$this->path_img_library."training.png";?>" /> 
								<span class="list-title fg-white" style="position:absolute;top:0px;"><small><?php echo substr($title,0,15);?>...</small></span>
							</div>
							<div class="brand">
								<span class="label fg-white text-center">
									<small><i class=""><img src="<?php echo $base;?>img/icons_xp.png" style="height:16px;" /></i>&nbsp;<?php echo $doc['credits'];?></small>
								</span>
							</div>
							</a>
							<?php 
							if( $aw_worker_training == "completed" && $aw_supervisor_training == "completed" ) {
								if( $cnt_completed == 0 ) {
									echo "<div class='clear'></div>";
									$page = 0;
								}
							}
							else if( $aw_worker_training == "completed" || $aw_supervisor_training == "completed" ) {
								if( $cnt_completed == 1 ) {
									echo "<div class='clear'></div>";
									$page = 0;
								}
							}
							if ($page == 3) {
								$page = 0;
								echo "<div class='clear'></div>";
							}
							$page++;
							$cnt_completed++;
						}
					}
				}
				else {
					echo "<h3 class='fl'>No data available</h3>";
				}

				if( $sizeof_doc_completed < $this->mylib_rows_limit ) {
					$cnt_spans = ($sizeof_doc_completed==0) ? ($this->mylib_rows_limit-1) : ($this->mylib_rows_limit-($sizeof_doc_completed));
					for( $i=0;$i<$cnt_spans;$i++){ ?>
						<span class="tile half-library bg-transparent description" style="box-shadow: 0px 0px 0px inset;"></span>
						<?php 
						echo ($i%3==0) ? "<div class='clear'></div>" : '';
					}
				}?>
            <!-- end mylibrary item --> 
            <!-- End mylibrary items section -->
            <?php 
			// Pagination //
				$total_completed_pages = ceil( $total_completed/$this->mylib_rows_limit );
				echo "<div class='pull-right mart25 marr5 pagination small opacity'>"; 
				$this->common->getS1Pagination($this->router->fetch_method()."?1", $total_completed_pages, $pgno_completed, $this->mylib_rows_limit, 10, '#completed');
				echo "</div>";
				?>
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
						$description 	= $doc['description'];
						$points 		= $doc['credits'];
						$title 			= $doc['title'];
						$contents_on_hover 	= '<p><b>'.$description.'</b></p><h6><i ><img src='.$base.'img/icons_xp.png style=height:20px /></i>&nbsp;'.$points.'</h6>';?>
						<a href="<?php echo $base;?>admin/library_page_contents?libtype=1&libid=<?php echo $doc['library_id'];?>&section=desc&language=<?php echo $doc['language'];?>" class="tile half-library bg-darker description <?php if(!($doc['date_end']=="0000-00-00" || $doc['date_end']>date('Y-m-d'))):?> expired <?php endif;?>" data-toggle="popover" data-content="<?php echo $contents_on_hover;?>" data-original-title="<?php echo "<h5 class='margin10'>".$title."</h5>"?>" data-placement="bottom" data-trigger="hover"> 
						<div class="half bg-darker">
							<img src="<?php echo $base.$this->path_img_library."training.png";?>" /> 
							<span  class="list-title fg-white" style="position:absolute;top:0px;"><small><?php echo substr($title,0,15);?>...</small></span>
						</div>
						<div class="brand">
						<span class="label fg-white text-center"><small><i class=""><img src="<?php echo $base;?>img/icons_xp.png" style="height:16px;" /></i>&nbsp;<?php echo $doc['credits'];?></small></span>
						</div>
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
				}?>
				<!-- end mylibrary item -->
				
				<?php 
				// Pagination //
					$total_assigned_pages = ceil( $total_assigned/$this->mylib_rows_limit );
					echo "<div class='pull-right mart25 marr5 pagination small opacity'>"; 
					$this->common->getS1Pagination($this->router->fetch_method()."?1", $total_assigned_pages, $pgno_assigned, $this->mylib_rows_limit, 10, '#assigned');
					echo "</div>";?>
            </div>
            <!--****END ASSIGNED ************--> 
            
            <!--****Begin PURCHASED************-->
            <div class="tab-pane fade" id="purchased"> 
              <!-- Mylibrary item-->
              <?php 
								$cnt_mylib_bought = $page = 1;
								// Common::pr($documents_purchased);
								$sizeof_doc_purchased = sizeof($documents_purchased);
								if( isset($documents_purchased) && $sizeof_doc_purchased ) {
									foreach($documents_purchased as $doc) {
									$description 	= $doc['description'];
									$points 		= $doc['credits'];
									$contents_on_hover 	= '<p><b>'.$description.'</b></p><h6><i ><img src='.$base.'img/icons_xp.png style=height:20px /></i>&nbsp;'.$points.'</h6>';
										$inventory = ( $doc['qty_ordered'] - $doc['qty_assigned'] );
										if( $inventory>0 && $doc['price']>0 ) {
											$doc['lib_title'] = mb_strtolower($doc['lib_title'],'UTF-8');
											$doc['lib_title'] = ucwords($doc['lib_title']);?>
              <a href="<?php echo $base;?>admin/library_page_contents?libtype=1&libid=<?php echo $doc['lib_id'];?>&section=desc&language=<?php echo $doc['language'];?>" class="tile half-library bg-darker   description <?php if(!($doc['date_end']=="0000-00-00" || $doc['date_end']>date('Y-m-d'))):?> expired <?php endif;?>" data-toggle="popover" data-content="<?php echo $contents_on_hover;?>" data-original-title="<h5 class='margin10'><?php echo $doc['lib_title']; ?></h5>" data-placement="bottom" data-trigger="hover" cnt_purchased="<?php echo $cnt_mylib_bought;?>">
              <div class="half bg-darker"> <img src="<?php echo $base.$this->path_img_library."training.png";?>" /> <span class="fg-white" style="position:absolute;top:0px;"><small><?php echo $this->common->subString($doc['lib_title'],15);?></small></span> </div>
              <div class="brand"><span class="label fg-white text-center"> <small><i class=""><img src="<?php echo $base;?>img/icons_xp.png" style="height:16px;" /></i>&nbsp;<?php echo $doc['credits'];?> </small></span> <span class="badge bg-red"><?php echo $inventory;?></span> </div>
              </a>
              <?php 
											if ($page == 3) {
												$page = 0;
												echo "<div class='clear'></div>";
											}
											$page++;
											$cnt_mylib_bought++;
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
								}?>
								<!-- end mylibrary item -->
              <?php 
							// Pagination //
								$total_purchased_pages = ceil( $total_purchased/$this->mylib_rows_limit );
								echo "<div class='pull-right mart25 marr5 pagination small opacity'>"; 
								$this->common->getS1Pagination($this->router->fetch_method()."?1", $total_purchased_pages, $pgno_purchased, $this->mylib_rows_limit, 10, '#purchased');
								echo "</div>";
								?>
            </div>
            <!--****END PURCHASED ************--> 
          </div>
          <!--****END MY INSPECTIONS ************--> 
        </div>
        <!-- END SECOND COLUMN FIRST ROW --> 
        
        <!-------BEGIN THIRD COLUMN FIRST ROW OF TILES------>
        <!--<div class="tile-group no-margin no-padding clearfix span4 lastTile">
          <div class="tile double profile-content-box tab-content"> <img src="< ?php echo $base;?>img/ad/mylibrary/training/ad1.png"> </div>
          <div class="tile double profile-content-box tab-content"> <img src="< ?php echo $base;?>img/ad/mylibrary/training/ad2.png"> </div>
          <div class="tile double profile-content-box tab-content"> <img src="< ?php echo $base;?>img/ad/mylibrary/training/ad3.png"> </div>
        </div> -->
        <!-------END  THIRD COLUMN FIRST ROW OF TILES------> 
      </div>
    </div>
  </div>
</div>
<!--END OF CODE FOR METRO STYLE-->
<?php $this->load->view('footer_admin');?>
<script type="text/javascript" src="<?php echo $base."js/library.js";?>"></script>
<script>
$(document).ready(function () {
	$('.description').popover({html: true});

	});
</script>
