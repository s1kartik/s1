<?php 
$this->load->view('header_admin');?>
<script type="text/javascript" src="<?php echo $base;?>js/metro/metro.min.js"></script>
<div class="homebg metro ">
	<!--BEGIN PAGE TITLE-->
    <div class="container">
        <div class="main-content padding-metro-header subheader-secondary clearfix fg-grayLighter">
        <em class="margin20">DIGITAL RECORDS OF TRAINING</em>
        </div>
    </div>
    <!--END PAGE TITLE-->
    <div class="container">
        <div class="main-content padding-metro-home clearfix"> 
        <!--START first column Badges tiles-->
			<div class="tile-group six no-margin no-padding">
				<form class="form-inline no-margin" method="post" name="frm_badges" id="frm_badges">
					<fieldset>
					<?php 
					if( ($this->sess_usertype != '9' && $this->sess_usertype != '11') && "myworkers" != $redirect_from ) { // 9=Worker, 11=Student //?>
						<div class="input-control select size3">
							<select class="f13" name="cmb_badges" id="cmb_badges">
								<option value="s1badges">S1 D.R.O.T</option>
								<option value="mybadges">My D.R.O.T</option>
							</select>
						</div>
						<?php 
					}?>
					<div class="input-control text size3" style="height:30px">
						<input type="text" value="<?php echo $this->input->post('txt_badge_title');?>" name="txt_badge_title" id="txt_badge_title" placeholder="D.R.O.T Title" class=""/>
						<button type="submit" class="btn-search fg-gray"></button>
					</div>
					</fieldset>
				</form>

                <?php 
				// BUY BADGES //
					if( ($this->sess_usertype != '9' && $this->sess_usertype != '11') && "myworkers" != $redirect_from ) {
						if( isset($badges) && is_array($badges) && sizeof($badges) ) {
							//Common::pr($badges);
							$cnt_org = 0;
							foreach($badges as $badge) { 
								$badge_id 		= $badge['id']; 
								$badge_title	= $badge['st_badge_title'];
								$badge_description	= isset($badge['st_badge_description'])&&$badge['st_badge_description'] ? $badge['st_badge_description'] : "N/A";
								$badge_image 	= $badge['st_badge_image'];
								$badge_status 	= $badge['in_status'];
								?>
								<div class="tile bg-black badgeid<?php echo $badge_id;?> badge s1badge hover_description" data-toggle="popover" data-content="<h6><?php echo $badge_description;?></h6>" data-original-title="<h6 class='margin10'><?php echo $badge_title;?></h6>" data-placement="bottom" data-trigger="hover" badge_id='<?php echo $badge_id;?>' id="badge_<?php echo $badge_id;?>" badge_title="<?php echo str_replace(" ","",strtolower($badge_title));?>">
									<?php $badge_image = (!empty($badge_image)) ? $base."img/badges/".$badge_image : $this->base."img/default.png";?>
									<a href='#' data-toggle='modal'><img src='<?php echo $badge_image;?>' width="120" height="110"></a>
								</div>
								<?php 
								if("1"==$badge_status) {?>
									<script type="text/javascript">
										$('#<?php echo "badge_".$badge_id;?>').click(function(){
											if($('#<?php echo "badge_".$badge_id;?>').hasClass('selected')) {
												$('#<?php echo "badge_".$badge_id;?>').removeClass('selected');
											}
											else {
												$('#<?php echo "badge_".$badge_id;?>').addClass('selected');
											}
										});
									</script>
									<?php 
								}
							}
						}
						$show_badges = 'display:none;';
					}
					else {
						$show_badges = '';
					}
				
				// MY BADGES (Show Assigned Badges for Worker and Students and Show Purchased Badges for the other Users //
					if( isset($my_badges) && is_array($my_badges) && sizeof($my_badges) ) {
						$cnt_mybadge = 0;
						foreach($my_badges as $mybadge) {
							$cnt_mybadge++;
							$badge_id 				= $mybadge['id'];
							$assigned_by			= isset($mybadge['assigned_by']) ? $mybadge['assigned_by'] : '';
							$libtype_bought		= isset($mybadge['st_libtype_bought']) ? $mybadge['st_libtype_bought'] : '';
							$badge_title			= isset($mybadge['st_badge_title']) ? $mybadge['st_badge_title'] : '';
							$badge_description		= isset($mybadge['st_badge_description'])&&$mybadge['st_badge_description'] ? $mybadge['st_badge_description'] : "N/A";
							$total_badge_purchased	= isset($mybadge['total_badge_purchased']) ? $mybadge['total_badge_purchased'] : '';
							$total_badge_assigned	= isset($mybadge['total_badge_assigned']) ? $mybadge['total_badge_assigned'] : '';
							$total_badge_inventory 	= ($total_badge_purchased-$total_badge_assigned);
							$badge_image	= $mybadge['st_badge_image'];
							
							if( $total_badge_inventory>0 || (!isset($mybadge['total_badge_purchased']) && $total_badge_assigned>0) ) {  ?>
								<div class="tile bg-black mybadge hover_description" data-toggle="popover" data-content="<h6><?php echo $badge_description;?></h6>" data-original-title="<h6 class='margin10'><?php echo $badge_title;?></h6>" data-placement="bottom" data-trigger="hover" style="<?php echo $show_badges;?>" badge_id='<?php echo $badge_id;?>' libtype_bought="<?php echo $libtype_bought;?>" id="mybadge_<?php echo $cnt_mybadge;?>" badge_title="<?php echo str_replace(" ","",strtolower($badge_title));?>">
									<?php $badge_image = (!empty($badge_image)) ? $base."img/badges/".$badge_image : $base."img/no_image.jpg";
									if( $this->sess_usertype == '9' || $this->sess_usertype == '11' ) {?>
										<a href='#modal_badge_id_card' data-toggle='modal' onclick="javascript:ajaxBadgeIDCard('<?php echo $badge_id;?>', '<?php echo $assigned_by;?>');">
											<img src='<?php echo $badge_image;?>' width="120" height="110">
										</a>
										<?php 
									}
									else {?>
										<a href='javascript:void(0);'><img src='<?php echo $badge_image;?>' width="120" height="110">
											<div class="brand"><div class="badge bg-red"><?php echo $total_badge_inventory;?></div></div>
										</a>
										<script type="text/javascript">
											$('#<?php echo "mybadge_".$cnt_mybadge;?>').click(function(){
												if($('#<?php echo "mybadge_".$cnt_mybadge;?>').hasClass('selected')) {
													$('#<?php echo "mybadge_".$cnt_mybadge;?>').removeClass('selected');
												}
												else {
													$('#<?php echo "mybadge_".$cnt_mybadge;?>').addClass('selected');
												}
											});
										</script>
										<?php
									}?>
								</div>
								<?php
							}
						}
					}
					else {
						if ($this->sess_usertype != '9' && $this->sess_usertype != '11' ) { 
							if( sizeof($badges)<=0 ) {
								echo "<h3 class='fl'>NO DROTs available</h3>";
							}
						}
						else {
							echo "<h3 class='fl'>NO DROTs have been assigned by your employer</h3>";
						}
					}?>
				<div id="modal_badge_id_card" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					<div class="modal-header bg-red">
						<h3 id="myModalLabel">D.R.O.T  ID CARD<i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal"></i></h3>
					</div>
					<div class="modal-body"><div class="charities-container cls_badge_idcard" style="padding:0px 0px 0px 0px;box-shadow: none;"></div></div>
					<div class="modal-footer"><button class="btn" data-dismiss="modal">Close</button></div>
				</div>
			</div>
			<!--end first column Badges tiles-->
			
			<!--START SECOND column BUY BADGES tiles-->  
				<div class="conections-data">
					<?php 
					if( $this->sess_usertype == '9' || $this->sess_usertype == '11' ) {?>
						<div class="tile-group no-margin no-padding clearfix span2">  
							<div class="tile double tab-content"><img src="<?php echo $base;?>img/ad/mylibrary/training/ad1.png"></div>
							<div class="tile double tab-content"><img src="<?php echo $base;?>img/ad/mylibrary/training/ad2.png"></div>
							<div class="tile double tab-content"><img src="<?php echo $base;?>img/ad/mylibrary/training/ad3.png"></div>
						</div>
						<?php 
					}
					else {?>
						<div class="tile-group two no-margin no-padding clearfix " >  
						<?php
							$style_assignbadge 	= 'display:none;';
							$style_buybadge 	= '';
							$href_assignbadge = "javascript:void(0);";
							if( "myworkers" == $redirect_from ) {
								$style_assignbadge 	= '';
								$style_buybadge 	= 'display:none;';
								$href_assignbadge = "#modal_assign_badge";
							}?>
							<div class="bg-transparent" style="height:40px;box-shadow: 0px 0px 0px inset;"></div>
							<a href="#modal_confirm_buy_badge" style="<?php echo $style_buybadge;?>" data-toggle='modal' class="tile double bg-black cls_modal_buy_badge tab-content">
								<img src="<?php echo $base;?>img/badges/buy_badge.png">
							</a>
							
							<a href="<?php echo $href_assignbadge;?>" style="<?php echo $style_assignbadge;?>" data-toggle='modal' class="tile double tab-content cls_assign_badge">
								<img src="<?php echo $base;?>img/connections/assign_badges.png">
							</a>
							<a class="tile double bg-darker" href="#">
								<span class="text-center"><h1 class="fg-white  padding10"><img  class="w50" src="<?php echo $base;?>img/my_wallet/buy_credits.png"> <strong><?php echo number_format($badge_price, 0, '', ' ');?></strong></h1></span>
								<div class="brand"><center><h6 class="fg-white margin5">Credits price for each D.R.O.T</h6></center></div>
							</a>
						</div>
						<?php 
					}?>
					
					<div id="modal_confirm_buy_badge" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						<div class="modal-header bg-red"><h3 id="myModalLabel">Buy D.R.O.T<i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal"></i></h3></div>
						<div class="modal-body">
							<div class="charities-container cls-badge-modal" style="padding:0px 0px 0px 0px;box-shadow: none;"></div>
						</div>
						<div class="modal-footer"><button class="btn" data-dismiss="modal">Close</button></div>
					</div>
					
					<div id="id_modal_buybadge" class="modal metro fade hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						<div class="modal-header bg-red"><h3 id="myModalLabel">Buy Badge<i class="pull-right icon-cancel-2 btn-close-buybadge" style="margin-right:10px;" data-dismiss="modal"></i></h3></div>
						<div class="modal-body">
							<div class="charities-container cls_buybadge" style="padding:0px 0px 0px 0px;box-shadow: none;"></div>
						</div>
						<div class="modal-footer"><button class="btn btn-close-buybadge" data-dismiss="modal">Close</button></div>
					</div>
					
					<div id="modal_assign_badge" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						<div class="modal-header bg-red"><h3 id="myModalLabel">Assign D.R.O.T <i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal"></i></h3></div>
						<div class="modal-body"><div class="charities-container cls-badge-modal" style="padding:0px 0px 0px 0px;box-shadow: none;"></div></div>
						<div class="modal-footer"><button class="btn" data-dismiss="modal">Close</button></div>
					</div>
		
				</div>
			<!--END SECOND column BUY BADGES tiles-->
		</div>
	</div>
