<?php 
$this->load->view('header_admin');
$advinspection_title 	= isset($insp_workplace_info[0]['st_title']) ? $insp_workplace_info[0]['st_title'] : '';
$project_name 			= isset($insp_workplace_info[0]['st_project_name']) ? $insp_workplace_info[0]['st_project_name'] : '';
$datetime_inspection 	= '';

if( isset($insp_workplace_info[0]['dt_datetime_inspection']) && $insp_workplace_info[0]['dt_datetime_inspection']!='0000-00-00 00:00:00') {
	$datetime_inspection= date('y-m-d H:i', strtotime($insp_workplace_info[0]['dt_datetime_inspection']));
}
$inspection_type 		= isset($insp_workplace_info[0]['st_inspection_type']) ? $insp_workplace_info[0]['st_inspection_type'] : '';
$constructor_name 		= isset($insp_workplace_info[0]['st_constructor_name']) ? $insp_workplace_info[0]['st_constructor_name'] : '';
$location 				= isset($insp_workplace_info[0]['st_location']) ? $insp_workplace_info[0]['st_location'] : '';
$site_supervisor 		= isset($insp_workplace_info[0]['st_site_supervisor']) ? $insp_workplace_info[0]['st_site_supervisor'] : '';
$weather_condition 		= isset($insp_workplace_info[0]['st_weather_condition']) ? $insp_workplace_info[0]['st_weather_condition'] : '';
$advinspection_status 	= isset($insp_workplace_info[0]['st_action']) ? $insp_workplace_info[0]['st_action'] : '';
$is_collapse 			= (isset($_POST['btn_workplace_info'])&&$_POST['btn_workplace_info']) ? '' : 'collapse';
$is_collapsed 			= (isset($_POST['btn_workplace_info'])&&$_POST['btn_workplace_info']) ? '' : 'collapsed';

$disabled 				= ("completed" == $advinspection_status) ? "disabled" : "";
?>
<div class="homebg">
<div class="container-fluid">
<div class="wrapper">

