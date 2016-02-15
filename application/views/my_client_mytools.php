<!--************BEGIN TAB MENU***************-->
            <ul id="menuToolsContainer" class="nav nav-tabs " style="margin-right: 10px;">
                    <li id="menu_client_inspection" class="profile" ><a href="#tools#client_inspection" data-toggle="tab" class="fg-white fg-hover-black">My Inspection</a></li>
                    <li id="menu_client_investigation" class="profile " ><a href="#tools#client_investigation" data-toggle="tab" class="fg-white fg-hover-black">My Investigation</a></li>
                    <li id="menu_client_stalks" class="profile active" ><a href="#tools#client_stalks" data-toggle="tab" class="fg-white fg-hover-black" >My Safety Talks</a></li>
            </ul>
			<!--************END TAB MENU***************-->
			<!--************BEGIN  PANELS***************-->
			
                <div class="tab-content " style="overflow:hidden" id="contentContainer">
                  <!--************begin Tools panel***********-->                  
                  <div class="tab-pane fade in active" id="client_stalks">
                 <div class="grid fluid">                    
                    <!-- Mylibrary item-->
                    <?php 
                    $page_safetalks = 1;
                    $cnt_purchased_safetalks = 0;
                    $sizeof_doc_purchased_safetalks = sizeof($documents_purchased_safetalks);
                    if( isset($documents_purchased_safetalks) && $sizeof_doc_purchased_safetalks ) {
                            foreach($documents_purchased_safetalks as $doc) {
								$bg_class = ("normal_safetytalks"==$doc['libtype_section']) ? "bg-darkGreen" : "bg-darker";
								if( $doc['inventory'] > 0 )  {
								?>
								<a href="<?php echo $base."admin/my_safetytalks_page_metro?id=".$doc['lib_id']."&type=".$doc['libtype_section']."&clientid=".$clientID;?>" rel="<?php echo $doc['lib_id'];?>" style="opacity:0.8;" class="safety tile half-library <?php echo $bg_class;?> description <?php if(!($doc['date_end']=="0000-00-00" || $doc['date_end']>date('Y-m-d'))):?> expired <?php endif;?>" data-toggle="popover" data-content="<h6><?php echo $doc['description'];?></h6>"  data-original-title="<h6><?php echo $doc['lib_title']; ?></h6>" data-placement="bottom" data-trigger="hover" libtype_section="<?php echo $doc['libtype_section'];?>">
								<?php 
								if( isset($doc['st_icon_path']) && $doc['st_icon_path'] && "normal_safetytalks"==$doc['libtype_section'] ) {?>
								<i class="icon on-left"><img src="<?php echo $doc['st_icon_path'];?>" width="40" height="40"></i>
								<?php
								}
								else {?>
										<i class="icon on-left"><img src="<?php echo $base.$this->path_img_library."icon-en.png";?>" width="40" height="40"></i> 
								<?php 
								}?>
								<span class="list-title fg-white margin10"><small><?php echo Common::subString($doc['lib_title'],16);?></small></span>
								<div class="brand">
										<span class="label fg-white text-center"><small><?php echo $doc['credits'];?> points</small></span>
										<span class="badge bg-red" id="balance_<?php echo $doc['libtype_section']?><?php echo $doc['lib_id'];?>"><?php echo $doc['inventory'];?></span>
								</div>
								</a>
								<?php 
								if ($page_safetalks == 3) {
										$page_safetalks = 0;
										echo "<div class='clear'></div>";
								}
								$page_safetalks++;
								$cnt_purchased_safetalks++;
								}
                            }
                        if( $cnt_purchased_safetalks <= 0 ) {
                            // echo "<h3 class='fl'>No Safety Talks data available</h3>";
                        }
                        if( $sizeof_doc_purchased_safetalks < $this->mylib_rows_limit ) {
                                $cnt_spans = ($sizeof_doc_purchased_safetalks==0) ? ($this->mylib_rows_limit-1) : ($this->mylib_rows_limit-($sizeof_doc_purchased_safetalks));
                                for( $i=0;$i<$cnt_spans;$i++) {?>
                                        <span class="tile half-library bg-transparent description" style="box-shadow: 0px 0px 0px inset;"></span>
                                        <?php 
                                        echo ($i%3==0) ? "<div class='clear'></div>" : '';
                                }
                        }
                        // Pagination //
                        $total_purchased_pages_safetalks = ceil( $total_purchased_safetalks/$this->mylib_rows_limit );                           
                        echo "<div class='pull-right mart25 marr5 pagination small opacity'>"; 
                        $this->common->getS1Pagination($this->router->fetch_method()."?id=".$clientID, $total_purchased_pages_safetalks, $pgno_purchased_safetalks, $this->mylib_rows_limit, 10, '#tools#client_stalks');
                        echo "</div>";
                    }
                    ?>
            <!-- end mylibrary item -->
                  </div>
                    
					
                  </div>
                  <!--************end tools panel***********-->
                  <!--************begin project panel***********-->
                  <div class="tab-pane fade" id="client_investigation">
                  <div class="grid fluid">
                <?php 
                    $page_investigation = 1;
                    $sizeof_doc_purchased_investigation = sizeof($documents_purchased_investigation);						
                    if( isset($documents_purchased_investigation) && $sizeof_doc_purchased_investigation ) {
                            $title = "Investigations";
                            foreach($documents_purchased_investigation as $doc) {
								// Get Investigation form details from Investigation Id                                        
										$rows_invforms = $this->users->getMetaDataList('inv_investigation_forms', 'in_inv_form_id="'.$doc['in_inv_form_id'].'"', '', 'in_inv_form_id, st_inv_form_no, is_inv_form_sealed');
										if( isset($rows_invforms) && sizeof($rows_invforms) ) {
											foreach( $rows_invforms AS $val_invforms ) {
												$inv_form_id 		= $val_invforms['in_inv_form_id'];
												$inv_form_no 		= $val_invforms['st_inv_form_no'];
												$inv_form_sealed 	= $val_invforms['is_inv_form_sealed'];
												$inv_form_sealed 	= ($inv_form_sealed=='1')?'SEALED':'OPEN';
												$contents_on_hover 	= "<h5>Status: ".$inv_form_sealed."</h5>";
												$href = $base."admin/cover_page_investigation?invformid=".$inv_form_id."&clientid=".$clientID;?>
												<a href="<?php echo $href;?>" lib_id="<?php echo $doc['lib_id'];?>" libdata="<?php echo $doc['in_inv_form_id']."-6-".$doc['lib_id'];?>" class="investigation tile half-library half-library bg-darker description" data-toggle="popover" data-content="<?php echo $contents_on_hover;?>" style="opacity:0.8;" data-original-title="<?php echo "<h6 class='margin10'>".$title."</h6>"?>" data-placement="bottom" data-trigger="hover" libtype_section="Investigations">
													<span class="list-title fg-white margin10"><small><?php echo $inv_form_no;?></small></span>
													<div class="brand"><span class="label fg-white text-center"><small></small></span></div>
												</a>
												<?php 
											}
										}
										if ($page_investigation == 3) {
												$page_investigation = 0;
												echo "<div class='clear'></div>";
										}
										$page_investigation++;
                            }
                    }
                    else {
						echo "<h3 class='fl'>No Investigation data available</h3>";
                    }
                    if( $sizeof_doc_purchased_investigation < $this->mylib_rows_limit ) {
						$cnt_spans = ($sizeof_doc_purchased_investigation==0) ? ($this->mylib_rows_limit-1) : ($this->mylib_rows_limit-($sizeof_doc_purchased_investigation));
						for( $i=0;$i<$cnt_spans;$i++) {?>
							<span class="tile half-library bg-transparent description" style="box-shadow: 0px 0px 0px inset;"></span>
							<?php 
							echo ($i%3==0) ? "<div class='clear'></div>" : '';
						}
                    }
                    // Pagination //
                    $total_purchased_pages_investigation = ceil( $total_purchased_investigation/$this->mylib_rows_limit );                            
                    echo "<div class='pull-right mart25 marr5 pagination small opacity'>"; 
                    $this->common->getS1Pagination($this->router->fetch_method()."?id=".$clientID, $total_purchased_pages_investigation, $pgno_purchased_investigation, $this->mylib_rows_limit, 10, '#tools#client_investigation');
                    echo "</div>";
                    ?>
                </div>
                   
                  </div>
                  <!--************end project panel***********-->
                  <!--************begin Description panel***********-->
                  <div class="tab-pane fade" id="client_inspection">
                  	<div class="grid fluid">
                        <?php 
                                $page = 1;
                                $cnt_purchased = 0;
                                $sizeof_doc_purchased_inspection = sizeof($documents_purchased_inspection);

                                if( isset($documents_purchased_inspection) && $sizeof_doc_purchased_inspection ) {
                                    foreach($documents_purchased_inspection as $doc) {                                            
										if( $doc['inventory'] > 0 )  { ?>
											<a href="<?php echo $base."admin/my_inspection_page_metro?id=".$doc['lib_id']."&type=".$doc['libtype_section']."&clientid=".$clientID;?>" rel="<?php echo $doc['lib_id'];?>" style="opacity:0.8;" class="insp tile half-library bg-darker description <?php if(!($doc['date_end']=="0000-00-00" || $doc['date_end']>date('Y-m-d'))):?> expired <?php endif;?>" data-toggle="popover" data-content="<h6><?php echo $doc['description'];?></h6>" data-original-title="<h6><?php echo $doc['lib_title']; ?></h6>" data-placement="bottom" data-trigger="hover" libtype_section="<?php echo $doc['libtype_section'];?>" title="<?php echo $doc['lib_title'];?>">
											<?php 
											if( isset($doc['st_icon_path']) && $doc['st_icon_path'] ) {?>
												<i class="icon on-left"><img src="<?php echo $doc['st_icon_path'];?>" width="40" width="40" ></i>
												<?php
											}
											else {?>
													<i class="icon on-left"><img src="<?php echo $base.$this->path_img_library."icon-en.png";?>" width="40" width="40" ></i> 
											<?php 
											}?>
											<span class="list-title fg-white text-center"><small><?php echo Common::subString($doc['lib_title'],16);?></small></span>
											<div class="brand">
													<span class="label fg-white text-center"><small><?php echo $doc['credits'];?> points</small></span>
													<span class="badge bg-red" id="balance_<?php echo $doc['libtype_section'];?><?php echo $doc['lib_id'];?>"><?php echo $doc['inventory'];?></span>
											</div>
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
                                else {
                                        echo "<h3 class='fl'>No Inspection data available</h3>";
                                }
                                if( $sizeof_doc_purchased_inspection < $this->mylib_rows_limit ) {
                                        $cnt_spans = ($sizeof_doc_purchased_inspection==0) ? ($this->mylib_rows_limit-1) : ($this->mylib_rows_limit-($sizeof_doc_purchased_inspection));                                        
                                        for( $i=0;$i<$cnt_spans;$i++) {?>
                                                <span class="tile half-library bg-transparent description" style="box-shadow: 0px 0px 0px inset;"></span>
                                                <?php 
                                                echo ($i%3==0) ? "<div class='clear'></div>" : '';
                                        }
                                }
                                // Pagination //
                                $total_purchased_pages_inspection = ceil( $total_purchased_inspection/$this->mylib_rows_limit );
                                echo "<div class='pull-right mart25 marr5 pagination small opacity'>"; 
                                $this->common->getS1Pagination($this->router->fetch_method()."?id=".$clientID, $total_purchased_pages_inspection, $pgno_purchased_inspection, $this->mylib_rows_limit, 10, '#tools#client_inspection');
                                echo "</div>";
                                ?>
                    
                    </div>
                    
                   
                  </div>
                  
                  <!--************end Description panel***********-->
					
                </div>
			<!--************END PANELS***************-->                
