<div class="tile triple-vertical double profile-content-box tab-content">
<!-------BEGIN CONNECTIONS CODE------>
<div class="linkedto-container " style="height:380px;overflow-y: scroll;">
<!--linked filter-->
 <div id="link-filter" class="content-row" >
        <div class="profile-content-filter">
          <div class="row-fluid">
           
           <form class="form-inline" method="post" >            
                <fieldset>
                    <div class="controls ">
						<input type="text" name="name" class="input-small searchtxt" placeholder="search"/>
						<select id="filter" class="input-mini">
							<option value="ALL">all</option>
							<option value="LINKED">linked</option>
							<option value="UNLINKED">not linked</option>
						</select>
						<button type="submit" class="btn btn-search  pull-right">GO!</button>
					</div>
					<input type="hidden" name="action" value="SEARCH" />
                </fieldset>
              </form>
			</div>  
            </div>
          </div>
<!-- end filter -->


<div class="linked-group">
    <div class="command-button bg-red" style="display:block;padding: 4px 5px;"><span class="fg-white text-left"><small>ORGANIZATIONS I'M LINKED TO</small></span></div>
    <?php 
        if(count($org_links)>0) {
            foreach($org_links as $link) {
                $usermeta 	= $this->users->getUserMetaByID($link['id']);
                if(is_null($link['link_status'])){
                    $link_status = "Not Linked";
                    $btn_css = "btn-danger btn-not-linked";
                }
				else{
                    switch($link['link_status']){
                        case 0:
                            if($link['requester']==$this->session->userdata("userid")){
                                $link_status = "Requested";
                                $btn_css = "btn-warning";    
                            }
							else {
                                $link_status = "Accept";
                                $btn_css = "btn-warning btn-accept";    
                            }
                            break;  
                        case 1:
                            $link_status = "Linked";
                            $btn_css = "btn-info";
                            break;  
                    }
                }
			?>
            <!--start item-->
            <div class="linkedto-item-right-tile <?php echo str_replace(" ", "", $link_status);?>">
                <ul class="inline clearfix padding5">
					<li class="linked-img">
						<?php 
						if( file_exists(FCPATH.$this->path_upload_profiles.$link['profile_image']) ) {?>
							<img src="<?php echo $base.$this->path_upload_profiles.$link['profile_image'];?>" class="w50"/>
							<?php 
						}
						else {?><img class="w50" src="<?php echo $base;?>img/default.png" /><?php }?>
                    </li>
                    <li class="contact-details" style="width: 38%;">
						<?php $company_name = isset($usermeta['company_name'])?$usermeta['company_name']:$link['nickname'];?>
                        <p class="lead" title="<?php echo $company_name;?>"><?php echo substr($company_name,0,8)."..";?></p>
                    </li>
                    <li class="contact-options">
                        <button class="btn btn-mini <?php echo $btn_css;?>" rel="<?php echo $link['id'];?>" id="btn<?php echo $link['id'];?>"><?php echo $link_status;?></button>
                        <?php 
						if($link_status=="Accept") {?>
							<button class="btn btn-mini btn-ignore" rel="<?php echo $link['id'];?>">Ignore</button>
							<?php 
						}?>
                    </li>
                </ul>
            </div>
         <!-- end item-->
			<?php 
			}
		}
		else {
			if(isset($_POST['action']) && $_POST['action']=="SEARCH") {
				echo '<p class="noresults">No search results.</p>';
			}
			else {
				echo '<p class="noresults">No any links.</p>';
			}
		}
?>
</div>

<?php 
if(in_array($this->session->userdata("usertype"), array(1, 7, 8))):?>
<div class="linked-group">
    <div class="command-button bg-red" style="display:block"><span class="fg-white text-left"><small>PEOPLE I'M LINKED TO</small></span></div>
    <?php 
        if(count($peo_links)>0):
            foreach( $peo_links as $link ):
                $usermeta 	= $this->users->getUserMetaByID($link['id']);
				
                if( is_null($link['link_status']) ){
                    $link_status = "Not Linked";
                    $btn_css = "btn-danger btn-not-linked";
                }else{
                    switch($link['link_status']){
                        case 0:
                            if($link['requester']==$this->session->userdata("userid")){
                                $link_status = "Request<br>ed";
                                $btn_css = "btn-warning";    
                            }else{
                                $link_status = "Accept";
                                $btn_css = "btn-warning btn-accept";    
                            }
                            break;  
                        case 1:
                            $link_status = "Linked";
                            $btn_css = "btn-info";
                            break;
                    }
                }
                   
    ?>
            <!--start item-->
            <div class="linkedto-item-right-tile <?php echo str_replace(" ", "", $link_status);?>">
                <ul class="inline clearfix padding5" id="members">
                  <li class="clearfix linked-img" rel="<?php echo $link['id'];?>" id="<?php echo $link['id'];?>">
                    <?php 
					$firstname 	= isset($link['firstname'])?$link['firstname']:'';
					$lastname 	= isset($link['lastname'])?$link['lastname']:'';
					
					if( file_exists(FCPATH.$this->path_upload_profiles.$link['profile_image']) ) {?>
						<img src="<?php echo $base.$this->path_upload_profiles.$link['profile_image'];?>" class="w50"/>
						<?php 
					}
					else {?><img class="w50" src="<?php echo $base;?>img/default.png" /><?php }?>
                  </li>
                   <li class="contact-details" style="width: 38%;"><p title="<?php echo $firstname."\n".$lastname;?>" class="lead"><?php echo $this->common->subString($firstname)."<br>".$this->common->subString($lastname);?></p></li>
                   <li class="contact-options">
					   <button class="btn btn-mini <?php echo $btn_css;?>" rel="<?php echo $link['id'];?>" id="btn<?php echo $link['id'];?>"><?php echo $link_status;?></button>
					   <?php if($link_status=="Accept"):?>
					   <button class="btn btn-mini btn-ignore" rel="<?php echo $link['id'];?>">Ignore</button>
					   <?php endif;?>
                   </li>
                </ul>
            </div>            
    <?php endforeach; else:?>
        <?php if(isset($_POST['action']) && $_POST['action']=="SEARCH"):?>
			<p class="noresults">No search results.</p>
        <?php else:?>
			<p class="noresults">No any links.</p>
        <?php endif;?>
    <?php endif;?>
</div>
<?php endif;?>
</div>
<!-------END CONNECTIONS CODE------>
</div>
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
				$(".searchtxt").focus();
            }
        })  
        $('#filter').change(function(){
			// alert( $(this).val() );
            switch($(this).val()){
                case 'ALL': {
                    $('.linkedto-item-right-tile').show();
                    break;
				}
                case 'LINKED': {
                    $('.linkedto-item-right-tile').hide();
                    $('.Linked').show();
                    break;
				}
                case "UNLINKED": {
                    $('.linkedto-item-right-tile').hide();
                    $('.linkedto-item-right-tile').not('.Linked').show();
                    break;
				}
            }
        });
    })
</script>