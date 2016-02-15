<?php 
$this->load->view('header_admin');
$crew_label = (isset($arr_crew_workers['st_crew_label']) && $arr_crew_workers['st_crew_label']) ? $arr_crew_workers['st_crew_label'] : '';
?>
<div class="homebg metro ">
	<!--BEGIN PAGE TITLE-->
    <div class="container">
        <div class="main-content padding-metro-header subheader-secondary clearfix crewFloat fg-grayLighter">
			<em>MY CREW <?php echo ($crew_label) ? " - " : '';?><span id="val_crew_label"><?php echo $crew_label;?></span></em>
			<input type="text" class="span2" name="txt_crew_label" id="txt_crew_label" style="display:none;">
			<span title="Edit Crew Label" style="cursor:pointer;" href="javascript:void(0);" id="id_edit_crew_label" class="f16"><i class="icon-enter"></i></span>
			<span title="Save Crew Label" style="cursor:pointer; display:none;" href="javascript:void(0);" id="id_save_crew_label" class="f16"><i class="icon-thumbs-up"></i></span>
        </div>
    </div>
    <!--END PAGE TITLE-->
    <div class="container">
        <div class="main-content padding-metro-home clearfix">
			<div class="tile-group six no-margin no-padding" >
			
				<!-- Supervisor -->
				<div class="subheader-secondary clearfix fg-grayLighter"><em>Supervisor</em></div>
				<br>
				<?php 
				$supervisor_id = (isset($rows_supervisors[0]->id)&&$rows_supervisors[0]->id) ? $rows_supervisors[0]->id : '';
				if( $supervisor_id ) {?>
					<div class="tile half-library bg-black" id="<?php echo "supervisor".$supervisor_id;?>" supervisor_id="<?php echo $supervisor_id;?>">
						<div class="tile-content email">
							<div class="email-image" style="height:36px; width:36px;">
								<?php $img_worker = (!empty($rows_supervisors[0]->profile_image)) ? $base.$this->path_upload_profiles.$rows_supervisors[0]->profile_image : $base."img/default.png";?>
								<a href='#'><img src="<?php echo $img_worker;?>"/></a>
							</div>
							<div class="email-data" style="margin-left:40px;margin-top:-5px;">
								<span class="email-data-text"><?php echo $rows_supervisors[0]->firstname." ".$rows_supervisors[0]->lastname;?></span>
							</div>
						</div>
						<div class="brand"><div class="badge no-margin fg-white bg-transparent"><span class="icon-checkmark"></span></div></div>

						<script type="text/javascript">
							$('#<?php echo "supervisor".$supervisor_id;?>').click(function(){
								if($('#<?php echo "supervisor".$supervisor_id;?>').hasClass('selected')) {
									$('#<?php echo "supervisor".$supervisor_id;?>').removeClass('selected');
								}
								else {
									$('#<?php echo "supervisor".$supervisor_id;?>').addClass('selected');
								}
							});
						</script>
					</div>
					<?php
				}
				else {
					echo "<h5 class='fg-black'>No Supervisor available</h5>";
				}?>
				
				<div id="modal_update_supervisor" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					<div class="modal-header bg-red">
						<h3 id="myModalLabel">Change Supervisor<i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal"></i></h3>
					</div>
					<div class="modal-body">
					<div class="charities-container" style="padding:0px 0px 0px 0px;box-shadow: none;">
						<?php 
						$data['supervisor_id']=$supervisor_id;
						$this->load->view('ajax/ajax_update_supervisor', $data);?>
					</div>
					</div>
					<div class="modal-footer"><button class="btn" data-dismiss="modal">Close</button></div>
				</div>
				

				<div class="clearfix">&nbsp;</div><div class="clearfix">&nbsp;</div>

				<!-- Workers -->
				<div class="subheader-secondary clearfix fg-grayLighter"><em>Workers</em></div><br>
				<?php 
				if( isset($my_crew_workers) && sizeof($my_crew_workers) ) {
					foreach( $my_crew_workers AS $ln ) {?>
						<div class="tile half-library bg-black myworker" id="<?php echo "is_selected".$ln['worker_id'];?>" workerid="<?php echo $ln['worker_id'];?>">
							<div class="tile-content email">
								<div class="email-image" style="height:36px; width:36px;">
									<?php $img_worker =(!empty($ln['profile_image'])) ? $base.$this->path_upload_profiles.$ln['profile_image'] : $base."img/default.png";?>
									<a href='#modal_worker_profile' data-toggle='modal' onclick="javascript:ajaxMyWorkers('<?php echo $ln['firstname']." ".$ln['lastname'];?>');" data-toggle='modal'><img src="<?php echo $img_worker;?>"/></a>
								</div>
								<div class="email-data" style="margin-left:40px;margin-top:-5px;">
									<span class="email-data-text"><?php echo $ln['firstname']." ".$ln['lastname'];?></span>
								</div>
							</div>
							<div class="brand"><div class="badge no-margin fg-white bg-transparent"><span class="icon-checkmark"></span></div></div>
						</div>
						<script type="text/javascript">
							$('#<?php echo "is_selected".$ln['worker_id'];?>').click(function(){
								if($('#<?php echo "is_selected".$ln['worker_id'];?>').hasClass('selected')) {
									$('#<?php echo "is_selected".$ln['worker_id'];?>').removeClass('selected');
								}
								else {
									$('#<?php echo "is_selected".$ln['worker_id'];?>').addClass('selected');
								}
							});
						</script>
					<?php
					}
				}
				else {
					echo "<h5 class='fg-black'>No workers available</h5>";
				}?>
				<div id="modal_worker_profile" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					<div class="modal-header bg-red">
						<h3 id="myModalLabel">My Workers<i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal"></i></h3>
					</div>
					<div class="modal-body"><div class="charities-container cls_myworkers" style="padding:0px 0px 0px 0px;box-shadow: none;"></div></div>
					<div class="modal-footer"><button class="btn" data-dismiss="modal">Close</button></div>
				</div>
			</div>
			<div class="conections-data"> 
                <div class="tile-group two no-margin no-padding clearfix">
                    <a href="<?php echo $base;?>admin/add_workers_my_crew?crew_id=<?php echo $crew_id;?>" class="tile double profile-content-box tab-content" id="#"><img src="<?php echo $base;?>img/my_crew/add_more.png"></a>
                    <div class="tile double profile-content-box tab-content cls_remove_worker" align="center"><img src="<?php echo $base;?>img/my_crew/remove.png"></div>
                    <div href="#modal_update_supervisor" data-toggle='modal' class="tile double profile-content-box tab-content change_supervisor" align="center"><img src="<?php echo $base;?>img/my_crew/add_supervisor.png"></div>
                    <!--<a class="tile double profile-content-box tab-content" id="id_btn_update_crew"><img src="<?php echo $base;?>img/my_crew/save.png"></a>-->
                    <!--<div class="tile double profile-content-box tab-content"><img src="< ?php echo $base;?>img/my_crew/my_crew_ads.png"></div> -->
                </div>
            </div>
		</div>
	</div>
	<div>&nbsp;</div>
