<?php $this->load->view('header_admin');

/*$str 		= "http://lacvortex.lostartsna.org/autologin/name/eEsTzaHP6sHDMJlwE04zYaQMDZcI+48lB3/nXwfTKtA=";
$str2 		= substr(strrchr($str, "/"),1);
$str1 		= rtrim(rtrim($str,$str2),"/");
$final_str 	= ($str1.$str2);
echo $final_str;*/

$inv_form_id = isset($_GET['invformid']) ? (int)$_GET['invformid'] : '';

if( (int)$inv_form_id ) {
// Get Investigation Number from Library Id
	$rows_inv_form = $this->users->getMetaDataList( 'inv_investigation_forms', 'in_inv_form_id = "'.$inv_form_id.'"', '', 'st_inv_form_no' );
	$investigation_no = $rows_inv_form[0]['st_inv_form_no'];
}
$this->session->set_userdata('investigation_no', $investigation_no);

$inv_scope = $this->investigation->checkInvestigationScope($inv_form_id);
$disabled = ("EDIT" == $inv_scope) ? "" : "disabled";
// $disabled = '';
?>
<script type="text/javascript">
var js_invform_id = '<?php echo $inv_form_id;?>';
</script>

<link rel="stylesheet" href="<?php echo $base;?>css/jquery-ui.css" />
<script type="text/javascript" src="<?php echo $base;?>js/jquery-ui.js"></script>
<div class="homebg" >
	<div class="container">
		<div class="wrapper">
			<h3 align="center"> INVESTIGATION: <?php echo $investigation_no;?></h3>
			<div class="union-container">
				<div class="module">
					<h5 class="title">INVESTIGATOR(S)<span href="#search-map-collapse" id="id_investigator_collapsed" data-toggle="collapse" class="collapse-basic pull-right collapsed"></span></h5>
						<!--------START - ADD INVESTIGATOR-------->
							<div id="search-map-collapse" class="collapse">
								<div  class="heading">
									<!-- NOTE: REMOVE POSITION RELATIVE FROM DIV WHEN DONE USING DUMMY MAP POINTS -->
									<div class="map-inner" style="position:relative">	
										<div class="heading">
										  <form class="form-large" name="frm_investigator" id="frm_investigator" action="" method="post">
											<?php 
											$where = "in_investigation_id='".$inv_form_id."'";
											$rows_main_investigators = $this->users->getMetaDataList('inv_investigator',$where,'','*');
											$sizeof_main_investigators = sizeof($rows_main_investigators);
											$st_job_title = $st_investigator_name = ''; 
											if( isset($rows_main_investigators) && $sizeof_main_investigators ) {
												$disabled = "disabled";
												foreach( $rows_main_investigators AS $key_main_investigators => $val_main_investigators ) 
												{
													$id_main_investigators 	= isset($val_main_investigators['id']) ? $val_main_investigators['id'] : '';
													$st_investigator_name 	= isset($val_main_investigators['st_investigator_name']) ? $val_main_investigators['st_investigator_name'] : '';
													$st_job_title 			= isset($val_main_investigators['st_job_title']) ? $val_main_investigators['st_job_title'] : '';
												}
											}
											?>
										   <div class="row-fluid">
												<div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>NAME</label></div>
												<div class="span7 input-append">
													<input type="text" name="txt_investigator_name" value="<?php echo $st_investigator_name;?>" <?php echo $disabled;?> onkeydown="javascript:getUsers('txt_investigator_name');" id="txt_investigator_name" class="required selectpicker form-large-select span10 container-width"  placeholder="FULL NAME"/>
												</div><div class="clear"></div>
											</div>
										   <div class="row-fluid">
											  <div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>POSITION</label></div>
											  <div class="span7 input-append">
												<input type="text" align="right" name="txt_investigator_jobtitle" value="<?php echo $st_job_title;?>" <?php echo $disabled;?> id="txt_investigator_jobtitle" class="required selectpicker form-large-select span10 container-width" placeholder="JOB TITLE"/>
											  </div>
										  </div>
										  </form>
										  <?php 
										  if( "" == $disabled ) {?>
											  <div class="row-fluid">
												<div class="pull-right">
													<button id="btn_save_investigator" type="submit" onclick="javascript:saveInvestigator('main_investigator', 'frm_investigator', 'search-map-collapse', 'id_investigator_collapsed');" class="mart10 btn btn-warning">SAVE</button>
												</div>
											  </div>
										  <?php 
										  }?>
										</div>
									</div>
								</div>
							</div>
						<!--------END - ADD INVESTIGATOR-------->
						
					<!--------START - Additional Workers in Investigation Team-------->
						<div class="search-map-collapse">
							<h5 class="title">Add additional workers part of the investigation team<span href="#search-map-collapse2" data-toggle="collapse" class="collapse-basic pull-right collapsed" id="id_workers_collapsed"></span></h5>
							<div id="search-map-collapse2" class="collapse">
								<div  class="heading ">
									<!-- NOTE: REMOVE POSITION RELATIVE FROM DIV WHEN DONE USING DUMMY MAP POINTS -->
									<div class="map-inner" style="position:relative">	
										<div class="heading">
											<input type="hidden" name="hidn_workers" id="hidn_workers" value="1">
											<form class="form-large" id="frm_inv_workers">
												<?php 
												$rows_inv_addi_workers = $this->users->getMetaDataList('inv_investigation_workers',"in_investigation_id='".$inv_form_id."'",'','*');
												$sizeof_inv_addi_workers = sizeof($rows_inv_addi_workers);
												$st_worker_job_title = $st_worker_name = ''; 
												?>
												<div id="id_inv_worker_bucket">
													<?php 
													if( isset($rows_inv_addi_workers) && $sizeof_inv_addi_workers ) {
														$disabled = "disabled";
														foreach( $rows_inv_addi_workers AS $key_inv_addi_workers => $val_inv_addi_workers ) 
														{
															$id_inv_addi_worker 	= isset($val_inv_addi_workers['id']) ? $val_inv_addi_workers['id'] : '';
															$st_worker_name 	= isset($val_inv_addi_workers['st_worker_name']) ? $val_inv_addi_workers['st_worker_name'] : '';
															$st_worker_job_title 			= isset($val_inv_addi_workers['st_worker_job_title']) ? $val_inv_addi_workers['st_worker_job_title'] : '';
															?>
															<div id="id_div_investigation_workers<?php echo ($key_inv_addi_workers+1);?>" class="cls_investigation_workers">
																<div class="row-fluid">
																	<div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>NAME</label></div>
																	<div class="span7 input-append">
																		<input type="text" value="<?php echo $st_worker_name;?>" name="txt_inv_worker_name[<?php echo $id_inv_addi_worker;?>]" onkeydown="javascript:getUsers('txt_inv_worker_name<?php echo ($key_inv_addi_workers+1);?>');" <?php echo $disabled;?> id="txt_inv_worker_name1" class="container-width selectpicker form-large-select span10"  placeholder="FULL NAME"/>
																	</div>
																</div>
																<div class="row-fluid">
																	<div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>POSITION</label></div>
																	<div class="span7 input-append"><input type="text" value="<?php echo $st_worker_job_title;?>" name="txt_inv_worker_jobtitle[<?php echo $id_inv_addi_worker;?>]" id="txt_inv_worker_jobtitle <?php echo ($key_inv_addi_workers+1);?>" <?php echo $disabled;?> class="selectpicker form-large-select span10 container-width"  placeholder="JOB TITLE"/></div>
																</div>
															</div>
															<?php
														}
													}
													else {?>
														<div id="id_div_investigation_workers1" class="cls_investigation_workers">
															<div class="row-fluid">
																<div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>NAME</label></div>
																<div class="span7 input-append">
																	<input type="text" name="txt_inv_worker_name[]" onkeydown="javascript:getUsers('txt_inv_worker_name1');" <?php echo $disabled;?> id="txt_inv_worker_name1" class="selectpicker form-large-select span10"  placeholder="FULL NAME"/>
																</div>
															</div>
															<div class="row-fluid">
																<div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>POSITION</label></div>
																<div class="span7 input-append">
																	<input type="text" name="txt_inv_worker_jobtitle[]" id="txt_inv_worker_jobtitle1" <?php echo $disabled;?> class="selectpicker form-large-select span10 container-width"  placeholder="JOB TITLE"/>
																</div>
															</div>
														</div>
														<?php
													}
													?>
												</div>
												<?php 
													if( "" == $disabled ) {?>
														<div class="row-fluid">
															<a id="btn_save_investigator" onclick="javascript:saveInvestigator('investigation_workers', 'frm_inv_workers', 'search-map-collapse2', 'id_workers_collapsed', 'frm_inv_workers');" class="btn btn-warning pull-right">SAVE</a>
															<a id="btn_add_worker" onclick="addMoreWorkers();" class="btn btn-warning pull-right">Add New</a>
															<button type="button" class="btn fr btn_investigation_workers" onclick="javascript:deleteInvestigationSection('investigation_workers');">Delete</button>
														</div>
													<?php 
													}?>
											</form>
											<script type="text/javascript">
												jQuery(window).load(function() {checkNoOfRowsExists('investigation_workers');});
											</script>
										</div>
									</div>
								</div>
							</div>
						</div>
					<!--------END - Additional Workers in Investigation Team-------->


					<div class="module">
						<!--------START SEARCH FORM-------->
							<div class="search">
								<form method="post" id="filterfrm">
								<fieldset>
									 <div class="controls controls-row ">
										<input type="text" name="txt_worker_text" id="txt_worker_text" class="span5 container-width"  placeholder="SEARCH"/>
										<button class="span1 btn btn-warning" id="btn-go"  type="button" >Go!</button>
									 </div>
								</fieldset>
								</form>
							</div>
						<!--------END SEARCH FORM-------->

						<!--------START SEARCH RESULST LIST-------->
							<div style="display:none;" id="img_data_loader" align="center"><img width="65" height="65" src="<?php echo $base."img/loading_icon.gif";?>"></div>
							<div class="results">
								<!-- AJAX investigation workers search-->
								<?php echo "<h5>".$display_msg."</h5>";?>
							</div>
						<!--------END SEARCH RESULTS LIST-------->
						<?php 
						if( "" == $disabled ) {?>
							<div>
								<button id="btn_save_investigator" type="submit" onclick="javascript:saveInvestigator('COVER_NEXT', 'frm_investigator', 'search-map-collapse', 'id_investigator_collapsed');" class="btn btn-warning btn-large pull-right">NEXT</button>
							</div>
						<?php
						}
						else {?>
							<div>
								<a href="<?php echo $base."admin/investigation_page?invformid=".$inv_form_id."&clientid=".$clientid;?>"><button id="btn_save_investigator" type="submit" class="btn btn-warning btn-large pull-right">NEXT</button></a>
							</div>
							<?php 
						}
						?>
					</div>
				</div>
			</div>
			<?php $this->load->view('center-leaderboard.php'); ?> 
		</div>
	</div>
</div>
<script type="text/javascript" src="<?php echo $base;?>js/common.js"></script>

<script type="text/javascript">
	$(document).on('click', '#btn-go', function(){
		$worker_text 	= $("#txt_worker_text").val();
		
		$("#img_data_loader").show();
		$(".results").hide();

		$.post(
			'<?php echo $base;?>ajax/ajaxSearchInvestigationWorkers',
			{'investigation_no': '<?php echo $inv_form_id;?>', 'txt_worker_text': $worker_text},
			function(data) {
				$(".results").show();
				$(".results").html(data);
				$("#img_data_loader").hide();
			}
		)
	});
</script>
<?php $this->load->view('footer_admin'); ?>