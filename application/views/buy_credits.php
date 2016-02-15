<?php $this->load->view('header_admin');?>
<script type="text/javascript" src="<?php echo $base;?>js/metro/metro.min.js"></script>

	<div class="homebg metro ">
		<!--BEGIN PAGE TITLE-->
		<div class="container-fluid">
			<div class="main-content padding-metro-header subheader-secondary clearfix fg-grayLighter"><em class="margin20">BUY CREDITS</em></div>
		</div>
		<!--END PAGE TITLE-->
			<div class="container-fluid">
				<div class="main-content padding-metro-home clearfix"> 
					<!-------BEGIN FIRST ROW OF TILES------>
						<div class="tile-group no-margin no-padding clearfix span3"></div>
					<!-------END FIRST ROW OF TILES------>  

					<!-- BEGIN SECOND COLUMN FIRST ROW -->
					<?php
					// $credits_packages = array();
					if( isset($credits_packages) && sizeof($credits_packages) ) {?>
						<div class="tile-group no-margin no-padding clearfix" > 
							<?php 
							$cnt_creditspkg = 0;
							foreach( $credits_packages AS $val_creditspkg ) {
								$creditspkg_id 	= isset($val_creditspkg['in_creditspkg_id']) ? $val_creditspkg['in_creditspkg_id'] : '';
								$creditspkg_name= isset($val_creditspkg['st_creditspkg_name']) ? ucwords($val_creditspkg['st_creditspkg_name']) : '';
								$creditspkg_price= isset($val_creditspkg['in_price']) ? "$".$val_creditspkg['in_price'] : '';
								$creditspkg_credits = isset($val_creditspkg['in_credits']) ? $val_creditspkg['in_credits'] : '';

								if( "Platinum" == $creditspkg_name ) {
									$class_cart = $approved_request_text = '';
									if( 'approved' == $credits_request_status) {
										$approved_request_text =  " <br><b>(Package available for shopping)</b>";
										// $class_cart = "add_to_cart".$creditspkg_id;
									}?>
									<a href="#modal_credits_request" id="id_platinum_credits" data-toggle="modal"  class="tile double triple-vertical bg-black <?php echo $class_cart;?> description" creditspkg_name="<?php echo $creditspkg_name;?>" creditspkg_credits="<?php echo $credits_requested;?>" creditspkg_price="<?php echo $credits_price;?>">
										<div class="tile-content image"><img src="<?php echo $base."img/buy_credits/platinum.png";?>"></div>
                                        <div class="tile-status">
											<!--<span class="name"><strong><?php echo $creditspkg_name;?></strong></span> -->
											<?php $id_modal_credits_request = "modal_credits_request";?>
										</div>
									</a>
									
									<!--START - Request for Platinum Package Credits-->
									<div id="<?php echo $id_modal_credits_request;?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
										<div class="modal-header bg-red">
											<h3 id="myModalLabel">Request Form - Platinum Package Credits<i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal"></i></h3>
										</div>
										<div class="modal-body">
										<div class="charities-container" style="padding:5px 10px 0px 10px;box-shadow: none;">
											<div>
												<h4 class="page-title">Enter Credits</h4>
												<form class="adminfrm" method="post" name="frm_request_platinumcredits" id="frm_request_platinumcredits">
													<div class="control-group">
													<div class="controls">
														<input class="input-large" name="txt_platinum_credits" id="txt_platinum_credits" type="text" required placeholder="Credits" />
														<input class="btn pull-right" type="submit" name="btn_request_credits" id="btn_request_credits" value="Send Request"/>
													</div>
													</div>
													<?php 
													$rows_user_credits = $this->users->getMetaDataList('credits_requests',
														'st_credits_requested_by="'.$this->sess_useremail.'"', 'ORDER BY dt_credits_request DESC',
														'id AS credit_id, in_credits_requested, in_credits_price, st_credits_request_status');

													if(sizeof($rows_user_credits)>0) {?>
													<table class="table table-striped table-bordered table-condensed table-hover">
														<thead>
															<tr>
																<th>Credits Requested</th>
																<th>Price</th>
																<th>Status</th>
																<th>Action</th>
															</tr>
														</thead>
														<?php 
														foreach($rows_user_credits AS $val_user_credits) {
															$plat_credit_id 		= $val_user_credits['credit_id'];
															$plat_credit_price 		= $val_user_credits['in_credits_price'];
															$plat_credit_requested 	= $val_user_credits['in_credits_requested'];
															?>
															<tr>
																<td><?php echo $plat_credit_requested;?></td>
																<td><?php echo "$".$plat_credit_price;?></td>
																<td><?php echo ucwords($val_user_credits['st_credits_request_status']);?></td>
																<td title="Buy Credits"><?php echo ("approved"==strtolower($val_user_credits['st_credits_request_status'])) ? "<a href='javascript:void(0);' creditspkg_name='".$creditspkg_name."' creditspkg_credits='".$plat_credit_requested."' creditspkg_price='".$plat_credit_price."' class='add_to_cart".$plat_credit_id."'>Buy</a>" : "Buy";?></td>
															</tr>

															<script type="text/javascript">
															$(document).ready(function () {
																var plat_credit_id 	= '<?php echo $plat_credit_id;?>';
																
																$('a.add_to_cart'+plat_credit_id).click(function(e){
																$.post(js_base_path+'ecommerce/addCredits', {
																	'creditspkgName':$(this).attr('creditspkg_name'), 'creditspkgCredits':$(this).attr('creditspkg_credits'), 'creditspkgPrice':$(this).attr('creditspkg_price'),'shopping_itemid':'<?php echo $plat_credit_id;?>'}, 
																	function(data){
																		var cart = $.parseJSON(data);
																		$('#qty-in_cart').text(cart.qty);
																		$('#amount_in_cart').text(cart.amount);
																		window.location.href = js_base_path+"ecommerce/shoppingcart?shoptype=creditspkg";
																	})
																})
															});
															</script>
															<?php 
														}?>
													</table>
													<?php 
													}
													else {?>
													<h6><br><p align="center">No Credits available</p></h6>
													<?php }?>
													<script type="text/javascript">
													$("#btn_request_credits").click(function(e) {
														var field_platinum_credits = $("#txt_platinum_credits");
														if( field_platinum_credits.val() <= 25000 || isNaN(field_platinum_credits.val()) ) {
															alert("Platinum Credits should be more than 25000.");
															field_platinum_credits.focus();
															e.preventDefault();
														}											
													});
													</script>
												</form>
											</div>
										</div>
										</div>
										<div class="modal-footer"><button class="btn" data-dismiss="modal">Close</button></div>
									</div>
									<!--END - Request for Platinum Package Credits-->
									<?php 
								}
								else {?>
									<a href="#" id="notify_<?php echo $creditspkg_id;?>" class="tile double triple-vertical  bg-black add_to_cart<?php echo $creditspkg_id;?> description" creditspkg_name="<?php echo $creditspkg_name;?>" creditspkg_credits="<?php echo $creditspkg_credits;?>" creditspkg_price="<?php echo $creditspkg_price;?>">
										<div class="tile-content image"><img src="<?php echo $base."img/buy_credits/".strtolower($creditspkg_name).".png";?>"></div>
                                        <div class="tile-status"></div>
									</a>
                                    
									<?php 
								}
								$cnt_creditspkg++;
								?>                                
								<script type="text/javascript">
									$(document).ready(function () {
										var creditspkg_id 			= '<?php echo $creditspkg_id;?>';
										$('.description').popover({html: true});
										$('a.add_to_cart'+creditspkg_id).click(function(e){
											$.post(js_base_path+'ecommerce/addCredits', {
											'creditspkgName':$(this).attr('creditspkg_name'), 'creditspkgCredits':$(this).attr('creditspkg_credits'), 'creditspkgPrice':$(this).attr('creditspkg_price'), 'shopping_itemid':creditspkg_id}, 
											function(data){
												var cart = $.parseJSON(data);
												$('#qty-in_cart').text(cart.qty);
												$('#amount_in_cart').text(cart.amount);
												window.location.href = "<?php echo $base;?>ecommerce/shoppingcart?shoptype=creditspkg";
											})
										})
									});
									

									/* // Commented as per the requirement Item#164 in S1System-Review-Oct-01.xlsx // 
									$("#id_platinum_credits").click(function(e){
										var credits_request_status 	= '<?php echo $credits_request_status;?>';
										if(( 'not approved' == credits_request_status )|( 'pending' == credits_request_status)) {
											alert('Credits request is pending for Approval, Please wait or select other package to proceed.');
										}
									});
									*/
								</script>
                                <script type="text/javascript">
									/* // Commented as per the requirement Item#83 in S1System-Review-Oct-01.xlsx // 
									$(function(){
										var creditspkg_id 			= '<?php echo $creditspkg_id;?>';
										$('#notify_'+creditspkg_id).on('click', function(){
											setTimeout(function(){
												$.Notify({style: {background: '#fff', color: '#000'},  content: "Awesome!!!"});
											}, 1000);
											setTimeout(function(){
												$.Notify({style: {background: '#fff', color: 'black'}, content: "Keep Shopping!!!"});
											}, 3000);
											setTimeout(function(){
												$.Notify({style: {background: '#fff', color: 'black'}, content: "Then proceed to checkout!!!"});
											}, 5000);
										});
									});
									*/
								</script>
								<?php
							}?>
						</div>
						<?php
					}
					else {
						echo "<h4 align='center' class='fgred'>Sorry, No Credits Packages avaibale</h4>"; 
					}?>
					<!-- END SECOND COLUMN FIRST ROW -->
					<!-------BEGIN THIRD COLUMN FIRST ROW OF TILES------>
					<div class="tile-group no-margin no-padding clearfix span2"></div>
					<!-------END  THIRD COLUMN FIRST ROW OF TILES------> 
				</div>
			</div>
	</div>
<!--END OF CODE FOR METRO STYLE-->
<?php $this->load->view('footer_admin');?>