</div>
<?php $this->load->view('footer_admin');?>
<script type="text/javascript" src="<?php echo $base;?>js/jquery/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo $base;?>js/jquery-ui.js"></script>
<script type="text/javascript">
	function ajaxBadgeIDCard(badgeId, assignedBy)
	{
		$.ajax({
			url: js_base_path+'ajax/ajaxBadgeIDCard', 
			type: 'post', 
			data: {'badgeId': badgeId, 'assignedBy': assignedBy},
			success: function(output) {
				$(".cls_badge_idcard").html(output);
			},
			error: function(errMsg) {
				alert( errMsg.responseText );
				return false;
			}
		});
	}
	
	var jq201 = jQuery.noConflict();
	jq201(document).ready(function () {
		$redirect_from = "<?php echo $redirect_from;?>";
		$('.hover_description').popover({html: true});
		
		$(".cls_assign_badge").click(function() {
			var len_my_badges 	= $(".mybadge.selected").length;			

			if( len_my_badges==0) {
				alert( "Please select atleast 1 D.R.O.T." );
				return false;
			}
			else if( len_my_badges > 1) {
				alert( "You can assign only 1 D.R.O.T at a time." );
				return false;
			}

			if( "myworkers" != $redirect_from ) {
				var arr_mybadge = new Array();
				$(".mybadge.selected").each(function() {
					var badge_id 	= $(this).attr('badge_id');
					var badge_title = $(this).attr('badge_title');
					var libtype_bought	= $(this).attr('libtype_bought');
					arr_mybadge.push({ 'badge_id':badge_id,'badge_title':badge_title,'libtype_bought':libtype_bought });
				});

				$.ajax({
					url: js_base_path+'admin/myworkers_metro', 
					type: 'post', 
					data: {'arr_mybadge': arr_mybadge },
					success: function(output) {
						window.location.href = js_base_path+'admin/myworkers_metro?redirect_from=badges';
					},
					error: function(errMsg) {
						alert( errMsg.responseText );
						return false;
					}
				});
			}
			else {
				var badge_id 		= $(".mybadge.selected").attr('badge_id');
				var badge_title 	= $(".mybadge.selected").attr('badge_title');
				var libtype_bought	= $(".mybadge.selected").attr('libtype_bought');
				
				$.ajax({
					url: js_base_path+'ajax/ajaxAssignBadgeModal', 
					type: 'post', 
					data: {'badgeId':badge_id,'badgeTitle':badge_title,'redirectFrom':'<?php echo $redirect_from;?>','libtypeBought':libtype_bought },
					success: function(output) {
						$(".cls-badge-modal").html(output);
					}, 
					error: function(errMsg) {
						alert( errMsg.responseText );
						return false;
					}
				});
			}
		});

		$(".cls_modal_buy_badge").click(function() {
			var len_badge_selected 	= $(".s1badge.selected").length;
			if( len_badge_selected==0) {
				alert( "Please select atleast 1 D.R.O.T." );
				return false;
			}
			else {
				var credit_icon = '<img src="'+js_base_path+'img/icons_s1credit.png" style="height:25px;" />';
				var arr_badges_tobuy = new Array();
				$(".s1badge.selected").each(function() {
					var badge_id 	= $(this).attr("badge_id");
					var badge_title = $(this).attr("badge_title");
					var badge_price = '<?php echo $badge_price;?>';
					arr_badges_tobuy.push({
						'badge_id': badge_id,'badge_title': badge_title,'badge_price': badge_price
					});
				});

				$.ajax({
					url: js_base_path+'ajax/ajaxBuyBadgeModal', 
					type: 'post', 
					data: {'arrBadgesToBuy': arr_badges_tobuy, 'credit_icon': credit_icon },
					success: function(output) {
						$(".cls-badge-modal").html(output);
					}, 
					error: function(errMsg) {
						alert( errMsg.responseText );
						return false;
					}
				});
			}			
		});

		$('#cmb_badges').change(function(){
            switch($(this).val()){
				case 's1badges': {
					$('.cls_modal_buy_badge').show();
					$('.cls-connected-user').hide();
					$('.cls_assign_badge').hide();
					$('.s1badge').show();
					$('.mybadge').hide();
                    break;
				}
                case 'mybadges': {
					$('.cls_modal_buy_badge').hide();
                    $('.cls-connected-user').hide();
					$('.cls_assign_badge').show();
					$('.mybadge').show();
					$('.s1badge').hide();
                    break;
				}
            }
        });
	});
</script>