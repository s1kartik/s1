<?php $this->load->view('header_admin'); ?>
    <h3>ASSIGN LIBRARY PIECES</h3>
    <?php if(isset($textmsg)):?>
    <div class="alert alert-block alert-error fade in">
        <button type="button" class="close" data-dismiss="alert">x</button>
        <ul>
        <?php foreach($textmsg as $msg):?>
            <li><?php echo $msg;?></li>
        <?php endforeach;?>
        </ul>
    </div>
    <?php endif;?>
    <div id="library-container" class="content-row clearfix" >

    <form method="post">
        <div id="inventory-left">
            <div class="inventory-heading">
                <div class="pull-left"><label class="checkbox"><input type="checkbox" rel="inventories" class="checkall"/></label></div>
                <h5>INVENTORY</h5>
            </div>
            <!-- Begin skillset items section -->
            <ul class="inline inventory-group" id="inventories">
                <!--item-->
                <?php 
				foreach($inventories as $in) {
					if( $in['library_type_id'] == "6" ) {
						$rows_invforms = $this->users->getMetaDataList('inv_investigation_forms', 'in_inv_form_id="'.$in['in_inv_form_id'].'"', '',  'in_inv_form_id, st_inv_form_no');

						$inv_form_id = $inv_form_no = '';
						if( isset($rows_invforms) && sizeof($rows_invforms) ) {
							$inv_form_id 		= $rows_invforms[0]['in_inv_form_id'];
							$inv_form_no 		= $rows_invforms[0]['st_inv_form_no'];
						}?>
						<li class="clearfix">
							<div class='inventory-item'>
								<div class="inventory-checkbox"><input type="checkbox" name="lib_id[]" value="<?php echo $inv_form_id."-".$in['libtype_section']."-".$in['lib_id'];?>"/></div>
								<div class="inventory-item-img draggable">
								   <a href="#" title="Drag me!">
									  <img src='<?php echo $base;?>img/icons/icon-<?php echo strtolower($in['language']);?>.png' libtype_section="Investigations" libdata="<?php echo $inv_form_id."-".$in['library_type_id']."-".$in['lib_id'];?>" alt="<?php echo $inv_form_id;?>"/>
								   </a>
								</div>
								<div class="inventory-item-info">
									<p><strong><a href="#"><?php echo $inv_form_no;?></a></strong></p>
								</div>
								<div class="inventory-item-qt text-right">
								   <h5 id="balance<?php echo $inv_form_id;?>"><?php echo $in['qty_ordered']-(int)$in['qty_assigned'];?>
								   <small>pieces left</small>
								   </h5>
								</div>
								<div class="clear"></div>
							</div>
						</li>
						<?php 
					}
					else {?>
						<li class="clearfix">
							<div class='inventory-item'>
								<div class="inventory-checkbox">
									<input type="checkbox" name="lib_id[]" value="<?php echo "-".$in['libtype_section']."-".$in['lib_id'];?>"/>
								</div>
								<div class="inventory-item-img draggable">
								   <a href="#" title="Drag me!">
									  <img src='<?php echo $base;?>img/icons/icon-<?php echo strtolower($in['language']);?>.png' libtype_section="<?php echo $in['libtype_section'];?>" libdata="<?php echo "-".$in['library_type_id']."-".$in['lib_id'];?>" alt="<?php echo $in['lib_id'];?>"/>
								   </a>
								</div>
								<div class="inventory-item-info">
									<p><strong><a href="#"><?php echo $in['lib_title'];?></a></strong></p>
								</div>
								<div class="inventory-item-qt text-right">
								   <h5 id="balance<?php echo $in['lib_id'];?>"><?php echo $in['qty_ordered']-(int)$in['qty_assigned'];?>
								   <small>pieces left</small>
								   </h5>
								</div>
								<div class="clear"></div>
							</div>
						</li>
					<?php 
					}
				}?>
                <!--  item -->
            </ul>
        </div>
    <!-- End skillset items section --> 
	
        <div id="inventory-right">
            <div class="inventory-heading">
                <div class="pull-left"><label class="checkbox"><input type="checkbox" rel="members" class="checkall"/></label></div>
                <h5 >WORKER</h5>
            </div>
            <!-- Begin skillset items section -->
            <ul class="inline inventory-group" id="members">
                <!--  item-->
                <?php foreach($links as $ln):?>
                <li class="clearfix" rel="<?php echo $ln['worker_id'];?>">
    				<div class='inventory-item member-wrapper'>
    				    <div class="inventory-checkbox"><input type="checkbox" name="userid[]" value="<?php echo $ln['worker_id'];?>"/></div>
    				    <div class="member-item-img">
    					   <a href="#" >
    						  <img src='<?php echo !empty($ln['profile_image'])?$base.$this->path_upload_profiles.$ln['profile_image']:$base.'img/default.png';?>' title="<?php echo $ln['nickname'];?>" />
    					   </a>
    				    </div>
    					<div class="inventory-item-info">
    						<p><strong><a href="#" ><?php echo $ln['firstname']." ".$ln['lastname'];?></a></strong></p>
            			</div>
    					<div class="inventory-item-qt text-right">
    					   <p><small><a href="<?php echo $base;?>admin/profile_setting?section=myworker">view profile</a></small></p>
    					</div>
                        <div class="clear"></div>
          			</div>
                </li>
                <?php endforeach;?>
                <!--  item -->
             </ul>
        </div>
        <div class="pull-right assign-button"><button class="btn">Assign</button></div>
    </form>    
    </div>
    <!-- End FOURTH content row TRADE CERTIFICATION--> 
    <script type="text/javascript">
	$(document).ready(function () {
	   $('.checkall').change(function(){
	       $rel = $(this).attr('rel');
           if($(this).is(':checked')){
                $('#'+$rel+' input[type=checkbox]').prop("checked", true);
           }else{
                $('#'+$rel+' input[type=checkbox]').prop("checked", false);
           }
	   })
	})
    </script>
    <script type="text/javascript" src="<?php echo $base;?>js/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo $base;?>js/jquery-ui.js"></script>
    <script type="text/javascript">
        var jq201 = jQuery.noConflict();
        jq201(document).ready(function () {
            jq201('.draggable img').draggable({helper: 'clone', start: function (event, ui) {
                /*
                    jq201(ui.helper).css("margin-left", event.clientX - jq201(event.target).offset().left);
                    jq201(ui.helper).css("margin-top", event.clientY - jq201(event.target).offset().top);*/
            }});
            
            jq201('#members .clearfix').droppable({
              drop: function( event, ui ) {
				var libtype_section = ui.draggable.attr('libtype_section');
				if( "Investigations" == libtype_section ) {
					libId = ui.draggable.attr('libdata');
				}
				else {
					libId 	= ui.draggable.attr('alt');
				}
                jq201.post('<?php echo $base;?>ajax/ajax_assign_inventory', {'lib_id':libId, 'libtype_section':libtype_section, 'worker_id': $(this).attr('rel')}, function(data){
                    if(data.trim() != '')
                        alert(data);
                    else{
                        $qty = $('#balance'+libId).text();
                        $qty = parseInt($qty) - 1;
                        $('#balance'+libId).text($qty);
                        if($qty<1)
                            ui.draggable.draggable('disable').parent().parent().parent().css({ opacity: 0.5 }).children().children('input[type=checkbox]').prop('disabled', true);
                    }
                })
              }
            });
        });
    </script> 
<?php $this->load->view('footer_admin'); ?>