<?php 
(isset($_POST['procedure_id'])&&$_POST['procedure_id']) ? $procedure_id = $_POST['procedure_id'] : '';
(isset($_POST['procedure_status'])&&$_POST['procedure_status']) ? $procedure_status = $_POST['procedure_status'] : '';
?>
<div class="modal-header" style="background-color: gray;">
	<?php
	if( 'completed' != $procedure_status ) {?>
		<h4 id="myModalLabel">PREVIEW<i class="pull-right icon-cancel-2"  style="margin-right:10px;" data-dismiss="modal"></i></h4>
		<?php 
	}
	else {?>
		<h4 id="myModalLabel">PREVIEW<i class="pull-right icon-cancel-2" onclick='javascript:window.location.href="<?php echo $this->base."admin/mylibrary_procedures_metro";?>"' style="margin-right:10px;" data-dismiss="modal"></i></h4>
		<?php 
	}?>
</div>
<?php 
$from_lang 	= (''!=$this->session->userdata('procprev_fromlang')) ? $this->session->userdata('procprev_fromlang') : "en";
$to_lang 	= (''!=$this->session->userdata('procprev_tolang')) ? $this->session->userdata('procprev_tolang') : "en";
?>
<div class="modal-body" >
<div class="padding5 clearfix" id="google_translate_element">
	<?php echo $this->common->callLanguageSelectBox("cmb_procprev_lang", $to_lang, 'select-right');?>
