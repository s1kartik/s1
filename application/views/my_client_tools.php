<!--************BEGIN TAB MENU***************-->
	<ul id="menuToolsContainer" class="nav nav-tabs " style="margin-right: 10px;">
		<li id="menu_client_inspection" class="profile" ><a href="#tools#client_inspection" data-toggle="tab" class="fg-white fg-hover-black">Inspection</a></li>
		<li id="menu_client_investigation" class="profile " ><a href="#tools#client_investigation" data-toggle="tab" class="fg-white fg-hover-black">Investigation</a></li>
		<li id="menu_client_stalks" class="profile" ><a href="#tools#client_stalks" data-toggle="tab" class="fg-white fg-hover-black" >Safety Talks</a></li>
		<li id="menu_client_procedures" class="profile active"><a href="#tools#client_procedures" data-toggle="tab" class="fg-white fg-hover-black">Procedures</a></li>
	</ul>
<!--************END TAB MENU***************-->

<div class="tab-content " style="overflow:hidden" id="contentContainer" >
	<!--************Purchased Procedures***********-->
		<div class="tab-pane fade in active" id="client_procedures">
			<div class="grid fluid">                 
			  <?php 
					if( "1" == $this->sess_usertype ) {
						$href 	= $base."admin/s1_new_procedure_by_admin";
						$class	= "";
					}
					else {
						$class	= "newlib";
					}
					$ret_procedure_price= $this->users->getMetaDataList('price_settings', 'price_settingsname="procedures"', '', "in_price, in_points, in_credits");
					$price 			= $ret_procedure_price[0]['in_price'];
					$points 		= $data['item_points'] = $ret_procedure_price[0]['in_points'];
					$credits 		= $data['item_credits'] = $ret_procedure_price[0]['in_credits'];
					$title 			= "NEW PROCEDURE";
					$library_type	= $data['item_libtype'] = "new_procedure";
					$new_tile_onhover 	= '<h6>$'.$price.' - <i ><img src='.$base.'img/icons_s1credit.png style=height:20px /></i>&nbsp;'.$credits.' - <i ><img src='.$base.'img/icons_xp.png style=height:20px /></i>&nbsp;'.$points.' </h6>';

					$item_id 		= $data['item_id'] = 'newproc';
					$cart_href_string = 'id="'.$item_id.'" library_type="'.$library_type.'" title="'.$title.'" price="'.$price.'" points="'.$points.'" credits="'.$credits.'"';
					?>
					<!-- TILE TO BUY AND CREATE A NEW PROCEDURES ON S1 LIBRARY-->
						<a href="javascript:void(0);" <?php echo $cart_href_string;?> class="newlib tile half-library bg-yellow <?php echo $class;?> description" style="opacity:0.8;" data-content="<?php echo $new_tile_onhover;?>" data-original-title="<?php echo "<h5 class='margin10'>".$title."</h5>";?>" data-placement="bottom" data-trigger="hover"><h6 class="fg-white margin10"><?php echo $title;?></h6></a>
				<?php 
				$page_procedure      	= 1;
				$cnt_purchased_procedure 	= 0;
				$sizeof_doc_purchased_procedure = sizeof($documents_purchased_procedure);
				if( isset($documents_purchased_procedure) && $sizeof_doc_purchased_procedure ) {
					foreach($documents_purchased_procedure as $doc) {
						$is_library_open = $this->users->getMetaDataList('librarytool_performed_by_consultant',
												'in_library_id = "'.$doc['lib_id'].'" AND st_library_section="new_procedure" AND in_client_id="'.$clientID.'" 
												AND in_consultant_id="'.$this->sess_userid.'" AND st_library_perform_status!="completed"', '', 'COUNT(id) AS tot_client_library');
						$is_library_open = isset($is_library_open[0]['tot_client_library']) ? $is_library_open[0]['tot_client_library'] : '';

						if( $doc['inventory'] > 0 && $is_library_open ) {
							if( !($doc['date_end'] == NULL || $doc['date_end']=="0000-00-00 00:00:00" || $doc['date_end']>date('Y-m-d')) ) {
								$bg_class 		= "expired";
								$text_expired 	= "EXPIRED";
							}
							else {
								$bg_class 		= "opc08";
								$text_expired 	= isset($doc['date_start']) ? date("Y-m-d", strtotime($doc['date_start'])) : '';
							}
							if( "s1procedures" == $doc['libtype_section'] ) {
								$href = $base."admin/my_created_procedures_metro?id=".$doc['lib_id']."&type=".$doc['libtype_section']."#modalPreview";
								$bg_class 	.= " bg-darker";
							}
							else if( "new_procedure" == $doc['libtype_section'] ) {
								$href = $base."admin/my_created_procedures_metro?id=".$doc['lib_id']."&type=".$doc['libtype_section']."&clientid=".$clientID;
								$bg_class 	.= " bg-darkGreen";
							}?>

							<a title="<?php echo $doc['lib_title'];?>" href="<?php echo $href;?>" class="<?php echo $bg_class;?> tile half-library description" data-toggle="popover" data-content="" data-original-title="" data-placement="bottom" data-trigger="hover">
							<span class="list-title fg-white margin10"><small><?php echo Common::subString($doc['lib_title'],16);?></small></span>
							<div class="brand">
									<span class="label fg-white text-center"><small><?php echo $text_expired;?></small></span>
									<span class="badge bg-red"><?php echo $doc['inventory'];?></span>
							</div>
							</a>
							<?php 
							if ($page_procedure == 3) {
								$page_procedure = 0;
								echo "<div class='clear'></div>";
							}
							$page_procedure++;
							$cnt_purchased_procedure++;
						}
					}
					if( $sizeof_doc_purchased_procedure < $this->mylib_rows_limit ) {
						$cnt_spans = ($sizeof_doc_purchased_procedure==0) ? ($this->mylib_rows_limit-1) : ($this->mylib_rows_limit-($sizeof_doc_purchased_procedure));
						for( $i=0;$i<$cnt_spans;$i++) {?>
								<span class="tile half-library bg-transparent description" style="box-shadow: 0px 0px 0px inset;"></span>
								<?php 
								echo ($i%3==0) ? "<div class='clear'></div>" : '';
						}
					}     
					// Pagination //
						$total_purchased_pages_procedure = ceil( $total_purchased_procedure/$this->mylib_rows_limit );
						echo "<div class='pull-right mart25 marr5 pagination small opacity'>"; 
						$this->common->getS1Pagination($this->router->fetch_method()."?id=".$clientID, $total_purchased_pages_procedure, $pgno_purchased_procedure, $this->mylib_rows_limit, 10, '#tools#purchased');
						echo "</div>";  
				}?>
			</div>
		</div>

	<!--************Purchased Safetytalks***********-->
	<div class="tab-pane fade" id="client_stalks" >
		<div class="grid fluid">
			<?php 
			$ret_safetytalks_price	= $this->users->getMetaDataList('price_settings', 'price_settingsname="safetytalks"', '', "in_price, in_points, in_credits");			
			$title 					= "NEW SAFETY TALKS";
			$ct_price               = $ret_safetytalks_price[0]['in_price'];
			$ct_points              = $ret_safetytalks_price[0]['in_points'];
			$ct_credits             = $ret_safetytalks_price[0]['in_credits'];
			$new_contents_on_hover  = '<h6>$'.$ct_price.' - <img src='.$base.'img/icons_s1credit.png style=height:20px />&nbsp;'.$ct_credits.' - <img src='.$base.'img/icons_xp.png style=height:20px />&nbsp;'.$ct_points.'</h6>';

			$library_type 			= 'normal_safetytalks';
			$item_id 				= 'new_normal_safetytalks';
			$cart_href_string 		= 'id="'.$item_id.'" library_type="'.$library_type.'" title="'.$title.'" price="'.$ct_price.'" points="'.$ct_points.'" credits="'.$ct_credits.'"';
			?>
			<a href="javascript:void(0);" <?php echo $cart_href_string;?> class="tile half-library bg-yellow description newlib" style="opacity:0.8;"  data-content="<?php echo $new_contents_on_hover;?>" data-original-title="<?php echo "<h6 class='margin10'>".$title."</h6>";?>" data-placement="bottom" data-trigger="hover">
			<?php echo "<h6 class='margin10 fg-white'>".$title."</h6>";?>
			</a>
			<?php 
			$page_safetalks 		= 1;
			$cnt_purchased_safetalks= 0;
			$sizeof_doc_purchased_safetalks = sizeof($documents_purchased_safetalks);
			if( isset($documents_purchased_safetalks) && $sizeof_doc_purchased_safetalks ) {
				foreach($documents_purchased_safetalks as $doc) {
					$is_library_open = $this->users->getMetaDataList('librarytool_performed_by_consultant',
											'in_library_id = "'.$doc['lib_id'].'" AND st_library_section="normal_safetytalks" AND in_client_id="'.$clientID.'" 
											AND in_consultant_id="'.$this->sess_userid.'" AND st_library_perform_status!="completed"', '', 'COUNT(id) AS tot_client_library');
					$is_library_open = isset($is_library_open[0]['tot_client_library']) ? $is_library_open[0]['tot_client_library'] : '';

					if( $doc['inventory'] > 0 && $is_library_open )  {
						$bg_class = ("normal_safetytalks"==$doc['libtype_section']) ? "bg-darkGreen" : "bg-darker";
						$safetytalks_title = $this->users->getMetaDataList('safetytalks_information', 'in_safetytalks_id="'.$doc['lib_id'].'"', '', 'st_title');
						$safetytalks_title = (isset($safetytalks_title[0]['st_title'])&&$safetytalks_title[0]['st_title']) ? $safetytalks_title[0]['st_title'] : $doc['lib_title'];
						?>
						<a href="<?php echo $base."admin/my_safetytalks_page_metro?id=".$doc['lib_id']."&type=".$doc['libtype_section']."&clientid=".$clientID;?>" rel="<?php echo $doc['lib_id'];?>" style="opacity:0.8;" class="safety tile half-library <?php echo $bg_class;?> description <?php if(!($doc['date_end']=="0000-00-00" || $doc['date_end']>date('Y-m-d'))):?> expired <?php endif;?>" data-toggle="popover" data-content="<h6><?php echo $doc['description'];?></h6>"  data-original-title="<h6><?php echo $safetytalks_title; ?></h6>" data-placement="bottom" data-trigger="hover" libtype_section="<?php echo $doc['libtype_section'];?>">
						<?php 
						if( isset($doc['st_icon_path']) && $doc['st_icon_path'] && "normal_safetytalks"==$doc['libtype_section'] ) {?>
							<i class="icon on-left"><img src="<?php echo $doc['st_icon_path'];?>" width="40" height="40"></i>
							<?php 
						}
						else {?>
							<i class="icon on-left"><img src="<?php echo $base.$this->path_img_library."icon-en.png";?>" width="40" height="40"></i> 
							<?php 
						}?>
						<span class="list-title fg-white margin10"><small><?php echo Common::subString($safetytalks_title,16);?></small></span>
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
			}?>
		</div>
	</div>

		
	<!--************Purchased Investigation***********-->
	<div class="tab-pane fade" id="client_investigation">
		<div class="grid fluid">
			<?php 
			$library = $libraries[0];
			$library_type 	= 'Investigations';
			$title 			= 'NEW';
			$item_title 	= 'Investigation';
			$library_id		= $library['library_id'];

			$price 			= $library['price'];
			$points 		= $data['item_points'] = $library['credits'];
			$credits 		= $data['item_credits'] = $library['creditsbuy'];

			$cart_href_string = 'id="'.$library_id.'" library_type="'.$library_type.'" title="'.$item_title.'" price="'.$price.'" points="'.$points.'" credits="'.$credits.'"';?>

			<a href="javascript:void(0);" <?php echo $cart_href_string;?> style="opacity:0.8" class="newlib tile half-library bg-lightOrange description" data-placement="bottom" data-trigger="hover">
				<h6 class="list-title fg-white margin10"><?php echo $this->common->subString($title,25);?> INVESTIGATION</h6>
				<div class="brand"><span class="label fg-white text-right"><small>&nbsp;</small></span></div>
			</a>
			<?php 
									
			$page_investigation = 1;
			$sizeof_doc_purchased_investigation = sizeof($documents_purchased_investigation);						
			if( isset($documents_purchased_investigation) && $sizeof_doc_purchased_investigation ) {
				$title = "Investigations";
				foreach($documents_purchased_investigation as $doc) {
					$is_library_open = $this->users->getMetaDataList('librarytool_performed_by_consultant',
											'in_library_id = "'.$doc['in_inv_form_id'].'" AND st_library_section="'.$title.'" AND in_client_id="'.$clientID.'" 
											AND in_consultant_id="'.$this->sess_userid.'" AND st_library_perform_status!="completed"', '', 'COUNT(id) AS tot_client_library');
					$is_library_open = isset($is_library_open[0]['tot_client_library']) ? $is_library_open[0]['tot_client_library'] : '';

					if( $is_library_open ) {
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
				echo "</div>";?>
		</div>
	</div>


	<!--************Purchased Inspection***********-->
	<div class="tab-pane fade" id="client_inspection">
		<div class="grid fluid">
			<a href="<?php echo $base."admin/my_inspection_advanced_consultant?clientid=".$clientID;?>" style="opacity:0.8" class="tile half-library bg-lightOrange description" data-placement="bottom" data-trigger="hover">
				<h6 class="fg-white margin5">New Advanced Inspection</h6>
				<div class="brand"><span class="label fg-white text-right"><small>&nbsp;</small></span></div>
			</a>
			<?php 
			$page = 1;
			$cnt_purchased = 0;
			$sizeof_purchased_inspection = sizeof($purchased_inspection);
			//common::pr($purchased_inspection);die;

			if( isset($purchased_inspection) && $sizeof_purchased_inspection ) {
				foreach($purchased_inspection as $doc) {
					$libid = $doc['id'];
					$is_library_open = $this->users->getMetaDataList('librarytool_performed_by_consultant',
											'in_library_id = "'.$libid.'" AND st_library_section="new_inspection" AND in_client_id="'.$doc['in_client_id'].'" 
											AND in_consultant_id="'.$doc['in_consultant_id'].'" AND st_library_perform_status!="completed"', '', 'COUNT(id) AS tot_client_library');
					// common::pr($is_library_open);
					$is_library_open = isset($is_library_open[0]['tot_client_library']) ? $is_library_open[0]['tot_client_library'] : '';
					if($is_library_open) {
						$advinspection_title= (isset($doc['st_title']) && $doc['st_title']) ? $doc['st_title'] : 'Advance Inspection';
						$inspection_date 	= (isset($doc['dt_datetime_inspection'])&&$doc['dt_datetime_inspection']!="0000-00-00 00:00:00") ? date('Y-m-d',strtotime($doc['dt_datetime_inspection'])) : '';
						?>
						<a href="<?php echo $base."admin/my_inspection_advanced_consultant?inspection_id=".$libid."&clientid=".$doc['in_client_id'];?>" style="opacity:0.8;" class="insp tile half-library bg-darker description" data-toggle="popover" data-placement="bottom" data-trigger="hover" title="<?php echo $advinspection_title;?>">
							<span class="fg-white margin10"><small><?php echo Common::subString($advinspection_title,16);?></small></span>
							<div class="brand"><span class="label fg-white text-center"><small><?php echo $inspection_date;?></small></span></div>
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
			if( $sizeof_purchased_inspection < $this->mylib_rows_limit ) {
				$cnt_spans = ($sizeof_purchased_inspection==0) ? ($this->mylib_rows_limit-1) : ($this->mylib_rows_limit-($sizeof_purchased_inspection));
				for( $i=0;$i<$cnt_spans;$i++) {?>
					<span class="tile half-library bg-transparent description" style="box-shadow: 0px 0px 0px inset;"></span>
					<?php 
					echo ($i%3==0) ? "<div class='clear'></div>" : '';
				}
			}
			// Pagination //
				if( isset($total_purchased_inspection) && $total_purchased_inspection ) {
					$total_purchased_pages_inspection = ceil( $total_purchased_inspection/$this->mylib_rows_limit );
					echo "<div class='pull-right mart25 marr5 pagination small opacity'>"; 
					$this->common->getS1Pagination($this->router->fetch_method()."?id=".$clientID, $total_purchased_pages_inspection, $pgno_purchased_inspection, $this->mylib_rows_limit, 10, '#tools#client_inspection');
					echo "</div>";
				}
			?>
		</div>
	</div>				
</div>

<script type="text/javascript">
	$(document).ready(function () {
		$('a.newlib').click(function(e){
			if( confirm("Are you sure you want to create New Tile for this Client?") ) {
				$item_id 		= $(this).attr('id');
				$item_title 	= $(this).attr('title');
				$item_libtype	= $(this).attr('library_type');
				$item_price		= $(this).attr('price');
				$item_credits	= $(this).attr('points');
				$item_creditsbuy= $(this).attr('credits');
				$.ajax({
					url: js_base_path+'ajax/create_library_by_consultant', 
					async:false, 
					type: 'post', 
					data: {'consultant_client_id': '<?php echo $clientID;?>', 'item_id':$item_id, 'item_title':$item_title, 'item_libtype':$item_libtype, 'item_credits':$item_credits, 'item_price':$item_price, 'item_creditsbuy':$item_creditsbuy},
					success: function(output) { location.href = js_base_path+"admin/my_client_page?id=<?php echo $clientID;?>"; }, 
					error: function (xhr, status, text) { alert(xhr.responseText); return false; }
				});
			}
		})
	});
</script>
			