<?php 
$this->load->view('header_admin');
$st_project_name 		= isset($inspection_info[0]['st_project_name']) ? $inspection_info[0]['st_project_name'] : '';
$st_phase 				= isset($inspection_info[0]['st_phase']) ? $inspection_info[0]['st_phase'] : '';
$st_area_inspected 		= isset($inspection_info[0]['st_area_inspected']) ? $inspection_info[0]['st_area_inspected'] : '';
$st_address 			= isset($inspection_info[0]['st_address']) ? $inspection_info[0]['st_address'] : '';
$st_phone 				= isset($inspection_info[0]['st_phone']) ? $inspection_info[0]['st_phone'] : '';
$dt_datetime_inspection = '';

if( isset($inspection_info[0]['dt_datetime_inspection']) && $inspection_info[0]['dt_datetime_inspection']!='0000-00-00 00:00:00') {
	$dt_datetime_inspection = date('Y-m-d H:i', strtotime($inspection_info[0]['dt_datetime_inspection']));
}

$st_workforce 		= isset($inspection_info[0]['st_workforce']) ? $inspection_info[0]['st_workforce'] : '';
$st_jhsc_users 		= isset($inspection_info[0]['st_jhsc_users']) ? $inspection_info[0]['st_jhsc_users'] : '';
$st_jhsc_username 	= isset($inspection_info[0]['st_jhsc_username']) ? $inspection_info[0]['st_jhsc_username'] : '';
$st_hs_rep_users 	= isset($inspection_info[0]['st_hs_rep_users']) ? $inspection_info[0]['st_hs_rep_users'] : '';
$st_hs_rep_username = isset($inspection_info[0]['st_hs_rep_username']) ? $inspection_info[0]['st_hs_rep_username'] : '';
$st_weather 		= isset($inspection_info[0]['st_weather']) ? $inspection_info[0]['st_weather'] : '';
$st_accompanied_by 	= isset($inspection_info[0]['st_accompanied_by']) ? $inspection_info[0]['st_accompanied_by'] : '';

$disabled 			= ("completed" == $inspection_status) ? "disabled" : "";
?>
<div class="homebg">
<div class="container-fluid">
<div class="wrapper">

