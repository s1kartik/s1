<?php 
$this->load->view('header_admin');
$investigation_no 	= ($this->session->userdata('investigation_no')) ? $this->session->userdata('investigation_no') : $this->investigation->generateInvestigationNo();
$inv_form_id 		= '';
if( $investigation_no ) {
	$inv_form_id	= $this->users->getMetaDataList( 'inv_investigation_forms', 'st_inv_form_no="'.$investigation_no.'"', '', 'in_investigation_id, in_inv_form_id' );
	$inv_form_id	= isset($inv_form_id[0]['in_inv_form_id']) ? $inv_form_id[0]['in_inv_form_id'] : '';
}
$inv_scope 			= $this->investigation->checkInvestigationScope($inv_form_id);
$disabled 			= ("EDIT" == $inv_scope) ? "" : "disabled";

$rows_inv_investigators 		= $this->users->getMetaDataList('inv_investigator', '' , 'in_investigation_id="'.$inv_form_id.'"', 'st_investigator_name, st_job_title');
$arr_inv_pdf['investigators'] 	= isset($rows_inv_investigators) ? $rows_inv_investigators : array();
$rows_inv_additional_workers 	= $this->users->getMetaDataList('inv_investigation_workers', '' , 'in_investigation_id="'.$inv_form_id.'"', 'st_worker_name, st_worker_job_title');
$arr_inv_pdf['inv_additional_workers'] = isset($rows_inv_additional_workers) ? $rows_inv_additional_workers : array();
?>
<script type="text/javascript">
var js_invform_id = '<?php echo $inv_form_id;?>';
</script>
<link rel="stylesheet" href="<?php echo $base;?>css/jquery-ui.css" />
<script type="text/javascript" src="<?php echo $base;?>js/jquery-ui.js"></script>
<script type="text/javascript" src="<?php echo $base;?>js/jquery/jquery.min.js"></script>

<!-- Start - Fancy box image --> 
	<!-- Add fancyBox main JS and CSS files -->
		<script type="text/javascript" src="<?php echo $base."plugin/fancybox/source/jquery.fancybox.js?v=2.1.5";?>"></script>
		<link rel="stylesheet" type="text/css" href="<?php echo $base."plugin/fancybox/source/jquery.fancybox.css?v=2.1.5";?>" media="screen" />
<!-- End - Fancy box image --> 