<div class="union-container">
	<div class="module">
		<h5 class="title">ADVANCED INSPECTION <?php echo $advinspection_title;?></h5>
			<!--------START WORKPLACE INFORMATION-------->
				<div class="bglightred fgred"><?php echo isset($message) ? $message : '';?></div>
				<button href="#acc-1" id="id_inv_cover" data-toggle="collapse" class="btn collapse-btn <?php echo $is_collapsed;?>">
					<div class="row-fluid">
						<div class="span8 item-title"><h4 class="collapse-basic">WORKPLACE INFORMATION</h4></div>
					</div>
				</button>
				<form class="" id="frm_inspection_advanced" name="frm_inspection_advanced" method="post" action="">
				
				<div id="acc-1" class="form-large module-inner <?php echo $is_collapse;?>">
					<div class="row-fluid collapse-inner">
						<div class="span12 pull-left">							
						<div class="row-fluid">
						  <div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>TITLE</label></div>
						  <div class="span7">
							<input type="text" name="txt_advinspection_title" class="container-width selectpicker form-large-select span10" value="<?php echo $advinspection_title;?>" <?php echo $disabled;?> placeholder="TYPE TITLE"/>
						  </div>
						</div>
						
						<div class="row-fluid">
						  <div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>PROJECT NAME</label></div>
						  <div class="span7">
							<input type="text" name="txt_project_name" class="container-width selectpicker form-large-select span10" value="<?php echo $project_name;?>" <?php echo $disabled;?> placeholder="TYPE PROJECT NAME"/>
						  </div>
						</div>
						<div class="row-fluid">
						  <div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>DATE/TIME OF INSPECTION</label></div>
						  <div class="span7">
							<input id="txt_datetime_inspection" name="txt_datetime_inspection" value="<?php echo $datetime_inspection;?>" type="text" placeholder="YY-MM-DD --:--" class="required selectpicker form-large-select span10 datestamp" <?php echo $disabled;?> />
						  </div>
						</div>
						<div class="row-fluid">
						  <div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>COMPLETED BY</label></div>
						  <div class="span7">
							<div class=" form-large-select span10 " style="padding-top: 10px;"><?php echo strtoupper($user['firstname']." ".$user['lastname']);?></div>
						  </div>
						</div>
						<div class="row-fluid">
						  <div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>TYPE</label></div>
						  <div class="span7">
						  <div class=" form-large-select span10 " style="padding-top: 10px;">
							<input type="radio"  <?php echo $disabled;?> name="rdb_inspection_type" value="construction" <?php echo ("construction"==$inspection_type||!$inspection_type) ? 'checked="checked"' : '';?> style="margin-left:10px;"/>&nbsp;Construction
							<input type="radio"  <?php echo $disabled;?> name="rdb_inspection_type" value="industrial" <?php echo ("industrial"==$inspection_type) ? 'checked="checked"' : '';?> style="margin-left:10px;"/>&nbsp;Industrial
						  </div>
						  </div>
						</div>
						<div class="row-fluid">
						  <div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>CONSTRUCTOR</label></div>
						  <div class="span7">
							<input type="text" name="txt_constructor_name" class="container-width selectpicker form-large-select span10" value="<?php echo $constructor_name;?>" <?php echo $disabled;?> placeholder="TYPE CONSTRUCTOR NAME" <?php echo $disabled;?> />
						  </div>
						</div>
						<div class="row-fluid">
						  <div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>LOCATION</label></div>
						  <div class="span7">
							<input type="text" <?php echo $disabled;?> name="txtarea_location" class="container-width selectpicker form-large-select span10" value="<?php echo $location;?>" placeholder="TYPE ADDRESS"/>
						  </div>
						</div>
						<div class="row-fluid">
						  <div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>SITE SUPERVISOR</label></div>
						  <div class="span7">
							<input type="text" <?php echo $disabled;?> name="txt_site_supervisor" class="container-width selectpicker form-large-select span10" value="<?php echo $site_supervisor;?>" placeholder="TYPE SITE SUPERVISOR"/>
						  </div>
						</div>
						<div class="row-fluid">
						  <div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>WEATHER CONDITION</label></div>
						  <div class="span7">
						 <!--carousel weather icons-->
						 <span class="metro">
						  <div class="">
						<div style="padding-top: 20px;">
						<div class="flexslider" style="border:0;box-shadow:none;">
						<ul class="slides" >
						<li><input type="radio" <?php echo $disabled;?> name="rdb_weather" <?php echo ("sunrise"==$weather_condition||!$weather_condition) ? 'checked="checked"' : '';?> value="sunrise" title="Sunrise"/><i class="icon-sunrise fg-amber" title="Sunrise" ></i></li>
						<li><input type="radio" <?php echo $disabled;?> name="rdb_weather" <?php echo ("sunny"==$weather_condition) ? 'checked="checked"' : '';?> value="sunny" title="Sunny" /><i class="icon-sun fg-amber" title="Sunny" ></i></li>
						<li><input type="radio" <?php echo $disabled;?> name="rdb_weather" <?php echo ("partial cloudy"==$weather_condition) ? 'checked="checked"' : '';?> value="partial cloudy" title="Partial Cloudy"/><i class="icon-cloudy-3 fg-amber" title="Partial Cloudy"></i></li>
						<li><input type="radio" <?php echo $disabled;?> name="rdb_weather" <?php echo ("cloudy"==$weather_condition) ? 'checked="checked"' : '';?> value="cloudy" title="Cloudy"/><i class="icon-cloud-7 fg-amber" title="Cloudy"></i></li>
						<li><input type="radio" <?php echo $disabled;?> name="rdb_weather" <?php echo ("foggy"==$weather_condition) ? 'checked="checked"' : '';?> value="foggy" title="Foggy"/><i class="icon-lines fg-amber" title="Foggy"></i></li>
						<li><input type="radio" <?php echo $disabled;?> name="rdb_weather" <?php echo ("windy"==$weather_condition) ? 'checked="checked"' : '';?> value="windy" title="Windy"/><i class="icon-wind fg-amber" title="Windy"></i></li>
						<li><input type="radio" <?php echo $disabled;?> name="rdb_weather" <?php echo ("rainy"==$weather_condition) ? 'checked="checked"' : '';?> value="rainy" title="Rainy"/><i class="icon-rainy-4 fg-amber" title="Rainy"></i></li>
						<li><input type="radio" <?php echo $disabled;?> name="rdb_weather" <?php echo ("snowy"==$weather_condition) ? 'checked="checked"' : '';?> value="snowy" title="Snowy"/><i class="icon-snowy-4 fg-amber" title="Snowy"></i></li>
						</ul>
						</div>
						</div>
						</div>
						</span>
						<style>.flexslider .slides li {width: 60px !important;padding-left:20px !important;}</style>
						<!--end carousel weather icons-->
						</div>
						</div>
						</div>
					</div>
				</div>
			<!--------END WORKPLACE INFORMATION-------->
		
			
			<!--------START - INSPECTION ITEMS-------->
				<button  href="#acc-2" id="id_inv_firstaid" data-toggle="collapse" class="btn collapse-btn collapsed">
					<div class="row-fluid"><div class="span8 item-title"><h4 class="collapse-basic">INSPECTION ITEMS</h4></div></div>
				</button>
				<div id="acc-2" class="form-large module-inner collapse">				
					<div class="row-fluid collapse-inner">
						<div class="span12 pull-left">
							<div id="id_insp_items_bucket">
							<?php 
							$sizeof_inspitems_info = sizeof($inspitems_info);
							foreach( $inspitems_info AS $key_inspitems_info => $val_inspitems_info ) {
								$insp_itemid 		= isset($val_inspitems_info['id']) ? $val_inspitems_info['id'] : '';
								$insp_regulations 	= (isset($val_inspitems_info['st_regulation_data']) && $val_inspitems_info['st_regulation_data']) ? json_decode($val_inspitems_info['st_regulation_data']) : array();

								$contravention_observation = isset($val_inspitems_info['st_contravention_observation']) ? $val_inspitems_info['st_contravention_observation'] : '';
								$contravention_observation_contents = isset($val_inspitems_info['st_contravention_observation_contents']) ? $val_inspitems_info['st_contravention_observation_contents'] : '';
								$employer_selected = isset($val_inspitems_info['in_employer_selected']) ? $val_inspitems_info['in_employer_selected'] : '';
								
								$nons1_notconnected_employer = isset($val_inspitems_info['st_nons1_notconnected_employer']) ? $val_inspitems_info['st_nons1_notconnected_employer'] : '';
								$compliance_type = isset($val_inspitems_info['st_compliance_type']) ? $val_inspitems_info['st_compliance_type'] : '';

								$compliance_date = isset($val_inspitems_info['dt_compliance_date'])&&"0000-00-00 00:00:00"!=$val_inspitems_info['dt_compliance_date'] ? date('y-m-d H:i',strtotime($val_inspitems_info['dt_compliance_date'])) : '';
								$item_summary = isset($val_inspitems_info['st_item_summary']) ? $val_inspitems_info['st_item_summary'] : '';?>

								<div id="cls_insp_items">
								<div class="row-fluid">
									<div class="span12"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>ACT/REGULATION</label></div>
									<div class="row-fluid">
										<div class="span6 padl5">
											<?php 
											if( isset($insp_regulations) && sizeof($insp_regulations) ) {
												$regtitle 	= ($insp_regulations->regtitle) ? $insp_regulations->regtitle : '';
												$section 	= ($insp_regulations->section) ? $insp_regulations->section : '';
												$subsection = ($insp_regulations->subsection) ? $insp_regulations->subsection : '';
												$item 		= ($insp_regulations->item) ? $insp_regulations->item : '';
												$subitem 	= ($insp_regulations->subitem) ? $insp_regulations->subitem : '';?>
												<div class="control-group">
												<?php $rows_regtitle = $this->users->getMetaDataList("regulation_contents",'1','','st_title', 'st_title');?>
												<input type="text" <?php echo $disabled;?> placeholder="Regulation Number" value="<?php echo $regtitle;?>" name="cmb_regulation_number[<?php echo $insp_itemid;?>][]" id="cmb_regulation_number<?php echo $insp_itemid;?>" list="cmb_regno_list<?php echo $insp_itemid;?>" onblur="getSection('cmb_regulation_number<?php echo $insp_itemid;?>','cmb_section_list<?php echo $insp_itemid;?>', '<?php echo $insp_itemid;?>', ,'reg_title');">
												
												<datalist id="cmb_regno_list<?php echo $insp_itemid;?>">
												<?php 
												foreach($rows_regtitle AS $reg) {
													$selected = ($reg['st_title']==$regtitle)?'selected="selected"':'';?>
													<option value="<?php echo $reg['st_title'];?>" <?php echo $selected;?>><?php echo $reg['st_title'];?></option>
													<?php 
												}?>
												</datalist>
												</div>
												
												<div class="control-group">
												<?php $rows_section = $this->regulation->getRegSectionFromTitle('st_section', "st_title='".$regtitle, 'Section');?>
												
												<input type="text" <?php echo $disabled;?> placeholder="Section" value="<?php echo $section;?>" name="cmb_section[<?php echo $insp_itemid;?>][]" id="cmb_section<?php echo $insp_itemid;?>" list="cmb_section_list<?php echo $insp_itemid;?>" onblur="getSubsection('cmb_section<?php echo $insp_itemid;?>','cmb_subsection_list<?php echo $insp_itemid;?>', '<?php echo $insp_itemid;?>', 'reg_title');">
												<datalist id="cmb_section_list<?php echo $insp_itemid;?>">
												<?php 
												foreach($rows_section AS $val_section) {
													if( $val_section['st_section'] ) {
														$selected = ($val_section['st_section']==$section)?'selected="selected"':'';?>
														<option value="<?php echo $val_section['st_section'];?>" <?php echo $selected;?>><?php echo $val_section['st_section'];?></option>
													<?php 
													}
												}?>
												</datalist>
												</div>
												
												<div class="control-group">
												<?php $rows_subsection = $this->regulation->getRegSectionFromTitle('st_subsection', "st_title='".$regtitle."' AND st_section='".$section, 'Sub Section');?>
												<input type="text" <?php echo $disabled;?> placeholder="Sub Section" value="<?php echo $subsection;?>" name="cmb_subsection[<?php echo $insp_itemid;?>][]" id="cmb_subsection<?php echo $insp_itemid;?>" list="cmb_subsection_list<?php echo $insp_itemid;?>" onblur="getItem('cmb_subsection<?php echo $insp_itemid;?>','cmb_item_list<?php echo $insp_itemid;?>', '<?php echo $insp_itemid;?>','reg_title');">
												<datalist id="cmb_subsection_list<?php echo $insp_itemid;?>">
													<?php 
													foreach($rows_subsection AS $val_subsec) {
														if( $val_subsec['st_subsection'] ) {
															$selected = ($val_subsec['st_subsection']==$subsection)?'selected="selected"':'';?>
															<option value="<?php echo $val_subsec['st_subsection'];?>" <?php echo $selected;?>><?php echo $val_subsec['st_subsection'];?></option>
														<?php 
														}
													}?>
												</datalist>
												</div>
												<div class="control-group">
												<?php $rows_item = $this->regulation->getRegSectionFromTitle('st_item', "st_title='".$regtitle."' AND st_section='".$section."' AND st_subsection='".$subsection, 'Item');?>
												<input type="text" <?php echo $disabled;?> placeholder="Item" value="<?php echo $item;?>" name="cmb_item[<?php echo $insp_itemid;?>][]" id="cmb_item<?php echo $insp_itemid;?>" list="cmb_item_list<?php echo $insp_itemid;?>" onblur="getSubitem('cmb_item<?php echo $insp_itemid;?>','cmb_subitem<?php echo $insp_itemid;?>', '<?php echo $insp_itemid;?>', 'reg_title');">
												<datalist id="cmb_item_list<?php echo $insp_itemid;?>">
													<?php 
													foreach($rows_item AS $val_item) {
														if( $val_item['st_item'] ) {
															$selected = ($val_item['st_item']==$item)?'selected="selected"':'';?>
															<option value="<?php echo $val_item['st_item'];?>" <?php echo $selected;?>><?php echo $val_item['st_item'];?></option>
															<?php 
														}
													}?>
												</datalist>
												</div>
												<div class="control-group">
												<?php $rows_subitem = $this->regulation->getRegSectionFromTitle('st_subitem', "st_title='".$regtitle."' AND st_section='".$section."' AND st_subsection='".$subsection."' AND st_item='".$item, 'Sub Item');?>
												<input type="text" <?php echo $disabled;?> placeholder="Sub Item" value="<?php echo $subitem;?>" name="cmb_subitem[<?php echo $insp_itemid;?>][]" id="cmb_subitem<?php echo $insp_itemid;?>" list="cmb_subitem_list<?php echo $insp_itemid;?>">
												<datalist id="cmb_subitem_list<?php echo $insp_itemid;?>">
													<?php 
													foreach($rows_subitem AS $val_subitem) {
														if( $val_subitem['st_subitem'] ) {
															$selected = ($val_subitem['st_subitem']==$subitem)?'selected="selected"':'';?>
															<option value="<?php echo $val_subitem['st_subitem'];?>" <?php echo $selected;?>>
																<?php echo $val_subitem['st_subitem'];?>
															</option>
														<?php 
														}
													}?>
												</select>
												</div>
												<?php 
											}
											else {?>
												<div class="control-group">
												<?php $rows_regtitle = $this->users->getMetaDataList("regulation_contents",'1','','st_title', 'st_title');?>
												
												<input type="text" <?php echo $disabled;?> placeholder="Regulation Title" value="<?php echo $regtitle;?>" name="cmb_regulation_number[<?php echo $insp_itemid;?>][]" id="cmb_regulation_number<?php echo $insp_itemid;?>" list="cmb_regno_list<?php echo $insp_itemid;?>" onblur="getSection('cmb_regulation_number<?php echo $insp_itemid;?>','cmb_section_list<?php echo $insp_itemid;?>', '<?php echo $insp_itemid;?>', ,'reg_title');">
												<datalist id="cmb_regno_list<?php echo $insp_itemid;?>">
												<?php 
												foreach($rows_regtitle AS $reg) {
													$selected = ($reg['st_title']==$regtitle)?'selected="selected"':'';?>
													<option value="<?php echo $reg['st_title'];?>" <?php echo $selected;?>><?php echo $reg['st_title'];?></option>
													<?php 
												}?>
												</select>
												</div>
												<div class="control-group">
												<input type="text" <?php echo $disabled;?> placeholder="Section" value="<?php echo $section;?>" name="cmb_section[<?php echo $insp_itemid;?>][]" id="cmb_section<?php echo $insp_itemid;?>" list="cmb_section_list<?php echo $insp_itemid;?>" onblur="getSubsection('cmb_section<?php echo $insp_itemid;?>','cmb_subsection_list<?php echo $insp_itemid;?>', '<?php echo $insp_itemid;?>', 'reg_title');">
												<datalist id="cmb_section_list<?php echo $insp_itemid;?>"></datalist>
												
												</div>
												<div class="control-group">
													<input type="text" <?php echo $disabled;?> placeholder="Sub Section" value="<?php echo $subsection;?>" name="cmb_subsection[<?php echo $insp_itemid;?>][]" id="cmb_subsection<?php echo $insp_itemid;?>" list="cmb_subsection_list<?php echo $insp_itemid;?>" onblur="getItem('cmb_subsection<?php echo $insp_itemid;?>','cmb_item_list<?php echo $insp_itemid;?>', '<?php echo $insp_itemid;?>','reg_title');">
													<datalist id="cmb_subsection_list<?php echo $insp_itemid;?>"></datalist>
												</div>
												<div class="control-group">
													<input type="text" <?php echo $disabled;?> placeholder="Item" value="<?php echo $item;?>" name="cmb_item[<?php echo $insp_itemid;?>][]" id="cmb_item<?php echo $insp_itemid;?>" list="cmb_item_list<?php echo $insp_itemid;?>" onblur="getSubitem('cmb_item<?php echo $insp_itemid;?>','cmb_subitem<?php echo $insp_itemid;?>', '<?php echo $insp_itemid;?>', 'reg_title');">
													<datalist id="cmb_item_list<?php echo $insp_itemid;?>"></datalist>
												</div>
												<div class="control-group">
													<input type="text" <?php echo $disabled;?> placeholder="Sub Item" value="<?php echo $subitem;?>" name="cmb_subitem[<?php echo $insp_itemid;?>][]" id="cmb_subitem<?php echo $insp_itemid;?>" list="cmb_subitem_list<?php echo $insp_itemid;?>">
													<datalist id="cmb_subitem_list<?php echo $insp_itemid;?>"></datalist>
												</div>
												<?php 
											}?>
										</div>
										<div style="display:none;" id="img_data_loader<?php echo $insp_itemid;?>" align="center"><img width="65" height="65" src="<?php echo $base."img/loading_icon.gif";?>"></div>
										<div class="span6" id="id_div_contents<?php echo $insp_itemid;?>">
											<?php 
											// Get Regulation Contents //
												$reg_contents = $this->regulation->getRegSectionFromTitle("st_content", "st_title='".$regtitle."' AND st_section = '".$section."' AND st_subsection = '".$subsection."' AND st_item = '".$item."' AND st_subitem = '".$subitem, '', 'lbl' );
												echo isset($reg_contents[0]['st_content']) ? $reg_contents[0]['st_content'] : 'N/A';?>
										</div>
									</div>
								</div>
								<div class="row-fluid">
									<div class="span12"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>CONTRAVENTION OBSERVATION</label></div>
									<div class="span6">
									<input type="text" <?php echo $disabled;?> name="txtarea_contravention_observation[<?php echo $insp_itemid;?>]" class="container-width selectpicker form-large-select span10" value="<?php  echo $contravention_observation_contents;?>" placeholder="TYPE CONTENTS"/>
									</div>
									<div class="span5" style="border:0;box-shadow:none;">
										<input type="radio" <?php echo $disabled;?> <?php echo ("Contravention"==$contravention_observation||""==$contravention_observation) ? 'checked="checked"':'';?> name="rdb_contravention_observation[<?php echo $insp_itemid;?>]" value="Contravention" /> Contravention
										<input type="radio" <?php echo $disabled;?> <?php echo ("Observation"==$contravention_observation) ? 'checked="checked"':'';?> name="rdb_contravention_observation[<?php echo $insp_itemid;?>]" value="Observation"/> Observation
									</div>
								</div>
								<div class="row-fluid">
								  <div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>EMPLOYER</label></div>
								  <?php $my_clients = $this->users->getEmployersByConsultant('AND consultant_id="'.$this->sess_userid.'"');
								  ?>
								  <div class="span3">
									<select <?php echo $disabled;?> name="cmb_my_clients[<?php echo $insp_itemid;?>]">
										<option value="">-select-</option>
										<?php 
										foreach($my_clients AS $val_myclient) {
											$selected = ($val_myclient['id']==$employer_selected)?'selected="selected"':'';?>
											<option value="<?php echo $val_myclient['id'];?>" <?php echo $selected;?>><?php echo $val_myclient['firstname']." ".$val_myclient['lastname'];?></option>
											<?php
										}?>
									</select>
								  </div>
								  <?php 
								  if( isset($my_clients) && sizeof($my_clients)<=0 ) {?>
									<div class="span4" style="border:0;box-shadow:none;">
										<input type="text" <?php echo $disabled;?> name="txt_nons1_notconnected_employer[<?php echo $insp_itemid;?>]" class="container-width selectpicker form-large-select span10" value="<?php echo $nons1_notconnected_employer;?>" placeholder="TYPE EMPLOYER"/>
									</div>
									<?php 
								  }?>
								</div>
								<div class="row-fluid">
									<div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>COMPLIANCE TYPE</label></div>
									<div class="span2 " style="border:0;box-shadow:none;">
									<input type="radio" <?php echo $disabled;?> <?php echo ("Forthwith"==$compliance_type||""==$compliance_type) ? 'checked="checked"':'';?> name="rdb_compliance_type[<?php echo $insp_itemid;?>]" value="Forthwith" /> Forthwith
									</div>
									<div class="span2" style="border:0;box-shadow:none;">
									<input type="radio" <?php echo $disabled;?> <?php echo ("Stop"==$compliance_type) ? 'checked="checked"':'';?> name="rdb_compliance_type[<?php echo $insp_itemid;?>]" value="Stop"/> Stop
									</div>
									<div class="span3" style="border:0;box-shadow:none;">
									<input type="radio" <?php echo $disabled;?> <?php echo ("Time"==$compliance_type) ? 'checked="checked"':'';?> name="rdb_compliance_type[<?php echo $insp_itemid;?>]" name="rdb_compliance_type[<?php echo $insp_itemid;?>]" value="Time"/> Time
									<input id="txt_compliance_date<?php echo $insp_itemid;?>" name="txt_compliance_date[<?php echo $insp_itemid;?>]" value="<?php echo $compliance_date;?>" type="text" <?php echo $disabled;?> placeholder="YY-MM-DD --:--" class="container-width required selectpicker form-large-select datestamp<?php echo $insp_itemid;?>"/>
									</div>
								</div>
								<script>$(window).load(function() { $('.datestamp<?php echo $insp_itemid;?>').datetimepicker({dateFormat: "y-mm-dd"}); });</script>
								<div class="row-fluid">
									<div class="span12"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>SUMMARY</label></div>
									<div class="row-fluid">
										<div class="span12">
										<input type="text" <?php echo $disabled;?> name="txtarea_item_summary[<?php echo $insp_itemid;?>]" class="container-width selectpicker form-large-select span10" value="<?php echo $item_summary;?>" placeholder="TYPE SUMMARY"/>
										</div>
									</div>
								</div>
								</div>
								<?php 
								echo ($sizeof_inspitems_info > 0) ? "<br>" : '';
								}?>									
							</div>

							<?php if( !$disabled ) {?>
								<div class="clearfix" style="border:0;box-shadow:none;"><a id="btn_add_new" onclick="addAdvancedInspectionItems();" class="btn btn-warning pull-right">Add New Item</a></div>
								<?php
							}?>

							<div class="row-fluid">
								<div class="span12 btnGroups">
								
								<?php if( !$disabled ) {?>
								<div class="span5" style="border:0;box-shadow:none;">
									<button type="submit" value="save_inspection" name="btn_save_inspection" id="btn_save_inspection" class="btn btn-warning pull-right">Save Inspection</button>
								</div>
								<?php }?>
								<div class="span2" style="border:0;box-shadow:none;">
								<!-- onclick="javascript:ajaxCall('print');"-->
									<button href="#modal_print_contents" data-toggle="modal" type="button"  value="print" name="btn_print_inspection" id="btn_print_inspection" class="btn btn-warning pull-right"> Print </button>
								</div>
								<div class="span3" style="border:0;box-shadow:none;">
									<button type="submit" value="export_pdf" name="btn_export_pdf" id="btn_export_pdf" class="btn btn-warning pull-right">Export as PDF</button>
								</div>
								<?php if( !$disabled ) {?>
								<div class="span2" style="border:0;box-shadow:none;">
									<button type="submit" value="finish" name="btn_finish_inspection" id="btn_finish_inspection" class="btn btn-danger pull-right">Finish</button>
								</div>
								<?php }?>
								</div>
							</div>
						</div>
					</div>
				</div>
			<!--------END - INSPECTION ITEMS-------->
			
				</form>
	</div>
