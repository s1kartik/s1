<?php $this->load->view('header_admin');
$lbl_txt_username = ("8"==$this->sess_usertype && "badges"!=$redirect_from) ? "Search Crew/Worker" : "Search Worker";
?>
<script type="text/javascript" src="<?php echo $base;?>js/metro/metro.min.js"></script>
<div class="homebg metro ">
	<!--BEGIN PAGE TITLE-->
    <div class="container">
	<div class="main-content padding-metro-header subheader-secondary clearfix fg-grayLighter">
		<em class="margin20"><?php echo (isset($badge_title)&&$badge_title) ? "Selected D.R.O.T: ".$badge_title : '';?></em>
		<em class="margin20"><?php echo ("badges"!=$redirect_from) ? "MY WORKERS" : "Assign D.R.O.T - Select Worker";?></em>
	</div>
	</div>
    <!--END PAGE TITLE-->
    <div class="container">
        <div class="main-content padding-metro-home myworker-data-container clearfix"> 
        <!--START first column profiles users tiles-->
			<div class="tile-group six no-margin no-padding clearfix" >
				<form class="form-inline no-margin" method="post">
					<fieldset>
					<?php 
					if( "8"==$this->sess_usertype ) {?>
						<?php 
						if( "badges"!=$redirect_from ) {?>
							<div class="input-control select size2">
								<select class="f13" name="cmb_usertype" id="cmb_usertype">
									<option value="">All</option>
									<option value="crew">Crew</option>
									<option value="worker">Worker</option>
									<option value="supervisor">My Supervisor</option>
								</select>
							</div>
							<?php
						}?>
						<?php
					}?>
					<div class="input-control text size3" style="height:30px">
						<input type="text" value="<?php echo $this->input->post('txt_username');?>" name="txt_workername" id="txt_workername" placeholder="<?php echo $lbl_txt_username;?>"/>
						<button type="button" class="btn-search fg-gray"></button>
					</div>
					</fieldset>
				</form>

				<!--JUST FOR DESIGNING PURPOSES - MOCKUP ELEMENTS TO BE FOLLOWED-->
					<?php 
					if( "badges"!=$redirect_from ) {
						if( isset($rows_my_crews) && sizeof($rows_my_crews) ) {
							foreach( $rows_my_crews AS $val_crew ) {
								$crew_label = (isset($val_crew['st_crew_label'])&&$val_crew['st_crew_label']) ? $val_crew['st_crew_label'] : 'crew name';?>
								<a href='<?php echo $base;?>admin/my_crew?crew_id=<?php echo $val_crew['in_crew_id'];?>' workertile-title="<?php echo $crew_label;?>" 
								 class="tile half-library bg-darker crew" >
									<div class="tile-content email">
										<div class="text-center" style="margin-top:5px;"><span class="email-data-text"><?php echo strtoupper($crew_label);?></span></div>
									</div>
									<div class="brand"><div class="badge no-margin fg-white bg-transparent"><span class="icon-checkmark"></span></div></div>
								</a>
								<?php 
							}
						}
					}?>
                <!-- END OF JUST FOR DESIGNING PURPOSES - MOCKUP ELEMENTS TO BE FOLLOWED-->

				<?php
				if( isset($links) && is_array($links) && sizeof($links) ) {
					foreach($links as $ln) {
						$connec_id 		= $ln['id']; 
						$connec_status 	= $ln['link_status'];
                        if( "7" == $this->sess_usertype ) {
							$where_arrworkers	= '(st_designation="my_worker" OR st_designation="supervisor") AND st_status="y" AND in_worker_id="'.$ln['worker_id'].'"';
							("badges"!=$redirect_from) ? $where_arrworkers .= ' AND in_union_id="'.$this->sess_userid.'"' : '';
							$rows_my_workers	= $this->users->getMetaDataList("union_designations", $where_arrworkers, '', 'st_designation');
						}
						else {
							$where_arrworkers	= '(st_designation="my_worker" OR st_designation="supervisor") AND st_status="y" AND in_worker_id="'.$ln['worker_id'].'"';
							("badges"!=$redirect_from) ? $where_arrworkers .= ' AND in_user_id="'.$this->sess_userid.'"' : '';
							$rows_my_workers	= $this->users->getMetaDataList("employer_consultant_designations", $where_arrworkers, '', 'st_designation');
						}
						// common::pr( $rows_my_workers );
						$is_my_worker= (isset($rows_my_workers[0]['st_designation'])&&$rows_my_workers[0]['st_designation']=="my_worker") ? 1 : '';

						if( $is_my_worker ) {
							$is_my_supervisor	= (isset($rows_my_workers[1]['st_designation'])&&$rows_my_workers[1]['st_designation']=="supervisor") ? 1 : '';
							$cls_worker_supervisor 	= ("1"==$is_my_supervisor) ? 'supervisor myworker' : 'myworker';
							if( "badges" == $redirect_from ) {
								$link_redirect_from = "#modal_assign_badge";
							}
							else {
								$link_redirect_from = "javascript:void(0);";
							}
							?>
							<div href="<?php echo $link_redirect_from;?>" data-toggle="modal" class="tile half-library bg-black <?php echo $cls_worker_supervisor;?>" workertile-title="<?php echo strtolower($ln['firstname']." ".$ln['lastname']);?>" id="<?php echo "worker_".$ln['worker_id'];?>" workerid="<?php echo $ln['worker_id'];?>" >
								<div class="tile-content email">
									<div class="email-image" style="height:36px; width:36px;">
										<a href='#modal_worker_id_card' data-toggle='modal' onclick="javascript:ajaxMyIDCard('<?php echo $connec_id;?>', '', '<?php echo $connec_status;?>');">
											<?php 
											if( file_exists(FCPATH.$this->path_upload_profiles.$ln['profile_image']) && $ln['profile_image'] ) {?>
												<img src="<?php echo $base.$this->path_upload_profiles.$ln['profile_image'];?>" class="w50"/>
												<?php 
											}
											else {?><img class="w50" src="<?php echo $base;?>img/default.png" /><?php }?>
										</a>
									</div>
									<div class="email-data" style="margin-left:40px;margin-top:-5px;">
										<span class="email-data-text"><?php echo $ln['firstname']." ".$ln['lastname'];?></span>
									</div>
								</div>
								<div class="brand"><div class="badge no-margin fg-white bg-transparent"><span class="icon-checkmark"></span></div></div>
							</div>
							
							<input type="hidden" name="hidn_sel_user" id="hidn_sel_user">
							<?php 
							if( "badges"!=$redirect_from ) { ?>
								<script type="text/javascript">
								 $('#<?php echo "worker_".$ln['worker_id'];?>').click(function(){
									if($('#<?php echo "worker_".$ln['worker_id']?>').hasClass('selected')) {
										$('#<?php echo "worker_".$ln['worker_id']?>').removeClass('selected');
									}
									else {
										$('#<?php echo "worker_".$ln['worker_id']?>').addClass('selected');
									}
								 });
								</script>							
								<?php 
							}
						}
					}
				}?>
			</div>
			<!--end first column profiles users tiles-->
			
        <!--START SECON column ASSIGN/CONNECTION tiles-->
		<?php
		if( "badges"!=$redirect_from ) { ?>
			<div class="conections-data">
				<div class="tile-group two no-margin no-padding clearfix span4 narrowCol">
					<div class="bg-transparent " style="height:40px;box-shadow: 0px 0px 0px inset;"></div>
					<?php 
					if( "8"==$this->sess_usertype ){ ?>
						<a href="#modal_create_crew" class="tile double profile-content-box tab-content cls_create_crew" data-toggle="modal" >
							<img src="<?php echo $base;?>img/my_worker/create_crew.png">
						</a>
						<a href="javascript:void(0);" class="tile double cls_assign_badge" title="Assign D.R.O.T" data-toggle="modal">
							<img src="<?php echo $base;?>img/connections/assign_badges.png">
						</a>
						<div id="modal_create_crew" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							<div class="modal-header bg-red">
								<h3 id="myModalLabel">MY NEW CREW<i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal"></i></h3>
							</div>
							<div class="modal-body"><div class="charities-container cls_my_new_crew" style="padding:0px 0px 0px 0px;box-shadow: none;"></div></div>
							<div class="modal-footer"><button class="btn" data-dismiss="modal">Close</button></div>
						</div>
						<?php 
					}?>
					<a href="javascript:void(0);" class="tile double cls-assign-library" title="Assign Library" data-toggle="modal">
						<img src="<?php echo $base;?>img/connections/assign_library.png">
					</a>
				</div>
            </div>
		<?php
		}?>
        
		<div id="modal_assign_badge" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-header bg-red"><h3 id="myModalLabel">Assign D.R.O.T <i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal"></i></h3></div>
			<div class="modal-body"><div class="charities-container cls-badge-modal" style="padding:0px 0px 0px 0px;box-shadow: none;"></div></div>
			<div class="modal-footer"><button class="btn" data-dismiss="modal">Close</button></div>
		</div>
		
		<div id="modal_worker_profile" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-header bg-red">
				<h3 id="myModalLabel">Assign Designation<i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal"></i></h3>
			</div>
			<div class="modal-body"><div class="charities-container cls_myworkers" style="padding:0px 0px 0px 0px;box-shadow: none;"></div></div>
			<div class="modal-footer"><button class="btn" data-dismiss="modal">Close</button></div>
		</div>
				
				
		<div id="modal_worker_id_card" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-header bg-red">
				<h3 id="myModalLabel"><strong>PROFILE ID CARD</strong><i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal"></i></h3>
			</div>
			<div class="modal-body"><div class="charities-container cls_myidcard" style="padding:0px 0px 0px 0px;box-shadow: none;"></div></div>
			<div class="modal-footer">
				<button style="display:none;" rel="" class="btn cls-btn-accept">Accept</button>                                                
				<button class="btn" data-dismiss="modal">Close</button>
			</div>
		</div>
        <!--END SECOND column ASSIGN/CONNECTION tiles-->