<div class="union-container">
	<div class="module">
		<h5  class="title">INSPECTION <?php echo "&nbsp;".$inspection_name;?></h5>
			<!--------START WORKPLACE INFORMATION-------->
				<div class="bglightred fgred"><?php echo (isset($message)&&$message) ? $message : '';?></div>
				<button  href="#acc-1" id="id_inv_cover" data-toggle="collapse" class="btn collapse-btn collapsed">
					<div class="row-fluid">
						<div class="span8 item-title"><h4 class="collapse-basic">WORKPLACE INFORMATION</h4></div>
					</div>
				</button>
				<div id="acc-1" class="module-inner collapse">
					<div class="row-fluid collapse-inner">
						<div class="span12 pull-left">
							<form class="form-large" id="frm_insp_workplace" name="frm_insp_workplace" method="post" action="" >
								<div class="row-fluid">
								  <div class="span5">
									<label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>PROJECT NAME</label>
								  </div>
								  <div class="span7">
									<input type="text" name="txt_project_name" class="container-width selectpicker form-large-select span10" value="<?php echo $st_project_name;?>" <?php echo $disabled;?> placeholder="TYPE"/>
								  </div>
								</div>
								<div class="row-fluid">
								  <div class="span5">
									<label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>PHASE</label>
								  </div>
								  <div class="span7">
									<input type="text" name="txt_phase" <?php echo $disabled;?> class="container-width selectpicker form-large-select span10" value="<?php echo $st_phase;?>" placeholder="TYPE"/>
								  </div>
								</div>
								<div class="row-fluid">
								  <div class="span5">
									<label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>AREA INSPECTED</label>
								  </div>
								  <div class="span7">
									<input type="text" name="txt_area_inspected" <?php echo $disabled;?> class="container-width selectpicker form-large-select span10" value="<?php echo $st_area_inspected;?>" placeholder="TYPE"/>
								  </div>
								</div>
								<div class="row-fluid">
								  <div class="span5">
									<label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>ADDRESS</label>
								  </div>
								  <div class="span7">
									<input type="text" name="txt_address" <?php echo $disabled;?> class="container-width selectpicker form-large-select span10" value="<?php echo $st_address;?>" placeholder="TYPE"/>
								  </div>
								</div>
								<div class="row-fluid">
								  <div class="span5">
									<label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>TELEPHONE</label>
								  </div>
								  <div class="span7">
									<input type="text" name="txt_phone" <?php echo $disabled;?> class="container-width selectpicker form-large-select span10" value="<?php echo $st_phone;?>" placeholder="TYPE"/>
								  </div>
								</div>
								<div class="row-fluid">
								  <div class="span5">
									<label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Date & Time of Inspection</label>
								  </div>
								  <div class="span7">
									<input id="txt_datetime_inspection" <?php echo $disabled;?> name="txt_datetime_inspection" value="<?php echo $dt_datetime_inspection;?>" type="text" placeholder="yy-mm-dd --:--" class="required selectpicker form-large-select span10 datestamp"/>
								  </div>
								</div>
								<div class="row-fluid">
								  <div class="span5">
									<label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>WORK FORCE</label>
								  </div>
								  <div class="span7">
									<input type="text" name="txt_workforce" <?php echo $disabled;?> class="container-width selectpicker form-large-select span10" value="<?php echo $st_workforce;?>"  placeholder="TYPE"/>
								  </div>
								</div>
								<div class="row-fluid">
								  <div class="span5">
									<label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>JHSC Users</label>
								  </div>
								  <div class="span7 pull-right">
									<?php 
									if( sizeof($jhsc_my_workers) ) { ?>
										<select name="cmb_jhsc_users[]" multiple <?php echo $disabled;?>>
											<?php 
											foreach( $jhsc_my_workers AS $val_jhsc_myworkers ) {
												$selected = (in_array($val_jhsc_myworkers['id'],json_decode($st_jhsc_users))) ? 'selected="selected"' : '';
												?>
												<option value="<?php echo $val_jhsc_myworkers['id'];?>" <?php echo (sizeof($inspection_info))?$selected:'selected';?>><?php echo $val_jhsc_myworkers['workername'];?></option>
												<?php
											}
											?>
										</select>(Hold ctrl to select multiple)
										<?php }
									else {?>
										<input type="text" name="txt_jhsc_username" <?php echo $disabled;?> class="container-width form-large-select span10" value="<?php echo $st_jhsc_username;?>" placeholder="NAME"/>
										<?php
									}?>
								  </div>
								</div>
								<div>&nbsp;</div>
								<div class="row-fluid">
								  <div class="span5">
									<label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>H&S REP Users</label>
								  </div>
								  <div class="span7 pull-right">
									<?php 
									if( sizeof($hsrep_my_workers) ) {?>
										<select name="cmb_hs_rep_users[]" multiple <?php echo $disabled;?>>
											<?php 
											foreach( $hsrep_my_workers AS $val_hsrep_myworkers ) {
												$selected = (in_array($val_hsrep_myworkers['in_worker_id'],json_decode($st_hs_rep_users))) ? 'selected="selected"' : '';
												?>
												<option value="<?php echo $val_hsrep_myworkers['in_worker_id'];?>" <?php echo (sizeof($inspection_info))?$selected:'selected';?>><?php echo $val_hsrep_myworkers['workername'];?></option>
												<?php
											}?>
										</select>(Hold ctrl to select multiple)
									<?php }
									else {?>
										<input type="text" name="txt_hs_rep_username" <?php echo $disabled;?> class="container-width form-large-select span10" value="<?php echo $st_hs_rep_username;?>"  placeholder="NAME"/>
										<?php
									}?>
								  </div>
								</div>
								<div class="row-fluid">
								  <div class="span5">
									<label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>WEATHER CONDITIONS</label>
								  </div>
								  <div class="span7">
									<input type="text" name="txt_weather" <?php echo $disabled;?> class="container-width form-large-select span10" value="<?php echo $st_weather;?>"  placeholder="TYPE"/>
								  </div>
								</div>
								<div class="row-fluid">
								  <div class="span5">
									<label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>ACCOMPANIED BY</label>
								  </div>
								  <div class="span7">
									<input type="text" name="txt_accompanied_by" <?php echo $disabled;?> class="container-width form-large-select span10" value="<?php echo $st_accompanied_by;?>"  placeholder="TYPE"/>
								  </div>
								</div>
								<?php if( !$disabled ) {?>
									<div class="row-fluid">
										<button type="submit" name="btn_workplace" id="btn_workplace" class="btn btn-warning pull-right">SAVE</a>
									</div>
									<input type="hidden" name="hidn_inspection_type" value="<?php echo $inspection_type;?>">
									<?php
								}?>
							</form>
						</div>
					</div>
				</div>
			<!--------END WORKPLACE INFORMATION-------->

			
			

			
			
			<!--------START - INSPECTION ITEMS-------->
				<button  href="#acc-2" id="id_inv_firstaid" data-toggle="collapse" class="btn collapse-btn collapsed">
					<div class="row-fluid">
						<div class="span8 item-title">
							<h4 class="collapse-basic">INSPECTION ITEMS</h4>
						</div>
					</div>
				</button>
				<div id="acc-2" class="module-inner collapse">				
					<div class="row-fluid collapse-inner">
						<div class="span12 pull-left">
							<form class="form-large" name="frm_inv_inspection_items" id="frm_inv_inspection_items" method="post" action="">
								<?php 
								$cnt_insp = 0;
								foreach( $rows_insp_items AS $key_insp => $val_insp ) {
									$cnt_insp_item = 0;
									$cnt_insp++;?>
									<div class="row-fluid"><div class="span12"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i><?php echo $key_insp;?></label></div></div>
									<?php 
									foreach( $val_insp AS $key_inspitemname => $val_inspitems ) {
										// common::pr( $val_inspitems );
										$item_id 		= (isset($val_inspitems[0]['item_id'])&&$val_inspitems[0]['item_id']) ? $val_inspitems[0]['item_id'] : '';
										$inspection_id 	= (isset($val_inspitems[0]['inspection_id'])&&$val_inspitems[0]['inspection_id']) ? $val_inspitems[0]['inspection_id'] : '';
										$item_name 	= (isset($val_inspitems[0]['st_item_name'])&&$val_inspitems[0]['st_item_name']) ? $val_inspitems[0]['st_item_name'] : '';

										// Get Inspection Item Information after the data posted //
										$rows_inspitem_info = $this->users->getMetaDataList( 'inspection_item_information', 
																						('in_inspection_id="'.$inspection_id.'" AND in_item_id="'.$item_id.'"'), '', '*' );
										$st_users_action_required = isset($rows_inspitem_info[0]['st_users_action_required']) ? $rows_inspitem_info[0]['st_users_action_required'] : '';
										$jsondecode_users_action_required = json_decode($st_users_action_required);
										$st_users_action_required = (!is_array($jsondecode_users_action_required)) ? array($jsondecode_users_action_required) : $jsondecode_users_action_required;

										$dt_datetime_comply = '';
										if( isset($rows_inspitem_info[0]['dt_datetime_comply']) && $rows_inspitem_info[0]['dt_datetime_comply']!='0000-00-00 00:00:00') {
											$dt_datetime_comply = date('Y-m-d H:i', strtotime($rows_inspitem_info[0]['dt_datetime_comply']));
										}
										$st_location 	= isset($rows_inspitem_info[0]['st_location']) ? $rows_inspitem_info[0]['st_location'] : '';
										$st_notes 		= isset($rows_inspitem_info[0]['st_notes']) ? $rows_inspitem_info[0]['st_notes'] : '';
										$st_actions 	= isset($rows_inspitem_info[0]['st_actions']) ? $rows_inspitem_info[0]['st_actions'] : '';
										$st_item_status = isset($rows_inspitem_info[0]['st_item_status']) ? $rows_inspitem_info[0]['st_item_status'] : '';

										$ok_icon_image 	= ("ok"==$st_item_status) ? "Inspection_buttons_approved.png" : "Inspection_buttons_approved_GRAY.png";
										$notok_icon_image = ("notok"==$st_item_status || "failed"==$st_item_status) ? "Inspection_buttons_incorrect.png" : "Inspection_buttons_incorrect_GRAY.png";
										$na_icon_image 	= ("na"==$st_item_status) ? "Inspection_buttons_nda.png" : "Inspection_buttons_nda_GRAY.png";
										?>
										<div class="row-fluid">
										  <div class="span8"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i><?php echo $item_name;?></label></div>
										  <div class="span4">
											<a href="javascript:void(0);" title="OK" id="id_item_ok" onclick="javascript:setItemStatus('ok','<?php echo $cnt_insp.$cnt_insp_item;?>', '<?php echo $item_id;?>', '<?php echo $inspection_id;?>');">
												<img id="img_item_ok<?php echo $cnt_insp.$cnt_insp_item;?>" src="<?php echo $base."img/inspection-perform-buttons/".$ok_icon_image;?>">
											</a>
											<a href="javascript:void(0);" title="Not OK" id="id_item_notok" onclick="javascript:setItemStatus('notok', '<?php echo $cnt_insp.$cnt_insp_item;?>', '<?php echo $item_id;?>', '<?php echo $inspection_id;?>');">
												<img id="img_item_notok<?php echo $cnt_insp.$cnt_insp_item;?>" src="<?php echo $base."img/inspection-perform-buttons/".$notok_icon_image;?>">
											</a>
											<a href="javascript:void(0);" title="N/A" id="id_item_na" onclick="javascript:setItemStatus('na', '<?php echo $cnt_insp.$cnt_insp_item;?>', '<?php echo $item_id;?>', '<?php echo $inspection_id;?>');">
												<img id="img_item_na<?php echo $cnt_insp.$cnt_insp_item;?>" src="<?php echo $base."img/inspection-perform-buttons/".$na_icon_image;?>">
											</a>
											<?php 
											if( isset($val_inspitems[0]['st_regulation_number'])&&!$val_inspitems[0]['st_regulation_number'] ) {
												$title = "";
												$reg_icon_image = "Inspection_buttons_regulations_GRAY.png";
												$href = "#";
											}
											else {
												$reg_icon_image = "Inspection_buttons_regulations.png";
												$href = "#modelRegulationData".$item_id;
											}
											($disabled) ? $href = '#' : '';
											?>
											<a href="<?php echo $href;?>" data-toggle="modal" title="<?php echo $item_name;?>">
												<img src="<?php echo $base."img/inspection-perform-buttons/".$reg_icon_image;?>">
											</a>
											
											<div id="modelRegulationData<?php echo $item_id;?>" class="modal hide fade metro" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
												<div class="modal-header bg-red">
													<h3 id="myModalLabel"><?php echo "Regulation Data";?><i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal"></i></h3>
												</div>
												<div class="modal-body">
													<ul>
													<?php 
													foreach( $val_inspitems AS $key_inspitemreg => $val_inspitemreg ) {
														$reg_no 	= ($val_inspitemreg['st_regulation_number']) ? $val_inspitemreg['st_regulation_number'] : "";
														if( (isset($val_inspitemreg['st_section'])&&$val_inspitemreg['st_section']) ) {
															$section 	= (isset($val_inspitemreg['st_section'])&&$val_inspitemreg['st_section']) ? "Sec. ".trim($val_inspitemreg['st_section']) : '';
															$subsection 	= (isset($val_inspitemreg['st_subsection'])&&$val_inspitemreg['st_subsection']) ? "(".trim($val_inspitemreg['st_subsection']).")" : '';
															$item 	= (isset($val_inspitemreg['st_item'])&&$val_inspitemreg['st_item']) ? "(".trim($val_inspitemreg['st_item']).")" : '';
															$subitem 	= (isset($val_inspitemreg['st_subitem'])&&$val_inspitemreg['st_subitem']) ? "(".trim($val_inspitemreg['st_subitem']).")" : '';
														}
														echo "<p><b>Click on section to view regulation.</b></p>";
														echo "<p><b>".$reg_no."</b></p>";?>
														<li class="padt10"><a class="s1content_link" id="id_modal_regcontents<?php echo $val_inspitemreg['st_section'].$val_inspitemreg['st_item'];?>" href='#modalRegulationContents<?php echo $val_inspitemreg['st_section'].$val_inspitemreg['st_item'];?>' data-toggle="modal"><?php echo $section;?><?php echo $subsection.$item.$subitem;?></a></li>
														<?php 
													}?>
													</ul>
												</div>
											</div>
										  </div>
										</div>
										<?php 
										foreach( $val_inspitems AS $key_inspitemreg => $val_inspitemreg ) {
											$reg_no 	= ($val_inspitemreg['st_regulation_number']) ? $val_inspitemreg['st_regulation_number'] : "";
											$section 	= (isset($val_inspitemreg['st_section'])&&$val_inspitemreg['st_section']) ? trim($val_inspitemreg['st_section']) : '';
											$subsection = (isset($val_inspitemreg['st_subsection'])&&$val_inspitemreg['st_subsection']) ? trim($val_inspitemreg['st_subsection']) : '';
											$item 		= (isset($val_inspitemreg['st_item'])&&$val_inspitemreg['st_item']) ? trim($val_inspitemreg['st_item']) : '';
											$subitem 	= (isset($val_inspitemreg['st_subitem'])&&$val_inspitemreg['st_subitem']) ? trim($val_inspitemreg['st_subitem']) : '';

											$where_regcontents = 'st_regulation_number="'.$reg_no.'" AND st_section="'.$section.'" AND st_subsection="'.$subsection.'" AND st_item="'.$item.'" AND st_subitem="'.$subitem.'"';
											$regulation_content = $this->users->getMetaDataList('regulation_sections', $where_regcontents, '', 'st_content');
											$regulation_content = isset($regulation_content[0]['st_content']) ? $regulation_content[0]['st_content'] : '';
											?>
											<div id="modalRegulationContents<?php echo $section.$item;?>" style="z-index:1000000000;" class="modal hide fade metro" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
												<div class="modal-header bg-red">
													<h3 id="myModalLabel"><?php echo $reg_no;?><i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal"></i></h3>
												</div>
												<div class="modal-body">
													<p><?php echo $reg_no;?></p>
													<p><?php echo ($section) ? "Sec. ".$section : '';?></p>
													<p><?php echo $regulation_content;?></p>
												</div>
												<div class="modal-footer"><button class="btn" data-dismiss="modal">Close</button></div>
											</div>
											
											<script type="text/javascript">
												$("#id_modal_regcontents<?php echo $val_inspitemreg['st_section'].$val_inspitemreg['st_item'];?>").click(function() {
													//$("#modelRegulationData<?php echo $item_id;?>").modal('hide');
												});
											</script>
											<?php 
										}?>

										<div id="id_item_failed<?php echo $cnt_insp.$cnt_insp_item;?>" style="display:none;">
											<div class="row-fluid">
											  <div class="span5">
												<label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Date & Time to Comply</label>
											  </div>
											  <div class="span7">
												<input id="txt_datetime_comply<?php echo $cnt_insp.$cnt_insp_item;?>" name="txt_datetime_comply[<?php echo $item_id.$inspection_id;?>]" value="<?php echo $dt_datetime_comply;?>" type="text" placeholder="yy-mm-dd --:--" class="required selectpicker form-large-select span10 datestamp"/>
											  </div>
											</div>
											<div class="row-fluid">
											  <div class="span5">
												<label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>WORKERS ASSIGNED</label>
											  </div>
											  <div class="span4 pull-left">
												<?php 
												if( sizeof($connected_s1members) ) {
												?>
													<select name="cmb_s1members_connected[<?php echo $item_id.$inspection_id;?>][]" multiple>
														<?php 
														foreach( $connected_s1members AS $val_s1members ) {
															$selected = (in_array($val_s1members->id,$st_users_action_required)) ? 'selected="selected"' : '';
															?>
															<option value="<?php echo $val_s1members->id;?>" <?php echo (sizeof($rows_inspitem_info))?$selected:'selected';?>><?php echo $val_s1members->label;?></option>
															<?php
														}
														?>
													</select>
												<?php }
												?>
												</div>
												<p class="span3" style="box-shadow:none;">Press CTRL key and click each of the other Workers to assign.</p>
											  
											</div>
											<div class="row-fluid">
											  <div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>LOCATION</label></div>
											  <div class="span7">
												<input type="text" name="txt_location[<?php echo $item_id.$inspection_id;?>]" class="form-large-select span10 container-width" value="<?php echo $st_location;?>"  placeholder="TYPE"/>
											  </div>
											</div>
											<div class="row-fluid">
											  <div class="span5">
												<label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>NOTES</label>
											  </div>
											  <div class="span7">
												<input type="text" name="txt_notes[<?php echo $item_id.$inspection_id;?>]" class="container-width form-large-select span10" value="<?php echo $st_notes;?>"  placeholder="TYPE"/>
											  </div>
											</div>
											<div class="row-fluid">
											  <div class="span5">
												<label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>ACTIONS</label>
											  </div>
											  <div class="span7">
												<input type="text" name="txt_actions[<?php echo $item_id.$inspection_id;?>]" class="form-large-select container-width span10" value="<?php echo $st_actions;?>"  placeholder="TYPE"/>
											  </div>
											</div>
											<input type="hidden" name="hidn_inspection_name[<?php echo $item_id.$inspection_id;?>]" value="<?php echo $key_insp;?>">
											
											<div class="row-fluid"><input type="button" value="Submit" onclick="javascript:submitItemInformation('<?php echo $item_id;?>', '<?php echo $inspection_id;?>');" name="btn_inspection_item" id="btn_inspection_item" class="btn btn-warning pull-right"></div>
										</div>
										<?php 
										$cnt_insp_item++;
									}?>
									<?php if( !$disabled ) {?>
									<div class="row-fluid">
										<input type="button" value="Save Inspection" onclick="javascript:saveInspection('<?php echo $inspection_id;?>');" name="btn_save_inspection" id="btn_save_inspection" class="btn btn-warning pull-right">
									</div>
									<?php }?>
									<?php 
								}
								if( $inspection_type == "custom_inspection" && !$disabled ) {?>
									<div>&nbsp;</div><div class="row-fluid"><input type="submit" name="btn_submit_custominspection" value="Submit" id="btn_submit_custominspection" title="Submit Customized Inspection" class="btn btn-warning pull-right"></div>
									<?php
								}?>
							</form>
						</div>
					</div>
				</div>
			<!--------END - INSPECTION ITEMS-------->
	</div>	