</div>
<?php $this->load->view('footer_admin');?>

<script type="text/javascript" src="<?php echo $base;?>js/jquery/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo $base;?>js/jquery-ui.js"></script>
<script type="text/javascript">
	// Change Supervisor //
		$(".change_supervisor").click(function() {
			var supervisor_id = "<?php echo $supervisor_id;?>";
			if( !supervisor_id ) {
				alert( "No Supervisor exists" );
				return false;
			}
			if( $('#supervisor'+supervisor_id).hasClass('selected') ) {}
			else {
				alert( "Please select Supervisor" );
				return false;
			}
		});

	function ajaxMyWorkers(workerName) 
	{
		$.ajax({
			url: js_base_path+'ajax/ajaxMyWorkers',  
			type: 'post', 
			data: {'workerName': workerName },
			success: function(output) {
				$(".cls_myworkers").html(output);
			},
			error: function(errMsg) {
				alert( errMsg.responseText );
				return false;
			}
		});
	}
	
	var jq201 = jQuery.noConflict();
	jq201(document).ready(function () {
		jq201("#id_edit_crew_label").click(function() {
			$("#id_edit_crew_label").hide();
			$("#id_save_crew_label").show();
			$("#txt_crew_label").show();
			$("#txt_crew_label").focus();
			$("#val_crew_label").hide();
			$("#txt_crew_label").val( $("#val_crew_label").html() );
		});
		
		jq201("#id_save_crew_label").click(function() {
			var crew_id	= '<?php echo $crew_id;?>';
			jq201.post(js_base_path+'ajax/ajaxSaveCrewWorkers', {'crew_id':crew_id, 'crew_label':$("#txt_crew_label").val()}, function(data){
				if(data.trim() != '') {
					alert(data);
				}
				else {
					$("#val_crew_label").show();
					$("#val_crew_label").html($("#txt_crew_label").val());
					$("#txt_crew_label").hide();
					$("#id_save_crew_label").hide();
					$("#id_edit_crew_label").show();
				}
			});
		});
		
		$(".cls_remove_worker").click(function() {
			var crew_id			= '<?php echo $crew_id;?>';
			var len_myworker 	= $(".myworker.selected").length;

			if( len_myworker == 0 ) {
				alert( "Please select atleast 1 worker from the list" );
				return false;
			}
			var arr_workers = new Array();
			var cnt_myworker = 0;
			if( confirm("Are you sure you want to Remove selected Worker(s)?") ) {
				$(".myworker").not(".selected").each(function() {
					arr_workers[cnt_myworker] = $(this).attr('workerid');
					cnt_myworker++;
				});
				jq201.post(js_base_path+'ajax/ajaxSaveCrewWorkers', {'arrWorkers':arr_workers, 'crew_id':crew_id}, function(data){
					if(data.trim() != '') {
						alert(data);
					}
					else {
						window.location.reload();
					}
				});
			}
		});
	});
</script>