</div>
</div><!--end class wrapper-->
</div><!--end div container-fluid-->


<?php 
if( isset($_POST['btn_export_pdf']) && $_POST['btn_export_pdf'] ) {	
	// Consultant profile Image //
		global $leftside_consultant_img;
		if( file_exists(FCPATH.$this->path_upload_profiles.$user['profile_image']) ) {
			$leftside_consultant_img = UPLOAD_PATH_IMAGES."profiles/".$user['profile_image'];
		}
		else {
			$leftside_consultant_img = K_PATH_IMAGES."default.png";
		}
	
	// Client profile Image //
		global $rightside_client_img;
		$client_profileimage = $this->users->getUserByID($client_id, 'profile_image');
		$client_profileimage = isset($client_profileimage['profile_image']) ? $client_profileimage['profile_image'] : '';
 		
		if( file_exists(FCPATH.$this->path_upload_profiles.$client_profileimage) ) {
			$rightside_client_img = UPLOAD_PATH_IMAGES."profiles/".$client_profileimage;
		}
		else {
			$rightside_client_img = K_PATH_IMAGES."default.png";
		}
			
	class MYPDF extends TCPDF {
		//Page header
		public function Header() {
			global $leftside_consultant_img;
			global $rightside_client_img;

			$arr_leftside_consultant_img = pathinfo($leftside_consultant_img);
			$ext_leftside_consultant_img = $arr_leftside_consultant_img['extension'];
			$arr_rightside_client_img = pathinfo($rightside_client_img);
			$ext_rightside_client_img = $arr_rightside_client_img['extension'];
			
			$this->Image($leftside_consultant_img, 10, 10, 15, '', $ext_leftside_consultant_img, '', 'T', false, 350, '', false, false, 0, false, false, false);
			$this->Image($rightside_client_img, 10, 10, 15, '', $ext_rightside_client_img, '', 'T', false, 350, 'R', false, false, 0, false, false, false);
		}
	}

	// create new PDF document
		$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

	// Set document information //
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('S1 System');
		$pdf->SetTitle('Advanced Inspection');
		$pdf->SetSubject('Advanced Inspection');

		// set default header data
		$pdf->setHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, "Advanced Inspection", PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
		$pdf->setFooterData(array(0,64,0), array(0,64,128));

	// set header and footer fonts
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

	// set default monospaced font
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

	// set margins
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

	// set auto page breaks
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

	// set image scale factor
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

	// set some language-dependent strings (optional)
		if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
			require_once(dirname(__FILE__).'/lang/eng.php');
			$pdf->setLanguageArray($l);
		}

	// set default font subsetting mode
		$pdf->setFontSubsetting(true);

	// Set font
	// dejavusans is a UTF-8 Unicode font, if you only need to
	// print standard ASCII chars, you can use core fonts like
	// helvetica or times to reduce file size.
		// $pdf->SetFont('dejavusans', '', 12, '', true);
		$pdf->SetFont('helvetica', '', 9, '', true);

	// Add a page
	// This method has several options, check the source code documentation for more information.
		$pdf->AddPage();

	// set text shadow effect
		$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));

	ob_clean();
	ob_start();
	?>
	
	<div style="position: relative;padding-top:75px;">&nbsp;</div><h4>WORKPLACE INFORMATION</h4><br>
	<table border="0" cellpadding="1" style="width:100%;">
		<tr><td style="width:30%;"><b>Title: </b></td><td><?php echo $advinspection_title;?></td></tr>
		<tr><td style="width:30%;"><b>Project Name: </b></td><td><?php echo $project_name;?></td></tr>
		<tr><td style="width:30%;"><b>Date/Time of Inspection: </b></td><td><?php echo $datetime_inspection;?></td></tr>
		<tr><td style="width:30%;"><b>Completed By: </b></td><td><?php echo ucwords($user['firstname']." ".$user['lastname']);?></td></tr>
		<tr><td style="width:30%;"><b>Type: </b></td><td><?php echo $inspection_type;?></td></tr>
		<tr><td style="width:30%;"><b>Constructor: </b></td><td><?php echo $constructor_name;?></td></tr>
		<tr><td style="width:30%;"><b>Location: </b></td><td><?php echo $location;?></td></tr>
		<tr><td style="width:30%;"><b>Site Supervisor: </b></td><td><?php echo $site_supervisor;?></td></tr>
		<tr><td style="width:30%;"><b>Weather Condition: </b></td><td><?php echo $weather_condition;?></td></tr>
	</table>

	<br><h4>INSPECTION ITEMS</h4>
	<table border="1" cellpadding="1" style="width:100%;">
		<tr>
			<td style="width:4%;" class="f11"><b>Item</b></td>
			<td style="width:11%;" class="f11"><b>Code</b></td>
			<td style="width:15%;" class="f11"><b>Act/Reg</b></td>
			<td style="width:45%;" class="f11"><b>Text</b></td>
			<td style="width:10%;" class="f11"><b>Employer</b></td>
			<td style="width:15%;" class="f11"><b>Summary</b></td>
		</tr>
	<?php  
	if( $sizeof_inspitems_info > 0 ) {
		// common::pr( $inspitems_info );// die;
		
		foreach( $inspitems_info AS $key_inspitems_info => $val_inspitems_info ) {
			$insp_itemid 		= isset($val_inspitems_info['id']) ? $val_inspitems_info['id'] : '';
			$item_regulation 	= isset($val_inspitems_info['st_regulation_data']) ? json_decode($val_inspitems_info['st_regulation_data']) : array();
			$contravention_observation = isset($val_inspitems_info['st_contravention_observation']) ? $val_inspitems_info['st_contravention_observation'] : '';
			$employer_selected 	= isset($val_inspitems_info['in_employer_selected']) ? $val_inspitems_info['in_employer_selected'] : '';
			$compliance_type 	= isset($val_inspitems_info['st_compliance_type']) ? $val_inspitems_info['st_compliance_type'] : '';
			$compliance_date 	= isset($val_inspitems_info['dt_compliance_date']) ? $val_inspitems_info['dt_compliance_date'] : '';
			$item_summary 		= isset($val_inspitems_info['st_item_summary']) ? $val_inspitems_info['st_item_summary'] : '';

			$section 		= (isset($item_regulation->section)&&$item_regulation->section) ? "(".trim($item_regulation->section).")" : '';
			$subsection 	= (isset($item_regulation->subsection)&&$item_regulation->subsection) ? "(".trim($item_regulation->subsection).")" : '';
			$item 			= (isset($item_regulation->item)&&$item_regulation->item) ? "(".trim($item_regulation->item).")" : '';
			$subitem 		= (isset($item_regulation->subitem)&&$item_regulation->subitem) ? "(".trim($item_regulation->subitem).")" : '';
																	
			$regulation_contents = $this->regulation->getRegSectionFromTitle("st_content", "st_title='".$item_regulation->regtitle."' AND st_section = '".$item_regulation->section."' AND st_subsection = '".$item_regulation->subsection."' AND st_item = '".$item_regulation->item."' AND st_subitem = '".$item_regulation->subitem, 'content' );?>
			<tr>
				<td valign="top" class="f10" style="width:4%;"><?php echo ($key_inspitems_info+1);?></td>
				<td valign="top" class="f10" style="width:11%;"><?php echo $contravention_observation."<br>".$compliance_type."<br>".$compliance_date;?></td>
				<td valign="top" class="f10" style="width:15%;"><?php echo "<p>".$item_regulation->regtitle."<br></p>".$section.$subsection.$item.$subitem;?></td>
				<td valign="top" class="f10" style="width:45%;"><?php echo ($regulation_contents[0]['st_content']);?></td>
				<td valign="top" class="f10" style="width:10%;">
					<?php 
					foreach($my_clients AS $val_myclient) {
						if( $val_myclient['id']==$employer_selected ) {
							echo $val_myclient['firstname']."<br>".$val_myclient['lastname'];
						}
					}?>
				</td>
				<td valign="top" class="f10" style="width:15%;"><?php echo $item_summary;?></td>
			</tr>		
			<?php 
		}
	}
	else {
		echo '<p>No Inspection Items available.</p>';
	}?>
	</table>
	<?php 
	$pdf_contents = ob_get_contents();
	
	// echo $pdf_contents;die;
	ob_end_clean();
	
	$pdf->writeHTML($pdf_contents, true, false, true, false, '');
	// Close and output PDF document
	// This method has several options, check the source code documentation for more information. //
		$pdf->Output('pdf_inspection_'.$consultant_id."_".$client_id.'.pdf', 'D');
}?>
</div><!--end div homebg-->

