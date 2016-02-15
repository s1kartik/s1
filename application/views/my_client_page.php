<?php $this->load->view('header_admin');?>
<div class="homebg metro ">
	<!--BEGIN PAGE TITLE-->
    <div class="container">
        <div class="main-content padding-metro-header subheader-secondary clearfix fg-grayLighter">
        <em class="margin20">MY CLIENT PAGE</em>
        </div>
    </div>
    <!--END PAGE TITLE-->
    <div class="container-fluid ">
			<div class="main-content padding-metro-home my-client-page-toppart clearfix"> 
				<!--START CODE FOR METRO STYLE-->
					<!-------BEGIN FIRST ROW OF TILES------>
					<div class="tile-group two no-margin no-padding clearfix ">
					<!--begin small tile-->
					<a class="tile double bg-black inbox-redtile" href="#home" data-toggle="tab">
						<div class="tile-content">
						<i class="icon on-left">
							<?php 
							$userimg = (!empty($userdata['profile_image'])) ? $base.$this->path_upload_profiles.$userdata['profile_image'] : $base."img/default.png";?>
							<img src="<?php echo $userimg;?>" class="w120 h120 padding10">
						</i>
						</div>
						<span class="text-right brand padding20">
							<h3 class="fg-white"><strong><?php echo (!empty($userdata['firstname'])) ? $userdata['firstname'] : "";?></strong></h3>
							<h3 class="fg-white"><strong><?php echo (!empty($userdata['firstname'])) ? $userdata['lastname'] : "";?></strong></strong></h3>
						</span>
					</a>
							<!--end small tile-->
							<!--begin small tile-->
								<a class="tile  double bg-darker" href='#tools' data-toggle='tab'>
									<!--<div class="tile-content icon"><img src="http://localhost/s1localdev/img/profile-home/my_library.png"></div>-->
								<div class="tile-content icon"><img src="<?php echo $base;?>img/welcome/icons/our_tools.png" /></div>
									<div class="brand"><span class="label fg-white text-right">TOOLS</span></div>
								</a>
							<!--end small tile--> 
							
                            <!--begin small tile-->
								<a class="tile double  bg-darker"  href="<?php echo $base."admin/profile?userid=".$clientID;?>" >
									<div class="tile-content icon"><i class="icon-grid-view"></i></div>
									<div class="brand"><span class="label fg-white text-right">PROFILE HOME</span></div>
								</a>
							<!--end small tile-->
						</div>
					<!-------END FIRST ROW OF TILES------> 
			
				<!-- BEGIN SECOND COLUMN FIRST ROW -->
				<div class="tile-group  no-margin no-padding clearfix my-client-right-tab-data" >
					<!-- Begin TILE CONTENT -->                                                      
						<div class="tile-content">
							<!--begin tab control-->
								<div class="tab-content ">
									<!--begin Inbox tab-->
										<div class="active tab-pane fade in" id="home">
											<div class="tile-group no-margin no-padding clearfix"> <?php $this->load->view('my_client_summary');?></div>
										</div>
									<!--end Inbox tab-->
									<!--begin Sent tab-->
										<div class="tab-pane fade" id="tools">
											<div class="tile-group no-margin no-padding clearfix " > 
												<?php $this->load->view('my_client_tools');?>
                                             </div>
										</div>
									<!--end Sent tab-->
									
								</div>
							<!--end tab control-->    
						</div>  
					<!-- End TILE CONTENT -->
				</div>
				<!-- END SECOND COLUMN FIRST ROW -->
			</div>
		</div>
</div>
<?php $this->load->view('footer_admin');?>
<link rel="stylesheet" href="<?php echo $base;?>css/jquery-ui.css" />
<script type="text/javascript" src="<?php echo $base;?>js/jquery/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo $base;?>js/jquery-ui.js"></script>
<script type="text/javascript">
    $(document).ready(function () {

	if( $("li.profile>a").length > 0 ) {
		$("li.profile>a").click(function(){
			$tab_selected = $(this).attr('href');                    
			$queryurl  = "?id="+<?php echo $clientID ?>;                    
			window.location.href = js_base_path+"admin/"+js_method+$queryurl+$tab_selected;
		});
		var hash_val = window.location.hash.substr(1);
                var pageCond = hash_val;
                var sub_hash_val = "";                
		hash_val = !(hash_val) ? "home" : hash_val;
                //$("#tools").addClass("active")               
		hash_val = hash_val.split("&");                
                sub_hash_val = hash_val[0].split("#");
                if(hash_val != "home")
                {
                    $(".tab-pane[id='home']").removeClass( "in active" );
                    if(pageCond != "")
                    {
                        $('#menuToolsContainer').children('li').each( function () {
                            var idLi=$(this).attr("id");                            
                            if("menu_"+sub_hash_val[1] != idLi){
                                $(this).removeClass('active');
                            }
                            else{
                                $(".profile[id='menu_"+sub_hash_val[1]+"']").addClass('active');
                            }
                        });

                        $('#contentContainer').children('div').each( function () {
                            var idDiv=$(this).attr("id");
                            if(sub_hash_val[1] != idDiv){
                                $(".tab-pane[id='"+idDiv+"']").removeClass('in active');
                            }
                        });
                    }
                    
                    
                    $(".tab-pane[id='"+sub_hash_val[1]+"']").addClass('in active');
                    $(".tab-pane[id='"+sub_hash_val[0]+"']").addClass('in active');                    
                }

	}
        $('#searchInstructor').click(function(){
        
            var clientID = '<?php echo isset($_GET['id']) ? $_GET['id'] : "";?>';
            var txtUsername = "";
            txtUsername = $('#txt_workername').val();
                $.ajax({
                        url: '<?php echo $base;?>ajax/ajaxgetInstructor', 
                        type: 'post',
                        data: {'client_id': clientID,'userNameVal':txtUsername}, 
                        success: function(output) {
                                if(output.trim() !== "") {
                                    $("#containerInstructor").html(output);
                                    $("#searchflag").val("yes");
                                }                           
                        },
                        error: function(errMsg) {
                                alert( errMsg.responseText );
                                return false;
                        }
                });
        });
    });
</script>