<div class="homebg">
<div class="container-fluid">
<div class="wrapper">
<div class="union-container">
	<div class="module">
		<h5  class="title">INVESTIGATION: <?php echo $investigation_no;?></h5>
			<!--------START  COVER-------->
				<button  href="#acc-1" id="id_inv_cover" data-toggle="collapse" class="btn collapse-btn collapsed">
					<div class="row-fluid">
						<div class="span8 item-title">
							<h4 class="collapse-basic" >Cover</h4>
						</div>
					</div>
				</button>
				<div id="acc-1" class="module-inner collapse">			
					<div class="row-fluid collapse-inner">
						<div class="span12 pull-left">
							<form class="form-large" id="frm_inv_cover" name="frm_inv_cover">
								<?php 
								$datetime_incident 	= $datetime_incident_reported = $st_incident_reported_to = $st_incident_address = $st_project = '';
								$st_project_area 	= $st_project_supervisor = $st_weather = $is_incident_reported_to_MOL = $datetime_incident_reported_to_MOL = '';
								$st_incident_reported_to_MOL = $st_name_MOL_officer_incident_attended = $st_contact_MOL_officer_incident_attended = $is_witness_to_incident = '';

								$rows_incident_cover = $this->users->getMetaDataList('inv_investigation_incident_cover',"in_investigation_id='".$inv_form_id."'",'','*');
								$arr_inv_pdf['incident_cover'] = isset($rows_incident_cover) ? $rows_incident_cover : array();
								
								$sizeof_incident_cover= sizeof($rows_incident_cover);
								if( isset($rows_incident_cover) && $sizeof_incident_cover ) {
									foreach( $rows_incident_cover AS $key_incident_cover => $val_incident_cover ) {
										$datetime_incident 			= isset($val_incident_cover['datetime_incident']) ? $val_incident_cover['datetime_incident'] : '';
										$datetime_incident_reported = isset($val_incident_cover['datetime_incident_reported']) ? $val_incident_cover['datetime_incident_reported']:'';
										$st_incident_reported_to 	= isset($val_incident_cover['st_incident_reported_to']) ? $val_incident_cover['st_incident_reported_to'] : '';
										$st_incident_address		= isset($val_incident_cover['st_incident_address']) ? $val_incident_cover['st_incident_address'] : '';
										$st_project					= isset($val_incident_cover['st_project']) ? $val_incident_cover['st_project'] : '';
										$st_project_area			= isset($val_incident_cover['st_project_area']) ? $val_incident_cover['st_project_area'] : '';
										$st_project_supervisor		= isset($val_incident_cover['st_project_supervisor']) ? $val_incident_cover['st_project_supervisor'] : '';
										$st_weather					= isset($val_incident_cover['st_weather']) ? $val_incident_cover['st_weather'] : '';
										$is_incident_reported_to_MOL= isset($val_incident_cover['is_incident_reported_to_MOL']) ? $val_incident_cover['is_incident_reported_to_MOL'] : '';
										$datetime_incident_reported_to_MOL		= isset($val_incident_cover['datetime_incident_reported_to_MOL']) ? $val_incident_cover['datetime_incident_reported_to_MOL'] : '';
										$st_incident_reported_to_MOL			= isset($val_incident_cover['st_incident_reported_to_MOL']) ? $val_incident_cover['st_incident_reported_to_MOL'] : '';
										$st_name_MOL_officer_incident_attended	= isset($val_incident_cover['st_name_MOL_officer_incident_attended']) ? $val_incident_cover['st_name_MOL_officer_incident_attended'] : '';
										$st_contact_MOL_officer_incident_attended	= isset($val_incident_cover['st_contact_MOL_officer_incident_attended']) ? $val_incident_cover['st_contact_MOL_officer_incident_attended'] : '';
										$is_witness_to_incident		= (isset($val_incident_cover['is_witness_to_incident'])&&$val_incident_cover['is_witness_to_incident']=="1") ? "YES" : 'NO';
									}
								}
								?>
								<div class="row-fluid">
								  <div class="span5">
									<label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Date & Time of the Incident</label>
								  </div>
								  <div class="span7">
									<input id="txt_datetime_incident" value="<?php echo $datetime_incident;?>" <?php echo $disabled;?> name="txt_datetime_incident" type="text" placeholder="yy-mm-dd --:--" class="required selectpicker form-large-select span10 datestamp"/>
								  </div>
								</div>
								<div class="row-fluid">
								  <div class="span5">
									<label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Date & Time Incident was Reported to Management</label>
								  </div>
								  <div class="span7">
									<input id="txt_datetime_incident_reported" value="<?php echo $datetime_incident_reported;?>" <?php echo $disabled;?> name="txt_datetime_incident_reported" type="text" placeholder="yy-mm-dd --:--" class="required selectpicker form-large-select span10 datestamp"/>
								  </div>
								</div>
								<div class="row-fluid">
								  <div class="span5">
									<label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Who was it Reported to</label>
								  </div>
								  <div class="span7">
									<input type="text" name="txt_incident_reported_to" value="<?php echo $st_incident_reported_to;?>" <?php echo $disabled;?> class="required selectpicker form-large-select span10 container-width"  placeholder="Full Name"/>
								  </div>
								</div>
								<div class="row-fluid">
								  <div class="span5">
									<label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Address Incident Took Place</label>
								  </div>
								  <div class="span7">
									<input type="text" name="txt_incident_address" value="<?php echo $st_incident_address;?>" <?php echo $disabled;?> class="required selectpicker form-large-select span10 container-width"  placeholder="Street, City, Intersection"/>
								  </div>
								</div>
								<div class="row-fluid">
								  <div class="span5">
									<label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Project Name</label>
								  </div>
								  <div class="span7">
									<input type="text" name="txt_project" value="<?php echo $st_project;?>" <?php echo $disabled;?> class="required selectpicker form-large-select span10 container-width"  placeholder="N/A"/>
								  </div>
								</div>
								<div class="row-fluid">
								  <div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Exact Area</label></div>
								  <div class="span7">
									<input type="text" name="txt_project_area" value="<?php echo $st_project_area;?>" <?php echo $disabled;?> class="required selectpicker form-large-select span10 container-width"  placeholder="Location on the Project"/>
								  </div>
								</div>
								<div class="row-fluid">
								  <div class="span5">
									<label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Project Supervisor In Charge</label>
								  </div>
								  <div class="span7">
									<input type="text" name="txt_incident_supervisor" value="<?php echo $st_project_supervisor;?>" <?php echo $disabled;?> class="required selectpicker form-large-select span10 container-width"  placeholder="Full Name - Phone #"/>
								  </div>
								</div>
								<div class="row-fluid">
								  <div class="span5">
									<label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Weather</label>
								  </div>
								  <div class="span7">
									<input type="text" name="txt_weather" value="<?php echo $st_weather;?>" <?php echo $disabled;?> class="required selectpicker form-large-select span10 container-width"  placeholder="Wind Speed, Temperature, Sunny/Cloudy/Rainy"/>
								  </div>
								</div>
								<div class="row-fluid">
								  <div class="span5">
									<label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Is the incident reportable to the MOL</label>
								  </div>
								  <div class="span7 pull-right">
									<input type="radio" class="required selectpicker form-large-select span10" <?php echo ("1"==$is_incident_reported_to_MOL)?'checked':'';?> <?php echo $disabled;?> name="is_incident_reported_to_MOL" id="is_incident_reported_to_MOL" <?php echo $disabled;?> value="1"/> Yes
									<input type="radio" class="required selectpicker form-large-select span10" <?php echo ("0"==$is_incident_reported_to_MOL)?'checked':'';?> <?php echo $disabled;?> name="is_incident_reported_to_MOL" id="is_incident_reported_to_MOL" <?php echo $disabled;?> value="0"/> No
									
									<span><input type="text" name="txt_datetime_incident_reported_to_MOL" id="txt_datetime_incident_reported_to_MOL" value="<?php echo $datetime_incident_reported_to_MOL;?>" <?php echo $disabled;?> class="selectpicker form-large-select span10 datestamp"  placeholder="yy-mm-dd --:--"/></span>

									<span><input type="text" name="txt_incident_reported_to_MOL" id="txt_incident_reported_to_MOL" value="<?php echo $st_incident_reported_to_MOL;?>" <?php echo $disabled;?> class="selectpicker form-large-select span10 container-width" placeholder="Who Reported"/></span>
								  </div>
								</div>
								<div class="row-fluid">
								  <div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white"></i>MOL Officer that attended to the incident</label></div>
								  <div class="span7 pull-right">
									<span>
										<input type="text" name="txt_name_MOL_officer_incident_attended" id="txt_name_MOL_officer_incident_attended" value="<?php echo $st_name_MOL_officer_incident_attended;?>" <?php echo $disabled;?> class="dep_field selectpicker form-large-select span12 container-width"  placeholder="Name"/>
									</span>
									<span>
										<input type="text" name="txt_contact_MOL_officer_incident_attended" id="txt_contact_MOL_officer_incident_attended" value="<?php echo $st_contact_MOL_officer_incident_attended;?>" <?php echo $disabled;?> class="dep_field selectpicker form-large-select span12 container-width" title="Called in Immediately, Faxed In Writing, Phoned in within allowed time" placeholder="Called in Immediately, Faxed In Writing, Phoned in within allowed time"/>
									</span>
								  </div>
								</div>
								<div class="row-fluid">
								  <div class="span5">
									<label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Were There AnyWitnesses to the Occurrence</label>
								  </div>
								  <div class="span7">
									<input type="text" name="txt_witness_to_incident" value="<?php echo $is_witness_to_incident;?>" <?php echo $disabled;?> class="required selectpicker form-large-select span10 container-width" placeholder="YES/NO"/>
								  </div>
								</div>
								<?php 
								$arr_validation_investigation_cover[] = '"1":"is_incident_reported_to_MOL", 
																"dependent1":{"1":"txt_datetime_incident_reported_to_MOL", 
																			"2":"txt_incident_reported_to_MOL", 
																			"3":"txt_name_MOL_officer_incident_attended",
																			"4":"txt_contact_MOL_officer_incident_attended"}'; 
								$arr_validation_investigation_cover = isset($arr_validation_investigation_cover)&&is_array($arr_validation_investigation_cover) ? implode(",",$arr_validation_investigation_cover) : '';
								?>
								<div id="validation_investigation_cover" style="display:none;"><?php echo $arr_validation_investigation_cover;?></div>
							</form>
						</div>
					</div>
					<?php 
					if( "" == $disabled ) {?>
						<div class="row-fluid">
							<a id="btn_save_inv_cover" onclick="javascript:saveInvestigator('investigation_cover', 'frm_inv_cover', 'acc-1', 'id_inv_cover');" class="btn btn-warning pull-right">SAVE</a>
						</div>
					<?php 
					}?>
				</div>
			<!--------END COVER-------->

			
			
			<!--------START  TYPE OF INCIDENTS-------->
				<button  href="#acc-2" id="id_incident_types" data-toggle="collapse" class="btn collapse-btn collapsed">
					<div class="row-fluid">
						<div class="span8 item-title">
							<h4 class="collapse-basic">Types of Incidents</h4>
						</div>						
					</div>
				</button>
				<div id="acc-2" class="module-inner collapse">				
					<div class="row-fluid collapse-inner">
						<div class="span8 pull-left">
						<form class="form-large" id="frm_incident_types" name="frm_incident_types">
							<?php 
							$st_incident_types = array();
							$st_incident_description = $in_no_of_injured_workers = $st_incident_details = $st_other_incident_details = '';
							$where 					= "in_investigation_id='".$inv_form_id."'";
							$rows_incident_details 	= $this->users->getMetaDataList('inv_incident_details',$where,'','*');
							$arr_inv_pdf['incident_details'] = isset($rows_incident_details) ? $rows_incident_details : array();
							$sizeof_incident_details= sizeof($rows_incident_details);

							if( isset($rows_incident_details) && $sizeof_incident_details ) {
								foreach( $rows_incident_details AS $key_incident_details => $val_incident_details ) {
									$st_incident_description 	= isset($val_incident_details['st_incident_description']) ? $val_incident_details['st_incident_description'] : '';
									$in_no_of_injured_workers 	= isset($val_incident_details['in_no_of_injured_workers']) ? $val_incident_details['in_no_of_injured_workers'] : '';

									$st_incident_types 			= isset($val_incident_details['st_incident_types']) ? $val_incident_details['st_incident_types'] : '';
									$st_incident_types			= json_decode($st_incident_types);
									if( !is_array($st_incident_types) ) {
										$st_incident_types = array($st_incident_types);
									}
									$st_incident_details		= isset($val_incident_details['st_incident_details']) ? $val_incident_details['st_incident_details'] : '';
									$st_other_incident_details	= isset($val_incident_details['st_other_incident_details']) ? $val_incident_details['st_other_incident_details'] : '';
								}
							}
							?>
							   <div class="row-fluid">
								  <div class="span10"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Near Miss</label></div>
								  <div class="span2 required">
									<input type="checkbox" name="chk_incident_types[]" value="Near Miss" <?php echo in_array("Near Miss",$st_incident_types)?'checked':'';?> <?php echo $disabled;?> class="required selectpicker form-large-select span10" placeholder=""/>
								  </div>
							   </div>
							   <div class="row-fluid">
								  <div class="span10"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>First Aid</label></div>
								  <div class="span2 required">
								  <input type="checkbox" name="chk_incident_types[]" <?php echo in_array("First Aid",$st_incident_types)?'checked':'';?> <?php echo $disabled;?> value="First Aid" class="required selectpicker form-large-select span10"  placeholder=""/>
								  </div>
							   </div>
							   <div class="row-fluid">
								  <div class="span10"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Injury Requiring Medical Attention</label></div>
								  <div class="span2 required">
								  <input type="checkbox" name="chk_incident_types[]" <?php echo in_array("Injury Requiring Medical Attention",$st_incident_types)?'checked':'';?> <?php echo $disabled;?> value="Injury Requiring Medical Attention" class="required selectpicker form-large-select span10"  placeholder=""/>
								  </div>
							   </div>
							   <div class="row-fluid">
								  <div class="span10"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Material & Equipment Involved</label></div>
								  <div class="span2 required">
								  <input type="checkbox" name="chk_incident_types[]" <?php echo in_array("Material & Equipment Involved",$st_incident_types)?'checked':'';?> <?php echo $disabled;?> value="Material & Equipment Involved" class="required selectpicker form-large-select span10"  placeholder=""/>
								  </div>
							   </div>
							   <div class="row-fluid">
								  <div class="span10"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Environment Incident</label></div>
								  <div class="span2 required">
								  <input type="checkbox" name="chk_incident_types[]" <?php echo in_array("Environment Incident",$st_incident_types)?'checked':'';?> <?php echo $disabled;?> value="Environment Incident" class="required selectpicker form-large-select span10" placeholder=""/>
								  </div>
							   </div>
							   <div class="row-fluid">
								  <div class="span10"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Work Refusal</label>
								  </div>
								  <div class="span2 required">
								  <input type="checkbox" name="chk_incident_types[]" <?php echo in_array("Work Refusal",$st_incident_types)?'checked':'';?> <?php echo $disabled;?> value="Work Refusal" class="required selectpicker form-large-select span10"  placeholder=""/>
								  </div>
							   </div>
							   <div class="row-fluid">
								  <div class="span10"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Vehicle Accident</label></div>
								  <div class="span2 required">
								  <input type="checkbox" name="chk_incident_types[]" <?php echo in_array("Vehicle Accident",$st_incident_types)?'checked':'';?> <?php echo $disabled;?> value="Vehicle Accident" class="required selectpicker form-large-select span10"  placeholder=""/>
								  </div>
							   </div>
							   <div class="row-fluid">
								  <div class="span10"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Fatality</label></div>
								  <div class="span2 required">
								  <input type="checkbox" name="chk_incident_types[]" <?php echo in_array("Fatality",$st_incident_types)?'checked':'';?> <?php echo $disabled;?> value="Fatality" class="required selectpicker form-large-select span10"  placeholder=""/>
								  </div>
							   </div>
							   <div class="row-fluid">
								  <div class="span10"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Other</label></div>
								  <div class="span2 required">
									<input type="checkbox" name="chk_incident_types[]" <?php echo in_array("Other",$st_incident_types)?'checked':'';?> <?php echo $disabled;?> value="Other" class="required selectpicker form-large-select span10"  placeholder=""/>
								  </div>
							   </div>
						</form>
						</div>
					</div>
					<?php 
					if( "" == $disabled ) {?>
					<div class="row-fluid">
						<a id="btn_save_incident_types" onclick="javascript:saveInvestigator('incident_types', 'frm_incident_types', 'acc-2', 'id_incident_types');" class="btn btn-warning pull-right">SAVE</a>
					</div>
					<?php
					}?>
				</div>
			<!--------END TYPE OF INCIDENTS-------->
			
			

			<!--------START  DETAILED DESCRIPTION OF THE INCIDENT-------->
				<button  href="#acc-3" id="id_incident_detaildesc" data-toggle="collapse" class="btn collapse-btn collapsed">
					<div class="row-fluid">
						<div class="span8 item-title">
							<h4 class="collapse-basic">Detailed Description of the Incident</h4>
						</div>
					</div>
				</button>
				<div id="acc-3" class="module-inner collapse">				
					<div class="row-fluid collapse-inner">
						<div class="span12 pull-left">
						<?php 
						$rows_incident_workers = $this->users->getMetaDataList('inv_injured_worker_details', "in_investigation_id='".$inv_form_id."'", '', 'id, st_worker_fullname, st_worker_employer_name');
						$arr_inv_pdf['incident_workers'] = isset($rows_incident_workers) ? $rows_incident_workers : array();

						$sizeof_incident_workers	= sizeof($rows_incident_workers);
						$in_no_of_injured_workers 	= ($sizeof_incident_workers>0) ? $sizeof_incident_workers : $in_no_of_injured_workers;
						?>
							<form class="form-large" id="frm_incident_detaildesc" name="frm_incident_detaildesc">
							   <div class="row-fluid">
								  <div class="span6">
									<label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Write a detailed description of what happened including but not limited to: tasks and work activities that were in progress at the time of the incident, any tools, equipment or materials involved, causes of the incident (if known), Workers related to the incident (how were they related)</label>
								  </div>
								  <div class="span6">
									<textarea name="txt_incident_detaildesc" <?php echo $disabled;?> class="required selectpicker form-large-select container-width span10" rows="9" placeholder="Write a detailed description of what happened"/><?php echo $st_incident_description;?></textarea>
								  </div>
							  </div>
							  <div class="row-fluid">
								  <div class="span6"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Numbers of Injured Workers</label></div>
								  <div class="span6">
									<input type="text" name="txt_no_of_workers" id="txt_no_of_workers" value="<?php echo $in_no_of_injured_workers;?>" <?php echo $disabled;?> class="required selectpicker form-large-select container-width span10"  placeholder=""/>
								  </div>
							  </div>
							<div class="row-fluid" id="id_incident_worker_bucket">
							<?php 
							if( isset($rows_incident_workers) && $sizeof_incident_workers ) 
							{
								$cnt_workers = 1;
								foreach( $rows_incident_workers AS $key_workers_details => $val_workers_details ) 
								{
									$id_worker				= isset($val_workers_details['id'])?$val_workers_details['id']:'';
									$st_worker_fullname 	= isset($val_workers_details['st_worker_fullname'])?$val_workers_details['st_worker_fullname']:'';
									$st_worker_employer_name= isset($val_workers_details['st_worker_employer_name'])?$val_workers_details['st_worker_employer_name']:'';
									?>
									<div class="row-fluid cls_incident_workers" id="id_div_incident_workers<?php echo $cnt_workers;?>">
										<div class="row-fluid">
											<div class="span6"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Worker #<?php echo $cnt_workers;?>) Full Name</label></div>
											<div class="span6">
												<input type="text" name="txt_worker_fullname[<?php echo $id_worker;?>]" <?php echo $disabled;?>  value="<?php echo $st_worker_fullname;?>" id="txt_worker_fullname<?php echo $cnt_workers;?>" class="required selectpicker form-large-select container-width span10"  placeholder="Full Name"/>
											</div>
										</div>
										<div class="row-fluid">
											<div class="span6"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Worker #<?php echo $cnt_workers;?>) Employer</label></div>
											<div class="span6">
												<input type="text" name="txt_worker_employer[<?php echo $id_worker;?>]" <?php echo $disabled;?> value="<?php echo $st_worker_employer_name;?>" id="txt_worker_employer<?php echo $cnt_workers;?>" class="required selectpicker form-large-select container-width span10" placeholder="Employer"/>
											</div>
										</div>
									</div>
									<?php 
									$cnt_workers++;
								}
							}
							?>
							</div>
							<?php 
							if( "" == $disabled ) {?>
								<div class="row-fluid">
									<a id="btn_add_incident_workers" class="btn btn-warning fr" onclick="addMoreIncidentWorkers();">Add Worker</a>
									<button type="button" class="btn fr btn_incident_workers" onclick="javascript:deleteInvestigationSection('incident_workers', '<?php echo $sizeof_incident_workers;?>');">Delete</button>
								</div>
							<?php
							}?>
							</form>
						</div>
					</div>
					<?php 
					if( "" == $disabled ) {?>
						<div class="row-fluid">
							<a id="btn_save_incident_types" onclick="javascript:saveInvestigator('incident_detaildesc', 'frm_incident_detaildesc', 'acc-3', 'id_incident_detaildesc', 'id_incident_worker_bucket');" class="btn btn-warning pull-right">SAVE</a>
						</div>
					<?php
					}?>
				</div>
			<!--------END DETAILED DESCRIPTION OF THE INCIDENT-------->



			<!--------START INCIDENT DETAILS-------->
				<button  href="#acc-4" id="id_incident_details" data-toggle="collapse" class="btn collapse-btn collapsed">
					<div class="row-fluid">
						<div class="span8 item-title">
							<h4 class="collapse-basic">Incident Details</h4>
						</div>
					</div>
				</button>
				<div id="acc-4" class="module-inner collapse">				
					<div class="row-fluid collapse-inner">
						<div class="span8 pull-left">
							<form class="form-large" id="frm_incident_details" name="frm_incident_details" >
							   <div class="row-fluid">
								  <div class="span10"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Struck By Object</label></div>
								  <div class="span2 required">
								  <input type="radio" name="rdb_incident_details" value="Struck By Object" <?php echo ("Struck By Object"==$st_incident_details)?'checked':'';?> <?php echo $disabled;?> class="required selectpicker form-large-select span10" placeholder=""/>
								  </div>
							   </div>
							   <div class="row-fluid">
								  <div class="span10"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Crushed By Object</label></div>
								  <div class="span2 required">
								  <input type="radio" name="rdb_incident_details" value="Crushed By Object" <?php echo ("Crushed By Object"==$st_incident_details)?'checked':'';?> <?php echo $disabled;?> class="required selectpicker form-large-select span10"  placeholder=""/>
								  </div>
							   </div>
							   <div class="row-fluid">
								  <div class="span10"><label class="btn-warning clearfix"><i class="pull-right sprite-white"></i>Occurring Over Time / Repetition</label></div>
								  <div class="span2 required">
								  <input type="radio" name="rdb_incident_details" value="Occurring Over Time / Repetition" <?php echo ("Occurring Over Time / Repetition"==$st_incident_details)?'checked':'';?> <?php echo $disabled;?> class="required selectpicker form-large-select span10"  placeholder=""/>
								  </div>
							   </div>
							   <div class="row-fluid">
								  <div class="span10"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Overexertion (Lifting, Pushing, Pulling, etc.,)</label></div>
								  <div class="span2 required">
								  <input type="radio" name="rdb_incident_details" <?php echo ("Overexertion (Lifting, Pushing, Pulling, etc.,)"==$st_incident_details)?'checked':'';?> <?php echo $disabled;?> value="Overexertion (Lifting, Pushing, Pulling, etc.,)" class="required selectpicker form-large-select span10"  placeholder=""/>
								  </div>
							   </div>
							   <div class="row-fluid">
								  <div class="span10"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Exposure to Harmful Substance / Chemical Spill</label></div>
								  <div class="span2 required">
								  <input type="radio" name="rdb_incident_details" <?php echo ("Exposure to Harmful Substance / Chemical Spill"==$st_incident_details)?'checked':'';?> <?php echo $disabled;?> value="Exposure to Harmful Substance / Chemical Spill" class="required selectpicker form-large-select span10"  placeholder=""/>
								  </div>
							   </div>
							   <div class="row-fluid">
								  <div class="span10"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Vehicle Accident Equipment Damage</label></div>
								  <div class="span2 required">
								  <input type="radio" name="rdb_incident_details" <?php echo ("Vehicle Accident Equipment Damage"==$st_incident_details)?'checked':'';?> <?php echo $disabled;?> value="Vehicle Accident  Equipment Damage" class="required selectpicker form-large-select span10"  placeholder=""/>
								  </div>
							   </div>
							   <div class="row-fluid">
								  <div class="span10"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Fall From Height</label></div>
								  <div class="span2 required">
								  <input type="radio" name="rdb_incident_details" <?php echo ("Fall From Height"==$st_incident_details)?'checked':'';?> <?php echo $disabled;?> value="Fall From Height" class="required selectpicker form-large-select span10"  placeholder=""/>
								  </div>
								</div>
								<div class="row-fluid">
								  <div class="span10"><label class="btn-warning clearfix"><i class="pull-right sprite-white"></i>Slip / Trip / Fall From Same Level</label></div>
								  <div class="span2 required">
								  <input type="radio" name="rdb_incident_details" <?php echo ("Slip / Trip / Fall From Same Level"==$st_incident_details)?'checked':'';?> <?php echo $disabled;?> value="Slip / Trip / Fall From Same Level" class="required selectpicker form-large-select span10"  placeholder=""/>
								  </div>
								</div>
							   <div class="row-fluid">
								  <div class="span10"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Fire / Explosion</label></div>
								  <div class="span2 required">
								  <input type="radio" name="rdb_incident_details" <?php echo ("Fire / Explosion"==$st_incident_details)?'checked':'';?> <?php echo $disabled;?> value="Fire / Explosion" class="required selectpicker form-large-select span10"  placeholder=""/>
								  </div>
							   </div>
							   <div class="row-fluid">
								  <div class="span10"><label class="btn-warning clearfix"><i class="pull-right sprite-white"></i>Extreme Cold / Heat exposure</label></div>
								  <div class="span2 required">
								  <input type="radio" name="rdb_incident_details" <?php echo ("Extreme Cold / Heat exposure"==$st_incident_details)?'checked':'';?> <?php echo $disabled;?> value="Extreme Cold / Heat exposure" class="required selectpicker form-large-select span10"  placeholder=""/>
								  </div>
							   </div>
							   <div class="row-fluid">
								  <div class="span10">
									<label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Eletrocution</label>
								  </div>
								  <div class="span2 required">
								  <input type="radio" name="rdb_incident_details" <?php echo ("Eletrocution"==$st_incident_details)?'checked':'';?> <?php echo $disabled;?> value="Eletrocution" class="required selectpicker form-large-select span10"  placeholder=""/>
								  </div>
							   </div>
							   <div class="row-fluid">
								  <div class="span10">
									<label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Occupational Illness</label>
								  </div>
								  <div class="span2 required">
								  <input type="radio" name="rdb_incident_details" <?php echo ("Occupational Illness"==$st_incident_details)?'checked':'';?> <?php echo $disabled;?> value="Occupational Illness" class="required selectpicker form-large-select span10"  placeholder=""/>
								  </div>
							
							   </div>
							   <div class="row-fluid">
								  <div class="span10">
									<label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Eye</label>
								  </div>
								  <div class="span2 required">
								  <input type="radio" name="rdb_incident_details" <?php echo ("Eye"==$st_incident_details)?'checked':'';?> <?php echo $disabled;?> value="Eye" class="required selectpicker form-large-select span10"  placeholder=""/>
								  </div>
							   </div>
							   <div class="row-fluid">
								  <div class="span10">
									<label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Property Damage</label>
								  </div>
								  <div class="span2 required">
								  <input type="radio" name="rdb_incident_details" <?php echo ("Property Damage"==$st_incident_details)?'checked':'';?> <?php echo $disabled;?> value="Property Damage" class="required selectpicker form-large-select span10"  placeholder=""/>
								  </div>
							   </div>
							   <div class="row-fluid">
								  <div class="span10">
									<label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Violence And/Or Harassment</label>
								  </div>
								  <div class="span2 required">
								  <input type="radio" name="rdb_incident_details" <?php echo ("Violence And/Or Harassment"==$st_incident_details)?'checked':'';?> <?php echo $disabled;?> value="Violence And/Or Harassment" class="required selectpicker form-large-select span10"  placeholder=""/>
								  </div>
							   </div>
							   <div class="row-fluid">
								  <div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Other(explain)</label></div>
								  <div class="span7">
								  <input type="text" name="txt_incident_details" value="<?php echo $st_other_incident_details;?>" <?php echo $disabled;?> class="selectpicker form-large-select span10 container-width"  placeholder="explain"/>
								  </div>
							   </div>
							</form>																
						</div>
					</div>
					<?php 
					if( "" == $disabled ) {?>
					<div class="row-fluid">
						<a id="btn_save_incident_details" onclick="javascript:saveInvestigator('incident_details', 'frm_incident_details', 'acc-4', 'id_incident_details');" class="btn btn-warning pull-right">SAVE</a>
					</div>
					<?php
					}?>
				</div>
			<!--------END INCIDENT DETAILS-------->

			
			
			
			<!--------START FIRST AID-------->
				<button  href="#acc-5" id="id_inv_firstaid" data-toggle="collapse" class="btn collapse-btn collapsed">
					<div class="row-fluid">
						<div class="span8 item-title">
							<h4 class="collapse-basic">First Aid</h4>
						</div>
					</div>
				</button>
				<div id="acc-5" class="module-inner collapse">				
					<div class="row-fluid collapse-inner">
						<div class="span12 pull-left">
							<form class="form-large" name="frm_inv_firstaid" id="frm_inv_firstaid">
								<?php 
								$st_fullname = $st_job_title = $st_employer_name = $st_employement_type = $st_first_aid_received = '';
								$where 				= "in_investigation_id='".$inv_form_id."'";
								$rows_first_aid 	= $this->users->getMetaDataList('inv_firstaid',$where,'','*');
								$arr_inv_pdf['first_aid'] = isset($rows_first_aid) ? $rows_first_aid : array();
								$sizeof_first_aid 	= sizeof($rows_first_aid);

								if( isset($rows_first_aid) && $sizeof_first_aid ) 
								{
									foreach( $rows_first_aid AS $key_first_aid => $val_first_aid ) 
									{?>
										<?php 
										$st_fullname 			= isset($val_first_aid['st_fullname']) ? $val_first_aid['st_fullname'] : '';
										$st_job_title 			= isset($val_first_aid['st_job_title']) ? $val_first_aid['st_job_title'] : '';
										$st_employer_name 		= isset($val_first_aid['st_employer_name']) ? $val_first_aid['st_employer_name'] : '';
										$st_employement_type	= isset($val_first_aid['st_employement_type']) ? $val_first_aid['st_employement_type'] : '';
										$st_first_aid_received	= isset($val_first_aid['st_first_aid_received']) ? $val_first_aid['st_first_aid_received'] : '';
									}
								}?>
								<div class="row-fluid">
								  <div class="span4">
									<label class="btn-warning clearfix"><i class="required pull-right sprite-white "></i>Full Name</label>
								  </div>
								  <div class="span8">
								  <input type="text" name="txt_fullname" value="<?php echo $st_fullname;?>" <?php echo $disabled;?> class="required selectpicker form-large-select span10 container-width" placeholder=""/>
								  </div>
								</div>
								<div class="row-fluid">
								  <div class="span4">
									<label class="btn-warning clearfix"><i class="required pull-right sprite-white "></i>Job Title</label>
								  </div>
								  <div class="span8">
									<input type="text" name="txt_job_title" value="<?php echo $st_job_title;?>" <?php echo $disabled;?> class="required selectpicker form-large-select span10 container-width"  placeholder=""/>
								  </div>
								</div>
								<div class="row-fluid">
								  <div class="span4">
									<label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Employer Name</label>
								  </div>
								  <div class="span8">
									<input type="text" name="txt_employer_name" value="<?php echo $st_employer_name;?>" <?php echo $disabled;?> class="required selectpicker form-large-select span10 container-width"  placeholder=""/>
								  </div>
								</div>

								<div class="row-fluid">
								  <div class="span4">
									<label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Employment Type</label>
								  </div>
								  <div class="span8 required" >
									<input type="radio" name="rdb_employement_type" <?php echo ("Full"==$st_employement_type)?'checked':'';?> <?php echo $disabled;?> class="required" value="Full" /> Full
									<input type="radio" name="rdb_employement_type" <?php echo ("Part Time"==$st_employement_type)?'checked':'';?> <?php echo $disabled;?> class="required" value="Part Time" /> Part Time
									<input type="radio" name="rdb_employement_type" <?php echo ("Apprentice"==$st_employement_type)?'checked':'';?> <?php echo $disabled;?> class="required" value="Apprentice" /> Apprentice
									<input type="radio" name="rdb_employement_type" <?php echo ("Student"==$st_employement_type)?'checked':'';?> <?php echo $disabled;?> class="required" value="Student" /> Student
								  </div>
								</div>
								<div class="row-fluid">
								  <div class="span4">
									<label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>First Aid Received</label>
								  </div>
								  <div class="span8">
									<input type="text" name="txt_first_aid_received" value="<?php echo $st_first_aid_received;?>" <?php echo $disabled;?> class="required selectpicker form-large-select span10 container-width"  placeholder=""/>
								  </div>
								</div>
							</form>
						</div>
					</div>
					<?php 
					if( "" == $disabled ) {?>
					<div class="row-fluid">
						<a id="btn_save_investigator" onclick="javascript:saveInvestigator('inv_first_aid', 'frm_inv_firstaid', 'acc-5', 'id_inv_firstaid');" class="btn btn-warning pull-right">SAVE</a>
					</div>
					<?php
					}?>
				</div>
			<!--------END FIRST AID-------->
			
			
			
			<!--------START INJURY REPORT-------->
				<button  href="#acc-6" id="id_div_injury_report" data-toggle="collapse" class="btn collapse-btn collapsed">
					<div class="row-fluid">
						<div class="span8 item-title">
							<h4 class="collapse-basic">Injury Report</h4>
						</div>
					</div>
				</button>
				<div id="acc-6" class="module-inner collapse" id="id_injury_report">
					<div class="row-fluid collapse-inner">
						<div class="span12 pull-left">
							<?php $cntInjuredWorkers = 1;?>
							<form class="form-large" id="frm_injury_report" name="frm_injury_report">
								<div class="row-fluid" id="id_injury_report_bucket">
									<?php 
									$where = "in_investigation_id='".$inv_form_id."'";
									$rows_injured_workers = $this->users->getMetaDataList('inv_injured_worker_details',$where,'','*');
									$arr_inv_pdf['injured_workers'] = isset($rows_injured_workers) ? $rows_injured_workers : array();
									$sizeof_inj_workers = sizeof($rows_injured_workers);

									if( isset($rows_injured_workers) && $sizeof_inj_workers ) 
									{
										$arr_validation = array();
										$pInjuredWorkers = 0;
										foreach( $rows_injured_workers AS $key_injured_workers => $val_injured_workers ) 
										{
											$id_injured_worker 			= isset($val_injured_workers['id']) ? $val_injured_workers['id'] : '';
											$st_worker_fullname 		= isset($val_injured_workers['st_worker_fullname']) ? $val_injured_workers['st_worker_fullname'] : '';
											$st_worker_employer_name 	= isset($val_injured_workers['st_worker_employer_name']) ? $val_injured_workers['st_worker_employer_name'] : '';
											$st_address 				= isset($val_injured_workers['st_address']) ? $val_injured_workers['st_address'] : '';
											$st_phone_number 			= isset($val_injured_workers['st_phone_number']) ? $val_injured_workers['st_phone_number'] : '';
											$st_job_title 				= isset($val_injured_workers['st_job_title']) ? $val_injured_workers['st_job_title'] : '';
											$st_position_time_experience= isset($val_injured_workers['st_position_time_experience']) ? $val_injured_workers['st_position_time_experience'] : '';
											$dt_dob 					= isset($val_injured_workers['dt_dob']) ? $val_injured_workers['dt_dob'] : '';
											$st_preferred_language 		= isset($val_injured_workers['st_preferred_language']) ? $val_injured_workers['st_preferred_language'] : '';
											$st_other_preferred_language= isset($val_injured_workers['st_other_preferred_language']) ? $val_injured_workers['st_other_preferred_language'] : '';
											$st_sex 					= isset($val_injured_workers['st_sex']) ? $val_injured_workers['st_sex'] : '';
											$is_worker_unionized 		= isset($val_injured_workers['is_worker_unionized']) ? $val_injured_workers['is_worker_unionized'] : '';
											$st_worker_union_name 		= isset($val_injured_workers['st_worker_union_name']) ? $val_injured_workers['st_worker_union_name'] : '';
											$st_employeement_type 		= isset($val_injured_workers['st_employeement_type']) ? $val_injured_workers['st_employeement_type'] : '';
											$is_firstaid_provided 		= isset($val_injured_workers['is_firstaid_provided']) ? $val_injured_workers['is_firstaid_provided'] : '';
											$st_firstaid_provided_by 	= isset($val_injured_workers['st_firstaid_provided_by']) ? $val_injured_workers['st_firstaid_provided_by'] : '';
											$is_healthcare_professional = isset($val_injured_workers['is_healthcare_professional']) ? $val_injured_workers['is_healthcare_professional'] : '';
											$dt_healthcare_received_date= isset($val_injured_workers['dt_healthcare_received_date']) ? $val_injured_workers['dt_healthcare_received_date'] : '';
											$dt_management_learn_worker_received_healthcare = isset($val_injured_workers['dt_management_learn_worker_received_healthcare']) ? $val_injured_workers['dt_management_learn_worker_received_healthcare'] : '';
											$st_name_position_worker_reported_to 			= isset($val_injured_workers['st_name_position_worker_reported_to']) ? $val_injured_workers['st_name_position_worker_reported_to'] : '';
											$st_place_of_worker_treatment 					= isset($val_injured_workers['st_place_of_worker_treatment']) ? $val_injured_workers['st_place_of_worker_treatment'] : '';
											$st_facility_name_address_phone_worker_treated 	= isset($val_injured_workers['st_facility_name_address_phone_worker_treated']) ? $val_injured_workers['st_facility_name_address_phone_worker_treated'] : '';
											$st_name_phone_transported_by_for_medical_aid 	= isset($val_injured_workers['st_name_phone_transported_by_for_medical_aid']) ? $val_injured_workers['st_name_phone_transported_by_for_medical_aid'] : '';											
											$is_worker_fit_for_work 			= isset($val_injured_workers['is_worker_fit_for_work']) ? $val_injured_workers['is_worker_fit_for_work'] : '';
											$st_worker_status 					= isset($val_injured_workers['st_worker_status']) ? $val_injured_workers['st_worker_status'] : '';
											$in_days_worker_away_due_to_incident= isset($val_injured_workers['in_days_worker_away_due_to_incident']) ? $val_injured_workers['in_days_worker_away_due_to_incident'] : '';

											$st_body_part_injured_type_with_name= $val_injured_workers['st_body_part_injured_type_with_name'];
											$st_body_part_injured_type_with_name= json_decode($st_body_part_injured_type_with_name);
											
											$arr_bodyparts_injured = $arr_type_bodyparts_injured = array();
											if( $st_body_part_injured_type_with_name ) {
												$arr_bodyparts_injured 		= $st_body_part_injured_type_with_name->body_parts_injured;
												$arr_type_bodyparts_injured = $st_body_part_injured_type_with_name->type_body_parts_injured;
											}
									
											$st_injury_brief_description 		= isset($val_injured_workers['st_injury_brief_description']) ? $val_injured_workers['st_injury_brief_description'] : '';
											?>
											<div class="row-fluid cls_injury_report" id="id_div_injury_report<?php echo $cntInjuredWorkers;?>">
												<div class="row-fluid"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Injured Worker #<?php echo $cntInjuredWorkers;?></label></div>
												<div class="row-fluid">
													<div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Full Name</label></div>
													<div class="span7">
														<input type="text" name="txt_worker_fullname[<?php echo $id_injured_worker;?>]" <?php echo $disabled;?> id="txt_worker_fullname<?php echo $cntInjuredWorkers;?>" value="<?php echo $st_worker_fullname;?>"  class="required selectpicker form-large-select span10 container-width"  placeholder=""/>
													</div>
												</div>
												<div class="row-fluid">
													<div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Employer</label></div>
													<div class="span7">
														<input type="text" name="txt_worker_employer_name[<?php echo $id_injured_worker;?>]" <?php echo $disabled;?> id="txt_worker_employer_name<?php echo $cntInjuredWorkers;?>" value="<?php echo $st_worker_employer_name;?>"  class="required selectpicker form-large-select span10 container-width"  placeholder=""/>
													</div>
												</div>
												<div class="row-fluid">
													<div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Address</label></div>
													<div class="span7">
														<input type="text" name="txt_address[<?php echo $id_injured_worker;?>]" <?php echo $disabled;?> id="txt_address<?php echo $cntInjuredWorkers;?>" value="<?php echo $st_address;?>"  class="required selectpicker form-large-select span10 container-width"  placeholder=""/>
													</div>
												</div>
												<div class="row-fluid">
													<div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Phone Number</label></div>
													<div class="span7">
														<input type="text" name="txt_phone_number[<?php echo $id_injured_worker;?>]" <?php echo $disabled;?> id="txt_phone_number<?php echo $cntInjuredWorkers;?>" value="<?php echo $st_phone_number;?>"  class="required selectpicker form-large-select span10 container-width" placeholder=""/>
													</div>
												</div>
												<div class="row-fluid">
													<div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Job Title</label></div>
													<div class="span7">
														<input type="text" name="txt_job_title[<?php echo $id_injured_worker;?>]" <?php echo $disabled;?> id="txt_job_title<?php echo $cntInjuredWorkers;?>" value="<?php echo $st_job_title;?>"  class="required selectpicker form-large-select span10 container-width"  placeholder=""/>
													</div>
												</div>
												<div class="row-fluid">
													<div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Time and experience at this position</label></div>
													<div class="span7">
														<input type="text" name="txt_position_time_experience[<?php echo $id_injured_worker;?>]" <?php echo $disabled;?> id="txt_position_time_experience<?php echo $cntInjuredWorkers;?>" value="<?php echo $st_position_time_experience;?>"  class="required selectpicker form-large-select span10 container-width"  placeholder=""/>
													</div>
												</div>
												<div class="row-fluid">
													<div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Date of Birth</label></div>
												  <div class="span7">
													<input type="text" name="txt_dob[<?php echo $id_injured_worker;?>]" <?php echo $disabled;?> id="txt_dob<?php echo $cntInjuredWorkers;?>" value="<?php echo $dt_dob;?>" class="required selectpicker form-large-select span10 datestamp"  placeholder="yy-mm-dd"/>
												  </div>
												</div>
												<div class="row-fluid">
													<div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Preferred Language</label></div>
													<div class="span7">
													<!-- Text input-->
														<?php $languages = $this->users->getMetaDataList('language');?>
														<select name="cmb_preferred_language[<?php echo $id_injured_worker;?>]" <?php echo $disabled;?> id="cmb_preferred_language<?php echo $cntInjuredWorkers;?>" name="language" placeholder="Select Language" class="input-xlarge" required>
															<option value="">-select-</option>
															<?php 
															foreach($languages AS $in) {
																$selected = (strtolower($st_preferred_language)==strtolower($in['language']))?'selected="selected"':'';
																?>
																<option value="<?php echo $in['language'];?>" <?php echo $selected;?>><?php echo $in['language'];?></option>
																<?php 
															}
															$selected = ("other"==$st_preferred_language) ? "selected=selected" : "";
															?>
															<option value="other" <?php echo $selected;?>>Other</option>
														</select>
														<script type="text/javascript">
															$("#cmb_preferred_language<?php echo $cntInjuredWorkers;?>").change(function() {
																$sel_preferred_lang = $(this).val();
																if( "other" == $sel_preferred_lang ) {
																	$("#txt_preferred_language<?php echo $cntInjuredWorkers;?>").show();
																}
																else if( "other" != $sel_preferred_lang ) {
																	$("#txt_preferred_language<?php echo $cntInjuredWorkers;?>").hide();
																	$("#txt_preferred_language<?php echo $cntInjuredWorkers;?>").val("");
																}
															});
														</script>
														<?php 
														if( "other" == $st_preferred_language ) {?>
															<input type="text" name="txt_preferred_language[<?php echo $id_injured_worker;?>]" <?php echo $disabled;?> id="txt_preferred_language<?php echo $cntInjuredWorkers;?>" value="<?php echo $st_other_preferred_language;?>" class="selectpicker form-large-select span10 container-width" placeholder="Other"/>
															<?php
														}
														else {?>
															<input style="display:none;" type="text" name="txt_preferred_language[<?php echo $id_injured_worker;?>]" <?php echo $disabled;?> id="txt_preferred_language<?php echo $cntInjuredWorkers;?>" value="" class="selectpicker form-large-select span10 container-width" placeholder="Other"/>
														<?php 
														}?>
													</div>
												</div>
												<div class="row-fluid">
													<div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Sex</label></div>
													<div class="span7 required">
														<input type="radio" name="rdb_sex[<?php echo $id_injured_worker;?>]" <?php echo $disabled;?> <?php echo ("Male"==$st_sex)?'checked':'';?> <?php echo $disabled;?> class="required" value="Male"/>  Male
														<input type="radio" name="rdb_sex[<?php echo $id_injured_worker;?>]" <?php echo $disabled;?> <?php echo ("Female"==$st_sex)?'checked':'';?> <?php echo $disabled;?> class="required" value="Female"/>  Female                        
													</div>
												</div>
												<div class="row-fluid">
													<div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Is Worker Unionized</label></div>
													<div class="span7 required">
														<input type="radio" class="required" <?php echo ("1"==$is_worker_unionized)?'checked':'';?> <?php echo $disabled;?> name="rdb_worker_unionized[<?php echo $id_injured_worker;?>]" id="rdb_worker_unionized<?php echo $cntInjuredWorkers;?>" <?php echo $disabled;?> value="1"/>  Yes
														<input type="radio" class="required" <?php echo ("0"==$is_worker_unionized)?'checked':'';?> <?php echo $disabled;?> name="rdb_worker_unionized[<?php echo $id_injured_worker;?>]" id="rdb_worker_unionized<?php echo $cntInjuredWorkers;?>" <?php echo $disabled;?> value="0"/>  No 
														<input type="text" name="txt_worker_union_name[<?php echo $id_injured_worker;?>]" <?php echo $disabled;?> value="<?php echo $st_worker_union_name;?>" id="txt_worker_union_name<?php echo $cntInjuredWorkers;?>" class="selectpicker form-large-select span10 container-width"  placeholder="If yes please state Union Name"/>
													</div>
												</div>
												<div class="row-fluid">
													<div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Employment Type</label></div>
													<div class="span7 required">
														<input type="radio" class="required" <?php echo ("Full"==$st_employeement_type)?'checked':'';?> <?php echo $disabled;?> name="rdb_employeement_type[<?php echo $id_injured_worker;?>]" <?php echo $disabled;?> value="Full" /> Full
														<input type="radio" class="required" <?php echo ("Part Time"==$st_employeement_type)?'checked':'';?> <?php echo $disabled;?> name="rdb_employeement_type[<?php echo $id_injured_worker;?>]" <?php echo $disabled;?> value="Part Time"/> Part Time
														<input type="radio" class="required" <?php echo ("Apprentice"==$st_employeement_type)?'checked':'';?> <?php echo $disabled;?> name="rdb_employeement_type[<?php echo $id_injured_worker;?>]" <?php echo $disabled;?> value="Apprentice"/> Apprentice
														<input type="radio" class="required" <?php echo ("Student"==$st_employeement_type)?'checked':'';?> <?php echo $disabled;?> name="rdb_employeement_type[<?php echo $id_injured_worker;?>]" <?php echo $disabled;?> value="Student"/> Student
														<input type="radio" class="required" <?php echo ("Volunteer"==$st_employeement_type)?'checked':'';?> <?php echo $disabled;?> name="rdb_employeement_type[<?php echo $id_injured_worker;?>]" <?php echo $disabled;?> value="Volunteer" /> Volunteer
													</div>
												</div>
												<div class="row-fluid">
													<div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Was First Aid Provided</label></div>
													<div class="span7 required">
														<input type="radio" class="required" <?php echo ("1"==$is_firstaid_provided)?'checked':'';?> <?php echo $disabled;?> name="rdb_firstaid_provided[<?php echo $id_injured_worker;?>]" id="rdb_firstaid_provided<?php echo $cntInjuredWorkers;?>" <?php echo $disabled;?> value="1"/>  Yes
														<input type="radio" class="required" <?php echo ("0"==$is_firstaid_provided)?'checked':'';?> <?php echo $disabled;?> name="rdb_firstaid_provided[<?php echo $id_injured_worker;?>]" id="rdb_firstaid_provided<?php echo $cntInjuredWorkers;?>" <?php echo $disabled;?> value="0"/>  No
														<input type="text" name="txt_firstaid_provided_by[<?php echo $id_injured_worker;?>]" <?php echo $disabled;?> id="txt_firstaid_provided_by<?php echo $cntInjuredWorkers;?>" value="<?php echo $st_firstaid_provided_by;?>"  class="selectpicker form-large-select span10 container-width"  placeholder="If yes, by who?"/>
													</div>
												</div>
												<div class="row-fluid">
													<div class="span7"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Did the Worker see a health care professional regarding this injury?</label></div>
													<div class="span5 required">
														<input type="radio" class="required" <?php echo ("1"==$is_healthcare_professional)?'checked':'';?> <?php echo $disabled;?> name="rdb_healthcare_professional[<?php echo $id_injured_worker;?>]" id="rdb_healthcare_professional<?php echo $cntInjuredWorkers;?>" <?php echo $disabled;?> value="1"/>  Yes
														<input type="radio" class="required" <?php echo ("0"==$is_healthcare_professional)?'checked':'';?> <?php echo $disabled;?> name="rdb_healthcare_professional[<?php echo $id_injured_worker;?>]" id="rdb_healthcare_professional<?php echo $cntInjuredWorkers;?>" <?php echo $disabled;?> value="0"/>  No
												  </div>
												</div>
												<div class="row-fluid">
													<div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Date Worker received health care?</label></div>
													<div class="span7 required">
														<input type="text" name="txt_healthcare_received_date[<?php echo $id_injured_worker;?>]" <?php echo $disabled;?> id="txt_healthcare_received_date<?php echo $cntInjuredWorkers;?>" value="<?php echo $dt_healthcare_received_date;?>"  class="selectpicker form-large-select span10 datestamp"  placeholder="yy-mm-dd --:--"/>
													</div>
												</div>
												<div class="row-fluid">
													<div class="span12"><label class="btn-warning clearfix"><i class="pull-right sprite-white"></i>When did site management learn that the worker received health care?</label></div>
													<div class="span5 required">
														<input type="text" name="txt_management_learn_worker_received_healthcare[<?php echo $id_injured_worker;?>]" <?php echo $disabled;?> id="txt_management_learn_worker_received_healthcare<?php echo $cntInjuredWorkers;?>" value="<?php echo $dt_management_learn_worker_received_healthcare;?>"  class="selectpicker form-large-select span10 datestamp" placeholder="yy-mm-dd --:--"/>
													</div>
													<div class="span6 required">
														<input type="text" name="txt_name_position_worker_reported_to[<?php echo $id_injured_worker;?>]" <?php echo $disabled;?> id="txt_name_position_worker_reported_to<?php echo $cntInjuredWorkers;?>" value="<?php echo $st_name_position_worker_reported_to;?>" class="selectpicker form-large-select span10 container-width" placeholder="Name & Position of person it was reported to"/>
													</div>
												</div>
												<div class="row-fluid">
													<div class="span12">
														<label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Where did the worker get treatment for his/her injuries?</label>
													</div>
													<div class="span11 required">
														<input type="radio" class="required" <?php echo ("Health Professional Office"==$st_place_of_worker_treatment)?'checked':'';?> <?php echo $disabled;?> name="rdb_place_of_worker_treatment[<?php echo $id_injured_worker;?>]" <?php echo $disabled;?> value="Health Professional Office" /> Health Professional Office
														<br><input type="radio" class="required" <?php echo ("Ambulance"==$st_place_of_worker_treatment)?'checked':'';?> <?php echo $disabled;?> name="rdb_place_of_worker_treatment[<?php echo $id_injured_worker;?>]" <?php echo $disabled;?> value="Ambulance" /> Ambulance
														<br><input type="radio" class="required" <?php echo ("Physiotherapy"==$st_place_of_worker_treatment)?'checked':'';?> <?php echo $disabled;?> name="rdb_place_of_worker_treatment[<?php echo $id_injured_worker;?>]" <?php echo $disabled;?> value="Physiotherapy" /> Physiotherapy
														<br><input type="radio" class="required" <?php echo ("Emergency Department"==$st_place_of_worker_treatment)?'checked':'';?> <?php echo $disabled;?> name="rdb_place_of_worker_treatment[<?php echo $id_injured_worker;?>]" <?php echo $disabled;?> value="Emergency Department" /> Emergency Department
														<br><input type="radio" class="required" <?php echo ("Walk In Clinic"==$st_place_of_worker_treatment)?'checked':'';?> <?php echo $disabled;?> name="rdb_place_of_worker_treatment[<?php echo $id_injured_worker;?>]" <?php echo $disabled;?> value="Walk In Clinic" /> Walk In Clinic
														<br><input type="radio" class="required" <?php echo ("Hospital"==$st_place_of_worker_treatment)?'checked':'';?> <?php echo $disabled;?> name="rdb_place_of_worker_treatment[<?php echo $id_injured_worker;?>]" <?php echo $disabled;?> value="Hospital" /> Hospital
													</div>
												</div>
												<div class="row-fluid">
													<div class="span12"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Provide the name, address & phone number of the facility where the worker was treated </label></div>
													<div class="span11 required">
														<input type="text" name="txt_facility_name_address_phone_worker_treated[<?php echo $id_injured_worker;?>]" <?php echo $disabled;?> id="txt_facility_name_address_phone_worker_treated<?php echo $cntInjuredWorkers;?>" value="<?php echo $st_facility_name_address_phone_worker_treated;?>"  class="required selectpicker form-large-select span10 container-width"  placeholder="Provide the name, address & phone number of the facility where the worker was treated"/>
													</div>
												</div>
												<div class="row-fluid">
													<div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Who transported the worker to seek medical aid?</label></div>
													<div class="span7 required">
														<input type="text" name="txt_name_phone_transported_by_for_medical_aid[<?php echo $id_injured_worker;?>]" <?php echo $disabled;?> id="txt_name_phone_transported_by_for_medical_aid<?php echo $cntInjuredWorkers;?>" value="<?php echo $st_name_phone_transported_by_for_medical_aid;?>"  class="required selectpicker form-large-select span10 container-width" placeholder="Name & phone number"/>
													</div>
												</div>
												<div class="row-fluid">
													<div class="span7"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Is the worker fit for work?</label></div>
													<div class="span5 required">
														<input type="radio" class="required" <?php echo ("1"==$is_worker_fit_for_work)?'checked':'';?> <?php echo $disabled;?> name="rdb_worker_fit_for_work[<?php echo $id_injured_worker;?>]" id="rdb_worker_fit_for_work<?php echo $cntInjuredWorkers;?>" <?php echo $disabled;?> value="1"/>  Yes
														<input type="radio" class="required" <?php echo ("0"==$is_worker_fit_for_work)?'checked':'';?> <?php echo $disabled;?> name="rdb_worker_fit_for_work[<?php echo $id_injured_worker;?>]" id="rdb_worker_fit_for_work<?php echo $cntInjuredWorkers;?>" <?php echo $disabled;?> value="0"/>  No 
													</div>
												</div>
												<div class="row-fluid">
													<div class="span12"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Select the status of the worker</label></div>
													<div class="span11 required">
														<input type="radio" class="" <?php echo ("Worker will be returning to regular duties"==$st_worker_status)?'checked':'';?> <?php echo $disabled;?> name="rdb_worker_status[<?php echo $id_injured_worker;?>]" id="rdb_worker_status<?php echo $cntInjuredWorkers;?>" <?php echo $disabled;?> value="Worker will be returning to regular duties"/>  Worker will be returning to regular duties
														<br/><input type="radio" class="" <?php echo ("Worker will be returning to modified duties"==$st_worker_status)?'checked':'';?> <?php echo $disabled;?> name="rdb_worker_status[<?php echo $id_injured_worker;?>]" id="rdb_worker_status<?php echo $cntInjuredWorkers;?>" <?php echo $disabled;?> value="Worker will be returning to modified duties"/>  Worker will be returning to modified duties
														<br/><input type="radio" class="" <?php echo ("Worker will be unable to return to work"==$st_worker_status)?'checked':'';?> <?php echo $disabled;?> name="rdb_worker_status[<?php echo $id_injured_worker;?>]" id="rdb_worker_status<?php echo $cntInjuredWorkers;?>" <?php echo $disabled;?> value="Worker will be unable to return to work"/>  Worker will be unable to return to work
													</div>
												</div>
												<div class="row-fluid">
													<div class="span8"><label class="btn-warning clearfix"><i class="pull-right sprite-white"></i>How many days (if any) was the worker away from work due to this incident?</label></div>
													<div class="span4">
														<select name="txt_days_worker_away_due_to_incident[<?php echo $id_injured_worker;?>]" <?php echo $disabled;?> id="txt_days_worker_away_due_to_incident<?php echo $cntInjuredWorkers;?>" class="required">
															<option value="">-select-</option>
															<?php 
															for( $cnt_workerdueincident=1;$cnt_workerdueincident<=999;$cnt_workerdueincident++ ) {
																$selected = ($in_days_worker_away_due_to_incident==$cnt_workerdueincident) 
																				? 'selected="selected"' : '';?>
																<option value="<?php echo $cnt_workerdueincident;?>" <?php echo $selected;?>><?php echo $cnt_workerdueincident;?></option>
																<?php
															}
															?>
														</select>
													</div>
												</div>

												<div class="row-fluid">
													<div class="span12"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Select which parts of the workers body was injured according to the medical reports</label></div>
													<div class="row-fluid" id="id_injury_bodypart_bucket<?php echo $cntInjuredWorkers;?>">
														<div class="span12">
															<?php 
															$ret_injury_bodyparts = $this->users->getMetaDataList('inv_injury_bodyparts');
															$cnt_inj_bodyparts = 1;
															foreach( $arr_bodyparts_injured AS $val_body_parts ) {
																$type_bodypart = $arr_type_bodyparts_injured[$cnt_inj_bodyparts-1];
																?>
																<div class="row-fluid cls_injury_bodypart<?php echo $cntInjuredWorkers;?>" id="id_div_injury_bodypart<?php echo $cntInjuredWorkers.$cnt_inj_bodyparts;?>">
																	<select class="required" name="cmb_body_parts_injured[<?php echo $id_injured_worker;?>][]" id="cmb_body_parts_injured<?php echo $cntInjuredWorkers.$cnt_inj_bodyparts;?>">
																		<?php 
																		foreach( $ret_injury_bodyparts AS $key => $value ) {
																			$selected = '';
																			if( in_array($value['st_injury_bodypart'], $arr_bodyparts_injured) ) {
																				$selected = 'selected="selected"';
																			}
																			?><option value="<?php echo $val_body_parts;?>" <?php echo $selected;?>><?php echo $val_body_parts;?></option>
																			<?php 
																		}?>
																	</select>
																	<select class="required" name="cmb_type_body_parts_injured[<?php echo $id_injured_worker;?>][]" id="cmb_type_body_parts_injured<?php echo $cntInjuredWorkers.$cnt_inj_bodyparts;?>" >
																		 <option value="SPRAIN/STRAIN" <?php echo ("SPRAIN/STRAIN"==$type_bodypart)?'selected="selected"':'';?>>SPRAIN/STRAIN</option>
																		 <option value="CUT/SCRAP/BRUISE/ABRASION" <?php echo ("CUT/SCRAP/BRUISE/ABRASION"==$type_bodypart)?'selected="selected"':'';?>>CUT/SCRAP/BRUISE/ABRASION</option>
																		 <option value="FRACTURED BONE(S)" <?php echo ("FRACTURED BONE(S)"==$type_bodypart)?'selected="selected"':'';?>>FRACTURED BONE(S)</option>
																		 <option value="PUNCTURE" <?php echo ("PUNCTURE"==$type_bodypart)?'selected="selected"':'';?>>PUNCTURE</option>
																		 <option value="DISLOCATION" <?php echo ("DISLOCATION"==$type_bodypart)?'selected="selected"':'';?>>DISLOCATION</option>
																		 <option value="BURN" <?php echo ("BURN"==$type_bodypart)?'selected="selected"':'';?>>BURN</option>
																		 <option value="AMPUTATION" <?php echo ("AMPUTATION"==$type_bodypart)?'selected="selected"':'';?>>AMPUTATION</option>
																		 <option value="LOSS OF CONCISENESS" <?php echo ("LOSS OF CONCISENESS"==$type_bodypart)?'selected="selected"':'';?>>LOSS OF CONCISENESS</option>
																	</select>
																</div>
																<?php 
																$cnt_inj_bodyparts++;
															}?>
														</div>
													</div>
													<div class="fr">
														<?php 
														if( "" == $disabled ) {?>
															<a id="btn_add_injury_bodypart" onclick="addMoreInjuredBodyPart('<?php echo $cntInjuredWorkers;?>',1,<?php echo $id_injured_worker;?>, '2');" class="btn btn-warning">Add Injured Body Part</a>
															<button type="button" onclick="deleteInvestigationSection('injury_bodypart<?php echo $cntInjuredWorkers;?>');" class="btn btn_injury_bodypart<?php echo $cntInjuredWorkers;?> pull-right">Delete</button>
														<?php
														}?>
													</div>
												</div>
												<script type="text/javascript">
													var sizeof_inj_bodyparts = "<?php echo sizeof($arr_bodyparts_injured);?>";
													//if( sizeof_inj_bodyparts > 0)
													{
														jQuery(window).load(function() {
															checkNoOfRowsExists('injury_bodypart<?php echo $cntInjuredWorkers;?>');
														});
													}
												</script>
												<div class="row-fluid">
													<div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Give a brief description of the injury:</label></div>
													<div class="span7">
														<input type="text" name="txt_injury_brief_description[<?php echo $id_injured_worker;?>]" <?php echo $disabled;?> value="<?php echo $st_injury_brief_description;?>"  id="txt_injury_brief_description<?php echo $cntInjuredWorkers;?>" class="required selectpicker form-large-select span10 container-width"  placeholder=""/>
													</div>
												</div>
											</div>
											
											
										<?php 
										$arr_validation_injury_report[] = '"'.($cntInjuredWorkers+$pInjuredWorkers).'":"rdb_healthcare_professional'.$cntInjuredWorkers.'", 
										"dependent'.($cntInjuredWorkers+$pInjuredWorkers).'":{"1":"txt_healthcare_received_date'.$cntInjuredWorkers.'", 
													"2":"txt_management_learn_worker_received_healthcare'.$cntInjuredWorkers.'", 
													"3":"txt_name_position_worker_reported_to'.$cntInjuredWorkers.'"}'; 
										$pInjuredWorkers++;
										$arr_validation_injury_report[] = '"'.($cntInjuredWorkers+$pInjuredWorkers).'":"rdb_worker_unionized'.$cntInjuredWorkers.'", 
										"dependent'.($cntInjuredWorkers+$pInjuredWorkers).'":{"1":"txt_worker_union_name'.$cntInjuredWorkers.'"}';
										$pInjuredWorkers++;
										$arr_validation_injury_report[] = '"'.($cntInjuredWorkers+$pInjuredWorkers).'":"rdb_firstaid_provided'.$cntInjuredWorkers.'", 
										"dependent'.($cntInjuredWorkers+$pInjuredWorkers).'":{"1":"txt_firstaid_provided_by'.$cntInjuredWorkers.'"}';
										$pInjuredWorkers++;
										$arr_validation_injury_report[] = '"'.($cntInjuredWorkers+$pInjuredWorkers).'":"rdb_worker_fit_for_work'.$cntInjuredWorkers.'", 
										"dependent'.($cntInjuredWorkers+$pInjuredWorkers).'":{"1":"rdb_worker_status'.$cntInjuredWorkers.'"}';

										$cntInjuredWorkers++;
										}
									}
									else {
										$pInjuredWorkers = 0;
									}
									?>
									<input type="hidden" name="hidn_pInjuredWorkers" id="hidn_pInjuredWorkers" value="<?php echo $pInjuredWorkers;?>">
								</div>
								<?php 
								if( "" == $disabled ) {?>
									<div class="row-fluid">
										<div class="span12">
											<a id="btn_add_injury_report" onclick="addMoreInjuredWorker();" class="btn btn-warning pull-right">Add Injured Worker</a>
											<button type="button" onclick="deleteInvestigationSection('injury_report', '<?php echo $sizeof_inj_workers;?>');" class="btn btn_injury_report pull-right">Delete</button>
										</div>
									</div>
								<?php
								}
								$arr_validation_injury_report = isset($arr_validation_injury_report)&&is_array($arr_validation_injury_report) ? implode(",",$arr_validation_injury_report) : '';
								?>
								<div id="validation_injury_report" style="display:none;"><?php echo $arr_validation_injury_report;?></div>
							</form>
						</div>
					</div>
					<?php 
					if( "" == $disabled ) {?>
						<div class="row-fluid">
							<div class="span12">
								<a id="btn_save_injury_report" onclick="javascript:saveInvestigator('injury_report', 'frm_injury_report', 'acc-6', 'id_div_injury_report', 'id_injury_report_bucket');" class="btn btn-warning pull-right">SAVE</a>
							</div>
						</div>
					<?php
					}?>
				</div>
			<!--------END INJURY REPORT-------->
			
			
			
			<!--------START WITNESS REPORT-------->
				<button  href="#acc-7" id="id_witness_report" data-toggle="collapse" class="btn collapse-btn collapsed">
					<div class="row-fluid"><div class="span8 item-title"><h4 class="collapse-basic">Witness Report(s)</h4></div></div>
				</button>
				<div id="acc-7" class="module-inner collapse">				
					<div class="row-fluid collapse-inner">
						<div class="span12 pull-left">
							<?php $cnt_witness_report = 1;?>
							<form class="form-large" id="frm_witness_report" name="frm_witness_report">
								<div class="row-fluid" id="id_witness_report_bucket">
									<?php 
									$st_witness_more_notes = '';
									$where = "in_investigation_id='".$inv_form_id."'";
									$rows_witness_report = $this->users->getMetaDataList('inv_witness_report',$where,'','*');
									$arr_inv_pdf['witness_report'] = isset($rows_witness_report) ? $rows_witness_report : array();
									$sizeof_witness_report = sizeof($rows_witness_report);
									
									if( $sizeof_witness_report > 0 ) {
										// $disabled = "disabled";
									}
									else if( "EDIT" == $inv_scope ) {
										$disabled = "";
									}

									if( isset($rows_witness_report) && $sizeof_witness_report )  {
										foreach( $rows_witness_report AS $key_witness_report => $val_witness_report ) 
										{
											$cnt_quesans=1;

											$id_witness_report 		= isset($val_witness_report['id']) ? $val_witness_report['id'] : '';
											$st_witness_fullname 	= isset($val_witness_report['st_witness_fullname']) ? $val_witness_report['st_witness_fullname'] : '';
											$st_address 			= isset($val_witness_report['st_address']) ? $val_witness_report['st_address'] : '';
											$st_phone_number 		= isset($val_witness_report['st_phone_number']) ? $val_witness_report['st_phone_number'] : '';
											$st_employer_name 		= isset($val_witness_report['st_employer_name']) ? $val_witness_report['st_employer_name'] : '';
											$st_interviewer_name 	= isset($val_witness_report['st_interviewer_name']) ? $val_witness_report['st_interviewer_name'] : '';
											$st_witness_statement 	= isset($val_witness_report['st_witness_statement']) ? $val_witness_report['st_witness_statement'] : '';
											$st_witness_more_notes 	= isset($val_witness_report['st_witness_more_notes']) ? $val_witness_report['st_witness_more_notes'] : '';
											?>
											<div class="row-fluid cls_witness_report" id="id_div_witness_report<?php echo $cnt_witness_report;?>">
												<div class="row-fluid">
													<div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Full Name</label></div>
													<div class="span7">
														<input type="text" name="txt_witness_fullname[<?php echo $id_witness_report;?>]" value="<?php echo $st_witness_fullname;?>" <?php echo $disabled;?> id="txt_witness_fullname<?php echo $cnt_witness_report;?>" class="required selectpicker form-large-select span10 container-width"  placeholder=""/>
													</div>
												</div>
												<div class="row-fluid">
													<div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Address</label></div>
													<div class="span7">
														<input type="text" name="txt_address[<?php echo $id_witness_report;?>]" value="<?php echo $st_address;?>" <?php echo $disabled;?> id="txt_address<?php echo $cnt_witness_report;?>" class="required selectpicker form-large-select span10 container-width"  placeholder=""/>
													</div>
												</div>
												<div class="row-fluid">
													<div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Phone Number</label></div>
													<div class="span7">
														<input type="text" name="txt_phone_number[<?php echo $id_witness_report;?>]" value="<?php echo $st_phone_number;?>" <?php echo $disabled;?> id="txt_phone_number<?php echo $cnt_witness_report;?>" class="required selectpicker form-large-select span10 container-width"  placeholder=""/>
													</div>
												</div>
												<div class="row-fluid">
													<div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Employers Name</label></div>
													<div class="span7">
														<input type="text" name="txt_employer_name[<?php echo $id_witness_report;?>]" value="<?php echo $st_employer_name;?>" <?php echo $disabled;?> id="txt_employer_name<?php echo $cnt_witness_report;?>" class="required selectpicker form-large-select span10 container-width"  placeholder=""/>
													</div>
												</div>
												<div class="row-fluid">
													<div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Interviewer's Name</label></div>
													<div class="span7">
														<input type="text" name="txt_interviewer_name[<?php echo $id_witness_report;?>]" value="<?php echo $st_interviewer_name;?>" <?php echo $disabled;?> id="txt_interviewer_name<?php echo $cnt_witness_report;?>" class="required selectpicker form-large-select span10 container-width"  placeholder=""/>
													</div>
												</div>
												<div class="row-fluid">
													<div class="span12"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Witness Statement</label></div>
													<div class="span12">
														<input type="text" name="txt_witness_statement[<?php echo $id_witness_report;?>]" value="<?php echo $st_witness_statement;?>" <?php echo $disabled;?> id="txt_witness_statement<?php echo $cnt_witness_report;?>" class="required selectpicker form-large-select container-width span10 container-width" placeholder="Describe in your own words the details including timings, what you saw and heard.  Please do not provide information that other workers spoke of regarding the details of what they seen or heard, only yours. Please list any workers you seen in the area that may have seen, heard, or contributed to the incident."/>
													</div>
												</div>
												
												<div class="row-fluid">
													<div class="span12"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Interviewers Questions</label></div>
												</div>
												<div class="row-fluid" id="id_witness_ques_bucket<?php echo $cnt_witness_report;?>">
													<?php 
													$where = "in_investigation_id='".$inv_form_id."' AND in_witness_id = '".$id_witness_report."'";
													$rows_quesans = $this->users->getMetaDataList('inv_witness_interviewer_questions_answers', $where, '', '*');
													$sizeof_quesans = sizeof($rows_quesans);
													if( isset($rows_quesans) && $sizeof_quesans )  {
														$cnt_quesans = 1;
														foreach( $rows_quesans AS $key_quesans => $val_quesans ) 
														{
															$id_quesans 	= isset($val_quesans['id']) ? $val_quesans['id'] : '';
															$st_question 	= isset($val_quesans['st_question']) ? $val_quesans['st_question'] : '';
															$st_answer 		= isset($val_quesans['st_answer']) ? $val_quesans['st_answer'] : '';
															?>
															<div class="row-fluid cls_witness_ques<?php echo $cnt_witness_report;?>" id="id_div_witness_ques<?php echo $cnt_witness_report.$cnt_quesans;?>">
																<div class="row-fluid">
																	<div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Question #<?php echo $cnt_quesans;?></label></div>
																	<div class="span7">
																		<input type="text" name="txt_question[<?php echo $id_witness_report;?>][<?php echo $id_quesans;?>]" id="txt_question<?php echo $cnt_witness_report.$cnt_quesans;?>" value="<?php echo $st_question;?>" <?php echo $disabled;?> class="required selectpicker form-large-select container-width span10"  placeholder=""/>
																	</div>
																</div>
																<div class="row-fluid">
																	<div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Answer #<?php echo $cnt_quesans;?></label></div>
																	<div class="span7">
																		<input type="text" name="txt_answer[<?php echo $id_witness_report;?>][<?php echo $id_quesans;?>]" value="<?php echo $st_answer;?>" <?php echo $disabled;?> id="txt_answer<?php echo $cnt_witness_report.$cnt_quesans;?>" class="required selectpicker form-large-select container-width span10"  placeholder=""/>
																	</div>
																</div>
															</div>
															<?php
															$cnt_quesans++;
														}
													}?>
												</div>
												<script type="text/javascript">
													var sizeof_quesans = "<?php echo $sizeof_quesans;?>";
													if( sizeof_quesans > 0) {
														jQuery(window).load(function() {
															checkNoOfRowsExists('witness_ques<?php echo $cnt_witness_report;?>');
														});
													}
													else {
														jQuery(window).load(function() {
															 addMoreWitnessQues('<?php echo $cnt_witness_report;?>','<?php echo $id_witness_report;?>','edit');
														});
													}
												</script>
												<?php 
												if( "" == $disabled ) {?>
													<div class="row-fluid">
														<div class="span12">
															<a id="btn_add_witness_ques" onclick="addMoreWitnessQues('<?php echo $cnt_witness_report;?>', '<?php echo $id_witness_report;?>', 'edit');" class="btn btn-warning pull-right">Add New Question</a>
															<button type="button" onclick="deleteInvestigationSection('witness_ques<?php echo $cnt_witness_report;?>', '<?php echo $sizeof_quesans;?>');" class="btn pull-right btn_witness_ques<?php echo $cnt_witness_report;?>">Delete</a>
														</div>
													</div>
												<?php
												}?>
											</div>
											<?php 
											$cnt_witness_report++;
										}
									}?>
								</div>
								<?php 
								if( "" == $disabled ) {?>
									<div class="row-fluid">
										<div class="span12">
											<a id="btn_add_witness" onclick="addMoreWitnessReport(1,<?php echo $sizeof_witness_report;?>);" class="btn btn-warning pull-right">Add New Witness</a>
											<button type="button" onclick="deleteInvestigationSection('witness_report', '<?php echo $sizeof_witness_report;?>');" class="btn pull-right btn_witness_report">Delete</a>
										</div>
									</div>
								<?php 
								}?>
								<div class="row-fluid">
									<div class="span12">
										<label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>This Section can not be edited but you can add more notes if needed in this box call "More Notes"</label>
									</div>
								</div>
								<div class="row-fluid">
									<div class="span12"><input type="text" <?php echo $disabled;?> name="txt_witness_more_notes" value="<?php echo $st_witness_more_notes;?>" id="txt_witness_more_notes1" class="selectpicker form-large-select container-width span10"  placeholder="More Notes:"/></div>
								</div>						
							</form>
						</div>
					</div>
					<?php 
					if( "" == $disabled ) {?>
					<div class="row-fluid">
						<div class="span12">
							<a id="btn_save_witness_report" onclick="javascript:saveInvestigator('witness_report', 'frm_witness_report', 'acc-7', 'id_witness_report', 'id_witness_report_bucket');" class="btn btn-warning pull-right">SAVE</a>
						</div>
					</div>
					<?php
					}?>
				</div>
			<?php
			if( $sizeof_witness_report > 0 && "EDIT" == $inv_scope ) {
				$disabled = "";
			}?>
			<!--------END WITNESS REPORT-------->
			

			<!--------START MATERIAL & EQUIPMENT INVOLVED OR DAMAGED-------->
				<button  href="#acc-8" id="id_material_involved_damaged" data-toggle="collapse" class="btn collapse-btn collapsed">
					<div class="row-fluid">
						<div class="span8 item-title">
							<h4 class="collapse-basic">Material & Equipment Involved or Damaged</h4>
						</div>
					</div>
				</button>
				<div id="acc-8" class="module-inner collapse">		
					<div class="row-fluid collapse-inner">
						<div class="span12 pull-left">
							<form class="form-large" method="post" name="frm_material_involved" id="frm_material_involved" action="" enctype="multipart/form-data">
								<div id="id_material_involved_bucket">
									<?php 
									$where = "in_investigation_id='".$inv_form_id."'";
									$rows_material_involved = $this->users->getMetaDataList('inv_material_involved_damaged',$where,'','*');
									$arr_inv_pdf['material_involved'] = isset($rows_material_involved) ? $rows_material_involved : array();
									$sizeof_material_involved = sizeof($rows_material_involved);

									if( isset($rows_material_involved) && $sizeof_material_involved )  {
										$cnt_material = 1;

										foreach( $rows_material_involved AS $key_material_involved => $val_material_involved ) 
										{
											$id_material_involved 		= isset($val_material_involved['id']) ? $val_material_involved['id'] : '';
											$st_brief_description 		= isset($val_material_involved['st_brief_description']) ? $val_material_involved['st_brief_description'] : '';
											$st_type 					= isset($val_material_involved['st_type']) ? $val_material_involved['st_type'] : '';
											$st_size 					= isset($val_material_involved['st_size']) ? $val_material_involved['st_size'] : '';
											$st_weight 					= isset($val_material_involved['st_weight']) ? $val_material_involved['st_weight'] : '';
											$st_make 					= isset($val_material_involved['st_make']) ? $val_material_involved['st_make'] : '';
											$st_model 					= isset($val_material_involved['st_model']) ? $val_material_involved['st_model'] : '';
											$st_serial 					= isset($val_material_involved['st_serial']) ? $val_material_involved['st_serial'] : '';
											$st_manufacturer 			= isset($val_material_involved['st_manufacturer']) ? $val_material_involved['st_manufacturer'] : '';
											$st_additional_specifications= isset($val_material_involved['st_additional_specifications']) ? $val_material_involved['st_additional_specifications'] : '';
											$in_estimated_damage_cost 	= isset($val_material_involved['in_estimated_damage_cost']) ? $val_material_involved['in_estimated_damage_cost'] : '';
											$st_picture_attached		= isset($val_material_involved['st_picture_attached']) ? $val_material_involved['st_picture_attached'] : '';
											?>
											<div id="id_div_material_involved<?php echo $cnt_material;?>" class="cls_material_involved">
												<div class="row-fluid">
													<div class="span12">
														List all materials involved or damaged in the occurrence. You should list all information about the material involved or damaged included but not limited to: Type, Size, Weight, Manufacturer, Make, Model, Serial, Estimated cost of damage, Pictures should be attached of each materials, equipment, tools, etc.. listed.
													</div>
												</div>
												<div class="row-fluid">
													<div class="span5">
														<label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Brief Description</label>
													</div>
													<div class="span7">
														<input type="text" name="txt_brief_description[<?php echo $id_material_involved;?>]" value="<?php echo $st_brief_description;?>" <?php echo $disabled;?> id="txt_brief_description<?php echo $cnt_material;?>" class="selectpicker form-large-select container-width span10"  placeholder=""/>
													</div>
												</div>
												<div class="row-fluid">
													<div class="span5">
														<label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Type</label>
													</div>
													<div class="span7">
														<input type="text" name="txt_type[<?php echo $id_material_involved;?>]" value="<?php echo $st_type;?>" <?php echo $disabled;?> id="txt_type<?php echo $cnt_material;?>" class="selectpicker form-large-select container-width span10"  placeholder=""/>
													</div>
												</div>
												<div class="row-fluid">
													<div class="span5">
														<label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Size</label>
													</div>
													<div class="span7">
														<input type="text" name="txt_size[<?php echo $id_material_involved;?>]" value="<?php echo $st_size;?>" <?php echo $disabled;?> id="txt_size<?php echo $cnt_material;?>" class="selectpicker form-large-select container-width span10"  placeholder=""/>
													</div>
												</div>
												<div class="row-fluid">
													<div class="span5">
														<label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Weight</label>
													</div>
													<div class="span7">
														<input type="text" name="txt_weight[<?php echo $id_material_involved;?>]" value="<?php echo $st_weight;?>" <?php echo $disabled;?> id="txt_weight<?php echo $cnt_material;?>" class="selectpicker form-large-select container-width span10"  placeholder=""/>
													</div>
												</div>
												<div class="row-fluid">
													<div class="span5">
														<label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Make</label>
													</div>
													<div class="span7">
														<input type="text" name="txt_make[<?php echo $id_material_involved;?>]" value="<?php echo $st_make;?>" <?php echo $disabled;?> id="txt_make<?php echo $cnt_material;?>" class="selectpicker form-large-select container-width span10"  placeholder=""/>
													</div>
												</div>
												<div class="row-fluid">
													<div class="span5">
														<label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Model</label>
													</div>
													<div class="span7">
														<input type="text" name="txt_model[<?php echo $id_material_involved;?>]" value="<?php echo $st_model;?>" <?php echo $disabled;?> id="txt_model<?php echo $cnt_material;?>" class="selectpicker form-large-select container-width span10"  placeholder=""/>
													</div>
												</div>
												<div class="row-fluid">
													<div class="span5">
														<label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Serial</label>
													</div>
													<div class="span7">
														<input type="text" name="txt_serial[<?php echo $id_material_involved;?>]" value="<?php echo $st_serial;?>" <?php echo $disabled;?> id="txt_serial<?php echo $cnt_material;?>" class="selectpicker form-large-select container-width span10"  placeholder=""/>
													</div>
												</div>
												<div class="row-fluid">
													<div class="span5">
														<label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Manufacturer</label>
													</div>
													<div class="span7">
														<input type="text" name="txt_manufacturer[<?php echo $id_material_involved;?>]" value="<?php echo $st_manufacturer;?>" <?php echo $disabled;?> id="txt_manufacturer<?php echo $cnt_material;?>" class="selectpicker form-large-select container-width span10"  placeholder=""/>
													</div>
												</div>
												<div class="row-fluid">
													<div class="span5">
														<label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Additional Specifications</label>
													</div>
													<div class="span7">
														<input type="text" name="txt_additional_specifications[<?php echo $id_material_involved;?>]" value="<?php echo $st_additional_specifications;?>" <?php echo $disabled;?> id="txt_additional_specifications<?php echo $cnt_material;?>" class="selectpicker form-large-select container-width span10"  placeholder=""/>
													</div>
												</div>
												<div class="row-fluid">
													<div class="span5">
														<label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Estimated Cost of damage</label>
													</div>
													<div class="span7">
														<input type="text" name="txt_estimated_damage_cost[<?php echo $id_material_involved;?>]" value="<?php echo $in_estimated_damage_cost;?>" <?php echo $disabled;?> id="txt_estimated_damage_cost<?php echo $cnt_material;?>" class="selectpicker form-large-select container-width span10"  placeholder=""/>
													</div>
												</div>
												
												<!-- START - Material photo upload -->
													<div class="upload_box_material<?php echo $cnt_material;?>">
														<div class="row-fluid">
															<div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Attach picture (Allowed file types: jpg, gif, png)</label></div>
															<div class="span7">
																<div class="file_browser_material<?php echo $cnt_material;?>">
																<input type="file" id="file_material_photoes<?php echo $cnt_material;?>" <?php echo $disabled;?> name="userfile[<?php echo $id_material_involved;?>]" class="hide_broswe_material<?php echo $cnt_material;?>" />(Max 2MB)
																<span id="err_file_material_photoes<?php echo $cnt_material;?>"></span>
																<?php 
																if( file_exists(FCPATH.$this->path_upload_material_involved.$st_picture_attached) && $st_picture_attached ) { ?>
																	<a title="Click to see full picture" class="fancybox-media" href="<?php echo $base.$this->path_upload_material_involved.$st_picture_attached;?>" data-fancybox-group="gallery">
																		<img class="w45 h40" src="<?php echo $base.$this->path_upload_material_involved.$st_picture_attached;?>">
																	</a>
																<?php
																}?>
																</div>
															</div>
														</div>
													</div>
												<!-- END - Material photo upload -->
											</div>
											<?php 
											$cnt_material++;
										}
									}
									?>
								</div>
								<input type="hidden" id="investigation_id" name="investigationId" value="<?php echo $inv_form_id;?>">
								<input type="hidden" id="hidn_section_name" name="sectionName" value="material_involved">
								<input type="hidden" id="hidn_form_id" name="formId" value="">
								<input type="hidden" id="hidn_id_div_collapse" name="idDivCollapse" value="acc-8">
								<input type="hidden" id="hidn_id_data_toggle" name="idDataToggle" value="id_material_involved_damaged">
								<input type="hidden" id="hidn_id_div_bucket" name="idDivBucket" value="id_material_involved_bucket">

								<?php 
								if( "" == $disabled ) {?>
								<div class="row-fluid">
									<button type="submit" onclick="javascript:submitInvestigation('frm_material_involved');" id="btn_save_material_involved_damaged" class="btn btn-warning pull-right">SAVE</button>
									<a id="btn_addnew_material_involved" onclick="addMoreMaterialInvolved();" class="btn btn-warning pull-right">Add New</a>
									<button type="button" onclick="deleteInvestigationSection('material_involved', '<?php echo $sizeof_material_involved;?>');" class="btn pull-right btn_material_involved">Delete</button>
								</div>
								<?php
								}?>
							</form>
							<script type="text/javascript">
								$('#btn_save_material_involved_damaged').click(function(e){
									var is_error = 0;
									var img_matephotos = '';
									var valid_invphotos_ext = ['jpeg', 'jpg', 'png', 'gif', 'bmp'];
									$("#id_material_involved_bucket").find('input[type=file]').each(function() {
										img_matephotos = $(this).attr("id");
										id_img_matephotos = $("#"+img_matephotos);
										if( id_img_matephotos.val()!='' && ($.inArray(id_img_matephotos.val().split('.').pop().toLowerCase(), valid_invphotos_ext) == -1) ) {
											$('#err_'+img_matephotos).html("<br>\nOnly (jpeg, jpg, png, gif, bmp) formats are allowed.");
											$('#err_'+img_matephotos).addClass("text-error");
											is_error++;
										}
										else {
											$('#err_'+img_matephotos).html("");
										}
									});
									if( is_error > 0 ) { e.preventDefault(); }
								});
							</script>
						</div>
					</div>
					
				</div>
			<!--------END MATERIAL & EQUIPMENT INVOLVED OR DAMAGED-------->

			
			
			<!--------START ENVIRONMENT INCIDENT-------->
				<button  href="#acc-9" id="id_env_incident" data-toggle="collapse" class="btn collapse-btn collapsed">
					<div class="row-fluid">
						<div class="span8 item-title">
							<h4 class="collapse-basic">Environment Incident</h4>
						</div>
					</div>
				</button>
				<div id="acc-9" class="module-inner collapse">				
					<div class="row-fluid collapse-inner">
						<div class="span12 pull-left">
							<form class="form-large" id="frm_env_incident" name="frm_env_incident">
								<?php 
								$st_name_substance_spilled = $st_amount_substance_spilled = $is_other_environment_consultant_contacted = $is_ministry_environment_notified = $st_description_environmental_impacts = '';
								$where 				= "in_investigation_id='".$inv_form_id."'";
								$rows_env_incident 	= $this->users->getMetaDataList('inv_environment_incident',$where,'','*');
								$arr_inv_pdf['env_incident'] = isset($rows_env_incident) ? $rows_env_incident : array();
								$sizeof_env_incident 	= sizeof($rows_env_incident);

								if( isset($rows_env_incident) && $sizeof_env_incident ) 
								{
									foreach( $rows_env_incident AS $key_env_incident => $val_env_incident ) 
									{?>
										<?php 
										$st_name_substance_spilled 			= isset($val_env_incident['st_name_substance_spilled']) ? $val_env_incident['st_name_substance_spilled'] : '';
										$st_amount_substance_spilled 			= isset($val_env_incident['st_amount_substance_spilled']) ? $val_env_incident['st_amount_substance_spilled'] : '';
										$is_other_environment_consultant_contacted 		= isset($val_env_incident['is_other_environment_consultant_contacted']) ? $val_env_incident['is_other_environment_consultant_contacted'] : '';
										$is_ministry_environment_notified	= isset($val_env_incident['is_ministry_environment_notified']) ? $val_env_incident['is_ministry_environment_notified'] : '';
										$st_description_environmental_impacts	= isset($val_env_incident['st_description_environmental_impacts']) ? $val_env_incident['st_description_environmental_impacts'] : '';
									}
								}?>
								<div class="row-fluid">
								  <div class="span5">
									<label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Name of the Substance that was spilled or released</label>
								  </div>
								  <div class="span7">
								  <input type="text" name="txt_name_substance_spilled" value="<?php echo $st_name_substance_spilled;?>" <?php echo $disabled;?> class="selectpicker form-large-select container-width span10"  placeholder=""/>
								  </div>
								</div>
								<div class="row-fluid">
								  <div class="span12">
									<label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>What was the amount of the substance that was spilled or released (Volume can be estimated but must be as accurate as posible)</label>
								  </div>
								</div>
								<div class="row-fluid">
								  <div class="span12">
									<input type="text" name="txt_amount_substance_spilled" value="<?php echo $st_amount_substance_spilled;?>" <?php echo $disabled;?> class="selectpicker form-large-select container-width span10"  placeholder="Appropriate Units: cubic meters, gallons, litres, etc.."/>
								  </div>
								</div>
								<div class="row-fluid">
								  <div class="span7">
									<label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Was a third party environment consultants contacted</label>
								  </div>
								  <div class="span5">
									<input type="radio" <?php echo $disabled;?> name="rdb_other_environment_consultant_contacted" <?php echo ($is_other_environment_consultant_contacted=='1') ? "checked" : "";?> value="1"/>  Yes
									<input type="radio" <?php echo $disabled;?> name="rdb_other_environment_consultant_contacted" <?php echo ($is_other_environment_consultant_contacted=='0') ? "checked" : "";?> value="0"/>  No
								  </div>
								</div>
								<div class="row-fluid">
								  <div class="span7">
									<label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Was the Ministry of Environment notified of the incident</label>
								  </div>
								  <div class="span5">
									<input type="radio" <?php echo $disabled;?> name="rdb_ministry_environment_notified" <?php echo ($is_ministry_environment_notified=='1') ? "checked" : "";?> value="1"/>  Yes
									<input type="radio" <?php echo $disabled;?> name="rdb_ministry_environment_notified" <?php echo ($is_ministry_environment_notified=='0') ? "checked" : "";?> value="0"/>  No
								  </div>
								</div>
								<div class="row-fluid">
								  <div class="span12">
									<label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>As a result of the incident provide a description and list ll the environmental impacts</label>
								  </div>
								</div>
								<div class="row-fluid">
								  <div class="span12">
									<input type="text" name="txt_description_environmental_impacts" value="<?php echo $st_description_environmental_impacts;?>" <?php echo $disabled;?> class="selectpicker form-large-select span10 container-width"  placeholder=""/>
								  </div>
								</div>
							</form>
						</div>
					</div>
					<?php 
					if( "" == $disabled ) {?>
					<div class="row-fluid">
						<a id="btn_save_env_incident" onclick="javascript:saveInvestigator('environment_incident', 'frm_env_incident', 'acc-9', 'id_env_incident');" class="btn btn-warning pull-right">SAVE</a>
					</div>
					<?php
					}?>
				</div>
			<!--------END ENVIRONMENT INCIDENT-------->
			
			
			
			<!--------START VEHICLE ACCIDENT-------->
				<button href="#acc-10" id="id_vehicle_accident" data-toggle="collapse" class="btn collapse-btn collapsed">
					<div class="row-fluid">
						<div class="span8 item-title">
							<h4 class="collapse-basic">Vehicle Accident</h4>
						</div>
					</div>
				</button>
				<div id="acc-10" class="module-inner collapse">				
					<div class="row-fluid collapse-inner">
						<div class="span12 pull-left">
							<form class="form-large" id="frm_vehicle_accident" name="frm_vehicle_accident">
								<div class="row-fluid" id="id_vehicle_accident_bucket">
									<?php 
									$where = "in_investigation_id='".$inv_form_id."'";
									$rows_vehicle = $this->users->getMetaDataList('inv_vehicle_accident_details',$where,'','*');
									$arr_inv_pdf['vehicle'] = isset($rows_vehicle) ? $rows_vehicle : array();
									$sizeof_vehicle = sizeof($rows_vehicle);
								
									if( isset($rows_vehicle) && $sizeof_vehicle ) {
										$cnt_vehicle = 1;
										foreach( $rows_vehicle AS $key_vehicle => $val_vehicle ) 
										{
											$id_vehicle 			= isset($val_vehicle['id']) ? $val_vehicle['id'] : '';
											$in_vehicle_accident_id = isset($val_vehicle['in_vehicle_accident_id']) ? $val_vehicle['in_vehicle_accident_id'] : '';
											$st_driver_name 		= isset($val_vehicle['st_driver_name']) ? $val_vehicle['st_driver_name'] : '';
											$st_driver_license_number = isset($val_vehicle['st_driver_license_number']) ? $val_vehicle['st_driver_license_number'] : '';
											$st_vehicle_owner 		= isset($val_vehicle['st_vehicle_owner']) ? $val_vehicle['st_vehicle_owner'] : '';
											$st_insurance_information = isset($val_vehicle['st_insurance_information']) ? $val_vehicle['st_insurance_information'] : '';
											$st_vehicle_make = isset($val_vehicle['st_vehicle_make']) ? $val_vehicle['st_vehicle_make'] : '';
											$st_vehicle_model = isset($val_vehicle['st_vehicle_model']) ? $val_vehicle['st_vehicle_model'] : '';
											$st_vehicle_year = isset($val_vehicle['st_vehicle_year']) ? $val_vehicle['st_vehicle_year'] : '';
											$st_vehicle_type = isset($val_vehicle['st_vehicle_type']) ? $val_vehicle['st_vehicle_type'] : '';
											$st_vehicle_color = isset($val_vehicle['st_vehicle_color']) ? $val_vehicle['st_vehicle_color'] : '';
											$st_vehicle_license_plate = isset($val_vehicle['st_vehicle_license_plate']) ? $val_vehicle['st_vehicle_license_plate'] : '';
											$in_no_of_passengers = isset($val_vehicle['in_no_of_passengers']) ? $val_vehicle['in_no_of_passengers'] : '';
											$is_seat_belts_warns = isset($val_vehicle['is_seat_belts_warns']) ? $val_vehicle['is_seat_belts_warns'] : '';
											?>
											<div class="row-fluid cls_vehicle_accident" id="id_div_vehicle_accident<?php echo $cnt_vehicle;?>">
												<div class="row-fluid"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Vehicle #<?php echo $cnt_vehicle;?></label></div>
												<div class="row-fluid">
													<div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Driver's Name</label></div>
													<div class="span7">
														<input type="text" name="txt_driver_name[<?php echo $id_vehicle;?>]" value="<?php echo $st_driver_name;?>" <?php echo $disabled;?> "txt_driver_name<?php echo $cnt_vehicle;?>" class="selectpicker form-large-select span10 container-width" placeholder=""/>
													</div>
												</div>
												<div class="row-fluid">
													<div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Driver's License Number</label></div>
													<div class="span7">
														<input type="text" name="txt_driver_license_number[<?php echo $id_vehicle;?>]" id="txt_driver_license_number<?php echo $cnt_vehicle;?>" value="<?php echo $st_driver_license_number;?>" <?php echo $disabled;?> class="selectpicker form-large-select span10 container-width"  placeholder=""/>
													</div>
												</div>
												<div class="row-fluid">
													<div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Owner of the vehicle</label></div>
													<div class="span7">
														<input type="text" name="txt_vehicle_owner[<?php echo $id_vehicle;?>]" value="<?php echo $st_vehicle_owner;?>" <?php echo $disabled;?> id="txt_vehicle_owner<?php echo $cnt_vehicle;?>" class="selectpicker form-large-select span10 container-width" placeholder=""/>
													</div>
												</div>
												<div class="row-fluid">
													<div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Insurance Information</label></div>
													<div class="span7">
														<input type="text" name="txt_insurance_information[<?php echo $id_vehicle;?>]" value="<?php echo $st_insurance_information;?>" <?php echo $disabled;?> id="txt_insurance_information<?php echo $cnt_vehicle;?>" class="selectpicker form-large-select span10 container-width"  placeholder="Company & Policy #"/>
													</div>
												</div>
												<div class="row-fluid">
													<div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Vehicle Make</label></div>
													<div class="span7">
														<input type="text" name="txt_vehicle_make[<?php echo $id_vehicle;?>]" value="<?php echo $st_vehicle_make;?>" <?php echo $disabled;?> id="txt_vehicle_make<?php echo $cnt_vehicle;?>" class="selectpicker form-large-select span10 container-width"  placeholder=""/>
													</div>
												</div>
												<div class="row-fluid">
													<div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Vehicle Model</label></div>
													<div class="span7">
														<input type="text" name="txt_vehicle_model[<?php echo $id_vehicle;?>]" value="<?php echo $st_vehicle_model;?>" <?php echo $disabled;?> id="txt_vehicle_model<?php echo $cnt_vehicle;?>" class="selectpicker form-large-select span10 container-width" placeholder=""/>
													</div>
												</div>
												<div class="row-fluid">
													<div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Vehicle Year</label></div>
													<div class="span7">
														<input type="text" name="txt_vehicle_year[<?php echo $id_vehicle;?>]" value="<?php echo $st_vehicle_year;?>" <?php echo $disabled;?> maxlength="4" id="txt_vehicle_year<?php echo $cnt_vehicle;?>" class="selectpicker form-large-select span10 container-width" placeholder=""/>
													</div>
												</div>
												<div class="row-fluid">
													<div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Vehicle Type</label></div>
													<div class="span7">
														<input type="text" name="txt_vehicle_type[<?php echo $id_vehicle;?>]" value="<?php echo $st_vehicle_type;?>" <?php echo $disabled;?> id="txt_vehicle_type<?php echo $cnt_vehicle;?>" class="selectpicker form-large-select span10 container-width" placeholder=""/>
													</div>
												</div>
												<div class="row-fluid">
													<div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Vehicle Colour</label></div>
													<div class="span7">
														<input type="text" name="txt_vehicle_color[<?php echo $id_vehicle;?>]" value="<?php echo $st_vehicle_color;?>" <?php echo $disabled;?> id="txt_vehicle_color<?php echo $cnt_vehicle;?>" class="selectpicker form-large-select span10 container-width"  placeholder=""/>
													</div>
												</div>
												<div class="row-fluid">
													<div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Vehicle License Plate #</label></div>
													<div class="span7">
														<input type="text" name="txt_vehicle_license_plate[<?php echo $id_vehicle;?>]" value="<?php echo $st_vehicle_license_plate;?>" <?php echo $disabled;?> id="txt_vehicle_license_plate<?php echo $cnt_vehicle;?>" class="selectpicker form-large-select span10 container-width"  placeholder=""/>
													</div>
												</div>
												<div class="row-fluid">
													<div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Number of passengers</label></div>
													<div class="span7">
														<input type="text" name="txt_no_of_passengers[<?php echo $id_vehicle;?>]" value="<?php echo $in_no_of_passengers;?>" <?php echo $disabled;?> id="txt_no_of_passengers<?php echo $cnt_vehicle;?>" class="selectpicker form-large-select span10 container-width" placeholder=""/>
													</div>
												</div>
												<div class="row-fluid">
													<div class="span8"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Were seat belts being warn?</label></div>
													<div class="span4">
														<input <?php echo $disabled;?> type="radio" name="rdb_seat_belts_warns[<?php echo $id_vehicle;?>]" <?php echo ($is_seat_belts_warns=='1') ? "checked" : "";?> value="1" />  Yes
														<input <?php echo $disabled;?> type="radio" name="rdb_seat_belts_warns[<?php echo $id_vehicle;?>]" <?php echo ($is_seat_belts_warns=='0') ? "checked" : "";?> value="0"/>  No
													</div>
												</div>
											</div>
											<?php 
											$cnt_vehicle++;
										}
									}
									?>
								</div>
								<?php 
								if( "" == $disabled ) {?>
									<div class="row-fluid">
										<a id="btn_add_vehicle_accident" onclick="addMoreVehicleAccident();" class="btn btn-warning pull-right">Add New</a>
										<button type="button" onclick="deleteInvestigationSection('vehicle_accident', '<?php echo $sizeof_vehicle;?>');" class="btn pull-right btn_vehicle_accident">Delete</button>
									</div>
									<?php
								}
								
								$is_police_called = $st_officer_name = $st_officer_badge = $st_division = $st_officer_contact_information = '';
								$where = "in_investigation_id='".$inv_form_id."'";
								$rows_vehiclemaster 	= $this->users->getMetaDataList('inv_vehicle_accident_master',$where,'','*');
								$arr_inv_pdf['vehicle_master'] = isset($rows_vehiclemaster) ? $rows_vehiclemaster : array();
								$sizeof_vehiclemaster 	= sizeof($rows_vehiclemaster);

								if( isset($rows_vehiclemaster) && $sizeof_vehiclemaster )  {
									$cnt_vehicle = 1;
									foreach( $rows_vehiclemaster AS $key_vehiclemaster => $val_vehiclemaster ) 
									{
										$id_vehiclemaster 			= isset($val_vehiclemaster['id']) ? $val_vehiclemaster['id'] : '';
										$is_police_called = isset($val_vehiclemaster['is_police_called']) ? $val_vehiclemaster['is_police_called'] : '';
										$st_officer_name 		= isset($val_vehiclemaster['st_officer_name']) ? $val_vehiclemaster['st_officer_name'] : '';
										$st_officer_badge = isset($val_vehiclemaster['st_officer_badge']) ? $val_vehiclemaster['st_officer_badge'] : '';
										$st_division = isset($val_vehiclemaster['st_division']) ? $val_vehiclemaster['st_division'] : '';
										$st_officer_contact_information = isset($val_vehiclemaster['st_officer_contact_information']) ? $val_vehiclemaster['st_officer_contact_information'] : '';
									}
								}
								?>
								<!-- Start - Vehicle Master Details -->
								<div class="row-fluid">
									<div class="span8"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Were the police call to the scene of the accident?</label></div>
									<div class="span4">
										<input <?php echo $disabled;?> type="radio" name="rdb_police_called" id="rdb_police_called" <?php echo ($is_police_called=='1') ? "checked" : "";?> value="1" />  Yes
										<input <?php echo $disabled;?> type="radio" name="rdb_police_called" id="rdb_police_called" <?php echo ($is_police_called=='0') ? "checked" : "";?> value="0" />  No
									</div>
								</div>
								<div class="row-fluid">
									<div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Officers Name</label></div>
									<div class="span7">
										<input type="text" name="txt_officer_name" value="<?php echo $st_officer_name;?>" <?php echo $disabled;?> id="txt_officer_name" class="selectpicker form-large-select span10 container-width"  placeholder=""/>
									</div>
								</div>
								<div class="row-fluid">
									<div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Officers Badge #</label></div>
									<div class="span7">
										<input type="text" name="txt_officer_badge" id="txt_officer_badge" value="<?php echo $st_officer_badge;?>" <?php echo $disabled;?> class="selectpicker form-large-select span10 container-width"  placeholder=""/>
									</div>
								</div>
								<div class="row-fluid">
									<div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Division #</label></div>
									<div class="span7">
										<input type="text" name="txt_division" value="<?php echo $st_division;?>" <?php echo $disabled;?> id="txt_division" class="selectpicker form-large-select span10 container-width" placeholder=""/>
									</div>
								</div>
								<div class="row-fluid">
									<div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Officer contact information</label></div>
									<div class="span7">
										<input type="text" name="txt_officer_contact_information" value="<?php echo $st_officer_contact_information;?>" <?php echo $disabled;?> id="txt_officer_contact_information" class="selectpicker form-large-select span10 container-width" placeholder=""/>
									</div>
								</div>
								<!-- End - Vehicle Master Details -->

								<?php 
								$arr_validation_vehicle_accident[] = '"1":"rdb_police_called", "dependent1":{"1":"txt_officer_name"}'; 
								$arr_validation_vehicle_accident = isset($arr_validation_vehicle_accident)&&is_array($arr_validation_vehicle_accident) ? implode(",",$arr_validation_vehicle_accident) : '';
								?>
								<div id="validation_vehicle_accident" style="display:none;"><?php echo $arr_validation_vehicle_accident;?></div>
							</form>
						</div>
					</div>
					<?php 
					if( "" == $disabled ) {?>
						<div class="row-fluid">
							<a id="btn_save_vehicle_accident" onclick="javascript:saveInvestigator('vehicle_accident', 'frm_vehicle_accident', 'acc-10', 'id_vehicle_accident', 'id_vehicle_accident_bucket');" class="btn btn-warning pull-right">SAVE</a>
						</div>
					<?php
					}?>
				</div>
			<!--------END VEHICLE ACCIDENT-------->

			
			<!--------START POSSIBLE CONTRIBUTING FACTORS-------->
				<button  href="#acc-11" id="id_contrib_factors" data-toggle="collapse" class="btn collapse-btn collapsed">
					<div class="row-fluid">
						<div class="span8 item-title">
							<h4 class="collapse-basic">Possible Contributing Factors</h4>
						</div>
					</div>
				</button>
				<div id="acc-11" class="module-inner collapse">				
					<div class="row-fluid collapse-inner">
						<div class="span12 pull-left">
							<form class="form-large" id="frm_contrib_factors" name="frm_contrib_factors">
								<?php 
								$st_fall_protection = $st_housekeeping_storage = $st_environmental_condetions = $st_ergonomics = $st_personal_protective_equipment = array();
								$st_tools_equipment_machinery = $st_training = $st_general = $st_other_contributing_factors = array();

								$where = "in_investigation_id='".$inv_form_id."'";
								$rows_contri_factors = $this->users->getMetaDataList('inv_possible_contributing_factors',$where,'','*');
								$arr_inv_pdf['contri_factors'] = isset($rows_contri_factors) ? $rows_contri_factors : array();
								$sizeof_contri_factors = sizeof($rows_contri_factors);
								
								if( isset($rows_contri_factors) && $sizeof_contri_factors ) {
									$cnt_vehicle = 1;
									foreach( $rows_contri_factors AS $key_contri_factors => $val_contri_factors ) 
									{
										$id_contri_factors 			= isset($val_contri_factors['id']) ? $val_contri_factors['id'] : '';
										$st_fall_protection 		= ($val_contri_factors['st_fall_protection']) ? json_decode($val_contri_factors['st_fall_protection']) : array();

										$st_housekeeping_storage 	= ($val_contri_factors['st_housekeeping_storage']) ? json_decode($val_contri_factors['st_housekeeping_storage']) : array();
										$st_environmental_condetions	= ($val_contri_factors['st_environmental_condetions']) ? json_decode($val_contri_factors['st_environmental_condetions']) : array();
										$st_ergonomics 					= ($val_contri_factors['st_ergonomics']) ? json_decode($val_contri_factors['st_ergonomics']) : array();
										$st_personal_protective_equipment = ($val_contri_factors['st_personal_protective_equipment']) ? json_decode($val_contri_factors['st_personal_protective_equipment']) : array();

										$st_tools_equipment_machinery = json_decode($val_contri_factors['st_tools_equipment_machinery']);
										if( !is_array($st_tools_equipment_machinery) ) {
											$st_tools_equipment_machinery = array($st_tools_equipment_machinery);
										}
									
										$st_training = ($val_contri_factors['st_training']) ? json_decode($val_contri_factors['st_training']) : array();
										$st_general = ($val_contri_factors['st_general']) ? json_decode($val_contri_factors['st_general']) : array();
										$st_other_contributing_factors = ($val_contri_factors['st_other_contributing_factors']) ? json_decode($val_contri_factors['st_other_contributing_factors']) : array();
									}
								}
								?>
								<div class="row-fluid">
									<div class="span12"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Fall Protection</label></div>
								</div>
								<div class="row-fluid">
									<div class="span12">
										<input type="checkbox" name="chk_fall_protection[]" <?php echo in_array("Safety Devices Not Used Properly", $st_fall_protection)?'checked':'';?> <?php echo $disabled;?> value="Safety Devices Not Used Properly" style="margin-left:10px;"/> Safety Devices Not Used Properly
									</div>
								</div>
								<div class="row-fluid">
									<div class="span12">
										<input type="checkbox" name="chk_fall_protection[]" <?php echo in_array("Defective or Fault Safety Equipment", $st_fall_protection)?'checked':'';?> <?php echo $disabled;?> value="Defective or Fault Safety Equipment" style="margin-left:10px;"/> Defective or Fault Safety Equipment
									</div>
								</div>
								<div class="row-fluid">
									<div class="span12">
										<input type="checkbox" name="chk_fall_protection[]" <?php echo in_array("Unavailable Equipment", $st_fall_protection)?'checked':'';?> <?php echo $disabled;?> value="Unavailable Equipment" style="margin-left:10px;"/> Unavailable Equipment
									</div>
								</div>
								<div class="row-fluid">
									<div class="span12">
										<input type="checkbox" name="chk_fall_protection[]" <?php echo in_array("Lack of Training", $st_fall_protection)?'checked':'';?> <?php echo $disabled;?> value="Lack of Training" style="margin-left:10px;"/> Lack of Training
									</div>
								</div>
								<div class="row-fluid">
									<div class="span12">
										<input type="checkbox" name="chk_fall_protection[]" <?php echo in_array("Lack of Guarding / Removal of Safety Devices", $st_fall_protection)?'checked':'';?> <?php echo $disabled;?> value="Lack of Guarding / Removal of Safety Devices" style="margin-left:10px;"/> Lack of Guarding / Removal of Safety Devices
									</div>
								</div>
								<div class="row-fluid">
									<div class="span12">
										<input type="checkbox" name="chk_fall_protection[]" <?php echo in_array("Guardrail Not Installed At Floor Edge", $st_fall_protection)?'checked':'';?> <?php echo $disabled;?> value="Guardrail Not Installed At Floor Edge" style="margin-left:10px;"/> Guardrail Not Installed At Floor Edge
									</div>
								</div>

								<div class="row-fluid">
									<div class="span12"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Housekeeping / Storage</label></div>
								</div>
								<div class="row-fluid">
									<div class="span12">
										<input type="checkbox" name="chk_housekeeping_storage[]" <?php echo in_array("Untidy / Disorganized Workplace", $st_housekeeping_storage)?'checked':'';?> <?php echo $disabled;?> value="Untidy / Disorganized Workplace" style="margin-left:10px;"/> Untidy / Disorganized Workplace
									</div>
								</div>
								<div class="row-fluid">
									<div class="span12">
										<input type="checkbox" <?php echo in_array("Material Not Secured", $st_housekeeping_storage)?'checked':'';?> <?php echo $disabled;?> name="chk_housekeeping_storage[]" value="Material Not Secured" style="margin-left:10px;"/> Material Not Secured
									</div>
								</div>
								<div class="row-fluid">
									<div class="span12">
										<input type="checkbox" <?php echo in_array("Improper Storage / Location of Tools, Materials, or Equipment", $st_housekeeping_storage)?'checked':'';?> <?php echo $disabled;?> name="chk_housekeeping_storage[]" value="Improper Storage / Location of Tools, Materials, or Equipment" style="margin-left:10px;"/> Improper Storage / Location of Tools, Materials, or Equipment
									</div>
								</div>
								<div class="row-fluid">
									<div class="span12">
									<input type="checkbox" <?php echo in_array("Inadequate Access & Egress", $st_housekeeping_storage)?'checked':'';?> <?php echo $disabled;?> name="chk_housekeeping_storage[]" value="Inadequate Access & Egress" style="margin-left:10px;"/> Inadequate Access & Egress
									</div>
								</div>
								<div class="row-fluid">
									<div class="span12">
										<input type="checkbox" <?php echo in_array("Excessive Debris", $st_housekeeping_storage)?'checked':'';?> <?php echo $disabled;?> name="chk_housekeeping_storage[]" value="Excessive Debris" style="margin-left:10px;"/> Excessive Debris 
									</div>
								</div>
								<div class="row-fluid">
									<div class="span12">
										<input type="checkbox" <?php echo in_array("Improper Storage and Handling of chemicals", $st_housekeeping_storage)?'checked':'';?> <?php echo $disabled;?> name="chk_housekeeping_storage[]" value="Improper Storage and Handling of chemicals" style="margin-left:10px;"/> Improper Storage and Handling of chemicals
									</div>
								</div>
								<div class="row-fluid">
									<div class="span12">
										<input type="checkbox" <?php echo in_array("Unsuitable Work Surface", $st_housekeeping_storage)?'checked':'';?> <?php echo $disabled;?> name="chk_housekeeping_storage[]" value="Unsuitable Work Surface" style="margin-left:10px;"/> Unsuitable Work Surface
									</div>
								</div>

								<div class="row-fluid">
									<div class="span12"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Environmental Conditions </label></div>
								</div>
								<div class="row-fluid">
									<div class="span12">
										<input type="checkbox" <?php echo in_array("Poor Visibility", $st_environmental_condetions)?'checked':'';?> <?php echo $disabled;?> name="chk_environmental_condetions[]" value="Poor Visibility" style="margin-left:10px;"/> Poor Visibility
									</div>
								</div>
								<div class="row-fluid">
									<div class="span12">
										<input type="checkbox" <?php echo in_array("Excessive Noise", $st_environmental_condetions)?'checked':'';?> <?php echo $disabled;?> name="chk_environmental_condetions[]" value="Excessive Noise" style="margin-left:10px;"/> Excessive Noise
									</div>
								</div>
								<div class="row-fluid">
									<div class="span12">
										<input type="checkbox" <?php echo in_array("Inadequate Ventilation", $st_environmental_condetions)?'checked':'';?> <?php echo $disabled;?> name="chk_environmental_condetions[]" value="Inadequate Ventilation" style="margin-left:10px;"/> Inadequate Ventilation
									</div>
								</div>
								<div class="row-fluid">
									<div class="span12">
										<input type="checkbox" <?php echo in_array("Weather Conditions", $st_environmental_condetions)?'checked':'';?> <?php echo $disabled;?> name="chk_environmental_condetions[]" value="Weather Conditions" style="margin-left:10px;"/> Weather Conditions
									</div>
								</div>
								<div class="row-fluid">
									<div class="span12">
										<input type="checkbox" <?php echo in_array("Vibration", $st_environmental_condetions)?'checked':'';?> <?php echo $disabled;?> name="chk_environmental_condetions[]" value="Vibration" style="margin-left:10px;"/> Vibration
									</div>
								</div>
								<div class="row-fluid">
									<div class="span12">
										<input type="checkbox" <?php echo in_array("Dust", $st_environmental_condetions)?'checked':'';?> <?php echo $disabled;?> name="chk_environmental_condetions[]" value="Dust" style="margin-left:10px;"/> Dust
									</div>
								</div>
								<div class="row-fluid">
									<div class="span12">
										<input type="checkbox" <?php echo in_array("Hot or Cold Exposure", $st_environmental_condetions)?'checked':'';?> <?php echo $disabled;?> name="chk_environmental_condetions[]" value="Hot or Cold Exposure" style="margin-left:10px;"/> Hot or Cold Exposure 
									</div>
								</div>

								<div class="row-fluid">
									<div class="span12"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Ergonomics</label></div>
								</div>
								<div class="row-fluid">
									<div class="span12">
										<input type="checkbox" <?php echo in_array("Poor Posture", $st_ergonomics)?'checked':'';?> <?php echo $disabled;?> name="chk_ergonomics[]" value="Poor Posture" style="margin-left:10px;"/> Poor Posture
									</div>
								</div>
								<div class="row-fluid">
									<div class="span12">
										<input type="checkbox" <?php echo in_array("Repetitive Motion", $st_ergonomics)?'checked':'';?> <?php echo $disabled;?> name="chk_ergonomics[]" value="Repetitive Motion" style="margin-left:10px;"/> Repetitive Motion
									</div>
								</div>
								<div class="row-fluid">
									<div class="span12">
										<input type="checkbox" <?php echo in_array("Improper Lifting Technique", $st_ergonomics)?'checked':'';?> <?php echo $disabled;?> name="chk_ergonomics[]" value="Improper Lifting Technique" style="margin-left:10px;"/> Improper Lifting Technique
									</div>
								</div>

								<div class="row-fluid">
									<div class="span12"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Personal Protective Equipment (PPE) </label></div>
								</div>
								<div class="row-fluid">
									<div class="span12">
										<input type="checkbox" <?php echo in_array("Inappropriate PPE For The Job", $st_personal_protective_equipment)?'checked':'';?> <?php echo $disabled;?> name="chk_personal_protective_equipment[]" value="Inappropriate PPE For The Job" style="margin-left:10px;"/> Inappropriate PPE For The Job
									</div>
								</div>
								<div class="row-fluid">
									<div class="span12">
										<input type="checkbox" <?php echo in_array("Improper Use Of PPE", $st_personal_protective_equipment)?'checked':'';?> <?php echo $disabled;?> name="chk_personal_protective_equipment[]" value="Improper Use Of PPE" style="margin-left:10px;"/> Improper Use Of PPE
									</div>
								</div>
								<div class="row-fluid">
									<div class="span12">
										<input type="checkbox" <?php echo in_array("Lack Of Safety Equipment", $st_personal_protective_equipment)?'checked':'';?> <?php echo $disabled;?> name="chk_personal_protective_equipment[]" value="Lack Of Safety Equipment" style="margin-left:10px;"/> Lack Of Safety Equipment 
									</div>
								</div>

								<div class="row-fluid">
									<div class="span12"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Tools, Equipment, Machinery</label></div>
								</div>
								<div class="row-fluid">
									<div class="span12">
										<input type="checkbox" <?php echo in_array("Improper Use", $st_tools_equipment_machinery)?'checked':'';?> <?php echo $disabled;?> name="chk_tools_equipment_machinery[]" value="Improper Use" style="margin-left:10px;"/> Improper Use
									</div>
								</div>
								<div class="row-fluid">
									<div class="span12">
										<input type="checkbox" <?php echo in_array("Defective / Faulty", $st_tools_equipment_machinery)?'checked':'';?> <?php echo $disabled;?> name="chk_tools_equipment_machinery[]" value="Defective / Faulty" style="margin-left:10px;"/> Defective / Faulty 
									</div>
								</div>
								<div class="row-fluid">
									<div class="span12">
										<input type="checkbox" <?php echo in_array("Encroachment In To Restricted Areas", $st_tools_equipment_machinery)?'checked':'';?> <?php echo $disabled;?> name="chk_tools_equipment_machinery[]" value="Encroachment In To Restricted Areas" style="margin-left:10px;"/> Encroachment In To Restricted Areas
									</div>
								</div>
								<div class="row-fluid">
									<div class="span12">
										<input type="checkbox" <?php echo in_array("Mechanical or Electrical Failure", $st_tools_equipment_machinery)?'checked':'';?> <?php echo $disabled;?> name="chk_tools_equipment_machinery[]" value="Mechanical or Electrical Failure" style="margin-left:10px;"/> Mechanical or Electrical Failure
									</div>
								</div>
								<div class="row-fluid">
									<div class="span12">
										<input type="checkbox" <?php echo in_array("Lack Of Proper Tools, Equipment Or Machinery For The Job Devices", $st_tools_equipment_machinery)?'checked':'';?> <?php echo $disabled;?> name="chk_tools_equipment_machinery[]" value="Lack Of Proper Tools, Equipment Or Machinery For The Job Devices" style="margin-left:10px;"/> Lack Of Proper Tools, Equipment Or Machinery For The Job Devices
									</div>
								</div>
								<div class="row-fluid">
									<div class="span12">
										<input type="checkbox" <?php echo in_array("Lack Of Guarding / Removal Of Safety Devices", $st_tools_equipment_machinery)?'checked':'';?> <?php echo $disabled;?> name="chk_tools_equipment_machinery[]" value="Lack Of Guarding / Removal Of Safety Devices" style="margin-left:10px;"/> Lack Of Guarding / Removal Of Safety Devices
									</div>
								</div>
								<div class="row-fluid">
									<div class="span12">
										<input type="checkbox" <?php echo in_array("Procedures Not Followed Devices", $st_tools_equipment_machinery)?'checked':'';?> <?php echo $disabled;?> name="chk_tools_equipment_machinery[]" value="Procedures Not Followed Devices" style="margin-left:10px;"/> Procedures Not Followed Devices
									</div>
								</div>
								<div class="row-fluid">
									<div class="span12">
										<input type="checkbox" <?php echo in_array("Alteration From Manufactures Specifications Devices", $st_tools_equipment_machinery)?'checked':'';?> <?php echo $disabled;?> name="chk_tools_equipment_machinery[]" value="Alteration From Manufactures Specifications Devices" style="margin-left:10px;"/> Alteration From Manufactures Specifications Devices
									</div>
								</div>

								<div class="row-fluid">
									<div class="span12"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Training</label></div>
								</div>
								<div class="row-fluid">
									<div class="span12">
										<input type="checkbox" <?php echo in_array("Workers not adequately trained", $st_training)?'checked':'';?> <?php echo $disabled;?> name="chk_training[]" value="Workers not adequately trained" style="margin-left:10px;"/> Workers not adequately trained 
									</div>
								</div>
								<div class="row-fluid">
									<div class="span12">
										<input type="checkbox" <?php echo in_array("Unsafe Work Practice", $st_training)?'checked':'';?> <?php echo $disabled;?> name="chk_training[]" value="Unsafe Work Practice" style="margin-left:10px;"/> Unsafe Work Practice
									</div>
								</div>
								<div class="row-fluid">
									<div class="span12">
										<input type="checkbox" <?php echo in_array("Lack or Improper Instruction / Communication", $st_training)?'checked':'';?> <?php echo $disabled;?> name="chk_training[]"  value="Lack or Improper Instruction / Communication" style="margin-left:10px;"/> Lack or Improper Instruction / Communication
									</div>
								</div>

								<div class="row-fluid">
									<div class="span12"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>General</label></div>
								</div>
								<div class="row-fluid">
									<div class="span12">
										<input type="checkbox" <?php echo in_array("Lack of Warning Signs", $st_general)?'checked':'';?> <?php echo $disabled;?> name="chk_general[]" value="Lack of Warning Signs" style="margin-left:10px;"/> Lack of Warning Signs
									</div>
								</div>
								<div class="row-fluid">
									<div class="span12">
										<input type="checkbox" <?php echo in_array("Unsafe Hoisting or Rigging", $st_general)?'checked':'';?> <?php echo $disabled;?> name="chk_general[]" value="Unsafe Hoisting or Rigging" style="margin-left:10px;"/> Unsafe Hoisting or Rigging
									</div>
								</div>
								<div class="row-fluid">
									<div class="span12">
										<input type="checkbox" <?php echo in_array("Fire Or Explosion", $st_general)?'checked':'';?> <?php echo $disabled;?> name="chk_general[]" value="Fire Or Explosion" style="margin-left:10px;"/> Fire Or Explosion
									</div>
								</div>
								<div class="row-fluid">
									<div class="span12">
										<input type="checkbox" <?php echo in_array("Maintenance Plan Not Followed", $st_general)?'checked':'';?> <?php echo $disabled;?> name="chk_general[]" value="Maintenance Plan Not Followed" style="margin-left:10px;"/> Maintenance Plan Not Followed
									</div>
								</div>
								<div class="row-fluid">
									<div class="span12">
										<input type="checkbox" <?php echo in_array("Inappropriate Conduct", $st_general)?'checked':'';?> <?php echo $disabled;?> name="chk_general[]" value="Inappropriate Conduct" style="margin-left:10px;"/> Inappropriate Conduct 
									</div>
								</div>

								<div class="row-fluid">
									<div class="span12"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Other</label></div>
								</div>
								<div class="row-fluid">
									<div class="span12">Please list any contributing factors to the occurrence that are not currently on the lists provided. These key terms can be used to help target factors; Poor, Improper, Inadequate, Lack Of, Unsafe, Defective, Faulty, Inappropriate, Excessive, Unsuitable</div>
								</div>
								
								<div class="row-fluid" id="id_contrib_factors_bucket">
									<?php
									$sizeof_other_contribfact = sizeof($st_other_contributing_factors);
									if( $sizeof_other_contribfact ) {
										for( $cnt_other=0;$cnt_other<$sizeof_other_contribfact;$cnt_other++ ) {
											$val = $st_other_contributing_factors[$cnt_other];
											?>
											<div class="row-fluid cls_possible_contrib_factors" id="id_div_possible_contrib_factors<?php echo ($cnt_other+1);?>">
												<div class="span12">
													<input type="text" name="txt_other_contributing_factors[]" value="<?php echo $val;?>" <?php echo $disabled;?> id="txt_other_contributing_factors<?php echo ($cnt_other+1);?>" class="selectpicker form-large-select span10 container-width" placeholder="(<?php echo ($cnt_other+1);?>)"/>
												</div>
											</div>
											<?php
										}
									}?>
								</div>								
							</form>
						</div>
					</div>
					<?php 
					if( "" == $disabled ) {?>
						<div class="row-fluid">
							<a id="btn_save_contrib_factors" onclick="javascript:saveInvestigator('possible_contrib_factors', 'frm_contrib_factors', 'acc-11', 'id_contrib_factors', 'id_contrib_factors_bucket');" class="btn btn-warning pull-right">SAVE</a>
							<a id="btn_add_contrib_factors" onclick="addMoreContribFactors();" class="btn btn-warning pull-right">Add New</a>
							<button type="button" onclick="deleteInvestigationSection('possible_contrib_factors', '<?php echo $sizeof_other_contribfact;?>');" class="btn btn_possible_contrib_factors pull-right">Delete</button>
						</div>
					<?php
					}?>
				</div>
			<!--------END POSSIBLE CONTRIBUTING FACTORS-------->

			
			<!--------START RECOMMENDED CORRECTIVE ACTIONS-------->
			<button href="#acc-12" id="id_recommended_actions" data-toggle="collapse" class="btn collapse-btn collapsed">
				<div class="row-fluid">
					<div class="span8 item-title">
						<h4 class="collapse-basic">Recommended Corrective Actions</h4>
					</div>						
				</div>
			</button>
			<div id="acc-12" class="module-inner collapse">
				<div class="row-fluid collapse-inner">	
					<div class="span12 pull-left">
						<form class="form-large" method="post" id="frm_recommended_actions" name="frm_recommended_actions">
							<div class="row-fluid">
								<div class="span12">
									List each corrective action to prevent future occurrences and established timelines. Ensure that the corrective action does not create a new hazard. Each corrective action should have the following information in the description: Who is responsible to implement the corrective action, date to be complied by person responsible.
								</div>
							</div>
							<div class="row-fluid" id="id_recommended_actions_bucket">
								<?php 
								$where = "in_investigation_id='".$inv_form_id."'";
								$rows_recommended_action = $this->users->getMetaDataList('inv_recommended_corrective_action',$where,'','*');
								$arr_inv_pdf['recommended_action'] = isset($rows_recommended_action) ? $rows_recommended_action : array();
								$sizeof_recommended_action = sizeof($rows_recommended_action);
								
								if( isset($rows_recommended_action) && $sizeof_recommended_action ) {
									$cnt_recommended_action = 1;
									$pRecommendedAction = 0;
									foreach( $rows_recommended_action AS $key_recommended_action => $val_recommended_action ) 
									{
										$id_recommended_action 		= isset($val_recommended_action['id']) ? $val_recommended_action['id'] : '';
										$st_action_name 			= isset($val_recommended_action['st_action_name']) ? $val_recommended_action['st_action_name'] : '';

										$st_action_assign_to 		= isset($val_recommended_action['st_action_assign_to']) ? $val_recommended_action['st_action_assign_to'] : '';
										$st_action_assign_to 		= $this->users->getMetaDataList('user', 'id="'.$st_action_assign_to.'"', '', 'concat(firstname," ",lastname) AS username');
										$st_action_assign_to		= isset($st_action_assign_to[0]['username']) ? $st_action_assign_to[0]['username'] : '';

										$st_action_comply_date 		= isset($val_recommended_action['st_action_comply_date']) ? $val_recommended_action['st_action_comply_date'] : '';?>
										<div class="row-fluid cls_recommended_actions" id="id_div_recommended_actions<?php echo $cnt_recommended_action;?>">
											<div class="row-fluid">
												<div class="span2"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>(<?php echo $cnt_recommended_action;?>)</label></div>
												<div class="span10">
													<input type="text" name="txt_action_name[<?php echo $id_recommended_action;?>]" value="<?php echo $st_action_name;?>" <?php echo $disabled;?> id="txt_action_name<?php echo $cnt_recommended_action;?>" class="selectpicker form-large-select span10 container-width"  placeholder=""/>
												</div>
											</div>
											<div class="row-fluid">
												<div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Assign to:</label></div>
												<div class="span7 input-append">
													<input type="text" name="txt_action_assign_to[<?php echo $id_recommended_action;?>]" id="txt_action_assign_to<?php echo $cnt_recommended_action;?>" value="<?php echo $st_action_assign_to;?>" <?php echo $disabled;?> onkeydown="javascript:getUsers('<?php echo "txt_action_assign_to".$cnt_recommended_action;?>');" class="selectpicker form-large-select span10 container-width" placeholder="Search"/>
												</div>
												<div class="clear"></div>
											</div>
											<div class="row-fluid">
												<div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Date to Comply:</label></div>
												<div class="span7">
													<input type="text" name="txt_action_comply_date[<?php echo $id_recommended_action;?>]" id="txt_action_comply_date<?php echo $cnt_recommended_action;?>" value="<?php echo $st_action_comply_date;?>" <?php echo $disabled;?> class="selectpicker form-large-select span10 datestamp" placeholder="yy-mm-dd --:--"/>
												</div>
											</div>
										</div>
										<?php 
										$arr_validation_recommended_actions[] = '"'.$cnt_recommended_action.'":"txt_action_name'.$cnt_recommended_action.'", 
										"dependent'.$cnt_recommended_action.'":{"1":"txt_action_assign_to'.$cnt_recommended_action.'", 
													"2":"txt_action_comply_date'.$cnt_recommended_action.'"}'; 
										$cnt_recommended_action++;
									}
								}
								?>
							</div>
							<?php 
							$arr_validation_recommended_actions = isset($arr_validation_recommended_actions)&&is_array($arr_validation_recommended_actions) ? implode(",",$arr_validation_recommended_actions) : '';
							?>
							<div id="validation_recommended_actions" style="display:none;"><?php echo $arr_validation_recommended_actions;?></div>
							
							<?php 
							if( "" == $disabled ) {?>
								<div class="row-fluid">
								  <div class="span12">
									<button type="submit" id="btn_save_recommended_actions" onclick="javascript:saveInvestigator('recommended_actions', 'frm_recommended_actions', 'acc-12', 'id_recommended_actions', 'id_recommended_actions_bucket');" class="btn btn-warning pull-right">SAVE</button>
									<a id="btn_add_recom_actions" onclick="addMoreRecommendedActions();" class="btn btn-warning pull-right">Add Additional Corrective Actions</a>
									<button type="button" onclick="deleteInvestigationSection('recommended_actions','<?php echo $sizeof_recommended_action;?>');" class="btn btn_recommended_actions pull-right">Delete</button>
								  </div>								  
								</div>
							<?php
							}?>
						</form>
					</div>
				</div>				
			</div>
			<!--------END RECOMMENDED CORECTIVE ACTIONS-------->


			<!--------START FOLOW UP ACTIONS TAKEN-------->
				<?php 
				$ret_followup_actions 	= $this->investigation->getFollowupAction( $inv_form_id );
				$arr_inv_pdf['followup_actions'] = isset($ret_followup_actions) ? $ret_followup_actions : array();
				$sizeof_followup_action = isset($ret_followup_actions) ? sizeof($ret_followup_actions) : '';
				?>
				<button  href="#acc-13" data-toggle="collapse" class="btn collapse-btn collapsed" id="id_followup_actions">
					<div class="row-fluid">
						<div class="span8 item-title">
							<h4 class="collapse-basic">Follow Up Actions Taken</h4>
						</div>
					</div>
				</button>
				<div id="acc-13" class="module-inner collapse">				
					<div class="row-fluid collapse-inner">
						<div class="span12 pull-left">
							<form class="form-large" method="post" id="frm_followup_actions" name="frm_followup_actions">
								<div class="row-fluid">
									<div class="span12">
										A follow up evaluation must be done for each corrective action taken to assure that each action is completed within the established timeline. 
									</div>
								</div>
								<?php 
								if( $sizeof_followup_action > 0 ) {
									$cnt_folwact = 0;
									foreach( $ret_followup_actions AS $key_folwact => $val_folwact ) {
										$id_followup_action 	= isset($val_folwact['id']) ? $val_folwact['id'] : '';
										$action_name 			= $val_folwact['st_action_name'];
										$action_complied_by 	= $val_folwact['st_action_complied_by'];
										$action_complied_by 	= $this->users->getUserByID( $action_complied_by );
										$action_complied_by		= $action_complied_by['firstname']." ".$action_complied_by['lastname'];
										$action_complied_date 	= $val_folwact['st_action_complied_date'];
										?>
										<div class="row-fluid">
											<div class="span2"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>(<?php echo ($cnt_folwact+1);?>)</label></div>
											<div class="span10">
												<input type="text" disabled class="selectpicker form-large-select span10 container-width" value="<?php echo $action_name;?>"  placeholder=""/>
											</div>
										</div>
										<div class="row-fluid">
											<div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Complied by:</label></div>
											<div class="span7">
												<input type="text" disabled class="selectpicker form-large-select span10 container-width" value="<?php echo $action_complied_by;?>"  placeholder=""/>
											</div>
										</div>
										<div class="row-fluid">
											<div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Date Complied:</label></div>
											<div class="span7">
												<input type="text" name="txt_action_complied_date[<?php echo $id_followup_action;?>]" id="txt_action_complied_date<?php echo $cnt_folwact;?>" value="<?php echo $action_complied_date;?>" <?php echo $disabled;?> class="selectpicker form-large-select span10 datestamp" placeholder="yy-mm-dd --:--"/>
											</div>
										</div>
										<?php
										$cnt_folwact++;
									}
									if( "" == $disabled ) {?>
										<div class="row-fluid">
										  <div class="span12">
											<button type="submit" id="btn_save_followup_actions" onclick="javascript:saveInvestigator('followup_actions', 'frm_followup_actions', 'acc-13', 'id_followup_actions', '');" class="btn btn-warning pull-right">SAVE</button>
										  </div>
										</div>
									<?php
									}
								}
								else {
									echo "<h5>No data available</h5>";
								}
								?>
							</form>
						</div>
					</div>
				</div>
			<!--------END FOLLOW UP ACTIONS TAKEN-------->

			
			
			<!--------START PHOTOS-------->
				<button  href="#acc-14" data-toggle="collapse" id="id_inv_photoes" class="btn collapse-btn collapsed">
					<div class="row-fluid">
						<div class="span8 item-title">
							<h4 class="collapse-basic">Photos</h4>
						</div>						
					</div>
				</button>
				<div id="acc-14" id="id_inv_photoes" class="module-inner collapse">
					<div class="row-fluid collapse-inner">
						<div class="span12 pull-left">
							<form method="post" class="form-large" name="frm_investigation_photoes" id="frm_investigation_photoes" action="" enctype="multipart/form-data">
								<div id="id_inv_photo_bucket">
								<?php 
								$where = "in_investigation_id='".$inv_form_id."'";
								$rows_inv_photos = $this->users->getMetaDataList('inv_photoes',$where,'','*');
								$arr_inv_pdf['inv_photos'] = isset($rows_inv_photos) ? $rows_inv_photos : array();
								$sizeof_inv_photos = sizeof($rows_inv_photos);

								if( isset($rows_inv_photos) && $sizeof_inv_photos ) 
								{
									$cnt_inv_photo=1;
									foreach( $rows_inv_photos AS $key_inv_photos => $val_inv_photos ) 
									{
										$id_inv_photoes 		= isset($val_inv_photos['id']) ? $val_inv_photos['id'] : '';
										$st_picture 			= isset($val_inv_photos['st_picture']) ? $val_inv_photos['st_picture'] : '';
										$st_picture_description = isset($val_inv_photos['st_picture_description']) ? $val_inv_photos['st_picture_description'] : '';
										?>
										<div id="id_div_inv_photoes<?php echo $cnt_inv_photo;?>" class="upload_box_inv_photo<?php echo $cnt_inv_photo;?> cls_inv_photoes">
											<div class="row-fluid">
												<div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Attach picture #<?php echo $cnt_inv_photo;?> (Allowed file types: jpg, gif, png)</label></div>
												<div class="span7">
													<div class="file_browser_inv_photo<?php echo $cnt_inv_photo;?>">
														<input type="file" id="file_inv_photoes<?php echo $cnt_inv_photo;?>" <?php echo $disabled;?> name="userfile[<?php echo $id_inv_photoes;?>]" class="hide_broswe_inv_photo<?php echo $cnt_inv_photo;?>" />(Max 2MB)
														<span id="err_file_inv_photoes<?php echo $cnt_inv_photo;?>"></span>
														<?php 
														if( file_exists(FCPATH.$this->path_upload_investigation_photoes.$st_picture) && $st_picture ) { ?>
															<a title="Click to see full picture" class="fancybox-media" href="<?php echo $base.$this->path_upload_investigation_photoes.$st_picture;?>" data-fancybox-group="gallery">
																<img src="<?php echo $base.$this->path_upload_investigation_photoes.$st_picture;?>" class="w45 h40">
															</a>
														<?php
														}?>
													</div>
												</div>
											</div>
											<div class="row-fluid">
												<div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Description</label></div>
												<div class="span7">
													<input type="text" value="<?php echo $st_picture_description;?>" <?php echo $disabled;?> name="txt_picture_description[<?php echo $id_inv_photoes;?>]" id="txt_picture_description<?php echo $cnt_inv_photo;?>" class="selectpicker form-large-select span10 container-width" placeholder="Picture Description"/>
												</div>
											</div>
										</div>
										<?php 
										$cnt_inv_photo++;
									}
								}?>
								</div>

								<input type="hidden" id="investigation_id" name="investigationId" value="<?php echo $inv_form_id;?>">
								<input type="hidden" id="hidn_section_name" name="sectionName" value="investigation_photoes">
								<input type="hidden" id="hidn_form_id" name="formId" value="">
								<input type="hidden" id="hidn_id_div_collapse" name="idDivCollapse" value="acc-14">
								<input type="hidden" id="hidn_id_data_toggle" name="idDataToggle" value="id_inv_photoes">
								<input type="hidden" id="hidn_id_div_bucket" name="idDivBucket" value="id_inv_photo_bucket">

								<div class="file_upload_invphoto">
									<?php 
									if( "" == $disabled ) {?>
										<div class="row-fluid">
										  <div class="span12">
											<button type="submit" onclick="javascript:submitInvestigation('frm_investigation_photoes');" id="btn_save_invphoto" class="upload_button_invphoto btn btn-warning pull-right">SAVE</button>
											<a id="btn_add_inv_photoes" onclick="addMoreInvPhotoes();" class="btn btn-warning pull-right">Add New</a>
											<button type="button" onclick="deleteInvestigationSection('inv_photoes', '<?php echo $sizeof_inv_photos;?>');" class="btn pull-right btn_inv_photoes">Delete</button>
										  </div>				  
										</div>
										<?php 
									}?>
								</div>
							</form>
							<script type="text/javascript">
								$('#btn_save_invphoto').click(function(e){
									var is_error = 0;
									var img_invphotos = '';
									var valid_invphotos_ext = ['jpeg', 'jpg', 'png', 'gif', 'bmp'];
									$("#id_inv_photo_bucket").find('input[type=file]').each(function() {
										img_invphotos = $(this).attr("id");
										id_img_invphotos = $("#"+img_invphotos);
										if( id_img_invphotos.val()!='' && ($.inArray(id_img_invphotos.val().split('.').pop().toLowerCase(), valid_invphotos_ext) == -1) ) {
											$('#err_'+img_invphotos).html("<br>\nOnly (jpeg, jpg, png, gif, bmp) formats are allowed.");
											$('#err_'+img_invphotos).addClass("text-error");
											is_error++;
										}
										else {
											$('#err_'+img_invphotos).html("");
										}
									});
									if( is_error > 0 ) { e.preventDefault(); }
								});
							</script>
						</div>
					</div>
				</div>
			<!--------END PHOTOS-------->
	</div>

	
	<?php 
	if( "" == $disabled ) {
		$sealed_label 	= $this->investigation->checkInvestigationSealed($inv_form_id);
		// $sealed_label = "SEAL";
		
		$btn_label 		= $sealed_label;
		if( "SEAL_DISABLE" == $sealed_label ) {
			$btn_label = "SEAL";
			$class = "btn btn-success pull-right";
			$disable = "disabled";
		}
		else if( "SEAL" == $sealed_label ) {		
			$class = "btn btn-success pull-right";
			$disable = "";
		}
		else if( "SEALED" == $sealed_label ) {
			$class 		= "btn btn-danger pull-right";
			$disable 	= "disabled";
		}
		else {
			$class = "btn btn-warning pull-right";
			$disable 	= "disabled";
			$btn_label 	= "NO ACTION";
		}		
		?>
		<form name="frm_seal_investigation" id="frm_seal_investigation" action="<?php echo $base."admin/investigation_page?invformid=".$inv_form_id."&clientid=".$clientid;?>" method="post">
			<div class="row-fluid">
			  <div class="span12">
				<button id="btn_seal_investigation" onclick="javascript:sealInvestigation('<?php echo strtolower($btn_label);?>');" name="btn_seal_investigation" value="<?php echo $btn_label;?>" type="button" class="<?php echo $class;?>" <?php echo $disable;?>><?php echo $btn_label;?></button>
				<?php 
				if("SEALED" == $sealed_label) {?>
					<button id="btn_get_pdf" name="btn_get_pdf" type="submit" value="Get it in pdf" class="<?php echo $class;?>">Get it in pdf</button>
					<?php 
				}?>
			  </div>
			</div>
		</form>
	<?php
	}

	
	
	if( isset($_POST['btn_get_pdf']) && $_POST['btn_get_pdf'] ) {
		// create new PDF document
			$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

		// Set document information
			$pdf->SetCreator(PDF_CREATOR);
			$pdf->SetAuthor('S1 System');
			$pdf->SetTitle('Investigation Details');
			$pdf->SetSubject('Investigation Details');
			// $pdf->SetKeywords('TCPDF, PDF, example, test, guide');

		// set default header data
			$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, "INVESTIGATION: ".$investigation_no, PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
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

		foreach( $arr_inv_pdf AS $key_inv_sections => $val_inv_sections ) {
			$cnt_invrows = 0;
			foreach( $val_inv_sections AS $key_arrinv => $val_arrinv ) {?>
				<?php 
				$orig_inv_heading_key 	= str_replace('inv_','investigation ',$key_inv_sections);
				$orig_inv_heading_key	= str_replace('_', ' ', $orig_inv_heading_key);
				$orig_inv_heading_key	= str_replace('env', 'environment', $orig_inv_heading_key);
				$orig_inv_heading_key	= str_replace('contri', 'Contributing ', $orig_inv_heading_key);
				$inv_heading_key		= "<p><h3>".ucwords($orig_inv_heading_key)."</h3></p>";
				if( $cnt_invrows==0 ) {
					echo $inv_heading_key;
				}
				?>
					<table border="1" cellpadding="1" style="width:100%;">
						<?php 
						foreach( $val_arrinv AS $key_arrinv => $val_arrinv ) {
							if( !in_array($key_arrinv, array('id','in_investigation_id'))) {?>
								<tr>
									<th>
										<?php $orig_invfield_key 	= str_replace(array('st_','in_'), '', $key_arrinv);
										$invfield_key 	= str_replace('_', ' ', $orig_invfield_key);
										$invfield_key	= str_replace('dt', 'Date of', $invfield_key);
										echo $invfield_key		= ucwords($invfield_key);?>
									</th>
									<td>
										<?php 
										if("picture" == $orig_invfield_key) {
											if( file_exists(FCPATH.$this->path_upload_investigation_photoes.$val_arrinv) && $val_arrinv ) {
												echo '<img src="uploads/investigation_photoes/'.$val_arrinv.'" border="1" width="70" height="65">';
											}
											else {?>
												<img border="1" width="70" height="65" src="<?php echo $base;?>img/default.png" />
												<?php 
											}
										}
										else if( "picture_attached" == $orig_invfield_key ) {
											if( file_exists(FCPATH.$this->path_upload_material_involved.$val_arrinv) && $val_arrinv ) {
												echo '<img src="uploads/material_involved/'.$val_arrinv.'" border="1" width="70" height="65">';
											}
											else {?>
												<img border="1" width="70" height="65" src="<?php echo $base;?>img/default.png" />
												<?php 
											}
										}
										else {
											if( is_array(json_decode($val_arrinv)) ) {
												echo implode(", ", json_decode($val_arrinv));
											}
											else {
												$arr_inj_body_parts = json_decode($val_arrinv);
												if( is_object($arr_inj_body_parts) ) {
													$arr_bodyparts_injured 		= $arr_inj_body_parts->body_parts_injured;
													$arr_type_bodyparts_injured = $arr_inj_body_parts->type_body_parts_injured;
													
													echo "Bodyparts Injured: ";
													echo (isset($arr_bodyparts_injured) && is_array($arr_bodyparts_injured)) ? implode(", ", $arr_bodyparts_injured) : '-';
													echo "<br>Bodyparts Injured Types: ";
													echo (isset($arr_type_bodyparts_injured) && is_array($arr_type_bodyparts_injured)) ? implode(", ", $arr_type_bodyparts_injured) : '-';
												}
												else {
													echo $val_arrinv;
												}
											}
										}
										?>
									</td>
								</tr>
								<?php
							}
						}?>
					</table>
				</p>
				<?php
				$cnt_invrows++;
			}
		}
	
		$pdf_contents = ob_get_contents();
		ob_end_clean();

		$pdf->writeHTML($pdf_contents, true, false, true, false, '');
		// Close and output PDF document
		// This method has several options, check the source code documentation for more information.
			$pdf->Output('pdf_investigation_'.$investigation_no.'.pdf', 'D');
	}
	?>
	</div>