<!-- PRINT advanced inspection Modal --> 
<div id="modal_print_contents" style="width:800px;margin-left:-400px;" class="modal fade hide metro" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-header bg-red"><h3 id="myModalLabel">Advanced Inspection<i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal"></i></h3></div>
	<div class="modal-body">
	<div class="charities-container" id="id_print_contents" style="padding:0px 0px 0px 0px;box-shadow: none;">
		<?php 
		// Consultant profile Image //
			if( file_exists(FCPATH.$this->path_upload_profiles.$user['profile_image']) ) {
				$leftside_consultant_img = $this->base.$this->path_upload_profiles.$user['profile_image'];
			}
			else {
				$leftside_consultant_img = $this->base."img/default.png";
			}

		// Client profile Image //
			$client_profileimage = $this->users->getUserByID($client_id, 'profile_image');
			$client_profileimage = isset($client_profileimage['profile_image']) ? $client_profileimage['profile_image'] : '';
			if( file_exists(FCPATH.$this->path_upload_profiles.$client_profileimage) ) {
				$rightside_client_img = $this->base.$this->path_upload_profiles.$client_profileimage;
			}
			else {
				$rightside_client_img = $this->base."img/default.png";
			}
		?>
		<div>
			<span style="float:left;"><img src="<?php echo $leftside_consultant_img;?>" width="100" width="90"></span>
			<span style="float:right;"><img src="<?php echo $rightside_client_img;?>" width="100" width="90"></span>
		</div>
		<div style="position: relative;padding-top:75px;">&nbsp;</div><h4>WORKPLACE INFORMATION</h4><br>
		<table border="0" cellpadding="1" style="width:100%;">
			<tr><td style="width:30%;"><b>Title: </b></td><td><?php echo $advinspection_title;?></td></tr>
			<tr><td style="width:30%;"><b>Project Name: </b></td><td><?php echo $project_name;?></td></tr>
			<tr><td style="width:30%;"><b>Date/Time of Inspection: </b></td><td><?php echo $datetime_inspection;?></td></tr>
			<tr><td style="width:30%;"><b>Completed By: </b></td><td><?php echo ucwords($user['firstname']." ".$user['lastname']);?></td></tr>
			<tr><td style="width:30%;"><b>Type: </b></td><td><?php echo $inspection_type;?></td></tr>
			<tr><td style="width:30%;"><b>Constructor: </b></td><td><?php echo $constructor_name;?></td></tr>
			<tr><td style="width:30%;"><b>Location: </b></td><td><?php echo $location;?></td></tr>
			<tr><td style="width:30%;"><b>Site Supervisor: </b></td><td><?php echo $site_supervisor;?></td></tr>
			<tr><td style="width:30%;"><b>Weather Condition: </b></td><td><?php echo $weather_condition;?></td></tr>
		</table>

		<br><h4>INSPECTION ITEMS</h4>
		<table border="1" cellpadding="1" style="width:100%;">
			<tr>
				<td style="width:4%;" class=""><b>Item</b></td>
				<td style="width:11%;" class=""><b>Code</b></td>
				<td style="width:15%;" class=""><b>Act/Reg</b></td>
				<td style="width:45%;" class=""><b>Text</b></td>
				<td style="width:10%;" class=""><b>Employer</b></td>
				<td style="width:15%;" class=""><b>Summary</b></td>
			</tr>
		<?php 
		if( $sizeof_inspitems_info > 0 ) {
			// common::pr( $inspitems_info );// die;
			foreach( $inspitems_info AS $key_inspitems_info => $val_inspitems_info ) {
				$insp_itemid 		= isset($val_inspitems_info['id']) ? $val_inspitems_info['id'] : '';
				$item_regulation 	= isset($val_inspitems_info['st_regulation_data']) ? json_decode($val_inspitems_info['st_regulation_data']) : array();
				$contravention_observation = isset($val_inspitems_info['st_contravention_observation']) ? $val_inspitems_info['st_contravention_observation'] : '';
				$employer_selected 	= isset($val_inspitems_info['in_employer_selected']) ? $val_inspitems_info['in_employer_selected'] : '';
				$compliance_type 	= isset($val_inspitems_info['st_compliance_type']) ? $val_inspitems_info['st_compliance_type'] : '';
				$compliance_date 	= isset($val_inspitems_info['dt_compliance_date']) ? $val_inspitems_info['dt_compliance_date'] : '';
				$item_summary 		= isset($val_inspitems_info['st_item_summary']) ? $val_inspitems_info['st_item_summary'] : '';

				$section 		= (isset($item_regulation->section)&&$item_regulation->section) ? "(".trim($item_regulation->section).")" : '';
				$subsection 	= (isset($item_regulation->subsection)&&$item_regulation->subsection) ? "(".trim($item_regulation->subsection).")" : '';
				$item 			= (isset($item_regulation->item)&&$item_regulation->item) ? "(".trim($item_regulation->item).")" : '';
				$subitem 		= (isset($item_regulation->subitem)&&$item_regulation->subitem) ? "(".trim($item_regulation->subitem).")" : '';
																		
				$regulation_contents = $this->regulation->getRegSectionFromTitle("st_content", "st_title='".$item_regulation->regtitle."' AND st_section = '".$item_regulation->section."' AND st_subsection = '".$item_regulation->subsection."' AND st_item = '".$item_regulation->item."' AND st_subitem = '".$item_regulation->subitem, 'content' );?>
				<tr>
					<td valign="top" class="" style="width:4%;"><?php echo ($key_inspitems_info+1);?></td>
					<td valign="top" class="" style="width:11%;"><?php echo $contravention_observation."<br>".$compliance_type."<br>".$compliance_date;?></td>
					<td valign="top" class="" style="width:15%;"><?php echo "<div>".$item_regulation->regtitle."<br></div>".$section.$subsection.$item.$subitem;?></td>
					<td valign="top" class="" style="width:45%;"><?php echo ($regulation_contents[0]['st_content']);?></td>
					<td valign="top" class="" style="width:10%;">
						<?php 
						foreach($my_clients AS $val_myclient) {
							if( $val_myclient['id']==$employer_selected ) {
								echo $val_myclient['firstname']."<br>".$val_myclient['lastname'];
							}
						}?>
					</td>
					<td valign="top" class="" style="width:15%;"><?php echo $item_summary;?></td>
				</tr>
				<?php 
			}
		}
		else {
			echo '<p>No Inspection Items available.</p>';
		}?>
		</table>
	</div>
	</div>
	<div class="modal-footer">
		<button onclick="printInspection('id_print_contents');" value="print" name="btn_print_inspection" id="btn_print_inspection" class="btn"> Print </button>
		<button class="btn pull-right" data-dismiss="modal">Close</button>
	</div>
