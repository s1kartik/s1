<?php 
$this->load->view('header_admin');?>
<script type="text/javascript" src="<?php echo $base;?>js/metro/metro.min.js"></script>
<div class="homebg metro ">
	<!--BEGIN PAGE TITLE-->
    <div class="container">
        <div class="main-content padding-metro-header subheader-secondary clearfix fg-grayLighter">        
            <em class="margin20">Main Search</em>        
        </div>
    </div>
    <!--END PAGE TITLE-->
    <div class="container">        
        <div class="main-content padding-metro-home clearfix">       
            <?php if( isset($links) && is_array($links) && count($links) == 0    ) {?>
            <div class="tile-group six no-margin no-padding" ><h4 class="fglightgrey">No results found, please search again</h4></div>
            <style>.tile-group.two.no-margin.no-padding.clearfix {float: right;}</style>
            <?php }?>
        <!--START first column profiles users tiles-->
			<div class="tile-group six no-margin no-padding">
			<!--JUST FOR DESIGNING PURPOSES - MOCKUP ELEMENTS TO BE FOLLOWED-->
                <?php 
				// common::pr($links);
				if( isset($links) && is_array($links) && sizeof($links) ) {
					$cnt_search = 0;
					foreach($links as $ln) {
						$recUtc = $this->users->get_user_meta($ln['id'], 'union_training_centre');
						if( ( isset($filter_type)&&$filter_type=="utc" && isset($recUtc['meta_value'])&&trim($recUtc['meta_value'])!=="" )
							|| ( isset($filter_type)&&$filter_type=="7" && isset($recUtc['meta_value'])&&$recUtc['meta_value']=="" )
							|| ( !isset($filter_type) || (isset($filter_type)&&($filter_type!="7"&&$filter_type!="utc")) )
						  ) {
							$start 	= (($pgno_userlist-1)*$pg_limit);
							$end 	= ($pgno_userlist*$pg_limit);

							if( $cnt_search >= $start && $cnt_search < $end ) {
								$connec_id 		= $ln['id']; 
								$firstname 		= $ln['firstname'];
								$lastname 		= $ln['lastname'];
								//$worker_id 		= $ln['worker_id'];
								$type_id		= $ln['type_id'];
								$connec_status 	= $ln['link_status'];

								$usertype 	= ('7'==$type_id || '8'==$type_id) ? 'company' : 'worker';
								$modal_worker_id_card 	= "#modal_worker_id_card";

								$icon_class = '';
								$class_badge = 'bg-transparent';
								if( is_null($connec_status) || $connec_status == "-1" ) {
									$link_status = "Not Linked";
									$connec_icon = "icon-cancel";
								}
								else {
									switch($connec_status){
										case 0: {
											$connec_icon = "icon-cycle";
											if($ln['requester']==$this->sess_userid){
												$link_status = "Requested";
											}
											else{
												$link_status = "Accept";
												$icon_class = "icon-accept";
											}
											$class_badge = 'bg-red';
											break;
										}
										case 1: {
											$link_status = "Linked";
											$connec_icon = "icon-checkmark";
											break;
										}
									}
								}?>
								<div class="tile double bg-black <?php echo str_replace(" ", "", $link_status);?> cls-connected-user connection <?php echo $usertype;?>" username="<?php echo str_replace(" ","",strtolower($firstname))." ".strtolower($lastname);?>" worker_id="<?php echo $connec_id;?>" link_status ="<?php echo $link_status;?>" id="<?php echo "worker_".$connec_id;?>" connect_status="<?php echo $connec_status;?>" type_id="<?php echo $type_id;?>"  title="<?php echo $connec_id.$firstname." ".$lastname;?>" >
									<div class="tile-content email">					
										<div class="email-image" >
											<?php $userimg = (file_exists(FCPATH.$this->path_upload_profiles.$ln['profile_image'])&&$ln['profile_image']) ? $this->base.$this->path_upload_profiles.$ln['profile_image'] : $this->base."img/default.png";?>
											<a href='<?php echo $modal_worker_id_card;?>' data-toggle='modal' onclick="javascript:ajaxMyIDCard('<?php echo $connec_id;?>', '<?php echo $icon_class;?>', '<?php echo $connec_status;?>');" data-toggle='modal' >
												<img src='<?php echo $userimg;?>'/>
											</a>
										</div>
										<div class="email-data" >
                                        	<span class="email-data-subtitle"><strong><?php echo $firstname." ".$lastname;?></strong></span>
                                  <?php //Code inserted by Marcio on Aug-07-2015 in order to display industry and trade nemes in its profile tile. Please Kartik, you are free to improve it and move the codes to controllers/admin.
								  $user_wallet	= $this->users->getMyDataOfUser($connec_id, 'user_wallet');
								  ?>
                                <span class="email-data-text"><?php echo $user_wallet['user_wallet']['industry'];?></span>
                                <span class="email-data-text"><?php echo $user_wallet['user_wallet']['trade'];?></span>
										</div>
									</div>
									<div class="brand">
                                    <?php //Code inserted by Marcio on Aug-07-2015 in order to add a button to public page in its profile tile. Please Kartik, you are free to improve it and move the codes to controllers/admin.
									$rec  = $this->users->get_user_meta($connec_id, 's1_public_page');
									//echo "*****-".$type_id;
										if( isset($rec['meta_value']) && $rec['meta_value']=="y" ) { 
                                        	if( "7" == $type_id ) { // Union //
												$url_s1_public_page = "s1_public_page_union";
											}
											else if( "12" == $type_id ) { // Consultant //
												$url_s1_public_page = "s1_public_page_consultant";
											}
											else { // Except Union and Consultant users //
												$url_s1_public_page = "s1_public_page";
											}
											?>
                                        
                                       <a class="badge no-margin fg-white bg-red" style="right:40px;padding:3px;width:64px;" href='<?php echo $this->base."admin/".$url_s1_public_page."?id=".$connec_id;?>'>
											<strong>My Page</strong>
											</a>
                                           
											<?php 
										}?>
                                    
                                    
                                    <div class="badge no-margin fg-white <?php echo $class_badge;?>"><span rel="<?php echo $connec_id;?>" class="cls-connec-icon <?php echo $connec_icon;?> <?php echo $icon_class;?>" ></span></div></div>
								</div>
								<input type="hidden" name="hidn_sel_user" id="hidn_sel_user">
								<script type="text/javascript">
									$('#<?php echo "worker_".$connec_id;?>').click(function(){
										if($('#<?php echo "worker_".$connec_id;?>').hasClass('selected')) {
											$('#<?php echo "worker_".$connec_id;?>').removeClass('selected');
										}
										else {
											$('#<?php echo "worker_".$connec_id;?>').addClass('selected');
										}
									});
								</script>
								<?php //echo "<pre>"; print_r($user_wallet) ;  echo "</pre>";
							}
							$cnt_search++;
						}
					}
				}
				if( $total_user_list > $pg_limit ) {
					// Pagination //
						$pg_total = ceil( $total_user_list/$pg_limit );
						echo '<div class="pagination small opacity pull-right">';
						$this->common->getS1Pagination($this->router->fetch_method()."?1&usertype=".$cmb_usertype."&username=".$txt_username, $pg_total, $pgno_userlist, 9, 10);
						echo '</div>';
				}?>
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
				
				
				<div id="modal_union_connection" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					<div class="modal-header bg-red">
						<h3 id="myModalLabel">User Type: <?php echo $this->session->userdata('usertypename');?>
						<i class="pull-right icon-cancel-2" onclick="javascript:location.reload();" style="margin-right:10px;" data-dismiss="modal"></i></h3>
					</div>
					<div class="modal-body"><div class="charities-container cls_union_connection" style="padding:0px 0px 0px 0px;box-shadow: none;"></div></div>
					<div class="modal-footer"><button class="btn" data-dismiss="modal" onclick="javascript:location.reload();">Close</button></div>
				</div>

				<div id="modal_worker_id_card" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					<div class="modal-header bg-red">
						<h3 id="myModalLabel">PROFILE ID CARD<i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal"></i></h3>
					</div>
					<div class="modal-body"><div class="charities-container cls_myidcard" style="padding:0px 0px 0px 0px;box-shadow: none;"></div></div>
					<div class="modal-footer">
						<button style="display:none;" rel="" class="btn cls-btn-accept">Accept</button>                                                
						<button class="btn" data-dismiss="modal">Close</button>
					</div>
				</div>
				
				<div id="modal_worker_profile" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					<div class="modal-header bg-red">
						<h3 id="myModalLabel">Assign Designation<i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal"></i></h3>
					</div>
					<div class="modal-body"><div class="charities-container cls_myworkers" style="padding:0px 0px 0px 0px;box-shadow: none;"></div></div>
					<div class="modal-footer"><button class="btn" data-dismiss="modal">Close</button></div>
				</div>
			</div>	
			<!--end first column profiles users tiles-->
			
			<!--START SECON column CONNECTION tiles-->
            <div class="conections-data"> 
                <div class="tile-group two no-margin no-padding clearfix">		<!-- Ritesh : Removed above main div class="center-width"-->		
                    <!--begin small tile-->
                    <a href="javascript:void(0);" class="tile double profile-content-box tab-content cls-multiconnect-connections" title="Connect">
                    <img src="<?php echo $base;?>img/connections/connect.png">
                    <!--end small tile--> 
                    </a>
                    <!--begin small tile-->
                    <a href="javascript:void(0);" class="tile double profile-content-box tab-content cls-disconnect-connection" title="Disconnect">
                    <img src="<?php echo $base;?>img/connections/disconnect.png">
                    </a>
                    <!--<a href="javascript:void(0);" class="tile double">
                    <img src="< ?php echo $base;?>img/my_worker/my_worker_ads.png">
                    </a> -->
                    <!--end small tile-->
                </div>
            </div>
			<!--END SECOND column CONNECTION tiles-->
		</div>
	</div>
