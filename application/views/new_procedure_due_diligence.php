<?php 
$proc_regulations = $this->users->getMetaDataList('proc_due_deligence', 'in_created_by="'.$this->sess_userid.'" AND in_procedure_id="'.$procedure_id.'"', '', 'st_regulation_data');
$proc_regulations = (isset($proc_regulations[0]['st_regulation_data']) && $proc_regulations[0]['st_regulation_data']) ? json_decode($proc_regulations[0]['st_regulation_data']) : array();
// common::pr($proc_regulations);
?>
<div id="modalDueDiligence" class="metro modal hide fade model-procedures" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-header">
    <h4 id="myModalLabel">DUE DILIGENCE<i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal"></i></h4>
</div>
<div class="modal-body" >
    <!--BEGIN BODY MODAL -->
     <div class="" style="padding:5px 10px 0px 10px;box-shadow: none;">
		<form method="post" name="frm_proc_due_diligence" id="frm_proc_due_diligence" action="<?php echo $base."admin/my_created_procedures_metro?id=".$procedure_id."&type=".$procedure_type;?>">
			<div class="row-fluid">
            <label>DUTIES AND RESPONSIBILITIES</label>
            <div class="tab-control" data-effect="fade" data-role="tab-control">
					<ul class="tabs">
						<li class="active user_tab"><a href="#worker"><i class="icon-user-2 on-left-more"></i>Worker</a></li>
						<li class="user_tab"><a href="#supervisor"><i class="icon-accessibility on-left-more"></i> Supervisor</a></li>
						<li class="user_tab"><a href="#employer"><i class="icon-user-3 on-left-more"></i> Employer</a></li>
						<span id="proc_user_tab" class=""></span>
					</ul>
					<div class="frames">
						<div class="frame" id="worker">
						<?php 
							$duedilig_prev_worker = "<p class='s1content_subtitle'>OHSA s.28 and s.66(1)</p>";
							$duedilig_prev_worker .= "<p class='s1content_body_section'>As a worker you have the responsibility to ensure:</p>";
							$duedilig_prev_worker .= "<ul class='s1content_ul_disc'><li>You wear the appropriate PPE for the task being performed and that it is in good condition.</li>";
							$duedilig_prev_worker .= "<li>You are aware of all health and safety hazards in the workplace</li>";				
							$duedilig_prev_worker .= "<li>Work safely and ensure you follow all the safety rules and regulations required by law</li>";
							$duedilig_prev_worker .= "<li>Report to your supervisor if you’ve been injured at work immediately</li>";
							$duedilig_prev_worker .= "<li>Report to management any hazard that you see in the workplace</li></ul>";
							$duedilig_prev_worker .= "<p class='s1content_body_section'><strong>Note:</strong> Workers have been charged for failing to tell Management of a hazard in the workplace directly relating to an injury or fatality of another worker.</p>";
							$duedilig_prev_worker .= "<p class='s1content_body_section'><strong>Max Penalty:</strong> $25,000 per charge and possible Jail time</p>";
							echo $duedilig_prev_worker;
							?>
						</div>
						<div class="frame" id="supervisor">
							<?php 
							$duedilig_prev_supervisor = "<p class='s1content_subtitle'>OHSA s.27 s.66(2) and Bill C-45 (criminal)</p>";
							$duedilig_prev_supervisor .= "<p class='s1content_body_section'>As a Supervisor you are responsible for the safety of all the workers under your supervision.</p>";
							$duedilig_prev_supervisor .= "<ul class='s1content_ul_disc'><li>Ensuring health and safety policies and procedures for the workplace are created and communicated to workers</li>";
							$duedilig_prev_supervisor .= "<li>Ensuring workers, follow the law and the company safety requirements</li>";				
							$duedilig_prev_supervisor .= "<li>Making sure workers work safely and use the required safety equipment</li>";
							$duedilig_prev_supervisor .= "<li>Informing workers of the actual and potential health and safety risks and hazards in their work area, and show them how to work safely.</li>";
							$duedilig_prev_supervisor .= "<li>Ensuring workers are adequately trained to perform their jobs safely.</li>";
							$duedilig_prev_supervisor .= "<li>Taking all reasonable precautions to protect the health and safety of workers.</li></ul>";
							echo $duedilig_prev_supervisor;
							?>

						</div>
						<div class="frame" id="employer">
							<?php 
							$duedilig_prev_employer = "<p class='s1content_subtitle'>OHSA s.25, s.26 s.66(2) and Bill C-45 (criminal)</p>";
							$duedilig_prev_employer .= "<ul class='s1content_ul_disc'><li>Ensuring health and safety policies and procedures for the workplace are created and communicated to workers</li>";
							$duedilig_prev_employer .= "<li>Ensuring workers are adequately trained </li>";				
							$duedilig_prev_employer .= "<li>Making sure workers are informed of the hazards and dangers in the workplace.</li>";
							$duedilig_prev_employer .= "<li>Ensuring adequate PPE is provided, maintained and used appropriately</li>";
							$duedilig_prev_employer .= "<li>Taking all reasonable precautions to protect the health and safety of workers</li>";
							$duedilig_prev_employer .= "<li>Ensuring that tools, equipment and materials are  maintained in good condition</li>";
							$duedilig_prev_employer .= "<li>Providing information, instruction and supervision to protect worker health and safety</li></ul>";
							echo $duedilig_prev_employer;
							?>

						</div>
					</div>
				</div>
			</div>
			<div class="row-fluid"><label>REGULATION</label></div>
	        <table align="center" id="id_tbl_regulation" width="100%">
					<?php 
					if( sizeof($proc_regulations) && $proc_regulations[0] ) {
						foreach( $proc_regulations AS $key_proc_reg => $val_proc_reg ) {
							$cntreg 	= ($key_proc_reg+1);
							$regno 		= ($val_proc_reg->regno) ? $val_proc_reg->regno : '';
							$section 	= ($val_proc_reg->section) ? $val_proc_reg->section : '';
							$subsection = ($val_proc_reg->subsection) ? $val_proc_reg->subsection : '';
							$item 		= ($val_proc_reg->item) ? $val_proc_reg->item : '';
							$subitem 	= ($val_proc_reg->subitem) ? $val_proc_reg->subitem : '';
							
							if( $section ) {
								$where_regcontents = 'st_regulation_number="'.$regno.'"';
								($section) ? $where_regcontents .= ' AND st_section="'.$section.'"' : '';
								($subsection) ? $where_regcontents .= ' AND st_subsection="'.$subsection.'"' : '';
								($item) ? $where_regcontents .= ' AND st_item="'.$item.'"' : '';
								($subitem) ? $where_regcontents .= ' AND st_subitem="'.$subitem.'"' : '';

								$rows_regcontents = $this->users->getMetaDataList('regulation_sections', $where_regcontents, '', 'in_regulation_content_id, st_content');
								// common::pr($rows_regcontents);die;
								foreach( $rows_regcontents AS $key_rows_regcontents => $val_rows_regcontents ) {
									$regulation_content_id	= isset($rows_regcontents[$key_rows_regcontents]['in_regulation_content_id']) ? $rows_regcontents[$key_rows_regcontents]['in_regulation_content_id'] : '';
									$reg_contents 	= isset($rows_regcontents[$key_rows_regcontents]['st_content']) ? $rows_regcontents[$key_rows_regcontents]['st_content'] : '';
									
									$arr_duereg['regulation'][$regulation_content_id][$key_rows_regcontents]['reg_no'] 	= $regno;
									$arr_duereg['regulation'][$regulation_content_id][$key_rows_regcontents]['reg_content_id'] = $regulation_content_id;
									$arr_duereg['regulation'][$regulation_content_id][$key_rows_regcontents]['section'] = $section;
									$arr_duereg['regulation'][$regulation_content_id][$key_rows_regcontents]['subsection'] = $subsection;
									$arr_duereg['regulation'][$regulation_content_id][$key_rows_regcontents]['item'] 	= $item;
									$arr_duereg['regulation'][$regulation_content_id][$key_rows_regcontents]['subitem'] = $subitem;
									$arr_duereg['regulation'][$regulation_content_id][$key_rows_regcontents]['contents']= $reg_contents;
								}
							}
							if( isset($arr_duereg) ) {
								// common::pr( $arr_duereg );
								$this->session->set_userdata('arr_duereg', $arr_duereg);
							}?>
							<tr>
								<td>
							<?php 
							if( isset($arr_duereg) ) {?>
								<a href='#modalRegContents<?php echo $cntreg;?>' class="s1content_link" data-toggle="modal">Regulation Details</a>
								<?php
							}?>
							</td>
							</tr>
							<tr id="id_tr_regulation<?php echo $cntreg;?>">
								<td>
									<a style="float:right;" href="javascript:void(0);" onclick="javascript:deleteSection('id_tr_regulation<?php echo $cntreg;?>');" title="Delete Regulation">Delete</a>
									<div class="control-group">
									  <div class="controls">
										<?php 
										$rows_regno = $this->users->getMetaDataList("regulation_contents",'1','','st_regulation_number, st_title', 'st_regulation_number');
										?>
										<input type="text" placeholder="Regulation Number" value="<?php echo $regno;?>" name="cmb_regulation_number[]" id="cmb_regulation_number<?php echo $cntreg;?>" list="cmb_regno_list<?php echo $cntreg;?>" onblur="getSection('cmb_regulation_number<?php echo $cntreg;?>','cmb_section_list<?php echo $cntreg;?>', '<?php echo $cntreg;?>');">
										<datalist id="cmb_regno_list<?php echo $cntreg;?>">
											<?php 
											foreach($rows_regno AS $reg) {?>
												<option value="<?php echo $reg['st_regulation_number'];?>"><?php echo $reg['st_regulation_number']." - ".$reg['st_title'];?></option>
												<?php 
											}?>
										</datalist>
									  </div>
									</div>
									<div class="control-group">
									  <div class="controls">
										<?php $rows_section = $this->users->getMetaDataList("regulation_sections", 'st_regulation_number="'.$regno.'"', 
											'ORDER BY 
											CAST(st_section AS UNSIGNED)=0, CAST(st_section AS UNSIGNED), LEFT(st_section,1), 
											CAST(MID(st_section,2) AS UNSIGNED),ABS(st_section)', 
											"st_section", "st_section");?>

										<input type="text" placeholder="Section" value="<?php echo $section;?>" name="cmb_section[]" id="cmb_section<?php echo $cntreg;?>" list="cmb_section_list<?php echo $cntreg;?>" onblur="getSubsection('cmb_section<?php echo $cntreg;?>','cmb_subsection_list<?php echo $cntreg;?>', '<?php echo $cntreg;?>');">
										<datalist id="cmb_section_list<?php echo $cntreg;?>">
										<?php 
										foreach($rows_section AS $val_section) {
											if( $val_section['st_section'] ) {?>
												<option value="<?php echo $val_section['st_section'];?>"><?php echo $val_section['st_section'];?></option>
											<?php  
											}
										}?>
										</datalist>

										<?php $rows_subsection = $this->users->getMetaDataList("regulation_sections",
												'st_regulation_number="'.$regno.'" AND st_section="'.$section.'"'
												, 'ORDER BY 
												CAST(st_subsection AS UNSIGNED)=0, CAST(st_subsection AS UNSIGNED), LEFT(st_subsection,1), 
												CAST(MID(st_subsection,2) AS UNSIGNED),ABS(st_subsection)', 'st_subsection', 'st_subsection');?>

										<input type="text" placeholder="Sub Section" value="<?php echo $subsection;?>" name="cmb_subsection[]" id="cmb_subsection<?php echo $cntreg;?>" list="cmb_subsection_list<?php echo $cntreg;?>" onblur="getItem('cmb_subsection<?php echo $cntreg;?>','cmb_item_list<?php echo $cntreg;?>', '<?php echo $cntreg;?>');">
										<datalist id="cmb_subsection_list<?php echo $cntreg;?>">
											<?php 
											foreach($rows_subsection AS $val_subsec) {
												if( $val_subsec['st_subsection'] ) {?>
													<option value="<?php echo $val_subsec['st_subsection'];?>"><?php echo $val_subsec['st_subsection'];?></option>
												<?php 
												}
											}?>
										</datalist>
									  </div>
									</div>
									<div class="control-group">
									  <div class="controls">
										<?php $rows_item = $this->users->getMetaDataList("regulation_sections", 
												'st_regulation_number="'.$regno.'" AND st_section="'.$section.'"
												AND st_subsection="'.$subsection.'"'
												, 'ORDER BY CAST(st_item AS UNSIGNED)=0, CAST(st_item AS UNSIGNED), LEFT(st_item,1), 
												CAST(MID(st_item,2) AS UNSIGNED),ABS(st_item)', 
												'st_item', 'st_item');?>
										<input type="text" placeholder="Item" value="<?php echo $item;?>" name="cmb_item[]" id="cmb_item<?php echo $cntreg;?>" list="cmb_item_list<?php echo $cntreg;?>" onblur="getSubitem('cmb_item<?php echo $cntreg;?>','cmb_subitem<?php echo $cntreg;?>', '<?php echo $cntreg;?>');">
										<datalist id="cmb_item_list<?php echo $cntreg;?>">
											<?php 
											foreach($rows_item AS $val_item) {
												if( $val_item['st_item'] ) {?>
													<option value="<?php echo $val_item['st_item'];?>"><?php echo $val_item['st_item'];?></option>
												<?php 
												}
											}?>
										</datalist>
										<?php $rows_subitem = $this->users->getMetaDataList("regulation_sections",
												'st_regulation_number="'.$regno.'" AND st_section="'.$section.'"
												AND st_subsection="'.$subsection.'" AND st_item="'.$item.'"'
												, 'ORDER BY CAST(st_subitem AS UNSIGNED)=0, CAST(st_subitem AS UNSIGNED), LEFT(st_subitem,1), 
												CAST(MID(st_subitem,2) AS UNSIGNED),ABS(st_subitem)','st_subitem', 'st_subitem');?>
										<input type="text" placeholder="Sub Item" value="<?php echo $subitem;?>" name="cmb_subitem[]" id="cmb_subitem<?php echo $cntreg;?>" list="cmb_subitem_list<?php echo $cntreg;?>">
										<datalist id="cmb_subitem_list<?php echo $cntreg;?>">
											<?php 
											foreach($rows_subitem AS $val_subitem) {
												if( $val_subitem['st_subitem'] ) {?>
													<option value="<?php echo $val_subitem['st_subitem'];?>">
														<?php echo $val_subitem['st_subitem'];?>
													</option>
												<?php 
												}
											}?>
										</datalist>
									  </div>
									</div>
								</td>
							</tr>
							<?php 
						}
					}
					else {?>
						<tr>
							<td>
								<div class="control-group">
								  <div class="controls">
									<input type="text" value="" placeholder="Regulation Number" name="cmb_regulation_number[]" id="cmb_regulation_number1" list="cmb_regno_list1" onblur="getSection('cmb_regulation_number1','cmb_section_list1',1);">
									<datalist id="cmb_regno_list1"></datalist>
								  </div>
								</div>
								<div class="control-group">
								  <div class="controls">
									<input type="text" value="" placeholder="Section" name="cmb_section[]" id="cmb_section1" list="cmb_section_list1" onblur="getSubsection('cmb_section1','cmb_subsection_list1',1);">
									<datalist id="cmb_section_list1"></datalist>
									<input type="text" value="" placeholder="Sub Section" name="cmb_subsection[]" id="cmb_subsection1" list="cmb_subsection_list1" onblur="getItem('cmb_subsection1','cmb_item_list1',1);">
									<datalist id="cmb_subsection_list1"></datalist>
								  </div>
								</div>
								<div class="control-group">
								  <div class="controls">
								    <input type="text" value="" placeholder="Item" name="cmb_item[]" id="cmb_item1" list="cmb_item_list1" onblur="getSubitem('cmb_item1','cmb_subitem_list1',1);">
									<datalist id="cmb_item_list1"></datalist>									
									<input type="text" value="" placeholder="Sub Item" name="cmb_subitem[]" id="cmb_subitem1" list="cmb_subitem_list1">
									<datalist id="cmb_subitem_list1"></datalist>
								  </div>
								</div>
							</td>
						</tr>
						<script type="text/javascript">$(document).ready(function () { getRegNoForProcedure('cmb_regno_list1'); });</script>
					<?php
					}?>
			</table>
	

			<div class="textright"><input data-click="transform" type="button" class="icon-plus-2" value="Add Regulation" onclick="javascript: addMoreRegItemForProcedure(1);" /></div>
			<div class="inline text-center">
				<button class="image-button primary" name="btn_save_due_diligence" id="btn_save_due_diligence" type="button">Save<i class="icon-enter bg-cobalt"></i></button>
				<button class="image-button danger btn-cancel">Cancel<i class="icon-cancel-2 bg-red"></i></button>
			</div>
			<input type="hidden" name="hidn_procedure_section" value="due_diligence">
			<input type="hidden" name="hidn_errmsg_duedilegence" id="hidn_errmsg_duedilegence" value="">
		</form>
     </div>
    <!--END BODY MODAL -->  
</div>
<div class="modal-footer"><button class="btn" data-dismiss="modal">Close</button></div>
</div>
			
<?php

foreach( $proc_regulations AS $key_proc_reg => $val_proc_reg ) {
	$cntreg 	= ($key_proc_reg+1);
	$regno 		= ($val_proc_reg->regno) ? $val_proc_reg->regno : '';?>
	<div id='modalRegContents<?php echo $cntreg;?>' class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-header">
			<h4 id="myModalLabel">
				<img width="30px" src="<?php echo $base;?>img/library-page/duediligence_icon.png">O. Reg <?php echo $regno;?>
				<i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal"></i>
			</h4>
		</div>
		<div class="modal-body">
			<div class="row-fluid">
			<?php 
			if( isset($arr_duereg['regulation']) && is_array($arr_duereg['regulation']) ) {
				$cnt_subsection=0;
				foreach ( $arr_duereg['regulation'] AS $key_content_id => $val_reg_contents) {
					echo "<ul>";
					foreach ( $val_reg_contents AS $val_regilation) {
						$reg_no		= isset($val_regilation['reg_no']) ? $val_regilation['reg_no'] : '';
						$section	= isset($val_regilation['section']) ? $val_regilation['section'] : '';
						$subsection	= isset($val_regilation['subsection']) ? $val_regilation['subsection'] : '';
						$contents	= isset($val_regilation['contents']) ? $val_regilation['contents'] : '';
						
						$reg_data 	= $this->regulation->getRegulationTitleFromContentId($reg_no,'');
						$regulation_title 	= isset($reg_data['regulation_title'])?$reg_data['regulation_title']:'';
						echo "<br><p><b> O. Reg ".$reg_no." - ".$section." - ".$regulation_title."</b></p>";
						
						if( isset($section) ) {
						 $reg_data = $this->regulation->getRegulationTitleFromContentId($reg_no,$key_content_id);
						 $regulation_part 	= isset($reg_data['regulation_part'])?$reg_data['regulation_part']:'';
						 $regulation_subpart = isset($reg_data['regulation_subpart'])?$reg_data['regulation_subpart']:'';
						 $disp_section 	= ($section) ? "Sec. ".trim($section) : '';
						 $disp_subsection = ($subsection) ? "(".trim($subsection).")" : '';
						 $cnt_subsection++;
						}
						?>
						<li class="padt10">
							<?php echo "<b>".$disp_section.$disp_subsection." - ".$regulation_part." ".$regulation_subpart."<br>Regulation Contents: <br></b>".$contents;?>
						</li>
						<?php												
					}
					echo "</ul>";
				}
			}?>
			</div>							
		</div>
		<div class="modal-footer"><button class="btn" data-dismiss="modal">Close</button></div>
	</div>
<?php
}
?>

<script type="text/javascript" src="<?php echo $base;?>js/common.js"></script>
<script type="text/javascript" src="<?php echo $base;?>js/regulation.js"></script>
<script type="text/javascript">
	$("li.user_tab").click(function(){
		if( $(this).hasClass('active') ) {
			console.log($(this).find("a").attr("href"));
			$("#proc_user_tab").attr('class', $(this).find("a").attr("href"));
		}
	});
	
	// ===== SCRIPT TO ACTIVATE TOOLTIPS =====
	// ===== THE CONTENT OF THE TOOLTIP IS DEFINED BY THE "TITLE" ATTRIBUTE OF THE ELEMENT 
	$('ol').css('list-style','decimal');
	$('.modal-header').css('background-color','gray');
	$('#modalDueDiligence').css('width','550px');
	$('.icon-enter').css('padding','3px');
	$('.icon-cancel-2').css('padding','3px 4px 2px 2px');

	$('#btn_save_due_diligence').click(function() {
		$errmsg_duedilegence = $("#hidn_errmsg_duedilegence").val();
		if( $errmsg_duedilegence != '' ) {
			alert( "Please check the Invalid value(s) selected" );
			return false;
		}
		$.post(js_base_path+'ajax/ajax_set_get_page_points', {'pointPageId':11, 'pointPageSectionId':7, 
							'pointPageSubSectionId':'<?php echo $procedure_id;?>', 'visitedSection':'procedures'}, 
			function(data) {
				$("#modalDueDiligence").modal("hide");
				$("#id_modal_procsaved").modal("show");
				setTimeout(function(){ $("#frm_proc_due_diligence").submit(); }, 2000);
			}
		);
	});
</script>