</div>

<!-- Place in the <head>, after the three links -->

<!-- Start - For Datetime Picker -->
	<link rel="stylesheet" href="<?php echo $base;?>css/jquery-ui.css" />
	<script type="text/javascript" src="<?php echo $base;?>js/jquery-ui.js"></script>
	<script type="text/javascript" src="<?php echo $base;?>js/jquery-ui-timepicker.js"></script>
<!-- End - For Datetime Picker -->
<script type="text/javascript" src="<?php echo $base;?>js/jquery.form.js"></script>
<script type="text/javascript" src="<?php echo $base;?>js/regulation.js"></script>


<script type="text/javascript">  
	var sizeof_inspitems_info = '<?php echo $sizeof_inspitems_info;?>';
	$(window).load(function() {
		$('.datestamp').datetimepicker({dateFormat: "yy-mm-dd"}); 
	});
	
	function printInspection(divName)
	{
		var var_window = window.open();
		var_window.document.write($('#'+divName).html());
		var_window.print();
		var_window.close();
	}

	function deleteSection( id )
	{
		$('#'+id).slideUp('medium', function () {
			$("#"+id).html('');
			$("#"+id).remove('');
		});
	}

	var disabled = '<?php echo $disabled;?>';
	function addAdvancedInspectionItems()
	{
		var num = $('.cls_insp_items').length;

		cnt_insp_item = new Number(num + 1); // the numeric ID of the new input field being added
		
		if( sizeof_inspitems_info > 0 ) {
			cnt_insp_item = parseInt(cnt_insp_item)+parseInt(sizeof_inspitems_info);
		}
		var inspitems = '<div class="cls_insp_items"><div class="row-fluid">';
		inspitems +=  '<div class="span12"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>ACT/REGULATION</label></div>';
		inspitems +=  '<div class="row-fluid">';
		
		regContents(cnt_insp_item);
													
		inspitems +=  '<div class="span6 pad15">';
		<?php $rows_regtitle = $this->users->getMetaDataList("regulation_contents",'1','','st_title', 'st_title');?>
		
		inspitems += '<div class="control-group">';
		inspitems += '<input type="text" '+disabled+' value="" placeholder="Regulation Title" name="cmb_regulation_number[new]['+cnt_insp_item+']" id="cmb_regulation_number'+cnt_insp_item+'" list="cmb_regno_list'+cnt_insp_item+'" onblur=getSection("cmb_regulation_number'+cnt_insp_item+'","cmb_section_list'+cnt_insp_item+'",'+cnt_insp_item+',"reg_title");>';
		inspitems += '<datalist id="cmb_regno_list'+cnt_insp_item+'">';
		<?php foreach($rows_regtitle AS $reg) {?>
			inspitems += '<option value="<?php echo $reg['st_title'];?>"><?php echo $reg['st_title'];?></option>';
			<?php
		}?>
		inspitems += '</datalist>';
		inspitems += '</div>';
		inspitems += '<div class="control-group">';
		inspitems += '<input type="text" '+disabled+' value="" placeholder="Section" name="cmb_section[new]['+cnt_insp_item+']" id="cmb_section'+cnt_insp_item+'" list="cmb_section_list'+cnt_insp_item+'" onblur=getSubsection("cmb_section'+cnt_insp_item+'","cmb_subsection_list'+cnt_insp_item+'",'+cnt_insp_item+',"reg_title");>';
		inspitems += '<datalist id="cmb_section_list'+cnt_insp_item+'"></datalist>';
		inspitems += '</div>';

		inspitems += '<div class="control-group">';
		inspitems += '<input type="text" value="" '+disabled+' placeholder="Sub Section" name="cmb_subsection[new]['+cnt_insp_item+']" id="cmb_subsection'+cnt_insp_item+'" list="cmb_subsection_list'+cnt_insp_item+'" onblur=getItem("cmb_subsection'+cnt_insp_item+'","cmb_item_list'+cnt_insp_item+'",'+cnt_insp_item+',"reg_title");>';
		inspitems += '<datalist id="cmb_subsection_list'+cnt_insp_item+'"></datalist>';
		inspitems += '</div>';

		inspitems += '<div class="control-group">';
		inspitems += '<input type="text" '+disabled+' value="" placeholder="Item" name="cmb_item[new]['+cnt_insp_item+']" id="cmb_item'+cnt_insp_item+'" list="cmb_item_list'+cnt_insp_item+'" onblur=getSubitem("cmb_item'+cnt_insp_item+'","cmb_subitem_list'+cnt_insp_item+'",'+cnt_insp_item+',"reg_title");>';
		inspitems += '<datalist id="cmb_item_list'+cnt_insp_item+'"></datalist>';
		inspitems += '</div>';
		
		inspitems += '<div class="control-group">';
		inspitems += '<input type="text" '+disabled+' value="" placeholder="Sub Item" name="cmb_subitem[new]['+cnt_insp_item+']" id="cmb_subitem'+cnt_insp_item+'" list="cmb_subitem_list'+cnt_insp_item+'","reg_title">';
		inspitems += '<datalist id="cmb_subitem_list'+cnt_insp_item+'"></datalist>';
		inspitems += '</div>';
		inspitems += '</div>';

		inspitems += '<div class="span6" id="id_div_contents'+cnt_insp_item+'">Regulation Contents</div></div></div>';
		inspitems += '<div class="row-fluid">';
		inspitems += '<div class="span12"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>CONTRAVENTION OBSERVATION</label></div>';
		inspitems += '<div class="span6"><input type="text" '+disabled+' name="txtarea_contravention_observation[new]['+cnt_insp_item+']" class="selectpicker form-large-select span10 container-width" placeholder="TYPE CONTENTS"/></div>';
		inspitems += '<div class="span5 " style="border:0;box-shadow:none;">';
		inspitems += '<input type="radio" checked '+disabled+' name="rdb_contravention_observation[new]['+cnt_insp_item+']" value="Contravention" /> Contravention';
		inspitems += '<input type="radio" '+disabled+' name="rdb_contravention_observation[new]['+cnt_insp_item+']" value="Observation"/> Observation';
		inspitems += '</div></div>';
		inspitems += '<div class="row-fluid">';
		inspitems += '<div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>EMPLOYER</label></div>';
		
		<?php $my_clients = $this->users->getEmployersByConsultant('AND consultant_id="'.$this->sess_userid.'"');?>
		
		inspitems += '<div class="span3">';
		inspitems += '<select '+disabled+' name="cmb_my_clients[new]['+cnt_insp_item+']">';
		inspitems += '<option value="">-select-</option>';
		<?php foreach($my_clients AS $val_myclient) {?>
		inspitems += '<option value="<?php echo $val_myclient['id'];?>"><?php echo $val_myclient['firstname']." ".$val_myclient['lastname'];?></option>';
			<?php
		}?>
		inspitems += '</select></div>';
		<?php 
		//if( isset($my_clients) && sizeof($my_clients)<=0 ) 
		{?>
		inspitems += '<div class="span4" style="border:0;box-shadow:none;">';
		inspitems += '<input type="text" '+disabled+' name="txt_nons1_notconnected_employer[new]['+cnt_insp_item+']" class="container-width selectpicker form-large-select span12" placeholder="TYPE EMPLOYER"/></div>';
			<?php 
		}?>
		inspitems += '</div>';
		inspitems += '<div class="row-fluid">';
		inspitems += '<div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>COMPLIANCE TYPE</label></div>';
		inspitems += '<div class="span2 " style="border:0;box-shadow:none;">';
		inspitems += '<input type="radio" checked '+disabled+' name="rdb_compliance_type[new]['+cnt_insp_item+']" value="Forthwith" /> Forthwith</div>';
		inspitems += '<div class="span2 " style="border:0;box-shadow:none;">';
		inspitems += '<input type="radio" '+disabled+' name="rdb_compliance_type[new]['+cnt_insp_item+']" value="Stop"/> Stop</div>';
		inspitems += '<div class="span3" style="border:0;box-shadow:none;">';
		inspitems += '<input type="radio" '+disabled+' name="rdb_compliance_type[new]['+cnt_insp_item+']" value="Time"/> Time';
		inspitems += '<input id="txt_compliance_date'+cnt_insp_item+'" '+disabled+' name="txt_compliance_date[new]['+cnt_insp_item+']" type="text" placeholder="YY-MM-DD --:--" class="container-width required selectpicker form-large-select datestamp'+cnt_insp_item+'"/></div></div>';
		inspitems += '<div class="row-fluid">';
		inspitems += '<div class="span12"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>SUMMARY</label></div>';
		inspitems += '<div class="row-fluid"><div class="span12">';
		inspitems += '<input type="text" '+disabled+' name="txtarea_item_summary[new]['+cnt_insp_item+']" class="container-width selectpicker form-large-select span10" placeholder="TYPE SUMMARY"/></div>';
		inspitems += '</div></div></div>';

		$("#id_insp_items_bucket").append(inspitems);
		
		$('.datestamp'+cnt_insp_item).datetimepicker({dateFormat: "y-mm-dd"});
	}
	
	function regContents(idVal)
	{
		var reg_no 		= $("#cmb_regulation_number"+idVal).val();
		var section 	= $("#cmb_section"+idVal).val();
		var subsection 	= $("#cmb_subsection"+idVal).val();
		var item 		= $("#cmb_item"+idVal).val();
		var subitem 	= $("#cmb_subitem"+idVal).val();

		$("#img_data_loader"+idVal).show();
		$("#id_div_contents"+idVal).hide();
		if( null !== reg_no ) {
			$.ajax({
				url: js_base_path+'ajax/getRegulationContents',
				type: 'post', 
				data: 'reg_no='+reg_no+'&section='+section+'&subsection='+subsection+'&item='+item+'&subitem='+subitem, 
				success: function(output) {
					$("#img_data_loader"+idVal).hide();
					$("#id_div_contents"+idVal).show();
					$("#id_div_contents"+idVal).html(output);
				}, 
				error: function(errMsg) {
					alert( errMsg.responseText );
					return false;
				}
			});
		}
	}

	$(document).ready(function () {
		<?php
		if( $sizeof_inspitems_info <= 0) {?>
			addAdvancedInspectionItems();
			<?php
		}?>
		$('.flexslider').flexslider({
			controlNav: false,
			prevText:"",
			nextText:"",
			animation: "slide",
			itemWidth: 1,
			minItems: 4,
			maxItems: 4,
			move: 4,
			animationLoop: false,
			reverse: false,
			slideshow: false
		});
	});
</script>
<?php $this->load->view('footer_admin'); ?>