</div>
<?php $this->load->view('footer_admin');?>
<script type="text/javascript" src="<?php echo $base;?>js/jquery/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo $base;?>js/jquery-ui.js"></script>
<script type="text/javascript">
	var usertype_loggedin = '<?php echo $this->sess_usertype;?>';
	function ajaxMyWorkers(workerName, connectStatus) 
	{
		$.ajax({
			url: '<?php echo $base;?>ajax/ajaxMyWorkers',  
			type: 'post', 
			data: {'workerName': workerName, 'redirectTo': 'user_list', 'connectStatus':connectStatus },
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
		if( iconClass == 'icon-accept' ) {
			$(".cls-btn-accept").show();
			$(".cls-btn-accept").addClass('icon-accept');
		}
		else {
			$(".cls-btn-accept").hide();
			$(".cls-btn-accept").removeClass('icon-accept');
		}
		$("#hidn_sel_user").val(userId);
		$.ajax({
			url: '<?php echo $base;?>ajax/ajaxMyIDCard', 
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
	
	var jq201 = jQuery.noConflict();
	jq201(document).ready(function () {
		$('#modal_worker_id_card').css('width','500px');
		
		
        /*Multiple Disconnection Function */  
        $(".cls-disconnect-connection").click(function() {            
			var len_connected_user 	= $(".cls-connected-user.selected").length;			
			var len_connection 		= $(".cls-connected-user.connection.selected").length;
			var len_crew 			= $(".cls-connected-user.crew.selected").length;
			var arr_connec 			= new Array();
            var arr_crew 			= new Array();
            var cnt_crew 			= 0;

			if( len_connected_user==0) {
				alert( "Please select atleast 1 User." );
				return false;
			}
			
			if( $(this).hasClass("cls-disconnect-connection") ) {
				var ajax_url = "disconnect_connection";
			}
			
			var commonMsg = call_disconnect = "";
			$(".cls-connected-user.selected").each(function() {
				var validUser = true;
				if ($(this).attr('connect_status') == ""){
					commonMsg  += '\n'+$(this).attr('username')+' is not connected yet';
					validUser = false;
				}
				if(validUser) {
					call_disconnect = true;
					if( $(this).hasClass('crew') ) {
						arr_crew[cnt_crew] = $(this).attr('crew_id');						
						cnt_crew++;
					}
					if( $(this).hasClass('connection') ) {
						arr_connec.push({
							'user_id': $(this).attr('worker_id'),'user_typeid': $(this).attr('type_id')
						});
					}
				}
			});
			if(commonMsg != "") {
				alert(commonMsg);
				return false;
			}
				
			if( call_disconnect ) {
				if( confirm("Are you sure you want to Disconnect with selected User(s)?") ) {    
					if(arr_connec.length > 0 || arr_crew.length > 0) {
						$.ajax({
							url: '<?php echo $base;?>ajax/'+ajax_url, 
							type: 'post', 
							data: {'arr_connec': arr_connec,'arr_crew':arr_crew },
							success: function(output) {
								location.reload();
							},
							error: function(errMsg) {
									alert( errMsg.responseText );
									return false;
							}
						});
					}
					else {
						location.reload();
					}
				}
			}
        });

		
		
        /*Multiple Connection Function */  
        $(".cls-multiconnect-connections").click(function() {
            var len_connected_user 	= $(".cls-connected-user.selected").length;			
			var len_connection 		= $(".cls-connected-user.connection.selected").length;
			var len_crew 			= $(".cls-connected-user.crew.selected").length;
			var arr_connec 			= new Array();
			var arr_workers   = new Array();

			if( len_connected_user==0) {
				alert( "Please select atleast 1 User." );
				return false;
			}
            if( len_connection>0 && len_crew>0 ) {
				alert( "You can not connect Crew and User at the same time." );
				return false;
			}
			if($(this).hasClass("cls-multiconnect-connections")) {
				var ajax_url = "multiconnect_connection";
			}
			
			// Check if select connections has same user type or not // 
				var cnt_connec = same_usertype = 0;
				var arr_usertypes = new Array();
				$(".cls-connected-user.selected").each(function() {
					if( $(this).hasClass('connection') ) {
						var val_usertypeid = $(this).attr('type_id');
						var is_same_usertype = $.inArray(val_usertypeid,"["+arr_usertypes+"]");
						if( is_same_usertype == 1 ) {}
						else if(cnt_connec > 0){
							same_usertype = -1;
							alert("Please select connections of same user type");
							return false;
						}
						arr_usertypes[cnt_connec] = val_usertypeid;
						cnt_connec++;
					}
				});
				if(same_usertype == -1) { return false; }

			var commonMsg = call_connection = "";
			$(".cls-connected-user.selected").each(function() {
				var validUser 			= true;
				var val_workerid 		= $(this).attr('worker_id');
				var val_usertypeid 		= $(this).attr('type_id');
				var val_username 		= $(this).attr('username').toUpperCase();
				var val_connect_status 	= $(this).attr('connect_status');
				
				if( $(this).hasClass('connection') ) {
					call_connection = true;
					if( val_connect_status == 1 ) {
						commonMsg  += '\n'+val_username+' is already connected';
						validUser = false;
					}
					if( val_connect_status == 0 && $(this).attr('link_status') == "Requested" ) {
						commonMsg  += '\n Connection request has already sent to '+val_username;
						validUser = false;
					}
					if( validUser ) {
						arr_connec.push({
							'user_id': val_workerid, 'user_name': val_username, 'user_typeid': val_usertypeid,'connect_status': val_connect_status
						});
						if( val_usertypeid != '7' ) {
							arr_workers.push({
								'worker_id': val_workerid,'worker_name': val_username,'connect_status': val_connect_status
							});
						}
					}
				}
			});
			
			if( commonMsg != "" ) {
				alert(commonMsg);
				return false;
			}

			if( call_connection ) {
				if( confirm("Are you sure you want to Connect with selected User(s)?") ) {
					if(arr_connec.length > 0) {
						$.ajax({
							url: '<?php echo $base;?>ajax/'+ajax_url, 
							type: 'post', 
							data: {'arr_connec': arr_connec},
							success: function(output) {
								if(output.trim() !== "") {
									if( arr_workers.length > 0 ) {
										location.reload();
									}
									else {
										$(".cls_union_connection").html(output);
										$("#modal_union_connection").modal('show');
									}
								}
								else {
									location.reload();
								}
							},
							error: function(errMsg) {
								alert( errMsg.responseText );
								return false;
							}
						});
					}
					else {
						 location.reload();
					}
				}
			}
			return false;
        });
        
	});
								
</script>
