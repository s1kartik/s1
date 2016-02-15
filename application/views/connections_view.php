<?php $this->load->view('header_admin'); ?>
<div class="profile-header">
<h3>CONNECTIONS</h3>
</div>
<div class="linkedto-container">
<!--linked filter-->
 <div id="link-filter" class="content-row" >
        <div class="profile-content-filter">
          <div class="row-fluid">
           <div class="span12">
           <form class="form-inline" method="post" >            
                <fieldset>  
                    <div class="controls ">
                    <input type="text" name="name" class="input-large searchtxt" placeholder="search your contacts" required />
                    <!--
                    <label class="checkbox"><input type="checkbox"/>Employers</label>
                    <label class="checkbox"><input type="checkbox"/>Workers</label>
                    <label class="checkbox"><input type="checkbox"/>Students</label>
                    -->
                    <button type="submit" class="btn btn-search">Search</button>
                    <input type="hidden" name="action" value="SEARCH" />
                    <select id="filter" class="input-small pull-right">
                    <option value="ALL">all</option>
                    <option value="LINKED">linked</option>
                    <option value="UNLINKED">not linked</option>
                    </select>
                    </div>
                </fieldset>
              </form>
           </div>
            <!-- <div class="span2">
           <form class="form-inline" >            
                <fieldset>  
                    <div class="controls text-right ">
                    <select class="input-small">
                    <option>all</option>
                    <option>linked</option>
                    <option>not linked</option>
                    </select>
                    </div>
                </fieldset>
              </form>
           </div>-->
          </div>  
            </div>
          </div>
<!-- end filter -->
<?php //if(in_array($this->session->userdata("usertype"), array(7, 9, 11))):?>
<div class="linked-group">
    <div class="linked-heading">
        <h4>ORGANIZATIONS I'M LINKED TO</h4>
    </div>
    <?php 
        if(count($org_links)>0):
            foreach($org_links as $link):
                $usermeta 	= $this->users->getUserMetaByID($link['id']);
                $province 	= (isset($usermeta['province_id']))?$this->users->getElementByID('tbl_province', $usermeta['province_id']):array();
				$city 		= (isset($usermeta['city_id']))?$this->users->getElementByID('tbl_city', $usermeta['city_id']):array();
                $industry 	= $this->users->getElementByID('tbl_industry', $link['industry_id']);
				
                if(is_null($link['link_status'])){
                    $link_status = "Not Linked";
                    $btn_css = "btn-danger btn-not-linked";
                }else{
                    switch($link['link_status']){
                        case 0:
                            if($link['requester']==$this->session->userdata("userid")){
                                $link_status = "Requested";
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
            <div class="linkedto-item <?php echo str_replace(" ", "", $link_status);?>">
                <ul class="inline clearfix">
					<li class="linked-img">
						<?php 
						if( !empty($link['profile_image']) ) {
							$pimg = $base.$this->path_upload_profiles.$link['profile_image'];
						}
						else {
							$pimg = $base."img/default.png";
						}
						?>
						<img src="<?php echo $pimg;?>" rel="<?php echo $link['id'];?> width="100" />
                    </li>
                    <li class="contact-details">
                        <p class="lead"><?php echo isset($usermeta['company_name'])?$usermeta['company_name']:$link['nickname'];?></p>
                        <p><strong><?php echo count($city)>0?$city['cityname']:'';?>, <?php echo count($province)>0?$province['provincename']:'';?></strong></p>
                        <p><?php echo isset($industry['industryname'])?$industry['industryname']:'-';?></p>
                        <p><small><a href="#"><?php echo $this->users->getLinksNumberByUserID($link['id']);?> current members</a></small></p>
                        <p ><small ><a>send message</a></small></p>
                    </li>
                    <li class="contact-options">
                        <button class="btn btn-mini <?php echo $btn_css;?>" rel="<?php echo $link['id'];?>" id="btn<?php echo $link['id'];?>"><?php echo $link_status;?></button>
                        <?php if($link_status=="Accept"):?>
                       <button class="btn btn-mini btn-ignore" rel="<?php echo $link['id'];?>">Ignore</button>
                       <?php endif;?>
                    </li>
                </ul>
            </div>
         <!-- end item-->
          
    <?php endforeach; else:?>
        <?php if(isset($_POST['action']) && $_POST['action']=="SEARCH"):?>
        <p class="noresults">No search results.</p>
        <?php else:?>
        <p class="noresults">No any links.</p>
        <?php endif;?>
    <?php endif;?>
</div>
<?php //endif;?>
<?php if(in_array($this->session->userdata("usertype"), array(7, 8))):?>
<div class="linked-group ">
    <div class="linked-heading">
        <h4>PEOPLE I'M LINKED TO</h4>
    </div>
    <?php 
        if(count($peo_links)>0):
            foreach( $peo_links as $link ):
                $usermeta 	= $this->users->getUserMetaByID($link['id']);
                $province 	= (isset($usermeta['province_id']))?$this->users->getElementByID('tbl_province', $usermeta['province_id']):array();
				$city 		= (isset($usermeta['city_id']))?$this->users->getElementByID('tbl_city', $usermeta['city_id']):array();
				$industry 	= $this->users->getElementByID('tbl_industry', $link['industry_id']);
				
                if( is_null($link['link_status']) ){
                    $link_status = "Not Linked";
                    $btn_css = "btn-danger btn-not-linked";
                }else{
                    switch($link['link_status']) {
                        case 0:
                            if($link['requester']==$this->session->userdata("userid")){
                                $link_status = "Requested";
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
            <div class="linkedto-item <?php echo str_replace(" ", "", $link_status);?>">
                <ul class="inline clearfix">
                  <li class="linked-img">
                    <?php 
					if( !empty($link['profile_image']) ) {
						$pimg = $base.$this->path_upload_profiles.$link['profile_image'];
					}
					else {
						$pimg = $base."img/default.png";
					}
					?>
					<img src="<?php echo $pimg;?>" rel="<?php echo $link['id'];?> width="100" />
                  </li>
                   <li class="contact-details">
                    <p><span class="lead"><?php echo $link['firstname']." ".$link['lastname'];?></span> <strong>(<?php echo $link['nickname'];?>)</strong></p>
                    <p><?php echo count($city)>0?$city['cityname']:'';?>, <?php echo count($province)>0?$province['provincename']:'';?></p><p><?php echo $industry['industryname'];?></p>
                    <p><small><a href="#"><?php echo $this->users->getLinksNumberByUserID($link['id']);?> common links</a></small></p>
                       <p ><small ><a>send message</a></small></p>
                  </li>
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
<script type="text/javascript" src="<?php echo $base;?>js/jquery/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo $base;?>js/jquery-ui.js"></script>
<script type="text/javascript">
    var jq201 = jQuery.noConflict();
    jq201(document).ready(function () {
        jq201('.profile-user').droppable({
          drop: function( event, ui ) {
            jq201.post('<?php echo $base;?>admin/connectRequest', {'id':ui.draggable.attr('rel'), 'from-id':<?php echo $this->session->userdata("userid");?>}, function(data){
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
                    $('.linkedto-item').show();
                    break;
                case 'LINKED':
                    $('.linkedto-item').hide();
                    $('.Linked').show();
                    
                    break;
                case "UNLINKED":
                    $('.linkedto-item').hide();
                    $('.linkedto-item').not('.Linked').show();
                    break;
            }
        })      
    })
</script>
<?php $this->load->view('footer_admin'); ?>