</div>

    <!--BEGIN BODY MODAL -->
	<div style="display:none;" id="img_data_loader" align="center"><img width="65" height="65" src="<?php echo $this->base."img/loading_icon.gif";?>"></div>
	<div class="cls_proc_preview clearfix">
    <div class="" style="padding:5px 4px 0; box-shadow: none;">
  	<div class="accordion with-marker span8 clearfix" data-role="accordion" data-closeany="false">
    <!-- ******************* BEGIN PURPOSE SECTION ****************** -->
        <div class="accordion-frame">
            <a class="heading bg-red fg-white" href="#">PURPOSE</a>
			<?php 
			$rows_purpose 		= $this->users->getMetaDataList('proc_purpose', '', 
					'in_procedure_id="'.$procedure_id.'" AND in_created_by IN ("'.$this->sess_userid.'","12","9")', 'dt_purpose_date, st_purpose_title, st_purpose_description');
					
			$purpose_date 		= isset($rows_purpose[0]['dt_purpose_date']) ? $rows_purpose[0]['dt_purpose_date'] : '';
			$purpose_year		= ($purpose_date) ? date('Y',strtotime($purpose_date)) : '';
			$purpose_monthdate	= ($purpose_date) ? date('M - d',strtotime($purpose_date)) : '';
			$purpose_reg_date	= ($purpose_date) ? date('M  d, Y',strtotime($purpose_date)) : '';
			$purpose_title 		= isset($rows_purpose[0]['st_purpose_title']) ? $rows_purpose[0]['st_purpose_title'] : '';
			$purpose_description= isset($rows_purpose[0]['st_purpose_description']) ? $rows_purpose[0]['st_purpose_description'] : '';
			?>
            <div class="content">
                 <div class="row-fluid center">
					<div class="content">
						<h5><?php echo $purpose_reg_date;?></h5>
						<h3 class="purpose_title"><?php echo $purpose_title;?></h3>
					<h5 >Purpose </h5>
					<p class="purpose_description"><?php echo $purpose_description;?></p>
					</div>
                </div>
            </div>
        </div>
    <!-- ******************* END PURPOSE SECTION ****************** -->

    <!-- ******************* BEGIN RISK RATING/HAZARD SECTION ****************** -->            
        <div class="accordion-frame">
			<a class="href-risk-preview heading bg-red fg-white" href="#">RISK RATING/HAZARD</a>
				<div class="risk-preview">
					<div class="row-fluid center">
					<?php 
					$rows_risk 			= $this->users->getMetaDataList('proc_riskratings_hazards', '', 'in_procedure_id="'.$procedure_id.'" AND in_created_by IN ("'.$this->sess_userid.'","12","9")', 'st_risk_ratings, st_hazards_selected');
					$risk_ratings 		= isset($rows_risk[0]['st_risk_ratings']) ? json_decode($rows_risk[0]['st_risk_ratings']) : array();
					$hazards_selected 	= isset($rows_risk[0]['st_hazards_selected']) ? explode(",", $rows_risk[0]['st_hazards_selected']) : array();
					$cnt_ratings_prev = 0;
					if( sizeof($risk_ratings) ) {
						foreach( $risk_ratings AS $key_ratings => $val_ratings ) {
							switch ($cnt_ratings_prev){
								case 0: {
									$label = "Risk";
									$rating_description = "The possibility that something unpleasant or unwelcome will happen. (Oxford)";
									break;
								}
								case 1: {
									$label = "Probability";
									$rating_description = "The likelihood of something happening or being the case. (Oxford)";
									break;
								}
								case 2: {
									$label = "Severity";
									$rating_description = "(Of something bad or undesirable) very great; intense. (Oxford)";
									break;
								}
							}?>
							<label>
								<strong><?php echo $label;?></strong>
								<p><?php echo $rating_description;?></p>
							</label>
							<br />
							<div class="slider permanent-hint" data-role="slider" data-position="<?php echo $val_ratings;?>" data-accuracy="0" data-colors="green, green, yellow, red, red" data-show-hint="show" data-min="0" data-max="5">
							</div>
							<?php 
							$cnt_ratings_prev++;
						}
					}
					else {
						echo "<p>N/A</p>";
					}?>
					</div>
					<script>
					$(document).ready(function() {
						$(".risk-preview").hide();
						$(".href-risk-preview").click(function() {
							if( $(".risk-preview").css("display") == "block" ) {
								$(".risk-preview").hide();
							}
							else if( $(".risk-preview").css("display") == "none" ) {
								$(".risk-preview").show();
							}
						});
					});
					</script>
					<div class="row-fluid">
						<table class="table striped bordered hovered" id="tableRisk">
							<thead><tr><th class="text-left">Hazard List</th></tr></thead>
							<tbody>
								<?php 
								$cnt_ratings_prev = 0;
								if( sizeof($hazards_selected) ) {
									foreach( $hazards_selected AS $key_hazards => $val_hazards ) {?>
										<tr id="rlinehazard04"><td><?php echo strip_tags($val_hazards);?></td></tr>
										<?php
									}
								}
								?>
							</tbody>
						</table>
					</div>
				</div>
        </div>
    <!-- ******************* END RISK RATING/HAZARD SECTION ****************** -->

    <!-- ******************* BEGIN TRAINING SECTION ****************** -->                
        <div class="accordion-frame">
			<?php 
			$rows_training 	= $this->users->getMetaDataList('proc_training', '', 'in_procedure_id="'.$procedure_id.'" AND in_created_by IN("'.$this->sess_userid.'","12","9")', 'st_training_selected, st_training_user');
			?>
            <a class="heading  bg-red fg-white" href="#">TRAINING</a>
            <div class="content">
				<?php
				if( sizeof($rows_training) ) {
					foreach( $rows_training AS $key_training => $val_training ) {
						$training_selected 		= isset($val_training['st_training_selected']) ? $val_training['st_training_selected'] : '';
						$training_user 			= isset($val_training['st_training_user']) ? $val_training['st_training_user'] : '';
						$arr_training_selected	= $training_selected ? explode(",", $training_selected) : array();
						?>
						<div class="row-fluid">
							<h3><?php echo $training_user;?></h3>
						</div>
						<div class="row-fluid">
							<?php 
							if( sizeof($arr_training_selected) ) {
								foreach( $arr_training_selected AS $key_training_id => $val_training_id ) {
									$rows_training_name = $this->users->getMetaDataList('proc_trainings', '', 'in_training_id="'.$val_training_id.'"', 'st_training_name');
									$rows_training_name = $rows_training_name[0]['st_training_name'];?>
									<a href="#" id="" class="tile half-library bg-red fg-white"  data-click="transform" data-original-title="<?php echo $rows_training_name;?>">
										<span class="training"><?php echo $rows_training_name;?></span>
									</a>
									<?php
								}
							}
							else {
								echo "<p>N/A</p>";
							}
							?>
						</div>
					<?php
					}
				}
				else {
					echo "<p>N/A</p>";
				}?>
                <script type="text/javascript">
					$('.row-fluid').find("a").tooltip();
					$('.training').css({'font-size':'12px',
						'overflow': 'hidden',
						'text-overflow':'ellipsis',
						'padding':'5px',
						'white-space': 'nowrap',
						'display':'block',
						'padding-top':'15px'
					});
				</script>
            </div>
        </div>
     <!-- ******************* END TRAINING SECTION ****************** -->
	 
     <!-- ******************* BEGIN PPE SECTION ****************** -->
        <div class="accordion-frame">
            <a class="heading  bg-red fg-white" href="#">PPE</a>
			<?php 
			$rows_ppe_machinery = $this->users->getMetaDataList('proc_ppe_machinery', '', 'in_procedure_id="'.$procedure_id.'" AND in_created_by IN ("'.$this->sess_userid.'","12","9")', 'st_ppe_added, st_ppe_selected, st_machinery_added,  st_machinery_selected, st_machinery_contents');			
			?>
            <div class="content">
            	<div class="row-fluid">
                	<h3>PPE List</h3>
                </div>
                <div class="row-fluid">
					<?php
					$ppe_selected 	= (isset($rows_ppe_machinery[0]['st_ppe_selected']) && $rows_ppe_machinery[0]['st_ppe_selected']) ? json_decode($rows_ppe_machinery[0]['st_ppe_selected']) : array();
					$ppe_added 		= (isset($rows_ppe_machinery[0]['st_ppe_added']) && $rows_ppe_machinery[0]['st_ppe_added']) ? json_decode($rows_ppe_machinery[0]['st_ppe_added']) : array();
					$all_ppes		= array_merge( $ppe_selected, $ppe_added );
					
					if( sizeof($all_ppes) && $all_ppes[0] ) {
						foreach( $all_ppes AS $key_ppp_selected => $val_ppe_selected ) {?>
							<a href="#" id="" class="tile half-library bg-red fg-white "  data-click="transform" data-original-title="<?php echo $val_ppe_selected;?>">
								<span class="ppe-tile"><?php echo $val_ppe_selected;?></span>
							</a>
						<?php
						}
					}
					else {
						echo "<p>N/A</p>";
					}
					?>
            	</div>
                <script type="text/javascript">
					$('.row-fluid').find("a").tooltip();
					$('.ppe-tile').css({'font-size':'12px',
						'overflow': 'hidden',
						'text-overflow':'ellipsis',
						'padding':'5px',
						'white-space': 'nowrap',
						'display':'block',
						'padding-top':'15px'
						
					});
				</script>
            </div>
        </div>
     <!-- ******************* END PPE SECTION ****************** -->
	 
     <!-- ******************* BEGIN MACHINERY SECTION ****************** -->
        <div class="accordion-frame">
            <a class="heading  bg-red fg-white" href="#">MACHINERY</a>
            <div class="content">
             	<div class="row-fluid"><h3>Machinery List</h3></div>
                <div class="row-fluid">
					<?php
					$machinery_selected 	= (isset($rows_ppe_machinery[0]['st_machinery_selected']) && $rows_ppe_machinery[0]['st_machinery_selected']) ? json_decode($rows_ppe_machinery[0]['st_machinery_selected']) : array();
					$machinery_added 		= (isset($rows_ppe_machinery[0]['st_machinery_added']) && $rows_ppe_machinery[0]['st_machinery_added']) ? json_decode($rows_ppe_machinery[0]['st_machinery_added']) : array();
					$all_machinery		= array_merge( $machinery_selected, $machinery_added );
					if( sizeof($all_machinery) && $all_machinery[0] ) {
						foreach( $all_machinery AS $key_mac_selected => $val_mac_selected ) {?>
							<a href="#" id="" class="tile half-library bg-red fg-white "  data-click="transform" data-original-title="<?php echo $val_mac_selected;?>">
								<span class="machinery"><?php echo $val_mac_selected;?></span>
							</a>
							<?php
						}
					}
					else {
						echo "<p>N/A</p>";
					}?>
            	</div>
                <div class="row-fluid"><h3>Specific Manufacturer's Instructions</h3></div>
				<?php 
				$machinery_contents 	= isset($rows_ppe_machinery[0]['st_machinery_contents']) ? json_decode($rows_ppe_machinery[0]['st_machinery_contents']) : array();
				if( sizeof($machinery_contents) && $machinery_contents[0] ) {
					foreach( $machinery_contents AS $key_mac_contents => $val_mac_contents ) {?>
						<div class="row-fluid">
							<div class="content machinery_contents<?php echo $key_mac_contents;?>"><p><?php echo $val_mac_contents;?></p></div>
						</div>
					<?php
					}
				}
				else {
					echo "<p>N/A</p>";
				}
				?>
				
                <script type="text/javascript">
				$('.row-fluid').find("a").tooltip();
				$('.machinery').css({'font-size':'12px',
					'overflow': 'hidden',
					'text-overflow':'ellipsis',
					'padding':'5px',
					'white-space': 'nowrap',
					'display':'block',
					'padding-top':'15px'
					
				});
				</script>   
            </div>
        </div>
	<!-- ******************* END MACHINERY SECTION ****************** -->

    <!-- ******************* BEGIN PROCEDURE SECTION ****************** -->
        <div class="accordion-frame">
            <a class="heading  bg-red fg-white" href="#">PROCEDURES</a>
            <div class="content">
                <div class="row-fluid"><h3>TIPS</h3></div>
				<?php 
				$rows_procedures 	= $this->users->getMetaDataList('proc_procedures', '', 'in_procedure_id="'.$procedure_id.'" AND in_created_by IN ("'.$this->sess_userid.'","12","9")', 'st_procedure_overview, st_procedure_items');
				$procedure_overview = isset($rows_procedures[0]['st_procedure_overview']) ? $rows_procedures[0]['st_procedure_overview'] : "N/A";
				?>
                <div class="row-fluid">
				<div class="content">
					<p class=""><?php echo $procedure_overview;?></p> <!-- class=procedure_tips was creating the issue while showing the TIPS -->
				</div>
				</div>
				<?php 
				/* Commented as per the Item81: OperationalTest-Tasks-May-14-2015.xlsx */?>
                <div class="row-fluid"><h3>Items</h3></div>
                <div class="row-fluid">
                    <div class="content">
                      <ul>
						<?php
						$procedure_items = isset($rows_procedures[0]['st_procedure_items']) ? json_decode($rows_procedures[0]['st_procedure_items']) : array();
						if( sizeof($procedure_items) && $procedure_items[0] ) {
							foreach( $procedure_items AS $key_procedure_items => $val_procedure_items ) {?>
								<li><div class="text"><p class="procedure_item<?php echo $key_procedure_items;?>"><?php echo $val_procedure_items;?></p></div></li>
								<?php 
							}
						}
						else {
							echo "<p>N/A</p>";
						}
						?>
                      </ul>
                   </div>
                 </div>
				 
				 
				 
				 
				<?php
				// Procedures Images //
				$procedures_img_vid	= $this->users->getMetaDataList( 'procedures_image_video', 'in_procedure_id="'.$procedure_id.'" AND in_status=1', '', 'id, in_procedure_image_video, st_procedure_image_video, st_procedure_video_text' );
				if(sizeof($procedures_img_vid)>0) {?>
					<div class="control-group">
						<div class="controls">
							<div class="row-fluid"><h3>Procedure Images</h3></div>
							<?php
							foreach($procedures_img_vid as $val_img) {
								$is_procedure_imgorvid 	= isset($val_img['in_procedure_image_video'])  ? $val_img['in_procedure_image_video'] : '';
								if( $is_procedure_imgorvid == 1 ) {
									$name_procedure_imgorvid = isset($val_img['st_procedure_image_video'])  ? $val_img['st_procedure_image_video'] : '';?>
									<?php 
									if( file_exists(FCPATH.$this->path_upload_procedures.$name_procedure_imgorvid) ) { ?>
										&nbsp;<img width="150" height="130" src="<?php echo $base.$this->path_upload_procedures.$name_procedure_imgorvid;?>">
										<?php 
									}
								}
							}?>
						</div>
					</div>
					<?php
				}
				
				// Procedures Videos //
				if(sizeof($procedures_img_vid)>0) {?>
					<div class="control-group">
						<div class="controls">
							<div class="row-fluid"><h3>Procedure Videos</h3></div>
							<?php
							foreach($procedures_img_vid as $val_video) {
								$is_procedure_imgorvid 	= isset($val_video['in_procedure_image_video'])  ? $val_video['in_procedure_image_video'] : '';
								if( $is_procedure_imgorvid == 2 ) {
									$video_uploaded 	= isset($val_video['st_procedure_image_video'])  ? $val_video['st_procedure_image_video'] : '';
									$text_video_uploaded= isset($val_video['st_procedure_video_text'])  ? $val_video['st_procedure_video_text'] : '';?>
									<?php 
									if($text_video_uploaded) { ?>
										<iframe width="190" height="130" frameborder="0" allowfullscreen="" src="https://www.youtube.com/embed/<?php echo $text_video_uploaded;?>?wmode=transparent&showinfo=0&rel=0&auto=0"></iframe>
										<?php 
									}
									if( file_exists(FCPATH.$this->path_upload_procedures.$video_uploaded) && $video_uploaded ) {?>
										<video controls="controls" width="190" height="130">
											<source src='<?php echo $base.$this->path_upload_procedures.$video_uploaded;?>' type="video/mp4" height="130" width="190">
										</video>
										<?php 
									}
								}
							}?>
						</div>
					</div>
					<?php
				}
				?>
                <script type="text/javascript">$('ol').css('list-style','decimal');</script>
            </div>
        </div>
     <!-- ******************* END PROCEDURE SECTION ****************** -->
    
     <!-- ******************* BEGIN DUE DILIGENCE SECTION ****************** -->
        <div class="accordion-frame">
            <a class="heading  bg-red fg-white" href="#">DUE DILIGENCE</a>
            <div class="content">
            	<div class="row-fluid">
                	<h3>Regulation Overview</h3>
                </div>
                <div class="row-fluid">
                    
                    <div class="tab-control" data-effect="fade" data-role="tab-control">
                        <ul class="tabs">
                            <li class="active "><a href="#prev-worker" ><i class="icon-user-2 on-left-more"></i>Worker</a></li>
                            <li class=""><a href="#prev-supervisor"><i class="icon-accessibility on-left-more"></i> Supervisor</a></li>
                            <li class=""><a href="#prev-employer"><i class="icon-user-3 on-left-more"></i> Employer</a></li>
                        </ul>
                        <div class="frames">
                            <div class="frame" id="prev-worker">
								<?php echo $prev_worker = "<p>(1) A worker shall wear such protective clothing and use such personal protective equipment or devices as are necessary to protect the worker against the hazards to which the worker may be exposed. O. Reg. 213/91, s. 21 (1).</p>";?>
                            </div>
                            <div class="frame" id="prev-supervisor">
								<?php echo $prev_supervisor = "<p> (1)  A Supervisor shall wear such protective clothing and use such personal protective equipment or devices as are necessary to protect the worker against the hazards to which the worker may be exposed. O. Reg. 213/91, s. 21 (1). (2)  A worker's employer shall require the worker to comply with subsection (1). O. Reg. 213/91, s. 21 (2).</p>";?>
                            </div>
                            <div class="frame" id="prev-employer">
								<?php echo $prev_employer = "<p> (1)  A Employer shall wear such protective clothing and use such personal protective equipment or devices as are necessary to protect the worker against the hazards to which the worker may be exposed.</p>";?>
                            </div>
                        </div>
                      </div>
                </div>
                <div class="row-fluid"><h3>Regulation List</h3></div>
                <div class="row-fluid">
                    <div class="content">
                      <ol>
						<?php 
						$rows_proc_regulations 	= $this->users->getMetaDataList('proc_due_deligence', '', 'in_procedure_id="'.$procedure_id.'" AND in_created_by IN ("'.$this->sess_userid.'","12","9")', 'st_regulation_data');
						$proc_regulations 		= isset($rows_proc_regulations[0]['st_regulation_data']) ? json_decode($rows_proc_regulations[0]['st_regulation_data']) : array();
						if( sizeof($proc_regulations) && $proc_regulations[0] ) {
							foreach( $proc_regulations AS $key_proc_reg => $val_proc_reg ) {
								$regulation_string = '';
								// "SAMPLE: Reg. 213/91 s. 34 - 1 - b" //
								if( isset($val_proc_reg->regno) && $val_proc_reg->regno ) {
									$regno 		= ($val_proc_reg->regno) ? "Reg. ".$val_proc_reg->regno." " : '';
									$section 	= ($val_proc_reg->section) ? "s. ".$val_proc_reg->section : '';
									$subsection = ($val_proc_reg->subsection) ? " - ".$val_proc_reg->subsection : '';
									$item 		= ($val_proc_reg->item) ? " - ".$val_proc_reg->item : '';
									$subitem 	= ($val_proc_reg->subitem) ? " - ".$val_proc_reg->subitem : '';
									$regulation_string = $regno.$section.$subsection.$item.$subitem;
									?>
									<li><div class="text"><p class="regulation_string<?php echo $key_proc_reg;?>"><?php echo $regulation_string;?></p></div></li>
									<?php 
								}
								else {?>
									<li><div class="text"><p>N/A</p></div></li>
								<?php }
							}
						}
						else {?>
							<div class="text"><p>N/A</p></div>
						<?php }?>
                      </ol>
                   </div>
                 </div>
                 <script type="text/javascript">$('ol').css('list-style','decimal');</script>                
            </div>
        </div>
		
		<div id="model_proc_saveclose" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-header" style="background-color: gray;">
				<h4 id="myModalLabel">PREVIEW<i class="pull-right icon-cancel-2" onclick="javascript:procSaveClose();" style="margin-right:10px;" data-dismiss="modal"></i></h4>
			</div>
			<div class="modal-body">
				<?php 
				echo "Your Custom Procedure";
				echo "<br><b>Title: </b>".$procedure_title."<br>has been saved to your H&S Program.";?>
			</div>
			<div class="modal-footer"><button class="btn" data-dismiss="modal" id="btn_model_saveclose" onclick="javascript:procSaveClose();">Close</button></div>  
		</div>
     <!-- ******************* END DUE DILIGENCE SECTION ****************** -->

      <!-- ******************* BEGIN GLOSSARY SECTION ****************** -->
      <!-- **** REMOVED AS PER PHILL REQUEST, ITEM 226 TASK SHEET ON NOV-2015 (S1System-Review-Nov-10-2015.xlsx)******* -->

	  <?php /*
	  $desc_glossary = '';
	  if( "s1procedures" == $procedure_type) {
		$rows_lib_glossary = $this->users->getMetaDataList('procedures', '', 'id="'.$procedure_id.'"', 'in_related_glossary');
		$id_lib_glossary 	= isset($rows_lib_glossary[0]['in_related_glossary']) ? $rows_lib_glossary[0]['in_related_glossary'] : '';

		$rows_desc_glossary	= $this->users->getMetaDataList( "library_paragraph", 'library_id="'.$id_lib_glossary.'"', '', 'paragraph_description', '');
		$desc_glossary 		= (isset($rows_desc_glossary[0]['paragraph_description'])&&$rows_desc_glossary[0]['paragraph_description']) ? $rows_desc_glossary[0]['paragraph_description'] : 'No data available';
		*/?>
		<!--div class="accordion-frame">
			<a class="heading  bg-red fg-white" href="#">GLOSSARY</a>
			<div class="content"><div class="modal-body"><div class="row-fluid desc_glossary"><?php echo $desc_glossary;?></div></div></div>
		</div-->
		<?php
	 /* }*/?>
     <!-- ******************* END GLOSSARY SECTION ****************** -->
	 
	<?php 
	$clientid = isset($_GET['clientid']) ? $_GET['clientid'] : '';
	
	if( 'completed' != $procedure_status ) {?>
		<!-- ******************* BEGIN CLOSE IT SECTION ****************** -->
			<div class="accordion-frame">
				<a class="heading bg-red fg-white" href="#">SAVE AND CLOSE IT</a>
				<div class="content">
					<div class="row-fluid">
						<p class="text_save_close">By clicking on button below this Procedure will be locked, available for assigning.</p>
						<div class="inline text-center size4">
							<button class="image-button primary" href="#model_proc_saveclose" data-toggle='modal'>SAVE AND LOCK IT<i class="icon-enter bg-cobalt"></i></button>
						</div>
					</div>
					<script type="text/javascript">
						function procSaveClose()
						{
							var procedure_id = '<?php echo $procedure_id;?>';
							var clientid 	= '<?php echo $clientid;?>';

							$.ajax({
								url: js_base_path+'admin/addProcedureFunctions',
								type: 'post', 
								data: 'section=close_procedure&procedureId='+procedure_id+'&clientid='+clientid,
								success: function(output) {
									window.location.href = js_base_path+"<?php echo "admin/mylibrary_procedures_metro";?>";
									return false;
								}, 
								error: function(errMsg) {
									alert( errMsg.responseText );
									return false;
								}
							});
							/*
							setTimeout(function(){
								$.Notify({style: {background: '#1ba1e2', color: 'white'}, caption: 'Info...', content: "You have locked your New Procedure!!!"});
							}, 1000);
							setTimeout(function(){
								$.Notify({style: {background: 'green', color: 'white'}, content: "Go to your Library and assign it!!!"});
							}, 4000);
							setTimeout(function(){
								$.Notify({style: {background: 'red', color: 'white'}, content: "S1 Safety System thanks for your business!!!"});
							}, 7000);
							setTimeout(function(){
								window.location.href = js_base_path+"admin/mylibrary_procedures_metro";
							}, 11000);
							*/
						}
					</script>           
				</div>
			</div>
		<!-- ******************* END CLOSE IT SECTION ****************** -->           
		<?php
	}?>
    </div>
    </div>
    <!--END BODY MODAL --> 
	</div>
