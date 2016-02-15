<?php $this->load->view('header_admin');?>
<link rel="stylesheet" href="<?php echo $base;?>css/metro-bootstrap.css">
<link rel="stylesheet" href="<?php echo $base;?>css/metro-bootstrap-responsive.css">
	<div class="homebg metro ">
		<div class="container-fluid ">
			<div class="main-content padding-metro-home clearfix"> 
							<!--START CODE FOR METRO STYLE-->
								<!-------BEGIN FIRST ROW OF TILES------>
									<div class="tile-group no-margin no-padding clearfix span3" >                    
										<!--begin tiles menus left side general page -->
                                        <?php $this->load->view('profile_view_tiles_menu_left');?>
										<!--end tile menus left side general page-->  
										 
										
										
									</div>
								<!-------END FIRST ROW OF TILES------> 
                                <!-- BEGIN SECOND COLUMN FIRST ROW -->
                                <div class="tile-group no-margin no-padding clearfix span7" > 
								<!--begin text information paragraphs -->
											<div class="tile quadro marcio-profile triple-vertical ol-transparent bg-white" >
												<div class="tile-content">
													<div class="panel no-border">
														
  <!-- Begin Charity -->                                                      
 <div class="charities-container" style="padding:10px 10px 0px 20px;box-shadow: none;">
 TEXT HERE
    <div href='#Modal' data-toggle='modal'><strong>...read more...</strong></div>
 </div>   
  
<!-- End Charity -->
                        <!--start modal page-->
                            <div id="Modal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h3 id="myModalLabel">"MODAL TITLE"</h3>
                                </div>
                                <div class="modal-body">
                                <!--BEGIN BODY MODAL CHARITIES-->
                                 <div class="charities-container" style="padding:5px 10px 0px 10px;box-shadow: none;">
                                "MODAL TEXT HERE"
                                </div>
                                <!--END BODY MODAL CHARITIES-->  
                                </div>
                                <div class="modal-footer">
                                    <button class="btn" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        <!--end modal page-->

														
													</div>
												</div>
											</div>
										<!--end text information paragraphs--> 
                                 </div>
                                 <!-- END SECOND COLUMN FIRST ROW -->
                                 <!-------BEGIN THIRD COLUMN FIRST ROW OF TILES------>
									<div class="tile-group no-margin no-padding clearfix span2" >                    
										<!--begin text information paragraphs -->
											<!--begin small tile-->
									<?php $this->load->view('connection_tile');?>
								<!--end small tile--> 
                                
										<!--end text information paragraphs-->  
										 
										
										
									</div>
								<!-------END  THIRD COLUMN FIRST ROW OF TILES------> 
			</div>
		</div>
	</div>
<!--END OF CODE FOR METRO STYLE-->


<?php $this->load->view('footer_admin');?>
<!---BEGIN SCRIPTS FOR CONNECTIONS-->
<script type="text/javascript">
    var jq191 = jQuery.noConflict();
    jq191(document).ready(function () {
        jq191('.NotLinked img').draggable({helper: 'clone', start: function (event, ui) {
            /*
                jq191(ui.helper).css("margin-left", event.clientX - jq191(event.target).offset().left);
                jq191(ui.helper).css("margin-top", event.clientY - jq191(event.target).offset().top);*/
        }});
        jq191('.profile-user').droppable({
          drop: function( event, ui ) {
            jq191.post('<?php echo $base;?>admin/connectRequest', {'id':ui.draggable.attr('rel'), 'from-id':<?php echo $this->session->userdata("userid");?>}, function(data){
                $('#btn'+ui.draggable.attr('rel')).removeClass('btn-danger btn-not-linked').addClass('btn-warning').html('requested');
            })
          }
        });
    }) 
</script>

<script type="text/javascript">
    $(document).ready(function () {
        $('.btn-not-linked').click(function(){
            $id = $(this).attr('rel');
            obj = $(this);
            $($.post(
                    '<?php echo $base;?>admin/connectRequest',
                    {'id': $id, 'from-id':<?php echo $this->session->userdata("userid");?>},
                    function(data) {
                        obj.removeClass('btn-danger btn-not-linked').addClass('btn-warning').html('requested');
                    })
            )
        })
        $(document).on('click', '.btn-accept', function(){
            $id = $(this).attr('rel');
            obj = $(this);
            $($.post(
                    '<?php echo $base;?>admin/connectAccept',
                    {'id': $id, 'from-id':<?php echo $this->session->userdata("userid");?>},
                    function(data) {
                        obj.removeClass('btn-warning btn-accept').addClass('btn-info').html('Linked');
                        obj.parent().children('button.btn-ignore').remove();
                    })
            )
        })
        $(document).on('click', '.btn-ignore', function(){
            $id = $(this).attr('rel');
            obj = $(this);
            $($.post(
                    '<?php echo $base;?>admin/connectIgnore',
                    {'id': $id, 'from-id':<?php echo $this->session->userdata("userid");?>},
                    function(data) {
                        obj.parent().children('.btn-accept').removeClass('btn-warning btn-accept').addClass('btn-danger').html('Rejected');
                        obj.remove();
                    })
            )
        })
        $('.btn-search').click(function(e){
            if($('.searchtxt').val().trim()==""){
                e.preventDefault();
                alert('Please type the name you searched');
            }
        })  
        $('#filter').change(function(){
            switch($(this).val()){
                case 'ALL':
                    $('.linkedto-item-right-tile').show();
                    break;
                case 'LINKED':
                    $('.linkedto-item-right-tile').hide();
                    $('.Linked').show();
                    
                    break;
                case "UNLINKED":
                    $('.linkedto-item-right-tile').hide();
                    $('.linkedto-item-right-tile').not('.Linked').show();
                    break;
            }
        })              
    })
</script>
<!---END SCRIPTS FOR CONNECTIONS-->