</div>
</div><!--end class wrapper-->
</div><!--end div container-fluid-->
</div><!--end div homebg-->
<!-- Place in the <head>, after the three links -->

<!-- Start - For Datetime Picker -->
	<link rel="stylesheet" href="<?php echo $base;?>css/jquery-ui.css" />
	<script type="text/javascript" src="<?php echo $base;?>js/jquery-ui.js"></script>
	<script type="text/javascript" src="<?php echo $base;?>js/jquery-ui-timepicker.js"></script>
<!-- End - For Datetime Picker -->

<script type="text/javascript" src="<?php echo $base;?>js/jquery.form.js"></script>
<script type="text/javascript" charset="utf-8">
	$(window).load(function() {
		$('.datestamp').datetimepicker({dateFormat: "yy-mm-dd"}); 
	});

	var disabled = '<?php echo $disabled;?>';
	
	function setItemStatus(itemButtonValue, cntVal, itemId, inspectionId)
	{
		if( disabled ) {
			return false;
		}
		if( "ok" == itemButtonValue ) {
			$("#id_item_failed"+cntVal).hide();
			$("#img_item_ok"+cntVal).attr('src', "<?php echo $base.'img/inspection-perform-buttons/Inspection_buttons_approved.png';?>");
			$("#img_item_notok"+cntVal).attr('src', "<?php echo $base.'img/inspection-perform-buttons/Inspection_buttons_incorrect_GRAY.png';?>");
			$("#img_item_na"+cntVal).attr('src', "<?php echo $base.'img/inspection-perform-buttons/Inspection_buttons_nda_GRAY.png';?>");
		}
		else if( "notok" == itemButtonValue ) {
			$("#img_item_notok"+cntVal).attr('src', "<?php echo $base.'img/inspection-perform-buttons/Inspection_buttons_incorrect.png';?>");
			$("#img_item_ok"+cntVal).attr('src', "<?php echo $base.'img/inspection-perform-buttons/Inspection_buttons_approved_GRAY.png';?>");
			$("#img_item_na"+cntVal).attr('src', "<?php echo $base.'img/inspection-perform-buttons/Inspection_buttons_nda_GRAY.png';?>");
			$("#id_item_failed"+cntVal).show();
		}
		else if( "na" == itemButtonValue ) {
			$("#id_item_failed"+cntVal).hide();
			$("#img_item_na"+cntVal).attr('src', "<?php echo $base.'img/inspection-perform-buttons/Inspection_buttons_nda.png';?>");
			$("#img_item_ok"+cntVal).attr('src', "<?php echo $base.'img/inspection-perform-buttons/Inspection_buttons_approved_GRAY.png';?>");
			$("#img_item_notok"+cntVal).attr('src', "<?php echo $base.'img/inspection-perform-buttons/Inspection_buttons_incorrect_GRAY.png';?>");
		}
		
		if( "ok" == itemButtonValue || "na" == itemButtonValue) {
			$.ajax({
				url: js_base_path+'ajax/ajaxUpdateInspectionItemStatus',
				type: 'post', 
				data: 'itemStatus='+itemButtonValue+'&itemId='+itemId+'&inspectionId='+inspectionId, 
				success: function(output) {
					// alert( "Successfully updated" );
				},
				error: function(errMsg) {
					alert( errMsg.responseText );
					return false;
				}
			});
		}
	}

	function submitItemInformation(itemId, inspectionId) 
	{
		var hidnItems = '<input type="hidden" name="hidn_item_id" id="hidn_item_id" value="'+itemId+'"><input type="hidden" name="hidn_inspection_id" id="hidn_inspection_id" value="'+inspectionId+'">';
		$("#frm_inv_inspection_items").append(hidnItems).submit();
	}
	
	function saveInspection(inspectionId) 
	{
		var hidnInspection = '<input type="hidden" name="hidn_inspection_id" id="hidn_inspection_id" value="'+inspectionId+'">';
		$("#frm_inv_inspection_items").append(hidnInspection).submit();
		
	}
</script>

<?php $this->load->view('footer_admin'); ?>