</div>

<?php
// $procedure_status = "completed"; // FOR TESTING PURPOSE // 
if( 'completed' != $procedure_status ) {?>
	<div class="modal-footer"><button class="btn" data-dismiss="modal">Close</button></div>  
	<?php
}
else {?>
	<div class="modal-footer"><button class="btn" onclick='javascript:window.location.href="<?php echo $this->base."admin/mylibrary_procedures_metro";?>"'>Close</button></div>  
	<?php 
}?>

<script type="text/javascript">
$(document).ready(function() {
	$from_lang 	= '<?php echo $from_lang;?>';
	$to_lang 	= '<?php echo $to_lang;?>';

	if( $to_lang ) {
		$(".cls_proc_preview").hide();
		$("#img_data_loader").show();

		var purpose_title 			= '<?php echo $purpose_title;?>';
		var purpose_description 	= '<?php echo $purpose_description;?>';
		var arr_machinery_contents 	= '<?php echo $this->common->escapeStr(json_encode($machinery_contents));?>';
		var procedure_tips 			= '<?php echo $this->common->escapeStr(json_encode($procedure_overview));?>';
		var arr_procedure_items 	= '<?php echo $this->common->escapeStr(json_encode($procedure_items));?>';
		var regulation_string 		= '<?php echo $this->common->escapeStr(json_encode($proc_regulations));?>';
		var desc_glossary 			= '<?php echo isset($desc_glossary) ? urlencode($desc_glossary) : '';?>';

		$.ajax({
			url: js_base_path+'ajax/getTranslatedText',
			type: 'post', 
			data: 'translateSection=proc_preview&fromLang='+$from_lang+'&toLang='+$to_lang+'&purpose_title='+purpose_title+'&purpose_description='+purpose_description+'&machinery_contents='+arr_machinery_contents+'&procedure_items='+arr_procedure_items+'&regulation_string='+regulation_string+'&desc_glossary='+desc_glossary, 
			success: function(output) {
				var procprev_data = JSON.parse(output);

				// Purpose //
				$(".purpose_title").html( procprev_data['purpose_title'] );
				$(".purpose_description").html( procprev_data['purpose_desc'] );

				// Machinery //
				if( procprev_data['machinery'].length ) {
					for(var cnt_mac=0; cnt_mac<procprev_data['machinery'].length; cnt_mac++)
					{
						$(".machinery_contents"+cnt_mac).html(procprev_data['machinery'][cnt_mac]);
					}
				}
				
				// Procedures //
				$(".procedure_tips").html( procprev_data['procedure_tips'] );
				if( procprev_data['procedure_items'].length ) {
					for(var cnt_procitem=0; cnt_procitem<procprev_data['procedure_items'].length; cnt_procitem++)
					{
						$(".procedure_item"+cnt_procitem).html(procprev_data['procedure_items'][cnt_procitem]);
					}
				}
				
				// Due Diligence //
				$("#prev-worker").html( "<p>"+procprev_data['duedilig_prev_worker']+"</p>" );
				$("#prev-supervisor").html( "<p>"+procprev_data['duedilig_prev_supervisor']+"</p>" );
				$("#prev-employer").html( "<p>"+procprev_data['duedilig_prev_employer']+"</p>" );

				if( procprev_data['regulation_string'].length ) {
					for(var cnt_regstr=0; cnt_regstr<procprev_data['regulation_string'].length; cnt_regstr++)
					{
						$(".regulation_string"+cnt_regstr).html(procprev_data['regulation_string'][cnt_regstr]);
					}
				}
				
				// Glossary //
				$(".desc_glossary").html( procprev_data['desc_glossary'] );
				
				// Save and Close //
				$(".text_save_close").html( procprev_data['text_save_close'] );
				
				$("#img_data_loader").hide();
				$(".cls_proc_preview").show();
			},
			error: function(errMsg) {
				alert( errMsg.responseText );
				return false;
			}
		});
	}
	else {
		alert("Please select language");
		return false;
	}
	
	$('#cmb_procprev_lang').change(function(){
		$from_lang 	= '<?php echo $from_lang;?>';
		$to_lang 	= $(this).val();
		if( $to_lang ) {
			$(".cls_proc_preview").hide();
			$("#img_data_loader").show();

			var purpose_title 			= '<?php echo $purpose_title;?>';
			var purpose_description 	= '<?php echo $purpose_description;?>';
			var arr_machinery_contents 	= '<?php echo json_encode($machinery_contents);?>';
			var procedure_tips 			= '<?php echo json_encode($procedure_overview);?>';
			var arr_procedure_items 	= '<?php echo json_encode($procedure_items);?>';
			var regulation_string 		= '<?php echo json_encode($proc_regulations);?>';
			var desc_glossary 			= '<?php echo isset($desc_glossary) ? urlencode($desc_glossary) : '';?>';

			$.ajax({
				url: js_base_path+'ajax/getTranslatedText',
				type: 'post', 
				data: 'translateSection=proc_preview&fromLang='+$from_lang+'&toLang='+$to_lang+'&purpose_title='+purpose_title+'&purpose_description='+purpose_description+'&machinery_contents='+arr_machinery_contents+'&procedure_items='+arr_procedure_items+'&regulation_string='+regulation_string+'&desc_glossary='+desc_glossary,  
				success: function(output) {
					var procprev_data = JSON.parse(output);
					
					// Purpose //
					$(".purpose_title").html( procprev_data['purpose_title'] );
					$(".purpose_description").html( procprev_data['purpose_desc'] );
					
					// Machinery //
					if( procprev_data['machinery'].length ) {
						for(var cnt_mac=0; cnt_mac<procprev_data['machinery'].length; cnt_mac++)
						{
							$(".machinery_contents"+cnt_mac).html(procprev_data['machinery'][cnt_mac]);
						}
					}
					
					// Procedures //
					$(".procedure_tips").html( procprev_data['procedure_tips'] );
					if( procprev_data['procedure_items'].length ) {
						for(var cnt_procitem=0; cnt_procitem<procprev_data['procedure_items'].length; cnt_procitem++)
						{
							$(".procedure_item"+cnt_procitem).html(procprev_data['procedure_items'][cnt_procitem]);
						}
					}
					
					// Due Diligence //
					$("#prev-worker").html( "<p>"+procprev_data['duedilig_prev_worker']+"</p>" );
					$("#prev-supervisor").html( "<p>"+procprev_data['duedilig_prev_supervisor']+"</p>" );
					$("#prev-employer").html( "<p>"+procprev_data['duedilig_prev_employer']+"</p>" );

					if( procprev_data['regulation_string'].length ) {
						for(var cnt_regstr=0; cnt_regstr<procprev_data['regulation_string'].length; cnt_regstr++)
						{
							$(".regulation_string"+cnt_regstr).html(procprev_data['regulation_string'][cnt_regstr]);
						}
					}
					
					// Glossary //
					$(".desc_glossary").html( procprev_data['desc_glossary'] );
					
					// Save and Close //
					$(".text_save_close").html( "<p>"+procprev_data['text_save_close']+"</p>" );
					
					$("#img_data_loader").hide();
					$(".cls_proc_preview").show();
				},
				error: function(errMsg) {
					alert( errMsg.responseText );
					return false;
				}
			});
		}
		else {
			alert("Please select language");
			return false;
		}
	});
});

$('.modal-header').css('background-color','gray');
$('.icon-enter').css('padding','3px');
$('.icon-cancel-2').css('padding','3px 4px 2px 2px');
</script>   