</div>
<?php $this->load->view('center-leaderboard.php'); ?> 
</div><!--end class wrapper-->
</div><!--end div container-fluid-->
</div><!--end div homebg-->
<!-- Place in the <head>, after the three links -->

<!-- Start - For Datetime Picker -->
	<link rel="stylesheet" href="<?php echo $base;?>css/jquery-ui.css" />
	<script type="text/javascript" src="<?php echo $base;?>js/jquery-ui.js"></script>
	<script type="text/javascript" src="<?php echo $base;?>js/jquery-ui-timepicker.js"></script>
<!-- End - For Datetime Picker -->

<script type="text/javascript" src="<?php echo $base;?>js/common.js"></script>
<!--<script type="text/javascript" src="<?php echo $base;?>js/jquery.form.js"></script>-->
<script type="text/javascript" charset="utf-8">
	$('.datestamp').datetimepicker({
		dateFormat: "yy-mm-dd"		
	});
	
	$('.displaydate').datepicker({dateFormat: "yy-mm-dd"});

	jQuery.noConflict();

	$(window).load(function() {
		jQuery('.flexslider').flexslider({
			controlNav: false,
			prevText:"",
			nextText:""
		});
		var collapseCont = $(".module-inner:first-of-type");    
		collapseCont
			.delay(4000)
			.collapse(10000)
		collapseCont
			.prev("button")
			.delay(4000)
		.removeClass("collapsed")
	});
	
	var sizeof_vehicle = "<?php echo $sizeof_vehicle;?>";	
	if(sizeof_vehicle <= 0) {
		jQuery(window).load(function() {
			addMoreVehicleAccident("<?php echo $disabled;?>");
		});
	}
	else {
		checkNoOfRowsExists('vehicle_accident');
	}

	var sizeof_incident_workers = "<?php echo $sizeof_incident_workers;?>";
	if( sizeof_incident_workers <= 0) {
		jQuery(window).load(function() {
			addMoreIncidentWorkers("<?php echo $disabled;?>");
		});
	}
	else {
		checkNoOfRowsExists('incident_workers');
	}
	
	var sizeof_witness_report = "<?php echo $sizeof_witness_report;?>";
	if( sizeof_witness_report <= 0) {
		jQuery(window).load(function() {
			addMoreWitnessReport("<?php echo $disabled;?>");
		});
	}
	else {
		checkNoOfRowsExists('witness_report');
	}
	
	

	var sizeof_material_involved = "<?php echo $sizeof_material_involved;?>";
	if( sizeof_material_involved <= 0) {
		jQuery(window).load(function() {
			addMoreMaterialInvolved("<?php echo $disabled;?>");
		});
	}
	else {
		checkNoOfRowsExists('material_involved');
	}
	
	
	var sizeof_inj_workers = "<?php echo $sizeof_inj_workers;?>";
	if( sizeof_inj_workers <= 0) {
		addMoreInjuredWorker("<?php echo $disabled;?>");
	}
	else {
		checkNoOfRowsExists('injury_report');
	}

	var sizeof_other_contribfact = "<?php echo $sizeof_other_contribfact;?>";
	if( sizeof_other_contribfact <= 0) {
		jQuery(window).load(function() {
			addMoreContribFactors("<?php echo $disabled;?>");
		});
	}
	else {
		checkNoOfRowsExists('possible_contrib_factors');
	}

	var sizeof_recommended_action = "<?php echo $sizeof_recommended_action;?>";
	if( sizeof_recommended_action <= 0) {
		jQuery(window).load(function() {
			addMoreRecommendedActions("<?php echo $disabled;?>");
		});
	}
	else {
		checkNoOfRowsExists('recommended_actions');
	}

	var sizeof_inv_photos = "<?php echo $sizeof_inv_photos;?>";
	if( sizeof_inv_photos <= 0) {
		jQuery(window).load(function() {
			addMoreInvPhotoes("<?php echo $disabled;?>");
		});
	}
	else {
		checkNoOfRowsExists('inv_photoes');
	}
</script>

<script type="text/javascript" src="<?php echo $base;?>plugin/multifileupload/js/uploader.js"></script>
<!--<link type="text/css" rel="stylesheet" href="<?php echo $base;?>plugin/multifileupload/css/uploader.css" />-->
<?php $this->load->view('footer_admin');?>