</div>
</div>
</div>
<?php $this->load->view('footer_admin');?>
<script type="text/javascript" src="<?php echo $base;?>js/jquery/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo $base;?>js/jquery-ui.js"></script>
<script type="text/javascript">
	function ajaxMyWorkers(workerName, connectStatus)
	{
		$.ajax({
			url: '<?php echo $base;?>ajax/ajaxMyWorkers',  
			type: 'post',  
			data: {'workerName': workerName, 'redirectTo': 'myworkers_metro', 'connectStatus':connectStatus },
			success: function(output) {
				$(".cls_myworkers").html(output);
				$("#modal_worker_id_card").modal("hide");
				$("#modal_worker_profile").modal("show");
			}, 
			error: function(errMsg) {
				alert( errMsg.responseText );
				return false;
			}
		});
	}
	
	function ajaxMyIDCard(userId, iconClass, connectStatus)
	{
		$("#hidn_sel_user").val(userId);
		$.ajax({
			url: js_base_path+'ajax/ajaxMyIDCard', 
			type: 'post', 
			data: {'userId': userId, 'connectStatus':connectStatus },
			success: function(output) {
				$(".cls_myidcard").html(output);
				$("#modal_worker_profile").modal("hide");
				$("#modal_worker_id_card").modal("show");
			},
			error: function(errMsg) {
				alert( errMsg.responseText );
				return false;
			}
		});
	}

	$('#cmb_usertype').change(function(){
		if( '' == $(this).val() ) {
			$('.myworker').show();
			$('.crew').show();
		}
		else if( 'worker' == $(this).val() ) {
			$('.myworker').show();
			$('.crew').hide();
			// $('worker-tile-type*='+$(this).val()+']').show();
		}
		else if( 'crew' == $(this).val() ) {
			$('.myworker').hide();
			$('.crew').show();
			// $('worker-tile-type*='+$(this).val()+']').show();
		}
	});
		
	$('#txt_workername').keyup(function(){
		if( '' == $(this).val() ) {
			$('.myworker').show();
		}
		else { 
			$('.myworker').hide();
			$('.myworker[workertile-title*='+$(this).val().toLowerCase().replace(" ","")+']').show();
		}
	});
	
	var jq201 = jQuery.noConflict();
	jq201(document).ready(function () {
		$(".cls_create_crew").click(function() {
			var len_myworker 		= $(".myworker.selected").length;
			if( len_myworker == 0 ) {
				alert( "Please select atleast 1 worker from the list" );
				return false;
			}
			var worker_id= new Array();
			cnt_myworker = 0;
			$(".myworker.selected").each(function() {
				worker_id[cnt_myworker] = $(this).attr('workerid');
				cnt_myworker++;
			});
			// Save new crew workers //
				jq201.post(js_base_path+'ajax/ajaxGetNewlySelectedCrewWorkers', {'worker_id': worker_id}, function(data){
					$(".cls_my_new_crew").html(data);
				});
		});

		$(".cls-assign-library").click(function() {
			var len_myworker 		= $(".myworker.selected").length;
			var arr_connec 			= new Array();
			var cnt_connec 			= 0;
			
			if( len_myworker == 0 ) {
				alert( "Please select atleast 1 worker from the list" );
				return false;
			}

			$(".myworker.selected").each(function() {
				arr_connec[cnt_connec] = $(this).attr('workerid');                                  
				arr_connec.push('worker');
				cnt_connec++;
			});

			$.ajax({
				url: '<?php echo $base;?>admin/assign_library',
				type: 'post', 
				data: {'arr_connec': arr_connec },
				success: function(output) {
					window.location.href = '<?php echo $base;?>admin/assign_library';
				},
				error: function(errMsg) {
					alert( errMsg.responseText );
					return false;
				}
			});
		});
		
		$(".cls_assign_badge").click(function() {
			var len_myworker 		= $(".myworker.selected").length;
			if( len_myworker == 0 ) {
				alert( "Please select atleast 1 worker from the list" );
				return false;
			}
			else if( len_myworker > 1 ) {
				alert( "You can not select more than 1 worker from the list" );
				return false;
			}

			var worker_id 	= $(".myworker.selected").attr('workerid');
			var worker_name = $(".myworker.selected").attr('workertile-title');
			$.ajax({
				url: js_base_path+'admin/badges', 
				type: 'post', 
				data: {'workerId': worker_id,'workerName': worker_name},
				success: function(output) {
					window.location.href = js_base_path+'admin/badges?redirect_from=myworkers';
				}, 
				error: function(errMsg) {
					alert( errMsg.responseText );
					return false;
				}
			});
		});
		
		$(".myworker").click(function() {
			var worker_id 	= $(this).attr('workerid');
			var worker_name = $(this).attr('workertile-title');
			
			$.ajax({
				url: js_base_path+'ajax/ajaxAssignBadgeModal', 
				type: 'post', 
				data: {'workerId': worker_id,'workerName': worker_name},
				success: function(output) {
					$(".cls-badge-modal").html(output);
				}, 
				error: function(errMsg) {
					alert( errMsg.responseText );
					return false;
				}

			});		
		});
		
	});
</script>
