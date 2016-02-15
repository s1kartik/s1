<?php $this->load->view('header_admin');

?>
<div class="homebg metro ">
	<!--BEGIN PAGE TITLE-->
    <div class="container">
        <div class="main-content padding-metro-header subheader-secondary clearfix fg-grayLighter">
        <em class="margin20">MY CLIENTS</em>
        </div>
    </div>
    <!--END PAGE TITLE-->
    <div class="container">
        <div class="main-content padding-metro-home clearfix">             
        <!--START first column profiles users tiles-->
			
				<form class="form-inline no-margin" method="post" name="frm_consultant" id="frm_consultant">
					<fieldset>
					
					<div class="input-control text size3" style="height:30px">
						<input type="text" value="<?php echo $this->input->post('txt_username');?>" name="txt_username" id="txt_username" placeholder="Search"/>
                                                <button type="submit" class="btn-search fg-gray"></button>
					</div>
					</fieldset>
				</form>
        <?php if( isset($_POST) && isset($links) && is_array($links) && count($links) == 0    ) {    ?>
            <div class="tile-group six no-margin no-padding" >
                    <h4 class="fglightgrey">No results found, please search again</h4>
            </div>  
            <style>
                .tile-group.two.no-margin.no-padding.clearfix {float: right;}
            </style>
            <?php }?>        
		<!--JUST FOR DESIGNING PURPOSES - MOCKUP ELEMENTS TO BE FOLLOWED-->
                            <?php    
                                //Common::pr($links);die;
				if( isset($links) && is_array($links) && sizeof($links) ) {
                                    ?>
                            <div class="tile-group six no-margin no-padding">
                                <?php
					$cnt_org = 0;
					foreach($links as $ln) { 
                                                $employer_id 		= $ln['id']; 
                                                $firstname 		= $ln['firstname'];
						$lastname 		= $ln['lastname'];                                                
                                                $connec_status 	= $ln['designate_status'];                                                
                                                $usertype = "employer";
                                                $modal_worker_id_card 	= "#modal_worker_id_card";
                                                $icon_class = '';
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
									$link_status = "Requested";
                                    $icon_class = "icon-request";
									$class_badge = 'bg-red';
									
                                    break;	
									}							
								case 1: {
									$link_status = "Linked";
									$connec_icon = "icon-checkmark";
									break;
								}
							}
						}                                                
						?>
						<div  class="tile half-library bg-black NotLinked cls-connected-user connection worker  " title="<?php echo $firstname." ".$lastname;?>"  connect_status="<?php echo $connec_status;?>" id="employer_<?php echo $employer_id;?>" link_status="Not Linked" employer_id="<?php echo $employer_id;?>" username="<?php echo str_replace(" ","",strtolower($firstname))." ".strtolower($lastname);?>">
							<div class="tile-content email">					
								<div style="height:36px; width:36px;" class="email-image">
                                                                        <?php $userimg = (!empty($ln['profile_image'])) ? $base.$this->path_upload_profiles.$ln['profile_image'] : $base."img/default.png";?>
									<a href='<?php echo $modal_worker_id_card;?>' data-toggle='modal');" data-toggle='modal' >
										<img src='<?php echo $userimg;?>'/>
									</a>
								</div>
								<div style="margin-left:40px;margin-top:-5px;" class="email-data">
									<span class="email-data-text"><?php echo $firstname." ".$lastname;?></span>
								</div>
							</div>
							<div class="brand"><div class="badge no-margin fg-white <?php echo $class_badge;?>"><span class="cls-connec-icon <?php echo $connec_icon;?> <?php echo $icon_class;?> " rel="<?php echo $employer_id;?>"></span></div></div>
						</div>
						<input type="hidden" name="hidn_sel_user" id="hidn_sel_user">
						<?php 
						if(""==$connec_status ) {?>
							<script type="text/javascript">
								$('#<?php echo "employer_".$employer_id;?>').click(function(){
									if($('#<?php echo "employer_".$employer_id;?>').hasClass('selected')) {
										$('#<?php echo "employer_".$employer_id;?>').removeClass('selected');
									}
									else {
										$('#<?php echo "employer_".$employer_id;?>').addClass('selected');
									}
								});
							</script>
							<?php 
						}
						else if("0"==$connec_status){ ?>
							<script type="text/javascript">
								$('#<?php echo "employer_".$employer_id;?>').click(function(){
									alert("Your request has been already sent to Client.")
								});
							</script>
							<?php 
						}
						else if ("1" == $connec_status) {?>
							<script type="text/javascript">
								$('#<?php echo "employer_".$employer_id;?>').click(function(){                                                                
										window.location = ("<?php echo $base;?>admin/my_client_page?id=<?php echo $employer_id;?>");                                                                
								});
							</script>
						<?php 
						}
					}?>			<!--end first column profiles users tiles-->
                </div>         
				<?php }?>                                
                            <!-- END OF JUST FOR DESIGNING PURPOSES - MOCKUP ELEMENTS TO BE FOLLOWED-->							

        <!--START SECON column ASSIGN/CONNECTION tiles-->  
		<div class="tile-group no-margin no-padding clearfix span2">  
        	<div class="bg-transparent " style="height:40px;box-shadow: 0px 0px 0px inset;">
			</div>                   
                <a href="javascript:void(0);" class="tile double profile-content-box tab-content cls-multidesingate-employer" title="Designate">
                <img src="<?php echo $base;?>img/connections/connect.png">
                <!--end small tile--> 
                </a>
			<div class="tile triple-vertical double profile-content-box tab-content"><img src="<?php echo $base;?>img/my_worker/my_worker_ads.png"></div>
                 <!--begin small tile-->                       
                </div>
        <!--END SECOND column ASSIGN/CONNECTION tiles-->     
        
</div>
</div>
</div>
<?php $this->load->view('footer_admin');?>
<script type="text/javascript" src="<?php echo $base;?>js/jquery/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo $base;?>js/jquery-ui.js"></script>
<script type="text/javascript">
	
var jq201 = jQuery.noConflict();
jq201(document).ready(function () {
	/*Multiple Designate Function */  
	$(".cls-multidesingate-employer").click(function() {
		var len_connected_user 	= $(".cls-connected-user.selected").length;
		var arr_employer  = new Array();
			$(".cls-connected-user.selected").each(function() {
				if( $(this).hasClass('connection') ) {
					var val_employerid = $(this).attr('employer_id');
					arr_employer.push({
						'employer_id': val_employerid,
					});
				}
			});
					
		if( len_connected_user==0) {
			alert( "Please select atleast 1 User." );
			return false;
		}
		if($(this).hasClass("cls-multidesingate-employer")) {
			var ajax_url = "multi_designate_employer";
		}                        
		if( confirm("Are you sure you want to Designate with selected User(s)?") ) {
			if(arr_employer.length > 0) {
				$.ajax({
					url: '<?php echo $base;?>ajax/'+ajax_url, 
					type: 'post', 
					data: {'arr_employer': arr_employer},
					success: function(output) {
						location.href = js_base_path+"admin/my_clients";
					},
					error: function(errMsg) {
						alert( errMsg.responseText );
						return false;
					}
				});
			}
			else {
				location.href(js_base_path+"admin/my_clients");
			}
		}
	});
	
	$(document).on('click', '.icon-request', function(){
		alert("Your request has been already sent to Client.")
	});
});
</script>  